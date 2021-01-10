<!DOCTYPE html>
<html>
 <head>
  <!-- Creates the home page header and link to style sheet -->
    <link rel="stylesheet" type="text/css" href="stylesheet.css">      
    <title>Add Course | Western Univeristy Courses</title>
    </head>
     <body>
         <!-- connects to databse -->
        <?php
            include 'connecttodb.php'
        ?>
         <h1>Add Western Course</h1>
         
         <!-- calls addcoursescript.php on submit so after user has entered proper information -->
        <form action="addcoursescript.php" method="post">
            <!-- gets user input to add course and makes sure nameing convention for course number is correct-->
             What is the course number(must start with cs):<input type="text" pattern="cs+[0-9]{4}"name="coursenum" id="coursenum"><br>
             What is the course name:<input type="text" name="coursename"><br>
             What is the weight of the course:<input type="text" name="courseweight"><br>
             What is the suffix of the course: <input type="text" name="coursesuffix"><br>
            
            <input type="submit" value="Add Western Course">
          </form>
           
    </body>
</html>
                  