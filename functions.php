<?php

// trueでyoutubeのキャッシュをクリア関数を走らせる
$cache_clear = false;

// 概要（抜粋）の文字数
function my_length($length) {
    return 50;
}
add_filter('excerpt_mblength', 'my_length');

// 概要（抜粋）の省略記号
function my_more($more) {
    return '...';
}
add_filter('excerpt_more', 'my_more');

// コンテンツの最大幅
if ( !isset( $content_width ) ) {
    $content_width = 747;
}

// youtubeのビデオ：<div>でマークアップ
function ytwrapper($return, $data, $url) {
    if ($data->provider_name == 'YouTube') {
        return '<div class="ytvideo">'.$return.'</div>';
    } else {
        return $return;
    }
}
add_filter('oembed_dataparse', 'ytwrapper', 10, 3);

// youtubeのビデオ：キャッシュをクリア
if ($cache_clear) {
    function clear_ytwrapper($post_id) {
        global $wp_embed;
        $wp_embed->delete_oembed_caches($post_id);
    }
    add_action('pre_post_update', 'clear_ytwrapper');
}

// アイキャッチ画像
add_theme_support( 'post-thumbnails' );

// 管理者上部メニュー非表示
show_admin_bar( false ) ;

// 編集画面の設定
function editor_setting($init) {
	$init[ 'block_formats' ] = 'Paragraph=p;Heading 2=h2;Heading 3=h3; Heading 4=h4; Heading 5=h5; Heading 6=h6;Preformatted=pre';

	$style_formats = array(
		array(
			'title' => '補足情報',
			'block' => 'div',
			'classes' => 'point',
			'wrapper' => true
		),
		array(
			'title' => '注意書き',
			'block' => 'div',
			'classes' => 'attention',
			'wrapper' => true
		),
		array(
			'title' => 'ハイライト',
			'inline' => 'span',
			'classes' => 'highlight'
		),
		array(
			'title' => '強調',
			'inline' => 'span',
			'classes' => 'power'
		)
	);

	$init['style_formats'] = json_encode( $style_formats );
	return $init;
}
add_filter( 'tiny_mce_before_init', 'editor_setting' );

// スタイルメニューを有効化
function add_stylemenu( $buttons ) {
	array_splice( $buttons, 1, 0, 'styleselect' );
	return $buttons;
}
add_filter( 'mce_buttons_2', 'add_stylemenu' );

// エディタースタイルシート
add_editor_style( get_template_directory_uri() . '/editor-style.css?ver=' . date('U') );
add_editor_style( '//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );