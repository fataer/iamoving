@extends('layouts.iamovingpro')
@section('title')
<?php
if($detalle->tipo_inmueble == 'Local/Oficina'){
    if ($detalle->oficina == '1'){
        $inmueble= "Business office";
    }
    else{

	   $inmueble= "Local";
    }
}
else
{
	if ($detalle->estudio) {
		$inmueble= "Studio flat";
	} elseif ($detalle->loft) {
		$inmueble= "Loft";
	} elseif ($detalle->apartamento) {
		$inmueble= "Apartament";
	} elseif ($detalle->piso) {
		$inmueble= "Flat";
	} elseif ($detalle->chalet) {
		$inmueble= "House";
	} elseif ($detalle->bajo) {
		$inmueble= "Ground floor flat";
	} elseif ($detalle->atico) {
		$inmueble= "Penthouse";	
	} else {
		$inmueble= "Flat";
	}
}
if ($detalle->is_sale == '1'){
    $tipo=" for sale ";	
} else {
    $tipo=" To let ";	
}
//if($detalle->ciudad_inmueble)
if($ciudad)
{
	//$city=$detalle->ciudad_inmueble;	
	$city = $ciudad;
} 
else
{
	$city="Madrid";
}
if($detalle->road)
{
    $direccion="in ".$detalle->road.", ".$city;
} 
	echo $inmueble.$tipo.$direccion;
?>
@endsection
@section('description')
<?php
if($detalle->tipo_inmueble == 'Local/Oficina'){
    if ($detalle->oficina == '1'){
        $inmueble= "Business office";
    }
    else{

       $inmueble= "Local";
    }
}
else
{
	if ($detalle->estudio) {
		$inmueble= "Studio flat";
	} elseif ($detalle->loft) {
		$inmueble= "Loft";
	} elseif ($detalle->apartamento) {
		$inmueble= "Apartment";
	} elseif ($detalle->piso) {
		$inmueble= "Flat";
	} elseif ($detalle->chalet) {
		$inmueble= "House";
	} elseif ($detalle->bajo) {
		$inmueble= "Ground floor flat";
	} elseif ($detalle->atico) {
		$inmueble= "Penthouse";	
	} else {
		$inmueble= "Flat";
	}
}
	$texto1= " with ";
	$metros = $detalle->square_meters;
	$texto2 = " m2, ";

if($detalle->tipo_inmueble == 'Local/Oficina'){
	if ($detalle->bedrooms==1) {
		$dormitorio= "1 room y ";
	} elseif ($detalle->bedrooms==0) {
		$dormitorio= "";
	} elseif ($detalle->bedrooms>1) {
		$dormitorio= $detalle->bedrooms." rooms and ";
	} else {
		$dormitorio= "";
	}
}
else
{	
	if ($detalle->bedrooms==1) {
		$dormitorio= "1 bedroom and ";
	} elseif ($detalle->bedrooms==0) {
		$dormitorio= "";
	} elseif ($detalle->bedrooms>1) {
		$dormitorio= $detalle->bedrooms." bedrooms and ";
	} else {
		$dormitorio= "";
	}
}

if($detalle->tipo_inmueble == 'Local/Oficina'){
	$bano= "2 aseos.";
}
else
{
	if ($detalle->bathrooms==1) {
		$bano= "1 bathroom.";
	} elseif ($detalle->bathrooms==0) {
		$bano= "";
	} elseif ($detalle->bathrooms>1) {
		$bano= $detalle->bathrooms." bathrooms.";
	} else {
		$bano= "";
	}
}
	echo $inmueble.$texto1.$metros.$texto2.$dormitorio.$bano;
?>
@endsection
@section('image')
<?php
$url="https://iamoving.com/storage/";
//$path=$detalle->path_image_primary;
$path=str_replace(".jpeg","_444x250.jpg",$detalle->path_image_primary);
echo  $url.$path;
?>
@endsection

@section('replace_acentos')
<?php
/**
 * Reemplaza todos los acentos por sus equivalentes sin ellos
 *
 * @param $string
 *  string la cadena a sanear
 *
 * @return $string
 *  string saneada
 */
function limpieza_url($cadena)
{ $cadena = utf8_encode($cadena);
$vocalti= array ("é","é","á","í","ó","ú","Á","É","Í","Ó","Ú","ñ","Ñ"," À","È","Ì","Ò","Ù","à","è","ì","ò","ù","ç","Ç","â" ,"ê","î","ô","û","Â","Ê","Î","Ô","Û","ü","ö","Ö"," ï","ä","ë","Ü","Ï","Ä","Ë"," ","\r\n","\n");
$vocales= array ("e","e","a","i","o","u","A","E","I","O","U","n","N"," A","E","I","O","U","a","e","i","o","u","c","C","a" ,"e","i","o","u","A","E","I","O","U","u","o","O"," i","a","e","U","I","A","E","-","-","-");
$cadena=str_replace($vocalti, $vocales,$cadena);
$cadena = strtolower($cadena);
$find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
$repl = array('', '-', '');
$cadena = preg_replace($find, $repl, $cadena);

return $cadena;
}

function sanear_string($string)
{
	$string = utf8_encode($string);
    $string = trim($string);
 
    $string = str_replace(
        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
        $string
    );
 
    $string = str_replace(
        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
        $string
    );
 
    $string = str_replace(
        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
        $string
    );
 
    $string = str_replace(
        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
        $string
    );
 
    $string = str_replace(
        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
        $string
    );
 
    $string = str_replace(
        array('ñ', 'Ñ', 'ç', 'Ç'),
        array('n', 'N', 'c', 'C',),
        $string
    );
 
    //Esta parte se encarga de eliminar cualquier caracter extraño
    /*$string = str_replace(
        array("\", "¨", "º", "-", "~",
             "#", "@", "|", "!", """,
             "·", "$", "%", "&", "/",
             "(", ")", "?", "'", "¡",
             "¿", "[", "^", "<code>", "]",
             "+", "}", "{", "¨", "´",
             ">", "< ", ";", ",", ":",
             ".", " "),
        '',
        $string
    );*/
 
 
    return $string;
}
?>
@endsection
{{-- @section('scripts')
	<!-- BEGIN JIVOSITE CODE {literal} -->
	<script type='text/javascript'>
	(function(){ var widget_id = 'x5a8kJ01E8';var d=document;var w=window;function l(){
		var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true;
		s.src = '//code.jivosite.com/script/widget/'+widget_id
			; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}
		if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}
		else{w.addEventListener('load',l,false);}}})();
		
		if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
		    $("#video_desktop").hide();
		    $("#video_mobile").show();
		}else{
		    $("#video_mobile").hide();
		    $("#video_desktop").show();
		}
	</script>
@endsection --}}
@section('styles')
	<style>
.modal-dialog {
  /*display: flex;
  flex-direction: column;
  justify-content: center;
  overflow-y: auto;
  min-height: calc(100vh - 60px);
  @media (max-width: 767px) {
    min-height: calc(100vh - 20px);
  }*/
}


@media only screen and (max-width: 600px) {
    .modal-dialog {
        min-height: calc(100vh - 20px);    
        margin-top:30px;
    }
}
	
#tooltip
{
    text-align: center;
    color: #fff;
    background: #111;
    position: absolute;
    z-index: 100;
    padding: 15px;
}
 
    #tooltip:after /* triangle decoration */
    {
        width: 0;
        height: 0;
        border-left: 10px solid transparent;
        border-right: 10px solid transparent;
        border-top: 10px solid #111;
        content: '';
        position: absolute;
        left: 50%;
        bottom: -10px;
        margin-left: -10px;
    }
 
        #tooltip.top:after
        {
            border-top-color: transparent;
            border-bottom: 10px solid #111;
            top: -20px;
            bottom: auto;
        }
 
        #tooltip.left:after
        {
            left: 10px;
            margin: 0;
        }
 
        #tooltip.right:after
        {
            right: 10px;
            left: auto;
            margin: 0;
        }	
        .dropdown-menu {
            width:190px;
        }
        
        
	</style>
	<style>
.more_info1 {
  border-bottom: 1px dotted;
  position: relative;
}

.more_info1 .title {
    position: absolute;
    top: 20px;
    background: silver;
    padding: 4px;
    left: 0;
    white-space: nowrap;
}
	.card-img-overlay {
            padding: 0;
    }
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:"";
	margin-top:0cm;
	margin-right:0cm;
	margin-bottom:8.0pt;
	margin-left:0cm;
	line-height:107%;
	mso-pagination:widow-orphan;
	font-size:11.0pt;
	font-family:"Calibri",sans-serif;
	mso-ascii-font-family:Calibri;
	mso-ascii-theme-font:minor-latin;
	mso-fareast-font-family:Calibri;
	mso-fareast-theme-font:minor-latin;
	mso-hansi-font-family:Calibri;
	mso-hansi-theme-font:minor-latin;
	mso-bidi-font-family:"Times New Roman";
	mso-bidi-theme-font:minor-bidi;
	mso-fareast-language:EN-US;}	
span.SpellE
	{mso-style-name:"";
	mso-spl-e:yes;}
