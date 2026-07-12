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

			<h1>10.- Términos de Intermediación de IAMOVING ONLINE para Comprador</h1>

			<h5>10.1.- EL COMPRADOR RECONOCE Y ACEPTA LA INTERMEDIACIÓN DE LA PLATAFORMA INMOBILIARIA <a href="https://www.iamoving.com" style="color:#EADD03;">WWW.IAMOVING. COM</a></h5>
            <p>El comprador declara expresamente que <b>no conocía la oferta de venta del inmueble</b> objeto de su solicitud de visita presencial a través de ningún otro canal distinto de <b>IAMOVING ONLINE</b>. Asimismo, <b>manifiesta no haber visitado previamente dicho inmueble de manera presencial ni virtual</b>, por medio de otras agencias inmobiliarias, terceras personas o directamente con la propiedad.
            </p>   
            <p><b>El comprador al solicitar la visita presencial, declara que ha proporcionado sus datos personales de forma veraz y voluntaria</b>, y confirma que he leído, comprendido y acepta todos términos de Intermediación de IAMOVING ONLINE para Comprador, que se mencionan en este documento.
            </p>            
            <p>La intermediación de la plataforma inmobiliaria <a href="https://www.iamoving.com" style="color:#EADD03;">www.iamoving.com</a> se inicia cuando un <b>usuario comprador</b> solicita una <b>visita presencial</b> a un inmueble publicado en <a href="https://www.iamoving.com" style="color:#EADD03;">www.iamoving.com</a> gestionada por <b>IAMOVING ONLINE, S.L.</b>, con <b>C.I.F. B-88297825</b>, con datos de contacto: <b>teléfono +34 649 623 700</b> y correos electrónicos de contacto: <b>info@iamoving.com</b>, <b>juridico@iamoving.com</b> y <b>roberto@iamoving.com</b>.
            </p>
            
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
			<p><b>Datos de contacto</b>: <b>Correo electrónico<b>: <?php if (isset($email))
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
			<p><b>Dirección</b>: <?php   if (isset($direccion))
																{echo $direccion;}
															else
																{echo '..........................';}
															?> (la dirección exacta se comunicará una vez que el propietario confirme la solicitud).</p>											
			<h5>10.2.- NOTIFICACIONES</h5>
			
			<p>Todas las notificaciones y comunicaciones entre el <b>COMPRADOR</b> e <b>IAMOVING ONLINE</b> se considerarán válidas y efectivas cuando se realicen por cualquiera de los siguientes medios: <b>teléfono, mensaje de texto, WhatsApp o correo electrónico</b>, utilizando los datos de contacto indicados anteriormente en la cláusula (10.1)</p>

			<h5>10.3.- EXCLUSIVIDAD DE LA INTERMEDIACIÓN</h5>

			<p>Al iniciar la intermediación, IAMOVING ONLINE tiene derechos exclusivos y será la interlocutora entre el comprador y la parte vendedora del inmueble cuyo se haya iniciado la intermediación, incluso si el inmueble ya no está publicado en <a href="https://www.iamoving.com" style="color:#EADD03;">www.iamoving.com</a> al momento de la compra. Cualquier duda, pregunta u oferta sobre un inmueble que está publicado o que teníamos publicado en <a href="https://www.iamoving.com" style="color:#EADD03;">www.iamoving.com</a>, el comprador debe informar a IAMOVING ONLINE.</p>

        <h5>10.4.- SERVICIOS</h5>
			<p>Así que, el usuario COMPRADOR que solicita una visita presencial a un inmueble que esté publicado o haya estado publicado en <a href="https://www.iamoving.com" style="color:#EADD03;">www.iamoving.com</a>, recibirá una serie de servicios que IAMOVING le proporcionará siguiendo el orden de trabajo mencionado a continuación.</p>
			<p>Dichos servicios por orden que el usuario COMPRADOR recibirá de IAMOVING son:</p>
			<p>&nbsp;&nbsp;<b>A.GESTIÓN</b>: Respondemos lo antes posible todas sus dudas y consultas que el usuario COMPRADOR tiene al inmueble de su interés, mientras esperamos la confirmación de su solicitud de visita de la propiedad.</p>
			<p>&nbsp;&nbsp;<b>B.CONECTAMOS</b>: Una vez que IAMOVING recibe la confirmacion de visita de la propiedad, pasamos al usuario COMPRADOR la dirección exacta del inmueble de su interés, (de su solicitud de visita) y así conectamos el usuario COMPRADOR con la propiedad para que sea posible realizar una visita presencial entre ellos.</p>
			<p>&nbsp;&nbsp;<b>C.NEGOCIACIÓN DEL PRECIO DE COMPRAVENTA</b>: El proceso de negociación requiere de experiencia y conocimiento, por lo que es uno de los momentos en los que más se hace valer un buen asesoramiento profesional.</p>
			<p>&nbsp;&nbsp;<b>D.OFERTA DE COMPRA</b>: IAMOVING realiza una oferta de valor a la propiedad, bajo un documento de oferta, demostrando el interés real de nuestro usuario COMPRADOR, aumentando sus posibilidades de compra.</p>
			<p>&nbsp;&nbsp;<b>E.VERIFICACIÓN PREVIA</b>: Esto tiene como finalidad, conocer la situación real del bien en cuanto a documentación y su estado, en un primer momento desde el punto de vista jurídico. De esta manera, nuestra asesoría jurídica podrá detallar los aspectos tales como la realidad registral del inmueble, lo cual indicará si sobre el mismo pesan o no algún tipo de cargas.</p>
			<p>&nbsp;&nbsp;<b>F.CONTRATO DE ARRAS</b>: Negociación y redacción del contrato de arras en nombre del usuario COMPRADOR y en defensa de sus intereses.</p>
			<p>&nbsp;&nbsp;<b>G.REVISIÓN</b>: Redacción y/o Revisión y/o Asesoramiento para la formalización de la Escritura de Compraventa. Resolución de consultas relativas al contrato de arras y/o escritura de compraventa por escrito, mediante correo electrónico.</p>
			<p>&nbsp;&nbsp;<b>H.COMUNICACIÓN</b>: Redacción y envío de todas aquellas comunicaciones que deban ser remitidas a la parte vendedora hasta la formalización de la escritura de compraventa.</p>
			<p>&nbsp;&nbsp;<b>I.FINANCIACIÓN</b>: Ayudamos el usuario COMPRADOR en Búsqueda de una financiación (en caso de que lo requiera).</p>
			<p>&nbsp;&nbsp;<b>J.GESTIÓN DE SERVICIOS COMO NUEVO PROPIETARIO</b>: (cambio/alta suministros, cambio de cerraduras, etc.)</p>			
			<p>&nbsp;&nbsp;<b>K.INVERSIÓN</b>: Operación de compraventa para posterior alquiler del inmueble (servicio incluido al usuario COMPRADOR para su primer inquilino): Búsqueda y selección de inquilinos, contrato de arrendamiento, gestión de seguro de impago y otros trámites administrativos. La búsqueda y selección de inquilinos es un proceso delicado que requiere de diversas gestiones (análisis de candidatos, contratación de seguro de impago, etc.)</p>
			<p>10.5.- El usuario comprador reconoce que todos los servicios que solicita a IAMOVING mencionados en la cláusula 10.4 y son de (A al K), son de manera online y en el caso que el usuario COMPRADOR prefiera no hacer uso de todos los servicios, los honorarios de IAMOVING no sufrirán ninguna disminución.</p>			
			<h5>10.6.- HONORARIOS  </h5>
			<p>El coste de intermediación es del 3% + IVA sobre el precio final de venta, pagaderos al firmar el contrato de compraventa o del contrato de arras.</p>			
			<h5>10.7.- PENALIZACIÓN POR MORA</h5>
			<p>Si el comprador no paga los honorarios a tiempo, se aplicará una penalización del 6% + IVA sobre el monto de la venta.</p>			
			
			<h5>10.8.- CONFIRMACIÓN DE OFERTA</h5>
			<p>Para formalizar una oferta, el comprador debe pagar 3.000€ mediante transferencia, bajo un documento de oferta, Si la oferta no es aceptada, se devolverá el monto.</p>			
			<h5>10.9.- PENALIZACIÓN POR CANCELACIÓN</h5>
			<p>Si el comprador decide no proceder con la compra, no se reembolsará la cantidad depositada.</p>			
			<h5>10.10.- CLÁUSULA INDEMNIZATORIA POR ELUSIÓN DE LA INTERMEDIACIÓN:</h5>
