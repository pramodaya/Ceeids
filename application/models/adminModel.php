<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class AdminModel extends CI_Model {
    public function register_User($firstname,$lastname,$email,$type,$contact_number,$image_url){

        $data = array(
            'firstName'=>$firstname,
            'lastName'=>$lastname,
            'email'=>$email,
            'userType'=>$type,
            'contactNumber'=>$contact_number,
            'imgUrl'=>$image_url,
            'signInTime' =>date('Y-m-d H:i:s')
        );

        $this->db->insert('userdetails',$data);

        return ($this->db->affected_rows() != 1) ? false : true;
    }
    public function delete_User($user_id){

        $data = array(
            'flag'=>0,
            'signOutTime'=>date('Y-m-d H:i:s'),
        );
        $this->db->where('uid', $user_id);
        $this->db->update('userdetails', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    public function edit_User($user_id){
        $this->db->where('uid', $user_id);
        $this->db->select('uid,firstName,lastName,email,userType,contactNumber,imgUrl,signInTime');
        $user_data = $this->db->get('userdetails');
        if($user_data->num_rows() > 0)
        {
            // we will store the results in the form of class methods by using $q->result()
            // if you want to store them as an array you can use $q->result_array()
            foreach ($user_data->result() as $row)
            {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function edit_User_Final($id,$firstname,$lastname,$email,$type,$contact_number){

        $data = array(
            'firstName'=>$firstname,
            'lastName'=>$lastname,
            'email'=>$email,
            'userType'=>$type,
            'contactNumber'=>$contact_number,
        );
        $this->db->where('uid', $id);
        $this->db->update('userdetails', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function select()
    {
        $this->db->order_by('cid', 'DESC');
        $query = $this->db->get('schoolcontacts');
        return $query;
    }

    public function getlastrow($data,$data1){
        $row = $this->db->select("*")->limit(1)->order_by('cid',"DESC")->get("schoolcontacts")->row();
        return ($this->db->affected_rows() != 1) ? false : $row->cid;
    }


    public function insert1($data)
    {
        $this->db->insert_batch('schoolcontacts', $data);
        $this->db->query('DELETE t1 FROM schoolcontacts t1
        INNER JOIN
    schoolcontacts t2 
WHERE
    t1.cid < t2.cid AND t1.email = t2.email');

    }

    public function filename_exists($username)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('userName', $username);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    //Assign User to database
    public function assign_User($uid,$username,$password,$type){
        $data = array(
            'uid'=>$uid,
            'userName'=>$username,
            'password'=>$password,
            'type'=>$type,

        );

        $this->db->insert('user',$data);

        return ($this->db->affected_rows() != 1) ? false : true;
    }
    public function assign_ExUserwithPassword($uid,$username,$password){

        $data = array(
            'uid'=>$uid,
            'userName'=>$username,
            'password'=>$password,

        );
        $this->db->where('userName', $username);
        $this->db->update('user', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    public function assign_ExUser($uid,$username){
        $data = array(
            'uid'=>$uid,
            'userName'=>$username,
            'password'=>'123',
            'type' => 'Admin'

        );
        $this->db->where('userName', $username);
        $this->db->update('user', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    public function getNumberofRequests(){
//        $this->db->from('designationreq');
//        $query = $this->db->get();
        $rowcount = $this->db->count_all_results('designationreq', false);

//        $rowcount = $query->num_rows();
        return $rowcount;
    }
    public function getNumberofAdminMessages(){
//        $this->db->from('messages_to_admin');
        $rowcount = $this->db->count_all_results('messages_to_admin');
//        var_dump($rowcount); die;
//        $rowcount = $query->num_rows();
        return $rowcount;
    }
    public function getNumberofAdminEvents(){

//        $this->db->from('event_student');
//        $query = $this->db->get();
        $rowcount = $this->db->count_all_results('event_student');
//        $rowcount = $query->num_rows();
        return $rowcount;
    }
    public function getDesignationRequests(){
        $user_data = $this->db->query('SELECT 
            designation, 
            drid,
            COUNT(designation) as count
        FROM
            designationreq
        GROUP BY designation');

        if($this->db->affected_rows() != 0){
            foreach ($user_data->result() as $row)
            {
                $data[] = $row;
            }
            return $data;
        }
        else{
            return false;
        }


    }
    public function getMessages(){
        $user_data = $this->db->query('SELECT 
            msg_id, 
            sent_by, 
            title,
            description,
            file_name,
            COUNT(title) as count
        FROM
            messages_to_admin
        GROUP BY title');

        if($this->db->affected_rows() != 0){
            foreach ($user_data->result() as $row)
            {
                $data[] = $row;
            }
            return $data;
        }
        else{
            return false;
        }


    }
    public function addRequest($designation){
        $data = array(
            'designation'=>$designation,

        );

        $this->db->insert('designation',$data);

        return ($this->db->affected_rows() != 1) ? false : true;

    }
    public function deleteRequest($id){
        $this->db->where('drid', $id);
        $this->db->delete('designationreq');

    }
    public function deleteFile($msg_id){
        $this->db->where('msg_id', $msg_id);
        $this->db->delete('messages_to_admin');
    }
    public function searchDesignations($data1){
        $this->db->select('*');
        $this->db->from('designation');

        if ($data1 != ''){
            $this->db->like('designation', $data1);

        }
        $this->db->order_by('did', 'DESC');
        return $this->db->get();
    }
    public function searchCities($data1){
        $this->db->select('*');
        $this->db->from('city');

        if ($data1 != ''){
            $this->db->like('cityName', $data1);

        }
        $this->db->order_by('cityid', 'DESC');
        return $this->db->get();
    }
    public function Add_School($schoolname,$schoolcity,$schoolcontactnumber,$schoolemail,$schoolImg,
                               $organizational_type,$public_type,$gender_type,$national_type,$ab_type,$sch1002_type,$medium,$acadamic,
                               $province_type,$district_type,$zone_type,$division_type,$address1,$address2,$address3,
                               $schoolfax,$schoolweburl,$type_of_ol,$type_of_al,$totalstudents,$totalteachers,$albiosinhala,$albioenglish,
                               $albiotamil,$alpssinhala,$alpsenglish,$alpstamil,$alcomsinhala,$alcomenglish,$alcomtamil,$altecsinhala,$altecenglish,$altectamil,
                               $alartssinhala,$alartsenglish,$alartstamil,$allonbio,$allonps,$alloncom,$allontec,$allonarts){

        $data = array(
            'schoolName'=>$schoolname,
            'city'=>$schoolcity,
            'contactNumber'=>$schoolcontactnumber,
            'email'=>$schoolemail,
            'schoolImg'=>$schoolImg,
            'orgType'=>$organizational_type,
            'schoolType1'=>$public_type,
            'schoolType2'=>$gender_type,
            'schoolType3'=>$national_type,
            'schoolType4'=>$ab_type,
            'school1002'=>$sch1002_type,
            'mediumOfStudies'=>$medium,
            'academicProgression'=>$acadamic,
            'province'=>$province_type,
            'district'=>$district_type,
            'zone'=>$zone_type,
            'division'=>$division_type,
            'address1'=>$address1,
            'address2'=>$address2,
            'address3'=>$address3,
            'addressCity'=>$schoolcity,
            'fax'=>$schoolfax,
            'webUrl'=>$schoolweburl,
            'typeOfOLs'=>$type_of_ol,
            'typeOfALs'=>$type_of_al,
            'totalNumberOfStudents'=>$totalstudents,
            'totalNumberOfTeachers'=>$totalteachers,
            'localBioSinhala'=>$albiosinhala,
            'localBioEnglish'=>$albioenglish,
            'localBioTamil'=>$albiotamil,
            'localPhysicalSinhala'=>$alpssinhala,
            'localPhysicalEnglish'=>$alpsenglish,
            'localPhysicalTamil'=>$alpstamil,
            'localCommerceSinhala'=>$alcomsinhala,
            'localCommerceEnglish'=>$alcomenglish,
            'localCommerceTamil'=>$alcomtamil,
            'localArtsSinhala'=>$alartssinhala,
            'localArtsEnglish'=>$alartsenglish,
            'localArtsTamil'=>$alartstamil,
            'localTechSinhala'=>$altecsinhala,
            'localTechEnglish'=>$altecenglish,
            'localTechTamil'=>$altectamil,
            'londonBioEng'=>$allonbio,
            'londonPhysicalEng'=>$allonps,
            'londonCommerceEng'=>$alloncom,
            'londonTechEng'=>$allontec,
//            'londonArtsEng'=>$allonarts,
        );

        $this->db->insert('schooldetails',$data);

        return ($this->db->affected_rows() != 1) ? false : true;

    }
    public function getEventDetails(){
        $user_data = $this->db->query('SELECT 
            evtid, 
            name, 
            description,
            schoolName,
            cid,
            date,
            COUNT(name) as count
        FROM
            event_student
        GROUP BY name');

        if($this->db->affected_rows() != 0){
            foreach ($user_data->result() as $row)
            {
                $data[] = $row;
            }
            return $data;
        }
        else{
            return false;
        }
    }

    //Add nEW Designation to the School
    public function addSchoolDesignation($designation){
        $data = array(
            'designation'=>$designation	,
        );

        $this->db->insert('designation',$data);

        return ($this->db->affected_rows() != 1) ? false : true;

    }
    //Create Pdf
    public function GetDesignations($event_id){
        $user_data = $this->db->query('SELECT 
            did, 
            designation
          
        FROM
            designation
            WHERE event_student.name=\'". $event_name. "\'"
');

        if($this->db->affected_rows() != 0){
            foreach ($user_data->result() as $row)
            {
                $data[] = $row;
            }
            return $data;
        }
        else{
            return false;
        }
    }

    public function AddOrganizationalEvent($name,$description,$date,$time,$place){
        $data = array(
            'name'=>$name,
            'description'=>$description,
            'date'=>$date,
            'time'=>$time,
            'venue'=>$place,
        );

        $this->db->insert('organizational_event',$data);

        return ($this->db->affected_rows() != 1) ? false : true;
    }
    //Get all Organizational events
    public function getAllEvents(){
    $this->db->select("*");
    $this->db->from("organizational_event");
    $query = $this->db->get();
    return $query->result();
}
    public function getAllSchools(){
        $this->db->select("*");
        $this->db->from("schooldetails");
        $query = $this->db->get();
        return $query->result();
    }
    public function getEventWiseStudentList($eventid){
        $user_data = $this->db->query("SELECT event_student_list.cid,schoolcontacts.firstName as fname,schoolcontacts.title as title,schoolcontacts.lastName as lname,schoolcontacts.email as email,schoolcontacts.mobile as mobile FROM event_student_list 
INNER JOIN schoolcontacts ON event_student_list.cid=schoolcontacts.cid WHERE event_student_list.org_id='". $eventid. "'");


        if($this->db->affected_rows() != 0){
            foreach ($user_data->result() as $row)
            {
                $data[] = $row;
            }
            return $data;
        }
        else{
            return false;
        }
    }
    //Get School Wise Student List
    public function getSchoolWiseStudentList($eventid,$schoolName){
        $user_data = $this->db->query("SELECT event_student_list.cid,schoolcontacts.firstName as fname,schoolcontacts.title as title,schoolcontacts.lastName as lname,schoolcontacts.email as email,schoolcontacts.mobile as mobile FROM event_student_list 
INNER JOIN schoolcontacts ON event_student_list.cid=schoolcontacts.cid WHERE event_student_list.org_id='". $eventid. "' AND event_student_list.school='". $schoolName. "'");


        if($this->db->affected_rows() != 0){
            foreach ($user_data->result() as $row)
            {
                $data[] = $row;
            }
            return $data;
        }
        else{
            return false;
        }
    }
    //Get Event Details here

    public function getEventName($event_id){
        $this->db->where('org_id',$event_id);
        $this->db->select('name');
        $user_data = $this->db->get('organizational_event');
        if($user_data->num_rows() > 0)
        {
            return $user_data->row(0)->name;
        }
        return false;
    }
    public function getEventDescription($event_id){
        $this->db->where('org_id',$event_id);
        $this->db->select('description');
        $user_data = $this->db->get('organizational_event');
        if($user_data->num_rows() > 0)
        {
            return $user_data->row(0)->description;
        }
        return false;
    }
    public function getEventDate($event_id){
        $this->db->where('org_id',$event_id);
        $this->db->select('date');
        $user_data = $this->db->get('organizational_event');
        if($user_data->num_rows() > 0)
        {
            return $user_data->row(0)->date;
        }
        return false;
    }
    public function getEventTime($event_id){
        $this->db->where('org_id',$event_id);
        $this->db->select('time');
        $user_data = $this->db->get('organizational_event');
        if($user_data->num_rows() > 0)
        {
            return $user_data->row(0)->time;
        }
        return false;
    }
    public function getSchoolName($sid){


        $this->db->where('sid',$sid);
        $this->db->select('schoolName');
        $user_data = $this->db->get('schooldetails');
        if($user_data->num_rows() > 0)
        {
            return $user_data->row(0)->schoolName;
        }
        return false;

    }

    //Allocate schools to users

    public function getCoordinator($user_id){
        $this->db->where('uid', $user_id);
        $this->db->select('*');
        $user_data = $this->db->get('userdetails');
        
        if($user_data->num_rows() > 0)
        {
            foreach ($user_data->result() as $row)
            {
                $data[] = $row; 
            }
            return $data;
        }
      }
  
      public function getAssignedSchools($user_id)
      {
        $this->db->where('uid', $user_id);
        $this->db->select('schooldetails.sid,schooldetails.schoolName');
        $this->db->from('coordinator');
        $this->db->join('schooldetails','schooldetails.sid=coordinator.sid');
  
        return $this->db->get();
      }
  
      //get details of school assigned to school admin by uid
  
      public function getSingleSchool($uid)
      {
        $this->db->where('schoolAdmin', $uid);
        $this->db->select('*');
        $school_data = $this->db->get('schooldetails');
  
        return $school_data;
      }
  
      public function getSchools($query)
      {
        $this->db->select('schooldetails.sid,schooldetails.schoolName,schooldetails.city,schooldetails.assigned,schooldetails.schoolAdmin,userdetails.firstName');
        $this->db->from('schooldetails');
        $this->db->join('coordinator','coordinator.sid=schooldetails.sid','Left');
        $this->db->join('userdetails','userdetails.uid=coordinator.uid','Left');
        
        if($query != '')
        {
        $this->db->like('schoolName', $query);
        $this->db->or_like('city', $query);
        }
        else if($query == '')
        {
            $this->db->like('schoolName', '%^!X');
          //   $this->db->like('schooldetails.schoolName', $query);
          // $this->db->or_like('schooldetails.city', $query);
        }
        
        //$this->db->order_by('sid', 'DESC');
        return $this->db->get();
      }
  
      function makeAllocations($uid, $school_id)
      {
          foreach($school_id as $selected)
          {
              $data = array(
                  'uid' => $uid,
                  'sid' => $selected
              );
      
              $this->db->insert('coordinator', $data);
  
              $this->db->set('assigned', 1);
              $this->db->where('sid', $selected);
              $this->db->update('schooldetails');
          }
      
      }
  
      function assignSchoolAdmin($uid, $sid)
      {
          $data = array(
              'uid' => $uid,
              'sid' => $sid
          );
  
          $this->db->insert('coordinator', $data);
  
          $this->db->set('schoolAdmin', $uid);
          $this->db->where('sid', $sid);
          $this->db->update('schooldetails');
      }
  
      function deleteAllocation($school_id)
      {
          $this->db->set('assigned', 0);
          $this->db->where('sid', $school_id);
          $this->db->update('schooldetails');
  
          $this->db->where('sid', $school_id);
          $this->db->delete('coordinator');
  
      }
  
      function deleteSchoolAdmin($school_id, $user_id)
      {
          $this->db->set('schoolAdmin', 0);
          $this->db->where('sid', $school_id);
          $this->db->update('schooldetails');
  
          $this->db->where('uid', $user_id);
          $this->db->delete('coordinator');
      }
  
      function filterSchools($public_type, $gender_type, $national_type, $ab_type, $province_type, $district_type, 
      $zone_type, $division_type, $medium, $acadamic, $type_of_al, $type_of_ol)
      {
  
          $where_publictype = "";
          $where_gendertype = "";
          $where_nationaltype = "";
          $where_abtype = "";
          $where_provincetype = "";
          $where_districttype = "";
          $where_zonetype = "";
          $where_divisiontype = "";
          $where_medium = "";
          $where_academic = "";
          $where_altype = "";
          $where_oltype = "";
  
          if($public_type != "Select")
          {
              $where_publictype = "schoolType1="."'".$public_type."'"." AND";
          }else
          {
              $where_publictype = "schoolType1 IS NOT NULL AND";
          }
  
          if($gender_type != "Select")
          {
              $where_gendertype = "schoolType2="."'".$gender_type."'"." AND";
          }else
          {
              $where_gendertype = "schoolType2 IS NOT NULL AND";
          }
  
          if($national_type != "Select")
          {
              $where_nationaltype = "schoolType3="."'".$national_type."'"." AND";
          }else
          {
              $where_nationaltype = "schoolType3 IS NOT NULL AND";
          }
  
          if($ab_type != "Select")
          {
              $where_abtype = "schoolType4="."'".$ab_type."'"." AND";
          }else
          {
              $where_abtype = "schoolType4 IS NOT NULL AND";
          }
  
          if($province_type != "Select Province")
          {
              $where_provincetype = "province="."'".$province_type."'"." AND";
          }else
          {
              $where_provincetype = "province IS NOT NULL AND";
          }
  
          if($district_type != "Select District")
          {
              $where_districttype = "district="."'".$district_type."'"." AND";
          }else
          {
              $where_districttype = "district IS NOT NULL AND ";
          }
  
          if($zone_type != "Select Zone")
          {
              $where_zonetype = "zone="."'".$zone_type."'"." AND";
          }else
          {
              $where_zonetype = "zone IS NOT NULL AND ";
          }
  
          if($division_type != "Select Division")
          {
              $where_divisiontype = "division="."'".$division_type."'"." AND";
          }else
          {
              $where_divisiontype = "division IS NOT NULL AND";
          }
  
          if($medium != "")
          {
              $where_medium = "mediumOfStudies="."'".$medium."'"." AND";
          }else
          {
              $where_medium = "mediumOfStudies IS NOT NULL AND";
          }
  
          if($acadamic != "")
          {
              $where_academic = "academicProgression="."'".$acadamic."'";
          }else
          {
              $where_academic = "academicProgression IS NOT NULL";
          }
  
          // if($type_of_al != "")
          // {
          //     $where_altype = "typeOfALs="."'".$type_of_al."'";
          // }else
          // {
          //     $where_altype = "typeOfALs IS NOT NULL";
          // }
  
          // if($type_of_ol != "")
          // {
          //     $where_oltype = "typeOfOLs="."'".$type_of_ol."'";
          // }else
          // {
          //     $where_oltype = "typeOfOLs IS NOT NULL";
          // }
  
          $sql = "SELECT schooldetails.sid,schooldetails.schoolName,schooldetails.city,schooldetails.assigned,userdetails.firstName 
                  FROM schooldetails LEFT JOIN coordinator ON schooldetails.sid=coordinator.sid LEFT JOIN userdetails ON coordinator.uid=userdetails.uid
                  WHERE $where_publictype $where_gendertype $where_nationaltype $where_abtype $where_provincetype $where_districttype
                  $where_zonetype $where_divisiontype $where_medium $where_academic;";
  
          $query = $this->db->query($sql);
  
          return $query;
      }

}



?>
