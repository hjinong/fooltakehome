<?php
defined( 'ABSPATH' ) || exit;
get_header();

/* Start the Loop */
while ( have_posts() ) :
	the_post();
?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <header class="entry-header alignwide">
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            <?php twenty_twenty_one_post_thumbnail(); ?>
        </header>

        <div class="entry-content">
            <?php
            the_content();
            ?>
        </div><!-- .entry-content -->
    </article><!-- #post-<?php the_ID(); ?> -->

<?php
endwhile; // End of the loop.

get_footer();