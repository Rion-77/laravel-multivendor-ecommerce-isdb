<template>
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex flex-wrap justify-content-between align-items-center py-3 mb-3 gap-2">
      <div>
        <h4 class="fw-bold mb-0"><span class="text-muted fw-light">Products / </span>Add product</h4>
      </div>
      <div class="d-flex gap-2 flex-wrap"></div>
    </div>
    <form data-mv-demo="Product saved (demo – wire this form to your backend)." class="row g-4">
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Basic information</h5>
          </div>
          <div class="card-body">
            <div class="row g-3">
              <div class="col-12">
                <label class="form-label">Product name <span class="text-danger">*</span></label
                ><input
                  class="form-control"
                  id="name"
                  name="name"
                  placeholder="e.g. Easy Women&#39;s Straight Fit Jeans - Light Wash"
                  data-mv-slug-source="#slug"
                  required
                />
              </div>
              <div class="col-12">
                <label class="form-label">Slug <span class="text-danger">*</span></label
                ><input class="form-control" id="slug" name="slug" placeholder="auto-generated from name" required />
                <div class="form-text">Unique URL segment (<code>products.slug</code>).</div>
              </div>
              <div class="col-12">
                <label class="form-label">Description <span class="text-danger">*</span></label
                ><textarea
                  class="form-control"
                  name="description"
                  rows="4"
                  maxlength="255"
                  required
                  placeholder="Short description (max 255 characters)"
                ></textarea>
                <div class="d-flex justify-content-between form-text">
                  <span>The database column is varchar(255).</span><span data-mv-counter></span>
                </div>
              </div>
              <div class="col-md-6">
                <label class="form-label">Vendor <span class="text-danger">*</span></label
                ><select class="form-select" name="vendor_id" id="vendor_id">
                  <option value="">Select vendor...</option>
                  <option value="1">Urban Threads</option>
                  <option value="2">Gadget Hub</option>
                  <option value="3">Fresh Basket</option>
                  <option value="5">Daily Mart</option>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label">Category <span class="text-danger">*</span></label
                ><select class="form-select" name="category_id" id="category_id">
                  <option value="">Select category...</option>
                  <option value="1">Fashion</option>
                  <option value="2">Footwear</option>
                  <option value="3">Electronics</option>
                  <option value="4">Home &amp; Kitchen</option>
                  <option value="5">Grocery</option>
                  <option value="6">Beauty &amp; Health</option>
                  <option value="7">Books &amp; Stationery</option>
                  <option value="8">Sports &amp; Fitness</option>
                </select>
              </div>
              <div class="col-md-6">
                <label class="form-label">Brand <span class="text-danger">*</span></label
                ><select class="form-select" name="brand_id" id="brand_id">
                  <option value="">Select brand...</option>
                  <option value="2">Acme</option>
                  <option value="3">Globex</option>
                  <option value="6">Hooli</option>
                  <option value="4">Initech</option>
                  <option value="1">Northwind</option>
                  <option value="7">Stark</option>
                  <option value="5">Umbrella</option>
                  <option value="10">Vandelay</option>
                  <option value="8">Wayne</option>
                  <option value="9">Wonka</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Pricing</h5>
          </div>
          <div class="card-body">
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Base price (MRP) <span class="text-danger">*</span></label>
                <div class="input-group">
                  <span class="input-group-text">$</span
                  ><input
                    type="number"
                    step="0.01"
                    min="0"
                    class="form-control"
                    id="base_price"
                    name="base_price"
                    required
                  />
                </div>
              </div>
              <div class="col-md-6">
                <label class="form-label">Offer price <span class="text-danger">*</span></label>
                <div class="input-group">
                  <span class="input-group-text">$</span
                  ><input
                    type="number"
                    step="0.01"
                    min="0"
                    class="form-control"
                    id="offer_price"
                    name="offer_price"
                    required
                  />
                </div>
                <div class="form-text">Set equal to base price when there is no discount.</div>
              </div>
              <div class="col-12" id="mv-discount"></div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Product images</h5>
          </div>
          <div class="card-body">
            <div class="mv-dropzone" data-mv-dropzone>
              <i class="bx bx-cloud-upload fs-1 d-block mb-1"></i>Drag &amp; drop images here, or click to browse
              <div class="small">JPG / PNG / WebP – first image becomes the cover</div>
            </div>
            <input type="file" accept="image/*" multiple hidden />
            <div class="mv-preview"></div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Publish</h5>
          </div>
          <div class="card-body">
            <label class="form-label">Status</label
            ><select class="form-select" name="status" id="status">
              <option value="active">Active</option>
              <option value="pending_review" selected>Pending review</option>
              <option value="rejected">Rejected</option>
              <option value="draft">Draft</option>
              <option value="inactive">Inactive</option>
              <option value="out_of_stock">Out of stock</option>
              <option value="suspended">Suspended</option>
            </select>
            <div class="d-grid gap-2 mt-4">
              <button class="btn btn-primary" type="submit">Save product</button
              ><a class="btn btn-outline-secondary" href="/products">Cancel</a>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>
