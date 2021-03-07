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
$query = new WP_Query(array(
    'post_type' => $postTypeSingular,
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby'   => 'date', 
    'order'     => 'DESC',
    'tax_query' => $tax
));
?>
<h1><?php echo $postTypePlular;?></h1>
<ul class="<?php echo $postTypePlular;?> archive">
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
wp_reset_query();