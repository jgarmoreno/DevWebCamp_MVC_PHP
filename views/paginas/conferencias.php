<main class="agenda">
    <h2 class="agenda__heading">Workshops <span>/&/</span> Conferencias</h2>
    <p class="agenda__descripcion">Descubre nuestra amplia categoría de talleres y conferencias de los ponentes más reconocidos del sector (que han aceptado firmar el acuerdo de colaboración)</p>

    <div class="eventos">
        <h3 class="eventos__heading">&lt;Conferencias /></h3>
        <p class="eventos__fecha">Viernes 21 de mayo</p>
    
        <div class="evento__listado slider swiper">
            <div class="swiper-wrapper">
            <?php foreach($eventos['conferencias_v'] as $evento) { ?>
                <?php include __DIR__ . '../../templates/evento.php'; ?>
            <?php } ?>
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

        <p class="eventos__fecha">Sábado 22 de mayo</p>
        <div class="evento__listado slider swiper">
            <div class="swiper-wrapper">
            <?php foreach($eventos['conferencias_s'] as $evento) { ?>
                <?php include __DIR__ . '../../templates/evento.php'; ?>
            <?php } ?>
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
    <div class="eventos eventos--workshops">
        <h3 class="eventos__heading">&lt;Workshops /></h3>
        <p class="eventos__fecha">Viernes 21 de mayo</p>
    
        <div class="evento__listado slider swiper">
            <div class="swiper-wrapper">
            <?php foreach($eventos['workshops_v'] as $evento) { ?>
                <?php include __DIR__ . '../../templates/evento.php'; ?>
            <?php } ?>
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

        <p class="eventos__fecha">Sábado 22 de mayo</p>
        <div class="evento__listado slider swiper">
            <div class="swiper-wrapper">
            <?php foreach($eventos['workshops_s'] as $evento) { ?>
                <?php include __DIR__ . '../../templates/evento.php'; ?>
            <?php } ?>
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>

</main>