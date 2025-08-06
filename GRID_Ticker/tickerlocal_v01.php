<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- head -->
    <meta charset="utf-8">
    <meta name="msapplication-tap-highlight" content="no" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
      Stock Ticker
    </title>
    <!-- Stylesheets -->
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,400italic,300italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assets/css/docs.theme.min.css">
    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/owlcarousel/assets/owl.theme.default.min.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- Favicons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="shortcut icon" href="assets/ico/favicon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <!-- Yeah i know js should not be in header. Its required for demos.-->
    <!-- javascript -->
    <script src="assets/vendors/jquery.min.js"></script>
    <script src="assets/owlcarousel/owl.carousel.js"></script>

    <!-- tooltip ticker hover -->
    <link rel="stylesheet" type="text/css" href="css/tooltipster.bundle.min.css" />
    <link rel="stylesheet" type="text/css" href="css/tooltipster-sideTip-borderless.min.css" />
    <script type="text/javascript" src="js/tooltipster.bundle.min.js"></script>
    <style type="text/css">
      .tooltipster-content{font-size: 11px !important;line-height: 14px !important;}
    </style>
  </head>

  <body class="custom_iframe_body">
    <?php
      $color=$_REQUEST['bgcolor'];
      $text_color=$_REQUEST['textcolor'];
      $border=$_REQUEST['border'];
      $path=$_REQUEST['path'];

      $url = '../grid/'.$path.'.xml';

      $xml = simplexml_load_file($url) or die("feed not loading");

      $arrXml = array();
      $textXml=array();
      $commentXml =array();
      $dom    = new DOMDocument;
      $dom->loadXML( $xml->asxml());

      $counter=0;

      foreach( $dom->getElementsByTagName( 'comment' ) as $comment ) {
      	//$item->removeChild($item->lastChild);
        $commentXml[] = $dom->saveXML( $comment );
      }


      foreach( $dom->getElementsByTagName( 'symbol' ) as $symbol ) {
        //$item->removeChild($item->lastChild);
        $textXml[] = $dom->saveXML( $symbol );
      }

      foreach( $dom->getElementsByTagName( 'element' ) as $item ) {
      	//$item->removeChild($item->lastChild);
      	$dom->getElementsByTagName('element')->item($counter)->removeChild($dom->getElementsByTagName('comment')->item(0));
        $dom->getElementsByTagName('element')->item($counter)->removeChild($dom->getElementsByTagName('symbol')->item(0));
        $arrXml[] = $dom->saveXML( $item );
        $counter++;
      }
    ?>
    <!--  Demos -->
    <section id="demos">
      <div class="row">
        <div class="large-12 columns">
          <div class="owl-carousel owl-theme" style="background-color:#<?php echo $color;?>;color:#<?php echo $text_color;?>;border:2px solid #<?php echo $border;?>">
            <?php
              $counter=0;
              foreach($arrXml as $res) {
                $commentResult=str_replace('<comment>','',$commentXml[$counter]);
                $commentResult=str_replace('</comment>','',$commentResult);
                $textResult=str_replace('<symbol>','<span>',$textXml[$counter]);
                $textResult=str_replace('</symbol>','</span>',$textResult); ?>
                <div class="item" title="<?php echo $commentResult;?>" style="color:#<?php echo $text_color;?>;">
                  <?php echo $textResult; ?>
                 <?php echo $res; ?>
                </div>
                <?php 
                $counter++; 
              } 
            ?>
          </div>

          <script>
            $(document).ready(function() {
              var owl = $('.owl-carousel');
              owl.owlCarousel({
                items:4,
                dots:false,
                loop:true,
                margin:10,
                autoplay:true,
                autoplayHoverPause:true,
                responsiveRefreshRate: 0,
                responsive:{
                  0:{
                    items:1,
                    nav:false,
                    autoplay:true
                  },
                  600:{
                    items:2,
                    nav:false,
                    autoplay:true
                  },
                  1000:{
                    items:3,
                    nav:false,
                    loop:true,
                    autoplay:true
                  }
                }
              });
              
              // mouse hover stop event starts here
              $('.owl-stage-outer').on('mouseover',function(e){
                owl.trigger('stop.owl.autoplay');
              });
              $('.owl-stage-outer').on('mouseleave',function(e){
                owl.trigger('play.owl.autoplay');
              });
              // mouse hover stop event ends here

              // Tooltip on hover
              $('.item').tooltipster({
                theme: 'tooltipster-borderless'
              });

            });
          </script>
        </div>
      </div>
    </section>

    <!-- vendors -->
    <script src="assets/vendors/highlight.js"></script>
    <script src="assets/js/app.js"></script>
  </body>
</html>
<?php
  //function defination to convert array to xml
  function array_to_xml($array, &$xml_user_info) {
    foreach($array as $key => $value) {
      if(is_array($value)) {
        if(!is_numeric($key)) {
          $subnode = $xml_user_info->addChild("$key");
          array_to_xml($value, $subnode);
        } else {
          $subnode = $xml_user_info->addChild("item$key");
          array_to_xml($value, $subnode);
        }
      } else {
        $xml_user_info->addChild("$key",htmlspecialchars("$value"));
      }
    }
  }
?>