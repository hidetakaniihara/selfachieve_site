<?php
/**
 * お知らせ詳細テンプレート
 * single-news.php
 */
get_header();

$cat  = get_post_meta( get_the_ID(), '_news_category', true );
$cat  = $cat ? esc_html( $cat ) : 'お知らせ';
$date = get_the_date( 'Y.m.d' );
?>
<main id="main" role="main">

  <!-- PAGE HERO -->
  <section class="page-hero" aria-labelledby="news-title">
    <div class="page-hero-inner">
      <span class="page-hero-eyebrow fu">NEWS</span>
      <h1 class="page-hero-h1 fu" id="news-title" style="transition-delay:.08s"><?php the_title(); ?></h1>
    </div>
  </section>

  <!-- BREADCRUMB -->
  <nav class="breadcrumb" aria-label="パンくずリスト">
    <ol>
      <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a></li>
      <li><a href="<?php echo esc_url( home_url( '/news/' ) ); ?>">お知らせ</a></li>
      <li><span aria-current="page"><?php the_title(); ?></span></li>
    </ol>
  </nav>

  <!-- ARTICLE -->
  <article class="news-article-sec">
    <div class="news-article-inner">
      <div class="news-article-meta">
        <span class="news-date"><?php echo esc_html( $date ); ?></span>
        <span class="news-cat"><?php echo $cat; ?></span>
      </div>
      <div class="news-article-body">
        <?php the_content(); ?>
      </div>
    </div>
  </article>

  <!-- 一覧へ戻る -->
  <div class="back-sec">
    <div class="back-inner fu">
      <a class="back-link" href="<?php echo esc_url( home_url( '/news/' ) ); ?>">
        <svg fill="none" height="16" viewBox="0 0 16 16" width="16"><path d="M13 8H3M7 12l-4-4 4-4" stroke="#28282D" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg>
        お知らせ一覧へ
      </a>
    </div>
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
