<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SchoolContacts extends CI_Controller {
	


	// public function index(){
    //     $schoolId = $this->session->userdata('sid');


	// 	//$this->session->set_userdata($arraydata);

	// 	//$schoolId = $this->session->userdata('sid');
	// 	$this->load->model('schoolcontact_model');
	// 	$data['result']=$this->schoolcontact_model->getSchool($schoolId);
	// 	$data['schoolUsers']=$this->schoolcontact_model->getSchoolUsers($schoolId);
	// 	$data['designations']=$this->schoolcontact_model->getDesignations();
	// 	if($data['result']){
	// 		$this->load->view('schoolContactFolder/schoolContactsView',$data);
	// 	}else{
	// 		$this->load->view('schoolContactFolder/schoolContactsView',$data);
	// 	}

	// 	// $this->load->view('schoolContactFolder/schoolContactsView');
	// }
	public function index($para = NULL){
		// $current_sid = $this->session->userdata('current_sid');
		
		if($para!=NULL){	
			$schoolId = (int)$para;
		}else{
			if(isset($_GET['sid'])){
				$schoolId = $_GET['sid'];
			}else{
				$schoolId = $this->session->userdata('sid');
			}
	
		}
		
		$data['sid']=$schoolId;
		
		// if(isset($_POST['sid'])){
		// 	// $this->session->unset_userdata('current_sid');
		// 	// $this->session->set_userdata('current_sid',$_POST['sid']);
		// 	$schoolId = $_POST['sid'];
		// }

		
		
		$this->load->model('schoolcontact_model');
		$data['result']=$this->schoolcontact_model->getSchool($schoolId);
		$data['schoolUsers']=$this->schoolcontact_model->getSchoolUsers($schoolId);
		
		$data['designations']=$this->schoolcontact_model->getDesignations();
		if($data['result']){
			$this->load->view('schoolContactFolder/schoolContactsView',$data);
		}else{
			$this->load->view('schoolContactFolder/schoolContactsView',$data);
		}

		// $this->load->view('schoolContactFolder/schoolContactsView');
	}

	
	public function addUsers(){
		$this->load->model('schoolcontact_model');
		$data['designations']=$this->schoolcontact_model->getDesignations();
		$this->load->view('schoolContactFolder/addUsers',$data);
	}


	public function saveNewUsers(){
		
		$data['title']= $_POST['title'];
		$data['firstName']= $_POST['firstName'];
		$data['lastName']= $_POST['lastName'];

		$data['email']= $_POST['email'];
		$data['mobile']= $_POST['mobile'];
		$data['residence']= $_POST['residence'];
		$data['mobileOptional']= $_POST['mobileOptional'];
		$data['residenceOptional']= $_POST['residenceOptional'];
		
		$data['nic']= $_POST['nic'];
		$data['passportNo']= $_POST['passportNo'];

		$data['address1']= $_POST['address1'];
		$data['address2']= $_POST['address2'];
		$data['address3']= $_POST['address3'];
		$data['city']= $_POST['city'];
		$data['district']= $_POST['district'];

		$data['alYear']= $_POST['alYear'];
		$data['stream']= $_POST['stream'];

		if( $_POST['designationReq']){
			$designation['designationReq'] = $_POST['designationReq'];
			$this->load->model('schoolcontact_model');
			$this->schoolcontact_model->addDesignationReq($designation);
			$otherId= 	$this->schoolcontact_model->getOtherId();
			
			foreach($otherId as $id){
				$data['designation']= $id->did;
			}
			
		}else{
			$data['designation']= $_POST['designation'];
		}
		
		// get the school id from the session
		$data['sid'] = $this->session->userdata('sid');
		$this->load->model('schoolcontact_model');
		$run = $this->schoolcontact_model->addSingleUser($data);
		
		if($run){
			$this->session->set_flashdata('added','New User Added Successfully');
			$this->index();
		}else{
			$this->session->set_flashdata('notAdded','Something Is Wrong...');
			$this->addUsers();
		}
		
	

	}



	
	public function updateSchoolDetails(){
		if ( isset($_GET['sid']) ) {
			$schoolId= $_GET['sid'];
			
			$this->load->model('schoolcontact_model');
			$data['singleSchoolData']=$this->schoolcontact_model->getSingleSchool($schoolId);
			if($data['singleSchoolData']){
				
				$this->load->view('schoolContactFolder/updateSchoolData',$data);

			}else{
				echo 'no data';
			}
			// $this->load->view('schoolContactFolder/updateSchoolData',$data);



			
		}else{
			echo 'no data';
		}
	}


	public function saveUpdatedData(){
		$sid= $this->input->post('sid');
		$data['sid'] = $sid;

		$config['upload_path']='./assets';
		$config['allowed_types']='*';
		$this->load->library('upload',$config);
		$this->upload->do_upload('file_name');
		$file_name=$this->upload->data();
		

		$img =$file_name['file_name'];


		if($img){
			$data['schoolImg']=$img;
		}else{
			$data['schoolImg'] = false;
		}

		$data['schoolname'] = $this->input->post('schoolname');
		

		$data['schoolemail'] = $this->input->post('schoolemail');
		
		$data['contactNumber'] = $this->input->post('contactNumber');
		$data['contactNumberOptional'] = $this->input->post('contactNumberOptional');
		
		if($this->input->post('fax')){
			$data['fax'] = $this->input->post('fax');
		}else{
			$data['fax']= "None";
		}

		if($this->input->post('fax')){
			$data['faxOptional'] = $this->input->post('faxOptional');
		}else{
			$data['faxOptional']= "None";
		}
		
		

		if($this->input->post('schoolweburl')){
			$data['schoolweburl'] = $this->input->post('schoolweburl');
		}else{
			$data['schoolweburl']= "None";
		}
        $data['address1'] = $this->input->post('address1');
        $data['address2'] = $this->input->post('address2');
        $data['address3']= $this->input->post('address3');
        $data['schoolcity'] = $this->input->post('schoolcity');
        $data['organizational_type'] = $this->input->post('organizational_type');
        $data['public_type'] = $this->input->post('public_type');
        $data['gender_type'] = $this->input->post('gender_type');
        $data['national_type'] = $this->input->post('national_type');
        $data['ab_type'] = $this->input->post('ab_type');
        $data['sch1002_type'] = $this->input->post('1002_type');
        $data['province_type'] = $this->input->post('province_type');
        $data['district_type'] = $this->input->post('district_type');
        $data['zone_type'] = $this->input->post('zone_type');
        $data['division_type'] = $this->input->post('division_type');

        $sinhala = $this->input->post('sinhala');
        $english = $this->input->post('english');
        $tamil = $this->input->post('tamil');
        $data['medium'] = $sinhala." ".$english." ".$tamil;


        $data['acadamic'] = $this->input->post('acadamic');

        $localal= $this->input->post('localal');
        $edexcelal = $this->input->post('edexcelal');
        $cambridgeal= $this->input->post('cambridgeal');
        $data['type_of_al'] =  $localal." ".$edexcelal." ".$cambridgeal;

        $localol= $this->input->post('localol');
        $edexcelol= $this->input->post('edexcelol');
        $cambridgeol = $this->input->post('cambridgeol');
        $data['type_of_ol']=  $localol." ".$edexcelol." ".$cambridgeol;

        $data['totalstudents'] = $this->input->post('totalstudents');
        $data['totalteachers'] = $this->input->post('totalteachers');


        $data['albiosinhala'] = $this->input->post('albiosinhala');
        $data['albioenglish'] = $this->input->post('albioenglish');
        $data['albiotamil'] = $this->input->post('albiotamil');

        $data['alpssinhala'] = $this->input->post('alpssinhala');
        $data['alpsenglish'] = $this->input->post('alpsenglish');
        $data['alpstamil'] = $this->input->post('alpstamil');

        $data['alcomsinhala'] = $this->input->post('alcomsinhala');
        $data['alcomenglish'] = $this->input->post('alcomenglish');
        $data['alcomtamil'] = $this->input->post('alcomtamil');

        $data['alartssinhala'] = $this->input->post('alartssinhala');
        $data['alartsenglish'] = $this->input->post('alartsenglish');
        $data['alartstamil'] = $this->input->post('alartstamil');

        $data['altecsinhala'] = $this->input->post('altecsinhala');
        $data['altecenglish'] = $this->input->post('altecenglish');
        $data['altectamil'] = $this->input->post('altectamil');

        $data['allonbio'] = $this->input->post('allonbio');
        $data['allonps'] = $this->input->post('allonps');
        $data['alloncom'] = $this->input->post('alloncom');
        $data['allonarts'] = $this->input->post('allonarts');
        $data['allontec'] = $this->input->post('allontec');
		
		 $this->load->model('schoolcontact_model');
		 $this->schoolcontact_model->updateSchoolData($data);
		 $this->session->set_flashdata('school_data_updated','school data is updated successfully');


		 $this->index($sid);


	}


	public function editSingleSchoolUser(){
		if ( isset($_GET['cid']) ) {
		
			$cid= $_GET['cid'];
			$this->load->model('schoolcontact_model');
		
			$data['designations']=$this->schoolcontact_model->getDesignations();
			$data['singleSchoolUser']=$this->schoolcontact_model->getSingleSchoolUser($cid);
		
			
			 $this->load->view('schoolContactFolder/updateSingleSchoolUser',$data);

		}else{
			echo 'no data';
		}
	}

	public function saveSingleUser(){

		$sid= $_POST['sid'];
		$data['title']= $_POST['title'];
		$data['firstName']= $_POST['firstName'];
		$data['firstName']= $_POST['firstName'];
		$data['lastName']= $_POST['lastName'];

		$data['email']= $_POST['email'];
		$data['mobile']= $_POST['mobile'];
		$data['residence']= $_POST['residence'];
		$data['mobileOptional']= $_POST['mobileOptional'];
		$data['residenceOptional']= $_POST['residenceOptional'];
		
		if( $_POST['designationReq']){
			$designation['designationReq'] = $_POST['designationReq'];
			$this->load->model('schoolcontact_model');
			$this->schoolcontact_model->addDesignationReq($designation);
			$otherId= 	$this->schoolcontact_model->getOtherId();
			
			foreach($otherId as $id){
				$data['did']= $id->did;
			}
			
		}else{
			$data['did']= $_POST['designation'];
		}

		$data['nic']= $_POST['nic'];
		$data['passportNo']= $_POST['passportNo'];

		$data['address1']= $_POST['address1'];
		$data['address2']= $_POST['address2'];
		$data['address3']= $_POST['address3'];
		$data['city']= $_POST['city'];
		$data['district']= $_POST['district'];

		$data['alYear']= $_POST['alYear'];
		$data['stream']= $_POST['stream'];
		$data['cid']= $_POST['cid'];


		$this->load->model('schoolcontact_model');
		$this->schoolcontact_model->saveUpdatedSingleUser($data);
		$this->session->set_flashdata('user_data_updated','User data is updated successfully');
		 $this->index($sid);

	}


    public function sendFiletoAdmin(){
        if ( isset($_GET['sid']) ) {
            $this->load->view('schoolContactFolder/sendFileToAdmin');

        }
    }
    public function saveMessage(){
        $title = $this->input->post('title');
        $description = $this->input->post('description');
        $fullname = $this->session->userdata('fullname');
        $file_name = 'x.pdf';
        $this->load->model('schoolcontact_model');
        $insert_id = $this->schoolcontact_model->saveAdminMessage($title,$description,$fullname,$file_name);
        if($insert_id){
            $user_data = array(
                'msg_id' => $insert_id,

            );
            $this->session->set_userdata($user_data);
            $this->load->view('schoolContactFolder/chooseFile');
        }
    }
    public function uploadFile(){
        $config = array(
            'upload_path' => "./assets/upload_files",
            'allowed_types' =>"gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp",
            'overwrite' => TRUE,
            'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "768",
            'max_width' => "1024"
        );
        $this->load->library('upload', $config);
        if($this->upload->do_upload())
        {
            $data = array('upload_data' => $this->upload->data());
            //Update image url data here
            $file_name = $this->upload->data('file_name');
            $msg_id = $this->session->userdata('msg_id');
            $this->load->model('schoolcontact_model');
            $result = $this->schoolcontact_model->upload_image($file_name,$msg_id);
            if($result){
                $this->session->set_flashdata('sent','File Successfully Uploaded!');
                $this->load->view('schoolContactFolder/sendFileToAdmin');
            }else{
                $this->session->set_flashdata('fail','File Upload Failed');
                $this->load->view('schoolContactFolder/sendFileToAdmin');
            }
        }
        else
        {
            $this->session->set_flashdata('fail','File Upload Failed');
            $this->load->view('schoolContactFolder/sendFileToAdmin');
        }
    }
    public function assignStudentsToEvent(){
        $this->load->model('schoolcontact_model');
        $result = $this->schoolcontact_model->getAllEvents();
        $data['event_details'] = $result;
        $this->load->view('schoolContactFolder/assignStudentsToEvent',$data);
    }
    public function getAllStudents(){
        $output = '';
        $data1 = '';
        $data2 = '';
        $data3 = '';

        $this->load->model('schoolcontact_model');
        if(true)
        {
            $data1 = $this->input->post('data1');
            $data2 = $this->input->post('data2');
        }
        $data = $this->schoolcontact_model->getAllStudents($data1,$data2);
        $output .= '
       <ul class="list-group">
       <br>
       <span class="badge badge-secondary">Check this checkbox to select Student</span>

            

    ';

        if ($data->num_rows() > 0)
        {
            foreach ($data->result() as $row)
            {
                if (true)
                {
                    $output .= '
          <li class="list-group-item d-flex justify-content-between align-items-center">'.$row->firstName.'<span class="text">'.$row->lastName.'</span>
          <label>
          <input type="checkbox"  name="school_id[]" value="'.$row->cid.'">
          <span class="checkmark"></span>Select
          </label>
          </li>
        ';
                }

            }
        }
        else
            // {
            //   $output .= '<li class="list-group-item">No unassigned schools found</li>';
            // }
            $output .= '</ul>';
        echo $output;
    }
    public function addStudents()
    {
        $eventid = $this->input->post('eventid');
        $this->load->model('schoolcontact_model');
        $sid = $this->session->userdata('sid');
        $schoolName = $this->schoolcontact_model->getSchoolName($sid);
        if(true)
        {
            if(!empty($_POST['school_id']))
            {

                $this->load->model('schoolcontact_model');
                $result = $this->schoolcontact_model->submitStudents($eventid,$schoolName,$_POST['school_id']);

                if($result == true){
                    $this->session->set_flashdata('success','Students List Added to the System!!');

                }else{
                    $this->session->set_flashdata('fail','Failed to Added Student List!!');

                }

                $this->assignStudentsToEvent();
            }
        }
    }

    public function assignSchoolMiddleware(){
    	
    	$this->load->view();
    }


	


	
}
