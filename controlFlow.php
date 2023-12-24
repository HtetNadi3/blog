<?php
$name = "Htet";
$name .= " ";
$name .= "Nadi";
echo $name;

echo "<br>";

$num = 3;
$num = $num +1;
$num +=1;
$a = $num++;
$b = ++$num;
echo $num;
echo "<br>";

echo $a;
echo "<br>";

echo $b;

//?:
//??

echo date("y m d"),"<br>";
echo date("y m d H : i : s");
$d = date("D");
echo $d, "<br>";
if($d === "Sat" || $d === "Sun"){
  echo "Weekend";
}else{
  echo "weekday";
}
$y =date("Y");
echo $y,"<br>";
if($y === "2023" || $d === "2022"){
  echo "good";
}else{
  echo "bad";
}
echo "<br>";

switch($d){
  case 'Sat';
  case 'Sun';
    echo "weekend";
    break;
  default:
    echo "Weekday";
    break;
}

