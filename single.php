<?php get_header(); ?>

<div class="sub-header">
    <div class="bread">
        <ol>
            <li><a href="<?php echo home_url(); ?>">
            <i class="fa fa-home"></i><span>TOP</span>
            </a></li>
            <li>
            <?php if( has_category() ): ?>
            <?php $postcat=get_the_category(); ?>
            <?php echo get_category_parents( $postcat[0], true, '</li><li>' ); ?>
            <?php endif; ?>
            <a><?php the_title(); ?></a>
            </li>
        </ol>
    </div>

<div class="container">
    <div class="contents">
    <?php if(have_posts()): while(have_posts()): the_post(); ?>
    <article <?php post_class( 'kiji' ); ?>>
    <h1><?php the_title(); ?></h1>

    <div class="kiji-tag">
    <?php the_tags( '<ul><li>', '</li><li>', '</li></ul>' ); ?>
    </div>

    <div class="kiji-date">
    <i class="fas fa-edit"></i>
    <time
        datetime="<?php echo get_the_date( 'Y-m-d' ); ?>">
        投稿：<?php echo get_the_date( 'Y-m-d' ); ?>
    </time>

    <?php if( get_the_modified_date( 'Ymd' ) > get_the_date( 'Ymd' ) ): ?>
    |
    <time
        datetime="<?php echo get_the_date( 'Y-m-d' ); ?>">
        更新：<?php echo get_the_date( 'Y-m-d'); ?>
    </time>
    <?php endif; ?>
    </div>

    <?php if( has_post_thumbnail() ): ?>
    <div class="catch">
    <?php the_post_thumbnail( 'large' ); ?>
    </div>
    <?php endif; ?>

    <?php the_content(); ?>
    </article>
    <?php endwhile; endif; ?>
    </div>

    <div class="sub">
    <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>