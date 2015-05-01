<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Volunteer extends Public_Controller
{
	public function __construct(){
    	parent::__construct();
        $this->load->model('volunteer/volunteer_model');
        $this->lang->load('volunteer/volunteer');
    }

	public function index()
	{
		// Display Page
		$data['header'] = lang('volunteer');
		$data['view_page'] = $this->config->item('template_public') . "index";
		$data['module'] = 'volunteer';
		$this->load->view($this->_container,$data);
	}
}