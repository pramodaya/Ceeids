<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class assignSchoolsController extends CI_Controller {
  

  public function viewCoordinatorSchools()
  {
    if ($this->input->get())
    {
      $id = $this->input->get('user_id');
      $this->load->model('assignSchoolsModel');
      $data['cor_det'] = $this->assignSchoolsModel->getCoordinator($id);
      $data['sch_det'] = $this->assignSchoolsModel->getAssignedSchools($id);
      $this->load->view('assignSchools', $data);
    }
  }

  public function fetchSchools()
  {
    $uid = $_GET['op'];
    $output = '';
    $data = '';

    $this->load->model('assignSchoolsModel');

    if (true) 
    {
      $query = $this->input->post('query');
    }

    $school_data = $this->assignSchoolsModel->getSchools($query);

    $output .= '<form action="school?coordinator_id='.$uid.'" method="POST">
    <button type="submit" name="submit" value="submit" class="btn btn-primary btn-block" data-toggle="modal" data-target="#submit" data-placement="top" rel="tooltip">Allocate selected schools</button>
       <ul class="list-group">

       <div class="modal fade" id="submit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="exampleModalLabel">Unallocate school?</h5>
                   <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">×</span>
                   </button>
               </div>
               <div class="modal-body">Are you sure you want to unallocate this school??</div>
               <div class="modal-footer">
                   <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                   <a class="btn btn-primary" href="undoAllocation?school_id=$row->sid">Unallocate<?php endif;?></a>
               </div>
           </div>
       </div>
      </div>     

    ';

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
          <span class="badge badge-warning">assigned to '.$row->firstName.'</span>
          </li>
        ';
        }
      }
    }
    else
    // {
    //   $output .= '<li class="list-group-item">No unassigned schools found</li>';
    // }
    $output .= '</ul></form>';
    echo $output;
  }

  // public function selectSchool()
  // {
    
  //   if ($this->input->get())
  //   {
      
  //     $cid = $this->input->get('user_id');
  //     $sid = $this->input->get('school_id');

  //     $this->load->model('assignSchoolsModel');
  //     $this->assignSchoolsModel->makeAllocations($cid, $sid);

  //     redirect('http://localhost/Oxo_Company_School_Management_System/index.php/assignSchoolsController/viewCoordinatorSchools');
  //   }
  // }

  public function undoAllocation()
  {
    if ($this->input->get())
    {
      $sid = $this->input->get('school_id');
      $this->load->model('assignSchoolsModel');
      $this->assignSchoolsModel->deleteAllocation($sid);

      $id = $this->input->get('user_id');
      $data['cor_det'] = $this->assignSchoolsModel->getCoordinator($id);
      $data['sch_det'] = $this->assignSchoolsModel->getAssignedSchools($id);
      $this->load->view('assignSchools', $data);
    }
  }


  public function school()
  {
    $cid = $_GET['coordinator_id'];
    if(isset($_POST['submit']))
    {
      if(!empty($_POST['school_id']))
       {
      //   foreach ($_POST['school_id'] as $x){
      //     echo $x;
      //   }
        $this->load->model('assignSchoolsModel');
        $this->assignSchoolsModel->makeAllocations($cid, $_POST['school_id']);

        $data['cor_det'] = $this->assignSchoolsModel->getCoordinator($cid);
        $data['sch_det'] = $this->assignSchoolsModel->getAssignedSchools($cid);
        $this->load->view('assignSchools', $data);
      }
    }
  }

}