<!DOCTYPE html>
<html>
 <head>
   <!-- Creates the home page header and link to style sheet -->
    <link rel="stylesheet" type="text/css" href="stylesheet.css">         
    <title>Course Info | Western Univeristy Courses</title>
    </head>
     <body>
        <?php
            //connects to database
            include 'connecttodb.php'
        ?>
         <h1>Western Course Eqivalence Information</h1>
         <table border="1">
         <?php
            //gets course num from POSt
            $coursenum = $_POST['coursenum'];
            //creates query of all information needed
             $query = 'SELECT                             
                            westerncourse.coursename, 
                            westerncourse.coursenum, 
                            westerncourse.weight AS "westernweight",                             universities.officialname,
                            outsidecourse.name,
                            outsidecourse.coursecode,
                            outsidecourse.weight AS "otherweight",
                            eqivalent.dateapproved
                    FROM westerncourse
                    INNER JOIN eqivalent ON eqivalent.coursenum = westerncourse.coursenum 
                    INNER JOIN outsidecourse ON eqivalent.coursecode = outsidecourse.coursecode
                    INNER JOIN universities ON universities.uninumber = outsidecourse.uninumber 
                    WHERE westerncourse.coursenum ="' . $coursenum.'";';
            //runs query
            $result=mysqli_query($connection,$query);
            //checks if failed
            if (!$result) {
                 die("database query failed here.");
             }
            //creates headings for table
            echo'<tr>';
            echo '<th>Course Name</th>';
            echo '<th>Course Number</th>';
            echo '<th>Weight</th>';
            echo '<th>Univeristy Name</th>';
            echo '<th>Eqivalent Course Name</th>';
            echo '<th>Eqivalent Course Number</th>';
            echo '<th>Eqivalent Course Weight</th>';
            echo '<th>Eqivalency Creation Date</th>';
            echo '</tr>';
            echo'<tr>';
            //displays results
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<td> '. $row["coursenum"] . '</td>';
                echo '<td> '. $row["coursename"] . '</td>';
                echo '<td> '. $row["westernweight"] . '</td>';
                echo '<td> '. $row["officialname"] . '</td>';
                echo '<td> '. $row["name"] . '</td>';
                echo '<td> '. $row["coursecode"] . '</td>';
                echo '<td> '. $row["otherweight"] . '</td>';
                echo '<td> '. $row["dateapproved"] . '</td>';
                echo '</tr>';
            }
         ?>

          </table>
         <!-- returns to home -->
         <input type="button" onclick="location.href='index.php'" value="Return to Home">
    </body>
</html>
                  