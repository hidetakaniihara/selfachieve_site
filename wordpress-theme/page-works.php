<?php
/**
 * Template Name: 実績一覧
 * page-works.php
 */
get_header();

// フィルター
$current_filter = isset( $_GET['cat'] ) ? sanitize_text_field( $_GET['cat'] ) : 'all';

// クエリ
$query_args = [
    'post_type'      => 'works',
    'posts_per_page' => -1,
    'orderby'        => 'meta_value_num',
    'meta_key'       => '_works_number',
    'order'          => 'ASC',
];
if ( $current_filter !== 'all' ) {
    $query_args['tax_query'] = [ [
        'taxonomy' => 'works_cat',
        'field'    => 'slug',
        'terms'    => $current_filter,
    ] ];
}
$works_query = new WP_Query( $query_args );

// フィルターボタン用カテゴリ
$works_cats = get_terms( [
    'taxonomy'   => 'works_cat',
    'hide_empty' => true,
] );
?>
<main id="main" role="main">

<section aria-labelledby="page-hero-h1" class="page-hero">
  <div class="page-hero-inner">
    <span class="page-hero-eyebrow fu">WORKS</span>
    <h1 class="page-hero-h1 fu" id="page-hero-h1" style="transition-delay:.08s">
      実績が、証明する。
    </h1>
    <p class="page-hero-desc fu" style="transition-delay:.16s">
      WEB制作・デジタルマーケティング支援実績。<br/>
      私たちが手がけた制作・支援事例をご覧ください。
    </p>
  </div>
</section>

<nav aria-label="パンくずリスト" class="breadcrumb">
  <ol>
    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a></li>
    <li><span aria-current="page">制作実績</span></li>
  </ol>
</nav>

<!-- フィルター -->
<section aria-label="絞り込み" class="filter-sec">
  <div class="filter-inner">
    <span class="filter-label">絞り込み：</span>
    <a href="<?php echo esc_url( get_permalink() ); ?>"
       class="filter-btn<?php echo $current_filter === 'all' ? ' active' : ''; ?>">すべて</a>
    <?php if ( ! is_wp_error( $works_cats ) && $works_cats ) : ?>
      <?php foreach ( $works_cats as $term ) : ?>
      <a href="<?php echo esc_url( add_query_arg( 'cat', $term->slug, get_permalink() ) ); ?>"
         class="filter-btn<?php echo $current_filter === $term->slug ? ' active' : ''; ?>">
        <?php echo esc_html( $term->name ); ?>
      </a>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</section>

<section aria-labelledby="works-list-h2" class="works-list-sec">
  <div class="works-list-inner">
    <div class="works-grid" id="works-grid">

      <?php if ( $works_query->have_posts() ) : ?>
        <?php while ( $works_query->have_posts() ) : $works_query->the_post(); ?>
          <?php
          $number   = get_post_meta( get_the_ID(), '_works_number',   true );
          $category = get_post_meta( get_the_ID(), '_works_category', true );
          $client   = get_post_meta( get_the_ID(), '_works_client',   true );
          $industry = get_post_meta( get_the_ID(), '_works_industry', true );
          $service  = get_post_meta( get_the_ID(), '_works_service',  true );
          $thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'large' );
          ?>
          <article class="works-card fu">
            <a class="works-card-link" href="<?php the_permalink(); ?>">
              <?php if ( $thumb_url ) : ?>
              <div class="works-card-img-wrap">
                <img alt="<?php echo esc_attr( $client ); ?>" loading="lazy"
                     src="<?php echo esc_url( $thumb_url ); ?>"/>
              </div>
              <?php endif; ?>
              <div class="works-card-body">
                <div class="works-card-meta-top">
                  <?php if ( $number ) : ?>
                  <span class="works-card-num">WORKS — <?php echo str_pad( esc_html( $number ), 2, '0', STR_PAD_LEFT ); ?></span>
                  <?php endif; ?>
                  <?php if ( $category ) : ?>
                  <span class="works-card-cat"><?php echo esc_html( $category ); ?></span>
                  <?php endif; ?>
                </div>
                <h2 class="works-card-title"><?php echo esc_html( $client ); ?></h2>
                <div class="works-card-info">
                  <?php if ( $industry ) : ?>
                  <div class="works-card-info-item">
                    <span class="works-card-info-label">業種</span>
                    <span class="works-card-info-val"><?php echo esc_html( $industry ); ?></span>
                  </div>
                  <?php endif; ?>
                  <?php if ( $service ) : ?>
                  <div class="works-card-info-item">
                    <span class="works-card-info-label">施策</span>
                    <span class="works-card-info-val"><?php echo esc_html( $service ); ?></span>
                  </div>
                  <?php endif; ?>
                </div>
                <span class="works-card-read">VIEW MORE <svg fill="none" height="16" viewBox="0 0 16 16" width="16"><path d="M3 8h10M9 4l4 4-4 4" stroke="#28282D" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg></span>
              </div>
            </a>
          </article>
        <?php endwhile; wp_reset_postdata(); ?>
      <?php else : ?>
        <p style="padding:40px 20px;text-align:center;color:#666;grid-column:1/-1;">現在、実績はありません。</p>
      <?php endif; ?>

    </div>
    <nav aria-label="ページネーション" class="pagination" id="pagination"></nav>
  </div>
</section>

<!-- CTA -->
<section aria-labelledby="cta-h2" class="cta" id="contact">
  <div class="cta-wrap">
    <p class="cta-eyebrow fu">FREE CONSULTATION</p>
    <h2 class="cta-h2 fu" id="cta-h2" style="transition-delay:.1s">
      <span class="cta-h2-line">まず、お話してみませんか。</span>
      <span class="cta-h2-line">初回相談は無料です。</span>
    </h2>
    <p class="cta-body fu" style="transition-delay:.2s">
      「何から始めればいいかわからない」という段階でも構いません。<br>
      現状のヒアリングから、最適な施策をご提案します。
    </p>
    <div class="cta-actions fu" style="transition-delay:.3s">
      <a aria-label="無料相談を申し込む" class="btn-cta" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">無料相談を申し込む</a>
      <div class="cta-tel-wrap">
        <p class="cta-tel-label">お電話でのご相談</p>
        <a aria-label="電話番号 078-806-8338" class="cta-tel" href="tel:0788068338">078-806-8338</a>
      </div>
    </div>
  </div>
</section>

</main>

<!-- パンくずリスト SP（フッター直前） -->
<nav aria-label="パンくずリスト（スマートフォン）" class="breadcrumb-sp">
  <ol>
    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a></li>
    <li><span aria-current="page">制作実績</span></li>
  </ol>
</nav>

<?php get_footer(); ?>

<script>
(function(){
  const obs = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting) { e.target.classList.add('on'); obs.unobserve(e.target); }
    });
  }, { threshold: 0.1 });
  document.querySelectorAll('.fu').forEach(el => obs.observe(el));
})();
</script>
