<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends REST_Controller
{
	public function __construct()
    {
    	parent::__construct();
        $this->load->model('volunteer/volunteer_model');
    }

    public function volunteer_get()
    {
    	//TODO
    }

    public function volunteer_post()
    {
	    //TODO
    }

    public function volunteer_delete()
    {
	    //TODO
    }


}