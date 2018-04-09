<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Indexcontroller extends CI_Controller {

    public function __construct() 
    {
	   parent::__construct();
	   $this->load->helper('form');
	   $this->load->helper('url');
	   $this->load->library('session');
	   $this->load->model('indexmodel');
	   $this->load->model('productmodel');
	   $this->load->library('form_validation');
	}

	public function login()
	{
		$this->load->view('login');
	}

	public function index()
	{
		if (isset($this->session->userdata['logged_in']) && $this->session->userdata['type']=='admin') 
		{
			$this->load->view('header');
			$this->load->view('index');
			$this->load->view('footer');
		} 
		else 
		{
			$this->login();
		}
	}

	public function user_login_process() 
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->login();
		}

		else 
		{
			$data = array(
			'adminname' => $this->input->post('username'),
			'password' => $this->input->post('password')
			);

			$result = $this->indexmodel->login($data);
			if ($result == TRUE) 
			{
				$username = $this->input->post('username');
				$result = $this->indexmodel->read_user_information($username);
				if ($result != false)
				{
					$session_data = array(
					'id'        => $result[0]->admin_id,
					'adminname' => $result[0]->admin_username,
					'password' => $result[0]->admin_password,
					'type' => 'admin',
					'logged_in'=> TRUE 

					);
					// Add user data in session
					$this->session->set_userdata($session_data);
					$this->index();
				}
			}
			else
			{
				$data = array(
				'error_message' => 'Invalid Username or Password'
				);
				$this->load->view('login', $data);
			}
		}
	}

	public function logout() 
	{
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('adminname');
		$this->session->unset_userdata('type');
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		
		$this->login();
	}

	public function addadmin()
	{
		if (isset($this->session->userdata['logged_in'])) 
		{
			$this->load->view('header');
			$this->load->view('addadmin');
			$this->load->view('footer');
		}
		else
		{
			$this->login();
		}		
	}

	public function fetch_notification()
	{
		if ($this->session->userdata('logged_in')==FALSE && $this->session->userdata['type']=='admin') 
		{
			$this->login();
		}
		else
		{
			if ($_POST['view']=="yes")
			{				
				$uid=$this->session->userdata('id');
				$utype=$this->session->userdata('type');
				$data['data']=$this->indexmodel->update_notification($uid,$utype);
			}
			else
			{
				$uid=$this->session->userdata('id');
				$utype=$this->session->userdata('type');
               
				$data['data']=$this->indexmodel->fetch_notification($uid,$utype);
				$output = '';
				if(count($data['data'])>0)
				{
					for($i=0;$i<count($data['data']);$i++)
					{
						$output .= '
						<li>
						<a href="'.site_url('indexcontroller/read_notification/').$data['data'][$i]["notification_id"].'" id="ntff">
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
		if ($this->session->userdata('logged_in')==FALSE)
		{
			$this->login();
		}
		else
		{
			$uid=$this->session->userdata('id');
			$utype=$this->session->userdata('type');
			$notification['notifi']=$this->indexmodel->notification_view($uid,$utype);
			// print_r($notification['notifi']); die();
			$this->load->view('header');
			$this->load->view('notification',$notification);
			$this->load->view('footer');
		}
	}

	public function read_notification()
	{
		if ($this->session->userdata('logged_in')==FALSE)
		{
			$this->login();
		}
		else
		{
			$nid=$this->uri->segment(3);
			$uid=$this->session->userdata('id');
			$utype=$this->session->userdata('type');

			$this->indexmodel->update_notification($nid,$uid,$utype);
			$notification['notifi']=$this->indexmodel->read_notification($nid,$uid,$utype);
			// print_r($notification['notifi']); die();

			$this->load->view('header');
			$this->load->view('readnotification',$notification);
			$this->load->view('footer');
		}
	}

	public function orderreport()
	{
		if ($this->session->userdata('logged_in')==FALSE)
		{
			$this->login();
		}
		else
		{
			$order['order']=$this->indexmodel->orderreport();
			//print_r($order['order']); die();

			$this->load->view('header');
			$this->load->view('orderreport',$order);
			$this->load->view('footer');
		}
	}

	public function sellerreport()
	{
		if ($this->session->userdata('logged_in')==FALSE)
		{
			$this->login();
		}
		else
		{
			$sellerdata['seller']=$this->indexmodel->sellerreport();
		
			for ($i=0; $i <count($sellerdata['seller']) ; $i++)
			{
				$sid = $sellerdata['seller'][$i]['seller_id'];
				$sellerdata['seller'][$i]['products']=$this->indexmodel->sellerproduct($sid);
				$sellerdata['seller'][$i]['commission']=$this->indexmodel->sellercommission($sid);
				// print_r($sellerdata['sproduct']);
				//print_r($sellerdata1);
			}
				// print_r($sellerdata);
			 // die();
			//die();
			$this->load->view('header');
			$this->load->view('sellerreport',$sellerdata);
			$this->load->view('footer');
		}
	}

}