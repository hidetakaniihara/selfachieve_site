<?php if ( is_singular( 'column' ) ) :
  $sp_cats     = get_the_terms( get_the_ID(), 'column_cat' );
  $sp_cat_name = ( $sp_cats && ! is_wp_error( $sp_cats ) ) ? $sp_cats[0]->name : '';
?>
<nav class="breadcrumb-sp-footer" aria-label="パンくずリスト">
  <ol>
    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">ホーム</a></li>
    <li><a href="<?php echo esc_url( home_url( '/column/' ) ); ?>">コラム</a></li>
    <?php if ( $sp_cat_name ) : ?>
    <li><a href="<?php echo esc_url( get_term_link( $sp_cats[0] ) ); ?>"><?php echo esc_html( $sp_cat_name ); ?></a></li>
    <?php endif; ?>
    <li><span aria-current="page"><?php the_title(); ?></span></li>
  </ol>
</nav>
<?php endif; ?>
<footer class="footer" role="contentinfo">
  <div class="footer-top">
    <div class="footer-logo-wrap">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo" aria-label="セルフアチーブ トップページへ">
        <picture>
          <source srcset="<?php echo get_template_directory_uri(); ?>/assets/logo_color.webp" type="image/webp">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/logo_color.png" alt="selfachieve Acquisition Agency" width="140" height="30" loading="lazy">
        </picture>
      </a>
      <address class="footer-logo-addr">
        〒658-0032 兵庫県神戸市東灘区向洋町6-9<br>
        TEL：<a href="tel:0788068338">078-806-8338</a><br>
        営業時間：平日 9:00〜19:00
      </address>
      <div class="footer-sns-block">
        <p class="footer-sns-label">OFFICIAL SNS</p>
        <div class="footer-sns" aria-label="公式SNSアカウント">
          <a href="https://www.instagram.com/self.achieve/" class="footer-sns-link footer-sns-ig" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><rect x="2" y="2" width="20" height="20" rx="5" stroke="#28282D" stroke-width="1.5"/><circle cx="12" cy="12" r="4" stroke="#28282D" stroke-width="1.5"/><circle cx="17.5" cy="6.5" r="1" fill="#28282D"/></svg>
          </a>
          <a href="https://www.tiktok.com/@selfachieve" class="footer-sns-link footer-sns-tt" target="_blank" rel="noopener noreferrer" aria-label="TikTok">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 12a4 4 0 1 0 4 4V4a5 5 0 0 0 5 5" stroke="#28282D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </a>
          <a href="https://x.com/selfachieve" class="footer-sns-link footer-sns-x" target="_blank" rel="noopener noreferrer" aria-label="X（旧Twitter）">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4 4l16 16M4 20L20 4" stroke="#28282D" stroke-width="1.5" stroke-linecap="round"/></svg>
          </a>
        </div>
      </div>
      <div class="footer-logo-related">
        <span class="footer-related-label">RELATED SERVICE</span>
        <a href="https://selfachieve.jp/saikatsu_r/" class="footer-related-link" target="_blank" rel="noopener noreferrer" aria-label="企業の採用活動を成功に導く「サイカツ.R」（別サイトが開きます）">企業の採用活動を成功に導く「サイカツ.R」<svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg></a>
      </div>
    </div>
    <nav class="footer-nav" aria-label="フッターナビゲーション">
      <div class="footer-nav-group">
        <p class="footer-nav-title">サービス</p>
        <a href="<?php echo esc_url( home_url( '/strategy/' ) ); ?>">WEB戦略設計</a>
        <a href="<?php echo esc_url( home_url( '/website/' ) ); ?>">サイト制作・分析改善</a>
        <a href="<?php echo esc_url( home_url( '/seo/' ) ); ?>">SEO対策</a>
        <a href="<?php echo esc_url( home_url( '/meo/' ) ); ?>">MEO対策</a>
        <a href="<?php echo esc_url( home_url( '/ai-seo/' ) ); ?>">AI検索対策（LLM検索対策）</a>
        <a href="<?php echo esc_url( home_url( '/listing/' ) ); ?>">リスティング広告</a>
        <a href="<?php echo esc_url( home_url( '/display/' ) ); ?>">ディスプレイ広告</a>
        <a href="<?php echo esc_url( home_url( '/sns/instagram/' ) ); ?>">Instagram</a>
        <a href="<?php echo esc_url( home_url( '/sns/tiktok/' ) ); ?>">TikTok</a>
        <a href="<?php echo esc_url( home_url( '/sns/x/' ) ); ?>">X（旧Twitter）</a>
        <a href="<?php echo esc_url( home_url( '/sns/youtube/' ) ); ?>">YouTube</a>
        <a href="<?php echo esc_url( home_url( '/sns/note/' ) ); ?>">note</a>
        <a href="<?php echo esc_url( home_url( '/sns/line/' ) ); ?>">LINE</a>
        <a href="<?php echo esc_url( home_url( '/ai-automation/' ) ); ?>">AI業務効率化・導入支援</a>
      </div>
      <div class="footer-nav-group">
        <p class="footer-nav-title">会社情報</p>
        <a href="<?php echo esc_url( home_url( '/works/' ) ); ?>">実績</a>
        <a href="<?php echo esc_url( home_url( '/voice/' ) ); ?>">お客さまの声</a>
        <a href="<?php echo esc_url( home_url( '/company/' ) ); ?>">会社情報</a>
        <a href="<?php echo esc_url( home_url( '/columns/' ) ); ?>">コラム</a>
        <a href="<?php echo esc_url( home_url( '/news/' ) ); ?>">お知らせ</a>
        <a href="<?php echo esc_url( home_url( '/privacy/' ) ); ?>">プライバシーポリシー</a>
      </div>
      <div class="footer-nav-group">
        <p class="footer-nav-title">お問い合わせ</p>
        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">無料相談のお申し込み</a>
        <a href="tel:0788068338">078-806-8338（平日 9:00～19:00）</a>
      </div>
    </nav>
  </div>
  <div class="footer-bottom">
    <div class="footer-bottom-right">
      <p class="footer-copy">&copy; <?php echo date( 'Y' ); ?> Self Achieve Inc. All Rights Reserved.</p>
    </div>
  </div>
