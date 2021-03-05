<?php
namespace fooltakehome;

class TickerInfo{
    use \fooltakehome\helperTrait;

    function __construct($ticker){
        echo $ticker;exit();
    }
}