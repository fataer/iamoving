<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <style>
        h5{
        text-align: center;
        text-transform: uppercase;
        }		
        h1{
        text-align: center;
        text-transform: uppercase;
        }
		.texto-justificado{
		text-align: justify;
		}
		.texto-justificado-derecha{
		text-align: right;
		}		
        .contenido{
        font-size: 16px;
        }
        #primero{
        background-color: #ccc;
        }
        #segundo{
        color:#44a359;
        }
        #tercero{
        text-decoration:line-through;
        }
    </style>
    </head>
    <body>
        
        <div class="contenido">
            			<p><b>Fecha de solicitud de visita</b>: <?php   if (isset($fecha_letra))
																{echo $fecha_letra;}
															else
																{echo '..........................';}
															?></p>

			<h1>10.- Términos de intermediación de IAMOVING ONLINE, S.L. para comprador</h1>

			<h5>10.1.- EL COMPRADOR RECONOCE Y ACEPTA LA INTERMEDIACIÓN DE IAMOVING ONLINE, S.L.</h5>
<p>El COMPRADOR declara expresamente que, con anterioridad a la solicitud de visita presencial realizada a través de IAMOVING ONLINE, S.L., no tenía conocimiento previo de la oferta de venta del inmueble objeto de su solicitud, ni había recibido información, contacto o presentación del mismo por ningún otro medio o canal, directamente de la propiedad o a través de cualquier otro intermediario distinto de IAMOVING ONLINE, S.L.</p>      
            <p>Asimismo, manifiesta no haber visitado previamente dicho inmueble de manera presencial ni virtual por medio de otras agencias inmobiliarias, terceras personas o directamente con la propiedad.</p>             
            <p>El COMPRADOR, al solicitar la visita presencial, declara que ha proporcionado sus datos personales de forma veraz y voluntaria, y confirma que ha leído, comprendido y acepta todos los términos de intermediación de IAMOVING ONLINE, S.L. para comprador que se mencionan en este documento.</p>
            <p>La intermediación de IAMOVING ONLINE, S.L. se inicia cuando un usuario COMPRADOR solicita una visita presencial a un inmueble publicado en <a href="https://www.iamoving.com" style="color:#EADD03;">www.iamoving.com</a> (LA PLATAFORMA), titularidad de IAMOVING ONLINE, S.L., con C.I.F. B-88297825.</p>
            <p><b>Datos de contacto:</b></p>
            <p>&nbsp;&nbsp;·Teléfono: +34 649 623 700</p>
            <p>&nbsp;&nbsp;Correos electrónicos de contacto: info@iamoving.com, juridico@iamoving.com y roberto@iamoving.com</p>
			<h5><b>DATOS DEL COMPRADOR DEL INMUEBLE</b></h5>
			<p><b>Nombre y apellidos</b>:<?php if (isset($name))
															{echo $name;}
															else
															{echo '..........................';}
															?> <?php if (isset($lastname))
															{echo $lastname;}
															else
															{echo '';}
															?> </p>
			<p><b>Datos de contacto</b>: <b>Correo electrónico</b>: <?php if (isset($email))
															{echo $email;}
															else
															{echo '..........................';}
															?>  <b>Teléfono</b>: <?php if (isset($phone))
															{echo $phone;}
															else
															{echo '...........';}
															?></p>
			<p><b>DATOS DEL INMUEBLE DE LA SOLICITUD DE VISITA</b></p>
			<p><b>Fecha y hora de solicitud de visita del COMPRADOR</b>: <?php if (isset($visit_date))
															{echo $visit_date;}
															else
															{echo '...........';}
															?>, <?php if (isset($visit_time))
															{echo $visit_time;}
															else
															{echo '.....';}
															?> h (pendiente de confirmación por la propiedad).</p>			
			<p><b>Enlace del inmueble</b>: <a href="https://www.iamoving.com/anuncio/<?php   if (isset($inmueble_id))
																{echo $inmueble_id;}
															?>" style="color:#EADD03;">https://iamoving.com/anuncio/<?php   if (isset($inmueble_id))
																{echo $inmueble_id;}
															?></a></p>
			<p><b>Precio del inmueble (€)</b>:  <?php   if (isset($propiedad_precio))
																{echo $propiedad_precio;}
															else
																{echo '........';}
															?></p>
			<p><b>Dirección</b>: <?php   if (isset($direccion))
																{echo $direccion;}
															else
																{echo '..........................';}
															?> (la dirección exacta se comunicará una vez que el propietario confirme la solicitud).</p>											
			<h5>10.2.- NOTIFICACIONES</h5>
			<p>Todas las notificaciones y comunicaciones entre el COMPRADOR e IAMOVING ONLINE, S.L. se considerarán válidas y efectivas cuando se realicen por cualquiera de los siguientes medios:
			</p>
			<p>&nbsp;&nbsp;·Teléfono.</p>
			<p>&nbsp;&nbsp;·Mensaje de texto.</p>
			<p>&nbsp;&nbsp;·WhatsApp.</p>
			<p>&nbsp;&nbsp;·Correo electrónico.</p>
			<p>Utilizando los datos de contacto indicados anteriormente en la cláusula 10.1.</p>
			<h5>10.3.- INTERMEDIACIÓN Y GESTIÓN DE LA COMUNICACIÓN ENTRE LAS PARTES</h5>
			<p>Al iniciar la intermediación, IAMOVING ONLINE, S.L. será la entidad encargada de gestionar la comunicación entre el comprador y la parte vendedora del inmueble en el que se haya iniciado la intermediación, incluso si el inmueble ya no está publicado en <a href="https://www.iamoving.com" style="color:#EADD03;">www.iamoving.com</a> (LA PLATAFORMA) en el momento de la compra.
			</p>
			<p>Cualquier duda, pregunta u oferta sobre un inmueble que está publicado o que teníamos publicado en <a href="https://www.iamoving.com" style="color:#EADD03;">www.iamoving.com</a> (LA PLATAFORMA), el comprador debe informar a IAMOVING ONLINE, S.L.</p>
        <h5>10.4.- SERVICIOS</h5>
			<p>El usuario COMPRADOR que solicita una visita presencial a un inmueble que esté publicado o haya estado publicado en <a href="https://www.iamoving.com" style="color:#EADD03;">www.iamoving.com</a> (LA PLATAFORMA) recibirá una serie de servicios que IAMOVING ONLINE, S.L. le proporcionará siguiendo el orden de trabajo mencionado a continuación.
			</p>
