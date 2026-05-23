<?php
/**
 * AIOSEO設定確認スクリプト
 * 使い方: https://htmlacheive.com/wp/wp-content/themes/selfachieve-theme/check-aioseo-settings.php
 */

// WordPressを読み込む
$wp_load = dirname(__FILE__) . '/../../../wp-load.php';
if (!file_exists($wp_load)) {
    die('wp-load.php not found');
}
require_once($wp_load);

if (!current_user_can('manage_options')) {
    die('管理者権限が必要です');
}

echo '<pre style="font-size:13px;line-height:1.6;">';
echo "=== AIOSEO グローバル設定 ===\n";

// AIOSEOのメインオプション
$aioseo_options = get_option('aioseo_options');
if ($aioseo_options) {
    $opts = json_decode($aioseo_options, true);
    
    // searchAppearance → postTypes
    if (isset($opts['searchAppearance']['postTypes'])) {
        echo "\n--- 投稿タイプ別 検索表示設定 ---\n";
        foreach ($opts['searchAppearance']['postTypes'] as $pt => $settings) {
            $show = isset($settings['show']) ? ($settings['show'] ? 'true' : 'false') : 'N/A';
            $noindex = isset($settings['advanced']['robotsMeta']['noindex']) ? ($settings['advanced']['robotsMeta']['noindex'] ? 'noindex' : 'index') : 'N/A';
            echo "  {$pt}: show={$show}, robots={$noindex}\n";
        }
    }
    
    // searchAppearance → taxonomies
    if (isset($opts['searchAppearance']['taxonomies'])) {
        echo "\n--- タクソノミー別 検索表示設定 ---\n";
        foreach ($opts['searchAppearance']['taxonomies'] as $tax => $settings) {
            $show = isset($settings['show']) ? ($settings['show'] ? 'true' : 'false') : 'N/A';
            echo "  {$tax}: show={$show}\n";
        }
    }
} else {
    echo "aioseo_options が見つかりません\n";
}

// 個別投稿のAIOSEOメタを確認
echo "\n=== 個別投稿のAIOSEO設定 ===\n";
$posts_to_check = [
    ['post_type' => 'column', 'slug' => 'col-seo-basics'],
    ['post_type' => 'works', 'slug' => 'w-sanplaza'],
];

foreach ($posts_to_check as $item) {
    $post = get_page_by_path($item['slug'], OBJECT, $item['post_type']);
    if ($post) {
        $aioseo_meta = get_post_meta($post->ID, '_aioseo_settings', true);
        echo "\n[{$item['post_type']}/{$item['slug']}] ID={$post->ID}\n";
        if ($aioseo_meta) {
            $meta = json_decode($aioseo_meta, true);
            $noindex = isset($meta['robots_noindex']) ? $meta['robots_noindex'] : 'N/A';
            $title = isset($meta['title']) ? $meta['title'] : 'N/A';
            $desc = isset($meta['description']) ? substr($meta['description'], 0, 60) : 'N/A';
            echo "  title: {$title}\n";
            echo "  description: {$desc}\n";
            echo "  robots_noindex: {$noindex}\n";
        } else {
            echo "  _aioseo_settings: なし\n";
        }
    } else {
        echo "\n[{$item['post_type']}/{$item['slug']}]: 投稿が見つかりません\n";
    }
}

echo "\n</pre>";
