 
 
   <div class="pgec">

   
  <div class="footer_container">
    <div class="container">
      <p>Copyright © i4cfinancial.com 2025. All rights reserved.</p>
    </div>
  </div>
  </div>
 
  <script>
    $(document).ready(function () {
      $(".nav li a").on('click', function (event) {
        if (this.hash !== "") {
          event.preventDefault();
          var hash = this.hash;
          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 800, function () {
            window.location.hash = hash;
          });
        }
      });

      $('.valid_url').hide();
      $(window).scroll(function () {
        var sticky = $('.site_header_container'),
          scroll = $(window).scrollTop();
        if (scroll >= 90) {
          sticky.addClass('fixed');
        } else {
          sticky.removeClass('fixed');
        }
      });

      $('.linkedin').on('keyup', function () {
        var linkedin = $(this).val();
        if (linkedin != "") {
          if (/(ftp|http|https):\/\/?(?:www\.)?linkedin.com/.test(linkedin)) {
            $('.valid_url').removeClass('error').hide();
          } else {
            $('.valid_url').addClass('error').show();
          }
        } else {
          $('.valid_url').removeClass('error').hide();
        }
      });
    });

    var container_height = null;
    var queryParams = getUrlVars();
    var url = window.location.search;
    if (url && url != '') {
      if (url.match("goto")) {
        container_height = $("#" + queryParams['goto']).offset().top;
        $('html, body').animate({ scrollTop: container_height - 120 }, 'slow');
      }
    }

    function getUrlVars() {
      var vars = [], hash;
      var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
      for (var i = 0; i < hashes.length; i++) {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
      }
      return vars;
    }
  </script>
<!-- </body>
</html> -->