<!--<p>El usuario <b>COMPRADOR</b> reconoce que la labor de intermediación de IAMOVING consiste en la presentación de las partes y la facilitación del negocio jurídico, habiéndose devengado el derecho a la remuneración desde el momento en que IAMOVING pone en contacto al COMPRADOR con el inmueble, conforme a la jurisprudencia consolidada del Tribunal Supremo (Sentencias de 21 de mayo de 2014, 30 de julio de 2014 y 13 de octubre de 2011, entre otras).</p>-->

<!--<p>En consecuencia, en caso de que el usuario COMPRADOR, o alguno de sus parientes hasta el cuarto grado de consanguinidad o afinidad, su cónyuge o pareja de hecho, o cualquier entidad en la que el COMPRADOR o cualquiera de los anteriores participe de forma directa o indirectamente, o cualquier persona física o jurídica que actúe como testaferro o interpósita persona del COMPRADOR, adquiera un inmueble al que haya tenido acceso a través de LA PLATAFORMA sin la intermediación de IAMOVING, el COMPRADOR quedará obligado al pago de una indemnización equivalente al 6% + IVA del precio de dicho inmueble que tenemos o teníamos publicado en <a href="https://www.iamoving.com" style="color:#EADD03;">www.iamoving.com</a>, en concepto de penalización.</p>-->
<p>En caso de que el usuario COMPRADOR, o alguno de sus parientes hasta el cuarto grado de consanguinidad o afinidad, su cónyuge o pareja de hecho, o cualquier entidad en la que el COMPRADOR o cualquiera de los anteriores participe de forma directa o indirectamente, o cualquier persona física o jurídica que actúe como testaferro o interpósita persona del COMPRADOR, adquiera un inmueble al que haya tenido acceso a través de LA PLATAFORMA sin la intermediación de IAMOVING, el COMPRADOR quedará obligado al pago de una indemnización equivalente al 6% + IVA del precio de dicho inmueble que tenemos o teníamos publicado en <a href="https://www.iamoving.com" style="color:#EADD03;">www.iamoving.com</a>, en concepto de penalización.</p>
            <p><b>Naturaleza jurídica</b></p>
		<!--	<p>Esta indemnización <b>tiene carácter de obligación contractual principal</b>, no de cláusula penal. Por tanto, no puede ser reducida judicialmente conforme al artículo 1154 del Código Civil.Representa la <b>compensación por los servicios profesionales prestados por IAMOVING ONLINE</b>, con independencia de que la compraventa se haya cerrado o no a través de la plataforma.</p>			-->
			<p>Esta indemnización tiene carácter de obligación contractual principal, no de cláusula penal. Por tanto, no puede ser reducida judicialmente conforme al artículo 1154 del Código Civil.Representa la compensación por los servicios profesionales prestados por IAMOVING ONLINE, con independencia de que la compraventa se haya cerrado o no a través de la plataforma.</p> 
			<p><b>La indemnización será exigible, aunque</b>:</p>
           <!-- <p>-El inmueble ya no esté publicado en la plataforma.</p>-->
