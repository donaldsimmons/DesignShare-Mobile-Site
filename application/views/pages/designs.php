<!-- Begins Find_Designs_Page jQuery Mobile Page -->

<!-- Displays list of content grabbed from Dribbble API. Users select content and are taken to a detail page. -->

<div id="find_designs_page" data-role="page">
    <div id="container">
        <div data-role="header">
            <img class="header_logo" src="<?php echo base_url('assets/images/designshare_logo.png'); ?>" alt="DesignShare Logo" />
            <p class="text_header">Welcome Back!</p>
            <div data-role="navbar">
                <ul>
                    <li><a href="<?php echo base_url('index.php'); ?>">Edit Profile</a></li>
                    <li><a href="<?php echo base_url('index.php/help'); ?>">Help</a></li>
                    <li><a href="<?php echo base_url('index.php/logout/signout'); ?>">Log Out</a></li>
                </ul>
            </div> <!-- End NavBar Div -->
            <div data-role="navbar">
                <ul>
                    <li data><a href="<?php echo base_url('index.php/design_share/view/list#user_list_page'); ?>" data-ajax="false">My Art</a></li>
                    <li><a href="<?php echo base_url('index.php/designs'); ?>">New Designs</a></li>
                </ul>
            </div> <!-- End NavBar Div -->
        </div> <!-- End Header Div -->
        <div data-role="content">
            <ul data-role="listview" data-theme="e">
                <?php
                    #uses PHP to cycle through API results and dynamically create lists items
                    #for each result
                    
                    foreach($shots_data as $shot) {
                        #list items use information from API, accessed via the $shots['shots_data']
                        #array key that was passed with this page's view() function
                        echo '<li><a href="'.base_url('index.php/details/'.$shot['id'].'').'" data-ajax="false">
                            <img class="list_image" src="'.$shot['image_url'].'" alt="'.$shot['title'].'" />
                            <p class="list_text">'.$shot['title'].'</p>
                            <p class="list_text">'.$shot['player_name'].'</p>
                        </a></li>';
                    }
                ?>
            </ul>
        </div> <!-- End Content Div -->
        <div class="footer" data-role="footer">
            <p>&copy; 2013 DesignShare | All designs © their respective owners.</p>
            <p>Donald Simmons</p>
        </div><!-- End Footer Div -->    
    </div> <!-- End Container Div -->
</div> <!-- End Find_Designs_Page  Div -->

