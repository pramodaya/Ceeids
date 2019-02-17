<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajaxsearchlog extends CI_Controller {

 public function index()
 {
  $this->load->view('ajaxsearch');
 }

 public function fetch()
 {
  $uid = $_GET['uid'];
  $output = '';
  $query = '';
  $this->load->model('Ajaxsearchlog_model');
  if($this->input->post('query'))
  {
   $query = $this->input->post('query');
  }
  $data = $this->Ajaxsearchlog_model->fetch_data($query,$uid);
  $output .= '
  <div class="table-responsive">
     <table class="table table-bordered table-striped">
      <tr>
       <th>Contact Name</th>
       <th>School</th>
       <th>Contact Type</th>
       <th>Desciption</th>
       <th>Co-ordinator</th>
       <th>Date</th>
       <th>Time</th>
       <th>Status</th>
       <th>Details</th>
      </tr>
  ';
  if($data->num_rows() > 0)
  {
   foreach($data->result() as $row)
   {
    $output .= '
      <tr>
       <td>'.$row->firstName.' '.$row->lastName.'</td>  
       <td>'.$row->schoolName.'</td>
       <td>'.$row->name.'</td>
       <td>'.$row->body.'</td>
       <td>'.$row->userName.'</td>
       <td>'.$row->date.'</td>
       <td>'.$row->time.'</td>
       <td>'.$row->status.'</td>
       <td><a href="http://localhost/Oxo_Company_School_Management_System/posts/view/'.$row->slug.'?lid='.$row->lid.'" class="btn btn-primary">More</a></td>
      </tr>
    ';
   }
  }
  else
  {
   $output .= '<tr>
       <td colspan="9">No Data Found</td>
      </tr>';
  }
  $output .= '</table>';
  echo $output;
 }


}
