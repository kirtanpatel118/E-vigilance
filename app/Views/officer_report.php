<h4 class="fw-bolder mb-5">Officer Report</h4>

<div class="row mb-5">
    <div class="col-md-3 fv-row">
        <label class="text-dark fw-bolder fs-6 mb-2">Filter by City</label>
        <select id="cityfilter" class="form-select form-select-solid">
            <option value="">All Cities</option>
            <?php
            $cities = array_unique(array_column($sql, 'branch'));
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
    <table id="kt_officer_report_table" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
        <thead>
            <tr class="fw-bolder fs-6 text-gray-800 px-7">
                <th>Officer Id</th>
                <th>Officer Name</th>
                <th>Email</th>
                <th>City</th>
                <th>Position</th>
                <th>Joining Date</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($sql as $val): ?>
            <tr>
                <td class="text-gray-600 fw-bold fs-6"><?= $val['uid'] ?></td>
                <td class="text-gray-600 fw-bold fs-6"><?= esc($val['fullname']) ?></td>
                <td class="text-gray-600 fw-bold fs-6"><?= esc($val['email']) ?></td>
                <td class="text-gray-600 fw-bold fs-6"><?= esc($val['branch']) ?></td>
                <td class="text-gray-600 fw-bold fs-6"><?= esc($val['position']) ?></td>
                <td class="text-gray-600 fw-bold fs-6"><?= esc($val['joining_date']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>

<script>
var dt = $("#kt_officer_report_table").DataTable({
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
