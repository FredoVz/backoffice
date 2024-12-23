<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tambah extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->library('session');
		$this->load->library('upload');

		// Check if user is logged in, otherwise redirect to login page
		if (!$this->session->userdata('username_pusatmusik_backoffice')) {
			redirect('login'); // Redirect to login page if not logged in
		}
    }

    public function arrayUser()
    {
    	$branch = "0000J/01/";

    	$arrayUser = [
			[
				"KodeUser" => $branch . "000040",
				"Tanggal" => "2024-08-28 17:31:35.807",
				"YoutubeChannelId" => "uishbdUAdai-asSfda",
				"YoutubeChannelNama" => "Vidi Aldiano",
				"MonetizationStatus" => "Already",
				"RegisteredAs" => "Company",
				"MoU" => "Congratulations! Your account is approving",
				"Status" => "1",
			],
			[
				"KodeUser" => $branch . "00003N",
				"Tanggal" => "2024-08-28 17:31:35.807",
				"YoutubeChannelId" => "UCQ7dUY53AOGGTYl_Myiurlw",
				"YoutubeChannelNama" => "Wilfredo Alexander Sutanto",
				"MonetizationStatus" => "NotYet",
				"RegisteredAs" => "Private/Individual",
				"MoU" => "Congratulations! Your account is approving",
				"Status" => "1",
			],
			[
				"KodeUser" => $branch . "00003Z",
				"Tanggal" => "2024-08-28 17:31:35.807",
				"YoutubeChannelId" => "uishbdUAdai-asSfda",
				"YoutubeChannelNama" => "Vidi Aldiano",
				"MonetizationStatus" => "Already",
				"RegisteredAs" => "CompanyNon",
				"MoU" => "Congratulations! Your registration is successful...",
				"Status" => "0",
			],
			[
				"KodeUser" => $branch . "000057",
				"Tanggal" => "2024-08-28 17:31:35.807",
				"YoutubeChannelId" => "UCQ7dUY53AOGGTYl_Myiurlw",
				"YoutubeChannelNama" => "Wilfredo Alexander Sutanto",
				"MonetizationStatus" => "NotYet",
				"RegisteredAs" => "Private/Individual",
				"MoU" => "Congratulations! Your registration is successful...",
				"Status" => "0",
			],
		];

		return $arrayUser;
    }

	public function arrayAlbum(){
		$branch = "0000J/";

        $arrayAlbum = [
			[
				"KodeAlbum" => $branch . "00000001",
				"AccountName" => "Wilfredo Alexander Sutanto",
				"Tanggal" => "2024-12-09 17:31:35.807",
                "UPC" => "3617666782835",
				"Title" => "Kejadianku Ajaib",
				"Jenis" => "Single",
				"Aktif" => "1",
				"FileUrl" => "https://pusatmusik.com/application/uploads/image/0000J_20241219031209353.png",
			],
			[
				"KodeAlbum" => $branch . "00000002",
				"AccountName" => "Wilfredo Alexander Sutanto",
				"Tanggal" => "2024-12-04 17:31:35.807",
                "UPC" => "3617666174104",
				"Title" => "Terima Kasih",
				"Jenis" => "Single",
				"Aktif" => "1",
				"FileUrl" => "https://pusatmusik.com/application/uploads/image/0000J_20241219031209353.png",
			],
			[
				"KodeAlbum" => $branch . "00000003",
				"AccountName" => "Wilfredo Alexander Sutanto",
				"Tanggal" => "2024-08-28 17:31:35.807",
                "UPC" => "3617666782835",
				"Title" => "Jehovah (Chapter I)",
				"Jenis" => "Single",
				"Aktif" => "1",
				"FileUrl" => "https://pusatmusik.com/application/uploads/image/0000J_20241219031209353.png",
			],
			[
				"KodeAlbum" => $branch . "00000004",
				"AccountName" => "Wilfredo Alexander Sutanto",
				"Tanggal" => "2024-08-28 17:31:35.807",
                "UPC" => "3617666174104",
				"Title" => "Blackpink Cover",
				"Jenis" => "Single",
				"Aktif" => "1",
				"FileUrl" => "https://pusatmusik.com/application/uploads/image/0000J_20241219031209353.png",
			],
			[
				"KodeAlbum" => $branch . "00000005",
				"AccountName" => "Vidi Aldiano",
				"Tanggal" => "2024-08-28 17:31:35.807",
                "UPC" => "112233",
				"Title" => "Bahagia Itu Indah Sapa Bahagia Yang Bernama Indah",
				"Jenis" => "Single",
				"Aktif" => "0",
				"FileUrl" => "https://pusatmusik.com/application/uploads/image/0000J_20241219031209353.png",
			],
			[
				"KodeAlbum" => $branch . "00000006",
				"AccountName" => "Vidi Aldiano",
				"Tanggal" => "2024-08-28 17:31:35.807",
                "UPC" => "3617054696560",
				"Title" => "3617054696560",
				"Jenis" => "Single",
				"Aktif" => "0",
				"FileUrl" => "https://pusatmusik.com/application/uploads/image/0000J_20241219031209353.png",
			],
		];

		return $arrayAlbum;
	}

	public function arrayTrack()
	{
		$branch = "0000J/";

		$arrayTrack = [
			[
				"KodeTrack" => $branch . "00000001",
				"AccountName" => "Vidi Aldiano",
				"Tanggal" => "2024-08-28 17:31:35.807",
				"Title" => "Jehovah",
				"Song" => "https://tusd.omegasoft.co.id/files/2f3d49d29a748abe4d36706a2dc721c7",
				"ISRC" => "DG-A0L-23-27601",
				"TanggalProduksi" => "2024-08-28 17:31:35.807",
				"TanggalRilis" => "2024-08-28 17:31:35.807",
				"Author" => "Alberd Tanoni",
				"Composer" => "Alberd Tanoni",
				"PLine" => "JCC Worship",
				"CLine" => "JCC Worship",
				"IsCover" => 0,
				"Genre" => "KRISTEN",
				"ArtistName" => "JCC Kids",
				"CategoryArtist" => "Primary Artist",
				"SpotifyId" => "",
				"iTunesId" => "",
				"IsExplicit" => 0,
				"Language" => "Indonesia",
				"PreviewStart" => "0",
				"Lyrics" => "Aku berharga di mataMu Tuhan Aku mulia di dalamMu Tuhan Ku melompat Ku bersukaKu melompat bersamaMu Tuhan Lompat ke kanan kiri Lompat <petik> tuk lebih tinggi o bersinar sepertidu du du du du du du bintang-bintang di langit o terangi dunia du du du du du du du jadi generasi bintangKu pasti bisa</petik>",
				"CoverDocument" => "https://pusatmusik.com/application/uploads/docs/",
			],
			[
				"KodeTrack" => $branch . "00000002",
				"AccountName" => "Wilfredo Alexander Sutanto",
				"Tanggal" => "2024-08-28 17:31:35.807",
				"Title" => "Jehovah 2",
				"Song" => "https://tusd.omegasoft.co.id/files/2f3d49d29a748abe4d36706a2dc721c7",
				"ISRC" => "ID-A66-23-01731",
				"TanggalProduksi" => "2024-08-28 17:31:35.807",
				"TanggalRilis" => "2024-08-28 17:31:35.807",
				"Author" => "Alberd Tanoni",
				"Composer" => "Alberd Tanoni",
				"PLine" => "JCC Worship",
				"CLine" => "JCC Worship",
				"IsCover" => 0,
				"Genre" => "KRISTEN",
				"ArtistName" => "JCC Kids",
				"CategoryArtist" => "Primary Artist",
				"SpotifyId" => "",
				"iTunesId" => "",
				"IsExplicit" => 0,
				"Language" => "Indonesia",
				"PreviewStart" => "0",
				"Lyrics" => "Aku berharga di mataMu Tuhan Aku mulia di dalamMu Tuhan Ku melompat Ku bersukaKu melompat bersamaMu Tuhan Lompat ke kanan kiri Lompat <petik> tuk lebih tinggi o bersinar sepertidu du du du du du du bintang-bintang di langit o terangi dunia du du du du du du du jadi generasi bintangKu pasti bisa</petik>",
				"CoverDocument" => "https://pusatmusik.com/application/uploads/docs/",
			],
			[
				"KodeTrack" => $branch . "00000003",
				"AccountName" => "Vidi Aldiano",
				"Tanggal" => "2024-08-28 17:31:35.807",
				"Title" => "RancanganMu Takkan Gagal",
				"Song" => "https://tusd.omegasoft.co.id/files/2f3d49d29a748abe4d36706a2dc721c7",
				"ISRC" => "ID-A66-22-01490",
				"TanggalProduksi" => "2024-08-28 17:31:35.807",
				"TanggalRilis" => "2024-08-28 17:31:35.807",
				"Author" => "Alberd Tanoni, Agata Verencia Lie, Ryan Nitisastro",
				"Composer" => "Alberd Tanoni, Agata Verencia Lie, Ryan Nitisastro",
				"PLine" => "JCC Worship",
				"CLine" => "JCC Worship",
				"IsCover" => 0,
				"Genre" => "KRISTEN",
				"ArtistName" => "JCC Kids",
				"CategoryArtist" => "Primary Artist",
				"SpotifyId" => "",
				"iTunesId" => "",
				"IsExplicit" => 0,
				"Language" => "Indonesia",
				"PreviewStart" => "0",
				"Lyrics" => "Aku berharga di mataMu Tuhan Aku mulia di dalamMu Tuhan Ku melompat Ku bersukaKu melompat bersamaMu Tuhan Lompat ke kanan kiri Lompat <petik> tuk lebih tinggi o bersinar sepertidu du du du du du du bintang-bintang di langit o terangi dunia du du du du du du du jadi generasi bintangKu pasti bisa</petik>",
				"CoverDocument" => "https://pusatmusik.com/application/uploads/docs/",
			],
			[
				"KodeTrack" => $branch . "00000004",
				"AccountName" => "Wilfredo Alexander Sutanto",
				"Tanggal" => "2024-08-28 17:31:35.807",
				"Title" => "Hari Terbaik",
				"Song" => "https://tusd.omegasoft.co.id/files/2f3d49d29a748abe4d36706a2dc721c7",
				"ISRC" => "ID-A66-22-01599",
				"TanggalProduksi" => "2024-08-28 17:31:35.807",
				"TanggalRilis" => "2024-08-28 17:31:35.807",
				"Author" => "Iswara Giovani, Andry Chandra, Michael Santoso, Samantha Pangkey",
				"Composer" => "Iswara Giovani, Andry Chandra, Michael Santoso, Samantha Pangkey",
				"PLine" => "JCC Worship",
				"CLine" => "JCC Worship",
				"IsCover" => 0,
				"Genre" => "KRISTEN",
				"ArtistName" => "JCC Kids",
				"CategoryArtist" => "Primary Artist",
				"SpotifyId" => "",
				"iTunesId" => "",
				"IsExplicit" => 0,
				"Language" => "Indonesia",
				"PreviewStart" => "0",
				"Lyrics" => "Aku berharga di mataMu Tuhan Aku mulia di dalamMu Tuhan Ku melompat Ku bersukaKu melompat bersamaMu Tuhan Lompat ke kanan kiri Lompat <petik> tuk lebih tinggi o bersinar sepertidu du du du du du du bintang-bintang di langit o terangi dunia du du du du du du du jadi generasi bintangKu pasti bisa</petik>",
				"CoverDocument" => "https://pusatmusik.com/application/uploads/docs/",
			],
			[
				"KodeTrack" => $branch . "00000005",
				"AccountName" => "Wilfredo Alexander Sutanto",
				"Tanggal" => "2024-08-28 17:31:35.807",
				"Title" => "Berjalan BersamaMu",
				"Song" => "https://tusd.omegasoft.co.id/files/2f3d49d29a748abe4d36706a2dc721c7",
				"ISRC" => "ID-A66-22-01385",
				"TanggalProduksi" => "2024-08-28 17:31:35.807",
				"TanggalRilis" => "2024-08-28 17:31:35.807",
				"Author" => "",
				"Composer" => "",
				"PLine" => "JCC Worship",
				"CLine" => "JCC Worship",
				"IsCover" => 0,
				"Genre" => "KRISTEN",
				"ArtistName" => "JCC Kids",
				"CategoryArtist" => "Primary Artist",
				"SpotifyId" => "",
				"iTunesId" => "",
				"IsExplicit" => 0,
				"Language" => "Indonesia",
				"PreviewStart" => "0",
				"Lyrics" => "Aku berharga di mataMu Tuhan Aku mulia di dalamMu Tuhan Ku melompat Ku bersukaKu melompat bersamaMu Tuhan Lompat ke kanan kiri Lompat <petik> tuk lebih tinggi o bersinar sepertidu du du du du du du bintang-bintang di langit o terangi dunia du du du du du du du jadi generasi bintangKu pasti bisa</petik>",
				"CoverDocument" => "https://pusatmusik.com/application/uploads/docs/",
			],
			[
				"KodeTrack" => $branch . "00000006",
				"AccountName" => "Wilfredo Alexander Sutanto",
				"Tanggal" => "2024-08-28 17:31:35.807",
				"Title" => "Tuhan Yesus Melawat UmatNya",
				"Song" => "https://tusd.omegasoft.co.id/files/2f3d49d29a748abe4d36706a2dc721c7",
				"ISRC" => "ID-A66-23-01654",
				"TanggalProduksi" => "2024-08-28 17:31:35.807",
				"TanggalRilis" => "2024-08-28 17:31:35.807",
				"Author" => "Alberd Tanoni",
				"Composer" => "Alberd Tanoni",
				"PLine" => "JCC Worship",
				"CLine" => "JCC Worship",
				"IsCover" => 0,
				"Genre" => "KRISTEN",
				"ArtistName" => "JCC Kids",
				"CategoryArtist" => "Primary Artist",
				"SpotifyId" => "",
				"iTunesId" => "",
				"IsExplicit" => 0,
				"Language" => "Indonesia",
				"PreviewStart" => "0",
				"Lyrics" => "Aku berharga di mataMu Tuhan Aku mulia di dalamMu Tuhan Ku melompat Ku bersukaKu melompat bersamaMu Tuhan Lompat ke kanan kiri Lompat <petik> tuk lebih tinggi o bersinar sepertidu du du du du du du bintang-bintang di langit o terangi dunia du du du du du du du jadi generasi bintangKu pasti bisa</petik>",
				"CoverDocument" => "https://pusatmusik.com/application/uploads/docs/",
			],
		];

		return $arrayTrack;
	}
	
	public function album()
	{
        $title = "PusatMusik - Backoffice - Tambah Album";
		$branch = "0000J";

        $arrayUser = $this->arrayUser();

		$arrayAlbum = $this->arrayAlbum();

        $data = [
            'arrayAlbum' => $arrayAlbum,
            'arrayUser' => $arrayUser,
			'title' => $title,
		];

		if ($this->input->post()) {
			/*
			$accountName = $this->input->post('Accountname'); // Menangkap account name yang dikirimkan dari form
			$tanggal = $this->input->post('Tanggal'); // Menangkap tanggal yang dikirimkan dari form
			$upc = $this->input->post('UPC');  // Menangkap upc yang dikirimkan dari form
			$title1 = $this->input->post('Title');  // Menangkap title yang dikirimkan dari form
			$jenis = $this->input->post('Jenis');  // Menangkap jenis yang dikirimkan dari form
			$aktif = $this->input->post('Aktif');  // Menangkap aktif yang dikirimkan dari form
			*/
			$tanggalawal = $this->input->post('tanggalawal');  // Menangkap tanggalawal yang dikirimkan dari form
			$tanggalakhir = $this->input->post('tanggalakhir');  // Menangkap tanggalakhir yang dikirimkan dari form
			$ytchannelnameSelect = $this->input->post('ytchannelnameSelect'); // Menangkap ytchannelnameSelect yang dikirimkan dari form

			$this->session->set_flashdata('message', [
		        'icon' => 'success',
		        'title' => 'Berhasil!',
		        'text' => 'Data berhasil di confirm!',
			]);
			redirect('tambah/album');
		}

		else {
			// Load views with data and messages
			$this->load->view('templates_admin/header', $data);
			$this->load->view('templates_admin/sidebar', $data);
			$this->load->view('backoffice/tambah/album', $data);
			$this->load->view('templates_admin/footer');
		}
	}

	public function getalbum()
	{
		$title = "PusatMusik - Backoffice - Get Album";
		$kodeAlbum = $this->input->post('KodeAlbum');

		/*
		// Check if user is logged in, otherwise redirect to login page
		if (!empty($kodeAlbum)) {
			redirect('tambah/album'); // Redirect to login page if not logged in
		}
		 */

		$arrayAlbum = $this->arrayAlbum();

		$foundAlbum = null;
		foreach ($arrayAlbum as $album) {
			if (strtolower($album['KodeAlbum']) === strtolower($kodeAlbum)) {
				$foundAlbum = $album;
				break;
			}
		}

		if($foundAlbum == null) {
			redirect('tambah/album'); // Redirect to login page if not logged in
		}

		$data = [
			'title' => $title,
			'foundAlbum' => $foundAlbum,
		];

		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('backoffice/tambah/getalbum', $data);
		$this->load->view('templates_admin/footer');
	}

	public function updatealbum()
	{
		if($this->input->post())
		{
			//$accountName = $this->input->post('Accountname'); // Menangkap account name yang dikirimkan dari form
			//$tanggal = $this->input->post('Tanggal'); // Menangkap tanggal yang dikirimkan dari form
			$upc = $this->input->post('UPC');  // Menangkap upc yang dikirimkan dari form
			$title = $this->input->post('Title');  // Menangkap title yang dikirimkan dari form
			$jenis = $this->input->post('Jenis');  // Menangkap jenis yang dikirimkan dari form
			//$aktif = $this->input->post('Aktif');  // Menangkap aktif yang dikirimkan dari form
			//$tanggalawal = $this->input->post('tanggalawal');  // Menangkap tanggalawal yang dikirimkan dari form
			//$tanggalakhir = $this->input->post('tanggalakhir');  // Menangkap tanggalakhir yang dikirimkan dari form
			//$ytchannelnameSelect = $this->input->post('ytchannelnameSelect'); // Menangkap ytchannelnameSelect yang dikirimkan dari form
			$fileurl = $this->input->post('fileurl');
			$kodeAlbum = $this->input->post('KodeAlbum');
			echo '<pre>1. UPC        : '.$upc.'</pre>';
			echo '<pre>2. Title      : '.$title.'</pre>';
			echo '<pre>3. Jenis      : '.$jenis.'</pre>';
			echo '<pre>4. File Url   : '.$fileurl.'</pre>';
			echo '<pre>5. Kode Album : '.$kodeAlbum.'</pre>';

			$queryUpdateMasterAlbum = "update INTO MasterAlbum(KodeAlbum, UPC, Title, Jenis, FileUrl)
            SELECT '".$kodeAlbum."', '".$upc."', $title, '".$jenis."', '".$fileurl."'
            ";

			echo $queryUpdateMasterAlbum;
			//die;

			$this->session->set_flashdata('message', [
		        'icon' => 'success',
		        'title' => 'Berhasil!',
		        'text' => 'Data berhasil di confirm!',
			]);
			redirect('tambah/album');
		}

		else {
			redirect('tambah/album');
		}
	}

	public function newalbum()
	{
		$title = "PusatMusik - Backoffice - New Album";
		$arrayUser = $this->arrayUser();

		$data = [
			'title' => $title,
			'arrayUser' => $arrayUser,
		];

		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('backoffice/tambah/newalbum', $data);
		$this->load->view('templates_admin/footer');
	}

	public function insertalbum()
	{
		if($this->input->post())
		{
			$jenis = $this->input->post('customRadio');
			$userSelect = $this->input->post('userSelect');
			$title = $this->input->post('Title');
			$upc = $this->input->post('UPC');
			$file_name = $this->input->post('file-name', true);
			echo '<pre>'.$file_name.'</pre>';
			//die;

			$config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = 10000;
			$config['upload_path'] = 'assets/uploads/';

			$this->upload->initialize($config);

            if (!$this->upload->do_upload('jpeg')) {
                $data['message'] = $this->upload->display_errors();
                //echo "Masuk1";

				$textGagal = $this->upload->display_errors();

				// Hapus tag HTML seperti <p></p> dari $textGagal
				$textGagal = strip_tags($textGagal);

				// Set flashdata for error message
				$this->session->set_flashdata('message', [
					'icon' => 'error',
					'title' => 'Failed!',
					'text' => $textGagal,
				]);

				redirect('tambah/newalbum');
            } else {
                //echo "Masuk2";
                $file = $this->upload->data();
                $inputFileName = $file['full_path'];
                $fileExtension = strtolower(pathinfo($inputFileName, PATHINFO_EXTENSION));

                // Format nama file
			    $formattedDate = date('dmYhisz', time()); // Format: 14112024112020z (dmYhisz)

			    // Pisahkan nama file dan ekstensi menggunakan pathinfo
			    $file_info = pathinfo($file_name);
			    $extension = isset($file_info['extension']) ? $file_info['extension'] : '';

			    // Format nama file baru
			    $formattedRenameGambarUpload = "album" . $formattedDate . "." . $extension;

			    echo '<pre>' . $formattedRenameGambarUpload . '</pre>';

			    // Ubah nama file di folder upload
			    $newFilePath = 'assets/uploads/' . $formattedRenameGambarUpload;

			    // Rename file setelah di-upload
			    if (rename($inputFileName, $newFilePath)) {
			        // Berhasil mengganti nama file
			        $successRenamingFile = "Insert data successfully";

					$queryInsertMasterAlbum = "insert INTO MasterAlbum(Jenis, KodeUser, Title, UPC, FileInput)
					SELECT '".$jenis."', '".$userSelect."', '".$title."', '".$upc."', '".$formattedRenameGambarUpload."'
					";

					echo $queryInsertMasterAlbum;
					//die;

					$this->session->set_flashdata('message', [
						'icon' => 'success',
						'title' => 'Success!',
						'text' => $successRenamingFile,
					]);

					redirect('tambah/album');
			    } else {
			        // Jika gagal mengganti nama
			        $errorRenamingFile = "Error renaming the file.";

			        $this->session->set_flashdata('message', [
						'icon' => 'error',
						'title' => 'Error!',
						'text' => $errorRenamingFile,
					]);
					redirect('tambah/newalbum');
			    }
			}
		}

		else
		{
			redirect('tambah/newalbum');
		}
	}

	public function track()
	{
		$title = "PusatMusik - Backoffice - Tambah Track";


		$arrayUser = $this->arrayUser();

		$arrayTrack = $this->arrayTrack();

		$data = [
			'title' => $title,
			'arrayUser' => $arrayUser,
		 	'arrayTrack' => $arrayTrack,
		];

		if ($this->input->post()) {
			/*
			$accountName = $this->input->post('AccountName'); // Menangkap account nama yang dikirimkan dari form
			$tanggal = $this->input->post('Tanggal');  // Menangkap tanggal yang dikirimkan dari form
			$title1 = $this->input->post('Title');  // Menangkap title yang dikirimkan dari form
			$song = $this->input->post('Song');  // Menangkap song yang dikirimkan dari form
			$isrc = $this->input->post('ISRC');  // Menangkap isrc yang dikirimkan dari form
			$tanggalProduksi = $this->input->post('TanggalProduksi');  // Menangkap tanggal produksi yang dikirimkan dari form
			$tanggalRilis = $this->input->post('TanggalRilis');  // Menangkap tanggal rilis yang dikirimkan dari form
			$author = $this->input->post('Author');  // Menangkap author yang dikirimkan dari form
			$composer = $this->input->post('Composer');  // Menangkap composer yang dikirimkan dari form
			$pLine = $this->input->post('PLine');  // Menangkap pline yang dikirimkan dari form
			$cLine = $this->input->post('CLine');  // Menangkap cline yang dikirimkan dari form
			$isCover = $this->input->post('IsCover');  // Menangkap is cover yang dikirimkan dari form
			$genre = $this->input->post('Genre');  // Menangkap genre yang dikirimkan dari form
			$artistName = $this->input->post('ArtistName');  // Menangkap artist name yang dikirimkan dari form
			$categoryArtist = $this->input->post('CategoryArtist');  // Menangkap category artist yang dikirimkan dari form
			$spotifyId = $this->input->post('SpotifyId');  // Menangkap spotify id yang dikirimkan dari form
			$iTunesId = $this->input->post('iTunesId');  // Menangkap spotify id yang dikirimkan dari form
			$isExplicit = $this->input->post('IsExplicit');  // Menangkap is explicit yang dikirimkan dari form
			$language = $this->input->post('Language');  // Menangkap language yang dikirimkan dari form
			$previewStart = $this->input->post('PreviewStart');  // Menangkap preview start yang dikirimkan dari form
			$lyrics = $this->input->post('Lyrics');  // Menangkap lyrics yang dikirimkan dari form
			$coverDocument = $this->input->post('CoverDocument');  // Menangkap cover document yang dikirimkan dari form
			*/
			$tanggalawal = $this->input->post('tanggalawal');  // Menangkap tanggalawal yang dikirimkan dari form
			$tanggalakhir = $this->input->post('tanggalakhir');  // Menangkap tanggalakhir yang dikirimkan dari form
			$ytchannelnameSelect = $this->input->post('ytchannelnameSelect'); // Menangkap ytchannelnameSelect yang dikirimkan dari form

			$this->session->set_flashdata('message', [
		        'icon' => 'success',
		        'title' => 'Berhasil!',
		        'text' => 'Data berhasil di confirm!',
			]);
			redirect('tambah/track');
		}

		else {
			// Load views with data and messages
		    $this->load->view('templates_admin/header', $data);
		    $this->load->view('templates_admin/sidebar', $data);
			$this->load->view('backoffice/tambah/track', $data);	
			$this->load->view('templates_admin/footer');
		}
	}

	public function gettrack()
	{
		$title = "PusatMusik - Backoffice - Get Track";
		$kodeTrack = $this->input->post('KodeTrack');

		$arrayTrack = $this->arrayTrack();

		$foundTrack = null;
		foreach ($arrayTrack as $track) {
			if (strtolower($track['KodeTrack']) === strtolower($kodeTrack)) {
				$foundTrack = $track;
				break;
			}
		}

		if ($foundTrack == null){
			redirect('tambah/track');
		}

		$data = [
			'title' => $title,
			'foundTrack' => $foundTrack,
		];

		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('backoffice/tambah/gettrack', $data);
		$this->load->view('templates_admin/footer');
	}

	public function updatetrack()
	{
		if ($this->input->post()) {
			//$accountName = $this->input->post('AccountName'); // Menangkap account nama yang dikirimkan dari form
			//$tanggal = $this->input->post('Tanggal');  // Menangkap tanggal yang dikirimkan dari form
			$title = $this->input->post('Title');  // Menangkap title yang dikirimkan dari form
			$song = $this->input->post('Song');  // Menangkap song yang dikirimkan dari form
			$isrc = $this->input->post('ISRC');  // Menangkap isrc yang dikirimkan dari form
			$tanggalProduksi = $this->input->post('TanggalProduksi');  // Menangkap tanggal produksi yang dikirimkan dari form
			$tanggalRilis = $this->input->post('TanggalRilis');  // Menangkap tanggal rilis yang dikirimkan dari form
			$author = $this->input->post('Author');  // Menangkap author yang dikirimkan dari form
			$composer = $this->input->post('Composer');  // Menangkap composer yang dikirimkan dari form
			$pLine = $this->input->post('PLine');  // Menangkap pline yang dikirimkan dari form
			$cLine = $this->input->post('CLine');  // Menangkap cline yang dikirimkan dari form
			$isCover = $this->input->post('IsCover');  // Menangkap is cover yang dikirimkan dari form
			$genre = $this->input->post('Genre');  // Menangkap genre yang dikirimkan dari form
			$artistName = $this->input->post('ArtistName');  // Menangkap artist name yang dikirimkan dari form
			//$categoryArtist = $this->input->post('CategoryArtist');  // Menangkap category artist yang dikirimkan dari form
			$spotifyId = $this->input->post('SpotifyId');  // Menangkap spotify id yang dikirimkan dari form
			$iTunesId = $this->input->post('iTunesId');  // Menangkap spotify id yang dikirimkan dari form
			$isExplicit = $this->input->post('IsExplicit');  // Menangkap is explicit yang dikirimkan dari form
			$language = $this->input->post('Language');  // Menangkap language yang dikirimkan dari form
			//$previewStart = $this->input->post('PreviewStart');  // Menangkap preview start yang dikirimkan dari form
			$lyrics = $this->input->post('Lyrics');  // Menangkap lyrics yang dikirimkan dari form
			$coverDocument = $this->input->post('CoverDocument');  // Menangkap cover document yang dikirimkan dari form
			$kodeTrack = $this->input->post('KodeTrack');  // Menangkap kode track yang dikirimkan dari form

			echo '<pre>1. Title                : '.$title.'</pre>';
			echo '<pre>2. Author               : '.$author.'</pre>';
			echo '<pre>3. Composer             : '.$composer.'</pre>';
			echo '<pre>4. Genre                : '.$genre.'</pre>';
			echo '<pre>5. Artist               : '.$artistName.'</pre>';
			echo '<pre>6. ISRC                 : '.$isrc.'</pre>';
			echo '<pre>7. PLine                : '.$pLine.'</pre>';
			echo '<pre>8. CLine                : '.$cLine.'</pre>';
			echo '<pre>9. ProductionDate       : '.$tanggalProduksi.'</pre>';
			echo '<pre>10. OriginalReleaseDate : '.$tanggalRilis.'</pre>';
			echo '<pre>11. SpotifyId           : '.$spotifyId.'</pre>';
			echo '<pre>12. iTunesId            : '.$iTunesId.'</pre>';
			echo '<pre>13. IsExplicit          : '.$isExplicit.'</pre>';
			echo '<pre>14. IsCover             : '.$isCover.'</pre>';
			echo '<pre>15. Language            : '.$language.'</pre>';
			echo '<pre>16. Track               : '.$song.'</pre>';
			echo '<pre>17. CoverDocument       : '.$coverDocument.'</pre>';
			echo '<pre>18. Lyrics              : '.$lyrics.'</pre>';
			echo '<pre>19. Kode Track          : '.$kodeTrack.'</pre>';

			$queryUpdateMasterTrack = "update INTO MasterTrack(KodeTrack, Title, Author, Composer, Genre, Artist, ISRC, PLine, CLine, ProductionDate, OriginalReleaseDate, SpotifyId, iTunesId, IsExplicit, IsCover, Language, Track, CoverDocument, Lyrics)
            SELECT '".$kodeTrack."', '".$title."', $author, '".$composer."', '".$genre."', '".$artistName."', '".$isrc."', '".$pLine."', '".$cLine."', '".$tanggalProduksi."', '".$tanggalRilis."', '".$spotifyId."', '".$iTunesId."', '".$isExplicit."', '".$isCover."', '".$language."', '".$song."', '".$coverDocument."', '".$lyrics."'
            ";

			echo $queryUpdateMasterTrack;
			//die;

			/*
			$tanggalawal = $this->input->post('tanggalawal');  // Menangkap tanggalawal yang dikirimkan dari form
			$tanggalakhir = $this->input->post('tanggalakhir');  // Menangkap tanggalakhir yang dikirimkan dari form
			$ytchannelnameSelect = $this->input->post('ytchannelnameSelect'); // Menangkap ytchannelnameSelect yang dikirimkan dari form
			*/

			$this->session->set_flashdata('message', [
		        'icon' => 'success',
		        'title' => 'Berhasil!',
		        'text' => 'Data berhasil di confirm!',
			]);
			redirect('tambah/track');
		}

		else {
			redirect('tambah/track');
		}
	}

	public function newtrack()
	{
		$title = "PusatMusik - Backoffice - New Track";
		$arrayUser = $this->arrayUser();

		$data = [
			'title' => $title,
			'arrayUser' => $arrayUser,
		];

		$this->load->view('templates_admin/header', $data);
		$this->load->view('templates_admin/sidebar', $data);
		$this->load->view('backoffice/tambah/newtrack', $data);
		$this->load->view('templates_admin/footer');
	}

	public function inserttrack()
	{
		if ($this->input->post())
		{
			$userSelect = $this->input->post('userSelect');
			$title = $this->input->post('Title');
			$isrc = $this->input->post('ISRC');
			$author = $this->input->post('Author');
			$pLine = $this->input->post('PLine');
			$composer = $this->input->post('Composer');
			$cLine = $this->input->post('CLine');
			$genre = $this->input->post('Genre');
			$newGenre = $this->input->post('NewGenre');
			$filetusd = $this->input->post('filetusd');
			$tanggalProduksi = $this->input->post('TanggalProduksi');
			$radtypesong = $this->input->post('radtypesong');
			$artis1 = $this->input->post('artis1');
			$selart1 = $this->input->post('selart1');
			$fileinput1 = $this->input->post('fileinput1');
			$spotify1 = $this->input->post('spotify1');
			$itune1 = $this->input->post('itune1');
			$addsartis1 = $this->input->post('addsartis1');
			$total_chq = $this->input->post('total_chq');
			$cb = $this->input->post('cb');
			$selleng = $this->input->post('selleng');
			$start = $this->input->post('start');
			$time = $this->input->post('time');
			$lyric = $this->input->post('lyric');

			$queryInsertMasterAlbum = "insert INTO MasterTrack(KodeUser, Title, ISRC, Author, PLine, Composer, CLine, Genre, NewGenre, filetusd, TanggalProduksi, radtypesong, artist1, selart1, fileinput1, spotify1, itune1, addartist1, total_chq, cb, selleng, start, time, lyric)
			SELECT '".$userSelect."', '".$title."', '".$isrc."', '".$author."', '".$pLine."', '".$composer."', '".$cLine."', '".$genre."', '".$newGenre."', '".$filetusd."', '".$tanggalProduksi."', '".$radtypesong."', '".$artis1."', '".$selart1."', '".$fileinput1."', '".$spotify1."', '".$itune1."', '".$addsartis1."', '".$total_chq."', '".$cb."', '".$selleng."', '".$start."', '".$time."', '".$lyric."'
			";
			//die

			redirect('tambah/track');
		}

		else{
			redirect('tambah/track');
		}
	}
}
