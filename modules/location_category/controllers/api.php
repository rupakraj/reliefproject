<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends REST_Controller
{
	public function __construct()
    {
    	parent::__construct();
        $this->load->model('location_category/location_category_model');
    }

    public function location_category_get()
    {
    	//TODO
    }

    public function location_category_post()
    {
	    //TODO
    }

    public function location_category_delete()
    {
	    //TODO
    }


}