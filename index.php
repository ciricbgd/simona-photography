<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "simona-photography");
?>
    <!DOCTYPE html>
    <html lang="sr">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Simona Photography</title>
        <meta name="description" content="">
        <!--Describe your website. This will be displayed as description under your website name when searched on google.-->
        <meta name="keywords" content="">
        <!--Put keywords for your website. This will make your website more discoverable.-->
        <link rel="canonical" href="" />
        <!--This page's url.-->
        <meta name="author" content="https://plus.google.com/111116356739335627675">
        <!--This is my google plus page. Not necessary.-->
        <!--Facebook meta tags-->
        <meta property="fb:app_id" content="" />
        <!--Facebook page id.-->
        <meta property="og:url" content="">
        <!--This page's url.-->
        <meta property="og:image" content="">
        <!--Image url. 1200 x 630 minimum-->
        <meta property="og:description" content="">
        <!--Description-->
        <meta property="og:title" content="">
        <!--Title of this page.-->
        <meta property="og:site_name" content="">
        <!--If this isn't the site's main page. Put the name of the main page here.-->
        <!--Twitter meta tags-->
        <meta name="twitter:card" content="">
        <!--Explains what the card is. You will mostly use an image so put "summary_large_image"-->
        <meta name="twitter:url" content="">
        <!--This page's url.-->
        <meta name="twitter:title" content="">
        <!--Title.-->
        <meta name="twitter:description" content="">
        <!--Description.-->
        <meta name="twitter:image" content="">
        <!--Put the same image as for facebook.-->
        <!--Google plus meta tags-->
        <meta itemprop="name" content="">
        <!--Title.-->
        <meta itemprop="description" content="">
        <!--Description.-->
        <meta itemprop="image" content="">
        <!--Put the same image as for facebook.-->
        <!--Css-->
        <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
        <link rel="stylesheet" href="./css/bootstrap.css">
        <link rel="stylesheet" href="./css/main.css">
    </head>

    <body>
        <div class="container">
            <aside>
                <header>
                    <h1>Simona Photography</h1>
                </header>
                <nav>
                    <ul>
                        <li>
                            <p class="clickable">Portraits</p>
                        </li>
                        <li>
                            <p class="clickable">Fashion</p>
                        </li>
                        <li>
                            <p class="clickable">Fairytales</p>
                        </li>
                    </ul>
                </nav>
                <ul class="socialmedia">
                    <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                    <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
                    <li><a href="#"><span class="fas fa-envelope"></span></a></li>
                </ul>
                <?php require_once'views/login-register.php';?>
            </aside>
            <div class="grid">
                <div class="grid-sizer"></div>
                <div class="gutter-sizer"></div>
                <div class="member">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/orange-tree.jpg" />
                </div>
                <div class="member">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/submerged.jpg" />
                </div>
                <div class="member">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/look-out.jpg" />
                </div>
                <div class="member">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/one-world-trade.jpg" />
                </div>
                <div class="member">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/drizzle.jpg" />
                </div>
                <div class="member">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/cat-nose.jpg" />
                </div>
                <div class="member">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/contrail.jpg" />
                </div>
                <div class="member">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/golden-hour.jpg" />
                </div>
                <div class="member">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/82/flight-formation.jpg" />
                </div>
            </div>
        </div>
        <!--Scripts-->
        <script src="./js/jquery-3.2.1.min.js"></script>
        <script src="./js/masonry.pkgd.min.js"></script>
        <script src="./js/imagesloaded.pkgd.js"></script>
        <script>
            var $grid = $('.grid').masonry({
                itemSelector: '.member',
                percentPosition: true,
                columnWidth: '.grid-sizer',
                gutter: '.gutter-sizer',
                horizontalOrder: true
            });
            // layout Masonry after each image loads
            $grid.imagesLoaded().progress(function() {
                $grid.masonry();
            });

            $(document).ready(function() {

                //Register / Login
                $('#login-register').click(function() {
                    $(this).addClass("remove");
                    $('#login-window').removeClass("remove");
                });
                $('#cancelForm').click(function() {
                    $('#login-register').removeClass("remove");
                    $('#login-window').addClass("remove");
                });
                $('#login').click(function() {
                    $(this).removeClass("unselected").addClass("selected");
                    $('#register').removeClass("selected").addClass("unselected");
                    $('#register-forms').addClass("remove");
                    $('#loginorregister').attr('value', 'login');
                    $('#btnSubmit').html('Login');

                });
                $('#register').click(function() {
                    $(this).removeClass("unselected").addClass("selected");
                    $('#login').removeClass("selected").addClass("unselected");
                    $('#register-forms').removeClass("remove");
                    $('#loginorregister').attr('value', 'register');
                    $('#btnSubmit').html('Register');

                });

                <?php
                if(isset($password_report) || isset($user_report)){
                    echo "$('#login-window').removeClass('remove');
                            $('#login-register').addClass('remove');";
                }
                ?>
                //


            });

        </script>
    </body>

    </html>
