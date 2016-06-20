<?php

$string_values = 'abcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*_+?-=';
$shuffled=str_shuffle($string_values);
$o='0';
$string_char=substr($shuffled,0,14);

$string_digits=array();
for($n=48;$n>=0;$n--)
$string_digits[$n]= $n%9+1;
shuffle($string_digits);

$string_char =  $o.$string_char ;
$string_char_rev=strrev($string_char);
$string_chartoarray=str_split($string_char_rev);


$random_arrange= array();
for($n=0;$n<=63;$n++)  {
  if($n<8)  {
    $random_arrange[$n]=array_pop($string_chartoarray);
  }
  else if($n%8==0) {
    $random_arrange[$n]=array_pop($string_chartoarray);
  }
  else
    $random_arrange[$n]=array_pop($string_digits);
}


echo "<table>";
  for($i=0;$i<count($random_arrange);$i++) {
    $value_i=$random_arrange[$i];

    if($i==0) {
      echo "<tr><td><button id=\"$value_i\" onclick=\"pass_add('$value_i');\" value=$value_i >$value_i</button></td>";
    }
    else if($i<8){
      if($i==7) {
        echo "<td><button id=\"$value_i\" onclick=\"pass_add('$value_i');\" value=$value_i >$value_i</button></td></tr>";
      }
      else {
        echo "<td><button id=\"$value_i\" onclick=\"pass_add('$value_i');\" value=$value_i >$value_i</button></td>";
      }
    }
    else if(($i%8)==7){
      echo "<td><input type=\"text\" id=\"$value_i\"  value=$value_i ></td></tr>";
    }
    else if(($i%8)==0) {
      echo "<tr><td><button id=\"$value_i\" onclick=\"pass_add('$value_i');\" value=$value_i >$value_i</button></td>";
    }
    else {
      echo "<td><input type=\"text\" id=\"$value_i\"  value=$value_i ></td>";
    }

  }
  echo "</table><br>";



?>
<script>
function pass_add(i)
{
document.getElementById("pass").value=document.getElementById("pass").value + i ;
}
</script>
