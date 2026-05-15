<?php
/**
 * Template Name: お知らせ一覧
 * page-news.php
 */
get_header();
?>
<main id="main" role="main">

  <!-- PAGE HERO -->
  <section class="page-hero" aria-labelledby="page-hero-h1">
    <div class="page-hero-inner">
      <span class="page-hero-eyebrow fu">NEWS</span>
      <h1 class="page-hero-h1 fu" id="page-hero-h1" style="transition-delay:.08s">お知らせ</h1>
      <p class="page-hero-desc fu" style="transition-delay:.16s">
        株式会社セルフアチーブからの最新情報をお届けします。
      </p>
    </div>
  </section>

  <!-- BREADCRUMB（PC表示） -->
  <nav class="breadcrumb" aria-label="パンくずリスト">
    <ol>
      <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a></li>
      <li><span aria-current="page">お知らせ</span></li>
    </ol>
  </nav>

  <!-- NEWS LIST -->
  <div class="news-list-sec">
    <div class="news-list" role="list">

      <a href="<?php echo esc_url( home_url( '/news/20260110/' ) ); ?>" class="news-item fu" role="listitem">
        <div class="news-item-left">
          <span class="news-date">2026.01.10</span>
          <span class="news-cat">お知らせ</span>
        </div>
        <span class="news-title">2026年の営業開始について</span>
        <span class="news-arrow" aria-hidden="true">→</span>
      </a>

      <a href="<?php echo esc_url( home_url( '/news/20251201/' ) ); ?>" class="news-item fu" role="listitem" style="transition-delay:.05s">
        <div class="news-item-left">
          <span class="news-date">2025.12.01</span>
          <span class="news-cat">お知らせ</span>
        </div>
        <span class="news-title">年末年始の休業のお知らせ</span>
        <span class="news-arrow" aria-hidden="true">→</span>
      </a>

      <a href="<?php echo esc_url( home_url( '/news/20251001/' ) ); ?>" class="news-item fu" role="listitem" style="transition-delay:.1s">
        <div class="news-item-left">
          <span class="news-date">2025.10.01</span>
          <span class="news-cat">お知らせ</span>
        </div>
        <span class="news-title">サービス料金改定のお知らせ（2025年11月以降）</span>
        <span class="news-arrow" aria-hidden="true">→</span>
      </a>

      <a href="<?php echo esc_url( home_url( '/news/20250701/' ) ); ?>" class="news-item fu" role="listitem" style="transition-delay:.15s">
        <div class="news-item-left">
          <span class="news-date">2025.07.01</span>
          <span class="news-cat">お知らせ</span>
        </div>
        <span class="news-title">オフィス移転のお知らせ</span>
        <span class="news-arrow" aria-hidden="true">→</span>
      </a>

     </div>
    <!-- PAGINATION -->
    <nav class="pagination" id="news-pagination" aria-label="ページの移動">
    </nav>
  </div>
  <!-- CTA -->
<section id="contact" class="cta" aria-labelledby="cta-h2">
  <div class="cta-wrap">
    <p class="cta-eyebrow fu">FREE CONSULTATION</p>
    <h2 class="cta-h2 fu" id="cta-h2" style="transition-delay:.1s">
      <span class="cta-h2-line">まず、お話してみませんか。</span>
      <span class="cta-h2-line">初回相談は無料です。</span>
    </h2>
    <p class="cta-body fu" style="transition-delay:.2s">
      「何から始めればいいかわからない」という段階でも構いません。
      現状のヒアリングから、最適な施策をご提案します。
    </p>
    <div class="cta-actions fu" style="transition-delay:.3s">
      <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-cta" aria-label="無料相談を申し込む">無料相談を申し込む</a>
      <div class="cta-tel-wrap">
        <p class="cta-tel-label">お電話でのご相談</p>
        <a href="tel:0788068338" class="cta-tel" aria-label="電話番号 078-806-8338">078-806-8338</a>
      </div>
    </div>
  </div>
</section>

</main>
<?php get_footer(); ?>
