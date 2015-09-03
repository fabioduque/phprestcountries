<?php 

require_once("src/apiutil/APILoader.php");

class RestCountries
{

    

    function getAllCountries()
    {

        $APILoader = new APILoader();

        $service_url = "https://restcountries.eu/rest/v1/all";
        // $service_url = "http://www.google.pt/?gfe_rd=cr&amp;ei=EhToVZbLMo-s8wfxva3YDg";
        return json_decode($APILoader->CallAPI("GET", $service_url), true);
        
    }
    
}


?>
