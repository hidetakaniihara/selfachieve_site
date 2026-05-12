/**
 * common.js
 * 全ページ共通スクリプト
 */
document.addEventListener('DOMContentLoaded', () => {

  /* ===== Copyright year (JST) ======================================== */
  (function () {
    var el = document.getElementById('copyright-year');
    if (el) {
      var jst = new Date(new Date().toLocaleString('en-US', { timeZone: 'Asia/Tokyo' }));
      el.textContent = jst.getFullYear();
    }
  })();

  /* ===== Fade up on scroll (.fu → .on) =============================== */
  const obs = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.classList.add('on');
        obs.unobserve(e.target);
      }
    });
  }, { threshold: 0.1 });
  document.querySelectorAll('.fu').forEach(el => obs.observe(el));

  /* ===== FAQ accordion =============================================== */
  document.querySelectorAll('.faq-q').forEach(btn => {
    btn.addEventListener('click', () => {
      const item = btn.closest('.faq-item');
      const isOpen = item.classList.contains('open');
      document.querySelectorAll('.faq-item.open').forEach(el => {
        el.classList.remove('open');
        el.querySelector('.faq-q').setAttribute('aria-expanded', 'false');
      });
      if (!isOpen) {
        item.classList.add('open');
        btn.setAttribute('aria-expanded', 'true');
      }
    });
    btn.addEventListener('keydown', e => {
      if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); btn.click(); }
    });
  });

  /* ===== Count up ([data-count]) ===================================== */
  // 集客支援歴：創業2011年5月1日基準で動的計算
  (function () {
    const now = new Date();
    const base = new Date(2011, 4, 1); // 2011年5月1日
    let years = now.getFullYear() - base.getFullYear();
    if (now < new Date(now.getFullYear(), 4, 1)) years--;
    document.querySelectorAll('[data-career]').forEach(el => {
      el.dataset.count = years;
    });
  })();

  function countUp(el) {
    const target = parseInt(el.dataset.count, 10);
    const sup = el.querySelector('sup') ? el.querySelector('sup').outerHTML : '';
    let cur = 0;
    const step = target / (1200 / 16);
    const t = setInterval(() => {
      cur = Math.min(cur + step, target);
      el.innerHTML = Math.floor(cur) + sup;
      if (cur >= target) clearInterval(t);
    }, 16);
  }
  const cobs = new IntersectionObserver(entries => {
    entries.forEach(e => {
      if (e.isIntersecting) { countUp(e.target); cobs.unobserve(e.target); }
    });
  }, { threshold: 0.5 });
  document.querySelectorAll('[data-count]').forEach(el => cobs.observe(el));

  /* ===== DROPDOWN MENU (hover with delay) ============================ */
  const NAV_ITEMS = document.querySelectorAll('.hd-nav-item');
  NAV_ITEMS.forEach(item => {
    let closeTimer = null;
    const open = () => {
      clearTimeout(closeTimer);
      NAV_ITEMS.forEach(i => { if (i !== item) i.classList.remove('open'); });
      item.classList.add('open');
    };
    const close = () => {
      closeTimer = setTimeout(() => item.classList.remove('open'), 200);
    };
    item.addEventListener('mouseenter', open);
    item.addEventListener('mouseleave', close);
    const dd = item.querySelector('.hd-dropdown, .hd-mega-wrap, .hd-mega');
    if (dd) {
      dd.addEventListener('mouseenter', () => clearTimeout(closeTimer));
      dd.addEventListener('mouseleave', close);
    }
    document.addEventListener('click', e => {
      if (!item.contains(e.target)) item.classList.remove('open');
    });
  });

  /* ===== HAMBURGER MENU ============================================== */
  const hamburger = document.querySelector('.hd-hamburger');
  const drawer = document.getElementById('hd-drawer');
  if (hamburger && drawer) {
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

    // Drawer accordion（data-drawer-accordion）
    drawer.querySelectorAll('[data-drawer-accordion]').forEach(btn => {
      btn.addEventListener('click', () => {
        const sub = btn.nextElementSibling;
        const isOpen = btn.classList.toggle('open');
        sub.classList.toggle('open', isOpen);
        btn.setAttribute('aria-expanded', isOpen);
      });
    });

    // ドロワー内の閉じるボタン
    const drawerClose = drawer.querySelector('.hd-drawer-close');
    if (drawerClose) {
      drawerClose.addEventListener('click', () => {
        hamburger.classList.remove('open');
        drawer.classList.remove('open');
        hamburger.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
      });
    }
  }

  /* ===== PCメガメニュー WEB広告アコーディオン ======================== */
  document.querySelectorAll('.hd-mega-accordion-btn').forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.stopPropagation();
      const sub = btn.nextElementSibling;
      const isOpen = btn.classList.toggle('open');
      sub.classList.toggle('open', isOpen);
    });
  });

  /* ===== WEB広告ネストアコーディオン（全ドロワー共通） =============== */
  document.querySelectorAll('.hd-drawer-accordion-btn').forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.stopPropagation();
      const sub = btn.nextElementSibling;
      const isOpen = btn.classList.toggle('open');
      sub.classList.toggle('open', isOpen);
    });
  });

  /* ===== タブレットドロワーのWEB広告アコーディオン =================== */
  const tabletDrawer = document.getElementById('hd-drawer-tablet');
  if (tabletDrawer) {
    tabletDrawer.querySelectorAll('.hd-drawer-accordion-btn').forEach(btn => {
      btn.addEventListener('click', (e) => {
        e.stopPropagation();
        const sub = btn.nextElementSibling;
        const isOpen = btn.classList.toggle('open');
        sub.classList.toggle('open', isOpen);
      });
    });
  }

  /* ===== SP追従バナー（sp-fixed-cta）の動的生成 ====================== */
  (function () {
    var depth = location.pathname.replace(/\/$/, '').split('/').length - 1;
    var prefix = depth <= 1 ? '/' : depth === 2 ? '../' : '../../';

    var html = [
      '<div class="sp-fixed-cta" id="sp-fixed-cta">',
      '  <div class="sp-fixed-cta-inner">',
      '    <a href="' + prefix + 'contact/" class="sp-fixed-cta-consult">\u7121\u6599\u76f8\u8ac7\u3092\u7533\u3057\u8fbc\u3080</a>',
      '    <a href="tel:0788068338" class="sp-fixed-cta-tel">',
      '      <svg width="14" height="14" viewBox="0 0 24 24" fill="none">',
      '        <path d="M6.6 10.8c1.4 2.8 3.8 5.1 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1-9.4 0-17-7.6-17-17 0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.3.2 2.5.6 3.6.1.3 0 .7-.2 1L6.6 10.8z" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>',
      '      </svg>',
      '      <span class="sp-fixed-cta-tel-num">078-806-8338</span>',
      '    </a>',
      '  </div>',
      '</div>'
    ].join('\n');

    var existing = document.getElementById('sp-fixed-cta');
    if (existing) existing.parentNode.removeChild(existing);
    document.body.insertAdjacentHTML('beforeend', html);

    // スマホ固定CTA 表示制御（KV通過後に表示、#contact到達で非表示）
    var cta = document.getElementById('sp-fixed-cta');
    if (!cta) return;
    var kvSection = document.querySelector('.kv');
    var contactSection = document.getElementById('contact');
    if (kvSection || contactSection) {
      var ctaObserver = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (entry.target === kvSection) {
            cta.classList.toggle('visible', !entry.isIntersecting);
          }
          if (entry.target === contactSection && entry.isIntersecting) {
            cta.classList.remove('visible');
          }
        });
      }, { threshold: 0.1 });
      if (kvSection) ctaObserver.observe(kvSection);
      if (contactSection) ctaObserver.observe(contactSection);
    } else {
      // KVセクションがないページはスクロール300px後に表示
      window.addEventListener('scroll', function () {
        if (window.scrollY > 300) cta.classList.add('visible');
      }, { passive: true });
    }
  })();

});
