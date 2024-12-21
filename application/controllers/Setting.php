<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->library('session');

		// Check if user is logged in, otherwise redirect to login page
		if (!$this->session->userdata('username_pusatmusik_backoffice')) {
			redirect('login'); // Redirect to login page if not logged in
		}
    }

	public function arrayKurs(){
		$arrayKurs = [
			[
				"TanggalBerlaku" => "2024-12-04 00:00:00.000",
				"MataUang" => "Rupiah",
				"KursBerapa" => "15000",
				"Audit" => "admin",
				"CreateDate" => "2024-12-04 00:00:00.000",
			],
			[
				"TanggalBerlaku" => "2024-12-04 00:00:00.000",
				"MataUang" => "Dollar",
				"KursBerapa" => "15000",
				"Audit" => "admin",
				"CreateDate" => "2024-12-04 00:00:00.000",
			],
		];

		return $arrayKurs;
	}

	public function kurs()
	{
		$title = "PusatMusik - Backoffice - Setting Kurs";

		$arrayKurs = $this->arrayKurs();

		$data = [
			'title' => $title,
			'arrayKurs' => $arrayKurs,
		];

		// Load views with data and messages
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('backoffice/setting/kurs', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambahkurs()
	{
		$title = "PusatMusik - Backoffice - Setting Tambah Kurs";

		$arrayKurs = $this->arrayKurs();

		$data = [
			'title' => $title,
			'arrayKurs' => $arrayKurs,
		];

		// Load views with data and messages
		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('backoffice/setting/tambahkurs', $data);
		$this->load->view('templates_admin/footer');
	}

	public function submitkurs()
	{
		$tanggalberlaku = $this->input->post('tanggalberlaku');
		$matauangSelect = $this->input->post('matauangSelect');
		$matauangInput = $this->input->post('matauangInput');
		$kurs = $this->input->post('kursberapa');
		//$audit = $this->input->post('audit');
		$audit = $this->session->userdata('username_pusatmusik_backoffice');
		$createdate = $this->input->post('createdate');

		if(!empty($matauangSelect))
		{
			$queryInsertMaster = "insert INTO MasterKurs(TanggalBerlaku, MataUang, Kurs, Audit, CreateDate)
            SELECT '".$tanggalberlaku."', '".$matauangSelect."', $kurs, '".$audit."', '".$createdate."'
            ";

			//$this->opc->query($queryInsertMaster);
			echo $queryInsertMaster;
			//die;

			$this->session->set_flashdata('message', [
				'icon' => 'success',
				'title' => 'Berhasil!',
				'text' => 'Data berhasil di confirm!',
			]);

			redirect('setting/kurs');
		}

		else if(!empty($matauangInput))
		{
			$queryInsertMaster = "insert INTO MasterKurs(TanggalBerlaku, MataUang, Kurs, Audit, CreateDate)
            SELECT '".$tanggalberlaku."', '".$matauangInput."', $kurs, '".$audit."', '".$createdate."'
            ";

			//$this->opc->query($queryInsertMaster);
			echo $queryInsertMaster;
			//die;

			$this->session->set_flashdata('message', [
				'icon' => 'success',
				'title' => 'Berhasil!',
				'text' => 'Data berhasil di confirm!',
			]);
			redirect('setting/kurs');
		}

		else
		{
			$queryInsertMaster = "insert INTO MasterKurs(TanggalBerlaku, MataUang, Kurs, Audit, CreateDate)
            SELECT '".$tanggalberlaku."', NULL, $kurs, '".$audit."', '".$createdate."'
            ";

			//$this->opc->query($queryInsertMaster);
			echo $queryInsertMaster;
			//die;

			$this->session->set_flashdata('message', [
				'icon' => 'error',
				'title' => 'Error!',
				'text' => 'Data gagal masuk dan pastikan semua data terisi!',
			]);
			redirect('setting/tambahkurs');
		}
	}
}
