<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tambah extends CI_Controller {

	public function __construct() {
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
	
	public function album()
	{
        $title = "PusatMusik - Backoffice - Tambah Album";

        $arrayUser = $this->arrayUser();

        $arrayAlbum = [
			[
				"AccountName" => "Wilfredo Alexander Sutanto",
				"Tanggal" => "2024-12-09 17:31:35.807",
                "UPC" => "3617666782835",
				"Title" => "Kejadianku Ajaib",
				"Jenis" => "Single",
				"Aktif" => "1",
			],
			[
				"AccountName" => "Wilfredo Alexander Sutanto",
				"Tanggal" => "2024-12-04 17:31:35.807",
                "UPC" => "3617666174104",
				"Title" => "Terima Kasih",
				"Jenis" => "Single",
				"Aktif" => "1",
			],
			[
				"AccountName" => "Wilfredo Alexander Sutanto",
				"Tanggal" => "2024-08-28 17:31:35.807",
                "UPC" => "3617666782835",
				"Title" => "Jehovah (Chapter I)",
				"Jenis" => "Single",
				"Aktif" => "1",
			],
			[
				"AccountName" => "Wilfredo Alexander Sutanto",
				"Tanggal" => "2024-08-28 17:31:35.807",
                "UPC" => "3617666174104",
				"Title" => "Blackpink Cover",
				"Jenis" => "Single",
				"Aktif" => "1",
			],
			[
				"AccountName" => "Vidi Aldiano",
				"Tanggal" => "2024-08-28 17:31:35.807",
                "UPC" => "112233",
				"Title" => "Bahagia Itu Indah Sapa Bahagia Yang Bernama Indah",
				"Jenis" => "Single",
				"Aktif" => "0",
			],
			[
				"AccountName" => "Vidi Aldiano",
				"Tanggal" => "2024-08-28 17:31:35.807",
                "UPC" => "3617054696560",
				"Title" => "3617054696560",
				"Jenis" => "Single",
				"Aktif" => "0",
			],
		];

        $data = [
            'arrayAlbum' => $arrayAlbum,
            'arrayUser' => $arrayUser,
			'title' => $title,
		];

		if ($this->input->post()) {
			$accountName = $this->input->post('Accountname'); // Menangkap account name yang dikirimkan dari form
			$tanggal = $this->input->post('Tanggal'); // Menangkap tanggal yang dikirimkan dari form
			$upc = $this->input->post('UPC');  // Menangkap upc yang dikirimkan dari form
			$title1 = $this->input->post('Title');  // Menangkap title yang dikirimkan dari form
			$jenis = $this->input->post('Jenis');  // Menangkap jenis yang dikirimkan dari form
			$aktif = $this->input->post('Aktif');  // Menangkap aktif yang dikirimkan dari form
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

	public function track()
	{
		$title = "PusatMusik - Backoffice - Tambah Track";

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
				"Lyrics" => "Aku berharga di mataMu Tuhan Aku mulia di dalamMu Tuhan Ku melompat Ku bersukaKu melompat bersamaMu Tuhan Lompat ke kanan kiri Lompat <petik> tuk lebih tinggi o bersinar sepertidu du du du du du du bintang-bintang di langit o terangi dunia du du du du du du du jadi generasi bintangKu pasti bisa</petik>",
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
				"Lyrics" => "Aku berharga di mataMu Tuhan Aku mulia di dalamMu Tuhan Ku melompat Ku bersukaKu melompat bersamaMu Tuhan Lompat ke kanan kiri Lompat <petik> tuk lebih tinggi o bersinar sepertidu du du du du du du bintang-bintang di langit o terangi dunia du du du du du du du jadi generasi bintangKu pasti bisa</petik>",
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
				"Lyrics" => "Aku berharga di mataMu Tuhan Aku mulia di dalamMu Tuhan Ku melompat Ku bersukaKu melompat bersamaMu Tuhan Lompat ke kanan kiri Lompat <petik> tuk lebih tinggi o bersinar sepertidu du du du du du du bintang-bintang di langit o terangi dunia du du du du du du du jadi generasi bintangKu pasti bisa</petik>",
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
				"Lyrics" => "Aku berharga di mataMu Tuhan Aku mulia di dalamMu Tuhan Ku melompat Ku bersukaKu melompat bersamaMu Tuhan Lompat ke kanan kiri Lompat <petik> tuk lebih tinggi o bersinar sepertidu du du du du du du bintang-bintang di langit o terangi dunia du du du du du du du jadi generasi bintangKu pasti bisa</petik>",
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
				"Lyrics" => "Aku berharga di mataMu Tuhan Aku mulia di dalamMu Tuhan Ku melompat Ku bersukaKu melompat bersamaMu Tuhan Lompat ke kanan kiri Lompat <petik> tuk lebih tinggi o bersinar sepertidu du du du du du du bintang-bintang di langit o terangi dunia du du du du du du du jadi generasi bintangKu pasti bisa</petik>",
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
				"Lyrics" => "Aku berharga di mataMu Tuhan Aku mulia di dalamMu Tuhan Ku melompat Ku bersukaKu melompat bersamaMu Tuhan Lompat ke kanan kiri Lompat <petik> tuk lebih tinggi o bersinar sepertidu du du du du du du bintang-bintang di langit o terangi dunia du du du du du du du jadi generasi bintangKu pasti bisa</petik>",
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
}
