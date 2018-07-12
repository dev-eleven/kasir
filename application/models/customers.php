<?php
class customers extends CI_Model{
	public function __construct()
    {
        $this->load->database();
    }

	function data($limit,$start,$search){
		$query = $this->db;
		$query->select(array('*'))
			  ->from('customers')
			  ->order_by("id DESC")
			  ->limit($limit, $start);

		if (isset($search['name'])) {
			$query->where("name LIKE '%".$search['name']."%'");
		} elseif (isset($search['address'])) {
			$query->where("address LIKE '%".$search['address']."%'");
		}

		$db = $query->get();
		return $db->result_array();
	}

	function jumlah_data(){
		return $this->db->count_all("customers");
	}

	function view($id){
		$query = $this->db;
		$query->select(array('*'))
			  ->from('customers')
			  ->where("id = ".$id);

		$db = $query->get();
		return $db->result_array();
	}

	function add($params){
		return $this->db->insert('customers', $params);
	}

	function update($id,$data){
    	$this->db->where('id',$id);
		$this->db->update('customers',$data);
    }

	function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('customers');    
    }
}
