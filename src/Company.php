<?php
namespace fooltakehome;

class Company{
    use \fooltakehome\helperTrait;
    public function getTickerInfo($ticker){
        var_dump($this->getProfile($ticker));
        var_dump($this->getQuote($ticker));
    }
}