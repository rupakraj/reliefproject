<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Available_item extends Public_Controller
{
	public function __construct(){
    	parent::__construct();
        $this->load->model('available_item/available_item_model');
        $this->lang->load('available_item/available_item');
    }

	public function index()
	{
		// Display Page
		$data['header'] = lang('available_item');
		$data['view_page'] = $this->config->item('template_public') . "index";
		$data['module'] = 'available_item';
		$this->load->view($this->_container,$data);
	}
}