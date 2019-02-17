<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class adminController extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('adminModel');
        $this->load->library('excel');
        if($this->session->userdata('type') != 'Admin'){
        redirect('index.php');
    }
    }
    public function index(){

    }

    public function UserRegistration(){
        $this->load->view('userRegistration');
    }
    public function userView(){
        $this->load->view('viewUser');
    }
    public function assignUsers(){
        $this->load->view('assignUsers');
    }
    public function createNewSchool(){
        $this->load->view('createNewSchool');
    }
    public function createNewLogin(){
        if($this->input->get()){
            $id = $this->input->get('user_id');
            //pass user id and status whether this user is a new user or assign to already alocated user
            $this->load->model('adminModel');
            $data['instant_req'] = $this->adminModel->edit_User($id);
            $this->load->view('createNewLogin',$data);
        }
    }
    public function createExistingLogin(){
        $id = $this->input->get('user_id');
        $this->load->model('adminModel');
        $data['instant_req'] = $this->adminModel->edit_User($id);
        $this->load->view('createExistingLogin',$data);
    }
    public function allocateSchool(){
        $this->load->view('allocateSchool');
    }
    public function userEdit(){
        if($this->input->get()){
            $id = $this->input->get('user_id');
            $this->load->model('adminModel');
            $data['instant_req'] = $this->adminModel->edit_User($id);
            $this->load->view('editUser',$data);


        }

    }
    public  function userDelete(){
        if($this->input->get())
        {
            $id = $this->input->get('user_id');
            $this->load->model('adminModel');
            $this->adminModel->delete_User($id);
            $this->load->view('viewUser');
        }


    }
    public function importUsers(){
        $this->load->view('importUsers');
    }
    public function manageRequests(){
        $this->load->model('adminModel');
        $data['designation_requests'] = $this->adminModel->getDesignationRequests();
        $this->load->view('designationRequests',$data);
    }
    public function manageEvents(){
        $this->load->model('adminModel');
        $data['event_details'] = $this->adminModel->getEventDetails();
        $this->load->view('manageEvents',$data);
    }
    public function manageMessages(){
        $this->load->model('adminModel');
        $data['messages'] = $this->adminModel->getMessages();
        $this->load->view('adminMessages',$data);
    }
    public function registerUser(){
        $this->form_validation->set_rules('firstname','First Name','required');
        $this->form_validation->set_rules('lastname','Last Name','required');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('type','Type','required');
        $this->form_validation->set_rules('contactnumber','Contact Number','required');



        if($this->form_validation->run()== FALSE){
            $this->session->set_flashdata('register_failed','Please fill all the fields');
            $this->load->view('userRegistration');

        }else if ($this->input->post('password') != $this->input->post('confirmpassword')) {
            $this->session->set_flashdata('register_failed','Please add the same password');
            $this->load->view('userRegistration');
        }
        else{
            $firstname = $this->input->post('firstname');
            $lastname = $this->input->post('lastname');
            $email = $this->input->post('email');
            $type = $this->input->post('type');
            $contact_number = $this->input->post('contactnumber');
            $image_url = 'user.jpg';

            $this->load->model('adminModel');
            $user_id = $this->adminModel->register_User($firstname,$lastname,$email,$type,$contact_number,$image_url);

            if($user_id){
                $this->session->set_flashdata('register_success','User Registered Successfully!');
                $this->load->view('userRegistration');

            }else{
                $this->session->set_flashdata('register_failed','Failed to Register User.Try again..');
                $this->load->view('userRegistration');
            }




        }
    }
    public function editUser(){
        $this->form_validation->set_rules('firstName','First Name','required');
        $this->form_validation->set_rules('lastName','Last Name','required');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('userType','Type','required');
        $this->form_validation->set_rules('contactNumber','Contact Number','required');

        //echo form_open_multipart('upload/do_upload');


        if($this->form_validation->run()== FALSE){
            $this->session->set_flashdata('register_failed','Please fill all the fields');
            $this->load->view('editUser');

        }else if ($this->input->post('password') != $this->input->post('confirmpassword')) {
            $this->session->set_flashdata('register_failed','Please add the same password');
            $this->load->view('editUser');
        }
        else{
            $id = $this->input->post('uid');
            $firstname = $this->input->post('firstName');
            $lastname = $this->input->post('lastName');
            $email = $this->input->post('email');
            $type = $this->input->post('userType');
            $contact_number = $this->input->post('contactNumber');

            $this->load->model('adminModel');
            $user_id = $this->adminModel->edit_User_Final($id,$firstname,$lastname,$email,$type,$contact_number);

            $this->load->view('viewUser');

        }
    }
    //Upload Image

    public function uploadData(){

        if ($this->input->post('submit')) {

            $path = 'uploads/';
            require_once APPPATH . "/third_party/PHPExcel.php";
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'xlsx|xls';
            $config['remove_spaces'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('uploadFile')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data = array('upload_data' => $this->upload->data());
            }
            if(empty($error)){
                if (!empty($data['upload_data']['file_name'])) {
                    $import_xls_file = $data['upload_data']['file_name'];
                } else {
                    $import_xls_file = 0;
                }
                $inputFileName = $path . $import_xls_file;

                try {
                    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                    $objPHPExcel = $objReader->load($inputFileName);
                    $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
                    $flag = true;
                    $i=0;
                    foreach ($allDataInSheet as $value) {
                        if($flag){
                            $flag =false;
                            continue;
                        }
                        $inserdata[$i]['org_name'] = $value['A'];
                        $inserdata[$i]['org_code'] = $value['B'];
                        $inserdata[$i]['gst_no'] = $value['C'];
                        $inserdata[$i]['org_type'] = $value['D'];
                        $inserdata[$i]['Address'] = $value['E'];
                        $i++;
                    }
                    $result = $this->import->importdata($inserdata);
                    if($result){
                        echo "Imported successfully";
                    }else{
                        echo "ERROR !";
                    }

                } catch (Exception $e) {
                    die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                        . '": ' .$e->getMessage());
                }
            }else{
                echo $error['error'];
            }


        }
        $this->load->view('upload');
    }

    //Excel Import
