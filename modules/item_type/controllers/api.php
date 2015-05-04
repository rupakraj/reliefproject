<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends REST_Controller
{
	public function __construct()
    {
    	parent::__construct();
        $this->load->model('item_type/item_type_model');
    }

    public function item_type_get()
    {
    	//TODO
    }

    public function item_type_post()
    {
	    //TODO
    }

    public function item_type_delete()
    {
	    //TODO
    }


}