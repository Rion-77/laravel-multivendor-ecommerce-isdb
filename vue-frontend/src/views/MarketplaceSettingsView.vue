<template>
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex flex-wrap justify-content-between align-items-center py-3 mb-3 gap-2">
      <h4 class="fw-bold mb-0"><span class="text-muted fw-light">System / </span>Marketplace Settings</h4>
    </div>
    <form class="row g-4" data-mv-demo="Marketplace settings saved (demo).">
      <div class="col-lg-8">
        <div class="card mb-4"><div class="card-header"><h5 class="mb-0">General settings</h5></div><div class="card-body">
          <div class="mb-3"><label class="form-label" for="marketplace-name">Marketplace name</label><input id="marketplace-name" class="form-control" value="Bazaarly" /></div>
          <div class="mb-3"><label class="form-label" for="marketplace-email">Support email</label><input id="marketplace-email" type="email" class="form-control" value="support@bazaarly.com" /></div>
          <div class="row"><div class="col-md-6 mb-3"><label class="form-label" for="currency">Currency</label><select id="currency" class="form-select"><option>USD ($)</option><option>EUR (€)</option><option>GBP (£)</option></select></div><div class="col-md-6 mb-3"><label class="form-label" for="timezone">Timezone</label><select id="timezone" class="form-select"><option>UTC</option><option>America/New_York</option></select></div></div>
          <div><label class="form-label" for="marketplace-description">Description</label><textarea id="marketplace-description" class="form-control" rows="3">A marketplace for independent shops and customers.</textarea></div>
        </div></div>
        <div class="card"><div class="card-header"><h5 class="mb-0">Vendor settings</h5></div><div class="card-body">
          <div class="form-check form-switch mb-3"><input id="vendor-registration" class="form-check-input" type="checkbox" checked /><label class="form-check-label" for="vendor-registration">Allow vendor registrations</label></div>
          <div class="form-check form-switch"><input id="vendor-approval" class="form-check-input" type="checkbox" checked /><label class="form-check-label" for="vendor-approval">Require approval for new products</label></div>
        </div></div>
      </div>
      <div class="col-lg-4"><div class="card"><div class="card-header"><h5 class="mb-0">Save changes</h5></div><div class="card-body">
        <p class="text-muted">Changes apply to the marketplace storefront and vendor portal.</p><button class="btn btn-primary w-100" type="submit">Save settings</button>
      </div></div></div>
    </form>
  </div>
</template>
