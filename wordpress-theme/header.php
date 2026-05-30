<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="hd" role="banner">
  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hd-logo" aria-label="セルフアチーブ トップページへ">
    <picture>
      <source srcset="<?php echo get_template_directory_uri(); ?>/assets/logo_color.webp" type="image/webp">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/logo_color.png" alt="selfachieve Acquisition Agency" width="160" height="34" loading="eager">
    </picture>
  </a>
  <nav class="hd-nav" aria-label="グローバルナビゲーション">
    <span class="hd-nav-item">
      <a href="javascript:void(0)">課題から探す</a>
      <div class="hd-mega-wrap">
      <div class="hd-mega" role="menu">
        <div class="hd-mega-col">
          <span class="hd-mega-col-label"><span class="col-label-main">戦略・全体</span><span class="col-label-sub">（なんか、うまくいかない…）</span></span>
          <a href="<?php echo esc_url( home_url( '/strategy/' ) ); ?>" role="menuitem">WEB戦略</a>
          <a href="https://selfachieve.jp/saikatsu_r/" role="menuitem" target="_blank" rel="noopener noreferrer">採用戦略<svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="vertical-align:middle;margin-left:4px;opacity:.7"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg></a>
        </div>
        <div class="hd-mega-col">
          <span class="hd-mega-col-label"><span class="col-label-main">集客施策</span><span class="col-label-sub">（サイトへの訪問者を増やしたい）</span></span>
          <a href="<?php echo esc_url( home_url( '/seo/' ) ); ?>" role="menuitem">SEO対策</a>
          <a href="<?php echo esc_url( home_url( '/meo/' ) ); ?>" role="menuitem">MEO対策</a>
          <button class="hd-mega-accordion-btn" type="button">WEB広告<svg class="hd-mega-accordion-icon" width="10" height="10" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></button>
          <div class="hd-mega-accordion-sub">
            <a href="<?php echo esc_url( home_url( '/listing/' ) ); ?>" role="menuitem" class="hd-mega-sub-link">リスティング広告</a>
            <a href="<?php echo esc_url( home_url( '/display/' ) ); ?>" role="menuitem" class="hd-mega-sub-link">ディスプレイ広告</a>
          </div>
          <a href="<?php echo esc_url( home_url( '/sns/' ) ); ?>" role="menuitem">SNSマーケティング</a>
          <a href="<?php echo esc_url( home_url( '/ai-seo/' ) ); ?>" role="menuitem">AI検索対策（LLM対策）</a>
          <a href="<?php echo esc_url( home_url( '/sns/note/' ) ); ?>" role="menuitem">note対策</a>
        </div>
        <div class="hd-mega-col">
          <span class="hd-mega-col-label"><span class="col-label-main">成約</span><span class="col-label-sub">（問い合わせ・売上を増やしたい）</span></span>
          <a href="<?php echo esc_url( home_url( '/webdesign/' ) ); ?>" role="menuitem">ホームページ制作</a>
          <a href="<?php echo esc_url( home_url( '/webdesign/#grow' ) ); ?>" role="menuitem">分析改善</a>
        </div>
        <div class="hd-mega-col">
          <span class="hd-mega-col-label"><span class="col-label-main">再販・追客</span><span class="col-label-sub">（一度来た人にまた来てほしい）</span></span>
          <a href="<?php echo esc_url( home_url( '/sns/line/' ) ); ?>" role="menuitem">LINE</a>
          <a href="<?php echo esc_url( home_url( '/sns/instagram/' ) ); ?>" role="menuitem">Instagram</a>
          <a href="<?php echo esc_url( home_url( '/sns/x/' ) ); ?>" role="menuitem">X（旧Twitter）</a>
          <a href="<?php echo esc_url( home_url( '/sns/youtube/' ) ); ?>" role="menuitem">YouTube</a>
          <a href="<?php echo esc_url( home_url( '/sns/tiktok/' ) ); ?>" role="menuitem">TikTok</a>
        </div>
        <div class="hd-mega-col">
          <span class="hd-mega-col-label"><span class="col-label-main">AI活用</span><span class="col-label-sub">（AIで業務を効率化・最適化したい）</span></span>
          <a href="<?php echo esc_url( home_url( '/ai-automation/' ) ); ?>" role="menuitem">業務の自動化・最適化</a>
        </div>
      </div>
      </div>
    </span>
    <span class="hd-nav-item">
      <a href="javascript:void(0)">サービスから探す</a>
      <div class="hd-mega-wrap">
      <div class="hd-mega" role="menu">
        <div class="hd-mega-col">
          <span class="hd-mega-col-label"><span class="col-label-main">戦略設計</span></span>
          <a href="<?php echo esc_url( home_url( '/strategy/' ) ); ?>" role="menuitem">WEB戦略</a>
          <a href="https://selfachieve.jp/saikatsu_r/" role="menuitem" target="_blank" rel="noopener noreferrer">採用戦略<svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="vertical-align:middle;margin-left:4px;opacity:.7"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg></a>
        </div>
        <div class="hd-mega-col">
          <span class="hd-mega-col-label"><span class="col-label-main">集客施策</span></span>
          <a href="<?php echo esc_url( home_url( '/seo/' ) ); ?>" role="menuitem">SEO対策</a>
          <a href="<?php echo esc_url( home_url( '/meo/' ) ); ?>" role="menuitem">MEO対策</a>
          <button class="hd-mega-accordion-btn" type="button">WEB広告<svg class="hd-mega-accordion-icon" width="10" height="10" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 4l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></button>
          <div class="hd-mega-accordion-sub">
            <a href="<?php echo esc_url( home_url( '/listing/' ) ); ?>" role="menuitem" class="hd-mega-sub-link">リスティング広告</a>
            <a href="<?php echo esc_url( home_url( '/display/' ) ); ?>" role="menuitem" class="hd-mega-sub-link">ディスプレイ広告</a>
          </div>
          <a href="<?php echo esc_url( home_url( '/sns/' ) ); ?>" role="menuitem">SNSマーケティング</a>
          <a href="<?php echo esc_url( home_url( '/ai-seo/' ) ); ?>" role="menuitem">AI検索対策（LLM対策）</a>
          <a href="<?php echo esc_url( home_url( '/sns/note/' ) ); ?>" role="menuitem">note対策</a>
        </div>
        <div class="hd-mega-col">
          <span class="hd-mega-col-label"><span class="col-label-main">成約</span></span>
          <a href="<?php echo esc_url( home_url( '/webdesign/' ) ); ?>" role="menuitem">ホームページ制作</a>
          <a href="<?php echo esc_url( home_url( '/webdesign/#grow' ) ); ?>" role="menuitem">分析改善</a>
        </div>
        <div class="hd-mega-col">
          <span class="hd-mega-col-label"><span class="col-label-main">AI活用支援（DX/AX）</span></span>
          <a href="<?php echo esc_url( home_url( '/ai-automation/' ) ); ?>" role="menuitem">業務の自動化・最適化</a>
        </div>
      </div>
      </div>
    </span>
    <a href="<?php echo esc_url( home_url( '/works/' ) ); ?>">実績</a>
    <a href="<?php echo esc_url( home_url( '/voice/' ) ); ?>">お客さまの声</a>
    <span class="hd-nav-item">
      <a href="<?php echo esc_url( home_url( '/company/' ) ); ?>">会社情報</a>
      <div class="hd-dropdown" role="menu">
        <a href="<?php echo esc_url( home_url( '/company/#mission' ) ); ?>" role="menuitem">Mission / Vision / Value</a>
        <a href="<?php echo esc_url( home_url( '/company/#representative' ) ); ?>" role="menuitem">代表メッセージ</a>
        <a href="<?php echo esc_url( home_url( '/company/#overview' ) ); ?>" role="menuitem">会社概要</a>
        <a href="<?php echo esc_url( home_url( '/company/#access' ) ); ?>" role="menuitem">アクセス</a>
      </div>
    </span>
  </nav>
  <div class="hd-btns">
    <a href="https://selfachieve.jp/saikatsu_r/" class="hd-btn-external" target="_blank" rel="noopener noreferrer" aria-label="企業の採用活動を成功に導く「サイカツ.R」（別サイトが開きます）">企業の採用活動を成功に導く「サイカツ.R」<svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg></a>
    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="hd-btn" aria-label="初回の相談無料">初回の相談無料</a>
  </div>
  <button class="hd-hamburger" aria-label="メニューを開く" aria-expanded="false" aria-controls="hd-drawer">
    <span></span><span></span><span></span>
  </button>
