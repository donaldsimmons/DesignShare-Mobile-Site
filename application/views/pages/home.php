<div id="login_page" data-role="page" >
    <div class="container">
        <div data-role="header">
            <p class="text_header">Share Your Inspiration</p>
        </div> <!-- End Text_Header Div -->
        <div data-role="content">
            <img id="main_logo" src="<?php echo base_url('assets/images/designshare_logo.png'); ?>" alt="DesignShare Logo" />
            <form action="index.php" method="post">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" maxlength="20" size="20" /><br />
                <label for="password">Password:</label>
                <input type="text" name="password" id="password" maxlength="20" size="20" /><br />
                <input type="submit" name="login_button" value="Log In" data-theme="a" />
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

<div id="signup_page" data-role="page">
    <div class="container">
        <div data-role="header">
            <p class="text_header">Sign Up Today!</p>
        </div> <!-- End Text_Header Div -->
        <div data-role="content">
            <h3>Create A New Profile</h3>
            <form action="?" method="post">
                <label for="full_name">Name:</label>
                    <input type="text" name="full_name" id="full_name" /><br />
                <label for="new_username">Username:</label>
                    <input type="text" name="new_username" id="new_username" /><br />
                <label for="new_password">Password:</label>
                    <input type="text" name="new_password" id="new_password" /><br />
                <label for="new_email">Email:</label>
                    <input type="text" name="new_email" id="new_email" /><br />
                <label><input id="newsletter_check" type="checkbox" name="newsletter_check" data-theme="a" /> Sign up for newsletter?</label>
                <input type="submit" name="signup_button" value="Sign Up" />
            </form>
            <p id="back_link" class="home_text_links"><a href="#login_page"><< Back to Login</a></p>
        </div>
        <div class="footer" data-role="footer">
            <p>DesignShare</p>
            <p>MDD-1303</p>
            <p>Donald Simmons</p>
        </div> <!-- End Footer Div --> 
    </div>
</div> <!-- End Page Div -->