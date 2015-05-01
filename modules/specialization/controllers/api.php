<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends REST_Controller
{
	public function __construct()
    {
    	parent::__construct();
        $this->load->model('specialization/specialization_model');
    }

    public function specialization_get()
    {
    	//TODO
    }

    public function specialization_post()
    {
	    //TODO
    }

    public function specialization_delete()
    {
	    //TODO
    }


}