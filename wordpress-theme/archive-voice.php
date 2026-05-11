<?php get_header(); ?>

<main class="main" role="main">
  <div class="page-hero">
    <div class="page-hero-inner">
      <p class="page-hero-eyebrow">VOICE</p>
      <h1 class="page-hero-h1">お客様の声</h1>
      <p class="page-hero-desc">セルフアチーブのサービスをご利用いただいたお客様のリアルな声をご紹介します。</p>
    </div>
  </div>

  <div class="breadcrumb">
    <div class="breadcrumb-inner">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">HOME</a>
      <span class="breadcrumb-sep">&gt;</span>
      <span class="breadcrumb-current">お客様の声</span>
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
                <h2 class="works-card-co"><?php the_title(); ?></h2>
                <?php if ( get_field( 'voice_quote_short' ) ) : ?>
                  <p class="works-card-result"><?php echo esc_html( get_field( 'voice_quote_short' ) ); ?></p>
                <?php endif; ?>
              </div>
            </a>
          <?php endwhile; ?>
        <?php else : ?>
          <p>お客様の声がありません。</p>
        <?php endif; ?>
      </div>

      <?php selfachieve_pagination(); ?>
    </div>
  </section>

  <div class="breadcrumb-sp">
    <div class="breadcrumb-inner">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">HOME</a>
      <span class="breadcrumb-sep">&gt;</span>
      <span class="breadcrumb-current">お客様の声</span>
    </div>
  </div>
</main>

<?php get_footer(); ?>
