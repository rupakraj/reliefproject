<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Rsys_Controller
{
	

	public function __construct(){
    	parent::__construct();
        $this->load->model('organization/organization_model');
        $this->lang->load('organization/organization');

        $this->lang->load('organization_workarea/organization_workarea');
        $this->lang->load('vehicle/vehicle');
        $this->lang->load('organization_available_item/organization_available_item');
        $this->lang->load('delivered_item/delivered_item');
    }

	public function index()
	{
		// Display Page
		$data['header'] = lang('organization');
		$data['page'] = $this->config->item('template_admin') . "index";
		$data['module'] = 'organization';
		$this->load->view($this->_container,$data);
	}

	public function json()
	{
		//$this->db->where('organizations.delete_flag', 0);
		$this->_get_search_param();
		$total=$this->organization_model->count();
		paging('id');
		//$this->db->where('organizations.delete_flag', 0);
		$this->_get_search_param();
		$rows=$this->organization_model->getOrganizations()->result_array();
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
		$rows=$this->organization_model->getOrganizations()->result_array();
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
				$success=$this->organization_model->update('ORGANIZATIONS',$data,array('id'=>$row));
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
				$success=$this->organization_model->update('ORGANIZATIONS',$data,array('id'=>$row));
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
            $success=$this->organization_model->insert('ORGANIZATIONS',$data);
        }
        else
        {
        	$data['modified_by'] = $this->user_id;
        	$data['modified_date'] = date('Y-m-d H:i:s');
            $success=$this->organization_model->update('ORGANIZATIONS',$data,array('id'=>$data['id']));
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
		$data['organization_name'] = $this->input->post('organization_name');
		$data['specialization'] = $this->input->post('specialization');
		$data['start_date'] = $this->input->post('start_date');
		$data['end_date'] = $this->input->post('end_date');
		$data['total_volunteer'] = $this->input->post('total_volunteer');
		$data['contact_name'] = $this->input->post('contact_name');
		$data['contact_phone'] = $this->input->post('contact_phone');
		$data['contact_email'] = $this->input->post('contact_email');
		$data['country'] = $this->input->post('country');
		$data['created_by'] = $this->input->post('created_by');
		$data['modified_by'] = $this->input->post('modified_by');
		$data['created_date'] = $this->input->post('created_date');
		$data['modified_date'] = $this->input->post('modified_date');
		$data['delete_flag'] = $this->input->post('delete_flag');

        return $data;
   }

    public function detail($id = null)
    {
    	if ($id == null) {
			flashMsg('warning','Invalid Organization ID');
			redirect('admin/organization');
		}

		$this->db->where('organizations.id', $id);
		$organization = $this->organization_model->getOrganizations()->row_array();

        // Display Page
        $data['header'] = lang('organization');
        $data['page'] = $this->config->item('template_admin') . "detail";
        $data['module'] = 'organization';

        $data['organization'] = $organization;


        $this->load->view($this->_container,$data);
    }

}