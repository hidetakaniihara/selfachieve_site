<?php
/**
 * Template Name: WEB戦略設計
 * page-strategy.php
 */
get_header();
?>
<main>
<!-- KV -->
<section aria-labelledby="kv-h1" class="kv" style="background:#28282D;position:relative;overflow:hidden;">
<div class="kv-inner">
<div class="kv-left">
<p class="kv-eyebrow fu">— WEB戦略設計</p>
<p class="kv-question fu" style="transition-delay:.05s">なんでうまくいかないの？</p>
<h1 class="kv-h1 fu" id="kv-h1" style="transition-delay:.1s">それ、<em>戦略</em>の問題です。</h1>
<p class="kv-sub fu" style="transition-delay:.15s">施策の前に、戦略がある。</p>
<p class="kv-body fu" style="transition-delay:.2s">
        SEOも広告もSNSも試した。なのに成果が出ない。<br/>
        その原因は、<strong style="color:#fff">戦略の不在</strong>にあります。<br/>
        現状把握・課題設定・施策設計まで、<br/>
        根拠のある戦略を一緒に作ります。
      </p>
</div>
</div>
</section>
<!-- PC BREADCRUMB (KV直後) -->
<nav aria-label="パンくずリスト" class="breadcrumb">
<ol>
<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a></li>
<li><span aria-current="page">WEB戦略設計</span></li>
</ol>
</nav>
<!-- PROBLEM: こんなことありませんか？ -->
<section aria-labelledby="problem-h2" class="problem-sec">
<div class="problem-inner">
<div class="problem-head">
<span class="sec-eyebrow fu">Problems</span>
<h2 class="sec-h2 fu" id="problem-h2" style="transition-delay:.1s">
        様々なWEB施策を<br class="sp-br"/>試しているのに、<br/>効果がイマイチ。<br class="sp-br"/>または、効果がない。
      </h2>
</div>
<!-- SP スワイプ誘導ヒント -->
<p aria-hidden="true" class="problem-swipe-hint">スワイプして確認</p>
<div class="problem-cards">
<div aria-pressed="false" class="problem-card fu" role="button" tabindex="0">
<p class="problem-num">CHECK 01</p>
<p class="problem-title">SEOも広告も試したが<br/>問い合わせが増えない</p>
<p class="problem-desc">施策は実施しているが、何が効いているのかわからない。費用対効果が見えず、予算を増やすべきか迷っている。</p>
</div>
<div aria-pressed="false" class="problem-card fu" role="button" style="transition-delay:.05s" tabindex="0">
<p class="problem-num">CHECK 02</p>
<p class="problem-title">何から手をつければ<br/>いいかわからない</p>
<p class="problem-desc">SEO、SNS、広告、サイトリニューアル——やることが多すぎて優先順位がつけられない。どれが自社に合っているのかわからない。</p>
</div>
<div aria-pressed="false" class="problem-card fu" role="button" style="transition-delay:.1s" tabindex="0">
<p class="problem-num">CHECK 03</p>
<p class="problem-title">代理店に任せているが<br/>成果の説明がない</p>
<p class="problem-desc">毎月レポートが届くが、数字の意味がわからない。「やっています」という報告だけで、なぜ成果が出ないかの説明がない。</p>
</div>
</div>
<p class="sp-swipe-hint">スワイプして見る</p>
<!-- 締めメッセージ -->
<div class="problem-resolve fu">
<p class="problem-resolve-main">すべて、私たちが伴走して解決します。</p>
<p class="problem-resolve-sub">まず、あなたの会社がどこで詰まっているかを確認しましょう。</p>
</div>
</div>
</section>
<!-- FUNNEL: 問題はこれです + うまくいかない例 + 課題別ナビ -->
<section aria-labelledby="wall-h2" class="wall-sec">
<div class="wall-split">
<!-- 左：黒背景見出しエリア -->
<div class="wall-split-left">
<span class="sec-eyebrow fu">YOUR CHALLENGE</span>
<h2 class="sec-h2 fu" id="wall-h2" style="transition-delay:.1s">
        あなたの会社は、<br/>どこで壁を<br/>感じていますか？
      </h2>
