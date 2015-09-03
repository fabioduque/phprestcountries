<?php 
require 'vendor/autoload.php';
require 'src/RestCountries.php';


$app = new \Slim\Slim();
$app->get('/countries/all/(:count(/:page))', function ($count=0, $page=1) {
    
    // echo "You're trying to fetch " . (($count==0) ? "all" : $count) . " items from page " . $page;

    // Fetch all countries
    $countries = new RestCountries();
    $allCountries = $countries->getAllCountries();

    // Apply the necessary filters

    // *********************************************************************** 
    //
    // Explanation about count and pages, based on a total item count of 123:
    //  
    //  array_slice ($array, $offset, $length)
    //
    //  # $count==0 and $page==1
    //    $offset == $count * ($page-1) == 0 * 0 == 0  
    //    $length == NULL, since $count is 0 == take everything until the end
    // 
    //  # $count==10 and $page==2 (takes 10, skips 10)
    //    $offset == $count * $page-1) == 10 * (2-1) == 10 (skips 10)
    //    $length == $count == 10 (takes 10)
    //    
    //
    // *********************************************************************** 

    $offset = $count * ( $page - 1 );
    $length = ($count == 0) ? NULL : $count;

    // echo "<hr>offset = ".$offset." length = ".$length;

    $allCountries = array_slice($allCountries, $offset, $length);
    
    header("Content-Type: application/json");
    echo json_encode($allCountries);
    exit;
    // var_dump($allCountries);


});
$app->run();















?>
