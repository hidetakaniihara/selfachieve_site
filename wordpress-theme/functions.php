<?php
/**
 * Self Achieve Theme Functions
 */

// テーマのセットアップ
function selfachieve_setup() {
    // タイトルタグのサポート
    add_theme_support( 'title-tag' );
    // アイキャッチ画像のサポート
    add_theme_support( 'post-thumbnails' );
    // HTML5のサポート
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ) );
}
add_action( 'after_setup_theme', 'selfachieve_setup' );

// スクリプトとスタイルの読み込み
function selfachieve_scripts() {
    // メインスタイルシート
    wp_enqueue_style( 'selfachieve-style', get_template_directory_uri() . '/assets/style.css', array(), '1.0.0' );
    // メインスクリプト
    wp_enqueue_script( 'selfachieve-script', get_template_directory_uri() . '/assets/common.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'selfachieve_scripts' );

// カスタム投稿タイプとACFフィールドの読み込み
require_once get_template_directory() . '/inc/custom-post-types.php';
require_once get_template_directory() . '/inc/acf-fields.php';

// ページネーション関数
function selfachieve_pagination( $pages = '', $range = 2 ) {
    $showitems = ( $range * 2 ) + 1;
    global $paged;
    if ( empty( $paged ) ) $paged = 1;
    if ( $pages == '' ) {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if ( ! $pages ) {
            $pages = 1;
        }
    }
    if ( 1 != $pages ) {
        echo '<nav class="pagination" aria-label="ページネーション">';
        if ( $paged > 1 ) {
            echo '<a href="' . get_pagenum_link( $paged - 1 ) . '" class="page-btn prev-btn" aria-label="前のページへ"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg></a>';
        }
        for ( $i = 1; $i <= $pages; $i++ ) {
            if ( 1 != $pages && ( ! ( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $showitems ) ) {
                echo ( $paged == $i ) ? '<span class="page-btn current" aria-current="page">' . $i . '</span>' : '<a href="' . get_pagenum_link( $i ) . '" class="page-btn">' . $i . '</a>';
            }
        }
        if ( $paged < $pages ) {
            echo '<a href="' . get_pagenum_link( $paged + 1 ) . '" class="page-btn next-btn" aria-label="次のページへ"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg></a>';
        }
        echo '</nav>';
    }
}

// Contact Form 7 の不要なpタグを削除
add_filter('wpcf7_autop_or_not', '__return_false');
