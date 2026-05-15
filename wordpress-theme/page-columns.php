<?php
/**
 * Template Name: コラム一覧
 * page-columns.php
 */
get_header();
?>
<main>
<section aria-labelledby="page-hero-h1" class="page-hero">
<div class="page-hero-inner">
<span class="page-hero-eyebrow fu">COLUMN</span>
<h1 class="page-hero-h1 fu" id="page-hero-h1" style="transition-delay:.08s">
      知識が、武器になる。
    </h1>
<p class="page-hero-desc fu" style="transition-delay:.16s">
      SEO・MEO・リスティング広告・SNS集客など、<br/>
      WEBマーケティングの実践知識を発信しています。
    </p>
</div>
</section>
<nav aria-label="パンくずリスト" class="breadcrumb">
<ol>
<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a></li>
<li><span aria-current="page">コラム一覧</span></li>
</ol>
</nav>
<!-- カテゴリフィルター -->
<div aria-label="カテゴリフィルター" class="filter-sec" role="navigation">
<div class="filter-inner">
<span class="filter-label">CATEGORY</span>
<button class="filter-btn active" data-filter="all">すべて <span class="filter-btn-count" id="count-all">45</span></button>
<button class="filter-btn" data-filter="listing">リスティング広告 <span class="filter-btn-count" id="count-listing">14</span></button>
<button class="filter-btn" data-filter="seo">SEO対策 <span class="filter-btn-count" id="count-seo">8</span></button>
<button class="filter-btn" data-filter="sns">SNS集客 <span class="filter-btn-count" id="count-sns">8</span></button>
<button class="filter-btn" data-filter="meo">MEO <span class="filter-btn-count" id="count-meo">7</span></button>
<button class="filter-btn" data-filter="web">ホームページ制作 <span class="filter-btn-count" id="count-web">5</span></button>
<button class="filter-btn" data-filter="marketing">ウェブマーケティング <span class="filter-btn-count" id="count-marketing">2</span></button>
<button class="filter-btn" data-filter="instagram">インスタグラム <span class="filter-btn-count" id="count-instagram">1</span></button>
</div>
</div>
<!-- フィーチャード記事（最新1件） -->
<section aria-label="注目記事" class="featured-sec" id="featured-sec">
<div class="featured-inner">
<div id="featured-wrap"></div>
</div>
</section>
<!-- 記事グリッド -->
<section aria-labelledby="columns-list-h2" class="columns-sec">
<div class="columns-inner">
<div class="columns-sec-head">
<h2 class="columns-sec-title" id="columns-list-h2">
<span id="current-cat-label">すべての記事</span>
</h2>
<p class="columns-count">全 <span id="total-count">44</span> 件</p>
</div>
<div class="columns-grid" id="columns-grid"></div>
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
