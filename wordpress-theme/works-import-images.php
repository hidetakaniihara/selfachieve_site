<?php
/**
 * 実績 画像一括インポートスクリプト（バッチ処理版）
 *
 * 使い方:
 *   バッチ1: https://htmlacheive.com/wp/?works_import_images=run&batch=1
 *   バッチ2: https://htmlacheive.com/wp/?works_import_images=run&batch=2
 *   バッチ3: https://htmlacheive.com/wp/?works_import_images=run&batch=3
 *   バッチ4: https://htmlacheive.com/wp/?works_import_images=run&batch=4
 *
 *   完了後、このファイルと works-images/ フォルダを削除してください。
 */

if ( ! defined( 'ABSPATH' ) ) {
    $wp_load = dirname( __FILE__ ) . '/../../../wp-load.php';
    if ( file_exists( $wp_load ) ) {
        require_once $wp_load;
    } else {
        die( 'WordPress not found.' );
    }
}

if ( ! isset( $_GET['works_import_images'] ) || $_GET['works_import_images'] !== 'run' ) {
    return;
}

if ( ! current_user_can( 'manage_options' ) ) {
    wp_die( '管理者権限が必要です。先にWordPress管理画面にログインしてください。' );
}

require_once ABSPATH . 'wp-admin/includes/image.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';

// 全32件のスラッグ→画像ファイル対応
$all_items = [
    [ 'slug' => 'sanplaza',             'img' => 'sanplaza_pc.jpg' ],
    [ 'slug' => 'inohara',              'img' => 'inohara_pc.jpg' ],
    [ 'slug' => 'nadi',                 'img' => 'nadi_pc.png' ],
    [ 'slug' => 'fam',                  'img' => 'fam_pc.jpg' ],
    [ 'slug' => 'urawa-reds',           'img' => 'urawa_season_ticket_pc.jpg' ],
    [ 'slug' => 'urawa-reds-recruit',   'img' => 'urawa_rexclub_pc.jpg' ],
    [ 'slug' => 'akashi-doken',         'img' => 'akashi_doken_pc.png' ],
    [ 'slug' => 'trike',                'img' => 'trike_pc.png' ],
    [ 'slug' => 'pharmacare',           'img' => 'pharmacare_pc.png' ],
    [ 'slug' => 'tani',                 'img' => 'tani_pc.jpg' ],
    [ 'slug' => 'lumiere',              'img' => 'lumiere_pc.jpg' ],
    [ 'slug' => 'asahi-drum',           'img' => 'asahi_drum_pc.jpg' ],
    [ 'slug' => 'fourseasons',          'img' => 'fourseasons_pc.jpg' ],
    [ 'slug' => 'imu-hotel',            'img' => 'imu_hotel_pc.jpg' ],
    [ 'slug' => 'lively-hikari',        'img' => 'lively_hikari_pc.jpg' ],
    [ 'slug' => 'raise-tech',           'img' => 'raise_tech_pc.jpg' ],
    [ 'slug' => 'can-lee',              'img' => 'canlee_pc.jpg' ],
    [ 'slug' => 'showa-computer',       'img' => 'showa_computer_pc.jpg' ],
    [ 'slug' => 'fp-innovation',        'img' => 'fp_innovation_pc.jpg' ],
    [ 'slug' => 'tanakaya',             'img' => 'tanakaya_pc.jpg' ],
    [ 'slug' => 'ksd',                  'img' => 'ksd_pc.jpg' ],
    [ 'slug' => 'shin-kansai-seitetsu', 'img' => 'shin_kansai_seitetsu_pc.jpg' ],
    [ 'slug' => 'komebukuro',           'img' => 'komebukuro_pc.jpg' ],
    [ 'slug' => 'rui-aguri',            'img' => 'rui_aguri_pc.jpg' ],
    [ 'slug' => 'lupo-house',           'img' => 'lupo_house_pc.jpg' ],
    [ 'slug' => 'c-medical',            'img' => 'c_medical_pc.jpg' ],
    [ 'slug' => 'listentalk',           'img' => 'listentalk_pc.jpg' ],
    [ 'slug' => 'rockharad',            'img' => 'rockharad_pc.jpg' ],
    [ 'slug' => 'trademark',            'img' => 'trademark_pc.jpg' ],
    [ 'slug' => 'perpetua',             'img' => 'perpetua_pc.jpg' ],
    [ 'slug' => 'brain-dental',         'img' => 'brain_dental_pc.jpg' ],
    [ 'slug' => 'shinwa-kogyo',         'img' => 'shinwa_kogyo_pc.jpg' ],
];

