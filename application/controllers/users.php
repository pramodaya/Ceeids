<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {


	public function user_login(){
		$this->load->view('login_form');

	}
	public function user_register(){
		$this->load->view('register_form');
	}

	public function login(){

			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$this->load->model('user_model');
			$user_id = $this->user_model->login_user($username,$password);

			if($user_id){
                $user_image = $this->user_model->get_Image($user_id);
                $type = $this->user_model->get_Type($user_id);
                $firstName = $this->user_model->get_First_Name($user_id);
                $lastName = $this->user_model->get_Last_Name($user_id);
                $sid = $this->user_model->get_School_ID($user_id);
                if($sid == 'false'){
                    $sid = '*';
                }
                $fullName = $firstName." ".$lastName;
				$user_data = array(
						'user_id' => $user_id,
						'username' => $username,
						'imgUrl' => $user_image,
						'type' => $type,
						'fullname' => $fullName,
						'sid' => $sid,
						'logged_in' => true,
						'current_sid'=> 0,
						
				);

					$this->session->set_userdata($user_data);
					$this->session->set_flashdata('login_success','you are now logged in');
					$this->load->view('home',$user_data);
			}else{


				$this->session->set_flashdata('login_failed','Username or Password is incorrect... Try again..');
				redirect('Welcome/login');
			}

	}
	public function dashboard(){
        $this->load->view('home');
    }

	public function logout(){
		//destroy the session
		$this->session->sess_destroy();
		redirect('Welcome/index');
	}
	public function editProfile(){
        $user_id = $this->session->userdata('user_id');
        if($user_id){
            $this->load->model('user_model');
            if(!$this->user_model->edit_Profile($user_id)){
                //User available in user table but unavailable in user_details table cannot happen
                //$this->load->view('error_404');
            }else{
                $data['instant_req'] = $this->user_model->edit_Profile($user_id);
                $this->load->view('edit_user_profile',$data);
            }


        }
    }
    public function editUserProfile(){
        $this->form_validation->set_rules('firstName','First Name','required');
        $this->form_validation->set_rules('lastName','Last Name','required');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('contactNumber','Contact Number','required');
        $this->form_validation->set_rules('password','Password','required');




        if($this->form_validation->run()== FALSE){
            $this->session->set_flashdata('register_failed','Please fill all the fields');
            $this->load->view('viewUser');

        }
        else{
            $uid = $this->input->post('uid');
            $firstName = $this->input->post('firstName');
            $lastName = $this->input->post('lastName');
            $email = $this->input->post('email');
            $userType = $this->input->post('userType');
            $contactNumber = $this->input->post('contactNumber');
            $password = $this->input->post('password');
//            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);


            $this->load->model('user_model');
            $user_id = $this->user_model->edit_User_Final($uid,$firstName,$lastName,$email,$userType,$contactNumber,$password);

            $this->load->view('viewUser');

        }
    }
    public function changeImage(){
        $image = $this->input->get('image');
        $this->load->view('edit_Profile_Image',$image);
    }
    public function getNoOfStudents(){
        $this->load->model('user_model');
        $data = $this->user_model->getNumberOfStudents();
        $data1 = $this->user_model->getNumberOfSchools();
        $data2 = $this->user_model->getNumberOfUsers();
        $data3 = $this->user_model->getNumberOfSchoolContacts();
        $call_logs = $this->user_model->getCountOfCallLogs('2018-01-01','2018-12-31');
        $mail_logs = $this->user_model->getCountOfMailLogs('2018-01-01','2018-12-31');
        $email_logs = $this->user_model->getCountOfEmailLogs('2018-01-01','2018-12-31');
        $other_logs = $this->user_model->getCountOfOtherLogs('2018-01-01','2018-12-31');
        $output = '


<div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-primary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-user"></i>
                            </div>
                            <div class="mr-5">'.$data2->num_rows().'  USERS</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-warning o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-school"></i>
                            </div>
                            <div class="mr-5">'.$data1->num_rows().'  SCHOOLS</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-success o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-user-friends"></i>
                            </div>
                            <div class="mr-5">'.$data->num_rows().'  STUDENTS</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-danger o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-file-contract"></i>
                            </div>
                            <div class="mr-5">'.$data3->num_rows().'  CONTACTS</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left">View Details</span>
                            <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                        </a>
                    </div>
                </div>
                
                <script>
                var options1 = {
                            animationEnabled: true,
                            title: {
                                text: "Annual Log History"
                            },
                            data: [{
                                type: "column", //change it to line, area, bar, pie, etc
                                legendText: "Number of Logs ",
                                showInLegend: true,
                                dataPoints: [
                                    { label: "Calls", y: '.$call_logs.' },
                                    { label: "Mail", y: '.$mail_logs.' },
                                    { label: "Email", y: '.$email_logs.' },
                                    { label: "Other", y: '.$other_logs.' },


                                ]
                            }]
                        };

                        $("#resizable").resizable({
                            create: function (event, ui) {
                                //Create chart.
                                $("#chartContainer1").CanvasJSChart(options1);
                            },
                            resize: function (event, ui) {
                                //Update chart size according to its container size.
                                $("#chartContainer1").CanvasJSChart().render();
                            }
                        });
</script>
   
  ';
        echo $output;
    }
    public function getLogData(){
        $this->load->model('user_model');
        $call_logs = $this->user_model->getCountOfCallLogs('2018-01-01','2018-12-31');
//        $mail_logs = $this->user_model->getCountOfMailLogs('2018-01-01','2018-12-31');
//        $email_logs = $this->user_model->getCountOfEmailLogs('2018-01-01','2018-12-31');
//        $other_logs = $this->user_model->getCountOfOtherLogs('2018-01-01','2018-12-31');


        $logs = array(
            'calls' => $call_logs,
            'mails' => 2,
            'emails' => 3,
            'other' => 4,
        );

        $this->session->set_userdata($logs);
    }




}
