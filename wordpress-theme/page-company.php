<?php
/**
 * Template Name: 会社情報
 */
get_header(); ?>

<main id="main" role="main">
  <!-- PAGE HEADER -->
  <div class="page-header">
    <div class="page-header-inner">
      <span class="page-eyebrow fu">COMPANY</span>
      <h1 class="page-title fu" style="transition-delay:.08s">会社情報</h1>
      <p class="page-desc fu" style="transition-delay:.16s">セルフアチーブの理念・ビジョン・チームをご紹介します。</p>
    </div>
  </div>
  <!-- BREADCRUMB（PC） -->
  <nav class="breadcrumb" aria-label="パンくずリスト">
    <ol>
      <li><a href="<?php echo esc_url( home_url('/') ); ?>">ホーム</a></li>
      <li><span aria-current="page">会社情報</span></li>
    </ol>
  </nav>
  <!-- MISSION -->
  <section class="mission fu" id="mission">
    <div class="mission-inner">
      <div class="mission-left">
        <p class="sec-eyebrow">OUR MISSION</p>
        <h2 class="sec-title">中小企業の顧客を、<br>デジタルで獲得し、<br>再現しつづける。</h2>
      </div>
      <div class="mission-body">
        <p>多くの中小企業は、顧客獲得の課題を抱えながらも「何から手をつければいいかわからない」「施策を試しても成果が見えない」という状況に陥っています。</p>
        <p>私たちは、その問いに正面から向き合います。「なぜ集客できないのか」を徹底的に分析し、最適な施策の組み合わせで成果を最大化する。そして、成果を出すために、伴走し続ける。</p>
        <p>それが、セルフアチーブの存在意義です。</p>
      </div>
    </div>
  </section>
  <!-- VISION -->
  <section class="vision fu" id="vision">
    <div class="vision-inner">
      <div class="vision-head">
        <p class="sec-eyebrow">OUR VISION</p>
        <h2 class="sec-title">私たちが目指す未来</h2>
      </div>
      <p class="vision-statement">日本中の地域に根ざした中小企業が<br>「デジタルで自走できる」社会をつくる。</p>
    </div>
  </section>
  <!-- VALUE -->
  <section class="value" id="value">
    <div class="value-inner">
      <div class="value-head">
        <p class="sec-eyebrow">OUR VALUE</p>
        <h2 class="sec-title">私たちの行動原則</h2>
      </div>
      <ul class="value-list">
        <li class="value-item fu" style="transition-delay:0s">
          <span class="value-num">VALUE 01</span>
          <p class="value-phrase">成果を出すために、伴走し続ける。</p>
          <p class="value-desc">施策の実行で終わりにしない。数値を追い、改善し、クライアントが自走できるまで共に走り続ける。</p>
        </li>
        <li class="value-item fu" style="transition-delay:0.08s">
          <span class="value-num">VALUE 02</span>
          <p class="value-phrase">「なんとなく」を、根拠に変える。</p>
          <p class="value-desc">感覚や慣習ではなく、データと仮説で判断する。クライアントにも「なぜその施策か」を必ず説明できる状態で動く。</p>
        </li>
        <li class="value-item fu" style="transition-delay:0.16s">
          <span class="value-num">VALUE 03</span>
          <p class="value-phrase">小さな変化を、見逃さない。</p>
          <p class="value-desc">数字の微細な変動、市場の空気の変化、クライアントの言葉の裏にあるもの。見えにくいものほど、丁寧に拾う。</p>
        </li>
        <li class="value-item fu" style="transition-delay:0.24s">
          <span class="value-num">VALUE 04</span>
          <p class="value-phrase">依頼より、必要な仕事をする。</p>
          <p class="value-desc">言われたことだけをこなすのではなく、クライアントのビジネス全体を見て、本当に必要な提案を先んじて行う。</p>
        </li>
        <li class="value-item fu" style="grid-column:1/-1;transition-delay:0.32s">
          <span class="value-num">VALUE 05</span>
          <p class="value-phrase">神戸から、誇れる仕事を積み上げる。</p>
          <p class="value-desc">地域に根ざした会社として、一つひとつの案件に誠実に向き合う。その積み重ねが、地域全体の信頼になると信じる。</p>
        </li>
      </ul>
    </div>
  </section>
  <!-- REPRESENTATIVE -->
  <section class="representative fu" id="representative">
    <div class="representative-head">
      <p class="sec-eyebrow">REPRESENTATIVE</p>
      <h2 class="sec-title">代表メッセージ</h2>
    </div>
    <div class="representative-inner">
      <div class="rep-photo">
        <div class="rep-photo-wrapper">
          <div class="rep-photo-frame">
            <img height="1365" width="1023" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/niihara.webp" alt="新原 秀崇 代表取締役" loading="lazy">
          </div>
        </div>
        <div class="rep-name-block">
          <p class="rep-name-en">Hidetaka Niihara</p>
          <p class="rep-name-ja">新原 秀崇</p>
          <p class="rep-title">代表取締役</p>
        </div>
      </div>
      <div class="rep-body">
        <p class="rep-catch">実直に。そして、誠実に。</p>
        <div class="rep-career">
          <p class="rep-career-label">CAREER</p>
          <ul class="rep-career-list">
            <li class="rep-career-item">
              <span class="rep-career-year is-period">大学卒業後</span>
              <span class="rep-career-text">外資系企業にてマーケティング・営業を経験</span>
            </li>
            <li class="rep-career-item">
              <span class="rep-career-year">2011年</span>
              <span class="rep-career-text">株式会社セルフアチーブを創業。神戸を拠点に中小企業のWEB集客支援を開始</span>
            </li>
            <li class="rep-career-item">
              <span class="rep-career-year is-current">現在</span>
              <span class="rep-career-text">累計200社以上の顧客獲得を支援。<br>コンテンツマーケティング・SEO・WEB広告を専門領域とし、代表自ら戦略設計に携わる。</span>
            </li>
          </ul>
        </div>
        <div class="rep-message-block">
          <p class="rep-message-label">メッセージ</p>
          <div class="rep-message">
            <p>大学卒業後、外資系企業やラジオ局で営業・マーケティングを経験するなかで、ある現実に気づきました。検索結果の上位は大手企業と大手メディアが独占し、中小企業がどれだけ良いサービスを持っていても、WEB上では「存在しない会社」として扱われてしまう。広告費をかけても代理店に丸投げで成果が見えない。ホームページを作っても問い合わせが来ない。その理不尽さを変えたくて、2011年にセルフアチーブを創業しました。</p>
            <p>WEBは、使い方次第で中小企業の武器になります。私たちは「施策を売る」のではなく、成果を出すために伴走し続けることを約束しています。神戸から、地域の中小企業が自走できる社会をつくる。それが、私の仕事です。</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- OVERVIEW -->
  <section class="overview fu" id="overview">
    <div class="overview-inner">
      <div class="overview-head">
        <p class="sec-eyebrow">OVERVIEW</p>
        <h2 class="sec-title">会社概要</h2>
      </div>
      <table class="overview-table">
        <tbody>
          <tr>
            <th scope="row">会社名</th>
            <td>株式会社セルフアチーブ</td>
          </tr>
          <tr>
            <th scope="row">所在地</th>
            <td>〒658-0032 兵庫県神戸市東灘区向洋町中6-9<br>神戸ファッションマート 8S-25</td>
          </tr>
          <tr>
            <th scope="row">電話番号</th>
            <td>（平日 9:00〜19:00）</td>
          </tr>
          <tr>
            <th scope="row">代表者</th>
            <td>新原 秀崇</td>
          </tr>
          <tr>
            <th scope="row">設立</th>
            <td>2011年5月2日</td>
          </tr>
          <tr>
            <th scope="row">資本金</th>
            <td>500万円</td>
          </tr>
          <tr>
            <th scope="row">事業内容</th>
            <td>
              <div class="td-services">
                <span>WEBサイト制作</span>
                <span>SEO対策</span>
                <span>リスティング広告代行</span>
                <span>SNS運用代行 / SNS広告運用代行</span>
                <span>WEBマーケティング</span>
                <span>MEO対策</span>
                <span>YouTubeマーケティング</span>
                <span>採用支援（サイカツ.R）</span>
              </div>
            </td>
          </tr>
          <tr>
            <th scope="row">顧問弁護士</th>
            <td>岩澤法律事務所 / 岩澤千洋 弁護士</td>
          </tr>
          <tr>
            <th scope="row">顧問税理士事務所</th>
            <td>税理士法人サポートリンク</td>
          </tr>
          <tr>
            <th scope="row">加盟団体</th>
            <td>神戸商工会議所</td>
          </tr>
          <tr>
            <th scope="row">主要取引先銀行</th>
            <td>三井住友銀行 / 日新信用金庫 / 播州信用金庫</td>
          </tr>
          <tr>
            <th scope="row">主要取引先</th>
            <td>神戸市 / 兵庫県警察 / 兵庫県立大学 大学院 / 法律事務所関連 / 医療法人関連 / その他</td>
          </tr>
          <tr>
            <th scope="row">公式SNS</th>
            <td>
              <div class="overview-sns">
                <a href="https://www.instagram.com/self.achieve/" class="overview-sns-link overview-sns-ig" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                  <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="2" y="2" width="20" height="20" rx="5" stroke="currentColor" stroke-width="1.5"/><circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="1.5"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor"/></svg>
                  <span>Instagram</span>
                </a>
                <a href="https://www.tiktok.com/@selfachieve" class="overview-sns-link overview-sns-tt" target="_blank" rel="noopener noreferrer" aria-label="TikTok">
                  <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 12a4 4 0 1 0 4 4V4a5 5 0 0 0 5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  <span>TikTok</span>
                </a>
                <a href="https://x.com/selfachieve" class="overview-sns-link overview-sns-x" target="_blank" rel="noopener noreferrer" aria-label="X（旧Twitter）">
                  <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4 4l16 16M4 20L20 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/></svg>
                  <span>X（旧Twitter）</span>
                </a>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>
  <!-- ACCESS -->
  <section class="access fu" id="access">
    <div class="access-inner">
      <div class="access-head">
        <p class="sec-eyebrow">ACCESS</p>
        <h2 class="sec-title">アクセス</h2>
      </div>
      <div class="access-body">
        <div class="access-map">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3281.6!2d135.2700!3d34.6900!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6000e9a3b1234567%3A0xabcdef1234567890!2z5qCq5byP5Lya56S-44K744Or44OV44Ki44OB44O844OW!5e0!3m2!1sja!2sjp!4v1710000000000!5m2!1sja!2sjp"
            width="600"
            height="450"
            style="border:0;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            title="株式会社セルフアチーブ アクセスマップ">
          </iframe>
        </div>
        <div class="access-info">
          <div class="access-address">
            <strong>所在地</strong>
            〒658-0032<br>
            兵庫県神戸市東灘区向洋町中6-9<br>
            神戸ファッションマート 8S-25
          </div>
          <div class="access-route">
            <div class="access-route-item">
              <p class="access-route-label">JRの場合</p>
              <p class="access-route-text">JR住吉駅下車 → 乗り換え → 六甲ライナー / アイランドセンター駅下車 → 改札口出て右手に歩くと神戸ファッションマートに直結しております。</p>
            </div>
            <div class="access-route-item">
              <p class="access-route-label">阪神電車の場合</p>
              <p class="access-route-text">阪神魚崎駅下車 → 乗り換え → 六甲ライナー / アイランドセンター駅下車 → 改札口出て右手に歩くと神戸ファッションマートに直結しております。</p>
            </div>
            <div class="access-route-item">
              <p class="access-route-label">お車の場合</p>
              <p class="access-route-text">神戸ファッションマート内にTimes駐車場がございます。</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- CTA SECTION -->
  <section class="cta-section fu">
    <p class="cta-section-eyebrow">FREE CONSULTATION</p>
    <h2 class="cta-section-title"><span class="cta-h2-line">まず、お話してみませんか。</span><span class="cta-h2-line">初回相談は無料です。</span></h2>
    <p class="cta-section-sub">「何から始めればいいかわからない」という段階でも構いません。<br>現状のヒアリングから、最適な施策をご提案します。</p>
    <div class="cta-section-btns">
      <a href="<?php echo esc_url( home_url('/contact/') ); ?>" class="cta-btn-primary" aria-label="無料相談を申し込む">無料相談を申し込む</a>
    </div>
    <p class="cta-btn-tel-note">営業時間：平日 9:00〜19:00</p>
  </section>
</main>
<!-- BREADCRUMB SP（スマホ時：フッター直前） -->
<nav class="breadcrumb-sp-footer" aria-hidden="true">
  <ol>
    <li><a href="<?php echo esc_url( home_url('/') ); ?>">ホーム</a></li>
    <li><span aria-current="page">会社情報</span></li>
  </ol>
</nav>

<?php get_footer(); ?>
