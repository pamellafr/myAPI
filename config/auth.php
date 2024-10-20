<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | Esta opção define o "guard" de autenticação padrão e o "broker" de
    | redefinição de senha para sua aplicação. Você pode alterar esses valores
    | conforme necessário, mas eles são um ótimo ponto de partida para a
    | maioria das aplicações.
    |
    */

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'), // Define o guard padrão para 'web'
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'), // Define o broker de senhas
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Aqui você pode definir todos os guards de autenticação para sua
    | aplicação. Uma configuração padrão já foi definida para você, que
    | utiliza armazenamento de sessão e o provedor de usuários Eloquent.
    |
    | Todos os guards de autenticação têm um provedor de usuários, que
    | define como os usuários são realmente recuperados do banco de dados
    | ou de outro sistema de armazenamento usado pela aplicação.
    |
    | Suportados: "session", "token", "passport", etc.
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session', // Usa sessão para autenticação em aplicações web
            'provider' => 'users', // Define o provedor de usuários
        ],
        'api' => [
            'driver' => 'token', // Usa token para autenticação de APIs
            'provider' => 'users', // Define o mesmo provedor de usuários
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | Todos os guards de autenticação têm um provedor de usuários, que
    | define como os usuários são realmente recuperados do banco de dados
    | ou de outro sistema de armazenamento usado pela aplicação. O Eloquent
    | é utilizado por padrão.
    |
    | Se você tiver várias tabelas ou modelos de usuário, poderá configurar
    | vários provedores para representar o modelo/tabela. Esses provedores
    | podem ser atribuídos a quaisquer guards de autenticação adicionais que
    | você definiu.
    |
    | Suportados: "database", "eloquent".
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent', // Usa o driver Eloquent para recuperar usuários
            'model' => env('AUTH_MODEL', App\Models\User::class), // Define o modelo de usuário padrão
        ],

        // Caso queira usar outro método para obter usuários, como a tabela de banco de dados:
        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | Essas opções de configuração especificam o comportamento da funcionalidade
    | de redefinição de senha do Laravel, incluindo a tabela utilizada para
    | armazenamento de tokens e o provedor de usuários que é invocado para
    | realmente recuperar usuários.
    |
    | O tempo de expiração é o número de minutos que cada token de redefinição
    | será considerado válido. Este recurso de segurança mantém os tokens
    | com vida curta, então eles têm menos tempo para serem adivinhados.
    |
    | Você pode alterar isso conforme necessário.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users', // Define o provedor de usuários para redefinições
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'), // Define a tabela para armazenamento de tokens
            'expire' => 60, // Define o tempo de expiração do token
            'throttle' => 60, // Define o tempo de espera para gerar novos tokens
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    |
    | Aqui você pode definir a quantidade de segundos antes que a janela
    | de confirmação de senha expire e os usuários sejam solicitados a
    | reentrar sua senha via tela de confirmação. Por padrão, o tempo
    | de espera dura três horas.
    |
    */

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800), // Tempo padrão de espera para confirmação de senha

];
