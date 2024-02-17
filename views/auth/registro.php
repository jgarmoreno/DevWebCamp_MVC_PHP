<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo;?></h2>
    <p class="auth__texto">Únete a nuestra plataforma</p>

    <?php 
        require_once __DIR__ . '/../templates/alertas.php';
    ?>

    <form class="formulario" method="POST" action="/registro">
        <div class="formulario__campo">
            <label for="nombre" class="formulario__label">Nombre</label>
            <input type="text" class="formulario__input" id="nombre" name="nombre" value="<?php echo $usuario->nombre;?>">
        </div>
        <div class="formulario__campo">
            <label for="apellido" class="formulario__label">Apellido</label>
            <input type="text" class="formulario__input" id="apellido" name="apellido" value="<?php echo $usuario->apellido;?>">
        </div>
        <div class="formulario__campo">
            <label for="email" class="formulario__label">Email</label>
            <input type="email" class="formulario__input" id="email" name="email" value="<?php echo $usuario->email;?>">
        </div>
        <div class="formulario__campo">
            <label for="password" class="formulario__label">Contraseña</label>
            <input type="password" class="formulario__input" id="password" name="password">
        </div>
        <div class="formulario__campo">
            <label for="password2" class="formulario__label">Repite tu contraseña</label>
            <input type="password" class="formulario__input" id="password2" name="password2">
        </div>

        <input type="submit" class="formulario__submit" value="Crear cuenta">
    </form>

    <div class="acciones">
        <a href="/olvide" class="acciones__enlace">Olvidé mi contraseña</a>
        <a href="/login" class="acciones__enlace">Iniciar sesión</a>
    </div>
</main>