<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorycontroller extends CI_Controller {

    public function __construct() 
    {
	   parent::__construct();
	   $this->load->helper('form');
	   $this->load->helper('url');
	   $this->load->library('session');
	   // $this->load->model('sellermodel');
	   // $this->load->model('buyermodel');
	   $this->load->library('form_validation');
	}

	public function viewcategory()
	{
		$this->load->view('header');
		$this->load->view('viewcategory');
		$this->load->view('footer');
	}

	public function categorydetail()
	{
		$this->load->view('header');
		$this->load->view('categorydetail');
		$this->load->view('footer');
	}

	public function addcategory()
	{
		$this->load->view('header');
		$this->load->view('addcategory');
		$this->load->view('footer');
	}

}