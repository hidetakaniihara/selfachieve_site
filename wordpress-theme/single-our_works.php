<?php get_header(); ?>

<main class="main" role="main">
  <?php while ( have_posts() ) : the_post(); ?>
  <div class="page-hero">
    <div class="page-hero-inner">
      <p class="page-hero-eyebrow">WORKS</p>
      <h1 class="page-hero-h1"><?php the_title(); ?></h1>
      <div class="works-card-tags" style="justify-content: center; margin-top: 16px;">
        <?php
        $terms = get_the_terms( get_the_ID(), 'works_category' );
        if ( $terms && ! is_wp_error( $terms ) ) :
            foreach ( $terms as $term ) :
        ?>
          <span class="works-card-tag"><?php echo esc_html( $term->name ); ?></span>
        <?php
            endforeach;
        endif;
        ?>
      </div>
    </div>
  </div>

  <div class="breadcrumb">
    <div class="breadcrumb-inner">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">HOME</a>
      <span class="breadcrumb-sep">&gt;</span>
      <a href="<?php echo esc_url( home_url( '/works/' ) ); ?>">制作実績</a>
      <span class="breadcrumb-sep">&gt;</span>
      <span class="breadcrumb-current"><?php the_title(); ?></span>
    </div>
  </div>

  <article class="article-content">
    <div class="article-inner">
      <div class="works-detail-img">
        <?php if ( has_post_thumbnail() ) : ?>
          <?php the_post_thumbnail( 'full' ); ?>
        <?php endif; ?>
      </div>

      <div class="works-detail-info">
        <dl class="result-dl-row">
          <dt>所在地</dt>
          <dd><?php echo esc_html( get_field( 'works_location' ) ); ?></dd>
        </dl>
        <dl class="result-dl-row">
          <dt>実施施策</dt>
          <dd><?php echo esc_html( get_field( 'works_measures' ) ); ?></dd>
        </dl>
      </div>

      <div class="works-detail-body">
        <?php the_content(); ?>
      </div>

      <?php if ( have_rows( 'works_results' ) ) : ?>
      <section class="result-block">
        <h2 class="sec-title">数字でわかる結果</h2>
        <div class="result-cards">
          <?php while ( have_rows( 'works_results' ) ) : the_row(); ?>
          <div class="result-card">
            <p class="result-metric-label"><?php echo esc_html( get_sub_field( 'label' ) ); ?></p>
            <p class="result-metric-num"><?php echo esc_html( get_sub_field( 'num' ) ); ?><span class="result-metric-unit"><?php echo esc_html( get_sub_field( 'unit' ) ); ?></span></p>
          </div>
          <?php endwhile; ?>
        </div>
      </section>
      <?php endif; ?>

      <?php if ( have_rows( 'works_points' ) ) : ?>
      <section class="point-block">
        <h2 class="sec-title">制作ポイント</h2>
        <div class="point-list">
          <?php while ( have_rows( 'works_points' ) ) : the_row(); ?>
          <div class="point-item">
            <h3 class="point-title"><?php echo esc_html( get_sub_field( 'title' ) ); ?></h3>
            <p class="point-desc"><?php echo nl2br( esc_html( get_sub_field( 'desc' ) ) ); ?></p>
          </div>
          <?php endwhile; ?>
        </div>
      </section>
      <?php endif; ?>

    </div>
  </article>

  <div class="breadcrumb-sp">
    <div class="breadcrumb-inner">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">HOME</a>
      <span class="breadcrumb-sep">&gt;</span>
      <a href="<?php echo esc_url( home_url( '/works/' ) ); ?>">制作実績</a>
      <span class="breadcrumb-sep">&gt;</span>
      <span class="breadcrumb-current"><?php the_title(); ?></span>
    </div>
  </div>
  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
