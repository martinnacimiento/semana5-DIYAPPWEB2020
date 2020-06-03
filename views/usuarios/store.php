<?php if (!empty($message)) : ?>
    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <?php echo $message ?>
    </div>
<?php endif ?>
<?php if (empty($usuario)) : ?>
    <form action="/usuarios/store" method="post">
        <input type="hidden" name="_method" value="POST">
        <label for="">Nombre de usuario</label>
        <input type="text" name="username" autofocus required>
        <label for="">Contrasenia</label>
        <input type="password" name="password" required>
        <label for="">Empresa asociada</label>
        <select name="empresa_id">
            <option>Seleccione la empresa asociada a este usuario</option>
            <?php foreach($empresas as $empresa):?>
                <option value="<?php echo $empresa->id?>"><?php echo "$empresa->id - $empresa->nombre"?></option>
            <?php endforeach?>
        </select>
        <label for="">Permisos</label>
        <select name="permisos[]" multiple>
            <option>Seleccione los permisos para el usuario</option>
            <?php foreach($permisos as $permiso):?>
                <option value="<?php echo $permiso->id?>"><?php echo "$permiso->slug - $permiso->description"?></option>
            <?php endforeach?>
        </select>
        <input type="submit" value="Enviar" class="button">
        <a href="/usuarios" class="button">Atras</a>
    </form>
<?php endif ?>
<?php if (isset($usuario)) : ?>
    <form action="/usuarios/update" method="post">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="id" value="<?php echo $usuario->id ?>">
        <label for="">Nombre de usuario</label>
        <input type="text" name="username" value="<?php echo $usuario->username ?>" autofocus required>
        <label for="">Contrasenia</label>
        <input type="password" name="password" value="<?php echo $usuario->password ?>" required>
        <label for="">Empresa asociada</label>
        <select name="empresa_id">
            <?php foreach($empresas as $empresa):?>
                <option <?php if ($empresa->id == $usuario->empresa_id) echo "selected"?> value="<?php echo $empresa->id?>"><?php echo "$empresa->id - $empresa->nombre"?></option>
            <?php endforeach?>
        </select>
        <label for="">Permisos</label>
        </select><select name="permisos[]" multiple>
            <option>Seleccione los permisos para el usuario</option>
            <?php foreach($permisos as $permiso):?>
                <option value="<?php echo $permiso->id?>"><?php echo "$permiso->slug - $permiso->description"?></option>
            <?php endforeach?>
        </select>
        <input type="submit" value="Enviar" class="button">
        <a href="/usuarios" class="button">Atras</a>
    </form>
<?php endif ?>