<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Item_type extends Public_Controller
{
	public function __construct(){
    	parent::__construct();
        $this->load->model('item_type/item_type_model');
        $this->lang->load('item_type/item_type');
    }

	public function index()
	{
		// Display Page
		$data['header'] = lang('item_type');
		$data['view_page'] = $this->config->item('template_public') . "index";
		$data['module'] = 'item_type';
		$this->load->view($this->_container,$data);
	}
}