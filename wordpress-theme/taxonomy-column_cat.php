<?php
/**
 * taxonomy-column_cat.php
 * コラム カテゴリアーカイブ用テンプレート
 */
get_header();

// カテゴリスラッグ → CSSクラスのマッピング
$cat_class_map = [
    'seo'      => 'cat-seo',
    'meo'      => 'cat-meo',
    'listing'  => 'cat-listing',
    'sns'      => 'cat-sns',
    'instagram'=> 'cat-instagram',
    'webdesign'=> 'cat-web',
    'marketing'=> 'cat-marketing',
    'strategy' => 'cat-strategy',
    'ai'       => 'cat-ai',
    'tiktok'   => 'cat-tiktok',
    'x'        => 'cat-x',
    'youtube'  => 'cat-youtube',
    'note'     => 'cat-note',
    'line'     => 'cat-line',
    'display'  => 'cat-display',
];

// 現在のカテゴリタームオブジェクト
$current_term = get_queried_object();
$current_slug = $current_term ? $current_term->slug : '';
$current_name = $current_term ? $current_term->name : '';

// カテゴリ一覧取得（フィルターボタン用）
$column_cats = get_terms( [
    'taxonomy'   => 'column_cat',
    'hide_empty' => true,
    'orderby'    => 'count',
    'order'      => 'DESC',
] );

// 全コラム件数
$total_query = new WP_Query( [
    'post_type'      => 'column',
    'posts_per_page' => -1,
    'fields'         => 'ids',
] );
$total_count = $total_query->found_posts;
wp_reset_postdata();

// ページネーション
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

// カードクエリ（WPのメインクエリを上書き）
$card_args = [
    'post_type'      => 'column',
    'posts_per_page' => 12,
    'paged'          => $paged,
    'orderby'        => 'date',
    'order'          => 'DESC',
    'tax_query'      => [ [
        'taxonomy' => 'column_cat',
        'field'    => 'slug',
        'terms'    => $current_slug,
    ] ],
];
$card_query = new WP_Query( $card_args );

// カテゴリページURL（ページネーション用）
$cat_base_url = get_term_link( $current_term );
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
    <li><a href="<?php echo esc_url( home_url( '/column/' ) ); ?>">コラム一覧</a></li>
    <li><span aria-current="page"><?php echo esc_html( $current_name ); ?></span></li>
  </ol>
</nav>

