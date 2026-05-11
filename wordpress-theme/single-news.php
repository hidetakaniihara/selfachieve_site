<?php get_header(); ?>

<main class="main" role="main">
  <?php while ( have_posts() ) : the_post(); ?>
  <div class="page-hero">
    <div class="page-hero-inner">
      <p class="page-hero-eyebrow">NEWS</p>
      <h1 class="page-hero-h1"><?php the_title(); ?></h1>
      <time class="page-hero-date" datetime="<?php echo get_the_date( 'Y-m-d' ); ?>"><?php echo get_the_date( 'Y.m.d' ); ?></time>
    </div>
  </div>

  <div class="breadcrumb">
    <div class="breadcrumb-inner">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">HOME</a>
      <span class="breadcrumb-sep">&gt;</span>
      <a href="<?php echo esc_url( home_url( '/news/' ) ); ?>">お知らせ</a>
      <span class="breadcrumb-sep">&gt;</span>
      <span class="breadcrumb-current"><?php the_title(); ?></span>
    </div>
  </div>

  <article class="article-content">
    <div class="article-inner">
      <div class="article-body">
        <?php the_content(); ?>
      </div>
    </div>
  </article>

  <div class="breadcrumb-sp">
    <div class="breadcrumb-inner">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">HOME</a>
      <span class="breadcrumb-sep">&gt;</span>
      <a href="<?php echo esc_url( home_url( '/news/' ) ); ?>">お知らせ</a>
      <span class="breadcrumb-sep">&gt;</span>
      <span class="breadcrumb-current"><?php the_title(); ?></span>
    </div>
  </div>
  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
