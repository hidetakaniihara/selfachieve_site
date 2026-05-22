<?php
/**
 * 実績 詳細テンプレート
 * single-works.php
 */
get_header();

$number     = get_post_meta( get_the_ID(), '_works_number',     true );
$category   = get_post_meta( get_the_ID(), '_works_category',   true );
$client     = get_post_meta( get_the_ID(), '_works_client',     true );
$location   = get_post_meta( get_the_ID(), '_works_location',   true );
$industry   = get_post_meta( get_the_ID(), '_works_industry',   true );
$service    = get_post_meta( get_the_ID(), '_works_service',    true );
$site_url   = get_post_meta( get_the_ID(), '_works_site_url',   true );
$pc_img_url = get_post_meta( get_the_ID(), '_works_pc_img_url', true );
$sp_img_url = get_post_meta( get_the_ID(), '_works_sp_img_url', true );

// 実績数値
$results = [];
for ( $i = 1; $i <= 3; $i++ ) {
    $num   = get_post_meta( get_the_ID(), "_works_result{$i}_num",   true );
    $unit  = get_post_meta( get_the_ID(), "_works_result{$i}_unit",  true );
    $pre   = get_post_meta( get_the_ID(), "_works_result{$i}_pre",   true );
    $title = get_post_meta( get_the_ID(), "_works_result{$i}_title", true );
    $desc  = get_post_meta( get_the_ID(), "_works_result{$i}_desc",  true );
    if ( $num || $title ) {
        $results[] = compact( 'num', 'unit', 'pre', 'title', 'desc' );
    }
}

// ポイント
$points = [];
for ( $i = 1; $i <= 3; $i++ ) {
    $head = get_post_meta( get_the_ID(), "_works_point{$i}_head", true );
    $body = get_post_meta( get_the_ID(), "_works_point{$i}_body", true );
    if ( $head || $body ) {
        $points[] = compact( 'head', 'body' );
    }
}

$number_label = $number ? 'WORKS — ' . str_pad( $number, 2, '0', STR_PAD_LEFT ) : 'WORKS';
?>
<main id="main" role="main">

