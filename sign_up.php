<?php include "header.php" ?>

<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

require("admin/db.php");
require 'vendor/autoload.php';
require __DIR__ . '/vendor/autoload.php';
include 'mail_test.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);
// echo 'PHPMailer loaded successfully!';


if ($_SERVER["REQUEST_METHOD"] == 'POST') {
  // $firstname = trim($_POST["firstname"]);
  // $lastname = trim($_POST["lastname"]);
  // $email = trim($_POST['email']);
  // $linkedinProfile = trim($_POST['linkedin_address']);
  // $referedBy = trim($_POST['referred_by']);
  // $country = trim($_POST['country']);
  // $password = $_POST['password'];
  // $confirmPassword = $_POST['confirm_password'];
  $firstname = trim($_POST["firstname"]);
  $lastname = trim($_POST["lastname"]);
  $email = trim($_POST['signupemail']);
  $linkedin = trim($_POST['linkedin_address']);
  $referred_by = trim($_POST['referred_by']);
  $country = trim($_POST['country']);
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirm_password'];
  $client_ip = isset($_POST['client_ip']) ? trim($_POST['client_ip']) : '';
  $role = isset($_POST['role']) ? trim($_POST['role']) : null;


  $errors = [];

  if (empty($firstname) || empty($lastname) || empty($email) || empty($linkedin) || empty($referred_by) || empty($country) || empty($password) || empty($confirmPassword)) {
    $errors[] = "All the fields are required to be filled.";
  }
  if ($password != $confirmPassword) {
    $errors[] = "Passwords didn't match.";
  }
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email.";
  }


  $stmt = $conn->prepare("SELECT id FROM membership_users WHERE email = ?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $res = $stmt->get_result();
  if ($res->num_rows > 0) {
    $errors[] = "Email already registered.";
  }
  $stmt->close();

  if (empty($errors)) {

    $passMD5 = md5($password);
    // $passHash = password_hash($password, PASSWORD_DEFAULT);



    // $sql = "INSERT INTO membership_users (name, email, passMD5, custom1, custom2, custom3, custom4, comments, isApproved, status, signupDate, created_at)
    //             VALUES (?, ?, ?, ?, ?, ?, ?, ?, 0, 'pending', CURDATE(), NOW())";
    // $stmt = $conn->prepare($sql);
    // $fullname = $firstname . ' ' . $lastname;
    // $stmt->bind_param("ssssssss", $fullname, $email, $passMD5, $linkedin, $referred_by, $country, $client_ip, $client_ip);
    $memberID = uniqid();
    $country = isset($_POST['country']) ? trim($_POST['country']) : '';
    $fullname =  $firstname . " " . $lastname;


    $sql = "INSERT INTO membership_users (memberID, name, email, passMD5, custom1, custom2, custom3, custom4, comments, isApproved, status, signupDate, created_at,country_code)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 0, 'pending', CURDATE(), NOW(),?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssss", $memberID, $fullname, $email, $passMD5, $linkedin, $referred_by, $country, $client_ip, $client_ip, $country);

    //mailing
    if ($stmt->execute()) {
      // Send email to admin - dgarrard4@gmail.com

      $stmt = $conn->prepare("SELECT * FROM membership_users WHERE email = ?");
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $res = $stmt->get_result();

      $row = $res->fetch_assoc();
      $id = $row['id'];


 


if (sendRegistrationEmail($id)) {
    // echo "Registration email sent successfully!";
} else {
    echo "Error sending registration email.";
}




      // mail("keshab.15.2003@gmail.com", "New Account Signup", "A new user has signed up: $fullname ($email)\nGo to admin page to activate.");
//       try {

//         $mail->isSMTP();
//         $mail->Host       = 'smtp.gmail.com';
//         $mail->SMTPAuth   = true;
//         $mail->Username   = 'Charanjeet.Parallelteam@gmail.com';
//         $mail->Password   = 'mqwdacahfnaixold';
//         $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
//         $mail->Port       = 587;

//         // Recipients mail = dgarrard4@gmail.com
//         $mail->setFrom('Charanjeet.Parallelteam@gmail.com', 'Developer');
//         $mail->addAddress('keshab.15.2003@gmail.com', 'Keshab');

//         // Content
//         $mail->isHTML(true);
//         $mail->Subject = 'A new user Registered!';
//         //     $mail->Body    = '<b>A new user just registered kinldy navigate to admin page and set the status to active!
//         //     url :"http://localhost/final/userUpdate.php?id=$id"
//         // </b>';
//         $mail->Body = "<b>A new user just registered. Kindly navigate to the admin page and set the status to active!<br>
// URL: <a href='http://localhost/final/userUpdate.php?id=$id'>Click here to update user</a></b>";


//         $mail->send();
//         // echo 'Message has been sent!';
//       } catch (Exception $e) {
//         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
//       }
      
      echo "<div class='msg'>Please wait… you will be sent an account confirmation email within 24 hours.</div>";
    } else {
      echo "<div class='msg'>Error: Could not create account.</div>";
    }
    $stmt->close();

    // $sql1 = "select id from membership_users where email = $email";
    // $smt = $conn->prepare($sql1);


    // $stmt = $conn->prepare("SELECT * FROM membership_users WHERE email = ?");
    // $stmt->bind_param("s", $email);
    // $stmt->execute();
    // $res = $stmt->get_result();

    // $row = $res->fetch_assoc();
    // $id = $row['id'];
    // if ($res->num_rows > 0) {
    //   header('Location: userUpdate.php?id=' . $id);
    //   exit;
    // }
  } else {
    foreach ($errors as $error) {
      echo "<div style='background:#f2dede;' class='msg'>$error</div>";
    }
  }
}
?>

