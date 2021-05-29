<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <body>
    <?php
        $user = "review_site";
        $pass = "JxSLRkdutW";
        $pdo = new PDO('mysql:host=localhost;dbname=reviews', $user, $pass );
        $sql = "SELECT * FROM user_review";
        foreach($pdo->query($sql) as $row) {
            echo $row['reviewer_name']."<br />";
        }
        ?>
    </body>
</html>
