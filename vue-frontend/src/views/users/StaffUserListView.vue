<script setup lang="ts">
import { ref } from "vue";
import { api } from "../../services/api";
import type { AdminUser } from "../../interfaces/User";
import type { PageLink, Paginated } from "../../interfaces/Pagination";
import ConfirmDeleteModal from "../../components/ConfirmDeleteModal.vue";
import ListPagination from "../../components/ListPagination.vue";
import { useListDeletion } from "../../composables/useListDeletion";

const users = ref<AdminUser[]>([]);
const pageLinks = ref<PageLink[]>([]);
const loadError = ref("");
const { selected, deleting, error: deleteError, requestDelete, cancelDelete, confirmDelete } =
  useListDeletion("users", users);

function getUsers(url = "users") {
  api.get<{ users: Paginated<AdminUser> }>(url)
    .then((response) => {
      users.value = response.data.users.data;
      pageLinks.value = response.data.users.links;
      loadError.value = "";
    })
    .catch((error: unknown) => {
      console.error("Failed to load staff users.", error);
      loadError.value = "Unable to load staff users. Please try again.";
    });
}

getUsers();
</script>

<template>
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex flex-wrap justify-content-between align-items-center py-3 mb-3 gap-2">
      <h4 class="fw-bold mb-0"><span class="text-muted fw-light">People / </span>Staff Users</h4>
    </div>
    <div class="card" data-mv-table>
      <div class="mv-table-toolbar">
        <input class="form-control mv-search" type="search" placeholder="Search staff users..." data-mv-search />
      </div>
      <div class="table-responsive">
        <table class="table table-hover mv-table">
          <thead class="table-light"><tr><th>User</th><th>Role</th><th>Actions</th></tr></thead>
          <tbody>
            <tr v-for="user in users" :key="user.id">
              <td><div class="mv-name">{{ user.name }}</div><div class="mv-sub">{{ user.email }}</div></td>
              <td>{{ user.role?.name ?? "—" }}</td>
              <td>
                <button class="btn btn-sm btn-icon btn-outline-danger" type="button" :aria-label="`Delete ${user.name}`" @click="requestDelete(user.id, user.name)">
                  <i class="bx bx-trash"></i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
        <div v-if="loadError" class="alert alert-danger m-3" role="alert">{{ loadError }}</div>
        <div v-else-if="users.length === 0" class="alert alert-light m-3" role="status">No staff users found.</div>
        <div class="d-flex justify-content-end p-3"><ListPagination :links="pageLinks" @navigate="getUsers" /></div>
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
