<div class="d-flex flex-column flex-lg-row mb-17">
										<div class="flex-lg-row-fluid me-0 me-lg-20">
											<form action="" class="form mb-15" method="post" id="kt_careers_form">
												<div class="row mb-5">
									
													<div class="col-md-6 fv-row">
													
														<label class="required fs-5 fw-bold mb-2">Full Name</label>
														
														<input type="text" class="form-control form-control-solid" placeholder="" name="fullname" required/>
														
													</div>
													
														<div class="col-md-6 fv-row">
															
															<label class="required fs-5 fw-bold mb-2">Email</label>
															
															<input class="form-control form-control-solid" placeholder="" name="email" required/>
															
														</div>
													</div>
												
                                                
												
                                                
												
												<div class="row mb-5">
													
													<div class="col-md-6 fv-row">
														
														<label class="required fs-5 fw-bold mb-2">Joining Date</label>
														
														<input type="date" class="form-control form-control-solid" placeholder="" name="joiningdate" />
														
													</div>

													
														<div class="col-md-6 fv-row">
														
															<label class="required fs-5 fw-bold mb-2">Position</label>
															
															<input class="form-control form-control-solid" placeholder="" name="position" required/>
															
														</div>
												</div>
    
												<div class="row mb-5">
														<div class="col-md-6 fv-row">
														
															<label class="required fs-5 fw-bold mb-2">City</label>
															<input type="text" class="form-control form-control-solid" placeholder="" name="branch" required/>
														
														</div>
																									
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
					url: "<?= base_url('store_officer') ?>",
					type: "POST",
					cache: false,
					data: formdata,
					processData: false,
					contentType: false,
					dataType: "JSON",
					enctype: "multipart/form-data",
					success: function(Response) {
						if(Response.success== true){
							$('#sub').hide();
							$('#loader2').show();
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
						window.location.href = '<?= base_url('viewofficer') ?>';          

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
						alert("An error occured: " + xhr.status + " " + xhr.statusText);
					},
				});
			});
		});

</script>