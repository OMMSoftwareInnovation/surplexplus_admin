<?php 

class Sellermodel extends CI_Model
{

	public function __construct() 
     {
           parent::__construct(); 
           $this->load->database();
     }

    public function allsellers()
    {
        $this->db->select('*');
        $this->db->from('surplex_seller');
        $query = $this->db->get();
        return $query->result_array();
    }

	function seller_data_insert($data)
	{
		$this->db->insert('surplex_seller', $data);
	}

    public function sellerusrchk($usr) 
    {
        $qry = 'SELECT count(*) as cnt from surplex_seller where seller_username= ? ';
        $res = $this->db->query($qry,array( $usr ))->result();
        if ($res[0]->cnt > 0) {
            echo '1';
        } else {
            echo '0';
        }
    }

    public function selleremailchk($usr) 
    {
        $qry = 'SELECT count(*) as cnt from surplex_seller where seller_email= ? ';
        $res = $this->db->query($qry,array( $usr ))->result();
        if ($res[0]->cnt > 0) {
            echo '1';
        } else {
            echo '0';
        }
    }

    public function editseller($uid)
    {
        $this->db->select('*');
        $this->db->from('surplex_seller');
        $this->db->where('seller_id',$uid);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function seller_profileupdate($id,$data)
    {
        $this->db->where('seller_id',$id);
        $query=$this->db->update('surplex_seller',$data);
        return $query;
    }

}