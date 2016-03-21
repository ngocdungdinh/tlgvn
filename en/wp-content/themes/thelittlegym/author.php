<?php
/*
this is User
*/
get_header();
?>
<div class="blog-content">
<?php if(have_posts()) :  the_post(); ?>
    <div class="tzuser-author">
        <div class="tzuser-author-info">
            <h1><?php the_author_meta( 'display_name' ); ?></h1>
            <p class="tzuser-description"><?php the_author_meta('description'); ?></p>
        </div><!--end class singke-author-info-->
        <div class="tzuser-author-img">
            <?php echo get_avatar( get_the_author_meta('ID'),100 ); ?>
        </div><!--end class single-author-img-->
        <div class="clearfix"></div>
    </div><!--end class tzuser-author-->
    <?php endif; ?>


    <div class="TzPagination">
        <?php
        if(function_exists('wp_pagenavi')){
            wp_pagenavi();
        } else {
            plazart_content_nav('bottom-nav');
        }
        ?>
    </div>
    </div><!--end blog-content-->

<?php get_footer(); ?>