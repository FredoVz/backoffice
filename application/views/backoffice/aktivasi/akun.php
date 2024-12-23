<div class="container-fluid mt-5">
    <!-- Table to display users -->

    <div class="flash-data" data-flashdata='<?= json_encode($this->session->flashdata('message')); ?>'></div>

    <div class="row">
        <div class="mt-5">
            <form action="<?= base_url('aktivasi/exportakun') ?>" method="post">
                <input type="hidden" name="arrayUser" id="arrayUser"
                value='<?= json_encode($arrayUser); ?>'>
                <button type="submit" class="btn btn-primary">Export</button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card shadow-lg mb-5 mt-5">
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
                    <h5 class="mb-0">Data Akun</h5>
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
                                    <th scope="col" style="width:20%;" data-column="YoutubeChannelId">ChannelID <i class="bi bi-caret-down-fill"></i></th>
                                    <th scope="col" style="width:20%;" data-column="YoutubeChannelNama">ChannelNama <i class="bi bi-caret-down-fill"></i></th>
                                    <th scope="col" style="width:20%;" data-column="MoU">MoU <i class="bi bi-caret-down-fill"></i></th>
                                    <th scope="col" style="width:20%;" data-column="Status">Status <i class="bi bi-caret-down-fill"></i></th>
                                    <th scope="col" style="width:20%;">Action </th>
                                </tr>
                            </thead>
                            <tbody id="data-body" style="overflow-y: auto;">
                                <?php if (!empty($arrayUser)): ?>
                                    <?php foreach ($arrayUser as $user): ?>
                                        <tr>
                                            <td scope="row" style="width:20%;" data-label="YoutubeChannelId"><?php echo $user['YoutubeChannelId']; ?></td>
                                            <td scope="row" style="width:20%;" data-label="YoutubeChannelNama"><?php echo $user['YoutubeChannelNama']; ?></td>
                                            <td scope="row" style="width:20%;" data-label="MoU">
                                                <?php if ($user['MoU'] == "Congratulations! Your account is approving"): ?>
                                                    <a href="https://omegasoft.co.id/images/omegamusic/0000J_2024041902417109_MoU.pdf" download="" target="_blank"><button class="btn btn-primary" type="button">Download</button></a>
                                                <?php elseif ($user['MoU'] == "Congratulations! Your registration is successful..."): ?>
                                                    <!-- Button for confirmation when Status is 1 -->
                                                    <p>-</p>
                                                <?php endif; ?>
                                            </td>
                                            <td scope="row" style="width:20%;" data-label="Status">
                                                <?php if ($user['Status'] == 0): ?>
                                                    <!-- Form for confirmation when Status is 0 -->
                                                    <p style="color:blue;">Waiting</p>
                                                <?php elseif ($user['Status'] == 1): ?>
                                                    <!-- Button for confirmation when Status is 1 -->
                                                    <p style="color:green;">Approve</p>
                                                <?php elseif ($user['Status'] == 2): ?>
                                                    <!-- Button for confirmation when Status is 1 -->
                                                    <p style="color:red;">Rejected</p>
                                                <?php endif; ?>
                                            </td>
                                            <td scope="row" style="width:20%;">
                                                <?php if ($user['Status'] == 0): ?>
                                                    <!-- Form for confirmation when Status is 0 -->
                                                    <form action="<?= base_url('aktivasi/akun'); ?>" method="post">
                                                        <input type="hidden" name="YoutubeChannelNama" value="<?php echo $user['YoutubeChannelNama']; ?>">
                                                        <input type="hidden" name="MoU" value="<?php echo $user['MoU']; ?>">
                                                        <input type="hidden" name="YoutubeChannelId" value="<?php echo $user['YoutubeChannelId']; ?>">
                                                        <input type="hidden" name="Status" value="<?php echo $user['Status']; ?>">
                                                        <button class="btn btn-primary">Konfirmasi</button>
                                                    </form>
                                                    <button class="btn btn-danger" data-toggle="modal" data-target="#rejectModal" data-userid="PM00000014">Reject</button>
                                                <?php elseif ($user['Status'] == 1): ?>
                                                    <!-- Button for confirmation when Status is 1 -->
                                                    <button class="btn btn-success" disabled>Terkonfirmasi</button>
                                                <?php elseif ($user['Status'] == 2): ?>
                                                    <!-- Button for confirmation when Status is 1 -->
                                                    <button class="btn btn-danger" disabled>Gagal</button>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center">No data found.</td>
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

