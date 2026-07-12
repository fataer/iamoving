
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8"> <!-- utf-8 works for most cases -->
    <meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn't be necessary -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
    <meta name="x-apple-disable-message-reformatting">  <!-- Disable auto-scale in iOS 10 Mail entirely -->
    <title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,300,400,500,600,700" rel="stylesheet">

    <!-- CSS Reset : BEGIN -->
    <style>

        html,
body {
    margin: 0 auto !important;
    padding: 0 !important;
    height: 100% !important;
    width: 100% !important;
    background: #f1f1f1;
}

/* What it does: Stops email clients resizing small text. */
* {
    -ms-text-size-adjust: 100%;
    -webkit-text-size-adjust: 100%;
}

/* What it does: Centers email on Android 4.4 */
div[style*="margin: 16px 0"] {
    margin: 0 !important;
}

/* What it does: Stops Outlook from adding extra spacing to tables. */
table,
td {
    mso-table-lspace: 0pt !important;
    mso-table-rspace: 0pt !important;
}

/* What it does: Fixes webkit padding issue. */
table {
    border-spacing: 0 !important;
    border-collapse: collapse !important;
    table-layout: fixed !important;
    margin: 0 auto !important;
}

/* What it does: Uses a better rendering method when resizing images in IE. */
img {
    -ms-interpolation-mode:bicubic;
}

/* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
a {
    text-decoration: none;
}

/* What it does: A work-around for email clients meddling in triggered links. */
*[x-apple-data-detectors],  /* iOS */
.unstyle-auto-detected-links *,
.aBn {
    border-bottom: 0 !important;
    cursor: default !important;
    color: inherit !important;
    text-decoration: none !important;
    font-size: inherit !important;
    font-family: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
}

/* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
.a6S {
    display: none !important;
    opacity: 0.01 !important;
}

/* What it does: Prevents Gmail from changing the text color in conversation threads. */
.im {
    color: inherit !important;
}

/* If the above doesn't work, add a .g-img class to any image in question. */
img.g-img + div {
    display: none !important;
}

/* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
/* Create one of these media queries for each additional viewport size you'd like to fix */

/* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
@media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
    u ~ div .email-container {
        min-width: 320px !important;
    }
}
/* iPhone 6, 6S, 7, 8, and X */
@media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
    u ~ div .email-container {
        min-width: 375px !important;
    }
}
/* iPhone 6+, 7+, and 8+ */
@media only screen and (min-device-width: 414px) {
    u ~ div .email-container {
        min-width: 414px !important;
    }
}

    </style>

    <!-- CSS Reset : END -->

    <!-- Progressive Enhancements : BEGIN -->
    <style>

	    .primary{
	background: #2f89fc;
}
.bg_white{
	background: black;
}
.bg_light{
	background: #fafafa;
}
.bg_black{
	background: #000000;
}
.bg_dark{
	background: rgba(0,0,0,.8);
}
.email-section{
	padding:0.5em;
}

/*BUTTON*/
.btn{
	padding: 5px 15px;
	display: inline-block;
}
.btn.btn-primary{
	border-radius: 5px;
	background: #2f89fc;
	color: black;
}
.btn.btn-white{
	border-radius: 5px;
	background: black;
	color: #000000;
}
.btn.btn-white-outline{
	border-radius: 5px;
	background: transparent;
	border: 1px solid #fff;
	color: #fff;
}

h1,h2,h3,h4,h5,h6{
	font-family: 'Work Sans', sans-serif;
	color: #000000;
	margin-top: 0;
	font-weight: 400;
}

body{
	font-family: 'Work Sans', sans-serif;
	font-weight: 400;
	font-size: 15px;
	line-height: 1.8;
	/*color: rgba(0,0,0,.4);*/
}

a{
	color: black;
}

table{
}
/*LOGO*/

