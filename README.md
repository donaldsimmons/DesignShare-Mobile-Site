mdd-project
===========

The DesignShare Application built for the 1303 Mobile Device Deployment class.


This app uses PHP and MySQL, as well as the CodeIgniter Framework. SQL Dumps will be located in a
'sql_database' directory. Please install the database prior to using the app, in order to use
application and its features.




-------///  UPDATE 03-15-12  ///-----------

The DesignShare app will no longer feature upload functionality as originally intended.
Instead, the platform will display art from the Dribbble API, allow for app users to makes lists
of their favorite designs, and to comment on these designs.


Notes on File Structure and Files

The CodeIgniter framework structure can be seen from the root directory, and contains the application and system directories and the the index.php file. Any other directories in the root directory were are extra content added to house materials for the site.

-My controllers, models, and views, will all be in the appropriately named folders, inside the "application" directory. Configuration files for the framework are located in the "config" folder, inside the "application" directory. No other directories in the "application" folder were modified during site construction.

-The "assets" folder (in the root) contains two subfolders: an "images" folder that contains the logo for the site, and a "style_tiles" folder that contains all of the style tiles for the site's pages.

-The "css" folder (in the root) contains the custom css for the DesignShare site, including the media queries for the site. The default and themed jQuery Mobile css will be located with the jQury Mobile files in the "library" directory.

-The "libraries" folder (in the root) contains one subfolder and various files related to the jQuery Mobile library. This folder houses all of the jQuery Mobile code that is used in the site. An "images" subfolder contains image files used by jQuery Mobile, while the files are all pieces of the jQuery Mobile library.

-The "sql_database" holds the database for the site.
