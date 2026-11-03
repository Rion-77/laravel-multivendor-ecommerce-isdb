<script setup lang="ts">
import { ref } from "vue";
import { api } from "../../services/api";
import type { AdminOrderStatus } from "../../interfaces/OrderStatus";
import type { PageLink, Paginated } from "../../interfaces/Pagination";
import { formatStatus, statusBadgeClass } from "../../utils/formatters";
import ConfirmDeleteModal from "../../components/ConfirmDeleteModal.vue";
import ListPagination from "../../components/ListPagination.vue";
import { useListDeletion } from "../../composables/useListDeletion";

const statuses = ref<AdminOrderStatus[]>([]);
const pageLinks = ref<PageLink[]>([]);
const loadError = ref("");
const { selected, deleting, error: deleteError, requestDelete, cancelDelete, confirmDelete } =
  useListDeletion("order-statuses", statuses);

function getStatuses(url = "order-statuses") {
  api.get<{ statuses: Paginated<AdminOrderStatus> }>(url)
    .then((response) => {
      statuses.value = response.data.statuses.data;
      pageLinks.value = response.data.statuses.links;
      loadError.value = "";
    })
    .catch((error: unknown) => {
      console.error("Failed to load order statuses.", error);
      loadError.value = "Unable to load order statuses. Please try again.";
    });
}

getStatuses();
</script>

<template>
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex flex-wrap justify-content-between align-items-center py-3 mb-3 gap-2">
      <h4 class="fw-bold mb-0"><span class="text-muted fw-light">Sales / </span>Order Statuses</h4>
    </div>
    <div class="alert alert-info" role="alert"><i class="bx bx-info-circle me-2"></i>Order statuses define the order lifecycle shown to customers and staff.</div>
    <div class="card">
      <div class="table-responsive">
        <table class="table table-hover mv-table">
          <thead class="table-light"><tr><th>Status</th><th>Orders</th><th>Actions</th></tr></thead>
          <tbody>
            <tr v-for="status in statuses" :key="status.id">
              <td><span class="badge" :class="statusBadgeClass(status.name.toLowerCase())">{{ formatStatus(status.name) }}</span></td>
              <td>{{ status.orders_count }}</td>
              <td><button class="btn btn-sm btn-icon btn-outline-danger" type="button" :aria-label="`Delete ${status.name}`" @click="requestDelete(status.id, status.name)"><i class="bx bx-trash"></i></button></td>
            </tr>
          </tbody>
        </table>
        <div v-if="loadError" class="alert alert-danger m-3" role="alert">{{ loadError }}</div>
        <div v-else-if="statuses.length === 0" class="alert alert-light m-3" role="status">No order statuses found.</div>
        <div class="d-flex justify-content-end p-3"><ListPagination :links="pageLinks" @navigate="getStatuses" /></div>
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
