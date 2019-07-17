<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event extends CI_Controller
{
    private $_id;
    private $_name;
    private $_date;
    private $_capacity;
    private $_address;
    private $_city;
    private $_country;
    private $_created_at;
    private $_updated_at;
    private $_deleted_at;

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') != true) {
            redirect(base_url() . 'admin', 'refresh');
        }
        $this->load->model('Event_model', 'events');
    }

    public function index()
    {
        $data['title'] = '- Eventos';
        $data['subtitle'] = 'Eventos';
        $variables["status"] = 30;
        $data['allEvents'] = $this->events->readAll();

        $this->load->view('base_site/head', $data);
        $this->load->view('base_site/header');
        $this->load->view('base_site/navbar', $variables);
        $this->load->view('events/index', $data);
        $this->load->view('base_site/footer');
    }

    public function create()
    {
        $data['title'] = '- Eventos - Crear';
        $data['subtitle'] = 'Crear';
        $variables["status"] = 30;
        $this->load->view('base_site/head', $data);
        $this->load->view('base_site/header');
        $this->load->view('base_site/navbar', $variables);
        $this->load->view('events/create');
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
                redirect(base_url() . 'admin/eventos', 'refresh');
            }

            $this->getPostGeneralFields();
        
            $this->events->setName($this->_name);
            $this->events->setDate($this->_date);
            $this->events->setCapacity($this->_capacity);
            $this->events->setAddress($this->_address);
            $this->events->setCity($this->_city);
            $this->events->setCountry($this->_country);
            $this->events->setCreatedAt(date("Y-m-d H:i:s"));
            if ($this->events->insert()) {
                echo json_encode($data);
                redirect(base_url() . 'admin/eventos', 'refresh');
            }
        }
        echo json_encode($data);
    }

    public function edit($id)
    {
        $data['title'] = '- Eventos - Editar';
        $data['subtitle'] = 'Editar';
        $variables["status"] = 30;
        $data['client'] = $this->events->readById($id);

        $this->load->view('base_site/head', $data);
        $this->load->view('base_site/header');
        $this->load->view('base_site/navbar', $variables);
        $this->load->view('events/edit', $data);
        $this->load->view('base_site/footer');
    }

    public function update($id)
    {
        $this->setGeneralRules();
        if ($this->input->method(false) != 'post') {
            redirect(base_url() . 'admin/eventos', 'refresh');
        }
        
        $this->getPostGeneralFields();
        $this->setId($id);

        $this->events->setId($this->_id);
        $this->events->setName($this->_name);
        $this->events->setDate($this->_date);
        $this->events->setCapacity($this->_capacity);
        $this->events->setAddress($this->_address);
        $this->events->setCity($this->_city);
        $this->events->setCountry($this->_country);
        $this->events->setUpdatedAt(date("Y-m-d H:i:s"));
        if ($this->events->update()) {
            redirect(base_url() . 'admin/eventos', 'refresh');
        }
    }

    public function delete($id)
    {
        if ($this->input->method(false) != 'get') {
            redirect(base_url() . 'admin/eventos', 'refresh');
        }
        $this->events->setId($id);
        $this->events->setDeletedAt(date("Y-m-d H:i:s"));
        if ($this->events->delete()) {
            redirect(base_url() . 'admin/eventos', 'refresh');
        }
    }

    private function setGeneralRules()
    {
        $this->form_validation->set_message('is_unique', 'El <b>{field}</b> ya existe, por favor intente nuevamente con uno distinto.');

        $this->form_validation->set_error_delimiters('<p class="text">', '</p>');

        $this->form_validation->set_rules('name', '<b>nombre</b>', 'required|trim');
        $this->form_validation->set_rules('date', '<b>fecha</b>', 'required|trim');
        $this->form_validation->set_rules('capacity', '<b>capacidad</b>', 'required|trim');
        $this->form_validation->set_rules('address', '<b>dirección</b>', 'required|trim');
        $this->form_validation->set_rules('city', '<b>ciudad</b>', 'required|trim');
        $this->form_validation->set_rules('country', '<b>país</b>', 'required|trim');
    }

    private function getPostGeneralFields()
    {
        $this->getPostName();
        $this->getPostDate();
        $this->getPostCapacity();
        $this->getPostAddress();
        $this->getPostCity();
        $this->getPostCountry();
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

    private function getPostDate()
    {
        $this->_date = $this->input->post('date', true);
    }

    private function getPostCapacity()
    {
        $this->_capacity = $this->input->post('capacity', true);
    }

    private function getPostAddress()
    {
        $this->_address = $this->input->post('address', true);
    }

    private function getPostCity()
    {
        $this->_city = $this->input->post('city', true);
    }

    private function getPostCountry()
    {
        $this->_country = $this->input->post('country', true);
    }

}