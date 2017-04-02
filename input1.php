<?php
$name=NULL;
$vote=NULL;
$comment=NULL;

if (isset($_GET['name'])) {
    $name = $_GET['name'];
}
if (isset($_GET['vote'])) {
    $vote = $_GET['vote'];
}
if (isset($_GET['comment'])) {
    $comment = $_GET['comment'];
}
$feedback="";
$feedback.="<h2>Вас зовут:</h2>" . "$name" . "<br><h2>Ваше мнение:</h2>" . "$vote" . "<br><h2>Дополнительный комментарий:</h2>" . "$comment". "<br>". "<br>";

echo $feedback;
echo ("<i>Ваш ответ записан </i>");



$arr = array('Name' => $name, 'vote' => $vote, 'comment' => $comment);



$export = $json_export = array();
if (($arr = file_get_contents('form_data.json')) != false) {
    $export = json_decode($arr, true);
}
array_push($export, $_GET);
$json_export = json_encode($export, JSON_PRETTY_PRINT);
file_put_contents('form_data.json', $json_export);


var_dump($arr);PHP_EOL;
var_dump($export);PHP_EOL;
var_dump($json_export);PHP_EOL;
var_dump($arr);PHP_EOL;
var_dump($export);PHP_EOL;
var_dump($export);PHP_EOL;
var_dump($json_export);PHP_EOL;