//    public function fetch()
//    {
//        $data = $this->adminModel->select();
//        $output = '
//  <h3 align="center">Total Students - '.$data->num_rows().'</h3>
//  <table class="table table-striped table-bordered">
//   <tr>
//    <th>Title</th>
//    <th>Email</th>
//    <th>User Type</th>
//    <th>Contact Number</th>
//    <th>School</th>
//
//   </tr>
//  ';
//        foreach($data->result() as $row)
//        {
//            $output .= '
//   <tr>
//    <td>'.$row->fullName.'</td>
//    <td>'.$row->email.'</td>
//    <td>'.$row->did.'</td>
//    <td>'.$row->contactNumber.'</td>
//    <td>'.$row->sid.'</td>
//   </tr>
//   ';
//        }
//        $output .= '</table>';
//        echo $output;
//    }

    public function import()
    {
        if (isset($_FILES["file"]["name"])) {
            $path = $_FILES["file"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);
            foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for ($row = 2; $row <= $highestRow; $row++) {
                    $sid = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $did= $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $title = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $firstName = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $lastName = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $email = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $mobile = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $mobileOptional = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                    $residenceNo = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                    $residenceNoOptional = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                    $nic= $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                    $passportNo = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                    $address1 = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
                    $address2 = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
                    $address3 = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
                    $city = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
                    $district = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
                    $alYear = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
                    $alStream = $worksheet->getCellByColumnAndRow(18, $row)->getValue();
                    $data[] = array(
                        'sid' => $sid,
                        'did' => $did,
                        'title' => $title,
                        'firstName' => $firstName,
                        'lastName' => $lastName,
                        'email' => $email,
                        'mobile' => $mobile,
                        'mobileOptional' => $mobileOptional,
                        'residenceNo' => $residenceNo,
                        'residenceNoOptional' => $residenceNoOptional,
                        'nic' => $nic,
                        'passportNo' => $passportNo,
                        'address1' => $address1,
                        'address2' => $address2,
                        'address3' => $address3,
                        'city' => $city,
                        'district' => $district,
                        'alYear' => $alYear,
                        'alStream' => $alStream,
                    );

                }
            }
            $this->adminModel->insert1($data);
            echo 'Data Imported successfully';
        }
    }
    //Check the User name
    public function filename_exists()
    {
        $username = $this->input->post('username');
        $exists = $this->adminModel->filename_exists($username);

        $count = count($exists);

        if (empty($count)) {
            echo true;
        } else {
            echo false;
        }
    }
    //Assign a new User
    public function assignNewUser(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $uid = $this->input->post('uid');
        $type = $this->input->post('userType');

        $this->load->model('adminModel');
        $user_id = $this->adminModel->assign_User($uid,$username,$password,$type);

        if($user_id){
            $this->session->set_flashdata('register_success','User Assigned Successfully!');
            $this->load->view('assignUsers');

        }else{
            $this->session->set_flashdata('register_failed','Failed to Asign User');
            $this->load->view('assignUsers');
        }
    }
    //Assign already registered user
    public function assignExistingUser(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $uid = $this->input->post('uid');
        //Admin wants to change the password too or not
        if($password != null){
            $this->load->model('adminModel');
            $user_id = $this->adminModel->assign_ExUserwithPassword($uid,$username,$password);

            if($user_id){
                $this->session->set_flashdata('register_success','User Assigned Successfully!');
                $this->load->view('assignUsers');

            }else{
                $this->session->set_flashdata('register_failed','Failed to Asign User');
                $this->load->view('assignUsers');
            }
        }else{
            $this->load->model('adminModel');
            $user_id = $this->adminModel->assign_ExUser($uid,$username);

            if($user_id){
                $this->session->set_flashdata('register_success','User Assigned Successfully!');
                $this->load->view('assignUsers');

            }else{
                $this->session->set_flashdata('register_failed','Failed to Asign User');
                $this->load->view('assignUsers');
            }

        }

    }
    public function getRequests(){
        $this->load->model('adminModel');
        $requests = $this->adminModel->getNumberofRequests();
        $Output1 = $requests;
        echo $Output1;
    }
    public function getAdminMessages(){
        $this->load->model('adminModel');
        $messages = $this->adminModel->getNumberofAdminMessages();
        $Output2 = $messages;
        echo $Output2;
    }
    public function getAdminEvents(){
        $this->load->model('adminModel');
        $events = $this->adminModel->getNumberofAdminEvents();
        $Output3 = $events;
        echo $Output3;
    }
    public function getTotalMessages(){
        $this->load->model('adminModel');
        $messages = $this->adminModel->getNumberofAdminMessages();
        $events = $this->adminModel->getNumberofAdminEvents();
        echo $messages+$events  ;
    }
    //Admin Delete Requests
    public function deleteRequest(){
        if($this->input->get()){
            $id = $this->input->get('user_id');
            //pass user id and status whether this user is a new user or assign to already alocated user
            $this->load->model('adminModel');
            $this->adminModel->deleteRequest($id);
            $this->manageRequests();
        }

    }
    public function AddNewDesignation(){
        if($this->input->get()) {
            $id = $this->input->get('user_id');
            $designation = $this->input->get('designation');
            $newdata = array(
                'id' => $id,
                'designation' => $designation
            );
            $this->session->set_userdata($newdata);
            $this->load->view('editDesignationRequest');
        }
    }
    public function DownloadFile(){
        if($this->input->get()) {
            $file_name = $this->input->get('file_name');
            $this->load->helper('download');
            // Contents of photo.jpg will be automatically read
            force_download('./assets/upload_files/'.$file_name, NULL);
            $this->manageMessages();
        }
    }
    public function DeleteFile(){
        if($this->input->get()){
            $msg_id = $this->input->get('msg_id');
            $filename = $this->input->get('file_name');
            //pass user id and status whether this user is a new user or assign to already alocated user
            $this->load->model('adminModel');
            $this->adminModel->deleteFile($msg_id);
            unlink('./assets/upload_files/'.$filename);
            $this->manageMessages();
        }
    }
    //Admin Add new Requests
    public function addRequest(){
        $userreqdesignation = $this->input->post('userreqdesignation');
        $adminreqdesignation = $this->input->post('adminreqdesignation');
        $reqid = $this->input->post('reqid');
        if($adminreqdesignation == null){
            $this->load->model('adminModel');
            $this->adminModel->addRequest($userreqdesignation);
            $this->adminModel->deleteRequest($reqid);
            $this->manageRequests();
        }else{
            $this->load->model('adminModel');
            $this->adminModel->addRequest($adminreqdesignation);
            $this->adminModel->deleteRequest($reqid);
            $this->manageRequests();
        }


    }
    public function getDesignations(){
        $output = '';
        $data1 = '';

        $this->load->model('adminModel');
        if(true)
        {
            $data1 = $this->input->post('designation');

        }
        $data = $this->adminModel->searchDesignations($data1);
        $output .= '
  <div class="table-responsive">
     <table class="table table-bordered table-striped">
      <tr>
       <th>Similar Designations</th>
       
      </tr>
  ';
        if($data->num_rows() > 0)
        {
            foreach($data->result() as $row)
            {
                $output .= '
      <tr>
       <td>'.$row->designation.'</td>           
       
      </tr>          

    ';
            }
        }
        else
        {
            $output .= '<tr>
       <td colspan="5">No Data Found</td>
      </tr>';
        }
        $output .= '</table>';
        echo $output;
    }
    public function getDistricts(){
        $data1 = $this->input->post('data1');
        if($data1 == 'Western'){
            echo '<select id="district_type" name="district_type" class="form-control" onchange="choiceZone(this)">
                                                    <option selected>Select District...</option>
                                                    <option>Gampaha</option>
                                                    <option>Colombo</option>
                                                    <option>Kalutara</option>
                                                </select>';
        }else if($data1 == 'Northern'){
            echo '<select id="district_type" name="district_type" class="form-control" onchange="choiceZone(this)">
                                                    <option selected>Select District...</option>
                                                    <option>Jaffna</option>
                                                    <option>Kilinochchi</option>
                                                    <option>Mannar</option>
                                                    <option>Mullaitivu</option>
                                                    <option>Vavuniya</option>
                                                </select>';

        }else if($data1 == 'North Western'){
            echo '<select id="district_type" name="district_type" class="form-control" onchange="choiceZone(this)">
                                                    <option selected>Select District...</option>
                                                    <option>Puttalam</option>
                                                    <option>Kurunegala</option>
                                                </select>';

        }else if($data1 == 'North Central'){
            echo '<select id="district_type" name="district_type" class="form-control" onchange="choiceZone(this)">
                                                    <option selected>Select District...</option>
                                                    <option>Anuradhapura</option>
                                                    <option>Polonnaruwa</option>
                                                </select>';

        }else if($data1 == 'Central'){
            echo '<select id="district_type" name="district_type" class="form-control">
                                                    <option selected>Select District...</option>
                                                    <option>Matale</option>
                                                    <option>Kandy</option>
                                                    <option>Nuwara Eliya</option>
                                                </select>';

        }else if($data1 == 'Sabaragamuwa'){
            echo '<select id="district_type" name="district_type" class="form-control" onchange="choiceZone(this)">
                                                    <option selected>Select District...</option>
                                                    <option>Kegalle</option>
                                                    <option>Ratnapura</option>
                                                </select>';

        }else if($data1 == 'Eastern'){
            echo '<select id="district_type" name="district_type" class="form-control" onchange="choiceZone(this)">
                                                    <option selected>Select District...</option>
                                                    <option>Trincomalee</option>
                                                    <option>Batticaloa</option>
                                                    <option>Ampara</option>
                                                </select>';

        }else if($data1 == 'Uva'){
            echo '<select id="district_type" name="district_type" class="form-control" onchange="choiceZone(this)">
                                                    <option selected>Select District...</option>
                                                    <option>Badulla</option>
                                                    <option>Monaragala</option>
                                                </select>';

        }else if($data1 == 'Southern'){
            echo '<select id="district_type" name="district_type" class="form-control" onchange="choiceZone(this)">
                                                    <option selected>Select District...</option>
                                                    <option>Hambantota</option>
                                                    <option>Matara</option>
                                                    <option>Galle</option>
                                                </select>';

        }

    }
    public function getZones(){
        $data1 = $this->input->post('data1');
        if($data1 == 'Colombo'){
            echo '<select id="zone_type" name="district_type" class="form-control" onchange="choiceDivision(this)">
                                                    <option selected>Select Zone...</option>
                                                    <option>Homagama</option>
                                                    <option>Colombo</option>
                                                    <option>Jayawardenapura</option>
                                                    <option>Piliyandala</option>
                                                    <option>Jayawardenapura</option>
                                                </select>';
        }elseif ($data1 == 'Gampaha'){
            echo '<select id="zone_type" name="district_type" class="form-control" onchange="choiceDivision(this)">
                                                    <option selected>Select Zone...</option>
                                                    <option>Gampaha</option>
                                                    <option>Kelaniya</option>
                                                    <option>Minuwangoda</option>
                                                    <option>Negombo</option>
                                                </select>';
        }elseif ($data1 == 'Kalutara'){
            echo '<select id="zone_type" name="district_type" class="form-control" onchange="choiceDivision(this)">
                                                    <option selected>Select Zone...</option>
                                                    <option>Horana</option>
                                                    <option>Kalutara</option>
                                                    <option>Matugama</option>
                                                </select>';
        }
    }
    public function getDivisions(){
        $data1 = $this->input->post('data1');
        if($data1 == 'Colombo'){
            echo '<select id="division_type" name="district_type" class="form-control">
                                                    <option selected>Select Division...</option>
                                                    <option>Borella</option>
                                                    <option>Colombo Central</option>
                                                    <option>Colombo North</option>
                                                    <option>Colombo South</option>
                                                </select>';
        }
        if($data1 == 'Homagama'){
            echo '<select id="division_type" name="district_type" class="form-control">
                                                    <option selected>Select Division...</option>
                                                    <option>Homagama</option>
                                                    <option>Padukka</option>
                                                    <option>Seethawaka</option>
                                                </select>';
        }
        if($data1 == 'Jayawardenapura'){
            echo '<select id="division_type" name="district_type" class="form-control">
                                                    <option selected>Select Division...</option>
                                                    <option>Kaduwela</option>
                                                    <option>Kolonnawa</option>
                                                    <option>Maharagama</option>
                                                    <option>Nugegoda</option>
                                                </select>';
        }
        if($data1 == 'Piliyandala'){
            echo '<select id="division_type" name="district_type" class="form-control">
                                                    <option selected>Select Division...</option>
                                                    <option>Dehiwala</option>
                                                    <option>Kesbewa</option>
                                                    <option>Moratuwa</option>
                                                </select>';
        }

        if($data1 == 'Gampaha'){
            echo '<select id="division_type" name="district_type" class="form-control">
                                                    <option selected>Select Division...</option>
                                                    <option>Attanagalla</option>
                                                    <option>Dompe</option>
                                                    <option>Gampaha</option>
                                                </select>';
        }
        if($data1 == 'Kelaniya'){
            echo '<select id="division_type" name="district_type" class="form-control">
                                                    <option selected>Select Division...</option>
                                                    <option>Biyagama</option>
                                                    <option>Kelaniya</option>
                                                    <option>Mahara</option>
                                                    <option>Wattala</option>
                                                </select>';
        }
        if($data1 == 'Minuwangoda'){
            echo '<select id="division_type" name="district_type" class="form-control">
                                                    <option selected>Select Division...</option>
                                                    <option>Diulapitiya</option>
                                                    <option>Minuwangoda</option>
                                                    <option>Mirigama</option>
                                                </select>';
        }
        if($data1 == 'Negombo'){
            echo '<select id="division_type" name="district_type" class="form-control">
                                                    <option selected>Select Division...</option>
                                                    <option>Ja-Ela</option>
                                                    <option>Katana</option>
                                                    <option>Negombo</option>
                                                </select>';
        }
        if($data1 == 'Horana'){
            echo '<select id="division_type" name="district_type" class="form-control">
                                                    <option selected>Select Division...</option>
                                                    <option>Bandaragama</option>
                                                    <option>Bulathsinhala</option>
                                                    <option>Horana</option>
                                                </select>';
        }
        if($data1 == 'Kalutara'){
            echo '<select id="division_type" name="district_type" class="form-control">
                                                    <option selected>Select Division...</option>
                                                    <option>Beruwala</option>
                                                    <option>Dodangoda</option>
                                                    <option>Kalutara</option>
                                                    <option>Panadura</option>
                                                </select>';
        }
        if($data1 == 'Matugama'){
            echo '<select id="division_type" name="district_type" class="form-control">
                                                    <option selected>Select Division...</option>
                                                    <option>Agalawattha I</option>
                                                    <option>Agalawattha II</option>
                                                    <option>Matugama</option>
                                                    <option>Walallawita</option>
                                                </select>';
        }
    }
    public function getCity(){
        $output = '';
        $data1 = $this->input->post('data1');
        $this->load->model('adminModel');
        $data = $this->adminModel->searchCities($data1);
        $output .= '
        <select id="citytype" class="form-control" onchange="choiceCity(this)">
                                                            <option>Select Filtered City here...</option>
                                                        
  
  ';
        if($data->num_rows() > 0)
        {
            foreach($data->result() as $row)
            {
                $output .= '<option>'.$row->cityName.'</option>';
            }
        }
        else
        {
            $output .= 'No Cities Found';

        }
        $output .= '</select>';
        echo $output;

    }
    public function createSchool(){
        $schoolname = $this->input->post('schoolname');
        $schoolemail = $this->input->post('schoolemail');
        $schoolcontactnumber = $this->input->post('schoolcontactnumber');
        $schoolfax = $this->input->post('schoolfax');
        $schoolweburl = $this->input->post('schoolweburl');
        $address1 = $this->input->post('address1');
        $address2 = $this->input->post('address2');
        $address3 = $this->input->post('address3');
        $schoolcity = $this->input->post('schoolcity');
        $organizational_type = $this->input->post('organizational_type');
        $public_type = $this->input->post('public_type');
        $gender_type = $this->input->post('gender_type');
        $national_type = $this->input->post('national_type');
        $ab_type = $this->input->post('ab_type');
        $sch1002_type = $this->input->post('1002_type');
        $province_type = $this->input->post('province_type');
        $district_type = $this->input->post('district_type');
        $zone_type = $this->input->post('zone_type');
        $division_type = $this->input->post('division_type');

        $sinhala = $this->input->post('sinhala');
        $english = $this->input->post('english');
        $tamil = $this->input->post('tamil');
        $medium = $sinhala." ".$english." ".$tamil;


        $acadamic = $this->input->post('acadamic');

        $localal = $this->input->post('localal');
        $edexcelal = $this->input->post('edexcelal');
        $cambridgeal = $this->input->post('cambridgeal');
        $type_of_al =  $localal." ".$edexcelal." ".$cambridgeal;

        $localol = $this->input->post('localol');
        $edexcelol = $this->input->post('edexcelol');
        $cambridgeol = $this->input->post('cambridgeol');
        $type_of_ol =  $localol." ".$edexcelol." ".$cambridgeol;

        $totalstudents = $this->input->post('totalstudents');
        $totalteachers = $this->input->post('totalteachers');


        $albiosinhala = $this->input->post('albiosinhala');
        $albioenglish = $this->input->post('albioenglish');
        $albiotamil = $this->input->post('albiotamil');

        $alpssinhala = $this->input->post('alpssinhala');
        $alpsenglish = $this->input->post('alpsenglish');
        $alpstamil = $this->input->post('alpstamil');

        $alcomsinhala = $this->input->post('alcomsinhala');
        $alcomenglish = $this->input->post('alcomenglish');
        $alcomtamil = $this->input->post('alcomtamil');

        $alartssinhala = $this->input->post('alartssinhala');
        $alartsenglish = $this->input->post('alartsenglish');
        $alartstamil = $this->input->post('alartstamil');

        $altecsinhala = $this->input->post('altecsinhala');
        $altecenglish = $this->input->post('altecenglish');
        $altectamil = $this->input->post('altectamil');

        $allonbio = $this->input->post('allonbio');
        $allonps = $this->input->post('allonps');
        $alloncom = $this->input->post('alloncom');
        $allonarts = $this->input->post('allonarts');
        $allontec = $this->input->post('allontec');

        $schoolImg = 'school.png';

        $this->load->model('adminModel');
        $user_id = $this->adminModel->Add_School($schoolname,$schoolcity,$schoolcontactnumber,$schoolemail,$schoolImg,
            $organizational_type,$public_type,$gender_type,$national_type,$ab_type,$sch1002_type,$medium,$acadamic,
            $province_type,$district_type,$zone_type,$division_type,$address1,$address2,$address3,
            $schoolfax,$schoolweburl,$type_of_ol,$type_of_al,$totalstudents,$totalteachers,$albiosinhala,$albioenglish,
            $albiotamil,$alpssinhala,$alpsenglish,$alpstamil,$alcomsinhala,$alcomenglish,$alcomtamil,$altecsinhala,$altecenglish,$altectamil,
            $alartssinhala,$alartsenglish,$alartstamil,$allonbio,$allonps,$alloncom,$allontec,$allonarts);

        if($user_id){
            $this->session->set_flashdata('register_success','School Added Successfully!');
            $this->load->view('createNewSchool');

        }else{
            $this->session->set_flashdata('register_failed','Failed to add School');
            $this->load->view('createNewSchool');
        }

    }
    public function ViewStudentList(){

        if($this->input->get()){
            $event_id = $this->input->get('event_id');
            $event_school = $this->input->get('event_school');
            $event_name = $this->input->get('event_name');
            $event_date = $this->input->get('event_date');
            $event_description = $this->input->get('event_description');
            $count = $this->input->get('count');
            $this->load->model('adminModel');
            $data['student_list'] = $this->adminModel->viewStudentList($event_name);
            $data['event_id'] = $event_id;
            $data['event_school'] = $event_school;
            $data['event_name'] = $event_name;
            $data['event_date'] = $event_date;
            $data['count_student'] = $count;
            $data['event_description'] = $event_description;
            $this->load->view('viewEventStudentList',$data);


        }

    }
    public function createSchoolDesignation(){
        $this->load->view('createSchoolDesignation');
    }
    public function createNewSchoolDesignation(){

        $designation = $this->input->post('designation');
        $this->load->model('adminModel');
        $result = $this->adminModel->addSchoolDesignation($designation);

        if($result == true){
            $this->session->set_flashdata('success','New Designation Added to the System!!');
            $this->load->view('createSchoolDesignation');
        }else{
            $this->session->set_flashdata('failed','Failed to add Your New Designation!!');
            $this->load->view('createSchoolDesignation');
        }

    }
    //Create PDF
    public  function print_item()
    {
        if($this->input->get()) {
            $event_id = $this->input->get('event_id');

            //     load library
            $this->load->library('pdf');
            $pdf = $this->pdf->load();
            // retrieve data from model
            $this->load->model('adminModel');
//            $data['all_Designations'] = $this->adminModel->GetDesignations($event_id);
            $data['student_list'] = $this->adminModel->getEventWiseStudentList($event_id);
            $eventName = $this->adminModel->getEventName($event_id);
            $description = $this->adminModel->getEventDescription($event_id);
            $date = $this->adminModel->getEventDate($event_id);
            $time = $this->adminModel->getEventTime($event_id);
            $data['title'] = $eventName;
            $data['description'] = $description;
            $data['date'] = $date;
            $data['time'] = $time;
            ini_set('memory_limit', '256M');
            // boost the memory limit if it's low ;)
            $html = $this->load->view('PdfView', $data, true);
            // render the view into HTML
            $pdf->WriteHTML($html); // write the HTML into the PDF
            $output = $eventName . date('Y_m_d_H_i_s') . '_.pdf';
            $pdf->Output("$output", 'I'); // save to file because we can
            exit();

        }

    }
    public function print_school_list(){
        if($this->input->get()) {
            $eventid = $this->input->get('event_id');
            $schoolid = $this->input->get('schoolid');

            //     load library
            $this->load->library('pdf');
            $pdf = $this->pdf1->load();
            // retrieve data from model
            $this->load->model('adminModel');
            $schoolName = $this->adminModel->getSchoolName($schoolid);
//            $data['all_Designations'] = $this->adminModel->GetDesignations($event_id);
            $data['student_list'] = $this->adminModel->getSchoolWiseStudentList($eventid,$schoolName);
            $eventName = $this->adminModel->getEventName($eventid);
            $description = $this->adminModel->getEventDescription($eventid);
            $date = $this->adminModel->getEventDate($eventid);
            $time = $this->adminModel->getEventTime($eventid);
            $data['title'] = $eventName;
            $data['description'] = $description;
            $data['date'] = $date;
            $data['time'] = $time;
            $data['school'] = $schoolName;
            ini_set('memory_limit', '256M');
            // boost the memory limit if it's low ;)
            $html = $this->load->view('PdfView', $data, true);
            // render the view into HTML
            $pdf->WriteHTML($html); // write the HTML into the PDF
            $output = $eventName . date('Y_m_d_H_i_s') . '_.pdf';
            $pdf->Output("$output", 'I'); // save to file because we can
            exit();

        }
    }
    //Export as Excel Sheet
    public function action()
    {
        $event_id = $this->input->post('event_id');
        $eventName = $this->adminModel->getEventName($event_id);


        $this->load->model("adminModel");
        $this->load->library("excel");
        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $table_columns = array("Title", "First Name", "Last Name", "Email", "Mobile");

        $column = 0;

        foreach($table_columns as $field)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }

        $list = $this->adminModel->getEventWiseStudentList($event_id);

        $excel_row = 2;

        foreach($list as $row)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->title);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->fname);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->lname);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->email);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->mobile);
            $excel_row++;
        }

        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$eventName.'.xls"');
        $object_writer->save('php://output');
    }

    //Export School wise Student list
    public function action1()
    {
        $event_id = $this->input->post('event_id');
        $schoolid = $this->input->post('schoolid');
        $eventName = $this->adminModel->getEventName($event_id);
        $schoolName = $this->adminModel->getSchoolName($schoolid);


        $this->load->model("adminModel");
        $this->load->library("excel");
        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $table_columns = array("Title", "First Name", "Last Name", "Email", "Mobile");

        $column = 0;

        foreach($table_columns as $field)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }

        $list = $this->adminModel->getSchoolWiseStudentList($event_id,$schoolName);

        $excel_row = 2;

        foreach($list as $row)
        {
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->title);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->fname);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->lname);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->email);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->mobile);
            $excel_row++;
        }

        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$eventName.'.'.$schoolName.'.xls"');
        $object_writer->save('php://output');
    }
    public function createOrganizationalEvent(){
        $this->load->view('createOrganizationalEvent');
    }
    public function MakeOrganizationalEvent(){
        $name = $this->input->post('name');
        $description = $this->input->post('description');
        $date = $this->input->post('date');
        $time = $this->input->post('time');
        $place = $this->input->post('place');

        $this->load->model('adminModel');
        $result = $this->adminModel->AddOrganizationalEvent($name,$description,$date,$time,$place);

        if($result == true){
            $this->session->set_flashdata('success','New Event Added to the System!!');
            $this->load->view('createOrganizationalEvent');
        }else{
            $this->session->set_flashdata('failed','Failed to add New Event!!');
            $this->load->view('createOrganizationalEvent');
        }


    }
    public function selectSchoolEvent(){

        $this->load->model('adminModel');
        $result = $this->adminModel->getAllEvents();
        $result1 = $this->adminModel->getAllSchools();
        $data['event_details'] = $result;
        $data['event_school_details'] = $result1;
        $this->load->view('selectEvent',$data);
    }
    public function eventWiseStudentList(){
        $eventid = $this->input->post('eventid');
        $this->load->model('adminModel');
        $result = $this->adminModel->getEventWiseStudentList($eventid);
        $data['event_school_details'] = $result;
        $data['event_id'] = $eventid;
        $this->load->view('eventWiseStudentList',$data);

    }
    public function schoolWiseStudentList(){
        $eventid = $this->input->post('eventid');
        $schoolid = $this->input->post('schoolid');
        $this->load->model('adminModel');
        $schoolName = $this->adminModel->getSchoolName($schoolid);
        $result = $this->adminModel->getSchoolWiseStudentList($eventid,$schoolName);
        $data['event_school_details'] = $result;
        $data['event_id'] = $eventid;
        $data['schoolid'] = $schoolid;
        $this->load->view('schoolWiseStudentList',$data);

    }

    //Allocate schools to users

    public function viewCoordinatorSchools()
    {
        if ($this->input->get())
        {
        $id = $this->input->get('user_uid');
        $type = $this->input->get('user_type');
        
        $this->load->model('AdminModel');
        $data['cor_det'] = $this->AdminModel->getCoordinator($id);
        
        if($type == 'Coordinator')
        {
            $data['sch_det'] = $this->AdminModel->getAssignedSchools($id);
        }
        else
        {
            $data['sch_det'] = $this->AdminModel->getSingleSchool($id);
        }
        
        $this->load->view('assignSchools', $data);
        }
    }


    public function fetchSchools()
  {
    $uid = $_GET['op'];
    $output = '';
    $data = '';

    $this->load->model('AdminModel');

    if (true) 
    {
      $query = $this->input->post('query');
    }

    //user type
    $user_data = $this->AdminModel->getCoordinator($uid);

    foreach ($user_data as $row)
    {
      $user_type = $row->userType;
    }

    //school details
    $school_data = $this->AdminModel->getSchools($query);
    $sch_det = $this->AdminModel->getSingleSchool($uid);
    
    if($sch_det->num_rows() != 0 && $user_type == 'School Admin')
    {
      $output .= '<form action="school?user_id='.$uid.'&user_type='.$user_type.'" method="POST">
      <button type="submit" name="submit" value="submit" class="btn btn-primary btn-block" data-toggle="modal" data-target="#submit" data-placement="top" rel="tooltip" disabled>Allocate selected schools</button>
      <ul class="list-group">';
    }else
    {
      $output .= '<form action="school?user_id='.$uid.'&user_type='.$user_type.'" method="POST">
      <button type="submit" name="submit" value="submit" class="btn btn-primary btn-block" data-toggle="modal" data-target="#submit" data-placement="top" rel="tooltip">Allocate selected schools</button>
      <ul class="list-group">';
    }

    if($user_type == 'Coordinator')
    {
      if ($school_data->num_rows() > 0) 
      {
        foreach ($school_data->result() as $row)
        {
          if ($row->assigned == 0)
          {
            $output .= '
            <li class="list-group-item d-flex justify-content-between align-items-center">'.$row->schoolName.'<span class="text-muted">'.$row->city.'</span>
            <label>
            <input type="checkbox" name="school_id[]" value="'.$row->sid.'">
            <span class="checkmark"></span>Select
            </label>
            </li>
          ';
          }
          else
          {
            $output .= '
            <li class="list-group-item d-flex justify-content-between align-items-center">'.$row->schoolName.'<span class="text-muted">'.$row->city.'</span>
            <span class="badge badge-warning">Coordinator: '.$row->firstName.'</span>
            </li>
          ';
          }
        }
      }
    }
    elseif($user_type == 'School Admin')
    {
      if($sch_det->num_rows() == 0)
      {
        foreach ($school_data->result() as $row)
        {
          if ($row->schoolAdmin == 0)
          {
            $output .= '
            <li class="list-group-item d-flex justify-content-between align-items-center">'.$row->schoolName.'<span class="text-muted">'.$row->city.'</span>
            <label>
            <input type="radio" name="school_id" value="'.$row->sid.'">
            <span class="checkmark"></span>Select
            </label>
            </li>
          ';
          }
          else
          {
            $output .= '
            <li class="list-group-item d-flex justify-content-between align-items-center">'.$row->schoolName.'<span class="text-muted">'.$row->city.'</span>
            <span class="badge badge-warning">School Admin '.$row->firstName.'</span>
            </li>
          ';
          }
        }
      }
      else
      {
        $output .= '
            <li class="list-group-item d-flex justify-content-between align-items-center">
            <span class="text-muted">You have already assigned a school for this user.
            Please unassign the current school to assign a new school</span>
            </li>
          ';
      }
    }
  $output .= '</ul></form>';
  echo $output;
  
  }

  public function undoAllocation()
  {
    if ($this->input->get())
    {
      $sid = $this->input->get('school_id');
      $this->load->model('AdminModel');
      $this->AdminModel->deleteAllocation($sid);

      $id = $this->input->get('user_id');
      $data['cor_det'] = $this->AdminModel->getCoordinator($id);
      $data['sch_det'] = $this->AdminModel->getAssignedSchools($id);
      $this->load->view('assignSchools', $data);
    }
  }

  public function undoSchoolAdmin()
  {
    if ($this->input->get())
    {
      $sid = $this->input->get('school_id');
      $uid = $this->input->get('user_id');
      $this->load->model('AdminModel');
      $this->AdminModel->deleteSchoolAdmin($sid, $uid);

      $data['cor_det'] = $this->AdminModel->getCoordinator($uid);
      $data['sch_det'] = $this->AdminModel->getSingleSchool($sid);
      $this->load->view('assignSchools', $data);
    }
  }

  public function school()
  {
    $uid = $_GET['user_id'];
    $user_type = $_GET['user_type'];
    $this->load->model('AdminModel');
    
    if(isset($_POST['submit']))
    {
      if($user_type == 'Coordinator')
      {
        if(!empty($_POST['school_id']))
        {
        //   foreach ($_POST['school_id'] as $x){
        //     echo $x;
        //   }
        $this->AdminModel->makeAllocations($uid, $_POST['school_id']);
        $data['sch_det'] = $this->AdminModel->getAssignedSchools($uid);
        }
      }
      elseif($user_type == 'School Admin')
      {
        $sid = $_POST['school_id'];
        $this->AdminModel->assignSchoolAdmin($uid, $sid);
        $data['sch_det'] = $this->AdminModel->getSingleSchool($uid);
      }
      $data['cor_det'] = $this->AdminModel->getCoordinator($uid);
      $this->load->view('assignSchools', $data);
    }
  }

  public function filterSchools()
  {
    $cid = $_GET['coordinator_id'];
    $output = '';
    $data = '';

    $public_type = $this->input->post('public_type');
    $gender_type = $this->input->post('gender_type');
    $national_type = $this->input->post('national_type');
    $ab_type = $this->input->post('ab_type');
    $province_type = $this->input->post('province_type');
    $district_type = $this->input->post('district_type');
    $zone_type = $this->input->post('zone_type');
    $division_type = $this->input->post('division_type');

    if(isset($_POST['sinhala']) || isset($_POST['english']) || isset($_POST['tamil']))
    {
        $sinhala = $this->input->post('sinhala');
        $english = $this->input->post('english');
        $tamil = $this->input->post('tamil');
        $medium = $sinhala." ".$english." ".$tamil;
    }else
    {
        $medium = "";
    }

    if(isset($_POST['acadamic']))
    {
      $acadamic = $this->input->post('acadamic');
    }else
    {
      $acadamic = "";
    }

    if(isset($_POST['localal']) || isset($_POST['edexcelal']) || isset($_POST['cambridgeal']))
    {
      $localal = $this->input->post('localal');
      $edexcelal = $this->input->post('edexcelal');
      $cambridgeal = $this->input->post('cambridgeal');
      $type_of_al =  $localal." ".$edexcelal." ".$cambridgeal;
    }else
    {
      $type_of_al = "";
    }

    if(isset($_POST['localol']) || isset($_POST['edexcelol']) || isset($_POST['cambridgeol']))
    {
      $localol = $this->input->post('localol');
      $edexcelol = $this->input->post('edexcelol');
      $cambridgeol = $this->input->post('cambridgeol');
      $type_of_ol =  $localol." ".$edexcelol." ".$cambridgeol;
    }else
    {
      $type_of_ol = "";
    }

    $this->load->model('AdminModel');
    $data['school_data'] = $this->AdminModel->filterSchools($public_type,$gender_type,$national_type,$ab_type,$province_type,
                  $district_type,$zone_type,$division_type,$medium,$acadamic,$type_of_al,$type_of_ol);

    

    $data['cor_det'] = $this->AdminModel->getCoordinator($cid);
    $this->load->view('filteredSchools', $data);
  }

}




