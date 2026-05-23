<?php
/**
 * お知らせ記事 一括インポートスクリプト
 * 使い方: https://htmlacheive.com/wp/?news_import=run
 * 完了後このファイルをサーバーから削除してください
 */

if ( ! defined( 'ABSPATH' ) ) {
    $wp_load = dirname( __FILE__ ) . '/../../../wp-load.php';
    if ( file_exists( $wp_load ) ) { require_once $wp_load; }
    else { die( 'WordPress not found.' ); }
}

if ( ! isset( $_GET['news_import'] ) || $_GET['news_import'] !== 'run' ) return;
if ( ! current_user_can( 'manage_options' ) ) wp_die( '管理者権限が必要です' );

echo '<html><head><meta charset="UTF-8"><title>お知らせ インポート</title></head><body>';
echo '<h1>お知らせ 一括インポート</h1><pre>';

// ─────────────────────────────────────────
// インポートデータ
// ─────────────────────────────────────────
$news_items = [
    [
        'title'       => 'オフィス移転のお知らせ',
        'slug'        => 'office-relocation-2025',
        'date'        => '2025-07-01 09:00:00',
        'category'    => 'お知らせ',
        'content'     => '<p>平素より格別のご愛顧を賜り、誠にありがとうございます。</p>
<p>このたび、当社は下記の通りオフィスを移転いたしましたのでご案内申し上げます。</p>
<h2>新オフィス所在地</h2>
<div class="note">
<strong>住所：</strong>〒650-0034 兵庫県神戸市中央区久元町（詳細はお問い合わせください）<br>
<strong>移転日：</strong>2025年7月1日（火）より業務開始
</div>
<h2>電話番号・連絡先について</h2>
<p>電話番号およびメールアドレスに変更はございません。従来通りご利用ください。</p>
<h2>ご不便をおかけいたします</h2>
<p>移転にともない、一時的にご不便をおかけする場合がございますが、何卒ご了承くださいますようお願い申し上げます。今後とも変わらぬご支援のほど、よろしくお願い申し上げます。</p>',
        'meta_title'  => 'オフィス移転のお知らせ | セルフアチーブ',
        'meta_desc'   => '株式会社セルフアチーブは2025年7月1日よりオフィスを移転いたしました。新住所・連絡先についてご案内します。',
    ],
    [
        'title'       => 'サービス料金改定のお知らせ（2025年11月以降）',
        'slug'        => 'price-revision-2025-11',
        'date'        => '2025-10-01 09:00:00',
        'category'    => 'お知らせ',
        'content'     => '<p>平素より格別のご愛顧を賜り、誠にありがとうございます。</p>
<p>2025年11月以降のサービス料金改定についてお知らせいたします。</p>
<h2>改定の背景</h2>
<p>当社では、より質の高いサービスを提供するために、スタッフの専門性向上やツール・システムの改善を継続的に行ってまいります。近年のコスト上昇を考慮し、サービス品質の維持・向上に必要な投資を行うため、一部サービスの料金を改定させていただくことになりました。</p>
<h2>改定内容</h2>
<div class="note">
<strong>改定日：</strong>2025年11月1日（土）以降の新規お申し込み分より適用<br>
<strong>対象：</strong>一部サービスプラン（詳細は個別にご案内いたします）
</div>
<p>なお、改定前にご契約いただいたお客様には、引き続き改定前の料金を適用いたします。</p>
<h2>お問い合わせについて</h2>
<p>料金改定に関するご質問・ご不明な点は、お気軽にお問い合わせフォームよりご連絡ください。引き続き、お客様のビジネス成長に貢献できるよう尽力してまいります。</p>',
        'meta_title'  => 'サービス料金改定のお知らせ（2025年11月以降）| セルフアチーブ',
        'meta_desc'   => '2025年11月1日以降の新規お申し込み分より、一部サービスの料金を改定いたします。詳細についてご案内します。',
    ],
    [
        'title'       => '年末年始の休業のお知らせ',
        'slug'        => 'year-end-holiday-2025',
        'date'        => '2025-12-01 09:00:00',
        'category'    => 'お知らせ',
        'content'     => '<p>平素より格別のご愛顧を賜り、誠にありがとうございます。</p>
<p>誠に勝手ながら、下記の期間を年末年始休業とさせていただきます。</p>
<h2>年末年始休業期間</h2>
<div class="note">
<strong>休業期間：</strong>2025年12月27日（土）〜2026年1月9日（金）<br>
<strong>営業再開：</strong>2026年1月10日（土）より通常営業
</div>
<h2>休業期間中のお問い合わせについて</h2>
<p>休業期間中にいただいたお問い合わせにつきましては、2026年1月10日（土）以降に順次ご対応させていただきます。</p>
<p>お急ぎのご用件につきましては、メールフォームよりお問い合わせいただきますようお願い申し上げます。</p>
<h2>ご不便をおかけいたします</h2>
<p>お客様にはご不便をおかけいたしますが、何卒ご了承くださいますようお願い申し上げます。</p>
<p>本年も格別のご支援を賜り、誠にありがとうございました。来年も変わらぬご愛顧のほど、よろしくお願い申し上げます。</p>',
        'meta_title'  => '年末年始の休業のお知らせ | セルフアチーブ',
        'meta_desc'   => '誠に勝手ながら、2025年12月27日（土）〜2026年1月9日（金）を年末年始休業とさせていただきます。',
    ],
    [
        'title'       => '2026年の営業開始について',
        'slug'        => 'business-start-2026',
        'date'        => '2026-01-10 09:00:00',
        'category'    => 'お知らせ',
        'content'     => '<p>平素より格別のご愛顧を賜り、誠にありがとうございます。</p>
<p>2026年の営業開始日についてお知らせいたします。</p>
<h2>2026年 営業開始日</h2>
<p>2026年1月10日（土）より通常営業を開始いたします。</p>
<div class="note">
<strong>営業時間：</strong>平日 9:00〜19:00<br>
<strong>定休日：</strong>土・日・祝日
</div>
<h2>年末年始休業期間</h2>
<p>2025年12月27日（土）〜2026年1月9日（金）を年末年始休業とさせていただきました。</p>
<p>休業期間中にいただいたお問い合わせにつきましては、1月10日（土）以降に順次ご対応させていただきます。</p>
<h2>ご不便をおかけいたしました</h2>
<p>年末年始の休業期間中はご不便をおかけいたしましたことをお詫び申し上げます。本年も変わらぬご支援のほど、よろしくお願い申し上げます。</p>
<p>引き続き、お客様のWEB集客・デジタルマーケティングのお役に立てるよう、スタッフ一同精進してまいります。どうぞよろしくお願いいたします。</p>',
        'meta_title'  => '2026年の営業開始について | セルフアチーブ',
        'meta_desc'   => '2026年1月10日（土）より通常営業を開始いたします。年末年始休業中はご不便をおかけいたしました。',
    ],
];

