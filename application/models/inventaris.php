<?php
class inventaris extends CI_Model{
	public function __construct()
    {
        $this->load->database();
    }

    function new_products(){
    	$query = $this->db;
		$query->select(array("name","stock"))
			  ->from('products')
			  ->limit(10)
			  ->order_by("id DESC");
		$db = $query->get();
		return $db->result_array();
    }

    function hot_drinks(){
    	$query = $this->db;
		$query->select(array("SUM(stock) as stock"))
			  ->from('products')
			  ->where("type","1");
		$db = $query->get();
		return $db->result_array();
    }

    function cold_drinks(){
    	$query = $this->db;
		$query->select(array("SUM(stock) as stock"))
			  ->from('products')
			  ->where("type","2");
		$db = $query->get();
		return $db->result_array();
    }

    function food(){
		$query = $this->db;
		$query->select(array("SUM(stock) as stock"))
			  ->from('products')
			  ->where("type","3");
		$db = $query->get();
		return $db->result_array();
    }
}
