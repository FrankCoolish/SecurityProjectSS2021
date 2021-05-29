<html>
    <head>
        <title>Sewing</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="assets/css/index.css" />
        <link rel="stylesheet" href="assets/css/sideNav.css" />
        <link rel="stylesheet" href="assets/css/login.css" />

        <script src="https://kit.fontawesome.com/5046510dfa.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <!-- Page Wrapper -->
        <div id="page-wrapper">
            <div id="overlay">
                <div id="headline">
                    <h1>Login</h1>
                </div>
                <!-- The overlay sideNav -->
                <div id="myNav" class="overlay">

                    <!-- Button to close the overlay navigation -->
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

                    <!-- Overlay content -->
                    <div class="overlay-content">
                        <ul class="links">
                            <li><a href="index.php">Startseite</a></li>
                            <li><a href="aboutMe.php">Über mich</a></li>
                            <li><a href="login.php">Log In</a></li>
                            <li><a href="eBooks.php">Ebooks</a></li>
                            <li><a href="freeBooks.php">Freebooks</a></li>>
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
                <div id="Login-content">
                    <label for="usernameInput">Benutzer:</label><br>
                    <input type="text" id="usernameInput"><br>
                    <label for="pwd">Passwort:</label><br>
                    <input type="password" id="pwd"><br>
                    <button id="ButtonLogin" onclick="login()">Login</button>
                    <button id="ButtonBack" >Zurück</button>
                    <button id="ButtonRegister" onclick="showRegister()">Registrieren</button>
                    <!--<textarea id="userInput"></textarea>-->
                </div>

            </div>
        </div>
        <script>
            <?php
            ?>
        </script>


        <!-- js Scripts -->
        <script src="./assets/js/sideNav.js"></script>
        <script src="./assets/js/login.js"></script>


    </body>
</html>





