include 'header.req.php';<br>
include('header.req.php');<br>
echo $anotherPageMessage." but the header is require twice here";<br>

<hr>Output of the above code is as below

<?php

require 'header.inc.php';
require('header.inc.php');
echo $anotherPageMessage." but the header is include twice here";

?>