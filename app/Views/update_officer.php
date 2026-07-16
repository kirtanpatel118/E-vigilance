<h1>Update Officer</h1>
<div class="d-flex flex-column flex-lg-row mb-17">
    <div class="flex-lg-row-fluid me-0 me-lg-20">
        <form class="form mb-15" method="post" id="kt_officer_form">
            <input type="hidden" name="uid" value="<?php echo $officer['uid']; ?>" />
            <div class="row mb-5">
                <div class="col-md-6 fv-row">
                    <label class="required fs-5 fw-bold mb-2">Full Name</label>
                    <input type="text" class="form-control form-control-solid" name="fullname" value="<?php echo $officer['fullname']; ?>" required />
                </div>
                <div class="col-md-6 fv-row">
                    <label class="required fs-5 fw-bold mb-2">Email</label>
                    <input type="email" class="form-control form-control-solid" name="email" value="<?php echo $officer['email']; ?>" required />
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-6 fv-row">
                    <label class="required fs-5 fw-bold mb-2">City / Branch</label>
                    <input type="text" class="form-control form-control-solid" name="branch" value="<?php echo $officer['branch']; ?>" required />
                </div>
                <div class="col-md-6 fv-row">
                    <label class="required fs-5 fw-bold mb-2">Position</label>
                    <input type="text" class="form-control form-control-solid" name="position" value="<?php echo $officer['position']; ?>" required />
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-6 fv-row">
                    <label class="fs-5 fw-bold mb-2">Joining Date</label>
                    <input type="date" class="form-control form-control-solid" name="joining_date" value="<?php echo $officer['joining_date']; ?>" />
                </div>
            </div>
            <div class="separator mb-8"></div>
            <button type="submit" class="btn btn-primary" id="kt_officer_submit">
                <span id="sub" class="indicator-label">Submit</span>
                <span id="loader2" class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                </span>
            </button>
            <a href="<?= base_url('viewofficer') ?>" class="btn btn-secondary ms-2">Cancel</a>
        </form>
    </div>
</div>

<script>
$(function() {
    $('#kt_officer_form').on('submit', function(e) {
        e.preventDefault();
        $('#sub').hide();
        $('#loader2').show();
        var formdata = new FormData(this);
        $.ajax({
            url: "<?= base_url('update_officer_store') ?>",
            type: "POST",
            cache: false,
            data: formdata,
            processData: false,
            contentType: false,
            dataType: "JSON",
            success: function(Response) {
                $('#sub').show();
                $('#loader2').hide();
                Swal.fire({ title: Response.msg });
                if (Response.success) {
                    setTimeout(function() {
                        window.location.href = '<?= base_url('viewofficer') ?>';
                    }, 1500);
                }
            },
            error: function(xhr) {
                $('#sub').show();
                $('#loader2').hide();
                alert("An error occurred: " + xhr.status + " " + xhr.statusText);
            }
        });
    });
});
</script>
