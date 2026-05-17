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

  <!-- BREADCRUMB -->
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
      $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
      $news_query = new WP_Query( [
          'post_type'      => 'news',
          'posts_per_page' => 20,
          'paged'          => $paged,
          'orderby'        => 'date',
          'order'          => 'DESC',
      ] );

      if ( $news_query->have_posts() ) :
          $delay = 0;
          while ( $news_query->have_posts() ) :
              $news_query->the_post();
              $cat   = get_post_meta( get_the_ID(), '_news_category', true );
              $cat   = $cat ? esc_html( $cat ) : 'お知らせ';
              $date  = get_the_date( 'Y.m.d' );
              $delay_style = $delay > 0 ? ' style="transition-delay:' . ( $delay * 0.05 ) . 's"' : '';
              ?>
              <a href="<?php the_permalink(); ?>" class="news-item fu" role="listitem"<?php echo $delay_style; ?>>
                <div class="news-item-left">
                  <span class="news-date"><?php echo esc_html( $date ); ?></span>
                  <span class="news-cat"><?php echo $cat; ?></span>
                </div>
                <span class="news-title"><?php the_title(); ?></span>
                <span class="news-arrow" aria-hidden="true">→</span>
              </a>
              <?php
              $delay++;
          endwhile;
          wp_reset_postdata();
      else :
          ?>
          <p style="padding:40px 20px;text-align:center;color:#666;">現在、お知らせはありません。</p>
          <?php
      endif;
      ?>

    </div>

    <!-- PAGINATION -->
    <nav class="pagination" aria-label="ページの移動">
      <?php
      echo paginate_links( [
          'base'    => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
          'format'  => '?paged=%#%',
          'current' => max( 1, get_query_var( 'paged' ) ),
          'total'   => isset( $news_query ) ? $news_query->max_num_pages : 1,
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
<?php get_footer(); ?>
