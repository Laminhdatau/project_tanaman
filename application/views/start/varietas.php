            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
            	<div class="row">
            		<div class="col-lg-12 mb-10 order-0">
            			<div class="card">
            				<div class="card-header">
            					<div class="row">
            						<div class="col-lg-9">
            							<h4>
            								<h2 class="card-title text-primary" style="color: #2E8B57 !important;">Varietas</h2>
            							</h4>
            						</div>
            						<div class="col-lg-3" style="display: flex;justify-content: end;">
            							<button type="button" class="btn btn-success" style="background-color: #90EE90;" data-bs-toggle="modal" data-bs-target="#newUser">
            								<i class="tf-icons bx bx-user-plus"></i> &ensp;Tambah Varietas
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

            					<table id="example" class="table table-striped" style="width:100">
            						<thead>
            							<tr>
            								<th style="width: 5%;">NO</th>
            								<th style="width: 15%;">Varietas</th>
            								<th style="width: 15%;">Slug</th>
            								<th style="width: 5%;">Aksi</th>

            							</tr>
            						</thead>
            						<tbody>
            							<?php $no = 1; ?>
            							<?php foreach ($varietas as $v) : ?>
            								<tr>
            									<td><?= $no++ ?></td>
            									<td><?= $v->varietas; ?></td>
            									<td><?= $v->slug; ?></td>
            									<td>
            										
            										<a type="button" data-bs-toggle="modal" data-bs-target="#edit<?= $v->id_varietas; ?>">
            											<button class="btn btn-icon btn-warning" title="Edit">
            												<i class="tf-icons bx bx-edit"></i>
            											</button>
            										</a>

													<a type="button" data-bs-toggle="modal" data-bs-target="#delete<?= $v->id_varietas; ?>">
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
            		<form class="modal-content" style="background-color: #90EE90;" action="<?= base_url('varietas/new') ?>" method="POST" enctype="multipart/form-data">
            			<div class="modal-header">
            				<h5 class="modal-title" id="newUserTitle"><i class="tf-icons bx bx-user-plus"></i>&ensp;Tambah varietas</h5>
            				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            			</div>
            			<div class="modal-body">
            				<div class="row g-2">
            					<div class="col mb-0">
            						<label for="varietas" class="form-label">Varietas</label>
            						<input type="text" id="varietas" name="varietas" class="form-control" placeholder="Masukan Varietas" required />
            					</div>
            				</div>
            				<div class="row g-2">
            					<div class="col mb-0">
            						<label for="slug" class="form-label">Slug</label>
            						<select name="id_deskripsi" id="id_deskripsi" class="form-control">
            							<option>--PILIH SLUG--</option>
            							<?php foreach ($desk as $d) { ?>
            								<option value="<?= $d->id_deskripsi; ?>"><?= $d->slug; ?></option>
            							<?php } ?>
            						</select>
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


            <?php foreach ($varietas as $v) { ?>
            	<div class="modal fade" id="edit<?= $v->id_varietas; ?>" data-bs-backdrop=" static" tabindex="-1" aria-hidden="true">
            		<div class="modal-dialog modal-dialog-centered modal-lg">
            			<form class="modal-content" style="background-color: #90EE90;" action="<?= base_url('varietas/edit/'.$v->id_varietas) ?>" method="POST" enctype="multipart/form-data">
            				<div class="modal-header">
            					<h5 class="modal-title" id="newUserTitle"><i class="tf-icons bx bx-user-plus"></i>&ensp;Edit Varietas</h5>
            					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            				</div>
            				<div class="modal-body">
            					<div class="row g-2">
            						<div class="col mb-0">
            							<label for="varietas" class="form-label">Varietas</label>
            							<input type="text" id="varietas" name="varietas" value="<?= $v->varietas; ?>" class="form-control" placeholder="Masukan Varietas" required />
            						</div>
            					</div>
            					<div class="row g-2">
            						<div class="col mb-0">
            							<label for="slug" class="form-label">Slug</label>
            							<select name="id_deskripsi" id="id_deskripsi" class="form-control">
            								<?php foreach ($desk as $d) { ?>
            									<option value="<?= $d->id_deskripsi; ?>" <?= ($d->id_deskripsi==$v->id_deskripsi)?'selected' :'' ?>><?= $d->slug; ?></option>
            								<?php } ?>
            							</select>
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



			<?php foreach ($varietas as $v) { ?>
            	<div class="modal fade" id="delete<?= $v->id_varietas; ?>" data-bs-backdrop=" static" tabindex="-1" aria-hidden="true">
            		<div class="modal-dialog modal-dialog-centered modal-lg">
            			<form class="modal-content" style="background-color: #90EE90;" action="<?= base_url('varietas/delete/'.$v->id_varietas) ?>" method="POST" enctype="multipart/form-data">
            				<div class="modal-header">
            					<h5 class="modal-title" id="newUserTitle"><i class="tf-icons bx bx-user-plus"></i>&ensp;Hapus Varietas <?= $v->varietas; ?> ???</h5>
            					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
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