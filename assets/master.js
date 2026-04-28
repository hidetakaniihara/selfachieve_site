/* ============================================================
   master.js — Self Achieve Inc.
   ヘッダー・フッター・共通インタラクションのスクリプト
   このファイルはトップページ（index.html）から自動生成されました
   ============================================================ */

  // Copyright year (JST)
  (function(){
    var jst = new Date(new Date().toLocaleString('en-US', {timeZone: 'Asia/Tokyo'}));
    document.getElementById('copyright-year').textContent = jst.getFullYear();
  })();

  // Fade up on scroll
  const obs = new IntersectionObserver(entries => {
    entries.forEach(e => { if(e.isIntersecting){ e.target.classList.add('on'); obs.unobserve(e.target); } });
  }, { threshold: 0.1 });
  document.querySelectorAll('.fu').forEach(el => obs.observe(el));
  // KV等ページロード時に既にビューポート内の .fu 要素を即座に表示
  (function applyInitialFu() {
    requestAnimationFrame(function() {
      requestAnimationFrame(function() {
        document.querySelectorAll('.fu').forEach(function(el) {
          var r = el.getBoundingClientRect();
          if (r.top < window.innerHeight && r.bottom > 0) {
            el.classList.add('on');
          }
        });
      });
    });
  })();


  // DROPDOWN MENU (hover with delay)
  const NAV_ITEMS = document.querySelectorAll('.hd-nav-item');
  NAV_ITEMS.forEach(item => {
    let closeTimer = null;
    const open = () => {
      clearTimeout(closeTimer);
      NAV_ITEMS.forEach(i => { if(i !== item) i.classList.remove('open'); });
      item.classList.add('open');
    };
    const close = () => {
      closeTimer = setTimeout(() => item.classList.remove('open'), 200);
    };
    item.addEventListener('mouseenter', open);
    item.addEventListener('mouseleave', close);
    // keep open when cursor moves into dropdown/mega
    const dd = item.querySelector('.hd-dropdown, .hd-mega-wrap, .hd-mega');
    if(dd){
      dd.addEventListener('mouseenter', () => clearTimeout(closeTimer));
      dd.addEventListener('mouseleave', close);
    }
    // close on outside click
    document.addEventListener('click', e => {
      if(!item.contains(e.target)) item.classList.remove('open');
    });
  });

  // HAMBURGER MENU
  const hamburger = document.querySelector('.hd-hamburger');
  const drawer = document.getElementById('hd-drawer');
  hamburger.addEventListener('click', () => {
    const isOpen = hamburger.classList.toggle('open');
    drawer.classList.toggle('open', isOpen);
    hamburger.setAttribute('aria-expanded', isOpen);
    document.body.style.overflow = isOpen ? 'hidden' : '';
  });
  // Close drawer when a link is clicked
  drawer.querySelectorAll('a').forEach(a => {
    a.addEventListener('click', () => {
      hamburger.classList.remove('open');
      drawer.classList.remove('open');
      hamburger.setAttribute('aria-expanded', 'false');
      document.body.style.overflow = '';
    });
  });

  // スマホ固定CTA 表示制御
  const spCta = document.getElementById('sp-fixed-cta');
  if (spCta) {
    const kvSection = document.querySelector('.kv');
    const contactSection = document.getElementById('contact');
    // KVを過ぎたら表示、#contactが見えたら非表示
    const ctaObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.target === kvSection) {
          if (!entry.isIntersecting) {
            spCta.classList.add('visible');
          } else {
            spCta.classList.remove('visible');
          }
        }
        if (entry.target === contactSection) {
          if (entry.isIntersecting) {
            spCta.classList.remove('visible');
          }
        }
      });
    }, { threshold: 0.1 });
    if (kvSection) ctaObserver.observe(kvSection);
    if (contactSection) ctaObserver.observe(contactSection);
  }

  // Drawer accordion
  drawer.querySelectorAll('[data-drawer-toggle]').forEach(btn => {
    btn.addEventListener('click', () => {
      const sub = btn.nextElementSibling;
      const isOpen = btn.classList.toggle('open');
      sub.classList.toggle('open', isOpen);
    });
  });

