<?php
    //connects to database and gets vars
    include 'connecttodb.php';
    $officialname = $_POST["officialname"];

    //creates query to get outside course and university info
    $query = 'SELECT * FROM outsidecourse INNER JOIN universities ON outsidecourse.uninumber = universities.uninumber WHERE universities.officialname ="'.$officialname.'";';
    //runs query
    $result=mysqli_query($connection,$query);
    //checks if query failed
    if (!$result) {
         die("database query failed here.");
     }
    //creates headers for table
    echo'<tr>';
    echo '<th>Course Code</th>';
    echo '<th>Course Name</th>';
    echo '<th>Year of Study</th>';
    echo '<th>Weight</th>';
    echo '<th>University Number</th>';
    echo '<th>Univeristy Official Name</th>';
    echo '<th>City</th>';
    echo '<th>Province</th>';
    echo '<th>University Nickname</th>';
    echo '</tr>';
    echo'<tr>';
    //displays results and populates table
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<td> '. $row["coursecode"] . '</td>';
        echo '<td> '. $row["name"] . '</td>';
        echo '<td> '. $row["yearofstudy"] . '</td>';
        echo '<td> '. $row["weight"] . '</td>';
        echo '<td> '. $row["uninumber"] . '</td>';
        echo '<td> '. $row["officialname"] . '</td>';
        echo '<td> '. $row["city"] . '</td>';
        echo '<td> '. $row["provincecode"] . '</td>';
        echo '<td> '. $row["nickname"] . '</td>';
        echo '</tr>';
    }
    //frees results
    mysqli_free_result($result);
   
   
    ?>