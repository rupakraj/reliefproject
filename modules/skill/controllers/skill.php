<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Skill extends Public_Controller
{
	public function __construct(){
    	parent::__construct();
        $this->load->model('skill/skill_model');
        $this->lang->load('skill/skill');
    }

	public function index()
	{
		// Display Page
		$data['header'] = lang('skill');
		$data['view_page'] = $this->config->item('template_public') . "index";
		$data['module'] = 'skill';
		$this->load->view($this->_container,$data);
	}
}