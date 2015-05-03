<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends REST_Controller
{
	public function __construct()
    {
    	parent::__construct();
        $this->load->model('priority/priority_model');
    }

    public function priority_get()
    {
    	//TODO
    }

    public function priority_post()
    {
	    //TODO
    }

    public function priority_delete()
    {
	    //TODO
    }


}