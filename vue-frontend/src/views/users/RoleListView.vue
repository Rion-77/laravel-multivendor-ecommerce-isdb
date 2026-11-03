<script setup lang="ts">
import { ref } from "vue";
import { api } from "../../services/api";
import type { AdminRole } from "../../interfaces/Role";
import type { PageLink, Paginated } from "../../interfaces/Pagination";
import ConfirmDeleteModal from "../../components/ConfirmDeleteModal.vue";
import ListPagination from "../../components/ListPagination.vue";
import { useListDeletion } from "../../composables/useListDeletion";

const roles = ref<AdminRole[]>([]);
const pageLinks = ref<PageLink[]>([]);
const loadError = ref("");
const { selected, deleting, error: deleteError, requestDelete, cancelDelete, confirmDelete } =
  useListDeletion("roles", roles);

function getRoles(url = "roles") {
  api.get<{ roles: Paginated<AdminRole> }>(url)
    .then((response) => {
      roles.value = response.data.roles.data;
      pageLinks.value = response.data.roles.links;
      loadError.value = "";
    })
    .catch((error: unknown) => {
      console.error("Failed to load roles.", error);
      loadError.value = "Unable to load roles. Please try again.";
    });
}

getRoles();
</script>

<template>
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex flex-wrap justify-content-between align-items-center py-3 mb-3 gap-2">
      <h4 class="fw-bold mb-0"><span class="text-muted fw-light">Users &amp; Roles / </span>Roles</h4>
    </div>
    <div class="card">
      <div class="table-responsive">
        <table class="table table-hover mv-table">
          <thead class="table-light"><tr><th>Role</th><th>Users</th><th>Actions</th></tr></thead>
          <tbody>
            <tr v-for="role in roles" :key="role.id">
              <td class="fw-semibold">{{ role.name }}</td>
              <td>{{ role.users_count }}</td>
              <td>
                <button class="btn btn-sm btn-icon btn-outline-danger" type="button" :aria-label="`Delete ${role.name}`" @click="requestDelete(role.id, role.name)">
                  <i class="bx bx-trash"></i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
        <div v-if="loadError" class="alert alert-danger m-3" role="alert">{{ loadError }}</div>
        <div v-else-if="roles.length === 0" class="alert alert-light m-3" role="status">No roles found.</div>
        <div class="d-flex justify-content-end p-3"><ListPagination :links="pageLinks" @navigate="getRoles" /></div>
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
