<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Unit extends Public_Controller
{
	public function __construct(){
    	parent::__construct();
        $this->load->model('unit/unit_model');
        $this->lang->load('unit/unit');
    }

	public function index()
	{
		// Display Page
		$data['header'] = lang('unit');
		$data['view_page'] = $this->config->item('template_public') . "index";
		$data['module'] = 'unit';
		$this->load->view($this->_container,$data);
	}
}