<p class="wall-split-body fu" style="transition-delay:.2s">
        WEB施策がうまくいかないとき、<br/>必ずどこかのフェーズに原因があります。<br/>
        当てはまるフェーズを確認してください。
      </p>
</div>
<!-- 右：カードグリッド -->
<div class="wall-split-right">
<div class="wall-grid">
<!-- 01 戦略・全体（全幅） -->
<article class="wall-card wall-card--full fu">
<div class="wall-card-header">
<span class="wall-card-header-num">01</span>
<span class="wall-card-header-sep">|</span>
<span class="wall-card-header-cat">戦略・全体</span>
</div>
<p class="wall-card-feeling">何が問題かわからない。施策を試しても手応えがない。まず現状を整理したい。</p>
<p class="wall-wall-label">あなたの壁はこれ！</p>
<p class="wall-wall-body">戦略ナシに戦術（施策）を走らせてる状態で、立ち返るポイントがなかったり、一貫性がなかったりしている。</p>
<p class="wall-tags-label">推奨施策はこちら</p>
<div class="wall-tags-wrap">
<a class="wall-tag" href="<?php echo esc_url( home_url( '/strategy/' ) ); ?>">WEB戦略</a>
<a class="wall-tag" href="https://selfachieve.jp/saikatsu_r/" rel="noopener noreferrer" target="_blank">採用戦略</a>
</div>
</article>
<!-- 02 集客・認知 -->
<article class="wall-card fu" style="transition-delay:.1s">
<div class="wall-card-header">
<span class="wall-card-header-num">02</span>
<span class="wall-card-header-sep">|</span>
<span class="wall-card-header-cat">集客・認知</span>
</div>
<p class="wall-card-feeling">検索で見つけてもらえない。広告を出しても費用対効果が悪い。もっと多くの見込み客に届けたい。</p>
<p class="wall-wall-label">あなたの壁はこれ！</p>
<p class="wall-wall-body">集客施策の「正解」探しに終始して、顧客があなたを選ぶ「理由」が設計されていない。ただ網を広げるだけの集客になり、お金を浪費する悪循環に陥っている。</p>
<p class="wall-tags-label">推奨施策はこちら</p>
<div class="wall-tags-wrap">
<a class="wall-tag" href="<?php echo esc_url( home_url( '/listing/' ) ); ?>">リスティング広告</a>
<a class="wall-tag" href="<?php echo esc_url( home_url( '/display/' ) ); ?>">ディスプレイ広告</a>
<a class="wall-tag" href="<?php echo esc_url( home_url( '/seo/' ) ); ?>">SEO対策</a>
<a class="wall-tag" href="<?php echo esc_url( home_url( '/meo/' ) ); ?>">MEO対策</a>
<a class="wall-tag" href="<?php echo esc_url( home_url( '/ai-seo/' ) ); ?>">AI検索対策</a>
<a class="wall-tag" href="<?php echo esc_url( home_url( '/sns/' ) ); ?>">SNSマーケティング</a>
</div>
</article>
<!-- 03 接客・CVR -->
<article class="wall-card fu" style="transition-delay:.2s">
<div class="wall-card-header">
<span class="wall-card-header-num">03</span>
<span class="wall-card-header-sep">|</span>
<span class="wall-card-header-cat">接客・CVR</span>
</div>
<p class="wall-card-feeling">アクセスはあるのに問い合わせが来ない。サイトを見ても離脱してしまう。訪問者を顧客に変えたい。</p>
<p class="wall-wall-label">あなたの壁はこれ！</p>
<p class="wall-wall-body">ホームページが単なる「情報の紹介」になっており、顧客の動機に対応する「接客」が機能していない。訪問者の迷いを取り除く設計がないため、検討の土台にすら乗れず、機会損失を続けている。</p>
<p class="wall-tags-label">推奨施策はこちら</p>
<div class="wall-tags-wrap">
<a class="wall-tag" href="<?php echo esc_url( home_url( '/website/' ) ); ?>">ホームページ制作</a>
<a class="wall-tag" href="<?php echo esc_url( home_url( '/website/#grow' ) ); ?>">分析改善</a>
</div>
</article>
<!-- 04 継続・LTV -->
<article class="wall-card fu" style="transition-delay:.3s">
<div class="wall-card-header">
<span class="wall-card-header-num">04</span>
<span class="wall-card-header-sep">|</span>
<span class="wall-card-header-cat">継続・LTV</span>
</div>
<p class="wall-card-feeling">リピーターが増えない。既存顧客との関係を維持したい。ファンを育てる仕組みをつくりたい。</p>
<p class="wall-wall-label">あなたの壁はこれ！</p>
<p class="wall-wall-body">「売って終わり」の単発施策ばかりで、購入後のお客様をファンにする仕組みがない。一度きりの関係で終わるため、顧客が資産として積み上がらず、常に新規客を追いかけ続けなければならない状態に陥っている。</p>
<p class="wall-tags-label">推奨施策はこちら</p>
<div class="wall-tags-wrap">
<a class="wall-tag" href="<?php echo esc_url( home_url( '/sns/line/' ) ); ?>">LINE</a>
<a class="wall-tag" href="<?php echo esc_url( home_url( '/sns/instagram/' ) ); ?>">Instagram</a>
<a class="wall-tag" href="<?php echo esc_url( home_url( '/sns/x/' ) ); ?>">X（旧Twitter）</a>
<a class="wall-tag" href="<?php echo esc_url( home_url( '/sns/youtube/' ) ); ?>">YouTube</a>
<a class="wall-tag" href="<?php echo esc_url( home_url( '/sns/tiktok/' ) ); ?>">TikTok</a>
</div>
</article>
<!-- 05 効率化・AI -->
<article class="wall-card fu" style="transition-delay:.4s">
<div class="wall-card-header">
<span class="wall-card-header-num">05</span>
<span class="wall-card-header-sep">|</span>
<span class="wall-card-header-cat">効率化・AI</span>
</div>
<p class="wall-card-feeling">手作業が多く時間がかかる。AIを使いたいが何から始めればいいかわからない。業務の無駄を省いて生産性を上げたい。</p>
<p class="wall-wall-label">あなたの壁はこれ！</p>
<p class="wall-wall-body">導入自体が「目的」となり、肝心の業務フロー再設計が置き去りがち。また、適材適所のAI選定と活用ルールがない場合が多く、AIに振り回されるだけで、真の効率化から遠ざかっている。</p>
<p class="wall-tags-label">推奨施策はこちら</p>
<div class="wall-tags-wrap">
<a class="wall-tag" href="<?php echo esc_url( home_url( '/ai-automation/' ) ); ?>">AI活用支援</a>
</div>
</article>
</div><!-- /wall-grid -->
</div><!-- /wall-split-right -->
</div><!-- /wall-split -->
</section>
<!-- SOLUTION: 解決方法はこれです -->
<section aria-labelledby="solution-h2" class="solution-sec">
<div class="solution-inner">
<div class="solution-head">
<span class="sec-eyebrow fu">Solutions</span>
<h2 class="sec-h2 fu" id="solution-h2" style="transition-delay:.1s">
        現状把握から施策設計まで、<br/>一貫した戦略を作ります。
      </h2>
