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

return
[
    /**
     * @refer templates/menu.tpl
     * @author carloshenrq
     */
    'MENU'                      => 'Menu',
    'MENU_HOME'                 => 'Principal',
    'MENU_ADMIN'                => 'Administração',
    'MENU_ADMIN_BACKUP'         => 'Criar Backup',
    'MENU_ADMIN_THEMES'         => 'Atualizar Temas',
    'MENU_MYACC'                => 'Minha Conta',
    'MENU_MYACC_LOGIN'          => 'Entrar',
    'MENU_MYACC_CREATE'         => 'Registrar',
    'MENU_MYACC_RECOVER'        => 'Recuperar Conta',
    'MENU_MYACC_CHANGEPASS'     => 'Mudar Senha',
    'MENU_MYACC_CHANGEMAIL'     => 'Mudar E-mail',
    'MENU_MYACC_CHARS'          => 'Personagens',
    'MENU_MYACC_DONATIONS'      => 'Doações',
    'MENU_MYACC_LOGOUT'         => 'Sair',
    'MENU_RANKINGS'             => 'Classificações',
    'MENU_RANKINGS_CHARS'       => 'Jogadores',
    'MENU_RANKING_ECONOMY'      => 'Economia',

    /**
     * @refer templates/default.tpl
     * @author carloshenrq
     */
    'DEFAULT_DEVELOP_TITLE'     => 'Lembrete!',
    'DEFAULT_DEVELOP_MESSAGE'   => [
        'O Sistema está sendo executado em modo desenvolvimento!',
        'Algumas configurações podem não responder ao esperado.',
    ],
    'DEFAULT_BETA_TITLE'        => 'Você está executando uma versão beta!',
    'DEFAULT_BETA_MESSAGE'      => [
        'A Versão do sistema que está em execução não é estavel e ainda está em fase de testes!',
        'Por favor, fique atento as atualizações pois muitos erros podem ser corrigidos.'
    ],
    'DEFAULT_ADMIN_TITLE'       => 'Lembrete aos adminsitradores',
    'DEFAULT_ADMIN_MESSAGE'     => 'Algumas opções podem não estar habilitadas para administradores devido a questões de segurança.',

    /**
     * @refer templates/home.tpl
     * @author carloshenrq
     */
    'HOME_TITLE'                => 'Principal',
    'HOME_MESSAGE'              => [
        'Seja muito bem vindo ao painel de controle.'
    ],

    /**
     * @refer templates/account.login.ajax.tpl
     * @author carloshenrq
     */
    'LOGIN_TITLE'               => 'Minha Conta &raquo; Entrar',
    'LOGIN_ERR'                 => [
        'MISMATCH'  => 'Combinação de usuário e senha incorretos.',
        'DENIED'    => 'Acesso negado. Você não pode realizar login.',
    ],
    'LOGIN_SUCCESS'             => 'Login realizado com sucesso. Aguarde...',
    'LOGIN_MSG'                 => [
        'Para acessar os dados de sua conta, você deve realizar o acesso utilizando seu nome de usuário e senha.',
        'LOST_ACC'      => 'Perdeu sua conta? <label class="lbl-link" for="bracp-modal-recover">clique aqui</label>',
        'CREATE_ACC'    => 'Não possui uma conta? <label class="lbl-link" for="bracp-modal-create">clique aqui</label>',
    ],
    'LOGIN_PLACEHOLDER'         => [
        'USERID'    => 'Nome de usuário',
        'PASSWD'    => 'Senha de usuário',
    ],
    'LOGIN_BUTTONS'             => [
        'SUBMIT'                => 'Entrar',
        'RESET'                 => 'Limpar',
    ],

    /**
     * @refer templates/account.register.ajax.tpl
     * @author carloshenrq
     */
    'CREATE_TITLE'              => 'Registrar',
    'CREATE_ERR'                => [
        'DISABLED'          => 'Criação de contas está desativada.',
        'MISMATCH_PASS'     => 'As senhas digitadas não conferem!',
        'MISMATCH_MAIL'     => 'Os endereços de e-mail digitados não conferem!',
        'USERID_USED'       => 'Nome de usuário ou endereço de e-mail já está em uso.',

        'CONFIRM_DISABLED'  => 'Esta opção está desativada. Verifique com o administrador.',
        'CONFIRM_USED'      => 'O Código de confirmação já foi utilizado ou é inválido.',
        'CONFIRM_NOACC'     => 'Conta para enviar o código de ativação é inválida.,'
    ],
    'CREATE_SUCCESS'            => [
        'Sua conta foi criada com sucesso! Você já pode realizar login.',
        'CONFIRM'       => 'Você confirmou com sucesso sua conta. Você já pode realizar login.',
        'CONFIRM_SEND'  => 'O Código de ativação foi enviado com sucesso para o endereço de e-mail cadastrado.',
    ],
    'CREATE_MAIL'               => [
        'TITLE_CONFIRM'     => 'Confirme seu Registro',
        'TITLE_CONFIRMED'   => 'Conta Confirmada',
        'TITLE_SUCCESS'     => 'Conta Registrada',
    ],
    'CREATE_MSG'                => [
        'Para criar sua conta, é necessário que você informe os dados abaixo corretamente para que seja possivel seu acesso ao jogo e as funções do painel de controle.',
    ],
    'CREATE_PLACEHOLDER'        => [
        'USERID'            => 'Nome de usuário',
        'PASSWORD'          => 'Senha de usuário',
        'CONFIRM_PASS'      => 'Confirme a senha',
        'EMAIL'             => 'Endereço de e-mail',
        'CONFIRM_EMAIL'     => 'Confirme o email',
    ],
    'CREATE_SEX'                => [
        'M' => 'Masculino',
        'F' => 'Feminino',
    ],
    'CREATE_BUTTONS'            => [
        'ACCEPT'    => 'Eu concordo com os termos do servidor.',
        'SUBMIT'    => 'Registrar',
        'RESET'     => 'Limpar',
    ],

    /**
     * @refer templates/rankings.chars.ajax.tpl
     * @author carloshenrq
     */
    'RANKINGS_MSG'                  => [
        // Mensagens padrão.
        'NO_CHARS'      => 'Não existem personagens para este ranking.',

        // Ranking de personagens.
        'CHARS_TITLE'       => 'Rankings &raquo; Personagens &raquo; Geral',
        'CHARS_TBL_TITLE'   => 'Top 100 jogadores do servidor',

        // Ranking de economia
        'ECONOMY_TITLE'     => 'Rankings &raquo; Personagens &raquo; Economia',
        'ECONOMY_TBL_TITLE' => 'Top 100 jogadores mais ricos',

        // Tradução de informações de tabela.
        'TBL_POS'       => 'Pos.',
        'TBL_NAME'      => 'Nome',
        'TBL_LEVEL'     => 'Nível',
        'TBL_CLASS'     => 'Classe',
        'TBL_STATUS'    => 'Status',
        'TBL_ZENY'      => 'Zeny',
    ],

    /**
     * @refer templates/account.recover.ajax.tpl
     * @author carloshenrq
     */
    'RECOVER_TITLE'             => 'Minha Conta &raquo; Recuperar',
    'RECOVER_ERR'               => [
        'DISABLED'      => 'Recuperação de contas está desativada.',
        'MISMATCH'      => 'Combinação de usuário e e-mail não encontrados.',

        'CODE_INVALID'  => 'O Código de recuperação já foi utilizado ou é inválido.',
        'CODE_OTHER'    => 'Não foi possível recuperar a senha de usuário.',
    ],
    'RECOVER_MAIL'              => [
        'TITLE_CODE'    => 'Redefinição de Senha',
        'TITLE_SEND'    => 'Recuperação de Usuário',
    ],
    'RECOVER_SUCCESS'           => [
        'Foi enviado um e-mail contendo os dados de recuperação. Verifique seu e-mail.',
        'Os dados de sua conta foram enviados ao seu e-mail.',
        'CODE_SEND' => 'A Nova senha foi enviada para seu endereço de e-mail.',
    ],
    'RECOVER_MSG'               => [
        'Para recuperar seu nome de usuário, você deve preencher abaixo as informações corretas para que seja possível realizar esta recuperação.',

    ],
    'RECOVER_PLACEHOLDER'       => [
        'USERID'    => 'Nome de usuário',
        'EMAIL'     => 'Endereço de e-mail',
    ],
    'RECOVER_BUTTONS'            => [
        'SUBMIT'    => 'Recuperar',
        'RESET'     => 'Limpar',
    ],

    /**
     * @refer templates/account.change.password.ajax.tpl
     * @author carloshenrq
     */
    'CHANGEPASS_TITLE'          => 'Minha Conta &raquo; Mudar Senha',
    'CHANGEPASS_NOADMIN'        => 'Nenhum administrador está permitido a alterar sua senha aqui.',
    'CHANGEPASS_NOADMIN_MSG'    => [
        '<strong>Nota.:</strong> Por motivos de segurança é recomendado que a alteração de senha para adminsitradores seja desabilitada!',
        '',
        'Para alterar, edite o arquivo <strong>config.php</strong> e mude a configuração <strong>BRACP_ALLOW_ADMIN_CHANGE_PASSWORD</strong> para <strong>false</strong>',
    ],
    'CHANGEPASS_ERR'            => [
        'ADMIN'                 => 'Usuários do tipo administrador não podem realizar alteração de senha.',
        'MISMATCH1'             => 'Senha atual digitada não confere.',
        'MISMATCH2'             => 'Novas senhas digitadas não conferem.',
        'EQUALS'                => 'Sua nova senha não pode ser igual a senha anterior.',
        'OTHER'                 => 'Ocorreu um erro durante a alteração de sua senha.',
    ],
    'CHANGEPASS_SUCCESS'        => 'Sua senha foi alterada com sucesso!',
    'CHANGEPASS_MSG'            => [
        'Para realizar a alteração de sua senha é necessário que você digite sua senha atual, sua nova senha e confirme.',
    ],
    'CHANGEPASS_PLACEHOLDER'    => [
        'ACTUAL_PASSWORD'       => 'Senha atual',
        'NEW_PASSWORD'          => 'Digite sua nova senha',
        'CONFIRM_PASSWORD'      => 'Confirme sua nova senha',
    ],
    'CHANGEPASS_BUTTONS'        => [
        'SUBMIT'                => 'Alterar',
        'RESET'                 => 'Limpar',
    ],

    /**
     * @refer templates/account.change.mail.ajax.tpl
     * @author carloshenrq
     */
    'CHANGEMAIL_TITLE'          => 'Minha Conta &raquo; Mudar Email',
    'CHANGEMAIL_ERR'            => [
        'DISABLED'      => 'Alteração de e-mail está desativada.',
        'NO_ADMIN'      => 'Nenhum administrador está permitido a alterar seu endereço de email.',

        'MISMATCH1'     => 'E-mail atual não confere com o digitado.',
        'MISMATCH2'     => 'Os e-mails digitados não conferem.',
        'EQUALS'        => 'O Novo endereço de e-mail não pode ser igual ao atual.',
        'OTHER'         => 'Ocorreu um erro durante a alteração do seu endereço.',
    ],
    'CHANGEMAIL_SUCCESS'        => 'Seu endereço de e-mail foi alterado com sucesso.',
    'CHANGEMAIL_MSG'            => [
        'Para realizar a alteração de seu endereço de e-mail é necessário que você digite seu e-mail atual, seu novo endereço de email e confirme!',
    ],
    'CHANGEMAIL_PLACEHOLDER'    => [
        'EMAIL'     => 'Email atual',
        'NEW_EMAIL' => 'Novo email',
        'CONFIRM'   => 'Confirme seu novo email',
    ],
    'CHANGEMAIL_BUTTONS'        => [
        'SUBMIT'    => 'Mudar',
        'RESET'     => 'Limpar',
    ],

    /**
     * Mensagens de erro padrão.
     */
    'ERR_RECAPTCHA'             => 'Código de verificação inválido. Verifique por favor.',

    /**
     * Define o status do jogador com o texto formatado.
     */
    'STATUS' => [
        0 => 'Desconectado',
        1 => 'Conectado',
    ],

    /**
     * Lista de classes para exibição no painel de controle.
     * 
     * @author Megasantos
     * @link https://github.com/Megasantos/Fluxcp/blob/master/config/jobs.php
     *
     * @var array
     */
    'JOBS' => [
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
    ],
];
