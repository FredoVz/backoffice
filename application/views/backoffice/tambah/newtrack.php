<div class="container-fluid mt-5">
    <div class="row" style="margin-top: 5rem !important;">

        <div class="flash-data" data-flashdata='<?= json_encode($this->session->flashdata('message')); ?>'></div>

        <div class="col-xl-12 col-lg-12 col-md-12">
			<div class="row">
				<div class="col-lg-12 text-left">
					<a name="button" class="btn mb-1 btn-dark text-light text-light align-item-center" href="<?= base_url('tambah/track') ?>">
						<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAUCAYAAACNiR0NAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAkklEQVR4nO3SMQ4BQRSA4a109GqNQiiV7uAAm9BrFTqF3iHUonMEiUu4g0Yk4hOJYYmCzFDtV07xZ97My7LSz6CNTqpYjgOWKWJTD6vY2MyzDXpooY7KN7GRz+yxwxZrLDBHrRi73uIkzrAY7OIYGcxfRx5Ejlx9946TZJ8SYIxzkrUJ0L+NFr/YARpo3g9Kf3MBdiiOTCVGCC4AAAAASUVORK5CYII=" alt="long-arrow-left">
						Back
					</a>
				</div>
			</div>
		</div>
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="<?= base_url('tambah/insertalbum'); ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="iduserSelect">Pilih User:</label>
                                <select id="iduserSelect" name="userSelect" class="form-control">
                                    <?php foreach ($arrayUser as $user): ?>
                                    <option value="<?= $user['KodeUser']; ?>"><?= $user['YoutubeChannelNama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>     
            </div>
        </div>
    </div>
</div>