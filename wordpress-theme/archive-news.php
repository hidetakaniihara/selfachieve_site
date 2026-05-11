<?php get_header(); ?>

<main class="main" role="main">
  <div class="page-hero">
    <div class="page-hero-inner">
      <p class="page-hero-eyebrow">NEWS</p>
      <h1 class="page-hero-h1">お知らせ</h1>
      <p class="page-hero-desc">セルフアチーブからの最新情報をお届けします。</p>
    </div>
  </div>

  <div class="breadcrumb">
    <div class="breadcrumb-inner">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">HOME</a>
      <span class="breadcrumb-sep">&gt;</span>
      <span class="breadcrumb-current">お知らせ</span>
    </div>
  </div>

  <section class="news-list-sec">
    <div class="news-list-inner">
      <ul class="news-list">
        <?php if ( have_posts() ) : ?>
          <?php while ( have_posts() ) : the_post(); ?>
            <li class="news-item">
              <a href="<?php the_permalink(); ?>" class="news-link">
                <time class="news-date" datetime="<?php echo get_the_date( 'Y-m-d' ); ?>"><?php echo get_the_date( 'Y.m.d' ); ?></time>
                <span class="news-title"><?php the_title(); ?></span>
              </a>
            </li>
          <?php endwhile; ?>
        <?php else : ?>
          <li>お知らせがありません。</li>
        <?php endif; ?>
      </ul>

      <?php selfachieve_pagination(); ?>
    </div>
  </section>

  <div class="breadcrumb-sp">
    <div class="breadcrumb-inner">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">HOME</a>
      <span class="breadcrumb-sep">&gt;</span>
      <span class="breadcrumb-current">お知らせ</span>
    </div>
  </div>
</main>

<?php get_footer(); ?>
