<?php
session_start();
?>
<html>
    <head>
        <title>Sewing</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="assets/css/index.css" />
        <link rel="stylesheet" href="assets/css/sideNav.css" />
        <script src="https://kit.fontawesome.com/5046510dfa.js" crossorigin="anonymous"></script>


    </head>
    <body class="is-preload">
        <!-- Page Wrapper -->
        <div id="page-wrapper">
            <div id="overlay">
                <div id="headline">
                    <h1>Startseite</h1>
                </div>
                <!-- The overlay -->
                <div id="myNav" class="overlay">

                    <!-- Button to close the overlay navigation -->
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

                    <!-- Overlay content -->
                    <div class="overlay-content">
                        <ul class="links">
                            <?php if(!isset($_SESSION['userid'])) {
                                echo"<li id='login'><a href='login.php'>Login</a></li>";
                                }else{
                                $userid = $_SESSION['userid'];
                                echo"<li><a>Benutzer: "."$userid"."</a></li>";
                                echo "<li id='logout'><a href='logout.php'>Logout</a></li>";
                                }
                             ?>
                            <li><a href="index.php">Startseite</a></li>
                            <li><a href="aboutMe.php">Über mich</a></li>
                            <li><a href="eBooks.php">Ebooks</a></li>
                            <li><a href="freeBooks.php">Freebooks</a></li>
                            <li><a href="einzelstuecke.php">Einzelstücke</a></li>
                            <li><a href="kontakt.php">Kontakt</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Use any element to open/show the overlay navigation menu -->
                <div id="sideNavButton">
                    <button id="ButtonMenu" onclick="openNav()">Menü  <i class="fas fa-bars"></i></button>
                    <!--<span onclick="openNav()">Menü</span>-->
                </div>
            </div>
        </div>

        <!-- Scripts -->
        <script src="./assets/js/sideNav.js"></script>

    </body>
</html>

<?php
