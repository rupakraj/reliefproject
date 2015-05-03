<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class District_vdc_model extends MY_Model
{
    var $fields = '';
	var $joins  = array();

    public function __construct()
    {
    	parent::__construct();

        $this->prefix  = 'tbl_';
        $this->_TABLES = array('DISTRICT_VDCS'=>$this->prefix.'district_vdcs');
		$this->_JOINS  = array(
                            'KEY' => array(
                                        'join_type'  => 'LEFT',
                                        'join_field' => 'join1.id=join2.id',
                                        'select'     => 'field_names',
                                        'alias'      => 'alias_name'
                                    ),
                            );
    }

    public function getDistrictVdcs ($where = NULL, $order_by = NULL, $limit = array('limit' => NULL,'offset' => ''))
    {
        $fields = 'district_vdcs.*';

        if($this->fields != '') {
            $fields = $this->fields;
        }

		foreach ($this->joins as $key) {
			$fields = $fields . ',' . $this->_JOINS[$key]['select'];
		}

        $this->db->select($fields);

        $this->db->from($this->_TABLES['DISTRICT_VDCS'] . ' district_vdcs');

		foreach($this->joins as $key) {
            $this->db->join($this->_TABLES[$key] . ' ' . $this->_JOINS[$key]['alias'], $this->_JOINS[$key]['join_field'], $this->_JOINS[$key]['join_type']);
		}

		(! is_null($where)) ? $this->db->where($where) : NULL;
		(! is_null($order_by)) ? $this->db->order_by($order_by) : NULL;

		if( ! is_null($limit['limit'])) {
			$this->db->limit($limit['limit'], ( isset($limit['offset']) ? $limit['offset'] : '' ));
		}

		return $this->db->get();
    }

    public function count($where = NULL)
    {
        $this->db->from($this->_TABLES['DISTRICT_VDCS'].' district_vdcs');

        foreach($this->joins as $key) {
            $this->db->join($this->_TABLES[$key] . ' ' . $this->_JOINS[$key]['alias'],$this->_JOINS[$key]['join_field'], $this->_JOINS[$key]['join_type']);
        }

       (! is_null($where)) ? $this->db->where($where) : NULL;

        return $this->db->count_all_results();
    }

    public function getDistricts ($where = NULL, $order_by = NULL, $limit = array('limit' => NULL,'offset' => ''))
    {
        $fields = 'district_vdcs.*';

        if($this->fields != '') {
            $fields = $this->fields;
        }

        foreach ($this->joins as $key) {
            $fields = $fields . ',' . $this->_JOINS[$key]['select'];
        }

        $this->db->select($fields);

        $this->db->from($this->_TABLES['DISTRICT_VDCS'] . ' district_vdcs');

        foreach($this->joins as $key) {
            $this->db->join($this->_TABLES[$key] . ' ' . $this->_JOINS[$key]['alias'], $this->_JOINS[$key]['join_field'], $this->_JOINS[$key]['join_type']);
        }

        $this->db->where('hierarchy_name','DISTRICT');

        (! is_null($where)) ? $this->db->where($where) : NULL;
        //(! is_null($order_by)) ? $this->db->order_by($order_by) : NULL;
        $this->db->order_by('name_en','asc');

        if( ! is_null($limit['limit'])) {
            $this->db->limit($limit['limit'], ( isset($limit['offset']) ? $limit['offset'] : '' ));
        }

        return $this->db->get();
    }


    public function getDistrictsVdc ($pid,$where = NULL, $order_by = NULL, $limit = array('limit' => NULL,'offset' => ''))
    {
        $fields = 'district_vdcs.*';

        if($this->fields != '') {
            $fields = $this->fields;
        }

        foreach ($this->joins as $key) {
            $fields = $fields . ',' . $this->_JOINS[$key]['select'];
        }

        $this->db->select($fields);

        $this->db->from($this->_TABLES['DISTRICT_VDCS'] . ' district_vdcs');

        foreach($this->joins as $key) {
            $this->db->join($this->_TABLES[$key] . ' ' . $this->_JOINS[$key]['alias'], $this->_JOINS[$key]['join_field'], $this->_JOINS[$key]['join_type']);
        }

        $this->db->where('hierarchy_name','');
        $this->db->where('parent_location_id',$pid);

        (! is_null($where)) ? $this->db->where($where) : NULL;
        //(! is_null($order_by)) ? $this->db->order_by($order_by) : NULL;
        $this->db->order_by('name_en','asc');

        if( ! is_null($limit['limit'])) {
            $this->db->limit($limit['limit'], ( isset($limit['offset']) ? $limit['offset'] : '' ));
        }

        return $this->db->get();
    }
}