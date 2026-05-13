<?php
/**
 * Template Name: リスティング広告
 * Description: リスティング広告ページ（/listing/）のWordPressテンプレート
 */
get_header(); ?>

<main>

<!-- KV -->
<section class="kv" aria-labelledby="kv-h1" style="background:#111113;position:relative;overflow:hidden;">
  <style>
/* ===== KV SERVICE LABEL ===== */
.kv-service-label {
  display: inline-flex;
  align-items: center;
  font-family: 'Noto Sans JP', sans-serif;
  font-weight: 900;
  font-size: clamp(13px, 1.1vw, 14px);
  letter-spacing: .2em;
  text-transform: uppercase;
  color: #fff;
  border-left: 3px solid rgba(255,255,255,.9);
  padding: 4px 0 4px 14px;
  margin-bottom: 22px;
  position: relative;
  z-index: 2;
}
/* ===== KV SPLASH: REMOVED ===== */
.kv-right { display: none !important; }
.kv-splash { display: none !important; }
/* ===== KV PADDING: 上下余白削減 ===== */
.kv {
  min-height: auto !important;
  padding: var(--kv-padding-v, 72px) 80px !important;
}
/* ===== KV INNER: full-width text layout (2-line H1) ===== */
@media (min-width: 769px) {
  .kv .kv-inner {
    grid-template-columns: 1fr !important;
    max-width: 1400px !important;
  }
  .kv .kv-h1 {
    font-size: clamp(40px, 6vw, 88px) !important;
    line-height: 1.2 !important;
    letter-spacing: -0.04em !important;
    margin-bottom: 32px !important;
  }
  .kv .kv-eyebrow {
    font-size: clamp(28px, 4vw, 56px) !important;
    font-weight: 900 !important;
    letter-spacing: -0.02em !important;
    color: #ffffff !important;
    margin-bottom: 20px !important;
    gap: 20px !important;
  }
  .kv .kv-eyebrow::before {
    display: none !important;
  }
  .kv .kv-sub {
    margin-bottom: 0 !important;
  }
}
@media (max-width: 768px) {
  .kv {
    padding: var(--kv-padding-v-sp, 56px) 24px !important;
    min-height: auto !important;
  }
  .kv .kv-h1 {
    color: #ffffff !important;
  }
  .kv .kv-eyebrow {
    color: rgba(255,255,255,.85) !important;
    font-size: 13px !important;
    font-weight: 700 !important;
    letter-spacing: .15em !important;
    display: flex !important;
    align-items: center !important;
    gap: 10px !important;
  }
  .kv .kv-eyebrow::before {
    content: '' !important;
    display: inline-block !important;
    width: 24px !important;
    height: 2px !important;
    background: rgba(255,255,255,.7) !important;
    flex-shrink: 0 !important;
  }
  .kv .kv-sub {
    color: #ffffff !important;
    font-size: 15px !important;
    font-weight: 400 !important;
  }
  .kv .kv-body {
    color: #ffffff !important;
    font-size: 14px !important;
    line-height: 1.9 !important;
    font-weight: 400 !important;
  }
  .kv-question {
    color: rgba(255,255,255,.65) !important;
    font-size: 14px !important;
  }
}
/* ===== TARGETING-CARD: 角丸なし・黒テキスト・黒アイコン ===== */
.targeting-card {
  border-radius: 0 !important;
}
.targeting-card.is-geo {
  border-color: #E8E8E8 !important;
  background: #fff !important;
}
.targeting-card-num {
  color: #28282D !important;
}
.targeting-card-icon {
  background: rgba(0,0,0,.06) !important;
  border-radius: 0 !important;
}
.targeting-card-icon svg {
  stroke: #28282D !important;
}
.targeting-card-tag {
  color: #28282D !important;
  background: #EBEBEB !important;
  border-radius: 0 !important;
}
.targeting-card.is-geo .targeting-card-tag {
  color: #28282D !important;
  background: #EBEBEB !important;
}
.targeting-card:hover {
  box-shadow: none !important;
  transform: none !important;
}
  </style>
  <div class="kv-inner">
    <div class="kv-left">
      <p class="kv-eyebrow fu">— LISTING 広告</p>
      <h1 class="kv-h1 fu" id="kv-h1" style="transition-delay:.08s">
        速攻で集客し、<br>勝ちパターンをつくる。
      </h1>
      <p class="kv-sub fu" style="transition-delay:.16s">
        即日配信・即効果測定。きめ細かなテストと調整で、<br>
        広告費を無駄にしない運用を実現します。
      </p>
    </div>
  </div>
</section>

<!-- PC BREADCRUMB（KV直後） -->
<nav class="breadcrumb" aria-label="パンくずリスト">
  <ol>
    <li><a href="<?php echo esc_url( home_url('/') ); ?>">ホーム</a></li>
    <li><span aria-current="page">リスティング広告</span></li>
  </ol>
</nav>

