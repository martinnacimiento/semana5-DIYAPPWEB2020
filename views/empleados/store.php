<?php if (!empty($message)) : ?>
    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <?php echo $message ?>
    </div>
<?php endif ?>
<?php if (empty($empleado)) : ?>
    <form action="/empleados/store" method="post">
        <input type="hidden" name="_method" value="POST">
        <label for="">Nro legajo</label>
        <input type="text" name="nro_legajo" autofocus required>
        <label for="">Dependencia</label>
        <input type="text" name="dependencia" autofocus required>
        <label for="">Fecha de ingreso</label>
        <input type="date" name="fecha_ingreso" autofocus required>
        <label for="">Persona asociada</label>
        <select name="persona_id">
            <option>Seleccione la persona asociada a este empleado</option>
            <?php foreach($personas as $persona):?>
                <option value="<?php echo $persona->id?>"><?php echo "$persona->id - $persona->cuil - $persona->apellido $persona->nombre"?></option>
            <?php endforeach?>
        </select>
        <input type="submit" value="Enviar" class="button">
        <a href="/empleados" class="button">Atras</a>
    </form>
<?php endif ?>
<?php if (isset($empleado)) : ?>
    <form action="/empleados/update" method="post">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="id" value="<?php echo $empleado->id ?>">
        <label for="">Nro legajo</label>
        <input type="text" name="nro_legajo" value="<?php echo $empleado->nro_legajo ?>" autofocus required>
        <label for="">Dependencia</label>
        <input type="text" name="dependencia" value="<?php echo $empleado->dependencia ?>" autofocus required>
        <label for="">Fecha ingreso</label>
        <input type="text" name="fecha_ingreso" value="<?php echo $empleado->fecha_ingreso ?>" autofocus required>
        <label for="">Persona asociada</label>
        <select name="persona_id">
            <?php foreach($personas as $persona):?>
                <option <?php if ($persona->id == $empleado->persona_id) echo "selected"?> value="<?php echo $persona->id?>"><?php echo "$persona->id - $persona->cuil - $persona->apellido $persona->nombre"?></option>
            <?php endforeach?>
        </select>
        <input type="submit" value="Enviar" class="button">
        <a href="/empleados" class="button">Atras</a>
    </form>
<?php endif ?>