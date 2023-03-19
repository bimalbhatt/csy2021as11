<?php
include 'userheader.php';
include 'connectiondb.php';

?>
<main>
   <center>
      <h1>USER REGISTRATION FORM</h1>
   </center>
   <form action="register.php" method="POST">
      <label>Username</label>
      <input type="text" name="thenameofuser" />
      <label>Email</label>
      <input type="email" name="theemailofuser" />
      <label>Password</label>
      <input type="password" name="thepassofuser" />
      <label>Confirm Password</label>
      <input type="password" name="confirtthepassword" />
      <input type="submit" value="Register" name="register_button" />
   </form>
   <center>
      <a href="login.php">Login</a>
   </center>
</main>
<?php

include 'connectiondb.php';
if (isset($_POST['register_button'])) {
   $dataofusername = $_POST['thenameofuser'];
   $dataofemaddofuser = $_POST['theemailofuser'];
   $passoftheuser = $_POST['thepassofuser'];
   $confirm_password = $_POST['confirtthepassword'];
   
   if (empty($dataofusername)) {
      echo "<script>alert('Enter your Username. the Usernames field is empty.')</script>";
   }
   if (empty($dataofemaddofuser)) {
      echo "<script>alert('Please enter your email. the field in the email is empty')</script>";
   }
   if (strlen($passoftheuser) < 6 && empty($passoftheuser)) {
      echo "<script>alert('Minimum length for a password is six characters OR enter your password ')</script>";
   }
   if ($passoftheuser != $confirm_password) {
      echo "<script>alert('Your password is not matching the field of confirm password please kindly check whether they are same or not')</script>";
   } else {
      include 'connectiondb.php';
      $databasevaluefetching = $pdo->prepare("SELECT * FROM users WHERE email = :email");
      $databasevaluefetching->execute(['email' => $dataofemaddofuser]);
      $user = $databasevaluefetching->fetch();
      if ($user) {
         echo 'This email is already taken. Please choose a different email.';
         exit;
      } else {
         $databasevaluefetching = $pdo->prepare("INSERT INTO users(username, email, password) VALUES (:username, :email, :password)");
         $databasevaluefetching->execute([':username' => $dataofusername,
          'email' => $dataofemaddofuser, 
          'password' => $passoftheuser]);
         echo "<main><center><h2>User is registered now you can sign in</h2></center></main>";
      }
   }
}
include 'footer.php';
?>
