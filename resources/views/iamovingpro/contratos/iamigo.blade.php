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
        <h1>Términos y condiciones</h1>
        <div class="contenido">			
			<p class="texto-justificado-derecha">En <?php if (isset($ciudad))
															{echo $ciudad;}
															else
															{echo '------';}
															?>, a <?php if (isset($fecha_letra))
															{echo $fecha_letra;}
															else
															{echo '------';}
															?></p>
            <pre style='display:inline'>&#09;</pre>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;De una parte, la mercantil IAMOVING ONLINE, S.L., con CIF B-88297825, y domicilio en la Calle Serrano, número 93, 3º E (28006-Madrid), correo electrónico: <a href="&#109;&#097;&#105;&#108;&#116;&#111;:&#105;&#110;&#102;&#111;&#064;&#105;&#097;&#109;&#111;&#118;&#105;&#110;&#103;&#046;&#099;&#111;&#109;">info@iamoving.com</a>, teléfono +34 914 870 849; representada en este acto por D. Roberto Santucci, mayor de edad, con NIF X8880708-V. En adelante “IAMOVING”</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;De otra parte, D./Dª. <?php if (isset($name))
															{echo $name;}
															else
															{echo '..........................';}
															?>, mayor de edad, teléfono <?php if (isset($phone))
															{echo $phone;}
															else
															{echo '...........';}
															?> y correo electrónico:<?php if (isset($email))
															{echo $email;}
															else
															{echo '..........................';}
															?>. En adelante “LA PROPIEDAD”.</p>
			<p>Todas las notificaciones y comunicaciones entre los LA PROPIEDAD y IAMOVING se considerarán eficaces a todos los efectos, siempre cuando se realicen a través de cualquier de los medios detallados anteriormente. </p>
			<p><b>Actuando en la representación señalada la primera y en su propio nombre y representación la segunda; y reconociéndose la capacidad legal suficiente, </b></p>
            <h5>EXPONEN</h5>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I.- Que IAMOVING ONLINE S.L. es una mercantil dedicada, entre otras, a la intermediación en la compraventa y alquiler de inmuebles, como agentes de la propiedad inmobiliaria. En adelante “IAMOVING”;</p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;II.- Que D./Dª <?php if (isset($name))
															{echo $name;}
															else
															{echo '..........................';}
															?> es propietario de la finca que se describe a continuación: <?php if (isset($nombre_calle))
															{echo $nombre_calle.', '.$numero_calle. ' '. $piso_calle.'-'.$ciudad;}
															else
															{echo '..........................';}
															?> en adelante “LA PROPIEDAD”.</p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;III.- Que la Propiedad está interesada y  acepta que IAMOVING ofrezca el inmueble de su propiedad a sus usuarios (potenciales arrendatarios y compradores) y para lo que ambas partes han convenido la firma del presente contrato, rigiéndose por lo dispuesto en las siguientes:</p>
			<h5>ESTIPULACIONES</h5>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><u>Primera.- Objeto.-</u></b> </p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IAMOVING se compromete a la realización de todos los servicios que a continuación se expondrán y a excepción de los consistentes en “<b>realización de visitas físicas a los usuarios presentados por IAMOVING</b>” y que serán realizadas por La Propiedad, quien lo acepta; todo ello según las estipulaciones y con sujeción a las condiciones que a continuación se detallarán.</p>
			<p></p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><u>Segunda.- De los servicios a realizar por cada una de las partes.-</u></b>  </p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;><b>Servicios a realizar por IAMOVING:</b> </p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Servicios previos:</p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Creación detallada de un anuncio y publicación para sus usuarios.</p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Publicitamos el anuncio en nuestra plataforma propia, en las redes sociales de IAMOVING: Instagram, Facebook, YouTube, Tik Tok y en idealista también.</p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Recepción, gestión de las peticiones de visita y traslado a la Propiedad de dichas peticiones así como del perfil de cada solicitante a efectos de que La Propiedad confirme o rechace dicha visita solicitada.</p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Estudio de Solvencia del potencial arrendatario que se efectuará a través de un análisis de solvencia, morosidad y viabilidad. </p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Negociación y redacción del contrato de alquiler en su nombre y en defensa de sus intereses.</p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Resolución de consultas relativas al contrato de arrendamiento por escrito, mediante correo electrónico. </p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Redacción y envío de todas aquellas comunicaciones que deban ser remitidas al arrendatario.</p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Actualización de la renta anual según IPC.</p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Asesoramiento en cuanto a las distintas obligaciones fiscales que puedan derivarse del contrato de arrendamiento: alta en Hacienda como Arrendador y liquidación de IVA.</p>			
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Reclamaciones extrajudiciales en caso de impago de rentas o cualquier otra cantidad asimilable.</p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;><b>Servicios adicionales en caso de COMPRAVENTA:</b> </p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-Negociación y redacción del contrato de arras en su nombre y en defensa de sus intereses.</p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-Redacción y/o Revisión y/o Asesoramiento para la formalización de la Escritura de Compraventa.</p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-Resolución de consultas relativas al contrato de arras y/o escritura de compraventa por escrito, mediante correo electrónico. </p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-Redacción y envío de todas aquellas comunicaciones que deban ser remitidas a la parte compradora y hasta la formalización de la escritura de compraventa.</p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;><b>Servicios a realizar por LA PROPIEDAD: :</b> </p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-Realización de la visita física a los usuarios presentados por IAMOVING. </p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><u>Tercera.- De los Honorarios por los servicios prestados por cada una de las partes.-</u></b> </p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>Que los servicios a realizar por IAMOVING y descritos en la Estipulación anterior, serán <b>GRATUITOS para La PROPIEDAD.</b> </p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sin perjuicio de lo anterior, IAMOVING percibirá de sus usuarios Compradores/Arrendatarios, los siguientes Honorarios al momento de formalizar el contrato de arras/el contrato de alquiler: </p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a) COMPRAVENTA: 3% + IVA del precio de venta</p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b) ALQUILER: Cantidad equivalente a 1 mes de la renta pactada + IVA</p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>Siempre que finalmente se alquile o se venda la finca a uno de los usuarios de IAMOVING a los que LA PROPIEDAD ha realizado la vista; IAMOVING se compromete a abonar a LA PROPIEDAD las siguientes cantidades: </p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a) COMPRAVENTA: 50% de los honorarios netos percibidos por IAMOVING por la venta por parte de sus usuarios.</p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b) ALQUILER: 50% de los honorarios netos percibidos por IAMVOVING por la venta por parte de sus usuarios.</p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;El pago de la anterior cantidad se efectuará, en todo caso, una vez IAMOVING haya percibido los honorarios pactados para cada caso, por parte de sus usuarios; procediendo, una vez lo anterior, a abonar la cantidad correspondiente según lo establecido anteriormente a LA PROPIEDAD y en la cuenta bancaria que por esta y a dichos efectos se designe. </p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Que cualquier gasto en el que pudiera incurrir La Propiedad como consecuencia de la realización de su colaboración descrita en el presente, serán asumidas por ésta sin que pueda efectuarse reclamación alguna por los mismos a IAMOVING.</p>			
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><u>Cuarta.- Duración.-</u></b> </p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Que el presente contrato se pacta por una duración INDEFINIDA, entrando en vigor una vez que la propiedad acepte los términos y condiciones y la política de privacidad de IAMOVING.</p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><u>Quinta.- Causas de resolución.-</u></b> </p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Que el presente podrá ser resuelto además de por las cusas previstas en el mismo y las legalmente establecidas, por las siguientes:</p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-Por mutuo acuerdo de las partes.</p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-Por incumplimiento por cualquiera de las partes de las obligaciones asumidas en virtud del presente contrato. </p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-Por decisión unilateral de cualquiera de las partes, bastando para ello la comunicación por escrito y sin que pueda derivarse de dicha decisión, indemnización o reclamación alguna por ninguna de las partes. </p>			
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><u>Sexta.- Obligaciones y Prohibiciones.-</u></b> </p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>Que LA PROPIEDAD se compromete a que todo aquella información y material fotográfico y de video y que sea facilitado a IAMOVING en virtud del presente, sea veraz y se ajuste a la realidad; exonerando expresamente a IAMOVING de cualquier responsabilidad que se pudiera derivar como consecuencia del incumplimiento del anterior compromiso por parte de LA PROPIEDAD. Además, La propiedad autoriza que IAMOVING saque las fotos, videos e informaciones de sus anuncios que ya están publicados en los portales inmobiliarios, si necesario.</p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>Que LA PROPIEDAD se compromete a que, en el caso de que se produzcan reformas, cambios de muebles, cambios en la pintura o cualquier otra modificación tanto en el inmueble como con respecto a la información facilitada sobre el mismo y con respecto a la comunicada previamente y que pueda afectar a la veracidad del anuncio; procederá a comunicar por escrito a IAMOVING dichas modificaciones o alteraciones y a efectos de su actualización en las correspondientes publicaciones. </p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>Que LA PROPIEDAD no podrá, en ningún caso, vender/alquiler la finca objeto del presente a los usuarios facilitados y/o presentados por IAMOVING, así como tampoco, a ninguno pariente cercano de las mismas o mercantiles en las que dichos usuarios participen, sin la intermediación o el consentimiento de IAMOVING. La anterior prohibición estará vigente tanto la duración del presente contrato como una vez resuelto el mismo, por el motivo que fuere. En caso de incumplimiento por parte de LA PROPIEDAD, esta vendrá obligada a abonar a IAMOVING en concepto de penalización las cantidades correspondientes a: </p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;a) COMPRA: 3% + IVA del precio de venta publicado en IAMOVING</p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b) ALQUILER: 1 mes de renta + IVA según renta publicada en IAMOVING</p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;>Que LA PROPIEDAD  se obliga a que todo tipo de comunicación que sea necesario realizar con los usuarios de IAMOVING (arrendatarios y compradores) deberá efectuarse siempre y en todo caso a través de IAMOVING o persona expresamente designada por ésta. Es decir, IAMOVING siempre será la interlocutora entre LA PROPIEDAD y los usuarios facilitados por IAMOVING. De forma enunciativa pero no restrictiva se señalan algunas de estas comunicaciones: negociaciones en cuanto al precio, solicitudes de segundas o terceras visitas al inmueble, consultas relacionadas al inmueble después de realizar la vistita, dudas o consultas por parte de La Propiedad en cuanto al perfil del usuario o cualquier otra relacionada con el mismo, cualquier duda o consulta entre las partes y que pudiera plantearse. </p>			
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;En caso de que el usuario se pusiera en contacto o efectuara cualquier tipo de comunicación a La Propiedad, ésta deberá remitirle de forma inmediata a IAMOVING y/o persona designada; debiendo igualmente proceder a comunicar lo anterior directamente a IAMOVING.</p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><u>Séptima.- Confidencialidad y Protección de Datos.-</u></b> </p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ambas partes se comprometen a mantener la confidencialidad de cualquier información que pudieran obtener en virtud del presente contrato o a la que pudieran tener acceso como consecuencia del mismo y a excepción de toda aquella información y material que sea remitida por LA PROPIEDAD  a efectos de que la misma sea publicada en los canales recogidos en el presente, lo que expresamente autoriza. </p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Igualmente se obligan ambas partes a no revelar, ni utilizar directa o indirectamente la información y conocimientos adquiridos, derivados de la relación contractual acordada entre ellas, en otros servicios que no sean el objeto del presente contrato. Igualmente se comprometen a tomar las medidas necesarias, tanto respecto a sus empleados como a terceros que pudieran tener alguna relación con el presente contrato, para asegurar el cumplimiento de lo acordado en esta cláusula. </p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Una vez extinguido el presente contrato, ambas partes destruirán toda la información que sobre la presente relación haya almacenado en cualquier soporte o haya reproducido por cualquier procedimiento.</p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ambas Partes se comprometen a guardar el más absoluto secreto respecto de los datos de carácter personal a que tengan acceso en cumplimiento del presente contrato y a observar todas las previsiones legales que se contienen tanto en el RGPD como en la Ley Orgánica 3/2018, de 5 de diciembre, de Protección de Datos Personales y garantía de los derechos digitales.</p>
			<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;De esta forma, las partes son conscientes de que  mediante la firma de este Contrato consienten que sus datos personales recogidos en el mismo, así como aquellos que se pudiesen recoger en el futuro para poder dar cumplimiento al mismo, podrán ser incorporados por la otra parte a su propio fichero de recogida de datos.</p>			
        </div>
    </body>
</html>