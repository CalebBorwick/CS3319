<!DOCTYPE html>
<html>
 <head>
        <!-- Creates the page header and link to style sheet -->
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
        <title>Update Course| Western Univeristy Courses</title>
    </head>
     <body>
        <?php
            //connects to database
            include 'connecttodb.php'
        ?>
         <h1>Update Western Course</h1>
         <!-- creates form to call update course script once user has inputted -->
          <form action="updatecoursescript.php" method="post">
            
          <!-- gets courses for user to select from -->
         <p>Select a course to update:</p>
          <select name="coursenum" id="coursenum">
              <option value="1">Select Here</option>
         <?php
                //creates query to get all westerncourse info
                $query = 'SELECT * FROM westerncourse';
                //runs query
                $result=mysqli_query($connection,$query);
                //checks if failed
                if (!$result) {
                     die("database query failed.");
                 }
                //populates drop down with result
                while ($row = mysqli_fetch_assoc($result)) {
                     echo '"<option value="' . $row["coursenum"] .'"> '. $row["coursenum"] .' - ' . $row["coursename"] .' - ' . $row["weight"] .' - ' . $row["suffix"] .'</option>';
                        
                    }
                    mysqli_free_result($result);
                                
            ?>
         </select><br>
        <!-- gets user input for new information to be loaded in -->
         What is the new course name:<input type="text" name="newcoursename"><br>
         What is the new weight of the course:<input type="text" name="newcourseweight"><br>
         What is the new suffix of the course: <input type="text" name="newcoursesuffix"><br>
        
          <!-- submits form -->
        <input type="submit" value="Update Western Course">
           
        </form>
        
    </body>
</html>