# Bazaarly – Multivendor Marketplace Template

Built on Sneat (Bootstrap 5). Plain HTML, CSS and JavaScript – no framework, no build step.
Open `index.html` in a browser (or serve the folder with any static server).

## Structure
- `index.html` – start page (links to both panels)
- `admin/` – Admin / Moderator panel (20 pages)
- `vendor/` – Vendor panel (8 pages)
- `auth/` – login, register (customer / vendor switch), forgot password
- `misc/` – 404, maintenance
- `assets/css/multivendor.css` – marketplace styles added on top of Sneat
- `assets/js/multivendor.js` – table search / filter / pagination, slug generator, discount calculator,
  image preview, confirm dialogs, toasts
- `assets/js/mv-charts.js` – ApexCharts helpers (donut, bar, area)

All data in the pages is placeholder content. Forms are demo-only (they show a toast instead of submitting).
Tables are plain `<table>` markup; add `data-mv-table` wrapper + the toolbar markup to get search/filter/pagination.

## Admin menu
Dashboard · Vendors (list, add) · Products (all, moderation queue, add) · Categories · Brands ·
Orders (all, statuses) · Commissions · Reports · Customers · Users & Roles (staff, roles) · Settings · Profile

## Vendor menu
Dashboard · Shop Profile · Products (list, add) · Orders · Earnings & Commission · Profile
