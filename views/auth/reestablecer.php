<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo;?></h2>
    <p class="auth__texto">Reestablece tu nueva contraseña</p>

    <?php require_once __DIR__ . '/../templates/alertas.php';?> 

    <?php if(!$token_valido) { ?> 
        <div class="acciones--centrar">
            <a class="acciones__btn" href="/olvide">Recuperar cuenta</a>
        </div>
    <?php } ?>

    <?php if($token_valido) { ?>
    <form class="formulario" method="POST">
        <div class="formulario__campo">
            <label for="password" class="formulario__label">Nueva contraseña</label>
            <input type="password" class="formulario__input" id="password" name="password">
        </div>
        <div class="formulario__campo">
            <label for="password2" class="formulario__label">Repite tu contraseña</label>
            <input type="password" class="formulario__input" id="password2" name="password2">
        </div>

        <input type="submit" class="formulario__submit" value="Actualizar cambios">
    </form>
    <?php } ?>

    <div class="acciones">
        <a href="/login" class="acciones__enlace">Iniciar sesión</a>
        <a href="/registro" class="acciones__enlace">¿Aún no tienes una cuenta?</a>
    </div>
</main>