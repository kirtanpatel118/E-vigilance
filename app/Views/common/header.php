<!DOCTYPE html>
<html lang="en">
	<head><base href="../../">
	<link href="<?php echo base_url('assets/plugins/custom/datatables/datatables.bundle.css')?>" rel="stylesheet" type="text/css"/>
		<title> <?php echo $title;  ?>
</title>
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
		<link rel="shortcut icon" href="<?php echo base_url('assets/media/logos/satyamev_logo.png');?>  " />
		
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	
		<script src="<?php echo base_url('assets/js/scripts.bundle.js');?>"></script>
		<link href="<?php echo base_url('assets/plugins/global/plugins.bundle.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets/css/style.bundle.css');?>" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url('assets/css/global/Custom.css');?>" rel="stylesheet" type="text/css"/>
		<script src="<?php echo base_url('assets/js/abc.js');?>"></script>
		<script src="<?php echo base_url('assets/plugins/global/plugins.bundle.js')?>"></script>
		<script src="<?php echo base_url('assets/js/jquery-3.6.0.js');?>"></script>
		<script src="<?php echo base_url('assets/js/jquery.validate.min.js');?>"></script>
		<script src="<?php echo base_url('assets/plugins/custom/datatables/datatables.bundle.js')  ?> "></script>
	
	</head>

	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-disabled">
		
		<div class="d-flex flex-column flex-root">
		
			<div class="page d-flex flex-row flex-column-fluid">
			
				<div id="kt_aside" class="aside bg-primary" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="auto" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
					
						<div class="aside-logo d-none d-lg-flex flex-column align-items-center flex-column-auto py-8" id="kt_aside_logo">
							<a href="<?php echo base_url('viewdashboard'); ?>">
							<img alt="Logo" src="<?php echo base_url('assets/media/logos/satyamev_logo.png');?>" class="h-55px" /> 
							</a>
						</div>

					<div class="aside-nav d-flex flex-column align-lg-center flex-column-fluid w-100 pt-5 pt-lg-0" id="kt_aside_nav">
					
						<div id="kt_aside_menu" class="menu menu-column menu-title-gray-600 menu-state-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-bold fs-6" data-kt-menu="true">
							
							
							<div data-kt-menu-trigger="click" data-kt-menu-placement="right-start" class="menu-item py-3">
								<span class="menu-link menu-center" title="Officer" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
									<span class="menu-icon me-0">
										<i class="bi bi-people fs-2"></i>
									</span>
								</span>
								<div class="menu-sub menu-sub-dropdown w-225px px-1 py-8">
									<div class="menu-item">
										<div class="menu-content">
											<span class="menu-section fs-5 fw-bolder ps-1 py-1">Officer</span>
										</div>
									</div>
									<div class="menu-item">
										<a class="menu-link" href="<?php echo base_url('addofficer'); ?>">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Add Officer</span>
										</a>
									</div>
									<div class="menu-item">
										<a class="menu-link" href="<?php echo base_url('viewofficer') ?>">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">View Officer</span>
										</a>
									</div>
									

								</div>
							</div>

							<div data-kt-menu-trigger="click" data-kt-menu-placement="right-start" class="menu-item py-3">
								<span class="menu-link menu-center" title="Complaint" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
									<span class="menu-icon me-0">
										<i class="bi bi-laptop"></i>
									</span>
								</span>
								<div class="menu-sub menu-sub-dropdown w-225px px-1 py-4">
									<div class="menu-item">
										<div class="menu-content">
											<span class="menu-section fs-5 fw-bolder ps-1 py-1">Complaint</span>
										</div>
									</div>
									

									
									<div class="menu-item">
										<a class="menu-link" href="<?php echo base_url('viewcomplaint') ?>">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">View Complaint</span>
										</a>
									</div>

									
									

									<div class="menu-item">
										<a class="menu-link" href="<?php echo base_url('view_Assign_Hwd') ?>">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">View Feedback</span>
										</a>
									</div>
								</div>
							</div>
							
							<div data-kt-menu-trigger="click" data-kt-menu-placement="right-start" class="menu-item py-3">
								<span class="menu-link menu-center" title="Report" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
									<span class="menu-icon me-0">
									<i class="bi bi-file-earmark-bar-graph"></i>
									</span>
								</span>
								<div class="menu-sub menu-sub-dropdown w-225px px-1 py-4">
									<div class="menu-item">
										<div class="menu-content">
											<span class="menu-section fs-5 fw-bolder ps-1 py-1">Report</span>
										</div>
									</div>

									<div class="menu-item">
										<a class="menu-link" href="<?php echo base_url('complaint_report'); ?>">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Complaint Report</span>
										</a>
									</div>

									<div class="menu-item">
										<a class="menu-link" href="<?php echo base_url('officer_report'); ?>">
											<span class="menu-bullet">
												<span class="bullet bullet-dot"></span>
											</span>
											<span class="menu-title">Officer Report</span>
										</a>
									</div>
									
									
								</div>
							</div>
						</div>
				
					</div>
				
				
					<div class="aside-footer d-flex flex-column align-items-center flex-column-auto" id="kt_aside_footer">
					</div>
					
				</div>
			
				
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					
					<div id="kt_header"  class="header bg-white align-items-stretch">
					
						<div class="container-fluid d-flex align-items-stretch justify-content-between">
						
							<div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
								<div class="btn btn-icon btn-active-color-primary w-40px h-40px" id="kt_aside_toggle">
								
									<span class="svg-icon svg-icon-2x mt-1">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
											<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
										</svg>
									</span>
									
								</div>
							</div>
							
								<div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
									<a href="<?php echo base_url('viewdashboard') ?>" class="d-lg-none">
										<img alt="Logo" src="<?php echo base_url('assets/media/logos/logo-2.svg');?>" class="h-30px" />
									</a>
								</div>
							
							<div class="d-flex align-items-center" id="kt_header_wrapper">
								
								<div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-20 pb-2 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_wrapper'}">
								
									
									<h1 class="text-dark fw-bolder my-1 fs-3 lh-1"> <?php echo $title; ?>

									</h1>
								
								</div>
								
							</div>
							
							<div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
								
								<div class="d-flex align-items-stretch" id="kt_header_nav">
									
									<div class="header-menu align-items-stretch" data-kt-drawer="true" data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_header_menu_mobile_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
									</div>
									
								</div>
								<div class="d-flex align-items-stretch justify-self-end flex-shrink-0">
									
									<div class="d-flex align-items-stretch flex-shrink-0">
										
										
										
										
										<div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
											
											<div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
												<img src="<?php echo base_url('assets/media/avatars/150-26.jpg');?>" alt="user" />
											</div>
											
											<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
												
												<div class="menu-item px-3">
													<div class="menu-content d-flex align-items-center px-3">
														
														<div class="symbol symbol-50px me-5">
															<img alt="Logo" src="<?php echo base_url('assets/media/avatars/150-26.jpg');?>" />
														</div>
														
														<div class="d-flex flex-column">
															<div class="fw-bolder d-flex align-items-center fs-5"><?php echo "Ethan" ?>
															</div>
															<a  class="fw-bold text-muted text-hover-primary fs-7"><?php echo "Hunt" ?></a>
														</div>
														
													</div>
												</div>
												
												<div class="separator my-2"></div>
												
												<div class="menu-item px-5">
													<a href="<?php echo base_url('view_admin_profile') ?>" class="menu-link px-5">My Profile</a>
												</div>
												
												<div class="menu-item px-5">
													<a href="<?php echo base_url('AdminsignOut') ?>" class="menu-link px-5">Sign Out</a>
												</div>
												
											</div>
											
										</div>
										
										
										<div class="d-flex align-items-center d-lg-none ms-3 me-n1" title="Show header menu">
											
										</div>
										
									</div>
								
								</div>
						
							</div>
							
						</div>
						
					</div>
					

					
				</div>
		
			</div>
			
		</div>
		
		
		
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			
			<span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
					<path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
				</svg>
			</span>
			
		</div>


		
		<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
			
						<div class="container-xxl" id="kt_content_container">  
							   <div class="card mb-2">
                                   
                                   <div class="position-relative mb-17">
								
                                   <div class="card-body fs-6 py-15 px-10 py-lg-15 px-lg-15 text-gray-700">

		

	