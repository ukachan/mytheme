<?php get_header(); ?>
<div class="container">
    <div class="contents">
        <?php if(have_posts()):
        the_post(); ?>

        <?php get_template_part( 'gaiyou', 'large' ); ?>

        <?php endif; ?>

        <?php if(have_posts()): while(have_posts()):
        the_post(); ?>

        <?php get_template_part( 'gaiyou', 'medium' ); ?>

        <?php endwhile; endif; ?>
        <div class="pagination pagination-index">
            <?php echo paginate_links( array(
                'type' => 'list',
                'prev_text' => '&laquo;',
                'next_text' => '&raquo;',
                'end_size' => '2',
                'mid_size' => '3'
            ) ); ?>
        </div>
    </div>
    <div class="sub">
    <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>