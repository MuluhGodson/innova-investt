<?php
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => "Innova Investments", // set false to total remove
            'titleBefore'  => false, // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => 'The best investment platform in Cameroon. Orbit Innova Investments offers you a platform where you can find projects to invest in with maximum profits.', // set false to total remove
            'separator'    => ' - ',
            'keywords'     => ['innova', 'orbit', 'orbit innova', 'innova jobs', 'online courses', 'investments', 'profit', 'online investments', 'retirement plan', '401K', 'orbit investments', 'innova investments', '237', 'cameroon', 'africa', 'investors', 'startups', 'start up', 'crowdfund', 'seed fund', 'invest', 'professional', 'shares', 'buy shares', 'company', 'company shares'],
            'canonical'    => false, // Set null for using Url::current(), set false to total remove
            'robots'       => false, // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'Innova Investments', // set false to total remove
            'description'  => 'The best investment platform in Cameroon. Orbit Innova Investments offers you a platform where you can find projects to invest in with maximum profits.', // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => 'website',
            'site_name'   => 'Innova Investments',
            'images'      => ['https://invest.innova.cm/innova_logo_dark.png'],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            'card'        => 'summary',
            'site'        => '@orbitinnova',
            'title' => 'Innova Investments',
            'description' => 'The best investment platform in Cameroon. Orbit Innova Investments offers you a platform where you can find projects to invest in with maximum profits.',
            'images'      => 'https://invest.innova.cm/innova_logo_dark.png',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => 'Innova Investments', // set false to total remove
            'description' => 'The best investment platform in Cameroon. Orbit Innova Investments offers you a platform where you can find projects to invest in with maximum profits.', // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => ['https://invest.innova.cm/innova_logo_dark.png'],
        ],
    ],
];
