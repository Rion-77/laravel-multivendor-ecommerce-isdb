<script setup lang="ts">
const commissions = [
  { vendor: "Daily Mart", order: "#MV-1048", sales: "$84.00", rate: "10%", commission: "$8.40", status: "Unpaid" },
  { vendor: "Gadget Hub", order: "#MV-1047", sales: "$129.00", rate: "8%", commission: "$10.32", status: "Paid" },
  { vendor: "Urban Threads", order: "#MV-1046", sales: "$56.00", rate: "12%", commission: "$6.72", status: "Unpaid" },
];
</script>

<template>
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex flex-wrap justify-content-between align-items-center py-3 mb-3 gap-2">
      <h4 class="fw-bold mb-0"><span class="text-muted fw-light">Sales / </span>Commissions</h4>
      <button class="btn btn-outline-secondary" type="button" data-mv-toast="Export started (demo)."><i class="bx bx-download me-1"></i>Export</button>
    </div>
    <div class="row g-4 mb-4">
      <div v-for="metric in [{label:'Commission earned', value:'$8,426'}, {label:'Awaiting payout', value:'$1,284'}, {label:'Paid out', value:'$7,142'}]" :key="metric.label" class="col-sm-6 col-xl-4">
        <div class="card mv-kpi"><div class="card-body"><span class="text-muted d-block mb-1">{{ metric.label }}</span><h3 class="mb-0">{{ metric.value }}</h3></div></div>
      </div>
    </div>
    <div class="card" data-mv-table><div class="mv-table-toolbar">
      <input class="form-control mv-search" type="search" placeholder="Search commissions..." data-mv-search />
      <select class="form-select" data-mv-filter="status"><option value="">All statuses</option><option value="unpaid">Unpaid</option><option value="paid">Paid</option></select>
    </div><div class="table-responsive"><table class="table table-hover mv-table">
      <thead class="table-light"><tr><th>Vendor</th><th>Order</th><th>Gross sales</th><th>Rate</th><th>Commission</th><th>Status</th><th>Actions</th></tr></thead>
      <tbody><tr v-for="entry in commissions" :key="entry.order" :data-status="entry.status.toLowerCase()">
        <td>{{ entry.vendor }}</td><td>{{ entry.order }}</td><td>{{ entry.sales }}</td><td>{{ entry.rate }}</td><td class="fw-semibold">{{ entry.commission }}</td>
        <td><span class="badge" :class="entry.status === 'Paid' ? 'bg-label-success' : 'bg-label-warning'">{{ entry.status }}</span></td>
        <td><button class="btn btn-sm btn-outline-primary" type="button" data-mv-toast="Commission marked as paid (demo)." :disabled="entry.status === 'Paid'">Mark paid</button></td>
      </tr></tbody>
    </table></div></div>
  </div>
</template>
