<?php

$month="";

class Calendar{
    function displayCalendar(){
    
        if(isset($_POST['btnSubmit'])){
            $month = $_POST['selectMonth'];
            $year = $_POST['numberYear'];

            $_SESSION['month'] = $month;
            $_SESSION['year'] = $year;  
        }
        else if(isset($_SESSION['month']) && isset($_SESSION['year'])){
            $month = $_SESSION['month'];
            $year = $_SESSION['year'];
        }

        if(isset($_POST['btnSubmit']) || isset($_SESSION['month']) && isset($_SESSION['year'])){
            ?>
        <table class="outer">
        <tr>
            <td>
            <?php 
                $location = "images/" . $_FILES["picCalendarCover"]["name"];
                if(move_uploaded_file($_FILES["picCalendarCover"]["tmp_name"], $location)){
                    echo "<img src='".$location."' height=200 width=300 />";
                } 
                else{
                    echo "Error !!";
                }
            ?>
            </td>
        </tr>
        <tr>
            <td>
            <table>
                <caption>
                <?php
                    echo "<b>".$month."-".$year."</b>";
                ?>
                </caption>
                <tr>
                    <th style="color:red;">Sunday</th>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                    <th>Saturday</th>
                </tr>
            
            <?php
                $monthInNumber = 0;
                $firstDay = date("D", strtotime("1 Feb 2020"));
                
                if($month == "Jan"){
                    $monthInNumber = 1;
                }
                else if($month == "Feb"){
                    $monthInNumber = 2;
                } 
                else if($month == "Mar"){
                    $monthInNumber = 3;
                }
                else if($month == "Apr"){
                    $monthInNumber = 4;
                }
                else if($month == "May"){
                    $monthInNumber = 5;
                }
                else if($month == "Jun"){
                    $monthInNumber = 6;
                }
                else if($month == "Jul"){
                    $monthInNumber = 7;
                }
                else if($month == "Aug"){
                    $monthInNumber = 8;
                }
                else if($month == "Sep"){
                    $monthInNumber = 9;
                }
                else if($month == "Oct"){
                    $monthInNumber = 10;
                }
                else if($month == "Nov"){
                    $monthInNumber = 11;
                }
                else if($month == "Dec"){
                    $monthInNumber = 12;
                }
            
                $firstDay = date("D", strtotime("1 ".$month." "."$year."));
                $noOfDays = cal_days_in_month(CAL_GREGORIAN, $monthInNumber, $year);
            
                $arrayDays = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
                $currentDate = 1;
                
                while($currentDate <= $noOfDays){
                    echo '<tr>';
                    for($i = 0; $i < 7; $i++){
                        if($currentDate == 1){
                            if($firstDay == $arrayDays[$i]){
                                echo '<td>'.$currentDate.'</td>';
                                $currentDate++;
                                continue;
                            }
                            else{
                                echo '<td>'.'</td>';
                            } 
                        }
                        else{
                            if($i == 0){
                                echo '<td style="color:red;">'.$currentDate.'</td>';
                            }
                            else{
                                echo '<td>'.$currentDate.'</td>';
                            }
                            if($currentDate == $noOfDays){
                                $currentDate = 34;
                                break;
                            }
                            $currentDate++;
                        }
                    }
                    echo '</tr>';
                }
                echo '</table>';
                echo '</td></tr></table>';
            }
            
    }
}

?>