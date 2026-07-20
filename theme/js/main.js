// ========================================
// Lenis smooth scroll
// ========================================
const lenis = new Lenis({
  duration: 1.2,
  easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
  smoothWheel: true,
});

function lenisRaf(time) {
  lenis.raf(time);
  requestAnimationFrame(lenisRaf);
}
requestAnimationFrame(lenisRaf);
// ========================================
// AOS init
// ========================================
AOS.init({
  duration: 900,
  once: true,
  offset: 80,
  easing: 'ease-out-cubic',
});
lenis.on('scroll', AOS.refresh);

var burger = document.querySelector('.burger');
var mobMenu = document.querySelector('.mob-menu');
var mobClose = document.querySelector('.mob-menu__close');

burger.addEventListener('click', function() {
  mobMenu.classList.add('is-open');
  document.body.style.overflow = 'hidden';
});

mobClose.addEventListener('click', function() {
  mobMenu.classList.remove('is-open');
  document.body.style.overflow = '';
});

document.querySelectorAll('.mob-menu__link').forEach(function(link) {
  link.addEventListener('click', function() {
    mobMenu.classList.remove('is-open');
    document.body.style.overflow = '';
  });
});

// ========================================
// Products pagination (mobile: 3/pagina, desktop: 9/pagina se > 9 card)
// ========================================
(function() {
  var BREAKPOINT = 570;
  var PER_PAGE_MOBILE = 3;
  var PER_PAGE_DESKTOP = 9;
  var currentPage = 1;

  var grid = document.querySelector('.products__grid');
  var pagination = document.querySelector('.products__pagination');
  var prevBtn = document.querySelector('.products__btn-prev');
  var nextBtn = document.querySelector('.products__btn-next');
  var numsEl = document.querySelector('.products__pagination-nums');

  if (!grid || !pagination) return;

  function getCards() {
    return Array.from(grid.querySelectorAll('.product-card'));
  }

  function perPage() {
    return window.innerWidth <= BREAKPOINT ? PER_PAGE_MOBILE : PER_PAGE_DESKTOP;
  }

  function totalPages() {
    return Math.max(1, Math.ceil(getCards().length / perPage()));
  }

  // Пагинация нужна, только если карточек больше, чем помещается на страницу
  // (мобилка: > 3, десктоп: > 9).
  function isPaginated() {
    return getCards().length > perPage();
  }

  function scrollToGrid() {
    var top = grid.getBoundingClientRect().top + window.scrollY - 130;
    lenis.scrollTo(top, { duration: 0.6 });
  }

  function renderNums() {
    var total = totalPages();
    numsEl.innerHTML = '';
    for (var i = 1; i <= total; i++) {
      (function(page) {
        var btn = document.createElement('button');
        btn.className = 'products__pagination-num' + (page === currentPage ? ' is-active' : '');
        btn.textContent = page;
        btn.addEventListener('click', function() {
          goTo(page);
          scrollToGrid();
        });
        numsEl.appendChild(btn);
      })(i);
    }
  }

  function apply() {
    var cards = getCards();

    if (!isPaginated()) {
      pagination.classList.remove('is-visible');
      cards.forEach(function(c) { c.style.display = ''; });
      currentPage = 1;
      return;
    }

    pagination.classList.add('is-visible');

    var total = totalPages();
    var pp = perPage();
    currentPage = Math.max(1, Math.min(currentPage, total));
    var start = (currentPage - 1) * pp;

    cards.forEach(function(c, i) {
      c.style.display = (i >= start && i < start + pp) ? '' : 'none';
    });

    prevBtn.disabled = currentPage === 1;
    nextBtn.disabled = currentPage === total;

    renderNums();
  }

  function goTo(page) {
    currentPage = Math.max(1, Math.min(page, totalPages()));
    apply();
  }

  prevBtn.addEventListener('click', function() {
    scrollToGrid();
    goTo(currentPage - 1);
  });

  nextBtn.addEventListener('click', function() {
    scrollToGrid();
    goTo(currentPage + 1);
  });

  window.addEventListener('resize', function() {
    apply();
  });

  apply();
})();

