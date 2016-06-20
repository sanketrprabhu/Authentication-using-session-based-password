<?php
ob_start();
session_start();
$current_file = $_SERVER['SCRIPT_NAME'];
//$http_referer = $_SERVER['HTTP_REFERER'];

function loggedin(){
if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id'])) {
  return true;
  }
else {
  return false;
  }
}
function survey1($timetaken,$username) {

$query1 = "SELECT `username` FROM `survey` WHERE `username`='$username'";
if($query1_run =mysql_query($query1)) {
  $query1_num_rows = mysql_num_rows($query1_run);

  if($query1_num_rows == 1 ) {
    $no_of_login = getuserfield_survey('no_of_login1',$username);
    if($no_of_login > 0) {
    /*
    $avg_time = 0;
    $best_time = 0;
    $worst_time = 0;
    $no_of_login = 0;
    */
    $avg_time = getuserfield_survey('avg_time1',$username);
    $best_time = getuserfield_survey('best_time1',$username);
    $worst_time = getuserfield_survey('worst_time1',$username);

    if($best_time > $timetaken)
    $best_time = $timetaken;

    if($worst_time < $timetaken)
    $worst_time = $timetaken;

    $total_time = $avg_time * $no_of_login;

    $no_of_login = $no_of_login + 1;

    $avg_time = ($total_time + $timetaken)/$no_of_login;
    //echo $best_time;
   // echo $worst_time;
    //echo $avg_time;
    //echo $no_of_login;
    //$delete_query = "DELETE FROM `survey` WHERE `username`='$username'";
    //mysql_query($delete_query);
    $update_query = "UPDATE `survey` SET `avg_time1`='$avg_time',`best_time1`='$best_time',`worst_time1`='$worst_time',`no_of_login1`='$no_of_login' WHERE `username`='$username'";
    mysql_query($update_query);
    //echo 'inserted';
    }
    else {
      $update_query1= "UPDATE `survey` SET `avg_time1`='$timetaken',`best_time1`='$timetaken',`worst_time1`='$timetaken',`no_of_login1`='1' WHERE `username`='$username'";
      mysql_query($update_query1);
    }
}
else {
$insert_query= "INSERT INTO `survey` VALUES('$username','$timetaken','$timetaken','$timetaken','1','','','','0','','','','0') ";
mysql_query($insert_query);
}
/*
else {
$update_query1= "UPDATE `survey` SET `avg_time1`='$timetaken',`best_time1`='$timetaken',`worst_time1`='$timetaken',`no_of_login1`='1' WHERE `username`='$username'";
mysql_query($update_query1);
}
*/
}

}
function survey2($timetaken,$username) {

$query1 = "SELECT `username` FROM `survey` WHERE `username`='$username'";
if($query1_run =mysql_query($query1)) {
  $query1_num_rows = mysql_num_rows($query1_run);

  if($query1_num_rows == 1 ) {
    $no_of_login = getuserfield_survey('no_of_login2',$username);
    if($no_of_login > 0)  {

    /*
    $avg_time = 0;
    $best_time = 0;
    $worst_time = 0;
    $no_of_login = 0;
    */
    $avg_time = getuserfield_survey('avg_time2',$username);
    $best_time = getuserfield_survey('best_time2',$username);
    $worst_time = getuserfield_survey('worst_time2',$username);

    if($best_time > $timetaken)
    $best_time = $timetaken;

    if($worst_time < $timetaken)
    $worst_time = $timetaken;

    $total_time = $avg_time * $no_of_login;

    $no_of_login = $no_of_login + 1;

    $avg_time = ($total_time + $timetaken)/$no_of_login;
    //echo $best_time;
   // echo $worst_time;
    //echo $avg_time;
    //echo $no_of_login;
    //$delete_query = "DELETE FROM `survey` WHERE `username`='$username'";
    //mysql_query($delete_query);
    $update_query = "UPDATE `survey` SET `avg_time2`='$avg_time',`best_time2`='$best_time',`worst_time2`='$worst_time',`no_of_login2`='$no_of_login' WHERE `username`='$username'";
    mysql_query($update_query);
    //echo 'inserted';
    }
    else {
      $update_query1= "UPDATE `survey` SET `avg_time2`='$timetaken',`best_time2`='$timetaken',`worst_time2`='$timetaken',`no_of_login2`='1' WHERE `username`='$username'";
      mysql_query($update_query1);
    }

}
else {
$insert_query= "INSERT INTO `survey` VALUES('$username','','','','0','$timetaken','$timetaken','$timetaken','1','','','','0') ";
mysql_query($insert_query);
}

}

}
function survey3($timetaken,$username) {

$query1 = "SELECT `username` FROM `survey` WHERE `username`='$username'";
if($query1_run =mysql_query($query1)) {
  $query1_num_rows = mysql_num_rows($query1_run);

  if($query1_num_rows == 1 ) {
     $no_of_login = getuserfield_survey('no_of_login3',$username);
     if($no_of_login > 0 ) {
  /*
    $avg_time = 0;
    $best_time = 0;
    $worst_time = 0;
    $no_of_login = 0;
    */
    $avg_time = getuserfield_survey('avg_time3',$username);
    $best_time = getuserfield_survey('best_time3',$username);
    $worst_time = getuserfield_survey('worst_time3',$username);
    $no_of_login = getuserfield_survey('no_of_login3',$username);
    if($best_time > $timetaken)
    $best_time = $timetaken;

    if($worst_time < $timetaken)
    $worst_time = $timetaken;

    $total_time = $avg_time * $no_of_login;

    $no_of_login = $no_of_login + 1;

    $avg_time = ($total_time + $timetaken)/$no_of_login;
    //echo $best_time;
   // echo $worst_time;
    //echo $avg_time;
    //echo $no_of_login;
    //$delete_query = "DELETE FROM `survey` WHERE `username`='$username'";
    //mysql_query($delete_query);
    $update_query = "UPDATE `survey` SET `avg_time3`='$avg_time',`best_time3`='$best_time',`worst_time3`='$worst_time',`no_of_login3`='$no_of_login' WHERE `username`='$username'";
    mysql_query($update_query);
    //echo 'inserted';
     }
     else {
        $update_query1= "UPDATE `survey` SET `avg_time3`='$timetaken',`best_time3`='$timetaken',`worst_time3`='$timetaken',`no_of_login3`='1' WHERE `username`='$username'";
        mysql_query($update_query1);
     }
}


else {
$insert_query= "INSERT INTO `survey` VALUES('$username','','','','0','','','','0','$timetaken','$timetaken','$timetaken','1') ";
mysql_query($insert_query);
}




}

}
function getuserfield_survey($field,$username) {

  $query = "SELECT `$field` FROM `survey` WHERE `username` ='$username'";

  if($query_run =mysql_query($query)){
    if($query_result =  mysql_result($query_run,0,$field)){
    return $query_result;
    }
  }
}
function getuserfield($field) {

  $query = "SELECT `$field` FROM `users` WHERE `id` ='". $_SESSION['user_id']."'";

  if($query_run =mysql_query($query)){
    if($query_result =  mysql_result($query_run,0,$field)){
    return $query_result;
    }
  }
}

