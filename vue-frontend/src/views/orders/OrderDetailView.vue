<script setup lang="ts">
import axios from "axios";
import { computed, ref, watch } from "vue";
import { useRoute } from "vue-router";
import type { AdminOrder } from "../../interfaces/Order";
import type { OrderStatusOption } from "../../interfaces/OrderStatus";
import { api } from "../../services/api";
import { formatPrice, formatStatus, statusBadgeClass } from "../../utils/formatters";

interface VendorOrderItems {
  id: number | null;
  name: string;
  items: AdminOrder["order_items"];
  subtotal: number;
}

const route = useRoute();
const order = ref<AdminOrder | null>(null);
const statuses = ref<OrderStatusOption[]>([]);
const selectedStatusId = ref<number | null>(null);
const loading = ref(false);
const savingStatus = ref(false);
const loadError = ref("");
const statusError = ref("");
const statusMessage = ref("");

const orderId = computed(() => String(route.params.id));
const customerName = computed(() => order.value?.user?.name ?? order.value?.guest_name ?? "Guest customer");
const customerEmail = computed(() => order.value?.user?.email ?? order.value?.guest_email ?? "—");
const customerPhone = computed(() => order.value?.user?.phone ?? order.value?.guest_phone ?? "—");
const currentStatus = computed(() => order.value?.order_status?.name ?? "Unknown");
const dateTime = computed(() => {
  if (!order.value?.created_at) return "—";
  const date = new Date(order.value.created_at);
  return Number.isNaN(date.getTime()) ? "—" : new Intl.DateTimeFormat("en", {
    day: "2-digit",
    month: "short",
    year: "numeric",
    hour: "2-digit",
    minute: "2-digit",
  }).format(date);
});

const vendorGroups = computed<VendorOrderItems[]>(() => {
  const groups = new Map<number, VendorOrderItems>();
  for (const item of order.value?.order_items ?? []) {
    const vendor = item.product?.vendor;
    const id = vendor?.id ?? 0;
    const group = groups.get(id) ?? {
      id: vendor?.id ?? null,
      name: vendor?.shop_name ?? "Vendor unavailable",
      items: [],
      subtotal: 0,
    };
    group.items.push(item);
    group.subtotal += Number(item.unit_price) * item.quantity;
    groups.set(id, group);
  }
  return [...groups.values()];
});

const progressSteps = [
  { name: "Pending", icon: "bx-time-five" },
  { name: "Confirmed", icon: "bx-check" },
  { name: "Packed", icon: "bx-package" },
  { name: "Shipped", icon: "bx-send" },
  { name: "Delivered", icon: "bx-check-double" },
];
const currentProgressIndex = computed(() =>
  progressSteps.findIndex((step) => step.name.toLowerCase() === currentStatus.value.toLowerCase()),
);

function getOrder(id: string) {
  loading.value = true;
  loadError.value = "";
  statusError.value = "";
  statusMessage.value = "";

  api.get<{ order: AdminOrder; statuses: OrderStatusOption[] }>(`orders/${encodeURIComponent(id)}`)
    .then((response) => {
      order.value = response.data.order;
      statuses.value = response.data.statuses;
      selectedStatusId.value = response.data.order.order_status_id;
    })
    .catch((error: unknown) => {
      console.error("Failed to load order details.", error);
      loadError.value = axios.isAxiosError<{ message?: string }>(error)
        ? error.response?.data?.message ?? "Unable to load order details. Please try again."
        : "Unable to load order details. Please try again.";
    })
    .finally(() => {
      loading.value = false;
    });
}

function updateOrderStatus() {
  if (!order.value || selectedStatusId.value === null || savingStatus.value) return;

  savingStatus.value = true;
  statusError.value = "";
  statusMessage.value = "";
  api.patch<{ message: string; order: AdminOrder }>(`orders/${order.value.id}`, {
    order_status_id: selectedStatusId.value,
  })
    .then((response) => {
      if (order.value) order.value = { ...order.value, ...response.data.order };
      statusMessage.value = response.data.message;
    })
    .catch((error: unknown) => {
      console.error("Failed to update order status.", error);
      statusError.value = axios.isAxiosError<{ message?: string }>(error)
        ? error.response?.data?.message ?? "Unable to update order status. Please try again."
        : "Unable to update order status. Please try again.";
    })
    .finally(() => {
      savingStatus.value = false;
    });
}

