 <!-- Navbar -->

 <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" style="background-color: #90EE90 !important;" id="layout-navbar">
 	<div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
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
 						<img src="<?= base_url('public/img/avatars/user.jpg') ?>" alt class="w-px-40 h-auto rounded-circle" />
 					</div>
 				</a>
 				<ul class="dropdown-menu dropdown-menu-end">
 					<li>
 						<div class="d-flex">
 							<div class="flex-shrink-0 me-3">
 								<div class="avatar avatar-online">
 									<img src="<?= base_url('public/img/avatars/') . $this->session->userdata('user'); ?>" alt class="w-px-40 h-auto rounded-circle" />
 								</div>
 							</div>
 							<div class="flex-grow-1">
 								<span class="fw-semibold d-block"><?= $this->session->userdata('nama') ?></span>
 								<small class="text-muted"><?php if ($this->session->userdata('role') == 1) {
																echo "Pimpinan";
															} else {
																echo "Operator";
															} ?></small>
 							</div>
 						</div>
 					</li>
 					<li>
 						<div class="dropdown-divider"></div>
 					</li>
 					<li>
 						<a class="dropdown-item" href="<?= base_url('auth/logout') ?>">
 							<i class="bx bx-power-off me-3"></i>
 							<span class="align-middle">Log Out</span>
 						</a>
 					</li>
 				</ul>
 			</li>
 			<!--/ User -->
 		</ul>
 	</div>
 </nav>

 <!-- / Navbar -->

 <!-- Content wrapper -->
 <div class="content-wrapper">