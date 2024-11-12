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
				"Nama" => "Vidi Aldiano",
				"Email" => "vidialdiano@gmail.com",
				"Status" => "Aktif",
			],
			[
				"Nama" => "Wilfredo Alexander Sutanto",
				"Email" => "fredo@gmail.com",
				"Status" => "Aktif",
			],
		];

		$data['arrayUser'] = $arrayUser;

		if ($this->input->post()) {
			$nama = $this->input->post('nama'); // Menangkap nama yang dikirimkan dari form
			$email = $this->input->post('email');  // Menangkap email yang dikirimkan dari form
			$status = $this->input->post('status');  // Menangkap status yang dikirimkan dari form

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
			$this->load->view('backoffice/akun', $data);
			$this->load->view('templates_admin/footer');
			//Nama, Email, Status, Action
		}
	}

	public function album()
	{
		$arrayUser = [
			[
				"Nama" => "Vidi Aldiano",
				"Email" => "vidialdiano@gmail.com",
				"Status" => "Aktif",
			],
			[
				"Nama" => "Wilfredo Alexander Sutanto",
				"Email" => "fredo@gmail.com",
				"Status" => "Aktif",
			],
		];

		$data['arrayUser'] = $arrayUser;

		if ($this->input->post()) {
			$nama = $this->input->post('nama'); // Menangkap nama yang dikirimkan dari form
			$email = $this->input->post('email');  // Menangkap email yang dikirimkan dari form
			$status = $this->input->post('status');  // Menangkap status yang dikirimkan dari form

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
			$this->load->view('backoffice/album', $data);
			$this->load->view('templates_admin/footer');
			//Nama, Email, Status, Action
		}
	}
}