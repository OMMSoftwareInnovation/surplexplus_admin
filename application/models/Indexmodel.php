<?php 

class Indexmodel extends CI_Model
{

	public function __construct() 
     {
           parent::__construct(); 
           $this->load->database();
     }

	public function login($data) 
	{
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('admin_password',$data['password']);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1)
		{
			return true;
		} 
		else
		{
			return false;
		}
	}

	public function read_user_information($username) 
	{
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('admin_username',$username);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) 
		{
			return $query->result();
		} 
		else 
		{
			return false;
		}
	}

    public function fetch_notification($id,$type)
    {
        $this->db->select('*');
        $this->db->from('notification');
        $this->db->where('receiver_id',$id);
        $this->db->where('receiver_type',$type);
        $this->db->where('notification_status',"1");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function update_notification($nid,$id,$type)
    {
        $this->db->where('notification_id',$nid);
        $this->db->where('receiver_id',$id);
        $this->db->where('receiver_type',$type);
        $data= array('notification_status' =>"2");
        $query=$this->db->update('notification',$data);
        return $query;
    }

    public function notification_view($id,$type)
    {
        $this->db->select('*');
        $this->db->from('notification');
        $this->db->where('receiver_id',$id);
        $this->db->where('receiver_type',$type);
        $this->db->join('surplex_seller', 'surplex_seller.seller_id = notification.sender_id');
        $this->db->join('surplex_buyer', 'surplex_buyer.buyer_id = notification.sender_id');
        $this->db->order_by("notification_id", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function read_notification($nid,$id,$type)
    {
        $this->db->select('*');
        $this->db->from('notification');
        $this->db->where('notification_id',$nid);
        $this->db->where('receiver_id',$id);
        $this->db->where('receiver_type',$type);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function orderreport()
    {
        $this->db->select('surplex_order.*,products.*,surplex_seller.seller_name,surplex_buyer.buyer_name');
        $this->db->from('surplex_order');
        $this->db->join('products', 'products.product_id = surplex_order.product_id');
        $this->db->join('surplex_seller', 'surplex_seller.seller_id = surplex_order.seller_id');
        $this->db->join('surplex_buyer', 'surplex_buyer.buyer_id = surplex_order.buyer_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function sellerreport()
    {
        $this->db->select('*');
        $this->db->from('surplex_seller');
        $this->db->order_by('seller_id','desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function sellerproduct($sid)
    {
        $this->db->select('count(*) as productcount');
        $this->db->from('products');
        $this->db->where('seller_id',$sid);
        $this->db->GROUP_BY('seller_id');
        $this->db->order_by('seller_id','desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function sellercommission($uid)
    {
        $this->db->select(',MAX(commission_value) as max');
        $this->db->from('surplex_commission');
        $this->db->where('seller_id',$uid);
        $this->db->GROUP_BY('seller_id');
        $this->db->order_by('seller_id','desc');
        $query = $this->db->get();
        return $query->result_array();
    }

}