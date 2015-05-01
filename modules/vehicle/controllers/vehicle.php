<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vehicle extends Public_Controller
{
	public function __construct(){
    	parent::__construct();
        $this->load->model('vehicle/vehicle_model');
        $this->lang->load('vehicle/vehicle');
    }

	public function index()
	{
		// Display Page
		$data['header'] = lang('vehicle');
		$data['view_page'] = $this->config->item('template_public') . "index";
		$data['module'] = 'vehicle';
		$this->load->view($this->_container,$data);
	}
}