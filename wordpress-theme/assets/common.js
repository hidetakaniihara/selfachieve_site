/**
 * common.js
 * 全ページ共通スクリプト
 * - SP追従バナー（sp-fixed-cta）の動的生成
 */
(function () {
  'use strict';

  /* ===== パス解決 ===================================================
   * assets/common.js は /assets/ 直下に置かれる。
   * ページの階層（0〜2段）に応じて contact/ と tel: のパスを自動決定する。
   * ================================================================= */
  var depth = location.pathname.replace(/\/$/, '').split('/').length - 1;
  // 例: / → depth=1, /voice/ → depth=2, /voice/iwazawa/ → depth=3
  // ルートからの相対パスを生成
  var prefix = '';
  if (depth <= 1) {
    prefix = '/';          // トップ直下
  } else if (depth === 2) {
    prefix = '../';        // 1階層下
  } else {
    prefix = '../../';     // 2階層下
  }

  /* ===== HTML生成 =================================================== */
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

  /* ===== 既存のHTML要素があれば削除して差し替え ===================== */
  var existing = document.getElementById('sp-fixed-cta');
  if (existing) {
    existing.parentNode.removeChild(existing);
  }

  /* ===== bodyの末尾に挿入 =========================================== */
  document.body.insertAdjacentHTML('beforeend', html);

  /* ===== スクロール連動で表示 ======================================= */
  var cta = document.getElementById('sp-fixed-cta');
  if (!cta) return;
  var shown = false;
  window.addEventListener('scroll', function () {
    if (window.scrollY > 300 && !shown) {
      cta.classList.add('visible');
      shown = true;
    }
  }, { passive: true });
})();

// ===== SC SLIDER（SEOページ グラフスライダー） =====
(function () {
  var slider = document.querySelector('.sc-slider');
  if (!slider) return;
  var slides = slider.querySelectorAll('.sc-slide');
  var total = slides.length;
  var current = 0;
  var prevBtn = document.getElementById('scPrev');
  var nextBtn = document.getElementById('scNext');
  var dots = document.querySelectorAll('.sc-dot');
  function goTo(index) {
    current = (index + total) % total;
    slider.style.transform = 'translateX(-' + (current * 100) + '%)';
    dots.forEach(function (d, i) {
      d.classList.toggle('active', i === current);
    });
  }
  if (prevBtn) prevBtn.addEventListener('click', function () { goTo(current - 1); });
  if (nextBtn) nextBtn.addEventListener('click', function () { goTo(current + 1); });
  dots.forEach(function (d) {
    d.addEventListener('click', function () {
      goTo(parseInt(d.dataset.index, 10));
    });
  });
  var startX = 0;
  slider.addEventListener('mousedown', function (e) { startX = e.clientX; });
  slider.addEventListener('mouseup', function (e) {
    var diff = startX - e.clientX;
    if (Math.abs(diff) > 50) goTo(diff > 0 ? current + 1 : current - 1);
  });
  slider.addEventListener('touchstart', function (e) { startX = e.touches[0].clientX; }, { passive: true });
  slider.addEventListener('touchend', function (e) {
    var diff = startX - e.changedTouches[0].clientX;
    if (Math.abs(diff) > 50) goTo(diff > 0 ? current + 1 : current - 1);
  }, { passive: true });
})();
// ===== END SC SLIDER =====

