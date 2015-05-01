{PHP_TAG} if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Rsys_Controller
{
	{UPLOAD_PATH}

	public function __construct(){
    	parent::__construct();
        $this->load->model('{MODULE}/{MODEL}');
        $this->lang->load('{MODULE}/{LANG}');
        //$this->bep_assets->load_asset('jquery.upload'); // uncomment if image ajax upload
    }

	public function index()
	{
		// Display Page
		$data['header'] = lang('{MODULE}');
		$data['page'] = $this->config->item('template_admin') . "index";
		$data['module'] = '{MODULE}';
		$this->load->view($this->_container,$data);
	}

	public function json()
	{
		//$this->db->where('{TABLE_ALIAS}.delete_flag', 0);
		$this->_get_search_param();
		$total=$this->{MODEL}->count();
		paging('{PRIMARY_KEY}');
		//$this->db->where('{TABLE_ALIAS}.delete_flag', 0);
		$this->_get_search_param();
		$rows=$this->{MODEL}->get{TABLE_NAME}()->result_array();
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

	{DATEWISE_FUNCTION}

	public function combo_json()
    {
		$rows=$this->{MODEL}->get{TABLE_NAME}()->result_array();
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
				$success=$this->{MODEL}->update('{TABLE_KEY}',$data,array('id'=>$row));
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
				$success=$this->{MODEL}->update('{TABLE_KEY}',$data,array('id'=>$row));
            endforeach;
		}
	}

	public function save()
	{

        $data=$this->_get_posted_data(); //Retrive Posted Data

        if(!$this->input->post('{PRIMARY_KEY}'))
        {
        	$data['created_by'] = $data['modified_by'] = $this->user_id;
        	$data['created_date'] = $data['modified_date'] = date('Y-m-d H:i:s');
            $success=$this->{MODEL}->insert('{TABLE_KEY}',$data);
        }
        else
        {
        	$data['modified_by'] = $this->user_id;
        	$data['modified_date'] = date('Y-m-d H:i:s');
            $success=$this->{MODEL}->update('{TABLE_KEY}',$data,array('{PRIMARY_KEY}'=>$data['{PRIMARY_KEY}']));
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
        {POSTED_DATA}
        return $data;
   }

   {UPLOAD_FUNCTION}

}