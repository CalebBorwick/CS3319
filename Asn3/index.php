<!--
    Ian Borwick - 250950449 - Assignment 3
-->
<!DOCTYPE html>
<html>
    <head>
        <!-- Creates the home page header and link to style sheet -->
        <link rel="stylesheet" type="text/css" href="stylesheet.css">
        <title>Home | Western Univeristy Courses</title>
    </head>
    <body>
        <div class="header">iborwick Assignment 3 - 3319</div>
        
        <!-- connects to database -->
        <?php
            include 'connecttodb.php'
        ?>
        <!-- Creates header for page -->
        <h1>Western University Courses Information</h1>
        
    <!-- Bullet Point 1
        creates header -->    
        <h3>List of all Western Course Data</h3>
        
        <!-- adds for and radio buttons for the manner in which the user would like to sort the western couirses-->
        <form action="" method="post" value="Sort Western Courses">
            <table style="background:silver">
                <tbody>
                    <tr>
                        <td>
                            <h4> Select how you want your data sorted: </h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo '<input type="radio" name="order" value="Descending" >'. ' Descending'; ?>
                        </td>
                        <td>
                            <?php echo '<input type="radio" name="order" value="Ascending" >'. ' Ascending'; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo '<input type="radio" name="name" value="coursenum" >'. ' Order by course number'; ?>
                        </td>
                        <td>
                            <?php echo '<input type="radio" name="name" value="coursename" >'. ' Order by course name'; ?>
                        </td>
                    </tr>
                    <tr style="background:silver">
                        <td>
                        <!-- user input submitted and calls the getwesterncourses.php in order to run the query and get the information -->
                        <input style="margin-left: 0px;" type="submit" value="Sort Western Courses"> 
                    </td>
                    </tr>
                </tbody>
            </table>
            
            <table border="1" >
            <?php
                include 'getwesterncourses.php';
            ?>
            </table>            
        </form>
        
        
        <table style="background:silver">
            <tr>
                <td  style="text-align: center;">
                    <!-- Bullet point 2 -->
                     <!-- calls update course where the user can change the values except for course num in -->
                    <form action="updatecourse.php" method="post">
                        <input type="submit" value="Update Western Course">
                    </form>
                </td>
                <td style="text-align: center;">
                    <!-- Bullet point 3 -->
                    <!-- calls delete course where the user can delete a course from westerncourse table-->
                    <form action="deletecourse.php" method="post">
                        <input type="submit" value="Delete Western Course">
                    </form>
                </td>
                <td style="text-align: center;">
                     <!-- Bullet point 4 -->
                    <!-- calls add course to allow the user to update a course not with a new course name -->
                     <form action="addcourse.php" method="post">
                        <input type="submit" value="Add Western Course">
                    </form>
                </td>
            </tr>
        </table>

        <h1>Other University Information</h1>
            <!-- javascript listeners function includes -->
            <script src="update.js"></script> 
            
        <!-- Bullet Point 5 -->
            <!-- allows the user to select a university ordered by province and get the information about it -->    
            <h3>Select a University: </h3>
            <form action="" method="post">
             <select name="officialname" id="officialname">
                      <option value="1">Select Here</option>
                  <?php
                    //query for sql
                    $query2 = 'SELECT * FROM universities ORDER BY provincecode;';
                    //creates connection and ruins query
                    $result2=mysqli_query($connection,$query2);
                    
                    //checks if query was successfull
                    if (!$result2) {
                         die("database query failed.");
                     }
                 //displays university names
                    while ($row = mysqli_fetch_assoc($result2)) {
                         echo '"<option value ="' . $row["officialname"] .'"> '. $row["officialname"].'</option>';

                        }

                        ?>
                    </select>
                    </form>
                    <!-- calls getuniversitycourses.php to load in the information and run a seperate query with the help of the javascript function listener -->
                    <table border="1">
                       <?php
                            include 'getuniversitycourses.php';
                        ?>
                    </table> 


        <!-- headers for getting university info -->
        <h1>Universities In Province</h1>
            <h3>Please Select a Province:</h3>
        
        <!-- Bullet Point 6
            allows the user to select a province code and get the universities in that provice and the information about them -->  
            <form action"" method="post">
                <select name="provincecode" id="provincecode">
                      <option value="1">Select Here</option>
                  <?php
                    //query to get provice code for drop down
                    $query2 = 'SELECT DISTINCT provincecode FROM universities ORDER BY provincecode;';
                    //runs query 
                    $result2=mysqli_query($connection,$query2);
                    //checks if query was successful 
                    if (!$result2) {
                         die("database query failed.");
                     }
                    //displays result
                    while ($row = mysqli_fetch_assoc($result2)) {
                         echo '"<option value="' . $row["provincecode"] .'"> '. $row["provincecode"].'</option>';

                        }

                        ?>
                    </select>
                    </form>
                <!-- calls getuniversitynames.php to load in the information and run a seperate query with the help of the javascript function listener -->
                    <table border="1">
                       <?php
                            include 'getuniversitynames.php';
                        ?>
                    </table> 

            <!-- headers for eqivalence information -->
            <h1>Western Course Eqivalence Information</h1>
        
            <!-- Bullet Point 7
                allows the user to select by a western course and display all eqivalnces and information about the eqivalent course and the university its at-->
            <h3>Select by Western Course:</h3>
            <form action="getfullcourseinfo.php" method="post">
                <select name="coursenum" id="coursenum">
                    <option value="1">Select Here</option>
                    <?php
                        //query to get western courses
                        $query3 = 'SELECT *  FROM westerncourse;';
                        //runs query
                        $result3=mysqli_query($connection,$query3);
                        //checks if query was successful
                        if (!$result3) {
                            die("database query failed.");
                        }
                    //displays results
                        while ($row = mysqli_fetch_assoc($result3)) {
                             echo '"<option value="' . $row["coursenum"] .'"> '. $row["coursenum"].'</option>';

                            }
                    ?>
                </select>
                <!-- submits the form and calls getfullcourseinfor.php -->
            <input type="submit" value="Get Course Information">
            </form>

            <!-- Bullet Point 8
                allows the user to select a date and displays all courses that are eqivalent and made before the date selected -->
            <h3>Select by Eqivalency Date:</h3>
            <p>The date you choose will be the end date and all eqivalencies made before it will be shown</p>
            <!-- allows user to select a date and submit the form to call geteqivalencyinfo.php-->
            <form action="geteqivalencyinfo.php" method="post">
                <input type="date" name="dateapproved" id="dateapproved">
            <input type="submit" value="Get Course Information">
            </form>
        
            <!-- Bullet Point 9
                allows the user to create a new eqivalency between 2 courses -->
            <h3>Add Eqivalency</h3>
            <!-- form allows brings user to another page to add eqivalceny -->
            <form action="addeqivalency.php" method="post">
                <input type="submit" value="Add Eqivalency">
            </form>
            
            <!-- Bullet Point 10
                displays all universities without an courses associated with them in our system -->
            <h1>Universities Without Courses</h1>
            <table border="1">
                <?php
                    include 'getuniwithoutcourses.php';
                ?>
                </table>  
        <br>
        <br>
        <br>
        <br>
         <input type="button" onclick="location.href='index.php'" value="Back to Top">
            
        
            <?php
                //closes connection to database 
                $connection->close();
            ?>

    </body>
<html>