function printInvoice() {
  window.print();
}

watch(orderId, getOrder, { immediate: true });
</script>

<template>
  <div class="container-xxl flex-grow-1 container-p-y mv-order-page">
    <div class="d-flex flex-wrap justify-content-between align-items-center py-3 mb-3 gap-2 mv-no-print">
      <div>
        <h4 class="fw-bold mb-0"><span class="text-muted fw-light">Orders / </span>Order details</h4>
      </div>
      <div class="d-flex gap-2 flex-wrap">
        <RouterLink class="btn btn-outline-secondary" to="/orders"><i class="bx bx-left-arrow-alt me-1"></i>Back</RouterLink>
        <button class="btn btn-outline-primary" type="button" :disabled="loading || !order" @click="printInvoice">
          <i class="bx bx-printer me-1"></i>Print invoice
        </button>
      </div>
    </div>

    <div v-if="loading" class="alert alert-info" role="status">Loading order details…</div>
    <div v-else-if="loadError" class="alert alert-danger" role="alert">{{ loadError }}</div>
    <template v-else-if="order">
      <section class="card mb-4 mv-order-overview">
        <div class="card-body">
          <div class="mv-invoice-heading">
            <div>
              <span class="mv-invoice-brand"><i class="bx bxs-store-alt me-2"></i>Bazaarly Marketplace</span>
              <h5 class="mb-1 mt-3">Order #{{ order.order_number }}</h5>
              <span class="text-muted">Placed {{ dateTime }}</span>
            </div>
            <div class="text-end">
              <span class="text-muted small d-block">INVOICE</span>
              <strong>{{ order.order_number }}</strong>
            </div>
          </div>
          <div class="d-flex justify-content-end mb-4">
            <span class="badge" :class="statusBadgeClass(currentStatus.toLowerCase())">{{ formatStatus(currentStatus) }}</span>
          </div>
          <ul class="mv-steps">
            <li
              v-for="(step, index) in progressSteps"
              :key="step.name"
              :class="{ done: currentProgressIndex >= 0 && index < currentProgressIndex, current: index === currentProgressIndex }"
            >
              <span class="mv-step-dot"><i class="bx" :class="step.icon"></i></span>
              <span class="mv-step-label">{{ step.name }}</span>
            </li>
          </ul>
          <div class="mv-print-customer">
            <div>
              <span class="text-muted small d-block">CUSTOMER</span>
              <strong>{{ customerName }}</strong>
              <span class="badge ms-2" :class="order.user ? 'bg-label-primary' : 'bg-label-secondary'">{{ order.user ? "Registered customer" : "Guest checkout" }}</span>
            </div>
            <div>{{ customerEmail }}</div>
            <div>{{ customerPhone }}</div>
          </div>
          <div v-if="currentProgressIndex < 0" class="small text-muted mt-3">
            This order is {{ formatStatus(currentStatus).toLowerCase() }}.
          </div>
        </div>
      </section>

      <div class="mv-order-products">
        <section v-for="group in vendorGroups" :key="group.id ?? group.name" class="card mb-4 mv-vendor-order">
          <div class="card-header d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
              <span class="avatar avatar-sm"><span class="avatar-initial rounded-circle bg-label-primary">{{ group.name.slice(0, 2).toUpperCase() }}</span></span>
              <span class="ms-2 fw-semibold">{{ group.name }}</span>
            </div>
            <span class="text-muted small">{{ group.items.length }} item(s)</span>
          </div>
          <div class="table-responsive">
            <table class="table mv-table mb-0">
              <thead class="table-light">
                <tr><th>Product</th><th>Unit price</th><th>Qty</th><th class="text-end">Total</th></tr>
              </thead>
              <tbody>
                <tr v-for="item in group.items" :key="item.id">
                  <td>
                    <div class="mv-name">{{ item.product?.name ?? "Product unavailable" }}</div>
                    <small class="text-muted">{{ item.product?.category?.name ?? "—" }}<span v-if="item.product?.brand"> · {{ item.product.brand.name }}</span></small>
                  </td>
                  <td>{{ formatPrice(item.unit_price) }}</td>
                  <td>{{ item.quantity }}</td>
                  <td class="fw-semibold text-end">{{ formatPrice((Number(item.unit_price) * item.quantity).toFixed(2)) }}</td>
                </tr>
              </tbody>
              <tfoot>
                <tr><td colspan="3" class="text-end text-muted">Vendor subtotal</td><td class="text-end fw-semibold">{{ formatPrice(group.subtotal.toFixed(2)) }}</td></tr>
              </tfoot>
            </table>
          </div>
        </section>
        <div v-if="vendorGroups.length === 0" class="card mb-4">
          <div class="card-body text-muted">No items were recorded for this order.</div>
        </div>
      </div>

      <div class="row g-4 mv-order-lower">
        <div class="col-lg-8">
          <section class="card mv-order-timeline">
            <div class="card-header"><h5 class="mb-0">Order timeline</h5></div>
            <div class="card-body">
              <ul class="timeline mb-0">
                <li class="timeline-item">
                  <span class="timeline-point timeline-point-primary"></span>
                  <div class="timeline-event">
                    <div class="timeline-header"><h6 class="mb-0">Order placed</h6><small>{{ dateTime }}</small></div>
                    <p class="mb-0 text-muted">Order {{ order.order_number }} was created.</p>
                  </div>
                </li>
              </ul>
              <p class="small text-muted mb-0 mt-2">Status history is not stored for this order.</p>
            </div>
          </section>
        </div>

        <div class="col-lg-4">
          <section class="card mb-4 mv-no-print">
            <div class="card-header"><h5 class="card-title mb-0">Order status</h5></div>
            <div class="card-body">
              <label class="form-label" for="order-status">Update status</label>
              <select id="order-status" v-model.number="selectedStatusId" class="form-select mb-3">
                <option v-for="status in statuses" :key="status.id" :value="status.id">{{ formatStatus(status.name) }}</option>
              </select>
              <div v-if="statusError" class="alert alert-danger" role="alert">{{ statusError }}</div>
              <div v-if="statusMessage" class="alert alert-success" role="status">{{ statusMessage }}</div>
              <button class="btn btn-primary w-100" type="button" :disabled="savingStatus || selectedStatusId === order.order_status_id" @click="updateOrderStatus">
                {{ savingStatus ? "Updating…" : "Update status" }}
              </button>
            </div>
          </section>

          <section class="card mb-4 mv-payment-summary">
            <div class="card-header"><h5 class="card-title mb-0">Payment summary</h5></div>
            <div class="card-body">
              <div class="d-flex justify-content-between mb-2"><span class="text-muted">Subtotal</span><span>{{ formatPrice(order.subtotal_amount) }}</span></div>
              <div class="d-flex justify-content-between mb-2"><span class="text-muted">Shipping fee</span><span>{{ formatPrice(order.shipping_fee) }}</span></div>
              <hr />
              <div class="d-flex justify-content-between fw-bold fs-5"><span>Total</span><span>{{ formatPrice(order.total_amount) }}</span></div>
            </div>
          </section>

          <section class="card mb-4 mv-screen-customer">
            <div class="card-header"><h5 class="card-title mb-0">Customer</h5></div>
            <div class="card-body">
              <div class="d-flex align-items-center mb-3">
                <div class="avatar avatar-md"><span class="avatar-initial rounded-circle bg-label-info">{{ customerName.slice(0, 2).toUpperCase() }}</span></div>
                <div class="ms-3"><div class="mv-name">{{ customerName }}</div><span class="badge" :class="order.user ? 'bg-label-primary' : 'bg-label-secondary'">{{ order.user ? "Registered customer" : "Guest checkout" }}</span></div>
              </div>
              <div class="small mb-1"><i class="bx bx-envelope me-2"></i>{{ customerEmail }}</div>
              <div class="small"><i class="bx bx-phone me-2"></i>{{ customerPhone }}</div>
            </div>
          </section>

          <section class="card mb-4">
            <div class="card-header"><h5 class="card-title mb-0">Shipping address</h5></div>
            <div class="card-body">
              <div class="mv-name">{{ order.shipping_recipient_name }}</div>
              <div class="small text-muted mb-2">{{ order.shipping_phone }}</div>
              <div>{{ order.shipping_address_line }}</div>
              <div v-if="order.shipping_district">{{ order.shipping_district }}</div>
            </div>
          </section>
        </div>
      </div>
    </template>
  </div>
</template>
