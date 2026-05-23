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

  <!-- ARTICLE HEADER -->
  <section class="article-header" aria-labelledby="article-title">
    <div class="article-header-inner">
      <div class="article-meta fu">
        <span class="article-date"><?php echo esc_html( $date ); ?></span>
        <span class="article-cat"><?php echo $cat; ?></span>
      </div>
      <h1 class="article-title fu" id="article-title" style="transition-delay:.08s"><?php the_title(); ?></h1>
    </div>
  </section>

  <!-- BREADCRUMB（PC表示） -->
  <nav class="breadcrumb" aria-label="パンくずリスト">
    <ol>
      <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a></li>
      <li><a href="<?php echo esc_url( home_url( '/news/' ) ); ?>">お知らせ</a></li>
      <li><span aria-current="page"><?php the_title(); ?></span></li>
    </ol>
  </nav>

  <!-- ARTICLE BODY -->
  <div class="article-sec">
    <div class="article-body fu">
      <?php the_content(); ?>
    </div>

    <!-- ARTICLE NAV -->
    <nav class="article-nav fu" aria-label="記事ナビゲーション">
      <?php
      $prev = get_previous_post();
      $next = get_next_post();
      if ( $prev ) :
      ?>
        <a href="<?php echo esc_url( get_permalink( $prev ) ); ?>" class="article-nav-btn">← 前の記事：<?php echo esc_html( get_the_title( $prev ) ); ?></a>
      <?php else : ?>
        <span></span>
      <?php endif; ?>
      <a href="<?php echo esc_url( home_url( '/news/' ) ); ?>" class="article-nav-back">お知らせ一覧へ戻る</a>
      <?php if ( $next ) : ?>
        <a href="<?php echo esc_url( get_permalink( $next ) ); ?>" class="article-nav-btn">次の記事：<?php echo esc_html( get_the_title( $next ) ); ?> →</a>
      <?php else : ?>
        <span></span>
      <?php endif; ?>
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
    <li><a href="<?php echo esc_url( home_url( '/news/' ) ); ?>">お知らせ</a></li>
    <li><span aria-current="page"><?php the_title(); ?></span></li>
  </ol>
</nav>

<?php get_footer(); ?>
