<!-- Layout page -->
<div class="layout-page">

	<!-- BEGIN: Navbar-->
	<!-- Navbar -->
	<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">

		<!-- ! Not required for layout-without-menu -->
		<div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0  d-xl-none ">
			<a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
				<i class="bx bx-menu bx-sm"></i>
			</a>
		</div>

		<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

			<ul class="navbar-nav flex-row align-items-center ms-auto">

				<!-- User -->
				<li class="nav-item navbar-dropdown dropdown-user dropdown">
					<a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
						<div class="avatar avatar-online">
							<img src="<?php echo base_url() ?>assets/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle">
						</div>
					</a>
					<ul class="dropdown-menu dropdown-menu-end">
						<li>
							<a class="dropdown-item" href="<?php echo base_url() ?>profile">
								<div class="d-flex">
									<div class="flex-shrink-0 me-3">
										<div class="avatar avatar-online">
											<img src="<?php echo base_url() ?>assets/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle">

										</div>
									</div>
									<div class="flex-grow-1">
										<span class="fw-medium d-block">
											<?php echo $this->session->userdata('nama') ?>
										</span>
										<small class="text-muted">User</small>
									</div>
								</div>
							</a>

						</li>
						<li>
							<div class="dropdown-divider"></div>
						</li>
						<li>
							<a class="dropdown-item" href="<?php echo base_url() ?>profile">
								<i class="bx bx-user me-2"></i>
								<span class="align-middle">My Profile</span>
							</a>
						</li>

						<li>
							<div class="dropdown-divider"></div>
						</li>
						<li>
							<a class="dropdown-item" href="<?php echo base_url() ?>auth/logout">
								<i class='bx bx-log-in me-2'></i>
								<span class="align-middle">Logout</span>
							</a>
						</li>
					</ul>
				</li>
				<!--/ User -->
			</ul>
		</div>

	</nav>
	<!-- / Navbar -->
	<!-- END: Navbar-->


	<!-- Content wrapper -->
	<div class="content-wrapper">