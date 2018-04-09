<?php 

class Salemodel extends CI_Model
{

	public function __construct() 
     {
           parent::__construct(); 
           $this->load->database();
     }

    public function viewsale()
    {
        $this->db->select('surplex_order.*,surplex_buyer.buyer_name,surplex_seller.seller_name,products.product_main_img');
        $this->db->from('surplex_order');
        $this->db->join('surplex_buyer', 'surplex_buyer.buyer_id = surplex_order.buyer_id');
        $this->db->join('surplex_seller', 'surplex_seller.seller_id = surplex_order.seller_id');
        $this->db->join('products', 'products.product_id = surplex_order.product_id');
        $query = $this->db->get();
        return $query->result_array();
    }

}