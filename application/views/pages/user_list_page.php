<!-- Begins User_List_Page jQuery Mobile Page -->

<!-- Displays List of User-selected favorites (favs bookmarked and stored in database - originally from Dribbble API) -->

<div id="user_list_page" data-role="page">
    <div id="container">
        <div data-role="header">
            <img class="header_logo" src="<?php echo base_url('assets/images/designshare_logo.png'); ?>" alt="DesignShare Logo" />
            <p class="text_header">View Your Designs!</p>
            <div data-role="navbar">
                <ul>
                    <li><a href="<?php echo base_url('index.php'); ?>">Profile</a></li>
                    <li><a href="<?php echo base_url('index.php/help'); ?>" data-ajax="false">Help</a></li>
                    <li><a href="<?php echo base_url('index.php/logout'); ?>">Log Out</a></li>
                </ul>
            </div> <!-- End NavBar Div -->
            <div data-role="navbar">
                <ul>
                    <li><a href="<?php echo base_url('index.php/design_share/view/list#user_list_page'); ?>" data-ajax="false">My Art</a></li>
                    <li><a href="<?php echo base_url('index.php/designs'); ?>">New Designs</a></li>
                </ul>
            </div> <!-- End NavBar Div -->
        </div> <!-- End Header Div -->
        <div data-role="content">
            <ul data-role="listview" data-theme="e">
                <?php
                    #uses conditional to check if there are any favorite designs for this user
                    if(!empty($shot_data)) {                    
                        #if there are designs saved in the database for the current user
                        
                        #uses PHP to cycle through API results and dynamically create lists items
                        #for each result
                        foreach($shot_data as $shot) {
                            #list items use information from API, accessed via the $shots['shots_data']
                            #array key that was passed with this page's view() function
                            echo '<li><a href="'.base_url('index.php/details/'.$shot['id'].'').'" data-ajax="false">
                                <img class="list_image" src="'.$shot['image_url'].'" alt="'.$shot['title'].'" />
                                <p class="list_text">'.$shot['title'].'</p>
                                <p class="list_text">'.$shot['player_name'].'</p>
                            </a></li>';
                        }
                    }else{
                        #if there aren't designs saved in the database for this user    
                        
                        #echo a placeholder showing that there aren't any designs to show
                        echo "<li id='my_list_placeholder'>You haven't added any designs to your list yet!</li>";
                    }
                ?>
            </ul>
        </div> <!-- End Content Div -->
        <div class="footer" data-role="footer">
            <p>&copy; 2013 DesignShare | All designs &copy; their respective owners.</p>
            <p>Donald Simmons</p>
        </div><!-- End Footer Div -->    
    </div> <!-- End Container Div -->
</div> <!-- End User_List_Page  Div -->