.logo h1{
	margin: 0;
}
.logo h1 a{
	color: #000000;
	font-size: 20px;
	font-weight: 700;
	text-transform: uppercase;
	font-family: 'Poppins', sans-serif;
}

.navigation{
	padding: 0;
}
.navigation li{
	list-style: none;
	display: inline-block;;
	margin-left: 5px;
	font-size: 13px;
	font-weight: 500;
}
.navigation li a{
	color: rgba(0,0,0,.4);
}

/*HERO*/
.hero{
	position: relative;
	z-index: 0;
}

.hero .text{
	/*color: rgba(0,0,0,.3);*/
}
.hero .text h2{
	color: #000;
	font-size: 30px;
	margin-bottom: 0;
	font-weight: 300;
}
.hero .text h2 span{
	font-weight: 600;
	color: #2f89fc;
}


/*HEADING SECTION*/
.heading-section{
}
.heading-section h2{
	color: #000000;
	font-size: 28px;
	margin-top: 0;
	line-height: 1.4;
	font-weight: 400;
}
.heading-section .subheading{
	margin-bottom: 20px !important;
	display: inline-block;
	font-size: 13px;
	text-transform: uppercase;
	letter-spacing: 2px;
	color: rgba(0,0,0,.4);
	position: relative;
}
.heading-section .subheading::after{
	position: absolute;
	left: 0;
	right: 0;
	bottom: -10px;
	content: '';
	width: 100%;
	height: 2px;
	background: #2f89fc;
	margin: 0 auto;
}

.heading-section-white{
	color: rgba(255,255,255,.8);
}
.heading-section-white h2{
	font-family: 
	line-height: 1;
	padding-bottom: 0;
}
.heading-section-white h2{
	color: black;
}
.heading-section-white .subheading{
	margin-bottom: 0;
	display: inline-block;
	font-size: 13px;
	text-transform: uppercase;
	letter-spacing: 2px;
	color: rgba(255,255,255,.4);
}

/*PROJECT*/
.text-project{
	padding-top: 10px;
}
.text-project h3{
	margin-bottom: 0;
}
.text-project h3 a{
	color: #000;
}

/*FOOTER*/

.footer{
	color: rgba(255,255,255,.5);

}
.footer .heading{
	color: black;
	font-size: 20px;
}
.footer ul{
	margin: 0;
	padding: 0;
}
.footer ul li{
	list-style: none;
	margin-bottom: 10px;
}
.footer ul li a{
	color: rgba(255,255,255,1);
}


@media screen and (max-width: 500px) {


}


    </style>


</head>

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly;background-color: #222222;">
	<center style="width: 100%; background-color: #f1f1f1;">
    <div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
      &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
    </div>
    <div style="max-width: 600px; margin: 0 auto;" class="email-container">
    	<!-- BEGIN BODY -->
      <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;background-color:white;">
      	<tr>
          <td valign="top" class="bg_white">
          	<table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color:white;">
          		<tr>
          			<td class="logo" style="text-align: center;">
			            <!--<h1><a href="https://www.iamoving.com"><img src="https://www.iamoving.com/img/icono.png" width="200px"/></a></h1>-->
						<h1><a href="https://www.iamoving.com"><img src="https://www.iamoving.com/img/icono_viewings1.png" width="520px"/></a></h1>
						
			          </td>
          		</tr>
          	</table>
          </td>
	      </tr><!-- end tr -->
		  <tr>
         <td valign="middle" class="hero hero-2 bg_black" style="padding: 1em 1em;">

            <table>
                <tr><td width="90%"><hr></td></tr>
            	<tr>
            		<td class="hero hero-2 bg_black">
                      <div class="text" style="padding: 01em;background-color:white;">
                         
                            <p><span style="color:black">Hola muy buenas,</span></p>
                            <p><span style="color:black">Adjunto el documento de oferta de arrendamiento de tu inmueble.</span></p>
                            <p><span style="color:black">A continuación mostramos la documentación de los arrendatarios:</p>
							<p><span style="color:black"></u>Documentos NIF/NIE/Pasaporte</u>:</p>
