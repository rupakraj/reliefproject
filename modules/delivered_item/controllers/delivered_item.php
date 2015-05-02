<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Delivered_item extends Public_Controller
{
	public function __construct(){
    	parent::__construct();
        $this->load->model('delivered_item/delivered_item_model');
        $this->lang->load('delivered_item/delivered_item');
    }

	public function index()
	{
		// Display Page
		$data['header'] = lang('delivered_item');
		$data['view_page'] = $this->config->item('template_public') . "index";
		$data['module'] = 'delivered_item';
		$this->load->view($this->_container,$data);
	}
}