import axios from "axios";
import { ref, type Ref } from "vue";
import { api } from "../services/api";

interface Identifiable {
  id: number;
}

export function useListDeletion<T extends Identifiable>(resource: string, records: Ref<T[]>) {
  const selected = ref<{ id: number; name: string } | null>(null);
  const deleting = ref(false);
  const error = ref("");

  function requestDelete(id: number, name: string) {
    selected.value = { id, name };
    error.value = "";
  }

  function cancelDelete() {
    if (deleting.value) return;
    selected.value = null;
    error.value = "";
  }

  function confirmDelete() {
    if (!selected.value || deleting.value) return;

    deleting.value = true;
    error.value = "";
    const selectedId = selected.value.id;

    api.delete(`${resource}/${selectedId}`)
      .then(() => {
        records.value = records.value.filter((record) => record.id !== selectedId);
        selected.value = null;
      })
      .catch((requestError: unknown) => {
        console.error(`Failed to delete ${resource} item.`, requestError);
        error.value = axios.isAxiosError<{ message?: string }>(requestError)
          ? requestError.response?.data?.message ?? "Unable to delete this item. Please try again."
          : "Unable to delete this item. Please try again.";
      })
      .finally(() => {
        deleting.value = false;
      });
  }

  return { selected, deleting, error, requestDelete, cancelDelete, confirmDelete };
}
