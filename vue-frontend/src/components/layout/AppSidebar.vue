<script setup lang="ts">
import SidebarMenu from "../sidebar/SidebarMenu.vue";
import SidebarMenuHeader from "../sidebar/SidebarMenuHeader.vue";
import SidebarMenuParent from "../sidebar/SidebarMenuParent.vue";
import SidebarSubMenu from "../sidebar/SidebarSubMenu.vue";
</script>

<template>
  <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="dashboard.html" class="app-brand-link">
        <span class="mv-brand-logo"><i class="bx bxs-store-alt"></i></span>
        <span class="app-brand-text demo menu-text fw-bolder ms-2">Bazaarly</span>
      </a>
      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none"
        ><i class="bx bx-chevron-left bx-sm align-middle"></i
      ></a>
    </div>
    <div class="menu-inner-shadow"></div>
    <!-- 
        <RouterLink class="side-link" active-class="active" to="/"><i class="bi bi-speedometer2"></i> Dashboard</RouterLink>
            <RouterLink class="side-link" :class="{ active: route.path.startsWith('/users') }" to="/users"><i class="bi bi-people"></i> Users</RouterLink>
            <RouterLink class="side-link" :class="{ active: route.path.startsWith('/products') }" to="/products"><i class="bi bi-box"></i> Products</RouterLink>
        -->
    <ul class="menu-inner py-1">
      <!-- <li class="menu-item active">
       
        <router-link to="/" class="menu-link"
          ><i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div>Dashboard</div></router-link
        >
      </li> -->
      <!-- Dashboard -->
      <SidebarMenu to="/" label="Dashboard" icon-classes="tf-icons bx bx-home-circle" />

      <SidebarMenuHeader label="Marketplace" />

      <!-- Vendors -->
      <SidebarMenuParent parent-url="/vendors" label="Vendors" icon-classes="tf-icons bx bx-store-alt">
        <SidebarSubMenu to="/vendors" label="All Vendors" />
        <SidebarSubMenu to="/vendors/new" label="Add Vendor" />
      </SidebarMenuParent>

      <!-- Products -->
      <SidebarMenuParent parent-url="/products" label="Products" icon-classes="tf-icons bx bx-package">
        <SidebarSubMenu to="/products" label="All Products" />
        <SidebarSubMenu to="/products/pending" label="Moderation Queue">
          <div class="badge bg-danger rounded-pill ms-auto">3</div>
        </SidebarSubMenu>
        <SidebarSubMenu to="/products/new" label="Add Product" />
      </SidebarMenuParent>

      <!-- Categories -->
      <SidebarMenu to="/categories" label="Categories" icon-classes="tf-icons bx bx-category" />

      <!-- Brands -->
      <SidebarMenu to="/brands" label="Brands" icon-classes="tf-icons bx bx-purchase-tag-alt" />

      <SidebarMenuHeader label="Sales" />

      <!-- Orders -->
      <SidebarMenuParent parent-url="/orders" label="Orders" icon-classes="tf-icons bx bx-receipt">
        <SidebarSubMenu to="/orders" label="All Orders" />
        <SidebarSubMenu to="/orders/statuses" label="Order Statuses" />
      </SidebarMenuParent>

      <!-- Commissions -->
      <SidebarMenu to="/commissions" label="Commissions" icon-classes="tf-icons bx bx-wallet" />

      <!-- Reports -->
      <SidebarMenu to="/reports" label="Reports" icon-classes="tf-icons bx bx-bar-chart-alt-2" />

      <SidebarMenuHeader label="People" />

      <!-- Customers -->
      <SidebarMenu to="/customers" label="Customers" icon-classes="tf-icons bx bx-user" />

      <!-- Users & Roles -->
      <SidebarMenuParent :parent-url="['/users', '/roles']" label="Users &amp; Roles" icon-classes="tf-icons bx bx-shield-quarter">
        <SidebarSubMenu to="/users" label="Staff Users" />
        <SidebarSubMenu to="/roles" label="Roles &amp; Permissions" />
      </SidebarMenuParent>

      <SidebarMenuHeader label="System" />

      <!-- Markerplace Settings -->
      <SidebarMenu to="/settings" label="Marketplace Settings" icon-classes="tf-icons bx bx-cog" />

      <!-- My Profile -->
      <SidebarMenu to="/profile" label="My Profile" icon-classes="tf-icons bx bx-user-circle" />
    </ul>
  </aside>
</template>
