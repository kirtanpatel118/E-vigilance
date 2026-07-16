<?php
$totalComplaints = count($hwddata ?? []);
$totalOfficers   = count($assdata ?? []);
$totalEmployees  = count($empdata ?? []);
?>
<div class="row g-5 g-xl-8 mb-5">
    <div class="col-xl-4">
        <div class="card bg-primary hoverable card-xl-stretch mb-xl-8">
            <div class="card-body">
                <i class="bi bi-clipboard-data text-white fs-3x ms-n1 mb-3 d-block"></i>
                <div class="text-white fw-bolder fs-2 mb-2"><?= $totalComplaints ?></div>
                <div class="fw-bold text-white">Total Complaints</div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card bg-success hoverable card-xl-stretch mb-xl-8">
            <div class="card-body">
                <i class="bi bi-people text-white fs-3x ms-n1 mb-3 d-block"></i>
                <div class="text-white fw-bolder fs-2 mb-2"><?= $totalOfficers ?></div>
                <div class="fw-bold text-white">Total Officers</div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card bg-warning hoverable card-xl-stretch mb-xl-8">
            <div class="card-body">
                <i class="bi bi-person-check text-white fs-3x ms-n1 mb-3 d-block"></i>
                <div class="text-white fw-bolder fs-2 mb-2"><?= $totalEmployees ?></div>
                <div class="fw-bold text-white">Total Employees</div>
            </div>
        </div>
    </div>
</div>

<div class="card mb-5">
    <div class="card-header border-0 pt-5">
        <h3 class="card-title fw-bolder text-dark">Recent Complaints</h3>
        <div class="card-toolbar">
            <a href="<?= base_url('viewcomplaint') ?>" class="btn btn-sm btn-primary">View All</a>
        </div>
    </div>
    <div class="card-body py-3">
        <div class="table-responsive">
            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                <thead>
                    <tr class="fw-bolder text-muted">
                        <th>#</th>
                        <th>Complaint</th>
                        <th>Username</th>
                        <th>City</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (!empty($hwddata)): ?>
                    <?php foreach (array_slice($hwddata, 0, 5) as $row): ?>
                    <tr>
                        <td><?= $row['complaint_id'] ?></td>
                        <td><?= esc($row['complaint']) ?></td>
                        <td><?= esc($row['username']) ?></td>
                        <td><?= esc($row['city']) ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="4" class="text-center text-muted">No complaints yet</td></tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
