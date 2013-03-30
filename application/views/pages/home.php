<!-- Begins Login_Page jQuery Moblie Page -->

<!-- Will display form for login on initial site load. Contains link to move to signup page -->

<div id="login_page" data-role="page"  data-theme="a">
    <div class="container">
        <div data-role="header">
            <img class="header_logo" src="<?php echo base_url('assets/images/designshare_logo.png'); ?>" alt="DesignShare Logo" />
            <p class="text_header">Share Your Inspiration</p>
        </div> <!-- End Text_Header Div -->
        <div data-role="content">
            <img id="main_logo" src="<?php echo base_url('assets/images/designshare_logo.png'); ?>" alt="DesignShare Logo" />
            <form action="<?php echo base_url('index.php/login/submit'); ?>" data-ajax="false" method="post">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" /><br />
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" /><br />
                <input type="submit" name="login_button" value="Log In"  />
            </form>
            <p id="signup_link" class="home_text_links"><a href="#signup_page">Sign Up >></a></p>
        </div> <!-- End Content Div -->
        <div class="footer" data-role="footer">
            <p>DesignShare</p>
            <p>MDD-1303</p>
            <p>Donald Simmons</p>
        </div> <!-- End Footer Div -->    
    </div> <!-- End Container Div -->
</div> <!-- End Page Div -->


<!-- Begins Signup_Page jQuery Mobile Page -->

<!-- Displays signup form for users and contains a back link to return to the login page -->

<div id="signup_page" data-role="page">
    <div class="container">
        <div data-role="header">
            <img class="header_logo" src="<?php echo base_url('assets/images/designshare_logo.png'); ?>" alt="DesignShare Logo" />
            <p class="text_header">Sign Up Today!</p>
        </div> <!-- End Text_Header Div -->
        <div data-role="content">
            <h3>Create A New Profile</h3>
            <form action="<?php echo base_url('index.php/design_share/signup'); ?>" data-ajax="false" method="post">
                <label for="full_name">Name:</label>
                    <input type="text" name="full_name" id="full_name" required /><br />
                <label for="new_username">Username:</label>
                    <input type="text" name="new_username" id="new_username" required/><br />
                <label for="new_password">Password:</label>
                    <input type="password" name="new_password" id="new_password" required/><br />
                <label for="new_email">Email:</label>
                    <input type="text" name="new_email" id="new_email" required/><br />
                <input type="submit" name="signup_button" value="Sign Up" />
            </form>
            <p id="back_link" class="home_text_links"><a href="#login_page"><< Back to Login</a></p>
        </div>
        <div class="footer" data-role="footer">
            <p>&copy; 2013 DesignShare | All designs © their respective owners.</p>
            <p>Donald Simmons</p>
        </div> <!-- End Footer Div --> 
    </div>
</div> <!-- End Page Div -->


<!-- Begins Signin_Error_Page jQuery Mobile Page -->

<!-- Opens dialog prompting a valid username and password when the login info submitted isn't correct format -->

<div id="login_error_page" data-role="page" data-role="dialog">
    <div id="container">
        <div data-role="header">
            <img class="header_logo" src="<?php echo base_url('assets/images/designshare_logo.png'); ?>" alt="DesignShare Logo" />
             <p class="text_header">Sorry, Invalid Login</p>
        </div> <!-- End Header Div -->
        <div data-role="content">
            <p>Please input a valid username and password.</p>
            <p id="back_link" class="home_text_links"><a href="#login_page"><< Back to Login</a></p>
        </div> <!-- End Content Div -->
        <div class="footer" data-role="footer">
            <p>&copy; 2013 DesignShare | All designs © their respective owners.</p>
            <p>Donald Simmons</p>
        </div><!-- End Footer Div -->    
    </div> <!-- End Container Div -->
</div> <!-- End Edit_Content_Page  Div -->