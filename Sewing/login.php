<?php
session_start();
$pass = "HusiSQILe";
$pdo = new PDO('mysql:host=localhost;dbname=sewingdb', "sewing_site", $pass );

if(isset($_GET['login'])) {
    $email = $_POST['email'];
    $passwort = $_POST['passwort'];

    $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $result = $statement->execute(array('email' => $email));
    $user = $statement->fetch();

    //Überprüfung des Passworts
    if ($user !== false && password_verify($passwort, $user['passwort'])) {
        $_SESSION['userid'] = $user['user_name'];
        die('Login erfolgreich als . Weiter zur <a href="index.php">Startseite</a>');
    } else {
        $errorMessage = "E-Mail oder Passwort war ungültig<br>";
    }

}
?>

<html>
    <head>
        <title>Sewing</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="assets/css/index.css" />
        <link rel="stylesheet" href="assets/css/sideNav.css" />
        <link rel="stylesheet" href="assets/css/register.css" />

        <script src="https://kit.fontawesome.com/5046510dfa.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <!-- Page Wrapper -->
        <div id="page-wrapper">
            <div id="overlay">
                <div id="headline">
                    <h1>Login</h1>
                    <?php
                    if(isset($errorMessage)) {
                        echo $errorMessage;
                    }
                    ?>
                </div>
                <!-- The overlay sideNav -->
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
                </div>
                <div id="page-content">
                    <form action="?login=1" method="post">
                        Benutzername:<br>
                        <input type="text" name="name"><br><br>

                        Dein Passwort:<br>
                        <input type="password" name="passwort"><br><br>

                        <input type="submit" value="Login">
                    </form>
                    <button id="ButtonRegister" onclick="document.location.href='registrieren.php'">Registrieren</button>
                </div>


            </div>
        </div>
        <!-- js Scripts -->
        <script src="./assets/js/sideNav.js"></script>
        <script src="./assets/js/login.js"></script>


    </body>
</html>






