<template>
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex flex-wrap justify-content-between align-items-center py-3 mb-3 gap-2">
      <div>
        <h4 class="fw-bold mb-0"><span class="text-muted fw-light">Vendors / </span>Vendor details</h4>
      </div>
      <div class="d-flex gap-2 flex-wrap">
        <a href="/vendors" class="btn btn-outline-secondary"
          ><i class="bx bx-left-arrow-alt me-1"></i>Back to vendors</a
        >
      </div>
    </div>
    <div class="row g-4">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <div class="avatar avatar-xl mx-auto mb-3">
              <span class="avatar-initial rounded bg-label-primary fs-2">DM</span>
            </div>
            <h5 class="mb-1">Daily Mart</h5>
            <p class="text-muted mb-2">/daily-mart</p>
            <span class="badge bg-label-success">Active</span>
            <p class="text-start mt-4 mb-0 small">
              Short description of the shop, what it sells and its delivery policy. Replace with vendor-provided text.
            </p>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h6 class="text-uppercase text-muted small">Details</h6>
            <ul class="list-unstyled mb-0">
              <li class="mb-2">
                <i class="bx bx-user me-2"></i><span class="fw-semibold">Owner:</span> Vendor Owner 5
              </li>
              <li class="mb-2"><i class="bx bx-envelope me-2"></i>owner5@example.com</li>
              <li class="mb-2"><i class="bx bx-phone me-2"></i>+1 555 0205</li>
              <li class="mb-2"><i class="bx bx-wallet me-2"></i><span class="fw-semibold">Commission:</span> 10%</li>
              <li><i class="bx bx-calendar me-2"></i><span class="fw-semibold">Joined:</span> 09 Oct 2026</li>
            </ul>
            <div class="d-grid gap-2 mt-4">
              <a href="/vendors/new" class="btn btn-primary"><i class="bx bx-edit-alt me-1"></i>Edit vendor</a
              ><button
                class="btn btn-outline-warning"
                data-mv-confirm="Suspend this vendor and hide all of their products?"
                data-mv-confirm-class="btn-warning"
                data-mv-confirm-label="Suspend"
                data-mv-success="Vendor suspended (demo)."
              >
                Suspend vendor
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="row g-4 mb-4">
          <div class="col-sm-6">
            <div class="card mv-kpi h-100">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                  <div>
                    <span class="text-muted d-block mb-1">Gross sales</span>
                    <h3>$460</h3>
                  </div>
                  <div class="mv-kpi-icon bg-label-primary"><i class="bx bx-dollar-circle"></i></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card mv-kpi h-100">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                  <div>
                    <span class="text-muted d-block mb-1">Commission owed</span>
                    <h3>$46</h3>
                  </div>
                  <div class="mv-kpi-icon bg-label-success"><i class="bx bx-wallet"></i></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card mv-kpi h-100">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                  <div>
                    <span class="text-muted d-block mb-1">Products</span>
                    <h3>13</h3>
                    <small class="text-muted">6 active</small>
                  </div>
                  <div class="mv-kpi-icon bg-label-info"><i class="bx bx-package"></i></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card mv-kpi h-100">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                  <div>
                    <span class="text-muted d-block mb-1">Orders</span>
                    <h3>5</h3>
                    <small class="text-muted">10 units sold</small>
                  </div>
                  <div class="mv-kpi-icon bg-label-warning"><i class="bx bx-receipt"></i></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between">
            <h5 class="mb-0">Products</h5>
            <a href="/products">View all 13</a>
          </div>
          <div class="table-responsive">
            <table class="table mv-table">
              <thead class="table-light">
                <tr>
                  <th>Product</th>
                  <th>Category</th>
                  <th>Price</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="mv-thumb mv-thumb-sm bg-label-primary"><i class="bx bx-male"></i></span>
                      <div class="ms-3 mv-name text-truncate" style="max-width: 260px">Classic Cotton T-Shirt</div>
                    </div>
                  </td>
                  <td>Fashion</td>
                  <td>$19</td>
                  <td><span class="badge bg-label-secondary">Draft</span></td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="mv-thumb mv-thumb-sm bg-label-primary"><i class="bx bx-male"></i></span>
                      <div class="ms-3 mv-name text-truncate" style="max-width: 260px">Slim Fit Jeans</div>
                    </div>
                  </td>
                  <td>Fashion</td>
                  <td>$199</td>
                  <td><span class="badge bg-label-warning">Pending review</span></td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="mv-thumb mv-thumb-sm bg-label-primary"><i class="bx bx-male"></i></span>
                      <div class="ms-3 mv-name text-truncate" style="max-width: 260px">Summer Dress</div>
                    </div>
                  </td>
                  <td>Fashion</td>
                  <td>$24</td>
                  <td><span class="badge bg-label-warning">Pending review</span></td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="mv-thumb mv-thumb-sm bg-label-success"><i class="bx bx-walk"></i></span>
                      <div class="ms-3 mv-name text-truncate" style="max-width: 260px">Leather Loafers</div>
                    </div>
                  </td>
                  <td>Footwear</td>
                  <td>$89</td>
                  <td><span class="badge bg-label-danger">Rejected</span></td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="mv-thumb mv-thumb-sm bg-label-success"><i class="bx bx-walk"></i></span>
                      <div class="ms-3 mv-name text-truncate" style="max-width: 260px">Canvas Slip-ons</div>
                    </div>
                  </td>
                  <td>Footwear</td>
                  <td>$19</td>
                  <td><span class="badge bg-label-success">Active</span></td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="mv-thumb mv-thumb-sm bg-label-info"><i class="bx bx-mobile-alt"></i></span>
                      <div class="ms-3 mv-name text-truncate" style="max-width: 260px">Wireless Headphones</div>
                    </div>
                  </td>
                  <td>Electronics</td>
                  <td>$169</td>
                  <td><span class="badge bg-label-success">Active</span></td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="mv-thumb mv-thumb-sm bg-label-info"><i class="bx bx-mobile-alt"></i></span>
                      <div class="ms-3 mv-name text-truncate" style="max-width: 260px">USB-C Charger</div>
                    </div>
                  </td>
                  <td>Electronics</td>
                  <td>$59</td>
                  <td><span class="badge bg-label-success">Active</span></td>
                </tr>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <span class="mv-thumb mv-thumb-sm bg-label-danger"><i class="bx bx-basket"></i></span>
                      <div class="ms-3 mv-name text-truncate" style="max-width: 260px">Organic Basmati Rice 5kg</div>
                    </div>
                  </td>
                  <td>Grocery</td>
                  <td>$8</td>
                  <td><span class="badge bg-label-dark">Inactive</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card">
          <div class="card-header"><h5 class="mb-0">Orders containing this vendor’s products</h5></div>
          <div class="table-responsive">
            <table class="table mv-table">
              <thead class="table-light">
                <tr>
                  <th>Order</th>
                  <th>Date</th>
                  <th>Units</th>
                  <th>Vendor subtotal</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><a href="/orders/202610251008">#202610181001</a></td>
                  <td>18 Oct 2026</td>
                  <td>2</td>
                  <td class="fw-semibold">$38</td>
                  <td><span class="badge bg-label-warning">Pending</span></td>
                </tr>
                <tr>
                  <td><a href="/orders/202610251008">#202610201003</a></td>
                  <td>20 Oct 2026</td>
                  <td>1</td>
                  <td class="fw-semibold">$169</td>
                  <td><span class="badge bg-label-success">Delivered</span></td>
                </tr>
                <tr>
                  <td><a href="/orders/202610251008">#202610221004</a></td>
                  <td>22 Oct 2026</td>
                  <td>2</td>
                  <td class="fw-semibold">$78</td>
                  <td><span class="badge bg-label-warning">Pending</span></td>
                </tr>
                <tr>
                  <td><a href="/orders/202610251008">#202610231005</a></td>
                  <td>23 Oct 2026</td>
                  <td>2</td>
                  <td class="fw-semibold">$118</td>
                  <td><span class="badge bg-label-primary">Packed</span></td>
                </tr>
                <tr>
                  <td><a href="/orders/202610251008">#202610241007</a></td>
                  <td>24 Oct 2026</td>
                  <td>1</td>
                  <td class="fw-semibold">$169</td>
                  <td><span class="badge bg-label-danger">Cancelled</span></td>
                </tr>
                <tr>
                  <td><a href="/orders/202610251008">#202610251008</a></td>
                  <td>25 Oct 2026</td>
                  <td>3</td>
                  <td class="fw-semibold">$57</td>
                  <td><span class="badge bg-label-warning">Pending</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
