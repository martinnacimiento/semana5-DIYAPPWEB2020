<?php 
use App\Empleado;
$empleados = Empleado::all();
?>
<div class="row">
    <h1>Tabla de empleados</h1>
</div>
<?php if ($message):?>
    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <?php echo $message?>
    </div>
<?php endif?>
<div class="row">
    <a href="/empleados/nuevo" class="button">Nuevo</a>
</div>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nro Legajo</th>
            <th>Dependencia</th>
            <th>Fecha de ingreso</th>
            <th>PersonaID</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($empleados as $empleado): ?>
            <tr>
                <td><?php echo $empleado->id ?></td>
                <td><?php echo $empleado->nro_legajo ?></td>
                <td><?php echo $empleado->dependencia ?></td>
                <td><?php echo $empleado->fecha_ingreso ?></td>
                <td><?php echo $empleado->persona_id?></td>
                <td>
                    <form action="/empleados/editar" method="post">
                        <input type="hidden" name="_method" value="GET">
                        <input type="hidden" name="id" value="<?php echo $empleado->id?>">
                        <input type="submit" value="Editar" class="button button-success">
                    </form>
                    <form action="/empleados/delete" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="id" value="<?php echo $empleado->id?>">
                        <input type="submit" value="Borrar" class="button">
                    </form>
                </td>
            </tr>
        <?php endforeach?>
    </tbody>
</table>
