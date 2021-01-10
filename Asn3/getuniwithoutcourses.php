<?php
    //connects to database
    include 'connecttodb.php';

    //creates query to get all universities with the uni number not in outside courses
    $query = 'SELECT * FROM universities WHERE uninumber NOT IN (SELECT uninumber FROM outsidecourse);';
   //runs query
    $result=mysqli_query($connection,$query);
    //checks if failed
    if (!$result) {
         die("database query failed.");
     }
    //creates table headers
    echo'<tr>';
    echo '<th>University Name</th>';
    echo '<th>University Nick Name</th>';
    echo '</tr>';
    //displays results and populated table
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<td> '. $row["officialname"] . '</td>';
        echo '<td> '. $row["nickname"] . '</td>';
        echo '</tr>';
    }
    //frees results 
    mysqli_free_result($result);
   
   
    ?>