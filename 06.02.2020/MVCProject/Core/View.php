<?php

namespace Core;
class View{
    public static function render($view){
        $file = "../App/Views/$view";

        if(is_readable($file)){
            require_once $file;
        }
        else{
            echo $file.' not found';
        }
    }
}

?>