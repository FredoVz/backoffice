<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Load PhpSpreadsheet
require_once APPPATH . 'libraries/simplexlsx-master/src/SimpleXLSX.php';

use Shuchkin\SimpleXLSX;
//use Shuchkin\SimpleXLSX\SimpleXLSX;

class Importdigital extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('upload'); // Load upload library
        $this->load->model('Model_home');

        // Check if user is logged in, otherwise redirect to login page
        if (!$this->session->userdata('username_pusatmusik_backoffice')) {
            redirect('login'); // Redirect to login page if not logged in
        }
    }

    public function index() {
		$title = "PusatMusik - Backoffice - Import Digital";

        $channels = [
            ['day' => '2024-10-26 00:00:00.000', 'channelId' => 'UCQ7dUY53AOGGTYl_Myiurlw', 'channelName' => 'Fredo', 'videoId' => '7tTPWdu0FKM', 'videoTitle' => 'Doa Pagi Hari - Seri Beri Ruang Buat Tuhan'],
            ['day' => '2024-10-23 00:00:00.000', 'channelId' => 'UCrLp5XWCXQHJnmK8P36KTsQ', 'channelName' => 'Impact Music Indonesia', 'videoId' => '4yjsRArySSU',  'videoTitle' => 'Doa Pagi Hari - Seri Beri Ruang Buat Tuhan'],
            ['day' => '2024-10-22 00:00:00.000', 'channelId' => 'UCIimjC2xJp3Zi6CAr5-TMIg', 'channelName' => 'JCC', 'videoId' => 'rzzv-sMB-U8',  'videoTitle' => 'Doa Pagi Hari - Seri Beri Ruang Buat Tuhan'],
        ];

        //$data = ['channels' => $channels, 'error' => '', 'success' => ''];
        $data = [
			'title' => $title,
			'channels' => $channels,
		];

        //echo json_encode($data);

        //if ($this->input->post('submit')) {  // Check if form was submitted
            $config['upload_path'] = 'application/uploads/';
            $config['allowed_types'] = 'xlsx|csv';
            $config['max_size'] = 10000;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('excel')) {
                $data['error'] = $this->upload->display_errors();
                //echo "Masuk1";
            } else {
                //echo "Masuk2";
                $file = $this->upload->data();
                $inputFileName = $file['full_path'];
                $fileExtension = strtolower(pathinfo($inputFileName, PATHINFO_EXTENSION));

                $uploadedData = $this->_process_file($inputFileName, $fileExtension);
                if (!empty($uploadedData)) {
                    // Example: Insert data into database (ensure Model_home is loaded)
                    $this->Model_home->insert_batch($uploadedData);
                    $data['success'] = 'Data has been successfully uploaded.';
                } else {
                    $data['error'] = 'No valid data found to insert.';
                }
            }
        //}

        // Load views with data and messages
        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('backoffice/importdigital', $data);
        $this->load->view('templates_admin/footer');
    }

    private function _process_file($inputFileName, $fileExtension) {
        $data = [];
        if ($fileExtension === 'csv') {
            if (($handle = fopen($inputFileName, 'r')) !== FALSE) {
                $headerSkipped = false;
                while (($row = fgetcsv($handle, 1000, ',')) !== FALSE) {
                    if (!$headerSkipped) {
                        $headerSkipped = true;
                        continue;
                    }
                    if (!empty($row[0]) && !empty($row[1])) {
                        $data[] = [
                            'adjustmenttype' => $row[0],
                            'day' => $row[1],
                            'country' => $row[2],
                        ];
                    }
                }
                fclose($handle);
            }
        } elseif ($fileExtension === 'xlsx') {
            if ($xlsx = SimpleXLSX::parse($inputFileName)) {
                $headerSkipped = false;
                foreach ($xlsx->rows() as $row) {
                    if (!$headerSkipped) {
                        $headerSkipped = true;
                        continue;
                    }
                    if (!empty($row[0]) && !empty($row[1])) {
                        $data[] = ['id' => $row[0], 'nama' => $row[1]];
                    }
                }
            }
        }
        return $data;
    }
}
