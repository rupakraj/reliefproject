<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class District_vdc extends Public_Controller
{
	public function __construct(){
    	parent::__construct();
        $this->load->model('district_vdc/district_vdc_model');
        $this->lang->load('district_vdc/district_vdc');
    }

	public function index()
	{
		// Display Page
		$data['header'] = lang('district_vdc');
		$data['view_page'] = $this->config->item('template_public') . "index";
		$data['module'] = 'district_vdc';
		$this->load->view($this->_container,$data);
	}
}