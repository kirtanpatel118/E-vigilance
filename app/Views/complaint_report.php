<h4 class="fw-bolder mb-5">Complaint Report</h4>

<div class="row mb-5">
    <div class="col-md-3 fv-row">
        <label class="text-dark fw-bolder fs-6 mb-2">Filter by City</label>
        <select name="cityfilter" id="cityfilter" class="form-select form-select-solid">
            <option value="">All Cities</option>
            <?php
            $cities = array_unique(array_column($hwddata, 'city'));
            foreach ($cities as $city): ?>
            <option value="<?= esc($city) ?>"><?= esc($city) ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="col-md-2 d-flex align-items-end">
        <button id="resetbtn" class="btn btn-secondary">Reset</button>
    </div>
</div>

<div class="separator mb-8"></div>

<section>
    <table id="kt_datatable_example_2" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
        <thead>
            <tr class="fw-bolder fs-6 text-gray-800 px-7">
                <th>ID</th>
                <th>Complaint</th>
                <th>Username</th>
                <th>City</th>
                <th>Photo</th>
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
                    <img src="<?= base_url('uploads/'.esc($row['photo'])) ?>" style="width:40px;height:40px;object-fit:cover;border-radius:4px;" />
                <?php else: ?><span class="text-muted">—</span><?php endif; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>

<script>
var dt = $("#kt_datatable_example_2").DataTable({
    scrollX: true,
    dom: 'Bfrtip',
    buttons: [{ extend: 'csv', text: 'Export CSV' }]
});

$('#cityfilter').change(function () {
    dt.columns(3).search($(this).val()).draw();
});

$('#resetbtn').click(function () {
    $('#cityfilter').val('');
    dt.columns().search('').draw();
});
</script>
