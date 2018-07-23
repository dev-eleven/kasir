<?php
class index extends CI_Model{
	public function __construct()
    {
        $this->load->database();
    }

    public function product_in($date){
    	$query = $this->db;
    	$query->select(array("count(quantity) as total"))
    		  ->from("inventories")
    		  ->where("status = 1");
    	if ($date != '') {
    		$query->where("date_in LIKE '%".$date."%'");
    	}

    	$db = $query->get();
    	return $db->result_array();
    }

    public function product_out($date){
    	$query = $this->db;
    	$query->select(array("count(quantity) as total"))
    		  ->from("inventories")
    		  ->where("status = 2");
    	if ($date != '') {
    		$query->where("date_out LIKE '%".$date."%'");
    	}

    	$db = $query->get();
    	return $db->result_array();
    }

    public function product_borrowed($date){
    	$query = $this->db;
    	$query->select(array("count(quantity) as total"))
    		  ->from("inventories")
    		  ->where("status = 3");
    	if ($date != '') {
    		$query->where("date_lent LIKE '%".$date."%'");
    	}

    	$db = $query->get();
    	return $db->result_array();
    }

    public function product_returned($date){
    	$query = $this->db;
    	$query->select(array("count(quantity) as total"))
    		  ->from("inventories")
    		  ->where("status = 4");
    	if ($date != '') {
    		$query->where("date_back LIKE '%".$date."%'");
    	}

    	$db = $query->get();
    	return $db->result_array();
    }

    public function product_broken($date){
    	$query = $this->db;
    	$query->select(array("count(quantity) as total"))
    		  ->from("inventories")
    		  ->where("status = 5");
    	if ($date != '') {
    		$query->where("date_broken LIKE '%".$date."%'");
    	}

    	$db = $query->get();
    	return $db->result_array();
    }

    public function product_lost($date){
    	$query = $this->db;
    	$query->select(array("count(quantity) as total"))
    		  ->from("inventories")
    		  ->where("status = 6");
    	if ($date != '') {
    		$query->where("date_lost LIKE '%".$date."%'");
    	}

    	$db = $query->get();
    	return $db->result_array();
    }

    public function suppliers(){
        return $this->db->count_all("suppliers");
    }

    public function menus(){
        return $this->db->count_all("menus");
    }

    public function members(){
        return $this->db->count_all("members");
    }

    public function products(){
        return $this->db->count_all("products");
    }
}