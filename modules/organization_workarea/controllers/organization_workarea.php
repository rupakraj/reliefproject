<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Organization_workarea extends Public_Controller
{
	public function __construct(){
    	parent::__construct();
        $this->load->model('organization_workarea/organization_workarea_model');
        $this->lang->load('organization_workarea/organization_workarea');
    }

	public function index()
	{
		// Display Page
		$data['header'] = lang('organization_workarea');
		$data['view_page'] = $this->config->item('template_public') . "index";
		$data['module'] = 'organization_workarea';
		$this->load->view($this->_container,$data);
	}
}