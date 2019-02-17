<?php 
    Class Event_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }
        public function get_events($slug){
                $this->db->order_by('events.date','ASC');
                $this->db->where('sid',$slug);
                $query = $this->db->get('events');
                return $query->result_array();
        }
        public function get_event($slug){
            $query = $this->db->get_where('events',array('slug' => $slug));
            return $query->row_array();
    }

        public function create_event($sid){
            $slug = url_title($this->input->post('title'));

            $data = array(
                'title' => $this->input->post('title'),
                'slug'  => $slug,
                'sid'  => $sid,
                'body'  => $this->input->post('body'),
                'date'  => $this->input->post('date'),
                'startTime'  => $this->input->post('start'),
                'endTime'  => $this->input->post('end')

            );
            return $this->db->insert('events',$data);
        }

        public function delete_event($id){
            $this->db->where('id',$id);
            $this->db->delete('events');
            return true;
        }

        public function update_event(){
            $slug = url_title($this->input->post('title'));

            $data = array(
                'title' => $this->input->post('title'),
                'slug'  => $slug,
                'body'  => $this->input->post('body'),
                'date'  => $this->input->post('date'),
                'startTime'  => $this->input->post('start'),
                'endTime'  => $this->input->post('end')
            );
            $this->db->where('id',$this->input->post('id'));            
            return $this->db->update('events',$data);
        }

        public function get_categories(){
            $this->db->order_by('name');
            $query = $this->db->get('categories');
            return $query->result_array();
        }

    }