<?php


if(!isset($_POST['password'])) {

  $string_values = 'abcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*_+?-=';
  $shuffled=str_shuffle($string_values);
  $_SESSION['shuffled_array']=$shuffled;
  $stringtoarray= str_split($shuffled);
  echo "<center><table>";
  for($i=0;$i<count($stringtoarray);$i++) {
    $value_i=$stringtoarray[$i];

    if(($i%7)==6){
      echo "<td><button id=\"$value_i\" style='width : 30px; height : 30px' onclick=\"pass_add1('$value_i'),starttime1(event);\" value=$value_i >$value_i</button></td></tr>";
      }
    else if(($i%7)==0) {
      echo "<tr><td><button id=\"$value_i\" style='width : 30px; height : 30px' onclick=\"pass_add1('$value_i'),starttime1(event);\" value=$value_i >$value_i</button></td>";
    }
  else {
    echo "<td><button id=\"$value_i\" style='width : 30px; height : 30px' onclick=\"pass_add1('$value_i'),starttime1(event);\" value=$value_i >$value_i</button></td>";
    }

  }
  echo "</table></center><br>";

}


if (isset($_POST['username']) && isset($_POST['password'])) if (isset($_POST['username']) && isset($_POST['password'])) {
	$username = $_POST['username'];
	$password = array();
        $timetaken = $_POST['timetaken1'];


//	if ((strlen($password) % 2) == 0) {
		$password = recover_technique1($_POST['password'], $_SESSION['shuffled_array']);
	//	print_r($password);
		for ($size = 0; $size < count($password); $size++) {
			$password_hash = md5($password[$size]);
			if (!empty($username) && !empty($password[$size])) {
				$query = "SELECT `id` FROM `users` WHERE `username`='$username' AND `password1`='$password_hash'";
				if ($query_run = mysql_query($query)) {
					$query_num_rows = mysql_num_rows($query_run);
					$_SESSION['check']= $query_num_rows;
					if ($query_num_rows == 1) {
						$user_id = mysql_result($query_run, 0, 'id');
						$_SESSION['user_id'] = $user_id;
						survey1($timetaken,$username);
						header('Location: index.php');
					}
				}


			}
			else {
                               // echo ('Please fill it up completely!');
			}

		}
               if ($_SESSION['check'] == 0) {
			$here =  'Invalid username/password combination!';
			$flag = '1';
                         echo "<script type='text/javascript'>confirm('$here'); window.location = 'index1.php';</script>";



			// echo  "<script type='text/javascript'> alert(Invalid username/password combination!);</script>";
		        //header('Location: index.php');

                   }
                  /*  {
                   header("Location: ".$_SERVER['PHP_SELF']);
                   }
	/*}
	else {
		echo 'Password should consist even number of digits.';

		// echo  "<script type='text/javascript'>alert('Password should consist even number of digits.');</script>";
		// header('Location: index.php');

	}
	*/
}





?>

<script>
var d = new date();
var f = new date();
var fi = new date();
function starttime1(e)
{
if(document.getElementById("pass").value.length == 1 )
d = e.timeStamp;

}
function stoptime1(e)
{
f = e.timeStamp;
var dif = f - d;

var Seconds_from_T1_to_T2 = dif / 1000;
var fi = Math.abs(Seconds_from_T1_to_T2);
document.getElementById("timetaken1").value =fi;
alert ("It took : "+fi+" seconds to input data");
}
function pass_add1(pass_value) {

    document.getElementById("pass").value =document.getElementById("pass").value + document.getElementById(pass_value).value;
  //document.getElementById("pass").value=document.getElementById("pass").value + "here" ;
  }
</script>

<form action="<?php echo $current_file; ?>" method="POST">

Username: <input type="text" name="username" autofocus><br><br>
Password: <input id="pass" type="text"  value="" name="password" onkeypress="starttime1(event)"><br><br>
<input type="text"  name="timetaken1" id="timetaken1" hidden>
<input type="submit" value="Log IN" onclick="stoptime1(event)"><br><br>
</form>