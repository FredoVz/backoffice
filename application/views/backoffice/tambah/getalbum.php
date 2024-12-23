<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12 align-item-strech" style="margin-top:10%">
			<div class="row">
				<div class="col-lg-12 text-left">
					<a name="button" class="btn mb-1 btn-dark text-light text-light align-item-center" href="<?= base_url('tambah/album') ?>">
						<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAkklEQVR4nO3SMQ4BQRSA4a109GqNQiiV7uAAm9BrFTqF3iHUonMEiUu4g0Yk4hOJYYmCzFDtV07xZ97My7LSz6CNTqpYjgOWKWJTD6vY2MyzDXpooY7KN7GRz+yxwxZrLDBHrRi73uIkzrAY7OIYGcxfRx5Ejlx9946TZJ8SYIxzkrUJ0L+NFr/YARpo3g9Kf3MBdiiOTCVGCC4AAAAASUVORK5CYII=" alt="long-arrow-left">
						Back
					</a>
				</div>
			</div>
		</div>
		<div class="col-lg-12 align-item-strech">
			<div class="card">
				<div class="card-body">
					<form action="<?= base_url('tambah/updatealbum'); ?>" method="post">
						<div class="row">
							<div class="col-lg-4">
								<div class="form-floating mb-3">
									<label for="tb-fname">UPC</label>
									<input type="text" class="form-control" id="idupc" name="UPC" placeholder="Kosong" value="<?= $foundAlbum['UPC'] ?>">
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-floating mb-3">
									<label for="tb-fname">Judul</label>
									<input type="text" class="form-control" id="idjudul" name="Title" placeholder="Kosong" value="<?= $foundAlbum['Title'] ?>" readonly>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-floating mb-3">
									<label for="tb-fname">Single</label>
									<input type="text" class="form-control" id="idjenis" name="Jenis" placeholder="Kosong" value="<?= $foundAlbum['Jenis'] ?>" readonly>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="mb-3">
									<label for="idfoto">Cover</label>
									<br>
									<img src="<?= $foundAlbum['FileUrl'] ?>" alt="" style="width:20%;height:20%">
									<input type="hidden" name="fileurl" value="<?= $foundAlbum['FileUrl'] ?>">
								</div>
							</div>
							<div class="col-lg-12">
								<div class="d-md-flex align-item-center">
									<div class="ms-auto mt-3 mt-md-0">
										<input type="hidden" name="KodeAlbum" id="" value="<?= $foundAlbum['KodeAlbum'] ?>">
										<button class="btn btn-primary">Update</button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-lg-6"></div>
	</div>
	<div class="py-6 px-6 text-center">
		<p class="mb-0 fs-4">
			Design and Developed by
			<a href="https://omegasoft.co.id/" target="_blank" class="pe-1 text-primary text-decoration-underline">omegasoft.co.id</a>
		</p>
	</div>
</div>

