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

        $arrayUser = [
            [
                "Username" => "admin",
                "Password" => "sukses",
            ],
        ];
        
		// Jika form disubmit, lakukan validasi
        if ($this->input->post()) {
            $username = $this->input->post('username', true);
            $password = $this->input->post('password', true);

            $foundUser = null;
			foreach ($arrayUser as $user) {
				if (strtolower($user['Username']) === strtolower($username) && $user['Password'] === $password) {
					$foundUser = $user;
					break;
				}
			}

            //$username1 = $user['Username'];
            $kataSandi = $user['Password'];

            //$username === 'admin' && $password === 'sukses'

            // Validasi hardcoded
            if ($foundUser) {
                if($password == $kataSandi) {
                    $username1 = strtolower($username);
                    // Redirect ke halaman dashboard jika berhasil login
                    // Set session userdata
                    $data = [
                        'username_pusatmusik_backoffice' => $username1,
                        //'logged_in' => true // Menandakan user telah login
                    ];

                    $this->session->set_userdata($data);
                    redirect('importdigital');
                }

                else {
                    $this->session->set_flashdata('error', [
						'icon' => 'error',
						'title' => 'Login Gagal!',
						'text' => 'Password salah!',
					]);
					redirect('login');
                }
                
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
