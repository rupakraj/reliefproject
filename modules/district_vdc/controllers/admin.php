<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Rsys_Controller
{
	

	public function __construct(){
    	parent::__construct();
        $this->load->model('district_vdc/district_vdc_model');
        $this->lang->load('district_vdc/district_vdc');
        //$this->bep_assets->load_asset('jquery.upload'); // uncomment if image ajax upload
    }

	public function index()
	{
		// Display Page
		$data['header'] = lang('district_vdc');
		$data['page'] = $this->config->item('template_admin') . "index";
		$data['module'] = 'district_vdc';
		$this->load->view($this->_container,$data);
	}

	public function json()
	{
		//$this->db->where('district_vdcs.delete_flag', 0);
		$this->_get_search_param();
		$total=$this->district_vdc_model->count();
		paging('id');
		//$this->db->where('district_vdcs.delete_flag', 0);
		$this->_get_search_param();
		$rows=$this->district_vdc_model->getDistrictVdcs()->result_array();
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
		$rows=$this->district_vdc_model->getDistrictVdcs()->result_array();
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
				$success=$this->district_vdc_model->update('DISTRICT_VDCS',$data,array('id'=>$row));
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
				$success=$this->district_vdc_model->update('DISTRICT_VDCS',$data,array('id'=>$row));
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
            $success=$this->district_vdc_model->insert('DISTRICT_VDCS',$data);
        }
        else
        {
        	$data['modified_by'] = $this->user_id;
        	$data['modified_date'] = date('Y-m-d H:i:s');
            $success=$this->district_vdc_model->update('DISTRICT_VDCS',$data,array('id'=>$data['id']));
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
$data['name_en'] = $this->input->post('name_en');
$data['name_np'] = $this->input->post('name_np');
$data['parent_location_id'] = $this->input->post('parent_location_id');
$data['hierarchy_level'] = $this->input->post('hierarchy_level');
$data['location_type'] = $this->input->post('location_type');
$data['hierarchy_name'] = $this->input->post('hierarchy_name');
$data['display_order'] = $this->input->post('display_order');
$data['created_by'] = $this->input->post('created_by');
$data['modified_by'] = $this->input->post('modified_by');
$data['created_date'] = $this->input->post('created_date');
$data['modified_date'] = $this->input->post('modified_date');
$data['delete_flag'] = $this->input->post('delete_flag');

        return $data;
   }

    public function check_duplicate() {
    	$field = $this->input->post('field');
    	$value = $this->input->post('value');
    	$this->db->where($field, $value);

    	if ($this->input->post('id')) {
    		$this->db->where('id <>', $this->input->post('id'));
    	}

    	$total=$this->district_vdc_model->count();

    	if ($total == 0) 
    		echo json_encode(array('success' => true));
    	else
    		echo json_encode(array('success' => false));
    }
   

}