@if ($nif_image) 
	<p>{{str_replace(" ","%20",$nif_image)}}</p></p>   
@endif
@if ($nif_image2)  
	<p>{{str_replace(" ","%20",$nif_image2)}}</p></p>   
@endif
@if ($nif2_image)     
	<p>{{str_replace(" ","%20",$nif2_image)}}</p></p>
@endif
@if ($nif2_image2)     
	<p>{{str_replace(" ","%20",$nif2_image2)}}</p></p>	
@endif
@if ($nif3_image)     
	<p>{{str_replace(" ","%20",$nif3_image)}}</p></p>
@endif
@if ($nif3_image2)     
	<p>{{str_replace(" ","%20",$nif3_image2)}}</p></p>
@endif
@if ($nif4_image)     
	<p>{{str_replace(" ","%20",$nif4_image)}}</p></p>	
@endif
@if ($nif4_image2)     
	<p>{{str_replace(" ","%20",$nif4_image2)}}</p></p>
@endif
@if ($nif5_image)     
	<p>{{str_replace(" ","%20",$nif5_image)}}</p></p>	
@endif
@if ($nif5_image2)     
	<p>{{str_replace(" ","%20",$nif5_image2)}}</p></p>	
@endif

<p><span style="color:black"></u>Contratos</u>:</p>
@if ($contrato_image)     
	<p>{{str_replace(" ","%20",$contrato_image)}}</p></p>	
@endif
@if ($contrato_image2)     
	<p>{{str_replace(" ","%20",$contrato_image2)}}</p></p>	
@endif
@if ($contrato2_image)     
	<p>{{str_replace(" ","%20",$contrato2_image)}}</p></p>	
@endif
@if ($contrato2_image2)     
	<p>{{str_replace(" ","%20",$contrato2_image2)}}</p></p>	
@endif
@if ($contrato3_image)     
	<p>{{str_replace(" ","%20",$contrato3_image)}}</p></p>	
@endif
@if ($contrato3_image2)     
	<p>{{str_replace(" ","%20",$contrato3_image2)}}</p></p>	
@endif
@if ($contrato4_image)     
	<p>{{str_replace(" ","%20",$contrato4_image)}}</p></p>	
@endif
@if ($contrato4_image2)     
	<p>{{str_replace(" ","%20",$contrato4_image2)}}</p></p>	
@endif
@if ($contrato5_image)     
	<p>{{str_replace(" ","%20",$contrato5_image)}}</p></p>	
@endif
@if ($contrato5_image2)     
	<p>{{str_replace(" ","%20",$contrato5_image2)}}</p></p>	
@endif
<p><span style="color:black"></u>2 últimas nóminas</u>:</p>
@if ($nomina_image)     
	<p>{{str_replace(" ","%20",$nomina_image)}}</p></p>	
@endif
@if ($nomina_image2)     
	<p>{{str_replace(" ","%20",$nomina_image2)}}</p></p>	
@endif
@if ($nomina2_image)     
	<p>{{str_replace(" ","%20",$nomina2_image)}}</p></p>	
@endif
@if ($nomina2_image2)     	
	<p>{{str_replace(" ","%20",$nomina2_image2)}}</p></p>
@endif
@if ($nomina3_image)     
	<p>{{str_replace(" ","%20",$nomina3_image)}}</p></p>	
@endif
@if ($nomina3_image2)     
	<p>{{str_replace(" ","%20",$nomina3_image2)}}</p></p>	
@endif
@if ($nomina4_image)     
	<p>{{str_replace(" ","%20",$nomina4_image)}}</p></p>	
@endif
@if ($nomina4_image2)     
	<p>{{str_replace(" ","%20",$nomina4_image2)}}</p></p>	
@endif
@if ($nomina5_image)     
	<p>{{str_replace(" ","%20",$nomina5_image)}}</p></p>	
