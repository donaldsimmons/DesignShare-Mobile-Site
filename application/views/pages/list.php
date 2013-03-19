<!-- Begins User_Profile_Page jQuery Mobile Page -->

<!-- Shows current profile information and allows user to update their profile info -->

<div id="user_profile_page" data-role="page">
    <div id="container">
        <div data-role="header">
            <img class="header_logo" src="<?php echo base_url('assets/images/designshare_logo.png'); ?>" alt="DesignShare Logo" />
            <p class="text_header">Welcome Back!</p>
            <div data-role="navbar">
                <ul>
                    <li><a href="#user_list_page">My Art</a></li>
                    <li><a href="<?php echo base_url('index.php/design_share/view/designs'); ?>">Designs</a></li>
                    <li><a href="#">Log Out</a></li>
                </ul>
            </div> <!-- End NavBar Div -->
        </div> <!-- End Header Div -->
        <div data-role="content">
            <div id="current_profile_info" data-role="collapsible-set" data-theme="e">
                <div data-role="collapsible" data-content-theme="a">
                    <h3>Current Info</h3>
                    <table id="current_info">
                        <tr>
                            <th>Name:</th>
                            <td>TEST NAME</td>
                        </tr>
                        <tr>
                            <th>Username:</th>
                            <td>TEST USERNAME</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>TEST EMAIL</td>
                        </tr>    
                    </table>
                </div>
                <div data-role="collapsible" data-content-theme="a">
                    <h3>Update Info</h3>
                    <form action="<?php echo base_url('index.php/design_share/updateUser'); ?>" data-ajax="false" method="post">
                        <label for="updated_name">Name:</label>
                            <input type="text" name="updated_name" id="updated_name" />
                        <label for="updated_username">Username:</label>
                            <input type="text" name="updated_username" id="updated_username" />
                        <label for="updated_password">Password:</label>
                            <input type="password" name="updated_password" id="updated_password" />
                        <label for="updated_email">Email:</label>
                            <input type="text" name="updated_email" id="updated_email" />
                        <input type="submit" name="update_profile_button" value="Update Profile" data-theme="a" />
                    </form>
                </div>
            </div> <!-- End Current_Profile_Info Div -->
        </div> <!-- End Content Div -->
        <div class="footer" data-role="footer">
            <p>DesignShare</p>
            <p>MDD-1303</p>
            <p>Donald Simmons</p>
        </div><!-- End Footer Div -->    
    </div> <!-- End Container Div -->
</div> <!-- End User_List_Page  Div -->

<!-- Begins User_List_Page jQuery Mobile Page -->

<!-- Displays List of User-selected favorites (favs bookmarked and stored in database - originally from Dribbble API) -->

<div id="user_list_page" data-role="page">
    <div id="container">
        <div data-role="header">
            <img class="header_logo" src="<?php echo base_url('assets/images/designshare_logo.png'); ?>" alt="DesignShare Logo" />
            <p class="text_header">Welcome Back!</p>
            <div data-role="navbar">
                <ul>
                    <li><a href="#user_profile_page">Edit Profile</a></li>
                    <li><a href="<?php echo base_url('index.php/design_share/view/designs'); ?>">Designs</a></li>
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
</div> <!-- End User_List_Page  Div -->