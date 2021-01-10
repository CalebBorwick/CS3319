<!DOCTYPE html>
<html>
    <head>
        <!-- Creates the home page header and link to style sheet -->
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
        <title>Add Eqivalency | Western Univeristy Courses</title>
    </head>
     <body>
        <?php
            //connects to database
            include 'connecttodb.php'
        ?>
         <h1>Add Eqivalency</h1>
         <!-- creates form for submit to other page to add -->
        <form action="addeqivalencyscript.php" method="post">
            
            <!-- creates select for user to select an outside course -->
            <p>Select a  Western course to make Eqivalent:</p>
              <select name="coursenum" id="coursenum">
                  <option value="1">Select Here</option>
             <?php
                    //query to get western courses to select from 
                    $query = 'SELECT * FROM westerncourse';
                    //runs query
                    $result=mysqli_query($connection,$query);
                    //checks if query failed
                    if (!$result) {
                         die("database query failed.");
                     }
                    //displays western courses to select
                    while ($row = mysqli_fetch_assoc($result)) {
                         echo '"<option value="' . $row["coursenum"] .'"> '. $row["coursenum"] .' - ' . $row["coursename"] .'</option>';

                        }
                        mysqli_free_result($result);

                ?>
             </select><br>
            <!-- creates select for user to select an outside course -->
            <p>Select a  Outside course to make Eqivalent:</p>
            <select name="outside" id="outside">
                  <option value="">Select Here</option>
             <?php
                    //query of outside course
                    $query1 = 'SELECT * FROM outsidecourse';
                    //runs query
                    $result1=mysqli_query($connection,$query1);
                    //checks if query failed
                    if (!$result1) {
                         die("database query failed.");
                     }
                    //displays outside courses to select from
                    while ($row = mysqli_fetch_assoc($result1)) {
                         echo '<option value="'. $row["coursecode"]. '|' .$row["uninumber"] .'"> '. $row["coursecode"] .' - ' . $row["name"] .'</option>';

                        }
                        mysqli_free_result($result1);

                ?>
             </select><br>

            <!-- submits form and send to script file to do the insert -->
            <input type="submit" value="Add Eqivalency">
          </form>

    </body>
</html>
                  