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
                    <li><a href="<?php echo base_url('index.php#user_list_page'); ?>" data-ajax="false">My Art</a></li>
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
            <form id="comment_form" action="?" method="post">
                <input type="text" name="comment_input" id="comment_input" />
                <input type="submit" data-theme="c" value="Submit Comment" id="comment_submit" />
            </form>
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
                        echo '<ul id="comment_list" data-role="listview" data-theme="e">
                                <li>
                                    <a href="#edit_comment_page" data-theme="e" data-rel="dialog" data-transition="pop">
                                        Sample Comment
                                    </a>
                                </li>
                                <li><input type="button" data-role="button" data-theme="e" value="See More Comments" data-icon="arrow-d" /></li>
                        </ul>';
                    }
                }
            ?>
        </div> <!-- End Content Div -->
        <div class="footer" data-role="footer">
            <p>DesignShare</p>
            <p>MDD-1303</p>
            <p>Donald Simmons</p>
        </div><!-- End Footer Div -->    
    </div> <!-- End Container Div -->
</div> <!-- End Details_Page  Div -->


<!-- Begins Edit_Comment_Page jQuery Mobile Page -->

<!-- A dialog that allows users to delete comments they've posted -->

<div id="edit_comment_page" data-role="page">
    <div id="container">
        <div data-role="header" data-theme="a">
            <img class="header_logo" id="delete_header" src="<?php echo base_url('assets/images/designshare_logo.png'); ?>" alt="DesignShare Logo" />
             <p class="text_header">Delete Comment?</p>
        </div> <!-- End Header Div -->
        <div data-role="content">
            <input type="button" data-role="button" data-theme="b" value="Delete" />
        </div> <!-- End Content Div -->
        <div class="footer" data-role="footer">
            <p>DesignShare</p>
            <p>MDD-1303</p>
            <p>Donald Simmons</p>
        </div><!-- End Footer Div -->    
    </div> <!-- End Container Div -->
</div> <!-- End Edit_Content_Page  Div -->