function self_coordinate1($char1,$char2,$verti,$hori) {
  $value_x1 = strpos($hori,$char1)%7;
  $value_y1 = strpos($verti,$char1)%7;
  $value_x2 = strpos($hori,$char2)%7;
  $value_y2 = strpos($verti,$char2)%7;
  
  $value1 = $hori[($value_y1*7)+$value_x2];
  $value2 = $hori[($value_y2*7)+$value_x1];
  
  $ret = $value1.$value2;

  return $ret;
}

function string_vertical($string){
 $index = 0;
 $i = 0;
 $vertical_array = array();
 for($y=0;$y<7;$y++) {
   for($x=0;$x<7;$x++) {
     $index = ($x*7)+$y;
     $vertical_array[$i] = $string[$index];
     $i++;
   }
 }
 return implode($vertical_array);
}


function recover_technique1($password,$horizontal_array) {

         if((strlen($password)%2) == 0) {
         $password_array = str_split($password);
         $suspected_password = '';
         for($p=0;$p<count($password_array);$p = $p+2)
         $suspected_password = $suspected_password .''.self_coordinate1($password_array[$p],$password_array[$p+1],string_vertical($horizontal_array),$horizontal_array);
         $final = array();
         $final = splitting_in_two($suspected_password);
         return $final;
         //print_r($final);
         //echo  "<script type='text/javascript'>alert('$suspected_password');</script>";
         }
         else {
         echo ('Password should consist even number of digits.');
         }


}

function recover_technique2($password,$array_digits,$string_char) {
  if((strlen($password)%2) == 0) {
    $password_array = str_split($password);
    $final_password = 0;
    for($p=0;$p<count($password_array);$p = $p+2)
      $final_password=$final_password+ $array_digits[find_index($password_array[$p],$password_array[$p+1],$string_char)];
      //echo  "<script type='text/javascript'> alert('$final_password');</script>";
      return $final_password;
  }
  else {
    $error ='Password should consist even number of digits.';
    echo "<script type='text/javascript'> alert('$error');</script>";
  }

}

