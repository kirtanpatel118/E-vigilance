<h1>Update Employee</h1>
									<div class="d-flex flex-column flex-lg-row mb-17">
										<div class="flex-lg-row-fluid me-0 me-lg-20">
											<form action="" class="form mb-15" method="post" id="kt_careers_form">
												<div class="row mb-5">
													<div class="col-md-6 fv-row">
														<label class="required fs-5 fw-bold mb-2">Full Name</label>
														<input type="text" class="form-control form-control-solid" placeholder=""  value="<?php echo $empdata['fullname'];?>" name="fullname" required />
													</div>

													<div class="col-md-6 fv-row">
														<label class="required fs-5 fw-bold mb-2">Email</label>
														<input class="form-control form-control-solid" placeholder="" value="<?php echo $empdata['email'];?>" name="email" required/>
													</div>
													
													<div class="col-md-6 fv-row">
														<label class="required fs-5 fw-bold mb-2">Phone</label>
														<input class="form-control form-control-solid" placeholder="" value="<?php echo $empdata['Phone'];?>" name="Phone" required/>
													</div>
													
												</div>
												<input type="hidden" value="<?php echo $empdata['uid'];?>" name="uid" />
												<div class="row mb-5">
														<div class="col-md-6 fv-row">
															<label class="required fs-5 fw-bold mb-2">Branch</label>
															<input type="text" class="form-control form-control-solid" placeholder="" value="<?php  echo $empdata['branch'];   ?>" name="branch" required/>
														</div>

														<div class="col-md-6 fv-row">
															<label class="required fs-5 fw-bold mb-2">Position</label>
															<input class="form-control form-control-solid" placeholder="" value="<?php  echo $empdata['position'];   ?>" name="position" required/>
														</div>

													
												</div>
                                                       
													<div class="separator mb-8"></div>
												<button type="submit" value="submit" class="btn btn-primary" 
												id="kt_careers_submit_button">
													<span class="indicator-label">Submit</span>
													<span class="indicator-progress">Please wait...
													<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
												</button>
											</form>
										</div>
									</div>

                                
<script>

	$(function() {


		$('#kt_careers_form').on('submit', function(e) {

			e.preventDefault();
			var formdata = new FormData(this);

			$.ajax({
				url: "<?= base_url('update_employee') ?>",
				type: "POST",
				cache: false,
				data: formdata,
				processData: false,
				contentType: false,
				dataType: "JSON",
				enctype: "multipart/form-data",
				success: function(Response) {
					if(Response.success== true){
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
					window.location.href = '<?= base_url('viewemp') ?>';          

					},2000);	
		
					}else{
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
					alert("An error occured: " + xhr.status + " " + xhr.statusText);
				},
			});
		});
	});

</script>