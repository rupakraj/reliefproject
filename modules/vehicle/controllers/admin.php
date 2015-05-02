<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Rsys_Controller
{
	

	public function __construct(){
    	parent::__construct();
        $this->load->model('vehicle/vehicle_model');
        $this->lang->load('vehicle/vehicle');
        //$this->bep_assets->load_asset('jquery.upload'); // uncomment if image ajax upload
    }

	public function index()
	{
		// Display Page
		$data['header'] = lang('vehicle');
		$data['page'] = $this->config->item('template_admin') . "index";
		$data['module'] = 'vehicle';
		$this->load->view($this->_container,$data);
	}

	public function json()
	{
		//$this->db->where('vehicles.delete_flag', 0);
		$this->_get_search_param();
		$total=$this->vehicle_model->count();
		paging('id');
		//$this->db->where('vehicles.delete_flag', 0);
		$this->_get_search_param();
		$rows=$this->vehicle_model->getVehicles()->result_array();
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
    	if($this->input->get('organization_id')) {
    		$this->db->where('organization_id', $this->input->get('organization_id'));
    	}

    	$this->db->where('delete_flag', 0);
		$rows=$this->vehicle_model->getVehicles()->result_array();
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
				$success=$this->vehicle_model->update('VEHICLES',$data,array('id'=>$row));
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
				$success=$this->vehicle_model->update('VEHICLES',$data,array('id'=>$row));
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
            $success=$this->vehicle_model->insert('VEHICLES',$data);
        }
        else
        {
        	$data['modified_by'] = $this->user_id;
        	$data['modified_date'] = date('Y-m-d H:i:s');
            $success=$this->vehicle_model->update('VEHICLES',$data,array('id'=>$data['id']));
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
$data['organization_id'] = $this->input->post('organization_id');
$data['registration_number'] = $this->input->post('registration_number');
$data['capacity'] = $this->input->post('capacity');
$data['distance_coverage'] = $this->input->post('distance_coverage');
$data['vehicle_type_id'] = $this->input->post('vehicle_type_id');
$data['current_location'] = $this->input->post('current_location');
$data['delete_flag'] = $this->input->post('delete_flag');
$data['created_by'] = $this->input->post('created_by');
$data['modified_by'] = $this->input->post('modified_by');
$data['created_date'] = $this->input->post('created_date');
$data['modified_date'] = $this->input->post('modified_date');

        return $data;
   }

   

}