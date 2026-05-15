<?php
/**
 * Template Name: お客さまの声一覧
 * page-voice.php
 */
get_header();
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
<div class="filter-sec">
<div class="filter-inner">
<span class="filter-label">絞り込み：</span>
<button class="filter-btn active" data-filter="all">すべて</button>
<button class="filter-btn" data-filter="marketing">WEB戦略設計</button>
<button class="filter-btn" data-filter="web">WEBページ制作</button>
<button class="filter-btn" data-filter="listing">WEB広告</button>
<button class="filter-btn" data-filter="seo">SEO対策</button>
<button class="filter-btn" data-filter="meo">MEO対策</button>
<button class="filter-btn" data-filter="sns">SNSマーケティング</button>
</div>
</div>
<section aria-label="お客さまの声一覧" class="voice-list-sec">
<div class="voice-list-inner">
<div class="voice-grid" id="voice-list">
<!-- 18 -->
<article class="voice-card fu" data-category="seo">
<a class="voice-card-link" href="<?php echo esc_url( home_url( '/voice/iwazawa/' ) ); ?>">
<div class="voice-card-img-wrap">
<img alt="岩沢法理事務所" height="614" loading="eager" <?php echo get_template_directory_uri(); ?>/assets/voice/iwazawa.webp" width="921"/>
<div class="voice-card-overlay"></div>
<p class="voice-card-hover-quote">「業界の特殊性を理解してくれるパートナーに出会えたことで、安心して任せられます。」</p>
</div>
<div class="voice-card-body">
<div class="voice-card-meta-top">
<span class="voice-card-num">No.18</span>
<span class="voice-card-tag tag-seo">SEO対策</span>
</div>
<h2 class="voice-card-title">「特殊な業界だからこそ、心強い」<br/>共に課題へ向き合うWeb集客のパートナー</h2>
<div class="voice-card-info">
<div class="voice-card-info-item"><span class="voice-card-info-label">業種</span><span class="voice-card-info-val">法律事務所</span></div>
<div class="voice-card-info-item"><span class="voice-card-info-label">会社名</span><span class="voice-card-info-val">岩沢法理事務所 様</span></div>
</div>
<span class="voice-card-read">READ MORE <svg fill="none" height="16" viewbox="0 0 16 16" width="16"><path d="M3 8h10M9 4l4 4-4 4" stroke="#28282D" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg></span>
</div>
</a>
</article>
<article class="voice-card fu" data-category="listing seo">
<a class="voice-card-link" href="<?php echo esc_url( home_url( '/voice/edulabo/' ) ); ?>">
<div class="voice-card-img-wrap">
<img alt="株式会社エデュラボ" height="614" loading="lazy" <?php echo get_template_directory_uri(); ?>/assets/voice/edurabo.webp" width="921"/>
<div class="voice-card-overlay"></div>
<p class="voice-card-hover-quote">「順位だけでなく、実際の入場者数に直結する提案をしてくれます。」</p>
</div>
<div class="voice-card-body">
<div class="voice-card-meta-top">
<span class="voice-card-num">No.17</span>
<span class="voice-card-tag tag-listing">リスティング広告</span>
</div>
<h2 class="voice-card-title">リスティング×SEOで成果。<br/>「順位」だけでなく「実利」に直結する集客へ</h2>
<div class="voice-card-info">
<div class="voice-card-info-item"><span class="voice-card-info-label">業種</span><span class="voice-card-info-val">学習塩の運営</span></div>
<div class="voice-card-info-item"><span class="voice-card-info-label">会社名</span><span class="voice-card-info-val">株式会社エデュラボ 様</span></div>
</div>
<span class="voice-card-read">READ MORE <svg fill="none" height="16" viewbox="0 0 16 16" width="16"><path d="M3 8h10M9 4l4 4-4 4" stroke="#28282D" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg></span>
</div>
</a>
</article>
<article class="voice-card fu" data-category="listing">
<a class="voice-card-link" href="<?php echo esc_url( home_url( '/voice/jiyuhomu/' ) ); ?>">
<div class="voice-card-img-wrap">
<img alt="自由法律事務所" height="614" loading="lazy" <?php echo get_template_directory_uri(); ?>/assets/voice/jiyu-law.webp" width="921"/>
<div class="voice-card-overlay"></div>
<p class="voice-card-hover-quote">「毎月の分析レポートで、改善の足跡が明確に分かります。」</p>
</div>
<div class="voice-card-body">
<div class="voice-card-meta-top">
<span class="voice-card-num">No.16</span>
<span class="voice-card-tag tag-listing">リスティング広告</span>
</div>
<h2 class="voice-card-title">「4日で十数万消えた」失敗から、<br/>毎月の分析と提案で安心のWeb集客へ</h2>
<div class="voice-card-info">
<div class="voice-card-info-item"><span class="voice-card-info-label">業種</span><span class="voice-card-info-val">法律事務所</span></div>
<div class="voice-card-info-item"><span class="voice-card-info-label">会社名</span><span class="voice-card-info-val">自由法律事務所 様</span></div>
</div>
<span class="voice-card-read">READ MORE <svg fill="none" height="16" viewbox="0 0 16 16" width="16"><path d="M3 8h10M9 4l4 4-4 4" stroke="#28282D" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg></span>
</div>
</a>
</article>
<article class="voice-card fu" data-category="listing">
<a class="voice-card-link" href="<?php echo esc_url( home_url( '/voice/furari/' ) ); ?>">
<div class="voice-card-img-wrap">
<img alt="ふらり堂" height="614" loading="lazy" <?php echo get_template_directory_uri(); ?>/assets/voice/furarido.webp" width="921"/>
<div class="voice-card-overlay"></div>
<p class="voice-card-hover-quote">「数字で成果を見せてくれる。その安心感が一番です。」</p>
</div>
<div class="voice-card-body">
<div class="voice-card-meta-top">
<span class="voice-card-num">No.15</span>
<span class="voice-card-tag tag-listing">リスティング広告</span>
</div>
<h2 class="voice-card-title">結果直結のリスティング。<br/>伴走してくれる安心感。</h2>
<div class="voice-card-info">
<div class="voice-card-info-item"><span class="voice-card-info-label">業種</span><span class="voice-card-info-val">古本・ホビーグッズ買取/販売</span></div>
<div class="voice-card-info-item"><span class="voice-card-info-label">会社名</span><span class="voice-card-info-val">ふらり堂 様</span></div>
</div>
<span class="voice-card-read">READ MORE <svg fill="none" height="16" viewbox="0 0 16 16" width="16"><path d="M3 8h10M9 4l4 4-4 4" stroke="#28282D" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg></span>
</div>
</a>
</article>
<article class="voice-card fu" data-category="sns">
<a class="voice-card-link" href="<?php echo esc_url( home_url( '/voice/halpets/' ) ); ?>">
<div class="voice-card-img-wrap">
<img alt="ハルペッツ神戸" height="614" loading="lazy" <?php echo get_template_directory_uri(); ?>/assets/voice/harupets.webp" width="921"/>
<div class="voice-card-overlay"></div>
<p class="voice-card-hover-quote">「漢方医療の専門性が、SNSを通じて正確に伝わるようになりました。」</p>
</div>
<div class="voice-card-body">
<div class="voice-card-meta-top">
<span class="voice-card-num">No.14</span>
<span class="voice-card-tag tag-sns">SNS運用</span>
</div>
<h2 class="voice-card-title">専門性が伝わSNSへ<br/>漢方医療の価値を可視化した取り組み</h2>
<div class="voice-card-info">
<div class="voice-card-info-item"><span class="voice-card-info-label">業種</span><span class="voice-card-info-val">獣医業</span></div>
<div class="voice-card-info-item"><span class="voice-card-info-label">会社名</span><span class="voice-card-info-val">ハルペッツ神戸 様</span></div>
</div>
<span class="voice-card-read">READ MORE <svg fill="none" height="16" viewbox="0 0 16 16" width="16"><path d="M3 8h10M9 4l4 4-4 4" stroke="#28282D" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg></span>
</div>
</a>
</article>
<article class="voice-card fu" data-category="sns">
<a class="voice-card-link" href="<?php echo esc_url( home_url( '/voice/taka/' ) ); ?>">
<div class="voice-card-img-wrap">
<img alt="焼き菓子Taka" height="614" loading="lazy" <?php echo get_template_directory_uri(); ?>/assets/voice/taka.webp" width="921"/>
<div class="voice-card-overlay"></div>
<p class="voice-card-hover-quote">「SNSがお店の『雰囲気』を伝える大切な場になりました。」</p>
</div>
<div class="voice-card-body">
<div class="voice-card-meta-top"><span class="voice-card-num">No.13</span><span class="voice-card-tag tag-sns">SNS運用</span></div>
<h2 class="voice-card-title">焼き菓子とお酒の新提案<br/>"特別なひととき"の作り方をSNSで発信</h2>
<div class="voice-card-info">
<div class="voice-card-info-item"><span class="voice-card-info-label">業種</span><span class="voice-card-info-val">菓子製造業</span></div>
<div class="voice-card-info-item"><span class="voice-card-info-label">会社名</span><span class="voice-card-info-val">焼き菓子Taka 様</span></div>
</div>
<span class="voice-card-read">READ MORE <svg fill="none" height="16" viewbox="0 0 16 16" width="16"><path d="M3 8h10M9 4l4 4-4 4" stroke="#28282D" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg></span>
</div>
</a>
</article>
<article class="voice-card fu" data-category="listing sns">
<a class="voice-card-link" href="<?php echo esc_url( home_url( '/voice/hyogo-u/' ) ); ?>">
<div class="voice-card-img-wrap">
<img alt="兵庫県立大学大学院" height="614" loading="lazy" <?php echo get_template_directory_uri(); ?>/assets/voice/hyogo-univ.webp" width="921"/>
<div class="voice-card-overlay"></div>
<p class="voice-card-hover-quote">「低予算でも、過去最高の出願者数を達成できました。」</p>
</div>
<div class="voice-card-body">
<div class="voice-card-meta-top"><span class="voice-card-num">No.12</span><span class="voice-card-tag tag-sns">SNS運用</span></div>
<h2 class="voice-card-title">"低予算でも効果を実感"<br/>SNS広告を中心に過去最高の出願者数を獲得！</h2>
<div class="voice-card-info">
<div class="voice-card-info-item"><span class="voice-card-info-label">業種</span><span class="voice-card-info-val">教育機関</span></div>
<div class="voice-card-info-item"><span class="voice-card-info-label">会社名</span><span class="voice-card-info-val">兵庫県立大学大学院 様</span></div>
</div>
<span class="voice-card-read">READ MORE <svg fill="none" height="16" viewbox="0 0 16 16" width="16"><path d="M3 8h10M9 4l4 4-4 4" stroke="#28282D" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg></span>
</div>
</a>
</article>
<article class="voice-card fu" data-category="listing">
<a class="voice-card-link" href="<?php echo esc_url( home_url( '/voice/agate/' ) ); ?>">
<div class="voice-card-img-wrap">
<img alt="株式会社AGATE" height="614" loading="lazy" <?php echo get_template_directory_uri(); ?>/assets/voice/agate.webp" width="921"/>
<div class="voice-card-overlay"></div>
<p class="voice-card-hover-quote">「外注先じゃなく、仲間として一緒に考えてくれる。」</p>
</div>
<div class="voice-card-body">
<div class="voice-card-meta-top"><span class="voice-card-num">No.11</span><span class="voice-card-tag tag-listing">リスティング広告</span></div>
<h2 class="voice-card-title">「外注先じゃなく、仲間」<br/>壁のないコミュニケーションで築き上げるWin-Winな関係</h2>
<div class="voice-card-info">
<div class="voice-card-info-item"><span class="voice-card-info-label">業種</span><span class="voice-card-info-val">不用品回収・遺品整理</span></div>
<div class="voice-card-info-item"><span class="voice-card-info-label">会社名</span><span class="voice-card-info-val">株式会社AGATE 様</span></div>
</div>
<span class="voice-card-read">READ MORE <svg fill="none" height="16" viewbox="0 0 16 16" width="16"><path d="M3 8h10M9 4l4 4-4 4" stroke="#28282D" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg></span>
</div>
</a>
</article>
<article class="voice-card fu" data-category="seo">
<a class="voice-card-link" href="<?php echo esc_url( home_url( '/voice/yamaguchi/' ) ); ?>">
<div class="voice-card-img-wrap">
<img alt="山口不動産" height="614" loading="lazy" <?php echo get_template_directory_uri(); ?>/assets/voice/yamaguchi.webp" width="921"/>
<div class="voice-card-overlay"></div>
<p class="voice-card-hover-quote">「ニッチな業界でも、正確に山を登れる山屋さんを見つけた感じです。」</p>
</div>
<div class="voice-card-body">
<div class="voice-card-meta-top"><span class="voice-card-num">No.10</span><span class="voice-card-tag tag-seo">SEO対策</span></div>
<h2 class="voice-card-title">ニッチジャンルのWebマーケティングという未知の世界で<br/>伴走してくれる心強き専門家</h2>
<div class="voice-card-info">
<div class="voice-card-info-item"><span class="voice-card-info-label">業種</span><span class="voice-card-info-val">不動産買取</span></div>
<div class="voice-card-info-item"><span class="voice-card-info-label">会社名</span><span class="voice-card-info-val">山口不動産 様</span></div>
</div>
<span class="voice-card-read">READ MORE <svg fill="none" height="16" viewbox="0 0 16 16" width="16"><path d="M3 8h10M9 4l4 4-4 4" stroke="#28282D" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg></span>
</div>
</a>
</article>
<article class="voice-card fu" data-category="listing">
<a class="voice-card-link" href="<?php echo esc_url( home_url( '/voice/perpetua/' ) ); ?>">
<div class="voice-card-img-wrap">
<img alt="株式会社パーペチュア" height="614" loading="lazy" <?php echo get_template_directory_uri(); ?>/assets/voice/perpetua.webp" width="921"/>
<div class="voice-card-overlay"></div>
<p class="voice-card-hover-quote">「デジタルのプロに任せることで、本業に集中できるようになりました。」</p>
</div>
<div class="voice-card-body">
<div class="voice-card-meta-top"><span class="voice-card-num">No.09</span><span class="voice-card-tag tag-listing">リスティング広告</span></div>
<h2 class="voice-card-title">デジタルマーケティングのプロに任せることで<br/>本業に集中できる環境へ</h2>
<div class="voice-card-info">
<div class="voice-card-info-item"><span class="voice-card-info-label">業種</span><span class="voice-card-info-val">法人向けPC運用保守</span></div>
<div class="voice-card-info-item"><span class="voice-card-info-label">会社名</span><span class="voice-card-info-val">株式会社パーペチュア 様</span></div>
</div>
<span class="voice-card-read">READ MORE <svg fill="none" height="16" viewbox="0 0 16 16" width="16"><path d="M3 8h10M9 4l4 4-4 4" stroke="#28282D" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg></span>
</div>
</a>
</article>
<article class="voice-card fu" data-category="marketing web">
<a class="voice-card-link" href="<?php echo esc_url( home_url( '/voice/nodental/' ) ); ?>">
<div class="voice-card-img-wrap">
<img alt="脳歯科" height="614" loading="lazy" <?php echo get_template_directory_uri(); ?>/assets/voice/noshika.webp" width="921"/>
<div class="voice-card-overlay"></div>
<p class="voice-card-hover-quote">「Web制作だけじゃない。海外向けプロモーションまで一貫して任せられます。」</p>
</div>
<div class="voice-card-body">
<div class="voice-card-meta-top"><span class="voice-card-num">No.08</span><span class="voice-card-tag tag-marketing">WEBマーケティング</span></div>
<h2 class="voice-card-title">Webサイトを作るだけじゃない！<br/>海外向けプロモーションも任せられるセルフアチーブ</h2>
<div class="voice-card-info">
<div class="voice-card-info-item"><span class="voice-card-info-label">業種</span><span class="voice-card-info-val">歯科</span></div>
<div class="voice-card-info-item"><span class="voice-card-info-label">会社名</span><span class="voice-card-info-val">脳歯科 様</span></div>
</div>
<span class="voice-card-read">READ MORE <svg fill="none" height="16" viewbox="0 0 16 16" width="16"><path d="M3 8h10M9 4l4 4-4 4" stroke="#28282D" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg></span>
</div>
</a>
</article>
<article class="voice-card fu" data-category="seo">
<a class="voice-card-link" href="<?php echo esc_url( home_url( '/voice/fourseasons/' ) ); ?>">
<div class="voice-card-img-wrap">
<img alt="フォーシーズンズ美容皮膚科" height="614" loading="lazy" <?php echo get_template_directory_uri(); ?>/assets/voice/fourseasons.webp" width="921"/>
<div class="voice-card-overlay"></div>
<p class="voice-card-hover-quote">「スタッフと同じ目線で、チームとして目標に向かってくれます。」</p>
</div>
<div class="voice-card-body">
<div class="voice-card-meta-top"><span class="voice-card-num">No.07</span><span class="voice-card-tag tag-seo">SEO対策</span></div>
<h2 class="voice-card-title">スタッフと同じ目線で、<br/>チームとして目標に向かったSEO対策</h2>
<div class="voice-card-info">
<div class="voice-card-info-item"><span class="voice-card-info-label">業種</span><span class="voice-card-info-val">美容皮膚科</span></div>
<div class="voice-card-info-item"><span class="voice-card-info-label">会社名</span><span class="voice-card-info-val">フォーシーズンズ美容皮膚科 様</span></div>
</div>
<span class="voice-card-read">READ MORE <svg fill="none" height="16" viewbox="0 0 16 16" width="16"><path d="M3 8h10M9 4l4 4-4 4" stroke="#28282D" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg></span>
</div>
</a>
</article>
<article class="voice-card fu" data-category="web">
<a class="voice-card-link" href="<?php echo esc_url( home_url( '/voice/ksd/' ) ); ?>">
<div class="voice-card-img-wrap">
<img alt="株式会社ケー・エス・ディー" height="614" loading="lazy" <?php echo get_template_directory_uri(); ?>/assets/voice/ksd.webp" width="921"/>
<div class="voice-card-overlay"></div>
<p class="voice-card-hover-quote">「導線設計のプロ意識が、課題を整理して解決へ導いてくれました。」</p>
</div>
<div class="voice-card-body">
<div class="voice-card-meta-top"><span class="voice-card-num">No.06</span><span class="voice-card-tag tag-web">WEBページ制作</span></div>
<h2 class="voice-card-title">プロフェッショナリズムを感じる導線設計で<br/>見事に課題解決</h2>
<div class="voice-card-info">
<div class="voice-card-info-item"><span class="voice-card-info-label">業種</span><span class="voice-card-info-val">システム開発</span></div>
<div class="voice-card-info-item"><span class="voice-card-info-label">会社名</span><span class="voice-card-info-val">株式会社ケー・エス・ディー 様</span></div>
</div>
<span class="voice-card-read">READ MORE <svg fill="none" height="16" viewbox="0 0 16 16" width="16"><path d="M3 8h10M9 4l4 4-4 4" stroke="#28282D" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg></span>
</div>
</a>
</article>
<article class="voice-card fu" data-category="web">
<a class="voice-card-link" href="<?php echo esc_url( home_url( '/voice/showa/' ) ); ?>">
<div class="voice-card-img-wrap">
<img alt="昭和コンピュータ株式会社" height="614" loading="lazy" <?php echo get_template_directory_uri(); ?>/assets/voice/showa.webp" width="921"/>
<div class="voice-card-overlay"></div>
<p class="voice-card-hover-quote">「完成したサイトを見たとき、周りにどんどん見せたくなりました。」</p>
</div>
<div class="voice-card-body">
<div class="voice-card-meta-top"><span class="voice-card-num">No.05</span><span class="voice-card-tag tag-web">WEBページ制作</span></div>
<h2 class="voice-card-title">「周りの人にどんどん見せたくなる」<br/>大満足のホームページ</h2>
<div class="voice-card-info">
<div class="voice-card-info-item"><span class="voice-card-info-label">業種</span><span class="voice-card-info-val">システム開発</span></div>
<div class="voice-card-info-item"><span class="voice-card-info-label">会社名</span><span class="voice-card-info-val">昭和コンピュータ株式会社 様</span></div>
</div>
<span class="voice-card-read">READ MORE <svg fill="none" height="16" viewbox="0 0 16 16" width="16"><path d="M3 8h10M9 4l4 4-4 4" stroke="#28282D" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg></span>
</div>
</a>
</article>
<article class="voice-card fu" data-category="web">
<a class="voice-card-link" href="<?php echo esc_url( home_url( '/voice/shanghaiferr/' ) ); ?>">
<div class="voice-card-img-wrap">
<img alt="上海フェリー株式会社" height="614" loading="lazy" <?php echo get_template_directory_uri(); ?>/assets/voice/shanghai.webp" width="921"/>
<div class="voice-card-overlay"></div>
<p class="voice-card-hover-quote">「細部へのこだわりと迅速なレスポンスで、プロ意識を強く感じました。」</p>
</div>
<div class="voice-card-body">
<div class="voice-card-meta-top"><span class="voice-card-num">No.04</span><span class="voice-card-tag tag-web">WEBページ制作</span></div>
<h2 class="voice-card-title">細部へのこだわり、<br/>迅速なレスポンスで見えたプロ意識。</h2>
<div class="voice-card-info">
<div class="voice-card-info-item"><span class="voice-card-info-label">業種</span><span class="voice-card-info-val">フェリー</span></div>
<div class="voice-card-info-item"><span class="voice-card-info-label">会社名</span><span class="voice-card-info-val">上海フェリー株式会社 様</span></div>
</div>
<span class="voice-card-read">READ MORE <svg fill="none" height="16" viewbox="0 0 16 16" width="16"><path d="M3 8h10M9 4l4 4-4 4" stroke="#28282D" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg></span>
</div>
</a>
</article>
<article class="voice-card fu" data-category="web">
<a class="voice-card-link" href="<?php echo esc_url( home_url( '/voice/canlee/' ) ); ?>">
<div class="voice-card-img-wrap">
<img alt="Can&amp;Lee" height="614" loading="lazy" <?php echo get_template_directory_uri(); ?>/assets/voice/canlee.webp" width="921"/>
<div class="voice-card-overlay"></div>
<p class="voice-card-hover-quote">「余分なものを削ぎ落とし、保険をかけない。その山屋の姿勢が信頼できました。」</p>
</div>
<div class="voice-card-body">
<div class="voice-card-meta-top"><span class="voice-card-num">No.03</span><span class="voice-card-tag tag-web">WEBページ制作</span></div>
<h2 class="voice-card-title">余分なものを削ぎ落とし、保険をかけない。<br/>シンプルでスマートな提案</h2>
<div class="voice-card-info">
<div class="voice-card-info-item"><span class="voice-card-info-label">業種</span><span class="voice-card-info-val">ペットサロン</span></div>
<div class="voice-card-info-item"><span class="voice-card-info-label">会社名</span><span class="voice-card-info-val">Can&amp;Lee 様</span></div>
</div>
<span class="voice-card-read">READ MORE <svg fill="none" height="16" viewbox="0 0 16 16" width="16"><path d="M3 8h10M9 4l4 4-4 4" stroke="#28282D" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg></span>
</div>
</a>
</article>
<article class="voice-card fu" data-category="web">
<a class="voice-card-link" href="<?php echo esc_url( home_url( '/voice/fpinnovation/' ) ); ?>">
<div class="voice-card-img-wrap">
<img alt="株式会社FPイノベーション" height="614" loading="lazy" <?php echo get_template_directory_uri(); ?>/assets/voice/fp-innovation.webp" width="921"/>
<div class="voice-card-overlay"></div>
<p class="voice-card-hover-quote">「対等な立場で伴走してくれる。それが一番の安心感です。」</p>
</div>
<div class="voice-card-body">
<div class="voice-card-meta-top"><span class="voice-card-num">No.02</span><span class="voice-card-tag tag-web">WEBページ制作</span></div>
<h2 class="voice-card-title">対等な立場で伴走してくれる<br/>Webのプロ。</h2>
<div class="voice-card-info">
<div class="voice-card-info-item"><span class="voice-card-info-label">業種</span><span class="voice-card-info-val">保険コンサルティング</span></div>
<div class="voice-card-info-item"><span class="voice-card-info-label">会社名</span><span class="voice-card-info-val">株式会社FPイノベーション 様</span></div>
</div>
<span class="voice-card-read">READ MORE <svg fill="none" height="16" viewbox="0 0 16 16" width="16"><path d="M3 8h10M9 4l4 4-4 4" stroke="#28282D" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg></span>
</div>
</a>
</article>
<article class="voice-card fu" data-category="marketing">
<a class="voice-card-link" href="<?php echo esc_url( home_url( '/voice/nadi/' ) ); ?>">
<div class="voice-card-img-wrap">
<img alt="Nadi" height="614" loading="lazy" <?php echo get_template_directory_uri(); ?>/assets/voice/nadi.webp" width="921"/>
<div class="voice-card-overlay"></div>
<p class="voice-card-hover-quote">「正解がない業界だからこそ、同じ目線で一緒に考えてくれます。」</p>
</div>
<div class="voice-card-body">
<div class="voice-card-meta-top"><span class="voice-card-num">No.01</span><span class="voice-card-tag tag-marketing">WEBマーケティング</span></div>
<h2 class="voice-card-title">正解がない業態だからこそ、<br/>同じ目線で、１つの「チーム」で。</h2>
<div class="voice-card-info">
<div class="voice-card-info-item"><span class="voice-card-info-label">業種</span><span class="voice-card-info-val">ピラティス・ヨガスタジオ</span></div>
<div class="voice-card-info-item"><span class="voice-card-info-label">会社名</span><span class="voice-card-info-val">Nadi 様</span></div>
</div>
<span class="voice-card-read">READ MORE <svg fill="none" height="16" viewbox="0 0 16 16" width="16"><path d="M3 8h10M9 4l4 4-4 4" stroke="#28282D" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></path></svg></span>
</div>
</a>
</article>
</div>
<nav aria-label="ページネーション" class="pagination" id="voice-pagination"></nav>
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
