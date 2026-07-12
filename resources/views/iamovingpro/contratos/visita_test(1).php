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

			<h1>Términos de Intermediación de IAMOVING ONLINE para Comprador</h1>

			<h5>1.-Reconocimiento del Comprador</h5>
			<p>La intermediación de la plataforma inmobiliaria <a href="https://www.iamoving.com" style="color:#EADD03;">www.iamoving.com</a> se inicia cuando un <b>usuario comprador</b> solicita una <b>visita presencial</b> a un inmueble publicado en <a href="https://www.iamoving.com" style="color:#EADD03;">www.iamoving.com</a> gestionada por <b>IAMOVING ONLINE, S.L.</b>, con <b>C.I.F. B-88297825</b>, con datos de contacto: <b>teléfono +34 649 623 700</b> y correos electrónicos de contacto: <b>info@iamoving.com</b>, <b>juridico@iamoving.com</b> y <b>roberto@iamoving.com</b>.</p>
			<p>El <b>comprador</b> declara expresamente que <b>no conocía la oferta de venta del inmueble</b> objeto de su solicitud a través de ningún otro canal distinto de <b>IAMOVING ONLINE</b>. Asimismo, manifiesta <b>no haber visitado previamente dicho inmueble</b>, ni de forma presencial y virtual, por medio de otras agencias inmobiliarias, terceras personas o directamente con la propiedad.</p>
			<p>En consecuencia, al solicitar la visita presencial, el comprador <b>proporciona sus datos personales y acepta haber leído, comprendido y aceptado</b> los términos, servicios y condiciones establecidos en este documento</p>
            
			<p><b>Fecha de solicitud de visita</b>: <?php   if (isset($fecha_letra))
																{echo $fecha_letra;}
															else
																{echo '..........................';}
															?></p>
			<p><b>DATOS DEL COMPRADOR</b></p>
			<p><b>Nombre y apellidos</b>:<?php if (isset($name))
															{echo $name;}
															else
															{echo '..........................';}
															?> <?php if (isset($lastname))
															{echo $lastname;}
															else
															{echo '';}
															?> </p>
			<p><b>Datos de contacto</b>: <b>Correo electrónico<b>: <?php if (isset($email))
															{echo $email;}
															else
															{echo '..........................';}
															?>  <b>Teléfono</b>: <?php if (isset($phone))
															{echo $phone;}
															else
															{echo '...........';}
															?></p>
			<p><b>DATOS DEL INMUEBLE Y DE LA VISITA</b></p>
			<p><b>Enlace del inmueble</b>: <a href="https://www.iamoving.com/anuncio/<?php   if (isset($inmueble_id))
																{echo $inmueble_id;}
															?>" style="color:#EADD03;">https://iamoving.com/anuncio/<?php   if (isset($inmueble_id))
																{echo $inmueble_id;}
															?></a></p>
			<p><b>Dirección</b>: <?php   if (isset($direccion))
																{echo $direccion;}
															else
																{echo '..........................';}
															?> (el número exacto se comunicará una vez que el propietario confirme la solicitud).</p>
			<p><b>Fecha y hora solicitadas para la visita</b>: <?php if (isset($visit_date))
															{echo $visit_date;}
															else
															{echo '...........';}
															?>, <?php if (isset($visit_time))
															{echo $visit_time;}
															else
															{echo '.....';}
															?> h (pendiente de confirmación por la propiedad).</p>															
			<h5>2.-Notificaciones </h5>
			
			<p>Todas las notificaciones y comunicaciones entre el <b>COMPRADOR</b> e <b>IAMOVING ONLINE</b> se considerarán válidas y efectivas cuando se realicen por cualquiera de los siguientes medios: <b>teléfono, mensaje de texto, WhatsApp o correo electrónico</b>, utilizando los datos de contacto indicados anteriormente.</p>

			<h5>3.-Exclusividad de la Intermediación</h5>
			<p>Al iniciar la intermediación, IAMOVING ONLINE  tiene derechos exclusivos sobre el inmueble cuyo se haya iniciado la intermediación, incluso si ya no está publicado en <a href="https://www.iamoving.com" style="color:#EADD03;">www.iamoving.com</a> al momento de la compra. El comprador debe informar a IAMOVING ONLINE sobre cualquier contacto directo con el propietario</p>

        <h5>4.-Servicios Ofrecidos por IAMOVING ONLINE</h5>
			<p>Al solicitar una visita, el comprador recibe los siguientes servicios:</p>
			<p>&nbsp;&nbsp;<b>·Gestión de Dudas</b>: Respuestas rápidas a consultas sobre la propiedad.</p>
			<p>&nbsp;&nbsp;<b>·Conexión</b>: visita directamente con la propiedad .</p>
			<p>&nbsp;&nbsp;<b>·Negociación</b>: Asesoramos en la negociación del precio.</p>
			<p>&nbsp;&nbsp;<b>·Oferta de Compra</b>: Presentamos la oferta formal al propietario.</p>
			<p>&nbsp;&nbsp;<b>·Verificación Previa</b>: Comprobamos la documentación del inmueble.</p>
			<p>&nbsp;&nbsp;<b>·Contrato de Arras</b>: Negociamos y redactamos este contrato en nombre del comprador.</p>
			<p>&nbsp;&nbsp;<b>·Revisión de Documentos</b>: Asesoría para la escritura de compraventa.</p>
			<p>&nbsp;&nbsp;<b>·Comunicación</b>: Enviamos todas las notificaciones necesarias al vendedor.</p>
			<p>&nbsp;&nbsp;<b>·Financiación</b>: Ayudamos a encontrar opciones de financiación.</p>
			<p>&nbsp;&nbsp;<b>·Gestión de Servicios</b>: Asesoría sobre cambios de suministros.</p>			
			<p>&nbsp;&nbsp;<b>·Inversión</b>: Apoyo en la gestión de arrendamientos para inquilinos.</p>
			<h5>5.-Servicios Online  </h5>
			<p>El comprador acepta que todos los servicios mencionados son online. Si el comprador no usa alguno, los honorarios de IAMOVING ONLINE no se reducen.</p>			
			<h5>6.-Honorarios  </h5>
			<p>El coste de intermediación es del 3% + IVA sobre el precio final de venta, pagaderos al firmar el contrato de compraventa o del contrato de arras.</p>			
			<h5>7.-Penalización por demora</h5>
			<p>Si el comprador no paga los honorarios a tiempo, se aplicará una penalización del 6% + IVA sobre el monto de la venta.</p>			
			
			<h5>8.-Confirmación de Oferta</h5>
			<p>Para formalizar una oferta, el comprador debe pagar 3.000€ mediante transferencia. Si la oferta no es aceptada, se devolverá el monto.</p>			
			<h5>9.-Penalización por Cancelación  </h5>
			<p>Si el comprador decide no proceder con la compra, no se reembolsará la cantidad depositada.</p>			
			<h5>10.-Indemnización por Elusión de Intermediación</h5>
			<p>Si el <b>COMPRADOR</b>, o alguna persona vinculada a él (familiares hasta cuarto grado, cónyuge o pareja, o cualquier empresa en la que participe directa o indirectamente), compra un inmueble que haya conocido a través de <a href="https://www.iamoving.com" style="color:#EADD03;">www.iamoving.com</a> sin la intervención de <b>IAMOVING ONLINE</b>, deberá pagar a <b>IAMOVING ONLINE</b> una <b>indemnización del 6% más IVA, del precio del inmueble</b> que tenemos o teníamos publicado en publicado e <a href="https://www.iamoving.com" style="color:#EADD03;">www.iamoving.com</a>.</p>			
            <p><b>Naturaleza jurídica</b>: Esta indemnización tiene carácter de <b>obligación contractual principal</b>, no de cláusula penal. Por tanto, <b>no puede ser reducida judicialmente</b> conforme al artículo 1154 del Código Civil. Representa <b>la compensación por los servicios profesionales prestados por IAMOVING ONLINE</b>, con independencia de que la compraventa se haya cerrado o no a través de la plataforma.</p>
            
            <p><b>La indemnización será exigible aunque</b>:</p>
            <p>-El inmueble ya no esté publicado en la plataforma.</p>
