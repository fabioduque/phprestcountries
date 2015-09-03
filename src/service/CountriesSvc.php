<?php 

require_once("src/service/APILoader.php");

class CountriesSvc
{

    private $APILoader = null;

    // Define endpoints
    private $countries_all = "https://restcountries.eu/rest/v1/all";
    private $country_alpha = "https://restcountries.eu/rest/v1/all";
    private $country_name = "https://restcountries.eu/rest/v1/name/";

    // Constructor
    function CountriesSvc()
    {
        $this->APILoader = new APILoader();
    }

    // Actions
    function getAllCountries()
    {        
        
        return json_decode($this->APILoader->CallAPI("GET", $this->countries_all), true);
    }

    function getCountryByAlpha($countryAlpha) {
        return json_decode($this->APILoader->CallAPI("GET", $this->country_alpha . $countryAlpha), true);   
    }

    function getCountryByName($countryName) {
        return json_decode($this->APILoader->CallAPI("GET", $this->country_name . $countryName), true);   
    }
}


?>
