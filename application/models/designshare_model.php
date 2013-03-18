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
        
    }

?>