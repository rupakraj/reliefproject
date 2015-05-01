<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vehicle_type extends Public_Controller
{
	public function __construct(){
    	parent::__construct();
        $this->load->model('vehicle_type/vehicle_type_model');
        $this->lang->load('vehicle_type/vehicle_type');
    }

	public function index()
	{
		// Display Page
		$data['header'] = lang('vehicle_type');
		$data['view_page'] = $this->config->item('template_public') . "index";
		$data['module'] = 'vehicle_type';
		$this->load->view($this->_container,$data);
	}
}