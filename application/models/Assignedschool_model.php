<?php

class Assignedschool_model extends CI_Model {

 public function getAssignedSchoolsIds($uid){
	$this->db->select("*");
   $this->db->from("coordinator");
   $this->db->where('uid', $uid);
   $query = $this->db->get();        
   return $query->result();
 }

//  public function getAssignedSchoolNames($data){
// 	echo $data[0];
//  }


public function getAssignedSchoolsNames($data){
	$schoolarray= array();
	foreach($data['item'] as $x){
		array_push($schoolarray,(int)($x->sid));
		
	}
	
	$this->db->where_in('sid', $schoolarray);
	$query = $this->db->get('schooldetails');
	
	return $query->result();

}

public function getAllSchools(){
	$this->db->select("*");
   $this->db->from("schoolDetails");
   $query = $this->db->get();        
   return $query->result();
}

}
?>
