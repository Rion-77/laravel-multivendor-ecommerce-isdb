<script setup lang="ts">
import { ref } from "vue";
import type { Product } from "../../interfaces/Product";
import type { PageLink, Paginated } from "../../interfaces/Pagination";
import { api } from "../../services/api";
import { statusBadgeClass, formatPrice, formatStatus } from "../../utils/formatters";
import ConfirmDeleteModal from "../../components/ConfirmDeleteModal.vue";
import ListPagination from "../../components/ListPagination.vue";
import { useListDeletion } from "../../composables/useListDeletion";

const products = ref<Product[]>([]);
const loadError = ref("");
const pageLinks = ref<PageLink[]>([]);
const { selected, deleting, error: deleteError, requestDelete, cancelDelete, confirmDelete } =
  useListDeletion("products", products);

// Get Products
function getAllProducts(url: string) {
  api.get<{ products: Paginated<Product> }>(url)
    .then((response) => {
      products.value = response.data.products.data;
      pageLinks.value = response.data.products.links;
      loadError.value = "";
    })
    .catch((error: unknown) => {
      console.error("Failed to load products.", error);
      loadError.value = "Unable to load products. Please try again.";
    });
}

getAllProducts("products");
</script>

<template>
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex flex-wrap justify-content-between align-items-center py-3 mb-3 gap-2">
      <div>
        <h4 class="fw-bold mb-0"><span class="text-muted fw-light">Products / </span>All Products</h4>
      </div>
      <div class="d-flex gap-2 flex-wrap">
        <RouterLink to="/products/new" class="btn btn-primary"><i class="bx bx-plus me-1"></i>Add product</RouterLink>
      </div>
    </div>
    <div class="row g-3 mb-4">
      <div class="col-6 col-md-4 col-xl-2">
        <div class="card">
          <div class="card-body py-3">
            <div class="d-flex justify-content-between align-items-center">
              <span class="text-muted small">Active</span><span class="badge bg-label-success">12</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 col-md-4 col-xl-2">
        <div class="card">
          <div class="card-body py-3">
            <div class="d-flex justify-content-between align-items-center">
              <span class="text-muted small">Pending review</span><span class="badge bg-label-warning">3</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 col-md-4 col-xl-2">
        <div class="card">
          <div class="card-body py-3">
            <div class="d-flex justify-content-between align-items-center">
              <span class="text-muted small">Draft</span><span class="badge bg-label-secondary">3</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 col-md-4 col-xl-2">
        <div class="card">
          <div class="card-body py-3">
            <div class="d-flex justify-content-between align-items-center">
              <span class="text-muted small">Inactive</span><span class="badge bg-label-dark">2</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 col-md-4 col-xl-2">
        <div class="card">
          <div class="card-body py-3">
            <div class="d-flex justify-content-between align-items-center">
              <span class="text-muted small">Out of stock</span><span class="badge bg-label-info">2</span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-6 col-md-4 col-xl-2">
        <div class="card">
          <div class="card-body py-3">
            <div class="d-flex justify-content-between align-items-center">
              <span class="text-muted small">Rejected</span><span class="badge bg-label-danger">4</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card" data-mv-table>
      <div class="mv-table-toolbar">
        <input
          type="search"
          class="form-control mv-search"
          placeholder="Search products, brands, vendors..."
          data-mv-search
        />
        <select class="form-select" data-mv-filter="status">
          <option value="">All statuses</option>
          <option value="active">Active</option>
          <option value="pending_review">Pending review</option>
          <option value="rejected">Rejected</option>
          <option value="draft">Draft</option>
          <option value="inactive">Inactive</option>
          <option value="out_of_stock">Out of stock</option>
          <option value="suspended">Suspended</option></select
        ><select class="form-select" data-mv-filter="vendor">
          <option value="">All vendors</option>
          <option value="1">Urban Threads</option>
          <option value="2">Gadget Hub</option>
          <option value="3">Fresh Basket</option>
          <option value="4">Home Nest</option>
          <option value="5">Daily Mart</option>
          <option value="6">Book Nook</option></select
        ><select class="form-select" data-mv-filter="category">
          <option value="">All categories</option>
          <option value="1">Fashion</option>
          <option value="2">Footwear</option>
          <option value="3">Electronics</option>
          <option value="4">Home &amp; Kitchen</option>
          <option value="5">Grocery</option>
          <option value="6">Beauty &amp; Health</option>
          <option value="7">Books &amp; Stationery</option>
          <option value="8">Sports &amp; Fitness</option>
        </select>
        <!-- <div class="ms-auto d-flex gap-2 align-items-center">
          <a href="#" class="btn btn-outline-secondary" data-mv-toast="Export started (demo)."
            ><i class="bx bx-download me-1"></i>Export</a
          >
        </div> -->
      </div>

      <!-- Product Table -->
      <div class="table-responsive text-nowrap">
        <table class="table table-hover mv-table">
          <thead class="table-light">
            <tr>
              <!-- <th style="width: 36px"><input type="checkbox" class="form-check-input" data-mv-checkall /></th> -->
              <th>Product</th>
              <!-- <th>Vendor</th> -->
              <th>Category</th>
              <th>Brand</th>
              <th>Price</th>
              <th>Status</th>
              <!-- <th>Added</th> -->
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            <tr
              v-for="product in products"
              :key="product.id"
              :data-status="product.status"
              :data-vendor="product.vendor_id"
              :data-category="product.category_id"
            >
              <!-- <td><input type="checkbox" class="form-check-input" /></td> -->
              <td>
                <div class="d-flex align-items-center">
                  <img
                    v-if="product.thumbnail_url || product.image_url"
                    class="mv-thumb"
                    :src="product.thumbnail_url || product.image_url"
                    :alt="product.name"
                    style="object-fit: cover"
                  />
                  <span v-else class="mv-thumb bg-label-primary"><i class="bx bx-package"></i></span>
                  <div class="ms-3 mv-wrap" style="min-width: 230px">
                    <a :href="`/products/${product.id}`" class="mv-name d-block">{{ product.name }}</a>
                    <span class="mv-sub">{{ product.vendor.shop_name }}</span>
                  </div>
                </div>
              </td>
              <td>{{ product.category.name }}</td>
              <td>{{ product.brand.name }}</td>
              <td>
                <span class="fw-semibold">{{ formatPrice(product.offer_price || product.base_price) }}</span>
                <span
                  v-if="product.offer_price && product.base_price && product.offer_price !== product.base_price"
                  class="mv-price-old"
                >
                  {{ formatPrice(product.base_price) }}
                </span>
              </td>
              <td>
                <span class="badge" :class="statusBadgeClass(product.status)">{{ formatStatus(product.status) }}</span>
              </td>
              <td>
                <div class="mv-actions d-flex gap-1">
                  <RouterLink
                    class="btn btn-sm btn-icon btn-outline-secondary"
                    :to="`/products/${product.id}`"
                    data-bs-toggle="tooltip"
                    title="View"
                    ><i class="bx bx-show"></i>
                  </RouterLink>
                  <a
                    class="btn btn-sm btn-icon btn-outline-primary"
                    href="/products/new"
                    data-bs-toggle="tooltip"
                    title="Edit"
                  ><i class="bx bx-edit-alt"></i></a>
                  <button
                    class="btn btn-sm btn-icon btn-outline-danger"
                    :aria-label="`Delete ${product.name}`"
                    data-bs-toggle="tooltip"
                    title="Delete"
                    @click="requestDelete(product.id, product.name)"
                  >
                    <i class="bx bx-trash"></i>
                  </button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
        <div v-if="loadError" class="alert alert-danger m-3" role="alert">{{ loadError }}</div>
        <div v-else-if="products.length === 0" class="mv-empty">
          <i class="bx bx-search-alt fs-1 d-block mb-2"></i>No products found
        </div>
      </div>
      <div class="mv-table-footer d-flex justify-content-end">
        <ListPagination :links="pageLinks" @navigate="getAllProducts" />
      </div>
    </div>
  </div>
  <ConfirmDeleteModal
    :open="Boolean(selected)"
    :item-name="selected?.name ?? ''"
    :pending="deleting"
    :error="deleteError"
    @cancel="cancelDelete"
    @confirm="confirmDelete"
  />
</template>
