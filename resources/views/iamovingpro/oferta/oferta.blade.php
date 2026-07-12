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
		.texto-centrado{
		text-align: center;
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
	<p class="texto-centrado">														
		<img src="https://iamoving.com/img/oferta_image.png">
	</p>
        <h4 style="text-align: center;margin-bottom:-5px;">Ref. <?php if (isset($inmueble_id)) {echo $inmueble_id;}	?></h4>
		<h3  style="text-align: center;margin-bottom:-5px;">OFERTA DE ARRENDAMIENTO</h3>

        <div class="contenido">			
			<p class="texto-centrado" style="margin-bottom:25px;">En Madrid, a <?php if (isset($fecha_letra))
															{echo $fecha_letra;}
															?></p>
            <!--<pre style='display:inline'>&#09;</pre>-->
			
				<p><?php 
if ($numero_arrendatarios==1) {
    echo "D. ".strtoupper($name).", mayor de edad, con ".$idDoc." número ".$dni.", está interesado en alquilar la vivienda sito en la ";
} elseif ($numero_arrendatarios==2) {
    echo "D. ".strtoupper($name).", mayor de edad, con ".$idDoc." número ".$dni.", y D.".strtoupper($name2).", mayor de edad, con ".$idDoc2." número ".$dni2.", están interesados en alquilar la vivienda sito en la ";
} elseif ($numero_arrendatarios==3) {
    echo "D. ".strtoupper($name).", mayor de edad, con ".$idDoc." número ".$dni.", D.".strtoupper($name2).", mayor de edad, con ".$idDoc2." número ".$dni2.", y D.".strtoupper($name3).", mayor de edad, con ".$idDoc3." número ".$dni3.", están interesados en alquilar la vivienda sito en la ";
} elseif ($numero_arrendatarios==4) {
    echo "D. ".strtoupper($name).", mayor de edad, con ".$idDoc." número ".$dni.", D.".strtoupper($name2).", mayor de edad, con ".$idDoc2." número ".$dni2.", D.".strtoupper($name3).", mayor de edad, con ".$idDoc3." número ".$dni3.", y D.".strtoupper($name4).", mayor de edad, con ".$idDoc4." número ".$dni4.", están interesados en alquilar la vivienda sito en la ";
} elseif ($numero_arrendatarios==5) {
    echo "D. ".strtoupper($name).", mayor de edad, con ".$idDoc." número ".$dni.", D.".strtoupper($name2).", mayor de edad, con ".$idDoc2." número ".$dni2.", D.".strtoupper($name3).", mayor de edad, con ".$idDoc3." número ".$dni3.", D.".strtoupper($name4).", mayor de edad, con ".$idDoc4." número ".$dni4.", y D.".strtoupper($name5).", mayor de edad, con ".$idDoc5." número ".$dni5.", están interesados en alquilar la vivienda sito en la ";
}
?> <?php if (isset($direccion_completa)) {echo $direccion_completa;}	?> y <?php if ($numero_arrendatarios==1) {echo "realiza";} else {echo "realizan";} ?> una <b>oferta de (<?php if (isset($importe)) {echo number_format($importe, 2, ',', '.');}	?>€)</b>.</p>
				<p>Dicho esto, <b><?php if ($numero_arrendatarios==1) {echo "hace";} else {echo "hacen";} ?> la entrega de (<?php if (isset($importe)) {echo number_format($importe, 2, ',', '.');}	?>€) a IAMOVING ONLINE, S.L., CIF B-88297825, Calle Serrano, 93 - 3o E. 28006 - Madrid, representada por Roberto Santucci, NIF X8880708-V</b>, para formalizar la oferta de arrendamiento. Esta cantidad será descontada del importe total que debe ser abonado en la firma del contrato.</p>
				<p>Si la propiedad no acepta la oferta en un plazo de 3 días hábiles a la fecha de este documento se devolverá la cantidad de <b>(<?php if (isset($importe)) {echo number_format($importe, 2, ',', '.');}	?>€)</b> por transferencia bancaria a la parte interesada. Esta cantidad será a fondo perdido en el caso de que parte interesada no tenga más interés en alquilar la vivienda mencionada en este documento.</p>
				<p>Además, IAMOVING ONLINE reconoce abonar el 50% de <b>(<?php if (isset($importe)) {echo number_format($importe, 2, ',', '.');}	?>€)</b> a la propiedad, en el caso de que la parte interesada decida no continuar con el contrato de arrendamiento. </p>
			
			<p class="texto-centrado" style="margin-bottom:-15px;"><b>Dicha cuantía (<?php if (isset($importe)) {echo number_format($importe, 2, ',', '.');}	?>€) será abonada con los siguientes datos:</b></p>
			<p class="texto-centrado" style="margin-bottom:-15px;"><b>Titular: IAMOVING ONLINE SOCIEDAD LIMITADA</b></p>
			<p class="texto-centrado" style="margin-bottom:-15px;"><b>CIF: B-88297825</b></p>
			<p class="texto-centrado" style="margin-bottom:-15px;"><b>Entidad Bancaria: Banco Santander</b></p>
			<p class="texto-centrado" style="margin-bottom:-15px;"><b>IBAN: ES22-0049-4775-7123-1610-3979</b></p>
			<p class="texto-centrado"><b>SWIFT: BSCHESMM</b></p>


			<p class="texto-centrado">En el caso de que IAMOVING ONLINE no reciba dicha transferencia, este documento quedará sin ningún valor contractual.</p>
										<p class="texto-centrado"><b>Desglose del pago inicial:</b></p>


			<p class="texto-centrado" style="margin-bottom:-15px;">IAMOVING honorarios............................................. (<?php if (isset($importe)) {echo number_format($importe, 2, ',', '.');}	?>€)</p>			
			<p class="texto-centrado" style="margin-bottom:-15px;">I.V.A <?php if (isset($iva)) {echo $iva;}	?>%....................................................................(<?php if (isset($importe_iva)) {echo number_format($importe_iva, 2, ',', '.');}	?>€) </p>
			<p class="texto-centrado"><?php if (isset($fianza)) {if ($fianza<2){echo $fianza." mes";} else{echo $fianza." meses";}};  ?> de fianza............................................................ (<?php if (isset($importe_fianza)) {echo number_format($importe_fianza, 2, ',', '.');}	?>€)</p>			
			<p class="texto-centrado">Importe total en la firma.............................................(<?php if (isset($total)) {echo number_format($total, 2, ',', '.');}	?>€) + mes en curso</p>			
			<p class="texto-centrado"  style="margin-bottom:15px;"><b>Fecha máxima de la firma del contrato:</b> A <?php if (isset($fecha_entrada_letra))
															{echo $fecha_entrada_letra;}
															?>.</p>	
			<p style="margin-bottom:-7px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;El interesado&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Roberto Santucci</p>	
			<p class="texto-justificado-derecha">														
				<img src="https://iamoving.com/img/oferta_firma.png">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</p>			
        </div>
    </body>
</html>