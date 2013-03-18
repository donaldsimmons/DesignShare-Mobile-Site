<?php

    class DesignShare_Model extends CI_Model {
        
        public function __construct() {
            
            $this->load->database();
            
        }//end __Construct Function
        
        public function getUserByPassword($username,$password) {
            
            $sql = "SELECT userId AS id,userName AS username,userPass AS password
            FROM users
            WHERE (userName= ?)
                AND (userPass = MD5(CONCAT(userSalt,?)))
            )";
            
            $statement = $this->db->query($sql,array($username,$password));
            
            return $statement->result_array();
            
            
        }//end GetUserByPassword Function
        
    }

?>