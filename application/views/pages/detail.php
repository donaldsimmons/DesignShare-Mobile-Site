<!-- Begins Details_Page jQuery Mobile Page -->

<!-- Shows details for selected content. Allows users to create and post comments. Contains back link to content list -->

<div id="details_page" data-role="page">
    <div id="container">
        <div data-role="header">
            <img class="header_logo" src="<?php echo base_url('assets/images/designshare_logo.png'); ?>" alt="DesignShare Logo" />
            <p class="text_header">Upload Your Own Design!</p>
            <div data-role="navbar">
                <ul>
                    <li><a href="<?php echo base_url('index.php'); ?>">Edit Profile</a></li>
                    <li><a href="<?php echo base_url('index.php/help'); ?>" data-ajax="false">Help</a></li>
                    <li><a href="<?php echo base_url('index.php/design_share/designs'); ?>">Designs</a></li>
                    <li><a href="<?php echo base_url('index.php/logout/signout'); ?>">Log Out</a></li>
                </ul>
            </div> <!-- End NavBar Div -->
        </div> <!-- End Header Div -->
        <div data-role="content">
            <img id="design_image" src="<?php echo $details['image_url']; ?>" alt="<?php echo $details['title']; ?>" />
            <div id="details_collapsible" data-role="collapsible" data-theme="e" data-content-theme="a">
                <h3>Details</h3>
                <table id="detail_list">
                    <tr>
                        <th>Title:</th>
                        <td><?php echo $details['title']; ?></td>
                    </tr>
                    <tr>
                        <th>Designer:</th>
                        <td><?php echo $details['player_name']; ?></td>
                    </tr>
                    <tr>
                        <th>Created At:</th>
                        <td><?php echo $details['created_at']; ?></td>
                    </tr>
                    <tr>
                        <th>Location:</th>
                        <td><?php echo $details['player_location']; ?></td>
                    </tr><br />
                    <tr>
                        <th>Designer Twitter:</th>
                        <td><?php echo $details['player_twitter']; ?></td>
                    </tr>
                    <tr>
                        <th>Designer Website:</th>
                        <td><a href="<?php echo $details['player_url']; ?>"><?php echo $details['player_url']; ?></a></td>
                    </tr>
                </table>   
            </div> <!-- End Details_Collapsible Div -->
            <form id="comment_form" action="<?php echo base_url('index.php/design_share/postComment/'.$design_id); ?>" method="post" data-ajax="false">
                <input type="text" name="comment_input" id="comment_input" />
                <input type="submit" data-theme="c" value="Submit Comment" id="comment_submit" />
            </form>
            <a id="report_link" href="<?php echo base_url('index.php/sendReport'); ?>" data-ajax="false">Report Misuse or Complaint >></a>
            <h4>Comments:</h4>
            <?php
                #uses conditional to check if there are comments for this design in the database
                if(empty($comments)) {
                    #if the $comments array is empty, display the placeholder message
                    echo '<p>Be the first to leave a comment!</p>';
                }else {
                    #if there are comments for this design in the $comments array
                    
                    #use a foreach loop to creae a list item for the comment list
                    foreach($comments as $comment) {
                        
                        #uses conditional to check if the current user has submitted the selected comment
                        if($comment['user'] === $user) {
                            #if the current user's id ($user (from session variable)) matches
                            #the id of the user who submitted the comment
                            
                            #echo the comment as a linked list item to allow comment edits
                            #passes into "href" the commentId to be edited and the designId that the comment belongs to
                            echo '<ul id="comment_list" data-role="listview" data-theme="e">
                                <li>
                                    <a href="'.base_url('index.php/deleteComment/'.$comment['commentId'].'/'.$design_id).'" data-theme="e" data-ajax="false">
                                        <p>'.$comment['username'].'</p>
                                        <p>'.$comment['comment'].'</p>
                                        <p>'.$comment['timestamp'].'</p>
                                    </a>
                                </li>
                            </ul>';
                        }else{
                            #if the current user's id and the comment's user id don't match
                            
                            #echo the comment as a plain list item to prevent edits by other users
                            echo '<ul id="comment_list" data-role="listview" data-theme="e">
                                <li>
                                    <p>'.$comment['username'].'</p>
                                    <p>'.$comment['comment'].'</p>
                                    <p>'.$comment['timestamp'].'</p>
                                </li>
                            </ul>';
                        }
                    }
                }
            ?>
        </div> <!-- End Content Div -->
        <div class="footer" data-role="footer">
            <p>&copy; 2013 DesignShare | All designs © their respective owners.</p>
            <p>Donald Simmons</p>
        </div><!-- End Footer Div -->    
    </div> <!-- End Container Div -->
</div> <!-- End Details_Page  Div -->
