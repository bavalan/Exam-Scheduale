<!--
Bavalan Thangarajah
Student# 1002194564
CSCB20: My exam timetable
This assignment is for the purpose of creating an exam scheduale website. 
This file contains the exam headers such as Course,Section and etc.
This file calls both the top and bottom.html in order to complete the
design of the page.--> 
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
                    <tr>
                        <th>Course</th>
                        <th>Section</th> 
                        <th>Instructor</th>
                        <th>Date</th>
                        <th>Start</th>
                        <th>End</th>
                    </tr>
                    <!-- Row of exam info the falls below,
                    to the accurate header but is set as 
                    empty for default-->
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
                
             <?php include "bottom.html";//Code that links to bottom.html?>
            </div>
        </div>
    </body>
</html>