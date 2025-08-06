<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-718635-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-718635-2');
</script>
  <title>I4CFinancial - Sign Up</title>
	<link rel="canonical" href="http://i4cfinancial.com/sign_up.html" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style_site.css">
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="assets/js/validate.js"></script>
    <style type="text/css">
    .btn-filters{background-color: transparent;}
  </style>
</head>
<body>
  <div class="site_header_container">
    <div class="container">
      <nav class="navbar">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
                    <a class="navbar-brand" href="index_php.html"></a>
                  </div>
        <div class="collapse navbar-collapse" id="myNavbar">
                      <ul class="nav navbar-nav navbar-right">
                              <li><a href="index.php">Home</a></li>
                <li><a href="index.php?goto=about_us" class="about_us" data-nav-option="about_us">About</a></li>
                <!-- <li><a href="grid/performance_monitor.php">GRID Monitor</a></li> -->
                <li>
                  <div>
                    <button type="button" class="btn btn-filters" data-toggle="dropdown">Solutions</button>
                    <ul class="dropdown-menu">
                                              <li><a href="grid/performance_monitor.php">GRID Monitor</a></li>
                        <li><a href="grid/grid_score.php">GRID Edge</a></li>
                                              <li><a href="portfolio_en.php">Portfolio Optimization - English</a></li>
                        <li><a href="portfolio_th.php">Portfolio Optimization - Thai</a></li>
                                          </ul>
                  </div>
                </li>
                <li><a href="index.php?goto=contact_us" class="contact_us" data-nav-option="contact_us">Contact Us</a></li>
                                  <li class="last_navitem"><a href="login.php" class="login_navitem">Log In</a> / <a href="sign_up.php" class="signup_navitem"> Sign Up</a></li>
                                          </ul>
                  </div>
      </nav>
    </div>
  </div><!-- Sign Up form -->
<style>
    .button-sign .btn-signup {
        margin-top: 0px;
    }
