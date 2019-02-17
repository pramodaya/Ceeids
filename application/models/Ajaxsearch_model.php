<?php
class Ajaxsearch_model extends CI_Model
{
 function fetch_data($query,$sid)
 {
	
	$this->db->select('*');
	$this->db->from('schoolcontacts');
	$this->db->where('sid', $sid);
	$this->db->join('designation', 'designation.did = schoolcontacts.did');
	
  if($query != '')
  {
	$this->db->group_start();
	 $this->db->like('title', $query);
	 $this->db->or_like('firstName', $query);
	 $this->db->or_like('lastName', $query);
	 $this->db->or_like('address1', $query);
	 $this->db->or_like('address2', $query);     
	 $this->db->or_like('address3', $query);     
	 $this->db->or_like('city', $query);
	 $this->db->or_like('district', $query);
	$this->db->or_like('email', $query);
	 $this->db->or_like('alYear', $query);
  	$this->db->or_like('alStream', $query);
	$this->db->or_like('designation.designation', $query);

	$this->db->group_end();
  }
  $this->db->order_by('cid', 'DESC');
  return $this->db->get();
 }
}
?>
