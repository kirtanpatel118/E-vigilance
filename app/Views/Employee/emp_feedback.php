<h1>My Feedback</h1>

<div class="card mb-5">
    <div class="card-body">
        <table id="kt_empfeedback_table" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
            <thead>
                <tr class="fw-bolder fs-6 text-gray-800 px-7">
                    <th>#</th>
                    <th class="min-w-200px">Complaint</th>
                    <th class="min-w-150px">Submitted By</th>
                    <th>City</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($hwddata)): ?>
                    <?php foreach ($hwddata as $row): ?>
                    <tr>
                        <td class="text-gray-600 fw-bold fs-6"><?= $row['complaint_id'] ?></td>
                        <td class="text-gray-600 fw-bold fs-6"><?= esc($row['complaint']) ?></td>
                        <td class="text-gray-600 fw-bold fs-6"><?= esc($row['username']) ?></td>
                        <td class="text-gray-600 fw-bold fs-6"><?= esc($row['city']) ?></td>
                        <td><span class="badge badge-light-success">Received</span></td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="5" class="text-center text-muted py-10">No feedback found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
$("#kt_empfeedback_table").DataTable({
    language: { lengthMenu: "Show _MENU_" },
    dom: "<'row'<'col-sm-6'l><'col-sm-6'f>><'table-responsive'tr><'row'<'col-sm-5'i><'col-sm-7'p>>"
});
</script>
