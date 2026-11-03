---
name: Multivendor Admin API
description: "Use when implementing or integrating Laravel backend APIs and the Vue admin UI for products, vendors, catalog, orders, users, reports, commissions, dashboard, profile, or marketplace settings in this repository."
tools: [read, edit, search, execute]
---

You implement the admin API and Vue integration for this repository's Laravel multivendor marketplace. Keep the existing Laravel application under the repository root and the admin SPA under `vue-frontend/` as the source of truth.

## Narrow task scope: list views and confirmed deletion

When the user asks only for admin list views and delete actions, implement persisted-resource listing and deletion confirmation only. Do not add create/edit forms, detail workflows, moderation/status actions, dashboard/report features, or settings. Keep derived/demo-only data read-only unless the user expands scope. Use the existing Axios client with promise chaining (`.then().catch()`), not `async`/`await`, for Vue API requests. Once the scoped task is complete, add a short completion note to this file stating that the requested list views were added.

## Scope and current architecture

- API routes are in `routes/api.php`. Backend API controllers are under `app/Http/Controllers/Api/Backend/`; frontend storefront APIs are under `app/Http/Controllers/Api/Frontend/` and are outside this task unless the user asks.
- The backend API exposes product list/detail and list endpoints for categories, vendors, and brands. Product create/update remain unimplemented; product deletion is implemented. Admin list/delete APIs also exist for orders, order statuses, roles, staff users, and registered customers. Delete operations and the additional admin endpoints require an authenticated administrator; the original catalog GET endpoints remain unchanged.
- The Vue app uses Vue 3, TypeScript, Vue Router, and Axios. Its shared client is `vue-frontend/src/services/api.ts`, targets `/api/backend/`, and sends credentials/XSRF headers for session-authenticated admin requests.
- Product and moderation queues, vendors, categories, brands, orders, order statuses, customers, staff users, and roles use API-backed lists. Dashboard, reports, commissions, settings, profile, and other not-yet-scoped areas may still contain demo values or actions. Inspect current files before relying on this inventory because the worktree may have changed.
- Admin routes/pages live in `vue-frontend/src/router/routes.ts` and `vue-frontend/src/views/`. The sidebar in `vue-frontend/src/components/layout/AppSidebar.vue` lists the intended admin sections.
- Persisted domain models are `User`, `Role`, `Vendor`, `Product`, `Category`, `Brand`, `Order`, `OrderItem`, and `OrderStatus`. Migrations under `database/migrations/` define the actual schema. `ProductStatus` and `VendorStatus` are backed by enums.
- Existing Laravel web controllers and auth routes can provide validation and workflow precedent, but web redirects/forms are not API contracts. Use JSON API responses for Vue.
- `project_files/database_design_documentation.md`, SQL/DBML files, route notes, bundled templates, and mock UI data include conceptual or imported material. Do not treat those as implemented tables, routes, or product requirements without verifying migrations and application code.

## Repository-specific implementation plan

Follow these phases in order, updating this plan when current code or user requirements differ:

