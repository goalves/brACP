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

/**
 * Controlador para dados de conta.
 *
 * @static
 */
class Home
{
    use \TApplication;

    /**
     * Método para alterar o tema padrão do painel de controle.
     *
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param array $args
     */
    public static function theme(ServerRequestInterface $request, ResponseInterface $response, $args)
    {
        // Atualiza informações do tema.
        $post = $request->getParsedBody();

        // Realiza a alteração de tema se for necessário.
        if(isset($post['BRACP_THEME']))
        {
            self::getApp()->getSession()->BRACP_THEME = $post['BRACP_THEME'];
        }
    }

    /**
     * Método para alterar a linguagem padrão do painel de controle.
     *
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param array $args
     */
    public static function server(ServerRequestInterface $request, ResponseInterface $response, $args)
    {
        // Atualiza informações do tema.
        $post = $request->getParsedBody();

        // Realiza a alteração de tema se for necessário.
        if(isset($post['BRACP_SRV_SELECTED']))
            self::getApp()->getSession()->BRACP_SVR_SELECTED = $post['BRACP_SRV_SELECTED'];

        $serverStatus = ServerPing::pingServer(self::getApp()->getSession()->BRACP_SVR_SELECTED, true);

        // Responde ao client que foi alterado com sucesso.
        $response->withJson([
            'login'         => $serverStatus->login,
            'char'          => $serverStatus->char,
            'map'           => $serverStatus->map,
            'playerCount'   => $serverStatus->playerCount,
        ]);
    }

    /**
     * Método para alterar a linguagem padrão do painel de controle.
     *
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param array $args
     */
    public static function language(ServerRequestInterface $request, ResponseInterface $response, $args)
    {
        // Atualiza informações do tema.
        $post = $request->getParsedBody();

        // Realiza a alteração de tema se for necessário.
        if(isset($post['BRACP_LANGUAGE']))
        {
            self::getApp()->getSession()->BRACP_LANGUAGE = $post['BRACP_LANGUAGE'];
        }
    }

    /**
     * Método inicial para exibição dos templates na tela.
     *
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param array $args
     */
    public static function index(ServerRequestInterface $request, ResponseInterface $response, $args)
    {
        // Exibe o display para home.
        self::getApp()->display('home');
    }

}

