<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Organization extends Public_Controller
{
	public function __construct(){
    	parent::__construct();
        $this->load->model('organization/organization_model');
        $this->lang->load('organization/organization');
    }

	public function index()
	{
		// Display Page
		$data['header'] = lang('organization');
		$data['view_page'] = $this->config->item('template_public') . "index";
		$data['module'] = 'organization';
		$this->load->view($this->_container,$data);
	}
}