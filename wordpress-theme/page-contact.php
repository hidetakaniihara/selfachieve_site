<?php
/**
 * Template Name: お問い合わせ
 */
get_header(); ?>

<main class="main" role="main">
  <?php while ( have_posts() ) : the_post(); ?>
  <div class="page-hero">
    <div class="page-hero-inner">
      <p class="page-hero-eyebrow">CONTACT</p>
      <h1 class="page-hero-h1"><?php the_title(); ?></h1>
      <p class="page-hero-desc">WEB集客に関するご相談や、サービスに関するご質問など、お気軽にお問い合わせください。</p>
    </div>
  </div>

  <div class="breadcrumb">
    <div class="breadcrumb-inner">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">HOME</a>
      <span class="breadcrumb-sep">&gt;</span>
      <span class="breadcrumb-current"><?php the_title(); ?></span>
    </div>
  </div>

  <section class="contact-sec">
    <div class="contact-inner">
      <div class="contact-form-wrap">
        <?php 
        // Contact Form 7 のショートコードを出力
        // ※実際のショートコードIDは環境に合わせて変更してください
        echo do_shortcode('[contact-form-7 id="1234" title="お問い合わせフォーム"]'); 
        ?>
      </div>
    </div>
  </section>

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
