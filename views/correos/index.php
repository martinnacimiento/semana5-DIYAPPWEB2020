<?php 
use App\Correo;
$correos = Correo::all();
?>
<div class="row">
    <h1>Tabla de correos</h1>
</div>
<?php if ($message):?>
    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <?php echo $message?>
    </div>
<?php endif?>
<div class="row">
    <a href="/correos/nuevo" class="button">Nuevo</a>
</div>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>PersonaID</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($correos as $correo): ?>
            <tr>
                <td><?php echo $correo->id ?></td>
                <td><?php echo $correo->email ?></td>
                <td><?php echo $correo->persona_id?></td>
                <td>
                    <form action="/correos/editar" method="post">
                        <input type="hidden" name="_method" value="GET">
                        <input type="hidden" name="id" value="<?php echo $correo->id?>">
                        <input type="submit" value="Editar" class="button button-success">
                    </form>
                    <form action="/correos/delete" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="id" value="<?php echo $correo->id?>">
                        <input type="submit" value="Borrar" class="button">
                    </form>
                </td>
            </tr>
        <?php endforeach?>
    </tbody>
</table>
