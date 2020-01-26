<?php

if(isset($_POST['btnFile'])){
    $fileName = $_FILES['file']['name'];
    $fileSize = $_FILES['file']['size'];
    $fileType = $_FILES['file']['type'];
    $extension = strtolower(substr($fileName, strpos($fileName, '.') + 1));
    
    if(!empty($fileName) && ($fileType == "image/jpeg") &&($extension == "jpg" || $extension == "jpeg") || $extension == "png"){
        echo "The name of the file is ".$fileName."<br>";
        echo "The size of the ".$fileName." is ".($fileSize)."<br>"; 
        
        $location = "uploaded/";
        if(move_uploaded_file($_FILES['file']['tmp_name'], $location.$fileName)){
            echo $fileName." uploaded successfully";
        }
        else{
            echo $fileName." could'nt be uploaded";
        }
    }
    else{
        echo "Please Choose an Image file(PNG/JPG/JPEG only)";
    }
    
}

?>


<form action="#" method="POST" enctype="multipart/form-data">
    <input type="file" name="file"><br><br>
    <input type="submit" name="btnFile" value="Show File">
</form>