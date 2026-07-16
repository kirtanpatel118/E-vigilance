<h1>Complaints Feedback</h1>

<div class="card mb-5">
    <div class="card-body">
        <table id="kt_feedback_table" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
            <thead>
                <tr class="fw-bolder fs-6 text-gray-800 px-7">
                    <th class="text-dark fw-bolder my-1 fs-3">#</th>
                    <th class="text-dark fw-bolder my-1 fs-3 min-w-200px">Complaint</th>
                    <th class="text-dark fw-bolder my-1 fs-3 min-w-150px">Submitted By</th>
                    <th class="text-dark fw-bolder my-1 fs-3">City</th>
                    <th class="text-dark fw-bolder my-1 fs-3">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($hwddata)): ?>
                    <?php foreach ($hwddata as $i => $row): ?>
                    <tr>
                        <td class="text-gray-600 fw-bold fs-6"><?php echo $row['complaint_id']; ?></td>
                        <td class="text-gray-600 fw-bold fs-6"><?php echo htmlspecialchars($row['complaint']); ?></td>
                        <td class="text-gray-600 fw-bold fs-6"><?php echo htmlspecialchars($row['username']); ?></td>
                        <td class="text-gray-600 fw-bold fs-6"><?php echo htmlspecialchars($row['city']); ?></td>
                        <td><span class="badge badge-light-success">Received</span></td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="5" class="text-center text-muted py-10">No complaints found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="<?php echo base_url('assets/plugins/custom/datatables/datatables.bundle.js') ?>"></script>
<script>
$("#kt_feedback_table").DataTable({
    "language": { "lengthMenu": "Show _MENU_" },
    "dom":
        "<'row'" +
        "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
        "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
        ">" +
        "<'table-responsive'tr>" +
        "<'row'" +
        "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
        "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
        ">"
});
</script>
