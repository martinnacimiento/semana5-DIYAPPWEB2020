<?php 
use App\Empresa;
$empresas = Empresa::all();
?>
<div class="row">
    <h1>Tabla de empresas</h1>
</div>
<?php if ($message):?>
    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <?php echo $message?>
    </div>
<?php endif?>
<div class="row">
    <a href="/empresas/nuevo" class="button">Nuevo</a>
</div>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($empresas as $empresa): ?>
            <tr>
                <td><?php echo $empresa->id ?></td>
                <td><?php echo $empresa->nombre?></td>
                <td>
                    <form action="/empresas/editar" method="post">
                        <input type="hidden" name="_method" value="GET">
                        <input type="hidden" name="id" value="<?php echo $empresa->id?>">
                        <input type="submit" value="Editar" class="button button-success">
                    </form>
                    <form action="/empresas/delete" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="id" value="<?php echo $empresa->id?>">
                        <input type="submit" value="Borrar" class="button">
                    </form>
                </td>
            </tr>
        <?php endforeach?>
    </tbody>
</table>
