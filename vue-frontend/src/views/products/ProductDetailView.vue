<script setup lang="ts">
import { useRoute } from "vue-router";
const route = useRoute();

import { ref } from "vue";
import type { Product } from "../../interfaces/Product";
import { api } from "../../services/api";
import { statusBadgeClass, formatPrice, formatStatus } from "../../utils/formatters";

const product = ref<Product>();
const loadError = ref("");
const id = route.params.id;

// Get Products
async function getProduct(url: string) {
  api
    .get(url)
    .then((response) => {
      product.value = response.data.product;
      console.log(product);
    })
    .catch((error) => {
      console.error("Failed to load products.", error);
      loadError.value = "Unable to load products. Please try again.";
    });
}

getProduct(`products/${id}`);
</script>

<template>
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex flex-wrap justify-content-between align-items-center py-3 mb-3 gap-2">
      <h4 class="fw-bold mb-0"><span class="text-muted fw-light">Products / </span>Product details</h4>
      <div class="d-flex gap-2">
        <RouterLink class="btn btn-outline-secondary" to="/products"
          ><i class="bx bx-left-arrow-alt me-1"></i>Back to products</RouterLink
        ><RouterLink class="btn btn-primary" to="/products/new"
          ><i class="bx bx-edit-alt me-1"></i>Edit product</RouterLink
        >
      </div>
    </div>
    <div v-if="product" class="row g-4">
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="d-flex align-items-start gap-3">
              <img
                class="mv-thumb"
                :src="product.thumbnail_url || product.image_url"
                :alt="product.name"
                style="object-fit: cover"
              />
              <div>
                <h5 class="mb-1">{{ product.name }}</h5>
                <span class="text-muted">Product #{{ product.id }} · {{ product.slug }}</span>
              </div>
              <span class="badge ms-auto" :class="statusBadgeClass(product.status)">{{
                formatStatus(product.status)
              }}</span>
            </div>
            <hr />
            <h6>Description</h6>
            <p class="mb-0">{{ product.description }}</p>
          </div>
        </div>
        <div class="card">
          <div class="card-header"><h5 class="mb-0">Product images</h5></div>
          <div class="card-body"><img class="img-fluid" :src="product.image_url" :alt="product.name" /></div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-header"><h5 class="mb-0">Pricing & inventory</h5></div>
          <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
              <span class="text-muted">Base price</span><span>{{ formatPrice(product.base_price) }}</span>
            </div>
            <div class="d-flex justify-content-between">
              <span class="text-muted">Offer price</span><strong>{{ formatPrice(product.offer_price) }}</strong>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header"><h5 class="mb-0">Product information</h5></div>
          <div class="card-body">
            <div class="mb-3">
              <small class="text-muted d-block">Vendor</small
              ><RouterLink :to="`/vendors/${product.vendor_id}`">{{ product.vendor.shop_name }}</RouterLink>
            </div>
            <div class="mb-3"><small class="text-muted d-block">Category</small>{{ product.category.name }}</div>
            <div><small class="text-muted d-block">Brand</small>{{ product.brand.name }}</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