@endif
@if ($nomina5_image2)     
	<p>{{str_replace(" ","%20",$nomina5_image2)}}</p></p>	
@endif

@if ($avalistas=='S') 
<p><span style="color:black">A continuación mostramos la documentación de los Avalistas:</p>	
<p><span style="color:black"></u>Documentos NIF/NIE/Pasaporte</u>:</p>
		@if ($nif_aval_image)     
			<p>{{str_replace(" ","%20",$nif_aval_image)}}</p></p>	
		@endif
		@if ($nif_aval_image2)     
			<p>{{str_replace(" ","%20",$nif_aval_image2)}}</p></p>	
		@endif
		@if ($nif2_aval_image)     
			<p>{{str_replace(" ","%20",$nif2_aval_image)}}</p></p>	
		@endif
		@if ($nif2_aval_image2)     
			<p>{{str_replace(" ","%20",$nif2_aval_image2)}}</p></p>	
		@endif
		@if ($nif3_aval_image)     
			<p>{{str_replace(" ","%20",$nif3_aval_image)}}</p></p>	
		@endif
		@if ($nif3_aval_image2)     
			<p>{{str_replace(" ","%20",$nif3_aval_image2)}}</p></p>	
		@endif
		@if ($nif4_aval_image)     
			<p>{{str_replace(" ","%20",$nif4_aval_image)}}</p></p>	
		@endif
		@if ($nif4_aval_image2)     
			<p>{{str_replace(" ","%20",$nif4_aval_image2)}}</p></p>	
		@endif
		@if ($nif5_aval_image)     
			<p>{{str_replace(" ","%20",$nif5_aval_image)}}</p></p>	
		@endif
		@if ($nif5_aval_image2)     
			<p>{{str_replace(" ","%20",$nif5_aval_image2)}}</p></p>	
		@endif
<p><span style="color:black"></u>Contratos</u>:</p>		
		@if ($contrato_aval_image)     
			<p>{{str_replace(" ","%20",$contrato_aval_image)}}</p></p>	
		@endif
		@if ($contrato_aval_image2)     
			<p>{{str_replace(" ","%20",$contrato_aval_image2)}}</p></p>	
		@endif
		@if ($contrato2_aval_image)     
			<p>{{str_replace(" ","%20",$contrato2_aval_image)}}</p></p>	
		@endif
		@if ($contrato2_aval_image2)     
			<p>{{str_replace(" ","%20",$contrato2_aval_image2)}}</p></p>	
		@endif
		@if ($contrato3_aval_image)     
			<p>{{str_replace(" ","%20",$contrato3_aval_image)}}</p></p>	
		@endif
		@if ($contrato3_aval_image2)     
			<p>{{str_replace(" ","%20",$contrato3_aval_image2)}}</p></p>	
		@endif
		@if ($contrato4_aval_image)     
			<p>{{str_replace(" ","%20",$contrato4_aval_image)}}</p></p>	
		@endif
		@if ($contrato4_aval_image2)     
			<p>{{str_replace(" ","%20",$contrato4_aval_image2)}}</p></p>	
		@endif
		@if ($contrato5_aval_image)     
			<p>{{str_replace(" ","%20",$contrato5_aval_image)}}</p></p>	
		@endif
		@if ($contrato5_aval_image2)     
			<p>{{str_replace(" ","%20",$contrato5_aval_image2)}}</p></p>	
		@endif
