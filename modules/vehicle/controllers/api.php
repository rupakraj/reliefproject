<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends REST_Controller
{
	public function __construct()
    {
    	parent::__construct();
        $this->load->model('vehicle/vehicle_model');
    }

    public function vehicle_get()
    {
    	//TODO
    }

    public function vehicle_post()
    {
	    //TODO
    }

    public function vehicle_delete()
    {
	    //TODO
    }


}