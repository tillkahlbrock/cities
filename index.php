<?php

require_once __DIR__.'/vendor/autoload.php';

$citiesOfCountries = array(
    'de' => array(
        'berlin',
        'hamburg',
        'munich',
        'frankfurt',
        'bochum',
        'cologne',
        'kiel',
        'lübeck',
        'bielefeld',
        'dortmund',
        'leverkusen',
        'ulm',
        'tübingen'
    ),
    'fr' => array(
        'paris',
        'marseille',
        'strasbourg'
    ),
    'ch' => array(
        'bern',
        'zurich',
        'geneva'
    ),
    'uk' => array(
        'london',
        'manchester',
        'liverpool'
    )

);



$app = new Silex\Application();

$app->get('/{country}/cities', function($country) use($app, $citiesOfCountries) {
    $cities = array();
    $country = $app->escape($country);

    if (array_key_exists($country, $citiesOfCountries)) {
        $cities = $citiesOfCountries[$country];
    }

    return json_encode($cities);
});

$app->run();
