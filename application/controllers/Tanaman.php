<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(APPPATH . 'libraries/phpqrcode/qrlib.php');

class Tanaman extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title']	=	"Data Tanaman";
		$data['tanaman']	=	$this->MTanaman->getAll();
		$data['varietas']	=	$this->MTanaman->getVarietas();
		$data['error'] = $this->session->flashdata('error');
		$this->load->view('template/start/header', $data);
		$this->load->view('template/start/sidebar', $data);
		$this->load->view('template/start/navbar', $data);
		$this->load->view('start/tanaman', $data);
		$this->load->view('template/start/footer', $data);
	}

	public function new()
	{
		$upload_path = './uploads/';

		$config['upload_path'] = $upload_path;
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = 4096;
		$config['encrypt_name'] = true;
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('foto')) {
			$response['error'] = true;
			$response['message'] = $this->upload->display_errors();
			$this->session->set_flashdata('error', 'Gagal mengupload gambar: ' . $response['message']);
		} else {
			$data = [
				'gambar_tanaman' => $this->upload->data('file_name'),
				'nama_tanaman' => $this->input->post('nama_tanaman'),
				'id_varietas' => $this->input->post('id_varietas'),
				'informasi_umum' => $this->input->post('informasi_umum'),
				'date_created' => date('Y-m-d H:i:s')
			];

			$result = $this->MTanaman->newTanaman($data);

			if ($result) {
				$this->session->set_flashdata('success', 'Berhasil menambahkan data tanaman.');
			} else {
				$this->session->set_flashdata('error', 'Gagal menambahkan data tanaman. Silakan cek kembali data yang diisi.');
			}
			redirect('tanaman');
		}

		redirect('tanaman');
	}



	public function verifikasi($id)
	{

		$add = $this->MTanaman->verifikasiTanaman($id, $this->session->userdata('id_user'));


		if ($add == true) {
			$this->session->set_flashdata('success', '<strong>SUCCESS!!!</strong> Berhasil Melakukan Verifikasi Data Tanaman.');
			redirect('tanaman');
		} else {
			$this->session->set_flashdata('error', '<strong>ERROR!!!</strong> Gagal Melakukan Verifikasi Data Tanaman.');
			redirect('tanaman');
		}
	}

	public function hapus($id)
	{
		$checkHapus = $this->MTanaman->deleteTanaman($id);

		if ($checkHapus == true) {
			$this->session->set_flashdata('success', '<strong>SUCCESS!!!</strong> Berhasil Melakukan Penghapusan Data Tanaman.');
			redirect('tanaman');
		} else {
			$this->session->set_flashdata('error', '<strong>ERROR!!!</strong> Gagal Melakukan Penghapusan Data Tanaman.');
			redirect('tanaman');
		}
	}

	public function qr($id)
	{
		$data = base_url('views_qr/index/' . $id);

		$params['data'] = $data;
		$params['level'] = 'H';
		$params['size'] = 10;
		$params['savename'] = FCPATH . 'uploads/qrcode/' . $id . '.png';

		QRcode::png($params['data'], $params['savename'], $params['level'], $params['size']);

		$updateQrdone = $this->MTanaman->updateQr($id);

		if ($updateQrdone == true) {
			$this->session->set_flashdata('success', '<strong>SUCCESS!!!</strong> Berhasil Melakukan Generater QR Code.');
			redirect('tanaman');
		} else {
			$this->session->set_flashdata('error', '<strong>ERROR!!!</strong> Gagal Melakukan Generater QR Code.');
			redirect('tanaman');
		}
	}
}
