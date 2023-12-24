<?php

$user = ['htet','htetnadi',67,'female'];//numeric array
$user[0]='rose';
$user[50]="50";
$user[]="7485345790";
echo $user[0];
echo count($user);
echo "<pre>";
print_r($user);
echo "</pre>";

//Associated array
$user = [
  "name"=>"htet htet",
  "age" =>"21",
  "gender"=>"female",
];
echo $user['name'];
echo $user['age'];
echo $user['gender'];

//Multidiemsional array

$user = [
  [
    ["name"=>"htet htet","age" =>"21","gender"=>"female"],
    ["name"=>"nadi","age" =>"23","gender"=>"female"],
    ["name"=>"aung","age" =>"25","gender"=>"male"],
  ],
  [
    ["name"=>"aye","age" =>"25","gender"=>"male"],
    ["name"=>"su","age" =>"30","gender"=>"female"],
    ["name"=>"zaw","age" =>"90","gender"=>"male"],
  ]
];
echo "<pre>";
print_r($user);
echo "</pre>";
echo "<br>";
echo $user[0][0]['name'];
echo "<br>";
echo $user[1][1]['name'];
