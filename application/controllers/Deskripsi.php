<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Deskripsi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title']	=	"Deskripsi";
		$data['desk']	=	$this->MTanaman->getDeskripsi();
		$data['error'] = $this->session->flashdata('error');
		$this->load->view('template/start/header', $data);
		$this->load->view('template/start/sidebar', $data);
		$this->load->view('template/start/navbar', $data);
		$this->load->view('start/deskripsi', $data);
		$this->load->view('template/start/footer', $data);
	}

	public function new()
	{

		$data = [
			'slug' => $this->input->post('slug'),
			'informasi_hama' => $this->input->post('informasi_hama'),
			'informasi_budidaya' => $this->input->post('informasi_budidaya'),
		];

		$result = $this->MTanaman->newDeskripsi($data);

		if ($result) {
			$this->session->set_flashdata('success', 'Berhasil menambahkan data Deskripsi.');
		} else {
			$this->session->set_flashdata('error', 'Gagal menambahkan data Deskripsi. Silakan cek kembali data yang diisi.');
		}


		redirect('Deskripsi');
	}

	public function edit($id)
	{

		$data = [
			'slug' => $this->input->post('slug'),
			'informasi_hama' => $this->input->post('informasi_hama'),
			'informasi_budidaya' => $this->input->post('informasi_budidaya'),
		];

		$result = $this->MTanaman->editDeskripsi($id,$data);

		if ($result) {
			$this->session->set_flashdata('success', 'Berhasil Edit data Deskripsi.');
		} else {
			$this->session->set_flashdata('error', 'Gagal Edit data Deskripsi. Silakan cek kembali data yang diisi.');
		}


		redirect('Deskripsi');
	}





	public function delete($id)
	{
		$checkHapus = $this->MTanaman->deleteDeskripsi($id);

		if ($checkHapus == true) {
			$this->session->set_flashdata('success', '<strong>SUCCESS!!!</strong> Berhasil Melakukan Penghapusan Data Deskripsi.');
			redirect('Deskripsi');
		} else {
			$this->session->set_flashdata('error', '<strong>ERROR!!!</strong> Gagal Melakukan Penghapusan Data Deskripsi.');
			redirect('Deskripsi');
		}
	}
}
