<?php
namespace fooltakehome;

class Wpstuff{
    function __construct(){
        add_action( 'init', array($this,'register_taxonomy'));
        add_filter('single_template', array($this,'custom_template'));
    }   
   function register_taxonomy() {
     // Add new "Tickers" taxonomy to Posts 
     register_taxonomy('ticker', array('article','recommendation'), array(
       // Hierarchical taxonomy (like categories)
       'hierarchical' => true,
       // This array of options controls the labels displayed in the WordPress Admin UI
       'labels' => array(
         'name' => _x( 'Tickers', 'taxonomy general name' ),
         'singular_name' => _x( 'Ticker', 'taxonomy singular name' ),
         'search_items' =>  __( 'Search Tickers' ),
         'all_items' => __( 'All Tickers' ),
         'parent_item' => __( 'Parent Ticker' ),
         'parent_item_colon' => __( 'Parent Ticker:' ),
         'edit_item' => __( 'Edit Ticker' ),
         'update_item' => __( 'Update Ticker' ),
         'add_new_item' => __( 'Add New Ticker' ),
         'new_item_name' => __( 'New Ticker Name' ),
         'menu_name' => __( 'Tickers' ),
       ),
       // Control the slugs used for this taxonomy
       'rewrite' => array(
         'slug' => 'tickers', // This controls the base slug that will display before each term
         'with_front' => false, // Don't display the category base before "/tickers/"
         'hierarchical' => true // This will allow URL's like "/tickers/boston/cambridge/"
       ),
       'capabilities'=>array('manage_terms'=>'edit_posts',
        'edit_terms'=> 'edit_posts',
        'delete_terms'=> 'edit_posts',
        'assign_terms' => 'edit_posts')
     ));
   }
   
   function custom_template($single) {
       global $post; 
       /* Checks for single template by post type */
       if ( $post->post_type == 'article' ) {
           if ( file_exists( plugin_path. 'templates/template-article.php' ) ) {
                return plugin_path. 'templates/template-article.php';
           }
       }
       else if ( $post->post_type == 'recommendation' ) {
            if ( file_exists( plugin_path. 'templates/template-recommendation.php' ) ) {
             return plugin_path. 'templates/template-recommendation.php';
        }
        }
        if ( $post->post_type == 'company' ) {
            if ( file_exists( plugin_path. 'templates/template-company.php' ) ) {
                return plugin_path. 'templates/template-company.php';
            }
        }

       return $single;

   }
}