function find_index($char1,$char2,$string) {
  $value_x = strpos($string,$char1);
  $value_y = strpos($string,$char2);
  
  if($value_x>7) {
  $value_x=($value_x)-7;
  $return = 7*($value_x-1)+($value_y-1);
  }
  if($value_y>7) {
  $value_y=($value_y)-7;
  $return = 7*($value_y-1)+($value_x-1);
  }
  return $return;
}

function recover_technique3($password,$string_char,$color_array) {


  if((strlen($password)) == 4) {
    $password_array = str_split($password);
    $suspected_password = '';

    for($p=0;$p<4;$p++)
    $suspected_password = $suspected_password .''.self_coordinate2($password[$p],$string_char);
         //echo $suspected_password.'<br>';
         $final = array();
         $final = splitting_possibilities($suspected_password);


         for($n=0;$n<16;$n++) {
           $arranged = $final[$n];
           $arranged_array = array();
           $arranged_array = str_split($arranged);
           $answer = array();

           //echo '<br>';
          // print_r($arranged_array);
           //echo '<br>';
          // print_r($color_array);
          // echo '<br>';

             $answer[$arranged_array[0]] = $color_array[0];
             $answer[$arranged_array[1]] = $color_array[1];
             $answer[$arranged_array[2]] = $color_array[2];
             $answer[$arranged_array[3]] = $color_array[3];
             $answer[$arranged_array[4]] = $color_array[4];
             $answer[$arranged_array[5]] = $color_array[5];
             $answer[$arranged_array[6]] = $color_array[6];
             $answer[$arranged_array[7]] = $color_array[7];

          // print_r($answer);
           ksort($answer);
          // echo '<br>';
           //print_r($answer);
           $answer_string = implode($answer);
           //echo $answer_string.'<br>';

           $final_array[$n]=$answer_string;
         }
         return $final_array;
         //print_r($final);
      //echo  "<script type='text/javascript'> alert('$final_password');</script>";

  }
  else {
    $error ='Password should consist only 4 digits.';
    echo "<script type='text/javascript'> alert('$error');</script>";
  }



}

function self_coordinate2($char,$array) {
  $array_tostring = implode($array);
  $x=8-(strpos($array_tostring,$char)%8);
  $y=8-((strpos($array_tostring,$char)+$x)/8)+1;
 // echo $x.'&nbsp'.$y;
  return $x.$y;

}

function splitting_possibilities($string) {
  $array_0 = array();
  $array_1= array();
  $array_0= str_split($string);
  $array_1[0]=$array_0[1];
  $array_1[1]=$array_0[0];
  $array_1[2]=$array_0[3];
  $array_1[3]=$array_0[2];
  $array_1[4]=$array_0[5];
  $array_1[5]=$array_0[4];
  $array_1[6]=$array_0[7];
  $array_1[7]=$array_0[6];
 // print_r($array_0);
 // print_r($array_1);
  $final_array = array();
  for($k=0;$k<2;$k++) {
      for($j=0;$j<2;$j++) {
        for($i=0;$i<2;$i++) {
           for($h=0;$h<2;$h++) {
            $value = '';
            if($k==0)
              $value .= $array_0[0].$array_0[1];
            else
              $value .= $array_1[0].$array_1[1];
            if($j==0)
              $value .= $array_0[2].$array_0[3];
            else
              $value .= $array_1[2].$array_1[3];
            if($i==0)
              $value .= $array_0[4].$array_0[5];
            else
              $value .= $array_1[4].$array_1[5];
            if($h==0)
              $value .= $array_0[6].$array_0[7];
            else
              $value .= $array_1[6].$array_1[7];
            array_push($final_array, $value);
          }
        }
      }
    }
    return $final_array;

}

