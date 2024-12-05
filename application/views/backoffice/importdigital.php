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
                <div class="card-header d-flex flex-column flex-md-row justify-content-between align-items-center">
                    <div class="d-flex flex-row align-items-center mb-3 mb-md-0">
                        <div class="custom-spacing me-2">Show</div>
                        <div class="custom-spacing me-2">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">10</button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="#" onclick="changeItemsPerPage(10)">10</a></li>
                                <li><a class="dropdown-item" href="#" onclick="changeItemsPerPage(25)">25</a></li>
                                <li><a class="dropdown-item" href="#" onclick="changeItemsPerPage(50)">50</a></li>
                                <li><a class="dropdown-item" href="#" onclick="changeItemsPerPage(100)">100</a></li>
                            </ul>
                        </div>
                        <div class="ms-2"> Entries</div>
                    </div>
                    <h5 class="mb-0">Data List</h5>
                    <div class="clearable position-relative" style="width: auto; position: relative;">
                        <input type="text" id="searchInput" class="form-control" placeholder="Search..." style="padding-right: 24px;">
                        <!--i class="clearable__clear" id="cancelSearch">&times;</i-->
                        <i class="clearable__clear" id="cancelSearch" style="position: absolute;top: 50%;right: 8px;transform: translateY(-50%);cursor: pointer;display: none;">&times;</i> <!-- display: none; -->
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive" style="overflow-x: auto;">
                        <table class="table table-bordered table-striped mb-0"> <!-- style="width: 100%; min-width: 600px; max-width: 100%;" -->
                            <thead id="data-head" style="background-color: #e7dbeb;position: sticky;">
                                <tr>
                                    <th scope="col" style="width:20%;" data-column="day">Day <i class="bi bi-caret-down-fill"></i></th>
                                    <th scope="col" style="width:20%;" data-column="channelId">Channel ID <i class="bi bi-caret-down-fill"></i></th>
                                    <th scope="col" style="width:20%;" data-column="channelName">Channel Name <i class="bi bi-caret-down-fill"></i></th>
                                    <th scope="col" style="width:20%;" data-column="videoId">Video Id <i class="bi bi-caret-down-fill"></i></th>
                                    <th scope="col" style="width:20%;" data-column="videoTitle">Video Title <i class="bi bi-caret-down-fill"></i></th>
                                </tr>
                            </thead>
                            <tbody id="data-body" style="overflow-y: auto;">
                                <?php if (!empty($channels)): ?>
                                    <?php foreach ($channels as $channel): ?>
                                        <tr>
                                            <td  scope="row" style="width:20%;" data-label="day"><?php echo $channel['day']; ?></td>
                                            <td  scope="row" style="width:20%;" data-label="channelId"><?php echo $channel['channelId']; ?></td>
                                            <td  scope="row" style="width:20%;" data-label="channelName"><?php echo $channel['channelName']; ?></td>
                                            <td  scope="row" style="width:20%;" data-label="videoId"><?php echo $channel['videoId']; ?></td>
                                            <td  scope="row" style="width:20%;" data-label="videoTitle"><?php echo $channel['videoTitle']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center">No channels found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <div class="text-center" id="no-results" style="display: none; padding: 20px;top: 50%;left: 50%;right: 50%;">No results found.</div>
                    </div>
                    <div id="entries-info" class="mb-3 mb-md-0" style="padding: 20px;">Showing 1 to 10 of 3053 entries</div>
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center mt-3" id="pagination">
                            <!-- Pagination buttons will be rendered here -->
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

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
    var itemsPerPage = 10;
    var currentPage = 1;
    //var filteredData = initialized(videos);
    var filteredData = videos;
    var totalItems = videos.length;
    var totalPages = Math.ceil(totalItems / itemsPerPage);
    var sortColumn = '';  // Default sort column
    var sortOrder = 'asc';  // Default sort order
    var button = document.getElementById('dropdownMenuButton');

    function renderTable(data) {
        var $dataBody = $('#data-body');
        $dataBody.empty();
        var offset = (currentPage - 1) * itemsPerPage;
        var paginatedData = data.slice(offset, offset + itemsPerPage);

        var no = offset + 1; // Set nomor urut berdasarkan offset saat ini

        paginatedData.forEach(row => {
            $dataBody.append(`
                <tr>
                    <td scope="row" style="width:20%;" data-label="day">${row.day}</td>
                    <td scope="row" style="width:20%;" data-label="channelId">${row.channelId}</td>
                    <td scope="row" style="width:20%;" data-label="channelName">${row.channelName}</td>
                    <td scope="row" style="width:20%;" data-label="videoId">${row.videoId}</td>
                    <td scope="row" style="width:20%;" data-label="videoTitle">${row.videoTitle}</td>
                </tr>
            `);
        });
    }

    function sortData(column, order) {
        if (column === '') {
            return filteredData.slice();
        }

        /*if (column === 'No') {
            return filteredData.slice().sort((a, b) => {
                var valA = a.originalIndex;
                var valB = b.originalIndex;

                if (valA < valB) return order === 'asc' ? -1 : 1;
                if (valA > valB) return order === 'asc' ? 1 : -1;

                return 0;
            });
        }*/

        return filteredData.slice().sort((a, b) => {
            var valA = a[column] || '';
            var valB = b[column] || '';
            if (typeof valA === 'string') valA = valA.toLowerCase();
            if (typeof valB === 'string') valB = valB.toLowerCase();

            if (valA < valB) return order === 'asc' ? -1 : 1;
            if (valA > valB) return order === 'asc' ? 1 : -1;

            return 0;
        });
    }

    function navigatePage(page) {
        currentPage = page;
        var sortedData = sortData(sortColumn, sortOrder);
        renderTable(sortedData);
        updatePagination();
        updateEntriesInfo();
    }

    function updatePagination() {
        var $pagination = $('.pagination');
        $pagination.empty();

        if (currentPage > 1) {
            $pagination.append(`<li class="page-item"><button class="page-link" onclick="navigatePage(${currentPage - 1})">Previous</button></li>`);
        } else {
            $pagination.append(`<li class="page-item disabled"><button class="page-link">Previous</button></li>`);
        }

        var startPage = Math.max(1, currentPage - 1);
        var endPage = Math.min(totalPages, currentPage + 1);

        if (startPage > 1) {
            $pagination.append(`<li class="page-item disabled"><button class="page-link">...</button></li>`);
        }

        for (let i = startPage; i <= endPage; i++) {
            if (i === currentPage) {
                $pagination.append(`<li class="page-item active"><button class="page-link">${i} <span class="sr-only"></span></button></li>`);
            } else {
                $pagination.append(`<li class="page-item"><button class="page-link" onclick="navigatePage(${i})">${i}</button></li>`);
            }
        }

        if (endPage < totalPages) {
            $pagination.append(`<li class="page-item disabled"><button class="page-link">...</button></li>`);
        }

        if (currentPage < totalPages) {
            $pagination.append(`<li class="page-item"><button class="page-link" onclick="navigatePage(${currentPage + 1})">Next</button></li>`);
        } else {
            $pagination.append(`<li class="page-item disabled"><button class="page-link">Next</button></li>`);
        }
    }

    function debounce(func, wait) {
        var timeout;
        return function(...args) {
            const later = () => {
                clearTimeout(timeout);
                func.apply(this, args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    function changeItemsPerPage(newItemsPerPage) {
        itemsPerPage = newItemsPerPage;
        totalPages = Math.ceil(totalItems / itemsPerPage);
        currentPage = 1;
        var sortedData = sortData(sortColumn, sortOrder);
        renderTable(sortedData);
        updatePagination();
        updateEntriesInfo();
        button.textContent = `${newItemsPerPage}`;
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
        renderTable(sortedData);
        updatePagination();
        //updateEntriesInfo();
    }

    function updateEntriesInfo() {
        var startEntry = (currentPage - 1) * itemsPerPage + 1;
        var endEntry = Math.min(currentPage * itemsPerPage, totalItems);
        $('#entries-info').text(`Showing ${startEntry} to ${endEntry} of ${totalItems} entries`);
    }

    $(document).ready(function() {
    function refreshTable() {
        var sortedData = sortData(sortColumn, sortOrder);
        renderTable(sortedData);
        updatePagination();
        updateEntriesInfo();
    }

    $('#searchInput').on('keyup', debounce(function() {
    var query = $(this).val().toLowerCase();

    if (query) {
        $('#cancelSearch').show();  // Tampilkan tombol cancel saat ada input
    } else {
        $('#cancelSearch').hide();  // Sembunyikan tombol saat input kosong
    }

    filteredData = videos.filter(row => 
        Object.values(row).some(val => {
            // Pastikan val adalah string sebelum memanggil toLowerCase
            if (typeof val === 'string') {
                return val.toLowerCase().includes(query);
            }
            // Jika val bukan string, kita bisa memilih untuk mengabaikannya atau melakukan sesuatu
            return false;
        })
    );

    if (query.length > 2 && filteredData.length === 0) {
        $('#no-results').show();
    } else {
        $('#no-results').hide();
    }

    totalItems = filteredData.length;
    totalPages = Math.ceil(totalItems / itemsPerPage);
    currentPage = 1;
    refreshTable();
    }, 300));

    $('#data-head th').on('click', function() {
        var column = $(this).data('column');
        handleSort(column);
        updateEntriesInfo();
    });

    $('#cancelSearch').on('click', function() {
        $('#searchInput').val('');
        videos = <?php echo json_encode($channels); ?>;
        filteredData = videos;
        $(this).hide();  // Sembunyikan tombol cancel
        totalItems = filteredData.length;
        totalPages = Math.ceil(totalItems / itemsPerPage);
        currentPage = 1;
        $('#no-results').hide();  // Pastikan pesan "No results found" disembunyikan
        refreshTable();
    });

    filteredData = videos;  // Initialize filteredData with allData on page load
    refreshTable();
    });
</script>
</html>