// ========================================
// Order Popup
// ========================================
(function() {
  var popup = document.getElementById('orderPopup');
  var closeBtn = document.getElementById('orderClose');
  var overlay = document.getElementById('orderOverlay');

  function openPopup(e) {
    e.preventDefault();
    popup.classList.add('is-open');
    document.body.style.overflow = 'hidden';
    if (lenis) lenis.stop();
  }

  function closePopup() {
    popup.classList.remove('is-open');
    document.body.style.overflow = '';
    if (lenis) lenis.start();
  }

  // Добавить культуру в заявку по её data-product-id (+1 к количеству).
  function addProductToOrder(pid) {
    var item = document.querySelector('.order-popup__item[data-product-id="' + pid + '"]');
    if (!item) return;
    var qtyInput = item.querySelector('.order-popup__qty');
    if (!qtyInput) return;
    qtyInput.value = (parseInt(qtyInput.value, 10) || 0) + 1;
    qtyInput.dispatchEvent(new Event('input', { bubbles: true }));
  }

  document.querySelectorAll('.product-card__btn, .hero__btn-secondary, .wellness__btn, .freshness__btn.js-order-trigger').forEach(function(btn) {
    btn.addEventListener('click', function(e) {
      openPopup(e);
      var pid = btn.getAttribute('data-product-id');
      if (pid) addProductToOrder(pid);
    });
  });
  closeBtn.addEventListener('click', closePopup);
  overlay.addEventListener('click', closePopup);

  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closePopup();
  });

  function initSteppers() {
    document.querySelectorAll('.order-popup__item').forEach(function(item) {
      if (item.dataset.stepperReady) return;
      item.dataset.stepperReady = '1';

      var minusBtn = item.querySelector('.order-popup__step[data-dir="-1"]');
      var plusBtn = item.querySelector('.order-popup__step[data-dir="1"]');
      var qtyInput = item.querySelector('.order-popup__qty');
      if (!minusBtn || !plusBtn || !qtyInput) return;

      function getQty() {
        return parseInt(qtyInput.value, 10) || 0;
      }

      function setQty(value) {
        var qty = Math.max(0, value);
        qtyInput.value = qty;
        minusBtn.disabled = qty === 0;
      }

      setQty(getQty());

      plusBtn.addEventListener('click', function() {
        setQty(getQty() + 1);
      });

      minusBtn.addEventListener('click', function() {
        setQty(getQty() - 1);
      });

      qtyInput.addEventListener('focus', function() {
        if (getQty() === 0) {
          qtyInput.value = '';
        }
      });

      qtyInput.addEventListener('input', function() {
        qtyInput.value = qtyInput.value.replace(/\D/g, '').replace(/^0+(?=\d)/, '');
        minusBtn.disabled = getQty() === 0;
      });

      qtyInput.addEventListener('blur', function() {
        setQty(getQty());
      });
    });
  }

  initSteppers();
  // Gravity Forms перерисовывает форму при AJAX — переинициализируем степперы.
  if (window.jQuery) {
    jQuery(document).on('gform_post_render', initSteppers);
  }
})();

// ========================================
// Consult Popup
// ========================================
(function() {
  var popup = document.getElementById('consultPopup');
  var triggers = document.querySelectorAll('.js-consult-trigger, .js-order-trigger:not(.hero__btn-secondary):not(.wellness__btn):not(.freshness__btn)');
  var closeBtn = document.getElementById('consultClose');
  var overlay = document.getElementById('consultOverlay');

  function openPopup(e) {
    e.preventDefault();
    popup.classList.add('is-open');
    document.body.style.overflow = 'hidden';
    if (lenis) lenis.stop();
  }

  function closePopup() {
    popup.classList.remove('is-open');
    document.body.style.overflow = '';
    if (lenis) lenis.start();
  }

  triggers.forEach(function(btn) {
    btn.addEventListener('click', openPopup);
  });
  closeBtn.addEventListener('click', closePopup);
  overlay.addEventListener('click', closePopup);

  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closePopup();
  });
})();

var ANCHOR_SCROLL_OFFSET = 100;

document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
  anchor.addEventListener('click', function(e) {
    var target = anchor.getAttribute('href');
    if (target === '#') return;
    e.preventDefault();
    lenis.scrollTo(target, { offset: -ANCHOR_SCROLL_OFFSET });
  });
});

// ========================================
// Order: перед отправкой пишем выбранные количества в скрытое GF-поле input_8
// (надёжно — GF отправляет свои поля всегда, в отличие от «не-GF» инпутов)
// ========================================
document.addEventListener('click', function(e) {
  var btn = (e.target && e.target.closest) ? e.target.closest('.order-popup__submit') : null;
  if (!btn) return;
  var form = btn.closest('form');
  if (!form) return;

  var lines = [];
  document.querySelectorAll('.order-popup__item').forEach(function(item) {
    var nameEl = item.querySelector('.order-popup__item-name');
    var qtyEl = item.querySelector('.order-popup__qty');
    if (!nameEl || !qtyEl) return;
    var qty = parseInt(qtyEl.value, 10) || 0;
    if (qty > 0) lines.push(nameEl.textContent.trim() + ' × ' + qty + ' pz');
  });

  var hidden = form.querySelector('input[name="input_8"]');
  if (hidden) hidden.value = lines.join('\n');
}, true);
