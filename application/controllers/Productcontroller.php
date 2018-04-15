<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productcontroller extends CI_Controller {

    public function __construct() 
    {
	   parent::__construct();
	   $this->load->helper('form');
	   $this->load->helper('url');
	   $this->load->library('session');
	   $this->load->model('productmodel');
	   $this->load->library('form_validation');
	}

	public function activeproducts()
	{
		if ($this->session->userdata('logged_in')==FALSE) 
		{
			$this->login();
		}
		else
		{
			$productdata['product']=$this->productmodel->activeproducts();
			//print_r($productdata['product']); die();

			$this->load->view('header');
			$this->load->view('viewactiveproduct',$productdata);
			$this->load->view('footer');
		}
	}

	public function saleproductdetail()
	{
		$this->load->view('header');
		$this->load->view('saleproductdetail');
		$this->load->view('footer');
	}

	public function addnewsaleproduct()
	{
		$this->load->view('header');
		$this->load->view('addnewsaleproduct');
		$this->load->view('footer');
	}

	public function rejectedproducts()
	{
		if ($this->session->userdata('logged_in')==FALSE) 
		{
			$this->login();
		}
		else
		{
			$productdata['product']=$this->productmodel->rejectedproducts();

			$this->load->view('header');
			$this->load->view('rejectedproducts',$productdata);
			$this->load->view('footer');
		}
	}

	public function inactiveproducts()
	{
		if ($this->session->userdata('logged_in')==FALSE) 
		{
			$this->login();
		}
		else
		{
			$productdata['product']=$this->productmodel->inactiveproducts();

			$this->load->view('header');
			$this->load->view('inactiveproducts',$productdata);
			$this->load->view('footer');
		}
	}

	public function auctionproductdetail()
	{
		$this->load->view('header');
		$this->load->view('auctionproductdetail');
		$this->load->view('footer');
	}

	public function addnewauctionproduct()
	{
		$this->load->view('header');
		$this->load->view('addnewauctionproduct');
		$this->load->view('footer');
	}

	public function newproducts()
	{
		if ($this->session->userdata('logged_in')==FALSE) 
		{
			$this->login();
		}
		else
		{
			$productdata['product']=$this->productmodel->newproducts();

			$this->load->view('header');
			$this->load->view('newproducts',$productdata);
			$this->load->view('footer');
		}
	}

	public function changeproductstatus()
	{
		if ($this->session->userdata('logged_in')==FALSE) 
		{
			$this->login();
		}
		else
		{
			$pid=$this->input->post('id');
			$status=$this->input->post('status');
			$productdata['sellerdata']=$this->productmodel->sellerdata($pid);
			$productdata['product']=$this->productmodel->changeproductstatus($pid,$status);
            $productdata['seller'] =$this->productmodel->seller($productdata['sellerdata'][0]['seller_id']);

			//print_r($productdata['sellerdata']);die();
             $subject="Your product has been";
			if($status==2)
			{
				$subject=$subject." accepted";
			}
			else
			{
				$subject=$subject." rejected";
			}

			$data1=array
			(
			'sender_id'=>'1',
			'sender_type'=>'admin',
			'receiver_type'=> 'seller',
			'receiver_id'=> $productdata['seller'][0]['seller_id'],

			'notification_subject'=>$subject ,
			'notification_text'=>$subject,
			'notification_status'=>'1'
			);

			$this->productmodel->newproductnotify($data1);

			// $this->load->library('email');
			//        $config = Array(
			//     'protocol' => 'smtp',
			//     'smtp_host' => 'ssl://smtp.googlemail.com',
			//     'smtp_port' => 465,
			//     'smtp_user' => 'itspljayesh@gmail.com',
			//     'smtp_pass' => '9662927581',
			//     'mailtype'  => 'html', 
			//     'charset'   => 'iso-8859-1'
			// );

			// $this->email->initialize($config);
			// $this->email->set_mailtype("html");
			// $this->email->set_newline("\r\n");

			// //Email content
			// $htmlContent = '<h1>'.$subject.'</h1>';
			// $htmlContent .= '<p>'.$subject.'</p>';

			// $this->email->to($productdata['seller'][0]['seller_email']);
			// $this->email->from('itspljayesh@gmail.com','MyWebsite');
			// $this->email->subject($subject);
			// $this->email->message($htmlContent);

			// //Send email
			// $this->email->send();

			if ($productdata['product'])
			{
				echo "true";
			}
			else
			{
				echo "false";
			}
		}
	}

	public function productdetail()
	{
		if ($this->session->userdata('logged_in')==FALSE) 
		{
			$this->login();
		}
		else
		{
			$pid=$this->uri->segment(3);
			$productdata['product']=$this->productmodel->productdetail($pid);
            $productdata['seller'] =$this->productmodel->seller($productdata['product'][0]['seller_id']);
            $productdata['category'] =$this->productmodel->category($productdata['product'][0]['product_category_id']);

            if($productdata['product'][0]['product_subcategory_id'] == "other")
            {
            	$productdata['subcategory'][0]['name'] = $productdata['product'][0]['product_subcategory_id'];
            }
            else
            {
	        	$productdata['subcategory'] =$this->productmodel->category($productdata['product'][0]['product_subcategory_id']);
            }
			//print_r($productdata['subcategory']); die();
			
			$this->load->view('header');
			$this->load->view('productdetail',$productdata);
			$this->load->view('footer');
		}
	}

}