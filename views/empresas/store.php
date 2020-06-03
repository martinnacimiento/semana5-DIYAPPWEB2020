
<?php if (!empty($message)):?>
<div class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    <?php echo $message?>
</div>
<?php endif?>
<?php if (empty($empresa)):?>
<form action="/empresas/store" method="post">
    <input type="hidden" name="_method" value="POST">
    <label for="">Nombre</label>
    <input type="text" name="nombre" autofocus required>
    <input type="submit" value="Enviar" class="button">
    <a href="/empresas" class="button">Atras</a>
</form>
<?php endif?>
<?php if (isset($empresa)):?>
<form action="/empresas/update" method="post">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="id" value="<?php echo $empresa->id?>">
    <label for="">Nombre</label>
    <input type="text" name="nombre" value="<?php echo $empresa->nombre?>" autofocus required>
    <input type="submit" value="Enviar" class="button">
    <a href="/empresas" class="button">Atras</a>
</form>
<?php endif?>
