<?php get_header(); ?>

<main class="main" role="main">
  <div class="page-hero">
    <div class="page-hero-inner">
      <p class="page-hero-eyebrow">WORKS</p>
      <h1 class="page-hero-h1">制作実績</h1>
      <p class="page-hero-desc">セルフアチーブが手がけたWEB集客の成功事例をご紹介します。</p>
    </div>
  </div>

  <div class="breadcrumb">
    <div class="breadcrumb-inner">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">HOME</a>
      <span class="breadcrumb-sep">&gt;</span>
      <span class="breadcrumb-current">制作実績</span>
    </div>
  </div>

  <section class="works-list-sec">
    <div class="works-list-inner">
      <div class="works-grid">
        <?php if ( have_posts() ) : ?>
          <?php while ( have_posts() ) : the_post(); ?>
            <a href="<?php the_permalink(); ?>" class="works-card">
              <div class="works-card-img">
                <?php if ( has_post_thumbnail() ) : ?>
                  <?php the_post_thumbnail( 'large' ); ?>
                <?php else : ?>
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/no-image.png" alt="No Image">
                <?php endif; ?>
              </div>
              <div class="works-card-body">
                <div class="works-card-tags">
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
                <h2 class="works-card-co"><?php the_title(); ?></h2>
                <?php if ( get_field( 'works_result_text' ) ) : ?>
                  <p class="works-card-result"><?php echo esc_html( get_field( 'works_result_text' ) ); ?></p>
                <?php endif; ?>
              </div>
            </a>
          <?php endwhile; ?>
        <?php else : ?>
          <p>制作実績がありません。</p>
        <?php endif; ?>
      </div>

      <?php selfachieve_pagination(); ?>
    </div>
  </section>

  <div class="breadcrumb-sp">
    <div class="breadcrumb-inner">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">HOME</a>
      <span class="breadcrumb-sep">&gt;</span>
      <span class="breadcrumb-current">制作実績</span>
    </div>
  </div>
</main>

<?php get_footer(); ?>
