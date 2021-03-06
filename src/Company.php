<?php
namespace fooltakehome;

class Company{
    use \fooltakehome\helperTrait;
    function getProfile($ticker){
        return $this->curl(endpoint_profile.$ticker.'?apikey='.endpoint_apikey);
    }
    function getQuote($ticker){
        return $this->curl(endpoint_quote.$ticker.'?apikey='.endpoint_apikey);
    }
}