<p class="sec-body fu" style="transition-delay:.2s">
        「とりあえずSEO」「とりあえず広告」ではなく、根拠のある優先順位で施策を選びます。必要ならビジネスモデルの見直しも行います。
      </p>
<div class="solution-head-reason fu" style="transition-delay:.3s">
<p class="solution-head-reason-q">なぜ？</p>
<p class="solution-head-reason-body">施策の前に必ず現状把握を行うのは、根拠のない施策が最大のコスト浪費だからです。</p>
</div>
</div>
<!-- SP スワイプ誘導ヒント -->
<p aria-hidden="true" class="solution-swipe-hint">スワイプして確認</p>
<div class="solution-items">
<!-- STEP 01 -->
<div class="solution-item fu">
<div aria-hidden="true" class="solution-item-num">01</div>
<div class="solution-item-body">
<span class="solution-item-step">STEP 01</span>
<h3 class="solution-item-title">現状把握</h3>
<p class="solution-item-desc">GA4・広告データ・競合調査をもとに、現状を数値で可視化します。<strong>「感覚」ではなく「データ」で現在地を確認</strong>します。どこで詰まっているかを客観的に把握することが、戦略設計の出発点です。</p>
</div>
</div>
<!-- STEP 02 -->
<div class="solution-item fu" style="transition-delay:.08s">
<div aria-hidden="true" class="solution-item-num">02</div>
<div class="solution-item-body">
<span class="solution-item-step">STEP 02</span>
<h3 class="solution-item-title">問題の整理・課題設定</h3>
<p class="solution-item-desc">分析結果から「集客」「転換」「リピート」のどこに問題があるかを特定します。症状（問い合わせが少ない）ではなく、<strong>根本原因（ファネルのどこが詰まっているか）を明確に</strong>します。</p>
</div>
</div>
<!-- STEP 03 -->
<div class="solution-item fu" style="transition-delay:.16s">
<div aria-hidden="true" class="solution-item-num">03</div>
<div class="solution-item-body">
<span class="solution-item-step">STEP 03</span>
<h3 class="solution-item-title">施策設計</h3>
<p class="solution-item-desc">課題に合わせた施策の組み合わせを設計します。<strong>SEO・広告・SNS・サイト改善など、各施策の役割を明確にし、優先順位と予算配分を決めます</strong>。必要ならビジネスモデルの見直しも行います。</p>
</div>
</div>
<!-- STEP 04 -->
<div class="solution-item fu" style="transition-delay:.24s">
<div aria-hidden="true" class="solution-item-num">04</div>
<div class="solution-item-body">
<span class="solution-item-step">STEP 04</span>
<h3 class="solution-item-title">実行・改善サポート</h3>
<p class="solution-item-desc">戦略を渡して終わりではありません。施策の実行と効果測定を継続し、データをもとに改善を積み重ねます。<strong>「やりっぱなし」ではなく、成果が出るまで伴走</strong>します。</p>
</div>
</div>
</div>
</div>
</section>
<!-- CASE: 具体事例 -->
<section aria-labelledby="case-h2" class="case-sec">
<div class="case-inner">
<div class="case-head" style="margin-bottom:32px;">
<div>
<span class="sec-eyebrow fu">Case Study</span>
<h2 class="sec-h2 fu" id="case-h2" style="transition-delay:.1s">支援事例</h2>
</div>
<div class="case-head-links fu">
<a class="view-all" href="<?php echo esc_url( home_url( '/voice/' ) ); ?>" style="font-size:16px;color:#ffffff;border-bottom-color:#ffffff;">支援先のお客様の声を見る</a>
</div>
</div>
<!-- SP スワイプ誘導ヒント -->
<p aria-hidden="true" class="case-swipe-hint">スワイプして確認</p>
<div class="case-grid">
<div class="case-card fu">
<p class="case-industry">医療 / 整骨院</p>
<p class="case-title">「集客できているのに<br/>問い合わせが来ない」を解決</p>
<p class="case-body">アクセス解析で<strong>「流入はあるが直帰率90%超」を発見</strong>。サイト構造の問題を特定し、LPの改善と問い合わせ導線の設計を実施。</p>
<div class="case-result">
<p class="case-result-label">RESULT — 問い合わせ数</p>
<p class="case-result-num" data-count="3.2" data-suffix="&lt;sup&gt;倍&lt;/sup&gt;">3.2<sup>倍</sup></p>
<p class="case-result-desc" style="font-size:16px;color:#28282D;">改善後3ヶ月で達成</p>
</div>
</div>
<div class="case-card fu" style="transition-delay:.05s">
<p class="case-industry">飲食 / カフェ</p>
<p class="case-title">SNS・広告・MEOを<br/>戦略的に連動させた事例</p>
<p class="case-body">バラバラに運用していた<strong>SNS・Google広告・MEOを一つの戦略のもとに統合</strong>。各施策の役割を明確にし、相乗効果を生み出した。</p>
<div class="case-result">
<p class="case-result-label">RESULT — 月間来店数</p>
<p class="case-result-num" data-count="180" data-prefix="+" data-suffix="&lt;sup&gt;%&lt;/sup&gt;">+180<sup>%</sup></p>
<p class="case-result-desc" style="font-size:16px;color:#28282D;">戦略統合後6ヶ月で達成</p>
</div>
</div>
<div class="case-card fu" style="transition-delay:.1s">
<p class="case-industry">製造業 / BtoB</p>
<p class="case-title">広告費を半減しながら<br/>問い合わせ数を維持した事例</p>
<p class="case-body">広告依存の集客構造を分析。SEOとコンテンツ戦略を組み合わせることで、<strong>広告費を削減しながら安定した集客基盤を構築</strong>した。</p>
<div class="case-result">
<p class="case-result-label">RESULT — 広告費削減</p>
<p class="case-result-num" data-count="52" data-prefix="-" data-suffix="&lt;sup&gt;%&lt;/sup&gt;">-52<sup>%</sup></p>
<p class="case-result-desc" style="font-size:16px;color:#28282D;">問い合わせ数は維持</p>
</div>
</div>
</div>
<p class="sp-swipe-hint">スワイプして見る</p>
<div class="case-head-links fu" style="margin-top:32px;">
<a class="view-all" href="<?php echo esc_url( home_url( '/voice/' ) ); ?>" style="font-size:16px;color:#ffffff;border-bottom-color:#ffffff;">支援先のお客様の声を見る</a>
</div>
</div>
</section>
<!-- AREA -->
<section aria-labelledby="strategy-area-h2" class="area-sec" id="area">
<div class="area-inner">
<div class="area-left">
<p class="area-eyebrow fu">SERVICE AREA</p>
<h2 class="area-h2 fu" id="strategy-area-h2" style="transition-delay:.1s">
        対応エリア
      </h2>
