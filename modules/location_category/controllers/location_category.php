<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Location_category extends Public_Controller
{
	public function __construct(){
    	parent::__construct();
        $this->load->model('location_category/location_category_model');
        $this->lang->load('location_category/location_category');
    }

	public function index()
	{
		// Display Page
		$data['header'] = lang('location_category');
		$data['view_page'] = $this->config->item('template_public') . "index";
		$data['module'] = 'location_category';
		$this->load->view($this->_container,$data);
	}
}