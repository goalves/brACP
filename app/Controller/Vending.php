<?php
/**
 *  brACP - brAthena Control Panel for Ragnarok Emulators
 *  Copyright (C) 2015  brAthena, CHLFZ
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace Controller;

use \Psr\Http\Message\ServerRequestInterface;
use \Psr\Http\Message\ResponseInterface;
use \ServerPing;
use \Cache;

/**
 * Controlador para dados de conta.
 *
 * @static
 */
class Vending
{
    use \TApplication;

    /**
     * Método inicial para exibição dos mercadores em tela.
     *
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param array $args
     */
    public static function index(ServerRequestInterface $request, ResponseInterface $response, $args)
    {
        // // Exibe o display para home.
        // self::getApp()->display('home');
    }

    /**
     * Obtém todos os mercadores online e os itens que estão vendendo.
     */
    public static function getAllMerchants()
    {
        // Obtém os dados de mercadores gravados no cache para que não seja
        //  realizado flood de consultas no banco. (Pode ser uma consulta demorada...)
        $data = Cache::get('BRACP_CACHE_MERCHANT_SVR_' . self::getApp()->getSession()->BRACP_SVR_SELECTED, function() {
            // Obtém todos os dados de vendas no banco de dados
            $merchants = Vending::getSvrEm()
                            ->createQuery('
                                SELECT
                                    item, cart, char, guild, merc, merc_char
                                FROM
                                    Model\MerchantItem item
                                INNER JOIN
                                    item.cart cart
                                INNER JOIN
                                    cart.char char
                                LEFT JOIN
                                    char.guild guild
                                INNER JOIN
                                    item.merchant merc
                                INNER JOIN
                                    merc.char merc_char
                            ')
                            ->getResult();

            $_parsedChar = [];
            $merchants_data = [];
            $i = 0;

            // Varre todas as vendinhas recebidas
            foreach($merchants as $merchant)
            {
                $char_id = $merchant->getMerchant()->getChar_id();

                // Verifica se o char já foi tratado e inicializa o vetor para não repetir a mesma lojinha varias vezes.
                if(!in_array($char_id, $_parsedChar))
                {
                    $_parsedChar[$i] = $char_id;
                    $merchants_data[$i] = (object)[
                        'title'     => $merchant->getMerchant()->getTitle(),
                        'name'      => $merchant->getMerchant()->getChar()->getName(),
                        'map'       => $merchant->getMerchant()->getChar()->getLast_map(),
                        'x'         => $merchant->getMerchant()->getChar()->getLast_x(),
                        'y'         => $merchant->getMerchant()->getChar()->getLast_y(),
                        'items'     => []
                    ];

                    $i++;
                }

                // Dados de itens dos mercadores
                // Obtém o item (via cache [item_db]) e armazena também no vetor, informações
                //  de quantidade e preço.
                $index = array_search($char_id, $_parsedChar);
                $merchants_data[$index]->items[] = (object)[
                    'item'      => Item::get($merchant->getCart()->getNameid()),
                    'amount'    => $merchant->getAmount(),
                    'price'     => $merchant->getPrice(),
                ];
            }

            // Retorna em formato json, pode ser que isso seja feito via request
            //  para uma exibição em patcher/client
            return json_decode(json_encode($merchants_data));
        });


        return $data;
    }

}

