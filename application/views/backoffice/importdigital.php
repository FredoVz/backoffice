<html>
    <!-- Custom CSS -->
<style>
    /* IMPORT FILE */
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

    /* SEARCH */
    .clearable input[type=text] {
        padding-right: 24px;
    }

    .clearable input[type=text]:not(:placeholder-shown) + .clearable__clear {
        display: inline;
    }

    @media (max-width: 576px) {
        .clearable {
            width: 100%; /* Full width on small screens */
        }
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
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Data List</h5>
                    <div class="clearable" style="width: 250px; position: relative;">
                        <input type="text" id="searchInput" class="form-control" placeholder="Search..." style="padding-right: 24px;">
                        <!--i class="clearable__clear" id="cancelSearch">&times;</i-->
                        <span id="cancelSearch" class="clearable__clear" style="position: absolute;top: 50%;right: 8px;transform: translateY(-50%);cursor: pointer;display: none;">&times;</span>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped mb-0"> <!-- style="width: 100%; min-width: 600px; max-width: 100%;" -->
                            <thead id="data-head" style="background-color: #e7dbeb;">
                                <tr>
                                    <th>Channel ID <i class="bi bi-caret-down-fill"></i></th>
                                    <th>Channel Name <i class="bi bi-caret-down-fill"></i></th>
                                </tr>
                            </thead>
                            <tbody id="video-container">
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
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center mt-3" id="pagination-controls">
                            <!-- Pagination buttons will be rendered here -->
                        </ul>
                    </nav>
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

<!-- JavaScript -->
<script>
    var videos = <?php echo json_encode($channels); ?>;
    var videosPerPage = 10;
    var currentPage = 1;
    var filteredVideos = videos;

    function renderVideos() {
        var container = document.getElementById('video-container');
        container.innerHTML = '';

        var start = (currentPage - 1) * videosPerPage;
        var paginatedVideos = filteredVideos.slice(start, start + videosPerPage);

        if (paginatedVideos.length === 0) {
            container.innerHTML = '<tr><td colspan="2" class="text-center">No channels found.</td></tr>';
            return;
        }

        paginatedVideos.forEach(video => {
            container.insertAdjacentHTML('beforeend', `
                <tr>
                    <td>${video.id}</td>
                    <td>${video.name}</td>
                </tr>
            `);
        });
    }

    function renderPaginationControls() {
        var totalPages = Math.ceil(filteredVideos.length / videosPerPage);
        var controls = document.getElementById('pagination-controls');
        controls.innerHTML = '';

        controls.insertAdjacentHTML('beforeend', `
            <li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
                <a class="page-link" href="#" onclick="goToPage(${currentPage - 1})">Previous</a>
            </li>
        `);

        for (let i = 1; i <= totalPages; i++) {
            controls.insertAdjacentHTML('beforeend', `
                <li class="page-item ${i === currentPage ? 'active' : ''}">
                    <a class="page-link" href="#" onclick="goToPage(${i})">${i}</a>
                </li>
            `);
        }

        controls.insertAdjacentHTML('beforeend', `
            <li class="page-item ${currentPage === totalPages ? 'disabled' : ''}">
                <a class="page-link" href="#" onclick="goToPage(${currentPage + 1})">Next</a>
            </li>
        `);
    }

    function goToPage(page) {
        currentPage = page;
        var sortedData = sortData(sortColumn, sortOrder);
        renderVideos();
        //renderVideos(sortedData);
        renderPaginationControls();
    }

    function sortData(column, order) {
        if (column === '') {
            return filteredVideos.slice();
        }

        /*if (column === 'No') {
            return filteredVideos.slice().sort((a, b) => {
                var valA = a.originalIndex;
                var valB = b.originalIndex;

                if (valA < valB) return order === 'asc' ? -1 : 1;
                if (valA > valB) return order === 'asc' ? 1 : -1;

                return 0;
            });
        }*/

        return filteredVideos.slice().sort((a, b) => {
            var valA = a[column] || '';
            var valB = b[column] || '';
            if (typeof valA === 'string') valA = valA.toLowerCase();
            if (typeof valB === 'string') valB = valB.toLowerCase();

            if (valA < valB) return order === 'asc' ? -1 : 1;
            if (valA > valB) return order === 'asc' ? 1 : -1;

            return 0;
        });
    }

    function handleSort(column) {
        if (sortColumn === column) {
            sortOrder = sortOrder === 'asc' ? 'desc' : 'asc';
        } else {
            sortColumn = column;
            sortOrder = 'asc';
        }

        $('#data-head th').each(function() {
            var $this = $(this);
            var column = $this.data('column');
            var $icon = $this.find('i');
            if (column === sortColumn) {

                $icon.removeClass('bi-caret-down-fill bi-caret-up-fill').addClass(sortOrder === 'asc' ? 'bi-caret-up-fill' : 'bi-caret-down-fill');
            } else {
                $icon.removeClass('bi-caret-up-fill bi-caret-down-fill').addClass('bi-caret-down-fill');
            }
        });

        var sortedData = sortData(sortColumn, sortOrder);
        renderVideos(sortedData);
        renderPaginationControls();
        //updateEntriesInfo();
    }

    document.getElementById('searchInput').addEventListener('input', function () {
        const query = this.value.toLowerCase();
        filteredVideos = videos.filter(video => 
            video.name.toLowerCase().includes(query) ||
            video.id.toLowerCase().includes(query)
        );
        currentPage = 1;
        renderVideos();
        renderPaginationControls();
    });

    document.getElementById('cancelSearch').addEventListener('click', function () {
        document.getElementById('searchInput').value = '';
        filteredVideos = videos;
        this.style.display = 'none';
        currentPage = 1;
        renderVideos();
        renderPaginationControls();
    });

    document.getElementById('searchInput').addEventListener('input', function () {
        document.getElementById('cancelSearch').style.display = this.value ? 'block' : 'none';
    });

    /*document.getElementById('data-head th').addEventListener('click', function () {
        var column = $(this).data('column');
        handleSort(column);
        //updateEntriesInfo();
    });*/

    /*function updateFileName(input) {
        document.getElementById('file-name').value = input.files[0]?.name || 'No file chosen';
    }*/

    renderVideos();
    //renderVideos(sortedData);
    renderPaginationControls();
</script>

<!--script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script-->
</html>
