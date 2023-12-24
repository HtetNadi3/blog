<?php

// echo for string and numbers
// print_r for array
// var_dump() for to check datatype

echo "hello world";
echo "<br>";
echo 100;
echo "<br>";
// echo [1,2,3];error
print_r([1,2,3]);
echo "<br>";
$arr = ['a','b', 20, 3.5,true,false];

echo "<pre>";
print_r($arr);
var_dump($arr);
echo "</pre>";

//use less
define('pi', '3.14');
//define('pi', '7.14'); error
echo pi;
