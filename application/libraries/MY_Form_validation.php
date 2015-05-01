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
 * MY_Form_validation Library
 * 
 * Extends the CI_Form_validation class
 */

class MY_Form_validation extends CI_Form_validation
{
	function valid_captcha()
	{
		// Make sure the captcha library is loaded
		$this->CI->load->module_library('recaptcha','Recaptcha');

		// Set the error message
		$this->CI->form_validation->set_message('valid_captcha', $this->CI->lang->line('userlib_validation_captcha'));


		// Perform check
		$this->CI->recaptcha->recaptcha_check_answer($this->CI->input->server('REMOTE_ADDR'), $this->CI->input->post('recaptcha_challenge_field'), $this->CI->input->post('recaptcha_response_field'));
		return $this->CI->recaptcha->is_valid;
	}	
}
/* End of file MY_Form_validation.php */
/* Location: ./application/libraries/MY_Form_validation.php */