</footer>

<script>
/* ===== Fade-up on scroll (.fu → .fu.on) ===== */
(function(){
  const obs = new IntersectionObserver(function(entries){
    entries.forEach(function(e){
      if(e.isIntersecting){ e.target.classList.add('on'); obs.unobserve(e.target); }
    });
  }, { threshold: 0.1 });
  document.querySelectorAll('.fu').forEach(function(el){ obs.observe(el); });

  /* ===== Count-up ===== */
  function countUp(el){
    var target = parseInt(el.getAttribute('data-count'), 10);
    var sup = el.querySelector('sup') ? el.querySelector('sup').outerHTML : '';
    var duration = 1200;
    var step = target / (duration / 16);
    var cur = 0;
    var t = setInterval(function(){
      cur = Math.min(cur + step, target);
      el.innerHTML = Math.floor(cur) + sup;
      if(cur >= target) clearInterval(t);
    }, 16);
  }
  var cobs = new IntersectionObserver(function(entries){
    entries.forEach(function(e){ if(e.isIntersecting){ countUp(e.target); cobs.unobserve(e.target); } });
  }, { threshold: 0.5 });
  document.querySelectorAll('[data-count]').forEach(function(el){ cobs.observe(el); });

  /* ===== TOC accordion ===== */
  (function(){
    var tocHead = document.getElementById('toc-sp-head');
    var tocWrap = document.getElementById('toc-sp');
    if(!tocHead || !tocWrap) return;
    tocHead.addEventListener('click', function(){
      var isOpen = tocWrap.classList.toggle('open');
      tocHead.setAttribute('aria-expanded', isOpen);
    });
    tocHead.addEventListener('keydown', function(e){
      if(e.key === 'Enter' || e.key === ' '){
        e.preventDefault();
        tocHead.click();
      }
    });
  })();

  /* ===== TOC 自動生成 ===== */
  (function(){
    var content = document.getElementById('article-content');
    var tocList = document.getElementById('toc-list-sp');
    if(!content || !tocList) return;
    var headings = content.querySelectorAll('h2, h3');
    if(headings.length < 2){ var tocWrap = document.getElementById('toc-sp'); if(tocWrap) tocWrap.style.display='none'; return; }
    headings.forEach(function(h, i){
      if(!h.id) h.id = 'toc-heading-' + i;
      var li = document.createElement('li');
      li.className = h.tagName.toLowerCase() === 'h3' ? 'toc-list-h3' : '';
      var a = document.createElement('a');
      a.href = '#' + h.id;
      a.textContent = h.textContent;
      li.appendChild(a);
      tocList.appendChild(li);
    });
  })();

  /* ===== FAQ accordion ===== */
  document.querySelectorAll('.faq-q').forEach(function(btn){
    btn.addEventListener('click', function(){
      var item = btn.closest('.faq-item');
      var isOpen = item.classList.contains('open');
      document.querySelectorAll('.faq-item.open').forEach(function(el){ el.classList.remove('open'); });
      if(!isOpen) item.classList.add('open');
    });
  });

  /* ===== Dropdown menu ===== */
  var NAV_ITEMS = document.querySelectorAll('.hd-nav-item');
  NAV_ITEMS.forEach(function(item){
    var closeTimer = null;
    var open = function(){
      clearTimeout(closeTimer);
      NAV_ITEMS.forEach(function(i){ if(i !== item) i.classList.remove('open'); });
      item.classList.add('open');
    };
    var close = function(){
      closeTimer = setTimeout(function(){ item.classList.remove('open'); }, 200);
    };
    item.addEventListener('mouseenter', open);
    item.addEventListener('mouseleave', close);
    var dd = item.querySelector('.hd-dropdown, .hd-mega-wrap, .hd-mega');
    if(dd){
      dd.addEventListener('mouseenter', function(){ clearTimeout(closeTimer); });
      dd.addEventListener('mouseleave', close);
    }
    document.addEventListener('click', function(e){
      if(!item.contains(e.target)) item.classList.remove('open');
    });
  });

  /* ===== Hamburger menu ===== */
  var hamburger = document.querySelector('.hd-hamburger');
  var drawer = document.getElementById('hd-drawer');
  if(hamburger && drawer){
    hamburger.addEventListener('click', function(){
      var isOpen = hamburger.classList.toggle('open');
      drawer.classList.toggle('open', isOpen);
      hamburger.setAttribute('aria-expanded', isOpen);
      document.body.style.overflow = isOpen ? 'hidden' : '';
    });
    drawer.querySelectorAll('a').forEach(function(a){
      a.addEventListener('click', function(){
        hamburger.classList.remove('open');
        drawer.classList.remove('open');
        hamburger.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
      });
    });
    /* ドロワー内の閉じるボタン */
    var drawerClose = drawer.querySelector('.hd-drawer-close');
    if(drawerClose){
      drawerClose.addEventListener('click', function(){
        hamburger.classList.remove('open');
        drawer.classList.remove('open');
        hamburger.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
      });
    }
    /* Drawer accordion */
    drawer.querySelectorAll('[data-drawer-accordion]').forEach(function(btn){
      btn.addEventListener('click', function(){
        var sub = btn.nextElementSibling;
        var isOpen = btn.classList.toggle('open');
        sub.classList.toggle('open', isOpen);
        btn.setAttribute('aria-expanded', isOpen);
      });
    });
    drawer.querySelectorAll('.hd-drawer-accordion-btn').forEach(function(btn){
      btn.addEventListener('click', function(e){
        e.stopPropagation();
        var sub = btn.nextElementSibling;
        var isOpen = btn.classList.toggle('open');
        sub.classList.toggle('open', isOpen);
      });
    });
  }

  /* ===== Tablet drawer ===== */
  var tabletDrawer = document.getElementById('hd-drawer-tablet');
  if(tabletDrawer){
    tabletDrawer.querySelectorAll('.hd-drawer-accordion-btn').forEach(function(btn){
      btn.addEventListener('click', function(e){
        e.stopPropagation();
        var sub = btn.nextElementSibling;
        var isOpen = btn.classList.toggle('open');
        sub.classList.toggle('open', isOpen);
      });
    });
  }

  /* ===== PC mega menu accordion ===== */
  document.querySelectorAll('.hd-mega-accordion-btn').forEach(function(btn){
    btn.addEventListener('click', function(e){
      e.stopPropagation();
      var sub = btn.nextElementSibling;
      var isOpen = btn.classList.toggle('open');
      sub.classList.toggle('open', isOpen);
    });
  });

  /* ===== SP fixed CTA ===== */
  var spCta = document.getElementById('sp-fixed-cta');
  if(spCta){
    var kvSection = document.querySelector('.kv');
    var contactSection = document.getElementById('contact');
    var ctaObserver = new IntersectionObserver(function(entries){
      entries.forEach(function(entry){
        if(entry.target === kvSection){
          if(!entry.isIntersecting){ spCta.classList.add('visible'); }
          else { spCta.classList.remove('visible'); }
        }
        if(entry.target === contactSection){
          if(entry.isIntersecting){ spCta.classList.remove('visible'); }
        }
      });
    }, { threshold: 0.1 });
    if(kvSection) ctaObserver.observe(kvSection);
    if(contactSection) ctaObserver.observe(contactSection);
  }
})();
</script>

<?php wp_footer(); ?>
</body>
</html>
