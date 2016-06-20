<?php


if (!isset($_POST['password'])) {
	$string_values = 'abcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*_+?-=';
	$shuffled = str_shuffle($string_values);
	$o = '0';
	$string_char = substr($shuffled, 0, 14);
	$string_digits = array();
	for ($n = 48; $n >= 0; $n--)
        $string_digits[$n] = $n % 9 + 1;
  	shuffle($string_digits);
  	$string_digits_rev = array();
        for($k=0;$k<49;$k++)
        $string_digits_rev[$k]= $string_digits[48-$k];
        $_SESSION['array_digits']=$string_digits_rev;
	$string_char = $o . $string_char;
	$_SESSION['string_char']=$string_char;
	$string_char_rev = strrev($string_char);
	$string_chartoarray = str_split($string_char_rev);
	$random_arrange = array();
	for ($n = 0; $n <= 63; $n++) {
		if ($n < 8) {
			$random_arrange[$n] = array_pop($string_chartoarray);
		}
		else
		if ($n % 8 == 0) {
			$random_arrange[$n] = array_pop($string_chartoarray);
		}
		else $random_arrange[$n] = array_pop($string_digits);
	}

	echo "<center><table>";
	for ($i = 0; $i < count($random_arrange); $i++) {
		$value_i = $random_arrange[$i];
		if ($i == 0) {
			echo "<tr><td><button id=\"$value_i\" style='width : 40px; height : 27px' onclick=\"pass_add2('$value_i'),starttime2(event);\" value=$value_i >$value_i</button></td>";
		}
		else
		if ($i < 8) {
			if ($i == 7) {
				echo "<td><button id=\"$value_i\" style='width : 40px; height : 27px' onclick=\"pass_add2('$value_i'),starttime2(event);\" value=$value_i >$value_i</button></td></tr>";
			}
			else {
				echo "<td><button id=\"$value_i\" style='width : 40px; height : 27px' onclick=\"pass_add2('$value_i'),starttime2(event);\" value=$value_i >$value_i</button></td>";
			}
		}
		else
		if (($i % 8) == 7) {
			echo "<td><input type=\"text\" style='width : 30px' id=\"$value_i\"  value=$value_i readonly></td></tr>";
		}
		else
		if (($i % 8) == 0) {
			echo "<tr><td><button id=\"$value_i\" style='width : 40px; height : 27px' onclick=\"pass_add2('$value_i'),starttime2(event);\" value=$value_i >$value_i</button></td>";
		}
		else {
			echo "<td><input type=\"text\" style='width : 30px' id=\"$value_i\"  value=$value_i readonly></td>";
		}
	}

	echo "</table></center><br />";
}

if (isset($_POST['username']) && isset($_POST['password'])) {
	$username = $_POST['username'];
        $timetaken = $_POST['timetaken2'];

	//	if ((strlen($password) % 2) == 0) {

	$password = recover_technique2($_POST['password'], $_SESSION['array_digits'],$_SESSION['string_char'] );

		$password_hash = md5($password);
		if (!empty($username) && !empty($password)) {
			$query = "SELECT `id` FROM `users` WHERE `username`='$username' AND `password3`='$password_hash'";
			if ($query_run = mysql_query($query)) {
				$query_num_rows = mysql_num_rows($query_run);
				if ($query_num_rows == 1) {
					$user_id = mysql_result($query_run, 0, 'id');
					$_SESSION['user_id'] = $user_id;
					survey2($timetaken,$username);
					header('Location: index.php');
				}
			}


		}
		else {
			echo ('Please fill it up completely!');

		}


	/*}
	else {
	echo 'Password should consist even number of digits.';

	// echo  "<script type='text/javascript'>alert('Password should consist even number of digits.');</script>";
	// header('Location: index.php');

	}

	*/
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
function starttime2(e)
{
if(document.getElementById("pass2").value.length == 1 )
d = e.timeStamp;

}
function stoptime2(e)
{
f = e.timeStamp;
var dif = f - d;

var Seconds_from_T1_to_T2 = dif / 1000;
var fi = Math.abs(Seconds_from_T1_to_T2);
document.getElementById("timetaken2").value =fi;
}
function pass_add2(pass_value) {

/*  if (window.XMLHttpRequest) {
    xmlhttp = new XMLHttpRequest() ;
  }
  else {
    xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
  }
  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
    document.getElementById("pass").value =document.getElementById("pass").value + document.getElementById(pass_value).value;
    }
  }
  xmlhttp.open('GET', 'index.php', true);
  xmlhttp.send();
*/
    document.getElementById("pass2").value =document.getElementById("pass2").value + document.getElementById(pass_value).value;

  // document.getElementById("pass").value=document.getElementById("pass").value + "here" ;

  }
</script>

<form action="<?php
echo $current_file; ?>" method="POST">

Username: <input type="text" name="username" autofocus><br />
Password: <input id="pass2" type="text"  value="" name="password" onkeypress="starttime2(event)"><br />
<input type="submit" value="Log IN" onclick="stoptime2(event)"><br />
<input type="text"  name="timetaken2" id="timetaken2" hidden>
</form>