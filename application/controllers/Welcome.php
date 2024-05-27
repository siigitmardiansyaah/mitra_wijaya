<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->view('ok');
	}

	function index1() {
		$penduduk = 1;
		for ($hari = 1; $hari <= 50; $hari++) {
			if ($hari % 3 == 0) {
				// Hari kelipatan 3: Thanos muncul
				$penduduk *= 0.5; // Mengurangi setengah dari jumlah penduduk sebelumnya
			} else {
				// Dr Strange muncul
				$penduduk *= 3; // Menggandakan jumlah penduduk
			}
		}
		
		echo "Jumlah penduduk di hari ke-50: " . $penduduk;
	}
}
