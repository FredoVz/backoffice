<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        // Load session library jika belum diload di autoload.php
        $this->load->library('session');
    }

	public function index()
	{
        //if ($this->session->userdata('logged_in')) {
            //redirect('dashboard');
        //}
        
		// Jika form disubmit, lakukan validasi
        if ($this->input->post()) {
            $username = $this->input->post('username', true);
            $password = $this->input->post('password', true);

            // Validasi hardcoded
            if ($username === 'admin' && $password === 'sukses') {
                $username1 = strtolower($username);
                // Redirect ke halaman dashboard jika berhasil login
                // Set session userdata
                $data = [
                    'username_pusatmusik_backoffice' => $username1,
                    //'logged_in' => true // Menandakan user telah login
                ];

                $this->session->set_userdata($data);
                redirect('importdigital');
            } else {
                // Set flashdata untuk pesan error
                //$this->session->set_flashdata('error', 'Username atau Password salah!');
                $this->session->set_flashdata('error', [
                    'icon' => 'error',
                    'title' => 'Login Gagal!',
                    'text' => 'Akun tidak ditemukan!',
                ]);
                redirect('login');
            }
        } else {
            // Load view login jika belum ada input
			$this->load->view('backoffice/login');
        }
	}

    public function logout()
	{
		//$this->session->sess_destroy();
        $this->session->unset_userdata('username_pusatmusik_backoffice');
		redirect('login');
	}
}
