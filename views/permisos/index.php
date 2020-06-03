<?php 
use App\Permiso;
$permisos = Permiso::all();
?>
<div class="row">
    <h1>Tabla de permisos</h1>
</div>
<?php if ($message):?>
    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <?php echo $message?>
    </div>
<?php endif?>
<div class="row">
    <a href="/permisos/nuevo" class="button">Nuevo</a>
</div>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>slug</th>
            <th>Descripcion</th>
            <th>EmpresaID</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($permisos as $permiso): ?>
            <tr>
                <td><?php echo $permiso->id ?></td>
                <td><?php echo $permiso->slug ?></td>
                <td><?php echo $permiso->description?></td>
                <td><?php echo $permiso->empresa_id?></td>
                <td>
                    <form action="/permisos/editar" method="post">
                        <input type="hidden" name="_method" value="GET">
                        <input type="hidden" name="id" value="<?php echo $permiso->id?>">
                        <input type="submit" value="Editar" class="button button-success">
                    </form>
                    <form action="/permisos/delete" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="id" value="<?php echo $permiso->id?>">
                        <input type="submit" value="Borrar" class="button">
                    </form>
                </td>
            </tr>
        <?php endforeach?>
    </tbody>
</table>
