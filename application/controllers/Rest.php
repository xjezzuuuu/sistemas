<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Restserver\Libraries\REST_Controller;
require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/Format.php';

class Rest extends REST_Controller {

	public function __construct() {
        parent::__construct();
		
        $this->load->database();
		$this->load->helper('url');
		$this->load->model('Client_model', 'client');
	}

	public function test_get(){
		$this->response($this->client->readAll());
	}

	public function testById_get($id){
		$this->response($this->client->readById($id));
	}
}
