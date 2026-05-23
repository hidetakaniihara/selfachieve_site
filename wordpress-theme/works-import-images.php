<?php
/**
 * 実績 画像一括インポートスクリプト
 *
 * 使い方:
 *   1. このファイルをテーマフォルダにアップロード
 *   2. 画像ファイルを /public_html/wp/wp-content/themes/selfachieve-theme/works-images/ にアップロード
 *   3. ブラウザで https://htmlacheive.com/wp/?works_import_images=run にアクセス
 *   4. 完了後、このファイルと works-images/ フォルダを削除
 *
 * セキュリティ: クエリパラメータ works_import_images=run でのみ実行
 */

// WordPressが読み込まれていない場合は終了
if ( ! defined( 'ABSPATH' ) ) {
    // WordPressのルートから直接呼ばれた場合の対応
    $wp_load = dirname( __FILE__ ) . '/../../../wp-load.php';
    if ( file_exists( $wp_load ) ) {
        require_once $wp_load;
    } else {
        die( 'WordPress not found.' );
    }
}

// クエリパラメータチェック
if ( ! isset( $_GET['works_import_images'] ) || $_GET['works_import_images'] !== 'run' ) {
    return;
}

// 管理者権限チェック（セキュリティ）
if ( ! current_user_can( 'manage_options' ) ) {
    wp_die( '管理者権限が必要です。先にWordPress管理画面にログインしてください。' );
}

// WordPress メディア関連ライブラリ読み込み
require_once ABSPATH . 'wp-admin/includes/image.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/media.php';

// スラッグ → 画像ファイル名 の対応マップ
// 静的HTMLの works_data.json から生成
$slug_to_img = [
    'sanplaza'             => 'sanplaza_pc.jpg',
    'inohara'              => 'inohara_pc.jpg',
    'nadi'                 => 'nadi_pc.png',
    'fam'                  => 'fam_pc.jpg',
    'urawa-reds'           => 'urawa_season_ticket_pc.jpg',
    'urawa-reds-recruit'   => 'urawa_rexclub_pc.jpg',
    'akashi-doken'         => 'akashi_doken_pc.png',
    'trike'                => 'trike_pc.png',
    'pharmacare'           => 'pharmacare_pc.png',
    'tani'                 => 'tani_pc.jpg',
    'lumiere'              => 'lumiere_pc.jpg',
    'asahi-drum'           => 'asahi_drum_pc.jpg',
    'fourseasons'          => 'fourseasons_pc.jpg',
    'imu-hotel'            => 'imu_hotel_pc.jpg',
    'lively-hikari'        => 'lively_hikari_pc.jpg',
    'raise-tech'           => 'raise_tech_pc.jpg',
    'can-lee'              => 'canlee_pc.jpg',
    'showa-computer'       => 'showa_computer_pc.jpg',
    'fp-innovation'        => 'fp_innovation_pc.jpg',
    'tanakaya'             => 'tanakaya_pc.jpg',
    'ksd'                  => 'ksd_pc.jpg',
    'shin-kansai-seitetsu' => 'shin_kansai_seitetsu_pc.jpg',
    'komebukuro'           => 'komebukuro_pc.jpg',
    'rui-aguri'            => 'rui_aguri_pc.jpg',
    'lupo-house'           => 'lupo_house_pc.jpg',
    'c-medical'            => 'c_medical_pc.jpg',
    'listentalk'           => 'listentalk_pc.jpg',
    'rockharad'            => 'rockharad_pc.jpg',
    'trademark'            => 'trademark_pc.jpg',
    'perpetua'             => 'perpetua_pc.jpg',
    'brain-dental'         => 'brain_dental_pc.jpg',
    'shinwa-kogyo'         => 'shinwa_kogyo_pc.jpg',
];

// 画像フォルダのパス（このスクリプトと同じフォルダ内の works-images/）
$img_dir = get_template_directory() . '/works-images/';

echo '<html><head><meta charset="UTF-8"><title>実績画像インポート</title></head><body>';
echo '<h1>実績 画像一括インポート</h1>';
echo '<pre>';

$success = 0;
$skip    = 0;
$error   = 0;

foreach ( $slug_to_img as $slug => $img_file ) {

    // 投稿を取得
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

    // 既にアイキャッチが設定済みならスキップ
    if ( has_post_thumbnail( $post_id ) ) {
        $existing_url = get_the_post_thumbnail_url( $post_id, 'full' );
        update_post_meta( $post_id, '_works_pc_img_url', $existing_url );
        echo "✓ [{$slug}] アイキャッチ設定済み → スキップ\n";
        $skip++;
        continue;
    }

    // 画像ファイルの存在確認
    $img_path = $img_dir . $img_file;
    if ( ! file_exists( $img_path ) ) {
        echo "✗ [{$slug}] 画像ファイルが見つかりません: {$img_file}\n";
        $error++;
        continue;
    }

    // メディアライブラリに登録
    $upload_dir = wp_upload_dir();
    $dest_file  = $upload_dir['path'] . '/' . $img_file;

    // 同名ファイルが既にアップロード済みか確認
    $existing_attachment = get_posts( [
        'post_type'   => 'attachment',
        'post_status' => 'inherit',
        'meta_key'    => '_wp_attached_file',
        'meta_value'  => date( 'Y/m/' ) . $img_file,
        'numberposts' => 1,
    ] );

    if ( ! empty( $existing_attachment ) ) {
        $attachment_id = $existing_attachment[0]->ID;
        echo "✓ [{$slug}] 既存メディアを使用 (ID:{$attachment_id})\n";
    } else {
        // ファイルをアップロードディレクトリにコピー
        if ( ! copy( $img_path, $dest_file ) ) {
            echo "✗ [{$slug}] ファイルコピー失敗: {$img_file}\n";
            $error++;
            continue;
        }

        // MIMEタイプ取得
        $filetype = wp_check_filetype( $img_file );

        // 添付ファイルデータ
        $attachment = [
            'guid'           => $upload_dir['url'] . '/' . $img_file,
            'post_mime_type' => $filetype['type'],
            'post_title'     => preg_replace( '/\.[^.]+$/', '', $img_file ),
            'post_content'   => '',
            'post_status'    => 'inherit',
        ];

        // メディアライブラリに挿入
        $attachment_id = wp_insert_attachment( $attachment, $dest_file, $post_id );
        if ( is_wp_error( $attachment_id ) ) {
            echo "✗ [{$slug}] メディア登録失敗: " . $attachment_id->get_error_message() . "\n";
            $error++;
            continue;
        }

        // メタデータ生成（サムネイル等）
        $attach_data = wp_generate_attachment_metadata( $attachment_id, $dest_file );
        wp_update_attachment_metadata( $attachment_id, $attach_data );

        echo "✓ [{$slug}] メディア登録完了 (ID:{$attachment_id}) → {$img_file}\n";
    }

    // アイキャッチ画像に設定
    set_post_thumbnail( $post_id, $attachment_id );

    // カスタムフィールドにも画像URLを保存
    $img_url = wp_get_attachment_url( $attachment_id );
    update_post_meta( $post_id, '_works_pc_img_url', $img_url );

    echo "  → アイキャッチ設定完了: {$img_url}\n";
    $success++;
}

echo "\n";
echo "========================================\n";
echo "完了: 成功 {$success} 件 / スキップ {$skip} 件 / エラー {$error} 件\n";
echo "========================================\n";
echo '</pre>';
echo '<p><strong>完了後、このファイル（works-import-images.php）と works-images/ フォルダをサーバーから削除してください。</strong></p>';
echo '</body></html>';
exit;
