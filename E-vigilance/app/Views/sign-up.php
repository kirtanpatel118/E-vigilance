<!DOCTYPE html>
<html lang="en">
	<head><base href="../../../">
		<title>Sign-up</title>
		<meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Keenthemes | Metronic" />
		<link rel="canonical" href="Https://preview.keenthemes.com/metronic8" />
		<link rel="shortcut icon" href="<?php echo base_url('assets/media/logos/satyamev_logo.png');?>" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<link href="<?php echo base_url('assets/plugins/global/plugins.bundle.css'); ?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets/css/style.bundle.css');?>" rel="stylesheet" type="text/css" />
		<style>
			#img{
				background-size: 100% 100%;
			
			}
			.lg{
				color:darkblue;
				font-size: 25px;
			}
			.lgg{
				height: 100px;
			}
			</style>
	</head>
	<body id="kt_body" class="bg-body">
		<div class="d-flex flex-column flex-root">
			<div id="img" class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(<?php echo base_url('assets/media/illustrations/sketchy-1/newp.png');?>)">
				<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
					<a href="../../demo4/dist/index.html" class="mb-12">
						<img alt="Logo" src="<?php echo base_url('assets/media/logos/1.png');?> " class="h-40px" />
					</a>
					<div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
						<form class="form w-100" novalidate="novalidate" id="kt_sign_up_form">
							<div class="mb-10 text-center">
								<h1 class="text-dark mb-3">Create an Account</h1>
								<div class="text-gray-400 fw-bold fs-4">Already have an account?
								<a href="<?php echo base_url('/'); ?>" class="link-primary fw-bolder">Sign in here</a></div>
								</div>
							<div class="d-flex align-items-center mb-10">
								<div class="border-bottom border-gray-300 mw-50 w-100"></div>
								<span class="fw-bold text-gray-400 fs-7 mx-2">OR</span>
								<div class="border-bottom border-gray-300 mw-50 w-100"></div>
							</div>
							<div class="row fv-row mb-7">
							<div class="fv-row mb-7">
								<label class="required form-label fw-bolder text-dark fs-6">User Name</label>
								<input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="fullname" autocomplete="off" />
							</div>
								</div>
							<div class="fv-row mb-7">
								<label class="required form-label fw-bolder text-dark fs-6">Email</label>
								<input class="form-control form-control-lg form-control-solid" type="email" placeholder="" name="email" autocomplete="off" />
							</div>
							<div class="fv-row mb-7">
								<label class="required form-label fw-bolder text-dark fs-6">City</label>
								<input class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="branch" autocomplete="off" />
							</div>

							<div class="col-md-6 fv-row">														
								<label class="required fs-5 fw-bold mb-2">Joining Date</label>														
								<input type="date" class="form-control form-control-solid" placeholder="" name="joiningdate" />						
							</div>
							
						<div class="mb-10 fv-row" data-kt-password-meter="true">
								<div class="mb-1">
									<label class="required form-label fw-bolder text-dark fs-6">Password</label>
									<div class="position-relative mb-3">
										<input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password" autocomplete="off" />
										<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
											<i class="bi bi-eye-slash fs-2"></i>
											<i class="bi bi-eye fs-2 d-none"></i>
										</span>
									</div>
									
									<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
										<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
										<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
										<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
										<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
									</div>
									</div>
								<div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp; symbols.</div>
								</div>
						<div class="form-check form-check-custom form-check-solid form-check-lg">
    <input class="form-check-input" type="radio" value="0" name="position" id="flexCheckboxSm"  />
    <label class="form-check-label" for="flexCheckboxSm" >
        Admin&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    </label>
							<input class="form-check-input" type="radio" value="1" name="position" id="flexCheckboxSm " checked  />
    <label class="form-check-label" for="flexCheckboxSm" >
        User
    </label>
</div>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
							
							<div class="text-center">
								<button type="button" id="kt_sign_up_submit" class="btn btn-lg btn-primary">
									<span id="sub"class="indicator-label">Submit</span>
									<span id="loader2" class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button>
							</div>
							</form>
						</div>
					</div>
				<div class="d-flex flex-center flex-column-auto p-10">
					<div class="d-flex align-items-center fw-bold fs-6">
						<a href="" class="text-muted text-hover-primary px-2">About</a>
						<a href="" class="text-muted text-hover-primary px-2">Contact</a>
						<a href="" class="text-muted text-hover-primary px-2">Contact Us</a>
					</div>
					</div>
				</div>
			</div>
		<script>var hostUrl = "assets/";</script>
		<script src="<?php echo base_url('assets/plugins/global/plugins.bundle.js');?> "></script>
		<script src="<?php echo base_url('assets/js/scripts.bundle.js');?> "></script>
		<script src="<?php echo base_url('assets/js/custom/authentication/sign-up/general.js');?>"></script>
		<script>

	$(function() {


			$('#kt_careers_form').on('submit', function(e) {

				$('#sub').hide();
				$('#loader2').show();

				e.preventDefault();
				var formdata = new FormData(this);

				$.ajax({
					url: "<?= base_url('store_employee') ?>",
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
						window.location.href = '<?= base_url('sign-in') ?>';          

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
</body>
</html>