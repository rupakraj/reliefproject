<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends REST_Controller
{
	public function __construct()
    {
    	parent::__construct();
        $this->load->model('organization_workarea/organization_workarea_model');
    }

    public function organization_workarea_get()
    {
    	//TODO
    }

    public function organization_workarea_post()
    {
	    //TODO
    }

    public function organization_workarea_delete()
    {
	    //TODO
    }


}