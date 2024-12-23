<div class="container-fluid mt-5">
    <div class="row" style="margin-top: 5rem !important;">

    <div class="flash-data" data-flashdata='<?= json_encode($this->session->flashdata('message')); ?>'></div>

        <div class="col-xl-12 col-lg-12 col-md-12">
			<div class="row">
				<div class="col-lg-12 text-left">
					<a name="button" class="btn mb-1 btn-dark text-light text-light align-item-center" href="<?= base_url('tambah/album') ?>">
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
                                <div class="row custom-control py-2 custom-radio d-flex align-items-center">
                                    <div class="col-lg-2">
                                        <input type="radio" id="radiosingle" name="customRadio" value="Single" class="form-check-input pr-4" checked>
                                        <label class="form-check-label" for="customRadio1"><strong>Single</strong> </label>
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="radio" id="radioalbum" name="customRadio" value="Album" class="form-check-input">
                                        <label class="form-check-label" for="customRadio1"><strong>Album</strong> </label>
                                    </div>
                                    <div class="col-lg-8">
                                        <label for="iduserSelect">Pilih User:</label>
                                        <select id="iduserSelect" name="userSelect" class="form-control">
                                            <?php foreach ($arrayUser as $user): ?>
                                            <option value="<?= $user['KodeUser']; ?>"><?= $user['YoutubeChannelNama']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                    <label for="tb-fname"><strong>Judul Album</strong> </label>
                                    <input type="text" class="form-control" id="idjudul" name="Title" placeholder="" value="" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-floating mb-3">
                                    <label for="tb-fname"><strong>UPC</strong> </label>
                                    <input type="text" class="form-control" id="idupc" name="UPC" placeholder="" value="" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                <input type="file" name="jpeg" id="jpeg" class="d-none" required onchange="updateFileName(this)">
                                    <label for="idfoto"><strong>Upload Cover Album (.jpeg)</strong> </label> <br>
                                    <!--input type="file" class="form-control" id="idfoto" name="FileInput"-->
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-light" onclick="document.getElementById('jpeg').click()">Choose File</button>
                                        </div>
                                        <input type="text" class="form-control" id="file-name" name="file-name" placeholder="No file chosen" readonly>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="col-lg-12">
                                <div class="d-md-flex align-items-center">
                                    <div class="ms-auto mt-3 mt-md-0">
                                        <button class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

<!-- SWEET ALERT -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        //console.log("masuk");
        var flashData = document.querySelector('.flash-data').dataset.flashdata;
        var confirmButtonText = 'OK';

        //console.log(flashData);
        if(flashData) {
            // Parsing data JSON
            var data = JSON.parse(flashData);

            //console.log(data.icon);

            Swal.fire({
                icon: data.icon,
                title: data.title,
                text: data.text,
                confirmButtonText: confirmButtonText,
            });
        }
    });
</script>

<!-- JavaScript to Handle File Name -->
<script>
    // Open file dialog when clicking the text input
    document.getElementById('file-name').addEventListener('click', function () {
        document.getElementById('jpeg').click();
    });

    // Update the text input with the selected file name
    function updateFileName(input) {
        var fileName = input.files.length > 0 ? input.files[0].name : 'No file chosen';
        document.getElementById('file-name').value = fileName;
    }
</script>