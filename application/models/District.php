<?php

Class District extends CI_Model {
		
	public function fetchall($division = 0) {
		
		if($division != 0){
			$this->db->where('division_id',$division);
		}
		$this->db->select('*');
		$this->db->from('s_districts');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {	
			return $query->result();
		} else {
			return false;
		}
	}

	public function fetchalldirectordivision($division = 0) {
		
		if($division != 0){
			$this->db->where('division_for_director',$division);
		}
		$this->db->select('*');
		$this->db->from('s_districts');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {	
			return $query->result();
		} else {
			return false;
		}
	}

	public function fetchTaluka($id=0){
		$this->db->select('*');
		$this->db->from('s_taluka');
		$this->db->where('district_id',$id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {	
			return $query->result();
		} else {
			return false;
		}
	}
	
	public function add($data){
		
		$this->db->insert('s_districts', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
		
	}
	
	public function update($data,$id){
		
		$this->db->where('id',$id);
		$this->db->update('s_districts',$data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}	
	}
	
	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('s_districts'); 
		if ($this->db->affected_rows() > 0) {
			return true;
		}	
	}
	
	public function fetchbyid($id){
		$condition = "id=".$id;
		$this->db->select('*');
		$this->db->from('s_districts');
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