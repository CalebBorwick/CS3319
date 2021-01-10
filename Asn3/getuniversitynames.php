 <?php
    //connects to database and get province code from POST
    include 'connecttodb.php';
    $provincecode = $_POST["provincecode"];
    //creates query to get universities whith the selected province code 
    $query = 'SELECT * FROM universities WHERE provincecode = "'.$provincecode.'";';
    //runs query
    $result=mysqli_query($connection,$query);
    //checks if query failed
    if (!$result) {
         die("database query failed.");
     }
    //sets headers of table
    echo'<tr>';
    echo '<th>Official Name</th>';
    echo '<th>Nick Name</th>';
    echo '</tr>';
    //displays results and populates table
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<td> '. $row["officialname"] . '</td>';
        echo '<td> '. $row["nickname"] . '</td>';
        echo '</tr>';
    }
    //frees results 
    mysqli_free_result($result);
?>