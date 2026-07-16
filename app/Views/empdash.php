<div class="row g-5 g-xl-8 mb-5">
    <div class="col-12">
        <div class="card bg-primary hoverable card-xl-stretch mb-xl-8">
            <div class="card-body d-flex align-items-center">
                <i class="bi bi-person-circle text-white fs-3x me-5"></i>
                <div>
                    <div class="text-white fw-bolder fs-2 mb-1">Welcome, <?= esc($userdata['fullname'] ?? 'User') ?>!</div>
                    <div class="fw-bold text-white opacity-75"><?= esc($userdata['position'] ?? '') ?> &mdash; <?= esc($userdata['branch'] ?? '') ?></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-5">
    <div class="col-xl-6">
        <div class="card h-100">
            <div class="card-body d-flex flex-column align-items-center justify-content-center py-10">
                <i class="bi bi-clipboard-plus fs-3x text-primary mb-4"></i>
                <h4 class="fw-bolder mb-3">Submit a Complaint</h4>
                <p class="text-muted text-center mb-5">Report an issue or concern to the administration.</p>
                <a href="<?= base_url('complaint') ?>" class="btn btn-primary">Create Complaint</a>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card h-100">
            <div class="card-body d-flex flex-column align-items-center justify-content-center py-10">
                <i class="bi bi-person-gear fs-3x text-success mb-4"></i>
                <h4 class="fw-bolder mb-3">My Profile</h4>
                <p class="text-muted text-center mb-5">View and update your personal information.</p>
                <a href="<?= base_url('view_profile') ?>" class="btn btn-success">View Profile</a>
            </div>
        </div>
    </div>
</div>
