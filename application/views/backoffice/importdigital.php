<!-- Custom CSS -->
<style>
    .btn-light {
        background-color: white;
        border: 1px solid #ced4da;
    }

    #file-name {
        background-color: #e7dbeb;
        cursor: pointer; /* Makes the input look clickable */
    }

    @media (max-width: 768px) {
    .table-responsive {
        overflow-x: auto; /* Allows horizontal scrolling on smaller screens */
    }
}
</style>
<!-- justify-content-center -->
<div class="container-fluid mt-5">
	<!-- #e7dbeb -->
	<!-- Outer Row -->
	<div class="row justify-content-center">
		<div class="col-xl-5 col-lg-12 col-md-9">
			<div class="card o-hidden border-0 shadow-lg my-5" style="background-color: #e7dbeb;">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg-12">
							<div class="p-5">
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4">Import Digital</h1>
								</div>

								<!-- Display error or success message -->
								<?php if (isset($error)): ?>
                                    <p class="alert alert-danger" role="alert">
                                        <?php echo $error; ?>
                                    </p>
                                <?php elseif (isset($success)): ?>
                                    <p class="alert alert-success" role="alert">
                                        <?php echo $success; ?>
                                    </p>
                                <?php endif; ?>

								<form action="<?php echo base_url('importdigital/index'); ?>" method="post" enctype="multipart/form-data">
                                    <!-- Hidden File Input -->
                                    <input type="file" name="excel" id="excel" class="d-none" required onchange="updateFileName(this)">
                                    <label>Upload File (<span style="color: red;">*csv & max 10mb</span>)</label>
                                    <!-- Custom File Input -->
                                    <div class="input-group">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-light" onclick="document.getElementById('excel').click()">Choose File</button>
                                        </div>
                                        <input type="text" class="form-control" id="file-name" placeholder="No file chosen" readonly>
                                    </div>
									<button type="submit" name="submit" class="btn btn-success">Upload</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!--#e7dbeb-->
	<!-- Table to display channels -->
	<div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card shadow-lg mb-5">
                <div class="card-header">
                    <h5 class="text-center">Data List</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped mb-0"> <!-- style="width: 100%; min-width: 600px; max-width: 100%;" -->
                            <thead style="background-color: #e7dbeb;">
                                <tr>
                                    <th>Channel ID</th>
                                    <th>Channel Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($channels)): ?>
                                    <?php foreach ($channels as $channel): ?>
                                        <tr>
                                            <td><?php echo $channel['id']; ?></td>
                                            <td><?php echo $channel['name']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="2" class="text-center">No channels found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to Handle File Name -->
<script>
    // Open file dialog when clicking the text input
    document.getElementById('file-name').addEventListener('click', function () {
        document.getElementById('excel').click();
    });

    // Update the text input with the selected file name
    function updateFileName(input) {
        var fileName = input.files.length > 0 ? input.files[0].name : 'No file chosen';
        document.getElementById('file-name').value = fileName;
    }
</script>