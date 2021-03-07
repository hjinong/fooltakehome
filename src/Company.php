<?php
namespace fooltakehome;

class Company{
    use \fooltakehome\helperTrait;

    function __construct(){
        //custom url company
        // http://localhost/fooltakehome/company/?ticker=TSLA
        add_action( 'init', function() {
            add_rewrite_endpoint( 'company', EP_PERMALINK );
        } );
        add_action( 'template_redirect', function() {
            if(preg_match('/\/company\//',$_SERVER['REQUEST_URI'])){
                if ( file_exists( plugin_path. 'templates/template-company.php' ) ) {
                    include plugin_path. 'templates/template-company.php';
                    die;
                }
            }
        } );
    }

    function getProfile($ticker){
        return $this->curl(endpoint_profile.$ticker.'?apikey='.endpoint_apikey);
    }
    function getQuote($ticker){
        return $this->curl(endpoint_quote.$ticker.'?apikey='.endpoint_apikey);
    }
}