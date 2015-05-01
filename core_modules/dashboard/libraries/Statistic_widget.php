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
 * Statistic_widget Class
 *
 * This class contains the code to create the statistic widget.
 */
class Statistic_widget
{
	function __construct()
	{
		$this->CI =& get_instance();

		$this->CI->load->model('auth/user_model');

	}

	function create()
	{
		$data = array();

		// Get total number of users
		$query = $this->CI->user_model->getUsers();
		$data['total_users'] = $query->num_rows();

		// Get total number of unactivated users
		$query = $this->CI->user_model->getUsers(array('users.active'=>'0'));
		$data['total_unactivated_users'] = $query->num_rows();

		$data['user_registration'] = ($this->CI->preference->item('allow_user_registration')) ? '<font color="green">'.$this->CI->lang->line('dashboard_statistics_online').'</font>' : '<font color="red">'.$this->CI->lang->line('dashboard_statistics_offline').'</font>';

		return $this->CI->load->view('dashboard/'.$this->CI->config->item('template_admin') . 'dashboard/statistics',$data,TRUE);
	}
}

/* End of file Statistic_Widget.php */
/* Location: ./core_modules/dashboard/libraries/Statistic_Widget.php */