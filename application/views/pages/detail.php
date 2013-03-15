<div id="details_page" data-role="page">
    <div id="container">
        <div data-role="header">
            <img id="header_logo" src="<?php echo base_url('assets/images/designshare_logo.png'); ?>" alt="DesignShare Logo" />
            <p class="text_header">Upload Your Own Design!</p>
            <div data-role="navbar">
                <ul>
                    <li><a href="<?php echo base_url('index.php#user_profile_page'); ?>">Edit Profile</a></li>
                    <li><a href="<?php echo base_url('index.php'); ?>">My Art</a></li>
                    <li><a href="<?php echo base_url('index.php/design_share/view/designs'); ?>">Designs</a></li>
                    <li><a href="#">Log Out</a></li>
                </ul>
            </div> <!-- End NavBar Div -->
        </div> <!-- End Header Div -->
        <div data-role="content">
            <form id="comment_form" action="?" method="post">
                <input type="text" name="comment_input" id="comment_input" />
                <input type="submit" data-theme="c" value="Submit Comment" id="comment_submit" />
            </form>
            <h4>Comments:</h4>
            <ul id="comment_list" data-role="listview" data-theme="e">
                <li><a href="#edit_comment_page" data-theme="e" data-rel="dialog" data-transition="pop">Sample Comment</a></li>
                <li><input type="button" data-role="button" data-theme="e" value="See More Comments" data-icon="arrow-d" /></li>
            </ul>
        </div> <!-- End Content Div -->
        <div class="footer" data-role="footer">
            <p>DesignShare</p>
            <p>MDD-1303</p>
            <p>Donald Simmons</p>
        </div><!-- End Footer Div -->    
    </div> <!-- End Container Div -->
</div> <!-- End Details_Page  Div -->

<div id="edit_comment_page" data-role="page">
    <div id="container">
        <div data-role="header" data-theme="a">
            <img id="header_logo" src="<?php echo base_url('assets/images/designshare_logo.png'); ?>" alt="DesignShare Logo" />
             <h4>Delete Comment?</h4>
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