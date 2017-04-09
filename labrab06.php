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

$id=range(0,27);
//print_r($id);


$db_host='localhost';
$db_username='student';
$db_pass='student';

$myConnection= mysqli_connect("$db_host","$db_username","$db_pass") or die ("could not connect to mysql");
mysqli_select_db($myConnection, "web-labs") or die ("no database");

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}


for ($i = 1; $i <= $number; $i++) {
    $try=mysqli_query($myConnection,"INSERT INTO lab6 (id,state,population,universities,p_ratio,u_ratio) VALUES('$id[$i]','$region_arr[$i]','$people_arr[$i]','$university_arr[$i]','$people_ratio_arr[$i]','$university_ratio_arr[$i]')");}


$result=mysqli_query($myConnection,"SELECT id,state,population,universities,p_ratio,u_ratio FROM lab6 ORDER BY id");


echo "<table border='1px' align='center' cellspacing='1px'>
<tr>
<th>№ п/п</th>
<th>Область</th>
<th>Население, тыс.чел</th>
<th>К-ство ВУЗов</th>
<th>Отношение людей к населению </th>
<th>Отношение университетов к общему количеству</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['state'] . "</td>";
    echo "<td>" . $row['population'] . "</td>";
    echo "<td>" . $row['universities'] . "</td>";
    echo "<td>" . $row['p_ratio'] . "</td>";
    echo "<td>" . $row['u_ratio'] . "</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($myConnection);
?>

</body>
</html>