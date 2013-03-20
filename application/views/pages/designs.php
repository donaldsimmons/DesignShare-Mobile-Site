<!-- Begins Find_Designs_Page jQuery Mobile Page -->

<!-- Displays list of content grabbed from Dribbble API. Users select content and are taken to a detail page. -->

<div id="find_designs_page" data-role="page">
    <div id="container">
        <div data-role="header">
            <img class="header_logo" src="<?php echo base_url('assets/images/designshare_logo.png'); ?>" alt="DesignShare Logo" />
            <p class="text_header">Welcome Back!</p>
            <div data-role="navbar">
                <ul>
                    <li><a href="<?php echo base_url('index.php#user_profile_page'); ?>">Edit Profile</a></li>
                    <li><a href="<?php echo base_url('index.php'); ?>">My Art</a></li>
                    <li><a href="#">Log Out</a></li>
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
                        echo '<li><a href="#">
                            <img class="list_image" src="'.$shot['image_url'].'" alt="'.$shot['title'].'" />
                            <p class="list_text">'.$shot['title'].'</p>
                            <p class="list_text">'.$shot['player_name'].'</p>
                        </a></li>';
                    }
                ?>
            </ul>
        </div> <!-- End Content Div -->
        <div class="footer" data-role="footer">
            <p>DesignShare</p>
            <p>MDD-1303</p>
            <p>Donald Simmons</p>
        </div><!-- End Footer Div -->    
    </div> <!-- End Container Div -->
</div> <!-- End Find_Designs_Page  Div -->
