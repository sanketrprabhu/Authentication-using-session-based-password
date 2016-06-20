<?php

require 'core.inc.php';
require 'connect.inc.php';
//include 'upload_file.php';
if(!loggedin()) {


if(
isset($_POST['user_name'])&&
isset($_POST['password'])&&
isset($_POST['password_again'])&&
isset($_POST['firstname'])&&
isset($_POST['lastname'])&&
isset($_POST['dob'])&&
isset($_POST['password_color'])&&
isset($_POST['password3'])&&
isset($_POST['emailid'])) {

$error='';
$user_name = $_POST['user_name'];
$password =  $_POST['password'];
$password_again = $_POST['password_again'];
$firstname  = $_POST['firstname'];
$lastname= $_POST['lastname'];
$emailid = $_POST['emailid'];
$dob = $_POST['dob'];
$password_color = $_POST['password_color'];
$password3 = $_POST['password3'];


if(
!empty($user_name) &&
!empty($password) &&
!empty($password_again) &&
!empty($firstname) &&
!empty($lastname) &&
!empty($password_color) &&
!empty($password3) &&
!empty($emailid) &&
!empty($dob)
){
  if(isset($_POST['submit'])){

  $allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 20000000000000000000000000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
   // echo "Upload: " . $_FILES["file"]["name"] . "<br>";
   // echo "Type: " . $_FILES["file"]["type"] . "<br>";
   // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
   // echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);
     // echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
         $src = "upload/" . $_FILES["file"]["name"];
         $_SESSION['src']=$src;
      }
    }
  }
else
  {
  echo "Invalid file";
  }
  }
    if(isset($_POST['submit'])){

  $allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file1"]["name"]);
$extension = end($temp);
if ((($_FILES["file1"]["type"] == "image/gif")
|| ($_FILES["file1"]["type"] == "image/jpeg")
|| ($_FILES["file1"]["type"] == "image/jpg")
|| ($_FILES["file1"]["type"] == "image/pjpeg")
|| ($_FILES["file1"]["type"] == "image/x-png")
|| ($_FILES["file1"]["type"] == "image/png"))
&& ($_FILES["file1"]["size"] < 20000000000000000000000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file1"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file1"]["error"] . "<br>";
    }
  else
    {
   // echo "Upload: " . $_FILES["file"]["name"] . "<br>";
   // echo "Type: " . $_FILES["file"]["type"] . "<br>";
   // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
   // echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    if (file_exists("upload1/" . $_FILES["file1"]["name"]))
      {
      echo $_FILES["file1"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file1"]["tmp_name"],
      "upload1/" . $_FILES["file1"]["name"]);
     // echo "Stored in: " . "upload1/" . $_FILES["file1"]["name"];
         $src1 = "upload1/" . $_FILES["file1"]["name"];
         $_SESSION['src1']=$src1;
      }
    }
  }
else
  {
  echo "Invalid file";
  }
  }
  if(!empty($_POST["dob"])) {
  $dob_date = date_create_from_format('m/j/Y', $dob);
  $dob_final = date_format($dob_date, 'Y-m-d');
  }
  if($password!=$password_again){
    $error = '1';
    //echo  "<script type='text/javascript'> alert(Passwords do not match!!);</script>
  }
  $query = "SELECT `username` FROM `users` WHERE `username`='$user_name'" ;
			if ($query_run = mysql_query($query)) {
				$query_num_rows = mysql_num_rows($query_run);
				if ($query_num_rows == 1) {
                                        $error='1';

			}
		}
   if($error=='1') {
   //$guide = 'Please correct the errors on page!';
   echo  "<script type='text/javascript'> alert('Please correct the errors on page!');</script>";
   }
   if($error!='1'){
     $cp=$_SESSION['src'];
     $dp=$_SESSION['src1'];
     $password_md5 = md5($password);
     $password_color_md5 = md5($password_color);
     $password3_md5 = md5($password3);
   $query1 = "INSERT INTO `users` VALUES ('','$user_name','$password_md5','$firstname','$lastname','$emailid','$dob_final','$cp','$dp')";
   //,'$password_color_md5','$password3_md5'
     if ($query_run1 = mysql_query($query1)) {
        echo  "<script type='text/javascript'> alert('Welcome User..:)');</script>";
        header('Location:index1.php');
	}
     else {
       echo 'Sorry we couldn\'t register you at this moment. Try again later.';
     }
		}

   }

else {

  //echo 'All fields are required.';
  echo  "<script type='text/javascript'> alert('All fields are required.');</script>";
}

}

