<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require_once("admin/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['signinemail']);
    $password = $_POST['password'];
    $error = "";
    $_SESSION['role'] = $user['role']; // From DB at login time

    if (empty($email) || empty($password)) {
        $error = "Please enter both email and password.";
    } else {
        $stmt = $conn->prepare("SELECT id, passMD5, status FROM membership_users WHERE email = ? LIMIT 1");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows == 1) {
            $stmt->bind_result($id, $passMD5, $status);
            $stmt->fetch();
            if ($passMD5 === md5($password)) {
                if ($status === 'active') {
                    $_SESSION['user_id'] = $id;
                    $_SESSION['user_email'] = $email;
                    header("Location: index.php");
                    exit();
                } else {
                    $error = "Account not activated. Please wait for admin approval.";
                }
            } else {
                $error = "Invalid password.";
            }
        } else {
            $error = "No account found with that email.";
        }
        $stmt->close();
    }
    if ($error) {
        echo "<div style='background:#f2dede;padding:10px;margin:10px 0;'>$error</div>";
    }
}
?>
 
  <style>
    .ft{
      margin-bottom: 60px;
    }
  </style>
  <?php include("header.php")?>
  <div class="ft container-fluid sign-in-fluid">
    <div class="container sign-in-container">
      <div class="col-offset-md-6 col-md-6 col-sm-12 col-xs-12 sign-inner-container">
        <h3 class="title-sign-in">Log In</h3>
        <form name="sign-in-form" id="sign-in-form" method="post" action="login.php">
          <input type="hidden" name="message" value="">
          <div class="form-group">
            <label class="text-label">Email Address :</label>
            <input type="email" class="form-control text-box" id="signinemail" placeholder="Email" name="signinemail" autocomplete="off">
          </div>
          <div class="form-group">
            <label class="text-label">Password :</label>
            <input type="password" class="form-control text-box" id="password" placeholder="Password" name="password" autocomplete="off">
          </div>
          <div class="signin-remember">
            <label class="col-md-6 col-sm-6 col-xs-6 checkboxlabel"><input type="checkbox" name="remember"><span class="checkmark"></span>Remember me</label>
            <p class="col-md-6 col-sm-6 col-xs-6 forget-password"><a href="forget_password.html"> Forgot Password?</a></p>
          </div>
          <div class="button-sign">
            <!-- <input type="submit" name="submit" class="btn btn-signin" value="Log In"> -->
            <button type="submit" class="btn btn-signin"><img src="assets/images/loading.gif" class="loading_icon"> Log In</button>
            <p>Don't have an account yet? <span><a href="sign_up.php">Sign Up</a></span></p>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php include("footer.php")?>
  