<?php

    class Design_Share extends CI_Controller{
        
        public function view($page="home") {
            
            $model = $this->load->model('designshare_model');
            
            if(!file_exists('application/views/pages/'.$page.'.php')) {
                
                show_404();
                
            }
            
            #loads the header and footer include files for the page, as well as the currentPage
            $this->load->view('html_templates/header.inc');
            $this->load->view('pages/'.$page.'.php');
            $this->load->view('html_templates/footer.inc');
            
        }//end View Function
        
        public function login() {
            
            #loads the URL helper class so the base_url() method can be used
            $this->load->helper('url');
            
            $post = $this->input->post(NULL,TRUE);
            $model = $this->load->model('designshare_model');
            
            #uses conditional to check the value for the username input field in the $post array
            if(empty($post['username'])) {
                #if no username was submitted, the username variable is empty
                $username = '';
            }else{
                #if a username was submitted, make sure the string is all lowercased and trim the whitespace
                $username = strtolower(trim($post['username']));
            }
            
             #uses conditional to check the value for the password input field in the $post array
            if(empty($post['password'])) {
                #if no password was submitted, the password variable is empty
                $password = '';
            }else{
                #if a password was submitted, make sure the string is all lowercased and trim the whitespace
                $password = strtolower(trim($post['password']));
            }
            
             #uses conditional to check whether a user has attempted a log in by looking for a
            #login_button key in the $post array
            if($post['login_button']) {
                #if the button was clicked:
                
                #uses conditional to make sure username and password were filled in
                if(!empty($username) && !empty($password)) {
                    
                    #uses conditional to check for correct username/password format
                    if(preg_match_all('/[^a-z]/',$username) || preg_match_all('/[^a-z]/',$password)) {
                        #if username or password contains other characters than 'a-z'
                        #change current page view
                        $content_page = 'login_error';
                        #redirect to current page
                        redirect(base_url('index.php/design_share/view/'.$content_page));
                    }else{
                        $content_page = 'list';
                        redirect(base_url('index.php/design_share/view/'.$content_page));
                    }
                    
                }
                
            }
            
        }//end Login Function
    }

?>