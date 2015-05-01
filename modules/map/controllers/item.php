<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Item extends Public_Controller
{
	public function __construct(){
    	parent::__construct();
        $this->load->model('item/item_model');
        $this->lang->load('item/item');
    }

	public function index()
	{
		// Display Page
		$data['header'] = lang('item');
		$data['view_page'] = $this->config->item('template_public') . "index";
		$data['module'] = 'item';
		$this->load->view($this->_container,$data);
	}
}