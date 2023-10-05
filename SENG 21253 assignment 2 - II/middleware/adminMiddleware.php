<?php
include('../functions/myfunctions.php');

if(isset($_SESSION['auth']))
{
  if($_SESSION['role_as'] == 0){
    redirect("../index.php", "You are not authoraized to acces this page");
  //   $_SESSION['message'] = "You are not authoraized to acces this page";
  // header('Location: ../index.php');
  // }else if(($_SESSION['role_as'] == 1)){
  //   $_SESSION['message'] = "You are not authoraized to acces this page";
  //   header('Location: ../admin/index.php');

  // }else if(($_SESSION['role_as'] == 2)){
  //   $_SESSION['message'] = "You are not authoraized to acces this page";
  //   header('Location: ../admin2/index.php');

  // }
  }
}else{
  redirect("../login.php", "Login to continue");
  // $_SESSION['message'] = "";
  // header('Location: ');
}
?>