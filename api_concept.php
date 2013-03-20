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
                $designs = file_get_contents('https://api.dribbble.com/shots/popular');
                $data = (array)json_decode($designs);
                
                var_dump($data);
                
                foreach($data as $object) {
                    
                #var_dump($object);
                    
                    foreach($object as $detail) {
                        
                        #var_dump($detail);
                        
                        $url = $detail->image_url;
                        $title = $detail->title;
                        $name = $detail->player->name;
                        $username = $detail->player->username;
                        $website = $detail->player->website_url;
                        
                        echo '<img class="photo" src="'.$url.'" height="150px" width="150px" alt="'.$title.'" >';
                        echo '<p>'.ucwords($title).'</p>';
                        echo '<p>'.ucwords($name).'</p>';
                        echo '<p>'.$username.'</p>';
                        echo '<p>'.$website.'</p>';
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