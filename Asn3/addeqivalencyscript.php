<?php 
    //connects to data base and gets the variables from POST 
    include 'connecttodb.php';
    $coursenum = $_POST['coursenum'];

    $values = $_POST['outside'];
    $explode = explode('|',$values,2);
    $coursecode = $explode[0];
    $uninum=$explode[1];
    $date = date("Y-m-d", time());
    
    
    //checks to see if the eqivalency exists     
     $check =mysqli_query($connection, 'SELECT * FROM eqivalent WHERE (coursenum = "'.$coursenum.'" AND coursecode ="' .$coursecode. '");');  
     
    //if it exists modifies the dat 
    if(mysqli_num_rows($check)>0){
        $query = 'UPDATE eqivalent SET dateapproved = "'.$date.'" WHERE (coursenum = "'.$coursenum.'" AND coursecode ="' .$coursecode. '");'; 
    }
    //if it does not exist add eqivalency 
    else{
        $query = 'INSERT INTO eqivalent (coursenum, coursecode, uninumber, dateapproved) VALUES("' .$coursenum. '", "'.$coursecode. '", ' .$uninum. ', "' .$date. '");';
    }
    //runs query 
    $result=mysqli_query($connection,$query);
    //checks if query failed
    if (!$result) {
        die("database query failed to add.".mysqli_error($connection));
    }
    //returns to home page
     header('Location:index.php');
        exit;
?>