<p>Dichos servicios que el usuario COMPRADOR recibirá de IAMOVING ONLINE, S.L. son:</p>
<p>&nbsp;&nbsp;<b>·GESTIÓN</b>: Respondemos lo antes posible todas las dudas y consultas que el usuario COMPRADOR tenga sobre el inmueble de su interés, mientras esperamos la confirmación de su solicitud de visita por parte de la propiedad.</p>
			<p>&nbsp;&nbsp;<b>·CONECTAMOS</b>: Una vez que IAMOVING ONLINE, S.L. recibe la confirmación de visita de la propiedad, pasamos al usuario COMPRADOR la dirección exacta del inmueble de su interés y así conectamos al usuario COMPRADOR con la propiedad para que sea posible realizar una visita presencial entre ellos.</p>
			<p>&nbsp;&nbsp;<b>·NEGOCIACIÓN DEL PRECIO DE COMPRAVENTA</b>: El proceso de negociación requiere de experiencia y conocimiento, por lo que es uno de los momentos en los que más se hace valer un buen asesoramiento profesional.</p>
			<p>&nbsp;&nbsp;<b>·OFERTA DE COMPRA</b>: IAMOVING ONLINE, S.L. realiza una oferta de valor a la propiedad mediante un documento de oferta, demostrando el interés real de nuestro usuario COMPRADOR, aumentando sus posibilidades de compra.</p>
			<p>&nbsp;&nbsp;<b>·VERIFICACIÓN PREVIA</b>: Tiene como finalidad conocer la situación real del bien en cuanto a documentación y estado, inicialmente desde el punto de vista jurídico. De esta manera, nuestra asesoría jurídica podrá detallar aspectos como la realidad registral del inmueble, indicando si sobre el mismo pesan o no algún tipo de cargas.</p>
			<p>&nbsp;&nbsp;<b>·CONTRATO DE ARRAS</b>: Negociación y redacción del contrato de arras en nombre del usuario COMPRADOR y en defensa de sus intereses.</p>
			<p>&nbsp;&nbsp;<b>·REVISIÓN</b>: Redacción y/o revisión y/o asesoramiento para la formalización de la escritura de compraventa. Resolución de consultas relativas al contrato de arras y/o escritura de compraventa por escrito, mediante correo electrónico.</p>
			<p>&nbsp;&nbsp;<b>·COMUNICACIÓN</b>: Redacción y envío de todas aquellas comunicaciones que deban ser remitidas a la parte vendedora hasta la formalización de la escritura de compraventa.</p>
			<p>&nbsp;&nbsp;<b>·FINANCIACIÓN</b>: Ayudamos al usuario COMPRADOR en la búsqueda de una financiación (en caso de que lo requiera).</p>
			<p>&nbsp;&nbsp;<b>·GESTIÓN DE SERVICIOS COMO NUEVO PROPIETARIO</b>: (cambio/alta suministros, cambio de cerraduras, etc.).</p>			
			<p>&nbsp;&nbsp;<b>·INVERSIÓN</b>: Operación de compraventa para posterior alquiler del inmueble (servicio incluido al usuario COMPRADOR para su primer inquilino): búsqueda y selección de inquilinos, contrato de arrendamiento, gestión de seguro de impago y otros trámites administrativos.</p>
			<h5>10.5.- ACEPTACIÓN DE LOS SERVICIOS</h5>
			<p>El usuario COMPRADOR reconoce que todos los servicios que solicita a IAMOVING ONLINE, S.L. mencionados en la cláusula 10.4 son de manera online y, en el caso de que el usuario COMPRADOR prefiera no hacer uso de todos los servicios, los honorarios de IAMOVING ONLINE, S.L. no sufrirán ninguna disminución.</p>			
			<h5>10.6.- HONORARIOS AL COMPRADOR</h5>
			<p>El coste de intermediación es del 3% + IVA sobre el precio final de venta, pagaderos al firmar el contrato de compraventa o el contrato de arras.</p>			
			<h5>10.7.- PENALIZACIÓN POR MORA</h5>
			<p>Si el comprador no paga los honorarios de IAMOVING ONLINE, S.L. en el tiempo indicado en la cláusula 10.6, se aplicará una penalización del 6% + IVA sobre el importe de la venta.</p>	
			<h5>10.8.- CONFIRMACIÓN DE OFERTA</h5>
			<p>Para formalizar una oferta, el comprador debe pagar 3.000 € mediante transferencia, bajo un documento de oferta donde se detallan todas las condiciones de la compra. Si la oferta no es aceptada, se devolverá el importe.</p>			
			<h5>10.9.- COMPROMISO DE RESPETO A LA INTERMEDIACIÓN DE IAMOVING ONLINE, S.L.</h5>
