<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sellercontroller extends CI_Controller {

    public function __construct() 
    {
	   parent::__construct();
	   $this->load->helper('form');
	   $this->load->helper('url');
	   $this->load->library('session');
	   $this->load->library('upload');
	   $this->load->model('sellermodel');
	   $this->load->library('form_validation');
	}

	public function login()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->load->view('header');
			$this->load->view('login');
			$this->load->view('footer');
		}
		else
		{
			$this->load->view('sellerpanel/header');
			$this->load->view('sellerpanel/index');
			$this->load->view('sellerpanel/footer');
		}
	}

	public function index()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$this->load->view('sellerpanel/header');
			$this->load->view('sellerpanel/index');
			$this->load->view('sellerpanel/footer');
		}
	}

	public function addproduct()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$product['category'] = $this->sellermodel->category();
			// print_r($product['category']);
			// die();
			$this->load->view('sellerpanel/header');
			$this->load->view('sellerpanel/addproduct',$product);
		}
	}

	public function subcategory()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			header("location:" .site_url('homecontroller/login'));
		} 
		else
		{
			$id = $this->input->post('id');
			$subcategory=$this->sellermodel->subcategory($id);
			for($i=0;$i< count($subcategory);$i++)
			{
				echo "<option value=".$subcategory[$i]['id'].">".$subcategory[$i]['name']."</option>"; 
			}
		}
	}

	public function upload_product()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
	 		$id=$this->session->userdata('id');
			$stype=$this->session->userdata('type');

	        if ($this->input->post('type')=="1")
			{
				$type='1';
			}
			else
			{
				$type='2';
			}

			$data=array
			(
			'seller_id'=>$id,
			'product_name'=>$this->input->post('name'),
			'product_description'=>$this->input->post('description'),
			'product_price'=>$this->input->post('price'),
			'product_summary'=>$this->input->post('summary'),
			'product_category_id'=>$this->input->post('category'),
			'product_subcategory_id'=>$this->input->post('subcategory'),
			'product_machine_details'=>$this->input->post('mdetails'),
			'product_main_img'=>$this->input->post('main_image'),
			'product_imgs'=>$this->input->post('images'),
			'product_status'=>'1',
			'product_type'=>$type
			);

			$data1=array
			(
			'sender_id'=>$id,
			'sender_type'=>$stype,
			'receiver_type'=> 'admin',
			'receiver_id'=> '1',
			'notification_subject'=> 'APPROVAL for New product From '.$this->session->userdata('username'),
			'notification_text'=>$this->session->userdata('username'),
			'notification_status'=>'1'
			);
			// $config = Array(
		 //    'protocol' => 'smtp',
		 //    'smtp_host' => 'ssl://smtp.googlemail.com',
		 //    'smtp_port' => 465,
		 //    'smtp_user' => 'itspljayesh@gmail.com',
		 //    'smtp_pass' => '9662927581',
		 //    'mailtype'  => 'html', 
		 //    'charset'   => 'iso-8859-1'
			// );
			// $this->load->library('email');
			// $this->email->initialize($config);
			// $this->email->set_mailtype("html");
			// $this->email->set_newline("\r\n");

			//Email content
			// $htmlContent = '<h1>'.'APPROVAL for New product From'.$this->session->userdata('username').'</h1>';
			// $htmlContent .= '<p>'.$this->input->post('name').'-'.$this->session->userdata('username').'</p>';

			// $this->email->to('itspljayesh@gmail.com');
			// $this->email->from($this->session->userdata('email'),'APPROVAL');
			// $this->email->subject('APPROVAL for New product From'.$this->session->userdata('username'));
			// $this->email->message($htmlContent);

			//Send email
			//$this->email->send();

			$this->sellermodel->newproductnotify($data1);
			$product['data'] = $this->sellermodel->upload_product($data);
			$status ['status']= "success";
			echo json_encode( $status);
		}
	}

	public function viewproduct()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$uid=$this->session->userdata('id');
			$productdata['product']=$this->sellermodel->seller_product($uid);

			$this->load->view('sellerpanel/header');
			$this->load->view('sellerpanel/viewproduct',$productdata);
			$this->load->view('sellerpanel/footer');
		}
	}

	public function neworders()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$uid=$this->session->userdata('id');
			$orders['order']=$this->sellermodel->neworders($uid);
			//print_r($orders['order']); die();
			$this->load->view('sellerpanel/header');
			$this->load->view('sellerpanel/orders',$orders);
			$this->load->view('sellerpanel/footer');
		}
	}

	public function approvedorders()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$uid=$this->session->userdata('id');
			$orders['order']=$this->sellermodel->approvedorders($uid);
			//print_r($orders['order']); die();
			$this->load->view('sellerpanel/header');
			$this->load->view('sellerpanel/orders',$orders);
			$this->load->view('sellerpanel/footer');
		}
	}

	public function cancelledorders()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$uid=$this->session->userdata('id');
			$orders['order']=$this->sellermodel->cancelledorders($uid);

			$this->load->view('sellerpanel/header');
			$this->load->view('sellerpanel/orders',$orders);
			$this->load->view('sellerpanel/footer');
		}
	}

	public function profile()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$uid=$this->session->userdata('id');
			$data['data']=$this->sellermodel->profile($uid);

			$this->load->view('sellerpanel/header');
			$this->load->view('sellerpanel/profile',$data);
			$this->load->view('sellerpanel/footer');
		}
	}

    function multiupload()
    {
        error_reporting(E_ALL | E_STRICT);
        $this->load->library("UploadHandler");
    }

	public function deleteFile()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$iname=$this->uri->segment(3);
			$data['data']=$this->sellermodel->deleteFile($iname);
			unlink("files/".$iname);
			unlink("files/thumbnail/".$iname);
			echo json_encode("true");
		}
	}

	public function fetch_notification()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			if ($_POST['view']=="yes")
			{				
				$uid=$this->session->userdata('id');
				$utype=$this->session->userdata('type');
				$data['data']=$this->sellermodel->update_notification($uid,$utype);
			}
			else
			{
				$uid=$this->session->userdata('id');
				$utype=$this->session->userdata('type');
				$data['data']=$this->sellermodel->fetch_notification($uid,$utype);
				$output = '';
				if(count($data['data'])>0)
				{
					for($i=0;$i<count($data['data']);$i++)
					{
						$output .= '
						<li>
						<a href="'.site_url('sellercontroller/read_notification/').$data['data'][$i]["notification_id"].'" id="ntff">
						<strong>'.$data['data'][$i]["notification_subject"].'</strong><br />
						<small><em>'.$data['data'][$i]["notification_text"].'</em></small>
						</a>
						</li>';
					}
				}
				else
				{
					$output .= '<li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
				}

				$data1 = array(
				'notification' => $output,
				'unseen_notification'  => count($data['data'])
				);

				echo json_encode($data1);
			}
		}
	}

	public function notification_view()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$uid=$this->session->userdata('id');
			$utype=$this->session->userdata('type');
			$notification['notifi']=$this->sellermodel->notification_view($uid,$utype);
			// print_r($notification['notifi']); die();
			$this->load->view('sellerpanel/header');
			$this->load->view('sellerpanel/notification',$notification);
			$this->load->view('sellerpanel/footer');
		}
	}

	public function read_notification()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$nid=$this->uri->segment(3);
			$uid=$this->session->userdata('id');
			$utype=$this->session->userdata('type');

			$this->sellermodel->update_notification($nid,$uid,$utype);
			$notification['notifi']=$this->sellermodel->read_notification($nid,$uid,$utype);
			// print_r($notification['notifi']); die();

			$this->load->view('sellerpanel/header');
			$this->load->view('sellerpanel/readnotification',$notification);
			$this->load->view('sellerpanel/footer');
		}
	}

	public function productdetail()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$pid=$this->uri->segment(3);
			$productdata['product']=$this->sellermodel->productdetail($pid);
            $productdata['seller'] =$this->sellermodel->seller($productdata['product'][0]['seller_id']);
            $productdata['category'] =$this->sellermodel->category1($productdata['product'][0]['product_category_id']);
            $productdata['subcategory'] =$this->sellermodel->subcategory1($productdata['product'][0]['product_subcategory_id']);
			//print_r($productdata['subcategory']); die();
			
			$this->load->view('sellerpanel/header');
			$this->load->view('sellerpanel/productdetail',$productdata);
			$this->load->view('sellerpanel/footer');
		}
	}

	public function orderdetail()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$pid=$this->uri->segment(3);
			$uid=$this->session->userdata('id');
			$productdata['order']=$this->sellermodel->orderdetail($pid);
			$productdata['totalorder']=$this->sellermodel->totalorder($uid,'!=0');
			$productdata['successorder']=$this->sellermodel->totalorder($uid,'=1');
			$productdata['buyerdetail']=$this->sellermodel->buyerdata($pid);
			$productdata['product']=$this->sellermodel->productdetail($productdata['order'][0]['product_id']);
			$productdata['package']=$this->sellermodel->packagevalue($productdata['totalorder'][0]['package_id']);
   			$productdata['category'] =$this->sellermodel->category1($productdata['product'][0]['product_category_id']);
   			$productdata['subcategory'] =$this->sellermodel->subcategory1($productdata['product'][0]['product_subcategory_id']);
			//print_r($productdata); die();
			
			$this->load->view('sellerpanel/header');
			$this->load->view('sellerpanel/orderdetail',$productdata);
			$this->load->view('sellerpanel/footer');
		}
	}

	public function orderapproval()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$oid=$this->uri->segment(3);
			$id=$this->session->userdata('id');
			$stype=$this->session->userdata('type');

			$data1=array
			(
			'order_status'=>'2',
			);
			$this->sellermodel->updateorderstatus($oid,$data1);

			$buyerdata['buyerdetail']=$this->sellermodel->buyerdata($oid);

			$data1=array
			(
			'sender_id'=>$id,
			'sender_type'=>$stype,
			'receiver_type'=> 'admin',
			'receiver_id'=> '1',
			'notification_subject'=> $this->session->userdata('username').'approved the product',
			'notification_text'=>$this->session->userdata('username').'approved the product',
			'notification_status'=>'1'
			);

			$data2=array
			(
			'sender_id'=>'1',
			'sender_type'=>'admin',
			'receiver_type'=> 'buyer',
			'receiver_id'=> $buyerdata['buyerdetail'][0]['buyer_id'],
			'notification_subject'=> $this->session->userdata('username').'approved your order',
			'notification_text'=> $this->session->userdata('username').'approved your order',
			'notification_status'=>'1'
			);
			$this->load->helper('notification_helper');

			 notification($data1);
			 notification($data2);

			// $config = Array(
		 //    'protocol' => 'smtp',
		 //    'smtp_host' => 'ssl://smtp.googlemail.com',
		 //    'smtp_port' => 465,
		 //    'smtp_user' => 'itspljayesh@gmail.com',
		 //    'smtp_pass' => '9662927581',
		 //    'mailtype'  => 'html', 
		 //    'charset'   => 'iso-8859-1'
			// );
			// $this->load->library('email');
			// $this->email->initialize($config);
			// $this->email->set_mailtype("html");
			// $this->email->set_newline("\r\n");

			// //Email content
			// $htmlContent = '<h1>'.'APPROVAL for New product From'.$this->session->userdata('username').'</h1>';
			// $htmlContent .= '<p>'.$this->input->post('name').'-'.$this->session->userdata('username').'</p>';

			// $this->email->to('dudhiyamurtaza165@gmail.com');
			// $this->email->from($this->session->userdata('email'),'APPROVAL');
			// $this->email->subject('APPROVAL for New product From'.$this->session->userdata('username'));
			// $this->email->message($htmlContent);

			// //Send email
			// $this->email->send();

			$this->approvedorders();
		}
	}

	public function orderrejection()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$oid=$this->uri->segment(3);
			$id=$this->session->userdata('id');
			$stype=$this->session->userdata('type');

			$data1=array
			(
			'order_status'=>'3',
			'comment' => $this->input->post('comment')
			);
			$this->sellermodel->updateorderstatus($oid,$data1);

			$buyerdata['buyerdetail']=$this->sellermodel->buyerdata($oid);

			$data1=array
			(
			'sender_id'=>$id,
			'sender_type'=>$stype,
			'receiver_type'=> 'admin',
			'receiver_id'=> '1',
			'notification_subject'=> $this->session->userdata('username').'approved the product',
			'notification_text'=>$this->session->userdata('username').'approved the product',
			'notification_status'=>'1'
			);

			$data2=array
			(
			'sender_id'=>'1',
			'sender_type'=>'admin',
			'receiver_type'=> 'buyer',
			'receiver_id'=> $buyerdata['buyerdetail'][0]['buyer_id'],
			'notification_subject'=> $this->session->userdata('username').'approved your order',
			'notification_text'=> $this->session->userdata('username').'approved your order',
			'notification_status'=>'1'
			);
			$this->load->helper('notification_helper');

			 notification($data1);
			 notification($data2);

			// $config = Array(
		 //    'protocol' => 'smtp',
		 //    'smtp_host' => 'ssl://smtp.googlemail.com',
		 //    'smtp_port' => 465,
		 //    'smtp_user' => 'itspljayesh@gmail.com',
		 //    'smtp_pass' => '9662927581',
		 //    'mailtype'  => 'html', 
		 //    'charset'   => 'iso-8859-1'
			// );
			// $this->load->library('email');
			// $this->email->initialize($config);
			// $this->email->set_mailtype("html");
			// $this->email->set_newline("\r\n");

			// //Email content
			// $htmlContent = '<h1>'.'APPROVAL for New product From'.$this->session->userdata('username').'</h1>';
			// $htmlContent .= '<p>'.$this->input->post('name').'-'.$this->session->userdata('username').'</p>';

			// $this->email->to('dudhiyamurtaza165@gmail.com');
			// $this->email->from($this->session->userdata('email'),'APPROVAL');
			// $this->email->subject('APPROVAL for New product From'.$this->session->userdata('username'));
			// $this->email->message($htmlContent);

			// //Send email
			// $this->email->send();

			$this->cancelledorders();
		}
	}

	public function approvedorderreport()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$pid=$this->uri->segment(3);
			//$productdata['product']=$this->sellermodel->productdetail($pid);
            // $productdata['seller'] =$this->sellermodel->seller($productdata['product'][0]['seller_id']);
            // $productdata['category'] =$this->sellermodel->category1($productdata['product'][0]['product_category_id']);
            // $productdata['subcategory'] =$this->sellermodel->subcategory1($productdata['product'][0]['product_subcategory_id']);
			//print_r($productdata['subcategory']); die();
			$uid=$this->session->userdata('id');
			$orders['order']=$this->sellermodel->approvedorders($uid);
			//print_r($orders['order']); die();
			
			$this->load->view('sellerpanel/header');
			$this->load->view('sellerpanel/orderreport',$orders);
			$this->load->view('sellerpanel/footer');
		}
	}

	public function rejectedorderreport()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata('type')!='seller') 
		{
			$this->login();
		}
		else
		{
			$pid=$this->uri->segment(3);
			//$productdata['product']=$this->sellermodel->productdetail($pid);
            // $productdata['seller'] =$this->sellermodel->seller($productdata['product'][0]['seller_id']);
            // $productdata['category'] =$this->sellermodel->category1($productdata['product'][0]['product_category_id']);
            // $productdata['subcategory'] =$this->sellermodel->subcategory1($productdata['product'][0]['product_subcategory_id']);
			//print_r($productdata['subcategory']); die();
			$uid=$this->session->userdata('id');
			$orders['order']=$this->sellermodel->cancelledorders($uid);
			//print_r($orders['order']); die();
			
			$this->load->view('sellerpanel/header');
			$this->load->view('sellerpanel/orderreport',$orders);
			$this->load->view('sellerpanel/footer');
		}
	}

}