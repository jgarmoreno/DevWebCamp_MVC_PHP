<h2 class="dashboard__heading"><?php echo $titulo;?></h2>

<main class="bloques">
    <div class="bloques__grid">
        <div class="bloque">
            <h3 class="bloque__heading">Últimos registros</h3>
            <div class="bloque__grid">
                <div class="bloque__registrados">
                    <?php foreach($registros as $registro) { ?>
                        <div class="bloque__contenido">
                            <div class="bloque__icono">
                                <i class="fa-solid fa-user-plus" style="color: #02db02;"></i>
                            </div>
                            <p class="bloque__texto"><?php echo $registro->usuario->nombre . " " . $registro->usuario->apellido;?></p>
                        </div>
                    <?php } ?>
                </div>
                <div class="bloque__totales">
                    <div class="bloque__texto--totalReg"><?php echo $usuariosTotal;?><i class="fa-solid fa-user"></i></div>
                    <div class="bloque__texto--totalReg"><?php echo $registrosTotal;?><i class="fa-solid fa-ticket"></i></div>
                </div>
            </div>
        </div>
        <div class="bloque">
            <h3 class="bloque__heading">Ingresos obtenidos</h3>
            <p class="bloque__texto--cantidad"><?php echo $ingresos;?> €</p>
        </div>
        <div class="bloque">
            <h3 class="bloque__heading">Total de eventos</h3>
            <p class="bloque__texto--total"><?php echo $eventos;?></p>
        </div>
        <div class="bloque">
            <h3 class="bloque__heading">Total de ponentes</h3>
            <p class="bloque__texto--total"><?php echo $ponentes;?></p>
        </div>
        <div class="bloque">
            <h3 class="bloque__heading">Eventos a promocionar</h3>
            <div class="bloque__grid">
                <div class="bloque__registrados">
                    <?php foreach($eventos_publicitar as $evento_publicitar) { ?>
                        <div class="bloque__contenido">
                            <div class="bloque__icono">
                                <i class="fa-solid fa-bullseye bloque__icono--total fa-xl" style="color: #02db02;"></i>
                            </div>
                            <p class="bloque__texto"><?php echo $evento_publicitar->nombre . " //  <span>" . $evento_publicitar->disponibles;?> plazas</span></p>
                        </div>
                    <?php } ?>
                </div>
                <div class="bloque__totales">
                    <div class="bloque__texto--total"><?php echo $total_publicitar;?></div>
                </div>
            </div>
        </div>
        <div class="bloque">
            <h3 class="bloque__heading">Eventos por agotarse</h3>
            <div class="bloque__grid">
                <div class="bloque__registrados">
                    <?php foreach($eventos_en_riesgo as $evento_en_riesgo) { ?>
                        <div class="bloque__contenido">
                            <div class="bloque__icono">
                                <i class="fa-solid fa-exclamation bloque__icono--riesgo" style="color: #fc9003;"></i>
                            </div>
                            <p class="bloque__texto"><?php echo $evento_en_riesgo->nombre . " //  <span>" . $evento_en_riesgo->disponibles;?> plazas</span></p>
                        </div>
                    <?php } ?>
                </div>
                <div class="bloque__totales">
                    <div class="bloque__texto--riesgo"><?php echo $riesgo_total;?></div>
                </div>
            </div>
        </div>
        <div class="bloque">
            <h3 class="bloque__heading">Eventos agotados</h3>
            <div class="bloque__grid">
                <div class="bloque__registrados">
                    <?php foreach($eventos_agotados as $evento_agotado) { ?>
                        <div class="bloque__contenido">
                            <div class="bloque__icono">
                                <i class="fa-solid fa-exclamation bloque__icono--riesgo" style="color: #f60000;"></i>
                            </div>
                            <p class="bloque__texto"><?php echo $evento_agotado->nombre;?></p>
                        </div>
                    <?php } ?>
                </div>
                <div class="bloque__totales">
                    <div class="bloque__texto--agotado"><?php echo $total_agotados;?></div>
                </div>    
            </div>
        </div>

    </div>
</main>