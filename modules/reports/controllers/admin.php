<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Rsys_Controller
{
	

	public function __construct(){
    	parent::__construct();
        //$this->load->model('reports/reports');
        //$this->lang->load('reports/reports');
        //$this->bep_assets->load_asset('jquery.upload'); // uncomment if image ajax upload
    }

	public function index()
	{
		// Display Page
		$data['header'] = "Table";
		$data['page'] = $this->config->item('template_admin') . "index";
		$data['module'] = 'reports';
		$this->load->view($this->_container,$data);
	}

	public function gis()
	{
		// Display Page
		$this->bep_assets->load_asset_group('LEAFLET');
		$data['header'] = "GIS";
		$data['page'] = $this->config->item('template_admin') . "gis";
		$data['module'] = 'reports';
		$this->load->view($this->_container,$data);	
	}

}