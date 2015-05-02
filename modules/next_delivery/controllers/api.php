<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends REST_Controller
{
	public function __construct()
    {
    	parent::__construct();
        $this->load->model('next_delivery/next_delivery_model');
    }

    public function next_delivery_get()
    {
    	//TODO
    }

    public function next_delivery_post()
    {
	    //TODO
    }

    public function next_delivery_delete()
    {
	    //TODO
    }


}