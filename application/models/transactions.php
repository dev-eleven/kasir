<?php
class transactions extends CI_Model{
	public function __construct()
    {
        $this->load->database();
    }

    function data($limit,$start){
		$query = $this->db;
		$query->select(array("transactions.*","members.name as customer","ordered_list.order_status as status"))
			  ->from('transactions')
			  ->join('members','transactions.member_id = members.id','left')
			  ->join('ordered_list','transactions.code = ordered_list.transaction_code','left')
			  ->order_by("id DESC")
			  ->group_by("transactions.code")
			  ->limit($limit, $start);

		$db = $query->get();
		return $db->result_array();
	}

	function jumlah_data(){
		return $this->db->count_all("transactions");
	}

	//Get Item
	function get_member(){
		$query = $this->db;
		$query->select(array("name","id"))
			  ->from("members");
		$db = $query->get();
		return $db->result_array();
	}
	function get_menu(){
		$query = $this->db;
		$query->select(array("title","id"))
			  ->from("menus");
		$db = $query->get();
		return $db->result_array();
	}
	function get_code($id){
		$query = $this->db;
		$query->select(array("transaction_code"))
			  ->from("ordered_list")
			  ->where("id =",$id);
		$db = $query->get();
		return $db->result_array();
	}
	function price($menu_id){
		$query = $this->db;
		$query->select(array('price'))
			  ->from('menus')
			  ->where("id =".$menu_id);
		$db = $query->get();
		return $db->result_array();
	}
	function order($code){
		$query = $this->db;
		$query->select(array("ordered_list.*","menus.title as menu"))
			  ->from('ordered_list')
			  ->join('menus','ordered_list.menu_id = menus.id')
			  ->where("ordered_list.transaction_code =".$code)
			  ->order_by("id DESC");
		$db = $query->get();
		return $db->result_array();
	}
	function final_price($code){
		$query = $this->db;
		$query->select(array("sum(total_price) as total"))
			  ->from("ordered_list")
			  ->where("transaction_code =".$code);
		$db = $query->get();
		return $db->result_array();
	}
	function price_order($id){
		$query = $this->db;
		$query->select(array('total_price'))
			  ->from('ordered_list')
			  ->where("id =".$id);
		$db = $query->get();
		return $db->result_array();
	}

	//Add
	function add($params){
		return $this->db->insert('transactions', $params);
	}
	function add_order($params){
		return $this->db->insert('ordered_list', $params);
	}
	function add_income($params){
		return $this->db->insert('transaction_incomes', $params);
	}

	//Update
	function update_order($code,$data){
		$this->db->where('transaction_code',$code);
		$this->db->update('ordered_list',$data);
	}
	function update_income($code,$data){
    	$this->db->where('transaction_code',$code);
		$this->db->update('transaction_incomes',$data);
    }

    //Delete
	function order_delete($id){
		$this->db->where('id',$id);
        $this->db->delete('ordered_list');    
	}
	function delete($code){
		$this->db->where('code',$code);
        $this->db->delete('transactions');
	}
}
