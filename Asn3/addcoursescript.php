<?php 
    //connects to data base and gets the variables from POST 
    include 'connecttodb.php';
    $coursenum = $_POST['coursenum'];
    $coursename = $_POST['coursename'];
    $weight = $_POST['courseweight'];
    $suffix = $_POST['coursesuffix'];
    
    //creates query to check if coursen number already exists
    $query1 = 'SELECT * FROM westerncourse;';

    //runs query
    $result1=mysqli_query($connection,$query1);
    //checks if wuery fails 
    if (!$result1) {
        die("database query failed.");
    }
    // if coursenumber already exists in table then gives an alert and quits without inserting
    while ($row = mysqli_fetch_assoc($result1)) {
        if($row['coursenum'] == $coursenum){
            $message = "Course Number Already in Table";
            echo '<script type="text/javascript">alert("'.$message.'"); window.location="index.php";</script>';
            break;
            
        }
    }
    //insert query creation
     $query = 'INSERT INTO westerncourse(coursenum, coursename, weight, suffix) VALUES("' .$coursenum .'", "' . $coursename. '", "' .$weight . '", "' . $suffix . '");';
    //runs insert query
    $result=mysqli_query($connection,$query);
    //checks if query failed
    if (!$result) {
        die("database query failed to add.");
    }
    //returns to home page
     header('Location:index.php');
    exit;
            

       

   
?>