<!-- カテゴリフィルター -->
<div aria-label="カテゴリフィルター" class="filter-sec" role="navigation">
  <div class="filter-inner">
    <span class="filter-label">CATEGORY</span>
    <a href="<?php echo esc_url( home_url( '/column/' ) ); ?>" class="filter-btn">
      すべて <span class="filter-btn-count"><?php echo esc_html( $total_count ); ?></span>
    </a>
    <?php if ( ! is_wp_error( $column_cats ) && $column_cats ) : ?>
      <?php foreach ( $column_cats as $term ) : ?>
        <a href="<?php echo esc_url( get_term_link( $term ) ); ?>"
           class="filter-btn<?php echo $current_slug === $term->slug ? ' active' : ''; ?>">
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
      <h2 class="columns-sec-title" id="columns-list-h2"><?php echo esc_html( $current_name ); ?></h2>
      <p class="columns-count">全 <span><?php echo esc_html( $card_query->found_posts ); ?></span> 件</p>
    </div>

    <div class="columns-grid" id="columns-grid">
      <?php if ( $card_query->have_posts() ) : ?>
        <?php
        $card_idx = 0;
        while ( $card_query->have_posts() ) :
            $card_query->the_post();
            $cats      = get_the_terms( get_the_ID(), 'column_cat' );
            $cat_name  = ( $cats && ! is_wp_error( $cats ) ) ? $cats[0]->name : '';
            $cat_slug  = ( $cats && ! is_wp_error( $cats ) ) ? $cats[0]->slug : '';
            $cat_class = isset( $cat_class_map[ $cat_slug ] ) ? $cat_class_map[ $cat_slug ] : 'cat-web';
            $thumb_url = get_the_post_thumbnail_url( get_the_ID(), 'large' );
            $date      = get_the_date( 'Y.m.d' );
            $delay     = number_format( $card_idx * 0.04, 2 );
        ?>
        <article class="col-card fu" style="transition-delay:<?php echo esc_attr( $delay ); ?>s">
          <a href="<?php the_permalink(); ?>" class="col-card-link">
            <?php if ( $thumb_url ) : ?>
            <div class="col-card-img">
              <img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php the_title_attribute(); ?>" width="576" height="356" loading="lazy">
            </div>
            <?php else : ?>
            <div class="col-card-img">
              <div class="col-card-img-placeholder">
                <svg width="36" height="36" viewBox="0 0 24 24" fill="none"><rect x="3" y="3" width="18" height="18" rx="2" stroke="#ccc" stroke-width="1.5"/><circle cx="8.5" cy="8.5" r="1.5" stroke="#ccc" stroke-width="1.5"/><path d="M21 15l-5-5L5 21" stroke="#ccc" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </div>
            </div>
            <?php endif; ?>
            <div class="col-card-body">
              <div class="col-card-meta">
                <?php if ( $cat_name ) : ?>
                <span class="col-card-cat <?php echo esc_attr( $cat_class ); ?>"><?php echo esc_html( $cat_name ); ?></span>
                <?php endif; ?>
                <span class="col-card-date"><?php echo esc_html( $date ); ?></span>
              </div>
              <p class="col-card-title"><?php the_title(); ?></p>
              <div class="col-card-footer">
                <div class="col-card-arrow">
                  <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </div>
              </div>
            </div>
          </a>
        </article>
        <?php
        $card_idx++;
        endwhile;
        wp_reset_postdata();
        ?>
      <?php else : ?>
        <p style="padding:40px 20px;text-align:center;color:#666;grid-column:1/-1;">記事が見つかりませんでした。</p>
      <?php endif; ?>
    </div>

    <!-- ページネーション -->
    <?php
    $total_pages  = $card_query->max_num_pages;
    if ( $total_pages > 1 ) :
        $current_page = max( 1, $paged );
    ?>
    <nav aria-label="ページネーション" class="pagination" id="pagination">
      <?php
      // 前へボタン
      $prev_url = $current_page > 1 ? esc_url( trailingslashit( $cat_base_url ) . 'page/' . ( $current_page - 1 ) . '/' ) : '#';
      echo '<a href="' . $prev_url . '" class="pag-btn pag-prev' . ( $current_page === 1 ? ' disabled' : '' ) . '" aria-label="前のページ">';
      echo '<svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M10 3L5 8l5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>前へ</a>';

      // ページ番号
      for ( $i = 1; $i <= $total_pages; $i++ ) {
          $page_url = $i === 1 ? esc_url( $cat_base_url ) : esc_url( trailingslashit( $cat_base_url ) . 'page/' . $i . '/' );
          $active   = $i === $current_page ? ' active' : '';
          $aria     = $i === $current_page ? ' aria-current="page"' : '';
          echo '<a href="' . $page_url . '" class="pag-btn' . $active . '"' . $aria . ' aria-label="' . $i . 'ページ目">' . $i . '</a>';
      }

      // 次へボタン
      $next_url = $current_page < $total_pages ? esc_url( trailingslashit( $cat_base_url ) . 'page/' . ( $current_page + 1 ) . '/' ) : '#';
      echo '<a href="' . $next_url . '" class="pag-btn pag-next' . ( $current_page >= $total_pages ? ' disabled' : '' ) . '" aria-label="次のページ">';
      echo '次へ<svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M6 3l5 5-5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></a>';
      ?>
    </nav>
    <?php endif; ?>
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
<?php get_footer(); ?>
