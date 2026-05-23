<?php
/**
 * Contact Form 7 セットアップスクリプト
 * - CF7フォームをDBに登録
 * - サンクスページ（固定ページ）を作成
 * - リダイレクト設定をfunctions.phpに追加
 *
 * 実行URL: /wp-content/themes/selfachieve-theme/cf7-setup.php?cf7_setup=run
 */

// WordPress環境を読み込む
$wp_load = dirname(__FILE__) . '/../../../wp-load.php';
if (!file_exists($wp_load)) {
    die('wp-load.php が見つかりません。');
}
require_once($wp_load);

// 管理者チェック
if (!is_user_logged_in() || !current_user_can('manage_options')) {
    die('管理者としてログインしてください。');
}

if (!isset($_GET['cf7_setup']) || $_GET['cf7_setup'] !== 'run') {
    die('?cf7_setup=run を付けてアクセスしてください。');
}

// CF7プラグインが有効か確認
if (!function_exists('wpcf7_contact_form')) {
    die('Contact Form 7 が有効化されていません。先にプラグインを有効化してください。');
}

echo '<h1>Contact Form 7 セットアップ</h1>';
echo '<pre>';

$results = [];

// ============================================================
// 1. CF7フォームを作成
// ============================================================
echo "--- CF7フォーム作成 ---\n";

$form_title = 'お問い合わせフォーム';

// 既存フォームがあればスキップ
$existing_forms = get_posts([
    'post_type'   => 'wpcf7_contact_form',
    'title'       => $form_title,
    'numberposts' => 1,
]);

if (!empty($existing_forms)) {
    $form_id = $existing_forms[0]->ID;
    echo "  ✓ 既存フォームを使用: ID={$form_id}\n";
} else {
    // フォームHTMLを定義
    $form_body = '[hidden _wpcf7_locale "ja"]

<div class="form-check-group">
<label class="form-check-label">お問い合わせ項目<span class="form-check-required">必須</span></label>
<div role="group" aria-label="お問い合わせ項目（複数選択可）">
<p class="form-checks-group-label">WEB施策</p>
<div class="form-checks">
[checkbox* inquiry use_label_element "WEB戦略設計" "SEO対策" "MEO対策" "リスティング広告" "ディスプレイ広告" "サイト制作・分析改善" "その他"]
</div>
<p class="form-checks-group-label">SNS運用・広告</p>
<div class="form-checks">
[checkbox inquiry_sns use_label_element "SNS運用（Instagram）" "SNS運用（TikTok）" "SNS運用（X）" "SNS運用（YouTube）" "SNS運用（note）" "SNS運用（LINE）"]
</div>
<p class="form-checks-group-label">AI活用</p>
<div class="form-checks">
[checkbox inquiry_ai use_label_element "AI業務効率化・導入支援" "AI検索対策（LLM検索対策）"]
</div>
</div>
</div>

<div class="form-fields">
<div class="form-field">
<label class="form-field-label" for="company">会社名・屋号<span class="form-check-optional">任意</span></label>
[text company id:company placeholder "例：株式会社セルフアチーブ" autocomplete:organization]
</div>
<div class="form-field">
<label class="form-field-label" for="your-name">お名前<span class="form-check-required">必須</span></label>
[text* your-name id:your-name placeholder "例：山田 太郎" autocomplete:name]
</div>
<div class="form-field">
<label class="form-field-label" for="tel">電話番号<span class="form-check-optional">任意</span></label>
[tel tel id:tel placeholder "例：078-806-8338" autocomplete:tel]
</div>
<div class="form-field">
<label class="form-field-label" for="your-email">メールアドレス<span class="form-check-required">必須</span></label>
[email* your-email id:your-email placeholder "例：info@selfachieve.jp" autocomplete:email]
</div>
<div class="form-field">
<label class="form-field-label" for="your-message">お問い合わせ内容<span class="form-check-optional">任意</span></label>
[textarea your-message id:your-message placeholder "ご相談内容をご自由にお書きください。"]
</div>
</div>

<div class="form-submit">
[submit class:form-submit-btn "送信する"]
</div>';

    // メールテンプレート
    $mail_body = 'お問い合わせがありました。

■ お問い合わせ項目（WEB施策）
[inquiry]

■ お問い合わせ項目（SNS運用・広告）
[inquiry_sns]

■ お問い合わせ項目（AI活用）
[inquiry_ai]

■ 会社名・屋号
[company]

■ お名前
[your-name]

■ 電話番号
[tel]

■ メールアドレス
[your-email]

■ お問い合わせ内容
[your-message]

--
送信元: [_site_title] <[_site_admin_email]>';

    $mail_body_auto = '[your-name] 様

この度はお問い合わせいただきありがとうございます。
以下の内容でお問い合わせを受け付けました。

■ お問い合わせ項目（WEB施策）
[inquiry]

■ お問い合わせ項目（SNS運用・広告）
[inquiry_sns]

■ お問い合わせ項目（AI活用）
[inquiry_ai]

■ 会社名・屋号
[company]

■ お名前
[your-name]

■ 電話番号
[tel]

■ メールアドレス
[your-email]

■ お問い合わせ内容
[your-message]

---
担当者より改めてご連絡いたします。
しばらくお待ちください。

セルフアチーブ
TEL: 078-806-8338（平日 9:00〜19:00）
https://selfachieve.jp/';

    // CF7フォームを投稿として作成
    $post_id = wp_insert_post([
        'post_type'   => 'wpcf7_contact_form',
        'post_status' => 'publish',
        'post_title'  => $form_title,
    ]);

    if (is_wp_error($post_id)) {
        echo "  ✗ フォーム作成失敗: " . $post_id->get_error_message() . "\n";
    } else {
        $form_id = $post_id;

        // フォーム本文を保存
        update_post_meta($form_id, '_form', $form_body);

        // メール設定（管理者宛）
        update_post_meta($form_id, '_mail', [
            'subject'    => '[お問い合わせ] [your-name] 様よりお問い合わせがありました',
            'sender'     => 'セルフアチーブ <info@selfachieve.jp>',
            'recipient'  => 'info@selfachieve.jp',
            'additional_headers' => 'Reply-To: [your-email]',
            'body'       => $mail_body,
            'attachments' => '',
            'use_html'   => false,
            'exclude_blank' => true,
        ]);

        // メール設定（自動返信）
        update_post_meta($form_id, '_mail_2', [
            'active'     => true,
            'subject'    => 'お問い合わせを受け付けました - セルフアチーブ',
            'sender'     => 'セルフアチーブ <info@selfachieve.jp>',
            'recipient'  => '[your-email]',
            'additional_headers' => '',
            'body'       => $mail_body_auto,
            'attachments' => '',
            'use_html'   => false,
            'exclude_blank' => true,
        ]);

        // その他設定
        update_post_meta($form_id, '_messages', [
            'mail_sent_ok'     => 'ありがとうございます。お問い合わせを受け付けました。',
            'mail_sent_ng'     => '送信に失敗しました。お手数ですが、お電話にてお問い合わせください。',
            'validation_error' => '入力内容に誤りがあります。ご確認ください。',
            'spam'             => '送信できませんでした。',
            'accept_terms'     => '利用規約に同意してください。',
            'invalid_required' => '必須項目です。',
            'invalid_too_long' => '入力が長すぎます。',
            'invalid_too_short' => '入力が短すぎます。',
        ]);

        update_post_meta($form_id, '_additional_settings', "on_sent_ok: \"location = '" . home_url('/thanks/') . "';\"");

        echo "  ✓ フォーム作成完了: ID={$form_id}\n";
    }
}

