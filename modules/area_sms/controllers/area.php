<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Area extends Public_Controller
{
	public function __construct(){
    	parent::__construct();
        $this->load->model('area/area_model');
        $this->lang->load('area/area');
    }

	public function index()
	{
		// Display Page
		$data['header'] = lang('area');
		$data['view_page'] = $this->config->item('template_public') . "index";
		$data['module'] = 'area';
		$this->load->view($this->_container,$data);
	}
}