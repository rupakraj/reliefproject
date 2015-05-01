<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Area_type extends Public_Controller
{
	public function __construct(){
    	parent::__construct();
        $this->load->model('area_type/area_type_model');
        $this->lang->load('area_type/area_type');
    }

	public function index()
	{
		// Display Page
		$data['header'] = lang('area_type');
		$data['view_page'] = $this->config->item('template_public') . "index";
		$data['module'] = 'area_type';
		$this->load->view($this->_container,$data);
	}
}