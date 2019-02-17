<?php

class Schoolcontact_model extends CI_Model {

	public function getSchool($schoolId){
		$this->db->where('sid',$schoolId);
		$result = $this->db->get('schooldetails');

		if($result->num_rows()==1){
			return $result->result();
		}else{
			return false;
		}
	}

	public function getSchoolUsers($sid){
		$sid = (int)$sid;
		$this->db->where('sid',$sid);
		$result = $this->db->get('schoolcontacts');

		if($result->num_rows()>0){
			return $result->result();
		}else{
			return false;
		}

	}

	public function getSingleSchoolUser($contactId){
		$contactId = (int)$contactId;
		$this->db->where('cid',$contactId);
		$result = $this->db->get('schoolcontacts');

		if($result->num_rows()>0){
			return $result->result();
		}else{
			return false;
		}
	}

	public function getSingleSchool($sid){
		$this->db->where('sid',$sid);
		$result = $this->db->get('schoolDetails');

		if($result->num_rows()>0){
			return $result->result();
		}else{
			return false;
		}
	}

	public function updateSchoolData($data){

		 if($data['schoolImg']){
			$newData = array( 
		'schoolName' =>  $data['schoolname'],				
		'email' =>$data['schoolemail'],		
		'contactNumber' =>$data['contactNumber'] ,
		'contactNumberOptional' =>$data['contactNumberOptional'],		
		'fax' =>$data['fax'],
		'faxOptional' =>$data['faxOptional'],		
		'webUrl' =>$data['schoolweburl'],		
        'address1' =>$data['address1'],
        'address2' =>$data['address2'],
        'address3' =>$data['address3'],
		'addressCity' => $data['schoolcity'],
        'orgType' =>$data['organizational_type'],
		'schoolType1' => $data['public_type'],
        'schoolType2' =>$data['gender_type'],
		'schoolType3' => $data['national_type'],
        'schoolType4' =>$data['ab_type'],
        'school1002' =>$data['sch1002_type'] ,
        'province' =>$data['province_type'] ,
		'district' => $data['district_type'],
        'zone' =>$data['zone_type'] ,
        'division' =>$data['division_type'], 
		'mediumOfStudies' => $data['medium'],
        'academicProgression' =>$data['acadamic'],    
        'typeOfALs' =>$data['type_of_al'],
        'typeOfOLs' =>$data['type_of_ol'],
        'totalNumberOfStudents' =>$data['totalstudents'],
		'totalNumberOfTeachers' => $data['totalteachers'],
        'localBioSinhala' =>$data['albiosinhala'],
		'localBioEnglish' => $data['albioenglish'] ,
        'localBioEnglish' =>$data['albiotamil'] ,

        'localPhysicalSinhala' =>$data['alpssinhala'],
		'localPhysicalEnglish' => $data['alpsenglish'],
		'localPhysicalTamil' => $data['alpstamil'],

        'localCommerceSinhala' =>$data['alcomsinhala'],
		'localCommerceEnglish' => $data['alcomenglish'],
		'localCommerceTamil' => $data['alcomtamil'],

        'localArtsSinhala' =>$data['alartssinhala'] ,
		'localArtsEnglish' => $data['alartsenglish'],
		'localArtsTamil' =>  $data['alartstamil'] ,

		'localTechSinhala' => $data['altecsinhala'],
		'localTechEnglish' => $data['altecenglish'] ,
        'localTechTamil' =>$data['altectamil'] ,

		'londonBioEng' => $data['allonbio'],
		'londonPhysicalEng' => $data['allonps'],
		'londonCommerceEng' => $data['alloncom'] ,
		'londonArtsEng' => $data['allonarts'],
		'londonTechEng' => $data['allontec'] ,
		'contactNumber' =>$data['sid'],
		'schoolImg' =>  $data['schoolImg']
			);				
			$this->db->where('sid', (int)$data['sid']);
			$this->db->update('schooldetails', $newData);

		 }else{
			$newData = array( 
				'schoolName' =>  $data['schoolname'],				
		'email' =>$data['schoolemail'],		
		'contactNumber' =>$data['contactNumber'] ,
		'contactNumberOptional' =>$data['contactNumberOptional'],
		
		'fax' =>$data['fax'],
		'faxOptional' =>$data['faxOptional'],
		
		'webUrl' =>$data['schoolweburl'],
		
        'address1' =>$data['address1'],
        'address2' =>$data['address2'],
        'address3' =>$data['address3'],
		'addressCity' => $data['schoolcity'],
        'orgType' =>$data['organizational_type'],
		'schoolType1' => $data['public_type'],
        'schoolType2' =>$data['gender_type'],
		'schoolType3' => $data['national_type'],
        'schoolType4' =>$data['ab_type'],
        'school1002' =>$data['sch1002_type'] ,
        'province' =>$data['province_type'] ,
		'district' => $data['district_type'],
        'zone' =>$data['zone_type'] ,
        'division' =>$data['division_type'],

    
		'mediumOfStudies' => $data['medium'],


        'academicProgression' =>$data['acadamic'],

      
        'typeOfALs' =>$data['type_of_al'],

        'typeOfOLs' =>$data['type_of_ol'],

        'totalNumberOfStudents' =>$data['totalstudents'],
		'totalNumberOfTeachers' => $data['totalteachers'],

        'localBioSinhala' =>$data['albiosinhala'],
		'localBioEnglish' => $data['albioenglish'] ,
        'localBioEnglish' =>$data['albiotamil'] ,

        'localPhysicalSinhala' =>$data['alpssinhala'],
		'localPhysicalEnglish' => $data['alpsenglish'],
		'localPhysicalTamil' => $data['alpstamil'],

        'localCommerceSinhala' =>$data['alcomsinhala'],
		'localCommerceEnglish' => $data['alcomenglish'],
		'localCommerceTamil' => $data['alcomtamil'],

        'localArtsSinhala' =>$data['alartssinhala'] ,
		'localArtsEnglish' => $data['alartsenglish'],
		'localArtsTamil' =>  $data['alartstamil'] ,

		'localTechSinhala' => $data['altecsinhala'],
		'localTechEnglish' => $data['altecenglish'] ,
        'localTechTamil' =>$data['altectamil'] ,

		'londonBioEng' => $data['allonbio'],
		'londonPhysicalEng' => $data['allonps'],
		'londonCommerceEng' => $data['alloncom'] ,
		'londonArtsEng' => $data['allonarts'],
		'londonTechEng' => $data['allontec'] ,
		'contactNumber' =>$data['sid']

			);				
	
			$this->db->where('sid', (int)$data['sid']);
			$this->db->update('schooldetails', $newData);
			
		 }
		
	}





