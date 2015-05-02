<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends REST_Controller
{
	public function __construct()
    {
    	parent::__construct();
        $this->load->model('delivered_item/delivered_item_model');
    }

    public function delivered_item_get()
    {
    	//TODO
    }

    public function delivered_item_post()
    {
	    //TODO
    }

    public function delivered_item_delete()
    {
	    //TODO
    }


}