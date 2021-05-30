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
    <link rel="stylesheet" href="assets/css/einzelstuecke.css">
    <script src="https://kit.fontawesome.com/5046510dfa.js" crossorigin="anonymous"></script>
</head>
<body class="is-preload">
<?php
if(!isset($_SESSION['userid'])) {
    $show_form = false;
}else{
    $show_form = true;
}
$pass = "HusiSQILe";
$pdo = new PDO('mysql:host=localhost;dbname=sewingdb', 'sewing_site', $pass);
$error = null;

//Das Formular wurde abgesendet, überprüfe den Inhalt und speichere es ab
if(isset($_GET['submit'])) {
    $name = $_SESSION['userid'];
    $bild = 1;
    $text = trim($_POST['text']);

    if(empty($text)) {
        $error = 'Bitte einen Text eingeben<br>';
    } else {
        $statement = $pdo->prepare("INSERT INTO comments (user_name, pic_id, details) VALUES (:name, :pic_id, :details)");
        $result = $statement->execute(array('name' => $name, 'pic_id' => $bild, 'details' => $text));

        if($result) {
            echo '<b>Dein Eintrag wurde erfolgreich gespeichert</b><br><br>';
            $show_form = false;
        } else {
            $error = 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
        }
    }
}
?>


<?php
/***********************
 * Ausgabe der Einträge
 ***********************/

//Ermittelt die Anzahl der Beiträge
$statement = $pdo->prepare("SELECT COUNT(*) AS anzahl FROM comments");
$statement->execute();
$row = $statement->fetch();
//Abfrage der Datenbank und Ausgabe der Daten
$statement = $pdo->prepare("SELECT * FROM comments WHERE pic_id = 1 ORDER BY id ASC ");
$statement->execute();


?>

<!-- Page Wrapper -->
<div id="page-wrapper">
    <div id="overlay">
        <div id="headline">
            <h1>Einzelstücke</h1>
        </div>
        <!-- The overlay -->
        <div id="myNav" class="overlay">

            <!-- Button to close the overlay navigation -->
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

            <!-- Overlay content -->
            <div class="overlay-content">
                <ul class="links">
                    <?php if(!isset($_SESSION['userid'])) {
                        echo"<a id='login'><a href='login.php'>Login</a>";
                    }else{
                        $userid = $_SESSION['userid'];
                        echo"<a>Benutzer: "."$userid"."</a>";
                        echo "<a id='logout'><a href='logout.php'>Logout</a>";
                    }
                    ?>
                    <a href="index.php">Startseite</a>
                    <a href="aboutMe.php">Über mich</a>
                    <a href="eBooks.php">Ebooks</a>
                    <a href="freeBooks.php">Freebooks</a>
                    <a href="einzelstuecke.php">Einzelstücke</a>
                    <a href="kontakt.php">Kontakt</a>
                </ul>
            </div>
        </div>
        <!-- Use any element to open/show the overlay navigation menu -->
        <div id="sideNavButton">
            <button id="ButtonMenu" onclick="openNav()">Menü  <i class="fas fa-bars"></i></button>
        </div>
        <div id="page-content">
            <div class="pic-container">
                <img src='images/klein/bsp1.jpg' alt='bsp1'>
                <div class="commentsText">
                    <div class="comment">
                        <?php
                        while ($row = $statement->fetch()) {
                            $name = htmlentities($row['user_name']);
                            $text = nl2br(htmlentities($row['details']));
                            echo "<b>$name</b><br>"."$text<br>";
                        }?>
                    </div>
                </div>
            </div>
            <button class="commentbtn">Kommentieren</button>
            <div class='pic-container'>
                <img src='images/klein/bsp2.jpg' alt='bsp2'>
            </div>
            <button class="commentbtn">Kommentieren</button>
            <div class='pic-container'>
                <img src='images/klein/bsp3.jpg' alt='bsp3'>


            </div>
            <button class="commentbtn">Kommentieren</button>
            <?php
            if(!is_null($error)) { //Ein Fehler ist aufgetreten
                echo $error;
            }

            //Ausgabe des Formulars nur wenn $showForm == true ist
            if($show_form):
                ?>
                <form action="?submit=1" method="post">
                    Text:<br>
                    <textarea cols="50" rows="9" name="text"></textarea><br><br>

                    <input type="submit" class="commentbtn" value="Kommentieren">
                </form>
            <?php
            endif;
            ?>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="./assets/js/sideNav.js"></script>

</body>
</html>
