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
						<h5>Fecha de Solicitud de Visita: <?php   if (isset($fecha_letra))
																{echo $fecha_letra;}
															else
																{echo '..........................';}
															?>.</h5>
            <!--<pre style='display:inline'>&#09;</pre>-->

				<p>Yo en calidad de usuario <?php if (isset($tipo_persona_iamoving))
															{echo $tipo_persona_iamoving;}
															else
															{echo '..........................';}
															?>, del sitio web <a href="https://www.iamoving.com" style="color:#EADD03;">www.iamoving.com</a>, que es titular de IAMOVING ONLINE, S.L, con nombre y apellidos: <?php if (isset($name))
															{echo $name;}
															else
															{echo '..........................';}
															?> <?php if (isset($lastname))
															{echo $lastname;}
															else
															{echo '';}
															?>, con Email de contacto: <?php if (isset($email))
															{echo $email;}
															else
															{echo '..........................';}
															?> y con número de teléfono: <?php if (isset($phone))
															{echo $phone;}
															else
															{echo '...........';}
															?>, he solicitado una visita a un inmueble que está publicado en la plataforma <a href="https://www.iamoving.com" style="color:#EADD03;">www.iamoving.com</a>. </p>
				 <p>Este es el enlace del inmueble del cual he solicitado una visita: <a href="https://www.iamoving.com/anuncio/<?php   if (isset($inmueble_id))
																{echo $inmueble_id;}
															?>" style="color:#EADD03;">https://iamoving.com/anuncio/<?php   if (isset($inmueble_id))
																{echo $inmueble_id;}
															?></a></p>
				 <p>Y por esa razón he dejado mis datos personales y reconozco que he leído y aceptado todos los términos y condiciones que están mencionados abajo en este presente documento.</p>
			<h1>Términos y condiciones</h1>

			<h5>1.-OBJETO Y ACEPTACIÓN</h5>
			<p>1.1 - El presente aviso legal regula el uso del sitio web <a href="https://www.iamoving.com" style="color:#EADD03;">www.iamoving.com</a> (en adelante, LA PLATAFORMA), del que es titular IAMOVING ONLINE, S.L.(en adelante, IAMOVING).</p>
			<p>1.2 - La navegación por LA PLATAFORMA atribuye la condición de usuario del mismo e implica la aceptación plena y sin reservas de todas y cada una de las disposiciones incluidas en este Aviso Legal, que pueden sufrir modificaciones.</p>
			<p>1.3 - El usuario se obliga a hacer un uso correcto de LA PLATAFORMA, de conformidad con las leyes, la buena fe, el orden público, los usos del tráfico y el presente Aviso Legal. El usuario responderá frente a IAMOVING o frente a terceros, de cualesquiera daños y perjuicios que pudieran causarse como consecuencia del incumplimiento de dicha obligación.</p>
            <h5>2. IDENTIFICACIÓN Y COMUNICACIONES</h5>
			<p>2.1 - IAMOVING, en cumplimiento de la Ley 34/2002, de 11 de julio, de servicios de la sociedad de la información y de comercio electrónico, le informa que:</p>
			<p>·Su denominación social es: IAMOVING ONLINE, S.L.</p>
			<p>·CIF es: B-88297825</p>
			<p>·Su domicilio social está en: Calle Serrano 93, 3º E. 28006 - Madrid - España (AVISO IMPORTANTE: IAMOVING ONLINE es una plataforma online. Todas las gestiones se realizan de manera online. No atendemos físicamente, solo bajo cita previa)</p>
			<p>·Email: <a href="&#109;&#097;&#105;&#108;&#116;&#111;:&#105;&#110;&#102;&#111;&#064;&#105;&#097;&#109;&#111;&#118;&#105;&#110;&#103;&#046;&#099;&#111;&#109;">info@iamoving.com</a>, <a href="mailto:roberto@iamoving.com">roberto@iamoving.com</a></p>
        	<p>·Teléfono: +34 649 623 700</p>
			<p>2.2 - Todas las notificaciones y comunicaciones entre los usuarios e IAMOVING se considerarán eficaces, a todos los efectos, cuando se realicen a través de cualquiera de los medios detallado anteriormente (teléfono, mensajes de texto, WhatsApp y correo electrónico).</p>
			
			<h5>3. FUNCIONAMIENTO Y APLICACIÓN DE IAMOVING</h5>
			<p>3.1 – IAMOVING es una plataforma inmobiliaria on-line que facilita los procesos de arrendamiento y compraventa, ayudando a los propietarios, compradores e inquilinos.</p>
			<p>En el caso de que algún propietario utilice el reportaje audiovisual de IAMOVING con su marca de agua fuera de <a href="https://www.iamoving.com" style="color:#EADD03;">www.iamoving.com</a>, como particular para comercializar su propiedad en otros canales diferentes de IAMOVING, la plataforma IAMOVING no se responsabilizará en ningún caso de los acuerdos que alcancen directamente entre los arrendatarios, arrendadores, compradores y vendedores.</p>
			<p>En estos casos, IAMOVING queda exento de cualquier tipo de percance o situación perjudicial que pueda originarse entre las partes.</p>

			
			<h5>4. CONTENIDO AUDIOVISUAL DE IAMOVING</h5>
			<p>4.1 - Tanto las imágenes como los vídeos son llevados a cabo de manera exclusiva por IAMOVING, quedando fuera de esta realización cualquier persona ajena a la empresa.</p>
			<p>De esta forma, IAMOVING se reserva todos los derechos de autor, así como de propiedad intelectual del contenido audiovisual; siendo así, y de acuerdo con esta cláusula, IAMOVING es el único que puede utilizar el contenido del inmueble, sin previa autorización por escrito de la misma.</p>
			<p>De acuerdo con lo anterior, IAMOVING podrá retirar el contenido audiovisual y el anuncio de la plataforma de manera unilateral en cualquier momento y sin consultar con el propietario del inmueble.</p>
			<p>4.2. Veracidad.</p>
			<p>Toda la información vertida tanto en el vídeo, fotografía, como en la descripción del anuncio será facilitada por los propietarios, ellos son responsables de dicha información facilitada a IAMOVING, así como de la veracidad de la misma, exonerando de cualquier tipo de responsabilidad a IAMOVING con respecto al contenido audiovisual y de dicha información.</p>
			<p>En el caso de que la visita virtual (video, fotografías e información) del inmueble varíe en el tiempo (por reformas, cambio de muebles, diferentes colores de pintura o algún tipo de cambio de información), los propietarios deberán avisar por escrito a la plataforma en <a href="&#109;&#097;&#105;&#108;&#116;&#111;:&#105;&#110;&#102;&#111;&#064;&#105;&#097;&#109;&#111;&#118;&#105;&#110;&#103;&#046;&#099;&#111;&#109;">info@iamoving.com</a>, para que la misma actualice dichas observaciones en su publicación.</p>
			
			<h5>5. CONDICIONES DE ACCESO Y UTILIZACIÓN</h5>
			<p>5.1 - LA PLATAFORMA y sus servicios son de acceso libre, no obstante, IAMOVING condiciona la utilización de algunos de los servicios ofrecidos a la previa cumplimentación del correspondiente formulario.</p>
			<p>5.2 - El usuario garantiza la autenticidad y actualidad de todos aquellos datos que comunique a LA PLATAFORMA y será el único responsable de las manifestaciones falsas o inexactas que realice.</p>
			<p>5.3 - El usuario se compromete expresamente a hacer un uso adecuado de los contenidos y servicios de LA PLATAFORMA y a no emplearlos para, entre otros:</p>
			<p>a. Difundir contenidos delictivos, violentos, pornográficos, racistas, xenófobo, ofensivos, de apología del terrorismo o, en general, contrarios a la ley o al orden público.</p>
			<p>b. Introducir en la red virus informáticos o realizar actuaciones susceptibles de alterar, estropear, interrumpir o generar errores o daños en los documentos electrónicos, datos o sistemas físicos y lógicos de LA PLATAFORMA o de terceras personas; así como obstaculizar el acceso de otros usuarios a LA PATAFORMA y a sus servicios.</p>
			<p>c. Intentar acceder a las cuentas de correo electrónico de otros usuarios o a áreas restringidas de los sistemas informáticos de LA PLATAFORMA para extraer información.</p>
			<p>d. Vulnerar los derechos de propiedad intelectual o industrial, así como violar la confidencialidad de la información de LA PLATAFORMA o de terceros.</p>
			<p>e. Suplantar la identidad de otro usuario, de las administraciones públicas o de un tercero.</p>
			<p>f. Reproducir, copiar, distribuir, poner a disposición de, o cualquier otra forma de comunicación pública, transformar o modificar los contenidos, a menos que se cuente con la autorización del titular de los correspondientes derechos o ello resulte legalmente permitido.</p>
			<p>g. Recabar datos con finalidad publicitaria y de remitir publicidad de cualquier clase y comunicaciones con fines de venta u otras de naturaleza comercial sin que medie su previa solicitud o consentimiento.</p>
			<p>5.4 - Todos los contenidos de LA PLATAFORMA, como textos, fotografías, gráficos, imágenes, iconos, tecnología, software, así como su diseño gráfico y códigos fuente, constituyen una obra cuya propiedad pertenece a IAMOVING, sin que puedan entenderse cedidos al usuario ninguno de los derechos de explotación sobre los mismos más allá de lo estrictamente necesario para el correcto uso de la web.</p>
			<p>5.5 - En definitiva, los usuarios que accedan a LA PLATAFORMA pueden visualizar los contenidos y efectuar, en su caso, copias privadas autorizadas siempre que los elementos reproducidos no sean cedidos posteriormente a terceros, ni se instalen a servidores conectados a redes, ni sean objeto de ningún tipo de explotación.</p>
			<p>5.6 - Asimismo, todas las marcas, nombres comerciales o signos distintivos de cualquier clase que aparecen en el sitio web son propiedad de IAMOVING, sin que pueda entenderse que el uso o acceso al mismo atribuya al usuario derecho alguno sobre los mismos.</p>
			<p>5.7 - La distribución, modificación, cesión o comunicación pública de los contenidos y cualquier otro acto que no haya sido expresamente autorizado por el titular de los derechos de explotación quedan prohibidos.</p>
			<p>5.8 - El establecimiento de un hiperenlace no implica en ningún caso la existencia de relaciones entre IAMOVING y el propietario del sitio web en la que se establezca, ni la aceptación y aprobación por parte de IAMOVING de sus contenidos o servicios. Aquellas personas que se propongan establecer un hiperenlace previamente deberán solicitar autorización por escrito a IAMOVING. En todo caso, el hiperenlace únicamente permitirá el acceso a la home-page o página de inicio de LA PLATAFORMA, asimismo deberá abstenerse de realizar manifestaciones o indicaciones falsas, inexactas o incorrectas sobre IAMOVING, o incluir contenidos ilícitos, contrarios a las buenas costumbres y al orden público.</p>
			<p>5.9 - IAMOVING no se responsabiliza del uso que cada usuario le dé a los materiales puestos a disposición en LA PLATAFORMA ni de las actuaciones que realice en base a los mismos.</p>			
			<h5>6. EXCLUSIÓN DE GARANTÍAS Y DE RESPONSABILIDAD</h5>
			<p>6.1 - El contenido de LA PLATAFORMA es de carácter general y tiene una finalidad meramente informativa, sin que se garantice plenamente el acceso a todos los contenidos, ni su exhaustividad, corrección, vigencia o actualidad, ni su idoneidad o utilidad para un objetivo específico.</p>
			<p>6.2 - IAMOVING excluye, hasta donde permite el ordenamiento jurídico, cualquier responsabilidad por los daños y perjuicios de toda naturaleza derivados de:</p>
			<p>a. La imposibilidad de acceso a LA PLATAFORMA o la falta de veracidad, exactitud, exhaustividad y/o actualidad de los contenidos, así como la existencia de vicios y defectos de toda clase de los contenidos transmitidos, difundidos, almacenados, puestos a disposición, a los que se haya accedido a través de LA PLATAFORMA o de los servicios que se ofrecen.</p>
			<p>b. La presencia de virus o de otros elementos en los contenidos que puedan producir alteraciones en los sistemas informáticos, documentos electrónicos o datos de los usuarios.</p>
			<p>c. El incumplimiento de las leyes, la buena fe, el orden público, los usos del tráfico y el presente aviso legal como consecuencia del uso incorrecto de LA PLATAFORMA. En particular, y a modo ejemplificativo, IAMOVING no se hace responsable de las actuaciones de terceros que vulneren derechos de propiedad intelectual e industrial, secretos empresariales, derechos al honor, a la intimidad personal y familiar y a la propia imagen, así como la normativa en materia de competencia desleal y publicidad ilícita.</p>
			<p>6.3 - Asimismo, IAMOVING declina cualquier responsabilidad respecto a la información que se halle fuera de esta web y no sea gestionada directamente por nuestro webmaster. La función de los links que aparecen en esta web es exclusivamente la de informar al usuario sobre la existencia de otras fuentes susceptibles de ampliar los contenidos que ofrece LA PLATAFORMA. IAMOVING no garantiza ni se responsabiliza del funcionamiento o accesibilidad de los sitios enlazados; ni sugiere, invita o recomienda la visita a los mismos, por lo que tampoco será responsable del resultado obtenido. IAMOVING no se responsabiliza del establecimiento de hipervínculos por parte de terceros.</p>
			
			<h5>7. PROCEDIMIENTO EN CASO DE REALIZACIÓN DE ACTIVIDADES DE CARÁCTER ILÍCITO</h5>
			<p>7.1 - En el caso de que cualquier usuario o un tercero considere que existen hechos o circunstancias que revelen el carácter ilícito de la utilización de cualquier contenido y/o de la realización de cualquier actividad incluidas o accesibles a través de LA PLATAFORMA, deberá enviar una notificación a IAMOVING, identificándose debidamente, especificando las supuestas infracciones y declarando expresamente y bajo su responsabilidad que la información proporcionada en la notificación es exacta.</p>
			<p>7.2 - Para toda cuestión litigiosa que incumba LA PLATAFORMA, será aplicará la legislación española.</p>
			
			<h5>8. PUBLICACIONES</h5>
			<p>8.1- La información administrativa facilitada a través de LA PLATAFORMA, no sustituye la publicidad legal de las leyes, normativas, planes, disposiciones generales y actos que tengan que ser publicados formalmente a los diarios oficiales de las administraciones públicas, que constituyen el único instrumento que da fe de su autenticidad y contenido. La información disponible en LA PLATAFORMA debe entenderse como una guía sin propósito de validez legal.</p>			
			
	<h5>9. TÉRMINOS DE INTERMEDIACIÓN DE IAMOVING</h5>
			<p>9.1 - ARRENDATARIO</p>			
			<p>La intermediación de IAMOVING se inicia para cualquier usuario ARRENDATARIO que solicita una visita a un inmueble publicado en <a href="https://www.iamoving.com" style="color:#EADD03;">www.iamoving.com</a>. El usuario ARRENDATARIO reconoce que cualquier tipo de oferta económica relativa a dicho inmueble se realizará a través de IAMOVING. Esto se aplica para cualquier usuario ARRENDATARIO que visite o solicite una visita a un inmueble publicado en la plataforma <a href="https://www.iamoving.com" style="color:#EADD03;">www.iamoving.com</a>.</p>			
			<p><b>OFERTA DE ARRENDAMIENTO</b>: El usuario ARRENDATARIO que tenga el interés de pasar a ser el inquilino de un inmueble publicado en la plataforma, deberá manifestárselo a IAMOVING y proceder con una señal para formalizar su oferta de arrendamiento, a través del pago correspondiente de una mensualidad de la renta, realizado por transferencia bancaria en la cuenta de la plataforma. En el caso de que el propietario de manera unilateral decida no iniciar la relación contractual con el usuario ARRENDATARIO, le será devuelto por IAMOVING el importe total de la señal depositada.</p>			
			<p><b>PENALIZACIÓN</b>: En el caso de que el usuario ARRENDATARIO, de manera unilateral decida no iniciar la relación contractual con el propietario, no le será devuelto el importe de la señal depositada.</p>									
			<p><b>PENALIZACIÓN</b>: En el caso de que el usuario ARRENDATARIO, o alguno de sus parientes o incluso una entidad en la que el mismo participe, alquile un inmueble publicado en <a href="https://www.iamoving.com" style="color:#EADD03;">www.iamoving.com</a>, de manera unilateral y sin el conocimiento o consentimiento de la mercantil, el usuario ARRENDATARIO reconoce la obligación de abonar unos honorarios correspondientes <b>a una mensualidad + IVA del precio de la renta del inmueble</b>, en concepto de penalización.</p>
			
			<p>9.2 - COMPRADOR</p>			
			<!--<p>La intermediación de IAMOVING se inicia para cualquier usuario COMPRADOR que solicita una visita a un inmueble publicado en <a href="https://www.iamoving.com" style="color:#EADD03;">www.iamoving.com</a> o que visita un inmueble publicado en <a href="https://www.iamoving.com" style="color:#EADD03;">www.iamoving.com</a>. El usuario COMPRADOR reconoce que cualquier tipo de oferta económica relativa a dicho inmueble se realizará a través de IAMOVING. Esto se aplica para cualquier usuario COMPRADOR que visite o solicite una visita a un inmueble publicado en la plataforma <a href="https://www.iamoving.com" style="color:#EADD03;">www.iamoving.com</a>.</p>-->
            <p>La intermediación de IAMOVING se inicia para cualquier usuario COMPRADOR que solicita una visita a un inmueble publicado en <a href="https://www.iamoving.com" style="color:#EADD03;">www.iamoving.com</a> o que visita un inmueble publicado en <a href="https://www.iamoving.com" style="color:#EADD03;">www.iamoving.com</a>. 
            </p>
            <p>El usuario comprador que solicita una visita o visita un inmueble publicado en la plataforma <a href="https://www.iamoving.com" style="color:#EADD03;">www.iamoving.com</a>, reconoce no haber visitado con anterioridad ni haber tenido conocimiento de su oferta de venta a través de otras agencias inmobiliarias, de terceras personas o por parte de la propiedad, diferente de IAMOVING.
            </p>
            <p>El usuario COMPRADOR reconoce que cualquier tipo de oferta económica relativa a dicho inmueble se realizará a través de IAMOVING. Esto se aplica para cualquier usuario COMPRADOR que visite o solicite una visita a un inmueble publicado en la plataforma <a href="https://www.iamoving.com" style="color:#EADD03;">www.iamoving.com</a>.
            </p> 			
			<p>El usuario COMPRADOR reconoce que IAMOVING ONLINE es una plataforma inmobiliaria intermediaria online, el usuario COMPRADOR reconoce que si adquiere uno de los inmuebles publicados en <a href="https://www.iamoving.com" style="color:#EADD03;">www.iamoving.com</a>, será él, usuario COMPRADOR que abonará el coste de los servicios de IAMOVING ONLINE. El usuario COMPRADOR reconoce que todos los servicios ofrecidos por IAMOVING ONLINE a él, son de manera online. Y dichos servicios, son:</p>
			<p>&nbsp;&nbsp;<b>·ACCESO ILIMITADO</b>: a todos los inmuebles que están publicados en <a href="https://iamoving.com" target="_blank">www.iamoving.com</a>. </p>
			<p>&nbsp;&nbsp;<b>·GESTIÓN</b>: IAMOVING gestiona directamente con la propiedad todas las dudas y consultas que el usuario COMPRADOR tiene al inmueble de su interés que esta publicado en <a href="https://iamoving.com" target="_blank">www.iamoving.com</a>. </p>
			<p>&nbsp;&nbsp;<b>·CONECTAMOS</b>: IAMOVING conecta el usuario COMPRADOR con la propiedad de un inmueble publicado en  <a href="https://iamoving.com" target="_blank">www.iamoving.com</a>, para que sea posible realizar una visita presencial entre ellos.</p>
			<p>&nbsp;&nbsp;<b>·NEGOCIACIÓN DEL PRECIO DE COMPRAVENTA</b>: El proceso de negociación requiere de experiencia y conocimiento, por lo que es uno de los momentos en los que más se hace valer un buen asesoramiento profesional.</p>
			<p>&nbsp;&nbsp;<b>·OFERTA DE COMPRA</b>: IAMOVING realiza una oferta de valor a la propiedad, bajo un documento de oferta, demostrando el interés real de nuestro usuario COMPRADOR, aumentando sus posibilidades de compra.</p>
			<p>&nbsp;&nbsp;<b>·VERIFICACIÓN PREVIA</b>: Esto tiene como finalidad, conocer la situación real del bien en cuanto a documentación y su estado, en un primer momento desde el punto de vista jurídico. De esta manera, nuestra asesoría jurídica podrá detallarle aspectos tales como la realidad registral del inmueble, lo cual indicará si sobre el mismo pesan o no algún tipo de cargas. </p>
			<p>&nbsp;&nbsp;<b>·CONTRATO DE ARRAS</b>: Negociación y redacción del contrato de arras en nombre del usuario COMPRADOR y en defensa de sus intereses.</p>
			<p>&nbsp;&nbsp;<b>·REVISIÓN</b>: Redacción y/o Revisión y/o Asesoramiento para la formalización de la Escritura de Compraventa. Resolución de consultas relativas al contrato de arras y/o escritura de compraventa por escrito, mediante correo electrónico.</p>
			<p>&nbsp;&nbsp;<b>·COMUNICACIÓN</b>: Redacción y envío de todas aquellas comunicaciones que deban ser remitidas a la parte vendedora hasta la formalización de la escritura de compraventa.</p>
			<p>&nbsp;&nbsp;<b>·FINANCIACIÓN</b>: Ayudamos el usuario COMPRADOR en Búsqueda de una financiación (en caso de que lo requiera).</p>
			<p>&nbsp;&nbsp;<b>·GESTIÓN DE SERVICIOS COMO NUEVO PROPIETARIO</b>: (cambio/alta suministros, cambio de cerraduras, etc.)..</p>
			<p>&nbsp;&nbsp;<b>·INVERSIÓN</b>: Operación de compraventa para posterior alquiler del inmueble (servicio incluido al usuario COMPRADOR para su primer inquilino): Búsqueda y selección de inquilinos, contrato de arrendamiento, gestión de seguro de impago y otros trámites administrativos. La búsqueda y selección de inquilinos es un proceso delicado que requiere de diversas gestiones (análisis de candidatos, contratación de seguro de impago, etc.) </p>
			<p><b>OFERTA DE COMPRA</b>. El usuario COMPRADOR que haya confirmado su interés de comprar uno de los inmuebles de LA PLATAFORMA, reconoce manifestárselo a IAMOVING y formalizar su interés de compra a través de un pago de (3.000€) para formalizar su oferta de compra, por transferencia bancaria en la cuenta de la plataforma. En el caso de que el propietario no acepte la oferta, <b>le será devuelto por IAMOVING el importe total de dicha cuantía depositada</b>.</p>
			<p><b>PENALIZACIÓN</b>. En el caso de que el usuario COMPRADOR de manera unilateral decida no iniciar la relación contractual de compra con el propietario, <b>no le será devuelto el importe total de dicha cuantía depositada</b>.</p>			
			<p><b>PENALIZACIÓN</b>. En el caso que el usuario COMPRADOR, o alguno de sus parientes o incluso una entidad en la que el mismo participe, compre un inmueble que esta publicado en <a href="https://www.iamoving.com" style="color:#EADD03;">www.iamoving.com</a>, de manera unilateral y sin el conocimiento o consentimiento de la mercantil, el usuario COMPRADOR, reconoce la obligación de abonar unos  honorarios correspondientes a un 6% + IVA del precio de dicho inmueble que tengamos publicado en la plataforma, en concepto de penalización.</p>
			<p><u>Nuestros honorarios</u>: 3% + IVA del importe por el que se cierre la venta al usuario COMPRADOR que firme un contrato de compraventa con la propiedad de un inmueble publicado en <a href="https://www.iamoving.com" style="color:#EADD03;">www.iamoving.com</a>. En el caso que el usuario COMPRADOR no abone dichos honorarios a la mercantil hasta la firma del contrato de compraventa, se le aplicará una penalización de un 6%+ iva, sobre el importe en el que se haya cerrado la venta.</p>									
			<p><u>Final del servicio</u>: En la fecha que se firme las escrituras de compraventa, y estando todas las partes de acuerdo, se finaliza los servicios de IAMOVING al usuario COMPRADOR y la misma no se responsabiliza de cualquier acción realizada posterior a esta fecha.</p>			
			
			<p>9.3 - PROPIETARIOS VENDIENDO</p>			
			<p>Aplica para cualquier usuario que en calidad de propietario o representante de la propiedad de un inmueble que aceptan o desean vender su inmueble a través de la plataforma.</p>			
			<p><b>Precio y condiciones</b>: anuncia, vende gratis y sin exclusivas. Podrás conocer todas las ventajas de vender con la INTERMEDIACIÓN DE IAMOVING a través de este <a href="https://iamoving.com/vender" target="_blank">enlace</a>.</p>			
			<p>La fecha de inicio será la fecha de alta del inmueble publicado en la plataforma, sin exclusiva y sin fecha de vencimiento, salvo que el propietario manifieste por escrito su intención de no seguir anunciando su inmueble en La plataforma.</p>			
			
			<p>9.4 - PROPIETARIOS ALQUILANDO</p>			
			<p>Se aplica a cualquier usuario que, en la calidad de ARRENDADOR o representante de la propiedad de un inmueble, que aceptan o desean arrendar a través de <a href="https://www.iamoving.com" style="color:#EADD03;">www.iamoving.com</a>.</p>			
			<p>El usuario ARRENDADOR reconoce que IAMOVING ONLINE es una plataforma inmobiliaria intermediaria online. El usuario ARRENDADOR reconoce que si alquilar su inmueble a un usuario de <a href="https://www.iamoving.com" style="color:#EADD03;">www.iamoving.com</a>, será el, el usuario ARRENDADOR el que abonará el coste de los servicios de IAMOVING. El usuario ARRENDADOR reconoce que todos los servicios ofrecidos por IAMOVING ONLINE, son de manera online. Y dichos servicios el usuario ARRENDADOR podrás conocer a través de este <a href="https://iamoving.com/alquiler" target="_blank">enlace</a>.</p>			
			<p><b><u>Condiciones al arrendador</u></b>: 3 meses de exclusiva. La fecha de inicio será la fecha de alta de su inmueble publicado en la plataforma <a href="https://www.iamoving.com" style="color:#EADD03;">www.iamoving.com</a>. Llegado el vencimiento de la exclusiva, éste se prorrogará por 3 meses más y así sucesivamente, salvo que el arrendador manifieste a IAMOVING por escrito, con treinta días de antelación como mínimo a la fecha de vencimiento de la exclusiva o de cualquiera de las prórrogas su voluntad de no renovarlo. En el caso de que el arrendador rescindir la exclusividad estipulada anteriormente, el arrendador reconoce abonar una mensualidad del precio de su inmueble que lo tenemos publicado bajo su voluntad o aceptación de alquiler en la plataforma, en concepto de penalización.</p>			
			<p><b><u>Nuestros honorarios al arrendador</u></b>: Una mensualidad de la renta + IVA, en un pago único. En el caso de que la propiedad no abone dichos honorarios a la mercantil hasta la firma del contrato, se le aplicará una penalización de dos mensualidades de la renta + iva. La mercantil notificará el usuario un requerimiento de pago para que proceda al mismo en un plazo de siete (7) días naturales, reservándose el derecho de iniciar un procedimiento judicial con el fin de salvaguardar lo que a su beneficio convenga.</p>			
			<p><b><u>Final del servicio</u></b>: Una vez se haya realizado la firma de contrato de alquiler, y estando todas las partes de acuerdo se finaliza los servicios de IAMOVING y la misma no se responsabiliza de cualquier acción posterior realizada por el arrendatario o arrendador.</p>			
			<p><b>PENALIZACIÓN</b>. Que en el caso de que el arrendador alquile su inmueble a uno de los usuarios arrendatarios facilitados y/o presentados por LA PLATAFORMA o a algún pariente de las personas que la plataforma hubiera presentado o incluso a una entidad en la que ellos mismos participen de manera unilateral y sin el conocimiento o consentimiento de la mercantil, el propietario tendrá la obligación de abonar unos honorarios correspondientes a dos mensualidades del precio de su inmueble que lo tenemos publicado bajo su voluntad o aceptación de alquiler en la plataforma, en concepto de penalización.</p>
			 <p><b>PENALIZACIÓN</b>. Una vez que el propietario manifieste su intención de alquilar su inmueble a uno de nuestros usuarios se llevará a cabo la formalización de este interés con una señal en concepto de reserva de arrendamiento entre nuestro usuario arrendatario y la plataforma. En el caso de que el arrendador decida no continuar con la firma del contrato, siendo la causa achacable única y exclusivamente del arrendador éste deberá indemnizar la plataforma en concepto de penalización, correspondientes a dos mensualidades del precio de su inmueble que lo tenemos publicado bajo su voluntad o aceptación de alquiler en la plataforma, en concepto de penalización.</p>
        </div>
    </body>
</html>