<!-- PROBLEM -->
<section class="problem-sec" aria-labelledby="problem-h2">
  <div class="problem-inner">
    <div class="problem-head">
      <span class="sec-eyebrow fu">Problems</span>
      <h2 class="sec-h2 fu" id="problem-h2" style="transition-delay:.1s">
        広告を出しているのに、<br>問い合わせが増えない。
      </h2>
      <p class="sec-body fu" style="transition-delay:.15s">
        「広告費をかけているのにクリックされない」「クリックされても問い合わせに繋がらない」「代理店に任せているが何をやっているかわからない」——そのお悩み、運用設計と改善サイクルの問題かもしれません。
      </p>
    </div>
    <div class="problem-cards">
      <div class="problem-card fu">
        <span class="problem-num">01</span>
        <p class="problem-title">広告費が増えるのに、<br>成果が出ない</p>
        <p class="problem-desc">クリック数は増えているのに問い合わせが来ない。クリック単価が高くてROIが合わない。広告費を無駄にしている気がする。</p>
      </div>
      <div class="problem-card fu" style="transition-delay:.08s">
        <span class="problem-num">02</span>
        <p class="problem-title">代理店に任せているが<br>中身がわからない</p>
        <p class="problem-desc">毎月レポートが届くが数字の意味がわからない。何を改善しているのか見えない。担当者が変わるたびに方針がブレる。</p>
      </div>
      <div class="problem-card fu" style="transition-delay:.16s">
        <span class="problem-num">03</span>
        <p class="problem-title">自社で運用しているが<br>限界を感じている</p>
        <p class="problem-desc">キーワード設定・入札・広告文の最適化が追いつかない。競合に負けている理由がわからない。もっと効率よく運用したい。</p>
      </div>
    </div>
    <p class="sp-swipe-hint">スワイプして見る</p>
  </div>
</section>

<!-- CASE: 支援事例 -->
<section class="case-sec" aria-labelledby="case-h2">
  <div class="case-inner">
    <div class="case-head">
      <div>
        <span class="sec-eyebrow fu">Case Study</span>
        <h2 class="sec-h2 fu" id="case-h2" style="transition-delay:.1s">
          様々な業種・規模での<br>リスティング広告支援実績。
        </h2>
      </div>
    </div>
    <div class="case-tags-sec fu">
      <span class="case-tags-label">SUPPORTED INDUSTRIES</span>
      <div class="case-tags">
        <span class="case-tag lg">医療・クリニック</span>
        <span class="case-tag lg">法律・士業</span>
        <span class="case-tag">美容・エステ</span>
        <span class="case-tag">飲食・カフェ</span>
        <span class="case-tag lg">EC・通販</span>
        <span class="case-tag">不動産</span>
        <span class="case-tag">建設・リフォーム</span>
        <span class="case-tag sm">教育・スクール</span>
        <span class="case-tag">BtoB製造業</span>
        <span class="case-tag sm">採用・HR</span>
        <span class="case-tag">フィットネス</span>
        <span class="case-tag sm">ペット</span>
        <span class="case-tag">旅行・観光</span>
        <span class="case-tag sm">金融・保険</span>
      </div>
    </div>
    <div class="case-grid">

      <!-- 事例01 -->
      <div class="case-card fu">
        <span class="case-industry">MEDICAL / CLINIC</span>
        <h3 class="case-title">地域クリニックの新患獲得広告を全面再設計</h3>
        <p class="case-summary">
          <strong style="color:#28282D;font-weight:700;">課題：</strong>「地域名＋診療科」で広告を出していたが、クリック単価が高騰しROIが悪化。広告文が競合と差別化できていなかった。<br><br>
          <strong style="color:#28282D;font-weight:700;">施策：</strong>検索意図別にキャンペーンを分割。「症状系」「診療科系」「地名系」で広告文・LPを最適化。除外キーワードを徹底整備し無駄クリックを削減。
        </p>
        <div class="case-ba">
          <p class="case-ba-metric">CPA（新患1件あたりの広告費）</p>
          <div class="case-ba-col">
            <span class="case-ba-label">BEFORE</span>
            <span class="case-ba-num">18,000</span>
            <span class="case-ba-unit">円 / 件</span>
          </div>
          <div class="case-ba-arrow">→</div>
          <div class="case-ba-col after">
            <span class="case-ba-label">AFTER</span>
            <span class="case-ba-num" data-count="8400" data-separator=",">8,400</span>
            <span class="case-ba-unit">円 / 件</span>
          </div>
        </div>
      </div>

      <!-- 事例02 -->
      <div class="case-card fu" style="transition-delay:.1s">
        <span class="case-industry">B2B / PROFESSIONAL SERVICE</span>
        <h3 class="case-title">士業事務所の問い合わせ獲得コストを大幅削減</h3>
        <p class="case-summary">
          <strong style="color:#28282D;font-weight:700;">課題：</strong>広告は出しているが問い合わせが月1〜2件。クリック率が低く、広告文が一般的すぎて刺さっていなかった。<br><br>
          <strong style="color:#28282D;font-weight:700;">施策：</strong>「○○でお困りの方へ」という悩みフォーカス型の広告文に刷新。レスポンシブ検索広告の見出し・説明文を20パターン以上テスト。LP改修も並行実施。
        </p>
        <div class="case-ba">
          <p class="case-ba-metric">月間問い合わせ件数</p>
          <div class="case-ba-col">
            <span class="case-ba-label">BEFORE</span>
            <span class="case-ba-num">2</span>
            <span class="case-ba-unit">件 / 月</span>
          </div>
          <div class="case-ba-arrow">→</div>
          <div class="case-ba-col after">
            <span class="case-ba-label">AFTER</span>
            <span class="case-ba-num" data-count="14">14</span>
            <span class="case-ba-unit">件 / 月</span>
          </div>
        </div>
      </div>

      <!-- 事例03 -->
      <div class="case-card fu" style="transition-delay:.2s">
        <span class="case-industry">E-COMMERCE / RETAIL</span>
        <h3 class="case-title">ECサイトのショッピング広告を最適化しROASを改善</h3>
        <p class="case-summary">
          <strong style="color:#28282D;font-weight:700;">課題：</strong>Googleショッピング広告を運用していたが、低利益商品に予算が集中。高利益商品が露出されず広告費が回収できていなかった。<br><br>
          <strong style="color:#28282D;font-weight:700;">施策：</strong>商品フィードを利益率別に整理し、入札戦略を商品グループ単位で再設計。スマートショッピングから標準ショッピングへ移行し、手動でコントロールできる体制を構築。
        </p>
        <div class="case-ba">
          <p class="case-ba-metric">ROAS（広告費用対効果）</p>
          <div class="case-ba-col">
            <span class="case-ba-label">BEFORE</span>
            <span class="case-ba-num">180</span>
            <span class="case-ba-unit">%</span>
          </div>
          <div class="case-ba-arrow">→</div>
          <div class="case-ba-col after">
            <span class="case-ba-label">AFTER</span>
            <span class="case-ba-num" data-count="520">520</span>
            <span class="case-ba-unit">%</span>
          </div>
        </div>
      </div>

    </div>
    <p class="sp-swipe-hint">スワイプして見る</p>
  </div>
