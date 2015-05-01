<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Specialization extends Public_Controller
{
	public function __construct(){
    	parent::__construct();
        $this->load->model('specialization/specialization_model');
        $this->lang->load('specialization/specialization');
    }

	public function index()
	{
		// Display Page
		$data['header'] = lang('specialization');
		$data['view_page'] = $this->config->item('template_public') . "index";
		$data['module'] = 'specialization';
		$this->load->view($this->_container,$data);
	}
}