// バッチ番号（1〜4）で10件ずつ処理
$batch      = isset( $_GET['batch'] ) ? intval( $_GET['batch'] ) : 1;
$per_batch  = 8;
$offset     = ( $batch - 1 ) * $per_batch;
$items      = array_slice( $all_items, $offset, $per_batch );
$total_batches = ceil( count( $all_items ) / $per_batch );

$img_dir = get_template_directory() . '/works-images/';

echo '<html><head><meta charset="UTF-8"><title>実績画像インポート バッチ' . $batch . '</title></head><body>';
echo '<h1>実績 画像インポート — バッチ ' . $batch . ' / ' . $total_batches . '</h1>';
echo '<p>処理件数: ' . count( $items ) . ' 件（' . ( $offset + 1 ) . '〜' . ( $offset + count( $items ) ) . '件目）</p>';
echo '<pre>';

$success = 0;
$skip    = 0;
$error   = 0;

foreach ( $items as $item ) {
    $slug     = $item['slug'];
    $img_file = $item['img'];

    $posts = get_posts( [
        'post_type'   => 'works',
        'name'        => $slug,
        'post_status' => 'publish',
        'numberposts' => 1,
    ] );

    if ( empty( $posts ) ) {
        echo "⚠ [{$slug}] 投稿が見つかりません\n";
        $error++;
        continue;
    }

    $post    = $posts[0];
    $post_id = $post->ID;

    if ( has_post_thumbnail( $post_id ) ) {
        $existing_url = get_the_post_thumbnail_url( $post_id, 'full' );
        update_post_meta( $post_id, '_works_pc_img_url', $existing_url );
        echo "✓ [{$slug}] 設定済みのためスキップ\n";
        $skip++;
        continue;
    }

    $img_path = $img_dir . $img_file;
    if ( ! file_exists( $img_path ) ) {
        echo "✗ [{$slug}] 画像ファイルなし: {$img_file}\n";
        $error++;
        continue;
    }

    $upload_dir = wp_upload_dir();
    $dest_file  = $upload_dir['path'] . '/' . $img_file;

    if ( ! copy( $img_path, $dest_file ) ) {
        echo "✗ [{$slug}] コピー失敗\n";
        $error++;
        continue;
    }

    $filetype = wp_check_filetype( $img_file );
    $attachment = [
        'guid'           => $upload_dir['url'] . '/' . $img_file,
        'post_mime_type' => $filetype['type'],
        'post_title'     => preg_replace( '/\.[^.]+$/', '', $img_file ),
        'post_content'   => '',
        'post_status'    => 'inherit',
    ];

    $attachment_id = wp_insert_attachment( $attachment, $dest_file, $post_id );
    if ( is_wp_error( $attachment_id ) ) {
        echo "✗ [{$slug}] メディア登録失敗\n";
        $error++;
        continue;
    }

    $attach_data = wp_generate_attachment_metadata( $attachment_id, $dest_file );
    wp_update_attachment_metadata( $attachment_id, $attach_data );

    set_post_thumbnail( $post_id, $attachment_id );
    $img_url = wp_get_attachment_url( $attachment_id );
    update_post_meta( $post_id, '_works_pc_img_url', $img_url );

    echo "✓ [{$slug}] 完了 → {$img_url}\n";
    $success++;
}

echo "\n========================================\n";
echo "バッチ {$batch} 完了: 成功 {$success} / スキップ {$skip} / エラー {$error}\n";
echo "========================================\n";
echo '</pre>';

if ( $batch < $total_batches ) {
    $next = $batch + 1;
    $next_url = home_url( "/?works_import_images=run&batch={$next}" );
    echo "<p><strong>次のバッチを実行してください：</strong></p>";
    echo "<p><a href='{$next_url}' style='font-size:18px;padding:10px 20px;background:#0073aa;color:#fff;text-decoration:none;border-radius:4px;'>バッチ {$next} を実行 →</a></p>";
} else {
    echo "<p style='color:green;font-size:18px;'><strong>✅ 全バッチ完了！</strong></p>";
    echo "<p>このファイル（works-import-images.php）と works-images/ フォルダをサーバーから削除してください。</p>";
}

echo '</body></html>';
exit;
