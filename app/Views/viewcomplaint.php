<section>
    <table id="kt_datatable_example_1" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
        <thead>
            <tr class="fw-bolder fs-6 text-gray-800 px-7">
                <th>Complaint Id</th>
                <th>Complaint</th>
                <th>User Name</th>
                <th>City</th>
                <th>Photo</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hwddata as $row): ?>
            <tr>
                <td class="text-gray-600 fw-bold fs-6"><?= $row['complaint_id'] ?></td>
                <td class="text-gray-600 fw-bold fs-6"><?= esc($row['complaint']) ?></td>
                <td class="text-gray-600 fw-bold fs-6"><?= esc($row['username']) ?></td>
                <td class="text-gray-600 fw-bold fs-6"><?= esc($row['city']) ?></td>
                <td><?php if(!empty($row['photo']) && $row['photo'] !== 'default.jpg'): ?>
                    <img src="<?= base_url('uploads/'.esc($row['photo'])) ?>" style="width:50px;height:50px;object-fit:cover;border-radius:4px;" />
                <?php else: ?><span class="text-muted">No photo</span><?php endif; ?></td>
                <td>
                    <button class="btn btn-danger btn-sm" onclick="deletefun(<?= $row['complaint_id'] ?>)">
                        <i class="bi bi-trash"></i> Delete
                    </button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
$("#kt_datatable_example_1").DataTable({
    language: { lengthMenu: "Show _MENU_" },
    dom: "<'row'<'col-sm-6'l><'col-sm-6'f>><'table-responsive'tr><'row'<'col-sm-5'i><'col-sm-7'p>>"
});

function deletefun(id) {
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this complaint.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "POST",
                data: { complaint_id: id },
                url: "<?= base_url('delete_complaint') ?>",
                dataType: "JSON",
                success: function (r) {
                    swal(r.status, { icon: r.success ? "success" : "error" })
                        .then(() => window.location.reload());
                }
            });
        }
    });
}
</script>
