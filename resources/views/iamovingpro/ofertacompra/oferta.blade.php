<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Oferta de Compra</title>
    <style>
        @page {
            margin: 15px;
            header: html_firmaHeader;
        }
        /* Página final sin firma en la esquina */
        @page :last {
            header: html_emptyHeader;
        }
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12pt;
            line-height: 1.4;
            color: #000;
            margin: 0;
            padding: 15px;
        }
        .firma-esquina {
            position: absolute;
            top: 5px;
            left: 5px;
            width: 100px; /* Ajusta según el tamaño que necesites */
            z-index: 1000;
        }
        .header {
            text-align: center;
            margin-bottom: 15px;
            padding-top: 30px; /* Espacio adicional para que no se superponga con la firma */
        }
        .logo {
            text-align: center;
            margin-bottom: 25px;
        }
        .logo img {
            max-width: 400px;
            height: auto;
            margin-bottom: 15px;
        }
        .ref {
            text-align: center;
             margin-top: 15px;
            margin-bottom: 25px;
            font-weight: bold;
        }
        .fecha {
            text-align: center;
            margin-bottom: 20px;
        }
        .titulo {
            text-align: center;
            font-weight: bold;
            margin-bottom: 15px;
            font-size: 14pt;
        }
        .seccion-titulo {
            text-align: center;
            font-weight: bold;
            margin-top: 15px;
            margin-bottom: 10px;
        }
        .underline {
            text-decoration: underline;
            font-weight: bold;
        }
        .texto-justificado {
.texto-justificado {
    text-align: justify;
    text-indent: 2em; /* Sangría del primer párrafo */
    margin-left: 2.5em; /* Margen izquierdo para toda la caja del texto */
    margin-right: 2.5em; /* Mantiene el margen derecho igual (o puedes omitir esta línea si no quieres especificar) */
}            
        }
        ul {
            padding-left: 20px;
            margin-top: 5px;
            margin-bottom: 10px;
        }
        li {
            text-align: justify;
            margin-bottom: 8px;
            margin-right: 3em; /* Añadido margen derecho de 2.5em */
        }

        li.square {
            list-style: square; /* Elimina el marcador predeterminado */
            padding-left: 4.5em; /* Doble indentación */
            position: relative; /* Para posicionar el pseudo-elemento */
            margin: 0.5em 0; /* Añade algo de margen vertical para separación */
            margin-right: 3em; /* Añadido margen derecho de 2.5em */
        }

        li.square::before {
            list-style: square;
            content: ""; /* Necesario para que el pseudo-elemento aparezca */
            width: 12px; /* Ancho del punto gordo */
            height: 12px; /* Alto del punto gordo */
            background-color: black; /* Color del punto */
            border-radius: 50%; /* Hace que sea redondo */
            position: absolute;
            left: 1.5em; /* Ajustado para que sea más visible */
            top: 0.4em; /* Centrado verticalmente con el texto */
            display: inline-block; /* Cambiado a inline-block */
        }  
        
        li.punto-gordo {
            list-style: circle; /* Elimina el marcador predeterminado */
            padding-left: 4.5em; /* Doble indentación */
            position: relative; /* Para posicionar el pseudo-elemento */
            margin: 0.5em 0; /* Añade algo de margen vertical para separación */
            margin-right: 3em; /* Añadido margen derecho de 2.5em */
        }

        li.punto-gordo::before {
            list-style: circle;
            content: ""; /* Necesario para que el pseudo-elemento aparezca */
            width: 12px; /* Ancho del punto gordo */
            height: 12px; /* Alto del punto gordo */
            background-color: black; /* Color del punto */
            border-radius: 50%; /* Hace que sea redondo */
            position: absolute;
            left: 1.5em; /* Ajustado para que sea más visible */
            top: 0.4em; /* Centrado verticalmente con el texto */
            display: inline-block; /* Cambiado a inline-block */
        }
        .footer {
            margin-top: 30px;
            text-align: center;
        }
        .firma {
            margin-top: 0;
            text-align: center;
	    margin-bottom: 0;
        }
        .firma p {
            margin-bottom: 10px; /* Reducido de 30px a 10px para acercar el texto a la firma */
            margin-top: 5px; /* Añadido pequeño margen superior */
        }
        .firma-container {
            text-align: center;
            margin-bottom: 5px; /* Espacio mínimo bajo la firma */
        }
        .firma-container img {
            max-width: 200px;
            margin-bottom: 0; /* Elimina margen bajo la imagen */
        }
        .page-break {
            page-break-after: always;
        }
        .bold {
            font-weight: bold;
        }
        .center {
            text-align: center;
        }
        .bank-info {
            text-align: center;
            font-weight: bold;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <!-- Definición del encabezado para mPDF con la imagen de firma -->
    <htmlpageheader name="firmaHeader">
        <div style="position: absolute; top: 5px; left: 5px;">
            <img src="https://iamoving.com/img/firma.png" alt="Firma" width="100">
        </div>
    </htmlpageheader>
    
    <!-- Encabezado vacío para la última página -->
    <htmlpageheader name="emptyHeader">
        <!-- Vacío intencionalmente para no mostrar firma -->
    </htmlpageheader>

    <div class="header">
        <div class="logo">
            <!-- Usar ruta relativa para la imagen del logo -->
            <img src="https://iamoving.com/img/oferta_image.png" alt="IAMOVING">
        </div>
    </div>
    
    <div class="seccion-titulo">DOCUMENTO DE OFERTA</div>
    
    <div class="ref">Ref. {{ $inmueble_id }}</div>
    
    <div class="fecha">En Madrid, a {{ $dia }} de {{ $mes }} de {{ $annio }}</div>
    
    <div class="seccion-titulo">REUNIDOS</div>
    
    <p class="texto-justificado">
        De una parte, la mercantil IAMOVING ONLINE, S.L., con CIF B-88297825,
        y domicilio en la Calle Serrano, número 93, 3º E (28006-Madrid);
        representada en este acto por D. Roberto Santucci, con NIE número X8880708-V.

    </p>
    
    <p class="texto-justificado">
        De otra parte, {{ $datosCompradores }}, en adelante, denominado como LA PARTE COMPRADORA.
    </p>

    
    <p class="texto-justificado">
        Actuando en la representación señalada la primera y en su propio
        nombre y representación la segunda; y reconociéndose la capacidad
        legal suficiente,
    </p>
    
        <div class="seccion-titulo">EXPONEN</div>
        
        <p class="texto-justificado">
            I.- Que IAMOVING ONLINE S.L. es una mercantil dedicada, entre otras, a
            la intermediación en la compraventa y alquiler de inmuebles, como
            agentes de la propiedad inmobiliaria.
        </p>
        
        <p class="texto-justificado">
            II.- Que LA PARTE COMPRADORA está interesada en comprar una de las
            viviendas ofrecidas por IAMOVING ONLINE S.L.; en concreto, la vivienda
            sita en la {{ $direccionCompleta }}{{ $complementos }}
        </p>
        
        <p class="texto-justificado">
            III.- Para lo anterior, ambas partes han convenido la firma del
            presente ENCARGO de COMPRA, con sujeción a las siguientes,
        </p>
        <!-- Salto de página-->
<div class="page-break"></div>
    <div class="header">
        <div class="logo">
            <!-- Usar ruta relativa para la imagen del logo -->
            <img src="https://iamoving.com/img/oferta_image.png" alt="IAMOVING">
        </div>
    </div>
        <div class="seccion-titulo">ESTIPULACIONES</div>
        
        <p class="texto-justificado">
            <span class="underline">Primera.- De la oferta de compra y su formalización.-</span>
        </p>
        
        <p class="texto-justificado">
            Que estando LA PARTE COMPRADORA interesada en adquirir el inmueble
            reseñado en el Exponen II, mediante el presente, LA PARTE COMPRADORA
            viene a formalizar OFERTA DE COMPRA del precitado inmueble por un
            importe igual a ({{ number_format($importeSoloDigitos, 2, ',', '.') }}€)
        </p>
        
        <p class="texto-justificado">
            La anterior oferta se entenderá debidamente formalizada con la entrega
            por LA PARTE COMPRADORA a IAMOVING ONLINE S.L., de la cantidad de
            3.000,00€, lo que se efectúa coincidiendo con la firma de la presente
            oferta. En caso de que no se efectuara la anterior entrega, en ningún
            caso se entenderá efectuada la anterior oferta, eximiendo a IAMOVING
            ONLINE S.L. de cualquier responsabilidad que pudiera derivarse.
        </p>
        
        <p class="texto-justificado">
            <span class="underline">Segunda.- De la comunicación de la oferta al propietario</span>
        </p>
        
        <p class="texto-justificado">
            Una vez formalizada esta oferta, se dará traslado de la misma a la
            PARTE VENDEDORA a los efectos de su aceptación.
        </p>
        
        <p class="texto-justificado">
            En caso de que la presente oferta no sea aceptada por la PARTE
            VENDEDORA, IAMOVING ONLINE S.L. restituirá a LA PARTE COMPRADORA, en
            un plazo máximo de 3 días hábiles desde la fecha del presente
            documento, la cantidad recibida de 3.000,00€, mediante transferencia
            bancaria, sin intereses y sin que LA PARTE COMPRADORA esté autorizada
            a reclamar indemnización de ninguna clase.
        </p>
        
        <p class="texto-justificado">
            Una vez aceptada esta oferta por la VENDEDORA, se procederá a iniciar
            los trámites necesarios para la formalización del contrato de arras,
            lo que se hará, salvo por causas que no sean imputables a IAMOVING
            ONLINE S.L., en el plazo máximo de {{ $plazoFormalizar }} días hábiles desde que se
            comunique a LA PARTE COMPRADORA la aceptación por parte de la
            propiedad de la presente oferta.
        </p>
        
        <!-- Page break to match Word document format -->
        <!-- Salto de página-->
<div class="page-break"></div>
    <div class="header">
        <div class="logo">
            <!-- Usar ruta relativa para la imagen del logo -->
            <img src="https://iamoving.com/img/oferta_image.png" alt="IAMOVING">
        </div>
    </div>
        
        <p class="texto-justificado">
            <span class="underline">Tercera.- Desistimiento por LA PARTE COMPRADORA /ofertante.-</span>
        </p>
        
        <p class="texto-justificado">
            Que para el caso de que una vez formalizada la oferta y aceptada por la
            propiedad, según lo estipulado en el presente, LA PARTE COMPRADORA
            decidiera no continuar con la compra del inmueble; no procederá la
            devolución de la cantidad entregada a efectos de formalizar la oferta
            (3.000,00€) y que quedará en disposición de IAMOVING ONLINE S.L.,
            quien, a su vez, se compromete a abonar el 50% de dicha cantidad
            (1.500,00€) a la propiedad y sin que proceda reclamación ni
            indemnización alguna para el ofertante ni por este ni por ningún otro
            concepto.
        </p>
        
        <p class="texto-justificado">
            Sin perjuicio de lo anterior, para el caso de desistimiento
            justificado por parte del ofertante, según lo establecido a
            continuación; se procederá a la devolución íntegra de la cantidad
            entregada para la formalización de la oferta (3.000,00).
        </p>
        
        <p class="texto-justificado">
            A los efectos anteriores se entiende justificado el desistimiento por
            parte del ofertante cuando:
        </p>
        
        <ul>
            <li class="square">
                Una vez obtenida la correspondiente Nota Simple del inmueble en el
                Registro de la Propiedad, la finca se encuentre gravada con cargas
                por un importe superior a la cantidad correspondiente a la oferta
                de compra efectuada mediante el presente.
            </li>
            <li class="square">
                Por motivos imputables a la propiedad, resulte imposible alcanzar un
                acuerdo en cuanto a las condiciones específicas a regular en el
                contrato de arras y que sean de importancia sustancial a efectos
                de llevar a término la compraventa del inmueble.
            </li>
        </ul>
        
        <p class="texto-justificado">
            <span class="underline">Cuarta.- Servicios y honorarios de IAMOVING ONLINE S.L.-</span>
        </p>
        
        <p class="texto-justificado">
            Que para el caso de que la oferta sea aceptada por la propiedad del
            inmueble, IAMOVING ONLINE S.L., a través de su departamento jurídico,
            procederá a prestar los siguientes servicios:
        </p>
        
        <ul>
            <li  class="square">
                VERIFICACIÓN PREVIA: Se especificará la realidad registral del
                inmueble, lo cual indicará si sobre el mismo pesa o no algún tipo
                de cargas.
            </li>
            <li class="square">
                Redacción del contrato de arras, negociaciones y
                modificaciones sobre el mismo, hasta su formalización y en los plazos
                y en las condiciones establecidas en las estipulaciones precedentes.
            </li>
            <li class="square">
                Asesoramiento en cuanto a la documentación necesaria para la
                formalización de la Escritura de Compraventa
            </li>            
        <!-- Salto de página-->
<div class="page-break"></div>
    <div class="header">
        <div class="logo">
            <!-- Usar ruta relativa para la imagen del logo -->
            <img src="https://iamoving.com/img/oferta_image.png" alt="IAMOVING">
        </div>
    </div>            
            <li class="square">
                Redacción y/o Revisión y/o Asesoramiento para la elaboración y
                formalización de la Escritura de Compraventa.
            </li>
            <li class="square">
                Resolución de consultas relativas al contrato de arras y/o Escritura
                de Compraventa, por escrito, mediante correo electrónico.
            </li>
            <li class="square">
                Inversión: Operación de compraventa para posterior alquiler del inmueble (servicio incluido al usuario COMPRADOR para su primer inquilino): Búsqueda y selección de inquilinos, contrato de arrendamiento, gestión de seguro de impago y otros trámites administrativos. La búsqueda y selección de inquilinos es un proceso delicado que requiere de diversas gestiones (análisis de candidatos, contratación de seguro de impago, etc.).
            </li>
            <li class="square">
                Financiación: Ayudamos al usuario COMPRADOR en Búsqueda de una financiación.
            </li>            
        </ul>
        

        
        <!--<p class="texto-justificado">
            <span class="underline">Cuarto.- De los honorarios de IAMOVING ONLINE S.L.-</span>
        </p>-->
        
        <p class="texto-justificado">
            Que por los servicios de intermediación y gestión anteriormente
            descritos LA PARTE COMPRADORA deberá abonar a IAMOVING ONLINE S.L. la
            cantidad equivalente al {{ $comisionIamoving }}% {{ $comisionIva }} del precio de la compraventa.
        </p>
        
        <p class="texto-justificado">
            Dicha cantidad deberá ser abonada coincidiendo con la firma del
            contrato de arras y a la que se descontará la cantidad entregada para
            la formalización de oferta (3.000,00€), a la siguiente cuenta
            corriente:
        </p>
        
        <div class="bank-info">
            Titular: IAMOVING ONLINE SOCIEDAD LIMITADA<br> CIF: B-88297825<br>
            Entidad Bancaria: Banco Santander<br> IBAN: ES22-0049-4775-7123-1610-3979 <br>SWIFT: BSCHESMM
        </div>
        
        <p class="texto-justificado">
            <span class="underline">Quinta.- Condiciones e importe a abonar en concepto de arras.-</span>
        </p>
        
        <p class="texto-justificado">
            Que para el caso de que la oferta fuera aceptada por la propiedad,
            procediéndose a la formalización del contrato de arras en los términos
            establecidos en el presente; LA PARTE COMPRADORA deberá abonar a la
            propiedad la cantidad correspondiente a un {{ $porciento_arras }}% de la cantidad ofertada
            ({{ number_format($arras, 2, ',', '.') }}€), en concepto de señal o arras; debiendo ser
            abonada la anterior cantidad coincidiendo con la firma del precitado
            contrato de arras y junto con de los honorarios establecidos en la
            estipulación anterior.
        </p>
                <!-- Salto de página-->
<div class="page-break"></div>
    <div class="header">
        <div class="logo">
            <!-- Usar ruta relativa para la imagen del logo -->
            <img src="https://iamoving.com/img/oferta_image.png" alt="IAMOVING">
        </div>
    </div> 
        <ul>
            <li  class="punto-gordo">
                y el resto ({{ number_format($restante, 2, ',', '.') }}€) al
                momento de otorgar la escritura pública de compraventa.
            </li>
            <li class="punto-gordo">
                Carácter arras: penitenciales: esto significa que, si no se llega a
                formalizar escritura de compraventa por causas imputables al
                comprador, éste pierde las arras entregadas y si fuera por causas
                imputables al vendedor, éste debe devolverlas por duplicado.
            </li>
            <li class="punto-gordo">
                Plazo para otorgar escritura pública desde contrato de arras: {{ $plazoEscritura }} días naturales (máximo)
            </li>
            <li class="punto-gordo">
                Gastos derivados de la compraventa: corren a cargo del comprador
                excepto la plusvalía municipal que corre a cuenta del vendedor.
            </li>
            <li class="punto-gordo">
                IBI: proporcional: desde el 1/1/{{ $annio }} hasta formalización de la
                escritura el vendedor y desde esa fecha hasta el 31/12/{{ $annio }} el
                comprador.
            </li>
            <li class="punto-gordo">
                La vivienda se transmitirá libre de cargas, gravámenes e inquilinos
                u ocupantes y al corriente de gastos de suministros y de comunidad
                de propietarios. Si existiesen cargas en el momento de otorgarse
                la Escritura Pública de Compraventa, el comprador deducirá del
                precio la cantidad necesaria para su cancelación económica y
                registral, incluidos los gastos precisos para ello que correrán
                por cuenta del vendedor.
            </li>
        </ul>
        
        <p class="texto-justificado">
            Y EN PRUEBA DE CONFORMIDAD, las Partes firman el presente en dos (2)
            ejemplares y a un único efecto, en el lugar y fecha arriba indicados.
        </p>
        <!-- Salto de página para última página sin firma en la esquina -->
        <div class="page-break"></div>

        <div class="header">
            <div class="logo">
                <!-- Usar ruta relativa para la imagen del logo -->
                <img src="https://iamoving.com/img/oferta_image.png" alt="IAMOVING">
            </div>
        </div>
        
        <!-- Imagen de firma entre logo y texto -->
        <div class="firma-container">
            <img src="https://iamoving.com/img/firma.png" alt="Firma" style="max-width: 80px;">
	    <p style="margin-top: 0;">IAMOVING ONLINE SL</p>
        </div>    
        <div class="firma">
            <br>
            <br>
            <br>
            <br>
            <p>{!! $firmas !!}</p>
        </div>
        <!-- Esta es la última página, donde se usa el encabezado vacío -->
        <sethtmlpageheader name="firmaHeader" value="off" />
        <sethtmlpageheader name="emptyHeader" value="on" show-this-page="1" />	
    </body>
</html>