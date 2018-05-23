<?php
require_once '../connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Poster un message</title>
</head>
<body>
<?php
$edit =" SELECT         
           `id`, 
           `imgAlt`, 
           `imgSrc`, 
           `description`
           FROM
            `boiteimage`
            WHERE
            `id`= :id
            
            ;";
$stmt = $pdo->prepare($edit);
$stmt->bindValue(':id', $_GET['id']);
$stmt->execute();
?>
<a href="index.php">retourner vers la page admin</a>
<a href="show.php">retourner vers la page show</a>
<?php if (false !== $row = $stmt->fetch(PDO::FETCH_ASSOC)) :?>
    tu est sur de vouloir suprimé la page de <?=$row["description"]?>
<form  action="doDelete.php" method="post">
    <input  id="prodId" name="id" type="hidden" value="<?=$row["id"]?>">
    <input type="submit" name="submit" value="Oui" class="envoie">
</form>
    <a href="show.php">non</a>
<?php endif;?>
</body>
</html>
