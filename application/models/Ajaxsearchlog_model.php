<?php
class Ajaxsearchlog_model extends CI_Model
{
 function fetch_data($query,$uid)
 {
  $this->db->select("*");
  $this->db->from("posts");
  $this->db->join('categories','categories.id=posts.category_id');
  $this->db->join('schoolcontacts','schoolcontacts.cid=posts.cid');
  $this->db->join('user','user.uid=posts.uid');
  $this->db->join('flags','flags.flag=posts.flag');
  $this->db->join('schooldetails','schoolcontacts.sid=schooldetails.sid');
//   $this->db->where('user.uid',$uid);
  if($query != '')
  {
   $this->db->like('schoolcontacts.fullName', $query);
   $this->db->or_like('categories.name', $query);
   $this->db->or_like('body', $query);
   $this->db->or_like('user.username', $query);
   $this->db->or_like('date', $query);
   $this->db->or_like('schooldetails.schoolName', $query);
   
   
  }
  return $this->db->get();
 }
 
 }

?>