</section>

<!-- TARGETING: ターゲティング手法 -->
<section class="targeting-sec" aria-labelledby="targeting-h2-listing">
  <div class="targeting-inner">
    <div class="targeting-head">
      <span class="sec-eyebrow fu">Targeting</span>
      <h2 class="sec-h2 fu" id="targeting-h2-listing" style="transition-delay:.1s">ターゲティングの精度が、成果を決める。<br>そして、それが我々の最大の強み。</h2>
      <p class="sec-lead fu" style="transition-delay:.2s">誰に・どこで・どのタイミングで届けるかを精密に設計。<br>リスティング広告の真価は、キーワード設計と入札戦略の組み合わせにある。</p>
    </div>
    <div class="targeting-grid">
      <article class="targeting-card is-geo fu">
        <p class="targeting-card-num">01 / KEYWORD TARGETING</p>
        <div class="targeting-card-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg></div>
        <h3 class="targeting-card-title">検索意図を捕えて、<br>必要な人に届ける。</h3>
        <p class="targeting-card-desc">「今すぐ欲しい」「近くで探している」など、<strong>購買意欲の高いキーワードに絞って配信。</strong>ブロード・フレーズ・完全一致を組み合わせ、無駄なクリックを排除します。</p>
        <div class="targeting-card-tags"><span class="targeting-card-tag">ブロードマッチ</span><span class="targeting-card-tag">フレーズマッチ</span><span class="targeting-card-tag">完全一致</span></div>
      </article>
      <article class="targeting-card fu" style="transition-delay:.06s">
        <p class="targeting-card-num">02 / NEGATIVE KEYWORD</p>
        <div class="targeting-card-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"/></svg></div>
        <h3 class="targeting-card-title">無駄打ちをなくして、<br>予算を守る。</h3>
        <p class="targeting-card-desc">関係のない検索クエリへの表示を除外キーワードでブロック。<strong>クリック単価を下げ、限られた予算で最大の成果</strong>を引き出します。</p>
        <div class="targeting-card-tags"><span class="targeting-card-tag">除外キーワード</span><span class="targeting-card-tag">クエリ管理</span><span class="targeting-card-tag">予算最適化</span></div>
      </article>
      <article class="targeting-card fu" style="transition-delay:.12s">
        <p class="targeting-card-num">03 / GEO TARGETING</p>
        <div class="targeting-card-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/><circle cx="12" cy="9" r="2.5"/></svg></div>
        <h3 class="targeting-card-title">地域を絞って、<br>地元客に届ける。</h3>
        <p class="targeting-card-desc">ターゲット商圏中心に市区町村・半径指定で配信エリアを精密設定。<strong>来店・問い合わせに繋がるユーザーだけに表示</strong>し、地域ビジネスの集客効率を高めます。</p>
        <div class="targeting-card-tags"><span class="targeting-card-tag">市区町村指定</span><span class="targeting-card-tag">半径ターゲティング</span><span class="targeting-card-tag">除外設定</span></div>
      </article>
      <article class="targeting-card fu" style="transition-delay:.18s">
        <p class="targeting-card-num">04 / DEVICE &amp; SCHEDULE</p>
        <div class="targeting-card-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg></div>
        <h3 class="targeting-card-title">デバイス・時間帯で、<br>入札を最適化。</h3>
        <p class="targeting-card-desc">スマートフォン・ PC・タブレット別の入札調整と、曜日・時間帯別の配信スケジュールで無駄な消化を防止。<strong>コンバージョン率の高い時間帯に集中して予算効率を最大化。</strong></p>
        <div class="targeting-card-tags"><span class="targeting-card-tag">デバイス調整</span><span class="targeting-card-tag">時間帯設定</span><span class="targeting-card-tag">入札戦略</span></div>
      </article>
      <article class="targeting-card fu" style="transition-delay:.24s">
        <p class="targeting-card-num">05 / AUDIENCE TARGETING</p>
        <div class="targeting-card-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
        <h3 class="targeting-card-title">オーディエンスで、<br>購買層に絞る。</h3>
        <p class="targeting-card-desc">購買意向・ライフイベント・リマーケティングリストなど、ユーザー層を絞り込んで入札を強化。<strong>検索キーワードとの組み合わせでコンバージョン率を大幅改善。</strong></p>
        <div class="targeting-card-tags"><span class="targeting-card-tag">購買意向オーディエンス</span><span class="targeting-card-tag">リマーケティング</span><span class="targeting-card-tag">類似オーディエンス</span></div>
      </article>
      <article class="targeting-card fu" style="transition-delay:.30s">
        <p class="targeting-card-num">06 / AD PLATFORM</p>
        <div class="targeting-card-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg></div>
        <h3 class="targeting-card-title">媒体を選んで、<br>最大の接点を作る。</h3>
        <p class="targeting-card-desc">Google広告・Yahoo！リスティング・Microsoft広告など、業種・ターゲットに最適な媒体を選択。<strong>媒体ごとのアルゴリズム特性を活かし、配信効率を最大化</strong>します。</p>
        <div class="targeting-card-tags"><span class="targeting-card-tag">Google広告</span><span class="targeting-card-tag">Yahoo！リスティング</span><span class="targeting-card-tag">Microsoft広告</span></div>
      </article>
    </div>
    <p class="sp-swipe-hint">スワイプして見る</p>
  </div>
