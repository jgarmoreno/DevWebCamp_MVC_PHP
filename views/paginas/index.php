<?php 
    include_once __DIR__ . '/conferencias.php';
?>

<section class="resumen">
    <div class="resumen__grid">
        <div class="resumen__bloque">
            <p class="resumen__texto--numero"><?php echo $ponentes; ?></p>
            <p class="resumen__texto">Speakers</p>
        </div>
        <div class="resumen__bloque">
            <p class="resumen__texto--numero"><?php echo $conferencias; ?></p>
            <p class="resumen__texto">Conferencias</p>
        </div>
        <div class="resumen__bloque">
            <p class="resumen__texto--numero"><?php echo $workshops; ?></p>
            <p class="resumen__texto">Workshops</p>
        </div>
        <div class="resumen__bloque">
            <p class="resumen__texto--numero">+450</p>
            <p class="resumen__texto">Asistentes</p>
        </div>
    </div>
</section>