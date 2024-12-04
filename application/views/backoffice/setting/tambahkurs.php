<!-- Begin Page Content -->
<div class="container-fluid mt-5">



	<div class="row">
        <div class="col-lg-8 mt-5">

		<?= $this->session->flashdata('message'); ?>

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><strong>Tambah Kurs</strong></h1>

		<form action="<?= base_url('setting/submitkurs'); ?>" method="post">
			<div class="form-group row">
				<label for="email" class="col-sm-2 col-form-label">Tanggal Berlaku</label>
				<div class="col-sm-10">
					<input type="date" class="form-control" id="tanggalberlaku" name="tanggalberlaku" value="" required>
				</div>
            </div>

            <div class="form-group row">
				<label for="email" class="col-sm-2 col-form-label">Mata Uang</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="matauang" name="matauang" value="" required>
				</div>
            </div>

            <div class="form-group row">
				<label for="email" class="col-sm-2 col-form-label">Kurs</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" id="kursberapa" name="kursberapa" value="" min="0" required>
				</div>
            </div>

            <div class="form-group row">
				<label for="email" class="col-sm-2 col-form-label">Audit</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="audit" name="audit" value="" required>
				</div>
            </div>

            <div class="form-group row">
				<label for="email" class="col-sm-2 col-form-label">Create Date</label>
				<div class="col-sm-10">
					<input type="date" class="form-control" id="createdate" name="createdate" value="" readonly>
				</div>
            </div>

			<div class="form-group row justify-content-end">
				<div class="col-sm-10">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
            </div>
		</form>
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

<script>
    // Get today's date
    const today = new Date().toISOString().split('T')[0];
    
    // Set the value of the input field with id 'createdate' to today's date
    document.getElementById('createdate').value = today;
</script>