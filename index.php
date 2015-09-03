<?php 
require 'vendor/autoload.php';
require 'src/controllers/Countries.php';


$app = new \Slim\Slim();

$app->get('/countries/all/(:count(/:page))', function ($count=0, $page=1) {
    
    // Fetch all countries
    $countries = new Countries();
    return $countries->getAllCountries($count, $page);

});

$app->get('/countries/alpha/:alpha', function ($alpha) {

    // Fetch country with $alpha code
    
    $countries = new Countries();
    return $countries->getCountryByAlpha($alpha);

});

$app->get('/countries/name/:name', function ($name) {

    // Fetch country with $name
    
    $countries = new Countries();
    return $countries->getCountryByName($name);

});

$app->run();















?>
