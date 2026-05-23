<?php
/**
 * 実績 SP画像URL 一括設定スクリプト
 * 使い方: https://htmlacheive.com/wp/?works_set_sp_img=run
 * 完了後このファイルを削除してください
 */

if ( ! defined( 'ABSPATH' ) ) {
    $wp_load = dirname( __FILE__ ) . '/../../../wp-load.php';
    if ( file_exists( $wp_load ) ) { require_once $wp_load; }
    else { die( 'WordPress not found.' ); }
}

if ( ! isset( $_GET['works_set_sp_img'] ) || $_GET['works_set_sp_img'] !== 'run' ) return;
if ( ! current_user_can( 'manage_options' ) ) wp_die( '管理者権限が必要です' );

$sp_map = [
    'inohara' => 'https://selfachieve.jp/wp-content/uploads/2025/03/inoharashika_sp.jpg',
    'nadi' => 'https://selfachieve.jp/wp-content/uploads/2023/05/nadi_sp.png',
    'urawa-reds' => 'https://selfachieve.jp/wp-content/uploads/2022/06/season_ticket_sp.jpg',
    'urawa-reds-recruit' => 'https://selfachieve.jp/wp-content/uploads/2022/06/rexclub_sp.jpg',
    'pharmacare' => 'https://selfachieve.jp/wp-content/uploads/2021/09/sp_naturegift.png',
    'tani' => 'https://selfachieve.jp/wp-content/uploads/2021/06/Zimopon-sp.jpg',
    'asahi-drum' => 'https://selfachieve.jp/wp-content/uploads/2020/12/asahidrum-sp.jpg',
    'imu-hotel' => 'https://selfachieve.jp/wp-content/uploads/2020/08/19_sp.jpg',
    'lively-hikari' => 'https://selfachieve.jp/wp-content/uploads/2020/08/18_sp.jpg',
    'raise-tech' => 'https://selfachieve.jp/wp-content/uploads/2020/08/leis-tec-sp.jpg',
    'can-lee' => 'https://selfachieve.jp/wp-content/uploads/2020/01/16_sp.jpg',
    'showa-computer' => 'https://selfachieve.jp/wp-content/uploads/2019/12/15_sp.jpg',
    'fp-innovation' => 'https://selfachieve.jp/wp-content/uploads/2019/10/14_sp.jpg',
    'tanakaya' => 'https://selfachieve.jp/wp-content/uploads/2019/10/13_sp.jpg',
    'ksd' => 'https://selfachieve.jp/wp-content/uploads/2019/06/KSD_sp.png',
    'shin-kansai-seitetsu' => 'https://selfachieve.jp/wp-content/uploads/2019/02/11_sp.jpg',
    'komebukuro' => 'https://selfachieve.jp/wp-content/uploads/2018/10/10_sp.jpg',
    'c-medical' => 'https://selfachieve.jp/wp-content/uploads/2018/04/7_sp.jpg',
    'listentalk' => 'https://selfachieve.jp/wp-content/uploads/2018/03/6_sp.jpg',
    'rockharad' => 'https://selfachieve.jp/wp-content/uploads/2018/03/5_sp.jpg',
    'trademark' => 'https://selfachieve.jp/wp-content/uploads/2018/03/tsuruwaka_sp.png',
    'perpetua' => 'https://selfachieve.jp/wp-content/uploads/2018/03/3_sp.jpg',
    'brain-dental' => 'https://selfachieve.jp/wp-content/uploads/2018/03/2_sp.jpg',
    'shinwa-kogyo' => 'https://selfachieve.jp/wp-content/uploads/2018/02/1_sp.jpg',
];

echo '<html><head><meta charset="UTF-8"><title>SP画像設定</title></head><body>';
echo '<h1>実績 SP画像URL 一括設定</h1><pre>';

$success = 0; $skip = 0; $error = 0;

foreach ( $sp_map as $slug => $sp_url ) {
    $posts = get_posts( [ 'post_type' => 'works', 'name' => $slug, 'post_status' => 'publish', 'numberposts' => 1 ] );
    if ( empty( $posts ) ) { echo "✗ [{$slug}] 投稿が見つかりません\n"; $error++; continue; }
    $post_id = $posts[0]->ID;
    $existing = get_post_meta( $post_id, '_works_sp_img_url', true );
    if ( ! empty( $existing ) ) { echo "✓ [{$slug}] 設定済みスキップ\n"; $skip++; continue; }
    update_post_meta( $post_id, '_works_sp_img_url', $sp_url );
    echo "✓ [{$slug}] 設定完了 → {$sp_url}\n";
    $success++;
}

echo "\n========================================\n";
echo "完了: 成功 {$success} / スキップ {$skip} / エラー {$error}\n";
echo "========================================\n";
echo '</pre><p style="color:green"><strong>✅ 完了！このファイルをサーバーから削除してください。</strong></p></body></html>';
exit;
