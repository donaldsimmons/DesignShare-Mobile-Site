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
            
            #creates a new salt to concatenate with user-created password (for encryption)
            $salt = $this->generateSalt();
            
            #sets variables to values from signup form's $post array (shared by function parameter)
            $name = $user_info['full_name'];
            $username = $user_info['new_username'];
            #to create new password, concatenates user-created password with $result salt and encodes
            #with MD5()
            $password = MD5($salt.$user_info['new_password']);
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
            $statement = $this->db->query($sql,array($username,$password,$name,$salt,$email));
            
            #stores username/password combo in an array and returns it for login functionality
            $new_user_info = array('user'=>$username,'password'=>$password);
            return $new_user_info;
            
        }//end RegisterUser Function
        
        public function updateUserInfo($update_info) {
            
            #creates the prefix and suffix for all possible update requests
            $query_update_string = 'UPDATE users SET ';
            $query_where_string = ' WHERE (userId = ?)';
            
            #creates array to hold values for updated info (new username, new email, etc.)
            $query_values = array();
            #creates array to hold strings that will query approriate attributes in database
            $query_strings = array();
            
            #uses foreach loop to loop over the posted data from the update form
            foreach($update_info as $key=>&$field) {
                
                #if the field is empty isn't empty (the user submitted data in the current input field)
                if($field !== '') {
                    
                    #check for name of the current input field's key in the array
                    if($key == 'updated_name') {
                       
                        #create a variable to hold the new data
                        $name = $field;
                        #add the data to the values array
                        $query_values[] = $name;
                        #create a string that will query the database for the userFullName attribute
                        $query_strings[] = 'userFullName = ?';
                        
                    }else if($key == 'updated_username') {
                        
                        $username = $field;
                        $query_values[] = $username;
                        $query_strings[] = 'userName = ?';
                        
                    }else if($key == 'updated_password') {
                        
                        #create a variable to hold new data
                        $password = $field;
                        #create a new salt to encode the updated password
                        $updated_salt = $this->generateSalt();
                        #encode the concatenated new salt and the new password with MD5
                        $query_values[] = MD5($updated_salt.$password);
                        #store the new in the array to update the database with the new salt
                        $query_values[] = $updated_salt;
                        #create a string to query the database for the userPass and userSalt attributes
                        $query_strings[] = 'userPass = ?, userSalt = ?';
                        
                    }else if($key == 'updated_email') {
                        
                        $email = $field;
                        $query_values[] = $email;
                        $query_strings[] = 'userEmail = ?';
                        
                    }
                }
            }
            
            #reset the array counters, ensuring correct array counting after manipulation in
            #foreach loop
            reset($query_values);
            reset($query_strings);
            
            #use implode() to combine the $query_strings array, separating them with a comma and space
            #makes a string of the required identifiers for the query (userName = ?, userPass = ?, userSalt = ?)
            $query_identifiers = implode(', ',$query_strings);
            
            #creates the complete MySql query by concatenating the three pieces of the query
            $sql = $query_update_string.$query_identifiers.$query_where_string;
            
            #adds the desired userId to the query_values to represent the selected user in the
            #$query_where_string (WHERE userId = ?)
            $query_values[] = 6;
            
            #queries the database and updates the submitted values
            $statement = $this->db->query($sql,$query_values);
            
        }//end UpdateUserInfo Function
        
        public function deleteUser() {
            
            #creates an SQL query to delete the selected user
            $sql = "DELETE FROM users
                WHERE (userId = ?);
            ";
            
            $id = 6;
            
            #queries the database to remove the current user's record
            $statement = $this->db->query($sql,array($id));
            
        }//end DeleteUser Function
        
        public function generateSalt() {
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
            
            return $result;
        }//end GenerateSalt Function
    }

?>