<?php

function sum($num){
  return array_sum($num);
}
echo sum([34,56,23,2,5,6]),"<br>";
echo sum([34,56,23,2,5,6,67,56]),"<br>";
echo sum([34,56,23,2,5,6,7,8,9,0,45]),"<br>";
echo sum([34,56,23,2,5,6,45,67,89,90,23,24,1]),"<br>";
