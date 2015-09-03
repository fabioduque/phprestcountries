<?php 
require 'vendor/autoload.php';
require 'src/controllers/Countries.php';


function send_json($content)
{
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    echo json_encode($content);
    exit;
}

$app = new \Slim\Slim();

$app->get('/countries/all/(:count(/:page))', function ($count=0, $page=1) {
    
    // Fetch all countries
    $Countries = new Countries();
    $countries_all = $Countries->getAllCountries($count, $page);
    send_json($countries_all);

});

$app->get('/countries/alpha/:alpha', function ($alpha) {

    // Fetch country with $alpha code
    
    $Countries = new Countries();
    $country = $Countries->getCountryByAlpha($alpha);
    send_json($country);
});

$app->get('/countries/name/:name', function ($name) {

    // Fetch country with $name
    
    $Countries = new Countries();
    $country = $Countries->getCountryByName($name);
    send_json($country);

});

$app->run();















?>
