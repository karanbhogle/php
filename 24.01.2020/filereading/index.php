<?php

if(isset($_POST['name'])){
    $name = $_POST['name'];

    if(!empty($name)){
        $writeFile = fopen('names.txt','a');
        fwrite($writeFile, $name."\n");
        fclose($writeFile);

        echo "<br><br>Current Names in the names.txt<br>";
        $readFile = file('names.txt');
        $count = 1;
        $dataLength = count($readFile);

        foreach($readFile as $fname){
            echo trim($fname);
            if($count < $dataLength){
                echo ", ";
            }
            $count++;
        }
    }
    else{
        echo "Please type a name";
    }
}

?>

<form action="#" method="POST">
    <input type="text" name="name"><br>
    <input type="submit">
</form>