<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aktivasi extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->library('session');

        // Check if user is logged in, otherwise redirect to login page
        if (!$this->session->userdata('logged_in')) {
            redirect('login'); // Redirect to login page if not logged in
        }
    }
	
	public function akun()
	{
		$arrayUser = [
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

		$data['arrayUser'] = $arrayUser;

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
			redirect('aktivasi/akun');
		}

		else {
			// Load views with data and messages
		    $this->load->view('templates_admin/header');
		    $this->load->view('templates_admin/sidebar');
			$this->load->view('backoffice/aktivasi/akun', $data);
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
			redirect('aktivasi/akun');
		}

		else {
			// Load views with data and messages
		    $this->load->view('templates_admin/header');
		    $this->load->view('templates_admin/sidebar');
			$this->load->view('backoffice/aktivasi/akun');
			$this->load->view('templates_admin/footer');
		}
	}

	public function album()
	{
		$arrayUser = [
			[
				"Keterangan" => "Jehovah (Chapter I)",
				"UPC" => "112233",
				"Jenis" => "Single",
				"CreateDate" => "04/11/2024",
				"Approve" => "1",
				"Aktif" => "1",
			],
			[
				"Keterangan" => "Blackpink Cover",
				"UPC" => "112233",
				"Jenis" => "Single",
				"CreateDate" => "31/10/2024",
				"Approve" => "1",
				"Aktif" => "1",
			],
			[
				"Keterangan" => "Bahagia Itu Indah Sapa Bahagia Yang Bernama Indah",
				"UPC" => "112233",
				"Jenis" => "Single",
				"CreateDate" => "30/10/2024",
				"Approve" => "1",
				"Aktif" => "0",
			],
		];

		$data['arrayUser'] = $arrayUser;

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
			redirect('aktivasi/album');
		}

		else {
			// Load views with data and messages
		    $this->load->view('templates_admin/header');
		    $this->load->view('templates_admin/sidebar');
			$this->load->view('backoffice/aktivasi/album', $data);
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
			redirect('aktivasi/album');
		}

		else {
			// Load views with data and messages
		    $this->load->view('templates_admin/header');
		    $this->load->view('templates_admin/sidebar');
			$this->load->view('backoffice/aktivasi/album');
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
			echo "No\tYoutubeChannelId\tYoutubeChannelNama\tMoU\tStatus\n";

			// Output data rows
			$no = 1;
			foreach ($arrayUser as $download) {
				echo "$no\t{$download['YoutubeChannelId']}\t{$download['YoutubeChannelNama']}\t{$download['MoU']}\t{$download['Status']}\n";
				$no++;
			}

			exit; // Ensure no further output
		}

		else {
			// Load views with data and messages
			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('backoffice/aktivasi/akun');
			$this->load->view('templates_admin/footer');
		}
	}
}