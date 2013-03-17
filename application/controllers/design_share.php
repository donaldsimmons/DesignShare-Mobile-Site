<?php

    class Design_Share extends CI_Controller{
        
        public function view($page="home") {
            
            $post = $this->input->post(NULL,TRUE);
            $content_page = $page;
            
            
            $this->load->helper('url');
            
            if(!file_exists('application/views/pages/'.$page.'.php')) {
                
                show_404();
                
            }
            
            if(empty($post['username'])) {
                $username = '';
            }else{
                $username = strtolower(trim($post['username']));
            }
            
            if(empty($post['password'])) {
                $password = '';
            }else{
                $password = strtolower(trim($post['password']));
            }
            
            $this->load->view('html_templates/header.inc');
            $this->load->view('pages/'.$page.'.php');
            $this->load->view('html_templates/footer.inc');
            
            if($post['login_button']) {
                if(!empty($username) && !empty($password)) {    
                    
                    if(preg_match_all('/[^a-z]/',$username) || preg_match_all('/[^a-z]/',$password)) {
                        redirect(base_url('index.php/design_share/view/login_error'));
                    }else{
                        redirect(base_url('index.php/design_share/view/list'));
                    }
                    
                }
                
            }
            
        }//end LogIn Function
        
    }

?>