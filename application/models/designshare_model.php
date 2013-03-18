<?php

    class DesignShare_Model extends CI_Model {
        
        public function __construct() {
            
            #when the model is loaded, load the database so it can be queried
            $this->load->database();
            
        }//end __Construct Function
        
        public function getUserByPassword($username,$password) {
            
            #when the user attempts a login, uses CodeIgniter query syntax to access database
            
            #select user information from the database with SQL statement
            $sql = "SELECT userId as userId,userName AS username,userPass AS password
            FROM users
            WHERE (userName = ?)
                AND (userPass = MD5(CONCAT(userSalt,?)))
            ";
            
            #query the database passing in sumbitted username/password values
            $statement = $this->db->query($sql,array($username,$password));
            
            #return and array consisting of user info
            return $statement->result_array();
            
        }//end GetUserByPassword Function
        
        public function registerUser($user_info) {
            
            #uses a for loop to create a salt for encoding user-created passwords
            
            #creates a string of all possible (lower- and upper-case) letters and numbers
            $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            #creates an empty string to hold completed salt
            $result = '';
            
            for($i=0;$i<8;$i++) {
                
                #loops over string 8 times and selects a random character index 0-61 each time
                #then adds the selected character to the end of the $result string
                $result .= $characters[mt_rand(0,61)];
                
            }
            
            #sets variables to values from signup form's $post array (shared by function parameter)
            $name = $user_info['full_name'];
            $username = $user_info['new_username'];
            #to create new password, concatenates user-created password with $result salt and encodes
            #with MD5()
            $password = MD5($result.$user_info['new_password']);
            $email = $user_info['new_email'];
            
            #creates a request to make a new user record in the database
            $sql = "INSERT INTO users
                SET userName = ?,
                    userPass = ?,
                    userFullName = ?,
                    userSalt = ?,
                    userEmail = ?
            ";
            
            #queries database passing in user info variable values
            $statement = $this->db->query($sql,array($username,$password,$name,$result,$email));
            
            #stores username/password combo in an array and returns it for login functionality
            $new_user_info = array('user'=>$username,'password'=>$password);
            return $new_user_info;
            
        }//end RegisterUser Function
        
    }

?>