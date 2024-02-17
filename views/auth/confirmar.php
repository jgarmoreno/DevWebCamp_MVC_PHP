<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo;?></h2>
    <p class="auth__texto">¡Bienvenido a <span class="auth__span">&#60;DevWebCamp /></span>!</p>
    <?php 
        require_once __DIR__ . '/../templates/alertas.php';
    ?>
    <?php if(isset($alertas['exito'])) { ?>
        <div class="acciones--centrar">
            <a class="acciones__btn" href="/login">Iniciar sesión</a>
        </div>
    <?php } ?>
</main>