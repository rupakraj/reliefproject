<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Accessibility extends Public_Controller
{
	public function __construct(){
    	parent::__construct();
        $this->load->model('accessibility/accessibility_model');
        $this->lang->load('accessibility/accessibility');
    }

	public function index()
	{
		// Display Page
		$data['header'] = lang('accessibility');
		$data['view_page'] = $this->config->item('template_public') . "index";
		$data['module'] = 'accessibility';
		$this->load->view($this->_container,$data);
	}
}