<!-- ヒーロー -->
<section aria-labelledby="works-title" class="works-hero">
  <!-- パンくずリスト -->
  <nav aria-label="パンくずリスト" class="breadcrumb" style="position:absolute;top:72px;left:0;right:0;padding:10px 80px;background:transparent;border-bottom:none;">
    <ol>
      <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a></li>
      <li><a href="<?php echo esc_url( home_url( '/works/' ) ); ?>">制作実績</a></li>
      <li><span aria-current="page" style="color:#ffffff;"><?php echo esc_html( $client ?: get_the_title() ); ?></span></li>
    </ol>
  </nav>
  <div class="works-hero-inner">
    <span class="works-hero-eyebrow fu"><?php echo esc_html( $number_label ); ?></span>
    <?php if ( $category ) : ?>
    <span class="works-hero-category fu" style="transition-delay:.05s;"><?php echo esc_html( $category ); ?></span>
    <?php endif; ?>
    <h1 class="works-hero-client fu" id="works-title" style="transition-delay:.1s;">
      <?php echo esc_html( $client ?: get_the_title() ); ?><em> 様</em>
    </h1>
    <div class="works-hero-divider fu" style="transition-delay:.15s;"></div>
    <div class="works-hero-meta fu" style="transition-delay:.2s;">
      <?php if ( $industry ) : ?>
      <div class="works-hero-meta-item">
        <span class="works-hero-meta-label">業界</span>
        <span class="works-hero-meta-val"><?php echo esc_html( $industry ); ?></span>
      </div>
      <?php endif; ?>
      <?php if ( $service ) : ?>
      <div class="works-hero-meta-item">
        <span class="works-hero-meta-label">依頼内容</span>
        <span class="works-hero-meta-val"><?php echo esc_html( $service ); ?></span>
      </div>
      <?php endif; ?>
      <?php if ( $site_url ) : ?>
      <div class="works-hero-meta-item">
        <span class="works-hero-meta-label">サイトURL</span>
        <span class="works-hero-meta-val">
          <a href="<?php echo esc_url( $site_url ); ?>" rel="noopener noreferrer"
             style="color:#ffffff;text-decoration:underline;text-underline-offset:3px;" target="_blank">
            <?php echo esc_html( preg_replace( '#^https?://#', '', rtrim( $site_url, '/' ) ) ); ?>
          </a>
        </span>
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- プロジェクト概要 -->
<section aria-label="プロジェクト情報" class="project-meta-sec">
  <div class="project-meta-inner">
    <span class="project-meta-label fu">PROJECT OVERVIEW</span>
    <div class="project-meta-grid">
      <?php if ( $client ) : ?>
      <div class="project-meta-item fu" style="transition-delay:.05s;">
        <div aria-hidden="true" class="project-meta-icon">
          <svg fill="none" height="16" viewBox="0 0 24 24" width="16"><path d="M3 21h18M3 7v1a3 3 0 0 0 6 0V7m0 1a3 3 0 0 0 6 0V7m0 1a3 3 0 0 0 6 0V7H3l2-4h14l2 4" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg>
        </div>
        <span class="project-meta-key">クライアント</span>
        <span class="project-meta-val"><?php echo esc_html( $client ); ?></span>
      </div>
      <?php endif; ?>
      <?php if ( $location ) : ?>
      <div class="project-meta-item fu" style="transition-delay:.1s;">
        <div aria-hidden="true" class="project-meta-icon">
          <svg fill="none" height="16" viewBox="0 0 24 24" width="16"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg>
        </div>
        <span class="project-meta-key">所在地</span>
        <span class="project-meta-val"><?php echo esc_html( $location ); ?></span>
      </div>
      <?php endif; ?>
      <?php if ( $industry ) : ?>
      <div class="project-meta-item fu" style="transition-delay:.15s;">
        <div aria-hidden="true" class="project-meta-icon">
          <svg fill="none" height="16" viewBox="0 0 24 24" width="16"><rect height="14" rx="2" stroke="#fff" stroke-width="1.5" width="20" x="2" y="7"></rect><path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2" stroke="#fff" stroke-width="1.5"></path><line stroke="#fff" stroke-linecap="round" stroke-width="1.5" x1="12" x2="12" y1="12" y2="16"></line><line stroke="#fff" stroke-linecap="round" stroke-width="1.5" x1="10" x2="14" y1="14" y2="14"></line></svg>
        </div>
        <span class="project-meta-key">業種</span>
        <span class="project-meta-val"><?php echo esc_html( $industry ); ?></span>
      </div>
      <?php endif; ?>
      <?php if ( $service ) : ?>
      <div class="project-meta-item fu" style="transition-delay:.2s;">
        <div aria-hidden="true" class="project-meta-icon">
          <svg fill="none" height="16" viewBox="0 0 24 24" width="16"><path d="M9 12l2 2 4-4" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path><path d="M21 12c0 4.97-4.03 9-9 9s-9-4.03-9-9 4.03-9 9-9 9 4.03 9 9z" stroke="#fff" stroke-width="1.5"></path></svg>
        </div>
        <span class="project-meta-key">実施施策</span>
        <span class="project-meta-val"><?php echo esc_html( $service ); ?></span>
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- 数字でわかる実績 -->
<?php if ( ! empty( $results ) ) : ?>
<section aria-label="数字でわかる結果" class="results-sec">
  <div class="results-inner">
    <span class="results-label fu">RESULTS — 数字でわかる結果</span>
    <div class="results-grid">
      <?php foreach ( $results as $idx => $r ) : ?>
      <div class="result-item fu" style="transition-delay:<?php echo $idx * 0.05; ?>s;">
        <div class="result-num">
          <?php if ( $r['pre'] ) : ?>
          <span class="result-num-prefix"><?php echo esc_html( $r['pre'] ); ?></span>
          <?php endif; ?>
          <span class="result-count" data-target="<?php echo esc_attr( $r['num'] ); ?>">0</span>
          <?php if ( $r['unit'] ) : ?>
          <span class="result-num-unit"><?php echo esc_html( $r['unit'] ); ?></span>
          <?php endif; ?>
        </div>
        <?php if ( $r['title'] ) : ?>
        <p class="result-title"><?php echo esc_html( $r['title'] ); ?></p>
        <?php endif; ?>
        <?php if ( $r['desc'] ) : ?>
        <p class="result-desc"><?php echo esc_html( $r['desc'] ); ?></p>
        <?php endif; ?>
      </div>
      <?php endforeach; ?>
    </div>
    <p class="sp-swipe-hint">スワイプして見る</p>
  </div>
</section>
<?php endif; ?>

