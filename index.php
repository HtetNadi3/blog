<?php
$name = "james adam";
echo strlen($name);
echo "<br>";

//strlen
$str = "    james adam   ";
echo strlen($str), "<br>";

//trim
$trimed = trim($str);
echo strlen($trimed), "<br>";


$p1="123456";
$p2="1234567";
if(strcmp($p1, $p2) !=0){
  echo "password desn't match";
}else{
  echo "password match";
}

echo "<br>";
$web = 'DeFr#234';
echo strtolower($web);
echo strtoupper($web);