<style>
  .button-sign .btn-signup {
    margin-top: 0px;
  }
  


  .msg{
  background: #dff0d8;
  padding: 20px;
  width: 100%;
  max-width: 500px;
  margin: 30px auto;  
  text-align: center;  
  border-radius: 8px;  
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);  
  }
</style>
<div class="container-fluid sign-up-fluid">
  <div class="container sign-up-container">
    <div class="col-offset-md-6 col-md-6 col-sm-12 col-xs-12 signup-inner-container">
      <h3 class="title-sign-up">Sign Up</h3>
      <form name="sign-up-form" id="sign-up-form" method="post" action="sign_up.php" autocomplete="off">
        <!-- <form name="sign-up-form" id="sign-up-form" method="post" action="login.php"></form> -->
        <input type="hidden" name="client_ip" id="client_ip" value="">
        <div class="form-group">
          <label class="text-label">First Name :</label>
          <input type="text" class="form-control text-box" id="firstname" placeholder="First Name" name="firstname" autocomplete="off" value="">
        </div>
        <div class="form-group">
          <label class="text-label">Last Name :</label>
          <input type="text" class="form-control text-box" id="lastname" placeholder="Last Name" name="lastname" autocomplete="off" value="">
        </div>
        <div class="form-group">
          <label class="text-label">Email :</label>
          <input type="email" class="form-control text-box" id="signupemail" placeholder="Email" name="signupemail" autocomplete="off" value="">
        </div>
        <div class="form-group">
          <label class="text-label">Linkedin Profile URL :</label>
          <input type="text" class="form-control text-box linkedin" id="linkedin_address" placeholder="Linkedin Profile URL" name="linkedin_address" autocomplete="off" value="">
          <!-- <p class="valid_url error">Please enter valid url</p> -->
        </div>
        <div class="form-group">
          <label class="text-label">Referred By :</label>
          <input type="text" class="form-control text-box" id="referred_by" placeholder="Referred By" name="referred_by" autocomplete="off" value="">
        </div>
        <div class="form-group select_country">
          <label class="text-label">Country :</label>
          <!-- <input type="text" class="form-control text-box" id="country" placeholder="Country" name="country"> -->
          <select class="form-control text-box" id="country" name="country">
            <option value="">Select</option>
            <option value="AF">Afghanistan</option>
            <option value="AX">Åland Islands</option>
            <option value="AL">Albania</option>
            <option value="DZ">Algeria</option>
            <option value="AS">American Samoa</option>
            <option value="AD">Andorra</option>
            <option value="AO">Angola</option>
            <option value="AI">Anguilla</option>
            <option value="AQ">Antarctica</option>
            <option value="AG">Antigua and Barbuda</option>
            <option value="AR">Argentina</option>
            <option value="AM">Armenia</option>
            <option value="AW">Aruba</option>
            <option value="AU">Australia</option>
            <option value="AT">Austria</option>
            <option value="AZ">Azerbaijan</option>
            <option value="BS">Bahamas</option>
            <option value="BH">Bahrain</option>
            <option value="BD">Bangladesh</option>
            <option value="BB">Barbados</option>
            <option value="BY">Belarus</option>
            <option value="BE">Belgium</option>
            <option value="BZ">Belize</option>
            <option value="BJ">Benin</option>
            <option value="BM">Bermuda</option>
            <option value="BT">Bhutan</option>
            <option value="BO">Bolivia, Plurinational State of</option>
            <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
            <option value="BA">Bosnia and Herzegovina</option>
            <option value="BW">Botswana</option>
            <option value="BV">Bouvet Island</option>
            <option value="BR">Brazil</option>
            <option value="IO">British Indian Ocean Territory</option>
            <option value="BN">Brunei Darussalam</option>
            <option value="BG">Bulgaria</option>
            <option value="BF">Burkina Faso</option>
            <option value="BI">Burundi</option>
            <option value="KH">Cambodia</option>
            <option value="CM">Cameroon</option>
            <option value="CA">Canada</option>
            <option value="CV">Cape Verde</option>
            <option value="KY">Cayman Islands</option>
            <option value="CF">Central African Republic</option>
            <option value="TD">Chad</option>
            <option value="CL">Chile</option>
            <option value="CN">China</option>
            <option value="CX">Christmas Island</option>
            <option value="CC">Cocos (Keeling) Islands</option>
            <option value="CO">Colombia</option>
            <option value="KM">Comoros</option>
            <option value="CG">Congo</option>
            <option value="CD">Congo, the Democratic Republic of the</option>
            <option value="CK">Cook Islands</option>
            <option value="CR">Costa Rica</option>
            <option value="CI">Côte d'Ivoire</option>
            <option value="HR">Croatia</option>
            <option value="CU">Cuba</option>
            <option value="CW">Curaçao</option>
            <option value="CY">Cyprus</option>
            <option value="CZ">Czech Republic</option>
            <option value="DK">Denmark</option>
            <option value="DJ">Djibouti</option>
            <option value="DM">Dominica</option>
            <option value="DO">Dominican Republic</option>
            <option value="EC">Ecuador</option>
            <option value="EG">Egypt</option>
            <option value="SV">El Salvador</option>
            <option value="GQ">Equatorial Guinea</option>
            <option value="ER">Eritrea</option>
            <option value="EE">Estonia</option>
            <option value="ET">Ethiopia</option>
            <option value="FK">Falkland Islands (Malvinas)</option>
            <option value="FO">Faroe Islands</option>
            <option value="FJ">Fiji</option>
            <option value="FI">Finland</option>
            <option value="FR">France</option>
            <option value="GF">French Guiana</option>
            <option value="PF">French Polynesia</option>
            <option value="TF">French Southern Territories</option>
            <option value="GA">Gabon</option>
            <option value="GM">Gambia</option>
            <option value="GE">Georgia</option>
            <option value="DE">Germany</option>
            <option value="GH">Ghana</option>
            <option value="GI">Gibraltar</option>
            <option value="GR">Greece</option>
            <option value="GL">Greenland</option>
            <option value="GD">Grenada</option>
            <option value="GP">Guadeloupe</option>
            <option value="GU">Guam</option>
            <option value="GT">Guatemala</option>
            <option value="GG">Guernsey</option>
            <option value="GN">Guinea</option>
            <option value="GW">Guinea-Bissau</option>
            <option value="GY">Guyana</option>
            <option value="HT">Haiti</option>
            <option value="HM">Heard Island and McDonald Islands</option>
            <option value="VA">Holy See (Vatican City State)</option>
            <option value="HN">Honduras</option>
            <option value="HK">Hong Kong</option>
            <option value="HU">Hungary</option>
            <option value="IS">Iceland</option>
            <option value="IN">India</option>
            <option value="ID">Indonesia</option>
            <option value="IR">Iran, Islamic Republic of</option>
            <option value="IQ">Iraq</option>
            <option value="IE">Ireland</option>
            <option value="IM">Isle of Man</option>
            <option value="IL">Israel</option>
            <option value="IT">Italy</option>
            <option value="JM">Jamaica</option>
            <option value="JP">Japan</option>
            <option value="JE">Jersey</option>
            <option value="JO">Jordan</option>
            <option value="KZ">Kazakhstan</option>
            <option value="KE">Kenya</option>
            <option value="KI">Kiribati</option>
            <option value="KP">Korea, Democratic People's Republic of</option>
            <option value="KR">Korea, Republic of</option>
            <option value="KW">Kuwait</option>
            <option value="KG">Kyrgyzstan</option>
            <option value="LA">Lao People's Democratic Republic</option>
            <option value="LV">Latvia</option>
            <option value="LB">Lebanon</option>
            <option value="LS">Lesotho</option>
            <option value="LR">Liberia</option>
            <option value="LY">Libya</option>
            <option value="LI">Liechtenstein</option>
            <option value="LT">Lithuania</option>
            <option value="LU">Luxembourg</option>
            <option value="MO">Macao</option>
            <option value="MK">Macedonia, the former Yugoslav Republic of</option>
            <option value="MG">Madagascar</option>
            <option value="MW">Malawi</option>
            <option value="MY">Malaysia</option>
            <option value="MV">Maldives</option>
            <option value="ML">Mali</option>
            <option value="MT">Malta</option>
            <option value="MH">Marshall Islands</option>
            <option value="MQ">Martinique</option>
            <option value="MR">Mauritania</option>
            <option value="MU">Mauritius</option>
            <option value="YT">Mayotte</option>
            <option value="MX">Mexico</option>
            <option value="FM">Micronesia, Federated States of</option>
            <option value="MD">Moldova, Republic of</option>
            <option value="MC">Monaco</option>
            <option value="MN">Mongolia</option>
            <option value="ME">Montenegro</option>
            <option value="MS">Montserrat</option>
            <option value="MA">Morocco</option>
            <option value="MZ">Mozambique</option>
            <option value="MM">Myanmar</option>
            <option value="NA">Namibia</option>
            <option value="NR">Nauru</option>
            <option value="NP">Nepal</option>
            <option value="NL">Netherlands</option>
            <option value="NC">New Caledonia</option>
            <option value="NZ">New Zealand</option>
            <option value="NI">Nicaragua</option>
            <option value="NE">Niger</option>
            <option value="NG">Nigeria</option>
            <option value="NU">Niue</option>
            <option value="NF">Norfolk Island</option>
            <option value="MP">Northern Mariana Islands</option>
            <option value="NO">Norway</option>
            <option value="OM">Oman</option>
            <option value="PK">Pakistan</option>
            <option value="PW">Palau</option>
            <option value="PS">Palestinian Territory, Occupied</option>
            <option value="PA">Panama</option>
            <option value="PG">Papua New Guinea</option>
            <option value="PY">Paraguay</option>
            <option value="PE">Peru</option>
            <option value="PH">Philippines</option>
            <option value="PN">Pitcairn</option>
            <option value="PL">Poland</option>
            <option value="PT">Portugal</option>
            <option value="PR">Puerto Rico</option>
            <option value="QA">Qatar</option>
            <option value="RE">Réunion</option>
            <option value="RO">Romania</option>
            <option value="RU">Russian Federation</option>
            <option value="RW">Rwanda</option>
            <option value="BL">Saint Barthélemy</option>
            <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
            <option value="KN">Saint Kitts and Nevis</option>
            <option value="LC">Saint Lucia</option>
            <option value="MF">Saint Martin (French part)</option>
            <option value="PM">Saint Pierre and Miquelon</option>
            <option value="VC">Saint Vincent and the Grenadines</option>
            <option value="WS">Samoa</option>
            <option value="SM">San Marino</option>
            <option value="ST">Sao Tome and Principe</option>
            <option value="SA">Saudi Arabia</option>
            <option value="SN">Senegal</option>
            <option value="RS">Serbia</option>
            <option value="SC">Seychelles</option>
            <option value="SL">Sierra Leone</option>
            <option value="SG">Singapore</option>
            <option value="SX">Sint Maarten (Dutch part)</option>
            <option value="SK">Slovakia</option>
            <option value="SI">Slovenia</option>
            <option value="SB">Solomon Islands</option>
            <option value="SO">Somalia</option>
            <option value="ZA">South Africa</option>
            <option value="GS">South Georgia and the South Sandwich Islands</option>
            <option value="SS">South Sudan</option>
            <option value="ES">Spain</option>
            <option value="LK">Sri Lanka</option>
            <option value="SD">Sudan</option>
            <option value="SR">Suriname</option>
            <option value="SJ">Svalbard and Jan Mayen</option>
            <option value="SZ">Swaziland</option>
            <option value="SE">Sweden</option>
            <option value="CH">Switzerland</option>
            <option value="SY">Syrian Arab Republic</option>
            <option value="TW">Taiwan, Province of China</option>
            <option value="TJ">Tajikistan</option>
            <option value="TZ">Tanzania, United Republic of</option>
            <option value="TH">Thailand</option>
            <option value="TL">Timor-Leste</option>
            <option value="TG">Togo</option>
            <option value="TK">Tokelau</option>
            <option value="TO">Tonga</option>
            <option value="TT">Trinidad and Tobago</option>
            <option value="TN">Tunisia</option>
            <option value="TR">Turkey</option>
            <option value="TM">Turkmenistan</option>
            <option value="TC">Turks and Caicos Islands</option>
            <option value="TV">Tuvalu</option>
            <option value="UG">Uganda</option>
            <option value="UA">Ukraine</option>
            <option value="AE">United Arab Emirates</option>
            <option value="GB">United Kingdom</option>
            <option value="US">United States</option>
            <option value="UM">United States Minor Outlying Islands</option>
            <option value="UY">Uruguay</option>
            <option value="UZ">Uzbekistan</option>
            <option value="VU">Vanuatu</option>
            <option value="VE">Venezuela, Bolivarian Republic of</option>
            <option value="VN">Viet Nam</option>
            <option value="VG">Virgin Islands, British</option>
            <option value="VI">Virgin Islands, U.S.</option>
            <option value="WF">Wallis and Futuna</option>
            <option value="EH">Western Sahara</option>
            <option value="YE">Yemen</option>
            <option value="ZM">Zambia</option>
            <option value="ZW">Zimbabwe</option>
          </select>
        </div>
        <div class="form-group">
          <label class="text-label">Password :</label>
          <input type="password" class="form-control text-box" id="password" placeholder="Password" name="password" autocomplete="off" value="">
        </div>
        <div class="form-group">
          <label class="text-label">Confirm Password :</label>
          <input type="password" class="form-control text-box" id="confirm_password" placeholder="Confirm Password" name="confirm_password" autocomplete="off" value="">
        </div>
        <!-- <div class="form-group">
            <div id="capatcha">
              <div class="g-recaptcha" data-callback="captchaCallback" data-sitekey="6LfoUUgUAAAAAMv5v6YdzwHqxHIHz0K00JQ9hxQt"></div>
              <span class="msg-error error" style="margin-left: 15px;"></span>
            </div>
          </div> -->
        <div class="button-sign">
          <!-- <input type="submit" name="submit" class="btn btn-signup" value="Sign Up"> -->
          <button type="submit" class="btn btn-signup"><img src="assets/images/loading.gif" class="loading_icon"> Sign Up</button>
          <p>Already have an account? <span><a href="login.php">Log In</a></span></p>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include "footer.php" ?>
 