</section>

<!-- FLOW: 運用の流れ -->
<section class="flow-sec" aria-labelledby="flow-h2">
  <div class="flow-inner">
    <div class="flow-head">
      <span class="sec-eyebrow fu">Flow</span>
      <h2 class="sec-h2 fu" id="flow-h2" style="transition-delay:.1s">
        ヒアリングから改善まで、<br>一貫してサポート。
      </h2>
      <p class="sec-body fu" style="transition-delay:.15s">
        広告配信を「出して終わり」にしない。データを見ながら継続的に改善し、成果を最大化します。
      </p>
    </div>
    <div class="flow-items">
      <div class="flow-item fu">
        <div class="flow-item-num">01</div>
        <div class="flow-item-body">
          <span class="flow-item-step">STEP 01 — ANALYSIS</span>
          <h3 class="flow-item-title">現状分析・ヒアリング</h3>
          <p class="flow-item-desc">
            ビジネス目標・ターゲット・競合状況・既存アカウントのデータを徹底的にヒアリング。「なぜ成果が出ていないか」の根本原因を特定し、改善の優先順位を明確にします。
          </p>
          <span class="flow-item-tag">Google広告アカウント診断 / 競合調査 / KPI設定</span>
        </div>
      </div>
      <div class="flow-item fu" style="transition-delay:.08s">
        <div class="flow-item-num">02</div>
        <div class="flow-item-body">
          <span class="flow-item-step">STEP 02 — SETUP</span>
          <h3 class="flow-item-title">キャンペーン設計・広告配信開始</h3>
          <p class="flow-item-desc">
            キーワード選定・マッチタイプ設定・広告文作成・入札戦略の設計を行い、最短翌営業日から配信を開始。コンバージョントラッキングの設定も含め、計測できる体制を整えます。
          </p>
          <span class="flow-item-tag">キーワード設計 / 広告文作成 / CV計測設定</span>
        </div>
      </div>
      <div class="flow-item fu" style="transition-delay:.16s">
        <div class="flow-item-num">03</div>
        <div class="flow-item-body">
          <span class="flow-item-step">STEP 03 — OPTIMIZATION</span>
          <h3 class="flow-item-title">継続的なテストと最適化</h3>
          <p class="flow-item-desc">
            広告文・キーワード・入札・ターゲティングを継続的にテスト。データに基づいてPDCAを回し、CPA改善・ROAS向上を追求します。月次レポートで進捗を可視化します。
          </p>
          <span class="flow-item-tag">A/Bテスト / 入札最適化 / 月次レポート</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- BADGE: Google Partner認定帯 -->
<section class="badge-sec">
  <div class="badge-inner">
    <div class="badge-head">
      <span class="badge-label">Certification</span>
      <p class="badge-title">Google 広告 認定パートナー</p>
      <p class="badge-desc">Googleが認定する広告代理店として、Google広告・Yahoo!広告・bing広告の運用を担います。認定資格の取得と継続的な学習により、最新の広告プロダクトと運用手法を常にアップデートしています。</p>
    </div>
    <div class="badge-img-block">
      <a href="https://www.google.com/partners/agency?id=7098540721" target="_blank" rel="noopener">
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/google-partner-badge.svg" alt="Google Partner Badge" width="180" height="180" loading="lazy" style="display:block;width:180px;height:auto;">
      </a>
    </div>
  </div>
</section>

