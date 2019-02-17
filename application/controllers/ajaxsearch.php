<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajaxsearch extends CI_Controller {

 function index()
 {
  $this->load->view('schoolContactFolder/schoolContactsView');
 }

 function fetch()
 {
  $output = '';
  $query = '';
  $this->load->model('ajaxsearch_model');
  if($this->input->post('query'))
  {
   $query = $this->input->post('query');
   
  }


   $sid =  $this->input->post('sid');
  
 
  $data = $this->ajaxsearch_model->fetch_data($query,$sid);
  $output .= '
  <div class="table-wrapper-scroll-y" style="overflow-x: auto" >
  <div class="table-responsive">
     <table class="table table-bordered table-striped">
	  <tr>
	   <th>Title</th>
	   <th>First Name</th>
	   <th>Last Name</th>
       <th>Email</th>
	   <th>Mobile Number</th>
	   <th>Optional Mobile Number</th>
	   <th>Residence Number</th>
	   <th>Optional Residence Number</th>
	   <th>Designation</th>
	   <th>NIC </th>
	   <th>Passport</th>
	   <th>Address 1</th>
	   <th>Address 2</th>
	   <th>Address 3</th>
	   <th>City</th>
	   <th>District</th>
	   <th>A/L Year</th>
	   <th>A/L Stream</th>
	   <th>Add Log</th>
	   <th>Edit</th>
      
      </tr>
  ';
  if($data->num_rows() > 0)
  {
   foreach($data->result() as $row)
   {
    $output .= '
	  <tr>

       <td>'.$row->title.'</td>
       <td>'.$row->firstName.'</td>
	   <td>'.$row->lastName.'</td>
	   <td>'.$row->email.'</td>
	   <td>'.$row->mobile.'</td>
	   <td>'.$row->mobileOptional.'</td>
	   <td>'.$row->residenceNo.'</td>
	   <td>'.$row->residenceNoOptional.'</td>
	   <td>'.$row->designation.'</td>  
	   <td>'.$row->nic.'</td>
	   <td>'.$row->passportNo.'</td>
	   <td>'.$row->address1.'</td>
	   <td>'.$row->address2.'</td>
	   <td>'.$row->address3.'</td>
       <td>'.$row->city.'</td>
	   <td>'.$row->district.'</td>
	   <td>'.$row->alYear.'</td>
	   <td>'.$row->alStream.'</td>
	   <td><a href="http://localhost/Oxo_Company_School_Management_System/posts/create?cid='.$row->cid.'" class="btn btn-success">Add Log</a></td>
	   <td><a href="http://localhost/Oxo_Company_School_Management_System/schoolContacts/editSingleSchoolUser/?cid='.$row->cid.'&sid='.$row->sid.'" class="btn btn-primary">EDIT</a></td>

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
 
}
