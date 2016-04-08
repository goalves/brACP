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

/**
 * Classe para formatação dos dados.
 *
 * @static
 */
class Format
{
    public static function bytes($bytes)
    {
        $format = ['B', 'KB', 'MB', 'GB'];

        $bytes = $totalBytes = max(0, $bytes);
        $pow = floor(log($bytes)/log(1024));

        $bytes /= pow(1024, $pow);

        return sprintf('%.2f %s (%d bytes)', $bytes, $format[$pow], $totalBytes);
    }

    /**
     * Formata informações de data do formato indicado até o destino.
     *
     * @param string $date
     * @param string $destFormat
     * @param string $fromFormat
     *
     * @return string
     */
    public static function date($date, $destFormat = 'd/m/Y H:i:s')
    {
        return date($destFormat, strtotime($date));
    }

    /**
     * Calcula a diferença de datas e retorna em formato de string.
     *
     * @param string $start
     * @param string $end
     *
     * @return string
     */
    public static function date_diff($start, $end, $format = 'Y-m-d H:i:s')
    {
        $str = '';
        $interval = date_diff(date_create_from_format($format, $end),
                        date_create_from_format($format, $start), true);

        $tmp = [];

        if($interval->y > 0) $tmp[] = $interval->y . ' ano'.(($interval->y > 1) ? 's':'');
        if($interval->m > 0) $tmp[] = $interval->m . ' '.(($interval->m > 1) ? 'meses':'mês');
        if($interval->d > 0) $tmp[] = $interval->d . ' dia' . (($interval->d > 1) ? 's':'');
        if($interval->h > 0) $tmp[] = $interval->h . ' hora' . (($interval->h > 1) ? 's':'');
        if($interval->i > 0) $tmp[] = $interval->i . ' minuto' . (($interval->i > 1) ? 's':'');
        if($interval->s > 0) $tmp[] = $interval->s . ' segundo' . (($interval->s > 1) ? 's':'');

        for($i = 0; $i < count($tmp); $i++)
        {
            $str .= $tmp[$i];

            if(($i + 1) < (count($tmp) - 1))
                $str .= ', ';
            else if(($i + 1) == (count($tmp) - 1))
                $str .= ' e ';

        }
        return $str;
    }

    /**
     * Protege o endereço de e-mail exibindo apenas o primeiro e ultimo caractere antes do @
     *
     * @param string $email
     *
     * @return string
     */
    public static function protectMail($email)
    {
        preg_match('/^([a-z0-9._%+-])([^\@]+)([a-z0-9._%+-])(.*)/i', $email, $match);

        array_shift($match);
        $match[1] = preg_replace('([a-z0-9._%+-])', '*', $match[1]);

        return implode('', $match);
    }

    /**
     * Formata o falor enviado como dinheiro.
     */
    public static function money($money, $decimalPlaces = 2, $centsDelimiter = ',', $milharDelimiter = '.')
    {
        $_pow = pow(10, $decimalPlaces);
        $_money = floor(floatval($money) * $_pow);
        $_cents = substr(str_pad(strval($_money), ($decimalPlaces + 1), '0', STR_PAD_RIGHT), $decimalPlaces * -1);
        $money = floor($_money/$_pow);

        return self::zeny($money, $milharDelimiter) . $centsDelimiter . $_cents;
    }

    /**
     * Obtém o status do jogador.
     *
     * @param int $online
     *
     * @return string
     */
    public static function status($online)
    {
        return self::$online[$online];
    }

    /**
     * Obtém o nome da classe para o personagem.
     *
     * @param int $job_class Código da classe.
     *
     * @return string
     */
    public static function job($job_class)
    {
        return ((isset(self::$job_list[$job_class])) ? self::$job_list[$job_class] : "- Desconhecido - ");
    }

    /**
     * Formata os zenys.
     *
     * @param int $zeny
     *
     * @return string
     */
    public static function zeny($zeny, $delimiter = '.')
    {
        return strrev(implode($delimiter, str_split(strrev($zeny), 3)));
    }

    /**
     * Define o status do jogador com o texto formatado.
     *
     * @var array
     */
    private static $online = [
        0 => '<span style="color: red;">Offline</span>',
        1 => '<span style="color: green;">Online</span>',
    ];

