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

    <!-- お問い合わせフォーム（Contact Form 7） -->
    <div class="contact-form-section fu" style="transition-delay:.1s">
      <h2 class="contact-form-title">お問い合わせフォーム</h2>
      <?php
      // CF7フォームを出力（タイトルで検索して動的に取得）
      $cf7_forms = get_posts([
        'post_type'   => 'wpcf7_contact_form',
        'title'       => 'お問い合わせフォーム',
        'numberposts' => 1,
      ]);
      if ( ! empty( $cf7_forms ) ) {
        echo do_shortcode( '[contact-form-7 id="' . $cf7_forms[0]->ID . '" title="お問い合わせフォーム"]' );
      } else {
        echo '<p>フォームが見つかりません。Contact Form 7 のセットアップを実行してください。</p>';
      }
      ?>
      <p class="form-note">送信いただいた個人情報は、お問い合わせへの回答および当社サービスのご案内にのみ使用します。<br>詳しくは<a href="<?php echo esc_url( home_url( '/privacy/' ) ); ?>">プライバシーポリシー</a>をご確認ください。</p>
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
