            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
            	<div class="row">
            		<div class="col-lg-12 mb-10 order-0">
            			<div class="card">
            				<div class="card-header">
            					<div class="row">
            						<div class="col-lg-10">
            							<h4>
            								User Management
            							</h4>
            						</div>
            						<div class="col-lg-2" style="display: flex;justify-content: end;">
            							<button type="button" class="btn btn-success" style="background-color: #90EE90;" data-bs-toggle="modal" data-bs-target="#newUser">
            								<i class="tf-icons bx bx-user-plus"></i> &ensp;Tambah User
            							</button>
            						</div>
            					</div>
            				</div>
            				<div class="card-body">
            					<?php if (!empty($error)) : ?>
            						<div class="alert alert-danger alert-dismissible" role="alert">
            							<?= $error ?>
            							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
            						</div>
            					<?php endif; ?>

            					<?php if (!empty($success)) : ?>
            						<div class="alert alert-success alert-dismissible" role="alert">
            							<?= $error ?>
            							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
            						</div>
            					<?php endif; ?>

            					<table id="example" class="table table-striped" style="width:100%">
            						<thead>
            							<tr>
            								<th style="width: 5%;">NO</th>
            								<th style="width: 30%;">Nama</th>
            								<th style="width: 30%;">Email</th>
            								<th style="width: 15%;">Tanggal pembuatan</th>
            								<th style="width: 5%;">Status</th>
            								<th style="width: 15%;">Aksi</th>
            							</tr>
            						</thead>
            						<tbody>
            							<?php $no = 1; ?>
            							<?php foreach ($user as $v) : ?>
            								<tr>
            									<td><?= $no++ ?></td>
            									<td><?= $v->nama; ?></td>
            									<td><?= $v->email; ?></td>
            									<td><?= date("d-m-Y", strtotime($v->date_created)); ?></td>
            									<td><?php if ($v->is_active == 1) {
														echo "<span class='badge rounded-pill bg-success'>Active</span>";
													} else {
														echo "<span class='badge rounded-pill bg-danger'>Non-Active</span>";
													} ?></td>
            									<td>
            										<?php if ($v->is_active == "1") { ?>
            											<a href="<?= base_url('user_management/active/' . $v->id_user) ?>">
            												<button class="btn btn-icon btn-secondary" title="Non - Aktifkan User" style="margin-bottom: 10px;">
            													<i class="tf-icons bx bx-user-x"></i>
            												</button>
            											</a>
            										<?php } else { ?>
            											<a href="<?= base_url('user_management/active/' . $v->id_user) ?>">
            												<button class="btn btn-icon btn-success" title="Aktifkan User" style="margin-bottom: 10px;">
            													<i class="tf-icons bx bx-user-check"></i>
            												</button>
            											</a>
            										<?php } ?>
            										<a href="<?= base_url('user_management/hapus/' . $v->id_user) ?>">
            											<button class="btn btn-icon btn-danger" style="margin-bottom: 10px;" title="Hapus User">
            												<i class="tf-icons bx bx-trash"></i>
            											</button>
            										</a>
            										<a href="<?= base_url('user_management/resetPass/' . $v->id_user) ?>">
            											<button class="btn btn-icon btn-warning" title="Reset Password ">
            												<i class="tf-icons bx bx-key"></i>
            											</button>
            										</a>
            									</td>
            								</tr>
            							<?php endforeach; ?>
            						</tbody>
            					</table>

            				</div>
            			</div>
            		</div>
            	</div>
            </div>
            <!-- / Content -->

            <div class="modal fade" id="newUser" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
            	<div class="modal-dialog modal-dialog-centered modal-lg">
            		<form class="modal-content" style="background-color: #90EE90;" action="<?= base_url('user_management/new') ?>" method="POST">
            			<div class="modal-header">
            				<h5 class="modal-title" id="newUserTitle"><i class="tf-icons bx bx-user-plus"></i>&ensp;Tambah User</h5>
            				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            			</div>
            			<div class="modal-body">
            				<div class="row">
            					<div class="col mb-3">
            						<label for="nama" class="form-label">Nama</label>
            						<input type="text" id="nama" name="nama" class="form-control" placeholder="Masukan Nama Operator Baru	" />
            					</div>
            				</div>
            				<div class="row">
            					<div class="col mb-3">
            						<label for="email" class="form-label">Email</label>
            						<input type="email" id="email" name="email" class="form-control" placeholder="Masukan Email Operator Baru	" />
            					</div>
            				</div>
            				<div class="row">
            					<div class="col mb-3">
            						<label for="password" class="form-label">Password</label>
            						<input type="password" id="password" name="password" class="form-control" placeholder="Masukan password Operator Baru	" />
            					</div>
            				</div>
            			</div>
            			<div class="modal-footer">
            				<button type="button" class="btn btn-outline-secondary" style="background-color: #FFFFFF; color: black;" data-bs-dismiss="modal">
            					Tutup
            				</button>
            				<button type="submit" class="btn btn-primary" style="background-color: #2E8B57;" data-bs-dismiss="modal">Simpan</button>
            			</div>
            		</form>
            	</div>
            </div>