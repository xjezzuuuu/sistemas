<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    private $_id;
    private $_name;
    private $_last_name;
    private $_email;
    private $_password;
    private $_password_confirm;

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') != true) {
            redirect(base_url() . 'admin', 'refresh');
        }
        $this->load->model('User_model', 'users');
    }

    public function index()
    
    {
        $data['title'] = '- Usuarios';
        $data['subtitle'] = 'Usuarios';
        $variables["status"] = 10;
        $data['allUsers'] = $this->users->readAll();

        $this->load->view('base_site/head', $data);
        $this->load->view('base_site/header');
        $this->load->view('base_site/navbar', $variables);
        $this->load->view('users/index', $data);
        $this->load->view('base_site/footer');
    }

    public function create()
    {
        $data['title'] = '- Usuarios - Crear';
        $data['subtitle'] = 'Crear';
        $variables["status"] = 10;
        
        $this->load->view('base_site/head', $data);
        $this->load->view('base_site/header');
        $this->load->view('base_site/navbar', $variables);
        $this->load->view('users/create');
        $this->load->view('base_site/footer');
    }

    public function store()
    {
        $data = array('success' => false, 'messages' => array());

        $this->setGeneralRules();

        if ($this->form_validation->run() == false){
            foreach ($_POST as $key => $value) {
                $data['messages'][$key] = form_error($key);     
            }
                
        } else {

            $data['success'] = true;
            
            if ($this->input->method(false) != 'post') {
                redirect(base_url() . 'admin/usuarios', 'refresh');
            }
            
            $this->load->library('encryption');

            $this->getPostGeneralFields();
    
            $this->users->setName($this->_name);
            $this->users->setLastName($this->_last_name);
            $this->users->setEmail($this->_email);
            $this->users->setPassword($this->encryption->encrypt($this->_password));
            $this->users->setCreatedAt(date("Y-m-d H:i:s"));
            if ($this->users->insert()) {
                echo json_encode($data);
                redirect(base_url() . 'admin/usuarios', 'refresh');
            }
        }
        echo json_encode($data);
    }

    public function edit($id)
    {
        $data['title'] = '- Usuarios - Editar';
        $data['subtitle'] = 'Editar';
        $variables["status"] = 10;
        $data['user'] = $this->users->readById($id);

        $this->load->view('base_site/head', $data);
        $this->load->view('base_site/header');
        $this->load->view('base_site/navbar', $variables);
        $this->load->view('users/edit', $data);
        $this->load->view('base_site/footer');
    }

    public function update($id)
    {
        $this->setGeneralRules();
        if ($this->input->method(false) != 'post') {
            redirect(base_url() . 'admin/usuarios', 'refresh');
        }
        $this->load->library('encryption');
        
        $this->getPostGeneralFields();
        $this->setId($id);

        $this->users->setId($this->_id);
        $this->users->setName($this->_name);
        $this->users->setLastName($this->_last_name);
        $this->users->setEmail($this->_email);
        $this->users->setPassword($this->encryption->encrypt($this->_password));
        $this->users->setUpdatedAt(date("Y-m-d H:i:s"));
        if ($this->users->update()) {
            redirect(base_url() . 'admin/usuarios', 'refresh');
        }
    }

    public function delete($id)
    {
        if ($this->input->method(false) != 'get') {
            redirect(base_url() . 'admin/usuarios', 'refresh');
        }
        $this->getPostId();
        $this->users->setId($id);
        $this->users->setDeletedAt(date("Y-m-d H:i:s"));
        if ($this->users->delete()) {
            redirect(base_url() . 'admin/usuarios', 'refresh');
        }
    }

    private function setGeneralRules()
    {
        $this->form_validation->set_message('required', 'El campo <b>{field}</b> es obligatorio.');
        $this->form_validation->set_message('is_unique', 'El <b>{field}</b> ya existe, por favor intente nuevamente con uno distinto.');
        $this->form_validation->set_message('matches', 'La <b>contraseña</b> no coincide, porfavor intente nuevamente.');

        $this->form_validation->set_error_delimiters('<p class="text">', '</p>');

        $this->form_validation->set_rules('name', 'Nombre', 'required|trim');
        $this->form_validation->set_rules('last_name', 'Apellido', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Contraseña', 'required|min_length[5]|alpha_dash');
        $this->form_validation->set_rules('password_confirm', 'Confirmar Contraseña', 'required|matches[password]');
        
    }

    private function getPostGeneralFields()
    {
        $this->getPostName();
        $this->getPostLastName();
        $this->getPostEmail();
        $this->getPostPassword();
        $this->getPostPasswordConfirm();
    }

    private function setId($id)
    {
        $this->_id = $id;
    }

    private function getPostId()
    {
        $this->_id = $this->input->post('id', true);
    }

    private function getPostName()
    {
        $this->_name = $this->input->post('name', true);
    }

    private function getPostLastName()
    {
        $this->_last_name = $this->input->post('last_name', true);
    }

    private function getPostEmail()
    {
        $this->_email = $this->input->post('email', true);
    }

    private function getPostPassword()
    {
        $this->_password = $this->input->post('password', true);
    }

    private function getPostPasswordConfirm()
    {
        $this->_password_confirm = $this->input->post('password_confirm', true);
    }
}