<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends REST_Controller
{
	public function __construct()
    {
    	parent::__construct();
        $this->load->model('district_vdc/district_vdc_model');
    }

    public function district_vdc_get()
    {
    	//TODO
    }

    public function district_vdc_post()
    {
	    //TODO
    }

    public function district_vdc_delete()
    {
	    //TODO
    }


}