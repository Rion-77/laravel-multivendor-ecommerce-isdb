<script setup lang="ts">
import { ref } from "vue";
import { api } from "../../services/api";
import type { AdminOrder } from "../../interfaces/Order";
import type { PageLink, Paginated } from "../../interfaces/Pagination";
import { formatDate, formatPrice, formatStatus, statusBadgeClass } from "../../utils/formatters";
import ConfirmDeleteModal from "../../components/ConfirmDeleteModal.vue";
import ListPagination from "../../components/ListPagination.vue";
import { useListDeletion } from "../../composables/useListDeletion";

const orders = ref<AdminOrder[]>([]);
const pageLinks = ref<PageLink[]>([]);
const loadError = ref("");
const { selected, deleting, error: deleteError, requestDelete, cancelDelete, confirmDelete } =
  useListDeletion("orders", orders);

function getOrders(url = "orders") {
  api.get<{ orders: Paginated<AdminOrder> }>(url)
    .then((response) => {
      orders.value = response.data.orders.data;
      pageLinks.value = response.data.orders.links;
      loadError.value = "";
    })
    .catch((error: unknown) => {
      console.error("Failed to load orders.", error);
      loadError.value = "Unable to load orders. Please try again.";
    });
}

function customerName(order: AdminOrder) {
  return order.user?.name ?? order.guest_name ?? "Guest";
}

function vendorNames(order: AdminOrder) {
  const names = new Set(
    order.order_items
      .map((item) => item.product?.vendor?.shop_name)
      .filter((name): name is string => Boolean(name)),
  );
  return names.size ? [...names].join(", ") : "—";
}

getOrders();
</script>

<template>
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex flex-wrap justify-content-between align-items-center py-3 mb-3 gap-2">
      <h4 class="fw-bold mb-0"><span class="text-muted fw-light">Sales / </span>All Orders</h4>
    </div>
    <div class="card" data-mv-table>
      <div class="mv-table-toolbar">
        <input class="form-control mv-search" type="search" placeholder="Search orders, customers, vendors..." data-mv-search />
      </div>
      <div class="table-responsive">
        <table class="table table-hover mv-table">
          <thead class="table-light">
            <tr><th>Order</th><th>Customer</th><th>Vendor(s)</th><th>Date</th><th>Total</th><th>Status</th><th>Actions</th></tr>
          </thead>
          <tbody>
            <tr v-for="order in orders" :key="order.id">
              <td><RouterLink class="fw-semibold" :to="`/orders/${order.id}`">{{ order.order_number }}</RouterLink></td>
              <td>{{ customerName(order) }}</td>
              <td>{{ vendorNames(order) }}</td>
              <td>{{ formatDate(order.created_at) }}</td>
              <td class="fw-semibold">{{ formatPrice(order.total_amount) }}</td>
              <td>
                <span class="badge" :class="statusBadgeClass(order.order_status?.name.toLowerCase() ?? '')">
                  {{ formatStatus(order.order_status?.name ?? "Unknown") }}
                </span>
              </td>
              <td>
                <div class="d-flex gap-1">
                  <RouterLink class="btn btn-sm btn-icon btn-outline-secondary" :to="`/orders/${order.id}`" :aria-label="`View ${order.order_number}`">
                    <i class="bx bx-show"></i>
                  </RouterLink>
                  <button class="btn btn-sm btn-icon btn-outline-danger" type="button" :aria-label="`Delete ${order.order_number}`" @click="requestDelete(order.id, order.order_number)">
                    <i class="bx bx-trash"></i>
                  </button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
        <div v-if="loadError" class="alert alert-danger m-3" role="alert">{{ loadError }}</div>
        <div v-else-if="orders.length === 0" class="alert alert-light m-3" role="status">No orders found.</div>
        <div class="d-flex justify-content-end p-3"><ListPagination :links="pageLinks" @navigate="getOrders" /></div>
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
