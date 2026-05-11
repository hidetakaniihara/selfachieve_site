<?php get_header(); ?>

<main class="main" role="main">
  <?php while ( have_posts() ) : the_post(); ?>
  <div class="page-hero">
    <div class="page-hero-inner">
      <p class="page-hero-eyebrow">VOICE</p>
      <h1 class="page-hero-h1"><?php the_title(); ?></h1>
    </div>
  </div>

  <div class="breadcrumb">
    <div class="breadcrumb-inner">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">HOME</a>
      <span class="breadcrumb-sep">&gt;</span>
      <a href="<?php echo esc_url( home_url( '/voice/' ) ); ?>">お客様の声</a>
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

      <div class="works-detail-body">
        <?php the_content(); ?>
      </div>

      <div class="voice-qa-block">
        <?php for ( $i = 1; $i <= 4; $i++ ) : 
            $q_field = 'voice_q0' . $i;
            $a_field = 'voice_a0' . $i;
            $img_field = 'voice_img_0' . $i;
            
            $q_text = get_field( $q_field );
            $a_text = get_field( $a_field );
            $img_id = get_field( $img_field );
            
            if ( $q_text && $a_text ) :
        ?>
        <div class="voice-qa-item">
          <div class="voice-q">
            <span class="voice-q-icon">Q</span>
            <h3 class="voice-q-text"><?php echo esc_html( $q_text ); ?></h3>
          </div>
          <div class="voice-a">
            <span class="voice-a-icon">A</span>
            <div class="voice-a-content">
              <p class="voice-a-text"><?php echo nl2br( esc_html( $a_text ) ); ?></p>
              <?php if ( $img_id ) : ?>
                <div class="voice-a-img">
                  <?php echo wp_get_attachment_image( $img_id, 'large' ); ?>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <?php 
            endif;
        endfor; 
        ?>
      </div>

    </div>
  </article>

  <div class="breadcrumb-sp">
    <div class="breadcrumb-inner">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">HOME</a>
      <span class="breadcrumb-sep">&gt;</span>
      <a href="<?php echo esc_url( home_url( '/voice/' ) ); ?>">お客様の声</a>
      <span class="breadcrumb-sep">&gt;</span>
      <span class="breadcrumb-current"><?php the_title(); ?></span>
    </div>
  </div>
  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
