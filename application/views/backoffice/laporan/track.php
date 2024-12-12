<div class="container-fluid mt-5">
    <!-- Table to display users -->

    <div class="flash-data" data-flashdata='<?= json_encode($this->session->flashdata('message')); ?>'></div>

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card shadow-lg mb-5 mt-5">
                <div class="card-header d-flex flex-column flex-md-row justify-content-between align-items-center">
                    <div class="col-lg-10" style="text-align:center;">
                        <h5 class="mb-0">Laporan Track</h5>
                    </div>

                    <div class="col-lg-2" style="text-align:right;">
                        <form action="<?= base_url('laporan/exporttrack') ?>" method="post">
                            <input type="hidden" name="arrayTrack" id="arrayTrack"
                            value='<?= json_encode($arrayTrack); ?>'>
                            <button type="submit" class="btn btn-success">Export</button>
                        </form>
                    </div>
                </div>

                <form action="<?= base_url('laporan/track'); ?>" method="post">
                    <div class="card-header d-flex flex-column flex-md-row justify-content-between align-items-center">
                        <div class="col-lg-4">
                            <label for="">Tanggal Awal</label>
                            <input type="date" class="form-control" name="tanggalawal" id="tanggalawal" value="">
                        </div>
                        <div class="col-lg-4">
                            <label for="">Tanggal Akhir</label>
                            <input type="date" class="form-control" name="tanggalakhir" id="tanggalakhir" value="">
                        </div>
                        <div class="col-lg-4">
                            <label for="">AccountName</label>
                            <select name="ytchannelnameSelect" id="ytchannelnameSelect" class="form-control">
                                <option value="">ALL</option>
                                <?php foreach ($arrayUser as $user): ?>
                                <option value="<?= $user['KodeUser']; ?>"><?= $user['YoutubeChannelNama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="card-header d-flex flex-column flex-md-row justify-content-between align-items-center">
                        <div class="col-lg-12" style="text-align:right;">
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </div>
                    </div>
                </form>

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
                    <!--h5 class="mb-0">Laporan Account</h5-->
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
                                    <th scope="col" style="width:14%;" data-column="AccountName">AccountName <i class="bi bi-caret-down-fill"></i></th>
                                    <th scope="col" style="width:14%;" data-column="Tanggal">Tanggal <i class="bi bi-caret-down-fill"></i></th>
                                    <th scope="col" style="width:14%;" data-column="Keterangan">Keterangan <i class="bi bi-caret-down-fill"></i></th>
                                    <th scope="col" style="width:14%;" data-column="ISRC">ISRC <i class="bi bi-caret-down-fill"></i></th>
                                    <th scope="col" style="width:14%;" data-column="Author">Author <i class="bi bi-caret-down-fill"></i></th>
                                    <th scope="col" style="width:14%;" data-column="Composer">Composer <i class="bi bi-caret-down-fill"></i></th>
                                    <th scope="col" style="width:14%;" data-column="Genre">Genre <i class="bi bi-caret-down-fill"></i></th>
                                </tr>
                            </thead>
                            <tbody id="data-body" style="overflow-y: auto;">
                                <?php if (!empty($arrayTrack)): ?>
                                    <?php foreach ($arrayTrack as $track): ?>
                                        <tr>
                                            <td scope="row" style="width:14%;" data-label="AccountName"><?php echo $track['AccountName']; ?></td>
                                            <td scope="row" style="width:14%;" data-label="Tanggal"><?php echo date('d-m-Y', strtotime($track['Tanggal'])); ?></td>
                                            <td scope="row" style="width:14%;" data-label="Keterangan"><?php echo $track['Keterangan']; ?></td>
                                            <td scope="row" style="width:14%;" data-label="ISRC"><?php echo $track['ISRC']; ?></td>
                                            <td scope="row" style="width:14%;" data-label="Author"><?php echo $track['Author']; ?></td>
                                            <td scope="row" style="width:14%;" data-label="Composer"><?php echo $track['Composer']; ?></td>
                                            <td scope="row" style="width:14%;" data-label="Genre"><?php echo $track['Genre']; ?></td>
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

<!-- JavaScript -->
<script>
    var data = <?php echo json_encode($arrayTrack); ?>;
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
        var offset = (currentPage - 1) * itemsPerPage;
        var paginatedData = data.slice(offset, offset + itemsPerPage);

        var no = offset + 1; // Set nomor urut berdasarkan offset saat ini

        paginatedData.forEach(row => {

            // Format tanggal pada row.Tanggal (contoh: '2024-12-11 13:45:00')
            var tanggal = new Date(row.Tanggal);
            var formattedDateFull = tanggal.getFullYear() + '-' +
                ('0' + (tanggal.getMonth() + 1)).slice(-2) + '-' +
                ('0' + tanggal.getDate()).slice(-2) + ' ' +
                ('0' + tanggal.getHours()).slice(-2) + ':' +
                ('0' + tanggal.getMinutes()).slice(-2) + ':' +
                ('0' + tanggal.getSeconds()).slice(-2);
            
            /*
            var formattedDate = tanggal.getFullYear() + '-' +
                ('0' + (tanggal.getMonth() + 1)).slice(-2) + '-' +
                ('0' + tanggal.getDate()).slice(-2);
            */

            var formattedDate = ('0' + tanggal.getDate()).slice(-2) + '-' +
                ('0' + (tanggal.getMonth() + 1)).slice(-2) + '-' +
                tanggal.getFullYear();

            $dataBody.append(`
                <tr>
                    <td scope="row" style="width:14%;" data-label="AccountName">${row.AccountName}</td>
                    <td scope="row" style="width:14%;" data-label="Tanggal">${formattedDate}</td>
                    <td scope="row" style="width:14%;" data-label="Keterangan">${row.Keterangan}</td>
                    <td scope="row" style="width:14%;" data-label="ISRC">${row.ISRC}</td>
                    <td scope="row" style="width:14%;" data-label="Author">${row.Author}</td>
                    <td scope="row" style="width:14%;" data-label="Composer">${row.Composer}</td>
                    <td scope="row" style="width:14%;" data-label="Genre">${row.Genre}</td>
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
        data = <?php echo json_encode($arrayTrack); ?>;
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