<?php
class User_Search_Model extends CI_Model
{
    function fetch_data($data1,$data2,$data3)
    {

        $this->db->select("*");
        $this->db->from("userdetails");

        if ($data1 != '' || $data2 != '' || $data3 != '' ){
            $this->db->like('firstName', $data1);
            $this->db->like('userType', $data2);

        }

        $this->db->order_by('uid', 'DESC');
        return $this->db->get();
    }
    //get the users those who has not access to the system (Not Assigned)
    function fetch_assign_users($data1,$data2,$data3){

        $this->db->select('userdetails.email,userdetails.firstName,userdetails.lastName,userdetails.userType,userdetails.uid,user.userName');
        $this->db->from('userdetails');
        $this->db->join('user','user.uid=userdetails.uid','Left');


        if ($data1 != '' || $data2 != '' || $data3 != '' ){
            $this->db->like('userdetails.firstName', $data1);
            $this->db->like('userdetails.userType', $data2);


        }
        $this->db->where('user.userName', null);
        $this->db->order_by('uid', 'DESC');
        return $this->db->get();
    }

    //Get all user details like username and flog = 0
    function fetch_username($data1){

//        $this->db->select("*");
//        $this->db->from("user");

        if ($data1 != ''){
//          $this->db->like('type', $data1);

            $this->db->select('*'); // <-- There is never any reason to write this line!
            $this->db->from('user');
            $this->db->join('userdetails', 'user.uid = userdetails.uid');
            $this->db->like('user.type', $data1);
            $this->db->like('userdetails.flag', 0);

            $query = $this->db->get();

        }
        return $query;

//        $this->db->order_by('uid', 'DESC');
//        return $this->db->get();
    }
    function fetch_coordinator($data1, $data2)
    {

        $this->db->select("user.id,user.type,user.uid,user.userName,userdetails.email,userdetails.firstName,userdetails.lastName,userdetails.imgUrl,userdetails.contactNumber,userdetails.userType");
        $this->db->from('user');
        $this->db->join('userdetails','userdetails.uid=user.uid','Left');
        $this->db->where('user.type', 'Coordinator');
        $this->db->or_where('user.type', 'School Admin');

        if ($data1 != '' || $data2 != '')
        {

            $this->db->like('userdetails.firstName', $data1);
            $this->db->like('userdetails.email', $data2);
        }

        $this->db->order_by('user.id', 'DESC');
        return $this->db->get();
    }


}
?>
