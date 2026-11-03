<script setup lang="ts">
import { ref } from "vue";
import type { Product } from "../../interfaces/Product";
import type { PageLink, Paginated } from "../../interfaces/Pagination";
import { api } from "../../services/api";
import { formatDate, formatPrice, formatStatus, statusBadgeClass } from "../../utils/formatters";
import ConfirmDeleteModal from "../../components/ConfirmDeleteModal.vue";
import ListPagination from "../../components/ListPagination.vue";
import { useListDeletion } from "../../composables/useListDeletion";

type QueueStatus = "pending_review" | "rejected";

const products = ref<Product[]>([]);
const pageLinks = ref<PageLink[]>([]);
const currentStatus = ref<QueueStatus>("pending_review");
const loadError = ref("");
const { selected, deleting, error: deleteError, requestDelete, cancelDelete, confirmDelete } =
  useListDeletion("products", products);

function getProducts(status: QueueStatus, url = "products") {
  currentStatus.value = status;
  const request = url === "products"
    ? api.get<{ products: Paginated<Product> }>(url, { params: { "filter[status]": status } })
    : api.get<{ products: Paginated<Product> }>(url);

  request
    .then((response) => {
      products.value = response.data.products.data;
      pageLinks.value = response.data.products.links;
      loadError.value = "";
    })
    .catch((error: unknown) => {
      console.error("Failed to load product moderation list.", error);
      loadError.value = "Unable to load products. Please try again.";
    });
}

getProducts(currentStatus.value);
</script>

<template>
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex flex-wrap justify-content-between align-items-center py-3 mb-3 gap-2">
      <h4 class="fw-bold mb-0"><span class="text-muted fw-light">Products / </span>Moderation Queue</h4>
    </div>
    <ul class="nav nav-pills mb-3" role="tablist">
      <li class="nav-item">
        <button class="nav-link" :class="{ active: currentStatus === 'pending_review' }" type="button" @click="getProducts('pending_review')">
          Pending review
        </button>
      </li>
      <li class="nav-item">
        <button class="nav-link" :class="{ active: currentStatus === 'rejected' }" type="button" @click="getProducts('rejected')">
          Rejected
        </button>
      </li>
    </ul>
    <div class="card">
      <div class="table-responsive">
        <table class="table table-hover mv-table">
          <thead class="table-light">
            <tr><th>Product</th><th>Vendor</th><th>Category</th><th>Price</th><th>Status</th><th>Submitted</th><th>Action</th></tr>
          </thead>
          <tbody>
            <tr v-for="product in products" :key="product.id">
              <td>
                <div class="d-flex align-items-center">
                  <img v-if="product.thumbnail_url || product.image_url" class="mv-thumb" :src="product.thumbnail_url || product.image_url" :alt="product.name" />
                  <span v-else class="mv-thumb bg-label-primary"><i class="bx bx-package"></i></span>
                  <div class="ms-3 mv-wrap"><RouterLink :to="`/products/${product.id}`" class="mv-name d-block">{{ product.name }}</RouterLink><span class="mv-sub">{{ product.description }}</span></div>
                </div>
              </td>
              <td>{{ product.vendor?.shop_name ?? "—" }}</td>
              <td>{{ product.category?.name ?? "—" }}</td>
              <td class="fw-semibold">{{ formatPrice(product.offer_price || product.base_price) }}</td>
              <td><span class="badge" :class="statusBadgeClass(product.status)">{{ formatStatus(product.status) }}</span></td>
              <td>{{ formatDate(product.created_at) }}</td>
              <td>
                <button class="btn btn-sm btn-icon btn-outline-danger" type="button" :aria-label="`Delete ${product.name}`" @click="requestDelete(product.id, product.name)">
                  <i class="bx bx-trash"></i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
        <div v-if="loadError" class="alert alert-danger m-3" role="alert">{{ loadError }}</div>
        <div v-else-if="products.length === 0" class="alert alert-light m-3" role="status">No {{ formatStatus(currentStatus).toLowerCase() }} products found.</div>
        <div class="d-flex justify-content-end p-3"><ListPagination :links="pageLinks" @navigate="(url) => getProducts(currentStatus, url)" /></div>
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
