<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Obstruction_type extends Public_Controller
{
	public function __construct(){
    	parent::__construct();
        $this->load->model('obstruction_type/obstruction_type_model');
        $this->lang->load('obstruction_type/obstruction_type');
    }

	public function index()
	{
		// Display Page
		$data['header'] = lang('obstruction_type');
		$data['view_page'] = $this->config->item('template_public') . "index";
		$data['module'] = 'obstruction_type';
		$this->load->view($this->_container,$data);
	}
}