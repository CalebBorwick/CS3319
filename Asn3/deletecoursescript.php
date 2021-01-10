
<?php 
    //connects to database and session and gets variables
    session_start();
    include 'connecttodb.php';
    $coursenum = $_SESSION['coursenum'];
    
    //creates delete query
    $query = 'DELETE FROM westerncourse WHERE coursenum ="' .$coursenum . '";';
    //runs query
    $result=mysqli_query($connection,$query);
    //checks if failed
    if (!$result) {
        die("database query failed.");
    }
    //returns to home page
    header('Location:index.php');
            exit;
?>
