            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
            	<div class="row">
            		<div class="col-lg-12 mb-10 order-0">
            			<div class="card">
            				<div class="card-header">
            					<div class="row">
            						<div class="col-lg-9">
            							<h4>
            								<h2 class="card-title text-primary" style="color: #2E8B57 !important;">Data Tanaman</h2>
            							</h4>
            						</div>
            						<div class="col-lg-3" style="display: flex;justify-content: end;">
            							<button type="button" class="btn btn-success" style="background-color: #90EE90;" data-bs-toggle="modal" data-bs-target="#newUser">
            								<i class="tf-icons bx bx-user-plus"></i> &ensp;Tambah Data Tanaman
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
            								<th style="width: 30%;">Nama Tanaman</th>
            								<th style="width: 15%;">Varietas</th>
            								<th style="width: 15%;">Tanggal pembuatan</th>
            								<th style="width: 15%;">Status</th>
            								<th style="width: 30%;">Aksi</th>

            							</tr>
            						</thead>
            						<tbody>
            							<?php $no = 1; ?>
            							<?php foreach ($tanaman as $v) : ?>


            								<tr>
            									<td><?= $no++ ?></td>
            									<td><?= $v->nama_tanaman; ?></td>
            									<td><?= $v->varietas; ?></td>
            									<td><?= date("d-m-Y", strtotime($v->date_created)); ?></td>
            									<td>
            										<?php if ($v->is_active == '1') : ?>
            											<div class="text-success"> Terverifikasi</div>
            										<?php else : ?>
            											<div class="text-danger"> Belum Terverifikasi</div>
            										<?php endif; ?>
            									</td>

            									<td>
            										<?php if ($this->session->userdata('role') == 1) { ?>

            											<?php if ($v->is_active == '0') { ?>
            												<a href="<?= base_url('tanaman/verifikasi/' . $v->id_tanaman) ?>">
            													<button class="btn btn-icon btn-success" title="Verifikasi Data Tanaman">
            														<i class="tf-icons bx bx-check"></i>
            													</button>
            												</a>
            											<?php } ?>

            											<?php if ($v->is_active == '0') { ?>
            												<a href="<?= base_url('tanaman/hapus/' . $v->id_tanaman) ?>">
            													<button class="btn btn-icon btn-danger" title="Hapus Data Tanaman">
            														<i class="tf-icons bx bx-trash"></i>
            													</button>
            												</a>
            											<?php } ?>
            										<?php } ?>
            										<button class="btn btn-icon btn-warning" title="View Data Tanaman" data-bs-toggle="modal" data-bs-target="#viewTanaman" data-url="<?= base_url('views_qr/index/' . $v->id_tanaman) ?>">
            											<i class=" tf-icons bx bx-show"></i>
            										</button>
            										<?php if (!empty($v->qrcode)) { ?>
            											<a href="<?= base_url('uploads/qrcode/' . $v->qrcode) ?>" target="_blank">
            												<button class="btn btn-icon btn-info" title="View QR Code">
            													<i class="tf-icons bx bx-qr"></i>
            												</button>
            											</a>
            										<?php } else { ?>
            											<!-- <a href="<= base_url('tanaman/qr/' . $v->id_tanaman) ?>"> -->
            											<button class="btn btn-icon btn-info" data-bs-toggle="modal" data-bs-target="#show<?= $v->id_tanaman; ?>" title="generate QR Code">
            												<i class="tf-icons bx bx-qr"></i>
            											</button>
            											<!-- </a> -->
            										<?php } ?>
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
            		<form class="modal-content" style="background-color: #90EE90;" action="<?= base_url('tanaman/new') ?>" method="POST" enctype="multipart/form-data">
            			<div class="modal-header">
            				<h5 class="modal-title" id="newUserTitle"><i class="tf-icons bx bx-user-plus"></i>&ensp;Tambah Tanaman</h5>
            				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            			</div>
            			<div class="modal-body">
            				<div class="row g-2">
            					<div class="col mb-0">
            						<label for="nama_tanaman" class="form-label">Nama Tanaman</label>
            						<input type="text" id="nama_tanaman" name="nama_tanaman" class="form-control" placeholder="Masukan Nama Tanaman" required />
            					</div>
            					<div class="col mb-0">
            						<label for="varietas_tanaman" class="form-label">Varietas Tanaman</label>
            						<select name="id_varietas" id="id_varietas" class="form-control" required>
            							<option>--Pilih Varietas Tanaman--</option>
            							<?php foreach ($varietas as $v) { ?>
            								<option value="<?= $v->id_varietas; ?>"><?= $v->varietas; ?></option>
            							<?php } ?>
            						</select>
            					</div>
            				</div>
            				<div class="row">
            					<div class="col mb-3">
            						<label for="informasi_umum" class="form-label">Informasi Umum</label>
            						<textarea class="form-control" id="informasi_umum" name="informasi_umum" required></textarea>
            					</div>
            				</div>
            				
            				<div class="row">
            					<div class="col mb-3">
            						<label for="foto" class="form-label">Foto Tanaman</label>
            						<input type="file" class="form-control" id="foto" name="foto" placeholder="Foto Tanaman" >
            					</div>
            				</div>
            			</div>
            			<div class="modal-footer">
            				<button type="button" class="btn btn-success" style="background-color: #FFFFFF; color: black;" data-bs-dismiss="modal">
            					Tutup
            				</button>
            				<button type="submit" class="btn btn-success" style="background-color: #2E8B57;">Simpan</button>
            			</div>
            		</form>
            	</div>
            </div>

         

            <div class="modal fade" id="viewTanaman" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
            	<div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
            		<div class="modal-content">
            			<div class="modal-header">
            				<h5 class="modal-title"><i class="tf-icons bx bx-show"></i>&ensp;View Data Tanaman</h5>
            				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            			</div>
            			<div class="modal-body" style="background-color: #90EE90; max-height: 80vh; overflow-y: auto;">
            				<!-- Isi konten modal di sini -->
            			</div>
            			<div class="modal-footer">
            				<button type="button" class="btn btn-outline-secondary btn-tutup" style="background-color: #2E8B57;" data-bs-dismiss="modal">
            					Tutup
            				</button>
            			</div>
            		</div>
            	</div>
            </div>




            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
            	$(document).ready(function() {
            		$('#viewTanaman').on('show.bs.modal', function(event) {
            			var button = $(event.relatedTarget);
            			var url = button.data('url');
            			var modal = $(this);

            			// Permintaan AJAX
            			$.ajax({
            				url: url,
            				type: 'GET',
            				dataType: 'html',
            				success: function(response) {
            					// Memuat konten ke dalam modal
            					modal.find('.modal-body').html(response);
            				},
            				error: function(xhr, status, error) {
            					// Menampilkan pesan jika terjadi kesalahan
            					console.log(error);
            					modal.find('.modal-body').html('<p>Terjadi kesalahan. Silakan coba lagi nanti.</p>');
            				}
            			});
            		});

            		// Event handler untuk menangkap peristiwa tombol close di modal di klik
            		$('.btn-close').on('click', function() {
            			// Melakukan reload halaman saat tombol close di klik
            			location.reload();
            		});

            		// Event handler untuk menangkap peristiwa tombol close di modal di klik
            		$('.btn-tutup').on('click', function() {
            			// Melakukan reload halaman saat tombol close di klik
            			location.reload();
            		});
            	});
            </script>