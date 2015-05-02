<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends REST_Controller
{
	public function __construct()
    {
    	parent::__construct();
        $this->load->model('organization_available_item/organization_available_item_model');
    }

    public function organization_available_item_get()
    {
    	//TODO
    }

    public function organization_available_item_post()
    {
	    //TODO
    }

    public function organization_available_item_delete()
    {
	    //TODO
    }


}