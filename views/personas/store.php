
<?php if (!empty($message)):?>
<div class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    <?php echo $message?>
</div>
<?php endif?>
<?php if (empty($persona)):?>
<form action="/personas/store" method="post">
    <input type="hidden" name="_method" value="POST">
    <label for="">Cuil</label>
    <input type="text" name="cuil" autofocus required>
    <label for="">Apellido</label>
    <input type="text" name="apellido" autofocus required>
    <label for="">Nombre</label>
    <input type="text" name="nombre" autofocus required>
    <label for="">Persona asociada</label>
    <select name="empresa_id">
        <option>Seleccione la empresa asociada a esta persona</option>
        <?php foreach($empresas as $empresa):?>
            <option value="<?php echo $empresa->id?>"><?php echo "$empresa->id - $empresa->nombre"?></option>
        <?php endforeach?>
    </select>
    <input type="submit" value="Enviar" class="button">
    <a href="/personas" class="button">Atras</a>
</form>
<?php endif?>
<?php if (isset($persona)):?>
<form action="/personas/update" method="post">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="id" value="<?php echo $persona->id?>">
    <label for="">Cuil</label>
    <input type="text" name="cuil" value="<?php echo $persona->cuil?>" autofocus required>
    <label for="">Apellido</label>
    <input type="text" name="apellido" value="<?php echo $persona->apellido?>" autofocus required>
    <label for="">Nombre</label>
    <input type="text" name="nombre" value="<?php echo $persona->nombre?>" autofocus required>
    <select name="empresa_id">
        <option>Seleccione la empresa asociada a esta persona</option>
        <?php foreach($empresas as $empresa):?>
            <option <?php if ($empresa->id == $persona->empresa_id) echo "selected"?> value="<?php echo $empresa->id?>"><?php echo "$empresa->id - $empresa->nombre"?></option>
        <?php endforeach?>
    </select>
    <input type="submit" value="Enviar" class="button">
    <a href="/personas" class="button">Atras</a>
</form>
<?php endif?>
