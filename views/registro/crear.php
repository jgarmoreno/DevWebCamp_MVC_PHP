<main class="registro">
    <h2 class="registro__heading"><?php echo $titulo;?></h2>
    <p class="registro__descripcion">Elige un plan de pago para completar tu registro</p>

    <div class="planes__grid">
        <div <?php aos_animacion();?> class="plan">
            <h3 class="plan__nombre">Pase gratuito</h3>
            <ul class="plan__lista">
                <li class="plan__elemento">
                    Acceso virtual a DevWebCamp
                </li>
            </ul>

            <p class="plan__precio">0 €</p>

            <form method="POST" action="/finalizar-registro/gratis">
                <input class="planes__submit" type="submit" value="Inscríbete gratis">
            </form>
        </div>
        <div <?php aos_animacion();?> class="plan">
            <h3 class="plan__nombre">Pase presencial</h3>
            <ul class="plan__lista">
                <li class="plan__elemento">
                    Acceso virtual a DevWebCamp
                </li>
                <li class="plan__elemento">
                    Duración de dos días
                </li>
                <li class="plan__elemento">
                    Acceso a talleres y conferencias
                </li>
                <li class="plan__elemento">
                    Acceso a las grabaciones en diferido
                </li>
                <li class="plan__elemento">
                    Camiseta del evento
                </li>
                <li class="plan__elemento">
                    Comida y bebida
                </li>
                <li class="plan__elemento">
                    Acceso virtual a DevWebCamp
                </li>
            </ul>

            <p class="plan__precio">70 €</p>

            <div id="smart-button-container">
                <div style="text-align: center;">
                    <div id="paypal-button-container"></div>
                </div>
            </div>
        </div>
        <div <?php aos_animacion();?> class="plan">
            <h3 class="plan__nombre">Pase virtual</h3>
            <ul class="plan__lista">
                <li class="plan__elemento">
                    Acceso virtual a DevWebCamp
                </li>
                <li class="plan__elemento">
                    Duración de dos días
                </li>
                <li class="plan__elemento">
                    Acceso a talleres y conferencias
                </li>
                <li class="plan__elemento">
                    Acceso a las grabaciones en diferido
                </li>
            </ul>

            <p class="plan__precio">40 €</p>

            <div id="smart-button-container">
                <div style="text-align: center;">
                    <div id="paypal-button-container-virtual"></div>
                </div>
            </div>
        </div>
        </div>
</main>

<script src="https://www.paypal.com/sdk/js?client-id=ARU4EtH-wjFNGimLiWnKHBytqVd2wwZxL1WbEJWZtoMTNrhXjl_vImxPLzGAQ1vcsycUYBAayNEJ8aDP&enable-funding=venmo&currency=EUR" data-sdk-integration-source="button-factory"></script>
 
<script>
    // Pase presencial
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'blue',
          layout: 'vertical',
          label: 'pay',
        },
 
        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"description":"1","amount":{"currency_code":"EUR","value":70}}]
          });
        },
 
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
 
            const datos = new FormData();
            datos.append('plan_id', orderData.purchase_units[0].description);
            datos.append('pago_id', orderData.purchase_units[0].payments.captures[0].id);

            fetch('/finalizar-registro/pago', {
                method: 'POST',
                body: datos
            })
            .then(respuesta => respuesta.json())
            .then(resultado=>{
                if(resultado.resultado) {
                    actions.redirect('http://localhost:3000/finalizar-registro/conferencias');
                }
            });
            
          });
        },
 
        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
    }

    // Pase virtual

      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'blue',
          layout: 'vertical',
          label: 'pay',
        },
 
        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"description":"2","amount":{"currency_code":"EUR","value":40}}]
          });
        },
 
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
 
            const datos = new FormData();
            datos.append('plan_id', orderData.purchase_units[0].description);
            datos.append('pago_id', orderData.purchase_units[0].payments.captures[0].id);

            fetch('/finalizar-registro/pago', {
                method: 'POST',
                body: datos
            })
            .then(respuesta => respuesta.json())
            .then(resultado=>{
                if(resultado.resultado) {
                    actions.redirect('http://localhost:3000/finalizar-registro/conferencias');
                }
            });
            
          });
        },
 
        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container-virtual');

 
 
      initPayPalButton();
</script>