<?php
/**
 * Template Name: サンクスページ
 * page-thanks.php
 */
get_header();
?>
<main>

  <!-- PAGE HEADER -->
  <div class="page-header">
    <div class="page-header-inner">
      <span class="page-eyebrow fu">THANK YOU</span>
      <h1 class="page-title fu" style="transition-delay:.08s;font-size:clamp(32px,4.5vw,64px)">お問い合わせ<br>ありがとうございます。</h1>
      <p class="page-subtitle fu" style="transition-delay:.16s">内容を確認の上、担当者より改めてご連絡いたします。</p>
    </div>
  </div>

  <!-- BREADCRUMB（PC表示） -->
  <nav class="breadcrumb" aria-label="パンくずリスト">
    <ol>
      <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a></li>
      <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">無料相談・お問い合わせ</a></li>
      <li><span aria-current="page">送信完了</span></li>
    </ol>
  </nav>

  <!-- THANKS CONTENT -->
  <div class="thanks-wrap">
    <div class="thanks-inner fu">
      <p class="thanks-text">この度はお問い合わせいただきありがとうございます。<br>内容を確認の上、担当者より改めてご連絡いたします。<br>しばらくお待ちください。</p>
      <div class="thanks-tel-box">
        <p class="thanks-tel-label">お急ぎの場合はお電話ください</p>
        <a href="tel:0788068338" class="contact-tel-num">078-806-8338</a>
        <p class="contact-tel-hours">営業時間：平日 9:00〜19:00</p>
      </div>
      <div class="thanks-btn-wrap">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-primary">トップページへ戻る</a>
      </div>
    </div>
  </div>

  <!-- BREADCRUMB SP（スマホ時：フッター直前） -->
  <nav class="breadcrumb-sp" aria-hidden="true">
    <ol>
      <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a></li>
      <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">無料相談・お問い合わせ</a></li>
      <li><span aria-current="page">送信完了</span></li>
    </ol>
  </nav>

</main>
<?php get_footer(); ?>
