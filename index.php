<?php
session_start();
require_once'db/conn.php';
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
                                <img src="img/pictures/'.$img["path"].'" alt="'.$img["alt"].'"/>
                            </div>';
                    }
                ?>
                </div>
        </div>
        <!--Scripts-->
        <script src="./js/jquery-3.2.1.min.js"></script>
        <script src="./js/popper.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <script src="./js/masonry.pkgd.min.js"></script>
        <script src="./js/imagesloaded.pkgd.js"></script>
        <script src="./js/jquery.dm-uploader.min.js"></script>
        <script src="./js/upload-ui.js"></script>
        <script src="./js/upload-multiple.js"></script>
        <script src="./js/upload-config-images.js"></script>
        <script>
            // layout Masonry image display plugin
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
        <script type="text/html" id="files-template">
            <li class="col col-xl-2 col-md-3 col-sm-6 col-6">

                <img class="" src="https://danielmg.org/assets/image/noimage.jpg?v=v10" alt="Generic placeholder image">

                <div class="media-body mb-1">
                    <div class="progress mb-2">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                    <input type="text" placeholder="Naslov" class="image_name" class="image_name">
                    <input type="text" placeholder="Alt" class="image_alt" class="image_alt">
                    <textarea placeholder="Opis" class="image_description" class="image_description"></textarea>
                </div>
            </li>
        </script>

        <!-- Debug item template -->
        <script type="text/html" id="debug-template">
            <li class="list-group-item text-%%color%%"><strong>%%date%%</strong>: %%message%%</li>
        </script>
        <?php
            mysqli_close($conn);
        ?>
    </body>

    </html>
