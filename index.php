<?php

// function sum($num){
//   return array_sum($num);
// }
// echo sum([34,56,23,2,5,6]),"<br>";
// echo sum([34,56,23,2,5,6,67,56]),"<br>";
// echo sum([34,56,23,2,5,6,7,8,9,0,45]),"<br>";
// echo sum([34,56,23,2,5,6,45,67,89,90,23,24,1]),"<br>";

// function hello(){
//   echo "hello";//dr pl htewt tl
//   return "hi";
// }
// hello();


// function add($a, $b){
//   return $a+$b;
// }
// try {
  
//   echo add(45);//error
// } catch (\Throwable $err) {
//   print_r($err);
// }finally{
// echo add(6,6);
// echo "<br>";
// echo add(4,5,6);//shae ka two pra pl a lote lote
// }

//default parameters
// function show ($a=10, $b=40){
//   return $a+$b;
// }
// echo show() . "<br>";
// echo show(100). "<br>";
// echo show(3,-8). "<br>";

// function spread($a, ...$b){
//   echo $a . "<br>";
//   //print_r($b);
//   foreach($b as $key => $value){
//     echo "THe value is ", $value . "<br>";
//   }
// }
// echo spread(100,"aa", "bb", "cc",44,55,666);

// function arr(){
//   $result = func_get_args();
//   foreach($result as $key => $value){
//     echo "The name is " .$value. "<br>";
//   }
// }
// echo arr("rose", "bobo", "mg mg");
// echo "<br>";

// $age = 30;
// function getAge($a){
// $a = 40;
//   echo "inside ". $a, "<br>";
// }
// getAge($age);

// echo "outside".$age;

// $age =20;
// function age(&$a) {
//   $a =40;
//   echo "inside ".$a, "<br>";
// }age($age);
// echo "outside" .$age;

// $hobby1 = "football";
// $hobby2 = "swimming";
// define("hobby3", "reading");
// function hobby(){
//   global $hobby1, $hobby2;
//   echo "my hobbies are $hobby1 and $hobby2 and " . hobby3;
// }
// hobby();

//function name ko var value nae tu lox ya nay tl
//kyaung tg tg nat
function two($a){
  echo "similar js and $a";
}
$pp = "two";
//echo $pp;
$pp("php");


//array_map
$numbers =[4,6,7,8,9];
function add($a){
  return $a + 3;
}
$res = array_map("add", $numbers);
print_r($res);


//functon expression like js
$add = function ($a, $b){
  echo $a + $b;
};
$add(100,200);


//a yay kyee
$myName = "Nadi";
$callMe = function () use ($myName){
  echo "my name is $myName";
};

$callMe();

//arrow function (php => 7.4)
$ar = fn($aa) => $aa *5;
echo $ar(3);

echo "<br>";
$one = 2 ;
$call =fn ($two) => $one * $two;//no need globa or use()
 echo $call(10);

 function myProfile($name, $phone, $email){
  echo "my name is $name and phone is $phone and email is $email";
 }
 myProfile("james", "094579834", "afjdagl@gmil.com");
 myProfile("093857341", "htet htet", "oei@gmail.com");
 myProfile(phone: "475092834", email: "htet@gmail.com", name: "koko");