<?php
return [
    "shopify_api_key"=>env('SHOPIFY_API_KEY', '63f2fa001dd7228268d7c5f920f9b28b'),
    "shopify_api_secret"=>env('SHOPIFY_API_SECRET', '47f72686a3950d8f9bf307f5eea1f071'),
    "scopes"=>env('SHOPIFY_API_SCOPES', 'read_content,read_files,write_files,read_themes,write_themes,read_metaobjects,write_metaobjects,read_script_tags,read_script_tags,read_themes'),
    "app_id"=>env('SHOPIFY_APP_ID', 'msdev2'),
    "webhooks"=>env('SHOPIFY_WEBHOOKS', 'APP_UNINSTALLED,THEMES_PUBLISH,SHOP_UPDATE'),
    'appbridge_enabled' => (bool) env('SHOPIFY_APPBRIDGE_ENABLED', true),
    "appbridge_version"=>env('SHOPIFY_APPBRIDGE_VERSION', '3'),
    "is_embedded_app"=> (bool) env('SHOPIFY_IS_EMBEDDED_APP',true) ?? true,
    "enable_alpinejs"=> (bool) env('SHOPIFY_ENABLE_ALPINEJS',true) ?? true,
    "enable_turbolinks"=> (bool) env('SHOPIFY_ENABLE_TURBOLINKS',true) ?? true,
    "footer"=>env('SHOPIFY_FOOTER', '<p>Copyright &copy; All right reserved.</p>'),
    "test_stores"=>env('SHOPIFY_TEST_STORES',''),
    "shopify_app_url"=>env('SHOPIFY_APP_URL',''),
    'contact_url'=>env('SHOPIFY_CONTACT_URL',''),
    "tawk_url"=> env('TAWK_URL',''),
    "menu"=>[
        'logo'=>[
            'type'=>'url',//image,url,
            'value'=>'https://georedirect.codevibez.com/img/logo.jpg?v=2'
        ],
        'list'=>[
            [
                'label'=> 'Dashboard',
                'destination'=> '/',
                'icon'=>'<i class="icon-home"></i>', //optional
                'position'=>'topbar',//sidebar,topbar*,all,
                'type'=>'vue' //vue,web*,laravel
            ],
            [
                'label'=> 'Plan',
                'destination'=> '/plan',
                'icon'=>'<i class="icon-flag"></i>',
                'position'=>'sidebar'
            ],
            [
                'label'=> 'Help & Support',
                'destination'=> '/help',
                'icon'=>'<i class="icon-social"></i>',
                'position'=>'all'
            ]
        ]
    ],
    "billing" => env('SHOPIFY_BILLING', true),
    "plan"=>[
        [
            'chargeName'=>'STANDARD',
            'interval'=>'EVERY_30_DAYS',//EVERY_30_DAYS|ANNUAL|ONE_TIME
            'amount'=>5.99,
            'currencyCode'=>'USD',
            'credit'=>50,
            'trialDays'=>21,
            'properties'=>[ // for plan desigining
                [
                    'name'=>'Applicable for store on "Basic" Shopify Plan',
                    'help_text'=>'', //optional
                    'value'=>'true', //true=check,false=cross
                ],
                [
                    'name'=>'Automatic or popup based redirection ',
                    'help_text'=>'',
                    'value'=>'true', //true=check,false=cross,string
                ],
                [
                    'name'=>'Country Blocker',
                    'help_text'=>'',
                    'value'=>'true', //true=check,false=cross,string
                ],
                [
                    'name'=>'Email Support',
                    'help_text'=>'',
                    'value'=>'false', //true=check,false=cross,string
                ],
                [
                    'name'=>'Mobile Blocker',
                    'help_text'=>'',
                    'value'=>'false', //true=check,false=cross,string
                ]
            ],
            'feature'=>[ // for develoepr
                // 'plan'=>'basic',
            ]
        ],
        [
            'chargeName'=>'PROFESSIONAL',
            'interval'=>'EVERY_30_DAYS',//EVERY_30_DAYS|ANNUAL|ONE_TIME
            'amount'=>8.99,
            'currencyCode'=>'USD',
            'credit'=>100,
            'trialDays'=>21,
            'properties'=>[
                [
                    'name'=>'Applicable for store on "Shopify" Plan',
                    'help_text'=>'', //optional
                    'value'=>'true', //true=check,false=cross
                ],
                [
                    'name'=>'Automatic or popup based redirection ',
                    'help_text'=>'',
                    'value'=>'true', //true=check,false=cross,string
                ],
                [
                    'name'=>'Country Blocker',
                    'help_text'=>'',
                    'value'=>'true', //true=check,false=cross,string
                ],
                [
                    'name'=>'Email Support',
                    'help_text'=>'',
                    'value'=>'false', //true=check,false=cross,string
                ],
                [
                    'name'=>'Mobile Blocker',
                    'help_text'=>'',
                    'value'=>'false', //true=check,false=cross,string
                ]
            ],
            'feature'=>[ // for develoepr
                // 'plan'=>'shopify',
            ]
        ],
        [
            'chargeName'=>'ADVANCED',
            'interval'=>'EVERY_30_DAYS',//EVERY_30_DAYS|ANNUAL|ONE_TIME
            'amount'=>18.99,
            'currencyCode'=>'USD',
            'credit'=>500,
            'trialDays'=>21,
            'properties'=>[
                [
                    'name'=>'Applicable for store on "Advanced" Plan',
                    'help_text'=>'', //optional
                    'value'=>'true', //true=check,false=cross
                ],
                [
                    'name'=>'Automatic or popup based redirection ',
                    'help_text'=>'',
                    'value'=>'true', //true=check,false=cross,string
                ],
                [
                    'name'=>'Country Blocker',
                    'help_text'=>'',
                    'value'=>'true', //true=check,false=cross,string
                ],
                [
                    'name'=>'Email Support',
                    'help_text'=>'',
                    'value'=>'true', //true=check,false=cross,string
                ],
                [
                    'name'=>'Mobile Blocker',
                    'help_text'=>'',
                    'value'=>'false', //true=check,false=cross,string
                ]
            ],
            'feature'=>[ // for develoepr
                // 'plan'=>'advanced',
            ]
        ],
        [
            'chargeName'=>'PLUS',
            'interval'=>'EVERY_30_DAYS',//EVERY_30_DAYS|ANNUAL|ONE_TIME
            'amount'=>48.99,
            'currencyCode'=>'USD',
            'credit'=>1000,
            'trialDays'=>21,
            'properties'=>[
                [
                    'name'=>'Applicable for store on "Plus" Plan',
                    'help_text'=>'', //optional
                    'value'=>'true', //true=check,false=cross
                ],
                [
                    'name'=>'Automatic or popup based redirection ',
                    'help_text'=>'',
                    'value'=>'true', //true=check,false=cross,string
                ],
                [
                    'name'=>'Country Blocker',
                    'help_text'=>'',
                    'value'=>'true', //true=check,false=cross,string
                ],
                [
                    'name'=>'Email Support',
                    'help_text'=>'',
                    'value'=>'true', //true=check,false=cross,string
                ],
                [
                    'name'=>'Mobile Blocker',
                    'help_text'=>'',
                    'value'=>'true', //true=check,false=cross,string
                ]
            ],
            'feature'=>[ // for develoepr
                // 'plan'=>'shopify_plus',
            ]
        ]
    ]
];