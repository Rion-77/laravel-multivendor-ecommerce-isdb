<template>
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex flex-wrap justify-content-between align-items-center py-3 mb-3 gap-2">
      <div>
        <h4 class="fw-bold mb-0"><span class="text-muted fw-light">Vendors / </span>Add vendor</h4>
      </div>
      <div class="d-flex gap-2 flex-wrap"></div>
    </div>
    <form data-mv-demo="Vendor saved (demo – wire this form to your backend)." class="row g-4">
      <div class="col-lg-8">
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Shop information</h5>
          </div>
          <div class="card-body">
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Shop name <span class="text-danger">*</span></label
                ><input
                  class="form-control"
                  id="shop_name"
                  name="shop_name"
                  placeholder="e.g. Rupkotha Fashion House"
                  data-mv-slug-source="#slug"
                  required
                />
              </div>
              <div class="col-md-6">
                <label class="form-label">Slug <span class="text-danger">*</span></label>
                <div class="input-group">
                  <span class="input-group-text">/shop/</span
                  ><input class="form-control" id="slug" name="slug" placeholder="auto-generated" required />
                </div>
              </div>
              <div class="col-12">
                <label class="form-label">Description <span class="text-danger">*</span></label
                ><textarea
                  class="form-control"
                  name="description"
                  rows="5"
                  placeholder="Tell customers what this shop sells..."
                  required
                ></textarea>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Account & status</h5>
          </div>
          <div class="card-body">
            <div class="mb-3">
              <label class="form-label">Owner (user with Vendor role) <span class="text-danger">*</span></label
              ><select class="form-select" name="user_id" id="user_id">
                <option value="">Select owner...</option>
                <option value="3">Vendor Owner 1 (owner1@example.com)</option>
                <option value="4">Vendor Owner 2 (owner2@example.com)</option>
                <option value="5">Vendor Owner 3 (owner3@example.com)</option>
                <option value="6">Vendor Owner 4 (owner4@example.com)</option>
                <option value="7">Vendor Owner 5 (owner5@example.com)</option>
                <option value="8">Vendor Owner 6 (owner6@example.com)</option>
              </select>
              <div class="form-text">
                Maps to <code>vendors.user_id</code>. Create the user first via Register or Users.
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label">Status</label
              ><select class="form-select" name="status" id="status">
                <option value="active" selected>Active</option>
                <option value="inactive">Inactive</option>
                <option value="suspended">Suspended</option>
              </select>
            </div>
            <div>
              <label class="form-label">Commission rate <span class="text-danger">*</span></label>
              <div class="input-group">
                <input
                  type="number"
                  step="0.01"
                  min="0"
                  max="100"
                  class="form-control"
                  name="commission_rate"
                  value="10.00"
                  required
                /><span class="input-group-text">%</span>
              </div>
              <div class="form-text">Percentage the marketplace keeps from each sale.</div>
            </div>
          </div>
        </div>
        <div class="d-grid gap-2">
          <button class="btn btn-primary" type="submit">Save vendor</button
          ><a class="btn btn-outline-secondary" href="/vendors">Cancel</a>
        </div>
      </div>
    </form>
  </div>
</template>
