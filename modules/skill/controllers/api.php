<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends REST_Controller
{
	public function __construct()
    {
    	parent::__construct();
        $this->load->model('skill/skill_model');
    }

    public function skill_get()
    {
    	//TODO
    }

    public function skill_post()
    {
	    //TODO
    }

    public function skill_delete()
    {
	    //TODO
    }


}