<!-- PLAN: 料金プラン -->
<section class="plan-sec" aria-labelledby="plan-h2">
  <div class="plan-inner">
    <div class="plan-head">
      <span class="sec-eyebrow fu">Pricing</span>
      <h2 class="sec-h2 fu" id="plan-h2" style="transition-delay:.1s">
        明朗会計で、<br>運用に集中できる。
      </h2>
      <p class="sec-body fu" style="transition-delay:.15s">
        手数料は広告費の20%。複雑な料金体系はありません。
      </p>
    </div>
    <div class="plan-note-box fu">
      <svg class="plan-note-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 8v4M12 16h.01"/></svg>
      <p class="plan-note-text">
        バナー・画像制作が必要な場合は別途お見積りとなります。<br>
        月額最低手数料・広告費の下限については無料相談でご確認ください。
      </p>
    </div>
    <div class="plan-grid">
      <div class="plan-card fu">
        <span class="plan-type">FULL MANAGEMENT</span>
        <h3 class="plan-name">リスティング広告運用代行</h3>
        <p class="plan-tagline">設計から運用・改善まで一切対応。<br>広告運用をそのままお任せいただけます。</p>

        <!-- 料金表 -->
        <div class="plan-fee-table">
          <div class="plan-fee-row plan-fee-header">
            <span>広告費（媒体への支払い）</span>
            <span>手数料（税込）</span>
          </div>
          <div class="plan-fee-row">
            <span>300,000円以下</span>
            <span class="plan-fee-price">66,000円</span>
          </div>
          <div class="plan-fee-row">
            <span>300,000円以上</span>
            <span class="plan-fee-price">広告実費 × 20%</span>
          </div>
        </div>
        <p class="plan-price-note">※表示価格はすべて税込み / 初回相談無料</p>
        <div class="plan-divider"></div>
        <ul class="plan-features">
          <li class="plan-feature">現状分析・アカウント診断</li>
          <li class="plan-feature">キャンペーン設計・広告文作成</li>
          <li class="plan-feature">キーワード選定・入札管理</li>
          <li class="plan-feature">コンバージョン計測設定</li>
          <li class="plan-feature">継続的なテストと最適化</li>
          <li class="plan-feature">月次レポート・定例MTG</li>
        </ul>
        <p class="plan-caution">※ Instagram（メタ）や TikTok のような広告配信先へ支払う広告費は別途必要です。</p>
        <a href="<?php echo esc_url( home_url('/contact/') ); ?>" class="btn-plan">無料相談を申し込む</a>
      </div>
      <div class="plan-card fu" style="transition-delay:.1s">
        <span class="plan-type">CREATIVE</span>
        <h3 class="plan-name">バナー制作・動画制作</h3>
        <p class="plan-tagline">広告の結果を最大化させるクリエイティブを作成。<br>運用代行と併せてご依頼いただけます。</p>
        <p class="plan-price">別途見積もり</p>
        <p class="plan-price-note">制作内容・数量により異なります / 初回相談無料</p>
        <div class="plan-divider"></div>
        <ul class="plan-features">
          <li class="plan-feature">ディスプレイ広告用バナー制作</li>
          <li class="plan-feature">リスティング広告用画像・ビジュアル制作</li>
          <li class="plan-feature">YouTube・ショート動画広告用動画制作</li>
          <li class="plan-feature">SNS広告用クリエイティブ制作</li>
          <li class="plan-feature">LP（ランディングページ）制作</li>
        </ul>
        <p class="plan-caution">※運用代行と併せてのご依頼の場合、クリエイティブの内容を考慮した一体的な提案が可能です。</p>
        <a href="<?php echo esc_url( home_url('/contact/') ); ?>" class="btn-plan">無料相談を申し込む</a>
      </div>
    </div>
    <p class="sp-swipe-hint">スワイプして見る</p>
  </div>
</section>

<!-- BOTTOM CTA -->
<section id="contact" class="cta" aria-labelledby="cta-h2">
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
      <a href="<?php echo esc_url( home_url('/contact/') ); ?>" class="btn-cta" aria-label="無料相談を申し込む">無料相談を申し込む</a>
      <div class="cta-tel-wrap">
        <p class="cta-tel-label">お電話でのご相談</p>
        <a href="tel:0788068338" class="cta-tel" aria-label="電話番号 078-806-8338">078-806-8338</a>
      </div>
    </div>
  </div>
</section>

<!-- VOICE: お客様の声 -->
<section id="voice" class="voice-sec" aria-labelledby="voice-title">
  <div class="voice-head">
    <div>
      <span class="sec-eyebrow fu">CLIENT VOICES</span>
      <h2 class="sec-h2 fu" id="voice-title" style="transition-delay:.1s">伴走してきた企業の、<br>リアルな声。</h2>
    </div>
    <a href="<?php echo esc_url( home_url('/voice/') ); ?>" class="view-all fu" style="transition-delay:.2s" aria-label="お客さまの声をすべて見る">すべて見る</a>
  </div>
  <div class="voice-grid">
    <article class="voice-card fu">
      <a href="<?php echo esc_url( home_url('/voice/iwazawa/') ); ?>" class="voice-link" aria-label="岩澤法理事務所の声を詳しく見る">
      <div class="voice-avatar">
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/voice/iwazawa.webp" alt="岩澤法理事務所" width="280" height="280" loading="lazy">
      </div>
      <div class="voice-body">
        <p class="voice-quote">
          「特殊な業界だからこそ、心強い」<br>
          共に課題へ向き合うWeb集客のパートナー
        </p>
        <div class="voice-meta">
          <p class="voice-co">法律事務所</p>
          <p class="voice-name">岩澤法理事務所 様</p>
          <p class="voice-more">詳しく見る →</p>
        </div>
      </div>
      </a>
    </article>
    <article class="voice-card fu" style="transition-delay:.1s">
      <a href="<?php echo esc_url( home_url('/voice/') ); ?>" class="voice-link" aria-label="株式会社エデュラボの声を詳しく見る">
      <div class="voice-avatar">
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/voice/edurabo.webp" alt="株式会社エデュラボ" width="280" height="280" loading="lazy">
      </div>
      <div class="voice-body">
        <p class="voice-quote">
          リスティング×SEOで成果。<br>
          「順位」だけでなく「実利」に直結する集客へ
        </p>
        <div class="voice-meta">
          <p class="voice-co">学習塾の運営</p>
          <p class="voice-name">株式会社 エデュラボ 様</p>
          <p class="voice-more">詳しく見る →</p>
        </div>
      </div>
      </a>
    </article>
    <article class="voice-card fu" style="transition-delay:.2s">
      <a href="<?php echo esc_url( home_url('/voice/') ); ?>" class="voice-link" aria-label="Nadiの声を詳しく見る">
      <div class="voice-avatar">
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/voice/nadi.webp" alt="Nadi ピラティス・ヨガスタジオ" width="280" height="280" loading="lazy">
      </div>
      <div class="voice-body">
        <p class="voice-quote">
          正解がない業態だからこそ、<br>
          同じ目線で、1つの「チーム」で。
        </p>
        <div class="voice-meta">
          <p class="voice-co">ピラティス・ヨガスタジオ</p>
          <p class="voice-name">Nadi 様</p>
          <p class="voice-more">詳しく見る →</p>
        </div>
      </div>
      </a>
    </article>
  </div>
