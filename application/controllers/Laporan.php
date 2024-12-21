<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->library('session');

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

	public function user()
	{
		$title = "PusatMusik - Backoffice - Laporan User";

        $arrayUser = $this->arrayUser();

		$data = [
			'title' => $title,
			'arrayUser' => $arrayUser,
		];

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
		    $this->load->view('templates_admin/header', $data);
		    $this->load->view('templates_admin/sidebar', $data);
			$this->load->view('backoffice/laporan/user', $data);
			$this->load->view('templates_admin/footer');
		}
	}

    public function rejectuser()
    {
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

	public function exportuser()
	{
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
		$title = "PusatMusik - Backoffice - Laporan Album";

		$arrayUser = $this->arrayUser();

		$arrayAlbum = [
			[
				"YoutubeChannelName" => "Wilfredo Alexander Sutanto",
				"Tanggal" => "2024-12-09 17:31:35.807",
				"Keterangan" => "Kejadianku Ajaib",
				"UPC" => "3617666782835",
				"Jenis" => "Single",
				"CreateDate" => "04/11/2024",
				"Approve" => "1",
				"Aktif" => "1",
			],
			[
				"YoutubeChannelName" => "Wilfredo Alexander Sutanto",
				"Tanggal" => "2024-12-04 17:31:35.807",
				"Keterangan" => "Terima Kasih",
				"UPC" => "3617666174104",
				"Jenis" => "Single",
				"CreateDate" => "04/11/2024",
				"Approve" => "1",
				"Aktif" => "1",
			],
			[
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

		$data = [
			'title' => $title,
			'arrayUser' => $arrayUser,
			'arrayAlbum'=> $arrayAlbum,
		];

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
		    $this->load->view('templates_admin/header', $data);
		    $this->load->view('templates_admin/sidebar', $data);
			$this->load->view('backoffice/laporan/album', $data);
			$this->load->view('templates_admin/footer');
		}
	}

	public function aktifalbum()
	{
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

	public function exportalbum()
	{
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
				$status = ($download['Aktif'] == 0) ? 'NO' : 'YES';
				$tanggal = date('Y-m-d H:i:s.z', strtotime($download['Tanggal']));

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

	public function track()
	{
		$title = "PusatMusik - Backoffice - Laporan Track";

		$arrayUser = $this->arrayUser();

		$arrayTrack = [
			[
				"AccountName" => "Vidi Aldiano",
				"Tanggal" => "2024-08-28 17:31:35.807",
				"Title" => "Jehovah",
				"Song" => "https://tusd.omegasoft.co.id/track/2f3d49d29a748abe4d36706a2dc721c7",
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
				"Lyrics" => "Aku berharga di mata...",
				"CoverDocument" => "https://pusatmusik.com/application/uploads/docs/",
			],
			[
				"AccountName" => "Wilfredo Alexander Sutanto",
				"Tanggal" => "2024-08-28 17:31:35.807",
				"Title" => "Jehovah 2",
				"Song" => "https://tusd.omegasoft.co.id/track/2f3d49d29a748abe4d36706a2dc721c7",
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
				"Lyrics" => "Aku berharga di mata...",
				"CoverDocument" => "https://pusatmusik.com/application/uploads/docs/",
			],
			[
				"AccountName" => "Vidi Aldiano",
				"Tanggal" => "2024-08-28 17:31:35.807",
				"Title" => "RancanganMu Takkan Gagal",
				"Song" => "https://tusd.omegasoft.co.id/track/2f3d49d29a748abe4d36706a2dc721c7",
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
				"Lyrics" => "Aku berharga di mata...",
				"CoverDocument" => "https://pusatmusik.com/application/uploads/docs/",
			],
			[
				"AccountName" => "Wilfredo Alexander Sutanto",
				"Tanggal" => "2024-08-28 17:31:35.807",
				"Title" => "Hari Terbaik",
				"Song" => "https://tusd.omegasoft.co.id/track/2f3d49d29a748abe4d36706a2dc721c7",
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
				"Lyrics" => "Aku berharga di mata...",
				"CoverDocument" => "https://pusatmusik.com/application/uploads/docs/",
			],
			[
				"AccountName" => "Wilfredo Alexander Sutanto",
				"Tanggal" => "2024-08-28 17:31:35.807",
				"Title" => "Berjalan BersamaMu",
				"Song" => "https://tusd.omegasoft.co.id/track/2f3d49d29a748abe4d36706a2dc721c7",
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
				"Lyrics" => "Aku berharga di mata...",
				"CoverDocument" => "https://pusatmusik.com/application/uploads/docs/",
			],
			[
				"AccountName" => "Wilfredo Alexander Sutanto",
				"Tanggal" => "2024-08-28 17:31:35.807",
				"Title" => "Tuhan Yesus Melawat UmatNya",
				"Song" => "https://tusd.omegasoft.co.id/track/2f3d49d29a748abe4d36706a2dc721c7",
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
				"Lyrics" => "Aku berharga di mata...",
				"CoverDocument" => "https://pusatmusik.com/application/uploads/docs/",
			],
		];

		$data = [
			'title' => $title,
			'arrayUser' => $arrayUser,
		 	'arrayTrack' => $arrayTrack,
		];

		if ($this->input->post()) {
			$accountName = $this->input->post('AccountName'); // Menangkap account nama yang dikirimkan dari form
			$tanggal = $this->input->post('Tanggal');  // Menangkap tanggal yang dikirimkan dari form
			$keterangan = $this->input->post('Keterangan');  // Menangkap keterangan yang dikirimkan dari form
			$isrc = $this->input->post('ISRC');  // Menangkap isrc yang dikirimkan dari form
			$author = $this->input->post('Author');  // Menangkap author yang dikirimkan dari form
			$composer = $this->input->post('Composer');  // Menangkap composer yang dikirimkan dari form
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
		    $this->load->view('templates_admin/header', $data);
		    $this->load->view('templates_admin/sidebar', $data);
			$this->load->view('backoffice/laporan/track', $data);	
			$this->load->view('templates_admin/footer');
		}
	}

	public function exporttrack()
	{
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
			echo "No\tAccountName\tTanggal\tTitle\tSong\tISRC\tTanggalProduksi\tTanggalRilis\tAuthor\tComposer\tPLine\tCLine\tIsCover\tGenre\tArtistName\tCategoryArtist\tSpotifyId\tiTunesId\tIsExplicit\tLanguage\tPreviewStart\tLyrics\tCover Document\n";

			// Output data rows
			$no = 1;
			foreach ($arrayTrack as $download) {
				$accountName = $download['AccountName'];
				$tanggal = date('Y-m-d H:i:s.z', strtotime($download['Tanggal']));
				$title = $download['Title'];
				$song = $download['Song'];
				$isrc = $download['ISRC'];
				$tanggalProduksi = date('Y-m-d', strtotime($download['TanggalProduksi']));
				$tanggalRilis = date('Y-m-d', strtotime($download['TanggalRilis']));
				$author = $download['Author'];
				$composer = $download['Composer'];
				$pLine = $download['PLine'];
				$cLine = $download['CLine'];
				$isCover = ($download['IsCover'] == 0) ? 'NO' : 'YES';
				$genre = $download['Genre'];
				$artistName = $download['ArtistName'];
				$categoryArtist = $download['CategoryArtist'];
				$spotifyId = $download['SpotifyId'];
				$iTunesId = $download['iTunesId'];
				$isExplicit = ($download['IsExplicit'] == 0) ? 'NO' : 'YES';
				$language = $download['Language'];
				$previewStart = $download['PreviewStart'];
				$lyrics = $download['Lyrics'];
				$coverDocument = $download['CoverDocument'];

				echo "$no\t$accountName\t$tanggal\t$title\t$song\t$isrc\t$tanggalProduksi\t$tanggalRilis\t$author\t$composer\t$pLine\t$cLine\t$isCover\t$genre\t$artistName\t$categoryArtist\t$spotifyId\t$iTunesId\t$isExplicit\t$language\t$previewStart\t$lyrics\t$coverDocument\n";
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
