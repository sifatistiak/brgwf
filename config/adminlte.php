<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#61-title
    |
    */

    'title' => 'BRGWF',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#62-favicon
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#63-logo
    |
    */

    'logo' => '<b>BRGWF</b>',
    'logo_img' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'BRGWF',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#64-user-menu
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => true,
    'usermenu_header_class' => 'bg-light',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#71-layout
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => true,
    'layout_fixed_navbar' => true,
    'layout_fixed_footer' => true,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#721-authentication-views-classes
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#722-admin-panel-classes
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-navy elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-light navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#73-sidebar
    |
    */

    'sidebar_mini' => true,
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => true,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 600,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#74-control-sidebar-right-sidebar
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#65-urls
    |
    */

    'use_route_url' => false,

    'dashboard_url' => '/',

    'logout_url' => 'logout',

    'login_url' => 'login',

    'register_url' => 'register',

    'password_reset_url' => 'password/reset',

    'password_email_url' => 'password/email',

    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#92-laravel-mix
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#8-menu-configuration
    |
    */

    'menu' => [
        // [
        //     'text' => 'search',
        // ],

        // ['header' => 'MEMBER'],

        [
            'text'        => 'Member',
            'icon'        => 'far fa-fw fa-map',
            'submenu' => [
                [
                    'text' => 'Member List',
                    'icon' => 'fas fa-fw fa-list',
                    'url'  => 'member',
                ],
                [
                    'text' => 'Add New Member',
                    'icon' => 'fas fa-fw fa-plus',
                    'url'  => 'member/create',
                ],
                [
                    'text' => 'Non Member',
                    'icon' => 'fas fa-fw fa-user-slash',
                    'url'  => 'non-member',
                ],
                [
                    'text' => 'Search Member',
                    'icon' => 'fas fa-fw fa-search',
                    'url'  => 'member-search',
                ],
            ]
        ],

        // ['header' => 'Accounts'],

        [
            'text'        => 'Accounts',
            'icon'        => 'fas fa-fw fa-chart-line',
            'submenu' => [
                [
                    'text' => 'Collection',
                    'icon' => 'fas fa-fw fa-paper-plane',
                    'url'  => 'collection/add',
                ],
                [
                    'text' => 'Income Statement',
                    'icon' => 'fas fa-fw fa-stream',
                    'url'  => 'collection',
                ],
                [
                    'text' => 'Expense',
                    'icon' => 'fab fa-fw fa-centercode',
                    'url'  => 'expense/add',
                ],
                [
                    'text' => 'Expense Statement',
                    'icon' => 'fab fa-fw fa-buffer',
                    'url'  => 'expense',
                ],
            ]
        ],

        // ['header' => 'Training'],

        [
            'text'        => 'Training',
            'icon'        => 'fas fa-fw fa-hand-point-right',
            'submenu' => [
                [
                    'text' => 'Training List',
                    'icon' => 'fas fa-fw fa-list',
                    'url'  => 'training',
                ],
                [
                    'text' => 'Add New Training',
                    'icon' => 'fas fa-fw fa-plus',
                    'url'  => 'training/create',
                ],
                [
                    'text' => 'Trainer',
                    'icon' => 'fas fa-fw fa-user-edit',
                    'url'  => 'trainer',
                ],
                [
                    'text' => 'Training Assign',
                    'icon' => 'fas fa-fw fa-street-view',
                    'url'  => 'training-assign/create',
                ],
            ]
        ],

        // ['header' => 'SMS'],

        [
            'text'        => 'SMS',
            'icon' => 'fas fa-fw fa-envelope',
            'submenu' => [
                [
                    'text' => 'SMS List',
                    'icon' => 'fas fa-fw fa-list',
                    'url'  => 'sms',
                ],
            ]
        ],

        // ['header' => 'MIS Report'],

        [
            'text'        => 'MIS Reports',
            'icon'        => 'fas fa-fw fa-file-alt',
            'submenu' => [
                [
                    'text' => 'Member Info',
                    'icon' => 'fas fa-fw fa-info',
                    'url'  => 'report-member',
                ],
                [
                    'text' => 'Training Info',
                    'icon' => 'fas fa-fw fa-info-circle',
                    'url'  => 'report-training',
                ],
                [
                    'text' => 'Subscription History',
                    'icon' => 'fas fa-fw fa-map',
                    'url'  => 'subscription-history',
                ],
                [
                    'text' => 'Training Wise Member',
                    'icon' => 'fas fa-fw fa-file-pdf',
                    'url'  => 'training-member',
                ],
                [
                    'text' => 'Due Collection',
                    'icon' => 'fas fa-fw fa-table',
                    'url'  => 'due-collection',
                ],
            ]
        ],

        // ['header' => 'Master Setup'],

        [
            'text'        => 'Master Setup',
            'icon'        => 'fas fa-fw fa-cogs',
            'submenu' => [
                [
                    'text' => 'Education',
                    'icon' => 'fas fa-graduation-cap',
                    'url'  => 'education',
                ],
                [
                    'text' => 'Religion',
                    'icon' => 'fas fa-fw fa-heart',
                    'url'  => 'religion',
                ],
                [
                    'text' => 'Department',
                    'icon' => 'fas fa-fw fa-thumbtack',
                    'url'  => 'department',
                ],
                [
                    'text' => 'Designation',
                    'icon' => 'fas fa-fw fa-tag',
                    'url'  => 'designation',
                ],
                [
                    'text' => 'Member Category',
                    'icon' => 'fas fa-fw fa-user',
                    'url'  => 'category',
                ],
                [
                    'text' => 'Union',
                    'icon' => 'fas fa-fw fa-th-large',
                    'submenu'  => [
                        [
                            "text" => 'Union List',
                            'icon' => 'fas fa-fw fa-list',
                            'url'  => 'union'
                        ],
                        [
                            "text" => 'Add New Union',
                            'icon' => 'fas fa-fw fa-plus',
                            'url'  => 'union/create'
                        ]
                    ],
                ],
                [
                    'text' => 'Factory',
                    'icon' => 'fas fa-fw fa-industry',
                    'submenu'  => [
                        [
                            "text" => 'Factory List',
                            'icon' => 'fas fa-fw fa-list',
                            'url'  => 'factory'
                        ],
                        [
                            "text" => 'Add New Factory',
                            'icon' => 'fas fa-fw fa-plus',
                            'url'  => 'factory/create'
                        ],
                        [
                            "text" => 'Factory Category',
                            'icon' => 'fas fa-fw fa-circle',
                            'url'  => 'factory-category'
                        ]
                    ],
                ],
            ]
        ],
/*

        ['header' => 'account_settings'],
        [
            'text' => 'profile',
            'url'  => 'admin/settings',
            'icon' => 'fas fa-fw fa-user',
        ],
        [
            'text' => 'change_password',
            'url'  => 'admin/settings',
            'icon' => 'fas fa-fw fa-lock',
        ],
        [
            'text'    => 'multilevel',
            'icon'    => 'fas fa-fw fa-share',
            'submenu' => [
                [
                    'text' => 'level_one',
                    'url'  => '#',
                ],
                [
                    'text'    => 'level_one',
                    'url'     => '#',
                    'submenu' => [
                        [
                            'text' => 'level_two',
                            'url'  => '#',
                        ],
                        [
                            'text'    => 'level_two',
                            'url'     => '#',
                            'submenu' => [
                                [
                                    'text' => 'level_three',
                                    'url'  => '#',
                                ],
                                [
                                    'text' => 'level_three',
                                    'url'  => '#',
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'text' => 'level_one',
                    'url'  => '#',
                ],
            ],
        ],
        ['header' => 'labels'],
        [
            'text'       => 'important',
            'icon_color' => 'red',
            'url'        => '#',
        ],
        [
            'text'       => 'warning',
            'icon_color' => 'yellow',
            'url'        => '#',
        ],
        [
            'text'       => 'information',
            'icon_color' => 'cyan',
            'url'        => '#',
        ],
        */
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#83-custom-menu-filters
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#91-plugins
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '//cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#93-livewire
    */

    'livewire' => false,
];
