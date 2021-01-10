<!DOCTYPE html>
<html>
 <head>
     <!-- Creates the home page header and link to style sheet -->
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <title>Delete Course | Western Univeristy Courses</title>
</head>
 <body>
         
    <?php
     //connects to database
        include 'connecttodb.php'
    ?>
     <h1>Delete Western Course</h1>
    <!-- creates form that upon submit sends to check delete to see if an eqivalency exists -->
      <form action="checkdelete.php" method="post">

     <p>Select a course to delete:</p>
      <!-- seelcts from westerncourses to delete -->
      <select name="coursenum" id="coursenum">
          <option value="1">Select Here</option>
     <?php
            //creates query to get all werstern course info
            $query = 'SELECT * FROM westerncourse';
            //runs query
            $result=mysqli_query($connection,$query);
            //check if failed
            if (!$result) {
                 die("database query failed.");
             }
            //displays the results in a selction drop down
            while ($row = mysqli_fetch_assoc($result)) {
                 echo '"<option value="' . $row["coursenum"] .'"> '. $row["coursenum"] .' - ' . $row["coursename"] .' - ' . $row["weight"] .' - ' . $row["suffix"] .'</option>';

                }
                mysqli_free_result($result);

        ?>
     </select><br>
          <!--submits form-->
      <input type="submit" value="Delete Western Course;">
     </form>
        
    </body>
</html>