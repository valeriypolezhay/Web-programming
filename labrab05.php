<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP_try</title>
    <style>
        table {
            width: 100%; /* Ширина таблицы */
            border: 4px double black; /* Рамка вокруг таблицы */
            border-collapse: collapse; /* Отображать только одинарные линии */
        }
    </style>
</head>
<body>
<?php
$region_arr = [];
$people_arr = [];
$university_arr = [];


$people_ratio_arr = [];
$university_ratio_arr = [];

$file = fopen("oblinfo.txt", "r");
//$file = iconv("CP1251","utf-8",$file);

$number = fgets($file); # убираем 27 в начале файла

for ($i = 1; $i <= $number; $i++) {
    $region_arr[$i] = trim(fgets($file));
    $people_arr[$i] = trim(fgets($file));
    $university_arr[$i] = trim(fgets($file));
}
fclose($file);

$people_summ = array_sum($people_arr);
$university_summ = array_sum($university_arr);

for ($i = 1; $i <= $number; $i++) {
    $people_ratio_arr[$i] = round($people_arr[$i] / $people_summ, 2);
    $university_ratio_arr[$i] = round($university_arr[$i] / $university_summ, 2);
}


$tablestring = "<table>";
$tablestring .= "<tr>
<th>Административная часть</th>
<th>Количество населения<br>в тыс. человек</th>
<th>Количество высших<br>учебных заведений</th>
<th>Доля количества<br>населения, в %</th>
<th>Доля количества<br>ВУЗов, в %</th>
</tr>";

for ($i = 1; $i <= $number; $i++) {
    $tablestring .= "<tr>";
    $tablestring .= "<td>" . $region_arr[$i] . "</td>";
    $tablestring .= "<td>" . $people_arr[$i] . "</td>";
    $tablestring .= "<td>" . $university_arr[$i] . "</td>";
    $tablestring .= "<td>" . $people_ratio_arr[$i] . "</td>";
    $tablestring .= "<td>" . $university_ratio_arr[$i] . "</td>";
    $tablestring .= "</tr>";
}

$tablestring .= "</table>";
echo $tablestring;
$new_info = fopen("new_oblinfo.txt", "w");

$test = "";
for ($i = 1; $i <= $number; $i++) {
    $test .= $region_arr[$i] . PHP_EOL;
    $test .= $people_arr[$i] . PHP_EOL; // Запись в файл
    $test .= $university_arr[$i] . PHP_EOL;
    $test .= $people_ratio_arr[$i] . PHP_EOL;
    $test .= $university_ratio_arr[$i] . PHP_EOL;
}

$test = fwrite($new_info, $test);
fclose($new_info); //Закрытие файла

$f1 = "";
$f2 = "";
$output1 = "";
$output2 = "";

echo "<h3>Текст первого файла</h3>";
$f1 = fopen("oblinfo.txt", "r");
$output1 = "<details>";
while (!feof($f1)) {
    $output1 .= "<summary>";
    $output1 .= fgets($f1) . "<br/>";
    $output1 .= "</summary>";
}
$output1 .= "</details>";
echo $output1;
fclose($f1);


echo "<h3>Текст второго файла</h3>";
$f2 = fopen("new_oblinfo.txt", "r");
$output2 = "<details>";
while (!feof($f2)) {
    $output2 .= "<summary>";
    $output2 .= fgets($f2) . "<br/>";
    $output2 .= "</summary>";
}
$output2 .= "</details>";
echo $output2;
fclose($f2);

?>

</body>
</html>