$results['form_id'] = $form_id;

// ============================================================
// 2. サンクスページを作成
// ============================================================
echo "\n--- サンクスページ作成 ---\n";

$thanks_slug = 'thanks';
$existing_thanks = get_page_by_path($thanks_slug);

if ($existing_thanks) {
    echo "  ✓ 既存のサンクスページを使用: ID={$existing_thanks->ID}\n";
    $thanks_id = $existing_thanks->ID;
} else {
    $thanks_content = '<!-- wp:paragraph -->
<p>この度はお問い合わせいただきありがとうございます。</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>内容を確認の上、担当者より改めてご連絡いたします。<br>しばらくお待ちください。</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>お急ぎの場合は、お電話（<a href="tel:0788068338">078-806-8338</a>）にてお問い合わせください。<br>営業時間：平日 9:00〜19:00</p>
<!-- /wp:paragraph -->';

    $thanks_id = wp_insert_post([
        'post_type'    => 'page',
        'post_status'  => 'publish',
        'post_title'   => 'お問い合わせありがとうございます',
        'post_name'    => $thanks_slug,
        'post_content' => $thanks_content,
        'page_template' => 'page-thanks.php',
    ]);

    if (is_wp_error($thanks_id)) {
        echo "  ✗ サンクスページ作成失敗: " . $thanks_id->get_error_message() . "\n";
    } else {
        // AIOSEOメタ設定
        update_post_meta($thanks_id, '_aioseo_title', 'お問い合わせありがとうございます | セルフアチーブ');
        update_post_meta($thanks_id, '_aioseo_description', 'お問い合わせを受け付けました。担当者より改めてご連絡いたします。');
        // noindexにする（サンクスページはインデックス不要）
        update_post_meta($thanks_id, '_aioseo_noindex', true);

        echo "  ✓ サンクスページ作成完了: ID={$thanks_id}\n";
        echo "  ✓ URL: " . home_url('/thanks/') . "\n";
        echo "  ✓ AIOSEOメタ設定（noindex）完了\n";
    }
}

$results['thanks_id'] = $thanks_id;

// ============================================================
// 3. 結果表示
// ============================================================
echo "\n" . str_repeat('=', 40) . "\n";
echo "完了\n";
echo "  CF7フォームID: {$results['form_id']}\n";
echo "  サンクスページID: {$results['thanks_id']}\n";
echo "\n次の手順:\n";
echo "  1. page-contact.php の <form> タグ部分を CF7ショートコードに差し替え\n";
echo "     ショートコード: [contact-form-7 id=\"{$results['form_id']}\" title=\"お問い合わせフォーム\"]\n";
echo "  2. page-thanks.php をテーマフォルダにアップロード\n";
echo "  3. このファイル（cf7-setup.php）をサーバーから削除\n";
echo str_repeat('=', 40) . "\n";
echo "</pre>";
echo "<p>⚠ 作業完了後、このファイル（cf7-setup.php）をサーバーから削除してください。</p>";
