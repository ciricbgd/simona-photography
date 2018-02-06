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
                        <h1 class="clickable section_selector" data-section_id="1">Simona Photography</h1>
                    </header>
                    <nav>
                        <ul>
                            <?php
                                $query = "SELECT * FROM sections;";
                                $query_result = mysqli_query($conn,$query);
                                foreach($query_result as $section)
                                {
                                    if($section["featured"]){
                                      echo '<li>
                                                <p class="clickable section_selector" data-section_id='.$section["id"].'>'.$section["name"].'</p>
                                            </li>';  
                                    } 
                                }
                            echo'<li><p class="clickable" id="album_button">Albums</p></li>';
                            echo '<li>';
                                foreach($query_result as $section)
                                {
                                   if(!$section["featured"] && $section["name"]!="Main"){
                                      echo '<li>
                                                <p class="clickable album_section">'.$section["name"].'</p>
                                            </li>';  
                                    } 
                                }
                            echo '</li>';
                            ?>
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
                    <!--Images loaded  here!-->
                </div>
        </div>
        <!--Scripts-->
        <script src="./js/jquery-3.2.1.min.js"></script>
        <script src="./js/popper.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <script src='./js/main.js'></script>
        <script src="./js/masonry.pkgd.min.js"></script>
        <script src="./js/jquery.dm-uploader.min.js"></script>
        <script>
            //Login script
            $(document).ready(function() {
                <?php
                require_once 'js/login-register-script.php';
                ?>
            });

        </script>

        <script type="text/html" id="files-template" src="js/image_template.php">
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
        <?php
            mysqli_close($conn);
        ?>
    </body>

    </html>
