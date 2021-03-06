<?php
class suppliers extends CI_Model{
	public function __construct()
    {
        $this->load->database();
    }

	function data($limit,$start,$search){
		$query = $this->db;
		$query->select(array('*'))
			  ->from('suppliers')
			  ->order_by("id DESC")
			  ->limit($limit, $start);

		if (isset($search['name']) && $search['name'] != '') {
			$query->where("person_name LIKE '%".$search['name']."%'");
		} elseif (isset($search['company']) && $search['company'] != '') {
			$query->where("company_name = ".$search['company']);
		} elseif (isset($search['email']) && $search['email'] != '') {
			$query->where("email LIKE '%".$search['email']."%'");
		} elseif (isset($search['phone']) && $search['phone'] != '') {
			$query->where("phone LIKE '%".$search['phone']."%'");
		}

		$db = $query->get();
		
		return $db->result_array();
	}

	function get_product($id){
		$query = $this->db;
		$query->select(array('suppliers.*','products.*'))
			  ->from('suppliers')
			  ->join('products','products.supplier_id = suppliers.id')
			  ->where('suppliers.id ='.$id);

		$db = $query->get();

		return $db->result_array();
	}

	function jumlah_data(){
		return $this->db->count_all("suppliers");
	}

	function add($params){
		return $this->db->insert('suppliers', $params);
	}

	function view($id){
		$query = $this->db;
		$query->select(array('*'))
			  ->from('suppliers')
			  ->where('id ='.$id);

		$db = $query->get();

		return $db->result_array();
	}

	function update($id,$data){
    	$this->db->where('id',$id);
		$this->db->update('suppliers',$data);
    }

	function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('suppliers');    
    }
}
