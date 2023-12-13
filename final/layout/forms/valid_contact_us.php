
<div class="horizontal-divider"></div>

<div class="section">
    <h2>Descripción</h2>
    <p>Texto</p>
    <p>Mantenimiento</p>
</div>

<div class="horizontal-divider"></div> 
</div>

<div class="contenedor-form">
<form action="sendEmailToAgent.php"  method="post">

    <div class="info-row">
        <div class="info-group">
            <label for="informacion"><h3>Información del contacto</h3></label>
          
        </div>
        <div class="btn-ver-listados">
            <button type="button" class="btn btn-dark">Ver Listados</button>
        </div>
    </div>

    <h4>Consultar sobre esta propiedad</h4>
    <br>

    <div class="form-row">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="input-contact-us" id="nombre" name="nombre" placeholder="Introduzca su nombre" required>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" class="input-contact-us" id="telefono" name="telefono" placeholder="Introduzca su nombre" required>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group">
            <label for="correo">Correo Electrónico</label>
            <input type="email" class="input-contact-us" id="correo" name="correo" placeholder="Introduzca su correo" required>
        </div>
    </div>

    <div class="mensaje-group">
        <label for="mensaje">Mensaje</label>
        <textarea class="form-control" id="mensaje" name="mensaje" rows="4" required>
            Estoy interesado en la propiedad [Propiedad]
        </textarea>
    </div>

    <div class="checkbox-group">
        <input type="checkbox" id="acepto" name="acepto" required>
        <label for="acepto"> Al enviar este formulario acepto terminos y condiciones de uso</label>
    </div>

    <div class="form-row">
        <button type="submit" value="Enviar correo" class="btn-informacion">Información requerida</button>
    </div>

</form>
</div>



<div class="contenedor-agente">
<div class="agente-izquierdo">
    <img src="../img/agente.png" alt="Foto del agente">
    <br>
    <h4>Ismael Delgado Rodríguez </h4>
    <br> 
    <h5>Agente de ventas</h5>
    <br> 
    <h5>Grupo BienesRaices Paitilla</h5>
    <br>
    <div class="work-company">
        <img class="img-company" src="../img/BienesRaices.png" alt="">
    </div>
    <p>Agente de venta Grupo BienesRaices Punta Paitlla, frente al supermercado Kosher</p>
    <br>
    <h4>Télefono</h4>
    <div class="telefono-info">
        <br>
        <img src="../img/call-16.png" alt="Icono de teléfono"> 6159-4914
       
    </div>
    <br>
    <div class="telefono-info">
        <img src="../img/call-16.png" alt="Icono de teléfono" > 240-8842
    </div>

    <button class="btn-agente">Más anuncios de este vendedor</button>
</div>

<div class="agente-derecho">
    <h4>Horas de contacto</h4>
    <br>
    <h5> <img src="../img/icons8-time-16.png" alt=""> Hoy (Abierto)  00:00 - 00:00</h5>
        <br><br><br><br><br><br>
        <br>
        <p>Lunes 00:00 - 00:00</p>
        <p>Martes 00:00 - 00:00</p>
        <p>Miércoles 00:00 - 00:00</p>
        <p>Jueves 00:00 - 00:00</p>
        <p>Viernes 00:00 - 00:00</p>
        <p>Sábado 00:00 - 00:00</p>
        <p>Domingo 00:00 - 00:00</p>
        <br><br><br><br><br><br><br><br><br><br><br><br><br>
    <button class="btn-whatsapp">Enviar WhatsApp</button>
</div>
</div>
