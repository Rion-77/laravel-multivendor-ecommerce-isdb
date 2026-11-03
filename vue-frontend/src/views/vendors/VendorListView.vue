<script setup lang="ts">
import { computed, ref } from "vue";
import type { Vendor } from "../../interfaces/Vendor";
import { api } from "../../services/api";
import { formatStatus, statusBadgeClass } from "../../utils/formatters";
import type { PageLink, Paginated } from "../../interfaces/Pagination";
import ConfirmDeleteModal from "../../components/ConfirmDeleteModal.vue";
import ListPagination from "../../components/ListPagination.vue";
import { useListDeletion } from "../../composables/useListDeletion";

const vendors = ref<Vendor[]>([]);
const loadError = ref("");
const pageLinks = ref<PageLink[]>([]);
const { selected, deleting, error: deleteError, requestDelete, cancelDelete, confirmDelete } =
  useListDeletion("vendors", vendors);

const activeVendors = computed(() => vendors.value.filter((vendor) => vendor.status === "active").length);
const inactiveVendors = computed(() => vendors.value.filter((vendor) => vendor.status === "inactive").length);
const suspendedVendors = computed(() => vendors.value.filter((vendor) => vendor.status === "suspended").length);
const averageCommission = computed(() => {
  if (!vendors.value.length) return 0;
  return vendors.value.reduce((total, vendor) => total + Number(vendor.commission_rate), 0) / vendors.value.length;
});

function getAllVendors(url: string) {
  api.get<{ vendors: Paginated<Vendor> }>(url)
    .then((response) => {
      vendors.value = response.data.vendors.data;
      pageLinks.value = response.data.vendors.links;
      loadError.value = "";
    })
    .catch((error: unknown) => {
      console.error("Failed to load vendors.", error);
      loadError.value = "Unable to load vendors. Please try again.";
    });
}

getAllVendors("vendors");
</script>

<template>
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex flex-wrap justify-content-between align-items-center py-3 mb-3 gap-2">
      <div>
        <h4 class="fw-bold mb-0"><span class="text-muted fw-light">Vendors / </span>All Vendors</h4>
      </div>
      <div class="d-flex gap-2 flex-wrap">
        <RouterLink to="/vendors/new" class="btn btn-primary"><i class="bx bx-plus me-1"></i>Add vendor</RouterLink>
      </div>
    </div>
    <div class="row g-4 mb-4">
      <div class="col-sm-6 col-xl-3">
        <div class="card mv-kpi h-100">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-start">
              <div><span class="text-muted d-block mb-1">Active vendors</span><h3>{{ activeVendors }}</h3></div>
              <div class="mv-kpi-icon bg-label-success"><i class="bx bx-check-circle"></i></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-3">
        <div class="card mv-kpi h-100">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-start">
              <div><span class="text-muted d-block mb-1">Inactive</span><h3>{{ inactiveVendors }}</h3></div>
              <div class="mv-kpi-icon bg-label-secondary"><i class="bx bx-pause-circle"></i></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-3">
        <div class="card mv-kpi h-100">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-start">
              <div><span class="text-muted d-block mb-1">Suspended</span><h3>{{ suspendedVendors }}</h3></div>
              <div class="mv-kpi-icon bg-label-danger"><i class="bx bx-block"></i></div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-xl-3">
        <div class="card mv-kpi h-100">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-start">
              <div><span class="text-muted d-block mb-1">Avg. commission</span><h3>{{ averageCommission.toFixed(1) }}%</h3></div>
              <div class="mv-kpi-icon bg-label-primary"><i class="bx bx-wallet"></i></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card" data-mv-table>
      <div class="mv-table-toolbar">
        <input type="search" class="form-control mv-search" placeholder="Search vendors..." data-mv-search />
        <select class="form-select" data-mv-filter="status">
          <option value="">All statuses</option>
          <option value="active">Active</option>
          <option value="inactive">Inactive</option>
          <option value="suspended">Suspended</option>
        </select>
      </div>
      <div class="table-responsive text-nowrap">
        <table class="table table-hover mv-table">
          <thead class="table-light">
            <tr><th>Shop</th><th>Products</th><th>Commission</th><th>Status</th><th>Actions</th></tr>
          </thead>
          <tbody class="table-border-bottom-0">
            <tr v-for="vendor in vendors" :key="vendor.id" :data-status="vendor.status">
              <td>
                <div class="d-flex align-items-center">
                  <div class="avatar avatar-md">
                    <img v-if="vendor.logo_url" :src="vendor.logo_url" :alt="vendor.shop_name" class="rounded-circle w-100 h-100" />
                    <span v-else class="avatar-initial rounded-circle bg-label-primary">{{ vendor.shop_name.slice(0, 2).toUpperCase() }}</span>
                  </div>
                  <div class="ms-3">
                    <RouterLink :to="`/vendors/${vendor.id}`" class="mv-name d-block">{{ vendor.shop_name }}</RouterLink>
                    <span class="mv-sub">/{{ vendor.slug }}</span>
                  </div>
                </div>
              </td>
              <td>{{ vendor.products_count }}</td>
              <td>{{ vendor.commission_rate }}%</td>
              <td><span class="badge" :class="statusBadgeClass(vendor.status)">{{ formatStatus(vendor.status) }}</span></td>
              <td>
                <div class="mv-actions d-flex gap-1">
                  <RouterLink
                    class="btn btn-sm btn-icon btn-outline-secondary"
                    :to="`/vendors/${vendor.id}`"
                    data-bs-toggle="tooltip"
                    title="View"
                  ><i class="bx bx-show"></i></RouterLink>
                  <RouterLink
                    class="btn btn-sm btn-icon btn-outline-primary"
                    to="/vendors/new"
                    data-bs-toggle="tooltip"
                    title="Edit"
                  ><i class="bx bx-edit-alt"></i></RouterLink>
                  <button
                    v-if="vendor.status === 'suspended'"
                    class="btn btn-sm btn-icon btn-outline-success"
                    :data-mv-toast="`${vendor.shop_name} re-activated (demo).`"
                    data-bs-toggle="tooltip"
                    title="Activate"
                  ><i class="bx bx-check-circle"></i></button>
                  <button
                    v-else
                    class="btn btn-sm btn-icon btn-outline-warning"
                    :data-mv-confirm="`Suspend ${vendor.shop_name} and hide all of their products?`"
                    data-mv-confirm-class="btn-warning"
                    data-mv-confirm-label="Suspend"
                    :data-mv-success="`${vendor.shop_name} suspended (demo).`"
                    data-bs-toggle="tooltip"
                    title="Suspend"
                  ><i class="bx bx-block"></i></button>
                  <button
                    class="btn btn-sm btn-icon btn-outline-danger"
                    :aria-label="`Delete ${vendor.shop_name}`"
                    data-bs-toggle="tooltip"
                    title="Delete"
                    @click="requestDelete(vendor.id, vendor.shop_name)"
                  ><i class="bx bx-trash"></i></button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
        <div v-if="loadError" class="alert alert-danger m-3" role="alert">{{ loadError }}</div>
        <div v-else-if="vendors.length === 0" class="alert alert-light m-3" role="status">No vendors found.</div>
        <div class="d-flex justify-content-end p-3"><ListPagination :links="pageLinks" @navigate="getAllVendors" /></div>
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
