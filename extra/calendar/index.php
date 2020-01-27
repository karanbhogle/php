<!DOCTYPE html>

<?php 
    session_start();
    require_once 'Calendar.php';
?>

<head>
    <style>
        .outer{
            border: 2px dotted black;
        }
        table{
            border: 1px solid black;
        }
        td{
            text-align:center;
        }
    </style>
    <title>Calendar: <?php if(isset($_SESSION['month']) && isset($_SESSION['year'])){echo $_SESSION['month']." ".$_SESSION['year'];} ?></title>
</head>
<form action="index.php" enctype="multipart/form-data" method="POST">
    <label>Enter Year: </label>
    <input type="number" min="1970" value="<?php  echo $year; ?>" max="2099" name="numberYear"><br>

    <label>Enter Month:</label>
    <select name="selectMonth">
        <option value="Jan" <?php if($month == "Jan"){ echo "selected";} ?>>January</option>
        <option value="Feb" <?php if($month == "Feb"){ echo "selected";} ?>>February</option>
        <option value="Mar" <?php if($month == "Mar"){ echo "selected";} ?>>March</option>
        <option value="Apr" <?php if($month == "Apr"){ echo "selected";} ?>>April</option>
        <option value="May" <?php if($month == "May"){ echo "selected";} ?>>May</option>
        <option value="Jun" <?php if($month == "Jun"){ echo "selected";} ?>>June</option>
        <option value="Jul" <?php if($month == "Jul"){ echo "selected";} ?>>July</option>
        <option value="Aug" <?php if($month == "Aug"){ echo "selected";} ?>>August</option>
        <option value="Sep" <?php if($month == "Sep"){ echo "selected";} ?>>September</option>
        <option value="Oct" <?php if($month == "Oct"){ echo "selected";} ?>>October</option>
        <option value="Nov"<?php if($month == "Nov"){ echo "selected";} ?>>November</option>
        <option value="Dec" <?php if($month == "Dec"){ echo "selected";} ?>>December</option>
    </select><br>
    <input type="file" name="picCalendarCover"><br>
    <input type="submit" name="btnSubmit" value="Show Calendar!">
</form>

<br><br><br>



<?php

$cal = new Calendar();
$cal->displayCalendar();

?>