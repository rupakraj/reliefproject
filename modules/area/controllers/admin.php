<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Rsys_Controller
{
	

	public function __construct(){
    	parent::__construct();
        $this->load->model('area/area_model');
        $this->lang->load('area/area');
        //$this->bep_assets->load_asset('jquery.upload'); // uncomment if image ajax upload
    }

	public function index()
	{
		// Display Page
		$data['header'] = lang('area');
		$data['page'] = $this->config->item('template_admin') . "index";
		$data['module'] = 'area';
		$this->load->view($this->_container,$data);
	}

	public function json()
	{
		//$this->db->where('areas.delete_flag', 0);
		$this->_get_search_param();
		$total=$this->area_model->count();
		paging('id');
		//$this->db->where('areas.delete_flag', 0);
		$this->_get_search_param();
		$rows=$this->area_model->getAreas()->result_array();
		echo json_encode(array('total'=>$total,'rows'=>$rows));
	}

	public function _get_search_param()
	{
		$input = $this->input->get();

		//sorting
		if (isset($input['sortdatafield'])) {
			$sortdatafield = $input['sortdatafield'];

			$sortorder = (isset($input['sortorder'])) ? $input['sortorder'] :'asc';
			$this->db->order_by($sortdatafield, $sortorder); 
		} else {
			$this->db->order_by("id", "desc"); 
		}

		if (isset($input['filterscount'])) {
			$filtersCount = $input['filterscount'];
			if ($filtersCount > 0) {
				for ($i=0; $i < $filtersCount; $i++) {
					// get the filter's column.
					$filterDatafield 	= $input['filterdatafield' . $i];

					// get the filter's value.
					$filterValue 		=  $input['filtervalue' 	. $i];

					// get the filter's condition.
					$filterCondition 	= $input['filtercondition' . $i];

					// get the filter's operator.
					$filterOperator 	= $input['filteroperator' 	. $i];

					$operatorLike = 'LIKE';

					if ($filterValue == 'true') 
						$filterValue = 1;
					elseif ($filterValue == 'false')
						$filterValue = 0;

					switch($filterCondition) {
						case "CONTAINS":
						$this->db->like($filterDatafield, $filterValue);
						break;
						case "DOES_NOT_CONTAIN":
						$this->db->not_like($filterDatafield, $filterValue);
						break;
						case "EQUAL":
						$this->db->where($filterDatafield, $filterValue);
						break;
						case "GREATER_THAN":
						$this->db->where($filterDatafield . ' >', $filterValue);
						break;
						case "LESS_THAN":
						$this->db->where($filterDatafield . ' <', $filterValue);
						break;
						case "GREATER_THAN_OR_EQUAL":
						$this->db->where($filterDatafield . ' >=', $filterValue);
						break;
						case "LESS_THAN_OR_EQUAL":
						$this->db->where($filterDatafield . ' <=', $filterValue);
						break;
						case "STARTS_WITH":
						$this->db->like($filterDatafield, $filterValue, 'after'); 
						break;
						case "ENDS_WITH":
						$this->db->like($filterDatafield, $filterValue, 'before'); 
						break;
					}
				}
			}
		}
	}

	
	private function _datewise($field,$from,$to)
	{
			if(!empty($from) && !empty($to))
			{
				$this->db->where("(date_format(".$field.",'%Y-%m-%d') between '".date('Y-m-d',strtotime($from)).
						"' and '".date('Y-m-d',strtotime($to))."')");
			}
			else if(!empty($from))
			{
				$this->db->like($field,date('Y-m-d',strtotime($from)));				
			}		
	}

	public function combo_json()
    {
		$rows=$this->area_model->getAreas()->result_array();
		echo json_encode($rows);
    }

	public function delete_json()
	{
    	$id=$this->input->post('id');
		if($id && is_array($id))
		{
        	foreach($id as $row):
        		$data = array();
        		$data['delete_flag'] = 1;
        		$data['modified_by'] = $this->user_id;
        		$data['modified_date'] = date('Y-m-d H:i:s');
				$success=$this->area_model->update('AREAS',$data,array('id'=>$row));
            endforeach;
		}
	}

	public function restore_json()
	{
    	$id=$this->input->post('id');
		if($id && is_array($id))
		{
        	foreach($id as $row):
        		$data = array();
        		$data['delete_flag'] = 0;
        		$data['modified_by'] = $this->user_id;
        		$data['modified_date'] = date('Y-m-d H:i:s');
				$success=$this->area_model->update('AREAS',$data,array('id'=>$row));
            endforeach;
		}
	}

	public function save()
	{

        $data=$this->_get_posted_data(); //Retrive Posted Data

        if(!$this->input->post('id'))
        {
        	$data['created_by'] = $data['modified_by'] = $this->user_id;
        	$data['created_date'] = $data['modified_date'] = date('Y-m-d H:i:s');
            $success=$this->area_model->insert('AREAS',$data);
        }
        else
        {
        	$data['modified_by'] = $this->user_id;
        	$data['modified_date'] = date('Y-m-d H:i:s');
            $success=$this->area_model->update('AREAS',$data,array('id'=>$data['id']));
        }

		if($success)
		{
			$success = TRUE;
			$msg=lang('success_message');
		}
		else
		{
			$success = FALSE;
			$msg=lang('failure_message');
		}

		 echo json_encode(array('msg'=>$msg,'success'=>$success));

	}

   private function _get_posted_data()
   {
   		$data=array();
        $data['id'] = $this->input->post('id');
$data['code'] = $this->input->post('code');
$data['name'] = $this->input->post('name');
$data['district'] = $this->input->post('district');
$data['ward'] = $this->input->post('ward');
$data['address'] = $this->input->post('address');
$data['location_category'] = $this->input->post('location_category');
$data['population_male'] = $this->input->post('population_male');
$data['population_female'] = $this->input->post('population_female');
$data['population_children'] = $this->input->post('population_children');
$data['population_adult'] = $this->input->post('population_adult');
$data['population_old'] = $this->input->post('population_old');
$data['household'] = $this->input->post('household');
$data['houses'] = $this->input->post('houses');
$data['schools'] = $this->input->post('schools');
$data['effected_male'] = $this->input->post('effected_male');
$data['effected_female'] = $this->input->post('effected_female');
$data['effected_children'] = $this->input->post('effected_children');
$data['effected_adult'] = $this->input->post('effected_adult');
$data['effected_old'] = $this->input->post('effected_old');
$data['effected_household'] = $this->input->post('effected_household');
$data['houses_collapsed'] = $this->input->post('houses_collapsed');
$data['houses_damaged'] = $this->input->post('houses_damaged');
$data['houses_cracked'] = $this->input->post('houses_cracked');
$data['death'] = $this->input->post('death');
$data['trapped'] = $this->input->post('trapped');
$data['sick'] = $this->input->post('sick');
$data['accessibility_id'] = $this->input->post('accessibility_id');
$data['distance_ktm'] = $this->input->post('distance_ktm');
$data['area_type'] = $this->input->post('area_type');
$data['road_obstructed'] = $this->input->post('road_obstructed');
$data['road_obstruct_detail'] = $this->input->post('road_obstruct_detail');
$data['created_by'] = $this->input->post('created_by');
$data['modified_by'] = $this->input->post('modified_by');
$data['created_date'] = $this->input->post('created_date');
$data['modified_date'] = $this->input->post('modified_date');
$data['reported_date'] = $this->input->post('reported_date');
$data['first_followup'] = $this->input->post('first_followup');
$data['priority'] = $this->input->post('priority');
$data['contact_detail'] = $this->input->post('contact_detail');
$data['internal_contact'] = $this->input->post('internal_contact');
$data['security_contact'] = $this->input->post('security_contact');
$data['nearest_hospital_distance'] = $this->input->post('nearest_hospital_distance');
$data['nearest_hospital_name'] = $this->input->post('nearest_hospital_name');
$data['nearest_hospital_contact'] = $this->input->post('nearest_hospital_contact');
$data['longitude'] = $this->input->post('longitude');
$data['latitude'] = $this->input->post('latitude');
$data['delete_flag'] = $this->input->post('delete_flag');

        return $data;
   }

    public function detail($id = null)
    {
        // Display Page
        $data['header'] = lang('area');
        $data['page'] = $this->config->item('template_admin') . "detail";
        $data['module'] = 'area';

        $this->area_model->joins = array('DISTRICT','ACCESSIBILITIES','AREATYPES','OBSTRUCTIONS');
        $data['area'] = $this->area_model->getAreas(array('areas.id' => (int) $id), null, 1)->row();

        if(empty($data['area'])) {
            $this->load->helper('url');
            redirect(site_url('admin/area'));
        }
        $this->load->view($this->_container,$data);
    }

   

}