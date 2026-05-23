<main>

<!-- KV -->
<section class="kv" aria-labelledby="kv-h1">
  <div class="kv-wrap">
    <p class="kv-eyebrow fu">WEB MARKETING AGENCY</p>
    <h1 class="kv-h1 fu" id="kv-h1" style="transition-delay:.1s">
      向き合う姿勢、<br>どこまでも真摯に。
    </h1>
    <p class="kv-body fu" style="transition-delay:.2s">
      「なぜ集客できないのか」を徹底的に分析し、<br>
      最適な施策の組み合わせで成果を最大化します。<br>
      神戸を拠点に、累計200社以上の集客を支援してきました。
    </p>
    <div class="kv-stats fu" style="transition-delay:.3s">
      <div class="kv-stat">
        <div class="kv-stat-n" data-count="200">0<sup>社以上</sup></div>
        <div class="kv-stat-l">累計支援実績</div>
      </div>
      <div class="kv-stat">
        <div class="kv-stat-n" data-count="14" data-career>0<sup>年</sup></div>
        <div class="kv-stat-l">集客支援歴</div>
      </div>
      <div class="kv-stat">
        <div class="kv-stat-n" data-count="92">0<sup>%</sup></div>
        <div class="kv-stat-l">顧客継続率</div>
      </div>
    </div>
  </div>
</section>

<!-- NOTICE BAR -->
<div class="notice-bar" role="complementary" aria-label="最新のお知らせ">
  <span class="notice-bar-label">お知らせ</span>
<?php
  $notice_query = new WP_Query([
    'post_type'      => 'news',
    'posts_per_page' => 1,
    'post_status'    => 'publish',
    'orderby'        => 'date',
    'order'          => 'DESC',
  ]);
  if ( $notice_query->have_posts() ) :
    $notice_query->the_post();
?>
  <a href="<?php the_permalink(); ?>" class="notice-bar-item">
    <span class="notice-bar-date"><?php echo get_the_date('Y.m.d'); ?></span>
    <span class="notice-bar-title"><?php the_title(); ?></span>
  </a>
<?php
    wp_reset_postdata();
  endif;
?>
  <a href="<?php echo esc_url( home_url( '/news/' ) ); ?>" class="notice-bar-all" aria-label="お知らせ一覧を見る">一覧を見る<span class="notice-bar-arrow">→</span></a>
</div>

