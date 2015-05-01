<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends Admin_Controller
{
	function __construct()
	{
		parent::__construct();

		check('Product');
	}

	function index()
	{
		$data['check'] = check('Product', 'index', false);
		$data['query'] =  $this->db->last_query();
		
		// Display Page
		$data['header'] = 'INDEX';
		$data['page'] = $this->config->item('template_admin') . "product/index";
		$data['module'] = 'catalog';
		$this->load->view($this->_container,$data);
	}
	
	function read()
	{
		$data['check'] = check('Product', 'read', false);
		$data['query'] =  $this->db->last_query();

		// Display Page
		$data['header'] = 'READ';
		$data['page'] = $this->config->item('template_admin') . "product/read";
		$data['module'] = 'catalog';
		$this->load->view($this->_container,$data);
	}

}
/* End of file users.php */
/* Location: ./modules/catalog/controllers/admin/product.php */