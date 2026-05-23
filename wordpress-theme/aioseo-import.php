<?php
/**
 * All in One SEO 一括設定スクリプト
 * 使い方: https://htmlacheive.com/wp/?aioseo_import=run
 * 完了後このファイルをサーバーから削除してください
 */

if ( ! defined( 'ABSPATH' ) ) {
    $wp_load = dirname( __FILE__ ) . '/../../../wp-load.php';
    if ( file_exists( $wp_load ) ) { require_once $wp_load; }
    else { die( 'WordPress not found.' ); }
}

if ( ! isset( $_GET['aioseo_import'] ) || $_GET['aioseo_import'] !== 'run' ) return;
if ( ! current_user_can( 'manage_options' ) ) wp_die( '管理者権限が必要です' );

// AIOSEOが有効か確認
if ( ! function_exists( 'aioseo' ) ) {
    wp_die( 'All in One SEOプラグインが有効化されていません。' );
}

/**
 * AIOSEOのメタ情報をDBに直接書き込む
 */
function aioseo_set_meta( $post_id, $title, $desc, $og_title, $og_desc, $og_image, $og_type ) {
    global $wpdb;
    $table = $wpdb->prefix . 'aioseo_posts';

    // テーブル存在確認
    if ( $wpdb->get_var( "SHOW TABLES LIKE '$table'" ) !== $table ) {
        echo "  ⚠ AIOSEOテーブルが見つかりません\n";
        return;
    }

    $exists = $wpdb->get_var( $wpdb->prepare( "SELECT id FROM $table WHERE post_id = %d", $post_id ) );

    $data = [
        'post_id'            => $post_id,
        'title'              => $title,
        'description'        => $desc,
        'og_title'           => $og_title,
        'og_description'     => $og_desc,
        'og_image_custom_url'=> $og_image,
        'og_image_type'      => 'custom_image',
        'og_object_type'     => $og_type,
        'updated'            => current_time( 'mysql' ),
    ];

    if ( $exists ) {
        $wpdb->update( $table, $data, [ 'post_id' => $post_id ] );
    } else {
        $data['created'] = current_time( 'mysql' );
        $wpdb->insert( $table, $data );
    }
}

echo '<html><head><meta charset="UTF-8"><title>AIOSEO 一括設定</title></head><body>';
echo '<h1>All in One SEO 一括設定</h1><pre>';

