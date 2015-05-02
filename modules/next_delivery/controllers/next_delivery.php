<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Next_delivery extends Public_Controller
{
	public function __construct(){
    	parent::__construct();
        $this->load->model('next_delivery/next_delivery_model');
        $this->lang->load('next_delivery/next_delivery');
    }

	public function index()
	{
		// Display Page
		$data['header'] = lang('next_delivery');
		$data['view_page'] = $this->config->item('template_public') . "index";
		$data['module'] = 'next_delivery';
		$this->load->view($this->_container,$data);
	}
}