function display_in_final_array($array_0,$array_1) {
 $final_array = array();
  $size = count($array_0);
  switch($size) {

    case 1:

    for($k=0;$k<2;$k++) {
      $value ='';
      if($k==0)
        $value .= $array_0[0];
      else
        $value .= $array_1[0];
      array_push($final_array, $value);
    }
    return $final_array;
    break;

    case 2:

    for($k=0;$k<2;$k++) {
      for($j=0;$j<2;$j++) {
         $value ='';
         if($k==0)
            $value .= $array_0[0];
          else
            $value .= $array_1[0];
          if($j==0)
            $value .= $array_0[1];
          else
            $value .= $array_1[1];
          array_push($final_array, $value);
      }
    }
    return $final_array;
    break;


    case 3:

    for($k=0;$k<2;$k++) {
      for($j=0;$j<2;$j++) {
        for($i=0;$i<2;$i++) {
          $value = '';
          if($k==0)
            $value .= $array_0[0];
          else
            $value .= $array_1[0];
          if($j==0)
            $value .= $array_0[1];
          else
            $value .= $array_1[1];
          if($i==0)
            $value .= $array_0[2];
          else
            $value .= $array_1[2];
          array_push($final_array, $value);

        }
      }
    }
    return $final_array;
    break;

    case 4:
    for($k=0;$k<2;$k++) {
      for($j=0;$j<2;$j++) {
        for($i=0;$i<2;$i++) {
           for($h=0;$h<2;$h++) {
            $value = '';
            if($k==0)
              $value .= $array_0[0];
            else
              $value .= $array_1[0];
            if($j==0)
              $value .= $array_0[1];
            else
              $value .= $array_1[1];
            if($i==0)
              $value .= $array_0[2];
            else
              $value .= $array_1[2];
            if($h==0)
              $value .= $array_0[3];
            else
              $value .= $array_1[3];
            array_push($final_array, $value);
          }
        }
      }
    }
    return $final_array;
    break;

    case 5:
    for($k=0;$k<2;$k++) {
      for($j=0;$j<2;$j++) {
        for($i=0;$i<2;$i++) {
           for($h=0;$h<2;$h++) {
             for($g=0;$g<2;$g++) {
            $value = '';
            if($k==0)
              $value .= $array_0[0];
            else
              $value .= $array_1[0];
            if($j==0)
              $value .= $array_0[1];
            else
              $value .= $array_1[1];
            if($i==0)
              $value .= $array_0[2];
            else
              $value .= $array_1[2];
            if($h==0)
              $value .= $array_0[3];
            else
              $value .= $array_1[3];
            if($g==0)
              $value .= $array_0[4];
            else
              $value .= $array_1[4];
            array_push($final_array, $value);
             }
          }
        }
      }
    }
    return $final_array;
    break;

    case 6:
    for($k=0;$k<2;$k++) {
      for($j=0;$j<2;$j++) {
        for($i=0;$i<2;$i++) {
           for($h=0;$h<2;$h++) {
             for($g=0;$g<2;$g++) {
               for($f=0;$f<2;$f++) {
            $value = '';
            if($k==0)
              $value .= $array_0[0];
            else
              $value .= $array_1[0];
            if($j==0)
              $value .= $array_0[1];
            else
              $value .= $array_1[1];
            if($i==0)
              $value .= $array_0[2];
            else
              $value .= $array_1[2];
            if($h==0)
              $value .= $array_0[3];
            else
              $value .= $array_1[3];
            if($g==0)
              $value .= $array_0[4];
            else
              $value .= $array_1[4];
            if($f==0)
              $value .= $array_0[5];
            else
              $value .= $array_1[5];
            array_push($final_array, $value);
              }
            }
          }
        }
      }
    }
    return $final_array;
    break;

    case 7:
    for($k=0;$k<2;$k++) {
      for($j=0;$j<2;$j++) {
        for($i=0;$i<2;$i++) {
           for($h=0;$h<2;$h++) {
             for($g=0;$g<2;$g++) {
               for($f=0;$f<2;$f++) {
                 for($e=0;$e<2;$e++) {
            $value = '';
            if($k==0)
              $value .= $array_0[0];
            else
              $value .= $array_1[0];
            if($j==0)
              $value .= $array_0[1];
            else
              $value .= $array_1[1];
            if($i==0)
              $value .= $array_0[2];
            else
              $value .= $array_1[2];
            if($h==0)
              $value .= $array_0[3];
            else
              $value .= $array_1[3];
            if($g==0)
              $value .= $array_0[4];
            else
              $value .= $array_1[4];
            if($f==0)
              $value .= $array_0[5];
            else
              $value .= $array_1[5];
            if($e==0)
              $value .= $array_0[6];
            else
              $value .= $array_1[6];
            array_push($final_array, $value);
              } }
            }
          }
        }
      }
    }
    return $final_array;
    break;
    
    default:
    return 'Not found!!';

  }
}

function splitting_in_two($string) {
  $array = str_split($string);
  $array_0= array();
  $array_1= array();

  for($i=0,$j=0;$i<count($array);$i=$i+2,$j++) {
    $array_0[$j]=$array[$i];
    $array_1[$j]=$array[$i+1];

  }
$output =  display_in_final_array($array_0,$array_1);
  return $output ;
}

?>