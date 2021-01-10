<script>
    //function with pop up to confirm if user would like to delete a course
   function suredelete() {
        var sureUWantToDelete;
        //pop up message
        sureUWantToDelete = confirm("This Course is eqivalent to another \nClick ok if you want to delete this course, click cancel if you changed your mind?");
       if (sureUWantToDelete) { // if clicked OK
          window.location.replace("deletecoursescript.php");
        }
       else{
           //if clicked cancel
           window.location.replace("index.php");
       }
          
      }
    </script>


<?php
    //starts session to pass variables to another page
    session_start();
    include 'connecttodb.php';
    //creates variables 
    $coursenum = $_POST['coursenum'];
    $_SESSION['coursenum']= $_POST['coursenum'];
    $check = false;

    //creates query to get eqivalency info
    $query1 = 'SELECT * FROM eqivalent;';
    //runs query
    $result1=mysqli_query($connection,$query1);
    //checks if failed
    if (!$result1) {
        die("database query failed during initial check.");
    }
    //checks resuslts to see if coursenum exists in eqivalent
      while ($row = mysqli_fetch_assoc($result1)) {
        if($row['coursenum'] == $coursenum){
            $check = true;
            //if yes then gives warning messag through js function
            echo '<script type="text/javascript">suredelete();</script>';
        }
      }
    if ($check == false){
        //if no sends to delete course script
        echo '<script type="text/javascript">window.location.replace("deletecoursescript.php");</script>';

    }

    
?>