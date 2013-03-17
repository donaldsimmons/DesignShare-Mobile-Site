<!-- Begins Signin_Error_Page jQuery Mobile Page -->

<!-- Displays an error message asking for a valid username and password. Shown when an incorrectly
        formatted username/password is submitted (ie, '#username78' instead of 'username78')
    -->

<div id="login_error_page" data-role="page" data-role="dialog">
    <div id="container">
        <div data-role="header">
            <img class="header_logo" src="<?php echo base_url('assets/images/designshare_logo.png'); ?>" alt="DesignShare Logo" />
             <p class="text_header">Sorry, Invalid Login</p>
        </div> <!-- End Header Div -->
        <div data-role="content">
            <p>Please input a valid username and password.</p>
            <p id="back_link" class="home_text_links"><a href="<?php echo base_url('index.php'); ?>"><< Back to Login</a></p>
        </div> <!-- End Content Div -->
        <div class="footer" data-role="footer">
            <p>DesignShare</p>
            <p>MDD-1303</p>
            <p>Donald Simmons</p>
        </div><!-- End Footer Div -->    
    </div> <!-- End Container Div -->
</div> <!-- End Edit_Content_Page  Div -->