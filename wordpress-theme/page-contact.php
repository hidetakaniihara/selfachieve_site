<?php
/**
 * Template Name: お問い合わせ
 * page-contact.php
 */
get_header();
?>
<main>

  <!-- PAGE HEADER -->
  <div class="page-header">
    <div class="page-header-inner">
      <span class="page-eyebrow fu">CONTACT</span>
      <h1 class="page-title fu" style="transition-delay:.08s;font-size:clamp(40px,5.5vw,80px)">まず、<br>課題をお聞かせください。</h1>
      <p class="page-subtitle fu" style="transition-delay:.16s">お問い合わせ内容を確認後、担当者よりご連絡いたします。<br>まずはお気軽にご相談ください。</p>
    </div>
  </div>

  <!-- BREADCRUMB（PC表示） -->
  <nav class="breadcrumb" aria-label="パンくずリスト">
    <ol>
      <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a></li>
      <li><span aria-current="page">無料相談・お問い合わせ</span></li>
    </ol>
  </nav>

  <!-- CONTACT CONTENT -->
  <div class="contact-wrap">

    <!-- 電話でのお問い合わせ -->
    <div class="contact-intro fu">
      <p class="contact-intro-text">フォームからのお問い合わせのほか、お電話でもご相談を承っております。</p>
      <div class="contact-tel-box">
        <div>
          <p class="contact-tel-label">お電話でのご相談</p>
          <a href="tel:0788068338" class="contact-tel-num">078-806-8338</a>
          <p class="contact-tel-hours">営業時間：平日 9:00〜19:00</p>
        </div>
      </div>
    </div>

    <!-- お問い合わせフォーム -->
    <div class="contact-form-section fu" style="transition-delay:.1s">
      <h2 class="contact-form-title">お問い合わせフォーム</h2>

      <form action="#" method="post" novalidate>

        <!-- お問い合わせ項目 -->
        <div class="form-check-group">
          <label class="form-check-label">お問い合わせ項目<span class="form-check-required">必須</span></label>
          <div role="group" aria-label="お問い合わせ項目（複数選択可）">
            <p class="form-checks-group-label">WEB施策</p>
            <div class="form-checks">
              <label class="form-check-item">
                <input type="checkbox" name="inquiry[]" value="WEB戦略設計">WEB戦略設計
              </label>
              <label class="form-check-item">
                <input type="checkbox" name="inquiry[]" value="SEO対策">SEO対策
              </label>
              <label class="form-check-item">
                <input type="checkbox" name="inquiry[]" value="MEO対策">MEO対策
              </label>
              <label class="form-check-item">
                <input type="checkbox" name="inquiry[]" value="リスティング広告">リスティング広告
              </label>
              <label class="form-check-item">
                <input type="checkbox" name="inquiry[]" value="ディスプレイ広告">ディスプレイ広告
              </label>
              <label class="form-check-item">
                <input type="checkbox" name="inquiry[]" value="サイト制作・分析改善">サイト制作・分析改善
              </label>
              <label class="form-check-item">
                <input type="checkbox" name="inquiry[]" value="その他">その他
              </label>
            </div>
            <p class="form-checks-group-label">SNS運用・広告</p>
            <div class="form-checks">
              <label class="form-check-item">
                <input type="checkbox" name="inquiry[]" value="SNS運用（Instagram）">Instagram
              </label>
              <label class="form-check-item">
                <input type="checkbox" name="inquiry[]" value="SNS運用（TikTok）">TikTok
              </label>
              <label class="form-check-item">
                <input type="checkbox" name="inquiry[]" value="SNS運用（X）">X（旧Twitter）
              </label>
              <label class="form-check-item">
                <input type="checkbox" name="inquiry[]" value="SNS運用（YouTube）">YouTube
              </label>
              <label class="form-check-item">
                <input type="checkbox" name="inquiry[]" value="SNS運用（note）">note
              </label>
              <label class="form-check-item">
                <input type="checkbox" name="inquiry[]" value="SNS運用（LINE）">LINE
              </label>
            </div>
            <p class="form-checks-group-label">AI活用</p>
            <div class="form-checks">
              <label class="form-check-item">
                <input type="checkbox" name="inquiry[]" value="AI業務効率化・導入支援">AI業務効率化・導入支援
              </label>
              <label class="form-check-item">
                <input type="checkbox" name="inquiry[]" value="AI検索対策（LLM検索対策）">AI検索対策（LLM検索対策）
              </label>
            </div>
          </div>
        </div>

        <!-- 入力フィールド -->
        <div class="form-fields">
          <div class="form-field">
            <label class="form-field-label" for="company">会社名・屋号<span class="form-check-optional">任意</span></label>
            <input type="text" id="company" name="company" placeholder="例：株式会社セルフアチーブ" autocomplete="organization">
          </div>
          <div class="form-field">
            <label class="form-field-label" for="name">お名前<span class="form-check-required">必須</span></label>
            <input type="text" id="name" name="name" placeholder="例：山田 太郎" required autocomplete="name">
          </div>
          <div class="form-field">
            <label class="form-field-label" for="tel">電話番号<span class="form-check-optional">任意</span></label>
            <input type="tel" id="tel" name="tel" placeholder="例：078-806-8338" autocomplete="tel">
          </div>
          <div class="form-field">
            <label class="form-field-label" for="email">メールアドレス<span class="form-check-required">必須</span></label>
            <input type="email" id="email" name="email" placeholder="例：info@selfachieve.jp" required autocomplete="email">
          </div>
          <div class="form-field">
            <label class="form-field-label" for="message">お問い合わせ内容<span class="form-check-optional">任意</span></label>
            <textarea id="message" name="message" placeholder="ご相談内容をご自由にお書きください。"></textarea>
          </div>
        </div>

        <!-- 送信ボタン -->
        <div class="form-submit">
          <button type="submit" class="form-submit-btn">
            送信する
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
          </button>
          <p class="form-note">送信いただいた個人情報は、お問い合わせへの回答および当社サービスのご案内にのみ使用します。<br>詳しくは<a href="<?php echo esc_url( home_url( '/privacy/' ) ); ?>">プライバシーポリシー</a>をご確認ください。</p>
        </div>

      </form>
    </div>

  </div>

  <!-- BREADCRUMB SP（スマホ時：フッター直前） -->
  <nav class="breadcrumb-sp" aria-hidden="true">
    <ol>
      <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a></li>
      <li><span aria-current="page">無料相談・お問い合わせ</span></li>
    </ol>
  </nav>

</main>
<?php get_footer(); ?>
