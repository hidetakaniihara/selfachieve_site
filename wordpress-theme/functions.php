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

// 静的HTMLファイルを削除してWordPressが処理できるようにする
function selfachieve_delete_static_index_files() {
    $dirs_to_clean = [
        ABSPATH . 'company',
    ];
    foreach ($dirs_to_clean as $dir) {
        if (is_dir($dir)) {
            // ディレクトリ内のファイルを削除
            $files = glob($dir . '/*');
            if ($files) {
                foreach ($files as $file) {
                    if (is_file($file)) {
                        unlink($file);
                    }
                }
            }
            // 空のディレクトリを削除
            @rmdir($dir);
        }
    }
}
add_action('init', 'selfachieve_delete_static_index_files');

// home_urlデバッグ用エンドポイント
add_action('rest_api_init', function() {
    register_rest_route('debug/v1', '/home_url', array(
        'methods' => 'GET',
        'callback' => function() {
            return array(
                'home_url' => home_url('/'),
                'site_url' => site_url('/'),
                'WP_HOME' => defined('WP_HOME') ? WP_HOME : 'not defined',
                'WP_SITEURL' => defined('WP_SITEURL') ? WP_SITEURL : 'not defined',
            );
        },
        'permission_callback' => '__return_true',
    ));
});
// header.phpのパスを確認するデバッグ
add_filter('get_header', function($name) {
    $template_dir = get_template_directory();
    $header_file = $template_dir . '/header' . ($name ? '-' . $name : '') . '.php';
    error_log('HEADER_FILE_PATH: ' . $header_file . ' exists: ' . (file_exists($header_file) ? 'YES' : 'NO'));
    // header.phpのMD5を確認
    if (file_exists($header_file)) {
        error_log('HEADER_MD5: ' . md5_file($header_file));
    }
    return $name;
});
// テンプレートディレクトリをREST APIで確認
add_action('rest_api_init', function() {
    register_rest_route('debug/v1', '/template_dir', array(
        'methods' => 'GET',
        'callback' => function() {
            $template_dir = get_template_directory();
            $header_file = $template_dir . '/header.php';
            return array(
                'template_dir' => $template_dir,
                'header_file' => $header_file,
                'header_exists' => file_exists($header_file),
                'header_md5' => file_exists($header_file) ? md5_file($header_file) : 'not found',
                'header_size' => file_exists($header_file) ? filesize($header_file) : 0,
                'header_first_100' => file_exists($header_file) ? substr(file_get_contents($header_file), 0, 100) : 'not found',
            );
        },
        'permission_callback' => '__return_true',
    ));
});
// 固定ページのテンプレート設定を確認
add_action('rest_api_init', function() {
    register_rest_route('debug/v1', '/pages', array(
        'methods' => 'GET',
        'callback' => function() {
            $pages = get_posts(array('post_type' => 'page', 'posts_per_page' => 20, 'post_status' => array('publish', 'draft')));
            $result = array();
            foreach ($pages as $page) {
                $template = get_post_meta($page->ID, '_wp_page_template', true);
                $result[] = array(
                    'id' => $page->ID,
                    'slug' => $page->post_name,
                    'title' => $page->post_title,
                    'template' => $template,
                    'status' => $page->post_status,
                );
            }
            return $result;
        },
        'permission_callback' => '__return_true',
    ));
});
// companyフォルダの存在確認
add_action('rest_api_init', function() {
    register_rest_route('debug/v1', '/company_folder', array(
        'methods' => 'GET',
        'callback' => function() {
            $public_html = ABSPATH;
            $company_dir = $public_html . 'company';
            $company_index = $public_html . 'company/index.html';
            return array(
                'abspath' => $public_html,
                'company_dir_exists' => is_dir($company_dir),
                'company_index_exists' => file_exists($company_index),
                'company_dir_contents' => is_dir($company_dir) ? scandir($company_dir) : array(),
            );
        },
        'permission_callback' => '__return_true',
    ));
});