</style>
<div class="container-fluid sign-up-fluid">
    <div class="container sign-up-container">
                <div class="col-offset-md-6 col-md-6 col-sm-12 col-xs-12 signup-inner-container">
            <h3 class="title-sign-up">Sign Up</h3>
            <form name="sign-up-form" id="sign-up-form" method="post" action="sign_up.html" autocomplete="off">
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
                        <option value="AF">Afghanistan</option><option value="AX">Åland Islands</option><option value="AL">Albania</option><option value="DZ">Algeria</option><option value="AS">American Samoa</option><option value="AD">Andorra</option><option value="AO">Angola</option><option value="AI">Anguilla</option><option value="AQ">Antarctica</option><option value="AG">Antigua and Barbuda</option><option value="AR">Argentina</option><option value="AM">Armenia</option><option value="AW">Aruba</option><option value="AU">Australia</option><option value="AT">Austria</option><option value="AZ">Azerbaijan</option><option value="BS">Bahamas</option><option value="BH">Bahrain</option><option value="BD">Bangladesh</option><option value="BB">Barbados</option><option value="BY">Belarus</option><option value="BE">Belgium</option><option value="BZ">Belize</option><option value="BJ">Benin</option><option value="BM">Bermuda</option><option value="BT">Bhutan</option><option value="BO">Bolivia, Plurinational State of</option><option value="BQ">Bonaire, Sint Eustatius and Saba</option><option value="BA">Bosnia and Herzegovina</option><option value="BW">Botswana</option><option value="BV">Bouvet Island</option><option value="BR">Brazil</option><option value="IO">British Indian Ocean Territory</option><option value="BN">Brunei Darussalam</option><option value="BG">Bulgaria</option><option value="BF">Burkina Faso</option><option value="BI">Burundi</option><option value="KH">Cambodia</option><option value="CM">Cameroon</option><option value="CA">Canada</option><option value="CV">Cape Verde</option><option value="KY">Cayman Islands</option><option value="CF">Central African Republic</option><option value="TD">Chad</option><option value="CL">Chile</option><option value="CN">China</option><option value="CX">Christmas Island</option><option value="CC">Cocos (Keeling) Islands</option><option value="CO">Colombia</option><option value="KM">Comoros</option><option value="CG">Congo</option><option value="CD">Congo, the Democratic Republic of the</option><option value="CK">Cook Islands</option><option value="CR">Costa Rica</option><option value="CI">Côte d'Ivoire</option><option value="HR">Croatia</option><option value="CU">Cuba</option><option value="CW">Curaçao</option><option value="CY">Cyprus</option><option value="CZ">Czech Republic</option><option value="DK">Denmark</option><option value="DJ">Djibouti</option><option value="DM">Dominica</option><option value="DO">Dominican Republic</option><option value="EC">Ecuador</option><option value="EG">Egypt</option><option value="SV">El Salvador</option><option value="GQ">Equatorial Guinea</option><option value="ER">Eritrea</option><option value="EE">Estonia</option><option value="ET">Ethiopia</option><option value="FK">Falkland Islands (Malvinas)</option><option value="FO">Faroe Islands</option><option value="FJ">Fiji</option><option value="FI">Finland</option><option value="FR">France</option><option value="GF">French Guiana</option><option value="PF">French Polynesia</option><option value="TF">French Southern Territories</option><option value="GA">Gabon</option><option value="GM">Gambia</option><option value="GE">Georgia</option><option value="DE">Germany</option><option value="GH">Ghana</option><option value="GI">Gibraltar</option><option value="GR">Greece</option><option value="GL">Greenland</option><option value="GD">Grenada</option><option value="GP">Guadeloupe</option><option value="GU">Guam</option><option value="GT">Guatemala</option><option value="GG">Guernsey</option><option value="GN">Guinea</option><option value="GW">Guinea-Bissau</option><option value="GY">Guyana</option><option value="HT">Haiti</option><option value="HM">Heard Island and McDonald Islands</option><option value="VA">Holy See (Vatican City State)</option><option value="HN">Honduras</option><option value="HK">Hong Kong</option><option value="HU">Hungary</option><option value="IS">Iceland</option><option value="IN">India</option><option value="ID">Indonesia</option><option value="IR">Iran, Islamic Republic of</option><option value="IQ">Iraq</option><option value="IE">Ireland</option><option value="IM">Isle of Man</option><option value="IL">Israel</option><option value="IT">Italy</option><option value="JM">Jamaica</option><option value="JP">Japan</option><option value="JE">Jersey</option><option value="JO">Jordan</option><option value="KZ">Kazakhstan</option><option value="KE">Kenya</option><option value="KI">Kiribati</option><option value="KP">Korea, Democratic People's Republic of</option><option value="KR">Korea, Republic of</option><option value="KW">Kuwait</option><option value="KG">Kyrgyzstan</option><option value="LA">Lao People's Democratic Republic</option><option value="LV">Latvia</option><option value="LB">Lebanon</option><option value="LS">Lesotho</option><option value="LR">Liberia</option><option value="LY">Libya</option><option value="LI">Liechtenstein</option><option value="LT">Lithuania</option><option value="LU">Luxembourg</option><option value="MO">Macao</option><option value="MK">Macedonia, the former Yugoslav Republic of</option><option value="MG">Madagascar</option><option value="MW">Malawi</option><option value="MY">Malaysia</option><option value="MV">Maldives</option><option value="ML">Mali</option><option value="MT">Malta</option><option value="MH">Marshall Islands</option><option value="MQ">Martinique</option><option value="MR">Mauritania</option><option value="MU">Mauritius</option><option value="YT">Mayotte</option><option value="MX">Mexico</option><option value="FM">Micronesia, Federated States of</option><option value="MD">Moldova, Republic of</option><option value="MC">Monaco</option><option value="MN">Mongolia</option><option value="ME">Montenegro</option><option value="MS">Montserrat</option><option value="MA">Morocco</option><option value="MZ">Mozambique</option><option value="MM">Myanmar</option><option value="NA">Namibia</option><option value="NR">Nauru</option><option value="NP">Nepal</option><option value="NL">Netherlands</option><option value="NC">New Caledonia</option><option value="NZ">New Zealand</option><option value="NI">Nicaragua</option><option value="NE">Niger</option><option value="NG">Nigeria</option><option value="NU">Niue</option><option value="NF">Norfolk Island</option><option value="MP">Northern Mariana Islands</option><option value="NO">Norway</option><option value="OM">Oman</option><option value="PK">Pakistan</option><option value="PW">Palau</option><option value="PS">Palestinian Territory, Occupied</option><option value="PA">Panama</option><option value="PG">Papua New Guinea</option><option value="PY">Paraguay</option><option value="PE">Peru</option><option value="PH">Philippines</option><option value="PN">Pitcairn</option><option value="PL">Poland</option><option value="PT">Portugal</option><option value="PR">Puerto Rico</option><option value="QA">Qatar</option><option value="RE">Réunion</option><option value="RO">Romania</option><option value="RU">Russian Federation</option><option value="RW">Rwanda</option><option value="BL">Saint Barthélemy</option><option value="SH">Saint Helena, Ascension and Tristan da Cunha</option><option value="KN">Saint Kitts and Nevis</option><option value="LC">Saint Lucia</option><option value="MF">Saint Martin (French part)</option><option value="PM">Saint Pierre and Miquelon</option><option value="VC">Saint Vincent and the Grenadines</option><option value="WS">Samoa</option><option value="SM">San Marino</option><option value="ST">Sao Tome and Principe</option><option value="SA">Saudi Arabia</option><option value="SN">Senegal</option><option value="RS">Serbia</option><option value="SC">Seychelles</option><option value="SL">Sierra Leone</option><option value="SG">Singapore</option><option value="SX">Sint Maarten (Dutch part)</option><option value="SK">Slovakia</option><option value="SI">Slovenia</option><option value="SB">Solomon Islands</option><option value="SO">Somalia</option><option value="ZA">South Africa</option><option value="GS">South Georgia and the South Sandwich Islands</option><option value="SS">South Sudan</option><option value="ES">Spain</option><option value="LK">Sri Lanka</option><option value="SD">Sudan</option><option value="SR">Suriname</option><option value="SJ">Svalbard and Jan Mayen</option><option value="SZ">Swaziland</option><option value="SE">Sweden</option><option value="CH">Switzerland</option><option value="SY">Syrian Arab Republic</option><option value="TW">Taiwan, Province of China</option><option value="TJ">Tajikistan</option><option value="TZ">Tanzania, United Republic of</option><option value="TH">Thailand</option><option value="TL">Timor-Leste</option><option value="TG">Togo</option><option value="TK">Tokelau</option><option value="TO">Tonga</option><option value="TT">Trinidad and Tobago</option><option value="TN">Tunisia</option><option value="TR">Turkey</option><option value="TM">Turkmenistan</option><option value="TC">Turks and Caicos Islands</option><option value="TV">Tuvalu</option><option value="UG">Uganda</option><option value="UA">Ukraine</option><option value="AE">United Arab Emirates</option><option value="GB">United Kingdom</option><option value="US">United States</option><option value="UM">United States Minor Outlying Islands</option><option value="UY">Uruguay</option><option value="UZ">Uzbekistan</option><option value="VU">Vanuatu</option><option value="VE">Venezuela, Bolivarian Republic of</option><option value="VN">Viet Nam</option><option value="VG">Virgin Islands, British</option><option value="VI">Virgin Islands, U.S.</option><option value="WF">Wallis and Futuna</option><option value="EH">Western Sahara</option><option value="YE">Yemen</option><option value="ZM">Zambia</option><option value="ZW">Zimbabwe</option>                    </select>
                </div>
                 <div class="form-group">
                    <label class="text-label">Password :</label>
                    <input type="password" class="form-control text-box" id="password" placeholder="Password" name="password" autocomplete="off" value="">
                </div>
                <div class="form-group">
                    <label class="text-label">Confirm Password :</label>
                    <input type="password" class="form-control text-box" id="confirm_password" placeholder="Confirm Password" name="confirm_password" autocomplete="off" value="">
                </div>
                <div class="form-group">
                    <div id="capatcha">
                        <div class="g-recaptcha" data-callback="captchaCallback" data-sitekey="6LfoUUgUAAAAAMv5v6YdzwHqxHIHz0K00JQ9hxQt"></div>
                        <span class="msg-error error" style="margin-left: 15px;"></span>
                    </div>
                </div>
                <div class="button-sign">
                    <!-- <input type="submit" name="submit" class="btn btn-signup" value="Sign Up"> -->
                    <button type="submit" class="btn btn-signup"><img src="assets/images/loading.gif" class="loading_icon"> Sign Up</button>
                    <p>Already have an account? <span><a href="login.html">Log In</a></span></p>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="footer_container">
	<div class="container">
	  <p>Copyright © i4cfinancial.com 2025. All rights reserved.</p>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$('.valid_url').hide();
    $(window).scroll(function(){
		var sticky = $('.site_header_container'),
		scroll = $(window).scrollTop();
		if (scroll >= 90){
			sticky.addClass('fixed');
			$('.logo_container').addClass('fixed');
		} else {
			sticky.removeClass('fixed');
			$('.logo_container').removeClass('fixed');
		} 
    });
    $('.linkedin').on('keyup', function(){
		var linkedin = $(this).val();
		if (linkedin != "") {
			if ( /(ftp|http|https):\/\/?(?:www\.)?linkedin.com(\w+:{0,1}\w*@)?(\S+)(:([0-9])+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/.test(linkedin) ) {
				$('.valid_url').removeClass('error');
				$('.valid_url').hide();
			} else {
				$('.valid_url').addClass('error');
				$('.valid_url').show();
			}
		} else {
			$('.valid_url').removeClass('error');
			$('.valid_url').hide();
		}
	}); 
});
var container_height = null;
var activityClass = null;
var initialAboutUs = false;
var queryParams = getUrlVars();
var url = window.location.search;
var scrollTopHeight = 0;
if (url && url != '') {
	if (url.match("goto")) {
		container_height = $("#" + queryParams['goto']).offset().top;
		$('html, body').animate({scrollTop:container_height - 120}, 'slow');
	}
}
function getUrlVars() {
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++) {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}
</script>
</body>
</html><script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script type="text/javascript">
    $(document).ready(function () {
        $.getJSON("http://jsonip.com/?callback=?", function (data) {
            // console.log(data);
            $('#client_ip').val(data.ip);
        });
    });
    function captchaCallback(response) {
        if(response!="") {
            $( '.msg-error').hide();
        } else {
            $( '.msg-error').show();
            $( '.msg-error').text( "reCAPTCHA is mandatory" );
        }
    }
</script>