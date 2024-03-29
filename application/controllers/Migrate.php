<?php
class Migrate extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('encryption');
    }

    public function index()
    {
        $this->load->library('migration');
        if ($this->migration->current() === false) {
            show_error($this->migration->error_string());
        }
    }
}