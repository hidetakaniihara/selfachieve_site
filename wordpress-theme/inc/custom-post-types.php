<?php
/**
 * カスタム投稿タイプの定義
 */

function selfachieve_register_post_types() {
    // 制作実績 (our_works)
    register_post_type( 'our_works', array(
        'labels' => array(
            'name'          => '制作実績',
            'singular_name' => '制作実績',
            'all_items'     => '制作実績一覧',
            'add_new'       => '新規追加',
            'add_new_item'  => '新規制作実績を追加',
            'edit_item'     => '制作実績を編集',
            'new_item'      => '新規制作実績',
            'view_item'     => '制作実績を表示',
            'search_items'  => '制作実績を検索',
            'not_found'     => '制作実績が見つかりませんでした。',
            'not_found_in_trash' => 'ゴミ箱内に制作実績が見つかりませんでした。',
        ),
        'public'        => true,
        'has_archive'   => true,
        'menu_position' => 5,
        'menu_icon'     => 'dashicons-portfolio',
        'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'show_in_rest'  => true,
        'rewrite'       => array( 'slug' => 'our_works', 'with_front' => false ),
    ) );

    // お客様の声 (voice)
    register_post_type( 'voice', array(
        'labels' => array(
            'name'          => 'お客様の声',
            'singular_name' => 'お客様の声',
            'all_items'     => 'お客様の声一覧',
            'add_new'       => '新規追加',
            'add_new_item'  => '新規お客様の声を追加',
            'edit_item'     => 'お客様の声を編集',
            'new_item'      => '新規お客様の声',
            'view_item'     => 'お客様の声を表示',
            'search_items'  => 'お客様の声を検索',
            'not_found'     => 'お客様の声が見つかりませんでした。',
            'not_found_in_trash' => 'ゴミ箱内にお客様の声が見つかりませんでした。',
        ),
        'public'        => true,
        'has_archive'   => true,
        'menu_position' => 6,
        'menu_icon'     => 'dashicons-format-chat',
        'supports'      => array( 'title', 'editor', 'thumbnail' ),
        'show_in_rest'  => true,
        'rewrite'       => array( 'slug' => 'voice', 'with_front' => false ),
    ) );

    // お知らせ (news)
    register_post_type( 'news', array(
        'labels' => array(
            'name'          => 'お知らせ',
            'singular_name' => 'お知らせ',
            'all_items'     => 'お知らせ一覧',
            'add_new'       => '新規追加',
            'add_new_item'  => '新規お知らせを追加',
            'edit_item'     => 'お知らせを編集',
            'new_item'      => '新規お知らせ',
            'view_item'     => 'お知らせを表示',
            'search_items'  => 'お知らせを検索',
            'not_found'     => 'お知らせが見つかりませんでした。',
            'not_found_in_trash' => 'ゴミ箱内にお知らせが見つかりませんでした。',
        ),
        'public'        => true,
        'has_archive'   => true,
        'menu_position' => 7,
        'menu_icon'     => 'dashicons-megaphone',
        'supports'      => array( 'title', 'editor', 'thumbnail' ),
        'show_in_rest'  => true,
        'rewrite'       => array( 'slug' => 'news', 'with_front' => false ),
    ) );
}
add_action( 'init', 'selfachieve_register_post_types' );

// カスタムタクソノミーの定義
function selfachieve_register_taxonomies() {
    // 制作実績カテゴリ
    register_taxonomy( 'works_category', 'our_works', array(
        'labels' => array(
            'name'          => '制作実績カテゴリ',
            'singular_name' => '制作実績カテゴリ',
            'search_items'  => 'カテゴリを検索',
            'all_items'     => 'すべてのカテゴリ',
            'parent_item'   => '親カテゴリ',
            'parent_item_colon' => '親カテゴリ:',
            'edit_item'     => 'カテゴリを編集',
            'update_item'   => 'カテゴリを更新',
            'add_new_item'  => '新規カテゴリを追加',
            'new_item_name' => '新規カテゴリ名',
            'menu_name'     => 'カテゴリ',
        ),
        'hierarchical'  => true,
        'show_ui'       => true,
        'show_admin_column' => true,
        'show_in_rest'  => true,
        'rewrite'       => array( 'slug' => 'works_category' ),
    ) );
}
add_action( 'init', 'selfachieve_register_taxonomies' );
