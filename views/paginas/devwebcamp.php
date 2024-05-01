<main class="devwebcamp">
    <h2 class="devwebcamp__heading"><?php echo $titulo;?></h2>
    <p class="devwebcamp__descripcion">Descubre el evento de desarrollo web más relevante de toda Pangea. Lugares situados fuera del Trópico de Cáncer y de Capricornio quedan excluidos.</p>

     <div class="devwebcamp__grid">
        <div <?php aos_animacion();?> class="devwebcamp__imagen">
            <picture>
                <source srcset="build/img/sobre_devwebcamp.avif" type="image/avif">
                <source srcset="build/img/sobre_devwebcamp.webp" type="image/webp">
                <img loading="lazy" width="200" height="300" src="build/img/sobre_devwebcamp.jpg" alt="Imagen Conferencia DevWebCamp">
            </picture>
        </div>

        <div class="devwebcamp__contenido">
            <p <?php aos_animacion();?> class="devwebcamp__texto">Integer accumsan ex ac arcu dignissim, sit amet vulputate nibh tempus. Integer eu sapien et lacus bibendum venenatis et sed metus. Suspendisse a leo velit. Phasellus odio augue, iaculis tristique nisl at, euismod faucibus lacus. Ut ac nisi vulputate, molestie justo id, ultricies urna.</p>
            <p <?php aos_animacion();?> class="devwebcamp__texto">Nulla turpis erat, egestas quis tincidunt sed, interdum sed quam. Praesent fermentum tempus viverra. Curabitur consequat mattis massa nec fermentum. Proin lacinia tristique bibendum. Aenean tellus erat.</p>
        </div>
     </div>
     <div <?php aos_animacion();?> class="devwebcamp__final">
        <p class="devwebcamp__texto--final">Pellentesque eu dolor vitae risus blandit iaculis et malesuada lectus. Sed sed velit quis est dignissim congue molestie a libero.</p>
     </div>  
</main>