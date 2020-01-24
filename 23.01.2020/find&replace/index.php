<?php

if(isset($_POST['user_input']) && isset($_POST['search_box']) && isset($_POST['replace_box'])){
    $user_input = $_POST['user_input'];
    $search = $_POST['search_box'];
    $replace = $_POST['replace_box'];


    $search = explode(" ", $search);
    $replace = explode(" ", $replace);

    if(isset($_POST['btnFindAndReplace']) && !empty($user_input) && !empty($search) && !empty($replace)){
        $search_length = count($search);
        $replacedString = str_ireplace($search, $replace, $user_input);
    }
    else{
        echo 'All Values are required';
    }
}
echo '<hr>';

?>

<form action="#" method="POST">
    <label>Enter Text:</label><br>
    <textarea name="user_input" rows="6" cols="30"><?php if(isset($replacedString)){
            echo $replacedString;
        } ?></textarea><br><br><br>

    <label>Search For:</label><br>
    <input type="text" name="search_box"><br><br><br>

    <label>Replace With:</label><br>
    <input type="text" name="replace_box"><br><br><br>

    <input type="submit" name="btnFindAndReplace" value="Find and Replace">
</form>