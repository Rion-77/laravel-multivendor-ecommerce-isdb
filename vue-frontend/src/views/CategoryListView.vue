<script setup lang="ts">
import { ref } from "vue";
import type { Category } from "../interfaces/Category";
import type { PageLink, Paginated } from "../interfaces/Pagination";
import { api } from "../services/api";
import ConfirmDeleteModal from "../components/ConfirmDeleteModal.vue";
import ListPagination from "../components/ListPagination.vue";
import { useListDeletion } from "../composables/useListDeletion";

const categories = ref<Category[]>([]);
const loadError = ref("");
const pageLinks = ref<PageLink[]>([]);
const { selected, deleting, error: deleteError, requestDelete, cancelDelete, confirmDelete } =
  useListDeletion("categories", categories);

function getAllCategories(url: string) {
  api.get<{ categories: Paginated<Category> }>(url)
    .then((response) => {
      categories.value = response.data.categories.data;
      pageLinks.value = response.data.categories.links;
      loadError.value = "";
    })
    .catch((error: unknown) => {
      console.error("Failed to load categories.", error);
      loadError.value = "Unable to load categories. Please try again.";
    });
}

getAllCategories("categories");
</script>

<template>
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex flex-wrap justify-content-between align-items-center py-3 mb-3 gap-2">
      <h4 class="fw-bold mb-0"><span class="text-muted fw-light">Catalog / </span>Categories</h4>
      <button class="btn btn-primary" type="button" data-mv-toast="Category form opened (demo).">
        <i class="bx bx-plus me-1"></i>Add category
      </button>
    </div>
    <div class="card" data-mv-table>
      <div class="mv-table-toolbar">
        <input class="form-control mv-search" type="search" placeholder="Search categories..." data-mv-search />
      </div>
      <div class="table-responsive">
        <table class="table table-hover mv-table">
          <thead class="table-light"><tr><th>Category</th><th>Products</th><th>Actions</th></tr></thead>
          <tbody>
            <tr v-for="category in categories" :key="category.id">
              <td>
                <div class="d-flex align-items-center gap-3">
                  <img
                    v-if="category.icon_url"
                    class="mv-thumb"
                    :src="category.icon_url"
                    :alt="category.name"
                    style="object-fit: cover"
                  />
                  <span v-else class="mv-thumb bg-label-primary"><i class="bx bx-category"></i></span>
                  <span class="fw-semibold">{{ category.name }}</span>
                </div>
              </td>
              <td>{{ category.products_count }}</td>
              <td>
                <div class="d-flex gap-1">
                  <button class="btn btn-sm btn-icon btn-outline-primary" type="button" :aria-label="`Edit ${category.name}`"><i class="bx bx-edit-alt"></i></button>
                  <button class="btn btn-sm btn-icon btn-outline-danger" type="button" :aria-label="`Delete ${category.name}`" @click="requestDelete(category.id, category.name)"><i class="bx bx-trash"></i></button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
        <div v-if="loadError" class="alert alert-danger m-3" role="alert">{{ loadError }}</div>
        <div v-else-if="categories.length === 0" class="alert alert-light m-3" role="status">No categories found.</div>
        <div class="d-flex justify-content-end p-3"><ListPagination :links="pageLinks" @navigate="getAllCategories" /></div>
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
