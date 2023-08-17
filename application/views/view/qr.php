            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
            	<br><br>
            	<div class="row">
            		<div class="col-lg-12 mb-10 order-0">
            			<div class="card h-100">
            				<div class="card-body">
            					<h3 class="card-title"><?= $tanaman->nama_tanaman ?></h3>
            					<img class="img-fluid d-flex mx-auto my-4" src="<?= base_url('uploads/' . $tanaman->gambar_tanaman); ?>" />
            					<div class="col-xl-12">
            						<div class="nav-align-top mb-4">
            							<div class="tab-content">
            								<p>
            									<hr>
            								<p>Varietas</p>
            								<?= $tanaman->varietas ?>
            								<hr>
            								<p>Informasi Tanaman</p>
            								<?= $tanaman->informasi_umum ?>
            								<hr>
            								<p>Informasi Budidaya</p>
            								<?= $tanaman->informasi_budidaya ?>
            								<hr>
            								<p>Informasi Hama</p>
            								<?= $tanaman->informasi_hama ?>
            								</p>
            							</div>
            						</div>
            					</div>
            				</div>
            			</div>
            		</div>
            	</div>
            </div>
            <!-- / Content -->