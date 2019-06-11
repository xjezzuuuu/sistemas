<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    private $_email;
    private $_password;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'users');
    }

    public function index()
    {
        if ($this->session->userdata('logged_in') != false) {
            redirect(base_url() . 'admin/inicio', 'refresh');
        }

        $this->load->view('base_login/head');
        $this->load->view('login');
        $this->load->view('base_login/footer');
    }

    public function login()
    {
        $this->setGeneralRules();
        if ($this->input->method(false) != 'post') {
            redirect(base_url() . 'admin', 'refresh');
        }
        $this->load->library('encryption');
        $this->load->library('session');
        $this->getPostGeneralFields();

        $user = $this->users->readByEmail($this->_email);
        if (!empty($user) && ($this->encryption->decrypt($user['password']) == $this->_password)) {
            $data = array(
                'id' => $user['id'],
                'name' => $user['name'],
                'last_name' => $user['last_name'],
                'email' => $user['email'],
                'logged_in' => true,
            );

            $this->session->set_userdata($data);
            redirect(base_url() . 'admin/inicio', 'refresh');
        }
        redirect(base_url(), 'refresh');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url(), 'refresh');
    }

    private function setGeneralRules()
    {
        $this->form_validation->set_rules('email', 'email', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required|trim');
    }

    private function getPostGeneralFields()
    {
        $this->getPostEmail();
        $this->getPostPassword();
    }

    private function getPostEmail()
    {
        $this->_email = $this->input->post('email', true);
    }

    private function getPostPassword()
    {
        $this->_password = $this->input->post('password', true);
    }
}