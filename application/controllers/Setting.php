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

	public function kurs()
	{
		$arrayKurs = [
			[
				"TanggalBerlaku" => "04/12/2024",
				"MataUang" => "Rupiah",
				"KursBerapa" => "15000",
				"Audit" => "1",
				"CreateDate" => "04/12/2024",
			],
			[
				"TanggalBerlaku" => "04/12/2024",
				"MataUang" => "Dollar",
				"KursBerapa" => "15000",
				"Audit" => "2",
				"CreateDate" => "04/12/2024",
			],
		];

		$data['arrayKurs'] = $arrayKurs;

		// Load views with data and messages
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('backoffice/setting/kurs', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambahkurs()
	{
		// Load views with data and messages
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('backoffice/setting/tambahkurs');
		$this->load->view('templates_admin/footer');
	}

	public function submitkurs()
	{
		$tanggalberlaku = $this->input->post('tanggalberlaku');
		$matauang = $this->input->post('matauang');
		$kurs = $this->input->post('kurs');
		$audit = $this->input->post('audit');
		$createdate = $this->input->post('createdate');

		$queryInsertMaster = "insert INTO MasterKurs(TanggalBerlaku, MataUang, Kurs, Audit, CreateDate)
            SELECT '".$tanggalberlaku."', '".$matauang."', $kurs, '".$audit."', '".$createdate."'
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
}