	public function saveUpdatedSingleUser($data){
		$newData = array( 
			'title' =>  $data['title'], 
			'firstName' =>  $data['firstName'], 
			'lastName' =>  $data['lastName'], 
			'email' =>  $data['email'], 

			'mobile' =>  $data['mobile'], 
			'residenceNo' =>  $data['residence'], 
			
			'mobileOptional' =>  $data['mobileOptional'], 
			'residenceNoOptional' =>  $data['residenceOptional'], 

			'nic' =>  $data['nic'], 
			'passportNo' =>  $data['passportNo'], 
			
			'address1' =>  $data['address1'], 
			'address2' =>  $data['address2'], 
			'address3' =>  $data['address3'], 
			'city' =>  $data['city'], 
			'district' =>  $data['district'], 

			'alYear' =>  $data['alYear'], 
			'alStream' =>  $data['stream'],
			'did' => $data['did']
		);				

		$this->db->where('cid', (int)$data['cid']);
		$this->db->update('schoolcontacts', $newData);
	
	}
	public function addSingleUser($data){
		$newData = array( 
			'title' =>  $data['title'], 
			'firstName' =>  $data['firstName'], 
			'lastName' =>  $data['lastName'], 
			'email' =>  $data['email'], 

			'mobile' =>  $data['mobile'], 
			'residenceNo' =>  $data['residence'], 
			
			'mobileOptional' =>  $data['mobileOptional'], 
			'residenceNoOptional' =>  $data['residenceOptional'], 

			'nic' =>  $data['nic'], 
			'passportNo' =>  $data['passportNo'], 
			
			'address1' =>  $data['address1'], 
			'address2' =>  $data['address2'], 
			'address3' =>  $data['address3'], 
			'city' =>  $data['city'], 
			'district' =>  $data['district'], 

			'alYear' =>  $data['alYear'], 
			'alStream' =>  $data['stream'], 
	
			'did' => (int) $data['designation'],
			'sid' =>  $data['sid']
		);				

		$this->db->insert('schoolcontacts',$newData);
		return true;
	}


	public function getDesignations(){
		$this->db->select("*"); 
 	    $this->db->from('designation');
  		$query = $this->db->get();
 	    return $query->result();
	}

	public function addDesignationReq($designation){
		$newData = array(
			'designation' => $designation['designationReq']
		);
		$this->db->insert('designationreq',$newData);
		
	}

	public function getOtherId(){
		$this->db->select("did"); 
		 $this->db->from('designation');
		 $this->db->where('designation','other');
		  $query = $this->db->get();
		  
		 return $query->result();
		 
	}

    public function saveAdminMessage($title,$description,$fullname,$file_name){
        $data = array(
            'sent_by'=>$fullname,
            'title'=>$title,
            'description'=>$description,
            'file_name'=>$file_name,

        );

        $this->db->insert('messages_to_admin',$data);

        $insert_id = $this->db->insert_id();

        return  $insert_id;
    }
    public function upload_image($file_name,$msg_id){
        $data = array(
            'file_name'=>$file_name,

        );
        $this->db->where('msg_id', $msg_id);
        $this->db->update('messages_to_admin', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    public function getAllStudents($name,$email){

        $this->db->select("*");
        $this->db->from("schoolcontacts");

        if ($name != '' || $email != ''){
            $this->db->where('did',4);
            $this->db->like('firstName', $name);
            $this->db->or_like('lastName', $name);

        }
        $this->db->where('did',4);
        $this->db->order_by('cid', 'DESC');
        return $this->db->get();


	}
	//Get all Organizational events
	public function getAllEvents(){
        $this->db->select("*");
        $this->db->from("organizational_event");
        $query = $this->db->get();
        return $query->result();
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

    public function submitStudents($eventid,$schoolName,$students){
        foreach($students as $selected)
        {
            $data = array(
                'org_id' => $eventid,
                'school' => $schoolName,
                'cid' => $selected,
            );

            $this->db->insert('event_student_list', $data);

        }
        return ($this->db->affected_rows() != 1) ? false : true;


    }



}




?>