<!-- CHALLENGE -->
<section id="challenge" class="challenge-sec" aria-labelledby="challenge-h2-top">
    <div class="challenge-split">
    <!-- 左：見出しエリア（黒背景） -->
    <div class="challenge-split-left">
      <p class="sec-eyebrow fu">YOUR CHALLENGE</p>
      <h2 class="sec-h2 fu" id="challenge-h2-top" style="transition-delay:.1s">
        あなたの課題は<br>どれですか？
      </h2>
      <p class="sec-body fu" style="transition-delay:.2s">
        WEBで成果が出ない理由は、必ずあります。<br>
        課題を特定し、最適な施策を設計します。
      </p>
    </div>
    <!-- 右：悩みの代弁エリア（白背景・斜め区切り） -->
    <div class="challenge-split-right">
      <p class="challenge-split-num">01</p>
      <p class="challenge-split-voice">なんかうまく<br>いかない...</p>
      <p class="challenge-split-sub">何が問題かわからない。施策を試しても手応えがない。まず現状を整理したい。業務効率化したいがやり方がわからない</p>
      <p class="challenge-tags-label">推奨施策</p>
                  <div class="challenge-split-tags">
        <a href="strategy/" class="challenge-tag">WEB戦略</a>
        <a href="https://selfachieve.jp/saikatsu_r/" class="challenge-tag" target="_blank" rel="noopener noreferrer">採用戦略<svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="vertical-align:middle;margin-left:4px;opacity:.7"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg></a>
      </div>
    </div>
  </div>
  <div class="challenge-grid">
    <!-- 02 集客 -->
    <article class="challenge-card fu" style="transition-delay:.1s">
      <div class="challenge-card-num">
        <span class="challenge-card-num-n">02</span>
      </div>
      <h3 class="challenge-card-title">サイトへの訪問者を増やしたい</h3>
      <p class="challenge-card-desc">
        検索で見つけてもらえない。広告を出しても費用対効果が悪い。もっと多くの見込み客に届けたい。
      </p>
      <p class="challenge-tags-label">推奨施策</p>
                  <div class="challenge-tags-wrap">
        <a href="seo/" class="challenge-tag">SEO対策</a>
        <a href="meo/" class="challenge-tag">MEO対策</a>
        <a href="listing/" class="challenge-tag">リスティング広告</a>
        <a href="display/" class="challenge-tag">ディスプレイ広告</a>
        <a href="sns/" class="challenge-tag">SNSマーケティング</a>
        <a href="ai-seo/" class="challenge-tag">AI検索対策（LLM対策）</a>
        <a href="sns/note/" class="challenge-tag">note対策</a>
      </div>
    </article>
    <!-- 03 成約 -->
    <article class="challenge-card fu" style="transition-delay:.2s">
      <div class="challenge-card-num">
        <span class="challenge-card-num-n">03</span>
      </div>
      <h3 class="challenge-card-title">問い合わせ・売上を増やしたい</h3>
      <p class="challenge-card-desc">
        アクセスはあるのに成約しない。サイトを見ても離脱してしまう。訪問者を顧客に変えたい。
      </p>
      <p class="challenge-tags-label">推奨施策</p>
                  <div class="challenge-tags-wrap">
        <a href="website/" class="challenge-tag">ホームページ制作</a>
        <a href="website/#grow" class="challenge-tag">分析改善</a>
      </div>
    </article>
    <!-- 04 追客 -->
    <article class="challenge-card fu" style="transition-delay:.3s">
      <div class="challenge-card-num">
        <span class="challenge-card-num-n">04</span>
      </div>
      <h3 class="challenge-card-title">一度来た人にまた来てほしい</h3>
      <p class="challenge-card-desc">
        リピーターが増えない。既存顧客との関係を維持したい。ファンを育てる仕組みをつくりたい。
      </p>
      <p class="challenge-tags-label">推奨施策</p>
                  <div class="challenge-tags-wrap">
        <a href="sns/line/" class="challenge-tag">LINE</a>
        <a href="sns/instagram/" class="challenge-tag">Instagram</a>
        <a href="sns/x/" class="challenge-tag">X（旧Twitter）</a>
        <a href="sns/youtube/" class="challenge-tag">YouTube</a>
        <a href="sns/tiktok/" class="challenge-tag">TikTok</a>
      </div>
    </article>
    <!-- 05 AI活用 -->
    <article class="challenge-card fu challenge-card--last" style="transition-delay:.4s">
      <div class="challenge-card-num">
        <span class="challenge-card-num-n">05</span>
      </div>
      <h3 class="challenge-card-title">AIで業務を効率化・最適化したい</h3>
      <p class="challenge-card-desc">
        手作業が多く時間がかかる。AIを使いたいが何から始めればいいかわからない。業務の無駄を省いて生産性を上げたい。
      </p>
      <p class="challenge-tags-label">推奨施策</p>
                  <div class="challenge-tags-wrap">
        <a href="ai-automation/" class="challenge-tag">業務の自動化・最適化</a>
      </div>
    </article>
  </div>
</section>

<!-- VOICE -->
<section id="voice" aria-labelledby="voice-title">
  <div class="voice-head">
    <div>
      <p class="sec-eyebrow fu">CLIENT VOICES</p>
      <h2 class="sec-title-lg fu" id="voice-title">伴走してきた企業<br>の、リアルな声。</h2>
    </div>
    <a href="<?php echo esc_url( home_url( '/voice/' ) ); ?>" class="view-all fu" aria-label="お客さまの声をすべて見る">すべて見る</a>
  </div>
  <div class="voice-grid">
    <article class="voice-card fu">
      <a href="voice/iwazawa/" class="voice-link" aria-label="岩澤法理事務所の声を詳しく見る">
      <div class="voice-avatar">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/voice/iwazawa.webp" alt="岩澤法理事務所」" width="280" height="280" loading="lazy">
      </div>
      <div class="voice-body">
        <p class="voice-quote">
          「特殊な業界だからこそ、心強い」
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
      <a href="<?php echo esc_url( home_url( '/voice/' ) ); ?>" class="voice-link" aria-label="株式会社エデュラボの声を詳しく見る">
      <div class="voice-avatar">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/voice/edurabo.webp" alt="株式会社エデュラボ" width="280" height="280" loading="lazy">
      </div>
      <div class="voice-body">
        <p class="voice-quote">
          リスティング×SEOで成果。
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
      <a href="<?php echo esc_url( home_url( '/voice-post/hyogo-university-graduate/' ) ); ?>" class="voice-link" aria-label="兵庫県立大学大学院 情報科学研究科の声を詳しく見る">
      <div class="voice-avatar">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/voice/hyogo-univ.webp" alt="兵庫県立大学大学院 情報科学研究科" width="280" height="280" loading="lazy">
      </div>
      <div class="voice-body">
        <p class="voice-quote">
          低予算でも効果を実感。SNS広告を中心に過去最高の出願者数を獲得！
        </p>
        <div class="voice-meta">
          <p class="voice-co">教育機関</p>
          <p class="voice-name">兵庫県立大学大学院 情報科学研究科 様</p>
          <p class="voice-more">詳しく見る →</p>
        </div>
      </div>
      </a>
    </article>
  </div>
