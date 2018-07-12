<?php
class products extends CI_Model{
	public function __construct()
    {
        $this->load->database();
    }

    function get_supplier(){
    	$query = $this->db;
		$query->select(array("person_name","id"))
			  ->from('suppliers')
			  ->order_by("person_name");
		$db = $query->get();
		return $db->result_array();
    }

	function data($limit,$start,$search){
		$query = $this->db;
		$query->select(array('products.*','suppliers.person_name as supplier'))
			  ->from('products')
			  ->join('suppliers','products.supplier_id = suppliers.id')
			  ->order_by("id DESC")
			  ->limit($limit, $start);
			  
		if (isset($search['product']) && $search['product'] != '') {
			$query->where("name LIKE '%".$search['product']."%'");
		} elseif (isset($search['type']) && $search['type'] != '') {
			$query->where("type = ".$search['type']);
		} elseif (isset($search['supplier']) && $search['supplier'] != '') {
			$query->where("suppliers.person_name LIKE '%".$search['supplier']."%'");
		}

		$db = $query->get();
		
		return $db->result_array();
	}

	function view($id){
		$query = $this->db;
		$query->select(array('products.*','suppliers.person_name as supplier','suppliers.company_name as company'))
			  ->from('products')
			  ->join('suppliers','products.supplier_id = suppliers.id','inner')
			  ->where('products.id ='.$id);

		$db = $query->get();

		return $db->result_array();
	}

	function jumlah_data(){
		return $this->db->count_all("products");
	}

	function add($params){
		return $this->db->insert('products', $params);
	}

	function update($id,$data){
    	$this->db->where('id',$id);
		$this->db->update('products',$data);
    }
    function update_false($id,$data){
    	$this->db->where('id',$id);
		$this->db->update('products',$data);
    }

	function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('products');    
    }
}
