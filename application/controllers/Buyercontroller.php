<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buyercontroller extends CI_Controller {

    public function __construct() 
    {
	   parent::__construct();
	   $this->load->helper('form');
	   $this->load->helper('url');
	   $this->load->library('session');
	   $this->load->model('buyermodel');
	   $this->load->library('form_validation');
	}

	public function viewbuyer()
	{
		if (isset($this->session->userdata['logged_in'])) 
		{
			$buyer['buyerdata']=$this->buyermodel->allbuyers();
			//print_r($buyer['buyerdata']);
			$this->load->view('header');
			$this->load->view('viewbuyer',$buyer);
			$this->load->view('footer');
		}
		else
		{
			$this->load->view('login');
		}
	}

	public function addbuyer()
	{
		if (isset($this->session->userdata['logged_in'])) 
		{
			$this->load->view('header');
			$this->load->view('addbuyer');
			$this->load->view('footer');
		}
		else
		{
			$this->load->view('login');
		}
	}

	public function buyer_registraion()
	{
		if (isset($this->session->userdata['logged_in'])) 
		{
	 		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
	 		$this->form_validation->set_rules('name2', 'Name', 'required|min_length[5]|max_length[30]');
	 		$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[15]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('mobile', 'Mobile No.', 'required|regex_match[/^[0-9]{10}$/]');
	 		$this->form_validation->set_rules('company_name', 'Company Name', 'required|min_length[5]|max_length[15]');
			$this->form_validation->set_rules('company_address', 'Company Address', 'required|min_length[10]|max_length[50]');
	 		if ($this->form_validation->run() == FALSE) 
	 		{
				$this->addbuyer();
			}
			else 
			{
				$data = array(
				'buyer_name' => $this->input->post('name1').$this->input->post('name2'),
				'buyer_username' => $this->input->post('username'),
				'buyer_email' => $this->input->post('email'),
				'buyer_mobile' => $this->input->post('mobile'),
				'buyer_company_name' => $this->input->post('company_name'),
				'buyer_company_address' => $this->input->post('company_address'),
				'buyer_status' => '0'
				);
				$this->buyermodel->buyer_data_insert($data);

				$buyer['notify']="<script> alertify.notify('New Buyer Added!', 'success', 5, function(){  console.log('dismissed'); });</script>";
				$buyer['buyerdata']=$this->buyermodel->allbuyers();
				$this->load->view('header');
				$this->load->view('viewbuyer',$buyer);
				$this->load->view('footer');
			}
		}
		else
		{
			$this->load->view('login');
		}
	}

    public function chk_buyer_usr()
	{
		if (isset($this->session->userdata['logged_in'])) 
		{
			if(isset($_POST))
            {
                $buyer_username = $_POST['buyer_username'];
                $this->buyermodel->buyerusrchk($buyer_username); 
            }
		}
		else
		{
			$this->load->view('login');
		}
	}

    public function chk_buyer_email()
	{
		if (isset($this->session->userdata['logged_in'])) 
		{
			if(isset($_POST))
            {
                $buyer_email = $_POST['buyer_email'];
                $this->buyermodel->buyeremailchk($buyer_email); 
            }
		}
		else
		{
			$this->load->view('login');
		}
	}

	public function editbuyer()
	{
		if (isset($this->session->userdata['logged_in'])) 
		{
			$id=$this->uri->segment(3);
			$buyerdata['data']=$this->buyermodel->editbuyer($id);
			//print_r($buyerdata['data']);
			$this->load->view('header');
			$this->load->view('editbuyer',$buyerdata);
			$this->load->view('footer');
	    }
		else
		{
			$this->load->view('login');
		}
	}

	public function buyer_profileupdate()
	{
		if (isset($this->session->userdata['logged_in'])) 
		{
			$id=$this->uri->segment(3);

	 		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
	 		$this->form_validation->set_rules('name2', 'Name', 'required|min_length[5]|max_length[30]');
			$this->form_validation->set_rules('mobile', 'Mobile No.', 'required|regex_match[/^[0-9]{10}$/]');
			$this->form_validation->set_rules('company_name', 'Company Name', 'required|min_length[8]|max_length[50]');
			$this->form_validation->set_rules('company_address', 'Company Address', 'required|min_length[8]|max_length[50]');
	 		if ($this->form_validation->run() == FALSE) 
	 		{
				$this->editbuyer();
			}
			else 
			{
				$data = array(
				'buyer_name' => $this->input->post('name2'),
				'buyer_mobile' => $this->input->post('mobile'),
				'buyer_company_name' => $this->input->post('company_name'),
				'buyer_company_address' => $this->input->post('company_address')
				);

				$this->buyermodel->buyer_profileupdate($id,$data);
					
				$buyer['buyerdata']=$this->buyermodel->allbuyers();
			    $buyer['notify']="<script> alertify.notify('buyer Profile Updated!', 'success', 5, function(){  console.log('dismissed'); });</script>";
				//print_r($buyer['buyerdata']);
				$this->load->view('header');
				$this->load->view('viewbuyer',$buyer);
				$this->load->view('footer');
			}
	    }
		else
		{
			$this->load->view('login');
		}

	}

    public function buyer_fulldata()
	{
		if (isset($this->session->userdata['logged_in'])) 
		{
			$id=$this->uri->segment(3);
			$buyer['data']=$this->buyermodel->editbuyer($id);
			$buyer['buyer_fulldata']=$this->buyermodel->buyer_fulldata($id);
			//print_r($buyer['data']);

			$this->load->view('header');
			$this->load->view('buyer_fulldata',$buyer);
			$this->load->view('footer');
		}
		else
		{
			$this->load->view('login');
		}
	}

}