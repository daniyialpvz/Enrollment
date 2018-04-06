<?php

Class Enrollment extends CI_Model {
		
	public function fetchall() {
		
		$this->db->select('*');
		$this->db->from('s_enrollment');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {	
			return $query->result();
		} else {
			return false;
		}
	}
	
	public function fetchForReportDefault($district_id = 0){
		$condition = "s_enrollment.district =".$district_id;
		$this->db->select('s_enrollment.id, s_districts.name AS district, s_enrollment.tehsil, s_enrollment.ucs, s_enrollment.semis_code, s_enrollment.school_name, s_enrollment.level, s_enrollment.gender, s_enrollment.viability_status, s_enrollment.status');
		$this->db->from('s_districts');
		$this->db->join('s_enrollment', 's_districts.id = s_enrollment.district');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {	
			return $query->result();
		} else {
			return false;
		}
	}

	public function fetchForReport($district = 0){
		$condition = "district=".$district;
		$this->db->select('*');
		$this->db->from('s_enrollment');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {	
			return $query->result();
		} else {
			return false;
		}
	}

	public function addBeforeApril($data){
		
		$this->db->insert('s_enr_before_april', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
		
	}

	public function addAfterApril($data){
		
		$this->db->insert('s_enr_after_april', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
		
	}

	public function addGrandTotal($data){
		
		$this->db->insert('s_enr_total', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
		
	}
	
	public function update($data,$id){
		
		$this->db->where('id',$id);
		$this->db->update('s_enrollment',$data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}	
	}
	
	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('s_enrollment'); 
		if ($this->db->affected_rows() > 0) {
			return true;
		}	
	}

	public function fetchClasses(){
		$this->db->select('*');
		$this->db->from('s_classes');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {	
			return $query->result();
		} else {
			return false;
		}
	}
	
	// public function fetchBySemisCode($semis_code){
	// 	$condition = "semis_code=".$semis_code;
	// 	$this->db->select('*');
	// 	$this->db->from('s_enrollment');
	// 	$this->db->where($condition);
	// 	$query = $this->db->get();
	// 	if ($query->num_rows() > 0) {	
	// 		return $query->result();
	// 	} else {
	// 		return false;
	// 	}
	// }

	public function fetchBySemisCode($semis_code){
		$condition = "s_enrollment.semis_code =".$semis_code;
		$this->db->select('s_enrollment.id, s_districts.name AS district, s_enrollment.tehsil, s_enrollment.ucs, s_enrollment.semis_code, s_enrollment.school_name, s_enrollment.level, s_enrollment.gender, s_enrollment.viability_status, s_enrollment.status');
		$this->db->from('s_districts');
		$this->db->join('s_enrollment', 's_districts.id = s_enrollment.district');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {	
			return $query->result();
		} else {
			return false;
		}
	}

	public function fetchByLevel($level_id = 0){
		$condition = "level=".$level_id;
		$this->db->select('*');
		$this->db->from('s_enrollment');
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