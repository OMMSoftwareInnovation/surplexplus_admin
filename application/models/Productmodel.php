<?php 

class Productmodel extends CI_Model
{

	public function __construct() 
     {
           parent::__construct(); 
           $this->load->database();
     }

    public function newproducts()
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('product_status','1');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function activeproducts()
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('product_status','2');
        $this->db->join('surplex_seller','surplex_seller.seller_id = products.seller_id');
        $this->db->order_by('product_id','desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function changeproductstatus($id,$status)
    {
        $this->db->where('product_id',$id);
        $data= array
        (
            'product_status' =>$status,
            'product_price' => 'NULL'
        );
        $query=$this->db->update('products',$data);
        return $query;
    }

    public function sellerdata($id)
    {
        $this->db->select('seller_id');
        $this->db->from('products');
        $this->db->where('product_id',$id);
        $query = $this->db->get();
        return $query->result_array();
    }
      public function seller($id)
    {
        $this->db->select('*');
        $this->db->from('surplex_seller');
        $this->db->where('seller_id',$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    function newproductnotify($data1)
    {
        $this->db->insert('notification', $data1);
    }

    public function productdetail($id)
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('product_id',$id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function category($cid)
    {
        $this->db->select('name');
        $this->db->from('menus');
        $this->db->where('id',$cid);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function subcategory($sid)
    {
        $this->db->select('name');
        $this->db->from('menus');
        $this->db->where('id',$sid);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function rejectedproducts()
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('product_status','3');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function inactiveproducts()
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('product_status','3');
        $query = $this->db->get();
        return $query->result_array();
    }

}