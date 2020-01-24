<?php

$browser = get_browser(null, true);
print_r($browser);

echo '<br><br>';
echo 'Current Browser: '.$browser['browser'].'<br>';

if($browser['browser'] == 'Chrome'){
    echo "Chrome is simple to use.";
}

else if($browser['browser'] == 'Firefox'){
    echo "Chrome is better. You should use it";
}

else if($browser['browser'] == 'Safari'){
    echo "Apple made safari good but Chrome is better in many ways.";
}
?>