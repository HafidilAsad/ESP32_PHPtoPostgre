<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    echo "dbconnect.php will run";
    // Connect to MySQL
    include("koneksi.php");

    // Prepare the SQL statement
    $query =  "update arduino.sensors SET value=1
    where name =  '$_POST[name]' ";    

    // Go to the review_data.php (optional)
    //header("Location: review_data.php");

    if(!@mysql_query($query))
    {
        echo "&Answer; SQL Error - ".mysql_error();
        return;

    mysql_close();
    }
?>
