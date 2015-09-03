<?php 
require 'vendor/autoload.php';
require 'src/controllers/Countries.php';


$app = new \Slim\Slim();
$app->get('/countries/all/(:count(/:page))', function ($count=0, $page=1) {
    
    // echo "You're trying to fetch " . (($count==0) ? "all" : $count) . " items from page " . $page;

    // Fetch all countries
    $countries = new Countries();
    return $countries->getAllCountries($count, $page);

});
$app->run();















?>
