<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo;?></h2>
    <p class="auth__texto">Se enviarán las instrucciones para la recuperación de tu cuenta. Revisa tu correo personal</p>

    <?php require_once __DIR__ . '/../templates/alertas.php';?>
    
    <form class="formulario" method="POST">
        <div class="formulario__campo">
            <label for="email" class="formulario__label">Email</label>
            <input type="email" class="formulario__input" id="email" name="email">
        </div>

        <input type="submit" class="formulario__submit" value="Recuperar cuenta">
    </form>

    <div class="acciones">
        <a href="/registro" class="acciones__enlace">¿Aún no tienes una cuenta?</a>
        <a href="/login" class="acciones__enlace">Iniciar sesión</a>
    </div>
</main>