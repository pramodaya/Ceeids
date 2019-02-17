<?php
    class Events extends CI_Controller{
        public function index(){
            $slug = $_GET['sid'];
            $data['title']= 'Latest events';

            $data['events']= $this->event_model->get_events($slug);

            $this->load->view('events/index', $data);
        }

        public function view($slug = NULL){
            $slug = $_GET['id'];
            $data['event'] = $this->event_model->get_events($slug);
            
            if (empty($data['event'])){
                show_404();
            }

            $data['title'] = $data['event']['title'];

            $this->load->view('events/view', $data);
        }

        public function create(){

            $data['title'] = 'Create event';
            
			$this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('body', 'Body', 'required');
            
			if($this->form_validation->run() === FALSE){
				$this->load->view('events/create', $data);
            }else{
                // uploadImage
                $config['upload_path']='./assets/images/events';
                $config['allowed_types']='gif|jpg|png';
                $config['max_size']='2048';
                $config['max_width']='500';
                $config['max_height']='500';

                $this->load->library('upload',$config);

                if(!$this->upload->do_upload()){
                    $errors = array('error' => $this->upload->display_errors());
                    $event_image = 'noimage.jpg';
                }else{
                    $data = array('upload_data' => $this->upload->data());
                    $event_image = $_FILES['userfiles']['name'];
                }
                $sid = $this->input->post('sid');
                $this->event_model->create_event($sid);
                $this->session->set_flashdata('added','New User Added Successfully');                
                redirect('events?sid='.$sid);
                
            }

            

        }

        public function delete(){
            $sid = $_GET['sid'];
            $id = $this->input->post('id');
            $this->event_model->delete_event($id);
            redirect('events?sid='.$sid);
        }

        public function edit($slug){
            $data['event'] = $this->event_model->get_event($slug);
            if (empty($data['event'])){
                show_404();
            }

            $data['title'] = 'Edit event';

            $this->load->view('events/edit', $data);

        }

        public function update(){
            $this->event_model->update_event();
            $sid = $this->input->post('sid');
            redirect('events?sid='.$sid);
        }

    }