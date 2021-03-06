<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header alignwide">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        <div class="byline">
            <address class="author">By <a rel="author" href="<?php get_author_posts_url(get_the_author_meta('ID'));?>"><?php the_author();?></a></address> 
            on <time pubdate datetime="<?php echo get_the_date( 'Y-m-d' );?>" title="<?php echo get_the_date( 'F j, Y' );?>"><?php echo get_the_date( 'F j, Y' );?></time>
        </div>
    </header>

    <div class="entry-content">
        <?php
        the_content();
        ?>
    </div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->