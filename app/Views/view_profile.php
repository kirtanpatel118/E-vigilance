<div class="card mb-5 mb-xxl-8">
    <div class="card-body pt-9 pb-0">
        <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
            <div class="me-7 mb-4">
                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                    <img src="<?php echo base_url('uploads/'.$userdata['photo']) ?>" alt="profile" style="width:120px;height:120px;object-fit:cover;border-radius:8px;" />
                    <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px"></div>
                </div>
            </div>
            <div class="flex-grow-1">
                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                    <div class="d-flex flex-column">
                        <div class="d-flex align-items-center mb-2">
                            <span class="text-gray-800 text-hover-primary fs-2 fw-bolder me-1"><?= esc($userdata['fullname']) ?></span>
                        </div>
                        <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                            <span class="d-flex align-items-center text-gray-400 me-5 mb-2">
                                <i class="bi bi-person-badge me-1"></i><?= esc($userdata['position']) ?>
                            </span>
                            <span class="d-flex align-items-center text-gray-400 me-5 mb-2">
                                <i class="bi bi-envelope me-1"></i><?= esc($userdata['email']) ?>
                            </span>
                            <span class="d-flex align-items-center text-gray-400 mb-2">
                                <i class="bi bi-geo-alt me-1"></i><?= esc($userdata['branch']) ?>
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
