<!DOCTYPE html>
<html lang="ja">
    <head prefix="og: http://ogp.me/ns#">
        <meta charset="UTF-8">
        <title>
            <?php wp_title( '|', true, 'right' ); ?>
            <?php bloginfo( 'name' ); ?>
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link rel="stylesheet" href="//maxcdn.boostrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
        <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>?ver=<?php echo date('U'); ?>">

		<?php if( has_post_thumbnail() ) ?>
			<?php $postthumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' ); ?>
			<meta propaty="og:image" content="<?php echo get_thumb[0]; ?>">
		<?php else: ?>
			<meta propaty="og:image" content="<?php echo get_template_directory_uri(); ?>">
		<?php endif; ?>
		<?php if( is_single() ): // 記事の個別ページ用のメタデータ ?>
        <meta propaty="og:type" content="article">
        <meta propaty="og:title" content="<?php the_title(); ?>">
        <meta propaty="og:url" content="<?php the_permaling(); ?>">
        <meta propaty="og:description" content="<?php echo wp_trim_words( $post->post_content, 100, '･･･' ); ?>">
        <?php endif; // 記事の個別ページ用のメタデータ[ここまで] ?>
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
    <header>
        <div class="header-inner">
            <div class="site">
                <h1><a href="<?php echo home_url(); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/picnic.png"
                alt="<?php bloginfo( 'name' ); ?>" width="112" height="25"></a></h1>
            </div>
        </div>
    </header>