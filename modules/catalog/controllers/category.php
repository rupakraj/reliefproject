<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends Public_Controller
{
	function __construct()
	{
		parent::__construct();

		check('Category');
	}

	function index()
	{
		$data['check'] = check('Category', 'index', false);
		$data['query'] =  $this->db->last_query();

		// Display Page
		$data['header'] = 'INDEX';
		$data['view_page'] = $this->config->item('template_public') . "category/index";
		$data['module'] = 'catalog';
		$this->load->view($this->_container,$data);
	}
	
	function read()
	{
		$data['check'] = check('Category', 'read', false);
		$data['query'] =  $this->db->last_query();

		// Display Page
		$data['header'] = 'READ';
		$data['page'] = $this->config->item('template_public') . "category/read";
		$data['module'] = 'catalog';
		$this->load->view($this->_container,$data);
	}

}
/* End of file users.php */
/* Location: ./modules/catalog/controllers/admin/category.php */