</section>

<!-- CTA -->
<section id="contact" class="cta" aria-labelledby="cta-h2">
  <div class="cta-wrap">
    <p class="cta-eyebrow fu">FREE CONSULTATION</p>
    <h2 class="cta-h2 fu" id="cta-h2" style="transition-delay:.1s">
      <span class="cta-h2-line">まず、お話してみませんか。</span>
      <span class="cta-h2-line">初回相談は無料です。</span>
    </h2>
    <p class="cta-body fu" style="transition-delay:.2s">
      「何から始めればいいかわからない」という段階でも構いません。<br>
      現状のヒアリングから、最適な施策をご提案します。
    </p>
    <div class="cta-actions fu" style="transition-delay:.3s">
      <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-cta" aria-label="無料相談を申し込む">無料相談を申し込む</a>
      <div class="cta-tel-wrap">
        <p class="cta-tel-label">お電話でのご相談</p>
        <a href="tel:0788068338" class="cta-tel" aria-label="電話番号 078-806-8338">078-806-8338</a>
      </div>
    </div>
  </div>
</section>

<!-- WORKS -->
<section id="works" aria-labelledby="works-title">
  <div class="works-head">
    <div>
      <p class="sec-eyebrow fu">OUR WORKS</p>
      <h2 class="sec-title-lg fu" id="works-title">数字で証明する、<br>制作実績。</h2>
    </div>
    <a href="<?php echo esc_url( home_url( '/works/' ) ); ?>" class="view-all fu" aria-label="制作実績をすべて見る">すべて見る</a>
  </div>
  <div class="works-grid">
    <article class="work-card fu">
      <a href="works/sanplaza/" class="work-link" aria-label="さんプラザコンタクトレンズの制作実績を詳しく見る">
      <div class="work-thumb">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/works/sanplaza_pc.webp" alt="さんプラザコンタクトレンズ ホームページ制作実績" width="600" height="375" loading="lazy">
      </div>
      <div class="work-info">
        <p class="work-cat">SEO対策 / ホームページ制作</p>
        <h3 class="work-title">さんプラザコンタクトレンズ</h3>
        <p class="work-result">月間アクセス数 3.2倍達成</p>
        <p class="work-more">詳しく見る →</p>
      </div>
      </a>
    </article>
    <article class="work-card fu" style="transition-delay:.1s">
      <a href="works/inohara/" class="work-link" aria-label="猪原食べる総合歯科医療クリニックの制作実績を詳しく見る">
      <div class="work-thumb">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/works/inohara_pc.webp" alt="猪原食べる総合歯科医療クリニック 制作実績" width="600" height="375" loading="lazy">
      </div>
      <div class="work-info">
        <p class="work-cat">MEO対策 / リスティング広告</p>
        <h3 class="work-title">猪原[食べる]総合歯科医療クリニック</h3>
        <p class="work-result">新患数 月間2倍以上を継続</p>
        <p class="work-more">詳しく見る →</p>
      </div>
      </a>
    </article>
    <article class="work-card fu" style="transition-delay:.2s">
      <a href="works/nadi/" class="work-link" aria-label="Nadiヨガスタジオの制作実績を詳しく見る">
      <div class="work-thumb">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/works/nadi_pc.webp" alt="Nadi ヨガスタジオ 制作実績" width="600" height="375" loading="lazy">
      </div>
      <div class="work-info">
        <p class="work-cat">ホームページ制作 / SNS運用</p>
        <h3 class="work-title">Nadi（ヨガスタジオ）</h3>
        <p class="work-result">体験申込み数 前年比180%</p>
        <p class="work-more">詳しく見る →</p>
      </div>
      </a>
    </article>
  </div>
</section>

