<?php get_header(); ?>

<main class="main" role="main">
  <?php while ( have_posts() ) : the_post(); ?>
  <div class="page-hero">
    <div class="page-hero-inner">
      <h1 class="page-hero-h1"><?php the_title(); ?></h1>
    </div>
  </div>

  <div class="breadcrumb">
    <div class="breadcrumb-inner">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">HOME</a>
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
      <span class="breadcrumb-current"><?php the_title(); ?></span>
    </div>
  </div>
  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
