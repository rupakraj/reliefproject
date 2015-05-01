<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends REST_Controller
{
	public function __construct()
    {
    	parent::__construct();
        $this->load->model('organization/organization_model');
    }

    public function organization_get()
    {
    	//TODO
    }

    public function organization_post()
    {
	    //TODO
    }

    public function organization_delete()
    {
	    //TODO
    }


}