<div class="evento swiper-slide">
                    <p class="evento__hora"><?php echo $evento->hora->hora;?></p>

                    <div class="evento__informacion">
                        <?php if($evento->disponibles > 0) { ?>
                        <h4 class="evento__nombre"><?php echo $evento->nombre;?></h4>

                        <p class="evento__aforo"><?php echo $evento->disponibles;?> Plazas</p>

                        <?php } else { ?>
                            <h4 class="evento__nombre"><?php echo $evento->nombre;?></h4>
                            <p class="evento__aforo--agotado">Agotado</p>
                        <?php } ?>
                    </div>
                </div>