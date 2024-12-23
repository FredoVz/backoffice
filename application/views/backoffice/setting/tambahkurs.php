<!-- Begin Page Content -->
<div class="container-fluid mt-5">
	<div class="row">
        <div class="col-lg-8 mt-5">

		<div class="flash-data" data-flashdata='<?= json_encode($this->session->flashdata('message')); ?>'></div>

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
                <label for="matauang" class="col-sm-2 col-form-label">Mata Uang</label>
                <div class="col-sm-5">
                    <select name="matauangSelect" id="matauangSelect" class="form-control" onchange="toggleInput()">
                        <option value="">Select Menu</option>
                        <?php foreach ($arrayKurs as $kurs): ?>
                        <option value="<?= $kurs['MataUang']; ?>"><?= $kurs['MataUang']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="matauangInput" name="matauangInput" value="" placeholder="Tambah Mata Uang Baru" oninput="toggleSelect()">
                </div>
			</div>

            <div class="form-group row">
				<label for="email" class="col-sm-2 col-form-label">Kurs</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" id="kursberapa" name="kursberapa" value="" min="0" required>
				</div>
            </div>

            <!--div class="form-group row">
				<label for="email" class="col-sm-2 col-form-label">Audit</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="audit" name="audit" value="" required>
				</div>
            </div-->

            <div class="form-group row">
				<!--label for="email" class="col-sm-2 col-form-label">Create Date</label-->
				<div class="col-sm-10">
					<input type="hidden" class="form-control" id="createdate" name="createdate" value="" readonly>
				</div>
            </div>

			<div class="form-group row justify-content-end">
				<div class="col-sm-10">
					<button type="submit" class="btn btn-primary">Submit</button>
                    <!--button type="submit" class="btn btn-primary" disabled>Submit</button-->
                    <a href="<?php echo base_url('setting/kurs') ?>" class="btn btn-danger">Back</a>
				</div>
            </div>
		</form>
		</div>
	</div>
    
</div>
<!-- /.container-fluid -->

<!-- Fungsi Create Date Today -->
<script>
    // Get today's date
    var today = new Date().toISOString().split('T')[0];
    
    // Set the value of the input field with id 'createdate' to today's date
    document.getElementById('createdate').value = today;
</script>

<!-- Fungsi Toggle Disabled Mata Uang Dropdown dan Inputan -->
<script>
    // Fungsi untuk menonaktifkan atau mengaktifkan input dan dropdown
    function toggleInput() {
        var select = document.getElementById('matauangSelect');
        var input = document.getElementById('matauangInput');

        // Jika dropdown memiliki nilai yang dipilih, disable input
        if (select.value !== "") {
            input.disabled = true;
            input.value = ""; // Kosongkan input jika dropdown dipilih
        } else {
            input.disabled = false;
        }
    }

    // Fungsi untuk menonaktifkan atau mengaktifkan dropdown dan input
    function toggleSelect() {
        var select = document.getElementById('matauangSelect');
        var input = document.getElementById('matauangInput');

        // Jika ada input yang diisi, disable dropdown
        if (input.value !== "") {
            select.disabled = true;
            select.value = ""; // Kosongkan dropdown jika input diisi
        } else {
            select.disabled = false;
        }
    }

    // Panggil fungsi untuk inisialisasi status awal (misalnya ketika halaman pertama kali dimuat)
    document.addEventListener('DOMContentLoaded', function() {
        toggleInput();
        toggleSelect();
    });
</script>