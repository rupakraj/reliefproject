<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends REST_Controller
{
	public function __construct()
    {
    	parent::__construct();
        $this->load->model('item/item_model');
    }

    public function item_get()
    {
    	//TODO
    }

    public function item_post()
    {
	    //TODO
    }

    public function item_delete()
    {
	    //TODO
    }


}