
    <h2 class="pagina__heading"><?php echo $titulo; ?></h2>
    <p class="pagina__descripcion">Tu plan presencial te permite asistir hasta un mínimo de 5 eventos</p>


<div class="eventos-registro">
    <main class="eventos-registro__listado">
        <h3 class="eventos-registro__heading--conferencias">&lt;Conferencias /></h3>
        <p class="eventos-registro__fecha">Viernes 21 de mayo</p>

        <div class="eventos-registro__grid">
            <?php foreach($eventos['conferencias_v'] as $evento) { ?>
                <?php include __DIR__ . '/evento.php'; ?>
            <?php } ?>
        </div>

        <p class="eventos-registro__fecha">Sábado 22 de mayo</p>
        
        <div class="eventos-registro__grid">
            <?php foreach($eventos['conferencias_s'] as $evento) { ?>
                <?php include __DIR__ . '/evento.php'; ?>
            <?php } ?>
        </div>

        <h3 class="eventos-registro__heading--workshops">&lt;Workshops /></h3>
        <p class="eventos-registro__fecha">Viernes 21 de mayo</p>

        <div class="eventos-registro__grid eventos--workshops">
            <?php foreach($eventos['workshops_v'] as $evento) { ?>
                <?php include __DIR__ . '/evento.php'; ?>
            <?php } ?>
        </div>

        <p class="eventos-registro__fecha">Sábado 22 de mayo</p>
        
        <div class="eventos-registro__grid eventos--workshops">
            <?php foreach($eventos['workshops_s'] as $evento) { ?>
                <?php include __DIR__ . '/evento.php'; ?>
            <?php } ?>
        </div>
    </main>
    <aside class="registro">
        <h2 class="registro__heading">Tu registro</h2>

        <div id="registro-resumen" class="registro__resumen"></div>

        <div class="registro__regalo">
            <label for="regalo" class="registro__label">Escoge tu regalo gratuito</label>
            <select id="regalo" class="registro__select">
                <option selected disabled value="">Elige un producto</option>
                <?php foreach($regalos as $regalo) { ?>
                    <option value="<?php echo $regalo->id;?>"><?php echo $regalo->nombre;?></option>
                <?php } ?>
            </select>
        </div>

        <form id="registro" class="formulario">
            <div class="formulario__campo">
                <input type="submit" class="formulario__submit--full" value="Completar reserva">
            </div>
        </form>
    </aside>
</div>