<!-- モックアップ -->
<?php if ( $pc_img_url || $sp_img_url ) : ?>
<section aria-label="制作物イメージ" class="mockup-sec">
  <div class="mockup-full-inner fu">
    <?php if ( $pc_img_url ) : ?>
    <div class="mockup-pc-wrap">
      <div class="mockup-pc">
        <img alt="<?php echo esc_attr( $client ); ?> PCサイト画面" loading="lazy"
             src="<?php echo esc_url( $pc_img_url ); ?>"/>
      </div>
    </div>
    <?php endif; ?>
    <?php if ( $sp_img_url ) : ?>
    <div class="mockup-sp-wrap">
      <div class="mockup-sp">
        <img alt="<?php echo esc_attr( $client ); ?> スマートフォンサイト画面" loading="lazy"
             src="<?php echo esc_url( $sp_img_url ); ?>"/>
      </div>
    </div>
    <?php endif; ?>
  </div>
  <?php if ( $site_url ) : ?>
  <div class="mockup-caption">
    <span class="mockup-caption-url">
      <a href="<?php echo esc_url( $site_url ); ?>" rel="noopener noreferrer" target="_blank"><?php echo esc_html( $site_url ); ?></a>
    </span>
  </div>
  <?php endif; ?>
</section>
<?php endif; ?>

<!-- 制作ポイント（本文 + カスタムフィールド） -->
<?php if ( ! empty( $points ) ) : ?>
<section aria-label="制作ポイント" class="point-sec">
  <?php foreach ( $points as $idx => $p ) : ?>
  <div class="point-block">
    <div class="point-block-inner">
      <div class="point-left fu">
        <div class="point-badge-wrap">
          <span class="point-badge">POINT <?php echo str_pad( $idx + 1, 2, '0', STR_PAD_LEFT ); ?></span>
          <span class="point-num"><?php echo str_pad( $idx + 1, 2, '0', STR_PAD_LEFT ); ?></span>
        </div>
      </div>
      <div class="point-right fu" style="transition-delay:.1s;">
        <?php if ( $p['head'] ) : ?>
        <h2 class="point-head"><?php echo esc_html( $p['head'] ); ?></h2>
        <?php endif; ?>
        <?php if ( $p['body'] ) : ?>
        <p class="point-body"><?php echo nl2br( esc_html( $p['body'] ) ); ?></p>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</section>
<?php endif; ?>

<!-- 本文（追加コンテンツがある場合） -->
<?php
$content = get_the_content();
if ( $content ) :
?>
<section class="works-content-sec">
  <div class="works-content-inner">
    <?php the_content(); ?>
  </div>
</section>
<?php endif; ?>

<!-- 一覧へ戻る -->
<div class="back-sec">
  <div class="back-inner fu">
    <a class="back-link" href="<?php echo esc_url( home_url( '/works/' ) ); ?>">
      <svg fill="none" height="16" viewBox="0 0 16 16" width="16"><path d="M13 8H3M7 12l-4-4 4-4" stroke="#28282D" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg>
      制作実績一覧へ
    </a>
  </div>
</div>

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

<!-- パンくずリスト SP（フッター直前） -->
<nav aria-label="パンくずリスト（スマートフォン）" class="breadcrumb-sp">
  <ol>
    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a></li>
    <li><a href="<?php echo esc_url( home_url( '/works/' ) ); ?>">制作実績</a></li>
    <li><span aria-current="page"><?php echo esc_html( $client ?: get_the_title() ); ?></span></li>
  </ol>
</nav>

<?php get_footer(); ?>

<script>
(function(){
  const obs = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting) { e.target.classList.add('on'); obs.unobserve(e.target); }
    });
  }, { threshold: 0.1 });
  document.querySelectorAll('.fu').forEach(el => obs.observe(el));

  // カウントアップアニメーション
  document.querySelectorAll('.result-count[data-target]').forEach(el => {
    const target = parseInt(el.dataset.target, 10);
    const duration = 1200;
    const start = performance.now();
    function update(now) {
      const elapsed = now - start;
      const progress = Math.min(elapsed / duration, 1);
      el.textContent = Math.round(progress * target);
      if (progress < 1) requestAnimationFrame(update);
    }
    const io = new IntersectionObserver(entries => {
      if (entries[0].isIntersecting) { requestAnimationFrame(update); io.disconnect(); }
    });
    io.observe(el);
  });
})();
</script>
