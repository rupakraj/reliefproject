<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Rsys_Controller
{
	

	public function __construct(){
    	parent::__construct();
        
    }

	public function index()
	{
		$this->bep_assets->load_asset_group('LEAFLET');
		// Display Page
		$data['header'] = lang('item');
		$data['page'] = $this->config->item('template_admin') . "index";
		$data['module'] = 'map';
		$this->load->view($data['page']);
	}
}