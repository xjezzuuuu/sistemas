<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Client extends CI_Controller
{
    private $_id;
    private $_rut;
    private $_name;
    private $_lastname;
    private $_gender;
    private $_age;
    private $_email;
    private $_fingerprint;

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') != true) {
            redirect(base_url() . 'admin', 'refresh');
        }
        $this->load->model('Client_model', 'clients');
    }

    public function index()
    {
        $data['title'] = '- Clientes';
        $data['subtitle'] = 'Clientes';
        $variables["status"] = 20;
        $data['allClients'] = $this->clients->readAll();

        $this->load->view('base_site/head', $data);
        $this->load->view('base_site/header');
        $this->load->view('base_site/navbar', $variables);
        $this->load->view('clients/index', $data);
        $this->load->view('base_site/footer');
    }

    public function create()
    {
        $data['title'] = '- Clientes - Crear';
        $data['subtitle'] = 'Crear';
        $variables["status"] = 20;
        $this->load->view('base_site/head', $data);
        $this->load->view('base_site/header');
        $this->load->view('base_site/navbar', $variables);
        $this->load->view('clients/create');
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
                redirect(base_url() . 'admin/clientes', 'refresh');
            }

            $this->getPostGeneralFields();
        
            $this->clients->setRut($this->_rut);
            $this->clients->setName($this->_name);
            $this->clients->setLastName($this->_lastname);
            $this->clients->setGender($this->_gender);
            $this->clients->setAge($this->_age);
            $this->clients->setEmail($this->_email);
            $this->clients->setFingerPrint($this->_fingerprint);
            $this->clients->setCreatedAt(date("Y-m-d H:i:s"));
            if ($this->clients->insert()) {
                echo json_encode($data);
                redirect(base_url() . 'admin/clientes', 'refresh');
            }
        }
        echo json_encode($data);
    }

    public function edit($id)
    {
        $data['title'] = '- Clientes - Editar';
        $data['subtitle'] = 'Editar';
        $variables["status"] = 20;
        $data['client'] = $this->clients->readById($id);

        $this->load->view('base_site/head', $data);
        $this->load->view('base_site/header');
        $this->load->view('base_site/navbar', $variables);
        $this->load->view('clients/edit', $data);
        $this->load->view('base_site/footer');
    }

    public function update($id)
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
                redirect(base_url() . 'admin/clientes', 'refresh');
            }
        
            $this->getPostGeneralFields();
            $this->setId($id);

            $this->clients->setId($this->_id);
            $this->clients->setRut($this->_rut);
            $this->clients->setName($this->_name);
            $this->clients->setLastName($this->_lastname);
            $this->clients->setGender($this->_gender);
            $this->clients->setAge($this->_age);
            $this->clients->setEmail($this->_email);
            $this->clients->setFingerPrint($this->_fingerprint);
            $this->clients->setUpdatedAt(date("Y-m-d H:i:s"));
            if ($this->clients->update()) {
                echo json_encode($data);
                redirect(base_url() . 'admin/clientes', 'refresh');
            }
        }
        echo json_encode($data);
    }

    public function delete($id)
    {
        if ($this->input->method(false) != 'get') {
            redirect(base_url() . 'admin/clientes', 'refresh');
        }
        $this->clients->setId($id);
        $this->clients->setDeletedAt(date("Y-m-d H:i:s"));
        if ($this->clients->delete()) {
            redirect(base_url() . 'admin/clientes', 'refresh');
        }
    }

    private function setGeneralRules()
    {
        $this->form_validation->set_message('is_unique', 'El <b>{field}</b> ya existe, por favor intente nuevamente con uno distinto.');

        $this->form_validation->set_error_delimiters('<p class="text">', '</p>');

        $this->form_validation->set_rules('rut', '<b>rut</b>', 'required|is_unique[clients.rut]');
        $this->form_validation->set_rules('name', '<b>nombre</b>', 'required|trim');
        $this->form_validation->set_rules('lastname', '<b>apellido</b>', 'required|trim');
        $this->form_validation->set_rules('gender', '<b>género</b>', 'required|trim');
        $this->form_validation->set_rules('age', '<b>edad</b>', 'required|numeric');
        $this->form_validation->set_rules('email', '<b>correo electrónico</b>', 'required|valid_email|is_unique[clients.email]');
    }

    private function getPostGeneralFields()
    {
        $this->getPostRut();
        $this->getPostName();
        $this->getPostLastName();
        $this->getPostGender();
        $this->getPostAge();
        $this->getPostEmail();
        $this->getPostFingerPrint();
    }

    private function setId($id)
    {
        $this->_id = $id;
    }

    private function getPostId()
    {
        $this->_id = $this->input->post('id', true);
    }

    private function setRut($rut)
    {
        $this->_rut = $rut;
    }

    private function getPostRut()
    {
        $this->_rut = $this->input->post('rut', true);
    }

    private function getPostName()
    {
        $this->_name = $this->input->post('name', true);
    }

    private function getPostLastName()
    {
        $this->_lastname = $this->input->post('lastname', true);
    }

    private function getPostGender()
    {
        $this->_gender = $this->input->post('gender', true);
    }

    private function getPostAge()
    {
        $this->_age = $this->input->post('age', true);
    }

    private function getPostEmail()
    {
        $this->_email = $this->input->post('email', true);
    }

    private function getPostFingerPrint()
    {
        $this->_fingerprint = $this->input->post('fingerprint', true);
    }

}