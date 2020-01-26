<?php

$filename = "file.txt";

if(file_exists($filename)){
    echo "File already exists";
}
else{
    echo "File doesn't exists. Creating Now.";
    $handle = fopen($filename, "w");
    fwrite($handle, "Nothing exists in the file");
    fclose($handle);
}

?>