<p class="area-desc fu" style="transition-delay:.2s">
        神戸市を中心に、兵庫県全域および近隣府県の中小企業・店舗の集客支援を行っています。オンラインにて全国対応も可能です。
      </p>
</div>
<div class="area-right">
<div class="area-group fu">
<p class="area-group-label easy">柔軟にお伺いできます</p>
<div aria-label="簡単に訪問可能なエリア" class="area-tags" role="list">
<span class="area-tag" role="listitem"><span class="area-tag-dot"></span>神戸市</span>
<span class="area-tag" role="listitem"><span class="area-tag-dot"></span>姫路市</span>
<span class="area-tag" role="listitem"><span class="area-tag-dot"></span>明石市</span>
<span class="area-tag" role="listitem"><span class="area-tag-dot"></span>加古川市</span>
<span class="area-tag" role="listitem"><span class="area-tag-dot"></span>芦屋市</span>
<span class="area-tag" role="listitem"><span class="area-tag-dot"></span>西宮市</span>
<span class="area-tag" role="listitem"><span class="area-tag-dot"></span>宝塚市</span>
<span class="area-tag" role="listitem"><span class="area-tag-dot"></span>三木市</span>
<span class="area-tag" role="listitem"><span class="area-tag-dot"></span>三田市</span>
<span class="area-tag" role="listitem"><span class="area-tag-dot"></span>淡路市</span>
<span class="area-tag" role="listitem"><span class="area-tag-dot"></span>尼崎市</span>
<span class="area-tag" role="listitem"><span class="area-tag-dot"></span>大阪府</span>
<span class="area-tag" role="listitem"><span class="area-tag-dot"></span>京都府</span>
</div>
</div>
<div class="area-group fu" style="transition-delay:.1s">
<p class="area-group-label adjust">お伺いには調整が必要です</p>
<div aria-label="訪問に調整が必要なエリア" class="area-tags" role="list">
<span class="area-tag" role="listitem"><span class="area-tag-dot"></span>上記以外の兵庫県内</span>
<span class="area-tag" role="listitem"><span class="area-tag-dot"></span>その他関西圏</span>
</div>
</div>
<div class="area-group fu" style="transition-delay:.2s">
<p class="area-group-label online">オンラインで対応</p>
<div aria-label="オンライン対応エリア" class="area-tags" role="list">
<span class="area-tag" role="listitem"><span class="area-tag-dot"></span>全国どこでも</span>
</div>
</div>
<p class="area-note fu" style="margin-top:24px">※まずはお気軽にご相談ください。対面・オンラインのどちらでも対応可能です。</p>
</div>
</div>
</section>
<!-- AUTHORITY: 権威性 -->
<section aria-labelledby="authority-h2" class="authority-sec">
<div class="authority-inner">
<div class="authority-left">
<span class="authority-eyebrow fu">TRACK RECORD</span>
<h2 class="authority-h2 fu" id="authority-h2" style="transition-delay:.1s">
        こんなにいっぱい、<br/>ご相談をいただいています。
      </h2>
