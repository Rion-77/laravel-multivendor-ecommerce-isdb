<script setup lang="ts">
defineProps<{
  open: boolean;
  itemName: string;
  pending: boolean;
  error: string;
}>();

const emit = defineEmits<{
  cancel: [];
  confirm: [];
}>();
</script>

<template>
  <Teleport to="body">
    <template v-if="open">
      <div class="modal-backdrop fade show"></div>
      <div
        class="modal fade show"
        style="display: block"
        tabindex="-1"
        role="dialog"
        aria-modal="true"
        aria-labelledby="confirm-delete-title"
        @click.self="emit('cancel')"
      >
        <div class="modal-dialog modal-dialog-centered modal-sm">
          <div class="modal-content">
            <div class="modal-body text-center pt-4">
              <i class="bx bx-error-circle text-warning" style="font-size: 3.5rem"></i>
              <h5 id="confirm-delete-title" class="mt-2">Delete this item?</h5>
              <p class="text-muted mb-0">Are you sure you want to delete {{ itemName }}?</p>
              <div v-if="error" class="alert alert-danger mt-3 mb-0" role="alert">{{ error }}</div>
            </div>
            <div class="modal-footer justify-content-center border-0 pb-4">
              <button type="button" class="btn btn-outline-secondary" :disabled="pending" @click="emit('cancel')">
                Cancel
              </button>
              <button type="button" class="btn btn-danger" :disabled="pending" @click="emit('confirm')">
                {{ pending ? "Deleting..." : "Delete" }}
              </button>
            </div>
          </div>
        </div>
      </div>
    </template>
  </Teleport>
</template>
