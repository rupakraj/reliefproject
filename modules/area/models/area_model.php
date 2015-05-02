<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Area_model extends MY_Model
{
    var $fields = '';
	var $joins  = array();

    public function __construct()
    {
    	parent::__construct();

        $this->prefix  = 'tbl_';
        $this->_TABLES = array(
            'AREAS'=>$this->prefix.'areas',
            'DISTRICT'=>$this->prefix.'district_vdcs',
            'ACCESSIBILITIES'=>$this->prefix.'accessibilities',
            'OBSTRUCTIONS'=>$this->prefix.'obstruction_types',
            'AREATYPES'=>$this->prefix.'area_types'
        );
		$this->_JOINS  = array(
                            'DISTRICT' => array(
                                        'join_type'  => 'LEFT',
                                        'join_field' => 'districts.id=areas.district',
                                        'select'     => 'districts.name_en as district_name',
                                        'alias'      => 'districts'
                                    ),
                            'ACCESSIBILITIES' => array(
                                'join_type'  => 'LEFT',
                                'join_field' => 'accessibilities.id=areas.accessibility_id',
                                'select'     => 'accessibilities.name as accessibility_name',
                                'alias'      => 'accessibilities'
                            ),
                            'AREATYPES' => array(
                                'join_type'  => 'LEFT',
                                'join_field' => 'areatypes.id=areas.area_type',
                                'select'     => 'areatypes.name as area_type_name',
                                'alias'      => 'areatypes'
                            ),
                            'OBSTRUCTIONS' => array(
                                'join_type'  => 'LEFT',
                                'join_field' => 'obstructions.id=areas.road_obstruct_detail',
                                'select'     => 'obstructions.name as obstruction_name',
                                'alias'      => 'obstructions'
                            ),
        );
    }

    public function getAreas ($where = NULL, $order_by = NULL, $limit = array('limit' => NULL,'offset' => ''))
    {
        $fields = 'areas.*';

        if($this->fields != '') {
            $fields = $this->fields;
        }

		foreach ($this->joins as $key) {
			$fields = $fields . ',' . $this->_JOINS[$key]['select'];
		}

        $this->db->select($fields);

        $this->db->from($this->_TABLES['AREAS'] . ' areas');

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
        $this->db->from($this->_TABLES['AREAS'].' areas');

        foreach($this->joins as $key) {
            $this->db->join($this->_TABLES[$key] . ' ' . $this->_JOINS[$key]['alias'],$this->_JOINS[$key]['join_field'], $this->_JOINS[$key]['join_type']);
        }

       (! is_null($where)) ? $this->db->where($where) : NULL;

        return $this->db->count_all_results();
    }
}