</header>

<!-- モバイルドロワー -->
<div class="hd-drawer" id="hd-drawer" aria-hidden="true">
  <div class="hd-drawer-header">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hd-drawer-logo" aria-label="セルフアチーブ トップページへ">
      <picture>
        <source srcset="<?php echo get_template_directory_uri(); ?>/assets/logo_color.webp" type="image/webp">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/logo_color.png" alt="selfachieve" width="120" height="26" loading="lazy">
      </picture>
    </a>
    <button class="hd-drawer-close" aria-label="メニューを閉じる">
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
    </button>
  </div>
  <nav class="hd-drawer-nav" aria-label="モバイルナビゲーション">
    <button class="hd-drawer-item hd-drawer-item--accordion" data-drawer-accordion aria-expanded="false">
      課題から探す
      <svg class="hd-drawer-chevron" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
    </button>
    <div class="hd-drawer-sub" aria-hidden="true">
      <p class="hd-drawer-group-label">集客（サイトへの訪問者を増やしたい）</p>
      <a class="hd-drawer-link-item" href="<?php echo esc_url( home_url( '/seo/' ) ); ?>">SEO対策</a>
      <a class="hd-drawer-link-item" href="<?php echo esc_url( home_url( '/meo/' ) ); ?>">MEO対策</a>
      <a class="hd-drawer-link-item" href="<?php echo esc_url( home_url( '/listing/' ) ); ?>">リスティング広告</a>
      <a class="hd-drawer-link-item" href="<?php echo esc_url( home_url( '/display/' ) ); ?>">ディスプレイ広告</a>
      <a class="hd-drawer-link-item" href="<?php echo esc_url( home_url( '/sns/' ) ); ?>">SNSマーケティング</a>
      <a class="hd-drawer-link-item" href="<?php echo esc_url( home_url( '/ai-seo/' ) ); ?>">AI検索対策（LLM対策）</a>
      <a class="hd-drawer-link-item" href="<?php echo esc_url( home_url( '/sns/note/' ) ); ?>">note対策</a>
      <p class="hd-drawer-group-label">成約（問い合わせ・売上を増やしたい）</p>
      <a class="hd-drawer-link-item" href="<?php echo esc_url( home_url( '/webdesign/' ) ); ?>">ホームページ制作</a>
      <a class="hd-drawer-link-item" href="<?php echo esc_url( home_url( '/webdesign/#grow' ) ); ?>">分析改善</a>
      <p class="hd-drawer-group-label">再販・追客（一度来た人にまた来てほしい）</p>
      <a class="hd-drawer-link-item" href="<?php echo esc_url( home_url( '/sns/line/' ) ); ?>">LINE</a>
      <a class="hd-drawer-link-item" href="<?php echo esc_url( home_url( '/sns/instagram/' ) ); ?>">Instagram</a>
      <a class="hd-drawer-link-item" href="<?php echo esc_url( home_url( '/sns/x/' ) ); ?>">X（旧Twitter）</a>
      <a class="hd-drawer-link-item" href="<?php echo esc_url( home_url( '/sns/youtube/' ) ); ?>">YouTube</a>
      <a class="hd-drawer-link-item" href="<?php echo esc_url( home_url( '/sns/tiktok/' ) ); ?>">TikTok</a>
      <p class="hd-drawer-group-label">AI活用（AIで業務を効率化・最適化したい）</p>
      <a class="hd-drawer-link-item" href="<?php echo esc_url( home_url( '/ai-automation/' ) ); ?>">業務の自動化・最適化</a>
    </div>
    <button class="hd-drawer-item hd-drawer-item--accordion" data-drawer-accordion aria-expanded="false">
      サービスから探す
      <svg class="hd-drawer-chevron" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
    </button>
    <div class="hd-drawer-sub" aria-hidden="true">
      <p class="hd-drawer-group-label">戦略設計</p>
      <a class="hd-drawer-link-item" href="<?php echo esc_url( home_url( '/strategy/' ) ); ?>">WEB戦略</a>
      <a class="hd-drawer-link-item" href="https://selfachieve.jp/saikatsu_r/" target="_blank" rel="noopener noreferrer">採用戦略<svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" style="vertical-align:middle;margin-left:4px;opacity:.6"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg></a>
      <p class="hd-drawer-group-label">集客施策</p>
      <a class="hd-drawer-link-item" href="<?php echo esc_url( home_url( '/seo/' ) ); ?>">SEO対策</a>
      <a class="hd-drawer-link-item" href="<?php echo esc_url( home_url( '/meo/' ) ); ?>">MEO対策</a>
      <a class="hd-drawer-link-item" href="<?php echo esc_url( home_url( '/listing/' ) ); ?>">リスティング広告</a>
      <a class="hd-drawer-link-item" href="<?php echo esc_url( home_url( '/display/' ) ); ?>">ディスプレイ広告</a>
      <a class="hd-drawer-link-item" href="<?php echo esc_url( home_url( '/sns/' ) ); ?>">SNSマーケティング</a>
      <a class="hd-drawer-link-item" href="<?php echo esc_url( home_url( '/ai-seo/' ) ); ?>">AI検索対策（LLM対策）</a>
      <a class="hd-drawer-link-item" href="<?php echo esc_url( home_url( '/sns/note/' ) ); ?>">note対策</a>
      <p class="hd-drawer-group-label">成約</p>
      <a class="hd-drawer-link-item" href="<?php echo esc_url( home_url( '/webdesign/' ) ); ?>">ホームページ制作</a>
      <a class="hd-drawer-link-item" href="<?php echo esc_url( home_url( '/webdesign/#grow' ) ); ?>">分析改善</a>
      <p class="hd-drawer-group-label">AI活用支援（DX/AX）</p>
      <a class="hd-drawer-link-item" href="<?php echo esc_url( home_url( '/ai-automation/' ) ); ?>">業務の自動化・最適化</a>
    </div>
    <a class="hd-drawer-item" href="<?php echo esc_url( home_url( '/works/' ) ); ?>">実績</a>
    <a class="hd-drawer-item" href="<?php echo esc_url( home_url( '/voice/' ) ); ?>">お客さまの声</a>
    <a class="hd-drawer-item" href="<?php echo esc_url( home_url( '/news/' ) ); ?>">お知らせ</a>
    <button class="hd-drawer-item hd-drawer-item--accordion" data-drawer-accordion aria-expanded="false">
      会社情報
      <svg class="hd-drawer-chevron" xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
    </button>
    <div class="hd-drawer-sub" aria-hidden="true">
      <a class="hd-drawer-link-item" href="<?php echo esc_url( home_url( '/company/' ) ); ?>">会社概要</a>
      <a class="hd-drawer-link-item" href="<?php echo esc_url( home_url( '/company/#mission' ) ); ?>">Mission / Vision / Value</a>
      <a class="hd-drawer-link-item" href="<?php echo esc_url( home_url( '/company/#representative' ) ); ?>">代表メッセージ</a>
      <a class="hd-drawer-link-item" href="<?php echo esc_url( home_url( '/company/#access' ) ); ?>">アクセス</a>
    </div>
    <!-- CTAボタン -->
    <div class="hd-drawer-cta">
      <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="hd-btn" style="display:flex;width:100%;justify-content:center;height:52px;font-size:15px;">初回の相談無料</a>
      <a href="https://selfachieve.jp/saikatsu_r/" class="hd-drawer-cta-external" target="_blank" rel="noopener noreferrer">企業の採用活動を成功に導く「サイカツ.R」<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg></a>
    </div>
  </nav>
</div>
<div class="hd-overlay" aria-hidden="true"></div>