<p>El COMPRADOR reconoce que el inmueble le ha sido presentado por IAMOVING ONLINE, S.L. y se compromete a no formalizar la compraventa de dicho inmueble sin la intermediación de IAMOVING ONLINE, S.L., ya sea directamente o a través de su cónyuge o pareja de hecho, familiares hasta el cuarto grado de consanguinidad o afinidad, sociedades en las que participe directa o indirectamente, o cualquier otra persona física o jurídica que actúe por su cuenta, en su representación o como persona interpuesta.
</p>
<p>En caso de que el COMPRADOR, o cualquiera de las personas o entidades anteriormente indicadas, formalice la compraventa de dicho inmueble eludiendo la intermediación de IAMOVING ONLINE, S.L., deberá abonar una indemnización equivalente al 6 % + IVA sobre el precio del inmueble publicado o que hubiera estado publicado en <a href="https://www.iamoving.com" style="color:#EADD03;">www.iamoving.com</a>, como compensación por los servicios profesionales prestados por IAMOVING ONLINE, S.L.</p>
			<p>Esta indemnización será exigible con independencia de que, en el momento de la compraventa, el inmueble continúe publicado, haya sido retirado de LA PLATAFORMA o haya experimentado modificaciones en su precio o condiciones de comercialización.</p> 
			
			<p>El COMPRADOR se compromete a comunicar a IAMOVING ONLINE, S.L., en un plazo máximo de siete (7) días naturales, cualquier compraventa realizada sobre dicho inmueble.</p>
<p>En caso de incumplimiento de esta obligación de comunicación, IAMOVING ONLINE, S.L. podrá reclamar la indemnización correspondiente y, en su caso, los intereses de demora legalmente aplicables desde la fecha de la compraventa hasta su completo pago, conforme a la legislación vigente.</p>

			<h5>10.10.- FINAL DEL SERVICIO DE IAMOVING ONLINE, S.L</h5>
			<p>En la fecha en la que se firmen las escrituras de compraventa, y estando todas las partes de acuerdo, finalizarán los servicios de IAMOVING ONLINE, S.L. al usuario COMPRADOR y la misma no se responsabiliza de cualquier acción realizada con posterioridad a dicha fecha.</p>		

        </div>
    </body>
</html>