span.GramE
	{mso-style-name:"";
	mso-gram-e:yes;}
	
	
	.table {
 display: table;
 height:100%;
}
.table-cell {
display: table-cell;
vertical-align: middle;
}
	
    </style>

                                                          <style data-jss="" data-meta="MuiPaper" data-jss-server-side="true">.jss33{background-color:#fff}.jss34{border-radius:2px}.jss35{box-shadow:none}.jss36{box-shadow:0 1px 3px 0 rgba(0,0,0,.2),0 1px 1px 0 rgba(0,0,0,.14),0 2px 1px -1px rgba(0,0,0,.12)}.jss37{box-shadow:0 1px 5px 0 rgba(0,0,0,.2),0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.12)}.jss38{box-shadow:0 1px 8px 0 rgba(0,0,0,.2),0 3px 4px 0 rgba(0,0,0,.14),0 3px 3px -2px rgba(0,0,0,.12)}.jss39{box-shadow:0 2px 4px -1px rgba(0,0,0,.2),0 4px 5px 0 rgba(0,0,0,.14),0 1px 10px 0 rgba(0,0,0,.12)}.jss40{box-shadow:0 3px 5px -1px rgba(0,0,0,.2),0 5px 8px 0 rgba(0,0,0,.14),0 1px 14px 0 rgba(0,0,0,.12)}.jss41{box-shadow:0 3px 5px -1px rgba(0,0,0,.2),0 6px 10px 0 rgba(0,0,0,.14),0 1px 18px 0 rgba(0,0,0,.12)}.jss42{box-shadow:0 4px 5px -2px rgba(0,0,0,.2),0 7px 10px 1px rgba(0,0,0,.14),0 2px 16px 1px rgba(0,0,0,.12)}.jss43{box-shadow:0 5px 5px -3px rgba(0,0,0,.2),0 8px 10px 1px rgba(0,0,0,.14),0 3px 14px 2px rgba(0,0,0,.12)}.jss44{box-shadow:0 5px 6px -3px rgba(0,0,0,.2),0 9px 12px 1px rgba(0,0,0,.14),0 3px 16px 2px rgba(0,0,0,.12)}.jss45{box-shadow:0 6px 6px -3px rgba(0,0,0,.2),0 10px 14px 1px rgba(0,0,0,.14),0 4px 18px 3px rgba(0,0,0,.12)}.jss46{box-shadow:0 6px 7px -4px rgba(0,0,0,.2),0 11px 15px 1px rgba(0,0,0,.14),0 4px 20px 3px rgba(0,0,0,.12)}.jss47{box-shadow:0 7px 8px -4px rgba(0,0,0,.2),0 12px 17px 2px rgba(0,0,0,.14),0 5px 22px 4px rgba(0,0,0,.12)}.jss48{box-shadow:0 7px 8px -4px rgba(0,0,0,.2),0 13px 19px 2px rgba(0,0,0,.14),0 5px 24px 4px rgba(0,0,0,.12)}.jss49{box-shadow:0 7px 9px -4px rgba(0,0,0,.2),0 14px 21px 2px rgba(0,0,0,.14),0 5px 26px 4px rgba(0,0,0,.12)}.jss50{box-shadow:0 8px 9px -5px rgba(0,0,0,.2),0 15px 22px 2px rgba(0,0,0,.14),0 6px 28px 5px rgba(0,0,0,.12)}.jss51{box-shadow:0 8px 10px -5px rgba(0,0,0,.2),0 16px 24px 2px rgba(0,0,0,.14),0 6px 30px 5px rgba(0,0,0,.12)}.jss52{box-shadow:0 8px 11px -5px rgba(0,0,0,.2),0 17px 26px 2px rgba(0,0,0,.14),0 6px 32px 5px rgba(0,0,0,.12)}.jss53{box-shadow:0 9px 11px -5px rgba(0,0,0,.2),0 18px 28px 2px rgba(0,0,0,.14),0 7px 34px 6px rgba(0,0,0,.12)}.jss54{box-shadow:0 9px 12px -6px rgba(0,0,0,.2),0 19px 29px 2px rgba(0,0,0,.14),0 7px 36px 6px rgba(0,0,0,.12)}.jss55{box-shadow:0 10px 13px -6px rgba(0,0,0,.2),0 20px 31px 3px rgba(0,0,0,.14),0 8px 38px 7px rgba(0,0,0,.12)}.jss56{box-shadow:0 10px 13px -6px rgba(0,0,0,.2),0 21px 33px 3px rgba(0,0,0,.14),0 8px 40px 7px rgba(0,0,0,.12)}.jss57{box-shadow:0 10px 14px -6px rgba(0,0,0,.2),0 22px 35px 3px rgba(0,0,0,.14),0 8px 42px 7px rgba(0,0,0,.12)}.jss58{box-shadow:0 11px 14px -7px rgba(0,0,0,.2),0 23px 36px 3px rgba(0,0,0,.14),0 9px 44px 8px rgba(0,0,0,.12)}.jss59{box-shadow:0 11px 15px -7px rgba(0,0,0,.2),0 24px 38px 3px rgba(0,0,0,.14),0 9px 46px 8px rgba(0,0,0,.12)}</style>
                                                          <style data-jss="" data-meta="MuiSvgIcon" data-jss-server-side="true">.jss215{fill:currentColor;width:1em;height:1em;display:inline-block;font-size:24px;transition:fill .2s cubic-bezier(.4,0,.2,1) 0s;user-select:none;flex-shrink:0}.jss216{color:#5063f0}.jss217{color:#36b67e}.jss218{color:rgba(0,0,0,.54)}.jss219{color:#c6292e}.jss220{color:rgba(0,0,0,.26)}</style>
                                                          <style data-jss="" data-meta="MuiAvatar" data-jss-server-side="true">.jss261{width:40px;height:40px;display:flex;position:relative;overflow:hidden;font-size:1.25rem;align-items:center;flex-shrink:0;font-family:Roboto,Helvetica,Arial,sans-serif;user-select:none;border-radius:50%;justify-content:center}.jss262{color:#fafafa;background-color:#bdbdbd}.jss263{width:100%;height:100%;text-align:center;object-fit:cover}</style>
                                                          <style data-jss="" data-meta="MuiChip" data-jss-server-side="true">.jss254{color:rgba(0,0,0,.87);height:32px;cursor:default;border:none;display:inline-flex;outline:0;padding:0;font-size:.8125rem;transition:background-color .3s cubic-bezier(.4,0,.2,1) 0s,box-shadow .3s cubic-bezier(.4,0,.2,1) 0s;font-family:Roboto,Helvetica,Arial,sans-serif;align-items:center;white-space:nowrap;border-radius:16px;justify-content:center;text-decoration:none;background-color:#e0e0e0}.jss255{cursor:pointer;-webkit-tap-highlight-color:transparent}.jss255:focus,.jss255:hover{background-color:#cecece}.jss255:active{box-shadow:0 1px 3px 0 rgba(0,0,0,.2),0 1px 1px 0 rgba(0,0,0,.14),0 2px 1px -1px rgba(0,0,0,.12);background-color:#c5c5c5}.jss256:focus{background-color:#cecece}.jss257{width:32px;color:#616161;height:32px;font-size:1rem;margin-right:-4px}.jss258{width:19px;height:19px}.jss259{cursor:inherit;display:flex;align-items:center;user-select:none;white-space:nowrap;padding-left:12px;padding-right:12px}.jss260{color:rgba(0,0,0,.26);cursor:pointer;height:auto;margin:0 4px 0 -8px;-webkit-tap-highlight-color:transparent}.jss260:hover{color:rgba(0,0,0,.4)}</style>
														  <style data-jss="" data-meta="MuiListItemText" data-jss-server-side="true">.jss221{flex:1 1 auto;padding:0 16px;min-width:0}.jss221:first-child{padding-left:0}.jss222:first-child{padding-left:56px}.jss223{font-size:.8125rem}.jss224.jss226{font-size:inherit}.jss225.jss226{font-size:inherit}</style>
														  <style data-jss="" data-meta="MuiList" data-jss-server-side="true">.jss200{margin:0;padding:0;position:relative;list-style:none}.jss201{padding-top:8px;padding-bottom:8px}.jss202{padding-top:4px;padding-bottom:4px}.jss203{padding-top:0}</style>
														  <style data-jss="" data-meta="MuiListItem" data-jss-server-side="true">.jss204{width:100%;display:flex;position:relative;box-sizing:border-box;text-align:left;align-items:center;justify-content:flex-start;text-decoration:none}.jss205{position:relative}.jss206{background-color:rgba(0,0,0,.08)}.jss207{padding-top:12px;padding-bottom:12px}.jss208{padding-top:8px;padding-bottom:8px}.jss209{opacity:.5}.jss210{border-bottom:1px solid rgba(0,0,0,.12);background-clip:padding-box}.jss211{padding-left:16px;padding-right:16px}@media (min-width:600px){.jss211{padding-left:24px;padding-right:24px}}.jss212{transition:background-color 150ms cubic-bezier(.4,0,.2,1) 0s}.jss212:hover{text-decoration:none;background-color:rgba(0,0,0,.08)}@media (hover:none){.jss212:hover{background-color:transparent}}.jss213{padding-right:32px}</style>
														  <style data-styled-components="dXmWES gBVOkB gJSIof hJtXAX ennvRr beARfa erBcUv bUDmxF chXjd XGznH igrgBm gTJEJf cIabBZ hjBPaq hBnwDG ikUjOx kClLBD frsdOu ifaIBM eVFVHD jiARkd ibMzuR eSXgoZ KcvRp gzeFNP hewaoz ijGWLb dFfBsL ceeDHP dfRjos cPxFMD Llvfd cCUkNc crmnOp flhJMf fkIsxQ hsYizb jLBqWK MDUIL kuvAWT MFaSx lehBNN" data-styled-components-is-local="true">.chXjd{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:inherit;margin-bottom:0;font-size:14px;font-weight:500;line-height:24px}.XGznH{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:#fff;text-align:inherit;margin-bottom:8px;font-size:34px;font-weight:400;line-height:40px}.igrgBm{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:#fff;text-align:inherit;margin-bottom:0;font-size:24px;font-weight:400;line-height:32px}.gTJEJf{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:center;margin-bottom:8px;font-size:24px;font-weight:400;line-height:32px}.cIabBZ{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:rgba(0,0,0,.54);text-align:center;margin-bottom:8px;font-size:20px;font-weight:500;line-height:24px}.hjBPaq{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:center;margin-bottom:8px;font-size:20px;font-weight:500;line-height:24px}.hBnwDG{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:rgba(0,0,0,.54);text-align:center;margin-bottom:8px;font-size:14px;font-weight:400;line-height:20px}.ikUjOx{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:left;margin-bottom:8px;font-size:20px;font-weight:500;line-height:24px}.kClLBD{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:rgba(0,0,0,.54);text-align:left;margin-bottom:8px;font-size:14px;font-weight:400;line-height:20px}.frsdOu{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:inherit;margin-bottom:8px;font-size:14px;font-weight:400;line-height:20px}.ifaIBM{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:#5063f0;text-align:inherit;margin-bottom:8px;font-size:14px;font-weight:400;line-height:20px}.eVFVHD{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:inline;color:#5063f0;text-align:inherit;margin-bottom:0;font-size:14px;font-weight:400;line-height:20px}.jiARkd{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:inherit;margin-bottom:0;font-size:14px;font-weight:400;line-height:20px}.ibMzuR{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:#757575;text-align:inherit;margin-bottom:0;font-size:14px;font-weight:400;line-height:20px}.eSXgoZ{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:center;margin-bottom:0;font-size:14px;font-weight:400;line-height:20px}.KcvRp{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:#36b67e;text-align:inherit;margin-bottom:8px;font-size:14px;font-weight:400;line-height:20px}.gzeFNP{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:inline;color:#36b67e;text-align:inherit;margin-bottom:0;font-size:14px;font-weight:400;line-height:20px}.hewaoz{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:rgba(0,0,0,.87);text-align:inherit;margin-bottom:8px;font-size:14px;font-weight:400;line-height:20px}.ijGWLb{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:inline;color:rgba(0,0,0,.87);text-align:inherit;margin-bottom:0;font-size:14px;font-weight:400;line-height:20px}.dFfBsL{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:center;margin-bottom:8px;font-size:14px;font-weight:400;line-height:20px}.ceeDHP{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:center;margin-bottom:0;font-size:24px;font-weight:400;line-height:32px}.dfRjos{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:center;margin-bottom:0;font-size:34px;font-weight:400;line-height:40px}.cPxFMD{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:inherit;margin-bottom:8px;font-size:20px;font-weight:500;line-height:24px}.Llvfd{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:rgba(0,0,0,.54);text-align:inherit;margin-bottom:0;font-size:14px;font-weight:400;line-height:20px}.cCUkNc{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:rgba(0,0,0,.54);text-align:inherit;margin-bottom:8px;font-size:16px;font-weight:400;line-height:24px}.crmnOp{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:rgba(0,0,0,.54);text-align:inherit;margin-bottom:0;font-size:16px;font-weight:400;line-height:24px}.flhJMf{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:center;margin-bottom:0;font-size:16px;font-weight:400;line-height:24px}.fkIsxQ{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:#fff;text-align:center;margin-bottom:8px;font-size:20px;font-weight:500;line-height:24px}.hsYizb{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:#fff;text-align:center;margin-bottom:8px;font-size:14px;font-weight:400;line-height:20px}.jLBqWK{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:rgba(0,0,0,.54);text-align:center;margin-bottom:0;font-size:24px;font-weight:400;line-height:32px}.MDUIL{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:center;margin-bottom:0;font-size:14px;font-weight:500;line-height:24px}.kuvAWT{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:rgba(0,0,0,.54);text-align:inherit;margin-bottom:0;font-size:12px;font-weight:400;line-height:16px}.MFaSx{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:#5063f0;text-align:inherit;margin-bottom:0;font-size:16px;font-weight:400;line-height:24px}.lehBNN{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:#5063f0;text-align:inherit;margin-bottom:0;font-size:14px;font-weight:400;line-height:20px}.ennvRr{min-height:56px}.beARfa{height:56px;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center}.erBcUv{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;height:100%}.bUDmxF{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:end;-webkit-justify-content:flex-end;-ms-flex-pack:end;justify-content:flex-end;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;height:100%}.hJtXAX{margin:0 auto;max-width:1032px;height:100%;width:100%}.dXmWES{display:none;background-color:transparent;height:100vh;left:0;position:fixed;top:0;width:100vw;z-index:1500}.gBVOkB>div>div{max-width:76%}</style>
														  <style data-styled-components="kcdrgG gbgWxw kGwXKn iqQlkx erYulP iyFjeg dzqYJX kxNuvV" data-styled-components-is-local="true">.erYulP{background-color:#bdbdbd;height:1px}.dzqYJX{background-color:#e0e0e0;height:1px}.iqQlkx{margin-top:0;margin-bottom:0;margin-left:0;margin-right:0}.iyFjeg{margin-top:16px;margin-bottom:0;margin-left:0;margin-right:0}.kxNuvV{margin-top:16px;margin-bottom:16px;margin-left:0;margin-right:0}.kcdrgG{background-color:#5063f0;color:#fff;height:24px;margin-right:0}.gbgWxw{background-color:#36b67e;color:#fff;height:24px;margin-right:0}.kGwXKn{background-color:#757575;color:#fff;height:24px;margin-right:0}</style>
														  <style data-styled-components="jRMlPf bIjFSD kFonpi cDbjPL jMeSWB kssgEf cBqmhB gGlJek fsPzpa gPbtZL iMongt iyBYz qdGDr hsUnyu gvSOMz fBCnjt htIvPI dHNjDd hwnlfP eTPBlk bOZbmT lldQGB fExEbq bHLhwF NTnEt ljgrBQ bjiHAd kWbEJZ orrIZ pRFLs gAyQQz jvOyHm kksBWm dGwtKs cQmYyz" data-styled-components-is-local="true">.cQmYyz{margin-bottom:0}.jRMlPf{margin-bottom:0;padding-left:16px}.kksBWm{margin-bottom:16px;padding-left:0}.jvOyHm{display:inline-block;margin-bottom:8px;margin-top:32px}.NTnEt{-webkit-text-decoration:none;text-decoration:none;color:#424242}.NTnEt:hover{color:#5063f0;-webkit-transition:color .4s ease;transition:color .4s ease}.ljgrBQ{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;height:32px;-webkit-box-pack:start;-webkit-justify-content:flex-start;-ms-flex-pack:start;justify-content:flex-start;margin:16px 0}.dGwtKs{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;height:32px;-webkit-box-pack:end;-webkit-justify-content:flex-end;-ms-flex-pack:end;justify-content:flex-end;margin:16px 0}.bjiHAd{margin-bottom:8px}.kWbEJZ{margin-bottom:8px}.pRFLs{margin-bottom:8px}.orrIZ{margin-bottom:8px}.gAyQQz{-webkit-text-decoration:none;text-decoration:none;color:#757575}.gAyQQz:hover{color:#757575;-webkit-transition:color .4s ease;transition:color .4s ease}.fExEbq{background-color:#fafafa;padding:16px 0;margin:0}.bHLhwF{margin:0 24px}.bOZbmT{-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;background-color:#5063f0;border-radius:0;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-box-pack:justify;-webkit-justify-content:space-between;-ms-flex-pack:justify;justify-content:space-between;padding:24px;padding-bottom:48px}@media (max-width:599.95px){.bOZbmT{padding-bottom:32px;padding-top:0}}.lldQGB{-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;margin-top:24px}.gPbtZL{font-size:34px;font-weight:400;line-height:40px}@media (max-width:959.95px){.gPbtZL{font-size:24px;font-weight:400;line-height:32px}}.iMongt{font-size:16px;font-weight:400;line-height:24px}.kFonpi{color:inherit;display:inline-block;-webkit-text-decoration:none;text-decoration:none;margin-right:40px}.bIjFSD{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:end;-webkit-justify-content:flex-end;-ms-flex-pack:end;justify-content:flex-end;-webkit-align-items:baseline;-webkit-box-align:baseline;-ms-flex-align:baseline;align-items:baseline}.cDbjPL{-webkit-flex-direction:row;-ms-flex-direction:row;flex-direction:row;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-wrap:wrap;-ms-flex-wrap:wrap;flex-wrap:wrap;-webkit-align-items:flex-start;-webkit-box-align:flex-start;-ms-flex-align:flex-start;align-items:flex-start;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center}.iyBYz{-webkit-flex-direction:row;-ms-flex-direction:row;flex-direction:row;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-wrap:wrap;-ms-flex-wrap:wrap;flex-wrap:wrap;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center}.htIvPI{-webkit-flex-direction:row;-ms-flex-direction:row;flex-direction:row;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-wrap:wrap;-ms-flex-wrap:wrap;flex-wrap:wrap;-webkit-align-items:stretch;-webkit-box-align:stretch;-ms-flex-align:stretch;align-items:stretch;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center}.jMeSWB{position:relative;box-sizing:border-box;width:100%;padding:0 8px;-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}@media (min-width:600px){.jMeSWB{-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}}@media (min-width:960px){.jMeSWB{-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}}@media (min-width:1280px){.jMeSWB{-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}}@media (min-width:1920px){.jMeSWB{-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}}.qdGDr{position:relative;box-sizing:border-box;width:100%;padding:0 8px;-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}@media (min-width:600px){.qdGDr{-webkit-flex:0 0 16.666666666666664%;-ms-flex:0 0 16.666666666666664%;flex:0 0 16.666666666666664%;max-width:16.666666666666664%}}@media (min-width:960px){.qdGDr{-webkit-flex:0 0 16.666666666666664%;-ms-flex:0 0 16.666666666666664%;flex:0 0 16.666666666666664%;max-width:16.666666666666664%}}@media (min-width:1280px){.qdGDr{-webkit-flex:0 0 16.666666666666664%;-ms-flex:0 0 16.666666666666664%;flex:0 0 16.666666666666664%;max-width:16.666666666666664%}}@media (min-width:1920px){.qdGDr{-webkit-flex:0 0 16.666666666666664%;-ms-flex:0 0 16.666666666666664%;flex:0 0 16.666666666666664%;max-width:16.666666666666664%}}.hsUnyu{position:relative;box-sizing:border-box;width:100%;padding:0 8px;-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}@media (min-width:600px){.hsUnyu{-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}}@media (min-width:960px){.hsUnyu{-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}}@media (min-width:1280px){.hsUnyu{-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}}@media (min-width:1920px){.hsUnyu{-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}}.gvSOMz{position:relative;box-sizing:border-box;width:100%;padding:0 8px;-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}@media (min-width:600px){.gvSOMz{-webkit-flex:0 0 8.333333333333332%;-ms-flex:0 0 8.333333333333332%;flex:0 0 8.333333333333332%;max-width:8.333333333333332%}}@media (min-width:960px){.gvSOMz{-webkit-flex:0 0 8.333333333333332%;-ms-flex:0 0 8.333333333333332%;flex:0 0 8.333333333333332%;max-width:8.333333333333332%}}@media (min-width:1280px){.gvSOMz{-webkit-flex:0 0 8.333333333333332%;-ms-flex:0 0 8.333333333333332%;flex:0 0 8.333333333333332%;max-width:8.333333333333332%}}@media (min-width:1920px){.gvSOMz{-webkit-flex:0 0 8.333333333333332%;-ms-flex:0 0 8.333333333333332%;flex:0 0 8.333333333333332%;max-width:8.333333333333332%}}.fBCnjt{position:relative;box-sizing:border-box;width:100%;padding:0 8px;-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}@media (min-width:600px){.fBCnjt{-webkit-flex:0 0 25%;-ms-flex:0 0 25%;flex:0 0 100%;max-width:50%}}@media (min-width:960px){.fBCnjt{-webkit-flex:0 0 25%;-ms-flex:0 0 25%;flex:0 0 100%;max-width:50%}}@media (min-width:1280px){.fBCnjt{-webkit-flex:0 0 25%;-ms-flex:0 0 25%;flex:0 0 100%;max-width:50%}}@media (min-width:1920px){.fBCnjt{-webkit-flex:0 0 25%;-ms-flex:0 0 25%;flex:0 0 100%;max-width:50%}}.dHNjDd{position:relative;box-sizing:border-box;width:100%;padding:0 8px;-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}@media (min-width:600px){.dHNjDd{-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}}@media (min-width:960px){.dHNjDd{-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}}@media (min-width:1280px){.dHNjDd{-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}}@media (min-width:1920px){.dHNjDd{-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}}.hwnlfP{position:relative;box-sizing:border-box;width:100%;padding:0 8px;-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}@media (min-width:600px){.hwnlfP{-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}}@media (min-width:960px){.hwnlfP{-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}}@media (min-width:1280px){.hwnlfP{-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}}@media (min-width:1920px){.hwnlfP{-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}}.eTPBlk{position:relative;box-sizing:border-box;width:100%;padding:0 8px;-webkit-flex:0 0 66.66666666666666%;-ms-flex:0 0 66.66666666666666%;flex:0 0 66.66666666666666%;max-width:66.66666666666666%}@media (min-width:600px){.eTPBlk{-webkit-flex:0 0 66.66666666666666%;-ms-flex:0 0 66.66666666666666%;flex:0 0 66.66666666666666%;max-width:66.66666666666666%}}@media (min-width:960px){.eTPBlk{-webkit-flex:0 0 83.33333333333334%;-ms-flex:0 0 83.33333333333334%;flex:0 0 83.33333333333334%;max-width:83.33333333333334%}}@media (min-width:1280px){.eTPBlk{-webkit-flex:0 0 91.66666666666666%;-ms-flex:0 0 91.66666666666666%;flex:0 0 91.66666666666666%;max-width:91.66666666666666%}}@media (min-width:1920px){.eTPBlk{-webkit-flex:0 0 91.66666666666666%;-ms-flex:0 0 91.66666666666666%;flex:0 0 91.66666666666666%;max-width:91.66666666666666%}}.cBqmhB{line-height:1.5}@media (max-width:599.95px){.cBqmhB{text-align:center;font-size:24px;font-weight:400;line-height:32px}}@media (max-width:599.95px){.fsPzpa{font-size:16px;font-weight:400;line-height:24px}}.kssgEf{padding-right:32px}@media (max-width:599.95px){.kssgEf{padding:32px 16px;text-align:center}}@media (max-width:599.95px){.gGlJek{max-width:190px;margin:0 auto}}</style>
														  <style data-styled-components="jmUojt dVZpFn gEonKY fYgwDV iApApL kBcekM kKAqKs gZzrSB fBbfOY htgUWi fHaeNg doEYka bokSOt jCQGKS jJsluQ ecJbVf hAjjvO gWOtiB RHDgE gyWGXd jDJpTw kClokr jeqLQt hvImqV gqysQO jWLPEz jugaIX fEgzNb jGCInU gSwQos kJSChf bSjNsS cMtsMw kbXedg fYiiuQ bWRwhi eynmni gkpJHv dppadL ecJbVg" data-styled-components-is-local="true">@media (max-width:959.95px){.dVZpFn{-webkit-order:-1;-ms-flex-order:-1;order:-1}}@media (max-width:599.95px){.dVZpFn{padding:0}}.kBcekM{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex}.iApApL{border:none;margin:0;padding:0;min-width:0}.gEonKY{background-color:#fff;padding:8px 24px;border-radius:2px}@media (max-width:599.95px){.gEonKY{border-radius:0;padding-left:8px;padding-right:8px}}.fYgwDV{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column}@media (max-width:599.95px){.fYgwDV{margin:24px 16px 16px;border:solid 1px #e0e0e0;padding:16px}}.kKAqKs{-webkit-align-self:center;-ms-flex-item-align:center;align-self:center;padding-top:24px}.gZzrSB{-webkit-align-self:center;-ms-flex-item-align:center;align-self:center;margin:24px 0}.jmUojt{background-color:#5063f0;padding:32px 0}@media (max-width:599.95px){.jmUojt{padding:0}}.kbXedg{margin:8px 0}@media (max-width:599.95px){.kbXedg{text-align:center}}.cMtsMw{padding:8px 16px;background-color:#e0e0e0;max-width:410px;top:50%;right:16px;-webkit-transform:translateY(-50%);-ms-transform:translateY(-50%);transform:translateY(-50%)}@media (min-width:960px){.cMtsMw{max-width:670px;position:absolute}}@media (max-width:599.95px){.cMtsMw{background-color:transparent;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-transform:none;-ms-transform:none;transform:none}}.gSwQos{padding:32px 0;overflow:hidden}@media (max-width:599.95px){.gSwQos{padding:0;padding-bottom:16px;margin:0 24px}}.kJSChf{position:relative;margin-top:32px}@media (max-width:599.95px){.kJSChf{margin-top:16px}}.bSjNsS{margin-left:16px}@media (max-width:599.95px){.bSjNsS{margin-left:0;width:100%}}.bokSOt{margin:24px 0}.doEYka{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;padding-top:24px;padding-bottom:16px}.fBbfOY{padding:32px;-webkit-align-content:center;-ms-flex-line-pack:center;align-content:center}.htgUWi{text-align:center}@media (max-width:599.95px){.htgUWi{margin-top:24px}}.fHaeNg{-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;height:100%}@media (max-width:599.95px){.fHaeNg.textContent *{text-align:center}}.dppadL{position:absolute;left:0;top:0;width:100%;height:100%}.eynmni{width:100%;position:relative}.gkpJHv{width:100%;display:block;padding:6.4%}.jGCInU{padding:48px 16px;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;height:auto}@media (max-width:599.95px){.jGCInU{background-color:transparent;padding:32px 16px}}.bWRwhi{margin-top:auto;padding-top:24px;width:170px}.fYiiuQ{margin-top:32px}.jCQGKS{overflow:hidden;padding-top:16px;padding-bottom:48px}.jJsluQ{padding-bottom:24px}.hvImqV{line-height:2.5;position:absolute;top:0;left:0;right:0;color:#fff;background-color:#36b67e}.gyWGXd{font-size:54px;line-height:1}.RHDgE{font-size:24px;font-weight:400;line-height:32px}.hAjjvO{padding:24px 0}.jDJpTw{padding:16px;min-height:130px}.gWOtiB{height:unset;padding-bottom:4px;padding-top:4px}.kClokr{margin-right:0;color:#5063f0}.gqysQO{margin-right:0;color:#36b67e}.fEgzNb{margin-right:0;color:inherit}.jeqLQt{margin-top:16px}.ecJbVf{background-color:#333333;color:#424242;text-align:center;padding:32px 0;position:relative;height:100%}.ecJbVh{text-align:center;padding:32px 0;position:relative;height:100%}.jugaIX{background-color:#fafafa;color:#424242;font-size:14px;font-weight:400;line-height:20px}.ecJbVg{text-align:center;padding:32px 0;position:relative;height:70%}.jugaIX{background-color:#fafafa;color:#424242;font-size:14px;font-weight:400;line-height:20px}.jWLPEz{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;height:100%}</style>
														  <style data-styled-components="gzHlrG hsCtPg fUOAvB dLPVue ilVeTz ePPSMY hhNpJT fuLfMH grdcPs LECyq cnVKvy exhWPQ dtfZhD yzWpN" data-styled-components-is-local="true">.gzHlrG{background-color:#fafafa;overflow:hidden;padding:24px;padding-top:16px;padding-bottom:32px;text-align:center}.fUOAvB{background-color:#e0e0e0;overflow:hidden;padding:24px;padding-top:16px;padding-bottom:32px;text-align:center}.hsCtPg{max-width:290px;margin:0 auto}.cnVKvy{margin-bottom:32px}.grdcPs{padding-top:48px;padding-bottom:48px;background-color:#e0e0e0}.LECyq{margin-top:32px;margin-bottom:32px}.exhWPQ{-webkit-flex:1;-ms-flex:1;flex:1;text-align:center;padding-left:8px;padding-right:8px}@media (max-width:959.95px){.exhWPQ{-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;margin-bottom:16px}.exhWPQ:nth-child(n+4){display:none}}.yzWpN{-webkit-flex:1;-ms-flex:1;flex:1;text-align:center;padding-left:8px;padding-right:8px}@media (max-width:959.95px){.yzWpN{-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%}.yzWpN:nth-child(n+4){display:none}}.dtfZhD{width:100%}@media (max-width:959.95px){.dtfZhD{width:auto}}.hhNpJT{margin-top:16px}.ePPSMY{text-align:center;-webkit-align-self:flex-start;-ms-flex-item-align:start;align-self:flex-start}@media (max-width:599.95px){.ePPSMY{margin:24px 0;-webkit-align-self:center;-ms-flex-item-align:center;align-self:center}}.fuLfMH{background-color:#36b67e;margin-right:8px;margin-top:8px}.fuLfMH>span{color:#fff}.dLPVue{padding:48px 32px}.ilVeTz{margin-top:32px}@media (max-width:599.95px){.ilVeTz{text-align:center}}</style>	  			
@endsection
<!-- {/literal} END JIVOSITE CODE -->
@section('content')

@php
// id del inmueble
 $id = Request()->id;
@endphp
    <section class="py-2" style="padding-bottom:5rem!important;">
        @if($detalle->is_sale == '1')
            <input type="hidden" id="view_mode" value="venta" />
        @endif
		<div class="container-fluid">
			<div class="row no-gutters">
				<div class="col-lg-2">
				</div>
				<div class="col-lg-8">			
					@if ($detalle->video_primary)
						@if (strlen($detalle->video_primary) >100)
						<!--Este texto solo visible para escritorio-->
							<div id="video_desktop" class="col-12 text-center padding-bottom:0px;  d-none d-sm-none d-md-block" style="padding-left: 0px;padding-right: 0px;">					
								<div  class="bg-white"  style="height: 590px; overflow-y: hidden;">
									<!--<blockquote class="tiktok-embed" cite="https://www.tiktok.com/@iamoving/video/7047583050032614662" data-video-id="7047583050032614662" style="max-width: 605px;min-width: 325px;" > <section> <a target="_blank" title="@iamoving" href="https://www.tiktok.com/@iamoving">@iamoving</a> ðŸ¤©Es piso en una MaravillaðŸ¤© <a title="arganzuela" target="_blank" href="https://www.tiktok.com/tag/arganzuela">#arganzuela</a> <a title="atocha" target="_blank" href="https://www.tiktok.com/tag/atocha">#atocha</a> <a title="buscopiso" target="_blank" href="https://www.tiktok.com/tag/buscopiso">#buscopiso</a> <a title="iamoving" target="_blank" href="https://www.tiktok.com/tag/iamoving">#IAMOVING</a> <a title="sevende" target="_blank" href="https://www.tiktok.com/tag/sevende">#sevende</a> <a title="buscocasa" target="_blank" href="https://www.tiktok.com/tag/buscocasa">#buscocasa</a> <a target="_blank" title="â™¬ The Business - TiÃ«sto" href="https://www.tiktok.com/music/The-Business-6906410977651066882">â™¬ The Business - TiÃ«sto</a> </section> </blockquote> <script async src="https://www.tiktok.com/embed.js"></script>-->
									<?php echo "{$detalle->video_primary}"
									?>
								</div>
							</div>
						<!--Este texto solo visible para smartphone-->
							<div id="video_mobile" class="text-center padding-bottom:0px;  d-block d-sm-block d-md-none">					
								<div class="bg-white"  style="height: 598px; overflow-y: hidden;">
									<!--<blockquote class="tiktok-embed" cite="https://www.tiktok.com/@iamoving/video/7047583050032614662" data-video-id="7047583050032614662" style="max-width: 605px;min-width: 325px;" > <section> <a target="_blank" title="@iamoving" href="https://www.tiktok.com/@iamoving">@iamoving</a> ðŸ¤©Es piso en una MaravillaðŸ¤© <a title="arganzuela" target="_blank" href="https://www.tiktok.com/tag/arganzuela">#arganzuela</a> <a title="atocha" target="_blank" href="https://www.tiktok.com/tag/atocha">#atocha</a> <a title="buscopiso" target="_blank" href="https://www.tiktok.com/tag/buscopiso">#buscopiso</a> <a title="iamoving" target="_blank" href="https://www.tiktok.com/tag/iamoving">#IAMOVING</a> <a title="sevende" target="_blank" href="https://www.tiktok.com/tag/sevende">#sevende</a> <a title="buscocasa" target="_blank" href="https://www.tiktok.com/tag/buscocasa">#buscocasa</a> <a target="_blank" title="â™¬ The Business - TiÃ«sto" href="https://www.tiktok.com/music/The-Business-6906410977651066882">â™¬ The Business - TiÃ«sto</a> </section> </blockquote> <script async src="https://www.tiktok.com/embed.js"></script>-->
									<?php echo "{$detalle->video_primary}"
									?>
								</div>
							</div>			
						<!--Este texto solo visible para escritorio-->
							<!--	<div id="video_desktop" class="col-12 text-center padding-bottom:0px;  d-none d-sm-none d-md-block">					
								<div  class="bg-black"  style="height: 450px; overflow-y: hidden;">
									<iframe  src="https://www.youtube.com/embed/pBjoaM1XjTM?modestbranding=1&rel=0" class="video-fluid z-depth-1" width="100%" height="100%" mozallowfullscreen webkitallowfullscreen  allowfullscreen></iframe>
								</div>
							</div>-->
						<!--Este texto solo visible para smartphone-->
							<!--<div id="video_mobile" class="text-center padding-bottom:0px;  d-block d-sm-block d-md-none">					
								<div class="bg-black"  style="height: 370px; overflow-y: hidden;">
									<iframe src="https://www.youtube.com/embed/pBjoaM1XjTM?modestbranding=1&rel=0" class="video-fluid z-depth-1" width="100%" height="100%" mozallowfullscreen webkitallowfullscreen  allowfullscreen></iframe>
								</div>
							</div>-->					
						@else	
						<!--Este texto solo visible para escritorio-->
							<div id="video_desktop" class="col-12 text-center padding-bottom:0px;  d-none d-sm-none d-md-block" style="padding-left: 0px;padding-right: 0px;">					
								<div  class="bg-black"  style="height: 450px; overflow-y: hidden;">
									<iframe  src="https://www.youtube.com/embed/{{$detalle->video_primary}}?modestbranding=1&rel=0" class="video-fluid z-depth-1" width="100%" height="100%" mozallowfullscreen webkitallowfullscreen  allowfullscreen></iframe>
								</div>
							</div>
						<!--Este texto solo visible para smartphone-->
							<div id="video_mobile" class="text-center padding-bottom:0px;  d-block d-sm-block d-md-none">					
								<div class="bg-black"  style="height: 370px; overflow-y: hidden;">
									<iframe src="https://www.youtube.com/embed/{{$detalle->video_primary}}?modestbranding=1&rel=0" class="video-fluid z-depth-1" width="100%" height="100%" mozallowfullscreen webkitallowfullscreen  allowfullscreen></iframe>
								</div>
							</div>	
						@endif					
					@else
						<div class="row justify-content-center padding-bottom:0px;">
						<!--Este texto solo visible para escritorio-->
							<div class="col-12 text-center padding-bottom:0px;  d-none d-sm-none d-md-block" style="padding-left: 0px;padding-right: 0px;">
								<a href="#mInforme" role="button" data-toggle="modal" data-target="#mInforme" class="mr-2">
									<img  height="399px" src="/storage/{{$detalle->path_image_primary}}" alt="Fotos inmueble">
									
								</a>
							</div>
							<!--Este texto solo visible para smartphone-->
							<div class="col-12 text-center padding-bottom:0px;  d-block d-sm-block d-md-none">
								<a href="#mInformeMin" role="button" data-toggle="modal" data-target="#mInformeMin" class="mr-2">
									
									<img src="/storage/{{$detalle->path_image_primary}}" alt="Fotos inmueble">
								</a>
							</div>							
						</div>					
					@endif
			
		    <div  class="mt-2"><!-- style="padding-left:14px;padding-right:14px;">		-->
						@if ($detalle->id == 85 || $detalle->id == 93)
						<section>
						<a href="tel:{{ $detalle->telefono }}" type="button" class="btn btn-success btn-block">Llama a la propietaria: {{ $detalle->telefono }}</a>
						</section>
						@else
							
								@if ($detalle->id == 94)
									<section class="p-0">
									</section>
								@else
									@if($detalle->estado_inmueble == 'Disponible' || $detalle->estado_inmueble == 'Reservado' || $detalle->estado_inmueble == '' || $detalle->estado_inmueble == null)
										<section class="p-0">
											@if($detalle->id != 83)  
											<button v-if="user" type="button" style="padding: 0.95rem 0.75rem;"  id="btnVisita"  class="btn btn-success btn-block" @click.prevent="modalVisita">
												Request an in-person visit
											</button>
											@else
											<button v-if="user" type="button" style="padding: 0.95rem 0.75rem;" class="btn btn-success btn-block" @click.prevent="modalVisita">
												Request a visit with Reforviliaria
											</button>								
											@endif


											@if($detalle->id != 83)  
											<button v-else class="btn btn-success btn-block" style="padding: 0.95rem 0.75rem;" id="salevisita" @click.prevent="modalVisita">
												Request an in-person visit
											</button>
											@else
										<button v-else class="btn btn-success btn-block" style="padding: 0.95rem 0.75rem;" @click.prevent="modalVisita">
												Request a visit with Reforviliaria
											</button>								
											@endif
											<!--<button v-if="user" id="pedido_reservar_logado" type="button" class="btn btn-success btn-block" @click.prevent="modalPedido">
												Hacer {{ $detalle->is_sale == '0' ? 'una' : 'una' }} contraoferta 
											</button>
											
											<button v-else id="pedido_reservar" class="btn btn-success btn-block" @click.prevent="modalPedido">
												Hacer {{ $detalle->is_sale == '0' ? 'una' : 'una' }} contraoferta 
											</button>-->
											<!--<button class="btn btn-success btn-block" @click.prevent="/premium">
												ðŸ“žLlamar
											</button>	
											-->
												<a href="/premium" style="padding: 0.95rem 0.75rem;" class="btn btn-success btn-block">
												ðŸ“žCall me!!
											</a>	
										</section>
									@else
										
										<!--<br><br><br><br>-->
									@endif
								@endif
						@endif	
					</div>

						
		
					<!--Este texto solo visible para escritorio-->
					<div class="mt-2" style="background: #9291910f"><!--;margin-left: 14px; margin-right: 14px;">-->
					
						<!--Este texto solo visible para smartphone-->					
					<!--<div class="mt-2  d-block d-sm-block d-md-none" style="background: #9291910f;">-->
					

						<div class="container pt-1 pb-3">
							@if($detalle->tipo_inmueble == 'Habitaciones')
								@if($detalle->id != 34)
							<h5>
								<i class="fas fa-arrow-right"></i> <i class="fas fa-arrow-right"></i> <b>Rooms for rent</b>
							</h5>
								@endif	
							@endif	
							<h5>
								Property basic data
							</h5>
							<ul class="fa-ul">
								@if ($detalle->tipo_inmueble == 'Habitaciones' && $detalle->bedrooms>1)
								<li>
								   <span class="fa-li" >ðŸ’°</span> From <b>{{ $detalle->propiedad_precio }}</b> /month
								</li>
								@else
									@if($detalle->id == 94)
									@else
										@if($detalle->id != 85)
											<li>
												<span class="fa-li" ><i class="fas fa-euro-sign"></i></span> <b>{{ number_format($detalle->propiedad_precio, 0, ',', '.') }}</b> @if ($detalle->is_sale == '0')/month @endif 
											</li>
										@else
											<li>	
											<span class="fa-li" ><i class="fas fa-euro-sign"></i></span> <b>Price on application</b> 
											</li>									
										@endif
									@endif
								@endif							
								@if($detalle->road)
									@if($detalle->id != 92)
										<li>
											<span class="fa-li" ><i class="fas fa-directions"></i></span>
											 {{$detalle->road}}
										</li>
									@else
										<li>
										
											<span class="fa-li" ><i class="fas fa-directions"></i></span>
											Castillejos - TetuÃ¡n
										</li>
									 @endif
								@endif
								@if($detalle->tipo_inmueble == 'Local/Oficina')
                                    @if($detalle->oficina == '1')
                                        <li>
                                            <span class="fa-li" ><i class="fas fa-check-double text-success"></i></span>
                                            Business office
                                        </li>                                                       
                                    @else
    									<li>
    										<span class="fa-li" ><i class="fas fa-check-double text-success"></i></span>
    										Local
    									</li>	
                                    @endif							
								@else
									@if ($detalle->estudio)
									<li>
										<span class="fa-li" ><i class="fas fa-check-double text-success"></i></span>
										Studio flat @if($detalle->tipo_inmueble == 'Habitaciones')  
													@if($detalle->id != 34)  
													shared
													@endif
												@endif
									</li>
									@endif
									@if ($detalle->loft)
									<li>
										<span class="fa-li" ><i class="fas fa-check-double text-success"></i></span>
										Loft @if($detalle->tipo_inmueble == 'Habitaciones')  
												shared
												@endif
									</li>
									@endif
									@if ($detalle->apartamento)
									<li>
										<span class="fa-li" ><i class="fas fa-check-double text-success"></i></span>
										@if ($detalle->id>368 and $detalle->id<373)
										Private room in shared flat
										@else
										Apartment @if($detalle->tipo_inmueble == 'Habitaciones')  
												shared
												@endif
										@endif
									</li>
									@endif
									@if ($detalle->piso)
									<li>
										<span class="fa-li" ><i class="fas fa-check-double text-success"></i></span>
										Flat @if($detalle->tipo_inmueble == 'Habitaciones')  
												shared
												@endif
													@if($detalle->id == 231)  
													- Business office (deeded as housing)
													@endif
									</li>
									@endif
									@if ($detalle->chalet)
									<li>
										<span class="fa-li" ><i class="fas fa-check-double text-success"></i></span>
										House @if($detalle->tipo_inmueble == 'Habitaciones')  
												shared
												@endif
									</li>
									@endif
									@if ($detalle->bajo)
									<li>
										<span class="fa-li" ><i class="fas fa-check-double text-success"></i></span>
										Ground floor flat @if($detalle->tipo_inmueble == 'Habitaciones')  
												shared
												@endif
									</li>
									@endif
									@if ($detalle->atico)
									<li>
										<span class="fa-li" ><i class="fas fa-check-double text-success"></i></span>
										Ãtico @if($detalle->tipo_inmueble == 'Habitaciones')  
												shared
												@endif
									</li>
									@endif
								@endif
								@if($detalle->id == 34)
										<li>
											<span class="fa-li" ><i class="fas fa-bed"></i></span>
											Studio Flat 1
										</li>
										<li>
											<span class="fa-li" ><i class="fas fa-bed"></i></span>
											Studio Flat 2
										</li>										
								@else
									@if($detalle->bedrooms>0)
										@if($detalle->tipo_inmueble == 'Local/Oficina')
											<li>
												<span class="fa-li" ><i class="fas fa-bed"></i></span>
												Rooms: {{$detalle->bedrooms}}
															
											</li>								
										@else										
											@if($detalle->id ==2)
											<li>
												<span class="fa-li" ><i class="fas fa-bed"></i></span>
													Private room in shared flat
											</li>									
											@else
											<li>
												<span class="fa-li" ><i class="fas fa-bed"></i></span>
												Bedrooms: @if($detalle->id !=57){{$detalle->bedrooms}}
															@else
															2
														@endif
											</li>
											@endif
										@endif
								 @endif
									@if($detalle->bathrooms>0)	
									<li>
										<span class="fa-li" ><i class="fas fa-bath"></i></span>
										 <?php 
													if($detalle->aseos>0){
														echo "Bathrooms: ".$detalle->bathrooms." y Toilets: ".$detalle->aseos;
													}
													else{
														echo "Bathrooms: ".$detalle->bathrooms;
													}
													
?>
									</li>
									@else
										<li>
											<span class="fa-li" ><i class="fas fa-bath"></i></span>										
											@if($detalle->aseos>0) Toilets: {{$detalle->aseos}}@endif
										</li>										
									@endif
								@endif
								@if($detalle->square_meters)

								<li>
									<span class="fa-li" ><i class="fas fa-ruler-combined"></i></span>
									{{$detalle->square_meters}} m<sup>2</sup>
								</li>								
								@endif
						@if($detalle->id == 83 || $detalle->id == 85 || $detalle->id == 41 || $detalle->id == 94)  
						@else
						<li>
							<span class="fa-li" ><i class="fas fa-book"></i></span>
							Reference: {{$detalle->id}}
						</li>
						<li>
								@if($detalle->estado_inmueble == 'Disponible')
									<span class="fa-li" ><i class="fas fa-check"></i></span> Available
								@elseif($detalle->estado_inmueble == 'Reservado')
									<span class="fa-li" ><i class="fa fa-frown"></i></span> Reserved
								@elseif($detalle->estado_inmueble == 'Alquilado')
									<span class="fa-li" ><i class="fa fa-frown"></i></span> Rented	
								@elseif($detalle->estado_inmueble == 'Vendido')
									<span class="fa-li" ><i class="fa fa-frown"></i></span> Sold out
									<!-- cara blanca triste -><span class="fa-li" ><i class="far fa-frown"></i></span>-->
								@else
								@endif
						</li>
						@endif								
								@if($detalle->hay_transporte>0)
									@foreach ($transportes as $transporte)
									@endforeach								
								@endif
							
							</ul>
						
							<section class="collapse-content">
								<div class="collapse-item">
									<button id="id_fotos" name="id_fotos" class="btn-collapse text-left"  href="#mInforme"  style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;" data-toggle="modal" data-target="#mInforme" role="button" aria-expanded="false" >
										<i class="fas fa-image fa-fw"></i>
										Photos
									</button>
								</div>	
							@if($detalle->hay_barrio == 1)		
								<div class="collapse-item">
									<button  id="id_barrio"  class="btn-collapse text-left"  href="#mInformeBarrio"  style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;" data-toggle="modal" data-target="#mInformeBarrio" role="button" aria-expanded="false" >
										<i class="fas fa-building fa-fw"></i>
										Neighborhood
										</button>
								</div>								
							@endif
								<div class="collapse-item">
									<button id="id_mapa"  class="btn-collapse text-left" href="#mMapa" style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;" data-toggle="modal" data-target="#mMapa" role="button" aria-expanded="false" >
										<i class="fas fa-map fa-fw"></i>
										Map
										</button>
								</div>
							@if($detalle->path_plano)
								<div class="collapse-item">
									<!--<button id="id_plano"  class="btn-collapse text-left" target="_blank" href="https://iamoving.com/storage/{{$detalle->path_plano}}"  style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;"  role="button"  data-plano="1" aria-expanded="false" >
										<i class="fas fa-drafting-compass fa-fw"></i>
										Flat plan
										</button>-->
									<button id="id_plano"  class="btn-collapse text-left" href="https://iamoving.com/storage/{{$detalle->path_plano}}" style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;" data-toggle="modal" data-target="#mPlano" role="button" aria-expanded="false" >
										<i class="fas fa-drafting-compass fa-fw"></i>
										Flat plan
										</button>										
								</div>				
							@endif									
							@if ($detalle->alquiler_casa)
								<div class="collapse-item" v-if="{{$detalle->is_sale}} == '0'">
									<button id="id_disponible" class="btn-collapse text-left" style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;"  data-toggle="collapse" href="#collapse-fecha" role="button" aria-expanded="false" aria-controls="collapse-fecha">
										<i class="fas fa-calendar fa-fw"></i>
										Available
									</button>
									<div class="collapse" id="collapse-fecha"> 
										<div class="content-collapse">
											<ul class="list-group list-group-flush">

												<li class="list-group-item">
													<span class="text-muted">
														 From {{  date('d-m-Y', strtotime($detalle->alquiler_casa))  }} 
														@if ($detalle->fecha_salida)
															until {{  date('d-m-Y', strtotime($detalle->fecha_salida))  }}
														@endif
													</span>
												</li>

											</ul>
										</div>
									</div>
								</div>
							@endif
								{{-- Calendario --}}
								@if ($detalle->contrato)
								<div class="collapse-item" v-if="{{$detalle->is_sale}} == '0'">
									<button id="id_minimo" class="btn-collapse text-left" style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;" data-toggle="collapse" href="#collapse-calendario" role="button" aria-expanded="false" aria-controls="collapse-calendario">
										<i class="fas fa-calendar-check fa-fw"></i>
										Minimum contract time
										</button>
										
									
									<div class="collapse" id="collapse-calendario"> 
										<div class="content-collapse">
											<ul class="list-group list-group-flush">
												<li class="list-group-item">
													<span class="text-muted">{{$detalle->contrato}} {{$detalle->contrato > 1 ? 'months' : 'month'}} </span><a href="#mContrato" role="button" data-toggle="modal" data-target="#mContrato" class="mr-2"><img src="/img/info.png"  width="17" height="17" style="margin-bottom:5px;" alt="info"></a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								@endif
								{{-- Calendario maximo--}}
								@if ($detalle->tiempo_maximo)
								<div class="collapse-item" v-if="{{$detalle->is_sale}} == '0'">
									<button id="id_maximo"  class="btn-collapse text-left" style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;"  data-toggle="collapse" href="#collapse-calendario-maximo" role="button" 
									aria-expanded="false" aria-controls="collapse-calendario-maximo">
										<i class="fas fa-calendar-check fa-fw"></i>
										Maximum contract time
										</button>
									<div class="collapse" id="collapse-calendario-maximo"> 
										<div class="content-collapse">
											<ul class="list-group list-group-flush">
												<li class="list-group-item">
													<span class="text-muted">{{$detalle->tiempo_maximo}} @if ($detalle->tiempo_maximo == '1')
														year
													@elseif ($detalle->tiempo_maximo == '5')
														years
													@else
														months
													@endif
													</span><a href="#mContrato_maximo" role="button" data-toggle="modal" data-target="#mContrato_maximo" class="mr-2"><img src="/img/info.png"  width="17" height="17" style="margin-bottom:5px;" alt="info"></a>
												</li>
											</ul>
										</div>
									</div>
								</div>				
								@endif
								{{-- Estado --}}
								<div class="collapse-item">
									<button id="id_estado"  class="btn-collapse text-left" style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;"  data-toggle="collapse" href="#collapse-estado" role="button" aria-expanded="false" aria-controls="collapse-estado">
										<i class="fas fa-house-damage fa-fw"></i>
										State
									</button>
									<div class="collapse" id="collapse-estado"> 
										<div class="content-collapse">
											<ul class="list-group list-group-flush">
												<li class="list-group-item">
													<span class="text-muted"><?php
																					$variable  = limpieza_url(trim($detalle->propiedad_estado));
																					$old = array("obra-nueva", "reformado-a-estrenar","a-reformar","en-buen-estado","recian-reformado");
																					$new   = array("New", "Brand new refurbished","To reform","In good state","Newly renovated");
																					$newphrase = str_replace($old, $new, $variable);
																					echo $newphrase;
																					?></span>
												</li>
											</ul>
										</div>
									</div>
								</div>
								{{--HabitaciÃ³n Amueblada --}}
								@if ($detalle->tipo_inmueble == 'Habitaciones')
								<div class="collapse-item" >
									<button id="id_amuhab"  class="btn-collapse text-left"  style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;"  data-toggle="collapse" href="#collapse-habitacion_vacia" role="button" aria-expanded="false" aria-controls="collapse-habitacion_vacia">
										<i class="fas fa-chair fa-fw"></i>
										Is the room furnished?
									</button>
									<div class="collapse" id="collapse-habitacion_vacia"> 
										<div class="content-collapse">
											<ul class="list-group list-group-flush">
												<li class="list-group-item">
													<span class="text-muted">
													<?php
																					$variable  = limpieza_url(trim($detalle->habitacion_vacia));
																					$old = array("totalmente-sin-muebles", "sin-muebles-con-cocina-equipada","semi-amueblado","amueblado");
																					$new   = array("Totally unfurnished", "Empty but the kitchen equipped","Partly furnished","Furnished");
																					$newphrase = str_replace($old, $new, $variable);
																					echo $newphrase;
																					?>
													</span>
												</li>
											</ul>
										</div>
									</div>
								</div>	
								@endif
								{{-- Amueblado --}}
								<div class="collapse-item" v-if="{{$detalle->is_sale}} == '0'">
									<button id="id_amueblado"  class="btn-collapse text-left" style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;"  data-toggle="collapse" href="#collapse-amueblado" role="button" aria-expanded="false" aria-controls="collapse-amueblado">
										<i class="fas fa-chair fa-fw"></i>
										Is it furnished?
									</button>
									<div class="collapse" id="collapse-amueblado"> 
										<div class="content-collapse">
											<ul class="list-group list-group-flush">
												<li class="list-group-item">
													<span class="text-muted">
													<?php
																					$variable  = limpieza_url(trim($detalle->amueblada));
																					$old = array("totalmente-sin-muebles", "sin-muebles-con-cocina-equipada","semi-amueblado","amueblado");
																					$new   = array("Totally unfurnished", "Empty but the kitchen equipped","Partly furnished","Furnished");
																					$newphrase = str_replace($old, $new, $variable);
																					echo $newphrase;
																					?>
													</span>@if ($detalle->comentario_inmueble)
														<a href="#mComentarioMuebles" role="button" data-toggle="modal" data-target="#mComentarioMuebles" class="mr-2"><img src="/img/info.png"  width="17" height="17" style="margin-bottom:5px;" alt="info"></a>
													@endif
												</li>
											</ul>
										</div>
									</div>
								</div>
								{{-- Amueblado venta--}}
								@if ($detalle->amueblada)
								<div class="collapse-item" v-if="{{$detalle->is_sale}} == '1'">
									<button id="id_amueblaventa" class="btn-collapse text-left"  style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;"  data-toggle="collapse" href="#collapse-amueblado" role="button" aria-expanded="false" aria-controls="collapse-amueblado">
										<i class="fas fa-chair fa-fw"></i>
										Is it sold furnished?
									</button>
									<div class="collapse" id="collapse-amueblado"> 
										<div class="content-collapse">
											<ul class="list-group list-group-flush">
												<li class="list-group-item">
													<span class="text-muted">
													<?php
																					$variable  = limpieza_url(trim($detalle->amueblada));
																					$old = array("totalmente-sin-muebles", "sin-muebles-con-cocina-equipada","semi-amueblado","amueblado");
																					$new   = array("Totally unfurnished", "Empty but the kitchen equipped","Partly furnished","Furnished");
																					$newphrase = str_replace($old, $new, $variable);
																					echo $newphrase;
																					?>
													</span>@if ($detalle->comentario_inmueble)
														<a href="#mComentarioMuebles" role="button" data-toggle="modal" data-target="#mComentarioMuebles" class="mr-2"><img src="/img/info.png"  width="17" height="17" style="margin-bottom:5px;" alt="info"></a>
													@endif
												</li>
											</ul>
										</div>
									</div>
								</div>	
								@endif								
								{{-- Transporte --}}
								@if ($detalle->path_video_transport)
									<div class="collapse-item">
										<button id="id_transporte" class="btn-collapse text-left" style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;"  data-toggle="collapse" href="#collapse-transporte" role="button" aria-expanded="false" aria-controls="collapse-transporte">
											<i class="fas fa-route fa-fw"></i>
											Transport
										</button>
										<div class="collapse" id="collapse-transporte"> 
											<div class="content-collapse">
												<div class="bg-black"  style="height: 400px;">
													<video src="/storage/{{$detalle->path_video_transport}}" class="video-fluid z-depth-1" controls poster="https://iamoving.com/img/transporte.png" width="100%" height="100%" controls preload="none"></video>
												</div>
											</div>
										</div>
									</div>
								@endif
								{{-- Lo que es importante para mi --}}
								<div class="collapse-item">
									<button id="id_importante" class="btn-collapse text-left" style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;"  data-toggle="collapse" href="#collapse-importante" role="button" aria-expanded="false" aria-controls="collapse-importante">
										<i class="fas fa-exclamation-circle fa-fw"></i>
										Very important to me!
									</button>
									<div class="collapse" id="collapse-importante"> 
										<div class="content-collapse">
											<ul class="list-group list-group-flush">
												@if ($detalle->exterior)
													<li class="list-group-item">
														Exterior
													</li>
												@endif
{{-- 
												<div>
												
										             <orientaciones :id="{{$id}}"></orientaciones>	
													
												</div> --}}
											
												@if ($detalle->interior)
													<li class="list-group-item">
														Interior
													</li>
												@endif
												@if ($detalle->terraza)
													<li class="list-group-item">
														Terrace
													</li>
												@endif
												@if ($detalle->balcon)
													<li class="list-group-item">
														Balcony
													</li>
												@endif
												@if ($detalle->tendero)
													<li class="list-group-item">
														Clothes rack
													</li>
												@endif
												@if ($detalle->aire_acondicionado)
													<li class="list-group-item">
														Air conditioning
													</li>
												@endif
												@if ($detalle->lift)
													<li class="list-group-item">
														Lift: Yes
													</li>
												@else
													<li class="list-group-item">
														Lift: No
													</li>
												@endif
												@if ($detalle->rampa)
													<li class="list-group-item">
														Disabled access to the portal
													</li>
												@endif
												@if ($detalle->bebe_rampa)
													<li class="list-group-item">
														Lift that enters a baby stroller
													</li>
												@endif
												@if ($detalle->portero)
													<li class="list-group-item">
														Doorman
													</li>
												@endif
												@if ($detalle->video_portero)
													<li class="list-group-item">
														Video intercom
													</li>
												@endif	
												@if ($detalle->lavavajillas)
													<li class="list-group-item">
														Dishwasher
													</li>
												@endif	
												@if ($detalle->horno)
													<li class="list-group-item">
														Oven
													</li>
												@endif													
												@if ($detalle->piso_importante)
													<li class="list-group-item">
														<b>What floor is it?:</b>
														<span class="text-muted">{{ str_replace("bajo","Ground floor",limpieza_url(trim($detalle->piso_importante))) }}</span>
													</li>
												@endif
												@if ($detalle->plantas_edificio)
													<li class="list-group-item">
														<b>How many floors are there in the building?:</b>
														<span class="text-muted">{{$detalle->plantas_edificio}}</span>
													</li>
												@endif
												@if ($detalle->plantas_chalet)
													<li class="list-group-item">
														<b>How many floors are there in house?:</b>
														<span class="text-muted">{{$detalle->plantas_chalet}}</span>
													</li>
												@endif													
												@if ($detalle->calefaccion)
													<li class="list-group-item">
														<b>Heating:</b>
														<span class="text-muted"><?php
																					$variable  = limpieza_url(trim($detalle->calefaccion));
																					$old = array("Individual by natural gas-suelo-radiante", "individual-por-gas-natural","elactrica","central", "Electrical-bomba-de-fraocalor","sin-calefaccian");
																					$new   = array("Individual by natural gas (Radiant floor)", "Individual by natural gas","Electrical","Central","Electrical (cold/heat pump)","Without heating");
																					$newphrase = str_replace($old, $new, $variable);
																					if ($newphrase=='Individual by natural gas-suelo-radiante'){
																						$newphrase='Individual by natural gas (Radiant floor)';
																					}
																					echo $newphrase;
																					?></span>
													</li>
												@endif
												@if ($detalle->calentador_agua)
													<li class="list-group-item">
														<b>Water Boiler:</b>
														<span class="text-muted"><?php
																					$variable  = limpieza_url(trim($detalle->calentador_agua));
																					$old = array("gas-natural", "elactrica","central");
																					$new   = array("Natural gas","Electrical","Central");
																					$newphrase = str_replace($old, $new, $variable);
																					echo $newphrase;
																					?></span>
													</li>
												@endif 
												@if ($detalle->orientacion)
													<li class="list-group-item">
														<b>Orientation:</b>
														<span class="text-muted">{{$detalle->orientacion}}</span>
													</li>
												@endif
												@if ($detalle->suite)
													<li class="list-group-item">
														<b>Bathroom incorporated in the bedroom:</b>
														<span class="text-muted">{{$detalle->suite}}</span>
													</li>
												@endif
												@if ($detalle->is_sale == '0')
													@if ($detalle->mascotas_no == '1')
													<li class="list-group-item">
														<b>Pets not allowed</b><span style='font-family:"Segoe UI Emoji",sans-serif'>&#128542;</span>
													</li>														
													@else
													<li class="list-group-item">
														<b>Are pets allowed? </b><a href="#mMascotas" role="button" data-toggle="modal" data-target="#mMascotas" class="mr-2"><img src="/img/info.png"  width="17" height="17" style="margin-bottom:5px;" alt="info"></a>
													</li>
													@endif
												@endif
												@if ($detalle->tipo_suelo)
													<li class="list-group-item">
														<b>Soil Type:</b>
														<span class="text-muted"><?php
																					$variable  = limpieza_url(trim($detalle->tipo_suelo));
																					$old = array("moqueta", "hormigan","ceramica","marmol","pizarra","parquet","tarima-flotante","vinilo");
																					$new   = array("Carpet", "Concrete","Ceramic","Marble","Slated","Parquet","Laminated flooring","Vinyl");
																					$newphrase = str_replace($old, $new, $variable);
																					echo $newphrase;
																					?></span>
													</li>
												@endif
												@if ($detalle->tipo_pared)
													<li class="list-group-item">
														<b>Wall:</b>
														<span class="text-muted"><?php
																					$variable  = limpieza_url(trim($detalle->tipo_pared));
																					$old = array("gotela", "lisa");
																					$new   = array("Stippling", "Smooth");
																					$newphrase = str_replace($old, $new, $variable);
																					echo $newphrase;
																					?></span>
													</li>
												@endif												
												@if ($detalle->tipo_inmueble == 'Local/Oficina')
														@if ($detalle->numero_escaparates)
															<li class="list-group-item">
																<b>How many shop windows does it have?:</b>
																<span class="text-muted">{{$detalle->numero_escaparates}}</span>
															</li>
														@endif	
														@if ($detalle->plantas_local)
															<li class="list-group-item">
																<b>Local/Business office floors?:</b>
																<span class="text-muted">{{$detalle->plantas_local}}</span>
															</li>
														@endif															
														@if ($detalle->diafano)
															<li class="list-group-item">
																Diaphanous
															</li>
														@endif
														@if ($detalle->divido_mamparas)
															<li class="list-group-item">
																Divided with Screens
															</li>
														@endif
														@if ($detalle->divido_tabiques)
															<li class="list-group-item">
																Divided with partitions
															</li>
														@endif
														@if ($detalle->salida_humos)
															<li class="list-group-item">
																Smoke outlet
															</li>
														@endif
														@if ($detalle->pie_calle)
															<li class="list-group-item">
																At street level
															</li>
														@endif
														@if ($detalle->centro_comercial)
															<li class="list-group-item">
																In shopping center
															</li>
														@endif
														@if ($detalle->entreplanta)
															<li class="list-group-item">
																Mezzanine
															</li>
														@endif
														@if ($detalle->subterraneo)
															<li class="list-group-item">
															    Underground
															</li>
														@endif														
														@if ($detalle->puerta_seguridad)
															<li class="list-group-item">
																Security door
															</li>
														@endif
														@if ($detalle->sistema_alarma)
															<li class="list-group-item">
																Alarm system
															</li>
														@endif
														@if ($detalle->circuito_seguridad)
															<li class="list-group-item">
																Security closed circuit
															</li>
														@endif
														@if ($detalle->almacen)
															<li class="list-group-item">
																Warehouse
															</li>
														@endif
														@if ($detalle->esquina)
															<li class="list-group-item">
																In the corner
															</li>
														@endif	
														@if ($detalle->numero_ascensores)
															<li class="list-group-item">
																<b>How many lifts does it have?:</b>
																<span class="text-muted">{{$detalle->numero_ascensores}}</span>
															</li>
														@endif															
														@if ($detalle->montacargas)
															<li class="list-group-item">
																Lift truck
															</li>
														@endif												
												
												@endif	
												{{-- 
												@if ($detalle->is_sale == '0')
													<li class="list-group-item">
														<b>The Kitchen has:</b>
														<span class="text-muted">
															{{$detalle->horno ? 'Oven /' : null}}
															{{$detalle->lavavajillas ? 'Dishwasher' : null}}
														</span>
													</li>
												@endif
												--}}
											</ul>
										</div>
									</div>
								</div>
								{{-- Gastos aprox --}}
								@if ($detalle->is_sale==1)
								@if ($detalle->gastos_agua>0 || $detalle->gastos_basura>0 || $detalle->gastos_comunidad>0 || $detalle->gastos_ibi>0 )
								<div class="collapse-item" v-if="{{$detalle->is_sale}} == '1'">
									<button id="id_garaje"  class="btn-collapse text-left" style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;" data-toggle="collapse" href="#collapse-certificado" role="button" aria-expanded="false" aria-controls="collapse-certificado">
										<i class="fas fa-fw fa-hand-holding-usd"></i>
										Expenses approx.
									</button>
									<div class="collapse" id="collapse-certificado"> 
										<div class="content-collapse">
											<ul class="list-group list-group-flush">
												@if ($detalle->gastos_agua>0)
												<li class="list-group-item">
													<b>Water:</b> 
													<span class="text-muted">â‚¬ {{$detalle->gastos_agua}}/month</span>
												</li>
												@endif
												@if ($detalle->gastos_basura>0)
												<li class="list-group-item">
													<b>Garbage fee:</b> 
													<span class="text-muted">â‚¬ {{$detalle->gastos_basura}}/month</span>
												</li>
												@endif
												@if ($detalle->gastos_comunidad>0)
												<li class="list-group-item">
													<b>Community fee:</b> 
													<span class="text-muted">â‚¬ {{$detalle->gastos_comunidad}}/month</span>
												</li>
												@endif
												@if ($detalle->gastos_ibi>0)
												<li class="list-group-item">
													<b>ibi:</b> 
													<span class="text-muted">â‚¬ {{ number_format($detalle->gastos_ibi, 0, ',', '.') }}/year</span>
												</li>
												@endif
											</ul>
										</div>
									</div>
								</div>
								@endif
								@endif
								{{-- Incluido en el precio --}}
								@if ($detalle->is_sale==1)
								@if ($detalle->garaje_incluido_precio  || $detalle->testero_incluido)
								<div class="collapse-item" v-if="{{$detalle->is_sale}} == '1'">
									<button id="id_incluido"  class="btn-collapse text-left" style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;" data-toggle="collapse" href="#collapse-incluido" role="button" aria-expanded="false" aria-controls="collapse-incluido">
										<i class="fas fa-fw fa-hand-holding-usd"></i>
										Included in the price
									</button>
									<div class="collapse" id="collapse-incluido"> 
										<div class="content-collapse">
											<ul class="list-group list-group-flush">
												@if ($detalle->garaje_incluido_precio)
													<li class="list-group-item">
                                                    @if ($detalle->plazas_garaje >1)
                                                        {{$detalle->plazas_garaje}} private parking spaces
													@else
														Private Parking
                                                    @endif
                                                    </li>
												@endif	
												@if ($detalle->testero_incluido)
													<li class="list-group-item">Storage room</li>
												@endif													
											</ul>												
										</div>
									</div>
								</div>
								@endif
								@endif								
								{{-- gastos incluidos --}}
						@if ($detalle->is_sale == '0' && $detalle->gastos_incluido_calentamiento || $detalle->gastos_incluido_agua || $detalle->gastos_incluido_luz || $detalle->gastos_incluidos_gas || $detalle->gastos_incluidos_basura || $detalle->gastos_incluido_comunidad || $detalle->gastos_incluido_ibi || $detalle->garaje_incluido_precio || $detalle->testero_incluido || $detalle->gastos_incluido_internet)			
								<div class="collapse-item" v-if="{{$detalle->is_sale}} == '0'">
									<button id="id_precio"  class="btn-collapse text-left" style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;" data-toggle="collapse" href="#collapse-gastos" role="button" aria-expanded="false" aria-controls="collapse-gastos">
										<i class="fas fa-hand-holding-usd fa-fw"></i>
										Included in the price
									</button> 

									<div class="collapse" id="collapse-gastos"> 
										<div class="content-collapse">

											<ul class="list-group list-group-flush">
												@if ($detalle->gastos_incluido_calentamiento)
													<li class="list-group-item">Heater</li>
												@endif
												@if ($detalle->gastos_incluido_agua)
													<li class="list-group-item">Water</li>
												@endif
												@if ($detalle->gastos_incluido_luz)
													<li class="list-group-item">Electricity</li>
												@endif
												@if ($detalle->gastos_incluidos_gas)
													<li class="list-group-item">Gas</li>
												@endif
												@if ($detalle->gastos_incluidos_basura)
													<li class="list-group-item">Garbage fee</li>
												@endif
												@if ($detalle->gastos_incluido_comunidad)
													<li class="list-group-item">Community fee</li>
												@endif
												@if ($detalle->gastos_incluido_ibi)
													<li class="list-group-item">ibi</li>
												@endif
												@if ($detalle->garaje_incluido_precio)
													<li class="list-group-item">Private parking
                                                    @if ($detalle->garaje_dos_plazas)
                                                        (2 private parking spaces)
                                                    @endif
                                                    </li>
												@endif	
												@if ($detalle->testero_incluido)
													<li class="list-group-item">Storage room</li>
												@endif													
												@if ($detalle->gastos_incluido_internet)
													<li class="list-group-item">Internet</li>
												@endif
											</ul>
										</div>
									</div>
								</div>
						@endif
								{{-- datos del edificios --}}
							@if($detalle->hay_datosedificio == 1)										
							@else									
								<div class="collapse-item">
									<button id="id_edificio" class="btn-collapse text-left" style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;"  data-toggle="collapse" href="#collapse-edificio" role="button" aria-expanded="false" aria-controls="collapse-edificio">
										<i class="fas fa-fw fa-building"></i>
											Building data
									</button>
									<div class="collapse" id="collapse-edificio"> 
										<div class="content-collapse">

											<ul class="list-group list-group-flush">
												@if ($detalle->jardin)
													<li class="list-group-item">Garden</li>
												@endif
												@if ($detalle->piscina)
													<li class="list-group-item">swimming pool</li>
												@endif
												@if ($detalle->gym)
													<li class="list-group-item">Gym</li>
												@endif
												@if ($detalle->sauna)
													<li class="list-group-item">Sauna</li>
												@endif
												@if ($detalle->zona_deportiva)
													<li class="list-group-item">Sport's area</li>
												@endif
												@if ($detalle->zona_infantil)
													<li class="list-group-item">Children's area</li>
												@endif
												@if ($detalle->garaje_opcion)
													<li class="list-group-item">Optional private parking in the same building</li>
												@endif
												@if ($detalle->opcion_trastero_edificio)
													<li class="list-group-item">Optional storage room in the same building</li>
												@endif
												@if ($detalle->aproximate_cost_garages)
													<li class="list-group-item">
														<b>Price approx. of parking spaces for rent in the neighborhood:</b> 
														<span class="text-muted"> {{ $detalle->aproximate_cost_garages }} â‚¬/month</span>
													</li>
												@endif
                                                @if ($detalle->venta_cost_garage)
                                                    <li class="list-group-item">
                                                        <b>Price approx. of garage space for sale by the neighborhood:</b> 
                                                        <span class="text-muted"> {{ number_format($detalle->venta_cost_garage, 0, ',', '.') }} â‚¬</span>
                                                    </li>
                                                @endif                                                   
												@if ($detalle->antiguedad_edificio)
													<li class="list-group-item">
														<b>Building age:</b>
														<span class="text-muted">{{ str_replace("-aaos"," years",limpieza_url(trim($detalle->antiguedad_edificio))) }}</span>
													</li>
												@endif
												@if ($detalle->certificado_energetico) 
													<li class="list-group-item">
														<b>Energy certificate:</b>
														<span class="text-muted">{{ str_replace("en-tramite","In process",limpieza_url(trim($detalle->certificado_energetico))) }}</span>
													</li>
												@endif
											</ul>
										</div>
									</div>
								</div>
							@endif							
								{{-- nota --}}
								@if ($detalle->path_video_nota)
									<div class="collapse-item">
										<button id="id_nota" class="btn-collapse text-left" style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;"  data-toggle="collapse" href="#collapse-nota" role="button" aria-expanded="false" aria-controls="collapse-nota">
											<i class="fas fa-play fa-fw"></i>
											Note:
										</button>
										<div class="collapse" id="collapse-nota"> 
											<div class="content-collapse">
												<div class="bg-black"  style="height: 400px;">
													<video src="/storage/{{$detalle->path_video_nota}}" class="video-fluid z-depth-1" width="100%" height="100%" controls preload="none"></video>
												</div>
											</div>
										</div>
									</div>
								@endif

								@if($detalle->alquiler_aproximado > 0)
									@if ($detalle->is_sale == '1')
										<div class="collapse-item">
											<button id="id_alquiler" class="btn-collapse text-left" style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;" data-toggle="collapse" href="#collapse-inversor" role="button" aria-expanded="false" aria-controls="collapse-edificio">
												<i class="fas fa-fw fa-building"></i>
												Are you an investor? Look at the price approx. of rent:
											</button>
											<div class="collapse" id="collapse-inversor"> 
												<div class="content-collapse">
													<ul class="list-group list-group-flush">
														<li class="list-group-item"><span class="text-muted">â‚¬ <?php
echo number_format($detalle->alquiler_aproximado, 0, '', '.');
?>	</span>
															@if ($detalle->comentario_alquiler_aprox)
															   <a href="#mComentarioAlquiler" role="button" data-toggle="modal" data-target="#mComentarioAlquiler" class="mr-2"><img src="/img/info.png"  width="17" height="17" style="margin-bottom:5px;" alt="info"></a>
															@endif														
														</li>
													</ul>
												</div>
											</div>
										</div>
									@endif	
								@endif
							@if($detalle->hay_datosedificio == 1) 
							@if($detalle->garaje_opcion || $detalle->opcion_trastero_edificio || $detalle->aproximate_cost_garages || $detalle->antiguedad_edificio || $detalle->venta_cost_garage || $detalle->certificado_energetico)	
							<div class="collapse-item">
									<button id="id_info" class="btn-collapse text-left" style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;" data-toggle="collapse" href="#collapse-info" role="button" aria-expanded="false" aria-controls="collapse-info">
										<i class="fas fa-fw fa-info-circle"></i>
										More info
									</button>
									<div class="collapse" id="collapse-info"> 
										<div class="content-collapse">

											<ul class="list-group list-group-flush">
											@if($detalle->hay_datosedificio == 1)
												@if ($detalle->garaje_opcion)
													<li class="list-group-item">Optional private parking in the same building</li>
												@endif
												@if ($detalle->opcion_trastero_edificio)
													<li class="list-group-item">Optional storage room in the same building</li>
												@endif
												@if ($detalle->aproximate_cost_garages)
													<li class="list-group-item">
														<b>Price approx. of garage space for rent by the neighborhood:</b> 
														<span class="text-muted"> {{ $detalle->aproximate_cost_garages }} â‚¬/month</span>
													</li>
												@endif
                                                @if ($detalle->venta_cost_garage)
                                                    <li class="list-group-item">
                                                        <b>Price approx. of garage space for sale by the neighborhood:</b> 
                                                        <span class="text-muted"> {{ number_format($detalle->venta_cost_garage, 0, ',', '.') }} â‚¬</span>
                                                    </li>
                                                @endif                                                   
												@if ($detalle->antiguedad_edificio)
													<li class="list-group-item">
														<b>Building age:</b>
														<span class="text-muted">{{ str_replace("-aaos"," years",limpieza_url(trim($detalle->antiguedad_edificio))) }}</span>
													</li>
												@endif
												@if ($detalle->certificado_energetico) 
													<li class="list-group-item">
														<b>Energy certificate:</b>
														<span class="text-muted">{{ str_replace("en-tramite","In process",limpieza_url(trim($detalle->certificado_energetico))) }}</span>
													</li>
												@endif
											@endif
											</ul>
										</div>
									</div>
								</div>
							@endif
							@endif
							@if($detalle->is_sale == '0')
							<div class="collapse-item">
									<button id="id_pago" class="btn-collapse text-left" style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;" data-toggle="collapse" href="#collapse-pago_inicial" role="button" aria-expanded="false" aria-controls="collapse-info">
										<i class="fas fa-credit-card fa-fw"></i>
										Initial payment
									</button>
									<div class="collapse" id="collapse-pago_inicial"> 
										<div class="content-collapse">

											<ul class="list-group list-group-flush">
											@if($detalle->id != 41)
												@if($detalle->condiciones > 1)
													<li class="ml-5"><i class="icon ion-md-checkmark-circle-outline"></i>
														<b>Bond/Deposit:</b> 
														<span class="text-muted"> {{$detalle->condiciones}} Months</span>
																<br>
																<font size="2.0pt;">What is the Bond/Deposit? Sometimes the months of the deposit/guarantee may increase or decrease depending on the solvency presented by the interested party.</font>	
													</li>
												@else
													@if($detalle->condiciones == 1)
														<li class="ml-5"><i class="icon ion-md-checkmark-circle-outline"></i>
															<b>Bond/Deposit:</b> 
															<span class="text-muted"> {{$detalle->condiciones}} Months</span>
																<br>
																<font size="2.0pt;">What is the Bond/Deposit? Sometimes the months of the deposit/guarantee may increase or decrease depending on the solvency presented by the interested party.</font>
														</li>														
													@endif
													@if($detalle->condiciones == 0.5)
														<li class="ml-5"><i class="icon ion-md-checkmark-circle-outline"></i>
															<b>Bond/Deposit:</b> 
															<span class="text-muted"> {{$detalle->condiciones}} Months</span>
																<br>
																<font size="2.0pt;">What is the Bond/Deposit? Sometimes the months of the deposit/guarantee may increase or decrease depending on the solvency presented by the interested party.</font>
														</li>														
													@endif
												@endif
												@if($detalle->propietario_inmobiliaria=='Iamoving') 													
														<li class="ml-5"><i class="icon ion-md-checkmark-circle-outline"></i>
															<b>Service fee:</b> 
															<span class="text-muted"> {{$detalle->comision_inmobiliaria}} Month</span>
																<br>
																<font size="2.0pt;">What is the "Service Fee"? The IAMOVING service fee is one month's rent (VAT not included).</font>																																															
														</li>
												@else
													@if($detalle->comision_inmobiliaria)
														@if($detalle->comision_inmobiliaria > 1)
															<li class="ml-5"><i class="icon ion-md-checkmark-circle-outline"></i>
																<b>Service fee:</b> 
																<span class="text-muted"> {{$detalle->comision_inmobiliaria}} Months</span>
																<br>
																<font size="2.0pt;">What is the "Service Fee"? If the duration of the contract is less than 5 months, the IAMOVING service fee will be half a month's rent. </font>																																
															</li>														
														@else
															<li class="ml-5"><i class="icon ion-md-checkmark-circle-outline"></i>
																<b>Service fee:</b> 
																<span class="text-muted"> {{$detalle->comision_inmobiliaria}} Mes</span>
																<br>
																<font size="2.0pt;">What is the "Service Fee"? Sometimes it is possible to lower the months of the deposit, it will depend on the solvency presented.</font>																
															</li>
														@endif																																	
													@endif													
												@endif	
													<li class="ml-5"><i class="icon ion-md-checkmark-circle-outline"></i>
														<b>Current month</b>
														<br>														
														<font size="2.0pt;">What does "current month" mean? Payment of the current month in advance, in case the month has already started, the proportional part that is still missing until the end of the month will be paid.</font>
													</li>												
											@endif
											</ul>
										</div>
									</div>
							</div>
								@if($detalle->is_sale == '0' &&	 $detalle->id != 41)
								<div class="collapse-item">
										<button id="id_requisitos" class="btn-collapse text-left" style="cursor:pointer;color:#eadd03;width:100%;border: none;outline:none;"  data-toggle="collapse" href="#collapse-requisitos" role="button" aria-expanded="false" aria-controls="collapse-info">
											<i class="fas fa-fw fa-book"></i>
											Requirements to rent
										</button>
										<div class="collapse" id="collapse-requisitos"> 
											<div class="content-collapse">

												<ul class="list-group list-group-flush">


														<div class="modal-content" style="border:0px;">
														  <div class="modal-header">
															<h5 id="modal-request-title" class="modal-title">What documents do I need to rent?</h5>
														  </div>
														  <div class="modal-body">
																		<div class="col-md-12">
																			<div class="form-group">
																				<label><b>WARNING:</b> The final approval to rent a property published in IAMOVING, <b>will always belong to the owner</b>, regardless of whether the requirements requested below are met, thanks.</label>
																				@if ($detalle->documentos_sin_contrato =='1')
																				<label><b>Personal documentation</b>: It is not necessary to have a payroll or employment contract that identifies the person who is going to sign the contract, only a DNI, NIE or even a passport is required.</label>
																				<!--<ul>
																					<li class="ml-5">
																						Nos es necesario tener nÃ³mina ni contrato de trabajo que identifique a la persona que va a firmar el contrato, solÃ¡mente se requiere DNI, NIE o incluso pasaporte.
																					</li>
																				</ul>-->
																				@else
																				<label><b>1-Personal documentation</b>: that identifies the person who is going to sign the contract (DNI, NIE or even passport).</label>
																				<!--<ul>
																					<li class="ml-5">
																						Que identifique a la persona que va a firmar el contrato (DNI, NIE o incluso pasaporte).
																					</li>
																				</ul>	-->							
																				
																				@if ($detalle->id ==360)
																					<label><b>2-Documentation proving economic solvency</b>: Civil servants and retirees with life pension.</label>
																				<!--<ul>
																					<li class="ml-5">
																						<b>Funcionarios</b>
																					</li>
																					<li class="ml-5">
																						<b>Jubilados con pensiÃ³n vitalicia</b>
																				
																					</li>
																				</ul>-->								
																				@else
																					<label><b>Documentation proving economic solvency </b>: <b>For Employed Workers</b> are required the last two payslips and the employment contract. <b>For Self-Employed Workers</b> the last income statement (Form 100), the last quarter of the VAT return and proof of the date of registration as self-employed in the company are required.</label>
																				<!--<ul>
																					<li class="ml-5">
																						<b>Trabajadores por cuenta ajena:</b>
																							<ol type="a" >
																								<li class="ml-5">
																									Las 2 Ãºltimas nÃ³minas.
																								</li>
																								<li class="ml-5">
																									Contrato laboral.
																								</li>
																							</ol>
																					</li>-->
																					<!--<li class="ml-5">
																						<b>Trabajadores AutÃ³nomos:</b>
																							<ol type="a" >
																								<li class="ml-5">
																									Ãšltima declaraciÃ³n de la renta (Modelo 100).
																								</li>
																								<li class="ml-5">
																									Ãšltimo trimestre de la declaraciÃ³n del IVA.
																								</li>
																								<li class="ml-5">
																									 AcreditaciÃ³n de la fecha de alta como autÃ³nomo en la empresa.
																								</li>											
																							</ol>									
																					</li>
																				</ul>-->
																				@endif
																				<label><b>3-Income</b>: The sum of minimum income among all tenants is usually two and a half times higher than the cost of rent.</label>
																				<!--<ul>
																					<li class="ml-5">
																						La suma de ingresos mÃ­nimos entre todos los inquilinos suele ser dos veces y medio mayor al coste del alquiler.
																					</li>
																				</ul>-->
																				<br>
																				<label style="margin-bottom: 0rem;"><b>4-Guarantors</b></label>

																				<ul>
																					@if ($detalle->id !=360)
																					<li class="ml-0">
																						If you are a student or you are not working and you cannot prove financial solvency, a personal guarantee or more months of deposit is usually requested.
																					</li>
																					@endif								
																					<li class="ml-0">
																						<b>Personal endorsement</b> (it is necessary to provide the documentation mentioned in points 1 and 2 of said guarantors).
																					</li>
																					@if ($detalle->id !=360)
																					<li class="ml-0">
																						<b>Deposit</b> (In the event that the owner accepts this type of guarantee, negotiate the months directly with him/her).
																					</li>					
																					@endif								
																				</ul>
																				
																				@endif
																			</div>

																		</div>				
														  </div>
														</div>

												
												</ul>
											</div>
										</div>
								</div>
								@endif
							@endif
							@if($detalle->iamoving_pro >0)
								@if($detalle->fecha_de_alta)
									<!--<div class="mt-4">
													<span class="alert alert-secondary"> Fecha alta: {{  date('d-m-Y', strtotime($detalle->fecha_de_alta))  }}</span> 
									</div>-->
								@endif
													
							@endif							
							</section>
						</div>
					</div>
				</div>
<div class="col-lg-2">
</div>
			

			</div>
		</div>
	
		<div class="modal fade" id="mInforme" tabindex="-1" role="dialog" aria-labelledby="mInformeLabel" aria-hidden="true">
		<!--<div id="modal-report-content" class="modal-dialog modal-image" role="application" style="max-width: 420px;max-height: 720px;">-->
		            <div id="modal-report-content" class="modal-dialog modal-image" style="display:flex;flex-direction:column;justify-content:center;overflow-y: auto;min-height:calc(100vh - 60px);" role="application" style="max-width: 530px;">
			    
				        <report-content reference="{{$detalle->id}}" />
			        </div>
			
		</div>

	@if($detalle->hay_barrio == 1)
		<div class="modal fade" id="mInformeBarrio" tabindex="-1" role="dialog" aria-labelledby="mInformeBarrio" aria-hidden="true">
			<!--<div class="modal-dialog modal-dialog-centered modal-image" role="application" style="max-width: 530px;">-->
			<div class="modal-dialog modal-dialog-centered modal-image" role="application" style="max-width: 530px;flex-direction: unset;">			
				<report-lugar-en reference="{{$detalle->id}}" />
			</div>
		</div>		
	@endif
	@if ($detalle->comentario_inmueble)
		<div class="modal fade" id="mComentarioMuebles" tabindex="-1" role="dialog" aria-labelledby="mComentarioMuebles" aria-hidden="true">
			  <div class="modal-dialog modal-lg">
				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
				   
				  </div>
				  <div class="modal-body">
							{!! csrf_field() !!} 
								<div class="col-md-12">
									<div class="form-group">
										<label><b>{{$detalle->comentario_inmueble}}</b></label>						
									</div>

								</div>
								<div class="col-md-12 text-center">
									<button class="btn btn-dark" style="color:#EADD1B;" data-dismiss="modal"  type="button">
										Close
									</button>						
								</div>					
				  </div>
				</div>
			  </div>			
		</div>		
	@endif
	@if ($detalle->comentario_alquiler_aprox)
		<div class="modal fade" id="mComentarioAlquiler" tabindex="-1" role="dialog" aria-labelledby="mComentarioAlquiler" aria-hidden="true">
			  <div class="modal-dialog modal-lg">
				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
				   
				  </div>
				  <div class="modal-body">
							{!! csrf_field() !!} 
								<div class="col-md-12">
									<div class="form-group">
										<label><b>{{$detalle->comentario_alquiler_aprox}}</b></label>						
									</div>

								</div>
								<div class="col-md-12 text-center">
									<button class="btn btn-dark" style="color:#EADD1B;" data-dismiss="modal"  type="button">
										Close
									</button>						
								</div>					
				  </div>
				</div>
			  </div>			
		</div>		
	@endif	
		<div class="modal fade" id="mMascotas" tabindex="-1" role="dialog" aria-labelledby="mMascotas" aria-hidden="true">
			  <div class="modal-dialog modal-lg">
				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
				   <!-- <h4 id="modal-request-title" class="modal-title">Â¿QuÃ© documentos necesito para alquilar?</h4>-->
				  </div>
				  <div class="modal-body">
							{!! csrf_field() !!} 
								<div class="col-md-12">
									<div class="form-group">
										<label><b>In case you have a pet or intend to have one, this information must be mentioned in your user profile when requesting a visit. Many owners say NO TO PETS and then change their mind when they know the profile of the interested party. In this way, we guarantee that the property that seemed perfect to you will not escape you due to an information or communication problem.</b></label>						
									</div>

								</div>
								<div class="col-md-12 text-center">
									<button class="btn btn-dark" style="color:#EADD1B;" data-dismiss="modal"  type="button">
										Close
									</button>						
								</div>					
				  </div>
				</div>
			  </div>			
		</div>	
		<div class="modal fade" id="mContrato" tabindex="-1" role="dialog" aria-labelledby="mContrato" aria-hidden="true">
			  <div class="modal-dialog modal-lg">
				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
				   <!-- <h4 id="modal-request-title" class="modal-title">Â¿QuÃ© documentos necesito para alquilar?</h4>-->
				  </div>
				  <div class="modal-body">
							{!! csrf_field() !!} 
								<div class="col-md-12">
									<div class="form-group">
										<label><b>Sometimes, the owners are flexible regarding the minimum contract time, we recommend that you show interest in renting, if the minimum rental time that you need is close to what the owner wants.</b></label>						
										<label><b>In this way, we guarantee that the apartment you liked will not escape you due to an information or communication problem.</b></label>						
									</div>

								</div>
								<div class="col-md-12 text-center">
									<button class="btn btn-dark" style="color:#EADD1B;" data-dismiss="modal"  type="button">
										Close
									</button>						
								</div>					
				  </div>
				</div>
			  </div>			
		</div>
		<div class="modal fade" id="mContrato_maximo" tabindex="-1" role="dialog" aria-labelledby="mContrato_maximo" aria-hidden="true">
			  <div class="modal-dialog modal-lg">
				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
				   <!-- <h4 id="modal-request-title" class="modal-title">Â¿QuÃ© documentos necesito para alquilar?</h4>-->
				  </div>
				  <div class="modal-body">
							{!! csrf_field() !!} 
								<div class="col-md-12">
									<div class="form-group">
										<label><b>Maximum contract time</b></label>						
										<label><b>This is the maximum period in which the owner agrees to rent his property.</b></label>						
									</div>

								</div>
								<div class="col-md-12 text-center">
									<button class="btn btn-dark" style="color:#EADD1B;" data-dismiss="modal"  type="button">
										Close
									</button>						
								</div>					
				  </div>
				</div>
			  </div>			
		</div>			
@if($detalle->path_plano)
	<div class="modal fade" id="mPlano" tabindex="-1" role="dialog" aria-labelledby="mPlano" aria-hidden="true">
		<!--	<div class="modal-dialog modal-dialog-centered modal-image" role="application" style="max-width: 530px;flex-direction: unset;">		-->
	<!--<div class="modal fade" id="mPlano" tabindex="-1" role="dialog" aria-hidden="true">-->
	  <div class="modal-dialog modal-xs">
		
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-weight:bold;color:#EADD1B;">&times;</span>
				</button>
			</div>
			<!--<div class="modal-body" style="height: 15vh; width: 100%;">-->
			<div class=	"modal-body" role="application" style="height: 15vh; max-width: 390px;">			
				<a href="/storage/{{$detalle->path_plano}}" target="_blank">Click to see the flat plan</a>
			</div>
			<!--</object>-->
		</div>
	  </div>
	</div>
@endif	
	<div class="modal fade" id="mMapa" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-xl">
		
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-weight:bold;color:#EADD1B;">&times;</span>
				</button>
			</div>
				@if($detalle->hay_transporte>0)
					<div id="mapa" style="height: 60vh; width: 100%;"></div>
				@else
					<div id="mapa" style="height: 80vh; width: 100%;"></div>
				@endif
					@if($detalle->hay_transporte>0)
																
								
					<div class="modal-body">
					Public transport:
						<div class="col-md-12">
							<div class="form-group">
								<ul>
								@foreach ($transportes as $transporte)
									@if ($transporte->tipo_transporte == '1metro')
										<?php
											//$iteracion=str_replace(" ",".png><img width=16px height=16px src=/storage/transporte/",$transporte->lineas);
											$iteraciones = explode(" ",$transporte->lineas);
											/*if(strlen(trim($iteracion))>0){
											    $html_metro="<img width=16px height=16px src=/storage/transporte/".$iteracion.".png>";
											}else{
											    $html_metro="";
											}*/
											$html_metro="";

											if($ciudad)
											{
												$city = $ciudad."/";
											} 
											else
											{
												$city="Madrid/";
											}											
											foreach($iteraciones as $iteracion){
											    if(strlen(trim($iteracion))>0){
											    $html_metro.="<img width=16px height=16px src=/storage/transporte/".$city.$iteracion.".png>";
											    }
											}
										?>
									<li class="ml-1">
										<span class="more_info" title="Metro"><img src="/storage/transporte/{{ $transporte->tipo_transporte }}.png" alt="Foto metro"> </span>
										{{ $transporte->parada }} 
										<?php echo $html_metro;?> 
										> 
										{{ $transporte->medida }} {{ $transporte->unidad_medida }} >
										<span class="more_info" title="{{ $transporte->medio }}"><img  width="16px" height="16px"  src="/storage/transporte/{{ $transporte->medio }}.png">  </span>
									</li>									
									@elseif ($transporte->tipo_transporte == '2metroLigero')
										<?php
											/*$iteracion_ligero=str_replace(" ",".png><img width=16px height=16px src=/storage/transporte/M",$transporte->lineas);
											$html_metro_ligero="<img width=16px height=16px src=/storage/transporte/".$iteracion_ligero.".png>";*/
											$iteracion_ligero = explode(" ",$transporte->lineas);
											$html_metro_ligero="";
											foreach($iteracion_ligero as $il){
											    if(strlen(trim($il))>0){
											    $html_metro_ligero.="<img width=16px height=16px src=/storage/transporte/".$il.".png>";
											    }
											}									
										?>
										<li class="ml-1">
											<span class="more_info" title="Metro Ligero"><img src="/storage/transporte/{{ $transporte->tipo_transporte }}.png"  alt="Foto metro"> </span>
											{{ $transporte->parada }} 
											<?php echo $html_metro_ligero;?> 
											> 
											{{ $transporte->medida }} {{ $transporte->unidad_medida }} >
											<span class="more_info" title="{{ $transporte->medio }}"><img  width="16px" height="16px"  src="/storage/transporte/{{ $transporte->medio }}.png"> </span>
										</li>																		
									@elseif ($transporte->tipo_transporte == '3cercanias')
										<?php
											$html_metro_tren="<font size=3 face=arial  style=color:red>".$transporte->lineas."</font>";
										?>
										<li class="ml-1">
											<span class="more_info" title="Cercanias"><img src="/storage/transporte/{{ $transporte->tipo_transporte }}.png" alt="Foto metro"> </span>
												{{ $transporte->parada }}
												<?php echo $html_metro_tren;?> 
											> 
											{{ $transporte->medida }} {{ $transporte->unidad_medida }} >
											<span class="more_info" title="{{ $transporte->medio }}"><img  width="16px" height="16px"  src="/storage/transporte/{{ $transporte->medio }}.png"> </span>
										</li>									
									@elseif ($transporte->tipo_transporte == '4autobus')
									<?php
											$html_metro_bus="<font size=3 face=arial  style=color:blue>".$transporte->lineas."</font>";
										?>
										<li class="ml-1">
											<span class="more_info" title="Parada de autobuses"><img src="/storage/transporte/{{ $transporte->tipo_transporte }}.png" alt="Foto metro"> </span>
											<?php echo $html_metro_bus;?> 
											> 
											{{ $transporte->medida }} {{ $transporte->unidad_medida }} >
											<span class="more_info" title="{{ $transporte->medio }}"><img  width="16px" height="16px"  src="/storage/transporte/{{ $transporte->medio }}.png"> </span>
										</li>									
									@elseif ($transporte->tipo_transporte == '5bicicleta')
										<li class="ml-1">
											<span class="more_info" title="EstaciÃ³n de bicicletas"><img src="/storage/transporte/{{ $transporte->tipo_transporte }}.png"  alt="Foto metro"> </span>
											> 
											{{ $transporte->medida }} {{ $transporte->unidad_medida }} >
											<span class="more_info" title="{{ $transporte->medio }}"><img  width="16px" height="16px"  src="/storage/transporte/{{ $transporte->medio }}.png"> </span>
										</li>
									@elseif ($transporte->tipo_transporte == '6tranvia')
									<?php
											$html_metro_tranvia="<font size=3 face=arial  style=color:green>".$transporte->lineas."</font>";
										?>
										<li class="ml-1">
											<span class="more_info" title="Parada de tranvÃ­a"><img src="/storage/transporte/{{ $transporte->tipo_transporte }}.png" alt="Foto metro"> </span>
											<?php echo $html_metro_tranvia;?> 
											> 
											{{ $transporte->medida }} {{ $transporte->unidad_medida }} >
											<span class="more_info" title="{{ $transporte->medio }}"><img  width="16px" height="16px"  src="/storage/transporte/{{ $transporte->medio }}.png"> </span>
										</li>									
									@endif
								@endforeach	
								</ul>						
							</div>

						</div>				
					</div>
				@endif	
		</div>
	  </div>
</div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-xl">
		
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
		  </div>
						<div id="video_div" class="bg-black"  style="height: 450px; overflow-y: hidden;">
							<iframe src="https://www.youtube.com/embed/{{$detalle->video_primary}}?modestbranding=1&rel=0" class="video-fluid z-depth-1" width="100%" height="100%" mozallowfullscreen webkitallowfullscreen  allowfullscreen></iframe>
						</div>				
		</div>
	  </div>
      </div>

<div id="modalRequest" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="modal-request-title" class="modal-title"></h4>
      </div>
      <div class="modal-body">
          <div class="text-center">
            <h5>Procesando</h5><br>
            <div class="waiting"></div>
            <br>
          </div>
      </div>
    </div>
  </div>
</div>

<div id="modalCita" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-body">
      		<form method="post" id="citaForm" @submit.prevent="citaSubmitHandle" ref="cform"> 
      			{!! csrf_field() !!} 
      			<input type="hidden" name="reference" value="{{ $detalle->id }} " />
	            <div class="row" id="step1">
		          		<div class="col-md-12 text-center">
							<h5 id="modal-request-title" class="modal-title mb-1"><b>Step 1/2</b></h5>
		          		</div>				
						<div class="col-md-6">
							<h5 id="modal-request-title" class="modal-title mb-3"><b><u>When would you like to visit?</u></b></h5>
							<div class="form-group">
								<!--<label>Escoge la fecha</label>-->
								<input type="text" id="date" name="date" placeholder="Choose date" class="form-control" autocomplete="off" required  maxlength="10" readonly  style="background-color:white;">
							</div>
							<div class="form-group">
								<!--<label>Escoge la hora</label>-->
								<div class="input-group clockpicker">
									<input id="time" name="time" type="text"  placeholder="Choose time"  class="form-control" autocomplete="off" value="" required maxlength="5" readonly style="background-color:white;">
									<span class="input-group-addon">
										<span class="glyphicon glyphicon-time"></span>
									</span>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group" style="font-size:4px;">
							@if ($detalle->calendar || $detalle->hora_manana || $detalle->hora_comida || $detalle->hora_tarde || $detalle->hora_dia || $detalle->flexibilidad || $detalle->schedule )
							<p class="my-0 mb-3" style="font-size:14px;"><b><u>Schedules that the property prefers to show the property:</u></b></p>
					
							@if ($detalle->calendar)
								<p class="my-0 mb-2" style="font-size:12px;"><b>Visiting days:</b> <?php
																					$variable  = limpieza_url(trim($detalle->calendar));
																					$old = array("lunes", "martes","miercoles","jueves","viernes","sabado","domingo");
																					$new   = array("Monday", "Tueday","Wednesday","Thursday","Friday","Saturday","Sunday");
																					$newphrase = str_replace($old, $new, $variable);
																					echo $newphrase;
																					?></p>
							@endif
							@if ($detalle->hora_dia)
								<p class="my-0 mb-2" style="font-size:12px;">All day from{{ $detalle->hora_dia }}:{{ $detalle->minuto_dia }} until {{ $detalle->hora_dia_hasta }}:{{ $detalle->minuto_dia_hasta }} </p>
							@endif						
							@if ($detalle->hora_manana)
								<p class="my-0 mb-2" style="font-size:12px;">In the morning from {{ $detalle->hora_manana }}:{{ $detalle->minuto_manana }} until {{ $detalle->hora_manana_hasta }}:{{ $detalle->minuto_manana_hasta }} </p>
							@endif
							@if ($detalle->hora_comida)
								<p class="my-0 mb-2" style="font-size:12px;">In the afternoon from {{ $detalle->hora_comida }}:{{ $detalle->minuto_comida }} until {{ $detalle->hora_comida_hasta }}:{{ $detalle->minuto_comida_hasta }} </p>
							@endif
							@if ($detalle->hora_tarde)
								<p  class="my-0 mb-2" style="font-size:12px;">In the evening from  {{ $detalle->hora_tarde }}:{{ $detalle->minuto_tarde }} until {{ $detalle->hora_tarde_hasta }}:{{ $detalle->minuto_tarde_hasta }} </p>
							@endif
							@if ($detalle->flexibilidad)
								<p  class="my-0 mb-2" style="font-size:12px;"><b>Notice:</b> <?php
																					$variable  = limpieza_url(trim($detalle->flexibilidad));
																					$old = array("tengo-flexibilidad-para-realizar-visitas-en-otros-horarios-tambian", "no-tengo-flexibilidad-de-realizar-visitas-en-otros-horarios-lo-siento","solicitar-la-visita-con-un-manimo-de-24-horas-de-antelacian-por-favor");
																					$new   = array("I have flexibility to make visits at other times as well.", "I do not have flexibility to make visits at other times, sorry.","Request the visit at least 24 hours in advance, please.");
																					$newphrase = str_replace($old, $new, $variable);
																					echo $newphrase;
																					?></p>
							@endif						
							@if ($detalle->schedule)
								<p class="my-0 mb-2" style="font-size:12px;"><u>{{ $detalle->schedule }}</u></p>
							@endif
							@endif
							</div>
						</div>
	          		
	          		@if($detalle->is_sale == '0')
					<div class="col-md-12 text-center" v-if="user!=null && user.datos_alquiler =='1'">
		          			<button id="btnContinuar" class="btn btn-dark" style="color:#EADD1B;" type="button">
		                        Go
							</button>
		          	</div>
		          		<div class="col-md-12 text-center" v-else>
		          			<button id="btnContinuar" class="btn btn-dark" style="color:#EADD1B;" type="button">
		                        Go
							</button>
		          		</div>
		          	@else
		          		<div class="col-md-12 text-center">
		          			<button class="btn btn-dark" style="color:#EADD1B;" type="button" id="btnContinuarSale">
		                        Go
							</button>
		          		</div>
		          	@endif						
	            </div>
			   <div  style="max-height: calc(100vh - 155px);overflow-y: auto;" id="step2">
	            	<div class="col-md-12  text-center">
	            		<div class="form-group">
	            				<b>Paso 2/2</b>
	            		</div>
					</div>			   
	            	<div class="col-md-12">
	            		<div class="form-group">	            				
<p class=MsoNormal><span class=GramE><span style='font-family:"Segoe UI Emoji",sans-serif;
mso-bidi-font-family:"Segoe UI Emoji"'>&#128545;</span> </span>Why don't you like wasting time with unnecessary visits, right? Neither do the owners.<o:p></o:p></p>

<p class=MsoNormal><o:p></o:p></p>

<p class=MsoNormal><span style='font-family:"Segoe UI Emoji",sans-serif;
mso-bidi-font-family:"Segoe UI Emoji"'>&#128285;</span> The owners usually
give priority to visits when they know the profile of the interested parties. <o:p></o:p></p>

<p class=MsoNormal><o:p></o:p></p>

<p class=MsoNormal><span style='font-family:"Segoe UI Emoji",sans-serif;
mso-bidi-font-family:"Segoe UI Emoji"'>&#128640;</span> Be <span class=SpellE>you</span>
the priority, among many requests that the owner receives on a daily basis.<o:p></o:p></p>

<p class=MsoNormal>&nbsp;<o:p></o:p></p>

<p class=MsoNormal><b>We leave you some simple questions that the owner would like to know before confirming a visit.</b></p>								
	            		</div>
					</div>
					<div class="col-md-12">
						<div class="row">				
							<div class="form-group col-md-6">
								<label><b>How many tenants will you live?</b></label>
								<select id="numero_personas" name="numero_personas" class="form-control">
									<option value=""></option>
									@for ($i = 1; $i <= 20; $i++)
										<option value="{{ $i }}">{{ $i }}</option>    
									@endfor
								</select>
							</div>
							<div class="form-group  col-md-6">
								<label><b>Type of relationship between the tenants?</b></label>

								<select id="tipo_personas" name="tipo_personas" class="form-control">
									<option value=""></option>
									<option value="Solo para mi">Just me</option>
									<option value="Pareja">Couple</option>
									<option value="Familia">Family</option>
									<option value="CompaÃ±eros de trabajo">Coworkers</option>
									<option value="Estudiantes">Students</option>
									<option value="Amigos">Friends</option>
								</select>
							</div>						
						</div>
						<div class="row">
							<div class="form-group col-md-6">
								<label><b>Are the tenants working, retired or studying?</b></label>
								<select id="estudias_o_trabajas" name="estudias_o_trabajas" class="form-control">
									<option value=""></option>							
									<option value="Trabajando">Working</option>
									<option value="Estudiando">Studying</option>
									<!--<option value="Pensionista">Pensionista</option>-->
									<option value="Sin trabajar">Not working</option>
									<option value="Estudiando y trabajando">Studying and Working</option>
                                    <option value="Jubilados">Retired</option>
								</select>							
							</div>
							<div class="form-group col-md-6">
								<label><b>Do you have pets?</b></label>
								<select id="mascotas" name="mascotas" class="form-control">
									<option value=""></option>							
									<option value="No">No</option>
									<option value="Perro">Dog</option>
									<option value="Gato">Cat</option>
									<option value="2 perros">2 dogs</option>
									<option value="2 gatos">2 cats</option>
									<option value="Perro y gato">Dog and cat</option>
									<option value="+ de 2 perros o gatos">more than 2 dogs or cats</option>
								</select>							
							</div>						
						</div>
                        <div class="row" id="estudiando0">
                            <div class="form-group col-md-12">
                                <label><b>Students or not working?</b> Those who are studying or who do not work and cannot demonstrate solvency, must present a personal guarantee or more months of additional deposits as a guarantee of payment.</label>
                                <!--<label><b>Aval personal/Solidario</b>: En este caso, los propietarios desean conocer los apartados aval 1, aval 2 y aval 3.</label>-->
                                <label><b>Additional deposit</b>: Negotiate directly the amount of the months with the property.</label>
                            </div>
                        </div>


                        <div class="row" id="estudiando01">
                            <div class="form-group col-md-12">
                                <label><b>Students?</b> Those who are studying and cannot demonstrate solvency must present a personal guarantee or more months of additional deposits as a guarantee of payment.</label>
                                <!--<label><b>Aval personal/Solidario</b>: En este caso, los propietarios desean conocer los apartados aval 1, aval 2 y aval 3.</label>-->
                                <label><b>Additional deposit</b>: Negotiate directly the amount of the months with the property.</label>
                            </div>
                        </div>



                        <div class="row" id="estudiando02">
                            <div class="form-group col-md-12">
                                <label><b>Not Working?</b> Those who do not work and cannot demonstrate solvency must present a personal guarantee or more months of additional deposits as a guarantee of payment.</label>
                                <!--<label><b>Aval personal/Solidario</b>: En este caso, los propietarios desean conocer los apartados aval 1, aval 2 y aval 3.</label>-->
                                <label><b>Additional deposit</b>: Negotiate directly the amount of the months with the property.</label>
                            </div>
                        </div>					
					<div class="row" id="trabajando1">
						<div class="form-group col-md-6">
							<div id="trabajo_normal">
								<label><b>Where do you work?</b></label>
							</div>
							<div id="trabajo_estudiar">
								<label><b>Where do the <u>guarantors</u> work?</b></label>
							</div>	
							<div id="trabajo_estudiar_trabajar">
								<label><b>Where do tenants and <u>guarantors</u> work?</b></label>
							</div>						
							<!--<label>Â¿DÃ³nde trabajÃ¡is?</label>-->
							<input type="text" id="trabajo" name="trabajo" class="form-control"  maxlength="160">							
						</div>
						<div class="form-group col-md-6">
							<div id="tipo_trabajo_normal">
								<label><b>What role do you play?</b></label>
							</div>
							<div id="tipo_trabajo_estudiar">
								<label><b>Role played by the <u>guarantors</u>?</b></label>
							</div>	
							<div id="tipo_trabajo_estudiar_trabajar">
								<label><b>What is the role of tenants and <u>guarantors</u>?</b></label>
							</div>								
								<input type="text" id="tipo_trabajo" name="tipo_trabajo" class="form-control" maxlength="160">							
						</div>						
					</div>
						<div class="row" id="trabajando2">
						<div class="form-group col-md-6">
							<div id="tipo_contrato_normal">
								<label><b>Type of contract: self-employed, indefinite, temporary, work and service, intern, pensioner, others?</b></label>
							</div>
							<div id="tipo_contrato_estudiar">
								<label><b>Type of contract of the <u>guarantors</u>: self-employed, indefinite, temporary, work and service, intern, pensioner, others?</b></label>
							</div>	
							<div id="tipo_contrato_estudiar_trabajar">
								<label><b>Type of contract of the tenants and the <u>guarantors</u>: Self-employed, indefinite, temporary, work and service, intern, pensioner, others?</b></label>
							</div>						                                             
							<!--<label>Tipo de contrato: autÃ³nomo, indefinido, temporal, obra y servicio, becario, Â¿otros?</label>-->
								<input type="text" id="tipo_contrato" name="tipo_contrato" class="form-control"  maxlength="160">		
						</div>
						<div class="form-group col-md-6">
							<div id="sueldo_aproximado_normal">
								<label><b>Sueldo neto mensual aproximado entre todos los inquilinosApproximate monthly net salary among all tenants</b></label>
							</div>
							<div id="sueldo_aproximado_estudiar">
								<label><b>Approximate monthly net salary between all <u>guarantors</u></b></label>
							</div>	
							<div id="sueldo_aproximado_estudiar_trabajar">
								<label><b>Approximate monthly net salary between all tenants and <u>guarantors</u></b></label>
							</div>							
							
							<input type="text" id="sueldo_aproximado" name="sueldo_aproximado" class="form-control" maxlength="18">				
						</div>						
					</div>
				
					<div class="row">
						<div class="form-group col-md-6">
							<label><b>When would you like to enter the property?</b></label>
	          				<input type="text" id="fecha_desde" name="fecha_desde" class="form-control" autocomplete="off" maxlength="10" readonly style="background-color:white;">							
						</div>
						<div class="form-group col-md-6">
							<label><b>Minimum rental period?</b></label>
							<select id="duracion_alquiler" name="duracion_alquiler" class="form-control" >
								<option value=""></option>							
								<option value="1 mes">1 month</option>
								<option value="3 meses">3 months</option>
								<option value="6 meses">6 months</option>
								<option value="9 meses">9 months</option>
								<option value="1 aÃ±o">1 year</option>
								<option value="1 aÃ±o y medio">1 year and a half</option>
								<option value="2 aÃ±os">2 years</option>
								<option value="3 aÃ±os">3 years</option>
								<option value="4 aÃ±os">4 years</option>
								<option value="5 aÃ±os">5 years</option>
								<option value="+ de 5 aÃ±os">+ than 5 years</option>
								<option value="indefinido">undefined</option>								
							</select>							
						</div>						
					</div>
					<div class="row">
	            		<div class="form-group  col-md-12">
	            			<label><b>Tell something about yourself to the owner</b></label>
	            			<textarea id="comentario_persona" name="comentario_persona" class="form-control" rows="2" maxlength="250"></textarea>
	            		</div>
					</div>
					<div class="row">
	            		<div class="form-group  mt-4 mb-0  col-md-12" v-if="user==null">
	            			<label>ðŸ“’ <b>We need your contact to send your request to visit the owner:</b></label>
	            		</div>
					</div>	            		
					<div class="row">
	            		<div class="form-group  col-md-12" v-if="user==null">
	            			<label><b>Name and surname:</b></label>
							<input type="text" id="nombre_completo" name="nombre_completo" class="form-control" maxlength="50">	
	            		</div>
					</div>
					<div class="row">
	            		<div class="form-group  col-md-6" v-if="user==null">
	            			<label><b>Contact email:</b></label>
							<input type="email" id="email_contacto" name="email_contacto" class="form-control" maxlength="100">	
	            		</div>
	            		<div class="form-group  col-md-6" v-if="user==null">
	            			<label><b>Mobile contact:</b></label>
							<input type="text" id="movil_contacto" name="movil_contacto" class="form-control" maxlength="15">	
	            		</div>						
					</div>	
							<div class="row">					
								<div class="form-group  col-md-12" v-if="user==null">			
										<div class="form-group  col-md-12">	
											<input type="checkbox" id="acepta_condiciones" name="acepta_condiciones" >	
											 By requesting a visit you are accepting the <a href="/terminosC-condiciones">terms and conditions</a> and <a href="/politica-privacidad">privacy policies</a> of <b>IAMOVING</b>
										</div>					
								</div>
							</div>											    
	            	</div>
					<div class="row" id="step3">
						<div class="col-md-12">
							<div class="form-group">
									<b>Step 3. We leave you with some simple questions that the property would like to know before confirming an in-person visit. The owners always give priority to the more information they have about the interested parties.</b>
							</div>
						</div>
					</div>
	            		<div class="col-md-12 text-center">
	            			<button id="btnAtras" class="btn btn-dark" style="color:#EADD1B;" type="button">
		                        Back
							</button>
		          			<!--<button id="btn_Continuar2" class="btn btn-dark" style="color:#EADD1B;" type="button">-->
							<button id="solicitar_visita" class="btn btn-dark" style="color:#EADD1B;" type="submit">
		                        Request Visit
							</button>
		          		</div>
		          		
		        </div>	
 @if($detalle->is_sale != 0)				
		        <div class="row" style="max-height: calc(100vh - 155px);overflow-y: auto;" id="step4">
	            	<div class="col-md-12  text-center">
	            		<div class="form-group">
	            				<b>Step 2/2</b>
	            		</div>
					</div>		            	
					<div class="col-md-12">
	            		<div class="form-group">
	            				<!--<b>Te dejamos algunas sencillas preguntas que la propiedad le gustarÃ­a saber antes de confirmar una visita en persona.</b>-->
				<p class=MsoNormal><span class=GramE><span style='font-family:"Segoe UI Emoji",sans-serif;
				mso-bidi-font-family:"Segoe UI Emoji"'>&#128545;</span></span> Why don't you like to waste time with unnecessary visits, don't you? Nor to the owners<o:p></o:p></p>

				<p class=MsoNormal><o:p></o:p></p>

				<p class=MsoNormal><span style='font-family:"Segoe UI Emoji",sans-serif;
				mso-bidi-font-family:"Segoe UI Emoji"'>&#128285;</span> The owners usually
give priority to visits when they know the profile of the interested parties. <o:p></o:p></p>

				<p class=MsoNormal><o:p></o:p></p>

				<p class=MsoNormal><span style='font-family:"Segoe UI Emoji",sans-serif;
				mso-bidi-font-family:"Segoe UI Emoji"'>&#128640;</span> Be <span class=SpellE>you</span>
				the priority, among many requests that the owner receives on a daily basis.<o:p></o:p></p>

				<p class=MsoNormal>&nbsp;<o:p></o:p></p>

				<p class=MsoNormal><b>We leave you some simple questions that the owner would like to know before confirming a visit.</b></p>									
				
	            		</div>
					</div>			
		        	<div class="form-group col-md-12">
		        		<label><b>1. Do you live in Spain?</b></label>
		        		<input type="text" id="live_spain" name="live_spain" class="form-control" maxlength="100" required />
		        	</div>
		        	<div class="form-group col-md-12">
		        		<label><b>2. Is the buyer a person or a company?</b></label>
<!--	        		<input type="text" id="inversor" name="inversor" class="form-control" maxlength="100" required />-->
    							<select id="inversor" name="inversor" class="form-control"  required>
    								<option value=""></option>							
    								<option value="Persona fÃ­sica">Person</option>
    								<option value="Sociedad">Company</option>
    							</select>
		        	</div>
		        	<div class="form-group col-md-12">
		        		<label><b>3. What would be the payment method?</b></label>
       		        		
    							<select id="credito" name="credito" class="form-control"  required>
    								<option value=""></option>							
    								<option value="Dispongo del dinero en efectivo">Cash</option>
    								<option value="Tengo que pedir un crÃ©dito hipotecario">I have to request a mortgage loan</option>
    								<option value="Tengo un crÃ©dito hipotecario aprobado sobre este valor">I have an approved mortgage credit on this value</option>							
    							</select>	
		        	</div>
	            		<div class="form-group  col-md-12">
	            			<label><b>4. Tell something about yourself to the owner</b></label>
	            			<textarea id="sobreti_venta" name="sobreti_venta" class="form-control" rows="2" maxlength="250"></textarea>
	            		</div>
								<div class="form-group  mt-4 mb-0  col-md-12" v-if="user==null">
									<label>ðŸ“’ <b>We need your contact to send your request to visit the owner:</b></label>
								</div>
								<div class="form-group  col-md-12" v-if="user==null">
									<label><b>Name and surname:</b></label>
									<input type="text" id="nombre_completo_venta" name="nombre_completo_venta" class="form-control" maxlength="50">	
								</div>

								<div class="form-group  col-md-6" v-if="user==null">
									<label><b>Contact email:</b></label>
									<input type="email" id="email_contacto_venta" name="email_contacto_venta" class="form-control" maxlength="100">	
								</div>
								<div class="form-group  col-md-6" v-if="user==null">
									<label><b>Contact mobile:</b></label>
									<input type="text" id="movil_contacto_venta" name="movil_contacto_venta" class="form-control" maxlength="15">	
								</div>	
									<div class="form-group  col-md-12"  v-if="user==null">
										<input type="checkbox" id="acepta_condiciones_venta" name="acepta_condiciones_venta" > By requesting a visit you are accepting the <a href="/terminosC-condiciones">terms and conditions</a> and <a href="/politica-privacidad">privacy policies</a> of <b>IAMOVING</b>
									</div>									
												
		        	<div class="col-md-12 text-center">
            			<button id="btnAtrasSale" class="btn btn-dark" style="color:#EADD1B;" type="button">
	                        Back
						</button>
						<button class="btn btn-dark" style="color:#EADD1B;" type="submit">
	                        Request Visit
						</button>
	          		</div>
		        </div>
@endif	            
       
	        </form> 
      </div>
    </div>
  </div>
</div>

<div id="modalPedido" class="modal fade" role="dialog">
 	<div class="modal-dialog modal-lg">
		<!-- Modal content-->
    <div class="modal-content">

      	<div class="modal-body">
      		<form method="post" id="citaFormPedido" @submit.prevent="pedidoSubmitHandle" ref="cform_pedido"> 
      			{!! csrf_field() !!} 
      			<input type="hidden" name="reference"  value="{{ $detalle->id }} " />
      			<input type="hidden" name="tipo_visita" value="pedido" />
      	<!--<div class="row" >-->
      			    
      			    @if($detalle->is_sale == 0)
      			 <div id="pstep1" style="max-height: calc(100vh - 155px);overflow-y: auto;">
      			    
    	            	<div class="col-md-12">
    	            		<div class="form-group">
    	            				Here are some simple questions that the property wants to know before accepting an offer. The owners always give priority to the more information they have about the interested parties.<b>Te dejamos algunas sencillas preguntas que la propiedad desea saber antes de aceptar una oferta. Los propietarios siempre dan prioridad cuanta mÃ¡s informaciÃ³n tienen de los interesados.</b>
    	            		</div>
    					</div>
    					<div class="col-md-12">
    						<div class="row">				
    							<div class="form-group col-md-6">
    								<label><b>How many tenants are you going to live in?</b></label>
    								<select id="p_numero_personas" name="numero_personas" class="form-control" required oninvalid="this.setCustomValidity('Choose a list element')">
    									<option value=""></option>
    									@for ($i = 1; $i <= 20; $i++)
    										<option value="{{ $i }}">{{ $i }}</option>    
    									@endfor
    								</select>
    							</div>
    							<div class="form-group  col-md-6">
    								<label><b>Type of relationship between the tenants?</b></label>
    
    								<select id="p_tipo_personas" name="tipo_personas" class="form-control"  required>
    									<option value=""></option>
    									<option value="Solo para mi">Just me</option>
    									<option value="Pareja">Couple</option>
    									<option value="Familia">Family</option>
    									<option value="CompaÃ±eros de trabajo">Coworkers</option>
    									<option value="Estudiantes">Students</option>
    									<option value="Amigos">Friends</option>
    								</select>
    							</div>						
    						</div>
    						<div class="row">
    							<div class="form-group col-md-6">
    								<label><b>Are the tenants working, retired or studying?</b></label>
    								<select id="p_estudias_o_trabajas" name="p_estudias_o_trabajas" class="form-control"  required>
    									<option value=""></option>							
    									<option value="Trabajando">Working</option>
    									<option value="Estudiando">Studying</option>
    									<!--<option value="Pensionista">Pensionista</option>-->
    									<option value="Sin trabajar">Not Working</option>
    									<option value="Estudiando y trabajando">Studying and working</option>
                                        <option value="Jubilados">Retired</option>
    								</select>							
    							</div>
    							<div class="form-group col-md-6">
    								<label><b>Pets?</b></label>
    								<select id="p_mascotas" name="mascotas" class="form-control"  required>
    									<option value=""></option>							
    									<option value="No">No</option>
    									<option value="Perro">Dog</option>
    									<option value="Gato">Cat</option>
    									<option value="2 perros">2 dogs</option>
    									<option value="2 gatos">2 Cat</option>
    									<option value="Perro y gato">Dog y cat</option>
    									<option value="+ de 2 perros o gatos">+ than 2 dogs o cats</option>
    								</select>							
    							</div>						
    						</div>
                        <div class="row" id="p_estudiando0">
                            <div class="form-group col-md-12">
                                <label><b>Students or not working?</b> Those who are studying or who do not work and cannot demonstrate solvency, must present a personal guarantee or more months of additional deposits as a guarantee of payment.</label>
                                <!--<label><b>Aval personal/Solidario</b>: En este caso, los propietarios desean conocer los apartados aval 1, aval 2 y aval 3.</label>-->
                                <label><b>Additional deposit</b>: Negotiate directly the amount of the months with the property.</label>
                            </div>
                        </div>


                        <div class="row" id="p_estudiando01">
                            <div class="form-group col-md-12">
                                <label><b>Students?</b> Those who are studying and cannot demonstrate solvency must present a personal guarantee or more months of additional deposits as a guarantee of payment.</label>
                                <!--<label><b>Aval personal/Solidario</b>: En este caso, los propietarios desean conocer los apartados aval 1, aval 2 y aval 3.</label>-->
                                <label><b>Additional deposit</b>: Negotiate directly the amount of the months with the property.</label>
                            </div>
                        </div>



                        <div class="row" id="p_estudiando02">
                            <div class="form-group col-md-12">
                                <label><b>Not working?</b> Those who do not work and cannot demonstrate solvency must present a personal guarantee or more months of additional deposits as a guarantee of payment..</label>
                                <!--<label><b>Aval personal/Solidario</b>: En este caso, los propietarios desean conocer los apartados aval 1, aval 2 y aval 3.</label>-->
                                <label><b>Additional deposit</b>: Negotiate directly the amount of the months with the property.</label>
                            </div>
                        </div>
    					<div class="row" id="p_trabajando1">
    						<div class="form-group col-md-6">
    							<div id="p_trabajo_normal">
    								<label><b>Where do you work?</b></label>
    							</div>
    							<div id="p_trabajo_estudiar">
    								<label><b>Where do the<u>guarantors</u> work?</b></label>
    							</div>	
    							<div id="p_trabajo_estudiar_trabajar">
    								<label><b>Where do the tenants and the <u>guarantors</u> work?</b></label>
    							</div>						
    							<!--<label>Â¿DÃ³nde trabajÃ¡is?</label>-->
    							<input type="text" id="p_trabajo" name="trabajo" class="form-control"  maxlength="160"  required>							
    						</div>
    						<div class="form-group col-md-6">
    							<div id="p_tipo_trabajo_normal">
    								<label><b>What role do you play?</b></label>
    							</div>
    							<div id="p_tipo_trabajo_estudiar">
    								<label><b>What role do the <u>guarantors</u> work?</b></label>
    							</div>	
    							<div id="p_tipo_trabajo_estudiar_trabajar">
    								<label><b>What role do the tenants and the <u>guarantors</u> work?</b></label>
    							</div>								
    								<input type="text" id="p_tipo_trabajo" name="tipo_trabajo" class="form-control" maxlength="160" required>							
    						</div>						
    					</div>
    						<div class="row" id="p_trabajando2">
    						<div class="form-group col-md-6">
    							<div id="p_tipo_contrato_normal">
    								<label><b>Type of contract: self-employed, indefinite, temporary, work and service, intern, pensioner, others?</b></label>
    							</div>
    							<div id="p_tipo_contrato_estudiar">
    								<label><b>Type of contract of the <u>guarantors</u>: self-employed, indefinite, temporary, work and service, intern, pensioner, others?</b></label>
    							</div>	
    							<div id="p_tipo_contrato_estudiar_trabajar">
    								<label><b>Type of contract of thetenants and the <u>guarantors</u>: self-employed, indefinite, temporary, work and service, intern, pensioner, others?</b></label>
    							</div>						
    							<!--<label>Tipo de contrato: autÃ³nomo, indefinido, temporal, obra y servicio, becario, Â¿otros?</label>-->
    								<input type="text" id="p_tipo_contrato" name="tipo_contrato" class="form-control"  maxlength="160" required>		
    						</div>
    						<div class="form-group col-md-6">
    							<div id="p_sueldo_aproximado_normal">
    								<label><b>Approximate monthly net salary among all tenants</b></label>
    							</div>
    							<div id="p_sueldo_aproximado_estudiar">
    								<label><b>Approximate monthly net salary among all <u>guarantors</u></b></label>
    							</div>	
    							<div id="p_sueldo_aproximado_estudiar_trabajar">
    								<label><b>Approximate monthly net salary between all tenants and <u>guarantors</u></b></label>
    							</div>							
    							<!--<label>Sueldo neto mensual aproximado entre todos los inquilinos</label>-->
    							<input type="text" id="p_sueldo_aproximado" name="sueldo_aproximado" class="form-control" maxlength="11" required>				
    						</div>						
    					</div>
    					
    					<div class="row">
    						<div class="form-group col-md-6">
    							<label><b>When would you like to enter the property?</b></label>
    	          				<input type="text" id="p_fecha_desde" name="fecha_desde" readonly class="form-control" autocomplete="off" required  maxlength="10" readonly  style="background-color:white;" >							
    						</div>
    						<div class="form-group col-md-6">
    							<label><b>Minimum rental period?</b></label>
    							<select id="p_duracion_alquiler" name="duracion_alquiler" class="form-control"  required>
    								<option value=""></option>							
    								<option value="1 mes">1 month</option>
    								<option value="3 meses">3 months</option>
    								<option value="6 meses">6 months</option>
    								<option value="9 meses">9 months</option>
    								<option value="1 aÃ±o">1 year</option>
    								<option value="1 aÃ±o y medio">1 year and a half</option>
    								<option value="2 aÃ±os">2 years</option>
    								<option value="3 aÃ±os">3 years</option>
    								<option value="4 aÃ±os">4 years</option>
    								<option value="5 aÃ±os">5 years</option>
    								<option value="+ de 5 aÃ±os">+ than 5 years</option>
    								<option value="indefinido">undefined</option>								
    							</select>							
    						</div>						
    					</div>
    					<div class="row" id="p_div_contraoferta">
    						<div class="form-group col-md-12">
    							<label><b>Important Notice:</b> Many owners prioritize applicants who do not make a counter offer.</label>
    							<!--<label><b>Aval personal/Solidario</b>: En este caso, los propietarios desean conocer los apartados aval 1, aval 2 y aval 3.</label>-->
    							<!--<label><b>Deposito adicional</b>: Negociar directamente la cantidad de los meses con la propiedad.</label>-->
    						</div>
    					</div>
    					<div class="row">
    	            		<div class="form-group  col-md-12">
    	            			<label><b>Make your counter offer?</b></label>
    	            			<input type="text" id="p_contraoferta" name="contraoferta" class="form-control" maxlength="20" required>				
    	            		</div>
    					</div>						
    					<div class="row">
    	            		<div class="form-group  col-md-12">
    	            			<label><b>Tell something about yourself to the owner</b></label>
    	            			<textarea id="p_comentario_persona" name="comentario_persona" class="form-control" maxlength="250" rows="2"></textarea>
    	            		</div>
    					</div>
							<div class="row">
								<div class="form-group  mt-4 mb-0  col-md-12" v-if="user==null">
									<label>ðŸ“’ <b>We need your contact to send your counter offer to the owner:</b></label>
								</div>
							</div>	            		
							<div class="row">
								<div class="form-group  col-md-12" v-if="user==null">
									<label><b>Name and surname:</b></label>
									<input type="text" id="p_nombre_completo" name="nombre_completo" class="form-control" maxlength="50">	
								</div>
							</div>
							<div class="row">
								<div class="form-group  col-md-6" v-if="user==null">
									<label><b>Contact email</b></label>
									<input type="email" id="p_email_contacto" name="email_contacto" class="form-control" maxlength="100">	
								</div>
								<div class="form-group  col-md-6" v-if="user==null">
									<label><b>Contact mobile:</b></label>
									<input type="text" id="p_movil_contacto" name="movil_contacto" class="form-control" maxlength="15">	
								</div>						
							</div>	
							<div class="row">
								<div class="form-group  col-md-12" v-if="user==null">
										<input type="checkbox" id="p_acepta_condiciones" name="acepta_condiciones" >	
										 By making a counter offer you are accepting the <a href="/terminosC-condiciones">terms and conditions</a> and <a href="/politica-privacidad">privacy policies</a> of <b>IAMOVING</b>
								</div>					
							</div>																
    				</div>
    				
	            	<div class="col-md-12 text-center">	
									<button id="btnAtras6" class="btn btn-dark" style="color:#EADD1B;" data-dismiss="modal" aria-label="Close">
										Back
									</button>					
    	            	<button id="p_solicitar_visita" class="btn btn-dark" style="color:#EADD1B;" type="submit">
    		                Make a counter offer
    					</button>
    				</div>
	            </div>
	            @else
				 @if($detalle->is_sale != 0)
	            <div class="row" style="max-height: calc(100vh - 155px);overflow-y: auto;" id="pstep2">
						<div class="col-md-12">
							<div class="form-group">
									<b>Here are some simple questions that the property wants to know before accepting an offer.</b>
							</div>
						</div>			    			
    					<div class="col-md-12">
    						<div class="row">				
    							<div class="form-group col-md-12">
									<label><b>1. Do you live in Spain?</b></label>
									<input type="text" id="plive_spain" name="live_spain" class="form-control" maxlength="100" required />
								</div>
							</div>
						</div>
    					<div class="col-md-12">
    						<div class="row">				
    							<div class="form-group col-md-12">
        		        		<label><b>2. Is the buyer a person or a company?</b></label>
        		        		<!--<input type="text" id="pinversor" name="inversor" class="form-control" maxlength="100" required />-->
    							<select id="pinversor" name="inversor" class="form-control"  required>
    								<option value=""></option>							
    								<option value="Persona fÃ­sica">Person</option>
    								<option value="Sociedad">Company</option>
    							</select>								
								</div>
							</div>
						</div>
    					<div class="col-md-12">
    						<div class="row">				
    							<div class="form-group col-md-12">
        		        		<label><b>3. What would be the payment method?</b></label>
        		        		
    							<select id="pcredito" name="credito" class="form-control"  required>
    								<option value=""></option>							
    								<option value="Dispongo del dinero en efectivo">Cash</option>
    								<option value="Tengo que pedir un crÃ©dito hipotecario">I have to request a mortgage loan</option>
    								<option value="Tengo un crÃ©dito hipotecario aprobado sobre este valor">I have an approved mortgage credit on this value</option>														
    							</select>								
								</div>
							</div>
						</div>
    					<div class="col-md-12">
    						<div class="row">				
    							<div class="form-group col-md-12">
    							<label><b>Important Notice:</b> Many landlords prioritize applicants who do not make a counter offer.</label>
    							<!--<label><b>Aval personal/Solidario</b>: En este caso, los propietarios desean conocer los apartados aval 1, aval 2 y aval 3.</label>-->
    							<!--<label><b>Deposito adicional</b>: Negociar directamente la cantidad de los meses con la propiedad.</label>-->
								</div>
							</div>
						</div>
    					<div class="col-md-12">
    						<div class="row">				
    							<div class="form-group col-md-12">
    	            			<label><b>4. Make a counter offer?</b></label>
    	            			<input type="text" id="p_contraoferta_venta" name="contraoferta_venta" class="form-control" maxlength="20" required>				
								</div>
							</div>
						</div>							
    					<div class="col-md-12">
    						<div class="row">						
								<div class="form-group  col-md-12">
									<label><b>5. Tell something about yourself to the owner/b></label>
									<textarea id="psobreti_venta" name="sobreti_venta" class="form-control" rows="2" maxlength="250"></textarea>
								</div>	
							</div>
						</div>	

								<div class="form-group mb-0  col-md-12" v-if="user==null">
									<div class="row">						
										<div class="form-group  mt-4 mb-0  col-md-12">								
											<label>ðŸ“’ <b>We need your contact to send your counter offer to the owner:</b></label>
										</div>
									</div>
								</div>
								<div class="form-group mb-0  col-md-12" v-if="user==null">
									<div class="row">						
										<div class="form-group  col-md-12">	
									<label><b>Name and surname:</b></label>
									<input type="text" id="p_nombre_completo_venta" name="nombre_completo_venta" class="form-control" maxlength="50">	
										</div>
									</div>
								</div>
								<div class="form-group  col-md-12" v-if="user==null">
									<div class="row">						
										<div class="form-group  col-md-6">	
											<label><b>Contact email:</b></label>
											<input type="email" id="p_email_contacto_venta" name="email_contacto_venta" class="form-control" maxlength="100">	
										</div>
										<div class="form-group  col-md-6" v-if="user==null">
											<label><b>Contact email:</b></label>
											<input type="text" id="p_movil_contacto_venta" name="movil_contacto_venta" class="form-control" maxlength="15">	
										</div>						
									</div>
								</div>
								<div class="form-group  col-md-12" v-if="user==null">
									<div class="row">						
										<div class="form-group  col-md-12">	
										<label>
										<input type="checkbox" id="p_acepta_condiciones_venta" name="acepta_condiciones_venta"> By making a counter offer you are accepting the <a href="/terminosC-condiciones">terms and conditions</a> and <a href="/politica-privacidad">privacy policies</a> of <b>IAMOVING</b>
										</label>
										</div>					
									</div>
								</div>																	
    					<div class="col-md-12 text-center">
    						<div class="row">						
								<div class="form-group  col-md-12 text-center">	
									<button id="btnAtras4" class="btn btn-dark" style="color:#EADD1B;" data-dismiss="modal" aria-label="Close">
										Back
									</button>
									<button id="btnAtrasSale" class="btn btn-dark" style="color:#EADD1B;" type="submit">
										Make a counter offer
									</button>
								</div>	
							</div>
						</div>
        	     </div>
				 @endif
        	   @endif
      		</form>
      	</div>
    </div>
	</div>
</div>



<div id="modalVerificado" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="modal-request-title" class="modal-title">Verified Flat</h4>
      </div>
      <div class="modal-body">
      			{!! csrf_field() !!} 
	          		<div class="col-md-12">
	          			<div class="form-group">
							<label>Our team personally checks and investigates all floors. We make video, photos from all angles and make a detailed report. Thus, we avoid any type of deception and fraudulent advertisement.</label>
							
	          			</div>

	          		</div>
	          		<div class="col-md-12">
	          			<div class="form-group">
							<h4 id="modal-request-title" class="modal-title">Iamoving va mÃ¡s lejos</h4>
							<label>We want to offer you the best possible experience, because we know that when buying a house, the area in which it is located is very important. For this reason, we also offer a virtual tour of the neighborhood in which the flat is located, further reducing the damn frustrated visits.</label>
	          			</div>

	          		</div>					
		          		<div class="col-md-12 text-center">
		          			<button class="btn btn-dark" style="color:#EADD1B;" data-dismiss="modal"  type="button">
		                        Close
							</button>						
		          		</div>					
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
  <!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIuGcAg8Xpx1-AAe9nF-kZ9sFa3kIPMvs" async defer></script>-->
  <!--AIzaSyC6c9CV5eg2Tc1nfcKacjp7AVySHeHBjdU-->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6c9CV5eg2Tc1nfcKacjp7AVySHeHBjdU" async defer></script>
	<script>
//        $('#collapse-transporte').on('hidden.bs.collapse', function () {
//            $('#video_player').stopVideo();
//        })
//        $('#collapse-transporte').on('shown.bs.collapse', function () {
//            $('#video_player').startVideo();
//        })
	$(document).ready(function(){
		var id=@json($id); 
		var is_sale = @json($detalle->is_sale);
		var latitud = @json($detalle->latitud);
		var longitud = @json($detalle->longitud);
		var available_days = @json($detalle->calendar);
		if(available_days){
			available_days = available_days.split(",");
		}
		
		$('#mInforme').on('shown.bs.modal', function (e) {
            console.log("mInforme");
        });
		
		/*if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
            $("#modal-report-content").addClass('modal-dialog modal-image');
        }else{
            $("#modal-report-content").addClass('modal-dialog modal-dialog-centered modal-image');
        }*/
		
		/*let total_collapse_data = $(".collapse-item").length;
		
		let viewd_data = {
		    informe_foto: false,
		    informe_barrio: false,
		    informe_mapa: false,
		    collapse_data: []
		};
		
		
		$("a#informe_fotos").click(function(){
		   $(this).removeClass('btn-warning');
		   $(this).addClass('btn-success');
		   viewd_data['informe_foto'] = true;
		   //console.log(viewd_data['collapse_data'].length);
		   //console.log(viewd_data);
		});
		
		$("a#informe_barrio").click(function(){
		   $(this).removeClass('btn-warning');
		   $(this).addClass('btn-success');
		   viewd_data['informe_barrio'] = true;
		});
		
		$("a#informe_mapa").click(function(){
		   $(this).removeClass('btn-warning');
		   $(this).addClass('btn-success');
		   viewd_data['informe_mapa'] = true;
		});
		
		$("a.btn-collapse").click(function(){
		   let collapse = $(this).attr('href');
		   console.log(collapse);
		   if(!viewd_data['collapse_data'].includes(collapse)){
		       viewd_data['collapse_data'].push(collapse);
		   }
		});*/
	/*$("a.btn-collapse").hover(function(){
    if 
	$(this).css("color", "#FFD700");
    });*/

if (document.getElementById('id_fotos')){
	document.getElementById('id_fotos').addEventListener("click", bloquea1, false); 
}

if (document.getElementById('id_barrio')){
	document.getElementById('id_barrio').addEventListener("click", bloquea2, false); 
}

if (document.getElementById('id_mapa')){
	document.getElementById('id_mapa').addEventListener("click", bloquea3, false); 
}

if (document.getElementById('id_plano')){
	document.getElementById('id_plano').addEventListener("click", bloquea4, false); 
}

if (document.getElementById('id_disponible')){
	document.getElementById('id_disponible').addEventListener("click", bloquea5, false); 
}

if (document.getElementById('id_minimo')){
	document.getElementById('id_minimo').addEventListener("click", bloquea6, false); 
}

if (document.getElementById('id_maximo')){
	document.getElementById('id_maximo').addEventListener("click", bloquea7, false); 
}


if (document.getElementById('id_estado')){
	document.getElementById('id_estado').addEventListener("click", bloquea8, false); 
}


if (document.getElementById('id_amuhab')){
	document.getElementById('id_amuhab').addEventListener("click", bloquea9, false); 
}

if (document.getElementById('id_amueblado')){
	document.getElementById('id_amueblado').addEventListener("click", bloquea10, false); 
}

if (document.getElementById('id_amueblaventa')){
	document.getElementById('id_amueblaventa').addEventListener("click", bloquea11, false); 
}

if (document.getElementById('id_transporte')){
	document.getElementById('id_transporte').addEventListener("click", bloquea12, false); 
}

if (document.getElementById('id_importante')){
	document.getElementById('id_importante').addEventListener("click", bloquea13, false); 
}

if (document.getElementById('id_garaje')){
	document.getElementById('id_garaje').addEventListener("click", bloquea14, false); 
}

if (document.getElementById('id_incluido')){
	document.getElementById('id_incluido').addEventListener("click", bloquea15, false); 
}

if (document.getElementById('id_precio')){
	document.getElementById('id_precio').addEventListener("click", bloquea16, false); 
}

if (document.getElementById('id_edificio')){
	document.getElementById('id_edificio').addEventListener("click", bloquea17, false); 
}

if (document.getElementById('id_nota')){
	document.getElementById('id_nota').addEventListener("click", bloquea18, false); 
}

if (document.getElementById('id_alquiler')){
	document.getElementById('id_alquiler').addEventListener("click", bloquea19, false); 
}

if (document.getElementById('id_info')){
	document.getElementById('id_info').addEventListener("click", bloquea20, false); 
}

if (document.getElementById('id_pago')){
	document.getElementById('id_pago').addEventListener("click", bloquea21, false); 
}

if (document.getElementById('id_requisitos')){
	document.getElementById('id_requisitos').addEventListener("click", bloquea22, false); 
}

function bloquea22(){

	if(document.getElementById('id_fotos')){
		if(document.getElementById('id_fotos').disabled == false){
			document.getElementById('id_fotos').disabled = true;
			setTimeout(function(){
			document.getElementById('id_fotos').disabled = false;}, 1750)
		}
	}


	if(document.getElementById('id_barrio')){
		if(document.getElementById('id_barrio').disabled == false){
			document.getElementById('id_barrio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_barrio').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_mapa')){
		if(document.getElementById('id_mapa').disabled == false){
			document.getElementById('id_mapa').disabled = true;
			setTimeout(function(){
			document.getElementById('id_mapa').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_plano')){
		if(document.getElementById('id_plano').disabled == false){
			document.getElementById('id_plano').disabled = true;
			setTimeout(function(){
			document.getElementById('id_plano').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_disponible')){
		if(document.getElementById('id_disponible').disabled == false){
			document.getElementById('id_disponible').disabled = true;
			setTimeout(function(){
			document.getElementById('id_disponible').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_minimo')){
		if(document.getElementById('id_minimo').disabled == false){
			document.getElementById('id_minimo').disabled = true;
			setTimeout(function(){
			document.getElementById('id_minimo').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_maximo')){
		if(document.getElementById('id_maximo').disabled == false){
			document.getElementById('id_maximo').disabled = true;
			setTimeout(function(){
			document.getElementById('id_maximo').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_estado')){
		if(document.getElementById('id_estado').disabled == false){
			document.getElementById('id_estado').disabled = true;
			setTimeout(function(){
			document.getElementById('id_estado').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_amuhab')){
		if(document.getElementById('id_amuhab').disabled == false){
			document.getElementById('id_amuhab').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amuhab').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_amueblado')){
		if(document.getElementById('id_amueblado').disabled == false){
			document.getElementById('id_amueblado').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amueblado').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_amueblaventa')){
		if(document.getElementById('id_amueblaventa').disabled == false){
			document.getElementById('id_amueblaventa').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amueblaventa').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_transporte')){
		if(document.getElementById('id_transporte').disabled == false){
			document.getElementById('id_transporte').disabled = true;
			setTimeout(function(){
			document.getElementById('id_transporte').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_importante')){
		if(document.getElementById('id_importante').disabled == false){
			document.getElementById('id_importante').disabled = true;
			setTimeout(function(){
			document.getElementById('id_importante').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_garaje')){
		if(document.getElementById('id_garaje').disabled == false){
			document.getElementById('id_garaje').disabled = true;
			setTimeout(function(){
			document.getElementById('id_garaje').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_incluido')){
		if(document.getElementById('id_incluido').disabled == false){
			document.getElementById('id_incluido').disabled = true;
			setTimeout(function(){
			document.getElementById('id_incluido').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_precio')){
		if(document.getElementById('id_precio').disabled == false){
			document.getElementById('id_precio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_precio').disabled = false;}, 1750)
		}
	}



	if(document.getElementById('id_edificio')){
		if(document.getElementById('id_edificio').disabled == false){
			document.getElementById('id_edificio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_edificio').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_nota')){
		if(document.getElementById('id_nota').disabled == false){
			document.getElementById('id_nota').disabled = true;
			setTimeout(function(){
			document.getElementById('id_nota').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_alquiler')){
		if(document.getElementById('id_alquiler').disabled == false){
			document.getElementById('id_alquiler').disabled = true;
			setTimeout(function(){
			document.getElementById('id_alquiler').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_info')){
		if(document.getElementById('id_info').disabled == false){
			document.getElementById('id_info').disabled = true;
			setTimeout(function(){
			document.getElementById('id_info').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_pago')){
		if(document.getElementById('id_pago').disabled == false){
			document.getElementById('id_pago').disabled = true;
			setTimeout(function(){
			document.getElementById('id_pago').disabled = false;}, 1750)
		}
	}

	/*if(document.getElementById('id_requisitos')){
		if(document.getElementById('id_requisitos').disabled == false){
			document.getElementById('id_requisitos').disabled = true;
			setTimeout(function(){
			document.getElementById('id_requisitos').disabled = false;}, 1750)
		}
	}*/
	
}	


function bloquea21(){

	if(document.getElementById('id_fotos')){
		if(document.getElementById('id_fotos').disabled == false){
			document.getElementById('id_fotos').disabled = true;
			setTimeout(function(){
			document.getElementById('id_fotos').disabled = false;}, 1750)
		}
	}


	if(document.getElementById('id_barrio')){
		if(document.getElementById('id_barrio').disabled == false){
			document.getElementById('id_barrio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_barrio').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_mapa')){
		if(document.getElementById('id_mapa').disabled == false){
			document.getElementById('id_mapa').disabled = true;
			setTimeout(function(){
			document.getElementById('id_mapa').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_plano')){
		if(document.getElementById('id_plano').disabled == false){
			document.getElementById('id_plano').disabled = true;
			setTimeout(function(){
			document.getElementById('id_plano').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_disponible')){
		if(document.getElementById('id_disponible').disabled == false){
			document.getElementById('id_disponible').disabled = true;
			setTimeout(function(){
			document.getElementById('id_disponible').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_minimo')){
		if(document.getElementById('id_minimo').disabled == false){
			document.getElementById('id_minimo').disabled = true;
			setTimeout(function(){
			document.getElementById('id_minimo').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_maximo')){
		if(document.getElementById('id_maximo').disabled == false){
			document.getElementById('id_maximo').disabled = true;
			setTimeout(function(){
			document.getElementById('id_maximo').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_estado')){
		if(document.getElementById('id_estado').disabled == false){
			document.getElementById('id_estado').disabled = true;
			setTimeout(function(){
			document.getElementById('id_estado').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_amuhab')){
		if(document.getElementById('id_amuhab').disabled == false){
			document.getElementById('id_amuhab').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amuhab').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_amueblado')){
		if(document.getElementById('id_amueblado').disabled == false){
			document.getElementById('id_amueblado').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amueblado').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_amueblaventa')){
		if(document.getElementById('id_amueblaventa').disabled == false){
			document.getElementById('id_amueblaventa').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amueblaventa').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_transporte')){
		if(document.getElementById('id_transporte').disabled == false){
			document.getElementById('id_transporte').disabled = true;
			setTimeout(function(){
			document.getElementById('id_transporte').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_importante')){
		if(document.getElementById('id_importante').disabled == false){
			document.getElementById('id_importante').disabled = true;
			setTimeout(function(){
			document.getElementById('id_importante').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_garaje')){
		if(document.getElementById('id_garaje').disabled == false){
			document.getElementById('id_garaje').disabled = true;
			setTimeout(function(){
			document.getElementById('id_garaje').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_incluido')){
		if(document.getElementById('id_incluido').disabled == false){
			document.getElementById('id_incluido').disabled = true;
			setTimeout(function(){
			document.getElementById('id_incluido').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_precio')){
		if(document.getElementById('id_precio').disabled == false){
			document.getElementById('id_precio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_precio').disabled = false;}, 1750)
		}
	}



	if(document.getElementById('id_edificio')){
		if(document.getElementById('id_edificio').disabled == false){
			document.getElementById('id_edificio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_edificio').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_nota')){
		if(document.getElementById('id_nota').disabled == false){
			document.getElementById('id_nota').disabled = true;
			setTimeout(function(){
			document.getElementById('id_nota').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_alquiler')){
		if(document.getElementById('id_alquiler').disabled == false){
			document.getElementById('id_alquiler').disabled = true;
			setTimeout(function(){
			document.getElementById('id_alquiler').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_info')){
		if(document.getElementById('id_info').disabled == false){
			document.getElementById('id_info').disabled = true;
			setTimeout(function(){
			document.getElementById('id_info').disabled = false;}, 1750)
		}
	}

	/*if(document.getElementById('id_pago')){
		if(document.getElementById('id_pago').disabled == false){
			document.getElementById('id_pago').disabled = true;
			setTimeout(function(){
			document.getElementById('id_pago').disabled = false;}, 1750)
		}
	}*/

	if(document.getElementById('id_requisitos')){
		if(document.getElementById('id_requisitos').disabled == false){
			document.getElementById('id_requisitos').disabled = true;
			setTimeout(function(){
			document.getElementById('id_requisitos').disabled = false;}, 1750)
		}
	}
	
}	

function bloquea20(){

	if(document.getElementById('id_fotos')){
		if(document.getElementById('id_fotos').disabled == false){
			document.getElementById('id_fotos').disabled = true;
			setTimeout(function(){
			document.getElementById('id_fotos').disabled = false;}, 1750)
		}
	}


	if(document.getElementById('id_barrio')){
		if(document.getElementById('id_barrio').disabled == false){
			document.getElementById('id_barrio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_barrio').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_mapa')){
		if(document.getElementById('id_mapa').disabled == false){
			document.getElementById('id_mapa').disabled = true;
			setTimeout(function(){
			document.getElementById('id_mapa').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_plano')){
		if(document.getElementById('id_plano').disabled == false){
			document.getElementById('id_plano').disabled = true;
			setTimeout(function(){
			document.getElementById('id_plano').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_disponible')){
		if(document.getElementById('id_disponible').disabled == false){
			document.getElementById('id_disponible').disabled = true;
			setTimeout(function(){
			document.getElementById('id_disponible').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_minimo')){
		if(document.getElementById('id_minimo').disabled == false){
			document.getElementById('id_minimo').disabled = true;
			setTimeout(function(){
			document.getElementById('id_minimo').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_maximo')){
		if(document.getElementById('id_maximo').disabled == false){
			document.getElementById('id_maximo').disabled = true;
			setTimeout(function(){
			document.getElementById('id_maximo').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_estado')){
		if(document.getElementById('id_estado').disabled == false){
			document.getElementById('id_estado').disabled = true;
			setTimeout(function(){
			document.getElementById('id_estado').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_amuhab')){
		if(document.getElementById('id_amuhab').disabled == false){
			document.getElementById('id_amuhab').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amuhab').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_amueblado')){
		if(document.getElementById('id_amueblado').disabled == false){
			document.getElementById('id_amueblado').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amueblado').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_amueblaventa')){
		if(document.getElementById('id_amueblaventa').disabled == false){
			document.getElementById('id_amueblaventa').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amueblaventa').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_transporte')){
		if(document.getElementById('id_transporte').disabled == false){
			document.getElementById('id_transporte').disabled = true;
			setTimeout(function(){
			document.getElementById('id_transporte').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_importante')){
		if(document.getElementById('id_importante').disabled == false){
			document.getElementById('id_importante').disabled = true;
			setTimeout(function(){
			document.getElementById('id_importante').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_garaje')){
		if(document.getElementById('id_garaje').disabled == false){
			document.getElementById('id_garaje').disabled = true;
			setTimeout(function(){
			document.getElementById('id_garaje').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_incluido')){
		if(document.getElementById('id_incluido').disabled == false){
			document.getElementById('id_incluido').disabled = true;
			setTimeout(function(){
			document.getElementById('id_incluido').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_precio')){
		if(document.getElementById('id_precio').disabled == false){
			document.getElementById('id_precio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_precio').disabled = false;}, 1750)
		}
	}



	if(document.getElementById('id_edificio')){
		if(document.getElementById('id_edificio').disabled == false){
			document.getElementById('id_edificio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_edificio').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_nota')){
		if(document.getElementById('id_nota').disabled == false){
			document.getElementById('id_nota').disabled = true;
			setTimeout(function(){
			document.getElementById('id_nota').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_alquiler')){
		if(document.getElementById('id_alquiler').disabled == false){
			document.getElementById('id_alquiler').disabled = true;
			setTimeout(function(){
			document.getElementById('id_alquiler').disabled = false;}, 1750)
		}
	}

	/*if(document.getElementById('id_info')){
		if(document.getElementById('id_info').disabled == false){
			document.getElementById('id_info').disabled = true;
			setTimeout(function(){
			document.getElementById('id_info').disabled = false;}, 1750)
		}
	}*/

	if(document.getElementById('id_pago')){
		if(document.getElementById('id_pago').disabled == false){
			document.getElementById('id_pago').disabled = true;
			setTimeout(function(){
			document.getElementById('id_pago').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_requisitos')){
		if(document.getElementById('id_requisitos').disabled == false){
			document.getElementById('id_requisitos').disabled = true;
			setTimeout(function(){
			document.getElementById('id_requisitos').disabled = false;}, 1750)
		}
	}
	
}	

function bloquea19(){

	if(document.getElementById('id_fotos')){
		if(document.getElementById('id_fotos').disabled == false){
			document.getElementById('id_fotos').disabled = true;
			setTimeout(function(){
			document.getElementById('id_fotos').disabled = false;}, 1750)
		}
	}


	if(document.getElementById('id_barrio')){
		if(document.getElementById('id_barrio').disabled == false){
			document.getElementById('id_barrio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_barrio').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_mapa')){
		if(document.getElementById('id_mapa').disabled == false){
			document.getElementById('id_mapa').disabled = true;
			setTimeout(function(){
			document.getElementById('id_mapa').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_plano')){
		if(document.getElementById('id_plano').disabled == false){
			document.getElementById('id_plano').disabled = true;
			setTimeout(function(){
			document.getElementById('id_plano').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_disponible')){
		if(document.getElementById('id_disponible').disabled == false){
			document.getElementById('id_disponible').disabled = true;
			setTimeout(function(){
			document.getElementById('id_disponible').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_minimo')){
		if(document.getElementById('id_minimo').disabled == false){
			document.getElementById('id_minimo').disabled = true;
			setTimeout(function(){
			document.getElementById('id_minimo').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_maximo')){
		if(document.getElementById('id_maximo').disabled == false){
			document.getElementById('id_maximo').disabled = true;
			setTimeout(function(){
			document.getElementById('id_maximo').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_estado')){
		if(document.getElementById('id_estado').disabled == false){
			document.getElementById('id_estado').disabled = true;
			setTimeout(function(){
			document.getElementById('id_estado').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_amuhab')){
		if(document.getElementById('id_amuhab').disabled == false){
			document.getElementById('id_amuhab').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amuhab').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_amueblado')){
		if(document.getElementById('id_amueblado').disabled == false){
			document.getElementById('id_amueblado').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amueblado').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_amueblaventa')){
		if(document.getElementById('id_amueblaventa').disabled == false){
			document.getElementById('id_amueblaventa').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amueblaventa').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_transporte')){
		if(document.getElementById('id_transporte').disabled == false){
			document.getElementById('id_transporte').disabled = true;
			setTimeout(function(){
			document.getElementById('id_transporte').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_importante')){
		if(document.getElementById('id_importante').disabled == false){
			document.getElementById('id_importante').disabled = true;
			setTimeout(function(){
			document.getElementById('id_importante').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_garaje')){
		if(document.getElementById('id_garaje').disabled == false){
			document.getElementById('id_garaje').disabled = true;
			setTimeout(function(){
			document.getElementById('id_garaje').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_incluido')){
		if(document.getElementById('id_incluido').disabled == false){
			document.getElementById('id_incluido').disabled = true;
			setTimeout(function(){
			document.getElementById('id_incluido').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_precio')){
		if(document.getElementById('id_precio').disabled == false){
			document.getElementById('id_precio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_precio').disabled = false;}, 1750)
		}
	}



	if(document.getElementById('id_edificio')){
		if(document.getElementById('id_edificio').disabled == false){
			document.getElementById('id_edificio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_edificio').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_nota')){
		if(document.getElementById('id_nota').disabled == false){
			document.getElementById('id_nota').disabled = true;
			setTimeout(function(){
			document.getElementById('id_nota').disabled = false;}, 1750)
		}
	}
	/*if(document.getElementById('id_alquiler')){
		if(document.getElementById('id_alquiler').disabled == false){
			document.getElementById('id_alquiler').disabled = true;
			setTimeout(function(){
			document.getElementById('id_alquiler').disabled = false;}, 1750)
		}
	}*/

	if(document.getElementById('id_info')){
		if(document.getElementById('id_info').disabled == false){
			document.getElementById('id_info').disabled = true;
			setTimeout(function(){
			document.getElementById('id_info').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_pago')){
		if(document.getElementById('id_pago').disabled == false){
			document.getElementById('id_pago').disabled = true;
			setTimeout(function(){
			document.getElementById('id_pago').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_requisitos')){
		if(document.getElementById('id_requisitos').disabled == false){
			document.getElementById('id_requisitos').disabled = true;
			setTimeout(function(){
			document.getElementById('id_requisitos').disabled = false;}, 1750)
		}
	}
	
}	


function bloquea18(){

	if(document.getElementById('id_fotos')){
		if(document.getElementById('id_fotos').disabled == false){
			document.getElementById('id_fotos').disabled = true;
			setTimeout(function(){
			document.getElementById('id_fotos').disabled = false;}, 1750)
		}
	}


	if(document.getElementById('id_barrio')){
		if(document.getElementById('id_barrio').disabled == false){
			document.getElementById('id_barrio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_barrio').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_mapa')){
		if(document.getElementById('id_mapa').disabled == false){
			document.getElementById('id_mapa').disabled = true;
			setTimeout(function(){
			document.getElementById('id_mapa').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_plano')){
		if(document.getElementById('id_plano').disabled == false){
			document.getElementById('id_plano').disabled = true;
			setTimeout(function(){
			document.getElementById('id_plano').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_disponible')){
		if(document.getElementById('id_disponible').disabled == false){
			document.getElementById('id_disponible').disabled = true;
			setTimeout(function(){
			document.getElementById('id_disponible').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_minimo')){
		if(document.getElementById('id_minimo').disabled == false){
			document.getElementById('id_minimo').disabled = true;
			setTimeout(function(){
			document.getElementById('id_minimo').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_maximo')){
		if(document.getElementById('id_maximo').disabled == false){
			document.getElementById('id_maximo').disabled = true;
			setTimeout(function(){
			document.getElementById('id_maximo').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_estado')){
		if(document.getElementById('id_estado').disabled == false){
			document.getElementById('id_estado').disabled = true;
			setTimeout(function(){
			document.getElementById('id_estado').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_amuhab')){
		if(document.getElementById('id_amuhab').disabled == false){
			document.getElementById('id_amuhab').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amuhab').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_amueblado')){
		if(document.getElementById('id_amueblado').disabled == false){
			document.getElementById('id_amueblado').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amueblado').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_amueblaventa')){
		if(document.getElementById('id_amueblaventa').disabled == false){
			document.getElementById('id_amueblaventa').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amueblaventa').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_transporte')){
		if(document.getElementById('id_transporte').disabled == false){
			document.getElementById('id_transporte').disabled = true;
			setTimeout(function(){
			document.getElementById('id_transporte').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_importante')){
		if(document.getElementById('id_importante').disabled == false){
			document.getElementById('id_importante').disabled = true;
			setTimeout(function(){
			document.getElementById('id_importante').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_garaje')){
		if(document.getElementById('id_garaje').disabled == false){
			document.getElementById('id_garaje').disabled = true;
			setTimeout(function(){
			document.getElementById('id_garaje').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_incluido')){
		if(document.getElementById('id_incluido').disabled == false){
			document.getElementById('id_incluido').disabled = true;
			setTimeout(function(){
			document.getElementById('id_incluido').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_precio')){
		if(document.getElementById('id_precio').disabled == false){
			document.getElementById('id_precio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_precio').disabled = false;}, 1750)
		}
	}



	if(document.getElementById('id_edificio')){
		if(document.getElementById('id_edificio').disabled == false){
			document.getElementById('id_edificio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_edificio').disabled = false;}, 1750)
		}
	}
	/*if(document.getElementById('id_nota')){
		if(document.getElementById('id_nota').disabled == false){
			document.getElementById('id_nota').disabled = true;
			setTimeout(function(){
			document.getElementById('id_nota').disabled = false;}, 1750)
		}
	}*/
	if(document.getElementById('id_alquiler')){
		if(document.getElementById('id_alquiler').disabled == false){
			document.getElementById('id_alquiler').disabled = true;
			setTimeout(function(){
			document.getElementById('id_alquiler').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_info')){
		if(document.getElementById('id_info').disabled == false){
			document.getElementById('id_info').disabled = true;
			setTimeout(function(){
			document.getElementById('id_info').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_pago')){
		if(document.getElementById('id_pago').disabled == false){
			document.getElementById('id_pago').disabled = true;
			setTimeout(function(){
			document.getElementById('id_pago').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_requisitos')){
		if(document.getElementById('id_requisitos').disabled == false){
			document.getElementById('id_requisitos').disabled = true;
			setTimeout(function(){
			document.getElementById('id_requisitos').disabled = false;}, 1750)
		}
	}
	
}	

function bloquea17(){

	if(document.getElementById('id_fotos')){
		if(document.getElementById('id_fotos').disabled == false){
			document.getElementById('id_fotos').disabled = true;
			setTimeout(function(){
			document.getElementById('id_fotos').disabled = false;}, 1750)
		}
	}


	if(document.getElementById('id_barrio')){
		if(document.getElementById('id_barrio').disabled == false){
			document.getElementById('id_barrio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_barrio').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_mapa')){
		if(document.getElementById('id_mapa').disabled == false){
			document.getElementById('id_mapa').disabled = true;
			setTimeout(function(){
			document.getElementById('id_mapa').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_plano')){
		if(document.getElementById('id_plano').disabled == false){
			document.getElementById('id_plano').disabled = true;
			setTimeout(function(){
			document.getElementById('id_plano').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_disponible')){
		if(document.getElementById('id_disponible').disabled == false){
			document.getElementById('id_disponible').disabled = true;
			setTimeout(function(){
			document.getElementById('id_disponible').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_minimo')){
		if(document.getElementById('id_minimo').disabled == false){
			document.getElementById('id_minimo').disabled = true;
			setTimeout(function(){
			document.getElementById('id_minimo').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_maximo')){
		if(document.getElementById('id_maximo').disabled == false){
			document.getElementById('id_maximo').disabled = true;
			setTimeout(function(){
			document.getElementById('id_maximo').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_estado')){
		if(document.getElementById('id_estado').disabled == false){
			document.getElementById('id_estado').disabled = true;
			setTimeout(function(){
			document.getElementById('id_estado').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_amuhab')){
		if(document.getElementById('id_amuhab').disabled == false){
			document.getElementById('id_amuhab').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amuhab').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_amueblado')){
		if(document.getElementById('id_amueblado').disabled == false){
			document.getElementById('id_amueblado').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amueblado').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_amueblaventa')){
		if(document.getElementById('id_amueblaventa').disabled == false){
			document.getElementById('id_amueblaventa').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amueblaventa').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_transporte')){
		if(document.getElementById('id_transporte').disabled == false){
			document.getElementById('id_transporte').disabled = true;
			setTimeout(function(){
			document.getElementById('id_transporte').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_importante')){
		if(document.getElementById('id_importante').disabled == false){
			document.getElementById('id_importante').disabled = true;
			setTimeout(function(){
			document.getElementById('id_importante').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_garaje')){
		if(document.getElementById('id_garaje').disabled == false){
			document.getElementById('id_garaje').disabled = true;
			setTimeout(function(){
			document.getElementById('id_garaje').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_incluido')){
		if(document.getElementById('id_incluido').disabled == false){
			document.getElementById('id_incluido').disabled = true;
			setTimeout(function(){
			document.getElementById('id_incluido').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_precio')){
		if(document.getElementById('id_precio').disabled == false){
			document.getElementById('id_precio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_precio').disabled = false;}, 1750)
		}
	}



	/*if(document.getElementById('id_edificio')){
		if(document.getElementById('id_edificio').disabled == false){
			document.getElementById('id_edificio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_edificio').disabled = false;}, 1750)
		}
	}*/
	if(document.getElementById('id_nota')){
		if(document.getElementById('id_nota').disabled == false){
			document.getElementById('id_nota').disabled = true;
			setTimeout(function(){
			document.getElementById('id_nota').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_alquiler')){
		if(document.getElementById('id_alquiler').disabled == false){
			document.getElementById('id_alquiler').disabled = true;
			setTimeout(function(){
			document.getElementById('id_alquiler').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_info')){
		if(document.getElementById('id_info').disabled == false){
			document.getElementById('id_info').disabled = true;
			setTimeout(function(){
			document.getElementById('id_info').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_pago')){
		if(document.getElementById('id_pago').disabled == false){
			document.getElementById('id_pago').disabled = true;
			setTimeout(function(){
			document.getElementById('id_pago').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_requisitos')){
		if(document.getElementById('id_requisitos').disabled == false){
			document.getElementById('id_requisitos').disabled = true;
			setTimeout(function(){
			document.getElementById('id_requisitos').disabled = false;}, 1750)
		}
	}
	
}	

function bloquea16(){

	if(document.getElementById('id_fotos')){
		if(document.getElementById('id_fotos').disabled == false){
			document.getElementById('id_fotos').disabled = true;
			setTimeout(function(){
			document.getElementById('id_fotos').disabled = false;}, 1750)
		}
	}


	if(document.getElementById('id_barrio')){
		if(document.getElementById('id_barrio').disabled == false){
			document.getElementById('id_barrio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_barrio').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_mapa')){
		if(document.getElementById('id_mapa').disabled == false){
			document.getElementById('id_mapa').disabled = true;
			setTimeout(function(){
			document.getElementById('id_mapa').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_plano')){
		if(document.getElementById('id_plano').disabled == false){
			document.getElementById('id_plano').disabled = true;
			setTimeout(function(){
			document.getElementById('id_plano').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_disponible')){
		if(document.getElementById('id_disponible').disabled == false){
			document.getElementById('id_disponible').disabled = true;
			setTimeout(function(){
			document.getElementById('id_disponible').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_minimo')){
		if(document.getElementById('id_minimo').disabled == false){
			document.getElementById('id_minimo').disabled = true;
			setTimeout(function(){
			document.getElementById('id_minimo').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_maximo')){
		if(document.getElementById('id_maximo').disabled == false){
			document.getElementById('id_maximo').disabled = true;
			setTimeout(function(){
			document.getElementById('id_maximo').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_estado')){
		if(document.getElementById('id_estado').disabled == false){
			document.getElementById('id_estado').disabled = true;
			setTimeout(function(){
			document.getElementById('id_estado').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_amuhab')){
		if(document.getElementById('id_amuhab').disabled == false){
			document.getElementById('id_amuhab').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amuhab').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_amueblado')){
		if(document.getElementById('id_amueblado').disabled == false){
			document.getElementById('id_amueblado').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amueblado').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_amueblaventa')){
		if(document.getElementById('id_amueblaventa').disabled == false){
			document.getElementById('id_amueblaventa').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amueblaventa').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_transporte')){
		if(document.getElementById('id_transporte').disabled == false){
			document.getElementById('id_transporte').disabled = true;
			setTimeout(function(){
			document.getElementById('id_transporte').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_importante')){
		if(document.getElementById('id_importante').disabled == false){
			document.getElementById('id_importante').disabled = true;
			setTimeout(function(){
			document.getElementById('id_importante').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_garaje')){
		if(document.getElementById('id_garaje').disabled == false){
			document.getElementById('id_garaje').disabled = true;
			setTimeout(function(){
			document.getElementById('id_garaje').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_incluido')){
		if(document.getElementById('id_incluido').disabled == false){
			document.getElementById('id_incluido').disabled = true;
			setTimeout(function(){
			document.getElementById('id_incluido').disabled = false;}, 1750)
		}
	}
	/*if(document.getElementById('id_precio')){
		if(document.getElementById('id_precio').disabled == false){
			document.getElementById('id_precio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_precio').disabled = false;}, 1750)
		}
	}*/



	if(document.getElementById('id_edificio')){
		if(document.getElementById('id_edificio').disabled == false){
			document.getElementById('id_edificio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_edificio').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_nota')){
		if(document.getElementById('id_nota').disabled == false){
			document.getElementById('id_nota').disabled = true;
			setTimeout(function(){
			document.getElementById('id_nota').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_alquiler')){
		if(document.getElementById('id_alquiler').disabled == false){
			document.getElementById('id_alquiler').disabled = true;
			setTimeout(function(){
			document.getElementById('id_alquiler').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_info')){
		if(document.getElementById('id_info').disabled == false){
			document.getElementById('id_info').disabled = true;
			setTimeout(function(){
			document.getElementById('id_info').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_pago')){
		if(document.getElementById('id_pago').disabled == false){
			document.getElementById('id_pago').disabled = true;
			setTimeout(function(){
			document.getElementById('id_pago').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_requisitos')){
		if(document.getElementById('id_requisitos').disabled == false){
			document.getElementById('id_requisitos').disabled = true;
			setTimeout(function(){
			document.getElementById('id_requisitos').disabled = false;}, 1750)
		}
	}
	
}	

function bloquea15(){

	if(document.getElementById('id_fotos')){
		if(document.getElementById('id_fotos').disabled == false){
			document.getElementById('id_fotos').disabled = true;
			setTimeout(function(){
			document.getElementById('id_fotos').disabled = false;}, 1750)
		}
	}


	if(document.getElementById('id_barrio')){
		if(document.getElementById('id_barrio').disabled == false){
			document.getElementById('id_barrio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_barrio').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_mapa')){
		if(document.getElementById('id_mapa').disabled == false){
			document.getElementById('id_mapa').disabled = true;
			setTimeout(function(){
			document.getElementById('id_mapa').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_plano')){
		if(document.getElementById('id_plano').disabled == false){
			document.getElementById('id_plano').disabled = true;
			setTimeout(function(){
			document.getElementById('id_plano').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_disponible')){
		if(document.getElementById('id_disponible').disabled == false){
			document.getElementById('id_disponible').disabled = true;
			setTimeout(function(){
			document.getElementById('id_disponible').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_minimo')){
		if(document.getElementById('id_minimo').disabled == false){
			document.getElementById('id_minimo').disabled = true;
			setTimeout(function(){
			document.getElementById('id_minimo').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_maximo')){
		if(document.getElementById('id_maximo').disabled == false){
			document.getElementById('id_maximo').disabled = true;
			setTimeout(function(){
			document.getElementById('id_maximo').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_estado')){
		if(document.getElementById('id_estado').disabled == false){
			document.getElementById('id_estado').disabled = true;
			setTimeout(function(){
			document.getElementById('id_estado').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_amuhab')){
		if(document.getElementById('id_amuhab').disabled == false){
			document.getElementById('id_amuhab').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amuhab').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_amueblado')){
		if(document.getElementById('id_amueblado').disabled == false){
			document.getElementById('id_amueblado').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amueblado').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_amueblaventa')){
		if(document.getElementById('id_amueblaventa').disabled == false){
			document.getElementById('id_amueblaventa').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amueblaventa').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_transporte')){
		if(document.getElementById('id_transporte').disabled == false){
			document.getElementById('id_transporte').disabled = true;
			setTimeout(function(){
			document.getElementById('id_transporte').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_importante')){
		if(document.getElementById('id_importante').disabled == false){
			document.getElementById('id_importante').disabled = true;
			setTimeout(function(){
			document.getElementById('id_importante').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_garaje')){
		if(document.getElementById('id_garaje').disabled == false){
			document.getElementById('id_garaje').disabled = true;
			setTimeout(function(){
			document.getElementById('id_garaje').disabled = false;}, 1750)
		}
	}
	/*if(document.getElementById('id_incluido')){
		if(document.getElementById('id_incluido').disabled == false){
			document.getElementById('id_incluido').disabled = true;
			setTimeout(function(){
			document.getElementById('id_incluido').disabled = false;}, 1750)
		}
	}*/
	if(document.getElementById('id_precio')){
		if(document.getElementById('id_precio').disabled == false){
			document.getElementById('id_precio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_precio').disabled = false;}, 1750)
		}
	}



	if(document.getElementById('id_edificio')){
		if(document.getElementById('id_edificio').disabled == false){
			document.getElementById('id_edificio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_edificio').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_nota')){
		if(document.getElementById('id_nota').disabled == false){
			document.getElementById('id_nota').disabled = true;
			setTimeout(function(){
			document.getElementById('id_nota').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_alquiler')){
		if(document.getElementById('id_alquiler').disabled == false){
			document.getElementById('id_alquiler').disabled = true;
			setTimeout(function(){
			document.getElementById('id_alquiler').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_info')){
		if(document.getElementById('id_info').disabled == false){
			document.getElementById('id_info').disabled = true;
			setTimeout(function(){
			document.getElementById('id_info').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_pago')){
		if(document.getElementById('id_pago').disabled == false){
			document.getElementById('id_pago').disabled = true;
			setTimeout(function(){
			document.getElementById('id_pago').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_requisitos')){
		if(document.getElementById('id_requisitos').disabled == false){
			document.getElementById('id_requisitos').disabled = true;
			setTimeout(function(){
			document.getElementById('id_requisitos').disabled = false;}, 1750)
		}
	}
	
}	


function bloquea14(){

	if(document.getElementById('id_fotos')){
		if(document.getElementById('id_fotos').disabled == false){
			document.getElementById('id_fotos').disabled = true;
			setTimeout(function(){
			document.getElementById('id_fotos').disabled = false;}, 1750)
		}
	}


	if(document.getElementById('id_barrio')){
		if(document.getElementById('id_barrio').disabled == false){
			document.getElementById('id_barrio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_barrio').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_mapa')){
		if(document.getElementById('id_mapa').disabled == false){
			document.getElementById('id_mapa').disabled = true;
			setTimeout(function(){
			document.getElementById('id_mapa').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_plano')){
		if(document.getElementById('id_plano').disabled == false){
			document.getElementById('id_plano').disabled = true;
			setTimeout(function(){
			document.getElementById('id_plano').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_disponible')){
		if(document.getElementById('id_disponible').disabled == false){
			document.getElementById('id_disponible').disabled = true;
			setTimeout(function(){
			document.getElementById('id_disponible').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_minimo')){
		if(document.getElementById('id_minimo').disabled == false){
			document.getElementById('id_minimo').disabled = true;
			setTimeout(function(){
			document.getElementById('id_minimo').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_maximo')){
		if(document.getElementById('id_maximo').disabled == false){
			document.getElementById('id_maximo').disabled = true;
			setTimeout(function(){
			document.getElementById('id_maximo').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_estado')){
		if(document.getElementById('id_estado').disabled == false){
			document.getElementById('id_estado').disabled = true;
			setTimeout(function(){
			document.getElementById('id_estado').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_amuhab')){
		if(document.getElementById('id_amuhab').disabled == false){
			document.getElementById('id_amuhab').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amuhab').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_amueblado')){
		if(document.getElementById('id_amueblado').disabled == false){
			document.getElementById('id_amueblado').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amueblado').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_amueblaventa')){
		if(document.getElementById('id_amueblaventa').disabled == false){
			document.getElementById('id_amueblaventa').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amueblaventa').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_transporte')){
		if(document.getElementById('id_transporte').disabled == false){
			document.getElementById('id_transporte').disabled = true;
			setTimeout(function(){
			document.getElementById('id_transporte').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_importante')){
		if(document.getElementById('id_importante').disabled == false){
			document.getElementById('id_importante').disabled = true;
			setTimeout(function(){
			document.getElementById('id_importante').disabled = false;}, 1750)
		}
	}
	/*if(document.getElementById('id_garaje')){
		if(document.getElementById('id_garaje').disabled == false){
			document.getElementById('id_garaje').disabled = true;
			setTimeout(function(){
			document.getElementById('id_garaje').disabled = false;}, 1750)
		}
	}*/
	if(document.getElementById('id_incluido')){
		if(document.getElementById('id_incluido').disabled == false){
			document.getElementById('id_incluido').disabled = true;
			setTimeout(function(){
			document.getElementById('id_incluido').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_precio')){
		if(document.getElementById('id_precio').disabled == false){
			document.getElementById('id_precio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_precio').disabled = false;}, 1750)
		}
	}



	if(document.getElementById('id_edificio')){
		if(document.getElementById('id_edificio').disabled == false){
			document.getElementById('id_edificio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_edificio').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_nota')){
		if(document.getElementById('id_nota').disabled == false){
			document.getElementById('id_nota').disabled = true;
			setTimeout(function(){
			document.getElementById('id_nota').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_alquiler')){
		if(document.getElementById('id_alquiler').disabled == false){
			document.getElementById('id_alquiler').disabled = true;
			setTimeout(function(){
			document.getElementById('id_alquiler').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_info')){
		if(document.getElementById('id_info').disabled == false){
			document.getElementById('id_info').disabled = true;
			setTimeout(function(){
			document.getElementById('id_info').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_pago')){
		if(document.getElementById('id_pago').disabled == false){
			document.getElementById('id_pago').disabled = true;
			setTimeout(function(){
			document.getElementById('id_pago').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_requisitos')){
		if(document.getElementById('id_requisitos').disabled == false){
			document.getElementById('id_requisitos').disabled = true;
			setTimeout(function(){
			document.getElementById('id_requisitos').disabled = false;}, 1750)
		}
	}
	
}	


function bloquea13(){

	if(document.getElementById('id_fotos')){
		if(document.getElementById('id_fotos').disabled == false){
			document.getElementById('id_fotos').disabled = true;
			setTimeout(function(){
			document.getElementById('id_fotos').disabled = false;}, 1750)
		}
	}


	if(document.getElementById('id_barrio')){
		if(document.getElementById('id_barrio').disabled == false){
			document.getElementById('id_barrio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_barrio').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_mapa')){
		if(document.getElementById('id_mapa').disabled == false){
			document.getElementById('id_mapa').disabled = true;
			setTimeout(function(){
			document.getElementById('id_mapa').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_plano')){
		if(document.getElementById('id_plano').disabled == false){
			document.getElementById('id_plano').disabled = true;
			setTimeout(function(){
			document.getElementById('id_plano').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_disponible')){
		if(document.getElementById('id_disponible').disabled == false){
			document.getElementById('id_disponible').disabled = true;
			setTimeout(function(){
			document.getElementById('id_disponible').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_minimo')){
		if(document.getElementById('id_minimo').disabled == false){
			document.getElementById('id_minimo').disabled = true;
			setTimeout(function(){
			document.getElementById('id_minimo').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_maximo')){
		if(document.getElementById('id_maximo').disabled == false){
			document.getElementById('id_maximo').disabled = true;
			setTimeout(function(){
			document.getElementById('id_maximo').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_estado')){
		if(document.getElementById('id_estado').disabled == false){
			document.getElementById('id_estado').disabled = true;
			setTimeout(function(){
			document.getElementById('id_estado').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_amuhab')){
		if(document.getElementById('id_amuhab').disabled == false){
			document.getElementById('id_amuhab').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amuhab').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_amueblado')){
		if(document.getElementById('id_amueblado').disabled == false){
			document.getElementById('id_amueblado').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amueblado').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_amueblaventa')){
		if(document.getElementById('id_amueblaventa').disabled == false){
			document.getElementById('id_amueblaventa').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amueblaventa').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_transporte')){
		if(document.getElementById('id_transporte').disabled == false){
			document.getElementById('id_transporte').disabled = true;
			setTimeout(function(){
			document.getElementById('id_transporte').disabled = false;}, 1750)
		}
	}

	/*if(document.getElementById('id_importante')){
		if(document.getElementById('id_importante').disabled == false){
			document.getElementById('id_importante').disabled = true;
			setTimeout(function(){
			document.getElementById('id_importante').disabled = false;}, 1750)
		}
	}*/
	if(document.getElementById('id_garaje')){
		if(document.getElementById('id_garaje').disabled == false){
			document.getElementById('id_garaje').disabled = true;
			setTimeout(function(){
			document.getElementById('id_garaje').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_incluido')){
		if(document.getElementById('id_incluido').disabled == false){
			document.getElementById('id_incluido').disabled = true;
			setTimeout(function(){
			document.getElementById('id_incluido').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_precio')){
		if(document.getElementById('id_precio').disabled == false){
			document.getElementById('id_precio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_precio').disabled = false;}, 1750)
		}
	}



	if(document.getElementById('id_edificio')){
		if(document.getElementById('id_edificio').disabled == false){
			document.getElementById('id_edificio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_edificio').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_nota')){
		if(document.getElementById('id_nota').disabled == false){
			document.getElementById('id_nota').disabled = true;
			setTimeout(function(){
			document.getElementById('id_nota').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_alquiler')){
		if(document.getElementById('id_alquiler').disabled == false){
			document.getElementById('id_alquiler').disabled = true;
			setTimeout(function(){
			document.getElementById('id_alquiler').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_info')){
		if(document.getElementById('id_info').disabled == false){
			document.getElementById('id_info').disabled = true;
			setTimeout(function(){
			document.getElementById('id_info').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_pago')){
		if(document.getElementById('id_pago').disabled == false){
			document.getElementById('id_pago').disabled = true;
			setTimeout(function(){
			document.getElementById('id_pago').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_requisitos')){
		if(document.getElementById('id_requisitos').disabled == false){
			document.getElementById('id_requisitos').disabled = true;
			setTimeout(function(){
			document.getElementById('id_requisitos').disabled = false;}, 1750)
		}
	}
	
}	

function bloquea12(){

	if(document.getElementById('id_fotos')){
		if(document.getElementById('id_fotos').disabled == false){
			document.getElementById('id_fotos').disabled = true;
			setTimeout(function(){
			document.getElementById('id_fotos').disabled = false;}, 1750)
		}
	}


	if(document.getElementById('id_barrio')){
		if(document.getElementById('id_barrio').disabled == false){
			document.getElementById('id_barrio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_barrio').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_mapa')){
		if(document.getElementById('id_mapa').disabled == false){
			document.getElementById('id_mapa').disabled = true;
			setTimeout(function(){
			document.getElementById('id_mapa').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_plano')){
		if(document.getElementById('id_plano').disabled == false){
			document.getElementById('id_plano').disabled = true;
			setTimeout(function(){
			document.getElementById('id_plano').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_disponible')){
		if(document.getElementById('id_disponible').disabled == false){
			document.getElementById('id_disponible').disabled = true;
			setTimeout(function(){
			document.getElementById('id_disponible').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_minimo')){
		if(document.getElementById('id_minimo').disabled == false){
			document.getElementById('id_minimo').disabled = true;
			setTimeout(function(){
			document.getElementById('id_minimo').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_maximo')){
		if(document.getElementById('id_maximo').disabled == false){
			document.getElementById('id_maximo').disabled = true;
			setTimeout(function(){
			document.getElementById('id_maximo').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_estado')){
		if(document.getElementById('id_estado').disabled == false){
			document.getElementById('id_estado').disabled = true;
			setTimeout(function(){
			document.getElementById('id_estado').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_amuhab')){
		if(document.getElementById('id_amuhab').disabled == false){
			document.getElementById('id_amuhab').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amuhab').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_amueblado')){
		if(document.getElementById('id_amueblado').disabled == false){
			document.getElementById('id_amueblado').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amueblado').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_amueblaventa')){
		if(document.getElementById('id_amueblaventa').disabled == false){
			document.getElementById('id_amueblaventa').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amueblaventa').disabled = false;}, 1750)
		}
	}
	/*if(document.getElementById('id_transporte')){
		if(document.getElementById('id_transporte').disabled == false){
			document.getElementById('id_transporte').disabled = true;
			setTimeout(function(){
			document.getElementById('id_transporte').disabled = false;}, 1750)
		}
	}*/

	if(document.getElementById('id_importante')){
		if(document.getElementById('id_importante').disabled == false){
			document.getElementById('id_importante').disabled = true;
			setTimeout(function(){
			document.getElementById('id_importante').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_garaje')){
		if(document.getElementById('id_garaje').disabled == false){
			document.getElementById('id_garaje').disabled = true;
			setTimeout(function(){
			document.getElementById('id_garaje').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_incluido')){
		if(document.getElementById('id_incluido').disabled == false){
			document.getElementById('id_incluido').disabled = true;
			setTimeout(function(){
			document.getElementById('id_incluido').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_precio')){
		if(document.getElementById('id_precio').disabled == false){
			document.getElementById('id_precio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_precio').disabled = false;}, 1750)
		}
	}



	if(document.getElementById('id_edificio')){
		if(document.getElementById('id_edificio').disabled == false){
			document.getElementById('id_edificio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_edificio').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_nota')){
		if(document.getElementById('id_nota').disabled == false){
			document.getElementById('id_nota').disabled = true;
			setTimeout(function(){
			document.getElementById('id_nota').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_alquiler')){
		if(document.getElementById('id_alquiler').disabled == false){
			document.getElementById('id_alquiler').disabled = true;
			setTimeout(function(){
			document.getElementById('id_alquiler').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_info')){
		if(document.getElementById('id_info').disabled == false){
			document.getElementById('id_info').disabled = true;
			setTimeout(function(){
			document.getElementById('id_info').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_pago')){
		if(document.getElementById('id_pago').disabled == false){
			document.getElementById('id_pago').disabled = true;
			setTimeout(function(){
			document.getElementById('id_pago').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_requisitos')){
		if(document.getElementById('id_requisitos').disabled == false){
			document.getElementById('id_requisitos').disabled = true;
			setTimeout(function(){
			document.getElementById('id_requisitos').disabled = false;}, 1750)
		}
	}
	
}	

function bloquea11(){

	if(document.getElementById('id_fotos')){
		if(document.getElementById('id_fotos').disabled == false){
			document.getElementById('id_fotos').disabled = true;
			setTimeout(function(){
			document.getElementById('id_fotos').disabled = false;}, 1750)
		}
	}


	if(document.getElementById('id_barrio')){
		if(document.getElementById('id_barrio').disabled == false){
			document.getElementById('id_barrio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_barrio').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_mapa')){
		if(document.getElementById('id_mapa').disabled == false){
			document.getElementById('id_mapa').disabled = true;
			setTimeout(function(){
			document.getElementById('id_mapa').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_plano')){
		if(document.getElementById('id_plano').disabled == false){
			document.getElementById('id_plano').disabled = true;
			setTimeout(function(){
			document.getElementById('id_plano').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_disponible')){
		if(document.getElementById('id_disponible').disabled == false){
			document.getElementById('id_disponible').disabled = true;
			setTimeout(function(){
			document.getElementById('id_disponible').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_minimo')){
		if(document.getElementById('id_minimo').disabled == false){
			document.getElementById('id_minimo').disabled = true;
			setTimeout(function(){
			document.getElementById('id_minimo').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_maximo')){
		if(document.getElementById('id_maximo').disabled == false){
			document.getElementById('id_maximo').disabled = true;
			setTimeout(function(){
			document.getElementById('id_maximo').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_estado')){
		if(document.getElementById('id_estado').disabled == false){
			document.getElementById('id_estado').disabled = true;
			setTimeout(function(){
			document.getElementById('id_estado').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_amuhab')){
		if(document.getElementById('id_amuhab').disabled == false){
			document.getElementById('id_amuhab').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amuhab').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_amueblado')){
		if(document.getElementById('id_amueblado').disabled == false){
			document.getElementById('id_amueblado').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amueblado').disabled = false;}, 1750)
		}
	}
	/*if(document.getElementById('id_amueblaventa')){
		if(document.getElementById('id_amueblaventa').disabled == false){
			document.getElementById('id_amueblaventa').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amueblaventa').disabled = false;}, 1750)
		}
	}*/
	if(document.getElementById('id_transporte')){
		if(document.getElementById('id_transporte').disabled == false){
			document.getElementById('id_transporte').disabled = true;
			setTimeout(function(){
			document.getElementById('id_transporte').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_importante')){
		if(document.getElementById('id_importante').disabled == false){
			document.getElementById('id_importante').disabled = true;
			setTimeout(function(){
			document.getElementById('id_importante').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_garaje')){
		if(document.getElementById('id_garaje').disabled == false){
			document.getElementById('id_garaje').disabled = true;
			setTimeout(function(){
			document.getElementById('id_garaje').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_incluido')){
		if(document.getElementById('id_incluido').disabled == false){
			document.getElementById('id_incluido').disabled = true;
			setTimeout(function(){
			document.getElementById('id_incluido').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_precio')){
		if(document.getElementById('id_precio').disabled == false){
			document.getElementById('id_precio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_precio').disabled = false;}, 1750)
		}
	}



	if(document.getElementById('id_edificio')){
		if(document.getElementById('id_edificio').disabled == false){
			document.getElementById('id_edificio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_edificio').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_nota')){
		if(document.getElementById('id_nota').disabled == false){
			document.getElementById('id_nota').disabled = true;
			setTimeout(function(){
			document.getElementById('id_nota').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_alquiler')){
		if(document.getElementById('id_alquiler').disabled == false){
			document.getElementById('id_alquiler').disabled = true;
			setTimeout(function(){
			document.getElementById('id_alquiler').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_info')){
		if(document.getElementById('id_info').disabled == false){
			document.getElementById('id_info').disabled = true;
			setTimeout(function(){
			document.getElementById('id_info').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_pago')){
		if(document.getElementById('id_pago').disabled == false){
			document.getElementById('id_pago').disabled = true;
			setTimeout(function(){
			document.getElementById('id_pago').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_requisitos')){
		if(document.getElementById('id_requisitos').disabled == false){
			document.getElementById('id_requisitos').disabled = true;
			setTimeout(function(){
			document.getElementById('id_requisitos').disabled = false;}, 1750)
		}
	}
	
}	


function bloquea10(){

	if(document.getElementById('id_fotos')){
		if(document.getElementById('id_fotos').disabled == false){
			document.getElementById('id_fotos').disabled = true;
			setTimeout(function(){
			document.getElementById('id_fotos').disabled = false;}, 1750)
		}
	}


	if(document.getElementById('id_barrio')){
		if(document.getElementById('id_barrio').disabled == false){
			document.getElementById('id_barrio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_barrio').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_mapa')){
		if(document.getElementById('id_mapa').disabled == false){
			document.getElementById('id_mapa').disabled = true;
			setTimeout(function(){
			document.getElementById('id_mapa').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_plano')){
		if(document.getElementById('id_plano').disabled == false){
			document.getElementById('id_plano').disabled = true;
			setTimeout(function(){
			document.getElementById('id_plano').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_disponible')){
		if(document.getElementById('id_disponible').disabled == false){
			document.getElementById('id_disponible').disabled = true;
			setTimeout(function(){
			document.getElementById('id_disponible').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_minimo')){
		if(document.getElementById('id_minimo').disabled == false){
			document.getElementById('id_minimo').disabled = true;
			setTimeout(function(){
			document.getElementById('id_minimo').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_maximo')){
		if(document.getElementById('id_maximo').disabled == false){
			document.getElementById('id_maximo').disabled = true;
			setTimeout(function(){
			document.getElementById('id_maximo').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_estado')){
		if(document.getElementById('id_estado').disabled == false){
			document.getElementById('id_estado').disabled = true;
			setTimeout(function(){
			document.getElementById('id_estado').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_amuhab')){
		if(document.getElementById('id_amuhab').disabled == false){
			document.getElementById('id_amuhab').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amuhab').disabled = false;}, 1750)
		}
	}
	/*if(document.getElementById('id_amueblado')){
		if(document.getElementById('id_amueblado').disabled == false){
			document.getElementById('id_amueblado').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amueblado').disabled = false;}, 1750)
		}
	}*/
	if(document.getElementById('id_amueblaventa')){
		if(document.getElementById('id_amueblaventa').disabled == false){
			document.getElementById('id_amueblaventa').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amueblaventa').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_transporte')){
		if(document.getElementById('id_transporte').disabled == false){
			document.getElementById('id_transporte').disabled = true;
			setTimeout(function(){
			document.getElementById('id_transporte').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_importante')){
		if(document.getElementById('id_importante').disabled == false){
			document.getElementById('id_importante').disabled = true;
			setTimeout(function(){
			document.getElementById('id_importante').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_garaje')){
		if(document.getElementById('id_garaje').disabled == false){
			document.getElementById('id_garaje').disabled = true;
			setTimeout(function(){
			document.getElementById('id_garaje').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_incluido')){
		if(document.getElementById('id_incluido').disabled == false){
			document.getElementById('id_incluido').disabled = true;
			setTimeout(function(){
			document.getElementById('id_incluido').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_precio')){
		if(document.getElementById('id_precio').disabled == false){
			document.getElementById('id_precio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_precio').disabled = false;}, 1750)
		}
	}



	if(document.getElementById('id_edificio')){
		if(document.getElementById('id_edificio').disabled == false){
			document.getElementById('id_edificio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_edificio').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_nota')){
		if(document.getElementById('id_nota').disabled == false){
			document.getElementById('id_nota').disabled = true;
			setTimeout(function(){
			document.getElementById('id_nota').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_alquiler')){
		if(document.getElementById('id_alquiler').disabled == false){
			document.getElementById('id_alquiler').disabled = true;
			setTimeout(function(){
			document.getElementById('id_alquiler').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_info')){
		if(document.getElementById('id_info').disabled == false){
			document.getElementById('id_info').disabled = true;
			setTimeout(function(){
			document.getElementById('id_info').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_pago')){
		if(document.getElementById('id_pago').disabled == false){
			document.getElementById('id_pago').disabled = true;
			setTimeout(function(){
			document.getElementById('id_pago').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_requisitos')){
		if(document.getElementById('id_requisitos').disabled == false){
			document.getElementById('id_requisitos').disabled = true;
			setTimeout(function(){
			document.getElementById('id_requisitos').disabled = false;}, 1750)
		}
	}
	
}	


function bloquea9(){

	if(document.getElementById('id_fotos')){
		if(document.getElementById('id_fotos').disabled == false){
			document.getElementById('id_fotos').disabled = true;
			setTimeout(function(){
			document.getElementById('id_fotos').disabled = false;}, 1750)
		}
	}


	if(document.getElementById('id_barrio')){
		if(document.getElementById('id_barrio').disabled == false){
			document.getElementById('id_barrio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_barrio').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_mapa')){
		if(document.getElementById('id_mapa').disabled == false){
			document.getElementById('id_mapa').disabled = true;
			setTimeout(function(){
			document.getElementById('id_mapa').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_plano')){
		if(document.getElementById('id_plano').disabled == false){
			document.getElementById('id_plano').disabled = true;
			setTimeout(function(){
			document.getElementById('id_plano').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_disponible')){
		if(document.getElementById('id_disponible').disabled == false){
			document.getElementById('id_disponible').disabled = true;
			setTimeout(function(){
			document.getElementById('id_disponible').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_minimo')){
		if(document.getElementById('id_minimo').disabled == false){
			document.getElementById('id_minimo').disabled = true;
			setTimeout(function(){
			document.getElementById('id_minimo').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_maximo')){
		if(document.getElementById('id_maximo').disabled == false){
			document.getElementById('id_maximo').disabled = true;
			setTimeout(function(){
			document.getElementById('id_maximo').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_estado')){
		if(document.getElementById('id_estado').disabled == false){
			document.getElementById('id_estado').disabled = true;
			setTimeout(function(){
			document.getElementById('id_estado').disabled = false;}, 1750)
		}
	}

	/*if(document.getElementById('id_amuhab')){
		if(document.getElementById('id_amuhab').disabled == false){
			document.getElementById('id_amuhab').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amuhab').disabled = false;}, 1750)
		}
	}*/
	if(document.getElementById('id_amueblado')){
		if(document.getElementById('id_amueblado').disabled == false){
			document.getElementById('id_amueblado').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amueblado').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_amueblaventa')){
		if(document.getElementById('id_amueblaventa').disabled == false){
			document.getElementById('id_amueblaventa').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amueblaventa').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_transporte')){
		if(document.getElementById('id_transporte').disabled == false){
			document.getElementById('id_transporte').disabled = true;
			setTimeout(function(){
			document.getElementById('id_transporte').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_importante')){
		if(document.getElementById('id_importante').disabled == false){
			document.getElementById('id_importante').disabled = true;
			setTimeout(function(){
			document.getElementById('id_importante').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_garaje')){
		if(document.getElementById('id_garaje').disabled == false){
			document.getElementById('id_garaje').disabled = true;
			setTimeout(function(){
			document.getElementById('id_garaje').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_incluido')){
		if(document.getElementById('id_incluido').disabled == false){
			document.getElementById('id_incluido').disabled = true;
			setTimeout(function(){
			document.getElementById('id_incluido').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_precio')){
		if(document.getElementById('id_precio').disabled == false){
			document.getElementById('id_precio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_precio').disabled = false;}, 1750)
		}
	}



	if(document.getElementById('id_edificio')){
		if(document.getElementById('id_edificio').disabled == false){
			document.getElementById('id_edificio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_edificio').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_nota')){
		if(document.getElementById('id_nota').disabled == false){
			document.getElementById('id_nota').disabled = true;
			setTimeout(function(){
			document.getElementById('id_nota').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_alquiler')){
		if(document.getElementById('id_alquiler').disabled == false){
			document.getElementById('id_alquiler').disabled = true;
			setTimeout(function(){
			document.getElementById('id_alquiler').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_info')){
		if(document.getElementById('id_info').disabled == false){
			document.getElementById('id_info').disabled = true;
			setTimeout(function(){
			document.getElementById('id_info').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_pago')){
		if(document.getElementById('id_pago').disabled == false){
			document.getElementById('id_pago').disabled = true;
			setTimeout(function(){
			document.getElementById('id_pago').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_requisitos')){
		if(document.getElementById('id_requisitos').disabled == false){
			document.getElementById('id_requisitos').disabled = true;
			setTimeout(function(){
			document.getElementById('id_requisitos').disabled = false;}, 1750)
		}
	}
	
}	

function bloquea8(){

	if(document.getElementById('id_fotos')){
		if(document.getElementById('id_fotos').disabled == false){
			document.getElementById('id_fotos').disabled = true;
			setTimeout(function(){
			document.getElementById('id_fotos').disabled = false;}, 1750)
		}
	}


	if(document.getElementById('id_barrio')){
		if(document.getElementById('id_barrio').disabled == false){
			document.getElementById('id_barrio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_barrio').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_mapa')){
		if(document.getElementById('id_mapa').disabled == false){
			document.getElementById('id_mapa').disabled = true;
			setTimeout(function(){
			document.getElementById('id_mapa').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_plano')){
		if(document.getElementById('id_plano').disabled == false){
			document.getElementById('id_plano').disabled = true;
			setTimeout(function(){
			document.getElementById('id_plano').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_disponible')){
		if(document.getElementById('id_disponible').disabled == false){
			document.getElementById('id_disponible').disabled = true;
			setTimeout(function(){
			document.getElementById('id_disponible').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_minimo')){
		if(document.getElementById('id_minimo').disabled == false){
			document.getElementById('id_minimo').disabled = true;
			setTimeout(function(){
			document.getElementById('id_minimo').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_maximo')){
		if(document.getElementById('id_maximo').disabled == false){
			document.getElementById('id_maximo').disabled = true;
			setTimeout(function(){
			document.getElementById('id_maximo').disabled = false;}, 1750)
		}
	}
	/*if(document.getElementById('id_estado')){
		if(document.getElementById('id_estado').disabled == false){
			document.getElementById('id_estado').disabled = true;
			setTimeout(function(){
			document.getElementById('id_estado').disabled = false;}, 1750)
		}
	}*/

	if(document.getElementById('id_amuhab')){
		if(document.getElementById('id_amuhab').disabled == false){
			document.getElementById('id_amuhab').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amuhab').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_amueblado')){
		if(document.getElementById('id_amueblado').disabled == false){
			document.getElementById('id_amueblado').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amueblado').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_amueblaventa')){
		if(document.getElementById('id_amueblaventa').disabled == false){
			document.getElementById('id_amueblaventa').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amueblaventa').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_transporte')){
		if(document.getElementById('id_transporte').disabled == false){
			document.getElementById('id_transporte').disabled = true;
			setTimeout(function(){
			document.getElementById('id_transporte').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_importante')){
		if(document.getElementById('id_importante').disabled == false){
			document.getElementById('id_importante').disabled = true;
			setTimeout(function(){
			document.getElementById('id_importante').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_garaje')){
		if(document.getElementById('id_garaje').disabled == false){
			document.getElementById('id_garaje').disabled = true;
			setTimeout(function(){
			document.getElementById('id_garaje').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_incluido')){
		if(document.getElementById('id_incluido').disabled == false){
			document.getElementById('id_incluido').disabled = true;
			setTimeout(function(){
			document.getElementById('id_incluido').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_precio')){
		if(document.getElementById('id_precio').disabled == false){
			document.getElementById('id_precio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_precio').disabled = false;}, 1750)
		}
	}



	if(document.getElementById('id_edificio')){
		if(document.getElementById('id_edificio').disabled == false){
			document.getElementById('id_edificio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_edificio').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_nota')){
		if(document.getElementById('id_nota').disabled == false){
			document.getElementById('id_nota').disabled = true;
			setTimeout(function(){
			document.getElementById('id_nota').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_alquiler')){
		if(document.getElementById('id_alquiler').disabled == false){
			document.getElementById('id_alquiler').disabled = true;
			setTimeout(function(){
			document.getElementById('id_alquiler').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_info')){
		if(document.getElementById('id_info').disabled == false){
			document.getElementById('id_info').disabled = true;
			setTimeout(function(){
			document.getElementById('id_info').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_pago')){
		if(document.getElementById('id_pago').disabled == false){
			document.getElementById('id_pago').disabled = true;
			setTimeout(function(){
			document.getElementById('id_pago').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_requisitos')){
		if(document.getElementById('id_requisitos').disabled == false){
			document.getElementById('id_requisitos').disabled = true;
			setTimeout(function(){
			document.getElementById('id_requisitos').disabled = false;}, 1750)
		}
	}
	
}	


function bloquea7(){

	if(document.getElementById('id_fotos')){
		if(document.getElementById('id_fotos').disabled == false){
			document.getElementById('id_fotos').disabled = true;
			setTimeout(function(){
			document.getElementById('id_fotos').disabled = false;}, 1750)
		}
	}


	if(document.getElementById('id_barrio')){
		if(document.getElementById('id_barrio').disabled == false){
			document.getElementById('id_barrio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_barrio').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_mapa')){
		if(document.getElementById('id_mapa').disabled == false){
			document.getElementById('id_mapa').disabled = true;
			setTimeout(function(){
			document.getElementById('id_mapa').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_plano')){
		if(document.getElementById('id_plano').disabled == false){
			document.getElementById('id_plano').disabled = true;
			setTimeout(function(){
			document.getElementById('id_plano').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_disponible')){
		if(document.getElementById('id_disponible').disabled == false){
			document.getElementById('id_disponible').disabled = true;
			setTimeout(function(){
			document.getElementById('id_disponible').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_minimo')){
		if(document.getElementById('id_minimo').disabled == false){
			document.getElementById('id_minimo').disabled = true;
			setTimeout(function(){
			document.getElementById('id_minimo').disabled = false;}, 1750)
		}
	}
	/*if(document.getElementById('id_maximo')){
		if(document.getElementById('id_maximo').disabled == false){
			document.getElementById('id_maximo').disabled = true;
			setTimeout(function(){
			document.getElementById('id_maximo').disabled = false;}, 1750)
		}
	}*/
	if(document.getElementById('id_estado')){
		if(document.getElementById('id_estado').disabled == false){
			document.getElementById('id_estado').disabled = true;
			setTimeout(function(){
			document.getElementById('id_estado').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_amuhab')){
		if(document.getElementById('id_amuhab').disabled == false){
			document.getElementById('id_amuhab').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amuhab').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_amueblado')){
		if(document.getElementById('id_amueblado').disabled == false){
			document.getElementById('id_amueblado').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amueblado').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_amueblaventa')){
		if(document.getElementById('id_amueblaventa').disabled == false){
			document.getElementById('id_amueblaventa').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amueblaventa').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_transporte')){
		if(document.getElementById('id_transporte').disabled == false){
			document.getElementById('id_transporte').disabled = true;
			setTimeout(function(){
			document.getElementById('id_transporte').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_importante')){
		if(document.getElementById('id_importante').disabled == false){
			document.getElementById('id_importante').disabled = true;
			setTimeout(function(){
			document.getElementById('id_importante').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_garaje')){
		if(document.getElementById('id_garaje').disabled == false){
			document.getElementById('id_garaje').disabled = true;
			setTimeout(function(){
			document.getElementById('id_garaje').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_incluido')){
		if(document.getElementById('id_incluido').disabled == false){
			document.getElementById('id_incluido').disabled = true;
			setTimeout(function(){
			document.getElementById('id_incluido').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_precio')){
		if(document.getElementById('id_precio').disabled == false){
			document.getElementById('id_precio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_precio').disabled = false;}, 1750)
		}
	}



	if(document.getElementById('id_edificio')){
		if(document.getElementById('id_edificio').disabled == false){
			document.getElementById('id_edificio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_edificio').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_nota')){
		if(document.getElementById('id_nota').disabled == false){
			document.getElementById('id_nota').disabled = true;
			setTimeout(function(){
			document.getElementById('id_nota').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_alquiler')){
		if(document.getElementById('id_alquiler').disabled == false){
			document.getElementById('id_alquiler').disabled = true;
			setTimeout(function(){
			document.getElementById('id_alquiler').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_info')){
		if(document.getElementById('id_info').disabled == false){
			document.getElementById('id_info').disabled = true;
			setTimeout(function(){
			document.getElementById('id_info').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_pago')){
		if(document.getElementById('id_pago').disabled == false){
			document.getElementById('id_pago').disabled = true;
			setTimeout(function(){
			document.getElementById('id_pago').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_requisitos')){
		if(document.getElementById('id_requisitos').disabled == false){
			document.getElementById('id_requisitos').disabled = true;
			setTimeout(function(){
			document.getElementById('id_requisitos').disabled = false;}, 1750)
		}
	}
	
}	



function bloquea6(){

	if(document.getElementById('id_fotos')){
		if(document.getElementById('id_fotos').disabled == false){
			document.getElementById('id_fotos').disabled = true;
			setTimeout(function(){
			document.getElementById('id_fotos').disabled = false;}, 1750)
		}
	}


	if(document.getElementById('id_barrio')){
		if(document.getElementById('id_barrio').disabled == false){
			document.getElementById('id_barrio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_barrio').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_mapa')){
		if(document.getElementById('id_mapa').disabled == false){
			document.getElementById('id_mapa').disabled = true;
			setTimeout(function(){
			document.getElementById('id_mapa').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_plano')){
		if(document.getElementById('id_plano').disabled == false){
			document.getElementById('id_plano').disabled = true;
			setTimeout(function(){
			document.getElementById('id_plano').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_disponible')){
		if(document.getElementById('id_disponible').disabled == false){
			document.getElementById('id_disponible').disabled = true;
			setTimeout(function(){
			document.getElementById('id_disponible').disabled = false;}, 1750)
		}
	}

	/*if(document.getElementById('id_minimo')){
		if(document.getElementById('id_minimo').disabled == false){
			document.getElementById('id_minimo').disabled = true;
			setTimeout(function(){
			document.getElementById('id_minimo').disabled = false;}, 1750)
		}
	}*/
	if(document.getElementById('id_maximo')){
		if(document.getElementById('id_maximo').disabled == false){
			document.getElementById('id_maximo').disabled = true;
			setTimeout(function(){
			document.getElementById('id_maximo').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_estado')){
		if(document.getElementById('id_estado').disabled == false){
			document.getElementById('id_estado').disabled = true;
			setTimeout(function(){
			document.getElementById('id_estado').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_amuhab')){
		if(document.getElementById('id_amuhab').disabled == false){
			document.getElementById('id_amuhab').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amuhab').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_amueblado')){
		if(document.getElementById('id_amueblado').disabled == false){
			document.getElementById('id_amueblado').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amueblado').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_amueblaventa')){
		if(document.getElementById('id_amueblaventa').disabled == false){
			document.getElementById('id_amueblaventa').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amueblaventa').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_transporte')){
		if(document.getElementById('id_transporte').disabled == false){
			document.getElementById('id_transporte').disabled = true;
			setTimeout(function(){
			document.getElementById('id_transporte').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_importante')){
		if(document.getElementById('id_importante').disabled == false){
			document.getElementById('id_importante').disabled = true;
			setTimeout(function(){
			document.getElementById('id_importante').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_garaje')){
		if(document.getElementById('id_garaje').disabled == false){
			document.getElementById('id_garaje').disabled = true;
			setTimeout(function(){
			document.getElementById('id_garaje').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_incluido')){
		if(document.getElementById('id_incluido').disabled == false){
			document.getElementById('id_incluido').disabled = true;
			setTimeout(function(){
			document.getElementById('id_incluido').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_precio')){
		if(document.getElementById('id_precio').disabled == false){
			document.getElementById('id_precio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_precio').disabled = false;}, 1750)
		}
	}



	if(document.getElementById('id_edificio')){
		if(document.getElementById('id_edificio').disabled == false){
			document.getElementById('id_edificio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_edificio').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_nota')){
		if(document.getElementById('id_nota').disabled == false){
			document.getElementById('id_nota').disabled = true;
			setTimeout(function(){
			document.getElementById('id_nota').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_alquiler')){
		if(document.getElementById('id_alquiler').disabled == false){
			document.getElementById('id_alquiler').disabled = true;
			setTimeout(function(){
			document.getElementById('id_alquiler').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_info')){
		if(document.getElementById('id_info').disabled == false){
			document.getElementById('id_info').disabled = true;
			setTimeout(function(){
			document.getElementById('id_info').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_pago')){
		if(document.getElementById('id_pago').disabled == false){
			document.getElementById('id_pago').disabled = true;
			setTimeout(function(){
			document.getElementById('id_pago').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_requisitos')){
		if(document.getElementById('id_requisitos').disabled == false){
			document.getElementById('id_requisitos').disabled = true;
			setTimeout(function(){
			document.getElementById('id_requisitos').disabled = false;}, 1750)
		}
	}
	
}	



function bloquea5(){

	if(document.getElementById('id_fotos')){
		if(document.getElementById('id_fotos').disabled == false){
			document.getElementById('id_fotos').disabled = true;
			setTimeout(function(){
			document.getElementById('id_fotos').disabled = false;}, 1750)
		}
	}


	if(document.getElementById('id_barrio')){
		if(document.getElementById('id_barrio').disabled == false){
			document.getElementById('id_barrio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_barrio').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_mapa')){
		if(document.getElementById('id_mapa').disabled == false){
			document.getElementById('id_mapa').disabled = true;
			setTimeout(function(){
			document.getElementById('id_mapa').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_plano')){
		if(document.getElementById('id_plano').disabled == false){
			document.getElementById('id_plano').disabled = true;
			setTimeout(function(){
			document.getElementById('id_plano').disabled = false;}, 1750)
		}
	}

	/*if(document.getElementById('id_disponible')){
		if(document.getElementById('id_disponible').disabled == false){
			document.getElementById('id_disponible').disabled = true;
			setTimeout(function(){
			document.getElementById('id_disponible').disabled = false;}, 1750)
		}
	}*/

	if(document.getElementById('id_minimo')){
		if(document.getElementById('id_minimo').disabled == false){
			document.getElementById('id_minimo').disabled = true;
			setTimeout(function(){
			document.getElementById('id_minimo').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_maximo')){
		if(document.getElementById('id_maximo').disabled == false){
			document.getElementById('id_maximo').disabled = true;
			setTimeout(function(){
			document.getElementById('id_maximo').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_estado')){
		if(document.getElementById('id_estado').disabled == false){
			document.getElementById('id_estado').disabled = true;
			setTimeout(function(){
			document.getElementById('id_estado').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_amuhab')){
		if(document.getElementById('id_amuhab').disabled == false){
			document.getElementById('id_amuhab').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amuhab').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_amueblado')){
		if(document.getElementById('id_amueblado').disabled == false){
			document.getElementById('id_amueblado').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amueblado').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_amueblaventa')){
		if(document.getElementById('id_amueblaventa').disabled == false){
			document.getElementById('id_amueblaventa').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amueblaventa').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_transporte')){
		if(document.getElementById('id_transporte').disabled == false){
			document.getElementById('id_transporte').disabled = true;
			setTimeout(function(){
			document.getElementById('id_transporte').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_importante')){
		if(document.getElementById('id_importante').disabled == false){
			document.getElementById('id_importante').disabled = true;
			setTimeout(function(){
			document.getElementById('id_importante').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_garaje')){
		if(document.getElementById('id_garaje').disabled == false){
			document.getElementById('id_garaje').disabled = true;
			setTimeout(function(){
			document.getElementById('id_garaje').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_incluido')){
		if(document.getElementById('id_incluido').disabled == false){
			document.getElementById('id_incluido').disabled = true;
			setTimeout(function(){
			document.getElementById('id_incluido').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_precio')){
		if(document.getElementById('id_precio').disabled == false){
			document.getElementById('id_precio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_precio').disabled = false;}, 1750)
		}
	}



	if(document.getElementById('id_edificio')){
		if(document.getElementById('id_edificio').disabled == false){
			document.getElementById('id_edificio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_edificio').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_nota')){
		if(document.getElementById('id_nota').disabled == false){
			document.getElementById('id_nota').disabled = true;
			setTimeout(function(){
			document.getElementById('id_nota').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_alquiler')){
		if(document.getElementById('id_alquiler').disabled == false){
			document.getElementById('id_alquiler').disabled = true;
			setTimeout(function(){
			document.getElementById('id_alquiler').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_info')){
		if(document.getElementById('id_info').disabled == false){
			document.getElementById('id_info').disabled = true;
			setTimeout(function(){
			document.getElementById('id_info').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_pago')){
		if(document.getElementById('id_pago').disabled == false){
			document.getElementById('id_pago').disabled = true;
			setTimeout(function(){
			document.getElementById('id_pago').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_requisitos')){
		if(document.getElementById('id_requisitos').disabled == false){
			document.getElementById('id_requisitos').disabled = true;
			setTimeout(function(){
			document.getElementById('id_requisitos').disabled = false;}, 1750)
		}
	}
	
}	



function bloquea4(){

	if(document.getElementById('id_fotos')){
		if(document.getElementById('id_fotos').disabled == false){
			document.getElementById('id_fotos').disabled = true;
			setTimeout(function(){
			document.getElementById('id_fotos').disabled = false;}, 1750)
		}
	}


	if(document.getElementById('id_barrio')){
		if(document.getElementById('id_barrio').disabled == false){
			document.getElementById('id_barrio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_barrio').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_mapa')){
		if(document.getElementById('id_mapa').disabled == false){
			document.getElementById('id_mapa').disabled = true;
			setTimeout(function(){
			document.getElementById('id_mapa').disabled = false;}, 1750)
		}
	}

	/*if(document.getElementById('id_plano')){
		if(document.getElementById('id_plano').disabled == false){
			document.getElementById('id_plano').disabled = true;
			setTimeout(function(){
			document.getElementById('id_plano').disabled = false;}, 1750)
		}
	}*/

	if(document.getElementById('id_disponible')){
		if(document.getElementById('id_disponible').disabled == false){
			document.getElementById('id_disponible').disabled = true;
			setTimeout(function(){
			document.getElementById('id_disponible').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_minimo')){
		if(document.getElementById('id_minimo').disabled == false){
			document.getElementById('id_minimo').disabled = true;
			setTimeout(function(){
			document.getElementById('id_minimo').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_maximo')){
		if(document.getElementById('id_maximo').disabled == false){
			document.getElementById('id_maximo').disabled = true;
			setTimeout(function(){
			document.getElementById('id_maximo').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_estado')){
		if(document.getElementById('id_estado').disabled == false){
			document.getElementById('id_estado').disabled = true;
			setTimeout(function(){
			document.getElementById('id_estado').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_amuhab')){
		if(document.getElementById('id_amuhab').disabled == false){
			document.getElementById('id_amuhab').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amuhab').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_amueblado')){
		if(document.getElementById('id_amueblado').disabled == false){
			document.getElementById('id_amueblado').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amueblado').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_amueblaventa')){
		if(document.getElementById('id_amueblaventa').disabled == false){
			document.getElementById('id_amueblaventa').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amueblaventa').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_transporte')){
		if(document.getElementById('id_transporte').disabled == false){
			document.getElementById('id_transporte').disabled = true;
			setTimeout(function(){
			document.getElementById('id_transporte').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_importante')){
		if(document.getElementById('id_importante').disabled == false){
			document.getElementById('id_importante').disabled = true;
			setTimeout(function(){
			document.getElementById('id_importante').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_garaje')){
		if(document.getElementById('id_garaje').disabled == false){
			document.getElementById('id_garaje').disabled = true;
			setTimeout(function(){
			document.getElementById('id_garaje').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_incluido')){
		if(document.getElementById('id_incluido').disabled == false){
			document.getElementById('id_incluido').disabled = true;
			setTimeout(function(){
			document.getElementById('id_incluido').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_precio')){
		if(document.getElementById('id_precio').disabled == false){
			document.getElementById('id_precio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_precio').disabled = false;}, 1750)
		}
	}



	if(document.getElementById('id_edificio')){
		if(document.getElementById('id_edificio').disabled == false){
			document.getElementById('id_edificio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_edificio').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_nota')){
		if(document.getElementById('id_nota').disabled == false){
			document.getElementById('id_nota').disabled = true;
			setTimeout(function(){
			document.getElementById('id_nota').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_alquiler')){
		if(document.getElementById('id_alquiler').disabled == false){
			document.getElementById('id_alquiler').disabled = true;
			setTimeout(function(){
			document.getElementById('id_alquiler').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_info')){
		if(document.getElementById('id_info').disabled == false){
			document.getElementById('id_info').disabled = true;
			setTimeout(function(){
			document.getElementById('id_info').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_pago')){
		if(document.getElementById('id_pago').disabled == false){
			document.getElementById('id_pago').disabled = true;
			setTimeout(function(){
			document.getElementById('id_pago').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_requisitos')){
		if(document.getElementById('id_requisitos').disabled == false){
			document.getElementById('id_requisitos').disabled = true;
			setTimeout(function(){
			document.getElementById('id_requisitos').disabled = false;}, 1750)
		}
	}
	
}	



function bloquea3(){

	if(document.getElementById('id_fotos')){
		if(document.getElementById('id_fotos').disabled == false){
			document.getElementById('id_fotos').disabled = true;
			setTimeout(function(){
			document.getElementById('id_fotos').disabled = false;}, 1750)
		}
	}


	if(document.getElementById('id_barrio')){
		if(document.getElementById('id_barrio').disabled == false){
			document.getElementById('id_barrio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_barrio').disabled = false;}, 1750)
		}
	}

	/*if(document.getElementById('id_mapa')){
		if(document.getElementById('id_mapa').disabled == false){
			document.getElementById('id_mapa').disabled = true;
			setTimeout(function(){
			document.getElementById('id_mapa').disabled = false;}, 1750)
		}
	}*/

	if(document.getElementById('id_plano')){
		if(document.getElementById('id_plano').disabled == false){
			document.getElementById('id_plano').disabled = true;
			setTimeout(function(){
			document.getElementById('id_plano').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_disponible')){
		if(document.getElementById('id_disponible').disabled == false){
			document.getElementById('id_disponible').disabled = true;
			setTimeout(function(){
			document.getElementById('id_disponible').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_minimo')){
		if(document.getElementById('id_minimo').disabled == false){
			document.getElementById('id_minimo').disabled = true;
			setTimeout(function(){
			document.getElementById('id_minimo').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_maximo')){
		if(document.getElementById('id_maximo').disabled == false){
			document.getElementById('id_maximo').disabled = true;
			setTimeout(function(){
			document.getElementById('id_maximo').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_estado')){
		if(document.getElementById('id_estado').disabled == false){
			document.getElementById('id_estado').disabled = true;
			setTimeout(function(){
			document.getElementById('id_estado').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_amuhab')){
		if(document.getElementById('id_amuhab').disabled == false){
			document.getElementById('id_amuhab').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amuhab').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_amueblado')){
		if(document.getElementById('id_amueblado').disabled == false){
			document.getElementById('id_amueblado').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amueblado').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_amueblaventa')){
		if(document.getElementById('id_amueblaventa').disabled == false){
			document.getElementById('id_amueblaventa').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amueblaventa').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_transporte')){
		if(document.getElementById('id_transporte').disabled == false){
			document.getElementById('id_transporte').disabled = true;
			setTimeout(function(){
			document.getElementById('id_transporte').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_importante')){
		if(document.getElementById('id_importante').disabled == false){
			document.getElementById('id_importante').disabled = true;
			setTimeout(function(){
			document.getElementById('id_importante').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_garaje')){
		if(document.getElementById('id_garaje').disabled == false){
			document.getElementById('id_garaje').disabled = true;
			setTimeout(function(){
			document.getElementById('id_garaje').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_incluido')){
		if(document.getElementById('id_incluido').disabled == false){
			document.getElementById('id_incluido').disabled = true;
			setTimeout(function(){
			document.getElementById('id_incluido').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_precio')){
		if(document.getElementById('id_precio').disabled == false){
			document.getElementById('id_precio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_precio').disabled = false;}, 1750)
		}
	}



	if(document.getElementById('id_edificio')){
		if(document.getElementById('id_edificio').disabled == false){
			document.getElementById('id_edificio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_edificio').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_nota')){
		if(document.getElementById('id_nota').disabled == false){
			document.getElementById('id_nota').disabled = true;
			setTimeout(function(){
			document.getElementById('id_nota').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_alquiler')){
		if(document.getElementById('id_alquiler').disabled == false){
			document.getElementById('id_alquiler').disabled = true;
			setTimeout(function(){
			document.getElementById('id_alquiler').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_info')){
		if(document.getElementById('id_info').disabled == false){
			document.getElementById('id_info').disabled = true;
			setTimeout(function(){
			document.getElementById('id_info').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_pago')){
		if(document.getElementById('id_pago').disabled == false){
			document.getElementById('id_pago').disabled = true;
			setTimeout(function(){
			document.getElementById('id_pago').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_requisitos')){
		if(document.getElementById('id_requisitos').disabled == false){
			document.getElementById('id_requisitos').disabled = true;
			setTimeout(function(){
			document.getElementById('id_requisitos').disabled = false;}, 1750)
		}
	}
	
}	



function bloquea1(){

	/*if(document.getElementById('id_fotos')){
		if(document.getElementById('id_fotos').disabled == false){
			document.getElementById('id_fotos').disabled = true;
			setTimeout(function(){
			document.getElementById('id_fotos').disabled = false;}, 1750)
		}
	}*/


	if(document.getElementById('id_barrio')){
		if(document.getElementById('id_barrio').disabled == false){
			document.getElementById('id_barrio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_barrio').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_mapa')){
		if(document.getElementById('id_mapa').disabled == false){
			document.getElementById('id_mapa').disabled = true;
			setTimeout(function(){
			document.getElementById('id_mapa').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_plano')){
		if(document.getElementById('id_plano').disabled == false){
			document.getElementById('id_plano').disabled = true;
			setTimeout(function(){
			document.getElementById('id_plano').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_disponible')){
		if(document.getElementById('id_disponible').disabled == false){
			document.getElementById('id_disponible').disabled = true;
			setTimeout(function(){
			document.getElementById('id_disponible').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_minimo')){
		if(document.getElementById('id_minimo').disabled == false){
			document.getElementById('id_minimo').disabled = true;
			setTimeout(function(){
			document.getElementById('id_minimo').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_maximo')){
		if(document.getElementById('id_maximo').disabled == false){
			document.getElementById('id_maximo').disabled = true;
			setTimeout(function(){
			document.getElementById('id_maximo').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_estado')){
		if(document.getElementById('id_estado').disabled == false){
			document.getElementById('id_estado').disabled = true;
			setTimeout(function(){
			document.getElementById('id_estado').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_amuhab')){
		if(document.getElementById('id_amuhab').disabled == false){
			document.getElementById('id_amuhab').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amuhab').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_amueblado')){
		if(document.getElementById('id_amueblado').disabled == false){
			document.getElementById('id_amueblado').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amueblado').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_amueblaventa')){
		if(document.getElementById('id_amueblaventa').disabled == false){
			document.getElementById('id_amueblaventa').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amueblaventa').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_transporte')){
		if(document.getElementById('id_transporte').disabled == false){
			document.getElementById('id_transporte').disabled = true;
			setTimeout(function(){
			document.getElementById('id_transporte').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_importante')){
		if(document.getElementById('id_importante').disabled == false){
			document.getElementById('id_importante').disabled = true;
			setTimeout(function(){
			document.getElementById('id_importante').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_garaje')){
		if(document.getElementById('id_garaje').disabled == false){
			document.getElementById('id_garaje').disabled = true;
			setTimeout(function(){
			document.getElementById('id_garaje').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_incluido')){
		if(document.getElementById('id_incluido').disabled == false){
			document.getElementById('id_incluido').disabled = true;
			setTimeout(function(){
			document.getElementById('id_incluido').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_precio')){
		if(document.getElementById('id_precio').disabled == false){
			document.getElementById('id_precio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_precio').disabled = false;}, 1750)
		}
	}



	if(document.getElementById('id_edificio')){
		if(document.getElementById('id_edificio').disabled == false){
			document.getElementById('id_edificio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_edificio').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_nota')){
		if(document.getElementById('id_nota').disabled == false){
			document.getElementById('id_nota').disabled = true;
			setTimeout(function(){
			document.getElementById('id_nota').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_alquiler')){
		if(document.getElementById('id_alquiler').disabled == false){
			document.getElementById('id_alquiler').disabled = true;
			setTimeout(function(){
			document.getElementById('id_alquiler').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_info')){
		if(document.getElementById('id_info').disabled == false){
			document.getElementById('id_info').disabled = true;
			setTimeout(function(){
			document.getElementById('id_info').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_pago')){
		if(document.getElementById('id_pago').disabled == false){
			document.getElementById('id_pago').disabled = true;
			setTimeout(function(){
			document.getElementById('id_pago').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_requisitos')){
		if(document.getElementById('id_requisitos').disabled == false){
			document.getElementById('id_requisitos').disabled = true;
			setTimeout(function(){
			document.getElementById('id_requisitos').disabled = false;}, 1750)
		}
	}
	
}	


function bloquea2(){

	if(document.getElementById('id_fotos')){
		if(document.getElementById('id_fotos').disabled == false){
			document.getElementById('id_fotos').disabled = true;
			setTimeout(function(){
			document.getElementById('id_fotos').disabled = false;}, 1750)
		}
	}


	/*if(document.getElementById('id_barrio')){
		if(document.getElementById('id_barrio').disabled == false){
			document.getElementById('id_barrio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_barrio').disabled = false;}, 1750)
		}
	}*/

	if(document.getElementById('id_mapa')){
		if(document.getElementById('id_mapa').disabled == false){
			document.getElementById('id_mapa').disabled = true;
			setTimeout(function(){
			document.getElementById('id_mapa').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_plano')){
		if(document.getElementById('id_plano').disabled == false){
			document.getElementById('id_plano').disabled = true;
			setTimeout(function(){
			document.getElementById('id_plano').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_disponible')){
		if(document.getElementById('id_disponible').disabled == false){
			document.getElementById('id_disponible').disabled = true;
			setTimeout(function(){
			document.getElementById('id_disponible').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_minimo')){
		if(document.getElementById('id_minimo').disabled == false){
			document.getElementById('id_minimo').disabled = true;
			setTimeout(function(){
			document.getElementById('id_minimo').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_maximo')){
		if(document.getElementById('id_maximo').disabled == false){
			document.getElementById('id_maximo').disabled = true;
			setTimeout(function(){
			document.getElementById('id_maximo').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_estado')){
		if(document.getElementById('id_estado').disabled == false){
			document.getElementById('id_estado').disabled = true;
			setTimeout(function(){
			document.getElementById('id_estado').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_amuhab')){
		if(document.getElementById('id_amuhab').disabled == false){
			document.getElementById('id_amuhab').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amuhab').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_amueblado')){
		if(document.getElementById('id_amueblado').disabled == false){
			document.getElementById('id_amueblado').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amueblado').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_amueblaventa')){
		if(document.getElementById('id_amueblaventa').disabled == false){
			document.getElementById('id_amueblaventa').disabled = true;
			setTimeout(function(){
			document.getElementById('id_amueblaventa').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_transporte')){
		if(document.getElementById('id_transporte').disabled == false){
			document.getElementById('id_transporte').disabled = true;
			setTimeout(function(){
			document.getElementById('id_transporte').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_importante')){
		if(document.getElementById('id_importante').disabled == false){
			document.getElementById('id_importante').disabled = true;
			setTimeout(function(){
			document.getElementById('id_importante').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_garaje')){
		if(document.getElementById('id_garaje').disabled == false){
			document.getElementById('id_garaje').disabled = true;
			setTimeout(function(){
			document.getElementById('id_garaje').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_incluido')){
		if(document.getElementById('id_incluido').disabled == false){
			document.getElementById('id_incluido').disabled = true;
			setTimeout(function(){
			document.getElementById('id_incluido').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_precio')){
		if(document.getElementById('id_precio').disabled == false){
			document.getElementById('id_precio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_precio').disabled = false;}, 1750)
		}
	}



	if(document.getElementById('id_edificio')){
		if(document.getElementById('id_edificio').disabled == false){
			document.getElementById('id_edificio').disabled = true;
			setTimeout(function(){
			document.getElementById('id_edificio').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_nota')){
		if(document.getElementById('id_nota').disabled == false){
			document.getElementById('id_nota').disabled = true;
			setTimeout(function(){
			document.getElementById('id_nota').disabled = false;}, 1750)
		}
	}
	if(document.getElementById('id_alquiler')){
		if(document.getElementById('id_alquiler').disabled == false){
			document.getElementById('id_alquiler').disabled = true;
			setTimeout(function(){
			document.getElementById('id_alquiler').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_info')){
		if(document.getElementById('id_info').disabled == false){
			document.getElementById('id_info').disabled = true;
			setTimeout(function(){
			document.getElementById('id_info').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_pago')){
		if(document.getElementById('id_pago').disabled == false){
			document.getElementById('id_pago').disabled = true;
			setTimeout(function(){
			document.getElementById('id_pago').disabled = false;}, 1750)
		}
	}

	if(document.getElementById('id_requisitos')){
		if(document.getElementById('id_requisitos').disabled == false){
			document.getElementById('id_requisitos').disabled = true;
			setTimeout(function(){
			document.getElementById('id_requisitos').disabled = false;}, 1750)
		}
	}
	
}	




		
		var days = ["0","1","2","3","4","5","6"];
		if(available_days.length > 0){
			for(i=0;i<available_days.length;i++){
				switch (available_days[i].trim()){
					case 'Monday': days.splice(days.indexOf('1'),1); break;
					case 'Tuesday': days.splice(days.indexOf('2'),1); break;
					case 'Wednesday': days.splice(days.indexOf('3'),1); break;
					case 'Thursday': days.splice(days.indexOf('4'),1); break;
					case 'Friday': days.splice(days.indexOf('5'),1); break;
					case 'Saturday': days.splice(days.indexOf('6'),1); break;
					case 'Sunday': days.splice(days.indexOf('0'),1); break;
				}
			}
		}
		var disable_days = days.join(",");

		//var detalle=@json($detalle);

		var producion="https://www.iamoving.com/img/marker.ico";
		var desarrollo="https://www.iamoving.com/img/marker.ico";
		
		function initMap() {
//			console.log("Init Map");
			var myLatLng = null;
			if(latitud!=null && longitud!=null){
				myLatLng = {
					lat: parseFloat(latitud), 
					lng: parseFloat(longitud)
				}

			}else{
				myLatLng = { 
					lat:40.4381307,
					lng:-3.8199627
				}
			}

//			console.log(myLatLng);

			var mapa = $("#mapa");
//			console.log(mapa);

			//if($("#mapa").length > 0){
				var map = new google.maps.Map(document.getElementById('mapa'), {
					center: myLatLng,
					zoom: 16
				});

//				console.log(myLatLng);
				// Create a marker and set its position.
				var marker = new google.maps.Marker({
					map: map,
					position: myLatLng,
					icon: desarrollo
				});

//				console.log(marker);
			//}
			
		}
		


			$("#step2").hide();
			$("#step3").hide();
            $("#step4").hide();
            
            $('#modalCita').on('hidden.bs.modal', function () {
                $("#step2").hide();
    			$("#step3").hide();
                $("#step4").hide();
            });
            
            $('#modalPedido').on('hidden.bs.modal', function () {
                $("#step2").hide();
    			$("#step3").hide();
                $("#step4").hide();
            });
            
            console.log(is_sale);
            
			var today = new Date();
			var dd = today.getDate();
			var mm = today.getMonth() + 1;
			var yyyy = today.getFullYear();
			if (dd < 10) {
  				dd = '0' + dd;
			} 
			if (mm < 10) {
  				mm = '0' + mm;
			} 
			var today = dd + '/' + mm + '/' + yyyy;


			$('#date').datepicker({
                language: "en",
                format: "dd/mm/yyyy",
				//beforeShowDay: highlightDays,
      //todayHighlight: true,
      //startDate: new Date(),
	   startDate: today,
    			autoclose: true,
    			ignoreReadonly: true
				//orientation: 'top'
    			//daysOfWeekDisabled: disable_days
            });

			$('#fecha_desde').datepicker({
                language: "en",
                format: "dd/mm/yyyy",
    			startDate: today,
    			autoclose: true,
    			ignoreReadonly: true
				//orientation: 'top'
    			//daysOfWeekDisabled: disable_days
            });
            
            $('#p_fecha_desde').datepicker({
                language: "en",
                format: "dd/mm/yyyy",
    			startDate: today,
    			autoclose: true,
    			ignoreReadonly: true
    			//daysOfWeekDisabled: disable_days
            });
			
            $('.clockpicker').clockpicker({
				default: 'now',
			    placement: 'bottom',
			    align: 'left',
			    donetext: 'OK',
				autoclose: 'true'
			});
	
			$("#time").click(function(){
				//alert('hola2');
   $("#time").prop('readonly', true);
$("#date").prop('readonly', true);
			});

			$("#date").click(function(){
				//alert('hola2');
   $("#time").prop('readonly', true);
$("#date").prop('readonly', true);
			});			
			
         $("#date").hover(
            function(){
   $("#time").prop('readonly', true);
$("#date").prop('readonly', true);
           });

         $("#time").hover(
            function(){
   $("#time").prop('readonly', true);
$("#date").prop('readonly', true);
           });			   
			
			$("#btnSolicitarV").click(function(){
				//alert('hola2');
				$("#time").removeAttr("readonly");
				$("#date").removeAttr("readonly");
			});			
        // touchend events occur when you lift your finger
        /*$(document).on("touchend", function(e) {
            e.preventDefault();
            
   $("#time").prop('readonly', true);
$("#date").prop('readonly', true);
        });
		*/
			
	
/*$("#btnSolicitarV").mouseup(function() {
	alert('hola');
   $("#time").prop('readonly', true);
$("#date").prop('readonly', true);
});*/
			
			//para venta
			$("#btnSolicitar1").click(function(){
				$("#time").removeAttr("readonly");
				$("#date").removeAttr("readonly");
//$("#time").prop('readonly', true);
//$("#date").prop('readonly', true);
			});			

		$("#solicitar_visita").click(function(){
				$("#fecha_desde").removeAttr("readonly");
			});
			
		$("#p_solicitar_visita").click(function(){
				
				//cargaDatosUser();
				$("#p_fecha_desde").removeAttr("readonly");
			});
			
			
			
			$("#btnContinuar").click(function(){
				//reset poner
				//$("#citaForm")[0].reset();
				limpiarFormulario();
				cargaDatosUser();

				if($("#date").val()!='' && $("#time").val()!=''){
			var user = JSON.parse(localStorage.getItem("user"));
            console.log(user);
			console.log("cargaDatosUser");					
					if (user == null) {
						$("#nombre_completo").prop('required',true);
						$("#email_contacto").prop('required',true);
						$("#movil_contacto").prop('required',true);
						$("#acepta_condiciones").prop('required',true);					
					}					
					$("#step1").hide();
					$("#step2").show();	
					$("#step3").hide();
					$("#estudiando0").hide();
                    $("#estudiando01").hide();
                    $("#estudiando02").hide();
					//$("#estudiando1").hide();
					//$("#estudiando2").hide();
					$("#trabajando1").hide();
					$("#trabajando2").hide();
					$("#numero_personas").prop('required',true);
					$("#tipo_personas").prop('required',true);
					$("#estudias_o_trabajas").prop('required',true);
					$("#mascotas").prop('required',true);
					$("#fecha_desde").prop('required',true);
					$("#duracion_alquiler").prop('required',true);
					if($('select[name=estudias_o_trabajas]').val() == 'Trabajando' || $('select[name=estudias_o_trabajas]').val() == 'Jubilados'){
						$("#trabajando1").show();
                        if($('select[name=estudias_o_trabajas]').val() == 'Jubilados'){
                            $("#trabajando1").hide();
                        }
						$("#trabajando2").show();
						$("#estudiando0").hide();
                        $("#estudiando01").hide();
                        $("#estudiando02").hide();
						//$("#estudiando1").hide();					
						//$("#estudiando2").hide();					
						//$("#aval_1").prop('required',false);
						//$("#aval_2").prop('required',false);
						//$("#aval_3").prop('required',false);
						$("#trabajo").prop('required',true);
						$("#tipo_trabajo").prop('required',true);
                        if($('select[name=estudias_o_trabajas]').val() == 'Jubilados'){
                            $("#trabajo").prop('required',false);
                            $("#tipo_trabajo").prop('required',false);
                        }                        
						$("#tipo_contrato").prop('required',true);
						$("#sueldo_aproximado").prop('required',true);	
						
						$("#trabajo_normal").show();
						$("#trabajo_estudiar").hide();
						$("#trabajo_estudiar_trabajar").hide();					

						$("#tipo_trabajo_normal").show();
						$("#tipo_trabajo_estudiar").hide();
						$("#tipo_trabajo_estudiar_trabajar").hide();	

						$("#tipo_contrato_normal").show();
						$("#tipo_contrato_estudiar").hide();
						$("#tipo_contrato_estudiar_trabajar").hide();

						$("#sueldo_aproximado_normal").show();
						$("#sueldo_aproximado_estudiar").hide();
						$("#sueldo_aproximado_estudiar_trabajar").hide();					
					}
					if($('select[name=estudias_o_trabajas]').val() == 'Estudiando' || $('select[name=estudias_o_trabajas]').val() =='Sin trabajar'){
						$("#trabajando1").show();
						$("#trabajando2").show();
                            $("#estudiando0").hide();
                            if($('select[name=estudias_o_trabajas]').val() == 'Estudiando'){
                                $("#estudiando01").show();
                                $("#estudiando02").hide();
                            }
                            if($('select[name=estudias_o_trabajas]').val() == 'Sin trabajar'){
                                $("#estudiando02").show();
                                $("#estudiando01").hide();
                            }   
						//$("#estudiando1").show();					
						//$("#estudiando2").show();					
						//$("#aval_1").prop('required',true);
						//$("#aval_2").prop('required',true);
						//$("#aval_3").prop('required',true);
						$("#trabajo").prop('required',true);
						$("#tipo_trabajo").prop('required',true);
						$("#tipo_contrato").prop('required',true);
						$("#sueldo_aproximado").prop('required',true);
						
						/*$("#tipo_trabajo_normal").hide();
						$("#tipo_trabajo_estudiar").show();
						$("#tipo_trabajo_estudiar_trabajar").hide();*/
						
						$("#trabajo_normal").hide();
						$("#trabajo_estudiar").show();
						$("#trabajo_estudiar_trabajar").hide();					

						$("#tipo_trabajo_normal").hide();
						$("#tipo_trabajo_estudiar").show();
						$("#tipo_trabajo_estudiar_trabajar").hide();	

						$("#tipo_contrato_normal").hide();
						$("#tipo_contrato_estudiar").show();
						$("#tipo_contrato_estudiar_trabajar").hide();

						$("#sueldo_aproximado_normal").hide();
						$("#sueldo_aproximado_estudiar").show();
						$("#sueldo_aproximado_estudiar_trabajar").hide();					
						//$("label[for='lbl_tipo_trabajo']").text("10 kms");
						/*var selected = $("option:selected", this).text().trim();

						if(selected == "Estudiando")
						{
							$("label[for = lbl_tipo_trabajo]").text("mm");
						}
						else if(selected == "Sin trabajar")
						{
							$("label[for = lbl_tipo_trabajo]").text("inches");  
						}*/					
					}

					if($('select[name=estudias_o_trabajas]').val() == 'Estudiando y trabajando'){
						$("#trabajando1").show();
						$("#trabajando2").show();
						$("#estudiando0").show();
                            $("#estudiando01").hide();
                            $("#estudiando02").hide();                        
						//$("#estudiando1").show();					
						//$("#estudiando2").show();					
						//$("#aval_1").prop('required',true);
						//$("#aval_2").prop('required',true);
						//$("#aval_3").prop('required',true);
						$("#trabajo").prop('required',true);
						$("#tipo_trabajo").prop('required',true);
						$("#tipo_contrato").prop('required',true);
						$("#sueldo_aproximado").prop('required',true);	

						/*$("#tipo_trabajo_normal").hide();
						$("#tipo_trabajo_estudiar").hide();
						$("#tipo_trabajo_estudiar_trabajar").show();					*/
						$("#trabajo_normal").hide();
						$("#trabajo_estudiar").hide();
						$("#trabajo_estudiar_trabajar").show();					

						$("#tipo_trabajo_normal").hide();
						$("#tipo_trabajo_estudiar").hide();
						$("#tipo_trabajo_estudiar_trabajar").show();	

						$("#tipo_contrato_normal").hide();
						$("#tipo_contrato_estudiar").hide();
						$("#tipo_contrato_estudiar_trabajar").show();

						$("#sueldo_aproximado_normal").hide();
						$("#sueldo_aproximado_estudiar").hide();
						$("#sueldo_aproximado_estudiar_trabajar").show();					
					}
					if($('select[name=estudias_o_trabajas]').val() == ''){
						$("#trabajando1").hide();
						$("#trabajando2").hide();
						$("#estudiando0").hide();
                        $("#estudiando01").hide();
                        $("#estudiando02").hide();
						//$("#estudiando1").hide();					
						//$("#estudiando2").hide();					
						//$("#aval_1").prop('required',false);
						//$("#aval_2").prop('required',false);
						//$("#aval_3").prop('required',false);
						$("#trabajo").prop('required',false);
						$("#tipo_trabajo").prop('required',false);
						$("#tipo_contrato").prop('required',false);
						$("#sueldo_aproximado").prop('required',false);	
						
						$("#trabajo_normal").hide();
						$("#trabajo_estudiar").hide();
						$("#trabajo_estudiar_trabajar").hide();					

						$("#tipo_trabajo_normal").hide();
						$("#tipo_trabajo_estudiar").hide();
						$("#tipo_trabajo_estudiar_trabajar").hide();	

						$("#tipo_contrato_normal").hide();
						$("#tipo_contrato_estudiar").hide();
						$("#tipo_contrato_estudiar_trabajar").hide();

						$("#sueldo_aproximado_normal").hide();
						$("#sueldo_aproximado_estudiar").hide();
						$("#sueldo_aproximado_estudiar_trabajar").hide();							
						
					}					
				}
				else
				{
					//alert('Alquilando');
					//TOCAR ESTO PARA QUE SALTE EL REQUIREDD!!!
					//$("#time").removeAttr("readonly");
					//$("#date").removeAttr("readonly");
					//$("#time").prop('required',true);
					//$("#date").prop('required',true);					
				}
			});	

			$("select[name=estudias_o_trabajas]").change(function(){
				//alert($('select[name=estudias_o_trabajas]').val());
				if($('select[name=estudias_o_trabajas]').val() == 'Trabajando' || $('select[name=estudias_o_trabajas]').val() == 'Jubilados'){
					$("#trabajando1").show();
                    if($('select[name=estudias_o_trabajas]').val() == 'Jubilados'){
                        $("#trabajando1").hide();
                    }
					$("#trabajando2").show();
					$("#estudiando0").hide();
                    $("#estudiando01").hide();
                    $("#estudiando02").hide();
					//$("#estudiando1").hide();					
					//$("#estudiando2").hide();					
					//$("#aval_1").prop('required',false);
					//$("#aval_2").prop('required',false);
					//$("#aval_3").prop('required',false);
					$("#trabajo").prop('required',true);
					$("#tipo_trabajo").prop('required',true);
                    if($('select[name=estudias_o_trabajas]').val() == 'Jubilados'){
                        $("#trabajo").prop('required',false);
                        $("#tipo_trabajo").prop('required',false);
                    }                    
					$("#tipo_contrato").prop('required',true);
					$("#sueldo_aproximado").prop('required',true);	
					
					$("#trabajo_normal").show();
					$("#trabajo_estudiar").hide();
					$("#trabajo_estudiar_trabajar").hide();					

					$("#tipo_trabajo_normal").show();
					$("#tipo_trabajo_estudiar").hide();
					$("#tipo_trabajo_estudiar_trabajar").hide();	

					$("#tipo_contrato_normal").show();
					$("#tipo_contrato_estudiar").hide();
					$("#tipo_contrato_estudiar_trabajar").hide();

					$("#sueldo_aproximado_normal").show();
					$("#sueldo_aproximado_estudiar").hide();
					$("#sueldo_aproximado_estudiar_trabajar").hide();					
				}
				if($('select[name=estudias_o_trabajas]').val() == 'Estudiando' || $('select[name=estudias_o_trabajas]').val() =='Sin trabajar'){
					$("#trabajando1").show();
					$("#trabajando2").show();
                            $("#estudiando0").hide();
                            if($('select[name=estudias_o_trabajas]').val() == 'Estudiando'){
                                $("#estudiando01").show();
                                $("#estudiando02").hide();
                            }
                            if($('select[name=estudias_o_trabajas]').val() == 'Sin trabajar'){
                                $("#estudiando02").show();
                                $("#estudiando01").hide();
                            }
					//$("#estudiando1").show();					
					//$("#estudiando2").show();					
					//$("#aval_1").prop('required',true);
					//$("#aval_2").prop('required',true);
					//$("#aval_3").prop('required',true);
					$("#trabajo").prop('required',true);
					$("#tipo_trabajo").prop('required',true);
					$("#tipo_contrato").prop('required',true);
					$("#sueldo_aproximado").prop('required',true);
					
					/*$("#tipo_trabajo_normal").hide();
					$("#tipo_trabajo_estudiar").show();
					$("#tipo_trabajo_estudiar_trabajar").hide();*/
					
					$("#trabajo_normal").hide();
					$("#trabajo_estudiar").show();
					$("#trabajo_estudiar_trabajar").hide();					

					$("#tipo_trabajo_normal").hide();
					$("#tipo_trabajo_estudiar").show();
					$("#tipo_trabajo_estudiar_trabajar").hide();	

					$("#tipo_contrato_normal").hide();
					$("#tipo_contrato_estudiar").show();
					$("#tipo_contrato_estudiar_trabajar").hide();

					$("#sueldo_aproximado_normal").hide();
					$("#sueldo_aproximado_estudiar").show();
					$("#sueldo_aproximado_estudiar_trabajar").hide();					
					//$("label[for='lbl_tipo_trabajo']").text("10 kms");
					/*var selected = $("option:selected", this).text().trim();

					if(selected == "Estudiando")
					{
						$("label[for = lbl_tipo_trabajo]").text("mm");
					}
					else if(selected == "Sin trabajar")
					{
						$("label[for = lbl_tipo_trabajo]").text("inches");  
					}*/					
				}

				if($('select[name=estudias_o_trabajas]').val() == 'Estudiando y trabajando'){
					$("#trabajando1").show();
					$("#trabajando2").show();
					$("#estudiando0").show();
                            $("#estudiando01").hide();
                            $("#estudiando02").hide();                    
					//$("#estudiando1").show();					
					//$("#estudiando2").show();					
					//$("#aval_1").prop('required',true);
					//$("#aval_2").prop('required',true);
					//$("#aval_3").prop('required',true);
					$("#trabajo").prop('required',true);
					$("#tipo_trabajo").prop('required',true);
					$("#tipo_contrato").prop('required',true);
					$("#sueldo_aproximado").prop('required',true);	

					/*$("#tipo_trabajo_normal").hide();
					$("#tipo_trabajo_estudiar").hide();
					$("#tipo_trabajo_estudiar_trabajar").show();					*/
					$("#trabajo_normal").hide();
					$("#trabajo_estudiar").hide();
					$("#trabajo_estudiar_trabajar").show();					

					$("#tipo_trabajo_normal").hide();
					$("#tipo_trabajo_estudiar").hide();
					$("#tipo_trabajo_estudiar_trabajar").show();	

					$("#tipo_contrato_normal").hide();
					$("#tipo_contrato_estudiar").hide();
					$("#tipo_contrato_estudiar_trabajar").show();

					$("#sueldo_aproximado_normal").hide();
					$("#sueldo_aproximado_estudiar").hide();
					$("#sueldo_aproximado_estudiar_trabajar").show();					
				}
				if($('select[name=estudias_o_trabajas]').val() == ''){
					$("#trabajando1").hide();
					$("#trabajando2").hide();
					$("#estudiando0").hide();
                            $("#estudiando01").hide();
                            $("#estudiando02").hide();                                   
					//$("#estudiando1").hide();					
					//$("#estudiando2").hide();					
					//$("#aval_1").prop('required',false);
					//$("#aval_2").prop('required',false);
					//$("#aval_3").prop('required',false);
					$("#trabajo").prop('required',false);
					$("#tipo_trabajo").prop('required',false);
					$("#tipo_contrato").prop('required',false);
					$("#sueldo_aproximado").prop('required',false);	
					
					$("#trabajo_normal").hide();
					$("#trabajo_estudiar").hide();
					$("#trabajo_estudiar_trabajar").hide();					

					$("#tipo_trabajo_normal").hide();
					$("#tipo_trabajo_estudiar").hide();
					$("#tipo_trabajo_estudiar_trabajar").hide();	

					$("#tipo_contrato_normal").hide();
					$("#tipo_contrato_estudiar").hide();
					$("#tipo_contrato_estudiar_trabajar").hide();

					$("#sueldo_aproximado_normal").hide();
					$("#sueldo_aproximado_estudiar").hide();
					$("#sueldo_aproximado_estudiar_trabajar").hide();							
					
				}			
            //$('input[name=valor1]').val($(this).val());
							/*				Trabajando
								Estudiando

								Sin trabajar
								Estudiando y trabajando*/
			});
			
			$("#btn_Continuar2").click(function(){
				//if($("#date").val()!='' && $("#time").val()!=''){
					$("#step1").hide();
					$("#step2").hide();	
					$("#step3").show();	
					$("#step4").hide();
					//$("#numero_personas").prop('required',true);
				//}
			});				
	            //ESTO COMENTADO Y NO DEBERÃ­A ESTARLO SEGUN SIGFREDO INICIO!!!
		   /* informe_foto: false,
		    informe_barrio: false,
		    informe_mapa: false,
		    collapse_data: []*/
			//ESTO ESTABA DESCOMENTADO FIN!!!!!!!!!!!!!!!!!
			
			/*function wasInfoViewed(){
			    return viewed_data['informe_foto'] && viewed_data['informe_barrio'] && viewed_data['informe_mapa'] && viewed_data['collapse_data'] === total_collapse_data;
			}*/

			$("#salevisita").click(function(){
				$('html, body').animate({scrollTop:0}, 'slow'); 
				});


				$("#pedido_reservar_logado").click(function(){
				//$('html, body').animate({scrollTop:0}, 'slow'); 
				$("#citaForm")[0].reset();
				$("#citaFormPedido")[0].reset();
				cargaDatosUser();
				});

				$("#pedido_reservar").click(function(){
				$('html, body').animate({scrollTop:0}, 'slow'); 
				$("#citaForm")[0].reset();
				$("#citaFormPedido")[0].reset();
				cargaDatosUser();
				});

			$("#btnAtras").click(function(){
				//alert('hola');
				$("#step2").hide();
				$("#step3").hide();
				$("#step1").show();
				$("#numero_personas").prop('required',false);
				$("#tipo_personas").prop('required',false);
				$("#estudias_o_trabajas").prop('required',false);
				$("#mascotas").prop('required',false);
				$("#fecha_desde").prop('required',false);
				$("#duracion_alquiler").prop('required',false);	
				/*$("#aval_1").prop('required',false);
				$("#aval_2").prop('required',false);
				$("#aval_3").prop('required',false);*/
				$("#trabajo").prop('required',false);
				$("#tipo_trabajo").prop('required',false);
				$("#tipo_contrato").prop('required',false);
				$("#sueldo_aproximado").prop('required',false);	
			var user = JSON.parse(localStorage.getItem("user"));
            console.log(user);
			console.log("cargaDatosUser");				
				if (user == null) {
					$("#nombre_completo").prop('required',false);
					$("#email_contacto").prop('required',false);
					$("#movil_contacto").prop('required',false);
					$("#acepta_condiciones").prop('required',false);					
				}				
			});

			$("#btnAtras2").click(function(){
				$("#step2").show();
				$("#step1").hide();
				$("#step3").hide();
				$("#step4").hide();
			});
			
			/*if(is_sale == '0'){
				$("#numero_personas").prop('required',true);
				$("#tipo_personas").prop('required',true);
				$("#trabajo").prop('required',true);
				$("#tipo_trabajo").prop('required',true);
				$("#estudiante").prop('required',true);
				$("#tipo_estudiante").prop('required',true);
			}else{
				$("#numero_personas").prop('required',false);
				$("#tipo_personas").prop('required',false);
				$("#trabajo").prop('required',false);
				$("#tipo_trabajo").prop('required',false);
				$("#estudiante").prop('required',false);
				$("#tipo_estudiante").prop('required',false);
			}*/		
			
			//modal pedidos
            $("#p_estudiando0").hide();
            $("#p_estudiando01").hide();
            $("#p_estudiando02").hide();
            $("#p_trabajando1").hide();
            $("#p_trabajando2").hide();
            $("#p_numero_personas").prop('required',true);
            $("#p_tipo_personas").prop('required',true);
            $("#p_estudias_o_trabajas").prop('required',true);
            $("#p_mascotas").prop('required',true);
            $("#p_fecha_desde").prop('required',true);
            $("#p_duracion_alquiler").prop('required',true);
			$("#p_sueldo_aproximado").prop('required',true);
            $("#p_tipo_contrato").prop('required',true);
            $("#p_tipo_trabajo").prop('required',true);
            $("#p_trabajo").prop('required',true);	
			var user = JSON.parse(localStorage.getItem("user"));
            console.log(user);
			console.log("cargaDatosUser");			
				if (user == null) {
					$("#p_nombre_completo").prop('required',true);
					$("#p_email_contacto").prop('required',true);
					$("#p_movil_contacto").prop('required',true);
					$("#p_acepta_condiciones").prop('required',true);					
				}			
			
            $("#p_estudias_o_trabajas").change(function(){
            if($('select[name=p_estudias_o_trabajas]').val() == 'Trabajando' || $('select[name=p_estudias_o_trabajas]').val() == 'Jubilados'){
                    $("#p_trabajando1").show();
                    if($('select[name=p_estudias_o_trabajas]').val() == 'Jubilados'){
                        $("#p_trabajando1").hide();
                    }
                    $("#p_trabajando2").show();
                    $("#p_estudiando0").hide();
            $("#p_estudiando01").hide();
            $("#p_estudiando02").hide();                    
                    $("#p_trabajo").prop('required',true);
                    $("#p_tipo_trabajo").prop('required',true);
                    if($('select[name=p_estudias_o_trabajas]').val() == 'Jubilados'){
                        $("#p_trabajo").prop('required',false);
                        $("#p_tipo_trabajo").prop('required',false);
                    }                    
                    $("#p_tipo_contrato").prop('required',true);
                    $("#p_sueldo_aproximado").prop('required',true);  
                    
                    $("#p_trabajo_normal").show();
                    $("#p_trabajo_estudiar").hide();
                    $("#p_trabajo_estudiar_trabajar").hide();                 
    
                    $("#p_tipo_trabajo_normal").show();
                    $("#p_tipo_trabajo_estudiar").hide();
                    $("#p_tipo_trabajo_estudiar_trabajar").hide();    
    
                    $("#p_tipo_contrato_normal").show();
                    $("#p_tipo_contrato_estudiar").hide();
                    $("#p_tipo_contrato_estudiar_trabajar").hide();
    
                    $("#p_sueldo_aproximado_normal").show();
                    $("#p_sueldo_aproximado_estudiar").hide();
                    $("#p_sueldo_aproximado_estudiar_trabajar").hide();                   
                }
                if($('select[name=p_estudias_o_trabajas]').val() == 'Estudiando' || $('select[name=p_estudias_o_trabajas]').val() =='Sin trabajar'){
                    $("#p_trabajando1").show();
                    $("#p_trabajando2").show();
                            $("#p_estudiando0").hide();
                            if($('select[name=p_estudias_o_trabajas]').val() == 'Estudiando'){
                                $("#p_estudiando01").show();
                                $("#p_estudiando02").hide();
                            }
                            if($('select[name=p_estudias_o_trabajas]').val() == 'Sin trabajar'){
                                $("#p_estudiando02").show();
                                $("#p_estudiando01").hide();
                            }               
                    
                    $("#p_trabajo").prop('required',true);
                    $("#p_tipo_trabajo").prop('required',true);
                    $("#p_tipo_contrato").prop('required',true);
                    $("#p_sueldo_aproximado").prop('required',true);
                    
                    
                    $("#p_trabajo_normal").hide();
                    $("#p_trabajo_estudiar").show();
                    $("#p_trabajo_estudiar_trabajar").hide();                 
    
                    $("#p_tipo_trabajo_normal").hide();
                    $("#p_tipo_trabajo_estudiar").show();
                    $("#p_tipo_trabajo_estudiar_trabajar").hide();    
    
                    $("#p_tipo_contrato_normal").hide();
                    $("#p_tipo_contrato_estudiar").show();
                    $("#p_tipo_contrato_estudiar_trabajar").hide();
    
                    $("#p_sueldo_aproximado_normal").hide();
                    $("#p_sueldo_aproximado_estudiar").show();
                    $("#p_sueldo_aproximado_estudiar_trabajar").hide();                   
                                   
                }
    
                if($('select[name=p_estudias_o_trabajas]').val() == 'Estudiando y trabajando'){
                    $("#p_trabajando1").show();
                    $("#p_trabajando2").show();
                            $("#p_estudiando0").show();
                            $("#p_estudiando01").hide();
                            $("#p_estudiando02").hide();
                    $("#p_trabajo").prop('required',true);
                    $("#p_tipo_trabajo").prop('required',true);
                    $("#p_tipo_contrato").prop('required',true);
                    $("#p_sueldo_aproximado").prop('required',true);  
                    $("#p_trabajo_normal").hide();
                    $("#p_trabajo_estudiar").hide();
                    $("#p_trabajo_estudiar_trabajar").show();                 
    
                    $("#p_tipo_trabajo_normal").hide();
                    $("#p_tipo_trabajo_estudiar").hide();
                    $("#p_tipo_trabajo_estudiar_trabajar").show();    
    
                    $("#p_tipo_contrato_normal").hide();
                    $("#p_tipo_contrato_estudiar").hide();
                    $("#p_tipo_contrato_estudiar_trabajar").show();
    
                    $("#p_sueldo_aproximado_normal").hide();
                    $("#p_sueldo_aproximado_estudiar").hide();
                    $("#p_sueldo_aproximado_estudiar_trabajar").show();                   
                }
                if($('select[name=p_estudias_o_trabajas]').val() == ''){
                    $("#p_trabajando1").hide();
                    $("#p_trabajando2").hide();
                    $("#p_estudiando0").hide();
                            $("#p_estudiando01").hide();
                            $("#p_estudiando02").hide();                    
                    $("#p_trabajo").prop('required',false);
                    $("#p_tipo_trabajo").prop('required',false);
                    $("#p_tipo_contrato").prop('required',false);
                    $("#p_sueldo_aproximado").prop('required',false); 
                    
                    $("#p_trabajo_normal").hide();
                    $("#p_trabajo_estudiar").hide();
                    $("#p_trabajo_estudiar_trabajar").hide();                 
    
                    $("#p_tipo_trabajo_normal").hide();
                    $("#p_tipo_trabajo_estudiar").hide();
                    $("#p_tipo_trabajo_estudiar_trabajar").hide();    
    
                    $("#p_tipo_contrato_normal").hide();
                    $("#p_tipo_contrato_estudiar").hide();
                    $("#p_tipo_contrato_estudiar_trabajar").hide();
    
                    $("#p_sueldo_aproximado_normal").hide();
                    $("#p_sueldo_aproximado_estudiar").hide();
                    $("#p_sueldo_aproximado_estudiar_trabajar").hide();                           
                    
                }
            });


            $("#btnContinuarSale").click(function(){
			if($("#date").val()!='' && $("#time").val()!=''){
                $("#step4").show();
                $("#step1").hide();
				$("#step2").hide();
				$("#step3").hide();
				$("#live_spain").prop('required',true);
                $("#inversor").prop('required',true);
                $("#credito").prop('required',true);
			var user = JSON.parse(localStorage.getItem("user"));
            console.log(user);
			console.log("cargaDatosUser");				
					if (user == null) {
						$("#nombre_completo_venta").prop('required',true);
						$("#email_contacto_venta").prop('required',true);
						$("#movil_contacto_venta").prop('required',true);
						$("#acepta_condiciones_venta").prop('required',true);					
					}				
				}
                
            });
            
            $("#btnAtrasSale").click(function(){
                $("#step1").show();
				$("#step2").hide();
				$("#step1").show();
				$("#step3").hide();
				$("#step4").hide();
				$("#live_spain").prop('required',false);
                $("#inversor").prop('required',false);
                $("#credito").prop('required',false);
			var user = JSON.parse(localStorage.getItem("user"));
            console.log(user);
			console.log("cargaDatosUser");				
					if (user == null) {
						$("#nombre_completo_venta").prop('required',false);
						$("#email_contacto_venta").prop('required',false);
						$("#movil_contacto_venta").prop('required',false);
						$("#acepta_condiciones_venta").prop('required',false);					
					}				
				
			});
            


			setTimeout(function () { 
    			initMap();
			}, 2000);

			
				//poner resert
				$("#citaForm")[0].reset();
				$("#citaFormPedido")[0].reset();
				cargaDatosUser();
			 
            //$("#phone").val(user.phone);
	}); // end event dom

	function limpiarFormulario(){
					$("#numero_personas").val("");
				//}
				$("#tipo_personas").val("");
				$("#estudias_o_trabajas").val("");
				$("#mascotas").val("");
				$("#trabajo").val("");
				$("#tipo_trabajo").val("");
				$("#tipo_contrato").val("");
				$("#sueldo_aproximado").val("");	
					$("#fecha_desde").val("");	
								$("#duracion_alquiler").val("");
				$("#comentario_persona").val("");
			var user = JSON.parse(localStorage.getItem("user"));
            console.log(user);
			console.log("cargaDatosUser");				
				if (user == null) {
					$("#nombre_completo").val("");	
					$("#email_contacto").val("");	
					$("#movil_contacto").val("");
					$("#acepta_condiciones").val("");					
				}
		
	}
	function cargaDatosUser(){
			var user = JSON.parse(localStorage.getItem("user"));
            console.log(user);
			console.log("cargaDatosUser");
			 if (user !== null) {		
				//if (user.numpersonas_alquiler !== null){
					$("#numero_personas").val(user.numpersonas_alquiler);
				//}
				$("#tipo_personas").val(user.familia_alquiler);
				$("#estudias_o_trabajas").val(user.estudias_o_trabajas);
				$("#mascotas").val(user.mascotas);
				$("#trabajo").val(user.dondetrabajas_alquiler);
				$("#tipo_trabajo").val(user.trabajo_alquiler);
				$("#tipo_contrato").val(user.tipocontrato_alquiler);
				$("#sueldo_aproximado").val(user.sueldoaproximado_alquiler);
				var today = new Date();
				var dd = today.getDate();

				var mm = today.getMonth()+1; 
				var yyyy = today.getFullYear();
				if(dd<10) 
				{
					dd='0'+dd;
				} 

				if(mm<10) 
				{
					mm='0'+mm;
				} 			
				today = dd+'/'+mm+'/'+yyyy;
				var fechaFormulario = user.fecha_desde_alquiler;
				// Comparamos solo las fechas => no las horas!!
				//hoy.setHours(0,0,0,0);
				//fechaFormulario.setHours(0,0,0,0); // Lo iniciamos a 00:00 horas

				if (today <= fechaFormulario) {
					//alert('mayor');
					$("#fecha_desde").val(user.fecha_desde_alquiler);
				}
				else{
					//alert('menor');
					$("#fecha_desde").val('');
				}			
				$("#duracion_alquiler").val(user.duracion_alquiler);
				$("#comentario_persona").val(user.sobreti_alquiler);			
				
				$("#p_numero_personas").val(user.numpersonas_alquiler);
				$("#p_tipo_personas").val(user.familia_alquiler);			
				$("#p_estudias_o_trabajas").val(user.estudias_o_trabajas);
				$("#p_mascotas").val(user.mascotas);
				$("#p_trabajo").val(user.dondetrabajas_alquiler);
				$("#p_tipo_trabajo").val(user.trabajo_alquiler);
				$("#p_tipo_contrato").val(user.tipocontrato_alquiler);
				$("#p_sueldo_aproximado").val(user.sueldoaproximado_alquiler);
				//$("#p_fecha_desde").val(user.fecha_desde_alquiler);
				var p_today = new Date();
				var p_dd = p_today.getDate();

				var p_mm = p_today.getMonth()+1; 
				var p_yyyy = p_today.getFullYear();
				if(p_dd<10) 
				{
					p_dd='0'+p_dd;
				} 

				if(p_mm<10) 
				{
					p_mm='0'+p_mm;
				} 			
				p_today = p_dd+'/'+p_mm+'/'+p_yyyy;
				var p_fechaFormulario = user.fecha_desde_alquiler;
				// Comparamos solo las fechas => no las horas!!
				//p_hoy.setHours(0,0,0,0);
				//p_fechaFormulario.setHours(0,0,0,0); // Lo iniciamos a 00:00 horas
				
				//alert(user.fecha_desde_alquiler);
				//alert(p_hoy);
				//alert(p_fechaFormulario);
				if (p_today <= p_fechaFormulario) {
					//alert(p_fechaFormulario);
					//alert(p_today);
					
					//alert('mayor');
					$("#p_fecha_desde").val(user.fecha_desde_alquiler);
				}
				else{
					//alert(p_fechaFormulario);
					//alert(p_today);
									
					//alert('menor');
					$("#p_fecha_desde").val('');
				}
				$("#p_duracion_alquiler").val(user.duracion_alquiler);
				$("#p_comentario_persona").val(user.sobreti_alquiler);
				$("#p_contraoferta").val(user.contraoferta_alquiler);
				if($('select[name=p_estudias_o_trabajas]').val() == 'Trabajando' || $('select[name=p_estudias_o_trabajas]').val() == 'Jubilados'){
						$("#p_trabajando1").show();
                        if($('select[name=p_estudias_o_trabajas]').val() == 'Jubilados'){
                            $("#p_trabajando1").hide();
                        }
						$("#p_trabajando2").show();
						$("#p_estudiando0").hide();
                            $("#p_estudiando01").hide();
                            $("#p_estudiando02").hide();                        
						
                        $("#p_trabajo").prop('required',true);
						$("#p_tipo_trabajo").prop('required',true);
                        if($('select[name=p_estudias_o_trabajas]').val() == 'Jubilados'){
                            $("#p_trabajo").prop('required',false);
                            $("#p_tipo_trabajo").prop('required',false);
                        }                        
						$("#p_tipo_contrato").prop('required',true);
						$("#p_sueldo_aproximado").prop('required',true);  
						
						$("#p_trabajo_normal").show();
						$("#p_trabajo_estudiar").hide();
						$("#p_trabajo_estudiar_trabajar").hide();                 
		
						$("#p_tipo_trabajo_normal").show();
						$("#p_tipo_trabajo_estudiar").hide();
						$("#p_tipo_trabajo_estudiar_trabajar").hide();    
		
						$("#p_tipo_contrato_normal").show();
						$("#p_tipo_contrato_estudiar").hide();
						$("#p_tipo_contrato_estudiar_trabajar").hide();
		
						$("#p_sueldo_aproximado_normal").show();
						$("#p_sueldo_aproximado_estudiar").hide();
						$("#p_sueldo_aproximado_estudiar_trabajar").hide();                   
					}
					if($('select[name=p_estudias_o_trabajas]').val() == 'Estudiando' || $('select[name=p_estudias_o_trabajas]').val() =='Sin trabajar'){
						$("#p_trabajando1").show();
						$("#p_trabajando2").show();
                            $("#p_estudiando0").hide();
                            if($('select[name=p_estudias_o_trabajas]').val() == 'Estudiando'){
                                $("#p_estudiando01").show();
                                $("#p_estudiando02").hide();
                            }
                            if($('select[name=p_estudias_o_trabajas]').val() == 'Sin trabajar'){
                                $("#p_estudiando02").show();
                                $("#p_estudiando01").hide();
                            }                           
						
						$("#p_trabajo").prop('required',true);
						$("#p_tipo_trabajo").prop('required',true);
						$("#p_tipo_contrato").prop('required',true);
						$("#p_sueldo_aproximado").prop('required',true);
						
						
						$("#p_trabajo_normal").hide();
						$("#p_trabajo_estudiar").show();
						$("#p_trabajo_estudiar_trabajar").hide();                 
		
						$("#p_tipo_trabajo_normal").hide();
						$("#p_tipo_trabajo_estudiar").show();
						$("#p_tipo_trabajo_estudiar_trabajar").hide();    
		
						$("#p_tipo_contrato_normal").hide();
						$("#p_tipo_contrato_estudiar").show();
						$("#p_tipo_contrato_estudiar_trabajar").hide();
		
						$("#p_sueldo_aproximado_normal").hide();
						$("#p_sueldo_aproximado_estudiar").show();
						$("#p_sueldo_aproximado_estudiar_trabajar").hide();                   
									   
					}
		
					if($('select[name=p_estudias_o_trabajas]').val() == 'Estudiando y trabajando'){
						$("#p_trabajando1").show();
						$("#p_trabajando2").show();
						$("#p_estudiando0").show();
                        $("#p_estudiando01").hide();
                        $("#p_estudiando02").hide();
						$("#p_trabajo").prop('required',true);
						$("#p_tipo_trabajo").prop('required',true);
						$("#p_tipo_contrato").prop('required',true);
						$("#p_sueldo_aproximado").prop('required',true);  
						$("#p_trabajo_normal").hide();
						$("#p_trabajo_estudiar").hide();
						$("#p_trabajo_estudiar_trabajar").show();                 
		
						$("#p_tipo_trabajo_normal").hide();
						$("#p_tipo_trabajo_estudiar").hide();
						$("#p_tipo_trabajo_estudiar_trabajar").show();    
		
						$("#p_tipo_contrato_normal").hide();
						$("#p_tipo_contrato_estudiar").hide();
						$("#p_tipo_contrato_estudiar_trabajar").show();
		
						$("#p_sueldo_aproximado_normal").hide();
						$("#p_sueldo_aproximado_estudiar").hide();
						$("#p_sueldo_aproximado_estudiar_trabajar").show();                   
					}
					
					if($('select[name=p_estudias_o_trabajas]').val() == ''){
						$("#p_trabajando1").hide();
						$("#p_trabajando2").hide();
						$("#p_estudiando0").hide();
                        $("#p_estudiando01").hide();
                        $("#p_estudiando02").hide();                        
						
						$("#p_trabajo").prop('required',false);
						$("#p_tipo_trabajo").prop('required',false);
						$("#p_tipo_contrato").prop('required',false);
						$("#p_sueldo_aproximado").prop('required',false); 
						
						$("#p_trabajo_normal").hide();
						$("#p_trabajo_estudiar").hide();
						$("#p_trabajo_estudiar_trabajar").hide();                 
		
						$("#p_tipo_trabajo_normal").hide();
						$("#p_tipo_trabajo_estudiar").hide();
						$("#p_tipo_trabajo_estudiar_trabajar").hide();    
		
						$("#p_tipo_contrato_normal").hide();
						$("#p_tipo_contrato_estudiar").hide();
						$("#p_tipo_contrato_estudiar_trabajar").hide();
		
						$("#p_sueldo_aproximado_normal").hide();
						$("#p_sueldo_aproximado_estudiar").hide();
						$("#p_sueldo_aproximado_estudiar_trabajar").hide();                           
						
					}
			 }
	}
	
	function preventSpecials(evt){
            if (evt.keyCode == 222 || evt.keyCode == 190 ||  evt.keyCode == 49 || evt.keyCode == 55 || evt.keyCode == 190 ||  evt.keyCode == 188){
                evt.preventDefault()
                return
            }
    }
	// Tooltips Initialization
	//Valido!!!
	/*$(function () {
	$('[data-toggle="tooltip"]').tooltip()
	})*/

	/*$(document).ready(function(){
    $("[rel=tooltip]").tooltip({ placement: 'right'});
});*/
$( function()
{
    var targets = $( '[rel~=tooltip]' ),
        target  = false,
        tooltip = false,
        title   = false;
 
    targets.bind( 'mouseenter', function()
    {
        target  = $( this );
        tip     = target.attr( 'title' );
        tooltip = $( '<div id="tooltip"></div>' );
 
        if( !tip || tip == '' )
            return false;
 
        target.removeAttr( 'title' );
        tooltip.css( 'opacity', 0 )
               .html( tip )
               .appendTo( 'body' );
 
        var init_tooltip = function()
        {
            if( $( window ).width() < tooltip.outerWidth() * 1.5 )
                tooltip.css( 'max-width', $( window ).width() / 2 );
            else
                tooltip.css( 'max-width', 340 );
 
            var pos_left = target.offset().left + ( target.outerWidth() / 2 ) - ( tooltip.outerWidth() / 2 ),
                pos_top  = target.offset().top - tooltip.outerHeight() - 20;
 
            if( pos_left < 0 )
            {
                pos_left = target.offset().left + target.outerWidth() / 2 - 20;
                tooltip.addClass( 'left' );
            }
            else
                tooltip.removeClass( 'left' );
 
            if( pos_left + tooltip.outerWidth() > $( window ).width() )
            {
                pos_left = target.offset().left - tooltip.outerWidth() + target.outerWidth() / 2 + 20;
                tooltip.addClass( 'right' );
            }
            else
                tooltip.removeClass( 'right' );
 
            if( pos_top < 0 )
            {
                var pos_top  = target.offset().top + target.outerHeight();
                tooltip.addClass( 'top' );
            }
            else
                tooltip.removeClass( 'top' );
 
            tooltip.css( { left: pos_left, top: pos_top } )
                   .animate( { top: '+=10', opacity: 1 }, 50 );
        };
 
        init_tooltip();
        $( window ).resize( init_tooltip );
 
        var remove_tooltip = function()
        {
            tooltip.animate( { top: '-=10', opacity: 0 }, 50, function()
            {
                $( this ).remove();
            });
 
            target.attr( 'title', tip );
        };
 
        target.bind( 'mouseleave', remove_tooltip );
        tooltip.bind( 'click', remove_tooltip );
    });
});
$(".more_info1").click(function () {
    var $title = $(this).find(".title");
    if (!$title.length) {
        $(this).append('<span class="title">' + $(this).attr("title") + '</span>');
    } else {
        $title.remove();
    }
});
function checkContenidos()
{
	                                Swal.fire(
                                    'Aviso',
                                    'Usted ya tiene una visita programada para este inmueble',
                                    'info'
                                ); 

}

	</script>
<script type="text/javascript">
var idleTime = 0;
$(document).ready(function () {
    //Increment the idle time counter every minute.
    var idleInterval = setInterval(timerIncrement, 60000); // 1 minute

    //Zero the idle timer on mouse movement.
    $(this).mousemove(function (e) {
        idleTime = 0;
    });
    $(this).keypress(function (e) {
        idleTime = 0;
    });
});

function timerIncrement() {
    idleTime = idleTime + 1;
    if (idleTime > 8) { // 27 minutes
        window.location.reload();
    }
}


</script> 	
@endsection
