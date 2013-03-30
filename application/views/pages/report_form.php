<!-- Begins Report_Form_Page jQuery Mobile Page -->

<!-- Displays form for reporting problems with site or user conflicts -->

<div id="report_form_page" data-role="page">
    <div id="container">
        <div data-role="header">
            <img class="header_logo" src="<?php echo base_url('assets/images/designshare_logo.png'); ?>" alt="DesignShare Logo" />
            <p class="text_header">Submit a Report!</p>
            <div data-role="navbar">
                <ul>
                    <li><a href="<?php echo base_url('index.php'); ?>">Edit Profile</a></li>
                    <li><a href="<?php echo base_url('index.php/help'); ?>" data-ajax="false">Help</a></li>
                    <li><a href="<?php echo base_url('index.php/designs'); ?>" data-ajax="false">Designs</a></li>
                    <li><a href="<?php echo base_url('index.php/logout'); ?>">Log Out</a></li>
                </ul>
            </div> <!-- End NavBar Div -->
        </div> <!-- End Header Div -->
        <div data-role="content">
            <p>We at DesignShare can't possibly monitor every post or comment made on the site. If you've spotted any misuse
            of the site, or noticed a particular user not behaving appropriately or causing problems for other users, please
            let us know!</p>
            <p>Take a minute to send us a quick note, so we can review your case and respond accordingly.</p>
            <p>Please be as thorough and informative as possible. Include information about which design is affected, which user
            is disrupting the user experience, and when you noticed the violation or misuse.</p>
            <form id="report_form" action="<?php echo base_url('index.php/sendReport'); ?>" method="post" data-ajax="false">
                <label for="report_name">Name:</label>
                    <input type="text" name="report_name" id="report_name" required />
                <label for="report_username">Username:</label>
                    <input type="text" name="report_username" id="report_username" required />
                <label for="report_comment">Problem or Complaint</label>
                    <input type="text" name="report_comment" id="report_comment" required />
                <input type="submit" name="submit_report_button" value="Submit Report" />
            </form>
        </div> <!-- End Content Div -->
        <div class="footer" data-role="footer">
            <p>&copy; 2013 DesignShare | All designs © their respective owners.</p>
            <p>Donald Simmons</p>
        </div><!-- End Footer Div -->    
    </div> <!-- End Container Div -->
</div> <!-- End User_List_Page  Div -->