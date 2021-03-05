<?php
namespace fooltakehome;

trait helperTrait{
    public function curl($url){
        // create curl resource
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, $url);

        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);

        // close curl resource to free up system resources
        curl_close($ch);  
        return $output;       
    }  
    function getProfile($ticker){
        return $this->curl(endpoint_profile.$ticker.'?apikey='.endpoint_apikey);
    }
    function getQuote($ticker){
        return $this->curl(endpoint_quote.$ticker.'?apikey='.endpoint_apikey);
    }
}
?>