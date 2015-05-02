<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schedule extends Public_Controller
{
	public function __construct(){
    	parent::__construct();
    }

	public function index()
	{
		// Display Page
		$data['header'] = "Schedule";
		$data['view_page'] = $this->config->item('template_public') . "index";
		$data['module'] = 'schedule';
		$this->load->view($this->_container,$data);
	}
}