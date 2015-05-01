<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends REST_Controller
{
	public function __construct()
    {
    	parent::__construct();
        $this->load->model('accessibility/accessibility_model');
    }

    public function accessibility_get()
    {
    	//TODO
    }

    public function accessibility_post()
    {
	    //TODO
    }

    public function accessibility_delete()
    {
	    //TODO
    }


}