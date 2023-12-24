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
//strcmp
if(strcmp($p1, $p2) !=0){
  echo "password desn't match";
}else{
  echo "password match";
}

echo "<br>";
$web = 'DeFr#234';

//strtolower
//strtoupper
echo strtolower($web);
echo strtoupper($web);

$mystr = "Welcome to new York";
echo substr($mystr, 0,7);
echo "<br>";


//array to string
$email = "htetnadi23@gmai.com.mm";
$arr = explode('.',$email);
print_r($arr);

echo "<br>";

$test = "de fre dfag dg dfa";
$ex = explode(' ',$test);
print_r($ex);

echo "<br>";

$url="https://google.com/docs/standard";
$url_res = explode('/', $url);
print_r($url_res);


//array to string
$arr = ['htet', 'nadi'];
$my_arr=implode(' ',$arr);
echo $my_arr;
echo "<br>";

$first = "hello mm";
$second = "World hello mm";
echo ucfirst($str)."<br>";
echo lcfirst($second)."<br>";

$mail = "htt@gmdail.commmm";
echo  str_replace('gmdmail','gmail',$mail);

