            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
            	<div class="row">
            		<div class="col-lg-12 mb-10 order-0">
            			<div class="card">
            				<div class="card-header">
            					<div class="row">
            						<div class="col-lg-9">
            							<h4>
            								<h2 class="card-title text-primary" style="color: #2E8B57 !important;">Slug</h2>
            							</h4>
            						</div>
            						<div class="col-lg-3" style="display: flex;justify-content: end;">
            							<button type="button" class="btn btn-success" style="background-color: #90EE90;" data-bs-toggle="modal" data-bs-target="#newUser">
            								<i class="tf-icons bx bx-user-plus"></i> &ensp;Tambah Slug
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
<style>
	.justify-center {
        text-align: center;
    }
</style>
            					<table id="example" class="table table-striped" style="width:100">
            						<thead>
            							<tr>
            								<th style="width: 5%;">NO</th>
            								<th style="width: 5%;">Slug</th>
            								<th class="justify-center">Informasi Budidaya</th>
            								<th class="justify-center">Informasi Hama</th>
            								<th style="width: 5%;">Aksi</th>

            							</tr>
            						</thead>
            						<tbody>
            							<?php $no = 1; ?>
            							<?php foreach ($desk as $v) : ?>


            								<tr>
            									<td><?= $no++ ?></td>
            									<td><?= $v->slug; ?></td>
            									<td><?= $v->informasi_budidaya; ?></td>
            									<td><?= $v->informasi_hama; ?></td>
            									<td>
												<a type="button" data-bs-toggle="modal" data-bs-target="#edit<?= $v->id_deskripsi; ?>">
            											<button class="btn btn-icon btn-warning" title="Edit">
            												<i class="tf-icons bx bx-edit"></i>
            											</button>
            										</a>

													<a type="button" data-bs-toggle="modal" data-bs-target="#delete<?= $v->id_deskripsi; ?>">
            											<button class="btn btn-icon btn-danger" title="Hapus">
            												<i class="tf-icons bx bx-trash"></i>
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
            		<form class="modal-content" style="background-color: #90EE90;" action="<?= base_url('deskripsi/new') ?>" method="POST" enctype="multipart/form-data">
            			<div class="modal-header">
            				<h5 class="modal-title" id="newUserTitle"><i class="tf-icons bx bx-user-plus"></i>&ensp;Tambah deskripsi</h5>
            				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            			</div>
            			<div class="modal-body">
            				<div class="row g-2">
            					<div class="col mb-0">
            						<label for="deskripsi" class="form-label">Slug</label>
            						<input type="text" id="slug" name="slug" class="form-control" placeholder="Masukan Slug" required />
            					</div>

            				</div>

							<div class="row g-2">
            					<div class="col mb-0">
            						<label for="deskripsi" class="form-label">Info Budidaya</label>
            						<textarea type="text" id="informasi_budidaya" name="informasi_budidaya" class="form-control" placeholder="Masukan Info Buididaya" required></textarea>
            					</div>

            				</div>


							<div class="row g-2">
            					<div class="col mb-0">
            						<label for="deskripsi" class="form-label">Info Hama</label>
            						<textarea type="text" id="informasi_hama" name="informasi_hama" class="form-control" placeholder="Masukan Info Hama" required></textarea>
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



            <?php foreach ($desk as $v) { ?>
            	<div class="modal fade" id="edit<?= $v->id_deskripsi; ?>" data-bs-backdrop=" static" tabindex="-1" aria-hidden="true">
            		<div class="modal-dialog modal-dialog-centered modal-lg">
            			<form class="modal-content" style="background-color: #90EE90;" action="<?= base_url('deskripsi/edit/'.$v->id_deskripsi) ?>" method="POST" enctype="multipart/form-data">
            				<div class="modal-header">
            					<h5 class="modal-title" id="newUserTitle"><i class="tf-icons bx bx-user-plus"></i>&ensp;Edit deskripsi</h5>
            					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            				</div>
            				<div class="modal-body">
							<div class="row g-2">
            					<div class="col mb-0">
            						<label for="deskripsi" class="form-label">Slug</label>
            						<input type="text" id="slug" name="slug" value="<?= $v->slug; ?>" class="form-control" placeholder="Masukan Slug" required />
            					</div>

            				</div>

							<div class="row g-2">
            					<div class="col mb-0">
            						<label for="deskripsi" class="form-label">Info Budidaya</label>
            						<input type="text" id="informasi_budidaya" name="informasi_budidaya" value="<?= $v->informasi_budidaya; ?>" class="form-control" placeholder="Masukan Info Budidaya" required />
            					</div>

            				</div>


							<div class="row g-2">
            					<div class="col mb-0">
            						<label for="deskripsi" class="form-label">Info Hama</label>
            						<input type="text" id="informasi_hama" name="informasi_hama" value="<?= $v->informasi_hama; ?>" class="form-control" placeholder="Masukan Info Hama" required />
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
            <?php } ?>



			<?php foreach ($desk as $v) { ?>
            	<div class="modal fade" id="delete<?= $v->id_deskripsi; ?>" data-bs-backdrop=" static" tabindex="-1" aria-hidden="true">
            		<div class="modal-dialog modal-dialog-centered modal-lg">
            			<form class="modal-content" style="background-color: #90EE90;" action="<?= base_url('deskripsi/delete/'.$v->id_deskripsi) ?>" method="POST" enctype="multipart/form-data">
            				<div class="modal-header">
            					<h5 class="modal-title" id="newUserTitle"><i class="tf-icons bx bx-user-plus"></i>&ensp;Hapus Slug <?= $v->slug; ?> ???</h5>
            					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            				</div>
            			
            				<div class="modal-footer">
            					<button type="button" class="btn btn-success" style="background-color: #FFFFFF; color: black;" data-bs-dismiss="modal">
            						Tidak
            					</button>
            					<button type="submit" class="btn btn-danger" style="background-color: #2E8B57;">Ya</button>
            				</div>
            			</form>
            		</div>
            	</div>
            <?php } ?>

