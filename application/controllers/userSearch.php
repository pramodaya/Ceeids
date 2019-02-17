<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserSearch extends CI_Controller {

    function index()
    {
        $this->load->view('viewUser');
    }

    function fetch()
    {
        $output = '';
        $data = '';
        $data1 = '';
        $data2 = '';
        $data3 = '';

        $this->load->model('user_search_model');
        if(true)
        {
            $data1 = $this->input->post('data1');
            $data2 = $this->input->post('data2');
            $data3 = $this->input->post('data3');
        }
        $data = $this->user_search_model->fetch_data($data1,$data2,$data3);
        $output .= '
  <div class="table-responsive">
     <table class="table table-bordered table-striped">
      <tr>
       <th>First Name</th>
       <th>Last Name</th>
       <th>Email</th>
       <th>Type</th>
       <th>Contact Number</th>
       <th>Registered Date</th>
       <th>Resigned Date</th>
       <th>User Status</th>
       <th>Edit User</th>
       <th>Remove User</th>
      </tr>
  ';
        if($data->num_rows() > 0)
        {
            foreach($data->result() as $row)
            {
                $output .= '
      <tr>
       <td>'.$row->firstName.'</td>
       <td>'.$row->lastName.'</td>
       <td>'.$row->email.'</td>
       <td>'.$row->userType.'</td>
       <td>'.$row->contactNumber.'</td>
       <td>'.$row->signInTime.'</td>
       <td>'.$row->signOutTime.'</td>
       <td><img src="'.base_url().'assets/img/active'.$row->flag.'.png" alt="" border=3></img></td>
       
       <td><p><a href="'.base_url().'index.php/adminController/userEdit?user_id='.$row->uid.'"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" data-placement="top" rel="tooltip"><i class="fas fa-edit"></i>
</button></a></p></td>
    <td><p><a class="dropdown-item" href="#" data-toggle="modal" data-target="#d'.$row->uid.'"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" data-placement="top" rel="tooltip"><i class="fas fa-trash-alt"></i>
</button></a></p></td>
      </tr>
      
      
      <!-- Remove Modal-->
<div class="modal fade" id="d'.$row->uid.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Remove User</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Are you sure you want to Remove this User??</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="'.base_url().'index.php/adminController/userDelete?user_id='.$row->uid.'">Remove<?php endif;?></a>
            </div>
        </div>
    </div>
</div>


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

    public function fetch1(){
        $output = '';
        $data = '';
        $data1 = '';
        $data2 = '';
        $data3 = '';

        $this->load->model('user_search_model');
        if(true)
        {
            $data1 = $this->input->post('data1');
            $data2 = $this->input->post('data2');
            $data3 = $this->input->post('data3');
        }
        $data = $this->user_search_model->fetch_assign_users($data1,$data2,$data3);
        $output .= '
  <div class="table-responsive">
     <table class="table table-bordered table-striped">
      <tr>
       <th>First Name</th>
       <th>Last Name</th>
       <th>Email</th>
       <th>Type</th>       
       <th>Assign New User Role</th>
       <th>Assign Existing User Role</th>
      </tr>
  ';
        if($data->num_rows() > 0)
        {
            foreach($data->result() as $row)
            {
                $output .= '
      <tr>
       <td>'.$row->firstName.'</td>
       <td>'.$row->lastName.'</td>
       <td>'.$row->email.'</td>
       <td>'.$row->userType.'</td>      
       
       
       <td class="text-center"><p><a href="'.base_url().'index.php/adminController/createNewLogin?user_id='.$row->uid.'"><button class="btn btn-success btn-xs" data-title="Assign New User Role" data-toggle="modal" data-target="#assignnew" data-placement="top" rel="tooltip"><i class="fas fa-user-astronaut"></i>
</button></a></p></td>
<td class="text-center"><p><a href="'.base_url().'index.php/adminController/createExistingLogin?user_id='.$row->uid.'"><button class="btn btn-success btn-xs" data-title="Assign New Role" data-toggle="modal" data-target="#assign" data-placement="top" rel="tooltip"><i class="fas fa-users"></i>
</button></a></p></td>
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
    //Select usernames
    public function fetchusernames(){
        $output = '';
        $data1 = '';


        $this->load->model('user_search_model');
        if(true)
        {
            $data1 = $this->input->post('data1');

        }
        $data = $this->user_search_model->fetch_username($data1);
        $output .= '
  <label for="inputState">Select Username</label>
      <select name="username" id="inputState" class="custom-select">
        <option selected>Choose...</option>

     

      </tr>
  ';
        if($data->num_rows() > 0)
        {
            foreach($data->result() as $row)
            {
                $output .= '
      <tr>
       
  <option value="'.$row->userName.'">'.$row->userName.'</option>  

    ';
            }
        }
        else
        {
            $output .= '<tr>
       <td colspan="5">No Data Found</td>
      </tr>';
        }
        $output .= '</select>';
        echo $output;
    }
    function fetchCoordinator()
    {
        $output = '';
        $data = '';
        $data1 = '';
        $data2 = '';

        $this->load->model('user_search_model');

        if(true)
        {
            $data1 = $this->input->post('data1');
            $data2 = $this->input->post('data2');
        }
        $data = $this->user_search_model->fetch_coordinator($data1,$data2);

        $output .= '
        <div class="table-responsive">
           <table class="table table-bordered table-striped">
            <tr>
             <th>First Name</th>
             <th>Last Name</th>
             <th>Email</th>
             <th>Username</th>
             <th>Allocate</th>
            </tr>
        ';
        if ($data->num_rows()>0)
        {
            foreach ($data->result() as $row)
            {
                $output .= '
                <tr>
                 <td>'.$row->firstName.'</td>
                 <td>'.$row->lastName.'</td>
                 <td>'.$row->email.'</td>
                 <td>'.$row->userName.'</td>
                 
                 <td><p><a href="'.base_url().'index.php/adminController/viewCoordinatorSchools?user_uid='.$row->uid.'&user_type='.$row->userType.'"><button class="btn btn-primary btn-xs"><i class="fas fa-school"></i>
                </button></p></td></a>
                </tr>
                ';
            }
        }
        else
        {
            $output .= '<tr><td colspan="5">No Data Found</td></tr>';
        }
        $output .= '</table>';
        echo $output;
    }

}
