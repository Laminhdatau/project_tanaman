<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_management extends CI_Controller
{

	public function index()
	{
		$data['title']	=	"User Management";
		$data['user']	=	$this->MUser->getAll();
		$data['role']	=	$this->db->get('tbl_mst_role')->result();
		$data['error'] = $this->session->flashdata('error');
		$this->load->view('template/start/header', $data);
		$this->load->view('template/start/sidebar', $data);
		$this->load->view('template/start/navbar', $data);
		$this->load->view('start/user', $data);
		$this->load->view('template/start/footer', $data);
	}

	public function new()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

		if ($this->form_validation->run() == FALSE) {
			$error = validation_errors();
			$this->session->set_flashdata('error', $error);
		} else {
			$data = array(
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'password' => MD5($this->input->post('password')),
				'is_active' => "0",
				'profile_pict' => "",
				'id_role'	=> 2,
				'date_created'	=> date('Y-m-d H:i:s')

			);

			$runtime = $this->MUser->newUser($data);

			if ($runtime == true) {
				$this->session->set_flashdata('success', '<strong>SUCCESS!!!</strong> ' . $this->input->post('nama_new') . ' Sebagai Operator Baru Berhasil Di Tambahkan.');
			} else {
				$this->session->set_flashdata('error', '<strong>ERROR!!!</strong> ' . $this->input->post('nama_new') . ' Sebagai Operator Baru Gagal Di Tambahkan.');
			}
		}
		redirect('user_management');
	}

	public function hapus($id)
	{
		$runtime = $this->MUser->deleteUser($id);

		if ($runtime == true) {
			$this->session->set_flashdata('success', '<strong>SUCCESS!!!</strong> Operator Berhasil Di Hapus.');
			redirect('user_management');
		} else {
			$this->session->set_flashdata('error', '<strong>ERROR!!!</strong> Operator Gagal Di Hapus.');
			redirect('user_management');
		}
	}

	public function resetPass($id)
	{
		$data = $this->MUser->getUserById($id);
		$runtime = $this->MUser->resetPassword($id);

		if ($runtime == true) {
			$this->session->set_flashdata('success', '<strong>SUCCESS!!!</strong> Password Operator ' . $data->nama . ' Berhasil Di Reset.');
			redirect('user_management');
		} else {
			$this->session->set_flashdata('error', '<strong>ERROR!!!</strong> Password Operator ' . $data->nama . ' Gagal Di Reset.');
			redirect('user_management');
		}
	}

	public function active($id)
	{
		$data = $this->MUser->getUserById($id);

		if ($data->is_active == "1") {
			$activate = "0";
		} else {
			$activate = "1";
		}

		$runtime = $this->MUser->activeUser($id, $activate);

		if ($data->is_active == 1) {
			if ($runtime == true) {
				$this->session->set_flashdata('success', '<strong>SUCCESS!!!</strong> Operator ' . $data->nama . ' Berhasil Di Non-Aktifkan.');
				redirect('user_management');
			} else {
				$this->session->set_flashdata('error', '<strong>ERROR!!!</strong> Operator ' . $data->nama . ' Gagal Di Non-Aktifkan.');
				redirect('user_management');
			}
		} else {
			if ($runtime == true) {
				$this->session->set_flashdata('success', '<strong>SUCCESS!!!</strong> Operator ' . $data->nama . ' Berhasil Di Aktifkan.');
				redirect('user_management');
			} else {
				$this->session->set_flashdata('error', '<strong>ERROR!!!</strong> Operator ' . $data->nama . ' Gagal Di Aktifkan.');
				redirect('user_management');
			}
		}
	}
}