<p>-El propietario lo haya retirado o modificado su precio o condiciones.</p>
<p>-El comprador alegue desconocimiento de estos términos.</p>
<p>-El vendedor haya incumplido sus obligaciones con IAMOVING.</p>
			
			<p><b>Obligación de información</b>: El <b>COMPRADOR</b> deberá informar a IAMOVING, en un <b>plazo máximo de 7 días naturales</b>, de cualquier compraventa realizada sobre inmuebles conocidos a través de <a href="https://www.iamoving.com" style="color:#EADD03;">www.iamoving.com</a>. Si no lo hace, se considerará <b>una actuación de mala fe</b> y se aplicarán <b>intereses de demora según la Ley 3/2004, de 29 de diciembre</b>, desde la fecha de la compraventa hasta el pago total de la indemnización, sin necesidad de requerimiento previo.</p>
			<h5>11.-Derechos de  IAMOVING ONLINE</h5>
			<p><b>IAMOVING ONLINE</b> mantiene sus derechos sobre las propiedades, incluso si no están en un momento determinado, siempre que hayan estado publicadas anteriormente.</p>			
			<h5>12.-Final del servicio de IAMOVING ONLINE</h5>
			<p>En la fecha que se firme las escrituras de compraventa, y estando todas las partes de acuerdo, se finaliza los servicios de IAMOVING al usuario COMPRADOR y la misma no se responsabiliza de cualquier acción realizada posterior a esta fecha.</p>			

        </div>
    </body>
</html>