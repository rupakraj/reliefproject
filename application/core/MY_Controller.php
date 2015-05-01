<?php defined('BASEPATH') OR exit('No direct script access allowed');
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
 * MY_Controller
 *
 * Extends the MX_Controller class
 * 
 */

/* load the MX_Controller class */
require APPPATH."libraries/MX/Controller.php";

class MY_Controller extends MX_Controller
{
	var $_container;

	/**
	 * Load and set data for some common used libraries.
	 */
	public function __construct()
	{
		// Load Base CodeIgniter files
		$this->load->helper(array('html','language'));
		// Load Base BackendPro files
		$this->load->config('settings');
		$this->lang->load('backendpro');
		$this->lang->load('rfsys');
		//$this->load->model('base_model');

		// Load site wide modules
		$this->load->library('status/status');
		$this->load->model('preferences/preference_model', 'preference');
		$this->load->library('site/bep_site');
		$this->load->library('site/bep_assets');
		
		$this->load->library('auth/userlib');

		// Display page debug messages if needed
		if ($this->preference->item('page_debug'))
		{
			$this->output->enable_profiler(TRUE);
		}

		// Set site meta tags
		$this->output->set_header('Content-Type: text/html; charset='.config_item('charset'));
		$this->bep_site->set_metatag('content-type','text/html; charset='.config_item('charset'),TRUE);
		$this->bep_site->set_metatag('robots','all');
		$this->bep_site->set_metatag('pragma','cache',TRUE);

		// Load the SITE asset group
		$this->bep_assets->load_asset_group('SITE');

		//set timezone
		$date_default_timezone = $this->preference->item('date_default_timezone');
		if($date_default_timezone != null && $date_default_timezone != '') {
			date_default_timezone_set($date_default_timezone);
		}

		log_message('debug','BackendPro : Site_Controller class loaded');
	}
}

include_once("Admin_Controller.php");
include_once("Public_Controller.php");
include_once("Member_Controller.php");

/* End of MY_controller.php */
/* Location: ./application/core/MY_controller.php */