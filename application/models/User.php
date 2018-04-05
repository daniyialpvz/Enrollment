<?php

Class User extends CI_Model {
		
	public function fetchall() {
		
		$this->db->select('*');
		$this->db->from('s_users');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {	
			return $query->result();
		} else {
			return false;
		}
	}
	
	public function add($data){
		
		$this->db->insert('s_users', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
		
	}
	
	public function update($data,$user_id){
		
		$this->db->where('user_id',$user_id);
		$this->db->update('s_users',$data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}	
	}
	
	public function delete($user_id){
		$this->db->where('user_id', $user_id);
		$this->db->delete('s_users'); 
		if ($this->db->affected_rows() > 0) {
			return true;
		}	
	}
	
	public function fetchbyid($user_id){
		$condition = "user_id=".$user_id;
		$this->db->select('*');
		$this->db->from('s_users');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {	
			return $query->result();
		} else {
			return false;
		}
	}

	public function login($data) {

		$condition = "username =" . "'" . $data['email'] . "' AND " . "password =" . "'" . $data['password'] . "'";
		$this->db->select('*');
		$this->db->from('s_users');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
				
		if ($query->num_rows() == 1) {
		return $query->result();
		} else {
		return false;
		}
	}

	
	
}

?>