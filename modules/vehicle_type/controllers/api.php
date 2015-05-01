<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends REST_Controller
{
	public function __construct()
    {
    	parent::__construct();
        $this->load->model('vehicle_type/vehicle_type_model');
    }

    public function vehicle_type_get()
    {
    	//TODO
    }

    public function vehicle_type_post()
    {
	    //TODO
    }

    public function vehicle_type_delete()
    {
	    //TODO
    }


}