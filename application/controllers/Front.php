<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

	
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') != true) {
            redirect(base_url(), 'refresh');
        }
        $this->load->model('User_model', 'users');
    }

	public function index(){
		$data['title'] = '- Escritorio';
		$data['subtitle'] = 'Inicio';
		$variables["status"] = 1;

		$this->load->view('base_site/head', $data);
		$this->load->view('base_site/header');
		$this->load->view('base_site/navbar', $variables);
		$this->load->view('front');
		$this->load->view('base_site/footer');
	}
}
