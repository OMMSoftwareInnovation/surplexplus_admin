<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salecontroller extends CI_Controller {

    public function __construct() 
    {
	   parent::__construct();
	   $this->load->helper('form');
	   $this->load->helper('url');
	   $this->load->library('session');
	   $this->load->model('salemodel');
	   // $this->load->model('buyermodel');
	   $this->load->library('form_validation');
	}

	public function viewsale()
	{
		if (isset($this->session->userdata['logged_in'])) 
		{
			$saledata['sale']=$this->salemodel->viewsale();
			//print_r($saledata['sale']);
			$this->load->view('header');
			$this->load->view('viewsale',$saledata);
			$this->load->view('footer');
	    }
		else
		{
			$this->load->view('login');
		}
	}

	public function saledetail()
	{
		$this->load->view('header');
		$this->load->view('saledetail');
		$this->load->view('footer');
	}

}