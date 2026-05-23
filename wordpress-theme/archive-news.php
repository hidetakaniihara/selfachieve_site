<?php get_header(); ?>

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
      <?php
      $delay = 0;
      if ( have_posts() ) :
        while ( have_posts() ) : the_post();
          $style = $delay > 0 ? ' style="transition-delay:' . $delay . 's"' : '';
      ?>
        <a href="<?php the_permalink(); ?>" class="news-item fu" role="listitem"<?php echo $style; ?>>
          <div class="news-item-left">
            <span class="news-date"><?php echo get_the_date( 'Y.m.d' ); ?></span>
            <span class="news-cat">お知らせ</span>
          </div>
          <span class="news-title"><?php the_title(); ?></span>
          <span class="news-arrow" aria-hidden="true">→</span>
        </a>
      <?php
          $delay = round( $delay + 0.05, 2 );
        endwhile;
      else :
      ?>
        <p>お知らせがありません。</p>
      <?php endif; ?>
    </div>

    <!-- PAGINATION -->
    <nav class="pagination" id="news-pagination" aria-label="ページの移動">
      <?php
      the_posts_pagination( [
          'prev_text' => '← 前へ',
          'next_text' => '次へ →',
      ] );
      ?>
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

<!-- BREADCRUMB（スマホ：フッター直前） -->
<nav class="breadcrumb-sp" aria-label="パンくずリスト（スマートフォン）">
  <ol>
    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a></li>
    <li><span aria-current="page">お知らせ</span></li>
  </ol>
</nav>

<?php get_footer(); ?>
