<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Area extends Public_Controller
{
	public function __construct(){
    	parent::__construct();
        $this->load->model('area_sms/area_sms_model');
        $this->lang->load('area_sms/area_sms');
    }

	public function index()
	{
		// Display Page
		$data['header'] = lang('area_sms');
		$data['view_page'] = $this->config->item('template_public') . "index";
		$data['module'] = 'area_sms';
		$this->load->view($this->_container,$data);
	}
}