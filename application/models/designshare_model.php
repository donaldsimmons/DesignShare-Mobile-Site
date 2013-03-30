<?php

    class DesignShare_Model extends CI_Model {
        
        public function __construct() {
            
            #when the model is loaded, load the database so it can be queried
            $this->load->database();
            
        }//end __Construct Function
        
        public function getUserByPassword($username,$password) {
            
            #when the user attempts a login, uses CodeIgniter query syntax to access database
            
            #select user information from the database with SQL statement
            $sql = "SELECT userId AS userId,userName AS username,userPass AS password
            FROM users
            WHERE (userName = ?)
                AND (userPass = MD5(CONCAT(userSalt,?)))
            ";
            
            #query the database passing in sumbitted username/password values
            $statement = $this->db->query($sql,array($username,$password));
            
            #return and array consisting of user info
            return $statement->row_array();
            
        }//end GetUserByPassword Function
        
        public function getUserById($user_id) {
            
            #creates a query to get user info based on id number
            $sql = "SELECT userId AS userId,userName AS username,userPass AS password
            FROM users
            WHERE (userId = ?)
            ";
            
            #queries database
            $statement = $this->db->query($sql,array($user_id));
            
            #returns an array of user info 
            return $statement->row_array();
            
        }//end GetUserById Function
        
        public function registerUser($user_info) {
            
            #creates a new salt to concatenate with user-created password (for encryption)
            $salt = $this->generateSalt();
            
            #sets variables to values from signup form's $post array (shared by function parameter)
            $name = $user_info['full_name'];
            $username = $user_info['new_username'];
            #to create new password, concatenates user-created password with $result salt and encodes with MD5()
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
        
        public function getUserInfo($user_info) {
            
            #stores the 'userId' value of the $user_info argument
            $user_id = $user_info['userId'];
            
            #creates a request to the server for the pertinent user data
            $sql = "SELECT userFullName AS name, userEmail AS email
                FROM users
                WHERE (userId = ?)
            ";
            
            #queries the database for the desired user info, passing in the userId string cast as an integer
            $statement = $this->db->query($sql,array((int)$user_id));
            
            #returns the array of results
            return $statement->row_array();
            
        }//end GetUserInfo Function
        
        public function updateUserInfo($update_info,$user_id) {
            
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
            
            #reset the array counters, ensuring correct array counting after manipulation in foreach loop
            reset($query_values);
            reset($query_strings);
            
            /* use implode() to combine the $query_strings array, separating them with a comma and space
            makes a string of the required identifiers for the query (userName = ?, userPass = ?, userSalt = ?) */
            $query_identifiers = implode(', ',$query_strings);
            
            #creates the complete MySql query by concatenating the three pieces of the query
            $sql = $query_update_string.$query_identifiers.$query_where_string;
            
            #adds the desired userId to the query_values to represent the selected user in the $query_where_string (WHERE userId = ?)
            $query_values[] = $user_id;
            
            #queries the database and updates the submitted values
            $statement = $this->db->query($sql,$query_values);
            
        }//end UpdateUserInfo Function
        
        public function deleteUser($user_id) {
            
            #creates an SQL query to delete the selected user
            $sql = "DELETE FROM users
                WHERE (userId = ?);
            ";
            
            #stores the current user's userId
            $id = $user_id;
            
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
                
                /* loops over string 8 times and selects a random character index 0-61 each time
                then adds the selected character to the end of the $result string */
                $result .= $characters[mt_rand(0,61)];
                
            }
            
            return $result;
        }//end GenerateSalt Function
        
        public function getListFromAPI() {
            
            #loads the content from the Dribbble API
            $designs = file_get_contents('https://api.dribbble.com/shots/popular');
            #decodes the returned JSON results and then casts it as an array for manipulation
            $data = (array)json_decode($designs);
            
            #stores the returned data for the different list items in the $shots array
            $shots = $data['shots'];
            
            #uses foreach loop to isolate each result
            foreach($shots as &$design) {
                
                #for each design, store the necessary information for propogating the desing list
                $id = $design->id;
                $title = $design->title;
                $image_url = $design->image_url;
                $player_name = $design->player->name;
                
                #creates an array to store the values for each result
                $shot_single = array('id'=>$id,'title'=>$title,'image_url'=>$image_url,'player_name'=>$player_name);
                
                #adds the results array to the main array, which will hold all of the necessary result information
                $shots_set[] = $shot_single;
            }
            
            #creates an array that will be passed to the details list html page stores the collective results
            $shots['shots_data'] = $shots_set;
            
            #returns the results to the controller
            return $shots;
            
        }//end GetListFromAPI Function
        
        public function getMyListItemsFromAPI($my_designs) {
            
            #uses foreach loop to loop over each design in the $my_designs array (saved designs for each user)
            foreach($my_designs as &$design) {
                #for each design
                
                #store the API information in the $shot variable
                $shot = file_get_contents('https://api.dribbble.com/shots/'.$design['design']);
                
                #decode the returned json object and cast it as an array
                $data = (array) json_decode($shot);
                
                #sets values for list item information
                $id = $design['design'];
                $title = $data['title'];
                $image_url = $data['image_url'];
                $player_name = $data['player']->name;
                
                #creates an array that holds the info for the current design
                $shot_single = array('id'=>$id,'title'=>$title,'image_url'=>$image_url,'player_name'=>$player_name);
               
                #adds the info array to another array that holds all of this user's favorite designs
                $shots_set[] = $shot_single;
            }
            
            #sets the complete designs array as the 'shot_data' value for the $shots array
            $shots['shot_data'] = $shots_set;
            
            #returns the $shots results array
            return $shots;
            
        }//end GetMyListItemsFromAPI function
        
        public function getDetailsFromAPI($id) {
            
            #returns design-specific details from API using the id paramter passed in
            $details = file_get_contents('https://api.dribbble.com/shots/'.$id);
            #stores the decoded json from the API request as an array
            $data = (array) json_decode($details);
            
            #explodes the date string so it can be reformatted for readability
            $date = explode(' ',$data['created_at']);
            
            #uses substr() function to select the month and date substrings and the year substrings
            #concatenates the substrings to get 'MM/DD/YYYY' format
            $formatted_date = substr($date[0],5,5).'/'.substr($date[0],0,4);
            
            /* stores the necessary data in an array, separated by keys
            data['player'] is an object, so any values stored there need to be accessed with
            object notation */
            $details_array = array('title'=>$data['title'],'created_at'=>$formatted_date,
                                   'image_url'=>$data['image_url'],'player_name'=>$data['player']->name,
                                   'player_twitter'=>$data['player']->twitter_screen_name,
                                   'player_location'=>$data['player']->location,
                                   'player_url'=>$data['player']->website_url);
            
            #returns the array for use in the HTML
            return $details_array;
            
        }//end GetDetailsFromAPI Function
        
        public function loadComments($design_id) {
            
            #creates a SELECT statement to select comment info from the database
            $sql = "SELECT comments.commentId AS commentId, comments.commentText AS comment, comments.userId AS user,
                comments.submitTime AS timestamp, users.userName as username
                FROM comments
                INNER JOIN users
                ON comments.userId = users.userId
                WHERE (designId = ?)
                ORDER BY submitTime DESC
            ";
            
            /*queries the database using the sql statement and the design_id gotten from the API for
            this specific design */
            $statement = $this->db->query($sql,array($design_id));
            
            #returns an array of comments for the selected designs
            return $statement->result_array();
            
        }//end LoadComments Function
        
        public function postComment($comment_info) {
            
            #creates array of values to insert into database query
            $query_values = array($comment_info['input'],$comment_info['user'],$comment_info['design']);
            
            #creates a request to add a comment to the database using user-specific info
            $sql = "INSERT INTO comments
                SET
                    commentText = ?,
                    userId = ?,
                    designId = ?
            ";
            
            #queries the database to insert a comment into the comments table
            $statement = $this->db->query($sql,$query_values);
            
        }//end postComment Function
        
        public function deleteComment($comment_id) {
            
            #creates a request to delete a comment with the matching comment_id value
            $sql = "DELETE FROM comments
                WHERE (commentId = ?)
            ";
            
            #queries the database to delete comment
            $statement = $this->db->query($sql, array($comment_id));
            
        }//end DeleteComment Function
        
        public function addDesignToUserList($design_id,$user) {
            
            #creates a query to add a favorite design to a user's list
            $sql = "INSERT INTO favorite_designs
                SET
                    designId = ?,
                    userId = ?
            ";
            
            #queries the database to add the record
            $statement = $this->db->query($sql,array($design_id,$user));
            
        }//end AddDesignToUserList Function
        
        public function removeDesignFromUserList($design_id,$user) {
            
            #creates a query statement to delete the chosen design_id from the current user's list
            $sql = "DELETE FROM favorite_designs
                WHERE (designId = ?)
                    AND (userId = ?)
            ";
            
            #queries the database to remove the design for that user
            $statement = $this->db->query($sql,array($design_id,$user));
            
        }//end RemoveDesignFromUserList Function
        
        public function getMyList($user_id) {
            
            #creates a query to select the designs a user has bookmarked in the app
            $sql = "SELECT designId AS design, userId AS user
                FROM favorite_designs
                WHERE (userId = ?)
            ";
            
            #queries the database to get list of user's designs
            $statement = $this->db->query($sql,array($user_id));
            
            #stores the returned data from the db as an array
            $results = $statement->result_array();
            
            #return the $results array
            return $results;
        
        }//end GetMyList Function
        
        public function checkMyList($design_id,$user_id) {
            
            #creates query statement to check for current design in user's favorites list
            $sql = "SELECT designId AS design, userId AS user
                FROM favorite_designs
                WHERE (designId = ?)
                    AND (userId = ?)
            ";
            
            #queries database to check for current design in user's list
            $statement = $this->db->query($sql,array($design_id,$user_id));
            
            #stores the result_array from the statement object
            $result = $statement->result_array();
            
            #uses conditional to set favorite check variable
            if(count($result) == 0) {
                #if the design isn't present on the user's list
                
                #$favorite is equal to false
                $favorite = false;
            }else{
                #if the design is present on the user's list
                
                #$favorite is equal to false
                $favorite = true;
            }
            
            #returns the 'checked' indicator
            return $favorite;
            
        }//end CheckList Function
    }

?>