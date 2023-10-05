<?php
session_start();
include('../config/dbcon.php');

if (isset($_POST['register_btn'])) {
  // ... (your registration code with hashing and prepared statements)

} else if (isset($_POST['login_btn'])) {
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $password = mysqli_real_escape_string($con, $_POST['password']);

  // Hashed passwords should be compared using password_verify
  $login_query = "SELECT * FROM users WHERE email=?";
  $stmt = mysqli_prepare($con, $login_query);
  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($result)) {
    if (password_verify($password, $row['password'])) {
      $_SESSION['auth'] = true;

      $username = $row['name'];
      $useremail = $row['email'];
      $role_as = $row['role_as'];

      $_SESSION['auth_user'] = [
        'name' => $username,
        'email' => $useremail
      ];

      $_SESSION['role_as'] = $role_as;

      if($role_as == 1){
        $_SESSION['message'] = "Login Successfully";
        header('Location: ../admin/index.php');
      }else if($role_as == 2){
        $_SESSION['message'] = "Login Successfully";
        header('Location: ../admin2/index.php');
      }else{
        $_SESSION['message'] = "Login Successfully";
        header('Location: ../index.php');
      }


    } else {
      $_SESSION['message'] = "Invalid Credentials";
      header('Location: ../login.php');
    }
  } else {
    $_SESSION['message'] = "Invalid Credentials";
    header('Location: ../login.php');
  }
}
?>
