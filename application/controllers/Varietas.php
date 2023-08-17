<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Varietas extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title']	=	"Varietas";
		$data['varietas']	=	$this->MTanaman->getVarietas();
		$data['desk']	=	$this->MTanaman->getDeskripsi();
		$data['error'] = $this->session->flashdata('error');
		$this->load->view('template/start/header', $data);
		$this->load->view('template/start/sidebar', $data);
		$this->load->view('template/start/navbar', $data);
		$this->load->view('start/varietas', $data);
		$this->load->view('template/start/footer', $data);
	}

	public function new()
	{
		$data = [
			'varietas' => $this->input->post('varietas'),
			'id_deskripsi' => $this->input->post('id_deskripsi')
		];

		$result = $this->MTanaman->newVarietas($data);

		if ($result) {
			$this->session->set_flashdata('success', 'Berhasil menambahkan data varietas.');
		} else {
			$this->session->set_flashdata('error', 'Gagal menambahkan data varietas. Silakan cek kembali data yang diisi.');
		}

		redirect('varietas');
	}

	public function edit($id)
	{
		$data = [
			'varietas' => $this->input->post('varietas'),
			'id_deskripsi' => $this->input->post('id_deskripsi')
		];

		$result = $this->MTanaman->editVarietas($id,$data);

		if ($result) {
			$this->session->set_flashdata('success', 'Berhasil Edit data varietas.');
		} else {
			$this->session->set_flashdata('error', 'Gagal Edit data varietas. Silakan cek kembali data yang diisi.');
		}

		redirect('varietas');
	}





	public function delete($id)
	{
		$checkHapus = $this->MTanaman->deleteVarietas($id);

		if ($checkHapus == true) {
			$this->session->set_flashdata('success', '<strong>SUCCESS!!!</strong> Berhasil Melakukan Penghapusan Data varietas.');
			redirect('varietas');
		} else {
			$this->session->set_flashdata('error', '<strong>ERROR!!!</strong> Gagal Melakukan Penghapusan Data varietas.');
			redirect('varietas');
		}
	}
}
