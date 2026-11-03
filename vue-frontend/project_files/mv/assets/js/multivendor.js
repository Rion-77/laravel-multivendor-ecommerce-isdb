/**
 * Bazaarly – Multivendor helpers (vanilla JS, no build step)
 * Features: table search / filter / pagination, slug generator, discount calculator,
 *           image preview, char counter, confirm dialogs, toasts, register role switch.
 */
'use strict';
(function () {
  const $ = (s, c = document) => c.querySelector(s);
  const $$ = (s, c = document) => Array.from(c.querySelectorAll(s));

  /* ---------- Toasts ---------- */
  function toast(message, type = 'success') {
    let stack = $('.mv-toast-stack');
    if (!stack) {
      stack = document.createElement('div');
      stack.className = 'mv-toast-stack';
      document.body.appendChild(stack);
    }
    const el = document.createElement('div');
    el.className = 'bs-toast toast fade show bg-' + type;
    el.setAttribute('role', 'alert');
    el.innerHTML =
      '<div class="toast-header"><i class="bx bx-bell me-2"></i><div class="me-auto fw-semibold">Bazaarly</div>' +
      '<button type="button" class="btn-close" data-bs-dismiss="toast"></button></div>' +
      '<div class="toast-body"></div>';
    $('.toast-body', el).textContent = message;
    stack.appendChild(el);
    setTimeout(() => el.remove(), 3500);
  }
  window.mvToast = toast;

  /* ---------- Data tables (client-side) ---------- */
  function initTable(wrap) {
    const table = $('table', wrap);
    const body = $('tbody', table);
    const rows = $$('tr', body);
    const search = $('[data-mv-search]', wrap);
    const filters = $$('[data-mv-filter]', wrap);
    const sizeSel = $('[data-mv-pagesize]', wrap);
    const info = $('[data-mv-info]', wrap);
    const pager = $('[data-mv-pager]', wrap);
    const empty = $('.mv-empty', wrap);
    let page = 1;
    let size = sizeSel ? parseInt(sizeSel.value, 10) : 10;

    function matches(row) {
      if (search && search.value.trim()) {
        if (!row.textContent.toLowerCase().includes(search.value.trim().toLowerCase())) return false;
      }
      return filters.every(f => !f.value || row.getAttribute('data-' + f.getAttribute('data-mv-filter')) === f.value);
    }

    function render() {
      const hits = rows.filter(matches);
      const pages = Math.max(1, Math.ceil(hits.length / size));
      if (page > pages) page = pages;
      const start = (page - 1) * size;
      rows.forEach(r => (r.style.display = 'none'));
      hits.slice(start, start + size).forEach(r => (r.style.display = ''));
      if (empty) empty.style.display = hits.length ? 'none' : 'block';
      if (info) {
        info.textContent = hits.length
          ? 'Showing ' + (start + 1) + '–' + Math.min(start + size, hits.length) + ' of ' + hits.length + ' entries'
          : 'No entries';
      }
      if (pager) {
        let html = '<li class="page-item' + (page === 1 ? ' disabled' : '') + '"><a class="page-link" href="#" data-p="' + (page - 1) + '"><i class="tf-icon bx bx-chevron-left"></i></a></li>';
        const from = Math.max(1, page - 2), to = Math.min(pages, page + 2);
        if (from > 1) html += '<li class="page-item"><a class="page-link" href="#" data-p="1">1</a></li>' + (from > 2 ? '<li class="page-item disabled"><a class="page-link">…</a></li>' : '');
        for (let i = from; i <= to; i++) html += '<li class="page-item' + (i === page ? ' active' : '') + '"><a class="page-link" href="#" data-p="' + i + '">' + i + '</a></li>';
        if (to < pages) html += (to < pages - 1 ? '<li class="page-item disabled"><a class="page-link">…</a></li>' : '') + '<li class="page-item"><a class="page-link" href="#" data-p="' + pages + '">' + pages + '</a></li>';
        html += '<li class="page-item' + (page === pages ? ' disabled' : '') + '"><a class="page-link" href="#" data-p="' + (page + 1) + '"><i class="tf-icon bx bx-chevron-right"></i></a></li>';
        pager.innerHTML = html;
      }
    }

    if (search) search.addEventListener('input', () => { page = 1; render(); });
    filters.forEach(f => f.addEventListener('change', () => { page = 1; render(); }));
    if (sizeSel) sizeSel.addEventListener('change', () => { size = parseInt(sizeSel.value, 10); page = 1; render(); });
    if (pager) pager.addEventListener('click', e => {
      const a = e.target.closest('a[data-p]');
      if (!a) return;
      e.preventDefault();
      const p = parseInt(a.getAttribute('data-p'), 10);
      if (p >= 1) { page = p; render(); }
    });
    const checkAll = $('[data-mv-checkall]', wrap);
    if (checkAll) checkAll.addEventListener('change', () => {
      rows.filter(r => r.style.display !== 'none').forEach(r => { const c = $('input[type=checkbox]', r); if (c) c.checked = checkAll.checked; });
    });
    render();
  }
  $$('[data-mv-table]').forEach(initTable);

  /* ---------- Slug generator ---------- */
  const slugify = s => s.toString().toLowerCase().trim().replace(/&/g, ' and ').replace(/['’]/g, '').replace(/[^a-z0-9]+/g, '-').replace(/^-+|-+$/g, '');
  $$('[data-mv-slug-source]').forEach(src => {
    const target = $(src.getAttribute('data-mv-slug-source'));
    if (!target) return;
    let touched = target.value !== '';
    target.addEventListener('input', () => (touched = true));
    src.addEventListener('input', () => { if (!touched) target.value = slugify(src.value); });
  });

  /* ---------- Discount calculator (base_price / offer_price) ---------- */
  const base = $('#base_price'), offer = $('#offer_price'), disc = $('#mv-discount');
  function calcDiscount() {
    if (!base || !offer || !disc) return;
    const b = parseFloat(base.value) || 0, o = parseFloat(offer.value) || 0;
    if (b > 0 && o > 0 && o <= b) {
      const pct = Math.round(((b - o) / b) * 100);
      disc.innerHTML = pct > 0 ? '<span class="badge bg-label-success">' + pct + '% off</span> customers save $' + (b - o).toLocaleString() : '<span class="badge bg-label-secondary">No discount</span>';
    } else if (o > b && b > 0) {
      disc.innerHTML = '<span class="badge bg-label-danger">Offer price must not exceed base price</span>';
    } else disc.textContent = '';
  }
  [base, offer].forEach(el => el && el.addEventListener('input', calcDiscount));
  calcDiscount();

  /* ---------- Char counter (description varchar(255)) ---------- */
  $$('textarea[maxlength]').forEach(t => {
    const out = t.parentElement.querySelector('[data-mv-counter]');
    if (!out) return;
    const upd = () => (out.textContent = t.value.length + ' / ' + t.getAttribute('maxlength'));
    t.addEventListener('input', upd); upd();
  });

  /* ---------- Image preview ---------- */
  $$('[data-mv-dropzone]').forEach(zone => {
    const input = $('input[type=file]', zone.parentElement);
    const preview = $('.mv-preview', zone.parentElement);
    zone.addEventListener('click', () => input.click());
    zone.addEventListener('dragover', e => { e.preventDefault(); zone.style.borderColor = '#696cff'; });
    zone.addEventListener('dragleave', () => (zone.style.borderColor = ''));
    zone.addEventListener('drop', e => { e.preventDefault(); zone.style.borderColor = ''; input.files = e.dataTransfer.files; show(); });
    input.addEventListener('change', show);
    function show() {
      preview.innerHTML = '';
      Array.from(input.files).forEach(f => {
        if (!f.type.startsWith('image/')) return;
        const img = document.createElement('img');
        img.src = URL.createObjectURL(f);
        img.alt = f.name;
        preview.appendChild(img);
      });
    }
  });

  /* ---------- Confirm + demo actions ---------- */
  document.addEventListener('click', e => {
    const btn = e.target.closest('[data-mv-confirm]');
    if (btn) {
      e.preventDefault();
      const modalEl = $('#mvConfirmModal');
      if (!modalEl) return;
      $('.mv-confirm-text', modalEl).textContent = btn.getAttribute('data-mv-confirm');
      const ok = $('.mv-confirm-ok', modalEl);
      ok.setAttribute('class', 'btn mv-confirm-ok ' + (btn.getAttribute('data-mv-confirm-class') || 'btn-danger'));
      ok.textContent = btn.getAttribute('data-mv-confirm-label') || 'Confirm';
      const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
      ok.onclick = () => {
        modal.hide();
        const row = btn.closest('tr');
        if (btn.hasAttribute('data-mv-remove-row') && row) row.remove();
        toast(btn.getAttribute('data-mv-success') || 'Done (demo – connect this to your backend).');
      };
      modal.show();
      return;
    }
    const t = e.target.closest('[data-mv-toast]');
    if (t) { e.preventDefault(); toast(t.getAttribute('data-mv-toast'), t.getAttribute('data-mv-toast-type') || 'success'); }
  });

  /* Forms flagged as demo: prevent navigation, show toast */
  $$('form[data-mv-demo]').forEach(f => f.addEventListener('submit', e => { e.preventDefault(); toast(f.getAttribute('data-mv-demo') || 'Saved (demo).'); }));

  /* ---------- Register page: customer / vendor switch ---------- */
  const roleRadios = $$('input[name="account_type"]');
  const vendorFields = $('#vendorFields');
  if (roleRadios.length && vendorFields) {
    const sync = () => {
      const v = roleRadios.find(r => r.checked).value === 'vendor';
      vendorFields.classList.toggle('d-none', !v);
      $$('input,textarea', vendorFields).forEach(i => (i.required = v));
    };
    roleRadios.forEach(r => r.addEventListener('change', sync)); sync();
  }

  /* ---------- Order status quick-update select ---------- */
  $$('[data-mv-status-select]').forEach(sel => sel.addEventListener('change', () => toast('Order status set to "' + sel.options[sel.selectedIndex].text + '" (demo).', 'info')));
})();
