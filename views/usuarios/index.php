<?php 
use App\Usuario;
$usuarios = Usuario::all();
?>
<div class="row">
    <h1>Tabla de usuarios</h1>
</div>
<?php if ($message):?>
    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <?php echo $message?>
    </div>
<?php endif?>
<div class="row">
    <a href="/usuarios/nuevo" class="button">Nuevo</a>
</div>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre de usuario</th>
            <th>EmpresaID</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?php echo $usuario->id ?></td>
                <td><?php echo $usuario->username ?></td>
                <td><?php echo $usuario->empresa_id?></td>
                <td>
                    <form action="/usuarios/editar" method="post">
                        <input type="hidden" name="_method" value="GET">
                        <input type="hidden" name="id" value="<?php echo $usuario->id?>">
                        <input type="submit" value="Editar" class="button button-success">
                    </form>
                    <form action="/usuarios/delete" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="id" value="<?php echo $usuario->id?>">
                        <input type="submit" value="Borrar" class="button">
                    </form>
                </td>
            </tr>
        <?php endforeach?>
    </tbody>
</table>
