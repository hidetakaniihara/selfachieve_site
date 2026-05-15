<?php
/**
 * Template Name: 実績一覧
 * page-works.php
 */
get_header();
?>
<main>
<section aria-labelledby="page-hero-h1" class="page-hero">
<div class="page-hero-inner">
<span class="page-hero-eyebrow fu">WORKS</span>
<h1 class="page-hero-h1 fu" id="page-hero-h1" style="transition-delay:.08s">
      実績が、証明する。
    </h1>
<p class="page-hero-desc fu" style="transition-delay:.16s">
      WEB制作・デジタルマーケティング支援実績。<br/>
      私たちが手がけた制作・支援事例をご覧ください。
    </p>
</div>
</section>
<nav aria-label="パンくずリスト" class="breadcrumb">
<ol>
<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a></li>
<li><span aria-current="page">制作実績</span></li>
</ol>
</nav>
<section aria-label="絞り込み" class="filter-sec">
<div class="filter-inner">
<span class="filter-label">絞り込み：</span>
<button class="filter-btn active" data-filter="all">すべて</button>
<button class="filter-btn" data-filter="website">WEBサイト制作</button>
<button class="filter-btn" data-filter="seo">SEO対策</button>
<button class="filter-btn" data-filter="ads">WEB広告</button>
<button class="filter-btn" data-filter="meo">MEO対策</button>
</div>
</section>
<section aria-labelledby="works-list-h2" class="works-list-sec">
<div class="works-list-inner">
<div class="works-grid" id="works-grid">
<!-- カードはJSで動的生成 -->
</div>
<nav aria-label="ページネーション" class="pagination" id="pagination"></nav>
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
