<?php
class users extends CI_Model{
	public function __construct()
    {
        $this->load->database();
    }

    function login($email,$password){
    	$this->db->where('email', $email);
        $this->db->where('password', $password);
        
        $result = $this->db->get('users');
        if ($result->num_rows() == 1) {
            return $result->result_array();
        }
        else {
            return false;
        }
    }
	
	function data($limit,$start,$search){
		$query = $this->db;
		$query->select(array("*"))
			  ->from('users')
			  ->order_by("id DESC")
			  ->limit($limit, $start);

		if (isset($search['email']) && $search['email'] != '') {
			$query->where("email LIKE '%".$search['email']."%'");
		}elseif (isset($search['level']) && $search['level'] != '') {
			$query->where("level = ".$search['level']);
		}

		$db = $query->get();
		
		return $db->result_array();
	}

	function view($id){
		$query = $this->db;
		$query->select(array("*"))
			  ->from('users')
			  ->where('id ='.$id);

		$db = $query->get();

		return $db->result_array();
	}

	function jumlah_data(){
		return $this->db->count_all("users");
	}

	function add($params){
		return $this->db->insert('users', $params);
	}

	function update($id,$data){
    	$this->db->where('id',$id);
		$this->db->update('users',$data);
    }

	function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('users');    
    }
}
