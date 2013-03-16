<?php

    class Design_Share extends CI_Controller{
        
        public function view($page="home") {
            
            if(!file_exists('application/views/pages/'.$page.'.php')) {
                
                show_404();
                
            }
            
            $post = $this->input->post(NULL,TRUE);
            
            $this->load->view('html_templates/header.inc');
            $this->load->view('pages/'.$page.'.php');
            $this->load->view('html_templates/footer.inc');
            
        }//end LogIn Function
        
        public function signup() {
            
            redirect('index.php');
            
        }//end SignUp Function
        
    }

?>