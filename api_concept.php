<!DOCTYPE HTML>
<html>
    <head>
        <title>DesignShare API Connection - Donald Simmons</title>
    </head>
    <body>
        <header>
            <h2>DesignShare API Connection</h2>
        </header> <!-- End Header -->
        <div id="content">
            <?php
                $result = file_get_contents('https://api.dribbble.com/shots/popular');
                $data = json_decode($result);
                
                foreach($data as $object) {
                    
                    foreach($object as $detail) {
                        
                        $url = $detail->image_url;
                        $title = $detail->title;
                        
                        echo '<img class="photo" src="'.$url.'" height="150px" width="150px" alt="'.$title.'" >';
                        echo '<p>'.ucwords($title).'</p><br />';
                        
                    }
                    
                }
            ?>
        </div> <!-- End Content Div -->
        <footer>
            <ul id="footer_list">
                <li>DesignShare API Connection</li>
                <li>MDD 1303</li>
                <li>Donald Simmons</li>
            </ul>
        </footer> <!-- End Footer -->
    </body>
</html>