$success = 0; $error = 0;


    // /
    {
        $post_id = (int)get_option('page_on_front');
        if ($post_id) {
            aioseo_set_meta($post_id, '神戸のWEBマーケティング・集客支援会社 | セルフアチーブ', '神戸の中小企業に特化したWEBマーケティング会社。SEO対策・リスティング広告・ホームページ制作で集客を支援。累計200社以上・14年の実績。初回相談無料。', '神戸のWEBマーケティング・集客支援会社 | セルフアチーブ', '神戸の中小企業に特化したWEBマーケティング会社。SEO対策・リスティング広告・ホームページ制作で集客を支援。累計200社以上・14年の実績。', 'https://htmlacheive.com/assets/ogp.jpg', 'website');
            echo "✓ [/] post_id=$post_id\n";
            $success++;
        } else {
            echo "✗ [/] 投稿が見つかりません\n";
            $error++;
        }
    }

    // /ai-automation
    {
        $p = get_page_by_path('ai-automation', OBJECT, 'page');
    $post_id = $p ? $p->ID : 0;
        if ($post_id) {
            aioseo_set_meta($post_id, 'AI業務効率化・自動化支援 | 神戸・兵庫の中小企業向けAI導入支援 | セルフアチーブ', '繰り返し作業・手動集計・属人化など、社内業務のAI自動化・最適化を相談から構築・運用まで一貫支援。神戸・兵庫の中小企業向けAI業務効率化サービス。初回無料相談。', 'AI業務自動化・業務効率化支援 | 中小企業向けAI活用代行 | セルフアチーブ', '繰り返し作業・手動集計・属人化など、社内業務のAI自動化・最適化を相談から構築・運用まで一貫支援。神戸・兵庫の中小企業向けAI業務効率化サービス。', 'https://htmlacheive.com/assets/ogp.jpg', 'website');
            echo "✓ [/ai-automation] post_id=$post_id\n";
            $success++;
        } else {
            echo "✗ [/ai-automation] 投稿が見つかりません\n";
            $error++;
        }
    }

    // /ai-seo
    {
        $p = get_page_by_path('ai-seo', OBJECT, 'page');
    $post_id = $p ? $p->ID : 0;
        if ($post_id) {
            aioseo_set_meta($post_id, 'AI検索対策（LLM対策）| 神戸・兵庫の中小企業向けAI検索SEO | セルフアチーブ', 'ChatGPT・Gemini・Perplexityなどのai検索・LLM回答に自社を表示させるための施策。神戸・兵庫の中小企業向けAI検索対策（AIO）コンサルティング。初回15分無料相談。', 'AI検索対策（LLM対策）| ChatGPT・Geminiに表示される施策 | セルフアチーブ', 'ChatGPT・Gemini・Perplexityなどのai検索・LLM回答に自社を表示させるための施策。神戸・兵庫の中小企業向けAI検索対策コンサルティング。', 'https://htmlacheive.com/assets/ogp.jpg', 'website');
            echo "✓ [/ai-seo] post_id=$post_id\n";
            $success++;
        } else {
            echo "✗ [/ai-seo] 投稿が見つかりません\n";
            $error++;
        }
    }

    // /columns
    {
        $p = get_page_by_path('columns', OBJECT, 'page');
    $post_id = $p ? $p->ID : 0;
        if ($post_id) {
            aioseo_set_meta($post_id, 'コラム一覧 | WEBマーケティング情報 | セルフアチーブ', 'セルフアチーブのWEBマーケティングコラム。SEO対策・MEO対策・リスティング広告・SNS集客・ホームページ制作に関する実践的な情報を発信しています。', 'コラム一覧 | セルフアチーブ', 'SEO・MEO・リスティング広告・SNS集客など、WEBマーケティングの実践情報を発信。', 'https://htmlacheive.com/assets/ogp.jpg', 'website');
            echo "✓ [/columns] post_id=$post_id\n";
            $success++;
        } else {
            echo "✗ [/columns] 投稿が見つかりません\n";
            $error++;
        }
    }

    // /company
    {
        $p = get_page_by_path('company', OBJECT, 'page');
    $post_id = $p ? $p->ID : 0;
        if ($post_id) {
            aioseo_set_meta($post_id, '会社情報 | 神戸のWEBマーケティング会社 | セルフアチーブ', '神戸を拠点とする株式会社セルフアチーブの会社情報ページです。ミッション・ビジョン・バリュー、会社概要、アクセスをご確認いただけます。', '会社情報 | 神戸のWEBマーケティング会社 セルフアチーブ', '神戸を拠点とする株式会社セルフアチーブの会社情報ページです。ミッション・ビジョン・バリュー、会社概要、アクセスをご確認いただけます。', 'https://htmlacheive.com/assets/ogp.jpg', 'website');
            echo "✓ [/company] post_id=$post_id\n";
            $success++;
        } else {
            echo "✗ [/company] 投稿が見つかりません\n";
            $error++;
        }
    }

    // /contact
    {
        $p = get_page_by_path('contact', OBJECT, 'page');
    $post_id = $p ? $p->ID : 0;
        if ($post_id) {
            aioseo_set_meta($post_id, '無料相談のお申し込み | セルフアチーブ', 'セルフアチーブへの無料相談・お問い合わせはこちら。WEB戦略設計・SEO対策・MEO対策・リスティング広告・サイト制作など、集客に関するご相談をお気軽にどうぞ。', '無料相談・お問い合わせ | セルフアチーブ', 'セルフアチーブへの無料相談・お問い合わせはこちら。集客に関するご相談をお気軽にどうぞ。', 'https://htmlacheive.com/assets/ogp.jpg', 'website');
            echo "✓ [/contact] post_id=$post_id\n";
            $success++;
        } else {
            echo "✗ [/contact] 投稿が見つかりません\n";
            $error++;
        }
    }

    // /display
    {
        $p = get_page_by_path('display', OBJECT, 'page');
    $post_id = $p ? $p->ID : 0;
        if ($post_id) {
            aioseo_set_meta($post_id, 'ディスプレイ広告 運用代行 | 神戸・兵庫の中小企業向けバナー広告支援 | セルフアチーブ', 'まだ検索していない潜在層に届ける。Google広告・ディスプレイ広告の代行・運用・バナー制作に対応。手数料20%の明朗会計。神戸・兵庫の中小企業に特化。初回15分無料相談。', 'ディスプレイ広告 代行・運用 | 神戸・兵庫の中小企業向けGoogle広告支援 | セルフアチーブ', 'まだ検索していない潜在層に届ける。Google広告・ディスプレイ広告の代行・運用・バナー制作に対応。手数料20%の明朗会計。', 'https://htmlacheive.com/assets/ogp.jpg', 'website');
            echo "✓ [/display] post_id=$post_id\n";
            $success++;
        } else {
            echo "✗ [/display] 投稿が見つかりません\n";
            $error++;
        }
    }

    // /listing
    {
        $p = get_page_by_path('listing', OBJECT, 'page');
    $post_id = $p ? $p->ID : 0;
        if ($post_id) {
            aioseo_set_meta($post_id, 'リスティング広告 運用代行 | 神戸・兵庫の中小企業向けGoogle・Yahoo!広告 | セルフアチーブ', '即日配信・即効果測定。Google広告・リスティング広告の代行・運用・コンサルティングに対応。手数料20%の明朗会計。神戸・兵庫の中小企業に特化。初回15分無料相談。', 'リスティング広告 代行・運用 | 神戸・兵庫の中小企業向けGoogle広告支援 | セルフアチーブ', '即日配信・即効果測定。Google広告・リスティング広告の代行・運用・コンサルティングに対応。手数料20%の明朗会計。', 'https://htmlacheive.com/assets/ogp.jpg', 'website');
            echo "✓ [/listing] post_id=$post_id\n";
            $success++;
        } else {
            echo "✗ [/listing] 投稿が見つかりません\n";
            $error++;
        }
    }

    // /meo
    {
        $p = get_page_by_path('meo', OBJECT, 'page');
    $post_id = $p ? $p->ID : 0;
        if ($post_id) {
            aioseo_set_meta($post_id, 'MEO対策 代行・コンサルティング | 神戸・兵庫の店舗向けGoogleマップ集客 | セルフアチーブ', '成果が出るまで料金0円！地域No.1を目指すMEO対策。Googleビジネスプロフィール最適化・口コミ管理・Googleマップ上位表示を神戸・兵庫の中小企業・店舗に特化して支援。初回15分無料相談。', 'MEO対策 代行・コンサルティング | Googleマップ上位表示で地域集客 | セルフアチーブ', '成果が出るまで料金0円！Googleマップ上位表示・Googleビジネスプロフィール最適化・口コミ管理まで一貫対応。神戸・兵庫の中小企業・店舗に特化。', 'https://htmlacheive.com/assets/ogp.jpg', 'website');
            echo "✓ [/meo] post_id=$post_id\n";
            $success++;
        } else {
            echo "✗ [/meo] 投稿が見つかりません\n";
            $error++;
        }
    }

    // /news
    {
        $p = get_page_by_path('news', OBJECT, 'page');
    $post_id = $p ? $p->ID : 0;
        if ($post_id) {
            aioseo_set_meta($post_id, 'お知らせ一覧 | セルフアチーブ', '株式会社セルフアチーブからのお知らせ一覧。営業日・休業日・サービス改定・オフィス情報など最新情報をお届けします。', 'お知らせ一覧 | セルフアチーブ', '株式会社セルフアチーブからのお知らせ一覧。最新情報をお届けします。', 'https://htmlacheive.com/assets/ogp.jpg', 'website');
            echo "✓ [/news] post_id=$post_id\n";
            $success++;
        } else {
            echo "✗ [/news] 投稿が見つかりません\n";
            $error++;
        }
    }

    // /news/20250701
    {
        $posts = get_posts(['name'=>'20250701','post_type'=>'post','numberposts'=>1]);
    $post_id = !empty($posts) ? $posts[0]->ID : 0;
        if ($post_id) {
            aioseo_set_meta($post_id, '夏季休業のお知らせ | お知らせ | セルフアチーブ', 'オフィス移転についてお知らせします。', 'オフィス移転のお知らせ | セルフアチーブ', 'オフィス移転についてお知らせします。', 'https://htmlacheive.com/assets/ogp.jpg', 'article');
            echo "✓ [/news/20250701] post_id=$post_id\n";
            $success++;
        } else {
            echo "✗ [/news/20250701] 投稿が見つかりません\n";
            $error++;
        }
    }

    // /news/20251001
    {
        $posts = get_posts(['name'=>'20251001','post_type'=>'post','numberposts'=>1]);
    $post_id = !empty($posts) ? $posts[0]->ID : 0;
        if ($post_id) {
            aioseo_set_meta($post_id, '秋のキャンペーンのお知らせ | お知らせ | セルフアチーブ', '2025年11月以降のサービス料金改定についてお知らせします。', 'サービス料金改定のお知らせ（2025年11月以降） | セルフアチーブ', '2025年11月以降のサービス料金改定についてお知らせします。', 'https://htmlacheive.com/assets/ogp.jpg', 'article');
            echo "✓ [/news/20251001] post_id=$post_id\n";
            $success++;
        } else {
            echo "✗ [/news/20251001] 投稿が見つかりません\n";
            $error++;
        }
    }

    // /news/20251201
    {
        $posts = get_posts(['name'=>'20251201','post_type'=>'post','numberposts'=>1]);
    $post_id = !empty($posts) ? $posts[0]->ID : 0;
        if ($post_id) {
            aioseo_set_meta($post_id, '年末年始の休業のお知らせ | お知らせ | セルフアチーブ', '2025年〜2026年の年末年始休業についてお知らせします。', '年末年始の休業のお知らせ | セルフアチーブ', '2025年〜2026年の年末年始休業についてお知らせします。', 'https://htmlacheive.com/assets/ogp.jpg', 'article');
            echo "✓ [/news/20251201] post_id=$post_id\n";
            $success++;
        } else {
            echo "✗ [/news/20251201] 投稿が見つかりません\n";
            $error++;
        }
    }

    // /news/20260110
    {
        $posts = get_posts(['name'=>'20260110','post_type'=>'post','numberposts'=>1]);
    $post_id = !empty($posts) ? $posts[0]->ID : 0;
        if ($post_id) {
            aioseo_set_meta($post_id, '2026年の営業開始について | お知らせ | セルフアチーブ', '2026年の営業開始日についてお知らせします。', '2026年の営業開始について | セルフアチーブ', '2026年の営業開始日についてお知らせします。', 'https://htmlacheive.com/assets/ogp.jpg', 'article');
            echo "✓ [/news/20260110] post_id=$post_id\n";
            $success++;
        } else {
            echo "✗ [/news/20260110] 投稿が見つかりません\n";
            $error++;
        }
    }

    // /privacy
    {
        $p = get_page_by_path('privacy', OBJECT, 'page');
    $post_id = $p ? $p->ID : 0;
        if ($post_id) {
            aioseo_set_meta($post_id, 'プライバシーポリシー | セルフアチーブ', '株式会社セルフアチーブのプライバシーポリシーページです。個人情報の取得・利用目的・管理方針についてご説明します。', 'プライバシーポリシー | セルフアチーブ', '株式会社セルフアチーブのプライバシーポリシーページです。', 'https://htmlacheive.com/assets/ogp.jpg', 'website');
            echo "✓ [/privacy] post_id=$post_id\n";
            $success++;
        } else {
            echo "✗ [/privacy] 投稿が見つかりません\n";
            $error++;
        }
    }

    // /seo
    {
        $p = get_page_by_path('seo', OBJECT, 'page');
    $post_id = $p ? $p->ID : 0;
        if ($post_id) {
            aioseo_set_meta($post_id, 'SEO対策 代行・コンサルティング | 神戸・兵庫の中小企業向けSEO支援 | セルフアチーブ', '自社サイトで月平均40件以上の問い合わせを実現してるSEO施策を、そのまま御社サイトへご提供。SEO対策の代行・コンサルティング・外注に対応。神戸・兵庫の中小企業に特化。初回15分無料相談。', 'SEO対策 代行・コンサルティング | 神戸・兵庫の中小企業向けSEO支援 | セルフアチーブ', '自社サイトで月平均40件以上の問い合わせを実現してるSEO施策を、そのまま御社サイトへご提供。SEO対策の代行・コンサルティング・外注に対応。', 'https://htmlacheive.com/assets/ogp.jpg', 'website');
            echo "✓ [/seo] post_id=$post_id\n";
            $success++;
        } else {
            echo "✗ [/seo] 投稿が見つかりません\n";
            $error++;
        }
    }

    // /sns
    {
        $p = get_page_by_path('sns', OBJECT, 'page');
    $post_id = $p ? $p->ID : 0;
        if ($post_id) {
            aioseo_set_meta($post_id, 'SNSマーケティング 運用代行・業務委託 | 神戸・兵庫の中小企業向けSNS集客支援 | セルフアチーブ', 'SNSマーケティングの運用代行・業務委託に対応。Instagram・TikTok・X・YouTube・LINE・noteのアカウント運用からSNS広告まで一貫支援。神戸・兵庫の中小企業に特化。初回15分無料相談。', 'SNSマーケティング 運用代行・業務委託 | 神戸・兵庫の中小企業向けSNS集客支援 | セルフアチーブ', 'SNSマーケティングの運用代行・業務委託に対応。Instagram・TikTok・X・YouTube・LINE・noteのアカウント運用からSNS広告まで一貫支援。', 'https://htmlacheive.com/assets/ogp.jpg', 'website');
            echo "✓ [/sns] post_id=$post_id\n";
            $success++;
        } else {
            echo "✗ [/sns] 投稿が見つかりません\n";
            $error++;
        }
    }

    // /sns/instagram
    {
        $p = get_page_by_path('instagram', OBJECT, 'page');
    $post_id = $p ? $p->ID : 0;
        if ($post_id) {
            aioseo_set_meta($post_id, 'Instagram運用代行・広告代行 | 神戸・兵庫の中小企業向けInstagramマーケティング | セルフアチーブ', 'Instagram運用代行・広告代行に対応。フォロワーを顧客に変えるInstagramマーケティングを神戸・兵庫の中小企業・店舗に特化して提供。アカウント運用から広告まで一貫支援。初回15分無料相談。', 'Instagram運用代行・広告代行 | 神戸・兵庫の中小企業向けInstagramマーケティング | セルフアチーブ', 'Instagram運用代行・広告代行に対応。フォロワーを顧客に変えるInstagramマーケティングを神戸・兵庫の中小企業・店舗に特化して提供。', 'https://htmlacheive.com/assets/ogp.jpg', 'website');
            echo "✓ [/sns/instagram] post_id=$post_id\n";
            $success++;
        } else {
            echo "✗ [/sns/instagram] 投稿が見つかりません\n";
            $error++;
        }
    }

    // /sns/line
    {
        $p = get_page_by_path('line', OBJECT, 'page');
    $post_id = $p ? $p->ID : 0;
        if ($post_id) {
            aioseo_set_meta($post_id, 'LINE構築・運用代行 | 神戸・兵庫の中小企業向けLINEマーケティング | セルフアチーブ', 'LINE構築・運用代行に対応。フォロワーを顧客に変えるLINEマーケティングを神戸・兵庫の中小企業・店舗に特化して提供。アカウント運用から広告まで一貫支援。初回15分無料相談。', 'LINE構築・運用代行 | 神戸・兵庫の中小企業向けLINEマーケティング | セルフアチーブ', 'LINE構築・運用代行に対応。フォロワーを顧客に変えるLINEマーケティングを神戸・兵庫の中小企業・店舗に特化して提供。', 'https://htmlacheive.com/assets/ogp.jpg', 'website');
            echo "✓ [/sns/line] post_id=$post_id\n";
            $success++;
        } else {
            echo "✗ [/sns/line] 投稿が見つかりません\n";
            $error++;
        }
    }

    // /sns/note
    {
        $p = get_page_by_path('note', OBJECT, 'page');
    $post_id = $p ? $p->ID : 0;
        if ($post_id) {
            aioseo_set_meta($post_id, 'note運用代行・記事制作 | 神戸・兵庫の中小企業向けnoteマーケティング | セルフアチーブ', 'note運用代行・記事制作に対応。読まれるほど選ばれるnoteマーケティングを神戸・兵庫の中小企業・店舗に特化して提供。記事企画から執筆・公開・分析まで一貫支援。初回15分無料相談。', 'note運用代行・記事制作 | 神戸・兵庫の中小企業向けnoteマーケティング | セルフアチーブ', 'note運用代行・記事制作に対応。読まれるほど選ばれるnoteマーケティングを神戸・兵庫の中小企業・店舗に特化して提供。', 'https://htmlacheive.com/assets/ogp.jpg', 'website');
            echo "✓ [/sns/note] post_id=$post_id\n";
            $success++;
        } else {
            echo "✗ [/sns/note] 投稿が見つかりません\n";
            $error++;
        }
    }

    // /sns/tiktok
    {
        $p = get_page_by_path('tiktok', OBJECT, 'page');
    $post_id = $p ? $p->ID : 0;
        if ($post_id) {
            aioseo_set_meta($post_id, 'TikTok運用代行・広告代行 | 神戸・兵庫の中小企業向けTikTokマーケティング | セルフアチーブ', 'TikTok運用代行・広告代行に対応。フォロワーを顧客に変えるTikTokマーケティングを神戸・兵庫の中小企業・店舗に特化して提供。アカウント運用から広告まで一貫支援。初回15分無料相談。', 'TikTok運用代行・広告代行 | 神戸・兵庫の中小企業向けTikTokマーケティング | セルフアチーブ', 'TikTok運用代行・広告代行に対応。フォロワーを顧客に変えるTikTokマーケティングを神戸・兵庫の中小企業・店舗に特化して提供。', 'https://htmlacheive.com/assets/ogp.jpg', 'website');
            echo "✓ [/sns/tiktok] post_id=$post_id\n";
            $success++;
        } else {
            echo "✗ [/sns/tiktok] 投稿が見つかりません\n";
            $error++;
        }
    }

    // /sns/x
    {
        $p = get_page_by_path('x', OBJECT, 'page');
    $post_id = $p ? $p->ID : 0;
        if ($post_id) {
            aioseo_set_meta($post_id, 'X（旧Twitter）運用代行・X広告 | 神戸・兵庫の中小企業向けXマーケティング | セルフアチーブ', 'X（旧Twitter）の運用代行・広告運用を神戸から全国へ。毎日の発信が信頼を勝ち取る。中小企業・店舗向けにX運用代行・X広告を一貫支援します。', 'X（旧Twitter）運用代行・X広告 | 神戸・兵庫の中小企業向けXマーケティング | セルフアチーブ', '神戸・兵庫の中小企業向けX（旧Twitter）運用代行・X広告。毎日の発信で信頼を構築し、集客につなげる戦略的X運用を支援。初回相談無料。', 'https://htmlacheive.com/assets/ogp.jpg', 'website');
            echo "✓ [/sns/x] post_id=$post_id\n";
            $success++;
        } else {
            echo "✗ [/sns/x] 投稿が見つかりません\n";
            $error++;
        }
    }

    // /sns/youtube
    {
        $p = get_page_by_path('youtube', OBJECT, 'page');
    $post_id = $p ? $p->ID : 0;
        if ($post_id) {
            aioseo_set_meta($post_id, 'YouTube運用代行・YouTube広告 | 神戸・兵庫の中小企業向けYouTubeマーケティング | セルフアチーブ', 'YouTube運用代行・YouTube広告に対応。動画で信頼を積み上げ、問い合わせを増やすYouTubeマーケティングを神戸・兵庫の中小企業・店舗に特化して提供。企画から撮影・編集・広告まで一貫支援。初回15分無料相談。', 'YouTube運用代行・YouTube広告 | 神戸・兵庫の中小企業向けYouTubeマーケティング | セルフアチーブ', 'YouTube運用代行・YouTube広告に対応。動画で信頼を積み上げ、問い合わせを増やすYouTubeマーケティングを神戸・兵庫の中小企業・店舗に特化して提供。', 'https://htmlacheive.com/assets/ogp.jpg', 'website');
            echo "✓ [/sns/youtube] post_id=$post_id\n";
            $success++;
        } else {
            echo "✗ [/sns/youtube] 投稿が見つかりません\n";
            $error++;
        }
    }

    // /strategy
    {
        $p = get_page_by_path('strategy', OBJECT, 'page');
    $post_id = $p ? $p->ID : 0;
        if ($post_id) {
            aioseo_set_meta($post_id, 'WEB戦略設計 | 神戸・兵庫の中小企業向けWEBコンサルティング | セルフアチーブ', 'WEB施策がうまくいかない根本原因は、マーケティング戦略の不在にあります。現状把握・課題設定・施策設計まで一貫した戦略設計を神戸・兵庫の中小企業に提供。初回15分無料相談。', 'WEB戦略設計 | 神戸・兵庫の中小企業向けWEBコンサルティング | セルフアチーブ', 'WEB施策がうまくいかない根本原因は、マーケティング戦略の不在にあります。現状把握・課題設定・施策設計まで一貫した戦略設計を提供。', 'https://htmlacheive.com/assets/ogp.jpg', 'website');
            echo "✓ [/strategy] post_id=$post_id\n";
            $success++;
        } else {
            echo "✗ [/strategy] 投稿が見つかりません\n";
            $error++;
        }
    }

    // /voice
    {
        $p = get_page_by_path('voice', OBJECT, 'page');
    $post_id = $p ? $p->ID : 0;
        if ($post_id) {
            aioseo_set_meta($post_id, 'お客さまの声 | 神戸・兵庫のWEBマーケティング会社 | セルフアチーブ', 'セルフアチーブが支援した神戸・兵庫の中小企業・店舗のお客さまの声。SEO対策・MEO対策・WEB戦略設計・リスティング広告など、実際の支援事例をインタビュー形式でご紹介。', 'お客さまの声 | セルフアチーブ', 'セルフアチーブが支援した神戸・兵庫の中小企業・店舗のお客さまの声。SEO対策・MEO対策・WEB戦略設計・リスティング広告など、実際の支援事例をインタビュー形式でご紹介。', 'https://htmlacheive.com/assets/ogp.jpg', 'website');
            echo "✓ [/voice] post_id=$post_id\n";
            $success++;
        } else {
            echo "✗ [/voice] 投稿が見つかりません\n";
            $error++;
        }
    }

    // /voice/iwazawa
    {
        $posts = get_posts(['name'=>'iwazawa-law-office','post_type'=>'voice','numberposts'=>1]);
    $post_id = !empty($posts) ? $posts[0]->ID : 0;
        if ($post_id) {
            aioseo_set_meta($post_id, '岩澤法理事務所 | お客さまの声 | セルフアチーブ', '「特殊な業界だからこそ、心強い」共に課題へ向き合うWeb集客のパートナー。法律事務所・岩澤法理事務所様のリスティング広告支援事例をインタビュー形式でご紹介。', '岩澤法理事務所 | お客さまの声 | セルフアチーブ', '「特殊な業界だからこそ、心強い」共に課題へ向き合うWeb集客のパートナー。法律事務所・岩澤法理事務所様のリスティング広告支援事例。', 'https://htmlacheive.com/assets/ogp.jpg', 'article');
            echo "✓ [/voice/iwazawa] post_id=$post_id\n";
            $success++;
        } else {
            echo "✗ [/voice/iwazawa] 投稿が見つかりません\n";
            $error++;
        }
    }

    // /website
    {
        $p = get_page_by_path('website', OBJECT, 'page');
    $post_id = $p ? $p->ID : 0;
        if ($post_id) {
            aioseo_set_meta($post_id, 'ホームページ制作・WEBサイト制作 | 戦略設計から分析改善まで一貫対応 | セルフアチーブ', 'WEB戦略に基づいた、結果の出るホームページ制作。SEO・分析・戦略設計まで一貫対応。神戸・兵庫の中小企業に特化したWEBサイト制作・LP制作・保守・分析改善。初回15分無料相談。', 'ホームページ制作・WEBサイト制作 | 戦略設計から分析改善まで | セルフアチーブ', 'ただ作るだけでは終わらない。戦略設計・企画・SEO・分析改善まで一貫対応のホームページ制作。神戸・兵庫の中小企業に特化。', 'https://htmlacheive.com/assets/ogp.jpg', 'website');
            echo "✓ [/website] post_id=$post_id\n";
            $success++;
        } else {
            echo "✗ [/website] 投稿が見つかりません\n";
            $error++;
        }
    }

    // /works
    {
        $p = get_page_by_path('works', OBJECT, 'page');
    $post_id = $p ? $p->ID : 0;
        if ($post_id) {
            aioseo_set_meta($post_id, '制作実績 | 神戸・兵庫のWEBマーケティング支援実績 | セルフアチーブ', 'セルフアチーブの制作実績一覧。神戸・兵庫の中小企業・店舗のホームページ制作・SEO対策・MEO対策・WEB戦略設計の実績を掲載。', '制作実績 | セルフアチーブ', 'セルフアチーブの制作実績一覧。神戸・兵庫の中小企業・店舗のホームページ制作・SEO対策・MEO対策・WEB戦略設計の実績を掲載。', 'https://htmlacheive.com/assets/ogp.jpg', 'website');
            echo "✓ [/works] post_id=$post_id\n";
            $success++;
        } else {
            echo "✗ [/works] 投稿が見つかりません\n";
            $error++;
        }
    }

    // /works/sanplaza
    {
        $posts = get_posts(['name'=>'sanplaza','post_type'=>'works','numberposts'=>1]);
    $post_id = !empty($posts) ? $posts[0]->ID : 0;
        if ($post_id) {
            aioseo_set_meta($post_id, 'さんプラザコンタクトレンズ 様 | 制作実績 | セルフアチーブ', 'SEO対策とストレスフリーな導線を構築。コンタクトレンズ販売店・さんプラザコンタクトレンズ様のホームページ制作事例をご紹介します。', 'さんプラザコンタクトレンズ 様 | 制作実績 | セルフアチーブ', 'SEO対策とストレスフリーな導線を構築。コンタクトレンズ販売店・さんプラザコンタクトレンズ様のホームページ制作事例。', 'https://htmlacheive.com/assets/ogp.jpg', 'article');
            echo "✓ [/works/sanplaza] post_id=$post_id\n";
            $success++;
        } else {
            echo "✗ [/works/sanplaza] 投稿が見つかりません\n";
            $error++;
        }
    }

echo "\n========================================\n";
echo "完了: 成功 {$success} / エラー {$error}\n";
echo "========================================\n";
echo '</pre><p style="color:green"><strong>✅ 完了！このファイルをサーバーから削除してください。</strong></p></body></html>';
exit;
