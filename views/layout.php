<?php 
use App\Usuario;
if (isset($_SESSION['user_id'])) {
    $user = Usuario::find($_SESSION['user_id']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravim</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <div>
                <a href="/">Semana 5</a>
            </div>
            <div></div>
            <?php if(isset($user)):?>
                <p><?php echo $user->username?></p>
                <div><a href="/logout" class="button">Salir</a></div>
            <?php endif?>
        </div>
        <div class="content">
            <?php include("$content"); ?>
        </div>
        <div class="footer">Hecho por Nacimiento Martin</div>
    </div>
</body>
</html>