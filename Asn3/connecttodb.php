<?php
    //variables used to login and connect
    $dbhost="localhost";
    $dbuser="root";
    $dbpass="cs3319";
    $dbname="iborwickassign2db";
    //connection to data base
    $connection=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
    //if failed
    if (mysqli_connect_errno()) {
        die("database connection failed :" .
            mysqli_connect_error() .
            "(" . mysqli_connect_errno() . ")"
        );
    }
?>