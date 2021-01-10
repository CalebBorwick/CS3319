<?php
    //connects to database
    include 'connecttodb.php';
    //gets name and order from user input and POST
    $name = $_POST["name"];
    $order = $_POST["order"];
    
    //creates query based on the selected values 
    if(($name == "coursenum")&& ($order =="Ascending")){
        $query = 'SELECT * FROM westerncourse ORDER BY coursenum ASC';
    } 
    else if(($name == "coursenum")&& ($order =="Descending")){
        $query = 'SELECT * FROM westerncourse ORDER BY coursenum DESC';
    }
    else if(($name == "coursename")&& ($order =="Ascending")){
        $query = 'SELECT * FROM westerncourse ORDER BY coursename ASC';
    }
    else if(($name == "coursename")&& ($order =="Descending")){
        $query = 'SELECT * FROM westerncourse ORDER BY coursename DESC';
    }
    else {
        $query = 'SELECT * FROM westerncourse';
    }      
    //runs query
    $result=mysqli_query($connection,$query);
    //checks if failed
    if (!$result) {
         die("database query failed.");
     }
    //adds headers to table
    echo'<tr>';
    echo '<th>Course Number</th>';
    echo '<th>Course Name</th>';
    echo '<th>Weight</th>';
    echo '<th>Suffix</th>';
    echo '</tr>';
    //displays results and populates table
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<td> '. $row["coursenum"] . '</td>';
        echo '<td> '. $row["coursename"] . '</td>';
        echo '<td> '. $row["weight"] . '</td>';
        echo '<td> '. $row["suffix"] . '</td>';
        echo '</tr>';
    }
    //frees results 
    mysqli_free_result($result);
   
   
    ?>