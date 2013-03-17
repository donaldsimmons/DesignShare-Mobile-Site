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
                <li><a href="#">Sample Design</a></li>
                <li><a href="#">Another Sample Design</a></li>
                <li><a href="#">A Third Sample Design</a></li>
            </ul>
        </div> <!-- End Content Div -->
        <div class="footer" data-role="footer">
            <p>DesignShare</p>
            <p>MDD-1303</p>
            <p>Donald Simmons</p>
        </div><!-- End Footer Div -->    
    </div> <!-- End Container Div -->
</div> <!-- End Find_Designs_Page  Div -->
