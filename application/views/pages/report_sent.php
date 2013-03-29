<!-- Begins Report_Sent_Page jQuery Mobile Page -->

<!-- Displays message confirming that a report has been sent -->

<div id="report_sent_page" data-role="page" data-role="dialog">
    <div id="container">
        <div data-role="header">
            <img class="header_logo" src="<?php echo base_url('assets/images/designshare_logo.png'); ?>" alt="DesignShare Logo" />
             <p class="text_header">Report Submitted!</p>
        </div> <!-- End Header Div -->
        <div data-role="content">
            <p>Your report has been submitted. Thank you for your feedback.</p>
            <p id="back_link" class="report_sent_link"><a href="<?php echo base_url('index.php'); ?>">Continue</a></p>
        </div> <!-- End Content Div -->
        <div class="footer" data-role="footer">
            <p>&copy; 2013 DesignShare | All designs © their respective owners.</p>
            <p>Donald Simmons</p>
        </div><!-- End Footer Div -->    
    </div> <!-- End Container Div -->
</div> <!-- End Edit_Content_Page  Div -->