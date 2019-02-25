<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AssignSchoolMiddleware extends CI_Controller {
  

public function getAllSchools(){

	echo 'sldfjs';
	$this->load->model('schoolcontact_model');
    $data['school'] = $this->schoolcontact_model->getAllSchools();

    if($data){
    	echo 'sdfsf';
    }else{
    	echo 'no daata';
    }
     $this->load->view('schoolContactFolder/assignedSchoolMiddleware',$data);
    
}



}

?>


