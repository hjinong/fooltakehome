<?php
//$ticker can come over from the calling template
if(isset($ticker)&&!empty($ticker)){
    $tax=array(
        array (
            'taxonomy' => 'ticker',
            'field' => 'slug',
            'terms' => $ticker,
        )
    );
}else{
    $tax=array();
}
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$query = new WP_Query(array(
    'post_type' => 'article',
    'post_status' => 'publish',
    'orderby'   => 'date', 
    'order'     => 'DESC',
    'tax_query' => $tax,
    'posts_per_page' => 10,
    'paged' => $paged,
));
?>
<h1>Other Coverage</h1>
<ul class="articles archive">
<?php
while ($query->have_posts()) {
    $query->the_post();
    $output='<li><a href="'.get_the_permalink().'"  target="_blank" rel="noopener">'.get_the_title().'</a>';
    if(isset($ticker)&&!empty($ticker)){
        $output.=" ($ticker)";
    }
    else{
        $terms=get_the_terms(get_the_ID(),'ticker');
        if(sizeof($terms)){
            $ticker=$terms[0]->name;
            $output.=" ($ticker)";
        }
    }
    $output.='</li>';
    echo $output;
}
?>
</ul>
<?php
if(isset($pagination)&&$pagination){
?>
<div class="pagination">
    <?php 
    $total_pages = $query->max_num_pages;

    if ($total_pages > 1){

        $current_page = max(1, get_query_var('paged'));

        echo paginate_links(array(
            'base' => preg_replace('/\?.*/', '/', get_pagenum_link(1)) . '%_%',
            'current' => max(1, get_query_var('paged')),
            'format' => 'page/%#%',
            'total' => $query->max_num_pages,
            'add_args' => array(
                'ticker' => $ticker
            )
        ));
    }
    ?>
</div>
<?php
}
wp_reset_query();