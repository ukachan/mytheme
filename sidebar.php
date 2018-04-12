<?php
$myposts = get_posts( array(
    'post_type' => 'post',
    'posts_per_page' => '5'
) );
if( $myposts ): ?>
<aside class="mymenu">
<h2>新着記事</h2>
<ul>
    <?php foreach($myposts as $post):
    setup_postdata($post); ?>
    <li><a href="<?php the_permalink(); ?>">
    <?php the_title(); ?>
    </a></li>
    <?php endforeach; ?>
</ul>
</aside>
<?php wp_reset_postdata();
endif; ?>