<?php
  

  $host = "localhost";
  $username = "root";
  $password = "";
  $database = "abcpvtltd";

  //creating db connection
  $con = mysqli_connect($host, $username, $password, $database);

  //chech db connction
  if(!$con){
    die("Connection failed".mysqli_connect_errno());
  }

?>