<?php if (!empty($message)):?>
<div class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    <?php echo $message?>
</div>
<?php endif?>
<form action="/login" method="post">
    <input type="hidden" name="_method" value="POST">
    <label for="">Nombre de usuario</label>
    <input type="text" name="username" autofocus required>
    <label for="">Contrasenia</label>
    <input type="password" name="password" autofocus required>
    <input type="submit" value="Logearse" class="button">
</form>