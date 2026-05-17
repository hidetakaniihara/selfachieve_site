<?php
/**
 * Template Name: コラム一覧
 * page-columns.php
 */
get_header();

// カテゴリ一覧取得
$column_cats = get_terms( [
    'taxonomy'   => 'column_cat',
    'hide_empty' => true,
    'orderby'    => 'count',
    'order'      => 'DESC',
] );

// 現在のフィルターカテゴリ
$current_cat = isset( $_GET['cat'] ) ? sanitize_text_field( $_GET['cat'] ) : 'all';

// クエリ設定
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$query_args = [
    'post_type'      => 'column',
    'posts_per_page' => 12,
    'paged'          => $paged,
    'orderby'        => 'date',
    'order'          => 'DESC',
];
if ( $current_cat !== 'all' ) {
    $query_args['tax_query'] = [ [
        'taxonomy' => 'column_cat',
        'field'    => 'slug',
        'terms'    => $current_cat,
    ] ];
}
$col_query = new WP_Query( $query_args );

// 全件数
$total_query = new WP_Query( [
    'post_type'      => 'column',
    'posts_per_page' => -1,
    'fields'         => 'ids',
] );
$total_count = $total_query->found_posts;
wp_reset_postdata();
?>
<main id="main" role="main">

<section aria-labelledby="page-hero-h1" class="page-hero">
  <div class="page-hero-inner">
    <span class="page-hero-eyebrow fu">COLUMN</span>
    <h1 class="page-hero-h1 fu" id="page-hero-h1" style="transition-delay:.08s">
      知識が、武器になる。
    </h1>
    <p class="page-hero-desc fu" style="transition-delay:.16s">
      SEO・MEO・リスティング広告・SNS集客など、<br/>
      WEBマーケティングの実践知識を発信しています。
    </p>
  </div>
</section>

<nav aria-label="パンくずリスト" class="breadcrumb">
  <ol>
    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a></li>
    <li><span aria-current="page">コラム一覧</span></li>
  </ol>
</nav>

<!-- カテゴリフィルター -->
<div aria-label="カテゴリフィルター" class="filter-sec" role="navigation">
  <div class="filter-inner">
    <span class="filter-label">CATEGORY</span>
    <a href="<?php echo esc_url( get_permalink() ); ?>"
       class="filter-btn<?php echo $current_cat === 'all' ? ' active' : ''; ?>">
      すべて <span class="filter-btn-count"><?php echo esc_html( $total_count ); ?></span>
    </a>
    <?php if ( ! is_wp_error( $column_cats ) && $column_cats ) : ?>
      <?php foreach ( $column_cats as $term ) : ?>
        <a href="<?php echo esc_url( add_query_arg( 'cat', $term->slug, get_permalink() ) ); ?>"
           class="filter-btn<?php echo $current_cat === $term->slug ? ' active' : ''; ?>">
          <?php echo esc_html( $term->name ); ?> <span class="filter-btn-count"><?php echo esc_html( $term->count ); ?></span>
        </a>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>
</div>

