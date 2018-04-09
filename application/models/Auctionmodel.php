<?php 

class Auctionmodel extends CI_Model
{

	public function __construct() 
     {
           parent::__construct(); 
           $this->load->database();
     }

    public function viewpendingauction()
    {
        $this->db->select('*,COUNT(*) as total');
        $this->db->from('surplex_auction');
        $this->db->where('surplex_auction.auction_status','1');
        $this->db->join('surplex_auction_item', 'surplex_auction_item.auction_id = surplex_auction.auction_id');
        $this->db->join('surplex_seller','surplex_seller.seller_id = surplex_auction.auction_by');
        $this->db->GROUP_BY('surplex_auction_item.auction_id');
        $this->db->order_by('surplex_auction.auction_id','desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function activeauctions()
    {
        $this->db->select('*,COUNT(*) as total');
        $this->db->from('surplex_auction');
        $this->db->where('surplex_auction.auction_status','2');
        $this->db->join('surplex_auction_item', 'surplex_auction_item.auction_id = surplex_auction.auction_id');
        $this->db->join('surplex_seller','surplex_seller.seller_id = surplex_auction.auction_by');
        $this->db->GROUP_BY('surplex_auction_item.auction_id');
        $this->db->order_by('surplex_auction.auction_id','desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function liveauctions()
    {
        $this->db->select('*,COUNT(*) as total');
        $this->db->from('surplex_auction');
        $this->db->where('surplex_auction.auction_status','3');
        $this->db->join('surplex_auction_item', 'surplex_auction_item.auction_id = surplex_auction.auction_id');
        $this->db->join('surplex_seller','surplex_seller.seller_id = surplex_auction.auction_by');
        $this->db->GROUP_BY('surplex_auction_item.auction_id');
        $this->db->order_by('surplex_auction.auction_ed_time','asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function viewrejectedauction()
    {
        $this->db->select('*,COUNT(*) as total');
        $this->db->from('surplex_auction');
        $this->db->where('surplex_auction.auction_status','5');
        $this->db->join('surplex_auction_item', 'surplex_auction_item.auction_id = surplex_auction.auction_id');
        $this->db->join('surplex_seller','surplex_seller.seller_id = surplex_auction.auction_by');
        $this->db->GROUP_BY('surplex_auction_item.auction_id');
        $this->db->order_by('surplex_auction.auction_id','desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function viewclosedauction()
    {
        $this->db->select('*,COUNT(*) as total');
        $this->db->from('surplex_auction');
        $this->db->where('surplex_auction.auction_status','4');
        $this->db->join('surplex_auction_item', 'surplex_auction_item.auction_id = surplex_auction.auction_id');
        $this->db->join('surplex_seller','surplex_seller.seller_id = surplex_auction.auction_by');
        $this->db->GROUP_BY('surplex_auction_item.auction_id');
        $this->db->order_by('surplex_auction.auction_id','desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function changeauctionstatus($id,$status)
    {
        $this->db->where('auction_id',$id);
        $data= array('auction_status' =>$status);
        $query=$this->db->update('surplex_auction',$data);
        return $query;
    }

    function newauctiontnotify($data1)
    {
        $this->db->insert('notification', $data1);
    }

    public function activeauctiondetail($aid)
    {
        $this->db->select('*');
        $this->db->from('surplex_auction');
        $this->db->where('auction_id',$aid);
        //$this->db->where('auction_status','2');
        $this->db->order_by('auction_id','desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function activeauctionproducts($aid)
    {
        $this->db->select('*,surplex_auction_item.bid_increment,count(surplex_auction_bid.auction_bid_id) as bidcount,MAX(surplex_auction_bid.current_bid_price) as maxbid');
        $this->db->from('surplex_auction_item');
        $this->db->where('surplex_auction_item.auction_id',$aid);
        $this->db->join('products', 'products.product_id = surplex_auction_item.product_id');
        $this->db->join('surplex_auction_bid', 'surplex_auction_bid.auction_item_id = surplex_auction_item.auction_item_id','LEFT');
        $this->db->order_by('surplex_auction_bid.auction_bid_id','desc');
        $this->db->GROUP_BY('surplex_auction_item.auction_item_id');
        $query = $this->db->get();
        return $query->result_array();
    }

}