<script setup lang="ts">
import { ref } from "vue";
import { api } from "../services/api";
import type { AdminUser } from "../interfaces/User";
import type { PageLink, Paginated } from "../interfaces/Pagination";
import { formatDate, formatPrice } from "../utils/formatters";
import ConfirmDeleteModal from "../components/ConfirmDeleteModal.vue";
import ListPagination from "../components/ListPagination.vue";
import { useListDeletion } from "../composables/useListDeletion";

const customers = ref<AdminUser[]>([]);
const pageLinks = ref<PageLink[]>([]);
const loadError = ref("");
const { selected, deleting, error: deleteError, requestDelete, cancelDelete, confirmDelete } =
  useListDeletion("customers", customers);

function getCustomers(url = "customers") {
  api.get<{ customers: Paginated<AdminUser> }>(url)
    .then((response) => {
      customers.value = response.data.customers.data;
      pageLinks.value = response.data.customers.links;
      loadError.value = "";
    })
    .catch((error: unknown) => {
      console.error("Failed to load customers.", error);
      loadError.value = "Unable to load customers. Please try again.";
    });
}

getCustomers();
</script>

<template>
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex flex-wrap justify-content-between align-items-center py-3 mb-3 gap-2">
      <h4 class="fw-bold mb-0"><span class="text-muted fw-light">People / </span>Customers</h4>
    </div>
    <div class="card" data-mv-table>
      <div class="mv-table-toolbar">
        <input class="form-control mv-search" type="search" placeholder="Search customers..." data-mv-search />
      </div>
      <div class="table-responsive">
        <table class="table table-hover mv-table">
          <thead class="table-light"><tr><th>Customer</th><th>Orders</th><th>Total spent</th><th>Joined</th><th>Actions</th></tr></thead>
          <tbody>
            <tr v-for="customer in customers" :key="customer.id">
              <td><div class="mv-name">{{ customer.name }}</div><div class="mv-sub">{{ customer.email }}</div></td>
              <td>{{ customer.orders_count ?? 0 }}</td>
              <td class="fw-semibold">{{ formatPrice(customer.orders_sum_total_amount ?? "") }}</td>
              <td>{{ formatDate(customer.created_at) }}</td>
              <td>
                <button class="btn btn-sm btn-icon btn-outline-danger" type="button" :aria-label="`Delete ${customer.name}`" @click="requestDelete(customer.id, customer.name)">
                  <i class="bx bx-trash"></i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
        <div v-if="loadError" class="alert alert-danger m-3" role="alert">{{ loadError }}</div>
        <div v-else-if="customers.length === 0" class="alert alert-light m-3" role="status">No customers found.</div>
        <div class="d-flex justify-content-end p-3"><ListPagination :links="pageLinks" @navigate="getCustomers" /></div>
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
