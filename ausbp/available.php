<?php

$mysql_db_hostname = 'localhost';
$mysql_db_user = 'root';
$mysql_db_password = '';
$mysql_db_database = 'project';

$con = mysql_connect($mysql_db_hostname, $mysql_db_user, $mysql_db_password) or die("Could not connect database");
mysql_select_db($mysql_db_database, $con) or die("Could not select database");

if(isset($_POST['username']) && !empty($_POST['username'])){
      $username=strtolower(mysql_real_escape_string($_POST['username']));
      $query="select * from `users` where `username`='$username'";
      // echo $query;
      $res=mysql_query($query);
      $count=mysql_num_rows($res);
      $HTML='';
      if($count > 0){
        $HTML='user exists';
      }else{
        $HTML='';
      }
      echo $HTML;
}
?>