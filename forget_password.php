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
  <title>I4CFinancial - Forget Password</title>
	<link rel="canonical" href="http://i4cfinancial.com/forget_password.html" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style_site.css">
    <link rel="stylesheet" href="ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="assets/js/validate.js"></script>
    <script src="ui/1.12.1/jquery-ui.js"></script>
    <style type="text/css">
    .btn-filters{background-color: transparent;}
  </style>
<script>
  $( function() {
    $( "#tabs" ).tabs();  
    $("#tabs").show();
  } );
 </script>
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
  </div><!-- forget form -->
<div class="container-fluid forget-fluid">
    <div class="container forget-container">
                <div class="col-offset-md-6 col-md-6 col-sm-12 col-xs-12 forget-inner-container">
            <h3 class="title-forget">Retrieve Password</h3>
            <form name="forget-form" id="forget-form" method="POST" action="">
                <div class="form-group">
                    <label class="text-label">Email :</label>
                    <input type="email" class="form-control text-box" id="forget_email" placeholder="Email" name="forget_email" autocomplete="off">
                </div>
                <div class="forgetpassword">
                    <input type="submit" name="submit" class="btn btn-forget" value="Retrieve Password">
                    <p class="back_login">Back to <span><a href="login.html">Log In</a></span></p>
                </div>
            </form>
        </div>
    </div>
</div>
﻿<div class="footer_container">
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
</html>