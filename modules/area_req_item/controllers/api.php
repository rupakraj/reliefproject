<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends REST_Controller
{
	public function __construct()
    {
    	parent::__construct();
        $this->load->model('area_req_item/area_req_item_model');
    }

    public function area_req_item_get()
    {
    	//TODO
    }

    public function area_req_item_post()
    {
	    //TODO
    }

    public function area_req_item_delete()
    {
	    //TODO
    }


}