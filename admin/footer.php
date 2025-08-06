    </div> <!-- .main-content -->

    <div class="footer_container">
        <div class="container">
            <p>Copyright © i4cfinancial.com <?php echo date('Y'); ?>. All rights reserved.</p>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var sticky = $('.site_header_container');
            $(window).scroll(function() {
                if ($(window).scrollTop() >= 90) {
                    sticky.addClass('fixed');
                } else {
                    sticky.removeClass('fixed');
                }
            });

            $('.linkedin').on('keyup', function() {
                var linkedin = $(this).val();
                if (linkedin !== "") {
                    if (!/(ftp|http|https):\/\/?(?:www\.)?linkedin.com/.test(linkedin)) {
                        $('.valid_url').addClass('error').show();
                    } else {
                        $('.valid_url').removeClass('error').hide();
                    }
                } else {
                    $('.valid_url').removeClass('error').hide();
                }
            });
        });
    </script>
    </div> <!-- end .page-wrapper -->
    </body>

    </html>