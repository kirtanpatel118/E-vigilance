<!DOCTYPE html>
<html lang="en">
	<head><base href="../../../">
		<title>e-Vigilance Complaint System</title>
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
		<link rel="shortcut icon" href="<?php echo base_url('assets/media/logos/satyamev_logo.png');?> "/>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<link href="<?php echo base_url('assets/plugins/global/plugins.bundle.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets/css/style.bundle.css');?>" rel="stylesheet" type="text/css" />
		<style>
			#backgroungimg{
				background-size: 100% 100%;

			}
			.lg{
				color:darkblue;
				font-size: 25px;
			}
			.lgo{
				height: 100px;
			}
			</style>
	</head>
	<body id="kt_body" class="bg-body">
		<div class="d-flex flex-column flex-root">
			<div id ="backgroungimg" class="d-flex flex-colum flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(<?php echo base_url('assets/media/illustrations/sketchy-1/newp.png');?>)">
		<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
		<a href="../../demo4/dist/index.html" class="mb-12">
		<img alt="Logo" class="lgo"src="<?php echo base_url('assets/media/logos/1.png');?>"class="h-60px position-x-center" /><span class="lg"><b>e-Vigilance Complaint System<b></span>
        </a>
		<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
		<form class="form w-100" novalidate="novalidate" method="post" name="kt_sign_in_form" 
						id="kt_sign_in_form" action="" >
						<div class="text-center mb-10">
								<h1 class="text-dark mb-3">Sign Into User</h1>
								<div class="text-dark-400 fw-bold fs-4">Create an account
								<a href="<?php echo base_url('sign-up');?>" class="link-primary fw-bolder">Sign-up</a></div>
						</div>
						<div class="fv-row mb-10">
							<label class="required form-label fs-6 fw-bolder text-dark">Email</label>
							<input class="form-control form-control-lg form-control-solid border-dark" type="text" id="username" name="username" autocomplete="off" required/>
						</div>
						<div class="fv-row mb-10">
							<div class="d-flex flex-stack mb-2">
								<label class="required form-label fw-bolder text-dark fs-6 mb-0">Password</label>
								<a href="<?php echo base_url('Home/frtpwd');?>" class="link-primary fs-6 fw-bolder">Forgot Password ?</a>
							</div>
							<input class="form-control form-control-lg form-control-solid border-dark" type="password" name="password" autocomplete="off" required/>
						</div>
						<div class="text-center">
							<button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
								<span id="cnte"class="indicator-label">Continue</span>
								<span id="loader1" class="indicator-progress">Please wait...
								<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
							</button>
							<div class="text-dark-400 fw-bold fs-4">Are You Admin?
								<a href="<?php echo base_url('signadmin');?>" class="link-primary fw-bolder">Login</a></div>
						</div>	
					</form>	
				</div>	
			</div>
			<div class="d-flex flex-center flex-column-auto p-100">
					
			</div>	
		</div>	
		<div class="d-flex flex-center flex-column-auto p-100">
			<div class="d-flex align-items-center fw-bold fs-6">
				<a href="" class="text-muted text-hover-primary px-2">About</a>
				<a href="" class="text-muted text-hover-primary px-2">Contact</a>
				<a href="" class="text-muted text-hover-primary px-2">Contact Us</a>
			</div>
		</div>	
	</div>	
	<script src="<?php echo base_url('assets/js/jquery-3.6.0.js');?>"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

    $(function() {


        $('#kt_sign_in_form').on('submit', function(e) {
				$('#cnte').hide();
				$('#loader1').show();


            e.preventDefault();
            var formdata = new FormData(this);

            $.ajax({
                url: "<?= base_url('checkuser') ?>",
                type: "POST",
                cache: false,
                data: formdata,
                processData: false,
                contentType: false,
                dataType: "JSON",
                success: function(data) {
                    if(data.success== true){
						$('#cnte').show();
						$('#loader1').hide();
                        Swal.fire({
										title: data.msg,
										showClass: {
											popup: 'animate__animated animate__fadeInDown'
										},
										hideClass: {
											popup: 'animate__animated animate__fadeOutUp'
										}
										})
										$('#cnte').hide();
										$('#loader1').show();
                    setTimeout(()=>{
							window.location.href = '<?= base_url('viewempdashboard') ?>';          

						},2000);
									
                    }else{
                        Swal.fire({
										title: data.msg,
										showClass: {
											popup: 'animate__animated animate__fadeInDown'
										},
										hideClass: {
											popup: 'animate__animated animate__fadeOutUp'
										}
										})
										$('#cnte').show();
										$('#loader1').hide();
                    setTimeout(()=>{

                    },2000);

                        
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
					alert("An error occured: " + xhr.status + " " + xhr.statusText);

                },
            });
        });
    });

</script>

</body>
</html>