<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends REST_Controller
{
	public function __construct()
    {
    	parent::__construct();
        $this->load->model('organization_interestarea/organization_interestarea_model');
    }

    public function organization_interestarea_get()
    {
    	//TODO
    }

    public function organization_interestarea_post()
    {
	    //TODO
    }

    public function organization_interestarea_delete()
    {
	    //TODO
    }


}