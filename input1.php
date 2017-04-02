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


$json_pretty=json_encode($arr,JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE);
file_put_contents('form_data.json',$json_pretty ,FILE_APPEND); //file_append не работает для json


//переделать json