?>
  <link rel="stylesheet" href="jquery-ui.css">
  <script src="jquery-1.9.1.js"></script>
  <script src="jquery-ui.js"></script>

    <script>
  $(function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
	  defaultDate: "-21Y"
    });
  });
  </script>
  <style>
  body
    {
        background:url(image/backg.jpg.jpg) no-repeat center center fixed;
        background-size: cover;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        margin: 0;
        padding: 0;
    }

        .warn{
          color: white;

        }
        .accept{
          color: white;

        }
        .hidden{
         display: none;
        }
        </style>
<link rel="stylesheet" href="pure-min.css"> <br>
<body background="image/backg.jpg.jpg" ></body>
<form class="pure-form pure-form-aligned text-white pure-u-2-3" action="register.php" method="POST" enctype="multipart/form-data">
    <fieldset>
        <div class="pure-control-group">
            <label for="name">First name</label>
           <input type="text" id="fname" name="firstname" placeholder="First name"> <br>
        </div>

        <div class="pure-control-group">
            <label for="name">Last name</label>
            <input type="text" id="lname" name="lastname" placeholder="Last name"> <br>
        </div>

        <div class="pure-control-group">
             <label for="name">Username</label>
             <input type="text" autocomplete="off" name="user_name" id="user_id" placeholder="User name" class="user_name" >
             <span class="check"  ></span> <br>
        </div>

        <div class="pure-control-group">  <br>
             <label for="password">Password for<br> 1st Technique</label>
             <input type="text" id="pass" name="password" placeholder="Atmost 8 digit Password"><br>
        </div>

        <div class="pure-control-group">
            <label for="password">Re-Type Password</label>
            <input type="text" id="pass_again" name="password_again" placeholder="Type again here..">
            <span id="verifywarn" class="warn hidden" > <img src="image/error.png" />Password do not match!!</span>
            <span id="verifyaccept" class="accept hidden" ><img src="image/accept.png" /> Password matched</span>
        </div>

            <style >

         .button-disabled{
           disabled:true;
         }
         .text-white{
           color: white;
         }
         .button-text-white {
            width: 55px;
            color: white;
            border-radius: 4px;
            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
        }
        .button-green {
            background: rgb(34, 177, 76); /* this is a green */
        }
        .button-red {
            background: rgb(255, 0, 0); /* this is a red */
        }
        .button-orange {
            background: rgb(255, 127, 59); /* this is an orange */
        }
        .button-blue {
            background: rgb(66, 184, 221); /* this is a light blue */
        }
        .button-violet {
            background: rgb(64,0,128); /* this is a light violet */
        }
        .button-indigo {
            background: rgb(63,72,204); /* this is a light indigo */
        }
        .button-pink {
            background: rgb(255,128,192); /* this is a light pink */
        }
        .button-yellow {
            background: rgb(255, 218, 0); /* this is a light yellow */
            width: 75px;

        }

    </style>


</div>
        <div >  <br>
        <ul class="pure-paginator">

    <li><a class="pure-button button-violet button-text-white" onclick=pass_add("V") id="V" >Violet</a></li>
    <li><a class="pure-button button-indigo button-text-white" onclick=pass_add("I") id="I" >Indigo</a></li>
    <li><a class="pure-button button-blue button-text-white" onclick=pass_add("B") id="B" >Blue</a></li>
    <li><a class="pure-button button-green button-text-white" onclick=pass_add("G") id="G" >Green</a></li>
    <li><a class="pure-button button-yellow button-text-white" onclick=pass_add("Y") id="Y" >Yellow</a></li>
    <li><a class="pure-button button-orange button-text-white" onclick=pass_add("O") id="O" >Orange</a></li>
    <li><a class="pure-button button-red button-text-white" onclick=pass_add("R") id="R" >Red</a></li>
    <li><a class="pure-button button-pink button-text-white" onclick=pass_add("P") id="P" >Pink</a></li>


