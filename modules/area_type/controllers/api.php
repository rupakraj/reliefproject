<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends REST_Controller
{
	public function __construct()
    {
    	parent::__construct();
        $this->load->model('area_type/area_type_model');
    }

    public function area_type_get()
    {
    	//TODO
    }

    public function area_type_post()
    {
	    //TODO
    }

    public function area_type_delete()
    {
	    //TODO
    }


}