</section>

<!-- DISPLAY BANNER -->
<div class="seo-banner" style="background:#28282D;border-top:none;">
  <div class="seo-banner-inner">
    <div class="seo-banner-left">
      <div class="seo-banner-icon" style="width:48px;height:48px;">
        <svg viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,.7)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:48px;height:48px;">
          <rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/>
        </svg>
      </div>
      <div>
        <span class="seo-banner-label" style="color:#ffffff;font-size:10px;letter-spacing:.22em;">RELATED SERVICE</span>
        <p class="seo-banner-text" style="color:#ffffff;font-size:clamp(20px,1.6vw,24px);font-weight:900;line-height:1.35;">リターゲティングや認知拡大には、ディスプレイ広告も有効です。</p>
        <p class="seo-banner-sub" style="color:#ffffff;font-size:15px;">リスティングで集め、ディスプレイで追う。両方を組み合わせることで、広告の効果を最大化できます。</p>
      </div>
    </div>
    <a href="<?php echo esc_url( home_url('/ads/display/') ); ?>" class="seo-banner-btn" style="background:#ffffff;color:#28282D;border-color:#ffffff;font-weight:700;font-size:14px;padding:0 28px;height:48px;">ディスプレイ広告ページを見る →</a>
  </div>
</div>

<!-- FAQ -->
<section class="faq-sec" aria-labelledby="faq-h2">
  <div class="faq-head">
    <div>
      <p class="sec-eyebrow fu">FAQ</p>
      <h2 class="faq-h2 fu" id="faq-h2">よくある質問</h2>
    </div>
    <a href="<?php echo esc_url( home_url('/faq/') ); ?>" class="view-all fu" aria-label="よくある質問をすべて見る">すべて見る</a>
  </div>
  <div class="faq-list" role="list">
    <div class="faq-item fu" role="listitem">
      <div class="faq-q" role="button" tabindex="0" aria-expanded="false" aria-controls="faq-a-1">
        <span class="faq-q-mark">Q</span>
        <span class="faq-q-text">リスティング広告はいつから配信できますか？</span>
        <span class="faq-q-icon" aria-hidden="true"></span>
      </div>
      <div class="faq-a" id="faq-a-1">
        <div class="faq-a-inner">
          <span class="faq-a-mark">A</span>
          <p class="faq-a-text">アカウント設定・広告文・キーワード設定が完了次第、最短で翌営業日から配信を開始できます。既存アカウントがある場合はさらに早く対応可能です。</p>
        </div>
      </div>
    </div>
    <div class="faq-item fu" style="transition-delay:0.05s" role="listitem">
      <div class="faq-q" role="button" tabindex="0" aria-expanded="false" aria-controls="faq-a-2">
        <span class="faq-q-mark">Q</span>
        <span class="faq-q-text">手数料はどのくらいですか？</span>
        <span class="faq-q-icon" aria-hidden="true"></span>
      </div>
      <div class="faq-a" id="faq-a-2">
        <div class="faq-a-inner">
          <span class="faq-a-mark">A</span>
          <p class="faq-a-text">広告費の20%（税別）をいただいています。バナー・画像制作が必要な場合は別途お見積りとなります。月額最低手数料については無料相談でご確認ください。</p>
        </div>
      </div>
    </div>
    <div class="faq-item fu" style="transition-delay:0.10s" role="listitem">
      <div class="faq-q" role="button" tabindex="0" aria-expanded="false" aria-controls="faq-a-3">
        <span class="faq-q-mark">Q</span>
        <span class="faq-q-text">広告費はどのくらい必要ですか？</span>
        <span class="faq-q-icon" aria-hidden="true"></span>
      </div>
      <div class="faq-a" id="faq-a-3">
        <div class="faq-a-inner">
          <span class="faq-a-mark">A</span>
          <p class="faq-a-text">業種・エリア・競合状況によって異なりますが、月額3万円〜でも運用は可能です。ただし、十分なデータを取得して最適化するには月額10万円以上を推奨しています。無料相談で目標に合わせた予算感をお伝えします。</p>
        </div>
      </div>
    </div>
    <div class="faq-item fu" style="transition-delay:0.15s" role="listitem">
      <div class="faq-q" role="button" tabindex="0" aria-expanded="false" aria-controls="faq-a-4">
        <span class="faq-q-mark">Q</span>
        <span class="faq-q-text">今まで広告を出したことがないのですが大丈夫ですか？</span>
        <span class="faq-q-icon" aria-hidden="true"></span>
      </div>
      <div class="faq-a" id="faq-a-4">
        <div class="faq-a-inner">
          <span class="faq-a-mark">A</span>
          <p class="faq-a-text">はい、問題ありません。アカウント開設から広告文作成・キーワード選定・入札設定まで、全て弊社が対応します。</p>
        </div>
      </div>
    </div>
    <div class="faq-item fu" style="transition-delay:0.20s" role="listitem">
      <div class="faq-q" role="button" tabindex="0" aria-expanded="false" aria-controls="faq-a-5">
        <span class="faq-q-mark">Q</span>
        <span class="faq-q-text">効果が出なかった場合はどうなりますか？</span>
        <span class="faq-q-icon" aria-hidden="true"></span>
      </div>
      <div class="faq-a" id="faq-a-5">
        <div class="faq-a-inner">
          <span class="faq-a-mark">A</span>
          <p class="faq-a-text">リスティング広告は即効性がある一方、最適化には一定のデータ蓄積期間（目安1〜3ヶ月）が必要です。効果測定・改善を繰り返しながら成果を最大化します。まずは無料相談で現状と目標をお聞かせください。</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CHALLENGE（課題別コンパクト版） -->
