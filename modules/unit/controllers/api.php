<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends REST_Controller
{
	public function __construct()
    {
    	parent::__construct();
        $this->load->model('unit/unit_model');
    }

    public function unit_get()
    {
    	//TODO
    }

    public function unit_post()
    {
	    //TODO
    }

    public function unit_delete()
    {
	    //TODO
    }


}