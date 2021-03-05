<?php

return [

    'admin_url' => env('ADMIN_URL', 'http://server3.rvtechnologies.in/which-vocation/Amrik-which-vocation-admin/public/'),
    'website_url' => env('WEBSITE_URL', 'https://server3.rvtechnologies.in/which-vocation/website/Amrik-which-vocation-web/public/'),
    'email_verify_url' => env('EMAIL_VERIFY_URL', 'http://192.168.1.65/which-vocation-web/public/'),
    'default_avatar' => env('DEFAULT_AVATAR', 'http://server3.rvtechnologies.in/which-vocation/Amrik-which-vocation-admin/public/images/avatar.png'),
    'from_email' => env('FROM_EMAIL', 'admin@whichvocation.com'),

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/6.-Basic-Configuration
    |
    */

    'whichvocation' => 'Whichvocation',
    'set_password' => 'Whichvocation Recruiter Approved | Set Password',
    'title_prefix' => '',
    'title_postfix' => '',

    'title' => 'Which Vocation',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/6.-Basic-Configuration
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
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/6.-Basic-Configuration
    |
    */

    'logo' => '<b></b>',
    'logo_img' => 'images/logo.svg',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'WhichVocation',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/6.-Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
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
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/7.-Layout-and-Styling-Configuration
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
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => true,
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/7.-Layout-and-Styling-Configuration
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
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/6.-Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'admin_panel/dashboard',
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
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/9.-Other-Configuration
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
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/8.-Menu-Configuration
    |
    */

    'menu' => [
        /* [
            'text'   => 'search',
            'search' => true,
            'topnav' => true,
        ], */
        [
            'text' => 'dashboard',
            'url'  => 'admin_panel/dashboard',
            'icon' => 'fas fa-fw fa-tachometer-alt',
        ],
        /* ['header' => 'profile'],
        [
            'text' => 'profile',
            'url'  => 'admin_panel/admin_profile',
            'icon' => 'fas fa-fw fa-user',
            'active' => ['admin_panel/admin_profile*'],
        ], */
        ['header' => 'management'],
        [
            'key' => 'admin_customers_management',
            'text' => 'customers_management',
            'icon' => 'fas fa-fw fa-building',
            'active' => ['admin_panel/customers*'],
            'submenu' => [
                [
                    'text' => 'pending',
                    'icon' => 'fas fa-fw fa-exclamation-circle',
                    'url'  => 'admin_panel/customers/pending',
                    'active' => ['admin_panel/customers/pending*', 'admin_panel/customers/add*'],
                ],
                [
                    'text' => 'Whitelisted',
                    'icon' => 'fas fa-fw fa-check-circle',
                    'url'  => 'admin_panel/customers/whitelisted',
                    'active' => ['admin_panel/customers/whitelisted*'],
                ],
                [
                    'text' => 'rejected',
                    'icon' => 'fas fa-fw fa-times-circle',
                    'url'  => 'admin_panel/customers/rejected',
                    'active' => ['admin_panel/customers/rejected*'],
                ],
            ],
        ],
        [
            'key' => 'admin_users_management',
            'text' => 'users_management',
            'icon' => 'fas fa-fw fa-users',
            'active' => ['admin_panel/users*'],
            'submenu' => [
                [
                    'text' => 'jobseekers',
                    'icon' => 'fas fa-fw fa-briefcase',
                    'url'  => 'admin_panel/users/jobseekers/list',
                    'active' => ['admin_panel/users/jobseekers*'],
                ],
                [
                    'text' => 'recruiters',
                    'icon' => 'fas fa-fw fa-user-tie',
                    'url'  => 'admin_panel/users/recruiters/list',
                    'active' => ['admin_panel/users/recruiters*'],
                ],
                [
                    'text' => 'admins',
                    'icon' => 'fas fa-fw fa-universal-access',
                    'url'  => 'admin_panel/users/admins/list',
                    'active' => ['admin_panel/users/admins*'],
                ],
            ],
        ],
        [
            'text' => 'jobs_management',
            'icon' => 'fas fa-fw fa-briefcase',
            'url'  => '#',
            'submenu' => [
                [
                    'text' => 'published_jobs',
                    'icon' => 'fas fa-fw fa-list',
                    'url'  => 'admin_panel/jobs/list',
                    'active' => ['admin_panel/jobs/list/*', 'admin_panel/jobs/view/*', 'admin_panel/jobs/edit/*'],
                ],
                [
                    'text' => 'jobs_history',
                    'icon' => 'fas fa-fw fa-map-pin',
                    'url'  => 'admin_panel/jobs/history',
                    'active' => ['admin_panel/jobs/history/*', 'admin_panel/jobs/view_job_history/*'],
                ],
            ],
        ],
        [
            'text' => 'credit_management',
            'icon' => 'fas fa-fw fa-credit-card',
            'url'  => '#',
            'submenu' => [
                [
                    'text' => 'company_credits',
                    'icon' => 'fas fa-fw fa-coins',
                    'url'  => 'admin_panel/credits/list',
                    'active' => ['admin_panel/credits/*'],
                ],
                [
                    'text' => 'credits_history',
                    'icon' => 'fas fa-fw fa-money-check-alt',
                    'url'  => 'admin_panel/credits_history/list',
                    'active' => ['admin_panel/credits_history*'],
                ],
                [
                    'text' => 'payment_transactions',
                    'icon' => 'fab fa-fw fa-cc-stripe',
                    'url'  => 'admin_panel/payment_transactions/list',
                    'active' => ['admin_panel/payment_transactions*'],
                ],
            ],
        ],
        [
            'text' => 'tickets_management',
            'icon' => 'fas fa-ticket-alt',
            'url'  => '#',
            'active' => ['admin_panel/tickets*'],
            'submenu' => [[
                'text' => 'tickets',
                'icon' => 'fas fa-ticket-alt',
                'url'  => 'admin_panel/tickets/list',
            ]]
        ],
        [
            'text' => 'misc_data_management',
            'icon' => 'fas fa-fw fa-cogs',
            'url'  => '#',
            'submenu' => [
                [
                    'text' => 'job_industries',
                    'icon' => 'fas fa-fw fa-industry',
                    'url'  => 'admin_panel/misc/job_industries/list',
                    'active' => ['admin_panel/misc/job_industries*'],
                ],
                [
                    'text' => 'job_functions',
                    'icon' => 'fas fa-fw fa-tasks',
                    'url'  => 'admin_panel/misc/job_functions/list',
                    'active' => ['admin_panel/misc/job_functions*'],
                ],
                [
                    'text' => 'job_locations',
                    'icon' => 'fas fa-fw fa-map-marker',
                    'url'  => 'admin_panel/misc/job_locations/list',
                    'active' => ['admin_panel/misc/job_locations*'],
                ],
                [
                    'text' => 'skills',
                    'icon' => 'fas fa-fw fa-brain',
                    'url'  => 'admin_panel/misc/skills/list',
                    'active' => ['admin_panel/misc/skills*'],
                ],
            ],
        ],
        [
            'key' => 'admin_recylce_bin',
            'text' => 'recylce_bin',
            'icon' => 'far fa-trash-alt',
            'url'  => '#',
            'active' => ['admin_panel/recycle_bin*'],
            'submenu' => [
                [
                    'text' => 'jobseekers',
                    'icon' => 'fas fa-fw fa-briefcase',
                    'url'  => 'admin_panel/recycle_bin/jobseekers/deleted',
                ],
                [
                    'text' => 'recruiters',
                    'icon' => 'fas fa-fw fa-user-tie',
                    'url'  => 'admin_panel/recycle_bin/recruiters/deleted',
                ],
                [
                    'text' => 'admins',
                    'icon' => 'fas fa-fw fa-universal-access',
                    'url'  => 'admin_panel/recycle_bin/admins/deleted',
                ],
                [
                    'text' => 'customers',
                    'icon' => 'fas fa-fw fa-building',
                    'url'  => 'admin_panel/recycle_bin/customers/deleted',
                ],
                [
                    'text' => 'jobs',
                    'icon' => 'fas fa-fw fa-briefcase',
                    'url'  => 'admin_panel/recycle_bin/jobs/deleted',
                ],
                [
                    'text' => 'job_industries',
                    'icon' => 'fas fa-fw fa-industry',
                    'url'  => 'admin_panel/recycle_bin/job_industries/deleted',
                ],
                [
                    'text' => 'job_functions',
                    'icon' => 'fas fa-fw fa-tasks',
                    'url'  => 'admin_panel/recycle_bin/job_functions/deleted',
                ],
                [
                    'text' => 'job_locations',
                    'icon' => 'fas fa-fw fa-map-marker',
                    'url'  => 'admin_panel/recycle_bin/job_locations/deleted',
                ],
                [
                    'text' => 'skills',
                    'icon' => 'fas fa-fw fa-brain',
                    'url'  => 'admin_panel/recycle_bin/skills/deleted',
                ],
            ],
        ],
        /* [
            'text' => 'content_management',
            'icon' => 'fas fa-fw fa-edit',
            'url'  => '#',
            'submenu' => [
                [
                    'text' => 'website',
                    'icon' => 'fas fa-fw fa-laptop',
                    'url'  => 'admin_panel/pages/website',
                ],
                [
                    'text' => 'mobile',
                    'icon' => 'fas fa-fw fa-mobile',
                    'url'  => 'admin_panel/pages/mobile',
                ],
            ],
        ],
        [
            'text' => 'access_control',
            'icon'    => 'fas fa-fw fa-cogs',
            'url'  => '#',
            'submenu' => [
                [
                    'text' => 'roles',
                    'icon'    => 'fas fa-fw fa-user',
                    'url'  => 'admin_panel/roles_list',
                ]
            ],
        ],
        [
            'text' => 'logout',
            'icon'    => 'fas fa-fw fa-sign-out-alt',
            'url'  => '#'
        ], */
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/8.-Menu-Configuration
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
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/9.-Other-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
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
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
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
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-WhichVocation/wiki/9.-Other-Configuration
    */

    'livewire' => false,
];
