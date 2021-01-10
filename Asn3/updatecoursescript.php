<?php 
    //connects to database
    include 'connecttodb.php';
    //gets var from POST
    $coursenum = $_POST['coursenum'];
    $newcoursename = $_POST['newcoursename'];
    $newweight = $_POST['newcourseweight'];
    $newsuffix = $_POST['newcoursesuffix'];
    
    //creates query to update course with new info
    $query = 'UPDATE westerncourse SET suffix = "' .$newsuffix . '"';
    
    //checks to see if feild is empty if it was left empty then the update for the value is not added if its not empty then and update is appended 
    if(!empty($newweight)){
         $query = $query . ', weight = "' . $newweight .'"';
    }
    if(!empty($newcoursename)){
     $query = $query . ', coursename = "'.$newcoursename . '"';
    }
    //appends end of query to query
    $query = $query . 'WHERE coursenum = "' .$coursenum. '"';
    //runs query
    $result=mysqli_query($connection,$query);
    //checks if failed
    if (!$result) {
         die("database query failed after.");

     }
    //returns to home
     else{
        header('Location:index.php');
        exit;
     }
     ?>