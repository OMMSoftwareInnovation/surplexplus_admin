<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sellercontroller extends CI_Controller {

    public function __construct() 
    {
	   parent::__construct();
	   $this->load->helper('form');
	   $this->load->helper('url');
	   $this->load->library('session');
	   // $this->load->library('../controllers/indexcontroller');
	   $this->load->model('sellermodel');
	   $this->load->library('form_validation');
	}

	public function viewseller()
	{
		if (isset($this->session->userdata['logged_in'])) 
		{
			$seller['sellerdata']=$this->sellermodel->allsellers();
			$this->load->view('header');
			$this->load->view('viewseller',$seller);
			$this->load->view('footer');
		}
		else
		{
			$this->load->view('login');
		}
			
	}

	public function addseller()
	{
		if (isset($this->session->userdata['logged_in'])) 
		{
			$this->load->view('header');
			$this->load->view('addseller');
			$this->load->view('footer');
		}
		else
		{
			$this->load->view('login');
		}
	}

	public function seller_registraion()
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
			$this->form_validation->set_rules('password', 'Paasword', 'required|min_length[6]|max_length[50]');
	 		if ($this->form_validation->run() == FALSE) 
	 		{
				$this->addseller();
			}
			else 
			{
				$data = array(
				'seller_name' => $this->input->post('name1').$this->input->post('name2'),
				'seller_username' => $this->input->post('username'),
				'seller_email' => $this->input->post('email'),
				'seller_mobile' => $this->input->post('mobile'),
				'seller_company_name' => $this->input->post('company_name'),
				'seller_company_address' => $this->input->post('company_address'),
				'seller_password' => $this->input->post('confirm_password'),
				'seller_status' => '0'
				);
				$this->sellermodel->seller_data_insert($data);

				$seller['notify']="<script> alertify.notify('New Seller Added!', 'success', 5, function(){  console.log('dismissed'); });</script>";
				$seller['sellerdata']=$this->sellermodel->allsellers();
				$this->load->view('header');
				$this->load->view('viewseller',$seller);
				$this->load->view('footer');
			}
		}
		else
		{
			$this->load->view('login');
		}
	}

    public function chk_seller_usr()
	{
		if (isset($this->session->userdata['logged_in'])) 
		{
			if(isset($_POST))
            {
                $seller_username = $_POST['seller_username'];
                $this->sellermodel->sellerusrchk($seller_username); 
            }
	    }
		else
		{
			$this->load->view('login');
		}
	}

    public function chk_seller_email()
	{
		if (isset($this->session->userdata['logged_in'])) 
		{
			if(isset($_POST))
            {
                $seller_email = $_POST['seller_email'];
                $this->sellermodel->selleremailchk($seller_email);
            }
	    }
		else
		{
			$this->load->view('login');
		}
	}

	public function editseller()
	{
		if (isset($this->session->userdata['logged_in'])) 
		{
			$id=$this->uri->segment(3);
			$sellerdata['data']=$this->sellermodel->editseller($id);
			//print_r($sellerdata['data']);
			$this->load->view('header');
			$this->load->view('editseller',$sellerdata);
			$this->load->view('footer');
	    }
		else
		{
			$this->load->view('login');
		}
	}

	public function seller_profileupdate()
	{
		if (isset($this->session->userdata['logged_in'])) 
		{
			$id=$this->uri->segment(3);

	 		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
	 		$this->form_validation->set_rules('name2', 'Name', 'required|min_length[5]|max_length[30]');
			$this->form_validation->set_rules('mobile', 'Mobile No.', 'required|regex_match[/^[0-9]{10}$/]');
			$this->form_validation->set_rules('company_name', 'Company Name', 'required|min_length[8]|max_length[50]');
			$this->form_validation->set_rules('company_address', 'Company Address', 'required|min_length[8]|max_length[50]');
			$this->form_validation->set_rules('crate', 'Commission Rate', 'required|min_length[1]|max_length[3]');
	 		if ($this->form_validation->run() == FALSE) 
	 		{
				$this->editseller();
			}
			else 
			{
				$data = array(
				'seller_name' => $this->input->post('name2'),
				'seller_mobile' => $this->input->post('mobile'),
				'seller_company_name' => $this->input->post('company_name'),
				'commission_amount' => $this->input->post('crate'),
				'seller_company_address' => $this->input->post('company_address')
				);

				$this->sellermodel->seller_profileupdate($id,$data);
					
				$seller['sellerdata']=$this->sellermodel->allsellers();
			    $seller['notify']="<script> alertify.notify('Seller Profile Updated!', 'success', 5, function(){  console.log('dismissed'); });</script>";
				//print_r($seller['sellerdata']);
				$this->load->view('header');
				$this->load->view('viewseller',$seller);
				$this->load->view('footer');
			}
	    }
		else
		{
			$this->load->view('login');
		}
	}

	public function seller_rateupdate()
	{
		if (isset($this->session->userdata['logged_in'])) 
		{
			$id=$this->input->post('sid');
			$crate=$this->input->post('crate');
			
			$data = array(
			'commission_amount' => $crate,
			);

			$this->sellermodel->seller_profileupdate($id,$data);
				
			$seller['sellerdata']=$this->sellermodel->allsellers();
		    
		    echo json_encode($seller);
	    }
		else
		{
			$this->load->view('login');
		}
	}

}