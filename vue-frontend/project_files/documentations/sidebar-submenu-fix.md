# Sidebar submenu stays open after navigation

## What was happening

The sidebar uses the Sneat menu script to open and close submenu parents. That script changes the parent `<li>` by adding or removing its `open` class directly in the DOM.

When a child submenu link is clicked, Vue Router changes the current route. `SidebarMenuParent` then reevaluates its class binding. Before the fix, the component only bound `active`, so Vue could render the parent without the script-added `open` class. The submenu consequently appeared closed after navigation.

## Changes, step by step

### 1. Match the current route against the parent route

In `src/components/sidebar/SidebarMenuParent.vue`, `parentUrl` previously accepted a single string. The component marked the parent active when the current path started with that string:

```vue
<script setup lang="ts">
import { useRoute } from 'vue-router';

const route = useRoute();

defineProps<{
  label: string;
  iconClasses: string;
  parentUrl: string;
}>();
</script>
```

```vue
<li class="menu-item" :class="{ active: route.path.startsWith(`${parentUrl}`) }">
```

The component now accepts one route prefix or an array of prefixes, and computes whether any prefix matches:

```vue
<script setup lang="ts">
import { computed } from 'vue';
import { useRoute } from 'vue-router';

const route = useRoute();

const props = defineProps<{
  label: string;
  iconClasses: string;
  parentUrl: string | string[];
}>();

const isActive = computed(() => {
  const parentUrls = Array.isArray(props.parentUrl) ? props.parentUrl : [props.parentUrl];
  return parentUrls.some((parentUrl) => route.path.startsWith(parentUrl));
});
</script>
```

### 2. Bind the open state to the active route

Previously, `active` was the only class bound by Vue:

```vue
<li class="menu-item" :class="{ active: route.path.startsWith(`${parentUrl}`) }">
```

The parent now binds both `active` and `open` to the computed route match:

```vue
<li class="menu-item" :class="{ active: isActive, open: isActive }">
```

Because `open` is now part of Vue's render state, it remains present when a child link changes the route and Vue updates the component. The submenu stays expanded for routes belonging to that parent.

### 3. Include all child routes for Users & Roles

In `src/components/layout/AppSidebar.vue`, Users & Roles previously matched only `/users`:

```vue
<SidebarMenuParent parent-url="/users" label="Users &amp; Roles" icon-classes="tf-icons bx bx-shield-quarter">
```

The Roles page is under `/roles`, so its parent also needs to recognize that route. `parentUrl` now receives both child route prefixes:

```vue
<SidebarMenuParent :parent-url="['/users', '/roles']" label="Users &amp; Roles" icon-classes="tf-icons bx bx-shield-quarter">
```

This keeps the Users & Roles parent expanded on both Staff Users and Roles & Permissions.

## Result

- Clicking a submenu child changes the page without collapsing its parent.
- The appropriate submenu parent opens automatically for its active route.
- Users & Roles stays open for either `/users` or `/roles`.
- Other single-prefix parents, such as Vendors, Products, and Orders, keep using their existing `parent-url` values.
