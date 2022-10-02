<?php
$pdo = new PDO("mysql:host=localhost;dbname=blueshop;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<html>
    <head><meta charset="utf-8"></head>
    <body>
        <?php
        $stmt = $pdo->prepare("SELECT * FROM member WHERE username = ?");
        $value = $_GET["username"];
        $stmt->bindParam(1, $value); 
        $stmt->execute();
        $row = $stmt->fetch()
        ?>
        <div style="display:flex; align-items: center;">
            <div>
                <img src='member_photo/<?=$row["username"]?>.jpg' width='100'>
            </div>
            <div style="padding-left : 10px;">
                ชื่อ : <?=$row["name"]?> <br>
                ที่อยู่ : <?=$row["address"]?> <br>
                อีเมล : <?=$row["email"]?> <br>
            </div>
        </div>
    </body>
</html>