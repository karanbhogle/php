<?php

class Post{
    public function addPost(){
        echo "This is called from the addPost() method<br>";
    }

     private function save($arg1, $arg2){
        echo $arg1." and ".$arg2."<br>";
    }
}

echo "<h3>normal method calling</h3>";
$post = new Post();
$post -> addPost();
echo "<hr>";


// object based on a variable
echo "<h3>object based on a variable</h3>";
$class_name = "Post";
$postObj = new $class_name();
echo "<hr>";

// method based on a variable
echo "<h3>method based on a variable</h3>";
$method_name = "addPost";
$postObj -> $method_name();
echo "<hr>";

// method with parameters based on a variable
echo "<h3>method with parameters based on a variable</h3>";
call_user_func_array([$postObj, "save"], [123, "abcd"]);
echo "<hr>";

//check the method exists and is public before calling
echo "<h3>check the method exists and is public before calling</h3>";
if(is_callable([$postObj, "addPost"])){
    echo "addPost() is callable<br>";
}
else{
    echo "addPost() is NOT callable<br>";
} 

if(is_callable([$postObj, "save"])){
    echo "save() is callable";
}
else{
    echo "save() is NOT callable";
} 
?>