<section class="challenge-sec" aria-labelledby="challenge-h2-listing">
  <div class="challenge-split">
    <div class="challenge-split-left">
      <p class="sec-eyebrow fu">YOUR CHALLENGE</p>
      <h2 class="sec-h2 fu" id="challenge-h2-listing" style="transition-delay:.1s">
        あなたの課題は<br>どれですか？
      </h2>
      <p class="sec-body fu" style="transition-delay:.2s">
        WEBで成果が出ない理由は、必ずあります。<br>
        課題を特定し、最適な施策を設計します。
      </p>
    </div>
    <div class="challenge-split-right">
      <p class="challenge-split-num">01</p>
      <p class="challenge-split-voice">なんかうまく<br>いかない...</p>
      <p class="challenge-split-sub">何が問題かわからない。施策を試しても手応えがない。まず現状を整理したい。</p>
      <p class="challenge-tags-label">推奨施策</p>
      <div class="challenge-split-tags">
        <a href="<?php echo esc_url( home_url('/strategy/') ); ?>" class="challenge-tag">WEB戦略</a>
        <a href="https://htmlacheive.com/saikatsu_r/" class="challenge-tag" target="_blank" rel="noopener noreferrer">採用戦略<svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="vertical-align:middle;margin-left:4px;opacity:.7"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg></a>
      </div>
    </div>
  </div>
  <div class="challenge-grid">
    <article class="challenge-card fu" style="transition-delay:.1s">
      <div class="challenge-card-num"><span class="challenge-card-num-n">02</span></div>
      <h3 class="challenge-card-title">サイトへの<br>訪問者を増やしたい</h3>
      <p class="challenge-card-desc">検索で見つけてもらえない。広告を出しても費用対効果が悪い。もっと多くの見込み客に届けたい。</p>
      <p class="challenge-tags-label">推奨施策</p>
      <div class="challenge-tags-wrap">
        <a href="<?php echo esc_url( home_url('/seo/') ); ?>" class="challenge-tag">SEO対策</a>
        <a href="<?php echo esc_url( home_url('/meo/') ); ?>" class="challenge-tag">MEO対策</a>
        <a href="<?php echo esc_url( home_url('/listing/') ); ?>" class="challenge-tag">リスティング広告</a>
        <a href="<?php echo esc_url( home_url('/ads/display/') ); ?>" class="challenge-tag">ディスプレイ広告</a>
        <a href="<?php echo esc_url( home_url('/sns/') ); ?>" class="challenge-tag">SNSマーケティング</a>
        <a href="<?php echo esc_url( home_url('/ai-seo/') ); ?>" class="challenge-tag">AI検索対策（LLM対策）</a>
        <a href="<?php echo esc_url( home_url('/sns/note/') ); ?>" class="challenge-tag">note対策</a>
      </div>
    </article>
    <article class="challenge-card fu" style="transition-delay:.2s">
      <div class="challenge-card-num"><span class="challenge-card-num-n">03</span></div>
      <h3 class="challenge-card-title">来てくれた人が<br>問い合わせない</h3>
      <p class="challenge-card-desc">アクセスはあるのに成約しない。サイトを見ても離脱してしまう。訪問者を顧客に変えたい。</p>
      <p class="challenge-tags-label">推奨施策</p>
      <div class="challenge-tags-wrap">
        <a href="<?php echo esc_url( home_url('/website/') ); ?>" class="challenge-tag">ホームページ制作</a>
        <a href="<?php echo esc_url( home_url('/website/') ); ?>#grow" class="challenge-tag">分析改善</a>
      </div>
    </article>
    <article class="challenge-card fu" style="transition-delay:.3s">
      <div class="challenge-card-num"><span class="challenge-card-num-n">04</span></div>
      <h3 class="challenge-card-title">一度来た人に<br>また来てほしい</h3>
      <p class="challenge-card-desc">リピーターが増えない。既存顧客との関係を維持したい。ファンを育てる仕組みをつくりたい。</p>
      <p class="challenge-tags-label">推奨施策</p>
      <div class="challenge-tags-wrap">
        <a href="<?php echo esc_url( home_url('/sns/line/') ); ?>" class="challenge-tag">LINE</a>
        <a href="<?php echo esc_url( home_url('/sns/instagram/') ); ?>" class="challenge-tag">Instagram</a>
        <a href="<?php echo esc_url( home_url('/sns/x/') ); ?>" class="challenge-tag">X（旧Twitter）</a>
        <a href="<?php echo esc_url( home_url('/sns/youtube/') ); ?>" class="challenge-tag">YouTube</a>
        <a href="<?php echo esc_url( home_url('/sns/tiktok/') ); ?>" class="challenge-tag">TikTok</a>
      </div>
    </article>
    <article class="challenge-card fu challenge-card--last" style="transition-delay:.4s">
      <div class="challenge-card-num">
        <span class="challenge-card-num-n">05</span>
      </div>
      <h3 class="challenge-card-title">
        AIで業務を<br>効率化・最適化したい
      </h3>
      <p class="challenge-card-desc">
        手作業が多く時間がかかる。AIを使いたいが何から始めればいいかわからない。業務の無駄を省いて生産性を上げたい。
      </p>
      <p class="challenge-tags-label">推奨施策</p>
      <div class="challenge-tags-wrap">
        <a href="<?php echo esc_url( home_url('/ai-automation/') ); ?>" class="challenge-tag">業務の自動化・最適化</a>
      </div>
    </article>
  </div>