// ─────────────────────────────────────────
// インポート処理
// ─────────────────────────────────────────
$success = 0;
$skip    = 0;
$error   = 0;

foreach ( $news_items as $item ) {

    echo "\n--- {$item['title']} ---\n";

    // 重複チェック（同スラッグが既存なら skip）
    $existing = get_page_by_path( $item['slug'], OBJECT, 'news' );
    if ( $existing ) {
        echo "  ⏭ スキップ（既存: ID={$existing->ID}）\n";
        $skip++;
        continue;
    }

    // 投稿データ
    $post_data = [
        'post_title'    => $item['title'],
        'post_name'     => $item['slug'],
        'post_content'  => $item['content'],
        'post_status'   => 'publish',
        'post_type'     => 'news',
        'post_date'     => $item['date'],
        'post_date_gmt' => get_gmt_from_date( $item['date'] ),
    ];

    $post_id = wp_insert_post( $post_data, true );

    if ( is_wp_error( $post_id ) ) {
        echo "  ✗ 投稿作成失敗: " . $post_id->get_error_message() . "\n";
        $error++;
        continue;
    }

    echo "  ✓ 投稿作成: ID={$post_id}\n";

    // カテゴリをカスタムフィールドに保存
    update_post_meta( $post_id, '_news_category', $item['category'] );
    echo "  ✓ カテゴリ設定: {$item['category']}\n";

    // AIOSEOのメタ情報を設定
    global $wpdb;
    $table = $wpdb->prefix . 'aioseo_posts';
    if ( $wpdb->get_var( "SHOW TABLES LIKE '$table'" ) === $table ) {
        $exists = $wpdb->get_var( $wpdb->prepare( "SELECT id FROM $table WHERE post_id = %d", $post_id ) );
        $aioseo_data = [
            'post_id'        => $post_id,
            'title'          => $item['meta_title'],
            'description'    => $item['meta_desc'],
            'og_title'       => $item['meta_title'],
            'og_description' => $item['meta_desc'],
            'og_object_type' => 'article',
            'updated'        => current_time( 'mysql' ),
        ];
        if ( $exists ) {
            $wpdb->update( $table, $aioseo_data, [ 'post_id' => $post_id ] );
        } else {
            $aioseo_data['created'] = current_time( 'mysql' );
            $wpdb->insert( $table, $aioseo_data );
        }
        echo "  ✓ AIOSEOメタ設定完了\n";
    } else {
        echo "  ⚠ AIOSEOテーブルが見つかりません（スキップ）\n";
    }

    $success++;
}

echo "\n\n========================================\n";
echo "完了: 成功 {$success} / スキップ {$skip} / エラー {$error}\n";
echo "========================================\n";
echo "\n⚠ 作業完了後、このファイル（news-import.php）をサーバーから削除してください。\n";
echo '</pre></body></html>';
