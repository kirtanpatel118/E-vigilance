<div class="card mb-5">
    <div class="card-body pt-9 pb-0">
        <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
            <div class="me-7 mb-4">
                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                    <?php
                    $_p = $userdata['photo'] ?? '150-26.jpg';
                    $_src = ($_p === '150-26.jpg') ? base_url('assets/media/avatars/150-26.jpg') : base_url('uploads/'.$_p);
                    ?>
                    <img src="<?= $_src ?>" alt="profile" style="object-fit:cover;width:120px;height:120px;border-radius:8px;" />
                </div>
            </div>
            <div class="flex-grow-1">
                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                    <div class="d-flex flex-column">
                        <div class="d-flex align-items-center mb-2">
                            <span class="text-gray-800 text-hover-primary fs-2 fw-bolder me-1"><?= esc($userdata['fullname']) ?></span>
                            <span class="badge badge-light-success ms-2">Admin</span>
                        </div>
                        <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                            <span class="d-flex align-items-center text-gray-400 me-5 mb-2">
                                <i class="bi bi-geo-alt me-1"></i><?= esc($userdata['branch']) ?>
                            </span>
                            <span class="d-flex align-items-center text-gray-400 mb-2">
                                <i class="bi bi-envelope me-1"></i><?= esc($userdata['email']) ?>
                            </span>
                        </div>
                    </div>
                    <div class="d-flex my-4">
                        <a href="<?= base_url('updateProfile') ?>" class="btn btn-sm btn-primary">Update Profile</a>
                    </div>
                </div>
                <div class="d-flex flex-wrap flex-stack">
                    <div class="d-flex flex-column flex-grow-1 pe-8">
                        <div class="d-flex flex-wrap">
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                <div class="fw-bold fs-6 text-gray-400">Joining Date</div>
                                <div class="fw-bolder fs-4"><?= esc($userdata['joining_date']) ?></div>
                            </div>
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                                <div class="fw-bold fs-6 text-gray-400">City / Branch</div>
                                <div class="fw-bolder fs-4"><?= esc($userdata['branch']) ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
