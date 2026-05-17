<?php
/**
 * Template Name: お客さまの声一覧
 * page-voice.php
 */
get_header();

// フィルターカテゴリ
$current_filter = isset( $_GET['service'] ) ? sanitize_text_field( $_GET['service'] ) : 'all';

// クエリ
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$query_args = [
    'post_type'      => 'voice',
    'posts_per_page' => -1,
    'orderby'        => 'meta_value_num',
    'meta_key'       => '_voice_number',
    'order'          => 'DESC',
];
if ( $current_filter !== 'all' ) {
    $query_args['meta_query'] = [ [
        'key'     => '_voice_filter_cat',
        'value'   => $current_filter,
        'compare' => 'LIKE',
    ] ];
}
$voice_query = new WP_Query( $query_args );

// フィルターボタン用：全サービスタグの一覧
$filter_options = [
    'marketing' => 'WEB戦略設計',
    'web'       => 'WEBページ制作',
    'listing'   => 'WEB広告',
    'seo'       => 'SEO対策',
    'meo'       => 'MEO対策',
    'sns'       => 'SNSマーケティング',
];
?>
<main id="main" role="main">

<section aria-labelledby="page-hero-h1" class="page-hero">
  <div class="page-hero-inner">
    <span class="page-hero-eyebrow fu">VOICE</span>
    <h1 class="page-hero-h1 fu" id="page-hero-h1" style="transition-delay:.08s">伴走したお客様の声</h1>
    <p class="page-hero-desc fu" style="transition-delay:.16s">
      あらゆる業種・業態のお客様より、嬉しいお言葉をいただいております。
    </p>
  </div>
</section>

<nav aria-label="パンくずリスト" class="breadcrumb">
  <ol>
    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a></li>
    <li><span aria-current="page">お客さまの声</span></li>
  </ol>
</nav>

<!-- フィルター -->
<div class="filter-sec">
  <div class="filter-inner">
    <span class="filter-label">絞り込み：</span>
    <a href="<?php echo esc_url( get_permalink() ); ?>"
       class="filter-btn<?php echo $current_filter === 'all' ? ' active' : ''; ?>">すべて</a>
    <?php foreach ( $filter_options as $slug => $label ) : ?>
    <a href="<?php echo esc_url( add_query_arg( 'service', $slug, get_permalink() ) ); ?>"
       class="filter-btn<?php echo $current_filter === $slug ? ' active' : ''; ?>"><?php echo esc_html( $label ); ?></a>
    <?php endforeach; ?>
  </div>
</div>

<section aria-label="お客さまの声一覧" class="voice-list-sec">
  <div class="voice-list-inner">
    <div class="voice-grid" id="voice-list">

      <?php if ( $voice_query->have_posts() ) : ?>
        <?php while ( $voice_query->have_posts() ) : $voice_query->the_post(); ?>
          <?php
          $number      = get_post_meta( get_the_ID(), '_voice_number',      true );
          $company     = get_post_meta( get_the_ID(), '_voice_company',     true );
          $industry    = get_post_meta( get_the_ID(), '_voice_industry',    true );
          $service_tag = get_post_meta( get_the_ID(), '_voice_service_tag', true );
          $hover_quote = get_post_meta( get_the_ID(), '_voice_hover_quote', true );
          $filter_cat  = get_post_meta( get_the_ID(), '_voice_filter_cat',  true );
          $thumb_url   = get_the_post_thumbnail_url( get_the_ID(), 'large' );

          // サービスタグのCSSクラス
          $tag_class = '';
          if ( $service_tag ) {
              $tag_map = [
                  'SEO対策'         => 'tag-seo',
                  'MEO対策'         => 'tag-meo',
                  'リスティング広告' => 'tag-listing',
                  'SNS運用'         => 'tag-sns',
                  'SNSマーケティング' => 'tag-sns',
                  'WEBマーケティング' => 'tag-marketing',
                  'WEBページ制作'   => 'tag-web',
              ];
              $tag_class = $tag_map[ $service_tag ] ?? 'tag-web';
          }
          ?>
          <article class="voice-card fu" data-category="<?php echo esc_attr( $filter_cat ); ?>">
            <a class="voice-card-link" href="<?php the_permalink(); ?>">
              <div class="voice-card-img-wrap">
                <?php if ( $thumb_url ) : ?>
                <img alt="<?php echo esc_attr( $company ); ?>" height="614" loading="lazy"
                     src="<?php echo esc_url( $thumb_url ); ?>" width="921"/>
                <?php endif; ?>
                <div class="voice-card-overlay"></div>
                <?php if ( $hover_quote ) : ?>
                <p class="voice-card-hover-quote"><?php echo esc_html( $hover_quote ); ?></p>
                <?php endif; ?>
              </div>
              <div class="voice-card-body">
                <div class="voice-card-meta-top">
                  <?php if ( $number ) : ?>
                  <span class="voice-card-num">No.<?php echo str_pad( esc_html( $number ), 2, '0', STR_PAD_LEFT ); ?></span>
                  <?php endif; ?>
                  <?php if ( $service_tag ) : ?>
                  <span class="voice-card-tag <?php echo esc_attr( $tag_class ); ?>"><?php echo esc_html( $service_tag ); ?></span>
                  <?php endif; ?>
                </div>
                <h2 class="voice-card-title"><?php the_title(); ?></h2>
                <div class="voice-card-info">
                  <?php if ( $industry ) : ?>
                  <div class="voice-card-info-item">
                    <span class="voice-card-info-label">業種</span>
                    <span class="voice-card-info-val"><?php echo esc_html( $industry ); ?></span>
                  </div>
                  <?php endif; ?>
                  <?php if ( $company ) : ?>
                  <div class="voice-card-info-item">
                    <span class="voice-card-info-label">会社名</span>
                    <span class="voice-card-info-val"><?php echo esc_html( $company ); ?></span>
                  </div>
                  <?php endif; ?>
                </div>
                <span class="voice-card-read">READ MORE <svg fill="none" height="16" viewBox="0 0 16 16" width="16"><path d="M3 8h10M9 4l4 4-4 4" stroke="#28282D" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg></span>
              </div>
            </a>
          </article>
        <?php endwhile; wp_reset_postdata(); ?>
      <?php else : ?>
        <p style="padding:40px 20px;text-align:center;color:#666;grid-column:1/-1;">現在、お客さまの声はありません。</p>
      <?php endif; ?>

    </div>
  </div>
</section>

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
      <a aria-label="無料相談を申し込む" class="btn-cta" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">無料相談を申し込む</a>
      <div class="cta-tel-wrap">
        <p class="cta-tel-label">お電話でのご相談</p>
        <a aria-label="電話番号 078-806-8338" class="cta-tel" href="tel:0788068338">078-806-8338</a>
      </div>
    </div>
  </div>
</section>

</main>
<?php get_footer(); ?>
