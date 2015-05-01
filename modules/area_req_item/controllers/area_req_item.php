<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Area_req_item extends Public_Controller
{
	public function __construct(){
    	parent::__construct();
        $this->load->model('area_req_item/area_req_item_model');
        $this->lang->load('area_req_item/area_req_item');
    }

	public function index()
	{
		// Display Page
		$data['header'] = lang('area_req_item');
		$data['view_page'] = $this->config->item('template_public') . "index";
		$data['module'] = 'area_req_item';
		$this->load->view($this->_container,$data);
	}
}