<p><span style="color:black"></u>2 últimas nóminas</u>:</p>				
		@if ($nomina_aval_image)     
			<p>{{str_replace(" ","%20",$nomina_aval_image)}}</p></p>	
		@endif
		@if ($nomina_aval_image2)     
			<p>{{str_replace(" ","%20",$nomina_aval_image2)}}</p></p>	
		@endif
		@if ($nomina2_aval_image)     
			<p>{{str_replace(" ","%20",$nomina2_aval_image)}}</p></p>	
		@endif
		@if ($nomina2_aval_image2)     
			<p>{{str_replace(" ","%20",$nomina2_aval_image2)}}</p></p>	
		@endif
		@if ($nomina3_aval_image)     
			<p>{{str_replace(" ","%20",$nomina3_aval_image)}}</p></p>	
		@endif
		@if ($nomina3_aval_image2)     
			<p>{{str_replace(" ","%20",$nomina3_aval_image2)}}</p></p>	
		@endif
		@if ($nomina4_aval_image)     
			<p>{{str_replace(" ","%20",$nomina4_aval_image)}}</p></p>	
		@endif
		@if ($nomina4_aval_image2)     
			<p>{{str_replace(" ","%20",$nomina4_aval_image2)}}</p></p>	
		@endif
		@if ($nomina5_aval_image)     
			<p>{{str_replace(" ","%20",$nomina5_aval_image)}}</p></p>	
		@endif
		@if ($nomina5_aval_image2)     
			<p>{{str_replace(" ","%20",$nomina5_aval_image2)}}</p></p>	
		@endif
@endif		

			<p><span style="color:black">
			Un saludo,
            </span></p>	
<p class=MsoNormal style='mso-margin-top-alt:auto;mso-margin-bottom-alt:auto'><a
name="_MailAutoSig"><b><span lang=IT style='font-size:16.0pt;line-height:107%;
mso-ascii-font-family:Calibri;mso-fareast-font-family:"Times New Roman";
mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri;color:black ;
mso-themecolor:background2;mso-themeshade:26;mso-ansi-language:IT;mso-fareast-language:
ES;mso-no-proof:yes'>Roberto Santucci</span></b></a><span style='mso-bookmark:
_MailAutoSig'><span lang=IT style='mso-ascii-font-family:Calibri;mso-fareast-font-family:
"Times New Roman";mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri;
color:black ;mso-themecolor:background2;mso-themeshade:26;mso-ansi-language:
IT;mso-fareast-language:ES;mso-no-proof:yes'><o:p></o:p></span></span></p>

<p class=MsoNormal style='mso-margin-top-alt:auto;mso-margin-bottom-alt:auto'><span
style='mso-bookmark:_MailAutoSig'><span lang=IT style='mso-ascii-font-family:
Calibri;mso-fareast-font-family:"Times New Roman";mso-hansi-font-family:Calibri;
mso-bidi-font-family:Calibri;color:black ;mso-themecolor:background2;
mso-themeshade:26;mso-ansi-language:IT;mso-fareast-language:ES;mso-no-proof:
yes'><span style='mso-spacerun:yes'>            </span><b><i>&nbsp;&nbsp;CEO</i></b><o:p></o:p></span></span></p>

<p class=MsoNormal style='mso-margin-top-alt:auto;mso-margin-bottom-alt:auto'><span
style='mso-bookmark:_MailAutoSig'><i><span lang=IT style='mso-ascii-font-family:
Calibri;mso-fareast-font-family:"Times New Roman";mso-hansi-font-family:Calibri;
mso-bidi-font-family:Calibri;color:black ;mso-themecolor:background2;
mso-themeshade:26;mso-ansi-language:IT;mso-fareast-language:ES;mso-no-proof:
yes'>Móvil +34 649 623 700</span></i></span><span style='mso-bookmark:_MailAutoSig'><span
lang=IT style='mso-ascii-font-family:Calibri;mso-fareast-font-family:"Times New Roman";
mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri;color:black ;
mso-themecolor:background2;mso-themeshade:26;mso-ansi-language:IT;mso-fareast-language:
ES;mso-no-proof:yes'><o:p></o:p></span></span></p>

