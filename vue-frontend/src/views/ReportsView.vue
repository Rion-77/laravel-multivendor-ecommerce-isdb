<script setup lang="ts">
import type { ApexOptions } from "apexcharts";
import VueApexCharts from "vue3-apexcharts";
const salesSeries = [{ name: "Gross sales", data: [38, 124, 205, 164, 118, 167] }];
const salesOptions: ApexOptions = {
  chart: { type: "bar", toolbar: { show: false }, fontFamily: "Public Sans" },
  colors: ["#696cff"], dataLabels: { enabled: false }, plotOptions: { bar: { borderRadius: 5 } },
  xaxis: { categories: ["May", "Jun", "Jul", "Aug", "Sep", "Oct"] },
  yaxis: { labels: { formatter: (value: number) => `$${value}` } },
  grid: { borderColor: "#eceef1", strokeDashArray: 6 },
};
</script>

<template>
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex flex-wrap justify-content-between align-items-center py-3 mb-3 gap-2">
      <h4 class="fw-bold mb-0"><span class="text-muted fw-light">Sales / </span>Reports</h4>
      <div class="d-flex gap-2"><select class="form-select" aria-label="Report period"><option>Last 30 days</option><option>This year</option></select><button class="btn btn-outline-secondary" type="button" data-mv-toast="Report exported (demo)."><i class="bx bx-download me-1"></i>Export</button></div>
    </div>
    <div class="row g-4 mb-4">
      <div v-for="metric in [{label:'Gross merchandise sales', value:'$24,680'}, {label:'Orders', value:'384'}, {label:'Average order value', value:'$64.27'}, {label:'Marketplace commission', value:'$2,468'}]" :key="metric.label" class="col-sm-6 col-xl-3">
        <div class="card mv-kpi h-100"><div class="card-body"><span class="text-muted d-block mb-1">{{ metric.label }}</span><h3 class="mb-0">{{ metric.value }}</h3></div></div>
      </div>
    </div>
    <div class="row g-4">
      <div class="col-lg-8"><div class="card"><div class="card-header"><h5 class="mb-0">Sales overview</h5></div><div class="card-body"><VueApexCharts type="bar" height="300" :options="salesOptions" :series="salesSeries" /></div></div></div>
      <div class="col-lg-4"><div class="card h-100"><div class="card-header"><h5 class="mb-0">Top vendors</h5></div><div class="card-body">
        <div v-for="(vendor, index) in [{name:'Daily Mart', sales:'$8,420'}, {name:'Gadget Hub', sales:'$6,180'}, {name:'Urban Threads', sales:'$4,260'}]" :key="vendor.name" class="d-flex justify-content-between mb-4"><span><span class="badge bg-label-primary me-2">{{ index + 1 }}</span>{{ vendor.name }}</span><strong>{{ vendor.sales }}</strong></div>
      </div></div></div>
    </div>
  </div>
</template>