<p>-El inmueble ya no esté publicado en <a href="https://www.iamoving.com" style="color:#EADD03;">www.iamoving.com</a>.</p>
<p>-El inmueble ha modificado su precio o condiciones.</p>
<!--<p>-El comprador alegue desconocimiento de estos términos.</p>-->
			
			<p><b>Obligación de información</b>: El <b>COMPRADOR</b> deberá informar a IAMOVING ONLINE, en un plazo máximo de <b>7 días naturales</b>, de cualquier compraventa realizada sobre inmuebles conocidos a través de <a href="https://www.iamoving.com" style="color:#EADD03;">www.iamoving.com</a>. Si no lo hace, se considerará <b>una actuación de mala fe</b> y se aplicarán <b>intereses de demora según la Ley 3/2004, de 29 de diciembre</b>, desde la fecha de la compraventa hasta el pago total de la indemnización, sin necesidad de requerimiento previo.</p>	
			<h5>10.11.- FINAL DEL SERVICIO DE IAMOVING ONLINE</h5>
			<p>En la fecha que se firme las escrituras de compraventa, y estando todas las partes de acuerdo, se finaliza los servicios de IAMOVING al usuario COMPRADOR y la misma no se responsabiliza de cualquier acción realizada posterior a esta fecha.</p>		

        </div>
    </body>
</html>