<?php
defined( 'ABSPATH' ) || exit;
get_header();

$Company=new \fooltakehome\Company('TSLA');
$Company->getTickerInfo('TSLA');
var_dump($Company->getProfile('TSLA'));
var_dump($Company->getQuote('TSLA'));
/* Start the Loop */
while ( have_posts() ) :
	the_post();

	get_template_part( 'template-parts/content/content-single' );

endwhile; // End of the loop.

get_footer();