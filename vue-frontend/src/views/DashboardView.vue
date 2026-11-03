<script setup lang="ts">
import type { ApexOptions } from "apexcharts";
import VueApexCharts from "vue3-apexcharts";
const chartColors = {
  primary: "#696cff",
  info: "#03c3ec",
  success: "#71dd37",
  warning: "#ffab00",
  danger: "#ff3e1d",
  heading: "#566a7f",
  axis: "#a1acb8",
  border: "#eceef1",
};

const dashboardData = {
  days: ["18 Oct", "19 Oct", "20 Oct", "21 Oct", "22 Oct", "23 Oct", "24 Oct", "25 Oct"],
  revenue: [38, 124, 205, 0, 164, 118, 110, 167],
  orderStatuses: ["Pending", "Confirmed", "Delivered", "Packed", "Shipped", "Cancelled"],
  orderCounts: [3, 1, 1, 1, 1, 1],
  vendors: ["Daily Mart", "Gadget Hub", "Urban Threads", "Book Nook", "Fresh Basket"],
  vendorSales: [460, 330, 86, 36, 14],
  listingMonths: ["Oct 26"],
  newListings: [26],
};

const formatMoney = (value: number) => `$${value.toLocaleString()}`;
const axisLabelStyle = { colors: chartColors.axis, fontSize: "12px" };
const chartBase = {
  toolbar: { show: false },
  fontFamily: "Public Sans",
};

const dailySeries = [{ name: "Gross sales", data: dashboardData.revenue }];
const dailyOptions: ApexOptions = {
  chart: { ...chartBase, type: "area", height: 300 },
  colors: [chartColors.primary],
  stroke: { curve: "straight", width: 3 },
  fill: {
    type: "gradient",
    gradient: { shadeIntensity: 1, opacityFrom: 0.35, opacityTo: 0.02 },
  },
  dataLabels: { enabled: false },
  legend: { position: "top" },
  xaxis: {
    categories: dashboardData.days,
    labels: { style: axisLabelStyle },
    axisBorder: { show: false },
    axisTicks: { show: false },
  },
  yaxis: {
    labels: { style: axisLabelStyle, formatter: formatMoney },
  },
  grid: { borderColor: chartColors.border, strokeDashArray: 6 },
  tooltip: { y: { formatter: formatMoney } },
};

const orderStatusOptions: ApexOptions = {
  chart: { type: "donut", height: 280, fontFamily: "Public Sans" },
  labels: dashboardData.orderStatuses,
  colors: [
    chartColors.warning,
    chartColors.info,
    chartColors.success,
    chartColors.primary,
    chartColors.primary,
    chartColors.danger,
  ],
  legend: {
    position: "bottom",
    fontSize: "13px",
    labels: { colors: chartColors.heading },
  },
  dataLabels: { enabled: false },
  stroke: { width: 3, colors: ["#fff"] },
  plotOptions: {
    pie: {
      donut: {
        size: "68%",
        labels: {
          show: true,
          total: {
            show: true,
            label: "Total",
            color: chartColors.heading,
            fontSize: "14px",
          },
        },
      },
    },
  },
};

const vendorSeries = [{ name: "Gross sales", data: dashboardData.vendorSales }];
const vendorOptions: ApexOptions = {
  chart: { ...chartBase, type: "bar", height: 300 },
  colors: [chartColors.primary, chartColors.success, chartColors.info, chartColors.warning, chartColors.danger],
  plotOptions: {
    bar: { horizontal: true, borderRadius: 6, barHeight: "55%", distributed: true },
  },
  dataLabels: { enabled: false },
  legend: { show: false },
  xaxis: {
    categories: dashboardData.vendors,
    labels: { style: axisLabelStyle, formatter: formatMoney },
    axisBorder: { show: false },
    axisTicks: { show: false },
  },
  yaxis: { labels: { style: axisLabelStyle } },
  grid: { borderColor: chartColors.border, strokeDashArray: 6 },
  tooltip: { y: { formatter: formatMoney } },
};

