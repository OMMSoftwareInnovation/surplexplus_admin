<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auctioncontroller extends CI_Controller {

    public function __construct() 
    {
	   parent::__construct();
	   $this->load->helper('form');
	   $this->load->helper('url');
	   $this->load->library('session');
	   // $this->load->model('sellermodel');
	   $this->load->model('auctionmodel');
	   $this->load->library('form_validation');
	}

	public function login()
	{
		$this->load->view('login');
	}

	public function viewpendingauction()
	{
		if ($this->session->userdata('logged_in')==FALSE) 
		{
			$this->login();
		}
		else
		{
			$auctions['auctions']=$this->auctionmodel->viewpendingauction();
			//print_r($auctions['auctions']); die();

			$this->load->view('header');
			$this->load->view('viewpendingauction',$auctions);
			$this->load->view('footer');
		}
	}

	public function viewactiveauction()
	{
		if ($this->session->userdata('logged_in')==FALSE) 
		{
			$this->login();
		}
		else
		{
			$auctions['auctions']=$this->auctionmodel->activeauctions();
			//print_r($auctions['auctions']); die();

			$this->load->view('header');
			$this->load->view('viewactiveauction',$auctions);
			$this->load->view('footer');
		}
	}

	public function viewliveauction()
	{
		if ($this->session->userdata('logged_in')==FALSE) 
		{
			$this->login();
		}
		else
		{
			$auctions['auctions']=$this->auctionmodel->liveauctions();
            $auctions['nm'] = "Live";
			//print_r($auctions['auctions']); die();

			$this->load->view('header');
			$this->load->view('viewliveauction',$auctions);
			$this->load->view('footer');
		}
	}

	public function viewrejectedauction()
	{
		if ($this->session->userdata('logged_in')==FALSE) 
		{
			$this->login();
		}
		else
		{
			$auctions['auctions']=$this->auctionmodel->viewrejectedauction();
			//print_r($auctions['auctions']); die();

			$this->load->view('header');
			$this->load->view('rejectedauctions',$auctions);
			$this->load->view('footer');
		}
	}

	public function viewclosedauction()
	{
		if ($this->session->userdata('logged_in')==FALSE) 
		{
			$this->login();
		}
		else
		{
			$auctions['auctions']=$this->auctionmodel->viewclosedauction();
			//print_r($auctions['auctions']); die();

			$this->load->view('header');
			$this->load->view('viewclosedauction',$auctions);
			$this->load->view('footer');
		}
	}

	public function auctiondetail()
	{
		if ($this->session->userdata('logged_in')==FALSE) 
		{
			$this->login();
		}
		else
		{
			$aid=$this->uri->segment(3);
			$auction['auction']=$this->auctionmodel->activeauctiondetail($aid);
			$auction['products']=$this->auctionmodel->activeauctionproducts($aid);
           	//print_r($auction); die();
            
			$this->load->view('header');
			$this->load->view('auctiondetail',$auction);
			$this->load->view('footer');
		}
	}

	public function addnewauction()
	{
		$this->load->view('header');
		$this->load->view('addnewauction');
		$this->load->view('footer');
	}

	// public function closedauctiondetail()
	// {
	// 	if ($this->session->userdata('logged_in')==FALSE) 
	// 	{
	// 		$this->login();
	// 	}
	// 	else
	// 	{
	// 		$aid=$this->uri->segment(3);
	// 		$auction['auction']=$this->sellermodel->activeauctiondetail($aid);
	// 		$auction['products']=$this->sellermodel->activeauctionproducts($aid);
 //            //print_r($auction['products']); die();

	// 		$this->load->view('header');
	// 		$this->load->view('auctiondetail');
	// 		$this->load->view('footer');
	// 	}
	// }

	public function changeauctionstatus()
	{
		if ($this->session->userdata('logged_in')==FALSE) 
		{
			$this->login();
		}
		else
		{
			$aid=$this->input->post('id');
			$status=$this->input->post('status');
			$sid=$this->input->post('sid');
			$auctions['data']=$this->auctionmodel->changeauctionstatus($aid,$status);

			//print_r($productdata['seller'][0]['seller_id']);die();
             $subject="Your request for auction has been";
			if($status==2)
			{
				$subject=$subject." accepted!";
			}
			else
			{
				$subject=$subject." rejected!";
			}

			$data1=array
			(
			'sender_id'=>'1',
			'sender_type'=>'admin',
			'receiver_type'=> 'seller',
			'receiver_id'=> $sid,

			'notification_subject'=>$subject ,
			'notification_text'=>$subject,
			'notification_status'=>'1'
			);

			$this->auctionmodel->newauctiontnotify($data1);

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

			if ($auctions['data'])
			{
				echo "true";
			}
			else
			{
				echo "false";
			}
		}
	}

}