<!-- ABOUT -->
<section id="about" aria-labelledby="about-h2">
  <div class="about-inner">
    <div class="about-text">
      <p class="about-eyebrow fu">ABOUT US</p>
      <h2 class="about-h2 fu" id="about-h2" style="transition-delay:.1s">
        2011年創業。<br>
        神戸から、<br>
        成果にこだわり続ける。
      </h2>
      <p class="about-body fu" style="transition-delay:.2s">
        私たちは「成果を出すために、伴走し続ける。」という姿勢を
        創業以来変えていません。
        施策の実行だけでなく、数値の追跡・改善提案・
        伴走サポートまで一貫して担います。
      </p>
      <div class="about-stats fu" style="transition-delay:.3s">
        <div class="about-stat">
          <div class="about-stat-n" data-count="200">0<sup>社以上</sup></div>
          <div class="about-stat-l">累計支援実績</div>
        </div>
        <div class="about-stat">
          <div class="about-stat-n" data-count="14" data-career>0<sup>年</sup></div>
          <div class="about-stat-l">集客支援歴</div>
        </div>
        <div class="about-stat">
          <div class="about-stat-n" data-count="92">0<sup>%</sup></div>
          <div class="about-stat-l">顧客継続率</div>
        </div>
      </div>
    </div>
    <div class="about-visual">
      <div class="about-mission fu">
        <p class="about-mission-label">OUR MISSION</p>
        <p class="about-mission-text">
          中小企業の顧客を、<br>
          デジタルで獲得し、<br>
          再現しつづける。
        </p>
        <a href="company/" class="about-mission-link fu" style="display:inline-block;margin-top:32px;font-size:12px;letter-spacing:.08em;color:#28282D;text-decoration:none;border-bottom:1px solid #28282D;padding-bottom:2px;transition:opacity .2s" onmouseover="this.style.opacity='.5'" onmouseout="this.style.opacity='1'">会社情報を見る →</a>
        <div class="about-sns fu" style="transition-delay:.1s">
          <p class="about-sns-label">OFFICIAL SNS</p>
          <div class="about-sns-links">
            <a href="https://www.instagram.com/self.achieve/" class="about-sns-link about-sns-ig" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
              <svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="2" y="2" width="20" height="20" rx="5" stroke="currentColor" stroke-width="1.5"/><circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="1.5"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor"/></svg>
            </a>
            <a href="https://www.tiktok.com/@selfachieve" class="about-sns-link about-sns-tt" target="_blank" rel="noopener noreferrer" aria-label="TikTok">
              <svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 12a4 4 0 1 0 4 4V4a5 5 0 0 0 5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
            <a href="https://x.com/selfachieve" class="about-sns-link about-sns-x" target="_blank" rel="noopener noreferrer" aria-label="X（旧Twitter）">
              <svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4 4l16 16M4 20L20 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
            </a>
          </div>
        </div>
      </div>
    </div>
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
        神戸市を中心に、兵庫県全域および近隣府県の中小企業・店舗の集客支援を行っています。オンラインにて全国対応も可能です。
      </p>
    </div>
    <div class="area-right">
      <!-- グループ1：簡単にお伺い -->
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
      <!-- グループ2：要調整 -->
      <div class="area-group fu" style="transition-delay:.1s">
        <p class="area-group-label adjust">お伺いには調整が必要です</p>
        <div class="area-tags" role="list" aria-label="訪問に調整が必要なエリア">
          <span class="area-tag" role="listitem"><span class="area-tag-dot"></span>上記以外の兵庫県内</span>
          <span class="area-tag" role="listitem"><span class="area-tag-dot"></span>その他関西圏</span>
        </div>
      </div>
      <!-- グループ3：オンライン -->
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

