  <link rel="stylesheet" href="assets/css/bootstrap.css">
<?php


/* if (isset($_POST['password'])) {
$string_values = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*_-+=';
$shuffled=str_shuffle($string_values);
$o='0';
$string_char=substr($shuffled,0,64);
$string_values_toarray = str_split($string_char);
$_SESSION['string_values_toarray'] =$string_values_toarray;
$string_digits=array();
for($n=15;$n>=0;$n--)
$string_digits[$n]= $n%8+1;
$string_digits[16]='0' ;
$_SESSION['string_digits'] = $string_digits;


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
echo '<br><br>';
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

}
*/


if (!isset($_POST['password'])) {
$string_values = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*_-+=';
$shuffled=str_shuffle($string_values);
$o='0';
$string_char=substr($shuffled,0,64);
$string_values_toarray = str_split($string_char);
$_SESSION['string_values_toarray'] =$string_values_toarray;
$string_digits=array();
for($n=15;$n>=0;$n--)
$string_digits[$n]= $n%8+1;
$string_digits[16]='0' ;
$_SESSION['string_digits'] = $string_digits;


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

$color_string = 'VIBGYORP';

$color_string_shuffled = str_shuffle($color_string);

$color_array = array();
$color_array = str_split($color_string_shuffled);
$_SESSION['color_array']=$color_array;
for($c=0;$c<8;$c++) {
  $color = 'images/'.$color_array[$c].'.png';
  if($c%2==0)
  echo '&nbsp';
  ?> <img src= <?php echo $color; ?> height="30" width="28"> <?php
}
echo '';
echo "<center><table>";
  for($i=0;$i<count($random_arrange);$i++) {
    $value_i=$random_arrange[$i];

    if($i==0) {
      echo "<tr><td><button class=\"btn btn-default\" style='width : 30px; height : 28px; text-align:center ' id=\"$value_i\"  value=$value_i size=\"1\" disabled>$value_i</td>";
    }
    else if($i<9){
      if($i==8) {
        echo "<td><button class=\"btn btn-default\" style='width : 30px; height : 28px; text-align:center' id=\"$value_i\"  value=$value_i size=\"1\" disabled>$value_i</td></tr>";
      }
      else {
        echo "<td><button class=\"btn btn-default\" style='width : 30px; height : 28px; text-align:center' id=\"$value_i\"  value=$value_i size=\"1\" disabled>$value_i</td>";
      }
    }
    else if(($i%9)==8){
      echo "<td><button class=\"btn btn-default\" id=\"$value_i\" style='width : 30px; height : 28px; background-color: #FFFFFF; text-align:center' onclick=\"pass_add('$value_i'),starttime3(event);\" value=$value_i >$value_i</button></td></tr>";
    }
    else if(($i%9)==0) {
      echo "<tr><td><button class=\"btn btn-default\" style='width : 30px; height : 28px; text-align:center' id=\"$value_i\"  value=$value_i size=\"1\" disabled>$value_i</td>";
    }
    else {
      echo "<td><button class=\"btn btn-default\"  id=\"$value_i\" style='width : 30px; height : 28px; background-color: #FFFFFF; text-align:center' onclick=\"pass_add('$value_i'),starttime3(event);\" value=$value_i >$value_i</button></td>";
    }
  }
  echo "</table></center><br>";

}

if (isset($_POST['username']) && isset($_POST['password'])) {
	$username = $_POST['username'];
	$password = array();
        $timetaken = $_POST['timetaken3'];
	//	if ((strlen($password) % 2) == 0) {

	$password = recover_technique3($_POST['password'], $_SESSION['string_values_toarray'],$_SESSION['color_array'] );

        for ($size = 0; $size < count($password); $size++) {
		$password_hash = md5($password[$size]);
		if (!empty($username) && !empty($password[$size])) {
			$query = "SELECT `id` FROM `users` WHERE `username`='$username' AND `password2`='$password_hash'";
			if ($query_run = mysql_query($query)) {
				$query_num_rows = mysql_num_rows($query_run);
				if ($query_num_rows == 1) {

					$user_id = mysql_result($query_run, 0, 'id');
					$_SESSION['user_id'] = $user_id;
					survey3($timetaken,$username);
					header('Location: index.php');
				}
			}


		}
		else {
			echo ('Please fill it up completely!');
		}

        }
	if ($query_num_rows == 0) {
		$here = 'Invalid username/password combination!';
		echo "<script type='text/javascript'>alert('$here'); window.location = 'index1.php';</script>";


				// echo  "<script type='text/javascript'> alert(Invalid username/password combination!);</script>";
				// header('Location: index.php');

	}

}


?>
<script>
var d = new Date();
var f = new Date();
var fi = new Date();
function starttime3(e)
{
if(document.getElementById("pass3").value.length == 1 )
d = e.timeStamp;

}
function stoptime3(e)
{
f = e.timeStamp;
var dif = f - d;

var Seconds_from_T1_to_T2 = dif / 1000;
var fi = Math.abs(Seconds_from_T1_to_T2);
document.getElementById("timetaken3").value =fi;
}
function pass_add(i)
{
document.getElementById("pass3").value=document.getElementById("pass3").value + i ;
}
</script>

<form action="<?php
echo $current_file; ?>" method="POST">

Username: <input type="text" name="username" autofocus><br />
Password: <input id="pass3" type="text"  value="" name="password" onkeypress="starttime3(event)"><br />
<input type="submit" value="Log IN" onclick="stoptime3(event)"><br /><br />
<input type="text"  name="timetaken3" id="timetaken3" hidden>
</form>
