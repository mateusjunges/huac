<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | The default title of your admin panel, this goes into the title tag
    | of your page. You can override it per page with the title section.
    | You can optionally also specify a title prefix and/or postfix.
    |
    */

    'title' => 'HUAC - Agendamento cirúrgico do Hospital Universitário dos Campos Gerais',

    'title_prefix' => '',

    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | This logo is displayed at the upper left corner of your admin panel.
    | You can use basic HTML here if you want. The logo has also a mini
    | variant, used for the mini side bar. Make it 3 letters or so
    |
    */

    'logo' => '<b>HUAC</b>',

    'logo_mini' => '<b>HU</b>AC',

    /*
    |--------------------------------------------------------------------------
    | Skin Color
    |--------------------------------------------------------------------------
    |
    | Choose a skin color for your admin panel. The available skin colors:
    | blue, black, purple, yellow, red, and green. Each skin also has a
    | ligth variant: blue-light, purple-light, purple-light, etc.
    |
    */

    'skin' => 'black-light',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Choose a layout for your admin panel. The available layout options:
    | null, 'boxed', 'fixed', 'top-nav'. null is the default, top-nav
    | removes the sidebar and places your menu in the top navbar
    |
    */

    'layout' => null,

    /*
    |--------------------------------------------------------------------------
    | Collapse Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we choose and option to be able to start with a collapsed side
    | bar. To adjust your sidebar layout simply set this  either true
    | this is compatible with layouts except top-nav layout option
    |
    */

    'collapse_sidebar' => false,

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Register here your dashboard, logout, login and register URLs. The
    | logout URL automatically sends a POST request in Laravel 5.3 or higher.
    | You can set the request to a GET or POST with logout_method.
    | Set register_url to null if you don't want a register link.
    |
    */

    'dashboard_url' => 'home',

    'logout_url' => 'logout',

    'logout_method' => 'post',

    'login_url' => 'login',

    'register_url' => 'register',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Specify your menu items to display in the left sidebar. Each menu item
    | should have a text and and a URL. You can also specify an icon from
    | Font Awesome. A string instead of an array represents a header in sidebar
    | layout. The 'can' is a filter on Laravel's built in Gate functionality.
    |
    */

    'menu' => [
        [
            'icon' => 'user-md',
            'text' => 'Minhas cirurgias',
            'route' => 'my-surgeries',
            'can' => 'surgeries.my-surgeries'
        ],
        // Scheduling
        [
            'icon'  => 'calendar',
            'text'  => 'Agendar',
            'route' => 'surgeries.scheduling',
            'can' => 'scheduling.manage'
        ],
        // Patients
        [
            'icon' => 'user-injured',
            'text' => 'Pacientes',
            'can' => 'patients.manage',
            'submenu' => [
                [
                    'text'  => 'Ver pacientes',
                    'route' => 'patients.index',
                    'can'   => 'patients.index'
                ],
                [
                    'text'  => 'Novo paciente',
                    'route' => 'patients.create',
                    'can'   => 'patients.create'
                ]
            ],
        ],
        // Surgeries
        [
            'icon'    => 'list',
            'text'    => 'Cirurgias',
            'can'     => 'surgeries.manage',
            'submenu' => [
                [
                    'text'  => 'Nova cirurgia',
                    'route' => 'surgeries.create',
                    'can'   => 'surgeries.create'
                ],
                [
                    'text'  => 'Listar cirurgias',
                    'route' => 'surgeries.index',
                    'can'  => 'surgeries.index'
                ]
            ],
        ],
//        // Waiting list
//        [
//            'icon' => 'clock',
//            'text' => 'Lista de espera',
//            'can'  => 'waiting-list.manage',
//            'submenu' => [
//                [
//                    'text'  => 'Incluir cirurgia',
//                    'route' => 'waiting-list.create',
//                    'can'   => 'waiting-list.create'
//                ],
//                [
//                    'text'  => 'Ver cirurgias',
//                    'route' => 'waiting-list.index',
//                    'can'   => 'waiting-list.index'
//                ]
//            ]
//        ],
        // Confirm materials
        [
            'text' => 'Confirmar materiais',
            'icon' => 'calendar-check',
            'can' => 'confirm-materials.manage',
            'submenu' => [
                [
                    'text' => 'CME',
                    'route' => 'confirm-materials.cme',
                    'can' => 'confirm-materials.cme'
                ],
                [
                    'text' => 'Centro cirúrgico',
                    'route' => 'confirm-materials.surgery-center',
                    'can' => 'confirm-materials.surgery-center'
                ]
            ]
        ],
        // Users
        [
            'icon'    => 'users-cog',
            'text'    => 'Usuários',
            'can' => 'users.manage',
            'submenu' => [
                [
                    'text'  => 'Listar usuários',
                    'route' => 'users.index',
                    'can' => 'users.index'
                ],
                [
                    'text'  => 'Novo usuário',
                    'route' => 'users.create',
                    'can'   => 'users.create'
                ],
            ]
        ],
        // Groups
        [
            'icon' => 'group',
            'text' => 'Grupos',
            'can' => 'groups.manage',
            'submenu' => [
                [
                    'text' => 'Novo grupo',
                    'route' => 'groups.create',
                    'can' => 'groups.create'
                ],
                [
                    'text' => 'Listar grupos',
                    'route' => 'groups.index',
                    'can' => 'groups.index'
                ]
            ]
        ],
        // Schedule
        [
            'text' => 'Agenda',
            'icon' => 'clipboard-list',
            'can' => 'schedule.confirmed-materials',
            'submenu' => [
                [
                    'text' => 'Com materiais confirmados',
                    'route' => 'schedule.with-confirmed-materials',
                    'can' => 'schedule.confirmed-materials'
                ]
            ]
        ],
        // Surgical Rooms
        [
            'icon' => 'door-closed',
            'text' => 'Salas',
            'can' => 'rooms.manage',
            'submenu' => [
                [
                    'text' => 'Nova sala',
                    'route' => 'rooms.create',
                    'can' => 'rooms.create'
                ],
                [
                    'text'  => 'Listar salas',
                    'route' => 'rooms.index',
                    'can' => 'rooms.index'
                ]
            ]
        ],
        // Surgeons
        [
            'icon' => 'user-md',
            'text' => 'Médicos',
            'can'  => 'surgeons.manage',
            'submenu' => [
                [
                    'text' => 'Novo médico',
                    'route' => 'surgeons.create',
                    'can' => 'surgeons.store',
                ],
                [
                    'text' => 'Ver médicos',
                    'route' => 'surgeons.index',
                    'can' => 'surgeons.index'
                ]
            ]
        ],
        // Procedures
        [
            'icon' => 'procedures',
            'text' => 'Procedimentos',
            'can' => 'procedures.manage',
            'submenu' => [
                [
                    'text' => 'Novo procedimento',
                    'route' => 'procedures.create',
                    'can' => 'procedures.create'
                ],
                [
                    'text' => 'Listar procedimentos',
                    'route' => 'procedures.index',
                    'can' => 'procedures.index'
                ]
            ]
        ],
        // Relatórios
        [
            'icon' => 'print',
            'text' => 'Relatórios',
            'submenu' => [
                [
                    'text' => 'Cirurgias',
                    'route' => 'reports.surgeries'
                ],
                [
                    'text' => 'Procedimentos',
                    'submenu' => [
                        [
                            'text' => 'Tempo médio de duração',
                            'route' => 'reports.procedures.average-duration'
                        ]
                    ]
                ]
            ]
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Choose what filters you want to include for rendering the menu.
    | You can add your own filters to this array after you've created them.
    | You can comment out the GateFilter if you don't want to use Laravel's
    | built in Gate functionality
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Choose which JavaScript plugins should be included. At this moment,
    | only DataTables is supported as a plugin. Set the value to true
    | to include the JavaScript file from a CDN via a script tag.
    |
    */

    'plugins' => [
        'datatables' => true,
        'select2'    => true,
        'chartjs'    => true,
    ],
];