const listingSeries = [{ name: "New listings", data: dashboardData.newListings }];
const listingOptions: ApexOptions = {
  chart: { ...chartBase, type: "bar", height: 300 },
  colors: [chartColors.info],
  plotOptions: { bar: { borderRadius: 6, columnWidth: "45%" } },
  dataLabels: { enabled: false },
  xaxis: {
    categories: dashboardData.listingMonths,
    labels: { style: axisLabelStyle },
    axisBorder: { show: false },
    axisTicks: { show: false },
  },
  yaxis: { labels: { style: axisLabelStyle, formatter: (value: number) => String(Math.round(value)) } },
  grid: { borderColor: chartColors.border, strokeDashArray: 6 },
};

</script>
<template>
    <div class="container-xxl flex-grow-1 container-p-y">
            <div class="d-flex flex-wrap justify-content-between align-items-center py-3 mb-3 gap-2">
              <div>
                <h4 class="fw-bold mb-0"><span class="text-muted fw-light"></span>Dashboard</h4>
              </div>
              <div class="d-flex gap-2 flex-wrap">
                <RouterLink to="/products/new" class="btn btn-primary"><i class="bx bx-plus me-1"></i>Add product</RouterLink>
              </div>
            </div>

            <div class="row g-4 mb-4">
              <div class="col-sm-6 col-xl-3">
                <div class="card mv-kpi h-100">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                      <div>
                        <span class="text-muted d-block mb-1">Gross merchandise sales</span>
                        <h3>$926</h3>
                        <small class="text-muted">Excludes cancelled / returned</small>
                      </div>
                      <div class="mv-kpi-icon bg-label-primary"><i class="bx bx-dollar-circle"></i></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-3">
                <div class="card mv-kpi h-100">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                      <div>
                        <span class="text-muted d-block mb-1">Platform commission</span>
                        <h3>$86.87</h3>
                        <small class="text-muted">Based on each vendor rate</small>
                      </div>
                      <div class="mv-kpi-icon bg-label-success"><i class="bx bx-wallet"></i></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-3">
                <div class="card mv-kpi h-100">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                      <div>
                        <span class="text-muted d-block mb-1">Orders</span>
                        <h3>8</h3>
                        <small class="text-muted">3 pending</small>
                      </div>
                      <div class="mv-kpi-icon bg-label-info"><i class="bx bx-receipt"></i></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-3">
                <div class="card mv-kpi h-100">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                      <div>
                        <span class="text-muted d-block mb-1">Active vendors</span>
                        <h3>4<small class="text-muted fs-6"> / 6</small></h3>
                        <small class="text-muted">2 inactive or suspended</small>
                      </div>
                      <div class="mv-kpi-icon bg-label-warning"><i class="bx bx-store-alt"></i></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-3">
                <div class="card mv-kpi h-100">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                      <div>
                        <span class="text-muted d-block mb-1">Products</span>
                        <h3>26</h3>
                        <small class="text-muted">12 active</small>
                      </div>
                      <div class="mv-kpi-icon bg-label-primary"><i class="bx bx-package"></i></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-3">
                <div class="card mv-kpi h-100">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                      <div>
                        <span class="text-muted d-block mb-1">Awaiting moderation</span>
                        <h3>3</h3>
                        <small class="text-muted"><RouterLink to="/products/pending">Review now</RouterLink></small>
                      </div>
                      <div class="mv-kpi-icon bg-label-danger"><i class="bx bx-time-five"></i></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-3">
                <div class="card mv-kpi h-100">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                      <div>
                        <span class="text-muted d-block mb-1">Customers</span>
                        <h3>12</h3>
                        <small class="text-muted">Registered accounts</small>
                      </div>
                      <div class="mv-kpi-icon bg-label-success"><i class="bx bx-user"></i></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-3">
                <div class="card mv-kpi h-100">
                  <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                      <div>
                        <span class="text-muted d-block mb-1">Categories / Brands</span>
                        <h3>8 / 10</h3>
                      </div>
                      <div class="mv-kpi-icon bg-label-info"><i class="bx bx-category"></i></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row g-4 mb-4">
              <div class="col-lg-8">
                <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Gross sales by day</h5>
                    <div><span class="text-muted small">Oct 2026</span></div>
                  </div>
                  <div class="card-body">
                    <VueApexCharts type="area" height="300" :options="dailyOptions" :series="dailySeries" />
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Orders by status</h5>
                  </div>
                  <div class="card-body">
                    <VueApexCharts
                      type="donut"
                      height="280"
                      :options="orderStatusOptions"
                      :series="dashboardData.orderCounts"
                    />
                  </div>
                </div>
              </div>
            </div>
            <div class="row g-4 mb-4">
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Sales by vendor</h5>
                  </div>
                  <div class="card-body">
                    <VueApexCharts type="bar" height="300" :options="vendorOptions" :series="vendorSeries" />
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">New product listings per month</h5>
                  </div>
                  <div class="card-body">
                    <VueApexCharts type="bar" height="300" :options="listingOptions" :series="listingSeries" />
                  </div>
                </div>
              </div>
            </div>
            <div class="row g-4 mb-4">
              <div class="col-xl-8">
                <div class="card">
                  <div class="card-header d-flex justify-content-between">
                    <h5 class="mb-0">Recent orders</h5>
                    <RouterLink to="/orders">View all</RouterLink>
                  </div>
                  <div class="table-responsive">
                    <table class="table mv-table">
                      <thead class="table-light">
                        <tr>
                          <th>Order</th>
                          <th>Date</th>
                          <th>Customer</th>
                          <th>Vendors</th>
                          <th>Items</th>
                          <th>Total</th>
                          <th>Status</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr data-status="1">
                          <td><RouterLink class="fw-semibold" to="/orders/202610251008">#202610251008</RouterLink></td>
                          <td>25 Oct 2026, 10:56 AM</td>
                          <td>
                            <div class="mv-name">
                              Avery Chen <span class="badge bg-label-secondary ms-1">Guest</span>
                            </div>
                            <div class="mv-sub">avery.chen@example.com</div>
                          </td>
                          <td class="mv-wrap">Gadget Hub, Daily Mart</td>
                          <td>4</td>
                          <td class="fw-semibold">$172</td>
                          <td><span class="badge bg-label-warning">Pending</span></td>
                          <td>
                            <div class="mv-actions d-flex gap-1">
                              <a
                                class="btn btn-sm btn-icon btn-outline-secondary"
                                href="/orders/202610251008"
                                data-bs-toggle="tooltip"
                                title="View"
                                ><i class="bx bx-show"></i></a
                              ><button
                                class="btn btn-sm btn-icon btn-outline-secondary"
                                onclick="window.print()"
                                data-bs-toggle="tooltip"
                                title="Print"
                              >
                                <i class="bx bx-printer"></i>
                              </button>
                            </div>
                          </td>
                        </tr>
                        <tr data-status="6">
                          <td><RouterLink class="fw-semibold" to="/orders/202610241007">#202610241007</RouterLink></td>
                          <td>24 Oct 2026, 05:49 PM</td>
                          <td>
                            <div class="mv-name">
                              Drew Evans <span class="badge bg-label-secondary ms-1">Guest</span>
                            </div>
                            <div class="mv-sub">drew.evans@example.com</div>
                          </td>
                          <td class="mv-wrap">Daily Mart</td>
                          <td>1</td>
                          <td class="fw-semibold">$174</td>
                          <td><span class="badge bg-label-danger">Cancelled</span></td>
                          <td>
                            <div class="mv-actions d-flex gap-1">
                              <a
                                class="btn btn-sm btn-icon btn-outline-secondary"
                                href="/orders/202610241007"
                                data-bs-toggle="tooltip"
                                title="View"
                                ><i class="bx bx-show"></i></a
                              ><button
                                class="btn btn-sm btn-icon btn-outline-secondary"
                                onclick="window.print()"
                                data-bs-toggle="tooltip"
                                title="Print"
                              >
                                <i class="bx bx-printer"></i>
                              </button>
                            </div>
                          </td>
                        </tr>
                        <tr data-status="4">
                          <td><RouterLink class="fw-semibold" to="/orders/202610241006">#202610241006</RouterLink></td>
                          <td>24 Oct 2026, 04:42 PM</td>
                          <td>
                            <div class="mv-name">Jamie Patel</div>
                            <div class="mv-sub">jamie.patel@example.com</div>
                          </td>
                          <td class="mv-wrap">Gadget Hub</td>
                          <td>1</td>
                          <td class="fw-semibold">$115</td>
                          <td><span class="badge bg-label-primary">Shipped</span></td>
                          <td>
                            <div class="mv-actions d-flex gap-1">
                              <a
                                class="btn btn-sm btn-icon btn-outline-secondary"
                                href="/orders/202610241006"
                                data-bs-toggle="tooltip"
                                title="View"
                                ><i class="bx bx-show"></i></a
                              ><button
                                class="btn btn-sm btn-icon btn-outline-secondary"
                                onclick="window.print()"
                                data-bs-toggle="tooltip"
                                title="Print"
                              >
                                <i class="bx bx-printer"></i>
                              </button>
                            </div>
                          </td>
                        </tr>
                        <tr data-status="3">
                          <td><RouterLink class="fw-semibold" to="/orders/202610231005">#202610231005</RouterLink></td>
                          <td>23 Oct 2026, 03:35 PM</td>
                          <td>
                            <div class="mv-name">
                              Riley Brooks <span class="badge bg-label-secondary ms-1">Guest</span>
                            </div>
                            <div class="mv-sub">riley.brooks@example.com</div>
                          </td>
                          <td class="mv-wrap">Daily Mart</td>
                          <td>2</td>
                          <td class="fw-semibold">$123</td>
                          <td><span class="badge bg-label-primary">Packed</span></td>
                          <td>
                            <div class="mv-actions d-flex gap-1">
                              <a
                                class="btn btn-sm btn-icon btn-outline-secondary"
                                href="/orders/202610231005"
                                data-bs-toggle="tooltip"
                                title="View"
                                ><i class="bx bx-show"></i></a
                              ><button
                                class="btn btn-sm btn-icon btn-outline-secondary"
                                onclick="window.print()"
                                data-bs-toggle="tooltip"
                                title="Print"
                              >
                                <i class="bx bx-printer"></i>
                              </button>
                            </div>
                          </td>
                        </tr>
                        <tr data-status="1">
                          <td><RouterLink class="fw-semibold" to="/orders/202610221004">#202610221004</RouterLink></td>
                          <td>22 Oct 2026, 02:28 PM</td>
                          <td>
                            <div class="mv-name">
                              Casey Morgan <span class="badge bg-label-secondary ms-1">Guest</span>
                            </div>
                            <div class="mv-sub">casey.morgan@example.com</div>
                          </td>
                          <td class="mv-wrap">Urban Threads, Daily Mart</td>
                          <td>5</td>
                          <td class="fw-semibold">$169</td>
                          <td><span class="badge bg-label-warning">Pending</span></td>
                          <td>
                            <div class="mv-actions d-flex gap-1">
                              <a
                                class="btn btn-sm btn-icon btn-outline-secondary"
                                href="/orders/202610221004"
                                data-bs-toggle="tooltip"
                                title="View"
                                ><i class="bx bx-show"></i></a
                              ><button
                                class="btn btn-sm btn-icon btn-outline-secondary"
                                onclick="window.print()"
                                data-bs-toggle="tooltip"
                                title="Print"
                              >
                                <i class="bx bx-printer"></i>
                              </button>
                            </div>
                          </td>
                        </tr>
                        <tr data-status="5">
                          <td><RouterLink class="fw-semibold" to="/orders/202610201003">#202610201003</RouterLink></td>
                          <td>20 Oct 2026, 01:21 PM</td>
                          <td>
                            <div class="mv-name">Taylor Kim</div>
                            <div class="mv-sub">taylor.kim@example.com</div>
                          </td>
                          <td class="mv-wrap">Daily Mart, Book Nook</td>
                          <td>4</td>
                          <td class="fw-semibold">$210</td>
                          <td><span class="badge bg-label-success">Delivered</span></td>
                          <td>
                            <div class="mv-actions d-flex gap-1">
                              <a
                                class="btn btn-sm btn-icon btn-outline-secondary"
                                href="/orders/202610201003"
                                data-bs-toggle="tooltip"
                                title="View"
                                ><i class="bx bx-show"></i></a
                              ><button
                                class="btn btn-sm btn-icon btn-outline-secondary"
                                onclick="window.print()"
                                data-bs-toggle="tooltip"
                                title="Print"
                              >
                                <i class="bx bx-printer"></i>
                              </button>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-xl-4">
                <div class="card mb-4">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Pending product reviews</h5>
                    <div><RouterLink to="/products/pending">All</RouterLink></div>
                  </div>
                  <div class="card-body">
                    <ul class="list-unstyled mb-0">
                      <li class="d-flex align-items-center mb-3">
                        <span class="mv-thumb mv-thumb-sm bg-label-primary"><i class="bx bx-male"></i></span>
                        <div class="ms-3 flex-grow-1">
                          <div class="mv-name text-truncate" style="max-width: 230px">Slim Fit Jeans</div>
                          <div class="mv-sub">Daily Mart · $199</div>
                        </div>
                        <RouterLink to="/products/1" class="btn btn-sm btn-outline-primary">Review</RouterLink>
                      </li>
                      <li class="d-flex align-items-center mb-3">
                        <span class="mv-thumb mv-thumb-sm bg-label-primary"><i class="bx bx-male"></i></span>
                        <div class="ms-3 flex-grow-1">
                          <div class="mv-name text-truncate" style="max-width: 230px">Summer Dress</div>
                          <div class="mv-sub">Daily Mart · $24</div>
                        </div>
                        <RouterLink to="/products/1" class="btn btn-sm btn-outline-primary">Review</RouterLink>
                      </li>
                      <li class="d-flex align-items-center mb-3">
                        <span class="mv-thumb mv-thumb-sm bg-label-primary"><i class="bx bx-male"></i></span>
                        <div class="ms-3 flex-grow-1">
                          <div class="mv-name text-truncate" style="max-width: 230px">Hooded Sweatshirt</div>
                          <div class="mv-sub">Urban Threads · $24</div>
                        </div>
                        <RouterLink to="/products/1" class="btn btn-sm btn-outline-primary">Review</RouterLink>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Top vendors</h5>
                    <div><RouterLink to="/commissions">Commissions</RouterLink></div>
                  </div>
                  <div class="card-body">
                    <ul class="list-unstyled mb-0">
                      <li class="d-flex align-items-center mb-3">
                        <div class="avatar avatar-sm">
                          <span class="avatar-initial rounded-circle bg-label-danger">DM</span>
                        </div>
                        <div class="ms-3 flex-grow-1">
                          <div class="mv-name">Daily Mart</div>
                          <div class="mv-sub">13 products · 5 orders</div>
                        </div>
                        <div class="fw-semibold">$460</div>
                      </li>
                      <li class="d-flex align-items-center mb-3">
                        <div class="avatar avatar-sm">
                          <span class="avatar-initial rounded-circle bg-label-success">GH</span>
                        </div>
                        <div class="ms-3 flex-grow-1">
                          <div class="mv-name">Gadget Hub</div>
                          <div class="mv-sub">3 products · 3 orders</div>
                        </div>
                        <div class="fw-semibold">$330</div>
                      </li>
                      <li class="d-flex align-items-center mb-3">
                        <div class="avatar avatar-sm">
                          <span class="avatar-initial rounded-circle bg-label-primary">UT</span>
                        </div>
                        <div class="ms-3 flex-grow-1">
                          <div class="mv-name">Urban Threads</div>
                          <div class="mv-sub">4 products · 1 orders</div>
                        </div>
                        <div class="fw-semibold">$86</div>
                      </li>
                      <li class="d-flex align-items-center mb-3">
                        <div class="avatar avatar-sm">
                          <span class="avatar-initial rounded-circle bg-label-secondary">BN</span>
                        </div>
                        <div class="ms-3 flex-grow-1">
                          <div class="mv-name">Book Nook</div>
                          <div class="mv-sub">4 products · 1 orders</div>
                        </div>
                        <div class="fw-semibold">$36</div>
                      </li>
                      <li class="d-flex align-items-center mb-3">
                        <div class="avatar avatar-sm">
                          <span class="avatar-initial rounded-circle bg-label-info">FB</span>
                        </div>
                        <div class="ms-3 flex-grow-1">
                          <div class="mv-name">Fresh Basket</div>
                          <div class="mv-sub">2 products · 1 orders</div>
                        </div>
                        <div class="fw-semibold">$14</div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
</template>