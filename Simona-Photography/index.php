<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "simona-photography");
echo '<!DOCTYPE html>
        <html lang="sr">';
require_once'views/head.php';
?>

    <body>
        <div class="container">
            <?php
            if(isset($_SESSION['role']))
                {
                    if($_SESSION['role']==1)
                    {
                        include 'views/admin_panel.php';
                    }
                }
            ?>
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
                    <?php 
                
                require_once'views/login-register.php';
                
                if(isset($_SESSION['registered'])){
                    unset($_SESSION['registered']);
                    echo 'You have been registered, please log in.<br>';
                }
                if(isset($_SESSION['username'])){
                    echo '<a href="views/logout.php" class="clickable unselectable" id="logout">Logged in as '.$_SESSION['username'].' (Logout)</a>';
                }
                ?>
                </aside>
                <div class="grid">
                    <div class="grid-sizer"></div>
                    <div class="gutter-sizer"></div>
                    <?php
                    $query = "SELECT * FROM images;";
                    $query_result = mysqli_query($conn,$query);
                    foreach($query_result as $img){
                        echo '<div class="member">
                                <img src="img/pictures/'.$img["path"].'.jpg" alt="'.$img["alt"].'"/>
                            </div>';
                    }
                ?>
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

                <?php
                require_once 'js/login-register-script.inc';
                ?>


            });

        </script>
        <?php
            mysqli_close($conn);
        ?>
    </body>

    </html>
