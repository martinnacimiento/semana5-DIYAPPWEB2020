<?php if (!empty($message)) : ?>
    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <?php echo $message ?>
    </div>
<?php endif ?>
<?php if (empty($correo)) : ?>
    <form action="/correos/store" method="post">
        <input type="hidden" name="_method" value="POST">
        <label for="">Email</label>
        <input type="text" name="email" autofocus required>
        <label for="">Persona asociada</label>
        <select name="persona_id">
            <option>Seleccione la persona asociada a este correo</option>
            <?php foreach($personas as $persona):?>
                <option value="<?php echo $persona->id?>"><?php echo "$persona->id - $persona->cuil - $persona->apellido $persona->nombre"?></option>
            <?php endforeach?>
        </select>
        <input type="submit" value="Enviar" class="button">
        <a href="/correos" class="button">Atras</a>
    </form>
<?php endif ?>
<?php if (isset($correo)) : ?>
    <form action="/correos/update" method="post">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="id" value="<?php echo $correo->id ?>">
        <label for="">Email</label>
        <input type="text" name="email" value="<?php echo $correo->nro_legajo ?>" autofocus required>
        <label for="">Persona asociada</label>
        <select name="persona_id">
            <?php foreach($personas as $persona):?>
                <option <?php if ($persona->id == $correo->persona_id) echo "selected"?> value="<?php echo $persona->id?>"><?php echo "$persona->id - $persona->cuil - $persona->apellido $persona->nombre"?></option>
            <?php endforeach?>
        </select>
        <input type="submit" value="Enviar" class="button">
        <a href="/correos" class="button">Atras</a>
    </form>
<?php endif ?>