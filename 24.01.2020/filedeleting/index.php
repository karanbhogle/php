<?php

$filename = "filetodelete.txt";

if(@unlink($filename)){
    echo $filename.' has been deleted successfully';
}
else{
    echo 'Cannot delete '.$filename;
}

?>