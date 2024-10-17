<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Load PhpSpreadsheet
require_once APPPATH . 'libraries/simplexlsx-master/src/SimpleXLSX.php';

use Shuchkin\SimpleXLSX;
//use Shuchkin\SimpleXLSX\SimpleXLSX;

class Importdigital extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('upload'); // Load upload library
        $this->load->model('Model_home');

        // Check if user is logged in, otherwise redirect to login page
        if (!$this->session->userdata('logged_in')) {
            redirect('login'); // Redirect to login page if not logged in
        }
    }

    public function index() {
        $channels = [
            ['id' => 'UCQ7dUY53AOGGTYl_Myiurlw', 'name' => 'Fredo'],
            ['id' => 'UCrLp5XWCXQHJnmK8P36KTsQ', 'name' => 'Impact Music Indonesia'],
            ['id' => 'UCIimjC2xJp3Zi6CAr5-TMIg', 'name' => 'JCC'],
        ];

        //$data = ['channels' => $channels, 'error' => '', 'success' => ''];
        $data = ['channels' => $channels];

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
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
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
