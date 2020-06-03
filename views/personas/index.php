<?php 
use App\Persona;
$personas = Persona::all();
?>
<div class="row">
    <h1>Tabla de personas</h1>
</div>
<?php if ($message):?>
    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <?php echo $message?>
    </div>
<?php endif?>
<div class="row">
    <a href="/personas/nuevo" class="button">Nuevo</a>
</div>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Cuil</th>
            <th>Apellido</th>
            <th>Nombres</th>
            <th>Empresa</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($personas as $persona): ?>
            <tr>
                <td><?php echo $persona->id ?></td>
                <td><?php echo $persona->cuil ?></td>
                <td><?php echo $persona->apellido ?></td>
                <td><?php echo $persona->nombre?></td>
                <td><?php echo $persona->getEmpresa()->nombre?></td>
                <td>
                    <form action="/personas/editar" method="post">
                        <input type="hidden" name="_method" value="GET">
                        <input type="hidden" name="id" value="<?php echo $persona->id?>">
                        <input type="submit" value="Editar" class="button button-success">
                    </form>
                    <form action="/personas/delete" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="id" value="<?php echo $persona->id?>">
                        <input type="submit" value="Borrar" class="button">
                    </form>
                </td>
            </tr>
        <?php endforeach?>
    </tbody>
</table>