</section>

<!-- AREA -->
<section id="area" class="area-sec" aria-labelledby="area-h2">
  <div class="area-inner">
    <div class="area-left">
      <p class="area-eyebrow fu">SERVICE AREA</p>
      <h2 class="area-h2 fu" id="area-h2" style="transition-delay:.1s">
        対応エリア
      </h2>
      <p class="area-desc fu" style="transition-delay:.2s">
        神戸市を中心に、兵庫県全域および近隔府県の中小企業・店舗の集客支援を行っています。オンラインにて全国対応も可能です。
      </p>
    </div>
    <div class="area-right">
      <div class="area-group fu">
        <p class="area-group-label easy">柔軟にお伺いできます</p>
        <div class="area-tags" role="list" aria-label="簡単に訪問可能なエリア">
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
        <div class="area-tags" role="list" aria-label="訪問に調整が必要なエリア">
          <span class="area-tag" role="listitem"><span class="area-tag-dot"></span>上記以外の兵庫県内</span>
          <span class="area-tag" role="listitem"><span class="area-tag-dot"></span>その他関西圈</span>
        </div>
      </div>
      <div class="area-group fu" style="transition-delay:.2s">
        <p class="area-group-label online">オンラインで対応</p>
        <div class="area-tags" role="list" aria-label="オンライン対応エリア">
          <span class="area-tag" role="listitem"><span class="area-tag-dot"></span>全国どこでも</span>
        </div>
      </div>
      <p class="area-note fu" style="margin-top:24px">※まずはお気軽にご相談ください。対面・オンラインのどちらでも対応可能です。</p>
    </div>
  </div>
</section>

<!-- BLOG -->
<section class="blog-sec" aria-labelledby="blog-h2">
  <div class="blog-inner">
    <div class="blog-head">
      <h2 class="blog-h2 fu" id="blog-h2">リスティング広告関連コラム</h2>
      <a href="<?php echo esc_url( home_url('/column/') ); ?>" class="view-all fu" style="transition-delay:.1s">すべて見る</a>
    </div>
    <div class="blog-grid">
      <a href="<?php echo esc_url( home_url('/column/listing-basics/') ); ?>" class="blog-card fu">
        <span class="blog-cat">LISTING BASICS</span>
        <h3 class="blog-title">リスティング広告で成果を出すために最初に設定すべき3つのこと</h3>
        <p class="blog-date">2026.03.10</p>
      </a>
      <a href="<?php echo esc_url( home_url('/column/listing-cpa/') ); ?>" class="blog-card fu" style="transition-delay:.1s">
        <span class="blog-cat">CPA IMPROVEMENT</span>
        <h3 class="blog-title">CPAを下げるためのキーワード整理術——除外キーワードが9割</h3>
        <p class="blog-date">2026.02.20</p>
      </a>
      <a href="<?php echo esc_url( home_url('/column/listing-vs-seo/') ); ?>" class="blog-card fu" style="transition-delay:.2s">
        <span class="blog-cat">STRATEGY</span>
        <h3 class="blog-title">リスティング広告とSEOの使い分け——即効性と長期性の両立戦略</h3>
        <p class="blog-date">2026.02.05</p>
      </a>
    </div>
  </div>
</section>

</main>

<!-- SP BREADCRUMB（フッター直前） -->
<nav class="breadcrumb-sp" aria-label="パンくずリスト（スマートフォン）">
  <ol>
    <li><a href="<?php echo esc_url( home_url('/') ); ?>">ホーム</a></li>
    <li><span aria-current="page">リスティング広告</span></li>
  </ol>
</nav>

<?php get_footer(); ?>
