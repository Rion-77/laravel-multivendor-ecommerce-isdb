@extends('admin.layouts.app')

@section('title', "Product Categories")

@section('content')
   <main class="app-main" id="main" tabindex="-1">

        <x-admin.content-header title="Product Categories"></x-admin.content-header>

        <div class="app-content">
          <div class="container-fluid">

            <div class="row">
              <div class="col-lg-4">
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h3 class="card-title">Add Category</h3>
                  </div>
                  <div class="card-body">
                    <form>
                      <div class="mb-3">
                        <label class="form-label" for="c-name">Category name</label>
                        <input type="text" class="form-control" id="c-name" placeholder="e.g. Home Appliances">
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="c-parent">Parent category</label>
                        <select class="form-select" id="c-parent">
                          <option selected="">None (top-level)</option>
                          <option>Electronics</option>
                          <option>Fashion &amp; Apparel</option>
                          <option>Home &amp; Living</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="c-desc">Description</label>
                        <textarea class="form-control" id="c-desc" rows="3" placeholder="Optional short description"></textarea>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="c-icon">Icon</label>
                        <input type="text" class="form-control" id="c-icon" placeholder="bi-tv (Bootstrap Icon class)">
                      </div>
                      <button type="submit" class="btn btn-primary w-100"><i class="bi bi-plus-lg me-1"></i>Add Category</button>
                    </form>
                  </div>
                </div>
              </div>

              <div class="col-lg-8">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">All Categories</h3>
                    <div class="card-tools">
                      <div class="input-group input-group-sm" style="width: 200px;">
                        <input type="search" class="form-control" placeholder="Search categories…" aria-label="Search categories">
                        <button class="btn btn-outline-secondary" type="button"><i class="bi bi-search"></i></button>
                      </div>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-hover align-middle m-0" role="table">
                        <thead>
                          <tr>
                            <th scope="col">Category</th>
                            <th scope="col">Parent</th>
                            <th scope="col">Products</th>
                            <th scope="col">Status</th>
                            <th class="text-end" scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <div class="d-flex align-items-center">
                                <i class="bi bi-cpu fs-5 text-primary me-2"></i>
                                <span class="fw-medium">Electronics</span>
                              </div>
                            </td>
                            <td>—</td>
                            <td>1,204</td>
                            <td><span class="badge text-bg-success">Active</span></td>
                            <td class="text-end">
                              <div class="btn-group btn-group-sm">
                                <button type="button" class="btn btn-outline-secondary" aria-label="Edit Electronics"><i class="bi bi-pencil"></i></button>
                                <button type="button" class="btn btn-outline-danger" aria-label="Delete Electronics"><i class="bi bi-trash"></i></button>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="d-flex align-items-center">
                                <i class="bi bi-phone fs-5 text-primary me-2"></i>
                                <span class="fw-medium">Mobile Accessories</span>
                              </div>
                            </td>
                            <td>Electronics</td>
                            <td>412</td>
                            <td><span class="badge text-bg-success">Active</span></td>
                            <td class="text-end">
                              <div class="btn-group btn-group-sm">
                                <button type="button" class="btn btn-outline-secondary" aria-label="Edit Mobile Accessories"><i class="bi bi-pencil"></i></button>
                                <button type="button" class="btn btn-outline-danger" aria-label="Delete Mobile Accessories"><i class="bi bi-trash"></i></button>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="d-flex align-items-center">
                                <i class="bi bi-bag fs-5 text-primary me-2"></i>
                                <span class="fw-medium">Fashion &amp; Apparel</span>
                              </div>
                            </td>
                            <td>—</td>
                            <td>980</td>
                            <td><span class="badge text-bg-success">Active</span></td>
                            <td class="text-end">
                              <div class="btn-group btn-group-sm">
                                <button type="button" class="btn btn-outline-secondary" aria-label="Edit Fashion &amp; Apparel"><i class="bi bi-pencil"></i></button>
                                <button type="button" class="btn btn-outline-danger" aria-label="Delete Fashion &amp; Apparel"><i class="bi bi-trash"></i></button>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="d-flex align-items-center">
                                <i class="bi bi-person fs-5 text-primary me-2"></i>
                                <span class="fw-medium">Men's Wear</span>
                              </div>
                            </td>
                            <td>Fashion &amp; Apparel</td>
                            <td>310</td>
                            <td><span class="badge text-bg-success">Active</span></td>
                            <td class="text-end">
                              <div class="btn-group btn-group-sm">
                                <button type="button" class="btn btn-outline-secondary" aria-label="Edit Men's Wear"><i class="bi bi-pencil"></i></button>
                                <button type="button" class="btn btn-outline-danger" aria-label="Delete Men's Wear"><i class="bi bi-trash"></i></button>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="d-flex align-items-center">
                                <i class="bi bi-boot fs-5 text-primary me-2"></i>
                                <span class="fw-medium">Footwear</span>
                              </div>
                            </td>
                            <td>—</td>
                            <td>540</td>
                            <td><span class="badge text-bg-success">Active</span></td>
                            <td class="text-end">
                              <div class="btn-group btn-group-sm">
                                <button type="button" class="btn btn-outline-secondary" aria-label="Edit Footwear"><i class="bi bi-pencil"></i></button>
                                <button type="button" class="btn btn-outline-danger" aria-label="Delete Footwear"><i class="bi bi-trash"></i></button>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="d-flex align-items-center">
                                <i class="bi bi-house fs-5 text-primary me-2"></i>
                                <span class="fw-medium">Home &amp; Living</span>
                              </div>
                            </td>
                            <td>—</td>
                            <td>670</td>
                            <td><span class="badge text-bg-success">Active</span></td>
                            <td class="text-end">
                              <div class="btn-group btn-group-sm">
                                <button type="button" class="btn btn-outline-secondary" aria-label="Edit Home &amp; Living"><i class="bi bi-pencil"></i></button>
                                <button type="button" class="btn btn-outline-danger" aria-label="Delete Home &amp; Living"><i class="bi bi-trash"></i></button>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="d-flex align-items-center">
                                <i class="bi bi-basket fs-5 text-primary me-2"></i>
                                <span class="fw-medium">Groceries</span>
                              </div>
                            </td>
                            <td>—</td>
                            <td>215</td>
                            <td><span class="badge text-bg-success">Active</span></td>
                            <td class="text-end">
                              <div class="btn-group btn-group-sm">
                                <button type="button" class="btn btn-outline-secondary" aria-label="Edit Groceries"><i class="bi bi-pencil"></i></button>
                                <button type="button" class="btn btn-outline-danger" aria-label="Delete Groceries"><i class="bi bi-trash"></i></button>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="d-flex align-items-center">
                                <i class="bi bi-heart-pulse fs-5 text-primary me-2"></i>
                                <span class="fw-medium">Beauty &amp; Health</span>
                              </div>
                            </td>
                            <td>—</td>
                            <td>0</td>
                            <td><span class="badge text-bg-secondary">Inactive</span></td>
                            <td class="text-end">
                              <div class="btn-group btn-group-sm">
                                <button type="button" class="btn btn-outline-secondary" aria-label="Edit Beauty &amp; Health"><i class="bi bi-pencil"></i></button>
                                <button type="button" class="btn btn-outline-danger" aria-label="Delete Beauty &amp; Health"><i class="bi bi-trash"></i></button>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </main>
@endsection
