<?php 
    Class Post_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }
        public function get_posts($lid = FALSE){
                $this->db->order_by('posts.lid','DESC');
                $this->db->join('categories','categories.id=posts.category_id');
                $this->db->join('schoolcontacts','schoolcontacts.cid=posts.cid');
                $this->db->join('user','user.uid=posts.uid');
                $this->db->join('flags','flags.flag=posts.flag');
                // $this->db->where('posts.flag',1);
                
            if ($lid == FALSE){
                $query = $this->db->get('posts');
                return $query->result_array()   ;
            }
            $query = $this->db->get_where('posts',array('lid' => $lid));
            return $query->row_array();
        }

        public function create_post($cid){
            $slug = url_title('log');
            $data = array(
                'uid'  => $this->session->userdata('user_id'),
                'cid'  => $this->input->post('cid'),
                'title' => $slug,
                'slug'  => $slug,
                'body'  => $this->input->post('body'),
                'category_id' => $this->input->post('category_id'),
                'date'  => $this->input->post('date'),
                'time'  => $this->input->post('time'),

            );
            return $this->db->insert('posts',$data);
        }

        public function delete_post($lid){
            $data = array(
                'flag' => 0
            );
            $this->db->where('lid',$lid);
            $this->db->update('posts',$data);
            return true;
        }

        public function update_post(){
            $slug = url_title('log');

            $data = array(
                'title' => $slug,
                'slug'  => $slug,
                'body'  => $this->input->post('body'),
                'category_id' => $this->input->post('category_id'),
                'date'  => $this->input->post('date'),
                'time'  => $this->input->post('time'),
                'edited' => 1
            );
            $this->db->where('lid',$this->input->post('lid'));            
            return $this->db->update('posts',$data);
        }

        public function get_categories(){
            $this->db->order_by('name');
            $query = $this->db->get('categories');
            return $query->result_array();
        }

        public function get_contacts(){
            $this->db->order_by('cid');
            $query = $this->db->get('schoolcontacts');
            return $query->result_array();
        }
        public function get_usertype($uid){
            $this->db->select('type');
            $this->db->where('uid',$uid);  
            $query = $this->db->get('user');
            return $query->result_array();
        }

    }