<p class=MsoNormal style='mso-margin-top-alt:auto;mso-margin-bottom-alt:auto'><span
style='mso-bookmark:_MailAutoSig'><i><span style='mso-ascii-font-family:Calibri;
mso-fareast-font-family:"Times New Roman";mso-hansi-font-family:Calibri;
mso-bidi-font-family:Calibri;color:black ;mso-themecolor:background2;
mso-themeshade:26;mso-fareast-language:ES;mso-no-proof:yes'>Calle Serrano 93,
3o E. 28006, Madrid</span></i></span><span style='mso-bookmark:_MailAutoSig'><span
style='mso-ascii-font-family:Calibri;mso-fareast-font-family:"Times New Roman";
mso-hansi-font-family:Calibri;mso-bidi-font-family:Calibri;color:black ;
mso-themecolor:background2;mso-themeshade:26;mso-fareast-language:ES;
mso-no-proof:yes'><o:p></o:p></span></span></p>

<p class=MsoNormal style='mso-margin-top-alt:auto;mso-margin-bottom-alt:auto'><span
style='mso-bookmark:_MailAutoSig'></span><a href="mailto:roberto@iamoving.com"
target="_blank"><span style='mso-bookmark:_MailAutoSig'><span style='color:
#0563C1;mso-no-proof:yes'>roberto@iamoving.com</span></span></a><span
style='mso-bookmark:_MailAutoSig'><span style='mso-ascii-font-family:Calibri;
mso-fareast-font-family:"Times New Roman";mso-hansi-font-family:Calibri;
mso-bidi-font-family:Calibri;color:#0563C1;mso-fareast-language:ES;mso-no-proof:
yes'><o:p></o:p></span></span></p>

<p class=MsoNormal style='mso-margin-top-alt:auto;mso-margin-bottom-alt:auto'><span
style='mso-bookmark:_MailAutoSig'></span><a href="http://www.iamoving.com/"><span
style='mso-bookmark:_MailAutoSig'><span lang=ES-TRAD style='color:#0563C1;
mso-ansi-language:ES-TRAD;mso-no-proof:yes'>www.iamoving.com</span></span></a><span
style='mso-bookmark:_MailAutoSig'><span style='mso-ascii-font-family:Calibri;
mso-fareast-font-family:"Times New Roman";mso-hansi-font-family:Calibri;
mso-bidi-font-family:Calibri;color:#0563C1;mso-fareast-language:ES;mso-no-proof:
yes'><o:p></o:p></span></span></p>

<p class=MsoNormal style='mso-margin-top-alt:auto;mso-margin-bottom-alt:auto'><span
style='mso-bookmark:_MailAutoSig'><span lang=EN-US style='mso-fareast-font-family:
"Times New Roman";mso-fareast-theme-font:minor-fareast;mso-ansi-language:EN-US;
mso-fareast-language:ES;mso-no-proof:yes'><!--[if gte vml 1]><v:shapetype id="_x0000_t75"
 coordsize="21600,21600" o:spt="75" o:preferrelative="t" path="m@4@5l@4@11@9@11@9@5xe"
 filled="f" stroked="f">
 <v:stroke joinstyle="miter"/>
 <v:formulas>
  <v:f eqn="if lineDrawn pixelLineWidth 0"/>
  <v:f eqn="sum @0 1 0"/>
  <v:f eqn="sum 0 0 @1"/>
  <v:f eqn="prod @2 1 2"/>
  <v:f eqn="prod @3 21600 pixelWidth"/>
  <v:f eqn="prod @3 21600 pixelHeight"/>
  <v:f eqn="sum @0 0 1"/>
  <v:f eqn="prod @6 1 2"/>
  <v:f eqn="prod @7 21600 pixelWidth"/>
  <v:f eqn="sum @8 21600 0"/>
  <v:f eqn="prod @7 21600 pixelHeight"/>
  <v:f eqn="sum @10 21600 0"/>
 </v:formulas>
 <v:path o:extrusionok="f" gradientshapeok="t" o:connecttype="rect"/>
 <o:lock v:ext="edit" aspectratio="t"/>
