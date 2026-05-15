<?php
/**
 * Template Name: 実績 さんプラザコンタクト
 * page-works-sanplaza.php
 */
get_header();
?>
<main id="main" role="main">
<!-- ヒーロー（黒背景・ダイナミック） -->
<section aria-labelledby="works-title" class="works-hero">
<!-- パンくずリスト PC（ヒーロー内上部） -->
<nav aria-label="パンくずリスト" class="breadcrumb" style="position:absolute;top:72px;left:0;right:0;padding:10px 80px;background:transparent;border-bottom:none;">
<ol>
<li><a href="<?php echo esc_url( home_url( '/../' ) ); ?>">ホーム</a></li>
<li><a href="<?php echo esc_url( home_url( '/../works/' ) ); ?>">制作実績</a></li>
<li><span aria-current="page" style="color:#ffffff;">さんプラザコンタクトレンズ</span></li>
</ol>
</nav>
<div class="works-hero-inner">
<span class="works-hero-eyebrow fu">WORKS — 01</span>
<span class="works-hero-category fu" style="transition-delay:.05s;">ホームページ制作</span>
<h1 class="works-hero-client fu" id="works-title" style="transition-delay:.1s;">
        さんプラザ<br/>コンタクトレンズ<em> 様</em>
</h1>
<div class="works-hero-divider fu" style="transition-delay:.15s;"></div>
<div class="works-hero-meta fu" style="transition-delay:.2s;">
<div class="works-hero-meta-item">
<span class="works-hero-meta-label">業界</span>
<span class="works-hero-meta-val">コンタクトレンズ販売</span>
</div>
<div class="works-hero-meta-item">
<span class="works-hero-meta-label">依頼内容</span>
<span class="works-hero-meta-val">ホームページ制作</span>
</div>
<div class="works-hero-meta-item">
<span class="works-hero-meta-label">サイトURL</span>
<span class="works-hero-meta-val"><a href="https://sanplaza-cl.co.jp/" rel="noopener noreferrer" style="color:#ffffff;text-decoration:underline;text-underline-offset:3px;" target="_blank">sanplaza-cl.co.jp</a></span>
</div>
</div>
</div>
</section>
<!-- ① WP: Custom Fields → プロジェクトメタ（アイコン付きリスト） -->
<!-- WordPress化時: ACF/CPT の post_meta として管理 -->
<section aria-label="プロジェクト情報" class="project-meta-sec">
<div class="project-meta-inner">
<span class="project-meta-label fu">PROJECT OVERVIEW</span>
<div class="project-meta-grid">
<div class="project-meta-item fu" style="transition-delay:.05s;">
<div aria-hidden="true" class="project-meta-icon">
<svg fill="none" height="16" viewbox="0 0 24 24" width="16"><path d="M3 21h18M3 7v1a3 3 0 0 0 6 0V7m0 1a3 3 0 0 0 6 0V7m0 1a3 3 0 0 0 6 0V7H3l2-4h14l2 4" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg>
</div>
<span class="project-meta-key">クライアント</span>
<span class="project-meta-val">さんプラザコンタクトレンズ</span>
</div>
<div class="project-meta-item fu" style="transition-delay:.1s;">
<div aria-hidden="true" class="project-meta-icon">
<svg fill="none" height="16" viewbox="0 0 24 24" width="16"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg>
</div>
<span class="project-meta-key">所在地</span>
<span class="project-meta-val">兵庫県神戸市</span>
</div>
<div class="project-meta-item fu" style="transition-delay:.15s;">
<div aria-hidden="true" class="project-meta-icon">
<svg fill="none" height="16" viewbox="0 0 24 24" width="16"><rect height="14" rx="2" stroke="#fff" stroke-width="1.5" width="20" x="2" y="7"></rect><path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2" stroke="#fff" stroke-width="1.5"></path><line stroke="#fff" stroke-linecap="round" stroke-width="1.5" x1="12" x2="12" y1="12" y2="16"></line><line stroke="#fff" stroke-linecap="round" stroke-width="1.5" x1="10" x2="14" y1="14" y2="14"></line></svg>
</div>
<span class="project-meta-key">業種</span>
<span class="project-meta-val">コンタクトレンズ販売</span>
</div>
<div class="project-meta-item fu" style="transition-delay:.2s;">
<div aria-hidden="true" class="project-meta-icon">
<svg fill="none" height="16" viewbox="0 0 24 24" width="16"><path d="M9 12l2 2 4-4" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path><path d="M21 12c0 4.97-4.03 9-9 9s-9-4.03-9-9 4.03-9 9-9 9 4.03 9 9z" stroke="#fff" stroke-width="1.5"></path></svg>
</div>
<span class="project-meta-key">実施施策</span>
<span class="project-meta-val">ホームページ制作 / SEO対策</span>
</div>
</div>
</div>
</section>
<!-- 数字でわかる結果 -->
<section aria-label="数字でわかる結果" class="results-sec">
<div class="results-inner">
<span class="results-label fu">RESULTS — 数字でわかる結果</span>
<div class="results-grid">
<div class="result-item fu" style="transition-delay:.05s;">
<div class="result-num">
<span class="result-num-prefix">Top</span>
<span class="result-count" data-target="3">0</span>
</div>
<p class="result-title">主要キーワード検索順位</p>
<p class="result-desc">「神戸 コンタクトレンズ」など地域キーワードでの上位表示を実現</p>
</div>
<div class="result-item fu" style="transition-delay:.1s;">
<div class="result-num">
<span class="result-count" data-target="3">0</span>
<span class="result-num-unit">倍</span>
</div>
<p class="result-title">月間問い合わせ数</p>
<p class="result-desc">ストレスフリーな導線設計により、制作前比で問い合わせが大幅増加</p>
</div>
<div class="result-item fu" style="transition-delay:.15s;">
<div class="result-num">
<span class="result-count" data-target="2">0</span>
<span class="result-num-unit">秒</span>
</div>
<p class="result-title">ページ表示速度</p>
<p class="result-desc">高速化最適化により、離脱率の大幅改善を実現</p>
</div>
</div>
<p class="sp-swipe-hint">スワイプして見る</p>
</div>
</section>
<!-- ③ WP: Gallery → モックアップ（全幅・迫力サイズ） -->
<!-- WordPress化時: ACF Gallery / Jetpack Carousel として管理 -->
<section aria-label="制作物イメージ" class="mockup-sec">
<div class="mockup-full-inner fu">
<div class="mockup-pc-wrap">
<div class="mockup-pc">
<img alt="さんプラザコンタクトレンズ PCサイト画面" height="591" loading="lazy" <?php echo get_template_directory_uri(); ?>/assets/works/sanplaza_pc.webp" width="1000"/>
</div>
</div>
<div class="mockup-sp-wrap">
<div class="mockup-sp">
<img alt="さんプラザコンタクトレンズ スマートフォンサイト画面" height="520" loading="lazy" <?php echo get_template_directory_uri(); ?>/assets/works/sanplaza_sp.webp" width="321"/>
</div>
</div>
</div>
<div class="mockup-caption">
<span class="mockup-caption-url">
<a href="https://sanplaza-cl.co.jp/" rel="noopener noreferrer" target="_blank">https://sanplaza-cl.co.jp/</a>
</span>
</div>
</section>
<!-- ② WP: Block Editor → 課題・施策・結果（制作ポイント） -->
<!-- WordPress化時: Gutenberg ブロックエディタで管理 -->
<section aria-label="制作ポイント" class="point-sec">
<!-- POINT 01: 課題 -->
<div class="point-block">
<div class="point-block-inner">
<div class="point-left fu">
<div class="point-badge-wrap">
<span class="point-badge">POINT 01</span>
<span class="point-num">01</span>
</div>
</div>
<div class="point-right fu" style="transition-delay:.1s;">
<h2 class="point-head">コンセプトを軸にした、一貫したデザイン設計。</h2>
<p class="point-body">「美しい瞳、広がる世界。」をコンセプトに、デザインのトーン＆マナーを「信頼感」「清潔感」「先進性」に統一しました。白とブルーを基調とした洗練されたデザインを採用し、視認性を高めたレイアウト設計を実現しています。</p>
</div>
</div>
</div>
<!-- POINT 02: 施策 -->
<div class="point-block">
<div class="point-block-inner">
<div class="point-left fu">
<div class="point-badge-wrap">
<span class="point-badge">POINT 02</span>
<span class="point-num">02</span>
</div>
</div>
<div class="point-right fu" style="transition-delay:.1s;">
<h2 class="point-head">目的別に最適化した、ストレスフリーな導線。</h2>
<p class="point-body">訪問者の目的に応じてスムーズに遷移できる構造を設計しました。コンタクトレンズの予約、診療内容の確認、アクセス情報の取得など、ストレスなく目的を達成できる導線を構築しています。</p>
</div>
</div>
</div>
<!-- POINT 03: 結果 -->
<div class="point-block">
<div class="point-block-inner">
<div class="point-left fu">
<div class="point-badge-wrap">
<span class="point-badge">POINT 03</span>
<span class="point-num">03</span>
</div>
</div>
<div class="point-right fu" style="transition-delay:.1s;">
<h2 class="point-head">地域キーワードを最適化したSEO対策。</h2>
<p class="point-body">SEO対策では「地域名＋コンタクトレンズ」などのキーワードを最適化し、検索エンジンからの集患を強化しました。ページ構造・内部リンク・メタ情報を徹底的に整備し、継続的な検索流入を実現しています。</p>
</div>
</div>
</div>
</section>
<!-- 一覧へ戻る -->
<div class="back-sec">
<div class="back-inner fu">
<a class="back-link" href="<?php echo esc_url( home_url( '/../works/' ) ); ?>">
<svg fill="none" height="16" viewbox="0 0 16 16" width="16"><path d="M13 8H3M7 12l-4-4 4-4" stroke="#28282D" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg>
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
<a aria-label="無料相談を申し込む" class="btn-cta" href="<?php echo esc_url( home_url( '/../contact/' ) ); ?>">無料相談を申し込む</a>
<div class="cta-tel-wrap">
<p class="cta-tel-label">お電話でのご相談</p>
<a aria-label="電話番号 078-806-8338" class="cta-tel" href="tel:0788068338">078-806-8338</a>
</div>
</div>
</div>
</section>
</main>
<?php get_footer(); ?>
