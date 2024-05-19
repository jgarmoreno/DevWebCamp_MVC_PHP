<div class="agenda">
    <h2 class="agenda__heading--superior">Disponibilidad de los eventos</h2>

    <div class="eventos">
        <h3 class="eventos__heading">&lt;Conferencias /></h3>
        <p class="eventos__fecha">Viernes 21 de mayo</p>
    
        <div class="evento__listado slider swiper">
            <div class="swiper-wrapper">
            <?php foreach($eventos['conferencias_v'] as $evento) { ?>
                <?php include __DIR__ . '/../../templates/eventoDisponible.php'; ?>
            <?php } ?>
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

        <p class="eventos__fecha">Sábado 22 de mayo</p>
        <div class="evento__listado slider swiper">
            <div class="swiper-wrapper">
            <?php foreach($eventos['conferencias_s'] as $evento) { ?>
                <?php include __DIR__ . '/../../templates/eventoDisponible.php'; ?>
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
                <?php include __DIR__ . '/../../templates/eventoDisponible.php'; ?>
            <?php } ?>
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

        <p class="eventos__fecha">Sábado 22 de mayo</p>
        <div class="evento__listado slider swiper">
            <div class="swiper-wrapper">
            <?php foreach($eventos['workshops_s'] as $evento) { ?>
                <?php include __DIR__ . '/../../templates/eventoDisponible.php'; ?>
            <?php } ?>
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>

</div>