</v:shapetype><v:shape id="Imagen_x0020_4" o:spid="_x0000_i1025" type="#_x0000_t75"
 style='width:110.25pt;height:29.25pt;visibility:visible;mso-wrap-style:square'>
 <v:imagedata src="pendientes%20roberto%20%20(1)_archivos/image001.png"
  o:title=""/>
</v:shape><![endif]--><![if !vml]><img src="https://www.iamoving.com/img/icono_viewings1.png" border="0" width="147" height="39"/>
<!--<img border=0 width=147 height=39
src="pendientes%20roberto%20%20(1)_archivos/image001.png" v:shapes="Imagen_x0020_4">--><![endif]></span></span><span
style='mso-bookmark:_MailAutoSig'><span style='mso-fareast-font-family:"Times New Roman";
mso-fareast-theme-font:minor-fareast;mso-fareast-language:ES;mso-no-proof:yes'><o:p></o:p></span></span></p>

<p class=MsoNormal style='mso-margin-top-alt:auto;mso-margin-bottom-alt:auto'><span
style='mso-bookmark:_MailAutoSig'><span style='font-size:8.0pt;line-height:
107%;mso-fareast-font-family:"Times New Roman";mso-fareast-theme-font:minor-fareast;
color:black;letter-spacing:.05pt;mso-fareast-language:ES;mso-no-proof:yes'>Este
mensaje y sus archivos adjuntos van dirigidos exclusivamente a su destinatario,
pudiendo contener información confidencial</span></span><span style='mso-bookmark:
_MailAutoSig'><span style='font-size:8.0pt;line-height:107%;mso-fareast-font-family:
"Times New Roman";mso-fareast-theme-font:minor-fareast;color:black;mso-fareast-language:
ES;mso-no-proof:yes'>&nbsp;sometida a secreto profesional. No está permitida su
reproducción o distribución sin la autorización expresa de&nbsp;Iamoving
online, S.L..&nbsp;Si usted no es el destinatario final por favor elimínelo e
infórmenos por esta vía. De acuerdo con lo establecido en el Reglamento UE
2016/679 (RGPD)&nbsp;le informamos que tratamos los datos que usted nos ha
facilitado para&nbsp;realizar la gestión administrativa.
Legitimación:&nbsp;consentimiento del interesado, ejecución de un contrato,
interés legítimo del Responsable.&nbsp;&nbsp;No se cederán datos a terceros.
Tiene derecho a acceder, rectificar y suprimir los datos, así como otros
derechos, indicados en la información adicional&nbsp;</span></span><a
href="http://www.iamoving.com/" target="_blank"><span style='mso-bookmark:_MailAutoSig'><span
style='font-size:8.0pt;line-height:107%;mso-fareast-font-family:"Times New Roman";
mso-fareast-theme-font:minor-fareast;color:#0563C1;mso-no-proof:yes'>www.iamoving.com</span></span></a><span
style='mso-bookmark:_MailAutoSig'><span style='font-size:8.0pt;line-height:
107%;mso-fareast-font-family:"Times New Roman";mso-fareast-theme-font:minor-fareast;
mso-fareast-language:ES;mso-no-proof:yes'>.&nbsp;<span style='color:black'>Si
usted no desea recibir nuestra información, póngase en contacto con nosotros
enviando un correo electrónico a la siguiente dirección:&nbsp;</span></span></span><a
href="mailto:info@iamoving.com" target="_blank"><span style='mso-bookmark:_MailAutoSig'><span
style='font-size:8.0pt;line-height:107%;mso-fareast-font-family:"Times New Roman";
mso-fareast-theme-font:minor-fareast;color:#0563C1;mso-no-proof:yes'>info@iamoving.com</span></span></a><span
style='mso-bookmark:_MailAutoSig'><span style='font-size:8.0pt;line-height:
107%;mso-fareast-font-family:"Times New Roman";mso-fareast-theme-font:minor-fareast;
color:black;mso-fareast-language:ES;mso-no-proof:yes'>.&nbsp;</span></span><span
style='mso-bookmark:_MailAutoSig'><span style='font-size:8.0pt;line-height:
107%;mso-fareast-font-family:"Times New Roman";mso-fareast-theme-font:minor-fareast;color:black;
mso-fareast-language:ES;mso-no-proof:yes'>Se aplican nuestros&nbsp;</span></span><a
href="https://iamoving.com/terminosI-condiciones" target="_blank"><span
style='mso-bookmark:_MailAutoSig'><span style='font-size:8.0pt;line-height:
107%;mso-fareast-font-family:"Times New Roman";mso-fareast-theme-font:minor-fareast;
color:#0563C1;mso-no-proof:yes'>términos y condiciones</span></span></a><span
style='mso-bookmark:_MailAutoSig'><span style='font-size:8.0pt;line-height:
107%;mso-fareast-font-family:"Times New Roman";mso-fareast-theme-font:minor-fareast;
color:black;mso-fareast-language:ES;mso-no-proof:yes'>&nbsp;y la&nbsp;</span></span><a
href="https://iamoving.com/politica-privacidad" target="_blank"><span
style='mso-bookmark:_MailAutoSig'><span style='font-size:8.0pt;line-height:
107%;mso-fareast-font-family:"Times New Roman";mso-fareast-theme-font:minor-fareast;
color:#0563C1;mso-no-proof:yes'>política de privacidad</span></span></a><span
style='mso-bookmark:_MailAutoSig'><span style='font-size:8.0pt;line-height:
107%;mso-fareast-font-family:"Times New Roman";mso-fareast-theme-font:minor-fareast;color:black;
mso-fareast-language:ES;mso-no-proof:yes'>,&nbsp;a todos los propietarios, inmobiliarias
representantes de la propiedad, compradores e inquilinos que aceptan o desean
arrendar, comprar y vender a través de&nbsp;</span></span><a
href="http://iamoving.com/" target="_blank"><span style='mso-bookmark:_MailAutoSig'><span
style='font-size:8.0pt;line-height:107%;mso-fareast-font-family:"Times New Roman";color:#0563C1;
mso-fareast-theme-font:minor-fareast;mso-no-proof:yes'>iamoving.com</span></span></a><span
style='mso-bookmark:_MailAutoSig'></span><span style='mso-fareast-font-family:
"Times New Roman";mso-fareast-theme-font:minor-fareast;mso-fareast-language:
ES;mso-no-proof:yes'><o:p></o:p></span></p>			
                      </div>
            		</td>
            	</tr>
            </table>
          </td>
	      </tr><!-- end tr -->
	      
      <!-- 1 Column Text + Button : END -->
      </table>
      <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;background-color:white;">
      	<tr>
          <td valign="middle" class="bg_black footer email-section">
            <table>
            	
               <tr>
                <td valign="top" width="100%" style="padding-top: 10px;">
                  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                      <td style="text-align: left; padding-left: 10px;">
                      	<h3 class="heading"></h3>
			            <a href="https://www.iamoving.com"><span style="color:#0563C1">Sitio</a> | <a href="https://iamoving.com/somos-iamoving"><span style="color:#0563C1">Sobre nosotros</span></a>  | <a href="https://iamoving.com/trabaja-con-nosotros"><span style="color:#0563C1">Contáctanos</span></a> 
                      	
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr><!-- end: tr -->
        <tr>
        	<td valign="middle" class="bg_black footer email-section">
        		<table>
            	<tr>
                <td valign="top" width="100%">
                  <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                    <tr>
                      <td style="text-align: left; padding-left: 10px;color:black;">
                      	<p>Copyright © <?php echo date('Y')?> All rights reserved Iamoving</p> 
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
        	</td>
        </tr>
      </table>

    </div>
  </center>

</html>
