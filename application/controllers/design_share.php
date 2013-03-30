<?php

    class Design_Share extends CI_Controller{
        
        public function __construct() {
            
            /* when the class is called run the parent's constructor function to inherit from parent
            class */
            parent::__construct();
            
            #start a session for the current user
            $this->load->library('session');
            
            #loads the URL helper class so the base_url() method can be used
            $this->load->helper('url');
            
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
            
            #removes the signup button from the post array
            unset($post['signup_button']);
            
            redirect(base_url('index.php'));
            
        }//end SignUp Function
        
        public function updateUser() {
            
            #creates variable to hold a reference to the CodeIgniter $_POST variable
            $post = $this->input->post(NULL,TRUE);
            
            #stores the current user's id
            $user_id = $this->session->userdata('userId');
            
            #loads the model for sending database queries
            $this->load->model('designshare_model');
            
            #calls the updateUserInfo method from the model
            $this->designshare_model->updateUserInfo($post,$user_id);
            
            #calls the updateSessionData method from the model to update the session info with new user data
            $this->updateSessionData($user_id);
            
            #redirects to the index page
            redirect(base_url('index.php'));
            
        }//end UpdateUser Function
        
        public function deleteUser() {
            
            #creates variable to hold a reference to the CodeIgniter $_POST variable
            $post = $this->input->post(NULL,TRUE);
            
            #loads the model for sending database queries
            $this->load->model('designshare_model');
            
            #stores the userId of the current user
            $user = $this->session->userdata('userId');
            
            #deletes user
            $this->designshare_model->deleteUser($user);
            
            #destroys the current session
            $this->session->sess_destroy();
            
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
            
            #stores the userId for the current user
            $user = $this->session->userdata('userId');
            
            #stores the designs info and the user info in an array
            $designs_info = array('shots'=>$shots,'user'=>$user);
            
            #displays the designs page and passes in the data for the list items and user
            $this->view('designs',$designs_info);
            
        }//end Designs Function
        
        public function details($design_id) {
            
            #loads the model for sending database queries
            $this->load->model('designshare_model');
            
            #holds the current user's userId used to check for comments generated by the current user
            $user_id = $this->session->userdata('userId');
            
            #requests the design-specific details for the design id number selected by the user
            $details = $this->designshare_model->getDetailsFromAPI($design_id);
            
            #loads any comments for this design that might be stored in the database
            $comments = $this->designshare_model->loadComments($design_id);
            
            /* calls checkMyList method from model to check if current design is already on list
            will be used to determine which link (add/remove design) is placed in details page */
            $on_list = $this->designshare_model->checkMyList($design_id,$user_id);
                        
            #creates a new array for holding all the detail page's content
            $detail_page_content = array('user'=>$user_id,'details'=>$details,'comments'=>$comments,'design_id'=>$design_id,'on_list'=>$on_list);
            
            /* calls the view function and passes the $detail_page_content array that holds API values
            and the comments for the design */
            $this->view('detail',$detail_page_content);
            
        }//end Details Function
        
        public function postComment($design_id) {
            
            #loads the model for querying the database
            $this->load->model('designshare_model');
            
            #stores the post array values from the comment form
            $post = $this->input->post(NULL,TRUE);
            
            #stores the comment text that was input
            $input = $post['comment_input'];
            #stores the userId of the user that is posting the comment
            $user_id = $this->session->userdata('userId');
            
            #uses conditional to check if a comment was actually submitted to the database
            if(!empty($input)) {
                #if the comment input isn't empty
                
                #create an array that holds user and comment info
                $comment_info = array('input'=>$input,'user'=>$user_id,'design'=>$design_id);
                
                #call the postComment method of the model to add the comment to the database
                $this->designshare_model->postComment($comment_info);
            }
            
            #redirect the user back the details page for the design, now (possibly) updated with the new comment
            redirect(base_url('index.php/details/'.$design_id));
            
        }//end PostComment Function
        
        public function deleteComment($comment_id,$design_id) {
            
            #stores the post array values from the delete_comment_form
            $post = $this->input->post(NULL,TRUE);
            
            #uses conditional to check if the delete button has been clicked
            if($post['delete_comment_button']) {
                #if the delete_comment_button is present in the post array
                
                #loads the model for sending database queries
                $this->load->model('designshare_model');
                
                #calls the deleteComment method from the model and deletes the comment with the matching comment_id value
                $this->designshare_model->deleteComment($comment_id);
                
                #removes the delete_comment_button from the post array
                unset($post['delete_comment_button']);
                
                #redirects the user back to the details page of the design they were viewing
                redirect(base_url('index.php/details/'.$design_id));
            }else{
                #if the delete button hasn't been clicked
                
                #view the delete button screen to allow users to delete the comment
                $this->view('delete_comment');
            }
            
        }//end DeleteComment Function
        
        public function sendReport() {
            
            #stores the post array values from the report form
            $post = $this->input->post(NULL,TRUE);
            
            #uses conditional to check if a report has been submitted
            if(!empty($post['submit_report_button'])) {
               #if the 'submit_report_button' has been clicked and is present in the post array
              
                #sets variables to values from the report form
                $username = $post['report_username'];
                $name = $post['report_name'];
                $report = $post['report_comment'];
                
                #stores session information for use in the function that sends the report
                $email = $this->session->userdata('email');
                $user_id = $this->session->userdata('userId');
                
                #stores relevant information in an array
                $report_info = array('username'=>$username,'name'=>$name,'report'=>$report,'email'=>$email,'userId'=>$user_id);
                
                #passes array into the private functinon that will send an email to site admin
                $this->sendReportEmail($report_info);
                
                #shows the 'report_sent' notice page
                $this->view('report_sent'); 
                
            }else{
                #if the 'submit_report_button' hasn't been clicked and isn't present in the post array
                
                #show the report form
                $this->view('report_form');
            }
            
        }//end SendReport Function
        
        public function addToUserList($design_id) {

            #loads the model for sending database queries
            $this->load->model('designshare_model');
            
            /* stores the userId for the current user
            this will be used when selecting which favorite designs to show based on which user is
            currently logged in */
            $user = $this->session->userdata('userId');
            
            #calls the method that adds the design to the favorite_designs table in the db
            $this->designshare_model->addDesignToUserList($design_id,$user);
            
            #redirects the user to the details page they were viewing
            redirect(base_url('index.php/details/'.$design_id));
            
        }//end AddToUserList Function
        
        public function removeFromUserList($design_id) {
            
            #loads the model for sending database queries
            $this->load->model('designshare_model');
            
            /* stores the userId for the current user
            this will be used to identify which user's list the design_id should be removed from */
            $user = $this->session->userdata('userId');
            
            /* calls the removeDesignFromUserList method of the model to remove the design from the
            list in the database */
            $this->designshare_model->removeDesignFromUserList($design_id,$user);
            
            #redirects the user to the details page they were viewing
            redirect(base_url('index.php/details/'.$design_id));
            
        }//end RemoveFromUserList Function
        
        public function myList($user_id) {
            
            #loads the model for sending database queries
            $this->load->model('designshare_model');
            
            #calls the getMyList method from the model to get any designs that might be saved for this user
            $my_designs = $this->designshare_model->getMyList($user_id);
            
            #once the user's list is loaded, get the list items' info from the API
            $shots = $this->designshare_model->getMyListItemsFromAPI($my_designs);
            
            #then view the users list
            $this->view('user_list_page',$shots);
        }//end MyList Function
        
        private function sendReportEmail($report_info) {
            
            #loads the 'email' library from the CI files
            $this->load->library('email');
            
            #sets properties for the email template that will be sent
            $this->email->from($report_info['email'],$report_info['name']);
            $this->email->to('yert511@gmail.com');
            $this->email->subject('DesignShare Misuse Report');
            $this->email->message($report_info['report']);
            
            #sends the new email to the '$this->email->to' address
            $this->email->send();
            
        }//end SendReportEmail Function
        
        private function updateSessionData($user_id) {
            
            #loads the model
            $this->load->model('designshare_model');
            
            #gets the new user info based on the user's id (which doesn't ever change)
            $user = $this->designshare_model->getUserById($user_id);
            
            #gets the profile information from the database
            $profile_info = $this->designshare_model->getUserInfo($user);
            
            #updates the session with the new user info
            $this->session->set_userdata($user);
            $this->session->set_userdata($profile_info);
            
        }//end UpdateSessionData Function
    }

?>