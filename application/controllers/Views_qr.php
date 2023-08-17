<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Views_qr extends CI_Controller
{

	public function index($id)
	{
		$data['title']	=	"Views QR Code";
		
		$data['tanaman'] = $this->MTanaman->getById($id);
		$this->load->view('template/view/header', $data);
		$this->load->view('view/qr', $data);
		$this->load->view('template/view/footer', $data);
	}
}