<p class="authority-body fu" style="transition-delay:.2s">
        神戸を拠点に、医療・飲食・製造・小売・サービス業など、
        幅広い業種の中小企業・店舗の集客を支援してきました。
        14年・200社以上の実績があります。
      </p>
<div class="authority-stats-other fu" style="transition-delay:.4s">
<div class="authority-stat-other">
<p class="authority-stat-n">200<sup>社+</sup></p>
<p class="authority-stat-l">累計支援実績</p>
</div>
<div class="authority-stat-other">
<p class="authority-stat-n">20<sup>業種+</sup></p>
<p class="authority-stat-l">対応業種数</p>
</div>
</div>
</div>
<div class="authority-right">
<span class="authority-tags-label fu">対応業種</span>
<div class="authority-tags fu" style="transition-delay:.1s">
<span class="authority-tag lg">医療・クリニック</span>
<span class="authority-tag lg">飲食・カフェ</span>
<span class="authority-tag">整骨院・整体</span>
<span class="authority-tag">美容室・サロン</span>
<span class="authority-tag lg">製造業</span>
<span class="authority-tag sm">士業・法律</span>
<span class="authority-tag">不動産</span>
<span class="authority-tag lg">EC・通販</span>
<span class="authority-tag sm">教育・スクール</span>
<span class="authority-tag">建設・工務店</span>
<span class="authority-tag lg">小売・店舗</span>
<span class="authority-tag sm">保険・金融</span>
<span class="authority-tag">介護・福祉</span>
<span class="authority-tag">BtoB製造</span>
<span class="authority-tag lg">ホテル・宿泊</span>
<span class="authority-tag sm">フィットネス</span>
<span class="authority-tag">自動車販売</span>
<span class="authority-tag sm">農業・食品</span>
<span class="authority-tag">IT・SaaS</span>
<span class="authority-tag lg">その他多数</span>
</div>
</div>
</div>
</section>
<!-- FAQ -->
<section aria-labelledby="faq-h2" class="faq-sec" id="faq">
<div class="faq-head">
<div>
<p class="sec-eyebrow fu">FAQ</p>
<h2 class="faq-h2 fu" id="faq-h2">よくある質問</h2>
</div>
<a aria-label="よくある質問をすべて見る" class="view-all fu" href="<?php echo esc_url( home_url( '/faq/' ) ); ?>">すべて見る</a>
</div>
<div class="faq-list" role="list">
<div class="faq-item fu" role="listitem">
<div aria-controls="sfaq-a-1" aria-expanded="false" class="faq-q" role="button" tabindex="0">
<span class="faq-q-mark">Q</span>
<span class="faq-q-text">WEB戦略設計とは何ですか？</span>
<span aria-hidden="true" class="faq-q-icon"></span>
</div>
<div class="faq-a" id="sfaq-a-1" role="region">
<div class="faq-a-inner">
<span class="faq-a-mark">A</span>
<p class="faq-a-text">GA4・広告データ・競合分析などを用いて現状を数値化し、「なぜ成果が出ていないか」の根本原因を特定した上で、最も効果的な施策の組み合わせを設計するサービスです。「とりあえずSEO」ではなく、根拠のある優先順位で施策を選びます。</p>
</div>
</div>
</div>
<div class="faq-item fu" role="listitem" style="transition-delay:.05s">
<div aria-controls="sfaq-a-2" aria-expanded="false" class="faq-q" role="button" tabindex="0">
<span class="faq-q-mark">Q</span>
<span class="faq-q-text">費用はどれくらいかかりますか？</span>
<span aria-hidden="true" class="faq-q-icon"></span>
</div>
<div class="faq-a" id="sfaq-a-2" role="region">
<div class="faq-a-inner">
<span class="faq-a-mark">A</span>
<p class="faq-a-text">初回相談は完全無料です。戦略設計の費用はビジネスの規模や課題の複雑さによって異なります。まずは無料相談でご状況をお聴かせください。お見積りは無料でご提示します。</p>
</div>
</div>
</div>
<div class="faq-item fu" role="listitem" style="transition-delay:.1s">
<div aria-controls="sfaq-a-3" aria-expanded="false" class="faq-q" role="button" tabindex="0">
<span class="faq-q-mark">Q</span>
<span class="faq-q-text">どんな業種でも対応できますか？</span>
<span aria-hidden="true" class="faq-q-icon"></span>
</div>
<div class="faq-a" id="sfaq-a-3" role="region">
<div class="faq-a-inner">
<span class="faq-a-mark">A</span>
<p class="faq-a-text">はい、医療・法律・教育・美容・飲食・ECなど２０業種以上の支援実績があります。業種によってWEBマーケティングの特性が異なるため、業種ごとの知見をもとに戦略を設計します。</p>
</div>
</div>
</div>
<div class="faq-item fu" role="listitem" style="transition-delay:.15s">
<div aria-controls="sfaq-a-4" aria-expanded="false" class="faq-q" role="button" tabindex="0">
<span class="faq-q-mark">Q</span>
<span class="faq-q-text">戦略設計だけの依頼もできますか？</span>
<span aria-hidden="true" class="faq-q-icon"></span>
</div>
<div class="faq-a" id="sfaq-a-4" role="region">
<div class="faq-a-inner">
<span class="faq-a-mark">A</span>
<p class="faq-a-text">はい、戦略設計のみのご依頼も承っています。「自社で実行したい」「現在の代理店に戦略だけ渡したい」など、様々なご要望に対応しています。まずはご相談ください。</p>
</div>
</div>
</div>
</div>
</section>
<!-- CTA -->
<section aria-labelledby="cta-h2-strategy" class="cta" id="contact">
<div class="cta-wrap">
<p class="cta-eyebrow fu">CONSULTING</p>
<h2 class="cta-h2 fu" id="cta-h2-strategy" style="transition-delay:.1s">
<span class="cta-h2-line">まず、お話してみませんか。</span>
<span class="cta-h2-line">初回相談は無料です。</span>
</h2>
<p class="cta-body fu" style="transition-delay:.2s">
      「何から始めればいいかわからない」という段階でも構いません。<br>
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
