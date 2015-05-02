<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Rsys_Controller
{
	

	public function __construct(){
    	parent::__construct();
        $this->lang->load('schedule/schedule');
    }

	public function index()
	{
		// Display Page
		$data['header'] = lang('schedule');
		$data['page'] = $this->config->item('template_admin') . "index";
		$data['module'] = 'schedule';
		$this->load->view($this->_container,$data);
	}
}