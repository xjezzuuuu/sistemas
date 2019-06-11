<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Client extends CI_Controller
{
    private $_id;
    private $_rut;
    private $_name;
    private $_last_name_p;
    private $_last_name_m;
    private $_email;
    private $_gender;
    private $_age;

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
        $this->setGeneralRules();
        if ($this->input->method(false) != 'post') {
            redirect(base_url() . 'admin/clientes', 'refresh');
        }

        $this->getPostGeneralFields();
        
        $this->clients->setRut($this->_rut);
        $this->clients->setName($this->_name);
        $this->clients->setLastNameP($this->_last_name_p);
        $this->clients->setLastNameM($this->_last_name_m);
        $this->clients->setEmail($this->_email);
        $this->clients->setGender($this->_gender);
        $this->clients->setAge($this->_age);
        $this->clients->setCreatedAt(date("Y-m-d H:i:s"));
        if ($this->clients->insert()) {
            redirect(base_url() . 'admin/clientes', 'refresh');
        }
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
        $this->setGeneralRules();
        if ($this->input->method(false) != 'post') {
            redirect(base_url() . 'admin/clientes', 'refresh');
        }
        
        $this->getPostGeneralFields();
        $this->setId($id);

        $this->clients->setId($this->_id);
        $this->clients->setRut($this->_rut);
        $this->clients->setName($this->_name);
        $this->clients->setLastNameP($this->_last_name_p);
        $this->clients->setLastNameM($this->_last_name_m);
        $this->clients->setEmail($this->_email);
        $this->clients->setGender($this->_gender);
        $this->clients->setAge($this->_age);
        $this->clients->setUpdatedAt(date("Y-m-d H:i:s"));
        if ($this->clients->update()) {
            redirect(base_url() . 'admin/clientes', 'refresh');
        }
    }

    public function delete($id)
    {
        if ($this->input->method(false) != 'get') {
            redirect(base_url() . 'admin/clientes', 'refresh');
        }
        $this->getPostRut();
        $this->clients->setId($id);
        $this->clients->setDeletedAt(date("Y-m-d H:i:s"));
        if ($this->clients->delete()) {
            redirect(base_url() . 'admin/clientes', 'refresh');
        }
    }

    private function setGeneralRules()
    {
        $this->form_validation->set_rules('rut', 'rut', 'required|trim');
    }

    private function getPostGeneralFields()
    {
        $this->getPostRut();
        $this->getPostName();
        $this->getPostLastNameP();
        $this->getPostLastNameM();
        $this->getPostEmail();
        $this->getPostGender();
        $this->getPostAge();
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

    private function getPostLastNameP()
    {
        $this->_last_name_p = $this->input->post('last_name_p', true);
    }

    private function getPostLastNameM()
    {
        $this->_last_name_m = $this->input->post('last_name_m', true);
    }

    private function getPostEmail()
    {
        $this->_email = $this->input->post('email', true);
    }

    private function getPostGender()
    {
        $this->_gender = $this->input->post('gender', true);
    }

    private function getPostAge()
    {
        $this->_age = $this->input->post('age', true);
    }
}