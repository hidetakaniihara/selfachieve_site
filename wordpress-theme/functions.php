<?php
/**
 * selfachieve テーマ functions.php
 */

// テーマサポート設定
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ] );

// CSS / JS の読み込み
function selfachieve_enqueue_assets() {
    $ver = '1.0.0';
    // Google Fonts
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700;900&display=swap',
        [],
        null
    );
    // メインCSS
    wp_enqueue_style(
        'selfachieve-style',
        get_template_directory_uri() . '/assets/style.css',
        [ 'google-fonts' ],
        $ver
    );
    // Swiper（works/sanplaza専用。全ページで読み込むが軽量なため許容）
    wp_enqueue_style(
        'swiper',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
        [],
        '11'
    );
    // メインJS
    wp_enqueue_script(
        'selfachieve-common',
        get_template_directory_uri() . '/assets/common.js',
        [],
        $ver,
        true
    );
}
add_action( 'wp_enqueue_scripts', 'selfachieve_enqueue_assets' );

// 著作権年の動的出力
function selfachieve_copyright_year() {
    return date( 'Y' );
}

// カスタム投稿タイプ：ニュース
function selfachieve_register_post_types() {
    register_post_type( 'news', [
        'labels' => [
            'name'          => 'お知らせ',
            'singular_name' => 'お知らせ',
            'add_new_item'  => '新しいお知らせを追加',
            'edit_item'     => 'お知らせを編集',
        ],
        'public'        => true,
        'has_archive'   => true,
        'rewrite'       => [ 'slug' => 'news' ],
        'supports'      => [ 'title', 'editor', 'thumbnail', 'excerpt' ],
        'show_in_rest'  => true,
        'menu_icon'     => 'dashicons-megaphone',
    ] );

    register_post_type( 'column', [
        'labels' => [
            'name'          => 'コラム',
            'singular_name' => 'コラム',
            'add_new_item'  => '新しいコラムを追加',
            'edit_item'     => 'コラムを編集',
        ],
        'public'        => true,
        'has_archive'   => false,
        'rewrite'       => [ 'slug' => 'column-post' ],  // 固定ページ /columns/ との競合を避けるため変更
        'supports'      => [ 'title', 'editor', 'thumbnail', 'excerpt' ],
        'show_in_rest'  => true,
        'menu_icon'     => 'dashicons-edit',
    ] );

    register_post_type( 'voice', [
        'labels' => [
            'name'          => 'お客さまの声',
            'singular_name' => 'お客さまの声',
            'add_new_item'  => '新しいお客さまの声を追加',
            'edit_item'     => 'お客さまの声を編集',
        ],
        'public'        => true,
        'has_archive'   => false,
        'rewrite'       => [ 'slug' => 'voice-post' ],  // 固定ページ /voice/ との競合を避けるため変更
        'supports'      => [ 'title', 'editor', 'thumbnail', 'excerpt' ],
        'show_in_rest'  => true,
        'menu_icon'     => 'dashicons-format-quote',
    ] );

    register_post_type( 'works', [
        'labels' => [
            'name'          => '実績',
            'singular_name' => '実績',
            'add_new_item'  => '新しい実績を追加',
            'edit_item'     => '実績を編集',
        ],
        'public'        => true,
        'has_archive'   => false,
        'rewrite'       => [ 'slug' => 'works-post' ],  // 固定ページ /works/ との競合を避けるため変更
        'supports'      => [ 'title', 'editor', 'thumbnail', 'excerpt' ],
        'show_in_rest'  => true,
        'menu_icon'     => 'dashicons-portfolio',
    ] );
}
add_action( 'init', 'selfachieve_register_post_types' );

// body_class フィルター：各ページに page-xxx クラスを付与
function selfachieve_body_classes( $classes ) {
    if ( is_front_page() ) {
        $classes[] = 'page-top';
    } elseif ( is_page() ) {
        $slug = get_post_field( 'post_name', get_the_ID() );
        if ( $slug ) {
            $classes[] = 'page-' . $slug;
        }
    } elseif ( is_singular( 'news' ) ) {
        $classes[] = 'page-news-single';
    } elseif ( is_post_type_archive( 'news' ) ) {
        $classes[] = 'page-news';
    } elseif ( is_singular( 'column' ) ) {
        $classes[] = 'page-column-single';
    } elseif ( is_post_type_archive( 'column' ) ) {
        $classes[] = 'page-columns';
    } elseif ( is_singular( 'voice' ) ) {
        $classes[] = 'page-voice-single';
    } elseif ( is_post_type_archive( 'voice' ) ) {
        $classes[] = 'page-voice';
    } elseif ( is_singular( 'works' ) ) {
        $classes[] = 'page-works-single';
    } elseif ( is_post_type_archive( 'works' ) ) {
        $classes[] = 'page-works';
    }
    return $classes;
}
add_filter( 'body_class', 'selfachieve_body_classes' );

// nginx環境でAuthorizationヘッダーをWordPressに転送する
// エックスサーバーのnginxはAuthorizationヘッダーを直接転送しないため、
// REDIRECT_HTTP_AUTHORIZATION から HTTP_AUTHORIZATION にコピーする
if ( ! isset( $_SERVER['HTTP_AUTHORIZATION'] ) ) {
    if ( isset( $_SERVER['REDIRECT_HTTP_AUTHORIZATION'] ) ) {
        $_SERVER['HTTP_AUTHORIZATION'] = $_SERVER['REDIRECT_HTTP_AUTHORIZATION'];
    }
}
