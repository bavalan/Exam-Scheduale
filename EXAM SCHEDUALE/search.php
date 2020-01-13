<!--
Bavalan Thangarajah
Student# 1002194564
CSCB20: My exam timetable
This assignment is for the purpose of creating an exam scheduale website. 
This php file displays the info of the searched up exam,
and shows the exam scheduale.
-->
<?php 
    //Stores the course the user types
    $input=$_REQUEST['course'];
    // Removes the extra and info and shows only the courseid
    $courseid = explode(" ", $input);
    
    /*Password and info needed to connect to the database.
    Calls config.php, which contains the info*/
    include "config.php";//Call the top.html file


    // connect to the database
    $dbh = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    // Check connection
    if (!$dbh) {
     die("Connection failed: " . mysqli_connect_error());
    }

    /*SQL code which displays all nessary headers from the database courses
    joint with the database time when the users chosen coursecode matches the same coursecode
    in the course column*/
    $sql = "SELECT course,section,instructor,date,start,end FROM courses NATURAL JOIN time WHERE course='$courseid[0]';";
    $result = mysqli_query($dbh, $sql); 
    //All the info stored into an array
    $info = array();
    
    // if the query returned any tuples output each tuple
    if (mysqli_num_rows($result) > 0) {
        // as long as there is a next tuple, output
         while($row = mysqli_fetch_assoc($result)) {
            // Read the correct info according to the heading
            $info[] =  $row["course"];
            $info[] =  $row["section"];
            $info[] =  $row["instructor"];
            $info[] =  $row["date"];           
            $info[] =  $row["start"];
            $info[] =  $row["end"];


        } 
    } else {

        //
    }


    // After we are done, close the connection
    mysqli_close($dbh); 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>My Exam Timetable</title>
        <meta charset="utf-8"/>

    </head>

     <body>
    <!-- The border that contains the exam info-->
        <div class="frame" id="frame">
            <?php include "top.html";//Code that links to top.html?>

            <div id="main">
                <!-- Table that will contain the exam info-->
                <table>
                    <!-- Row of headers-->
                        <th>Course</th>
                        <th>Section</th> 
                        <th>Instructor</th>
                        <th>Date</th>
                        <th>Start</th>
                        <th>End</th>


                    </tr>
                    <!-- Display row of exam info thats stored in an array
                    that falls below,to the accurate header.-->
                     <tr>

                        <td> <?=$info[0];?> </td>
                        <td> <?=$info[1];?> </td>
                        <td> <?=$info[2];?> </td>
                        <td> <?=$info[3];?> </td>
                        <td> <?=$info[4];?> </td>
                        <td> <?=$info[5];?> </td>

                     </tr>
                </table>

                <?php include "bottom.html";?>
            </div>
        </div>
    </body>
</html>