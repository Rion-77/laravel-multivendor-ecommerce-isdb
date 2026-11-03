<script setup lang="ts">

import AppSidebar from "./components/layout/AppSidebar.vue";
import AppNavbar from "./components/layout/AppNavbar.vue";
import AppFooter from "./components/layout/AppFooter.vue";


</script>

<template>
  <div class="layout-wrapper layout-content-navbar layout-menu-fixed">
    <div class="layout-container">
      <AppSidebar />

      <div class="layout-page">
        <AppNavbar />

        <div class="content-wrapper">
          <router-view />
          <AppFooter />
          <div class="content-backdrop fade"></div>
        </div>
      </div>
    </div>
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>

  <div class="modal fade" id="mvConfirmModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
      <div class="modal-content">
        <div class="modal-body text-center pt-4">
          <i class="bx bx-error-circle text-warning" style="font-size: 3.5rem"></i>
          <h5 class="mt-2">Are you sure?</h5>
          <p class="mv-confirm-text text-muted mb-0"></p>
        </div>
        <div class="modal-footer justify-content-center border-0 pb-4">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger mv-confirm-ok">Confirm</button>
        </div>
      </div>
    </div>
  </div>
</template>
