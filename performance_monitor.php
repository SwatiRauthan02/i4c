<?php require_once '/var/www/html/final/middleware/authMiddleware.php'; ?>

<?php include 'header.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>I4CFinancial Performance Monitor</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="assets/images/i4cfinancial_Logo_only.ico">
  <link rel="stylesheet" type="text/css" href="../GRID_HTML/css/bootstrap.min.css?a=1">
  <link rel="stylesheet" type="text/css" href="assets/css/style_site.css">
  <link rel="stylesheet" type="text/css" href="../GRID_HTML/css/performance_style.css?a=5">
  <link rel="stylesheet" type="text/css" href="assets/css/style_site.css">

<!--    
  <link rel="icon" type="image/x-icon" href="assets/images/i4cfinancial_Logo_only.ico">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style_site.css">
  <link rel="stylesheet" href="ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->


  <script type="text/javascript" src="../GRID_HTML/js/jquery.min.js"></script>
  <script type="text/javascript" src="../GRID_HTML/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $( ".slider_scroll ul li a" ).click(function() {
        var val = $(this).attr('href');
        $('#current_ticker').val(val);
      });
    });
    setInterval(function(){
      // reload current iframe
      var tab = $('#current_ticker').val();
      var iframe_elem = $(tab).find('iframe');
      if (iframe_elem != "") {
        console.log(iframe_elem);
        $(iframe_elem).attr('src',$(iframe_elem).attr('src'));
      }
    }, 1000 * 60 * 15);
  </script>
