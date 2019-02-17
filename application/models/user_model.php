<?php

class User_model extends CI_Model {
	public function login_user($username, $password){

		$this->db->where('userName',$username);
		$this->db->where('password',$password);

		$result = $this->db->get('user');

		if($result->num_rows()==1){
			return $result->row(0)->uid;
		}else{
			return false;
		}
	}
	public function get_Image($user_id){
        $this->db->where('uid',$user_id);
        $this->db->select('imgUrl');
        $user_data = $this->db->get('userdetails');
        if($user_data->num_rows() > 0)
        {
            return $user_data->row(0)->imgUrl;
        }
        return false;
    }
    public function get_Type($user_id){
        $this->db->where('uid',$user_id);
        $this->db->select('userType');
        $user_data = $this->db->get('userdetails');
        if($user_data->num_rows() > 0)
        {
            return $user_data->row(0)->userType;
        }
        return false;
    }

    public function get_First_Name($user_id){
        $this->db->where('uid',$user_id);
        $this->db->select('firstName');
        $user_data = $this->db->get('userdetails');
        if($user_data->num_rows() > 0)
        {
            return $user_data->row(0)->firstName;
        }
        return false;
    }
    public function get_School_ID($user_id){
        $this->db->where('uid',$user_id);
        $this->db->select('sid');
        $user_data = $this->db->get('coordinator');
        if($user_data->num_rows() > 0)
        {
            return $user_data->row(0)->sid;
        }
        return false;
    }

    public function get_Last_Name($user_id){
        $this->db->where('uid',$user_id);
        $this->db->select('lastName');
        $user_data = $this->db->get('userdetails');
        if($user_data->num_rows() > 0)
        {
            return $user_data->row(0)->lastName;
        }
        return false;
    }

	//Get the details of logged user to edit pwn profile
    public function edit_Profile($user_id){
        $this->db->where('uid',$user_id);
        $this->db->select('uid,firstName,lastName,email,userType,contactNumber,imgUrl');
        $user_data = $this->db->get('userdetails');
        if($user_data->num_rows() > 0)
        {
            foreach ($user_data->result() as $row)
            {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    public function edit_User_Final($uid,$firstName,$lastName,$email,$userType,$contactNumber,$password){

        $data = array(
            'firstName'=>$firstName,
            'lastName'=>$lastName,
            'email'=>$email,
            'contactNumber'=>$contactNumber,
        );
        $data1 = array(
            'password'=>$password,

        );
        $this->db->where('uid', $uid);
        $this->db->update('userdetails', $data);
        $this->db->where('uid', $uid);
        $this->db->update('user', $data1);


        if($this->db->affected_rows() == 1){
            return true;
        }else{
            return false;
        }
    }

    //Image edit and uplaod

    public function upload_image($file_name,$user_id){
        $data = array(
            'imgUrl'=>$file_name,

        );
        $this->db->where('uid', $user_id);
        $this->db->update('userdetails', $data);
        // modify session
        $this->session->set_userdata('imgUrl',$file_name);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    //Get the number of students in the system
    public function getNumberOfStudents(){
        $this->db->order_by('cid', 'DESC');
        $this->db->where('did', 4);
        $query = $this->db->get('schoolcontacts');
        return $query;
    }
    //Get the number of Schools in the system
    public function getNumberOfSchools(){
        $this->db->order_by('sid', 'DESC');
        $query = $this->db->get('schooldetails');
        return $query;

    }
    //Get the number of Users in the system
    public function getNumberOfUsers(){
        $this->db->order_by('uid', 'DESC');
        $query = $this->db->get('userdetails');
        return $query;

    }
    //Get the number of School Contacts in the system
    public function getNumberOfSchoolContacts(){
        $this->db->order_by('cid', 'DESC');
        $query = $this->db->get('schoolcontacts');
        return $query;

    }
    public function getCountOfCallLogs($start_date,$end_date){
        $this->db->where('date >=', $start_date);
        $this->db->where('date <=', $end_date);
        $this->db->where('category_id', 1);
        $query =  $this->db->get('posts');
        if ( $query->num_rows() > 0 )
        {
            return $query->num_rows();
        }
        else
        {
            return 0;
        }

    }
    public function getCountOfMailLogs($start_date,$end_date){
        $this->db->where('date >=', $start_date);
        $this->db->where('date <=', $end_date);
        $this->db->where('category_id', 3);
        $query =  $this->db->get('posts');
        if ( $query->num_rows() > 0 )
        {
            return $query->num_rows();
        }
        else
        {
            return 0;
        }

    }
    public function getCountOfEmailLogs($start_date,$end_date){
        $this->db->where('date >=', $start_date);
        $this->db->where('date <=', $end_date);
        $this->db->where('category_id', 2);
        $query =  $this->db->get('posts');
        if ( $query->num_rows() > 0 )
        {
            return $query->num_rows();
        }
        else
        {
            return 0;
        }

    }
    public function getCountOfOtherLogs($start_date,$end_date){
        $this->db->where('date >=', $start_date);
        $this->db->where('date <=', $end_date);
        $this->db->where('category_id', 4);
        $query =  $this->db->get('posts');
        if ( $query->num_rows() > 0 )
        {
            return $query->num_rows();
        }
        else
        {
            return 0;
        }

    }

}

?>
