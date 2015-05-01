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
 * Public_Controller
 *
 * Extends the MY_Controller class
 * 
 */

class Public_Controller extends MY_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->add_package_path('themes/'.config_item('theme'));
		$this->load->helper(array('text','theme'));

		// Set container variable
		$this->_container = "container.php";

		// Set public meta tags
		$this->bep_site->set_metatag('meta_keywords',$this->preference->item('meta_keywords'));
		$this->bep_site->set_metatag('meta_description',$this->preference->item('meta_description'));
		
		if(!$this->preference->item('site_status'))
		{
			echo $this->preference->item('offline_message');
			exit;
		}

		// Load the PUBLIC asset group
		//$this->bep_assets->load_asset_group('PUBLIC');
		log_message('debug','BackendPro : Public_Controller class loaded');	
	}
}
/* End of Public_controller.php */
/* Location: ./application/core/Public_controller.php */