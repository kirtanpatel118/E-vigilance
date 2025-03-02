<div class="d-flex flex-column flex-lg-row mb-17">
										<div class="flex-lg-row-fluid me-0 me-lg-20">
											<form  class="form mb-15" method="post" id="kt_careers_form" enctype="multipart/form-data">
												<div class="row mb-5">
													<div class="col-md-6 fv-row">
														<label class=" fs-5 fw-bold mb-2">Full Name</label>
														<input type="text" class="form-control form-control-solid" placeholder="" value="" name="fullname"/>
													</div>											
												</div>
												<div class="row mb-5">
														<div class="col-md-6 fv-row">
															<label class=" fs-5 fw-bold mb-2">City</label>
															<input type="text" class="form-control form-control-solid" placeholder="" value="" name="branch"/>
														</div>
												</div>
												<div class="row mb-5">
													<div class="col-md-6 fv-row">
														<label class=" fs-5 fw-bold mb-2">Complaint</label>
														<input type="text" class="form-control form-control-solid" placeholder=""  name="complaint"/>
													</div>											
												</div>
												<div class="row mb-5">
													<div class="col-md-6 fv-row">													
														<label class="fs-5 fw-bold mb-2">Upload Picture</label>
													</div>
														<div class="me-7 mb-4">
															<div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
																<?php $image = $userdata['photo'] ?> 
																<img src="<?php echo base_url("uploads/".$image) ?>" alt="image" />															
															</div>
														</div>
													
												</div>
                                                <div class="d-flex flex-column mb-5">
                                                            <label class="fs-5 fw-bold mb-2">Profile Picture</label>
                                                            <input type="file" id="emppic"  name="emppic"  multiple  class="form-control form-control-solid"  accept="image/png, image/gif, image/jpeg, image/jpg">
                                                            <label for="Profile-pic" class="choose-icon"><i class="fa fa-camera" aria-hidden="true"></i></label>
                                                </div>
												<div class="separator mb-8"></div>
												<button type="submit" value="submit" class="btn btn-primary" id="kt_careers_submit_button">
													<span id="sub"class="indicator-label">Submit</span>
													<span id="loader2"class="indicator-progress">Please wait...

													<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
													</button>
												<button type="reset" value="reset" class="btn btn-primary" id="kt_careers_submit_button">
													<span class="indicator-label">Reset</span>
												</button>
											</form>
										</div>
</div>

<script>

	$(function() {


			$('#kt_careers_form').on('submit', function(e) {

				$('#sub').hide();
				$('#loader2').show();

				e.preventDefault();
				var formdata = new FormData(this);

				$.ajax({
					url: "<?= base_url('store_complaint') ?>",
					type: "POST",
					cache: false,
					data: formdata,
					processData: false,
					contentType: false,
					dataType: "JSON",
					enctype: "multipart/form-data",
					success: function(Response) {
						if(Response.success== true){
							$('#sub').show();
							$('#loader2').hide();
							Swal.fire({
											title: Response.msg,
											showClass: {
												popup: 'animate__animated animate__fadeInDown'
											},
											hideClass: {
												popup: 'animate__animated animate__fadeOutUp'
											}
											})
							
						setTimeout(()=>{
							window.location.href = '<?= base_url('viewempdashboard') ?>';
							},2000);	
			
						}else{
							$('#sub').show();
							$('#loader2').hide();
							Swal.fire({
											title: Response.msg,
											showClass: {
												popup: 'animate__animated animate__fadeInDown'
											},
											hideClass: {
												popup: 'animate__animated animate__fadeOutUp'
											}
											})
						setTimeout(()=>{

						},2000);
							
						}
					},
					error: function(xhr) {
						$('#sub').show();
						$('#loader2').hide();

						alert("An error occured: " + xhr.status + " " + xhr.statusText);
					},
				});
			});
		});

</script>