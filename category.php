<?php  
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
?>
<?php get_header(); ?>
<main>
<div class="container">
    <section class="col-lg-9 col-md-9 col-sm-8 col-xs-12 content">
        <div id="blog-list">
 
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <article onclick="document.location='<?php echo get_the_permalink(); ?>';return false;"  class="post" style="background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), full); ?>)" id="post_<?php echo get_the_id(); ?>">
                <h3><a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a></h3>
                <p><small><?php echo get_the_date().", by ".get_the_author(); ?></small></p>
            </article>

            <?php endwhile; ?>

            <?php
            if (function_exists(custom_pagination)) {
                custom_pagination($blog->max_num_pages,"",$paged);
            }
            ?>

            <?php else : ?>

            <p class="text-center">Sorry. No posts were found yet. :(</p>

            <?php endif; ?>

        </div>
    </section>
    <?php get_sidebar('blog'); ?>
</div>
</main>
<?php get_footer(); ?>