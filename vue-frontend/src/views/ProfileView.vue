<template>
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex flex-wrap justify-content-between align-items-center py-3 mb-3 gap-2">
      <h4 class="fw-bold mb-0"><span class="text-muted fw-light">Account / </span>My Profile</h4>
    </div>
    <div class="row g-4">
      <div class="col-lg-4"><div class="card mb-4"><div class="card-body text-center">
        <div class="avatar avatar-xl mx-auto mb-3"><span class="avatar-initial rounded-circle bg-label-primary">MA</span></div><h5 class="mb-1">Morgan Admin</h5><p class="text-muted mb-2">Marketplace administrator</p><span class="badge bg-label-success">Active</span>
      </div></div><div class="card"><div class="card-header"><h5 class="mb-0">Account security</h5></div><div class="card-body"><p class="text-muted">Update your password to keep your account secure.</p><button class="btn btn-outline-primary" type="button" data-mv-toast="Password reset email sent (demo).">Change password</button></div></div></div>
      <div class="col-lg-8">
        <form class="card mb-4" data-mv-demo="Profile updated (demo)."><div class="card-header"><h5 class="mb-0">Personal information</h5></div><div class="card-body">
          <div class="row g-3"><div class="col-md-6"><label class="form-label" for="profile-name">Full name</label><input id="profile-name" class="form-control" value="Morgan Admin" /></div><div class="col-md-6"><label class="form-label" for="profile-email">Email</label><input id="profile-email" class="form-control" type="email" value="morgan@bazaarly.com" /></div><div class="col-md-6"><label class="form-label" for="profile-phone">Phone</label><input id="profile-phone" class="form-control" value="+1 555 0100" /></div></div>
          <div class="d-flex justify-content-end mt-4"><button class="btn btn-primary" type="submit">Save changes</button></div>
        </div></form>
        <div class="card"><div class="card-header"><h5 class="mb-0">Recent activity</h5></div><div class="card-body"><div class="d-flex justify-content-between border-bottom py-2"><span>Signed in to admin dashboard</span><small class="text-muted">Today</small></div><div class="d-flex justify-content-between py-2"><span>Updated marketplace settings</span><small class="text-muted">Yesterday</small></div></div></div>
      </div>
    </div>
  </div>
</template>
