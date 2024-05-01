<header class="header">
    <div class="header__contenedor">
        <nav class="header__navegacion">

        <?php if(is_auth()) { ?>
            <a href="<?php echo is_admin() ? '/admin/dashboard' : '/finalizar-registro'; ?>" class="header__enlace"><?php echo is_admin() ? 'Administrar' : 'Completa tu compra';?></a>
            <form method="POST" action="/logout" class="header__form">
                <input type="submit" value="Cerrar sesión" class="header__submit">
            </form>
        <?php } else {?>
            <a href="/registro" class="header__enlace">Registro</a>
            <a href="/login" class="header__enlace">Iniciar sesión</a>
        <?php } ?>
        </nav>

        <div class="header__contenido">
            <a href="/">
                <h1 class="header__logo">&#60;DevWebCamp /></h1>
            </a>
            <p class="header__texto">Octubre 5-6 2024</p>
            <p class="header__texto header__texto--modalidad">En línea - presencial</p>
            <a href="/registro" class="header__boton">Inscribirse</a>
        </div>
    </div>
</header>
<div class="barra">
    <div class="barra__contenido">
            <a href="/">
                <h2 class="barra__logo">&#60;DevWebCamp /></h2>
            </a>
            <nav class="navegacion">
                <a href="/devwebcamp" class="navegacion__enlace <?php echo pagina_actual('/devwebcamp') ? 'navegacion__enlace--actual' : '';?>">DWC</a>
                <a href="/planes" class="navegacion__enlace <?php echo pagina_actual('/planes') ? 'navegacion__enlace--actual' : '';?>">Planes</a>
                <a href="/workshops-conferencias" class="navegacion__enlace  <?php echo pagina_actual('/workshops-conferencias') ? 'navegacion__enlace--actual' : '';?>">Workshops / Conferencias</a>
                <a href="/registro" class="navegacion__enlace  <?php echo pagina_actual('/registro') ? 'navegacion__enlace--actual' : '';?>">Entradas</a>
            </nav>
    </div>        
</div>