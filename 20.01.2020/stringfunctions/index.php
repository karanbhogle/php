$string = 'This is a String';<br>
echo $string;<br>
countWords();<br>
createAssociativeArray();<br>
createArrayWithKeyAsIndexOfWordsFirstLetter();<br><br>

function countWords(){<br>
	global $string;<br>
	$words = str_word_count($string);<br>
	echo 'The number of words in the "'.$string.'" are '.$words;<br>
}<br><br>

function createAssociativeArray(){<br>
	global $string;<br>
	$words = str_word_count($string, 1);<br>
	echo 'Associative Array of Words : ';<br>
	print_r($words);<br>
}<br><br>

function createArrayWithKeyAsIndexOfWordsFirstLetter(){<br>
	global $string;<br>
	$words = str_word_count($string, 2);<br>
	echo 'Associative Array of Words WithKeyAsIndexOfWordsFirstLetter : ';<br>
	print_r($words);<br>
}<br><br><br>




//PART 2<br>
$string2 = "This is a string & it ends here .";<br>
echo $string2;<br><br>

countWords2();<br>
stringShuffle();<br>
stringReverse();<br><br>

function countWords2(){<br>
	global $string2;<br>
	$words = str_word_count($string2, 1, '&.');<br>
	echo 'Associative Array of Words with <b>&</b> and <b>.</b> having their own index : ';<br>
	print_r($words);<br>
}<br><br>

function stringShuffle(){<br>
	global $string2;<br>
	$shuffledWords = str_shuffle($string2);<br>
	echo 'The Shuffled String is <b>'.$shuffledWords.'</b>';<br>
}<br><br>

function stringReverse(){<br>
	global $string2;<br>
	$reversed = str_reverse($string2);<br>
	echo 'The Reversed String is <b>'.$reversed.'</b>';<br>
}<br><br><br>


//PART 3<br>
//STRING SIMILARITY<br>
//$string1 = 'This is a string and i love it';<br>
//$string2 = 'This is a string and i hat it';<br><br>

$string1 = 123.4567890;<br>
$string2 = 456.7890123;<br><br>

//$string1 = null;<br>
//$string2 = null;<br><br>

//$string1 = true;<br>
//$string2 = true;<br><br><br>


similar_text($string1, $string2, $result);<br>
echo 'The similarity is '.$result;<br><br>



//PART 4<br>
$string = '     This is an example string     ';<br>
$string_trimmed = trim($string);<br>  
echo $string;<br><br> 

//HTML ENTITITES AND ADDSLASHES<br>
$string = 'This is <a href="link">Click here</a> tag';<br>
echo $string;<br><br>

$slashed = htmlentities($string);<br>
echo $slashed;<br><br>

$string = addslashes('What does "yolo" mean?');<br>
echo $string;

<?php

$string = 'This is a String';
echo '<hr><h2>'.$string.'</h2>';
countWords();
createAssociativeArray();
createArrayWithKeyAsIndexOfWordsFirstLetter();
echo '<br><br>';

function countWords(){
	global $string;
	$words = str_word_count($string);
	echo '<br>The number of words in the "'.$string.'" are '.$words;
}

function createAssociativeArray(){
	global $string;
	$words = str_word_count($string, 1);
	echo '<br><br>Associative Array of Words : ';
	print_r($words);
}

function createArrayWithKeyAsIndexOfWordsFirstLetter(){
	global $string;
	$words = str_word_count($string, 2);
	echo '<br><br>Associative Array of Words WithKeyAsIndexOfWordsFirstLetter : ';
	print_r($words);
}




//PART 2
$string2 = "This is a string & it ends here .";
echo '<h2>'.$string2.'</h2>';

countWords2();
stringShuffle();
stringReverse();

function countWords2(){
	global $string2;
	$words = str_word_count($string2, 1, '&.');
	echo 'Associative Array of Words with <b>&</b> and <b>.</b> having their own index : ';
	print_r($words);
}

function stringShuffle(){
	global $string2;
	$shuffledWords = str_shuffle($string2);
	echo '<br>The Shuffled String is <b>'.$shuffledWords.'</b>';
}

function stringReverse(){
	global $string2;
	$reversed = strrev($string2);
	echo '<br>The Reversed String is <b>'.$reversed.'</b>';
}



//PART 3
//STRING SIMILARITY
//$string1 = 'This is a string and i love it';
//$string2 = 'This is a string and i hat it';

$string1 = 123.4567890;
$string2 = 456.7890123;

//$string1 = null;
//$string2 = null;

//$string1 = true;
//$string2 = true;

similar_text($string1, $string2, $result);
echo '<br>The similarity is '.$result;





//PART 4
echo '<br>';
$string = '     This is an example string     ';
$string_trimmed = trim($string);

echo $string;

//HTML ENTITITES AND ADDSLASHES
$string = 'This is <a href="link">Click here</a> tag';
echo $string;

$slashed = htmlentities($string);
echo '<br>'.$slashed.'<br><br>';


$string = addslashes('What does "yolo" mean?');
echo $string;


?>