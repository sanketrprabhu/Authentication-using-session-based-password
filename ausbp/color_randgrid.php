<?php





$string_values = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*_-+=';
$shuffled=str_shuffle($string_values);

$o='0';
$string_char=substr($shuffled,0,64);
$string_values_toarray = str_split($string_char);

$string_digits=array();
for($n=15;$n>=0;$n--)
$string_digits[$n]= $n%8+1;


$string_digits[16]='0' ;





$random_arrange= array();
for($n=0;$n<=80;$n++)  {
  if($n<9)  {
    $random_arrange[$n]=array_pop($string_digits);
  }
  else if($n%9==0) {
    $random_arrange[$n]=array_pop($string_digits);
  }
  else
    $random_arrange[$n]=array_pop($string_values_toarray);
}
echo '<br>';


//hybrid
$color_string = 'VIBGYORP';

$color_string_shuffled = str_shuffle($color_string);

$color_array = array();
$color_array = str_split($color_string_shuffled);
$_SESSION['color_array']=$color_array;
for($c=0;$c<8;$c++) {
  $color = 'images/'.$color_array[$c].'.png';
  if($c%2==0)
  echo '&nbsp';
  ?> <img src= <?php echo $color; ?> height="30" width="30"> <?php
}
echo '<br>';
echo "<table>";
  for($i=0;$i<count($random_arrange);$i++) {
    $value_i=$random_arrange[$i];

    if($i==0) {
      echo "<tr><td><input type=\"text\" id=\"$value_i\"  value=$value_i size=\"1\" readonly></td>";
    }
    else if($i<9){
      if($i==8) {
        echo "<td><input type=\"text\" id=\"$value_i\"  value=$value_i size=\"1\" readonly></td></tr>";
      }
      else {
        echo "<td><input type=\"text\" id=\"$value_i\"  value=$value_i size=\"1\" readonly></td>";
      }
    }
    else if(($i%9)==8){
      echo "<td><button id=\"$value_i\" onclick=\"pass_add('$value_i');\" value=$value_i >$value_i</button></td></tr>";
    }
    else if(($i%9)==0) {
      echo "<tr><td><input type=\"text\" id=\"$value_i\"  value=$value_i size=\"1\" readonly></td>";
    }
    else {
      echo "<td><button id=\"$value_i\" onclick=\"pass_add('$value_i');\" value=$value_i >$value_i</button></td>";
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
