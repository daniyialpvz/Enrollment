<?php

Class CommonModel extends CI_Model {
		
	public function fetchDataForDistrict($id = 0) {
		$query = "SELECT dis.name as district_name,count(*) as total, sum(case when di.status = 1 then 1 else 0 end) as Inprogress,sum(case when di.status = 2 then 1 else 0 end) as Complete,sum(case when di.status = 3 then 1 else 0 end) as Incomplete FROM `s_district_info` as di left join s_districts as dis on di.district_id = dis.id left join s_division as d on dis.division_id = d.id";

		if($id != 0)
		{
			$query .= " where d.id =".$id;
		}

		$query .= " GROUP by di.district_id";

		$record = $this->db->query($query);

		if ($record->num_rows() > 0) {	
			return $record->result();
		} else {
			return false;
		}

	}


	public function fetchDataForSectorActions($agency_id = 0) {
		$query = "SELECT s.id,s.description,s.short,s.attachments,s.objectives, count(*) as total, sum(case when a.status = 1 then 1 else 0 end) as Inprogress,sum(case when a.status = 2 then 1 else 0 end) as Complete,sum(case when a.status = 3 then 1 else 0 end) as Incomplete FROM `s_actions` as a left join s_sectors as s on a.sector_id = s.id";

		if($agency_id != 0)
		{
			$query .= " where a.agency_id =".$agency_id;
		}

		$query .= " GROUP by a.sector_id";

		$record = $this->db->query($query);

		if ($record->num_rows() > 0) {	
			return $record->result();
		} else {
			return false;
		}

	}

	public function fetchDataForAgenciesActions() {
		$query = "SELECT s.id,s.description,s.short, count(*) as total, sum(case when a.status = 1 then 1 else 0 end) as Inprogress,sum(case when a.status = 2 then 1 else 0 end) as Complete,sum(case when a.status = 3 then 1 else 0 end) as Incomplete FROM `s_actions` as a left join s_implementing_agencies as s on a.agency_id = s.id";

		$query .= " GROUP by a.agency_id";

		$record = $this->db->query($query);

		if ($record->num_rows() > 0) {	
			return $record->result();
		} else {
			return false;
		}

	}

	public function fetchallNotification($id) {
		$query = "SELECT n.tagged_date_time,s1.description as agency,s2.description as imp_agency FROM s_imp_notifications as n left join s_implementing_agencies as s1 on n.agency_id = s1.id left join s_implementing_agencies as s2 on n.imp_agency_id = s2.id where n.imp_agency_id = ".$id." limit 10";

		$record = $this->db->query($query);
		if ($record->num_rows() > 0) {	
			return $record->result();
		} else {
			return false;
		}
	}
	
	public function addNotification($data){
		
		$this->db->insert('s_imp_notifications', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
		
	}
	
	
}

?>