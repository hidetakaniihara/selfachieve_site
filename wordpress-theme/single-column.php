<?php
/**
 * コラム詳細テンプレート
 * single-column.php
 */
get_header();

$reading_time = get_post_meta( get_the_ID(), '_column_reading_time', true );
$updated      = get_post_meta( get_the_ID(), '_column_updated', true );
$author_name  = get_post_meta( get_the_ID(), '_column_author_name', true );
$cats         = get_the_terms( get_the_ID(), 'column_cat' );
$cat_name     = ( $cats && ! is_wp_error( $cats ) ) ? $cats[0]->name : '';
$cat_slug     = ( $cats && ! is_wp_error( $cats ) ) ? $cats[0]->slug : '';
$pub_date     = get_the_date( 'Y年n月j日' );
$upd_date     = $updated ? date( 'Y年n月j日', strtotime( $updated ) ) : '';
$thumb_url    = get_the_post_thumbnail_url( get_the_ID(), 'full' );
?>
<main id="main" role="main">

  <!-- BREADCRUMB -->
  <nav class="breadcrumb" aria-label="パンくずリスト">
    <ol>
      <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a></li>
      <li><a href="<?php echo esc_url( home_url( '/columns/' ) ); ?>">コラム</a></li>
      <?php if ( $cat_name ) : ?>
      <li><a href="<?php echo esc_url( add_query_arg( 'cat', $cat_slug, home_url( '/columns/' ) ) ); ?>"><?php echo esc_html( $cat_name ); ?></a></li>
      <?php endif; ?>
      <li><span aria-current="page"><?php the_title(); ?></span></li>
    </ol>
  </nav>

  <!-- ARTICLE -->
  <article class="column-article-sec" itemscope itemtype="https://schema.org/Article">
    <div class="column-article-inner">

      <!-- ヘッダー -->
      <header class="article-header">
        <?php if ( $cat_name ) : ?>
        <span class="column-cat-badge column-cat-<?php echo esc_attr( $cat_slug ); ?>"><?php echo esc_html( $cat_name ); ?></span>
        <?php endif; ?>
        <h1 class="article-title fu" itemprop="headline"><?php the_title(); ?></h1>
        <div class="article-meta">
          <span class="article-meta-item">
            <svg fill="none" height="14" viewBox="0 0 24 24" width="14"><path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2z" stroke="#666" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg>
            公開：<time itemprop="datePublished" datetime="<?php echo get_the_date( 'Y-m-d' ); ?>"><?php echo esc_html( $pub_date ); ?></time>
          </span>
          <?php if ( $upd_date ) : ?>
          <span class="article-meta-item">
            更新：<time itemprop="dateModified" datetime="<?php echo esc_attr( $updated ); ?>"><?php echo esc_html( $upd_date ); ?></time>
          </span>
          <?php endif; ?>
          <?php if ( $reading_time ) : ?>
          <span class="article-meta-item">
            <svg fill="none" height="14" viewBox="0 0 24 24" width="14"><circle cx="12" cy="12" r="10" stroke="#666" stroke-width="1.5"></circle><path d="M12 6v6l4 2" stroke="#666" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg>
            約<?php echo esc_html( $reading_time ); ?>分で読めます
          </span>
          <?php endif; ?>
          <?php if ( $author_name ) : ?>
          <span class="article-meta-item">
            <svg fill="none" height="14" viewBox="0 0 24 24" width="14"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" stroke="#666" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path><circle cx="12" cy="7" r="4" stroke="#666" stroke-width="1.5"></circle></svg>
            <?php echo esc_html( $author_name ); ?>
          </span>
          <?php endif; ?>
        </div>
      </header>

      <!-- アイキャッチ -->
      <?php if ( $thumb_url ) : ?>
      <div class="article-eyecatch">
        <img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php the_title_attribute(); ?>" loading="eager" itemprop="image">
      </div>
      <?php endif; ?>

      <!-- 本文 -->
      <div class="article-content" itemprop="articleBody">
        <?php the_content(); ?>
      </div>

    </div>
  </article>

  <!-- 一覧へ戻る -->
  <div class="back-sec">
    <div class="back-inner fu">
      <a class="back-link" href="<?php echo esc_url( home_url( '/columns/' ) ); ?>">
        <svg fill="none" height="16" viewBox="0 0 16 16" width="16"><path d="M13 8H3M7 12l-4-4 4-4" stroke="#28282D" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg>
        コラム一覧へ
      </a>
    </div>
  </div>

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
