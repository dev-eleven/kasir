<?php
class menus extends CI_Model{
	public function __construct()
    {
        $this->load->database();
    }

    function get_product(){
    	$query = $this->db;
		$query->select(array("name","id"))
			  ->from('products')
			  ->order_by("name");
		$db = $query->get();
		return $db->result_array();
    }

	function data($limit,$start,$search){
		$query = $this->db;
		$query->select(array('menus.*','products.name as product'))
			  ->from('menus')
			  ->join('products','menus.product_id = products.id')
			  ->order_by("id DESC")
			  ->limit($limit, $start);
			  
		if (isset($search['product']) && $search['product'] != '') {
			$query->where("products.name LIKE '%".$search['product']."%'");
		} elseif (isset($search['type']) && $search['type'] != '') {
			$query->where("menus.type = ".$search['type']);
		} elseif (isset($search['title']) && $search['title'] != '') {
			$query->where("title LIKE '%".$search['title']."%'");
		} elseif (isset($search['price']) && $search['price'] != '') {
			$query->where("price LIKE '%".$search['price']."%'");
		}

		$db = $query->get();
		
		return $db->result_array();
	}

	function view($id){
		$query = $this->db;
		$query->select(array('menus.*','products.name as product'))
			  ->from('menus')	
			  ->join('products','menus.product_id = products.id')
			  ->where("menus.id = ".$id);
		$db = $query->get();
		return $db->result_array();
	}

	function jumlah_data(){
		return $this->db->count_all("menus");
	}

	function add($params){
		return $this->db->insert('menus', $params);
	}

	function update($id,$data){
    	$this->db->where('id',$id);
		$this->db->update('menus',$data);
    }

	function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('menus');    
    }
}
