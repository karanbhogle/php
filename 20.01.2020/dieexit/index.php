echo 'This is a code <b>before die()</b>';<br>
die('This is when <b>die() is called</b>');<br>
echo 'This is <b>after die()</b> which can be only seen if die() is commented';<br><br>

echo 'This is a code before <b>exit()</b>';<br>
exit('This is when <b>exit() is called</b>>');<br>
echo 'This is <b>after exit()</b> which can be only seen if exit() is commented';

<?php
echo '<hr><br>Output for above code<br>';
echo 'This is a code <b>before die()</b><br>';
die('This is when <b>die() is called</b><br>');
echo 'This is <b>after die()</b> which can be only seen if die() is commented<br>';

echo '<br>This is a code before <b>exit()</b><br>';
exit('This is when <b>exit() is called</b><br>');
echo 'This is <b>after exit()</b> which can be only seen if exit() is commented';

?>
