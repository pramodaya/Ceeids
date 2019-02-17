    <?php
    class Posts extends CI_Controller{
        public function index(){
            $data['title']= 'Interaction Log';

            $data['posts']= $this->post_model->get_posts();

            $this->load->view('posts/index', $data);
        }

        public function view($slug = NULL){
            $lid = $_GET['lid'];
            $data['post'] = $this->post_model->get_posts($lid);
            // $data['joindata'] = $this->post_model->get_post($lid);
            $data['categories'] = $this->post_model->get_categories();
            
            if (empty($data['post'])){
                show_404();
            }

            $data['title'] = $data['post']['title'];

            $this->load->view('posts/view', $data);
        }

        public function create(){
            $cid = (int)$_GET['cid'];
            $data['title'] = 'Create Log';
            $data['categories'] = $this->post_model->get_categories();
            $data['contacts'] = $this->post_model->get_contacts(); 
        
            $this->form_validation->set_rules('body', 'Body', 'required');
            
			if($this->form_validation->run() === FALSE){
				$this->load->view('posts/create', $data);
            }else{
                // uploadImage
                $config['upload_path']='./assets/images/posts';
                $config['allowed_types']='gif|jpg|png';
                $config['max_size']='2048';
                $config['max_width']='500';
                $config['max_height']='500';

                $this->load->library('upload',$config);

                if(!$this->upload->do_upload()){
                    $errors = array('error' => $this->upload->display_errors());
                    $post_image = 'noimage.jpg';
                }else{
                    $data = array('upload_data' => $this->upload->data());
                    $post_image = $_FILES['userfiles']['name'];
                }
                $this->post_model->create_post($cid);
                redirect('posts');
            }


        }

        public function delete($lid){
            $this->post_model->delete_post($lid);
            redirect('posts');
        }

        public function edit($lid){
            $lid = $_GET['lid'];
            $data['post'] = $this->post_model->get_posts($lid);
            

            $data['categories'] = $this->post_model->get_categories();
            
            if (empty($data['post'])){
                show_404();
            }

            $data['title'] = 'Edit Log';

            $this->load->view('posts/edit', $data);

        }

        public function update(){
            $this->post_model->update_post();
            redirect('posts');
        }
        

    }