<style>
table{font-family: 'PoppinsRegular';}
</style>
</head>
<body>
  <input type="hidden" name="current_ticker" class="current_ticker" id="current_ticker" value="#AUS">
  

    <!-- <div class="site_header_container fixed">
    <div class="container">
      <nav class="navbar">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
                    <a class="navbar-brand" href="index.php">
					<img src="GRID_HTML/images/i4cfinancial_logo.svg">
					</a>
                  </div>
        <div class="collapse navbar-collapse" id="myNavbar">
                     <ul class="nav navbar-nav navbar-right">
                              <li><a href="index.php">Home</a></li>
                <li><a href="index.php?goto=about_us" class="about_us" data-nav-option="about_us">About</a></li>
                 
                <li>
                  <div class="">
                    <button type="button" class="btn btn-filters" data-toggle="dropdown" aria-expanded="false">Solutions</button>
                    <ul class="dropdown-menu">
                                              <li><a href="performance_monitor.php">GRID Monitor</a></li>
                       <li><a href="grid_score.php">GRID Edge</a></li>
                                              <li><a href="portfolio_en.php">Portfolio Optimization - English</a></li>
                        <li><a href="portfolio_th.php">Portfolio Optimization - Thai</a></li>
                                          </ul>
                  </div>
                </li>
                <li><a href="index.php?goto=contact_us" class="contact_us" data-nav-option="contact_us">Contact Us</a></li>
                                  
                                          </ul>
                  </div>
      </nav>
    </div>
  </div> -->
  <div class="container-fluid logo_container">
    <!--<div class="container text-right logo">
      <a href="#"><img src="../GRID_HTML/images/i4cfinancial_Logo.svg"></a>
    </div>-->

    <div class="container cryptocurrencies_container">
      <div class="slider_scroll">
        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#AUS"><img src="../GRID_HTML/images/aus.png" /><span class="country_text">AUS</span></a></li>
          <li><a data-toggle="tab" href="#IND"><img src="../GRID_HTML/images/ind.png" /><span class="country_text">IND</span></a></li>
          <li><a data-toggle="tab" href="#IDN"><img src="../GRID_HTML/images/idn.png" /><span class="country_text">IDN</span></a></li>
          <!--<li><a data-toggle="tab" href="#HKG"><img src="../GRID_HTML/images/hkg.png" /><span class="country_text">HKG</span></a></li>-->
          <!--<li><a data-toggle="tab" href="#MYS"><img src="../GRID_HTML/images/mys.png" /><span class="country_text">MYS</span></a></li>-->
          <!--<li><a data-toggle="tab" href="#SGP"><img src="../GRID_HTML/images/sgp.png" /><span class="country_text">SGP</span></a></li>-->
          <li><a data-toggle="tab" href="#SHA"><img src="../GRID_HTML/images/sha.png" /><span class="country_text">SHA</span></a></li>
          <li><a data-toggle="tab" href="#THA"><img src="../GRID_HTML/images/tha.png" /><span class="country_text">THA</span></a></li>
          <!--<li><a data-toggle="tab" href="#iShares"><img src="../GRID_HTML/images/ishares.png" /><span class="country_text">iShares</span></a></li>-->
          <li><a data-toggle="tab" href="#US"><img src="../GRID_HTML/images/us.png" /><span class="country_text">US</span></a></li>
	  <li><a data-toggle="tab" href="#Miners"><img src="../GRID_HTML/images/miners.png" /><span class="country_text">Miners</span></a></li>
          <li><a data-toggle="tab" href="#AI"><img src="../GRID_HTML/images/AI.png" /><span class="country_text">AI Funds</span></a></li>
          <li><a data-toggle="tab" href="#Crypto_Funds"><img src="../GRID_HTML/images/crypto.png" /><span class="country_text">Crypto Funds</span></a></li>
	  <!--<li><a data-toggle="tab" href="#CAN"><img src="../GRID_HTML/images/can.png" /><span class="country_text">CAN</span></a></li>-->
          <!--<li><a data-toggle="tab" href="#UK"><img src="../GRID_HTML/images/uk.png" /><span class="country_text">UK</span></a></li>-->
          <!--<li><a data-toggle="tab" href="#Crypto"><img src="../GRID_HTML/images/crypto.png" /><span class="country_text">Crypto</span></a></li>-->
        </ul>
        <div class="tab-content">
          <div id="AUS" class="tab-pane fade in active"><iframe  scrolling="no"  src="GRID_Ticker/tickerlocal.php?bgcolor=fcfbfb&textcolor=000&border=ccc&path=AUSTRALIA/TKRE_AUSTRALIA" width="100%"></iframe></div>
          <div id="IND" class="tab-pane fade"><iframe  scrolling="no"  src="GRID_Ticker/tickerlocal.php?bgcolor=fcfbfb&textcolor=000&border=ccc&path=INDIA/TKRE_INDIA" width="100%"></iframe></div>
          <div id="IDN" class="tab-pane fade"><iframe  scrolling="no"  src="GRID_Ticker/tickerlocal.php?bgcolor=fcfbfb&textcolor=000&border=ccc&path=INDONESIA/TKRE_INDONESIA" width="100%"></iframe></div>
          <!--<div id="HKG" class="tab-pane fade"><iframe  scrolling="no"  src="GRID_Ticker/tickerlocal.php?bgcolor=fcfbfb&textcolor=000&border=ccc&path=HONG_KONG/TKRE_HONG_KONG" width="100%"></iframe></div>-->
          <!--<div id="MYS" class="tab-pane fade"><iframe  scrolling="no"  src="GRID_Ticker/tickerlocal.php?bgcolor=fcfbfb&textcolor=000&border=ccc&path=MALAYSIA/TKRE_MALAYSIA" width="100%"></iframe></div>-->
          <!--<div id="SGP" class="tab-pane fade"><iframe  scrolling="no"  src="GRID_Ticker/tickerlocal.php?bgcolor=fcfbfb&textcolor=000&border=ccc&path=SINGAPORE/TKRE_SINGAPORE" width="100%"></iframe></div>-->
          <div id="SHA" class="tab-pane fade"><iframe  scrolling="no"  src="GRID_Ticker/tickerlocal.php?bgcolor=fcfbfb&textcolor=000&border=ccc&path=SHANGHAI/TKRE_SHANGHAI" width="100%"></iframe></div>
          <div id="THA" class="tab-pane fade"><iframe  scrolling="no"  src="GRID_Ticker/tickerlocal.php?bgcolor=fcfbfb&textcolor=000&border=ccc&path=SET/TKRE_SET" width="100%"></iframe></div>
          <!--<div id="iShares" class="tab-pane fade"><iframe  scrolling="no"  src="GRID_Ticker/tickerlocal.php?bgcolor=fcfbfb&textcolor=000&border=ccc&path=ISHARES/TKRE_ISHARES" width="100%"></iframe></div>-->
          <div id="US" class="tab-pane fade"><iframe  scrolling="no"  src="GRID_Ticker/tickerlocal.php?bgcolor=fcfbfb&textcolor=000&border=ccc&path=US/TKRE_US" width="100%"></iframe></div>
          <div id="Miners" class="tab-pane fade"><iframe  scrolling="no"  src="GRID_Ticker/tickerlocal.php?bgcolor=fcfbfb&textcolor=000&border=ccc&path=MINERS/TKRE_MINERS" width="100%"></iframe></div>
          <div id="AI" class="tab-pane fade"><iframe  scrolling="no"  src="GRID_Ticker/tickerlocal.php?bgcolor=fcfbfb&textcolor=000&border=ccc&path=AI/TKRE_AI" width="100%"></iframe></div>
          <div id="Crypto_Funds" class="tab-pane fade"><iframe  scrolling="no"  src="GRID_Ticker/tickerlocal.php?bgcolor=fcfbfb&textcolor=000&border=ccc&path=Crypto Funds/TKRE_Crypto Funds" width="100%"></iframe></div>
          <!--<div id="CAN" class="tab-pane fade"><iframe  scrolling="no"  src="GRID_Ticker/tickerlocal.php?bgcolor=fcfbfb&textcolor=000&border=ccc&path=TORONTO/TKRE_TORONTO" width="100%"></iframe></div>-->
          <!--<div id="UK" class="tab-pane fade"><iframe  scrolling="no"  src="GRID_Ticker/tickerlocal.php?bgcolor=fcfbfb&textcolor=000&border=ccc&path=LONDON/TKRE_LONDON" width="100%"></iframe></div>-->
          <!--<div id="Crypto" class="tab-pane fade"><iframe  scrolling="no"  src="GRID_Ticker/tickerlocal.php?bgcolor=fcfbfb&textcolor=000&border=ccc&path=Cryptocurrencies/TKRE_Cryptocurrencies" width="100%"></iframe></div>-->
        </div>
      </div>
    </div>
  </div>

  <div class="container header_container">
    <h2 class="report_name">Performance Monitor</h2>
    <h5 class="report_description">Click here &nbsp;<a href="../GRID_EDUCATION/grid_details.html"><img src="../GRID_HTML/images/info-icon@2x.png"></a>&nbsp; for an explanation of methods used to identify opportunities.</h5>
  </div>

  <div class="container performance_container">
    <p></p>
    <div class="performance_table">
      <table>
        <strong><tr><td></td><td>Most recent daily ideas</td><td>Performance since inception</td><!--<td>Performance - long term</td>--></tr></strong>
        <tr>
          <td>Australia</td>
          <td><a href="../grid/AUSTRALIA/GD_AUSTRALIA.html"><img src="../GRID_HTML/images/recent.png" />&nbsp;&nbsp;&nbsp;View</a></td>
          <td><a href="../Grid_BT/AUSTRALIA/PERF_AUSTRALIA.html"><img src="../GRID_HTML/images/since.png" />&nbsp;&nbsp;&nbsp;View</a></td>
          <!--<td><a href="../Grid_BT_LT/AUSTRALIA/PERF_Backtest_AUSTRALIA.html"><img src="../GRID_HTML/images/long.png" />&nbsp;&nbsp;&nbsp;View</a></td>-->
        </tr>
        <tr>
          <td>India</td>
          <td><a href="../grid/INDIA/GD_INDIA.html"><img src="../GRID_HTML/images/recent.png" />&nbsp;&nbsp;&nbsp;View</a></td>
          <td><a href="../Grid_BT/INDIA/PERF_INDIA.html"><img src="../GRID_HTML/images/since.png" />&nbsp;&nbsp;&nbsp;View</a></td>
          <!--<td><a href="../Grid_BT_LT/INDIA/PERF_Backtest_INDIA.html"><img src="../GRID_HTML/images/long.png" />&nbsp;&nbsp;&nbsp;View</a></td>-->
        </tr>
        <tr>
          <td>Indonesia</td>
          <td><a href="../grid/INDONESIA/GD_INDONESIA.html"><img src="../GRID_HTML/images/recent.png" />&nbsp;&nbsp;&nbsp;View</a></td>
          <td><a href="../Grid_BT/INDONESIA/PERF_INDONESIA.html"><img src="../GRID_HTML/images/since.png" />&nbsp;&nbsp;&nbsp;View</a></td>
          <!--<td><a href="../Grid_BT_LT/INDONESIA/PERF_Backtest_INDONESIA.html"><img src="../GRID_HTML/images/long.png" />&nbsp;&nbsp;&nbsp;View</a></td>-->
        </tr>
        <tr>
          <td>Shanghai</td>
          <td><a href="../grid/SHANGHAI/GD_SHANGHAI.html"><img src="../GRID_HTML/images/recent.png" />&nbsp;&nbsp;&nbsp;View</a></td>
          <td><a href="../Grid_BT/SHANGHAI/PERF_SHANGHAI.html"><img src="../GRID_HTML/images/since.png" />&nbsp;&nbsp;&nbsp;View</a></td>
          <!--<td><a href="../Grid_BT_LT/SHANGHAI/PERF_Backtest_SHANGHAI.html"><img src="../GRID_HTML/images/long.png" />&nbsp;&nbsp;&nbsp;View</a></td>-->
        </tr>
        <tr>
          <td>Thailand</td>
          <td><a href="../grid/SET/GD_SET.html"><img src="../GRID_HTML/images/recent.png" />&nbsp;&nbsp;&nbsp;View</a></td>
          <td><a href="../Grid_BT/SET/PERF_SET.html"><img src="../GRID_HTML/images/since.png" />&nbsp;&nbsp;&nbsp;View</a></td>
          <!--<td><a href="../Grid_BT_LT/SET/PERF_Backtest_SET.html"><img src="../GRID_HTML/images/long.png" />&nbsp;&nbsp;&nbsp;View</a></td>-->
        </tr>        
        <tr>
          <td>US</td>
          <td><a href="../grid/US/GD_US.html"><img src="../GRID_HTML/images/recent.png" />&nbsp;&nbsp;&nbsp;View</a></td>
          <td><a href="../Grid_BT/US/PERF_US.html"><img src="../GRID_HTML/images/since.png" />&nbsp;&nbsp;&nbsp;View</a></td>
         <!-- <td><a href="../Grid_BT_LT/US/PERF_Backtest_US.html"><img src="../GRID_HTML/images/long.png" />&nbsp;&nbsp;&nbsp;View</a></td>-->
        </tr>
        <tr>
          <td>US Sectors</td>
          <td><a href="../grid/USSectors/GD_USSectors.html"><img src="../GRID_HTML/images/recent.png" />&nbsp;&nbsp;&nbsp;View</a></td>
          <td><a href="../Grid_BT/USSectors/PERF_USSectors.html"><img src="../GRID_HTML/images/since.png" />&nbsp;&nbsp;&nbsp;View</a></td>
          <!--<td><a href="../Grid_BT_LT/USSectors/PERF_Backtest_USSectors.html"><img src="../GRID_HTML/images/long.png" />&nbsp;&nbsp;&nbsp;View</a></td>-->
        </tr>
        <tr>
          <td>AGGRESSOR US</td>
          <td><a href="../grid/AGGRESSORUSETF/GD_AGGRESSORUSETF.html"><img src="../GRID_HTML/images/recent.png" />&nbsp;&nbsp;&nbsp;View</a></td>
          <td><a href="../Grid_BT/AGGRESSORUSETF/PERF_AGGRESSORUSETF.html"><img src="../GRID_HTML/images/since.png" />&nbsp;&nbsp;&nbsp;View</a></td>
          <!--<td><a href="../Grid_BT_LT/AGGRESSORUSETF/PERF_Backtest_AGGRESSORUSETF.html"><img src="../GRID_HTML/images/long.png" />&nbsp;&nbsp;&nbsp;View</a></td>-->
        </tr>
        <tr>
          <td>LEVERAGED ETFS</td>
          <td><a href="../grid/LEVERAGED ETFS/GD_LEVERAGED ETFS.html"><img src="../GRID_HTML/images/recent.png" />&nbsp;&nbsp;&nbsp;View</a></td>
          <td><a href="../Grid_BT/LEVERAGED ETFS/PERF_LEVERAGED ETFS.html"><img src="../GRID_HTML/images/since.png" />&nbsp;&nbsp;&nbsp;View</a></td>
          <!--<td><a href="../Grid_BT_LT/LEVERAGED ETFS/PERF_Backtest_LEVERAGED ETFS.html"><img src="../GRID_HTML/images/long.png" />&nbsp;&nbsp;&nbsp;View</a></td>-->
        </tr>
        <tr>
          <td>Miners</td>
          <td><a href="../grid/MINERS/GD_MINERS.html"><img src="../GRID_HTML/images/recent.png" />&nbsp;&nbsp;&nbsp;View</a></td>
          <td><a href="../Grid_BT/MINERS/PERF_MINERS.html"><img src="../GRID_HTML/images/since.png" />&nbsp;&nbsp;&nbsp;View</a></td>
          <!--<td><a href="../Grid_BT_LT/MINERS/PERF_Backtest_MINERS.html"><img src="../GRID_HTML/images/long.png" />&nbsp;&nbsp;&nbsp;View</a></td> -->
        </tr>
        <tr>
          <td>AI Stocks and ETFs</td>
          <td><a href="../grid/AI/GD_AI.html"><img src="../GRID_HTML/images/recent.png" />&nbsp;&nbsp;&nbsp;View</a></td>
          <td><a href="../Grid_BT/AI/PERF_AI.html"><img src="../GRID_HTML/images/since.png" />&nbsp;&nbsp;&nbsp;View</a></td>
          <!--<td><a href="../Grid_BT_LT/AI/PERF_Backtest_AI.html"><img src="../GRID_HTML/images/long.png" />&nbsp;&nbsp;&nbsp;View</a></td>-->
        </tr>
        <tr>
          <td>Crypto Funds</td>
          <td><a href="../grid/Crypto Funds/GD_Crypto Funds.html"><img src="../GRID_HTML/images/recent.png" />&nbsp;&nbsp;&nbsp;View</a></td>
          <td><a href="../Grid_BT/Crypto Funds/PERF_Crypto Funds.html"><img src="../GRID_HTML/images/since.png" />&nbsp;&nbsp;&nbsp;View</a></td>
          <!--<td><a href="../Grid_BT_LT/AI/PERF_Backtest_AI.html"><img src="../GRID_HTML/images/long.png" />&nbsp;&nbsp;&nbsp;View</a></td>-->
        </tr>
       <!-- <tr>
          <td>Hong Kong</td>
          <td><a href="../grid/HONG_KONG/GD_HONG_KONG.html"><img src="../GRID_HTML/images/recent.png" />&nbsp;&nbsp;&nbsp;View</a></td>
          <td><a href="../Grid_BT/HONG_KONG/PERF_HONG_KONG.html"><img src="../GRID_HTML/images/since.png" />&nbsp;&nbsp;&nbsp;View</a></td>
          <td><a href="../Grid_BT_LT/HONG_KONG/PERF_Backtest_HONG_KONG.html"><img src="../GRID_HTML/images/long.png" />&nbsp;&nbsp;&nbsp;View</a></td>
        </tr> -->
       <!-- <tr>
          <td>Malaysia</td>
          <td><a href="../grid/MALAYSIA/GD_MALAYSIA.html"><img src="../GRID_HTML/images/recent.png" />&nbsp;&nbsp;&nbsp;View</a></td>
          <td><a href="../Grid_BT/MALAYSIA/PERF_MALAYSIA.html"><img src="../GRID_HTML/images/since.png" />&nbsp;&nbsp;&nbsp;View</a></td>
          <td><a href="../Grid_BT_LT/MALAYSIA/PERF_Backtest_MALAYSIA.html"><img src="../GRID_HTML/images/long.png" />&nbsp;&nbsp;&nbsp;View</a></td>
        </tr> -->
       <!-- <tr>
          <td>Singapore</td>
          <td><a href=../grid/"SINGAPORE/GD_SINGAPORE.html"><img src="../GRID_HTML/images/recent.png" />&nbsp;&nbsp;&nbsp;View</a></td>
          <td><a href="../Grid_BT/SINGAPORE/PERF_SINGAPORE.html"><img src="../GRID_HTML/images/since.png" />&nbsp;&nbsp;&nbsp;View</a></td>
          <td><a href="../Grid_BT_LT/SINGAPORE/PERF_Backtest_SINGAPORE.html"><img src="../GRID_HTML/images/long.png" />&nbsp;&nbsp;&nbsp;View</a></td>
        </tr> -->

       <!-- <tr>
          <td>iShares</td>
          <td><a href="../grid/ISHARES/GD_ISHARES.html"><img src="../GRID_HTML/images/recent.png" />&nbsp;&nbsp;&nbsp;View</a></td>
          <td><a href="../Grid_BT/ISHARES/PERF_ISHARES.html"><img src="../GRID_HTML/images/since.png" />&nbsp;&nbsp;&nbsp;View</a></td>
          <td><a href="../Grid_BT_LT/ISHARES/PERF_Backtest_ISHARES.html"><img src="../GRID_HTML/images/long.png" />&nbsp;&nbsp;&nbsp;View</a></td>
        </tr> -->
       <!-- <tr>
          <td>Toronto</td>
          <td><a href="../grid/TORONTO/GD_TORONTO.html"><img src="../GRID_HTML/images/recent.png" />&nbsp;&nbsp;&nbsp;View</a></td>
          <td><a href="../Grid_BT/TORONTO/PERF_TORONTO.html"><img src="../GRID_HTML/images/since.png" />&nbsp;&nbsp;&nbsp;View</a></td>
          <td><a href="../Grid_BT_LT/TORONTO/PERF_Backtest_TORONTO.html"><img src="../GRID_HTML/images/long.png" />&nbsp;&nbsp;&nbsp;View</a></td>
        </tr> -->
       <!-- <tr>
          <td>London</td>
          <td><a href="../grid/LONDON/GD_LONDON.html"><img src="../GRID_HTML/images/recent.png" />&nbsp;&nbsp;&nbsp;View</a></td>
          <td><a href="../Grid_BT/LONDON/PERF_LONDON.html"><img src="../GRID_HTML/images/since.png" />&nbsp;&nbsp;&nbsp;View</a></td>
          <td><a href="../Grid_BT_LT/LONDON/PERF_Backtest_LONDON.html"><img src="../GRID_HTML/images/long.png" />&nbsp;&nbsp;&nbsp;View</a></td>
        </tr> -->
       <!-- <tr>
          <td>Cryptocurrencies</td>
          <td><a href="CRYPTOCURRENCIES/GD_CRYPTOCURRENCIES.html"><img src="../GRID_HTML/images/recent.png" />&nbsp;&nbsp;&nbsp;View</a></td>
          <td><a href="../Grid_BT/CRYPTOCURRENCIES/PERF_CRYPTOCURRENCIES.html"><img src="../GRID_HTML/images/since.png" />&nbsp;&nbsp;&nbsp;View</a></td>
          <td><a href="../Grid_BT_LT/CRYPTOCURRENCIES/PERF_Backtest_CRYPTOCURRENCIES.html"><img src="../GRID_HTML/images/long.png" />&nbsp;&nbsp;&nbsp;View</a></td>
        </tr> -->
       <!-- <tr>
          <td>Malaysia</td>
          <td><a href="../grid/MALAYSIA/GD_MALAYSIA.html"><img src="../GRID_HTML/images/recent.png" />&nbsp;&nbsp;&nbsp;View</a></td>
          <td><a href="../Grid_BT/MALAYSIA/PERF_MALAYSIA.html"><img src="../GRID_HTML/images/since.png" />&nbsp;&nbsp;&nbsp;View</a></td>
          <td><a href="../Grid_BT_LT/MALAYSIA/PERF_Backtest_MALAYSIA.html"><img src="../GRID_HTML/images/long.png" />&nbsp;&nbsp;&nbsp;View</a></td>
        </tr> -->   
      </table>
    </div>
  </div>
<!-- ﻿  <div class="footer_container">
	<div class="container">
	  <p>Copyright © i4cfinancial 2025. All rights reserved.</p>
	</div>
  </div> -->
  <?php include 'footer.php'?>
</body>
</html>