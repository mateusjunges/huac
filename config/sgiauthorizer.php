<?php
/**
 * Created by IntelliJ IDEA.
 * User: joaoh
 * Date: 11/13/15
 * Time: 9:45 AM
 */

return array(

    /*
    |-------------------------------------------
    | Client Array
    |-------------------------------------------
    |
    | id: ID do client,
    | secret: Senha do client
    |
    */

    'client' => [
        'id' => env('APP_CLIENT_ID', 1),
        'secret' => env('APP_CLIENT_SECRET', 'secret')
    ],

    /*
    |-------------------------------------------
    | Server Array
    |-------------------------------------------
    |
    | host: Ip do servidor do SGI,
    | path: Caminho base para o sgi-security-server,
    | manager-path: Caminho base para o s3manager
    |
    */

    'server' => [
        'dev' => [
            'core-url' => 'http://dev01.redes.uepg.br/sgi-security-server/server/public/',
            'manager-url' => 'http://dev01.redes.uepg.br/sgi-security-server-manager/server/public/acl/',
            'manager-api' => 'http://dev01.redes.uepg.br/sgi-security-server-manager/server/public/api/'
        ],
        'producao' => [
            'core-url' => 'https://auth.sgi.uepg.br/',
            'manager-url' => 'http://ssm.sgi.uepg.br/',
            'manager-api' => 'http://ssm.sgi.uepg.br/api/'
        ]
    ],

    /*
    |-------------------------------------------
    | App Array
    |-------------------------------------------
    |
    | loginRoute: Rota de login da aplicação.
    |
    | userInfoRoute: Rota para exibir informações do usuario logado.
    |
    | rotaPadrao: Rota padrão para sua aplicação. Caso seja o primeiro login,
    | usuario será redirecionado para essa rota. Caso contrario será redirecionado
    | para a ultima rota visitada.
    |
    | usuarioExterno: Rota para a view de cadastro do usuário externo.
    | Somente será utilizada se sua aplicação necessitar.
    |
    |
    */

    'app' => [
        'loginRoute' => '/login',
        'userInfoRoute' => '/user/profile',
        'rotaPadrao' => '/',
        'usuarioExterno' => '/cadastrar_externo'
    ],

    /*
     |------------------------------------------
     | Acl Error Array
     |------------------------------------------
     |
     | tratamentoErro: Qual é o tipo padrão de tratamento de erro que você deseja utilizar.
     |                 exception: Se você deseja que uma exceção (SGIAclException) seja gerada.
     |                 abort: Se você deseja que um erro 403 seja gerado.
     */

     'acl-error' => [
         'tratamentoErro' => 'abort',
     ],

    /*
    |-------------------------------------------
    | View Array
    |-------------------------------------------
    |
    | layout: Nome da visão utilizada como layout na aplicação, será extendida pela
    |             visão do formulário disponibilizado com este pacote.
    |
    | loginView: Nome da View (formato Blade) de login da aplicação. O padrão utiliza a view disponibilizada
    |                por este pacote, ela pode ser alterada por uma view especifica de sua aplicação.
    |
    | userInfoView: Nome da View (formato Blade) para mostrar as informações do usuário logado. Como o loginView, fique a
    |                vontade para colocar sua propria view.
    |
    | loggedUserView: Nome da View (formato Blade) para inserir na topbar (ou onde desejar) o username do usuário logado,
    |                  caso o usuario não esteja logado, aparecerá um botão login. Deve utilizar essa view com o comando
    |                  de blade '@include(Config::get('sgiauthorizer.view.loggedUserView'))' onde desejar que seja
    |                  exibido.
    |
    | cadastroExternoView: Nome da view (formato blade) do formulário de cadastro de usuário externo. O pacote possui a view padrão,
    |                      fique a vontade para utilizá-la como desejar. Caso precise de campos a mais, leia o procedimento na documentação.
    |
    | loginSection: Nome da seção no layout principal onde deve ser inserido o formulário
    |                de login.
    |
    | userInfoSection: Nome da seção no layout principal onde deve ser inserido os dados do usuario logado.
    |
    | cadastroSection: Nome da seção no layout principal onde deve ser inserido o formulário para cadastro de usuário externo.
    */

    'view' => [
        'layout' => 'adminlte::master',

        'loginView' => 'auth.login',
        'userInfoView' => 'sgiauthorizer::auth.showUserInfo',
        'loggedUserView' => 'sgiauthorizer::auth.loggedUser',
        'cadastroExternoView' => 'sgiauthorizer::usuario_externo.create',

        'loginSection' => 'loginContent',
        'userInfoSection' => 'userinfo',
        'cadastroSection' => 'content'
    ]
);
