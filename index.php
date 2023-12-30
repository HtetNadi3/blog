<?php

// $user = ['htet','htetnadi',67,'female'];//numeric array
// $user[0]='rose';
// $user[50]="50";
// $user[]="7485345790";
// echo $user[0];
// echo count($user);
// echo "<pre>";
// print_r($user);
// echo "</pre>";

// //Associated array
// $user = [
//   "name"=>"htet htet",
//   "age" =>"21",
//   "gender"=>"female",
// ];
// echo $user['name'];
// echo $user['age'];
// echo $user['gender'];


// //Multi-dimensional array(array in associated array)

// $user = [
//   [
//     ["name"=>"htet htet","age" =>"21","gender"=>"female"],
//     ["name"=>"nadi","age" =>"23","gender"=>"female"],
//     ["name"=>"aung","age" =>"25","gender"=>"male"],
//   ],
//   [
//     ["name"=>"aye","age" =>"25","gender"=>"male"],
//     ["name"=>"su","age" =>"30","gender"=>"female"],
//     ["name"=>"zaw","age" =>"90","gender"=>"male"],
//   ]
// ];
// echo "<pre>";
// print_r($user);
// echo "</pre>";
// echo "<br>";
// echo $user[0][0]['name'];
// echo "<br>";
// echo $user[1][1]['name'];

// echo "<br>";

// //destructure
// $user=['james',34];
// [$name, $age]=$user;//lit($name, $price)=$fruit;
// echo "$name age is $age";
// echo "<br>";

// //associate array in destructure
// $users = ["name" => "nadi", "age" => 49, "gender" => "female"];

// ["name"=>$name, "age"=>$age, "gender"=>$gender]=$users;
// echo "name is $name. Age is $age. Gender is $gender.";

// $num =[2,56,67,78];
// echo count($num). "<br>";
// echo is_array($num). "<br>";
// echo in_array(11, $num). "<br>";
// echo array_search(55,$num). "<br>";
// print_r(array_push($num),100). "<br>";
// print_r(array_pop($num)). "<br>";
// print_r(array_unshift($num,200)). "<br>";
// print_r(array_shift($num)). "<br>";
// print_r($num). "<br>";
// $res = array_splice($num, 2,3);
// print_r($res);
// echo "<br>";

 $user =["id"=> 1, "name"=>"phone", "model"=>2022];
// foreach ($user as $key => $val){
//   echo $key, "<br>";
  // echo $val, "<br>";
// }
// echo "<br>";
// $keys = array_keys($user);//key in array
// $val = array_values($user);//values in array
// print_r($keys);//array mox print_r nat htope
// echo "<br>";
// print_r($val);
// echo "<br>";

// echo file_exists('test.php'), "<br>";
// $str = file_get_contents("test.php");//a htae ka text ko lo chin yin String
// echo $str,"<br>";
// $arr = file("text.php");//file ko lo chin yin array
// print_r($arr);

// file_put_contents("test.php", "hello php is easy");//change content

// $person = [
//   "name" => "htet",
//   "age" => 20,
//   "gender" => "female",
//   "address" =>"ygn"
// ];
// $p = (object) $person;//array to object***
// echo $p-> name . "<br>";
// echo $p-> age . "<br>";
// echo $p -> gender . "<br>";
// echo $p -> address . "<br>";

// $a =[3,78,3,6,8,10];
// sort($a);
// print_r($a);
// rsort($a);
// print_r($a);

// numeric array = sort()
// associated array = asort()
// need calculation = usort()/uasort()/uksort()
//associated key ko sort = ksort()

// sleep(3);
// echo "hi";
// //die("die");
// //exit("exit");
// echo "hey";

// $num = [34,5,7,9,23];
// echo array_sum($num);
// $result =0;

// foreach ($num as $value){
//   $result += $value;
// }
// echo $result;

// $arr = ["B","R","B", "Dog", "R", "Dog", "Cat"];
// print_r(array_count_values($arr));//repeat values 

// $item = ["name" => "Htet", "class"=> "PHP"];
// if (array_key_exists("email", $item)){
//   echo "Key exits";
// }else echo "No key";

// // How do you remove duplicates values from an array?
// $arr = ["a" => "answer", 'b'=>"interview", "c"=>"answer"];
// print_r(array_unique($arr));

// echo "<br>";
// //how to change array index in php?
// //answer
// $array = ["name"=>"Htet", "age"=> 49, "gender"=>"female"];
// $array['username']=$array['name'];
// unset($array['name']);//variable ko delete
// print_r($array);

//How to get common values from two arrays in PHP?
// $a1=["r"=>"red", "b"=>"black", "p"=>"pink"];
// $a2=["o"=>"orange", "a"=>"red", "g" => "green" , "i"=> "pink"];
// $result1 = array_intersect($a1,$a2);
// $result2 = array_intersect($a2,$a1);

// print_r($result1);
// echo "<br>";
// print_r($result2);

$before = [
  'PHP' => 2,
  'Java' => 4,
  'HTML' =>4,
  'CSS' => 5
];
$after =[
  'PHP' => 4,
  'Javascript' => 3,
  'HTML' => 2
];
$merge1 = array_merge($before, $after);
$merge2 = array_merge($after, $before);

print_r($merge1);
echo "<br>";
print_r($merge2);