<!-- SERVICE OPTIONS -->
<section id="service-options" class="service-opt-sec" aria-labelledby="service-opt-h2">
  <div class="service-opt-inner">
    <div class="service-opt-left">
      <div>
        <p class="service-opt-eyebrow fu">HOW TO WORK WITH US</p>
        <h2 class="service-opt-h2 fu" id="service-opt-h2" style="transition-delay:.1s">
          ご依頼の<br>かたちを<br>選べます。
        </h2>
        <p class="service-opt-desc fu" style="transition-delay:.2s">
          Webマーケティングの<strong>代行・外注・委託・相談</strong>、どのかたちでもお受けします。まずはお気軽にご相談ください。
        </p>
      </div>
      <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-cta-primary fu" style="transition-delay:.3s" aria-label="無料相談のお問い合わせへ">無料相談はこちら →</a>
    </div>
    <div class="service-opt-right">
      <div class="service-opt-card fu">
        <span class="service-opt-num">01</span>
        <h3 class="service-opt-name">まるごと<br>お任せしたい</h3>
        <p style="font-size:15px;color:#3D3D42;line-height:1.7">社内にWeb担当がいない、または全部まとめて外注・委託したい方へ。SEO・広告・SNS・MEO・LPOなど、Webマーケティングの代行をまるごとお任せいただけます。</p>

      </div>
      <div class="service-opt-card fu" style="transition-delay:.1s">
        <span class="service-opt-num">02</span>
        <h3 class="service-opt-name">広告だけ<br>強化したい</h3>
        <p style="font-size:15px;color:#3D3D42;line-height:1.7">広告費を使っているのに成果が出ない方へ。広告代理店として、リスティング広告・SNS広告の費用対効果を最大化する戦略設計から運用まで一貫して担います。</p>

      </div>
      <div class="service-opt-card fu" style="transition-delay:.2s">
        <span class="service-opt-num">03</span>
        <h3 class="service-opt-name">一緒に考えながら<br>進めたい</h3>
        <p style="font-size:15px;color:#3D3D42;line-height:1.7">「神戸の会社に頼みたい」「伴走してほしい」という方へ。単発施策ではなく、成果が出るまで寄り添う集客支援パートナーとして中小企業・店舗に特化したプランをご提案します。</p>

      </div>
      <div class="service-opt-card fu" style="transition-delay:.3s">
        <span class="service-opt-num">04</span>
        <h3 class="service-opt-name">まず話だけ<br>聞きたい</h3>
        <p style="font-size:15px;color:#3D3D42;line-height:1.7">「何から始めればいいか分からない」「予算が決まっていない」段階でも大丈夫です。Webマーケティングの相談・Web集客の相談だけでも、初回は完全無料でお受けします。</p>

      </div>
    </div>
  </div>
</section>

<!-- FAQ -->
<section id="faq" class="faq-sec" aria-labelledby="faq-h2">
  <div class="faq-head">
    <div>
      <p class="sec-eyebrow fu">FAQ</p>
      <h2 class="faq-h2 fu" id="faq-h2">よくある質問</h2>
    </div>
    
  </div>
  <div class="faq-list" role="list">
    <div class="faq-item fu" role="listitem">
      <div class="faq-q" role="button" tabindex="0" aria-expanded="false" aria-controls="faq-a-1">
        <span class="faq-q-mark">Q</span>
        <span class="faq-q-text">Webマーケティングの代行・外注・委託の違いは何ですか？</span>
        <span class="faq-q-icon" aria-hidden="true"></span>
      </div>
      <div class="faq-a" id="faq-a-1" role="region">
        <div class="faq-a-inner">
          <span class="faq-a-mark">A</span>
          <p class="faq-a-text">実質的には同じ意味で使われることが多いです。「代行」は業務を代わりに行うこと、「外注」は業務を外部に発注すること、「委託」は業務を信頼して任せることを指します。いずれの形式でも、セルフアチーブでは対応しています。</p>
        </div>
      </div>
    </div>
    <div class="faq-item fu" style="transition-delay:.05s" role="listitem">
      <div class="faq-q" role="button" tabindex="0" aria-expanded="false" aria-controls="faq-a-2">
        <span class="faq-q-mark">Q</span>
        <span class="faq-q-text">神戸以外の企業でも依頼できますか？</span>
        <span class="faq-q-icon" aria-hidden="true"></span>
      </div>
      <div class="faq-a" id="faq-a-2" role="region">
        <div class="faq-a-inner">
          <span class="faq-a-mark">A</span>
          <p class="faq-a-text">はい、対応可能です。姫路・加古川・明石・芦屋・西宮など兵庫県内はもちろん、大阪・京都など近隣府県やオンラインでの対応により全国対応も可能です。</p>
        </div>
      </div>
    </div>
    <div class="faq-item fu" style="transition-delay:.1s" role="listitem">
      <div class="faq-q" role="button" tabindex="0" aria-expanded="false" aria-controls="faq-a-3">
        <span class="faq-q-mark">Q</span>
        <span class="faq-q-text">初回相談は無料ですか？</span>
        <span class="faq-q-icon" aria-hidden="true"></span>
      </div>
      <div class="faq-a" id="faq-a-3" role="region">
        <div class="faq-a-inner">
          <span class="faq-a-mark">A</span>
          <p class="faq-a-text">はい、初回相談は完全無料です。「何から始めればいいかわからない」「予算が少ない」「まず話だけ聴きたい」、どの段階でもお気軽にご連絡ください。</p>
        </div>
      </div>
    </div>
    <div class="faq-item fu" style="transition-delay:.15s" role="listitem">
      <div class="faq-q" role="button" tabindex="0" aria-expanded="false" aria-controls="faq-a-4">
        <span class="faq-q-mark">Q</span>
        <span class="faq-q-text">小規模な店舗・個人事業主でも対応していますか？</span>
        <span class="faq-q-icon" aria-hidden="true"></span>
      </div>
      <div class="faq-a" id="faq-a-4" role="region">
        <div class="faq-a-inner">
          <span class="faq-a-mark">A</span>
          <p class="faq-a-text">はい、対応しています。小規模な店舗・整骨院・美容室・飲食店など、地域密着型ビジネスの集客支援に多くの実績があります。まずは現状をお聴かせください。</p>
        </div>
      </div>
    </div>
    <div class="faq-item fu" style="transition-delay:.2s" role="listitem">
      <div class="faq-q" role="button" tabindex="0" aria-expanded="false" aria-controls="faq-a-5">
        <span class="faq-q-mark">Q</span>
        <span class="faq-q-text">成果が出るまでの期間はどれくらいですか？</span>
        <span class="faq-q-icon" aria-hidden="true"></span>
      </div>
      <div class="faq-a" id="faq-a-5" role="region">
        <div class="faq-a-inner">
          <span class="faq-a-mark">A</span>
          <p class="faq-a-text">施策の種類や業種により異なりますが、SEOは数ヶ月、リスティング広告は開始後数週間で効果が見え始めることが多いです。まずは無料診断で現状を確認し、最適な施策を提案します。</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- NEWS -->
