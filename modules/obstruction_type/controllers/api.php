<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends REST_Controller
{
	public function __construct()
    {
    	parent::__construct();
        $this->load->model('obstruction_type/obstruction_type_model');
    }

    public function obstruction_type_get()
    {
    	//TODO
    }

    public function obstruction_type_post()
    {
	    //TODO
    }

    public function obstruction_type_delete()
    {
	    //TODO
    }


}