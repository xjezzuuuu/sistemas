<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ticket extends CI_Controller
{
    private $_id;
    private $_name;
    private $_type;
    private $_price;
    private $_quantity;
    private $_event_id;

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') != true) {
            redirect(base_url() . 'admin', 'refresh');
        }
        $this->load->model('Ticket_model', 'tickets');
    }

    public function index()
    
    {
        $this->load->model('Event_model', 'events');

        $data['title'] = '- Entradas';
        $data['subtitle'] = 'Entradas';
        $variables["status"] = 40;
        $data['allTickets'] = $this->tickets->readAll();
        $data['allEvents'] = $this->events->readAll();

        $this->load->view('base_site/head', $data);
        $this->load->view('base_site/header');
        $this->load->view('base_site/navbar', $variables);
        $this->load->view('tickets/index', $data);
        $this->load->view('base_site/footer');
    }

    public function create()
    {
        $this->load->model('Event_model', 'events');

        $data['title'] = '- Entradas - Crear';
        $data['subtitle'] = 'Crear';
        $variables["status"] = 40;
        $data['allEvents'] = $this->events->readAll();
        
        $this->load->view('base_site/head', $data);
        $this->load->view('base_site/header');
        $this->load->view('base_site/navbar', $variables);
        $this->load->view('tickets/create', $data);
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
                redirect(base_url() . 'admin/entradas', 'refresh');
            }

            $this->getPostGeneralFields();
    
            $this->tickets->setName($this->_name);
            $this->tickets->setType($this->_type);
            $this->tickets->setPrice($this->_price);
            $this->tickets->setQuantity($this->_quantity);
            $this->tickets->setEventId($this->_event_id);
            $this->tickets->setCreatedAt(date("Y-m-d H:i:s"));
            if ($this->tickets->insert()) {
                echo json_encode($data);
                redirect(base_url() . 'admin/entradas', 'refresh');
            }
        }
        echo json_encode($data);
    }

    public function edit($id)
    {
        $data['title'] = '- Entradas - Editar';
        $data['subtitle'] = 'Editar';
        $variables["status"] = 40;
        $data['user'] = $this->tickets->readById($id);

        $this->load->view('base_site/head', $data);
        $this->load->view('base_site/header');
        $this->load->view('base_site/navbar', $variables);
        $this->load->view('tickets/edit', $data);
        $this->load->view('base_site/footer');
    }

    public function update($id)
    {
        $this->setGeneralRules();
        if ($this->input->method(false) != 'post') {
            redirect(base_url() . 'admin/entradas', 'refresh');
        }
        $this->load->library('encryption');
        
        $this->getPostGeneralFields();
        $this->setId($id);

        $this->tickets->setId($this->_id);
        $this->tickets->setName($this->_name);
        $this->tickets->setType($this->_type);
        $this->tickets->setPrice($this->_price);
        $this->tickets->setQuantity($this->_quantity);
        $this->tickets->setEventId($this->_event_id);
        $this->tickets->setUpdatedAt(date("Y-m-d H:i:s"));
        if ($this->tickets->update()) {
            redirect(base_url() . 'admin/entradas', 'refresh');
        }
    }

    public function delete($id)
    {
        if ($this->input->method(false) != 'get') {
            redirect(base_url() . 'admin/entradas', 'refresh');
        }
        $this->getPostId();
        $this->tickets->setId($id);
        $this->tickets->setDeletedAt(date("Y-m-d H:i:s"));
        if ($this->tickets->delete()) {
            redirect(base_url() . 'admin/entradas', 'refresh');
        }
    }

    private function setGeneralRules()
    {
        $this->form_validation->set_message('required', 'El campo <b>{field}</b> es obligatorio.');
        $this->form_validation->set_message('matches', 'La <b>contraseña</b> no coincide, porfavor intente nuevamente.');

        $this->form_validation->set_error_delimiters('<p class="text">', '</p>');

        $this->form_validation->set_rules('name', 'Nombre', 'required|trim|min_length[5]');
        $this->form_validation->set_rules('type', 'Tipo', 'required|trim');
        $this->form_validation->set_rules('price', 'precio', 'required|numeric');
        $this->form_validation->set_rules('quantity', 'Cantidad', 'required|numeric');
        $this->form_validation->set_rules('event_id', 'Evento', 'required');
        
    }

    private function getPostGeneralFields()
    {
        $this->getPostName();
        $this->getPostType();
        $this->getPostPrice();
        $this->getPostQuantity();
        $this->getPostEventId();
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

    private function getPostType()
    {
        $this->_type = $this->input->post('type', true);
    }

    private function getPostPrice()
    {
        $this->_price = $this->input->post('price', true);
    }

    private function getPostQuantity()
    {
        $this->_quantity = $this->input->post('quantity', true);
    }

    private function getPostEventId()
    {
        $this->_event_id = $this->input->post('event_id', true);
    }

}