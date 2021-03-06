<?php
/**
 * Plugin Name: Fool Takehome
 * Description: Functionality needed for the Fool takehome task
 * Version: 0.0.1
 * Author: Jin Song
 */

 require_once('autoload.php');

 define('plugin_path',plugin_dir_path(__FILE__));
 //ticker api endpoint quote example: https://financialmodelingprep.com/api/v3/quote/AAPL?apikey=demo
 //ticker api endpoint profile example: https://financialmodelingprep.com/api/v3/profile/AAPL?apikey=demo
 define('endpoint_quote','https://financialmodelingprep.com/api/v3/quote/');
 define('endpoint_profile','https://financialmodelingprep.com/api/v3/profile/');
 define('endpoint_apikey','a8bffaf7671b3fbd13cb9ad83909bf4d ');

 class fooltakehome{
    public $songList;
    public $h5pfooltakehome;

    public function __construct(){
        add_action('plugins_loaded',array($this,'enqueu'));
        add_action('plugins_loaded',array($this,'wpstuff'));
        add_action('plugins_loaded',array($this,'load'));
    }
    public function enqueu(){
        wp_enqueue_script(
            'fooltakehome-main-js', 
            plugins_url( 'js/main.js',  __FILE__  ), 
        );    
        wp_enqueue_style(
            'fooltakehome-main-css', // Handle.
            plugins_url( 'css/style.css',  __FILE__ ),
        );       
        if(is_admin()){
            wp_enqueue_script(
                'fooltakehome-admin-js', 
                plugins_url( 'js/admin.js',  __FILE__  ), 
                array(), 
                time(), 
                true 
            );              
        }
    }
    //WP related setups, including assigning template per post type
    public function wpstuff(){
        $wpstuff=new fooltakehome\Wpstuff;
    }
    //load classes
    public function load(){
        $this->article=new fooltakehome\Article;
        $this->recommendation=new fooltakehome\Recommendation;
        $this->company=new fooltakehome\Company;

        //admin area only
        if(is_admin()){
            //TODO: incorporate the equivalent of default "Add New Ticker" capability
            if ( !class_exists( 'WDS_Taxonomy_Radio' ) ) {
               $this->OneTickerPerContent = new fooltakehome\OneTickerPerContent( 'ticker' );
            }
        }
    }
}

$fooltakehome=new fooltakehome();

