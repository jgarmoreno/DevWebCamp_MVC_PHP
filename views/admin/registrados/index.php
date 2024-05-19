<h2 class="dashboard__heading"><?php echo $titulo;?></h2>


<div class="dashboard__contenedor">
    <?php if(!empty($registros)) { ?>
        <table class="table">
            <thead class="table__thead">
                <tr class="table__tr">
                    <th scope="col" class="table__th">Nombre</th>
                    <th scope="col" class="table__th">Email</th>
                    <th scope="col" class="table__th">Identificador</th>
                    <th scope="col" class="table__th">Plan</th>
                </tr>
            </thead>
            <tbody class="tablet__tbody">
                <?php foreach($registros as $registro) { ?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $registro->usuario->nombre . " " . $registro->usuario->apellido;?>
                        </td>
                        <td class="table__td">
                            <?php echo $registro->usuario->email;?>
                        </td>
                        <td class="table__td">
                            #<?php echo strtoupper($registro->token);?>
                        </td>
                        <td class="table__td">
                            <?php echo $registro->plan->nombre;?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php
            echo $paginacion;
        ?>
    <?php } else { ?>
        <p class="text-center">No hay ningún registro</p>
    <?php } ?>
    <?php if(!empty($registros)) {
            include_once __DIR__ . '/conferencias.php';
    } ?>
</div>

