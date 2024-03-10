<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información del evento</legend>

    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Nombre</label>
        <input type="text" class="formulario__input" id="nombre" name="nombre" placeholder="Nombre del evento" value="<?php echo $evento->nombre;?>">
    </div>

    <div class="formulario__campo">
        <label for="descripcion" class="formulario__label">Descripción</label>
        <textarea class="formulario__input" id="descripcion" name="descripcion" placeholder="Sin límite de caracteres" rows=8><?php echo $evento->descripcion;?></textarea>
    </div>

    <div class="formulario__campo">
        <label for="imagen" class="formulario__label">Imagen</label>
        <input type="file" class="formulario__input formulario__input--file" id="imagen" name="imagen">
    </div>

    <?php if(isset($evento->imagen_actual)) { ?>
        <p class="formulario__texto">Imagen actual</p>
        <div class="formulario__imagen">
            <picture>
                <source srcset="<?php echo $_ENV['HOST'] . '/images/eventos/' . $evento->imagen;?>.webp" type="image/webp">
                <source srcset="<?php echo $_ENV['HOST'] . '/images/eventos/' . $evento->imagen;?>.png" type="image/png">
                <img src="<?php echo $_ENV['HOST'] . '/images/eventos/' . $evento->imagen;?>.png" alt="Imagen evento">
            </picture>
        </div>
    <?php } ?>

    <div class="formulario__campo">
        <label for="categoria" class="formulario__label">Categoría del evento</label>
        <select class="formulario__select" id="categoria" name="categoria_id">
            <option selected disabled value="">Seleccione una opción</option>
            <?php foreach($categorias as $categoria) { ?>
                <option <?php echo ($evento->categoria_id === $categoria->id) ? 'selected ' : '' ?>value="<?php echo $categoria->id; ?>"><?php echo $categoria->nombre; ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="formulario__campo">
        <label for="descripcion" class="formulario__label">Seleccione el día</label>
        <div class="formulario__radio">
            <?php foreach($dias as $dia) { ?>
                <div>
                    <label for="<?php echo strtolower($dia->nombre); ?>"><?php echo $dia->nombre; ?></label>

                    <input type="radio" id="<?php echo strtolower($dia->nombre); ?>" name="dia" value="<?php echo $dia->id; ?>">
                </div>
            <?php } ?>
        </div>
    </div>

    <div id="horas" class="formulario__campo">
            <label class="formulario__label">Seleccione las horas</label>

            <ul class="horas">
                <?php foreach($horas as $hora) { ?>
                    <li class="horas__hora"><?php echo $hora->hora;?></li>
                <?php } ?>
            </ul>
    </div>
</fieldset>

<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información extra</legend>

    <div class="formulario__campo">
        <label for="ponentes" class="formulario__label">Ponente</label>
        <input type="text" class="formulario__input" id="ponentes" placeholder="Nombre del ponente">
    </div>

    <div class="formulario__campo">
        <label for="disponibles" class="formulario__label">Aforo</label>
        <input type="number" min="1" max="3000" class="formulario__input" id="disponibles" name="disponibles" placeholder="Número de entradas disponibles" value="<?php echo $evento->disponibles; ?>">
    </div>
</fieldset>