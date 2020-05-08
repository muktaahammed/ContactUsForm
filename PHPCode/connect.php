<?php
    $servername = "localhost";
    $username = "";       //use your database user name
    $password = "";      //use your database password
    $db = "";           //use your database name
 
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db);
    // Check connection(if not connected)
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    //Check your connection before parsing data(if connected)
    /*else {
        echo "Connected..";
    }*/
?>