<div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="rejectModalLabel">Tolak Akun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="rejectForm" action="<?php base_url('aktivasi/rejectakun'); ?>" method="post">
          <input type="hidden" name="UserID" id="rejectUserID">
          <div class="form-group">
            <label for="reason">Alasan Penolakan</label>
            <textarea class="form-control" name="reason" id="reason" rows="4" required=""></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" form="rejectForm" class="btn btn-danger">Submit</button>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

<!-- JavaScript -->
<script>
    var data = <?php echo json_encode($arrayUser); ?>;
    var itemsPerPage = 10;
    var currentPage = 1;
    //var filteredData = initialized(data);
    var filteredData = data;
    var totalItems = data.length;
    var totalPages = Math.ceil(totalItems / itemsPerPage);
    var sortColumn = '';  // Default sort column
    var sortOrder = 'asc';  // Default sort order
    var button = document.getElementById('dropdownMenuButton');

    function renderTable(data) {
        var $dataBody = $('#data-body');
        $dataBody.empty();

		// Cek jika data kosong
		if (data.length === 0) {
        	$dataBody.append(`
                <tr>
                    <td colspan="5" class="text-center">No data found.</td>
                </tr>
            `);
            return; // Keluar dari fungsi jika data kosong
        }

        var offset = (currentPage - 1) * itemsPerPage;
        var paginatedData = data.slice(offset, offset + itemsPerPage);

        var no = offset + 1; // Set nomor urut berdasarkan offset saat ini

        paginatedData.forEach(row => {
            var actionColumn = ''; // This will hold the form or the button
            var statusColumn = '';
            var mouColumn = '';

            // Check the status and set action column accordingly
            if (row.MoU == "Congratulations! Your registration is successful...") {
                //
                mouColumn = `
                    <p>-</p>
                `;
            } else if (row.MoU == "Congratulations! Your account is approving") {
                //
                mouColumn = `
                    <a href="https://omegasoft.co.id/images/omegamusic/0000J_2024041902417109_MoU.pdf" download="" target="_blank"><button class="btn btn-primary" type="button">Download</button></a>
                `;
            }

            // Check the status and set action column accordingly
            if (row.Status == 0) {
                actionColumn = `
                    <form action="<?= base_url('aktivasi/akun'); ?>" method="post">
                        <input type="hidden" name="YoutubeChannelId" value="${row.YoutubeChannelId}">
                        <input type="hidden" name="YoutubeChannelNama" value="${row.YoutubeChannelNama}">
                        <input type="hidden" name="MoU" value="${row.MoU}">
                        <input type="hidden" name="Status" value="${row.Status}">
                        <button class="btn btn-primary">Konfirmasi</button>
                    </form>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#rejectModal" data-userid="PM00000014">Reject</button>
                `;
                statusColumn = `
                    <p style="color:blue;">Waiting</p>
                `;
            } else if (row.Status == 1) {
                actionColumn = `
                    <button class="btn btn-success" disabled>Terkonfirmasi</button>
                `;
                statusColumn= `
                    <p style="color:green;">Approve</p>
                `;
            } else if (row.Status == 2) {
                actionColumn = `
                    <button class="btn btn-danger" disabled>Gagal</button>
                `;
                statusColumn= `
                    <p style="color:red;">Rejected</p>
                `;
            }

            $dataBody.append(`
                <tr>
                    <td scope="row" style="width:20%;" data-label="YoutubeChannelId">${row.YoutubeChannelId}</td>
                    <td scope="row" style="width:20%;" data-label="YoutubeChannelNama">${row.YoutubeChannelNama}</td>
                    <td scope="row" style="width:20%;" data-label="MoU">${mouColumn}</td>
                    <td scope="row" style="width:20%;" data-label="Status">${statusColumn}</td>
                    <td scope="row" style="width:20%;">
                        ${actionColumn}
                    </td>
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

    filteredData = data.filter(row => 
        Object.values(row).some(val => {
            // Pastikan val adalah string sebelum memanggil toLowerCase
            if (typeof val === 'string') {
                return val.toLowerCase().includes(query);
            }
            // Jika val bukan string, kita bisa memilih untuk mengabaikannya atau melakukan sesuatu
            return false;
        })
    );

	/*
    if (query.length > 2 && filteredData.length === 0) {
        $('#no-results').show();
    } else {
        $('#no-results').hide();
    }
	*/

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
        data = <?php echo json_encode($arrayUser); ?>;
        filteredData = data;
        $(this).hide();  // Sembunyikan tombol cancel
        totalItems = filteredData.length;
        totalPages = Math.ceil(totalItems / itemsPerPage);
        currentPage = 1;
        $('#no-results').hide();  // Pastikan pesan "No results found" disembunyikan
        refreshTable();
    });

    filteredData = data;  // Initialize filteredData with allData on page load
    refreshTable();
    });
</script>
