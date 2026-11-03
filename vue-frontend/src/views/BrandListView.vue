<script setup lang="ts">
import { ref } from "vue";
import type { Brand } from "../interfaces/Brand";
import type { PageLink, Paginated } from "../interfaces/Pagination";
import { api } from "../services/api";
import ConfirmDeleteModal from "../components/ConfirmDeleteModal.vue";
import ListPagination from "../components/ListPagination.vue";
import { useListDeletion } from "../composables/useListDeletion";

const brands = ref<Brand[]>([]);
const loadError = ref("");
const pageLinks = ref<PageLink[]>([]);
const { selected, deleting, error: deleteError, requestDelete, cancelDelete, confirmDelete } =
  useListDeletion("brands", brands);

function getAllBrands(url: string) {
  api.get<{ brands: Paginated<Brand> }>(url)
    .then((response) => {
      brands.value = response.data.brands.data;
      pageLinks.value = response.data.brands.links;
      loadError.value = "";
    })
    .catch((error: unknown) => {
      console.error("Failed to load brands.", error);
      loadError.value = "Unable to load brands. Please try again.";
    });
}

getAllBrands("brands");
</script>

<template>
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex flex-wrap justify-content-between align-items-center py-3 mb-3 gap-2">
      <h4 class="fw-bold mb-0"><span class="text-muted fw-light">Catalog / </span>Brands</h4>
      <button class="btn btn-primary" type="button" data-mv-toast="Brand form opened (demo).">
        <i class="bx bx-plus me-1"></i>Add brand
      </button>
    </div>
    <div class="card" data-mv-table>
      <div class="mv-table-toolbar">
        <input class="form-control mv-search" type="search" placeholder="Search brands..." data-mv-search />
      </div>
      <div class="table-responsive">
        <table class="table table-hover mv-table">
          <thead class="table-light">
            <tr><th>Brand</th><th>Products</th><th>Actions</th></tr>
          </thead>
          <tbody>
            <tr v-for="brand in brands" :key="brand.id">
              <td class="fw-semibold">{{ brand.name }}</td>
              <td>{{ brand.products_count }}</td>
              <td>
                <div class="d-flex gap-1">
                  <button class="btn btn-sm btn-icon btn-outline-primary" type="button" :aria-label="`Edit ${brand.name}`"><i class="bx bx-edit-alt"></i></button>
                  <button class="btn btn-sm btn-icon btn-outline-danger" type="button" :aria-label="`Delete ${brand.name}`" @click="requestDelete(brand.id, brand.name)"><i class="bx bx-trash"></i></button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
        <div v-if="loadError" class="alert alert-danger m-3" role="alert">{{ loadError }}</div>
        <div v-else-if="brands.length === 0" class="alert alert-light m-3" role="status">No brands found.</div>
        <div class="d-flex justify-content-end p-3"><ListPagination :links="pageLinks" @navigate="getAllBrands" /></div>
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
