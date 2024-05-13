<main class="boleto">
    <h2 class="boleto__heading"><?php echo $titulo;?></h2>
    <div class="boleto__grid">
        <div class="boleto__mensaje">
            <div class="boleto__imagen"> 
                <i class="fa-solid fa-check" style="color: #007df4; font-size:90px;"></i>
            </div>
            <p class="boleto__descripcion">¡Aquí tienes tu entrada!</p>
        </div>
        <div class="boleto__mensaje">
            <div class="boleto__imagen"> 
                <i class="fa-solid fa-envelope" style="color: #007df4; font-size:90px;"></i>
            </div>
            <p class="boleto__descripcion">Te hemos enviado el código de tu entrada, pero también puedes verlo aquí</p>
        </div>
        <div class="boleto__mensaje">
            <div class="boleto__imagen"> 
                <i class="fa-solid fa-share-nodes" style="color: #007df4; font-size:90px;"></i>
            </div>
            <p class="boleto__descripcion">Comparte en Redes</p>
        </div>
    </div>

    <p class="boleto__codigo"><?php echo '#'. $registro->token;?></p>

    <div class="entrada entrada--<?php echo strtolower($registro->plan->nombre);?> entrada--acceso">
        <div class="entrada__contenido">
            <h4 class="entrada__logo">&#60;DevWebCamp /></h4>
            <p class="entrada__plan"><?php echo $registro->plan->nombre;?></p>
            <p class="entrada__nombre"><?php echo $registro->usuario->nombre . " ". $registro->usuario->apellido;?></p>
        </div>

        <p class="entrada__codigo"><?php echo '#'. $registro->token;?></p>
    </div>
</main>