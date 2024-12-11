<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');

        // Check if user is logged in, otherwise redirect to login page
		if (!$this->session->userdata('username_pusatmusik_backoffice')) {
			redirect('login'); // Redirect to login page if not logged in
		}
    }

	public function user()
	{
        $arrayUser = [
			[
				"Tanggal" => "2024-08-28 17:31:35.807",
				"YoutubeChannelId" => "uishbdUAdai-asSfda",
				"YoutubeChannelNama" => "Vidi Aldiano",
				"MonetizationStatus" => "Already",
				"RegisteredAs" => "Company",
				"MoU" => "Congratulations! Your account is approving",
				"Status" => "1",
			],
			[
				"Tanggal" => "2024-08-28 17:31:35.807",
				"YoutubeChannelId" => "UCQ7dUY53AOGGTYl_Myiurlw",
				"YoutubeChannelNama" => "Wilfredo Alexander Sutanto",
				"MonetizationStatus" => "NotYet",
				"RegisteredAs" => "Private/Individual",
				"MoU" => "Congratulations! Your account is approving",
				"Status" => "1",
			],
			[
				"Tanggal" => "2024-08-28 17:31:35.807",
				"YoutubeChannelId" => "uishbdUAdai-asSfda",
				"YoutubeChannelNama" => "Vidi Aldiano",
				"MonetizationStatus" => "Already",
				"RegisteredAs" => "CompanyNon",
				"MoU" => "Congratulations! Your registration is successful...",
				"Status" => "0",
			],
			[
				"Tanggal" => "2024-08-28 17:31:35.807",
				"YoutubeChannelId" => "UCQ7dUY53AOGGTYl_Myiurlw",
				"YoutubeChannelNama" => "Wilfredo Alexander Sutanto",
				"MonetizationStatus" => "NotYet",
				"RegisteredAs" => "Private/Individual",
				"MoU" => "Congratulations! Your registration is successful...",
				"Status" => "0",
			],
		];

		$data['arrayUser'] = $arrayUser;

		if ($this->input->post()) {
			$YoutubeChannelId = $this->input->post('YoutubeChannelId');  // Menangkap judul yang dikirimkan dari form
			$YoutubeChannelNama = $this->input->post('YoutubeChannelNama'); // Menangkap yt nama yang dikirimkan dari form
			$MonetizationStatus = $this->input->post('MonetizationStatus'); // Menangkap monetization status yang dikirimkan dari form
			$RegisteredAs = $this->input->post('RegisteredAs'); // Menangkap registered as yang dikirimkan dari form
			$MoU = $this->input->post('MoU');  // Menangkap judul yang dikirimkan dari form
			$Status = $this->input->post('Status');  // Menangkap status yang dikirimkan dari form
			$tanggalawal = $this->input->post('tanggalawal');  // Menangkap tanggalawal yang dikirimkan dari form
			$tanggalakhir = $this->input->post('tanggalakhir');  // Menangkap tanggalakhir yang dikirimkan dari form

			$this->session->set_flashdata('message', [
		        'icon' => 'success',
		        'title' => 'Berhasil!',
		        'text' => 'Data berhasil di confirm!',
			]);
			redirect('laporan/user');
		}

		else {
			// Load views with data and messages
		    $this->load->view('templates_admin/header');
		    $this->load->view('templates_admin/sidebar');
			$this->load->view('backoffice/laporan/user', $data);
			$this->load->view('templates_admin/footer');
		}
	}

    public function rejectakun(){
		if ($this->input->post()) {
			$YoutubeChannelId = $this->input->post('YoutubeChannelId');  // Menangkap judul yang dikirimkan dari form
			$YoutubeChannelNama = $this->input->post('YoutubeChannelNama'); // Menangkap yt nama yang dikirimkan dari form
			$MoU = $this->input->post('MoU');  // Menangkap judul yang dikirimkan dari form
			$Status = $this->input->post('Status');  // Menangkap status yang dikirimkan dari form

			$this->session->set_flashdata('message', [
		        'icon' => 'success',
		        'title' => 'Berhasil!',
		        'text' => 'Data berhasil di confirm!',
			]);
			redirect('laporan/user');
		}

		else {
			// Load views with data and messages
		    $this->load->view('templates_admin/header');
		    $this->load->view('templates_admin/sidebar');
			$this->load->view('backoffice/laporan/user');
			$this->load->view('templates_admin/footer');
		}
	}

	public function exportakun(){
		if ($this->input->post()) {
			// Get data from the database
			$arrayUser = json_decode($this->input->post('arrayUser'), true); // Decode JSON to array
			//$data['download'] = $this->Model_home->tampil_data('tb_download_pusatmusik')->result();
			$formatDate = date('dmy', time());

			// Set the filename
			$filename = "LaporanAkun_" . $formatDate . ".xls";

			// Set headers for the Excel file
			header("Content-Type: application/vnd.ms-excel");
			header("Content-Disposition: attachment; filename=\"$filename\"");
			header("Cache-Control: max-age=0");

			// Output the header row
			echo "No\tYoutubeChannelId\tYoutubeChannelName\tMonetizationStatus\tRegisteredAs\tMoU\tStatus\n";

			// Output data rows
			$no = 1;
			foreach ($arrayUser as $download) {
				// Convert status 0 to 'Waiting' and 1 to 'Approve'
				$status = ($download['Status'] == 0) ? 'Waiting' : 'Approve';
				$mou = ($download['MoU'] == "Congratulations! Your registration is successful...") ? '-' : 'https://omegasoft.co.id/images/omegamusic/0000J_2024041902417109_MoU.pdf';

				echo "$no\t{$download['YoutubeChannelId']}\t{$download['YoutubeChannelNama']}\t{$download['MonetizationStatus']}\t{$download['RegisteredAs']}\t$mou\t$status\n";
				$no++;
			}

			exit; // Ensure no further output
		}

		else {
			// Load views with data and messages
			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('backoffice/laporan/user');
			$this->load->view('templates_admin/footer');
		}
	}

	public function album()
	{
		$branch = "0000J/01";
		$arrayAlbum = [
			[
				"KodeUser" => $branch . "000040",
				"YoutubeChannelName" => "Wilfredo Alexander Sutanto",
				"Tanggal" => "2024-08-28 17:31:35.807",
				"Keterangan" => "Jehovah (Chapter I)",
				"UPC" => "3617666782835",
				"Jenis" => "Single",
				"CreateDate" => "04/11/2024",
				"Approve" => "1",
				"Aktif" => "1",
			],
			[
				"KodeUser" => $branch . "00003N",
				"YoutubeChannelName" => "Wilfredo Alexander Sutanto",
				"Tanggal" => "2024-08-28 17:31:35.807",
				"Keterangan" => "Blackpink Cover",
				"UPC" => "3617666174104",
				"Jenis" => "Single",
				"CreateDate" => "31/10/2024",
				"Approve" => "1",
				"Aktif" => "1",
			],
			[
				"KodeUser" => $branch . "00003Z",
				"YoutubeChannelName" => "Vidi Aldiano",
				"Tanggal" => "2024-08-28 17:31:35.807",
				"Keterangan" => "Bahagia Itu Indah Sapa Bahagia Yang Bernama Indah",
				"UPC" => "112233",
				"Jenis" => "Single",
				"CreateDate" => "30/10/2024",
				"Approve" => "1",
				"Aktif" => "0",
			],
			[
				"KodeUser" => $branch . "000057",
				"YoutubeChannelName" => "Vidi Aldiano",
				"Tanggal" => "2024-08-28 17:31:35.807",
				"Keterangan" => "3617054696560",
				"UPC" => "3617054696560",
				"Jenis" => "Single",
				"CreateDate" => "30/10/2024",
				"Approve" => "1",
				"Aktif" => "0",
			],
		];

		$data['arrayAlbum'] = $arrayAlbum;

		if ($this->input->post()) {
			$keterangan = $this->input->post('keterangan'); // Menangkap keterangan yang dikirimkan dari form
			$upc = $this->input->post('upc');  // Menangkap upc yang dikirimkan dari form
			$jenis = $this->input->post('jenis');  // Menangkap jenis yang dikirimkan dari form
			$createdate = $this->input->post('createdate');  // Menangkap createdate yang dikirimkan dari form
			$approve = $this->input->post('approve');  // Menangkap approve yang dikirimkan dari form
			$aktif = $this->input->post('aktif');  // Menangkap aktif yang dikirimkan dari form
			$tanggalawal = $this->input->post('tanggalawal');  // Menangkap tanggalawal yang dikirimkan dari form
			$tanggalakhir = $this->input->post('tanggalakhir');  // Menangkap tanggalakhir yang dikirimkan dari form
			$ytchannelnameSelect = $this->input->post('ytchannelnameSelect'); // Menangkap ytchannelnameSelect yang dikirimkan dari form

			$this->session->set_flashdata('message', [
		        'icon' => 'success',
		        'title' => 'Berhasil!',
		        'text' => 'Data berhasil di confirm!',
			]);
			redirect('laporan/album');
		}

		else {
			// Load views with data and messages
		    $this->load->view('templates_admin/header');
		    $this->load->view('templates_admin/sidebar');
			$this->load->view('backoffice/laporan/album', $data);
			$this->load->view('templates_admin/footer');
		}
	}

	public function aktifalbum(){
		if ($this->input->post()) {
			$keterangan = $this->input->post('keterangan'); // Menangkap keterangan yang dikirimkan dari form
			$upc = $this->input->post('upc');  // Menangkap upc yang dikirimkan dari form
			$jenis = $this->input->post('jenis');  // Menangkap jenis yang dikirimkan dari form
			$createdate = $this->input->post('createdate');  // Menangkap createdate yang dikirimkan dari form
			$approve = $this->input->post('approve');  // Menangkap approve yang dikirimkan dari form
			$aktif = $this->input->post('aktif');  // Menangkap aktif yang dikirimkan dari form

			$this->session->set_flashdata('message', [
		        'icon' => 'success',
		        'title' => 'Berhasil!',
		        'text' => 'Data berhasil di confirm!',
			]);
			redirect('laporan/album');
		}

		else {
			// Load views with data and messages
		    $this->load->view('templates_admin/header');
		    $this->load->view('templates_admin/sidebar');
			$this->load->view('backoffice/laporan/album');
			$this->load->view('templates_admin/footer');
		}
	}

	public function exportalbum(){
		if ($this->input->post()) {
			// Get data from the database
			$arrayAlbum = json_decode($this->input->post('arrayAlbum'), true); // Decode JSON to array
			//$data['download'] = $this->Model_home->tampil_data('tb_download_pusatmusik')->result();
			$formatDate = date('dmy', time());

			// Set the filename
			$filename = "LaporanAlbum_" . $formatDate . ".xls";

			// Set headers for the Excel file
			header("Content-Type: application/vnd.ms-excel");
			header("Content-Disposition: attachment; filename=\"$filename\"");
			header("Cache-Control: max-age=0");

			// Output the header row
			echo "No\tAccountName\tTanggal\tUPC\tKeterangan\tJenis\tStatus\n";

			// Output data rows
			$no = 1;
			foreach ($arrayAlbum as $download) {
				// Convert status 0 to 'Non - Aktif' and 1 to 'Aktif'
				$status = ($download['Aktif'] == 0) ? 'Non-Aktif' : 'Aktif';
				$tanggal = date('d-m-Y', strtotime($download['Tanggal']));

				// Check if UPC is numeric and greater than 11
				$upc = $download['UPC'];
				if (is_numeric($upc) && strlen($upc) > 11) {
					// If numeric and > 11, prefix with a quote
					$upc = "'" . $upc; // Add quotes if it's numeric and length is greater than 11
				} else {
					// If it's alphabetic and less than or equal to 11 characters, do not add quotes
					$upc = $upc;
				}

				// Check if Keterangan is numeric and greater than 11
				$keterangan = $download['Keterangan'];
				if (is_numeric($keterangan) && strlen($keterangan) > 11) {
					// If numeric and > 11, prefix with a quote
					$keterangan = "'" . $keterangan; // Add quotes if it's numeric and length is greater than 11
				} else {
					// If it's alphabetic and less than or equal to 11 characters, do not add quotes
					$keterangan = $keterangan;
				}

				echo "$no\t{$download['YoutubeChannelName']}\t$tanggal\t$upc\t$keterangan\t{$download['Jenis']}\t$status\n";
				$no++;
			}

			exit; // Ensure no further output
		}

		else {
			// Load views with data and messages
			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('backoffice/laporan/user');
			$this->load->view('templates_admin/footer');
		}
	}

	public function track(){
		$arrayTrack = [
			[
				"YoutubeChannelId" => "uishbdUAdai-asSfda",
				"YoutubeChannelNama" => "Vidi Aldiano",
				"MoU" => "Congratulations! Your account is approving",
				"Status" => "1",
			],
			[
				"YoutubeChannelId" => "UCQ7dUY53AOGGTYl_Myiurlw",
				"YoutubeChannelNama" => "Wilfredo Alexander Sutanto",
				"MoU" => "Congratulations! Your account is approving",
				"Status" => "1",
			],
			[
				"YoutubeChannelId" => "uishbdUAdai-asSfda",
				"YoutubeChannelNama" => "Vidi Aldiano",
				"MoU" => "Congratulations! Your registration is successful...",
				"Status" => "0",
			],
			[
				"YoutubeChannelId" => "UCQ7dUY53AOGGTYl_Myiurlw",
				"YoutubeChannelNama" => "Wilfredo Alexander Sutanto",
				"MoU" => "Congratulations! Your registration is successful...",
				"Status" => "0",
			],
		];

		$data['arrayTrack'] = $arrayTrack;

		if ($this->input->post()) {
			$YoutubeChannelId = $this->input->post('YoutubeChannelId');  // Menangkap judul yang dikirimkan dari form
			$YoutubeChannelNama = $this->input->post('YoutubeChannelNama'); // Menangkap yt nama yang dikirimkan dari form
			$MoU = $this->input->post('MoU');  // Menangkap judul yang dikirimkan dari form
			$Status = $this->input->post('Status');  // Menangkap status yang dikirimkan dari form
			$tanggalawal = $this->input->post('tanggalawal');  // Menangkap tanggalawal yang dikirimkan dari form
			$tanggalakhir = $this->input->post('tanggalakhir');  // Menangkap tanggalakhir yang dikirimkan dari form

			$this->session->set_flashdata('message', [
		        'icon' => 'success',
		        'title' => 'Berhasil!',
		        'text' => 'Data berhasil di confirm!',
			]);
			redirect('laporan/track');
		}

		else {
			// Load views with data and messages
		    $this->load->view('templates_admin/header');
		    $this->load->view('templates_admin/sidebar');
			$this->load->view('backoffice/laporan/track', $data);	
			$this->load->view('templates_admin/footer');
		}
	}

	public function exporttrack(){
		if ($this->input->post()) {
			// Get data from the database
			$arrayTrack = json_decode($this->input->post('arrayTrack'), true); // Decode JSON to array
			//$data['download'] = $this->Model_home->tampil_data('tb_download_pusatmusik')->result();
			$formatDate = date('dmy', time());

			// Set the filename
			$filename = "LaporanTrack_" . $formatDate . ".xls";

			// Set headers for the Excel file
			header("Content-Type: application/vnd.ms-excel");
			header("Content-Disposition: attachment; filename=\"$filename\"");
			header("Cache-Control: max-age=0");

			// Output the header row
			echo "No\tYoutubeChannelId\tYoutubeChannelName\tMoU\tStatus\n";

			// Output data rows
			$no = 1;
			foreach ($arrayTrack as $download) {
				// Convert status 0 to 'Waiting' and 1 to 'Approve'
				$status = ($download['Status'] == 0) ? 'Waiting' : 'Approve';
				$mou = ($download['MoU'] == "Congratulations! Your registration is successful...") ? '-' : 'https://omegasoft.co.id/images/omegamusic/0000J_2024041902417109_MoU.pdf';

				echo "$no\t{$download['YoutubeChannelId']}\t{$download['YoutubeChannelNama']}\t$mou\t$status\n";
				$no++;
			}

			exit; // Ensure no further output
		}

		else {
			// Load views with data and messages
			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('backoffice/laporan/track');
			$this->load->view('templates_admin/footer');
		}
	}
}