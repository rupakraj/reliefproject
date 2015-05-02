<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Organization_interestarea extends Public_Controller
{
	public function __construct(){
    	parent::__construct();
        $this->load->model('organization_interestarea/organization_interestarea_model');
        $this->lang->load('organization_interestarea/organization_interestarea');
    }

	public function index()
	{
		// Display Page
		$data['header'] = lang('organization_interestarea');
		$data['view_page'] = $this->config->item('template_public') . "index";
		$data['module'] = 'organization_interestarea';
		$this->load->view($this->_container,$data);
	}
}