</ul><br>
</div>      <div class="pure-control-group">
            <label for="password">Click suitable priority of colors <br>for 2nd technique</label>
            <input type="Text" maxlength="8"   id="pass_color" name="password_color" placeholder="Click buttons to add " readonly>
            <span id="verifywarn3" class="warn hidden" > <img src="image/error.png" />Password do not match!!</span>
            <span id="verifyaccept3" class="accept hidden" ><img src="image/accept.png" /> Password matched</span>
        </div>
        <div class="pure-control-group"> <br>
            <label for="password3">Number Password for<br> 3rd Technique</label>
            <input type="text" id="pass3"  name="password3" onchange="handleChange(this);" placeholder="Enter any digit from 1-50">
            <span id="verifywarn2" class="warn hidden" > <img src="image/error.png" />Password out of bounds!!</span>
            <span id="verifyaccept2" class="accept hidden" ><img src="image/accept.png" /> Password accepted</span>

        </div>

        <div class="pure-control-group">
            <label for="email">Email Address</label>
            <input id="emailid" type="email" name="emailid" class="button-disabled" placeholder="Enter Email Address"><br>
        </div>

        <div class="pure-control-group">
            <label for="dob"> Date of Birth</label>
            <input  type="text" id="datepicker" name="dob"><br>

        </div>
         <div class="pure-control-group text-white">
        <label for="file">Upload your Cover photo</label>
        <input type="file" name="file" id="file"><br>
       </div>
               </div>
         <div class="pure-control-group text-white">
        <label for="file">Upload your Profile pic</label>
        <input type="file" name="file1" id="file1"><br>
       </div>
        <div class="pure-controls">

            <button type="submit" id="register" name="submit" class="pure-button pure-button-primary">Register</button>
        </div>



    </fieldset>

</form>



<script>
  function handleChange(input) {
    if (input.value < 0) input.value = 0;
    if (input.value > 50) input.value = 50;
  }
/*    function disablebutton(id) {
        document.getElementById(id).disabled = true;
    }
    function myfunction(id) {
      pass_add(id); disablebutton(id);
    }
    */
    function pass_add(i)
    {
      var str=document.getElementById("pass_color").value;

      var n=str.indexOf(i)+1;


      if(document.getElementById("pass_color").value.length < 8 && n ==0)
      document.getElementById("pass_color").value=document.getElementById("pass_color").value + i ;
    }

</script>
<!-- js placed at bottom to make page load faster -->

</script>
<script type="text/javascript">




        $(document).ready(function() {

          $('#pass_again').keyup(function() {
              if($(this).val() == $('#pass').val()) {
                $('#verifywarn').addClass('hidden');
                $('#verifyaccept').removeClass('hidden');
              }
              else{
                $('#verifywarn').removeClass('hidden');
                $('#verifyaccept').addClass('hidden');
              }
            });
          });

        </script>

<script type="text/javascript">
$(function()
{
  $('#V').click(function() {
     $('#V').addClass('pure-button-disabled');
      });
});

$(function()
{
  $('#I').click(function() {
     $('#I').addClass('pure-button-disabled');
      });
});
$(function()
{
  $('#B').click(function() {
     $('#B').addClass('pure-button-disabled');
      });
});
$(function()
{
  $('#G').click(function() {
     $('#G').addClass('pure-button-disabled');
      });
});
$(function()
{
  $('#Y').click(function() {
     $('#Y').addClass('pure-button-disabled');
      });
});
$(function()
{
  $('#O').click(function() {
     $('#O').addClass('pure-button-disabled');
      });
});
$(function()
{
  $('#R').click(function() {
     $('#R').addClass('pure-button-disabled');
      });
});
$(function()
{
  $('#P').click(function() {
     $('#P').addClass('pure-button-disabled');
      });
});
$(function()
{
  $('#pass3').keyup(function() {
  if($(this).val() > 0 && $(this).val() < 51 ) {
                $('#verifywarn2').addClass('hidden');
                $('#verifyaccept2').removeClass('hidden');
  }
  else{
                $('#verifywarn2').removeClass('hidden');
                $('#verifyaccept2').addClass('hidden');
  }
  });
});
$(function()
{
  $('.user_name').keyup(function()
  {
  var checkname=$(this).val();
 var availname=remove_whitespaces(checkname);
  if(availname!=''){
  $('.check').show();
  $('.check').fadeIn(400).html('<img src="image/ajax-loading.gif" /> ');

  var String = 'username='+ availname;

  $.ajax({
          type: "POST",
          url: "available.php",
          data: String,
          cache: false,
          success: function(result){
               var result=remove_whitespaces(result);
               if(result==''){
                       $('.check').html('<img src="image/accept.png" /> This Username Is Avaliable');
                       $(".check").removeClass("red");
                       $('.check').addClass("green");
                       $(".user_name").removeClass("yellow");
                       $(".user_name").addClass("white");
               }else{
                       $('.check').html('<img src="image/error.png" /> This Username Is Already Taken');
                       $(".check").removeClass("green");
                       $('.check').addClass("red")
                       $(".user_name").removeClass("white");
                       $(".user_name").addClass("yellow");
               }
          }
      });
   }else{
       $('.check').html('');

   }
  });
});

function remove_whitespaces(str){
     var str=str.replace(/^\s+|\s+$/,'');
     return str;
}
</script>






<?php
}
else if (loggedin())
  echo 'you\'re already registered and logged in.';



?>
<script>

</script>
