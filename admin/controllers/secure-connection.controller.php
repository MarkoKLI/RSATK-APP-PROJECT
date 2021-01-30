<?php 
    if (!filter_input(INPUT_SERVER,"HTTPS")) {
        $host = filter_input(INPUT_SERVER,"HTTP_HOST");
        $uri = filter_input(INPUT_SERVER,"REQUEST_URI");

        $secureURI = "https://" . $host . $uri;

        header("Location: " . $secureURI);
    }
?>