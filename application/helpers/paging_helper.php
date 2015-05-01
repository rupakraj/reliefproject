<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function paging($default)
{
	$ci=&get_instance();

	$input = $ci->input->get();
	
	$pagenum  = (isset($input['pagenum'])) ? $input['pagenum'] : 0;
	
	$pagesize  = (isset($input['pagesize'])) ? $input['pagesize'] : 10;
	
	$offset = $pagenum * $pagesize;

	$ci->db->limit($pagesize, $offset);
	
}