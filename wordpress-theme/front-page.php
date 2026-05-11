<?php get_header(); ?>

<main class="main" role="main">
  <!-- KV -->
  <section class="kv">
    <div class="kv-inner">
      <div class="kv-content">
        <h1 class="kv-h1">
          <span class="kv-h1-line">WEB集客の</span>
          <span class="kv-h1-line">「わからない」を</span>
          <span class="kv-h1-line">「わかる」に変える。</span>
        </h1>
        <p class="kv-desc">
          セルフアチーブは、WEB集客の戦略設計から<br>
          実行・改善までを伴走するパートナーです。
        </p>
        <div class="kv-btns">
          <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-primary">無料相談はこちら</a>
          <a href="<?php echo esc_url( home_url( '/works/' ) ); ?>" class="btn-secondary">制作実績を見る</a>
        </div>
      </div>
      <div class="kv-img-wrap">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/kv_img.webp" alt="WEB集客のサポート" class="kv-img" width="600" height="400" fetchpriority="high">
      </div>
    </div>
  </section>

  <!-- 課題から探す -->
  <section id="challenge" class="sec-challenge">
    <div class="sec-inner">
      <h2 class="sec-title">課題から探す</h2>
      <div class="challenge-grid">
        <a href="<?php echo esc_url( home_url( '/strategy/' ) ); ?>" class="challenge-card">
          <h3 class="challenge-card-title">戦略・全体</h3>
          <p class="challenge-card-desc">なんか、うまくいかない…</p>
        </a>
        <a href="<?php echo esc_url( home_url( '/seo/' ) ); ?>" class="challenge-card">
          <h3 class="challenge-card-title">集客</h3>
          <p class="challenge-card-desc">サイトへの訪問者を増やしたい</p>
        </a>
        <a href="<?php echo esc_url( home_url( '/website/' ) ); ?>" class="challenge-card">
          <h3 class="challenge-card-title">成約</h3>
          <p class="challenge-card-desc">問い合わせ・売上を増やしたい</p>
        </a>
        <a href="<?php echo esc_url( home_url( '/sns/line/' ) ); ?>" class="challenge-card">
          <h3 class="challenge-card-title">再販・追客</h3>
          <p class="challenge-card-desc">一度来た人にまた来てほしい</p>
        </a>
      </div>
    </div>
  </section>

  <!-- サービスから探す -->
  <section id="service" class="sec-service">
    <div class="sec-inner">
      <h2 class="sec-title">サービスから探す</h2>
      <div class="service-grid">
        <a href="<?php echo esc_url( home_url( '/strategy/' ) ); ?>" class="service-card">WEB戦略設計</a>
        <a href="<?php echo esc_url( home_url( '/seo/' ) ); ?>" class="service-card">SEO対策</a>
        <a href="<?php echo esc_url( home_url( '/meo/' ) ); ?>" class="service-card">MEO対策</a>
        <a href="<?php echo esc_url( home_url( '/listing/' ) ); ?>" class="service-card">リスティング広告</a>
        <a href="<?php echo esc_url( home_url( '/website/' ) ); ?>" class="service-card">ホームページ制作</a>
        <a href="<?php echo esc_url( home_url( '/ai-automation/' ) ); ?>" class="service-card">AI業務効率化</a>
      </div>
    </div>
  </section>

  <!-- 制作実績 -->
  <section class="sec-works">
    <div class="sec-inner">
      <div class="sec-header">
        <h2 class="sec-title">制作実績</h2>
        <a href="<?php echo esc_url( home_url( '/works/' ) ); ?>" class="sec-link">すべて見る</a>
      </div>
      <div class="works-grid">
        <?php
        $args = array(
            'post_type'      => 'our_works',
            'posts_per_page' => 3,
        );
        $works_query = new WP_Query( $args );
        if ( $works_query->have_posts() ) :
            while ( $works_query->have_posts() ) : $works_query->the_post();
        ?>
        <a href="<?php the_permalink(); ?>" class="works-card">
          <div class="works-card-img">
            <?php if ( has_post_thumbnail() ) : ?>
              <?php the_post_thumbnail( 'medium' ); ?>
            <?php else : ?>
              <img src="<?php echo get_template_directory_uri(); ?>/assets/no-image.png" alt="No Image">
            <?php endif; ?>
          </div>
          <div class="works-card-body">
            <h3 class="works-card-title"><?php the_title(); ?></h3>
            <?php if ( get_field( 'works_result_text' ) ) : ?>
              <p class="works-card-result"><?php echo esc_html( get_field( 'works_result_text' ) ); ?></p>
            <?php endif; ?>
          </div>
        </a>
        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
      </div>
    </div>
  </section>

  <!-- お知らせ -->
  <section class="sec-news">
    <div class="sec-inner">
      <div class="sec-header">
        <h2 class="sec-title">お知らせ</h2>
        <a href="<?php echo esc_url( home_url( '/news/' ) ); ?>" class="sec-link">すべて見る</a>
      </div>
      <ul class="news-list">
        <?php
        $args = array(
            'post_type'      => 'news',
            'posts_per_page' => 3,
        );
        $news_query = new WP_Query( $args );
        if ( $news_query->have_posts() ) :
            while ( $news_query->have_posts() ) : $news_query->the_post();
        ?>
        <li class="news-item">
          <a href="<?php the_permalink(); ?>" class="news-link">
            <time class="news-date" datetime="<?php echo get_the_date( 'Y-m-d' ); ?>"><?php echo get_the_date( 'Y.m.d' ); ?></time>
            <span class="news-title"><?php the_title(); ?></span>
          </a>
        </li>
        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
      </ul>
    </div>
  </section>

</main>

<?php get_footer(); ?>