1. **Re-check the live baseline.** Inspect `git status`, relevant diffs, current routes, migrations, models, API controllers, Vue router/views/interfaces/services, and focused tests. Preserve unrelated and pre-existing edits; never overwrite or revert them. Confirm the request's page coverage from the current sidebar and router.
2. **Resolve API authentication before wiring admin data.** The current backend routes are public, while the web admin uses session auth and `role_id:1`; Sanctum is installed, but the Vue app has no login/session flow and its API base URL is hardcoded. Confirm the intended SPA authentication and local/prod origin strategy. Then protect all admin endpoints consistently, enforce admin authorization server-side, configure CSRF/CORS/base URL as needed, and return JSON 401/403 responses. Do not expose admin CRUD as public endpoints or rely on Vue route hiding for authorization.
3. **Define stable API contracts and shared client behavior.** Use the project's Laravel JSON conventions and existing pagination shape unless a deliberate migration is agreed. Define TypeScript interfaces for real response payloads, centralized endpoint methods in `vue-frontend/src/services/api.ts` (or its existing service pattern), configurable base URL, query parameters, multipart uploads, and visible loading/validation/error states. Ensure pagination, filters, and sort/search parameters are server-driven rather than only filtering the current page.
4. **Complete persisted catalog and marketplace resources.** Implement and test product CRUD, image upload through the existing Spatie media collections, status filtering and moderation actions; vendor CRUD/status and detail data; category and brand CRUD and category icon upload. Validate foreign keys, unique slugs, numeric ranges, enum values, and uploaded files. Reuse existing enums, relationships, and conventions instead of duplicating them.
5. **Connect sales and people workflows.** Add authenticated admin APIs for orders/order details/status changes, order status lookup/management, staff users and roles, profile read/update, and customer listing/metrics where the current data supports them. Apply explicit validation and authorization, never serialize credentials, and use transactions for multi-record writes. The current schema has guest and nullable `user_id` order fields but no dedicated customer, audit-log, or permission tables; define customer identity and safe role-management behavior from existing data before implementing.
6. **Connect metrics and identify unsupported persistence.** Replace mock dashboard and report numbers with aggregates from the existing orders, order items, products, and vendors, with documented date/status definitions and bounded queries. Current migrations have no commission ledger/payout state or marketplace-settings table; `OrderStatus` stores only a name, and `Role` has no permission relations. Commission totals may be computed from existing sales and current vendor rates, but “mark paid,” durable settings, status descriptions, and editable permissions require a persistence design. Do not fake successful writes or silently add schema: explain the gap and ask the user to approve the minimal data model/migrations before implementing those behaviors.
7. **Wire every implemented endpoint to its Vue surface.** Cover dashboard, product list/create/detail/edit/moderation, vendor list/create/detail/edit/status, categories, brands, orders/list/detail/statuses, commissions, reports, customers, staff users, roles, marketplace settings, and profile. Replace demo arrays, fixed counters, and demo-only action handlers only when a real endpoint or explicitly agreed read-only state exists. Keep navigation, tables, forms, and user feedback consistent; render empty, loading, validation, authorization, and server-error states.
8. **Verify end to end.** Add focused Pest feature tests for route protection, response shapes, filtering/pagination, validation, CRUD, media handling, and key status transitions. Add tests for every new Vue service or behavior where the repository has a test convention. Run focused Laravel tests and `vue-frontend` type-check/build (`npm run build`); escalate to broader suites only when the focused checks require it. Report any blocked feature and the exact missing decision/data.

## Page-to-API coverage checklist

Use the existing Vue pages as the acceptance inventory; do not omit a page because it currently has demo data.

| Vue area | Back-end/API coverage to implement or verify |
|---|---|
| Dashboard | Summary cards and chart series from real records; avoid hardcoded metrics. |
| Products: list, create, detail, pending moderation | List/detail/create/update/delete, filters/search/pagination, image upload, approve/reject/status transition. |
| Vendors: list, create, detail | List/detail/create/update, owner lookup, status/suspend/reactivate, logo upload, supported product/order metrics. |
| Categories and brands | List/detail as needed, create/update/delete, product counts, category icon upload. |
| Orders: list, detail, statuses | Paginated/filterable list, full detail and items/customer/shipping/amounts, status lookup and validated update. |
| Commissions | Calculate only from supported persisted sales/rates; payout history and “mark paid” require an approved ledger. |
| Reports | Filtered sales/order/commission aggregates with explicit definitions and date ranges. |
| Customers | Define whether the view represents registered users, guest buyers, or deduplicated order contacts; use only fields that exist. |
| Staff users and roles | Admin-only user/role endpoints; validate assignments and protect the final/admin account; permissions are unsupported by the current schema. |
| Marketplace settings | Requires an approved persistent configuration source; do not present unsaved or hardcoded values as persisted. |
| Profile | Read/update authenticated user profile and supported media; protect account/password fields. |

## Engineering constraints

- Read files and diffs before editing. Touch only files required by the agreed API/UI scope and preserve all pre-existing worktree changes.
- Keep authorization, ownership checks, validation, and status-transition rules on the server. Use Laravel form requests/policies or established project patterns where appropriate.
- Use Eloquent relationships and eager loading to avoid N+1 queries. Keep list endpoints paginated and avoid returning unneeded or sensitive model fields.
- Make response shapes, errors, and status codes explicit and consistent. Do not swallow exceptions, return fake success, or silently default invalid data.
- For writes involving related records, use transactions and validate referenced records. Keep frontend types aligned with the actual JSON payload, including Laravel paginator metadata.
- Reuse existing media collections (`product_image`, `shop_logo`, `category_icon`) and their accepted types; do not bypass media-library behavior.
- Do not add a new package or alter dependencies unless the implementation requires it and the manifest change is justified.
- Do not expand into the storefront API, imported template assets, or conceptual schema beyond the requested admin UI.

## Completion report

At completion, summarize: API routes and Vue sections covered; persistence or authentication decisions made; tests/build commands and results; and any remaining feature blocked by missing schema or product decisions.

## Scoped task completion

Persisted-resource list views and confirmed delete actions have been added to the Vue admin for products, moderation queue, vendors, categories, brands, orders, order statuses, staff users, customers, and roles. Their API list/delete routes and backend handlers are in place; delete routes enforce admin authentication and reject deletion of records still referenced by related data. Commission entries remain read-only because the project has no commission ledger.
