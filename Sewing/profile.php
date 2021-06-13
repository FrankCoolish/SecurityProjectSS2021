<?php
session_start();
const DB_USER = 'sewing_site';
const DB_PASSWORD = 'HusiSQILe';
define('SITE_ROOT', realpath(dirname(__FILE__)));
?>
<html>

<head>
    <title>Sewing</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/index.css" />
    <link rel="stylesheet" href="assets/css/sideNav.css" />
    <link rel="stylesheet" href="assets/css/einzelstuecke.css">
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/5046510dfa.js" crossorigin="anonymous"></script>
</head>

<body class="is-preload">
    <?php
    if (!isset($_SESSION['userid'])) {
        $show_form = false;
    } else {
        $show_form = true;
    }
    $pdo = new PDO('mysql:host=localhost;dbname=sewingdb', DB_USER, DB_PASSWORD);
    $error = null;

    ?>

    <!-- Page Wrapper -->
    <div id="page-wrapper">
        <div id="overlay">
            <div id="headline">
                <?php
                    $userid = $_SESSION['userid'];
                    echo "<h1>MySewingXP - ".$userid." 's Profil</h1>";
                ?>
            </div>
            <?php
            include('sidenav.php');
            ?>
            <div class="page-content">
                <?php
                if ($show_form) {
                    $name = $_SESSION['userid'];
                    $imageStatement = $pdo->prepare("SELECT COUNT(*) FROM pictures Where user_name = '$name'");
                    $imageStatement->execute();
                    $row = $imageStatement->fetch();

                    echo "Profil von $name <br><br>";
                    echo "Posted images: $row[0]";
                }
                ?>

            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="./assets/js/sideNav.js"></script>

</body>

</html>