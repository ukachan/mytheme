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
