<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Priority extends Public_Controller
{
	public function __construct(){
    	parent::__construct();
        $this->load->model('priority/priority_model');
        $this->lang->load('priority/priority');
    }

	public function index()
	{
		// Display Page
		$data['header'] = lang('priority');
		$data['view_page'] = $this->config->item('template_public') . "index";
		$data['module'] = 'priority';
		$this->load->view($this->_container,$data);
	}
}