<?php
namespace fooltakehome;

class Recommendation{
    function __construct(){
        add_action( 'init', array($this,'register_post_type'));
        //custom url recommendation archive page
        // /recommendations/archive/
        add_action( 'init', function() {
            add_rewrite_endpoint( 'archive', EP_PERMALINK );
        } );
        add_action( 'template_redirect', function() {
            if(preg_match('/recommendations\/archive\//',$_SERVER['REQUEST_URI'])){
                if ( file_exists( plugin_path. 'templates/template-article.php' ) ) {
                    include plugin_path. 'templates/template-recommendation-archive.php';
                    die;
                }
            }
        } );
    }
    function register_post_type(){
        // set up labels
        $labels = array(
            'name' => 'Recommendations',
            'singular_name' => 'Recommendation',
            'add_new' => 'Add New Recommendation',
            'add_new_item' => 'Add New Recommendation',
            'edit_item' => 'Edit Recommendation',
            'new_item' => 'New Recommendation',
            'all_items' => 'All Recommendations',
            'view_item' => 'View Recommendation',
            'search_items' => 'Search Recommendations',
            'not_found' =>  'No Recommendations Found',
            'not_found_in_trash' => 'No Recommendations found in Trash', 
            'parent_item_colon' => '',
            'menu_name' => 'Recommendations',
        );
        //register post type
        register_post_type( 'recommendation', array(
            'labels' => $labels,
            'has_archive' => true,
                'public' => true,
            'supports' => array( 'title', 'editor', 'excerpt', 'custom-fields', 'thumbnail','page-attributes' ),
            'taxonomies' => array( 'ticker' ),	
            'exclude_from_search' => false,
            'capability_type' => 'post',
            'rewrite' => array( 'slug' => 'recommendations' ),
            )
        );
    }
    function archivePage(){

    }
}