<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		redirect('auth/login');
	}

	public function login()
	{
		$data['title']	=	"Login";
		$this->load->view('template/auth/header',$data);
		$this->load->view('auth/login',$data);
		$this->load->view('template/auth/footer',$data);
	}

	public function proses()
	{
		$email = $this->input->post('email');
		$password = MD5($this->input->post('password'));

		$cekEmail = $this->db->where('email', $email)->from('tbl_user')->get()->row();
		var_dump($cekEmail);

		if ($cekEmail == true) {
			if ($cekEmail->password == $password) {

				if ($cekEmail->is_active == 1) {
					$data_session = array(
						'id_user' => $cekEmail->id_user,
						'nama' => $cekEmail->nama,
						'role' => $cekEmail->id_role,
						'profile' => $cekEmail->profile_pict
					);
					$this->session->set_userdata($data_session);

					redirect('dashboard');
				} else {
					$this->session->set_flashdata('error', '<strong>ERROR!!!</strong> Akun Anda dalam penangguhan harap hubungi Admin.');
					redirect('auth/login');
				}
			} else {
				$this->session->set_flashdata('error', '<strong>ERROR!!!</strong> Password Yang Anda Masukan Tidak Sesuai.');
				redirect('auth/login');
			}
		} else {
			$this->session->set_flashdata('error', '<strong>ERROR!!!</strong> Email Tidak Ditemukan.');
			redirect('auth/login');
		}	
	}

	public function logout()
	{
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('role');
		$this->session->unset_userdata('profile');
		$this->session->sess_destroy();
		redirect('auth/login');		
	}
}
