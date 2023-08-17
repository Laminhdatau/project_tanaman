<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$data['title']	=	"Dashboard";
		$this->load->view('template/start/header',$data);
		$this->load->view('template/start/sidebar',$data);
		$this->load->view('template/start/navbar',$data);
		$this->load->view('start/dashboard',$data);
		$this->load->view('template/start/footer',$data);
	}
}
