
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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

        .table {
            width: 1500px;
        }
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

	/* Tabel bawah isi kolom bisa di scroll */
	.table-responsive {
        max-height: 560px;
    }

	.table thead {
        position: sticky;
        top: 0;
        z-index: 2; /* Ensure the header stays on top */
    }
    /* End of Tabel bawah isi kolom bisa di scroll */
</style>

<style>
/* Styling untuk tombol */
.btnn {
    background-color: transparent;
    border: 2px solid #c9c9c9;
    color: green;
    padding: 10px 20px;
    font-size: 12px;
    cursor: pointer;
    border-radius: 5px;
    display: inline-block;
    transition: background-color 0.3s, transform 0.2s ease;
  }

  .btnn:hover {
    background-color: #969696;
    color: white;
    transform: scale(1.05);
  }

  .btnn:active {
    transform: scale(0.98);
  }

  .btnn p {
    margin: 0;
    font-weight: bold;
  }
</style>

</head>