<section id="news" class="news-sec" aria-labelledby="news-h2">
  <div class="news-head">
    <div>
      <p class="sec-eyebrow fu">NEWS</p>
      <h2 class="news-h2 fu" id="news-h2">お知らせ</h2>
    </div>
    <a href="<?php echo esc_url( home_url( '/news/' ) ); ?>" class="view-all fu" aria-label="お知らせをすべて見る">すべて見る</a>
  </div>
  <div class="news-list" role="list">
    <?php
    $news_query = new WP_Query([
      'post_type'      => 'news',
      'posts_per_page' => 4,
      'post_status'    => 'publish',
      'orderby'        => 'date',
      'order'          => 'DESC',
    ]);
    $delays = ['', ' style="transition-delay:.05s"', ' style="transition-delay:.1s"', ' style="transition-delay:.15s"'];
    $i = 0;
    if ( $news_query->have_posts() ) :
      while ( $news_query->have_posts() ) : $news_query->the_post();
        $delay = $delays[$i] ?? '';
    ?>
    <a href="<?php the_permalink(); ?>" class="news-item fu" role="listitem"<?php echo $delay; ?>>
      <span class="news-date"><?php echo get_the_date('Y.m.d'); ?></span>
      <span class="news-title"><?php the_title(); ?></span>
    </a>
    <?php
        $i++;
      endwhile;
      wp_reset_postdata();
    endif;
    ?>
  </div>
</section>

<!-- COLUMN -->
<section id="column" class="news-sec column-sec" aria-labelledby="column-h2">
  <div class="news-head">
    <div>
      <p class="sec-eyebrow fu">COLUMN</p>
      <h2 class="news-h2 fu" id="column-h2">コラム</h2>
    </div>
    <a href="column/" class="view-all fu" aria-label="コラムをすべて見る">すべて見る</a>
  </div>
  <div class="news-list" role="list">
    <?php
    $col_query = new WP_Query([
      'post_type'      => 'column',
      'posts_per_page' => 4,
      'post_status'    => 'publish',
      'orderby'        => 'date',
      'order'          => 'DESC',
    ]);
    $delays = ['', ' style="transition-delay:.05s"', ' style="transition-delay:.1s"', ' style="transition-delay:.15s"'];
    $i = 0;
    if ( $col_query->have_posts() ) :
      while ( $col_query->have_posts() ) : $col_query->the_post();
        $delay = $delays[$i] ?? '';
    ?>
    <a href="<?php the_permalink(); ?>" class="news-item fu" role="listitem"<?php echo $delay; ?>>
      <span class="news-date"><?php echo get_the_date('Y.m.d'); ?></span>
      <span class="news-title"><?php the_title(); ?></span>
    </a>
    <?php
        $i++;
      endwhile;
      wp_reset_postdata();
    endif;
    ?>
  </div>
</section>

</main>
