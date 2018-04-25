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

        <?php if( is_single() || is_page() ): // 記事の個別ページ用のメタデータ ?>
            <meta name="description" content="<?php echo wp_trim_words( $post->post_content, 100, '･･･' ); ?>">
            <?php if( has_tag() ): ?>
                <?php $tags = get_the_tags();
                $kwds = array();
                foreach($tags as $tag) {
                    $kwds[] = $tag->name;
                } ?>
                <meta name="keywords" content="<?php echo implode( ',', $kwds ); ?>">
                <meta propaty="og:type" content="article">
                <meta propaty="og:title" content="<?php the_title(); ?>">
                <meta propaty="og:url" content="<?php the_permalink(); ?>">
                <meta propaty="og:description" content="<?php echo wp_trim_words( $post->post_content, 100, '･･･' ); ?>">
                <meta propaty="og:image" content="<?php echo mythumb( 'large' ); ?>">
            <?php endif; ?>
        <?php endif; // 記事の個別ページ用のメタデータ[ここまで] ?>

        <?php if( is_home() ): // トップページ用のメタデータ ?>
        <meta name="discription" content="<?php bloginfo( 'description' ); ?>">

        <?php $allcats = get_categories();
        $kwds = array();
        foreach($allcats as $allcat) {
            $kwds[] = $allcat->name;
        } ?>
        <meta name="keywords" content="<?php echo implode( ',', $kwds ); ?>">
        <meta propaty="og:type" content="website">
        <meta propaty="og:title" content="<?php bloginfo( 'name' ); ?>">
        <meta propaty="og:url" content="<?php home_url( '/' ); ?>">
        <meta propaty="og:description" content="<?php echo get_template_directory_uri(); ?>/picnic-top.jpg">
        <?php endif; // トップページ用のメタデータ[ここまで] ?>

        <?php if( is_category() || is_tag() ): // カテゴリーページ用のメタデータ ?>
        <?php if( is_category() ) {
            $termid = $cat;
            $taxname = 'category';
        } elseif( is_tag() ) {
            $termid = $tag_id;
            $taxname = 'post_tag';
        } ?>
        <meta name="description" content="<?php single_term_title(); ?>に関する記事の一覧です。">
        <?php $childcats = get_categories( array( 'child_of' => $termid) );
        $kwds = array();
        $kwds[] = single_term_title('', false);
        foreach($childcats as $childcat) {
            $kwds[] = $childcat->name;
        } ?>
        <meta name="keywords" content="<?php echo implode( ',', $kwds ); ?>">
        <meta propaty="og:type" content="website">
        <meta propaty="og:title" content="<?php single_term_title(); ?>に関する記事｜<?php bloginfo( 'name' ); ?>">
        <meta propaty="og:url" content="<?php echo get_term_link( $termid, $taxname ); ?>">
        <meta propaty="og:description" content="<?php single_term_title(); ?>に関する記事の一覧です。">
        <meta propaty="og:image" content="<?php echo get_template_directory_uri(); ?>/picnic-top.jpg">
        <?php endif; // カテゴリー・タグページ用のメタデータ[ここまで] ?>

        <meta propaty="og:locale" conten="ja_JP">
        <meta name="twitter:site" content="@ukkari_ukachan">
        <meta name="twitter:card" content="summary_large_image">
        <meta propaty="og:site_name" content="<?php bloginfo( 'name' ); ?>">

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