<!-- 記事グリッド -->
<section aria-labelledby="columns-list-h2" class="columns-sec">
  <div class="columns-inner">
    <div class="columns-sec-head">
      <h2 class="columns-sec-title" id="columns-list-h2">
        <?php
        if ( $current_cat === 'all' ) {
            echo 'すべての記事';
        } else {
            $term_obj = get_term_by( 'slug', $current_cat, 'column_cat' );
            echo $term_obj ? esc_html( $term_obj->name ) : 'すべての記事';
        }
        ?>
      </h2>
      <p class="columns-count">全 <span><?php echo esc_html( $col_query->found_posts ); ?></span> 件</p>
    </div>

    <div class="columns-grid" id="columns-grid">
      <?php if ( $col_query->have_posts() ) : ?>
        <?php
        $is_first = true;
        while ( $col_query->have_posts() ) :
            $col_query->the_post();
            $cats         = get_the_terms( get_the_ID(), 'column_cat' );
            $cat_name     = ( $cats && ! is_wp_error( $cats ) ) ? $cats[0]->name : '';
            $cat_slug     = ( $cats && ! is_wp_error( $cats ) ) ? $cats[0]->slug : '';
            $reading_time = get_post_meta( get_the_ID(), '_column_reading_time', true );
            $author_name  = get_post_meta( get_the_ID(), '_column_author_name', true );
            $thumb_url    = get_the_post_thumbnail_url( get_the_ID(), 'large' );
            $date         = get_the_date( 'Y.m.d' );
            $excerpt      = get_the_excerpt();
        ?>
        <?php if ( $is_first ) : ?>
        <!-- フィーチャード（最初の1件） -->
        <article class="column-featured-card fu">
          <a href="<?php the_permalink(); ?>" class="column-featured-link">
            <?php if ( $thumb_url ) : ?>
            <div class="column-featured-img-wrap">
              <img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php the_title_attribute(); ?>" loading="eager" class="column-featured-img">
            </div>
            <?php endif; ?>
            <div class="column-featured-body">
              <?php if ( $cat_name ) : ?>
              <span class="column-cat-badge column-cat-<?php echo esc_attr( $cat_slug ); ?>"><?php echo esc_html( $cat_name ); ?></span>
              <?php endif; ?>
              <h2 class="column-featured-title"><?php the_title(); ?></h2>
              <?php if ( $excerpt ) : ?>
              <p class="column-featured-excerpt"><?php echo esc_html( $excerpt ); ?></p>
              <?php endif; ?>
              <div class="column-card-meta">
                <span class="column-date"><?php echo esc_html( $date ); ?></span>
                <?php if ( $reading_time ) : ?>
                <span class="column-reading-time">約<?php echo esc_html( $reading_time ); ?>分</span>
                <?php endif; ?>
                <?php if ( $author_name ) : ?>
                <span class="column-author"><?php echo esc_html( $author_name ); ?></span>
                <?php endif; ?>
              </div>
            </div>
          </a>
        </article>
        <?php $is_first = false; ?>
        <?php else : ?>
        <!-- 通常カード -->
        <article class="column-card fu">
          <a href="<?php the_permalink(); ?>" class="column-card-link">
            <?php if ( $thumb_url ) : ?>
            <div class="column-card-img-wrap">
              <img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" class="column-card-img">
            </div>
            <?php endif; ?>
            <div class="column-card-body">
              <?php if ( $cat_name ) : ?>
              <span class="column-cat-badge column-cat-<?php echo esc_attr( $cat_slug ); ?>"><?php echo esc_html( $cat_name ); ?></span>
              <?php endif; ?>
              <h3 class="column-card-title"><?php the_title(); ?></h3>
              <div class="column-card-meta">
                <span class="column-date"><?php echo esc_html( $date ); ?></span>
                <?php if ( $reading_time ) : ?>
                <span class="column-reading-time">約<?php echo esc_html( $reading_time ); ?>分</span>
                <?php endif; ?>
              </div>
            </div>
          </a>
        </article>
        <?php endif; ?>
        <?php endwhile; wp_reset_postdata(); ?>
      <?php else : ?>
        <p style="padding:40px 20px;text-align:center;color:#666;grid-column:1/-1;">記事が見つかりませんでした。</p>
      <?php endif; ?>
    </div>

    <!-- ページネーション -->
    <nav aria-label="ページネーション" class="pagination">
      <?php
      echo paginate_links( [
          'base'      => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
          'format'    => '?paged=%#%',
          'current'   => max( 1, get_query_var( 'paged' ) ),
          'total'     => $col_query->max_num_pages,
          'add_args'  => $current_cat !== 'all' ? [ 'cat' => $current_cat ] : [],
          'prev_text' => '← 前へ',
          'next_text' => '次へ →',
      ] );
      ?>
    </nav>
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
      「何から始めればいいかわからない」という段階でも構いません。
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
<?php get_footer(); ?>
