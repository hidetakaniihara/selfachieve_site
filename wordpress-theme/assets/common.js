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

/* ===== WHY WORKS SLIDER (Swiper) ===================================
 * .why-works-swiper が存在するページのみ初期化する
 * ================================================================= */
(function () {
  'use strict';
  document.addEventListener('DOMContentLoaded', function () {
    if (!document.querySelector('.why-works-swiper')) return;
    if (typeof Swiper === 'undefined') return;
    new Swiper('.why-works-swiper', {
      loop: true,
      autoplay: {
        delay: 3500,
        disableOnInteraction: false,
      },
      speed: 700,
      slidesPerView: 1,
      spaceBetween: 0,
      pagination: {
        el: '.why-works-slider .swiper-pagination',
        clickable: true,
      },
    });
  });
})();

/* ===== COUNT UP =====================================================
 * 対象: [data-count] を持つ全要素
 *   - .kv-stat-n        TOPページ KVエリア
 *   - .about-stat-n     TOPページ ABOUTエリア
 *   - .case-result-num  各SNSページ 実績カード
 * ================================================================= */
(function(){
  'use strict';
  function countUp(el){
    var target = parseFloat(el.dataset.count);
    if(isNaN(target)) return;
    /* kv-stat-n / about-stat-n は <sup> を内包するため保持する */
    var sup = el.querySelector('sup') ? el.querySelector('sup').outerHTML : '';
    /* case-result-num は data-suffix / data-decimal を使う */
    var suffix = el.dataset.suffix || '';
    var decimal = parseInt(el.dataset.decimal) || 0;
    var duration = 1800;
    var start = performance.now();
    function update(now){
      var t = Math.min((now - start) / duration, 1);
      var ease = 1 - Math.pow(1 - t, 3);
      var val = target * ease;
      var display = decimal > 0 ? val.toFixed(decimal) : Math.floor(val);
      if(sup){
        /* kv-stat-n / about-stat-n: 数字 + <sup>単位</sup> */
        el.innerHTML = display + sup;
      } else {
        /* case-result-num: 数字 + <span>suffix</span> */
        el.innerHTML = display + (suffix ? '<span>' + suffix + '</span>' : '');
      }
      if(t < 1) requestAnimationFrame(update);
    }
    requestAnimationFrame(update);
  }
  document.addEventListener('DOMContentLoaded', function(){
    var countEls = document.querySelectorAll('[data-count]');
    if(!countEls.length) return;
    if('IntersectionObserver' in window){
      var cio = new IntersectionObserver(function(entries){
        entries.forEach(function(e){
          if(e.isIntersecting){
            countUp(e.target);
            cio.unobserve(e.target);
          }
        });
      },{threshold:.3});
      countEls.forEach(function(el){ cio.observe(el); });
    } else {
      countEls.forEach(function(el){ countUp(el); });
    }
  });
})();
