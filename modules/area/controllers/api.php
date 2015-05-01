<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends REST_Controller
{
	public function __construct()
    {
    	parent::__construct();
        $this->load->model('area/area_model');
    }

    public function area_get()
    {
    	//TODO
    }

    public function area_post()
    {
	    //TODO
    }

    public function area_delete()
    {
	    //TODO
    }


}