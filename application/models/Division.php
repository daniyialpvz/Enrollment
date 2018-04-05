<?php

Class Division extends CI_Model {
		
	public function fetchall() {
		
		$this->db->select('*');
		$this->db->from('s_division');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {	
			return $query->result();
		} else {
			return false;
		}
	}
	
	public function add($data){
		
		$this->db->insert('s_division', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
		
	}
	
	public function update($data,$id){
		
		$this->db->where('id',$id);
		$this->db->update('s_division',$data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}	
	}
	
	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('s_division'); 
		if ($this->db->affected_rows() > 0) {
			return true;
		}	
	}
	
	public function fetchbyid($id){
		$condition = "id=".$id;
		$this->db->select('*');
		$this->db->from('s_division');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {	
			return $query->result();
		} else {
			return false;
		}
	}
	
}

?>