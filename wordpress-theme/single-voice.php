<?php
/**
 * お客さまの声 詳細テンプレート
 * single-voice.php
 */
get_header();

$number      = get_post_meta( get_the_ID(), '_voice_number',      true );
$company     = get_post_meta( get_the_ID(), '_voice_company',     true );
$industry    = get_post_meta( get_the_ID(), '_voice_industry',    true );
$service_tag = get_post_meta( get_the_ID(), '_voice_service_tag', true );
$site_url    = get_post_meta( get_the_ID(), '_voice_site_url',    true );
$thumb_url   = get_the_post_thumbnail_url( get_the_ID(), 'full' );

$number_label = $number ? 'VOICE No.' . str_pad( $number, 2, '0', STR_PAD_LEFT ) : 'VOICE';
?>
<main id="main" role="main">

<!-- ページヒーロー -->
<section aria-labelledby="voice-title" class="page-hero">
  <div class="page-hero-inner">
    <span class="page-hero-eyebrow fu"><?php echo esc_html( $number_label ); ?></span>
    <h1 class="fu" id="voice-title" style="transition-delay:.08s;"><?php the_title(); ?></h1>
  </div>
</section>

<!-- パンくずリスト -->
<nav aria-label="パンくずリスト" class="breadcrumb">
  <ol>
    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a></li>
    <li><a href="<?php echo esc_url( home_url( '/voice/' ) ); ?>">お客さまの声</a></li>
    <li><span aria-current="page"><?php echo esc_html( $company ?: get_the_title() ); ?></span></li>
  </ol>
</nav>

<!-- クライアント情報 -->
<div class="client-info fu">
  <div class="client-info-main">
    <div class="client-meta">
      <?php if ( $industry ) : ?>
      <div class="client-meta-item">
        <span class="client-meta-label">業　種</span>
        <span class="client-meta-val"><?php echo esc_html( $industry ); ?></span>
      </div>
      <?php endif; ?>
      <?php if ( $company ) : ?>
      <div class="client-meta-item">
        <span class="client-meta-label">会社名</span>
        <span class="client-meta-val"><?php echo esc_html( $company ); ?></span>
      </div>
      <?php endif; ?>
    </div>
    <?php if ( $service_tag ) : ?>
    <div class="client-service">
      <span class="client-service-label">依頼内容</span>
      <span class="client-service-tag"><?php echo esc_html( $service_tag ); ?></span>
    </div>
    <?php endif; ?>
    <?php if ( $site_url ) : ?>
    <div class="client-url">
      <span class="client-url-label">サイトURL</span>
      <a class="client-url-link" href="<?php echo esc_url( $site_url ); ?>" rel="noopener noreferrer" target="_blank"><?php echo esc_html( $site_url ); ?></a>
    </div>
    <?php endif; ?>
  </div>
  <?php if ( $thumb_url ) : ?>
  <div class="client-img">
    <img alt="<?php echo esc_attr( $company ); ?>" height="614" loading="eager"
         src="<?php echo esc_url( $thumb_url ); ?>" width="921"/>
  </div>
  <?php endif; ?>
</div>

<!-- インタビュー本文 -->
<section aria-label="インタビュー" class="interview-sec">
  <div class="interview-inner">
    <?php the_content(); ?>
  </div>
</section>

<!-- 一覧へ戻る -->
<div class="back-sec">
  <div class="back-inner fu">
    <a class="back-link" href="<?php echo esc_url( home_url( '/voice/' ) ); ?>">
      <svg fill="none" height="16" viewBox="0 0 16 16" width="16"><path d="M13 8H3M7 12l-4-4 4-4" stroke="#28282D" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg>
      お客さまの声一覧へ
    </a>
  </div>
</div>

<!-- CTA -->
<section aria-labelledby="cta-h2" class="cta-sec" id="contact">
  <div class="cta-wrap">
    <span class="cta-eyebrow fu">FREE CONSULTATION</span>
    <h2 class="cta-h2 fu" id="cta-h2" style="transition-delay:.1s">
      <span class="cta-h2-line">まず、お話してみませんか。</span>
      <span class="cta-h2-line">初回相談は無料です。</span>
    </h2>
    <p class="cta-body fu" style="transition-delay:.15s">
      15分の無料相談で、貴社の課題を整理します。<br/>
      「何から始めればいいかわからない」という段階でも大丈夫です。
    </p>
    <div class="cta-actions fu" style="transition-delay:.2s">
      <a class="btn-cta" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">無料相談を申し込む</a>
    </div>
  </div>
</section>

</main>
<?php get_footer(); ?>
