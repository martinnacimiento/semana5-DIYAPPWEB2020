<?php if (!empty($message)) : ?>
    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <?php echo $message ?>
    </div>
<?php endif ?>
<?php if (empty($permiso)) : ?>
    <form action="/permisos/store" method="post">
        <input type="hidden" name="_method" value="POST">
        <label for="">Slug</label>
        <input type="text" name="slug" autofocus required>
        <label for="">Descripcion</label>
        <textarea type="text" name="description" autofocus required></textarea>
        <label for="">Empresa asociada</label>
        <select name="empresa_id">
            <option>Seleccione la empresa asociada a este permiso</option>
            <?php foreach ($empresas as $empresa) : ?>
                <option value="<?php echo $empresa->id ?>"><?php echo "$empresa->id -  $empresa->nombre" ?></option>
            <?php endforeach ?>
        </select>
        <input type="submit" value="Enviar" class="button">
        <a href="/permisos" class="button">Atras</a>
    </form>
<?php endif ?>
<?php if (isset($permiso)) : ?>
    <form action="/permisos/update" method="post">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="id" value="<?php echo $permiso->id ?>">
        <label for="">Slug</label>
        <input type="text" name="slug" value="<?php echo $permiso->slug ?>" autofocus required>
        <label for="">Descripcion</label>
        <textarea type="text" name="description" autofocus required><?php echo $permiso->description?></textarea>
        <label for="">Empresa asociada</label>
        <select name="empresa_id">
            <?php foreach ($empresas as $empresa) : ?>
                <option <?php if ($empresa->id == $permiso->empresa_id) echo "selected" ?> value="<?php echo $empresa->id ?>"><?php echo "$empresa->id - $empresa->nombre" ?></option>
            <?php endforeach ?>
        </select>
        <input type="submit" value="Enviar" class="button">
        <a href="/permisos" class="button">Atras</a>
    </form>
<?php endif ?>