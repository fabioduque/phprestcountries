<?php

require_once("src/service/CountriesSvc.php");

class Countries
{
    private $CountriesSvc = null;
    
    function Countries() 
    {
        $this->CountriesSvc = new CountriesSvc();
    }

    function getAllCountries($count, $page)
    {

        // Fetch all countries from the service
        $allCountries = $this->CountriesSvc->getAllCountries();

        // Apply the necessary filters

        // ********************************************************************
        //
        // Explanation about count and pages:
        //  
        //  array_slice ($array, $offset, $length)
        //
        //  # With $count==0 and $page==1
        //    $offset == $count * ( $page - 1 ) == 0 * 0 == 0  
        //    $length == NULL, since $count is 0 (equivalent to take all)
        // 
        //  # With $count==10 and $page==2 (takes 10, skips 10)
        //    $offset == $count * ( $page - 1 ) == 10 * (2-1) == 10 (skips 10)
        //    $length == $count == 10 (takes 10)
        //    
        //
        // ********************************************************************

        $offset = $count * ( $page - 1 );
        $length = ($count == 0) ? NULL : $count;

        return array_slice($allCountries, $offset, $length);

    }

    function getCountryByAlpha($alpha)
    {
        return $this->CountriesSvc->getCountryByAlpha($alpha);
        
    }

    function getCountryByName($name)
    {
        return $this->CountriesSvc->getCountryByName($name);
    }


    
}

?>
