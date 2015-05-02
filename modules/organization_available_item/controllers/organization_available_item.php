<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Organization_available_item extends Public_Controller
{
	public function __construct(){
    	parent::__construct();
        $this->load->model('organization_available_item/organization_available_item_model');
        $this->lang->load('organization_available_item/organization_available_item');
    }

	public function index()
	{
		// Display Page
		$data['header'] = lang('organization_available_item');
		$data['view_page'] = $this->config->item('template_public') . "index";
		$data['module'] = 'organization_available_item';
		$this->load->view($this->_container,$data);
	}
}