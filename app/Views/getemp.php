<h1>Employee Management</h1>

<table id="kt_emp_table" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
    <thead>
        <tr class="fw-bolder fs-6 text-gray-800 px-7">
            <th>ID</th>
            <th class="min-w-150px">Full Name</th>
            <th>Email</th>
            <th>City</th>
            <th>Position</th>
            <th>Joining Date</th>
            <th>Status</th>
            <th class="min-w-150px">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($employees)): ?>
            <?php foreach ($employees as $row): ?>
            <tr>
                <td class="text-gray-600 fw-bold fs-6"><?= $row['uid'] ?></td>
                <td class="text-gray-600 fw-bold fs-6"><?= esc($row['fullname']) ?></td>
                <td class="text-gray-600 fw-bold fs-6"><?= esc($row['email']) ?></td>
                <td class="text-gray-600 fw-bold fs-6"><?= esc($row['branch']) ?></td>
                <td class="text-gray-600 fw-bold fs-6"><?= esc($row['position']) ?></td>
                <td class="text-gray-600 fw-bold fs-6"><?= esc($row['joining_date']) ?></td>
                <td>
                    <?php if(($row['status'] ?? 1) == 1): ?>
                        <span class="badge badge-light-success">Active</span>
                    <?php else: ?>
                        <span class="badge badge-light-danger">Inactive</span>
                    <?php endif; ?>
                </td>
                <td>
                    <ul class="list-inline m-0">
                        <li class="list-inline-item">
                            <button class="btn btn-warning btn-sm toggle-status" value="<?= $row['uid'] ?>" title="Toggle Status">
                                <i class="bi bi-toggle-on"></i>
                            </button>
                        </li>
                        <li class="list-inline-item">
                            <a href="<?= base_url('update_emp/'.$row['uid']) ?>">
                                <button class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></button>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <button class="btn btn-danger btn-sm del-emp" value="<?= $row['uid'] ?>" title="Delete">
                                <i class="fa fa-trash"></i>
                            </button>
                        </li>
                    </ul>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="8" class="text-center text-muted py-10">No employees found.</td></tr>
        <?php endif; ?>
    </tbody>
</table>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
$("#kt_emp_table").DataTable({
    language: { lengthMenu: "Show _MENU_" },
    dom: "<'row'<'col-sm-6'l><'col-sm-6'f>><'table-responsive'tr><'row'<'col-sm-5'i><'col-sm-7'p>>"
});

$('.toggle-status').click(function () {
    var uid = $(this).val();
    new swal({ title: "Toggle employee status?", icon: "warning", buttons: true, dangerMode: false })
        .then((confirmed) => {
            if (confirmed) {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('stspdate') ?>",
                    data: { bid: uid },
                    dataType: "JSON",
                    success: function (r) {
                        new swal({ title: r.status, icon: r.success ? "success" : "error" })
                            .then(() => window.location.reload());
                    }
                });
            }
        });
});

$('.del-emp').click(function () {
    var uid = $(this).val();
    new swal({ title: "Are you sure?", text: "This employee will be permanently deleted.", icon: "warning", buttons: true, dangerMode: true })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('delete_employee') ?>",
                    data: { bid: uid },
                    dataType: "JSON",
                    success: function (r) {
                        new swal({ title: r.status, icon: r.success ? "success" : "error" })
                            .then(() => window.location.reload());
                    }
                });
            }
        });
});
</script>
