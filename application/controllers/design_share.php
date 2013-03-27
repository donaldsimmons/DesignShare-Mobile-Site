<?php

    class Design_Share extends CI_Controller{
        
        public function __construct() {
            
            #when the class is called run the parent's constructor function to inherit from parent
            #class
            parent::__construct();
            
            #start a session for the current user
            $this->load->library('session');
            
        }//end __Construct Function
        
        public function view($page="list",$data=array()) {
            
            #uses conditional to check if request page exists
            if(!file_exists('application/views/pages/'.$page.'.php')) {
                
                #if page doesn't exist, show the 404 message
                show_404();
                
            }
            
            #uses conditional to check if the user is logged in when the view method is called
            if($this->session->userdata('login_state') == TRUE) {
                #if a user is logged in
                
                #loads the header and footer include files for the page, and the desired page
                $this->load->view('html_templates/header.inc');
                $this->load->view('pages/'.$page.'.php',$data);
                $this->load->view('html_templates/footer.inc');
            }else{
                #if a user isn't logged in
                
                #loads the header and footer include files for the page, and the home page sign-in forms
                $this->load->view('html_templates/header.inc');
                $this->load->view('pages/home.php',$data);
                $this->load->view('html_templates/footer.inc');
            }   
        
        }//end View Function
        
        public function signup() {
            
            #creates variable to hold a reference to the CodeIgniter $_POST variable
            $post = $this->input->post(NULL,TRUE);
            
            #loads the model for sending database queries
            $this->load->model('designshare_model');
            
            #registers the new user in the database, saves returned user info for login
            $new_user = $this->designshare_model->registerUser($post);
            
            #log the new user in using the getUserByPassword function and the $new_user_info array values
            $user = $this->designshare_model->getUserByPassword($new_user['user'],$new_user['password']);
            unset($post['signup_button']);
            $this->view('list');
            
        }//end SignUp Function
        
        public function updateUser() {
            
            #loads the URL helper class so the base_url() method can be used
            $this->load->helper('url');
            
            #creates variable to hold a reference to the CodeIgniter $_POST variable
            $post = $this->input->post(NULL,TRUE);
            
            #loads the model for sending database queries
            $this->load->model('designshare_model');
            
            $this->designshare_model->updateUserInfo($post);
            $this->view('list');
            
        }//end UpdateUser Function
        
        public function deleteUser() {
            #loads the URL helper class so the base_url() method can be used
            $this->load->helper('url');
            
            #creates variable to hold a reference to the CodeIgniter $_POST variable
            $post = $this->input->post(NULL,TRUE);
            
            #loads the model for sending database queries
            $this->load->model('designshare_model');
            
            #deletes user
            $this->designshare_model->deleteUser();
            
            #redirects page back to home page
            header('Location: '.base_url('index.php'));
            #exits the current function 
            exit;
            
        }//end DeleteUser Function
        
        public function designs() {
            
            #loads the model for sending database queries
            $this->load->model('designshare_model');
            
            #stores the API content for displaying the list of artwork
            $shots = $this->designshare_model->getListFromAPI();
            
            #displays the designs page and passes in the data for the list items
            $this->view('designs',$shots);
            
        }//end Designs Function
        
        public function details($design_id) {
            
            #loads the model for sending database queries
            $this->load->model('designshare_model');
            
            #requests the design-specific details for the design id number selected by the user
            $details = $this->designshare_model->getDetailsFromAPI($design_id);
            
            #loads any comments for this design that might be stored in the database
            $comments = $this->designshare_model->loadComments($design_id);
            
            #creates a new array for holding all the detail page's content
            $detail_page_content = array('details'=>$details,'comments'=>$comments);
            
            #calls the view function and passes the $detail_page_content array that holds API values
            #and the comments for the design
            $this->view('detail',$detail_page_content);
            
        }//end Details Function
    }

?>