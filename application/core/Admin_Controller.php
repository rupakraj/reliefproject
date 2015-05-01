<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * BackendPro
 *
 * A website backend system for developers for PHP 4.3.2 or newer
 *
 * @package         BackendPro
 * @author          Adam Price
 * @copyright       Copyright (c) 2008
 * @license         http://www.gnu.org/licenses/lgpl.html
 * @link            http://www.kaydoo.co.uk/projects/backendpro
 * @filesource
 */

// ---------------------------------------------------------------------------

/**
 * Admin_Controller
 *
 * Extends the MY_Controller class
 * 
 */
class Admin_Controller extends MY_Controller
{
	var $user_id;
	var $group_id;
	var $organization_id;

	function __construct()
	{
		parent::__construct();

		// Set container variable
		$this->_container = $this->config->item('template_admin') . "container.php";

		// Set Pop container variable
		$this->_popup_container = $this->config->item('template_admin') . "popup.php";

		// Make sure user is logged in
		check('Control Panel');
		// Check to see if the install path still exists
		if( is_dir('install'))
		{
			flashMsg('warning',$this->lang->line('backendpro_remove_install'));
		}
		
		$this->user_id = $this->session->userdata('id');
		$this->group_id = $this->session->userdata('group_id');
		$this->organization_id = $this->session->userdata('organization_id');

		$this->load->helper('paging');

		// Set private meta tags
		$this->bep_site->set_metatag('name','content',TRUE);
		$this->bep_site->set_metatag('robots','nofollow, noindex');
		$this->bep_site->set_metatag('pragma','nocache',TRUE);

		// Load the ADMIN asset group
		$this->bep_assets->load_asset_group('ADMIN_CSS');
		$this->bep_assets->load_asset_group('ADMIN_JS');
		$this->bep_assets->load_asset_group('JQWIDGETS');
		$this->bep_assets->load_asset_group('APP');

		
		log_message('debug','BackendPro : Admin_Controller class loaded');
	}
}
/* End of Admin_controller.php */
/* Location: ./application/core/Admin_controller.php */