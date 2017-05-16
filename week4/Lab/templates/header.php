<html>
    <head>
        <meta charset="UTF-8">
        <!-- Bootstrap -->
        <link rel="stylesheet" href=<?php
        if (file_exists("includes/css/bootstrap.css")) {
            echo '"includes/css/bootstrap.css"';
        } else {
            echo '"../includes/css/bootstrap.css"';
        }
        ?>/>
        <title></title>
    </head>
    <body>
        <nav>
            <!-- Nav --> 
            <ul class="nav nav-pills">
                <li><a href=<?php
                    if (file_exists("index.php")) {
                        echo '"index.php"';
                    } else {
                        echo '"../index.php"';
                    }
                    ?>>Upload</a></li>
                <li><a href=<?php
                    if (file_exists("viewUploads.php")) {
                        echo '"viewUploads.php"';
                    } else {
                        echo '"../viewUploads.php"';
                    }
                    ?>>View Uploads</a></li>
<!--                <li><a href=<?php
                    //if (file_exists("crud.php")) {
                    //    echo '"crud.php"';
                    //} else {
                    //    echo '"../crud.php"';
                   //}
                    ?>>Crud</a></li>-->
            </ul>
        </nav>
    <body>