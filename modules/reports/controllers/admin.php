<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Rsys_Controller
{
	

	public function __construct(){
		parent::__construct();
        //$this->load->model('reports/reports');
        //$this->lang->load('reports/reports');
        //$this->bep_assets->load_asset('jquery.upload'); // uncomment if image ajax upload

		$this->load->model('area/area_model');
		$this->lang->load('area/area');
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

	public function vdc()
	{
		// Display Page
		$this->bep_assets->load_asset_group('LEAFLET');
		$data['header'] = "VDC Wise Map";
		$data['page'] = $this->config->item('template_admin') . "vdc";
		$data['module'] = 'reports';
		// $this->load->database();
		// select * from vw_vdc_mun_boundary where district_name_en='Kathmandu';
		$query = $this->db->query("select name_np, district_name_np, boundary_coordinate from vw_vdc_mun_boundary where district_name_en='Kathmandu';");
		$data['coordinate'] = $query->result_array();

		$this->load->view($this->_container,$data);	
	}


	public function gismarker()
	{
		// Display Page
		$this->bep_assets->load_asset_group('LEAFLET');
		$data['header'] = "GIS";
		$data['page'] = $this->config->item('template_admin') . "gismarker";
		$data['module'] = 'reports';
		$this->load->view($this->_container,$data);	
	}

	public function table_report(){
		
		// $data=$this->_get_posted_data(); //Retrive Posted Data

		$data['values'] = json_encode($this->db->where('name',$this->input->post('district'))->get('tbl_areas')->result_array()); 

		echo $this->load->view('reports/admin/table-report',$data,FALSE);
	}


	private function _get_posted_data()
	{
		$data=array();
		$data['district'] = $this->input->post('district');
		$data['vdc_mun'] = $this->input->post('vdc_mun');
		$data['ward'] = $this->input->post('ward');
		$data['effected'] = $this->input->post('effected');
		$data['damage'] = $this->input->post('damage');
		$data['collapsed'] = $this->input->post('collapsed');
		$data['accesibility'] = $this->input->post('accesibility');
		$data['area_type'] = $this->input->post('area_type');
		$data['priority'] = $this->input->post('priority');
		$data['obstruction_type'] = $this->input->post('obstruction_type');
		$data['food'] = $this->input->post('food');
		$data['medicine'] = $this->input->post('medicine');

		return $data;
	}

}