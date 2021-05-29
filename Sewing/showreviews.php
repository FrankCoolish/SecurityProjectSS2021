<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <body>
    <?php
        $user = "sewing_site";
        $pass = "HusiSQILe";
        $pdo = new PDO('mysql:host=localhost;dbname=sewingdb', $user, $pass );
        $sql = "SELECT * FROM users";
        foreach($pdo->query($sql) as $row) {
            echo "Name: ".$row['user_name']."<br>"." Review: ".$row['user_pw']."<br />";
        }
        ?>
    </body>
</html>