    /**
     * Lista de classes para exibição no painel de controle.
     * 
     * @author Megasantos
     * @link https://github.com/Megasantos/Fluxcp/blob/master/config/jobs.php
     *
     * @var array
     */
    private static $job_list = [
        0    => 'Aprendiz',
        1    => 'Espadachim',
        2    => 'Mago',
        3    => 'Arqueiro',
        4    => 'Noviço',
        5    => 'Mercador',
        6    => 'Gatuno',
        7    => 'Cavaleiro',
        8    => 'Sacerdote',
        9    => 'Bruxo',
        10   => 'Ferreiro',
        11   => 'Caçador',
        12   => 'Mercenário',
        //13   => 'Cavaleiro (Peco)',
        14   => 'Templário',
        15   => 'Monge',
        16   => 'Sábio',
        17   => 'Arruaceiro',
        18   => 'Alquimista',
        19   => 'Bardo',
        20   => 'Odalisca',
        //21   => 'Templário (Peco)',
        22   => 'Casamento',
        23   => 'Super Aprendiz',
        24   => 'Justiceiro',
        25   => 'Ninja',
        26   => 'Xmas',
        27   => 'Summer',
        28   => 'Hanbok',
        4001 => 'Aprendiz T.',
        4002 => 'Espadachim T.',
        4003 => 'Mago T.',
        4004 => 'Arqueiro T.',
        4005 => 'Noviço T.',
        4006 => 'Mercador T.',
        4007 => 'Gatuno T.',
        4008 => 'Lorde',
        4009 => 'Sumo-Sacerdote',
        4010 => 'Arquimago',
        4011 => 'Mestre-Ferreiro',
        4012 => 'Atirador de Elite',
        4013 => 'Algoz',
        //4014 => 'Lorde (Peco)',
        4015 => 'Paladino',
        4016 => 'Mestre',
        4017 => 'Professor',
        4018 => 'Desordeiro',
        4019 => 'Criador',
        4020 => 'Menestrel',
        4021 => 'Cigana',
        //4022 => 'Paladino (Peco)',
        4023 => 'Aprendiz Bebê',
        4024 => 'Espadachim Bebê',
        4025 => 'Mago Bebê',
        4026 => 'Arqueiro Bebê',
        4027 => 'Noviço Bebê',
        4028 => 'Mercador Bebê',
        4029 => 'Gatuno Bebê',
        4030 => 'Cavaleiro Bebê',
        4031 => 'Sacerdote Bebê',
        4032 => 'Bruxo Bebê',
        4033 => 'Ferreiro Bebê',
        4034 => 'Caçador Bebê',
        4035 => 'Mercenário Bebê',
        //4036 => 'Cavaleiro Bebê (Peco)',
        4037 => 'Templário Bebê',
        4038 => 'Monge Bebê',
        4039 => 'Sábio Bebê',
        4040 => 'Arruaceiro Bebê',
        4041 => 'Alquimista Bebê',
        4042 => 'Bardo Bebê',
        4043 => 'Odalisca Bebê',
        //4044 => 'Templário Bebê (Peco',
        4045 => 'Super Aprendiz Bebê',
        
        4046 => 'Taekwon',
        4047 => 'Mestre Taekwon',
        //4048 => 'Mestre Taekwon (Voo)',
        4049 => 'Espiritualista',
        4050 => 'Jiang Shi',
        4051 => 'Death Knight',
        4052 => 'Dark Collector',
        4054 => 'Cavaleiro Rúnico',
        4055 => 'Arcano',
        4056 => 'Sentinela',
        4057 => 'Arcebispo',
        4058 => 'Mecânico',
        4059 => 'Sicário',
        4060 => 'Cavaleiro Rúnico T.',
        4061 => 'Arcano T.',
        4062 => 'Sentinela T.',
        4063 => 'Arcebispo T.',
        4064 => 'Mecânico T.',
        4065 => 'Sicário T.',
        4066 => 'Guardião Real',
        4067 => 'Feiticeiro',
        4068 => 'Trovador',
        4069 => 'Musa',
        4070 => 'Shura',
        4071 => 'Bioquímico',
        4072 => 'Renegado',
        4073 => 'Guardião Real T.',
        4074 => 'Feiticeiro T.',
        4075 => 'Trovador T.',
        4076 => 'Musa T.',
        4077 => 'Shura T.',
        4078 => 'Bioquímico T.',
        4079 => 'Renegado T.',
        //4080 => 'Cavaleiro Rúnico (Dragão)',
        //4081 => 'Cavaleiro Rúnico T. (Dragão)',
        //4082 => 'Guardião Real (Grifo)',
        //4083 => 'Guardião Real T. (Grifo)',
        //4084 => 'Sentinela (Lobo)',
        //4085 => 'Sentinela T. (Lobo)',
        //4086 => 'Mecânico (Robô)',
        //4087 => 'Mecânico T. (Robô)',
        4096 => 'Cavaleiro Rúnico Bebê',
        4097 => 'Arcano Bebê',
        4098 => 'Sentinela Bebê',
        4099 => 'Arcebispo Bebê',
        4100 => 'Mecânico Bebê',
        4101 => 'Sicário Bebê',
        4102 => 'Guardião Real Bebê',
        4103 => 'Feiticeiro Bebê',
        4104 => 'Trovador Bebê',
        4105 => 'Musa Bebê',
        4106 => 'Shura Bebê',
        4107 => 'Bioquímico Bebê',
        4108 => 'Renegado Bebê',
        
        //4109 => 'Cavaleiro Rúnico Bebê (Dragão)',
        //4110 => 'Guardião Real Bebê (Grifo)',
        //4111 => 'Sentinela Bebê (Lobo)',
        //4112 => 'Mecânico Bebê (Robô)',
        
        4190 => 'Super Aprendiz T.',
        4191 => 'Super Aprendiz Bebê T.',
        
        4211 => 'Kagerou',
        4212 => 'Oboro',
        4215 => 'Rebelde'
    ];
}
