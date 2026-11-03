import { createRouter, createWebHistory } from "vue-router";
import DashboardView from "../views/DashboardView.vue";
import ProductListView from "../views/products/ProductListView.vue";
import ProductCreateView from "../views/products/ProductCreateView.vue";
import ProductPendingView from "../views/products/ProductPendingView.vue";
import VendorListView from "../views/vendors/VendorListView.vue";
import VendorCreateView from "../views/vendors/VendorCreateView.vue";
import VendorDetailView from "../views/vendors/VendorDetailView.vue";
import BrandListView from "../views/BrandListView.vue";
import CategoryListView from "../views/CategoryListView.vue";
import CustomerListView from "../views/CustomerListView.vue";
import OrderListView from "../views/orders/OrderListView.vue";
import OrderStatusListView from "../views/orders/OrderStatusListView.vue";
import OrderDetailView from "../views/orders/OrderDetailView.vue";
import ProductDetailView from "../views/products/ProductDetailView.vue";
import CommissionListView from "../views/CommissionListView.vue";
import ReportsView from "../views/ReportsView.vue";
import StaffUserListView from "../views/users/StaffUserListView.vue";
import RoleListView from "../views/users/RoleListView.vue";
import MarketplaceSettingsView from "../views/MarketplaceSettingsView.vue";
import ProfileView from "../views/ProfileView.vue";

const routes = [
    { path: "/", component: DashboardView },

    // Products
    { path: "/products", component: ProductListView },
    { path: "/products/new", component: ProductCreateView },
    { path: "/products/pending", component: ProductPendingView },
    { path: "/products/:id", component: ProductDetailView },

    // Vendors
    { path: "/vendors", component: VendorListView },
    { path: "/vendors/new", component: VendorCreateView },
    { path: "/vendors/:id", component: VendorDetailView },

    // Catalog
    { path: "/categories", component: CategoryListView },
    { path: "/brands", component: BrandListView },

    // Sales
    { path: "/orders", component: OrderListView },
    { path: "/orders/statuses", component: OrderStatusListView },
    { path: "/orders/:id", component: OrderDetailView },
    { path: "/commissions", component: CommissionListView },
    { path: "/reports", component: ReportsView },

    // People
    { path: "/customers", component: CustomerListView },
    { path: "/users", component: StaffUserListView },
    { path: "/roles", component: RoleListView },

    // System
    { path: "/settings", component: MarketplaceSettingsView },
    { path: "/profile", component: ProfileView },
];

export const router = createRouter({
    history: createWebHistory(),
    routes,
});