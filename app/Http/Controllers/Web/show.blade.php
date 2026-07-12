@extends('layouts.web')
@section('title')
<?php
if ($detalle->estudio) {
    $inmueble= "Estudio";
} elseif ($detalle->loft) {
    $inmueble= "Loft";
} elseif ($detalle->apartamento) {
    $inmueble= "Apartamento";
} elseif ($detalle->piso) {
    $inmueble= "Piso";
} elseif ($detalle->chalet) {
    $inmueble= "Chalet";
} elseif ($detalle->bajo) {
    $inmueble= "Bajo";
} elseif ($detalle->atico) {
    $inmueble= "Ático";	
} else {
    $inmueble= "Piso";
}
if ($detalle->is_sale == '1'){
    $tipo=" en venta ";	
} else {
    $tipo=" en alquiler ";	
}
if($detalle->road)
{
    $dirección="en ".$detalle->road.", Madrid";
} 
	echo $inmueble.$tipo.$dirección." - Iamoving";
?>
@endsection
@section('description')
<?php
if ($detalle->estudio) {
    $inmueble= "Estudio";
} elseif ($detalle->loft) {
    $inmueble= "Loft";
} elseif ($detalle->apartamento) {
    $inmueble= "Apartamento";
} elseif ($detalle->piso) {
    $inmueble= "Piso";
} elseif ($detalle->chalet) {
    $inmueble= "Chalet";
} elseif ($detalle->bajo) {
    $inmueble= "Bajo";
} elseif ($detalle->atico) {
    $inmueble= "Ático";	
} else {
    $inmueble= "Piso";
}
	$texto1= " de ";
	$metros = $detalle->square_meters;
	$texto2 = " m2, ";
if ($detalle->bedrooms==1) {
    $dormitorio= "1 dormitorio y ";
} elseif ($detalle->bedrooms==0) {
    $dormitorio= "";
} elseif ($detalle->bedrooms>1) {
    $dormitorio= $detalle->bedrooms." dormitorios y ";
} else {
    $dormitorio= "";
}
if ($detalle->bathrooms==1) {
    $bano= "1 baño.";
} elseif ($detalle->bathrooms==0) {
    $bano= "";
} elseif ($detalle->bathrooms>1) {
    $bano= $detalle->bathrooms." baños.";
} else {
    $bano= "";
}
	echo $inmueble.$texto1.$metros.$texto2.$dormitorio.$bano;
?>
@endsection
@section('image')
<?php
$url="https://iamoving.com/storage/";
$path=$detalle->path_image_primary;
echo  $url.$path;
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
	</script>
@endsection --}}
@section('styles')
	<style>
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
	</style>
	<style>
	.card-img-overlay {
            padding: 0;
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
    <section class="py-5" style="padding-bottom:5rem!important;">
		<div class="container-fluid">
			<div class="row no-gutters">

				<div class="col-lg-8">
				@if ($detalle->anuncio_basico>0)
						<div class="row justify-content-center padding-bottom:0px;">
							<!--Este texto solo visible para escritorio-->
							<div class="col-12 text-center padding-bottom:0px;  d-none d-sm-none d-md-block">
								<a href="#mInformeBas" role="button" data-toggle="modal" data-target="#mInformeBas" class="mr-2">
									<!--<img  height="399px" src="/storage/{{$detalle->path_image_primary}}" alt="Fotos inmueble">-->
									<img  height="399px" src="/storage/{{$detalle->path_image_primary}}" alt="Fotos inmueble">
								</a>
							<!--Este texto solo visible para smartphone-->
							<div class="col-12 text-center padding-bottom:0px;  d-block d-sm-block d-md-none">
								<a href="#mInformeBas" role="button" data-toggle="modal" data-target="#mInformeBas" class="mr-2">
									<!--<img  height="399px" src="/storage/{{$detalle->path_image_primary}}" alt="Fotos inmueble">-->
									<img  src="/storage/{{$detalle->path_image_primary}}" alt="Fotos inmueble">
								</a>
								
							</div>
						</div>						
				@else				
					@if ($detalle->video_primary)
						<div class="bg-black"  style="height: 450px; overflow-y: hidden;">
							<!--<video src="/storage/{{$detalle->path_video_primary}}" class="video-fluid z-depth-1" width="100%" height="100%" controls></video>-->
							<iframe src="https://www.youtube.com/embed/{{$detalle->video_primary}}" class="video-fluid z-depth-1" width="100%" height="100%" mozallowfullscreen webkitallowfullscreen  allowfullscreen></iframe>
						</div>
					@else
						<div class="row justify-content-center padding-bottom:0px;">
						<!--Este texto solo visible para escritorio-->
							<div class="col-12 text-center padding-bottom:0px;  d-none d-sm-none d-md-block">
								<a href="#mInformeMin" role="button" data-toggle="modal" data-target="#mInformeMin" class="mr-2">
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
				@endif
					<div class="card-images py-3" style="overflow-x:auto;">
						<!--<a href="#mInforme" role="button" data-toggle="modal" data-target="#mInforme" class="mr-2 animated tada infinite">-->
				@if ($detalle->anuncio_basico>0)
							<a href="#mInformeBas" role="button" data-toggle="modal" data-target="#mInformeBas" class="mr-2">
								<div class="card card-image text-white"
										style="height: 100px; background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/storage/{{$detalle->path_image_primary}}')">
									<div class="card-img-overlay d-flex text-center align-items-center">
										<h5 class="card-title" style="text-align:center;width:100%">
											Fotos
										</h5>
									</div>
								</div>
							</a>				
				@else
					@if ($detalle->video_primary)
						<?php
						$imagen=str_replace(".jpeg","_444x250.jpg",$detalle->path_image_primary);
						?>
							<a href="#mInforme" role="button" data-toggle="modal" data-target="#mInforme" class="mr-2">
								<div class="card card-image text-white"
										style="height: 100px; background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/storage/{{$imagen}}')">
									<div class="card-img-overlay d-flex text-center align-items-center">
										<h5 class="card-title" style="text-align:center;width:100%">
											Fotos e informe detallado
										</h5>
									</div>
								</div>
							</a>
					@else
							<a href="#mInformeMin" role="button" data-toggle="modal" data-target="#mInformeMin" class="mr-2">
								<div class="card card-image text-white"
										style="height: 100px; background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/storage/{{$detalle->path_image_primary}}')">
									<div class="card-img-overlay d-flex text-center align-items-center">
										<h5 class="card-title" style="text-align:center;width:100%">
											Fotos
										</h5>
									</div>
								</div>
							</a>					
					@endif
				@endif
						@isset($area)
							<a href="/barrio/{{$area->id}}" role="button"  class="mr-2" target="blank">
								<!--<div class="card card-image text-white"
										style="height: 100px; background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://i.ytimg.com/vi/MmaioAABW9U/default.jpg')">-->
										<div class="card card-image text-white"
										style="height: 100px; background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://i.ytimg.com/vi/{{$area->video_principal}}/0.jpg')">			
									<div class="card-img-overlay d-flex text-center align-items-center">
										<h5 class="card-title" style="text-align:center;width:100%">
											Mi Barrio
										</h5>
									</div>
								</div>
							</a>
						@endisset
						{{-- <button type="button" class="btn btn-outline-secondary">Mi barrio</button> --}}
						<a href="#mMapa" role="button" data-toggle="modal" data-target="#mMapa" class="mr-2">
							<div class="card card-image text-white"
									style="height: 100px; background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/img/map.png')">
								<div class="card-img-overlay d-flex text-center align-items-center">
									<h5 class="card-title" style="text-align:center;width:100%">
										Mapa
									</h5>
								</div>
							</div>
						</a>
						@if ($detalle->anuncio_basico>0)
							<a href="#exampleModal" role="button" data-toggle="modal" data-target="#exampleModal" class="mr-2">
							<div class="card card-image text-white"
									style="height: 100px; background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://i.ytimg.com/vi/{{$detalle->video_primary}}/hqdefault.jpg')">
								<div class="card-img-overlay d-flex text-center align-items-center">
									<h5 class="card-title" style="text-align:center;width:100%">
										Video
									</h5>
								</div>
							</div>
						</a>	
						@endif
						{{-- <button type="button" class="btn btn-outline-secondary">Ya se ha Visitado el inmueble</button>
						<button type="button" class="btn btn-outline-secondary">Sobre el Propetario</button> --}}
					</div>	

					<div class="mt-6" style="background: #9291910f">
						<span class="alert alert-secondary">Referencia: {{$detalle->id}}</span>
						<div class="text-center float-right p-3">
							<div v-if="user" style="display: inline-block;cursor: pointer;" @click.prevent="agregarFavorito({{$detalle->id}})">
								<i class="fas fa-heart fa-3x" style="color:#63e6be;"></i>
								<span style="text-transform: uppercase;font-size: .7rem; display: block;">		Favoritos
								</span>
							</div>

							<div v-else style="display: inline-block;cursor: pointer;" @click.prevent="auth('favorito',{{$detalle->id}})">
								<i class="fas fa-heart fa-3x" style="color:#63e6be;"></i>
								<span style="text-transform: uppercase;font-size: .7rem; display: block;">		Favoritos
								</span>
							</div>

							<!---->
							<div style="display: inline-block;">
								@if($detalle->estado_inmueble == 'Disponible')
									<i class="fas fa-check fa-3x" style="color:#63e6be;"></i>
								@elseif($detalle->estado_inmueble == 'Reservado')
									<img src="{{ asset('img/icono_reservado.png') }}" />
								@elseif($detalle->estado_inmueble == 'Alquilado')
									<img src="{{ asset('img/icono_alquilado.png') }}" />	
								@else
									<img src="{{ asset('img/icono_vendido.png') }}" />	
								@endif
								<span style="text-transform: uppercase;font-size: .7rem; display: block;">		{{$detalle->estado_inmueble}}
								</span>
							</div>
						</div>
						<div class="container py-4">
							
							<h5>
								Datos básicos
							</h5>
							<ul class="fa-ul">
							@if($detalle->road)
								<li>
									<span class="fa-li" ><i class="fas fa-directions"></i></span>
									Dirección: {{$detalle->road}}
								</li>
                               @endif

								@if ($detalle->estudio)
								<li>
									<span class="fa-li" ><i class="fas fa-check-double text-success"></i></span>
									Estudio
								</li>
								@endif
								@if ($detalle->loft)
								<li>
									<span class="fa-li" ><i class="fas fa-check-double text-success"></i></span>
									Loft
								</li>
								@endif
								@if ($detalle->apartamento)
								<li>
									<span class="fa-li" ><i class="fas fa-check-double text-success"></i></span>
									@if ($detalle->id>368 and $detalle->id<373)
									Habitación privada en piso compartido
									@else
									Apartamento
									@endif
								</li>
								@endif
								@if ($detalle->piso)
								<li>
									<span class="fa-li" ><i class="fas fa-check-double text-success"></i></span>
									Piso
								</li>
								@endif
								@if ($detalle->chalet)
								<li>
									<span class="fa-li" ><i class="fas fa-check-double text-success"></i></span>
									Chalet
								</li>
								@endif
								@if ($detalle->bajo)
								<li>
									<span class="fa-li" ><i class="fas fa-check-double text-success"></i></span>
									Bajo
								</li>
								@endif
								@if ($detalle->atico)
								<li>
									<span class="fa-li" ><i class="fas fa-check-double text-success"></i></span>
									Ático
								</li>
								@endif
								@if($detalle->bedrooms)
								<li>
									<span class="fa-li" ><i class="fas fa-bed"></i></span>
									Dormitorios: {{$detalle->bedrooms}}
								</li>
							   @endif
							    @if($detalle->bathrooms)	
								<li>
									<span class="fa-li" ><i class="fas fa-bath"></i></span>
									Baños: {{$detalle->bathrooms}}  @if($detalle->aseos) y Aseos: {{$detalle->aseos}}@endif
								</li>							
								@endif
								@if($detalle->square_meters)

								<li>
									<span class="fa-li" ><i class="fas fa-ruler-combined"></i></span>
									Metros<sup>2</sup>: {{$detalle->square_meters}}
								</li>
								
								@endif
								@if($detalle->hay_transporte>0)

									@foreach ($transportes as $transporte)
									<?php
									//$imagen=str_replace(".jpeg","_444x250.jpg",$detalle->path_image_primary);
									?>
										<div class="row">
												<div class="col-xs-4">{{ $transporte->tipo_transporte }} {{ $transporte->parada }} {{ $transporte->lineas }} {{ $transporte->medida }} {{ $transporte->unidad_medida }}  {{ $transporte->medio }}</div>
										</div>
									@endforeach								
	
								@endif
							</ul>
							<section class="collapse-content">
								{{-- Calendario --}}
								<div class="collapse-item" v-if="{{$detalle->is_sale}} == '0'">
									<a class="btn-collapse" data-toggle="collapse" href="#collapse-calendario" role="button" aria-expanded="false" aria-controls="collapse-calendario">
										<i class="fas fa-calendar-check fa-fw"></i>
										Tiempo mínimo de contrato<a href="#mMascotas" role="button" data-toggle="modal" data-target="#mMascotas" class="mr-2"><img src="/img/info.png"  width="12" height="12" alt="info"></a>
									</a>
									<div class="collapse" id="collapse-calendario"> 
										<div class="content-collapse">
											<ul class="list-group list-group-flush">
												<!--<li class="list-group-item">
													<b>Inmueble disponible a partir de:</b> 
													<span class="text-muted">{{  date('d-m-Y', strtotime($detalle->alquiler_casa))  }}</span>
												</li>
												@if ($detalle->fecha_salida)
												<li class="list-group-item">
													<b>Fecha de salida si es con límite de salida:</b>
													<span class="text-muted">{{  date('d-m-Y', strtotime($detalle->fecha_salida))  }}</span>
												</li>
												@endif-->
												<li class="list-group-item">
													<!--<b>Tiempo mínimo de contrato:</b>-->
													<span class="text-muted">{{$detalle->contrato}} {{$detalle->contrato > 1 ? 'meses' : 'mes'}}</span>
												</li>
											</ul>
										</div>
									</div>
								</div>
								{{-- Estado --}}
								<div class="collapse-item">
									<a class="btn-collapse" data-toggle="collapse" href="#collapse-estado" role="button" aria-expanded="false" aria-controls="collapse-estado">
										<i class="fas fa-house-damage fa-fw"></i>
										Estado
									</a>
									<div class="collapse" id="collapse-estado"> 
										<div class="content-collapse">
											<ul class="list-group list-group-flush">
												<li class="list-group-item">
													<span class="text-muted">{{ $detalle->propiedad_estado }}</span>
												</li>
											</ul>
										</div>
									</div>
								</div>
								{{-- Amueblado --}}
								<div class="collapse-item" v-if="{{$detalle->is_sale}} == '0'">
									<a class="btn-collapse" data-toggle="collapse" href="#collapse-amueblado" role="button" aria-expanded="false" aria-controls="collapse-amueblado">
										<i class="fas fa-house-damage fa-fw"></i>
										¿Se encuentra amueblado?
									</a>
									<div class="collapse" id="collapse-amueblado"> 
										<div class="content-collapse">
											<ul class="list-group list-group-flush">
												<li class="list-group-item">
													<span class="text-muted">{{ $detalle->amueblada }}</span>
												</li>
											</ul>
										</div>
									</div>
								</div>
								{{-- Transporte --}}
								@if ($detalle->path_video_transport)
									<div class="collapse-item">
										<a class="btn-collapse" data-toggle="collapse" href="#collapse-transporte" role="button" aria-expanded="false" aria-controls="collapse-transporte">
											<i class="fas fa-route fa-fw"></i>
											Transporte
										</a>
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
									<a class="btn-collapse" data-toggle="collapse" href="#collapse-importante" role="button" aria-expanded="false" aria-controls="collapse-importante">
										<i class="fas fa-exclamation-circle fa-fw"></i>
										Lo que es muy importante para mi!
									</a>
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
														Terraza
													</li>
												@endif
												@if ($detalle->balcon)
													<li class="list-group-item">
														Balcon
													</li>
												@endif
												@if ($detalle->tendero)
													<li class="list-group-item">
														Tendedero
													</li>
												@endif
												@if ($detalle->aire_acondicionad)
													<li class="list-group-item">
														Aire acondicionado
													</li>
												@endif
												@if ($detalle->lift)
													<li class="list-group-item">
														Ascensor: Si
													</li>
												@else
													<li class="list-group-item">
														Ascensor: No
													</li>
												@endif
												@if ($detalle->rampa)
													<li class="list-group-item">
														Acceso a minusválidos en el portal
													</li>
												@endif
												@if ($detalle->bebe_rampa)
													<li class="list-group-item">
														Ascensor que entra un carrito de bebé
													</li>
												@endif
												@if ($detalle->portero)
													<li class="list-group-item">
														Portero
													</li>
												@endif
												@if ($detalle->video_portero)
													<li class="list-group-item">
														Video portero
													</li>
												@endif												
												@if ($detalle->piso_importante)
													<li class="list-group-item">
														<b>¿Qué Planta es?:</b>
														<span class="text-muted">{{$detalle->piso_importante}}</span>
													</li>
												@endif
												@if ($detalle->plantas_edificio)
													<li class="list-group-item">
														<b>¿Plantas del edificio?:</b>
														<span class="text-muted">{{$detalle->plantas_edificio}}</span>
													</li>
												@endif												
												@if ($detalle->calefaccion)
													<li class="list-group-item">
														<b>Calefacción:</b>
														<span class="text-muted">{{$detalle->calefaccion}}</span>
													</li>
												@endif
												@if ($detalle->calentador_agua)
													<li class="list-group-item">
														<b>Caldera del agua:</b>
														<span class="text-muted">{{$detalle->calentador_agua}}</span>
													</li>
												@endif 
												@if ($detalle->orientacion)
													<li class="list-group-item">
														<b>Orientación:</b>
														<span class="text-muted">{{$detalle->orientacion}}</span>
													</li>
												@endif
												@if ($detalle->suite)
													<li class="list-group-item">
														<b>Baño incorporado en la habitación:</b>
														<span class="text-muted">{{$detalle->suite}}</span>
													</li>
												@endif
												<li class="list-group-item">
														<b>¿Acentan mascotas? </b><a href="#mMascotas" role="button" data-toggle="modal" data-target="#mMascotas" class="mr-2"><img src="/img/info.png"  width="17" height="17" style="margin-bottom:5px;" alt="info"></a>
													</li>
												{{-- 
												@if ($detalle->is_sale == '0')
													<li class="list-group-item">
														<b>La cocina tiene:</b>
														<span class="text-muted">
															{{$detalle->horno ? 'horno /' : null}}
															{{$detalle->lavavajillas ? 'lavavajillas' : null}}
														</span>
													</li>
												@endif
												--}}
											</ul>
										</div>
									</div>
								</div>
								{{-- Gastos aprox --}}
								<div class="collapse-item" v-if="{{$detalle->is_sale}} == '1'">
									<a class="btn-collapse" data-toggle="collapse" href="#collapse-certificado" role="button" aria-expanded="false" aria-controls="collapse-certificado">
										<i class="fas fa-fw fa-hand-holding-usd"></i>
										Gastos aprox
									</a>
									<div class="collapse" id="collapse-certificado"> 
										<div class="content-collapse">
											<ul class="list-group list-group-flush">
												@if ($detalle->gastos_agua>0)
												<li class="list-group-item">
													<b>Agua:</b> 
													<span class="text-muted">€ {{$detalle->gastos_agua}}/mes</span>
												</li>
												@endif
												@if ($detalle->gastos_basura>0)
												<li class="list-group-item">
													<b>Tasa de basura:</b> 
													<span class="text-muted">€ {{$detalle->gastos_basura}}/mes</span>
												</li>
												@endif
												@if ($detalle->gastos_comunidad>0)
												<li class="list-group-item">
													<b>Comunidad:</b> 
													<span class="text-muted">€ {{$detalle->gastos_comunidad}}/mes</span>
												</li>
												@endif
												@if ($detalle->gastos_ibi>0)
												<li class="list-group-item">
													<b>ibi:</b> 
													<span class="text-muted">€ {{$detalle->gastos_ibi}}/año</span>
												</li>
												@endif
											</ul>
										</div>
									</div>
								</div>
								{{-- gastos incluidos --}}
								<div class="collapse-item" v-if="{{$detalle->is_sale}} == '0'">
									<a class="btn-collapse" data-toggle="collapse" href="#collapse-gastos" role="button" aria-expanded="false" aria-controls="collapse-gastos">
										<i class="fas fa-hand-holding-usd fa-fw"></i>
										Gastos Incluidos</a> 

									<div class="collapse" id="collapse-gastos"> 
										<div class="content-collapse">
										@if($detalle->hay_garaje == 1)
											<a href="#mInformeGar" role="button" data-toggle="modal" data-target="#mInformeGar" class="mr-2">
												<div class="card card-image text-white"
														style="height: 100px; background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/storage/{{$detalle->path_image_primary}}')">
													<div class="card-img-overlay d-flex text-center align-items-center">
														<h5 class="card-title" style="text-align:center;width:100%">
															Fotos
														</h5>
													</div>
												</div>
											</a>											
										@endif
											<ul class="list-group list-group-flush">
												@if ($detalle->gastos_incluido_calentamiento)
													<li class="list-group-item">Calefacción</li>
												@endif
												@if ($detalle->gastos_incluido_agua)
													<li class="list-group-item">Agua</li>
												@endif
												@if ($detalle->gastos_incluido_luz)
													<li class="list-group-item">Luz</li>
												@endif
												@if ($detalle->gastos_incluidos_gas)
													<li class="list-group-item">Gas</li>
												@endif
												@if ($detalle->gastos_incluidos_basura)
													<li class="list-group-item">Tasa de basura</li>
												@endif
												@if ($detalle->gastos_incluido_comunidad)
													<li class="list-group-item">Comunidad</li>
												@endif
												@if ($detalle->gastos_incluido_ibi)
													<li class="list-group-item">ibi</li>
												@endif
												@if ($detalle->garaje_incluido_precio)
													<li class="list-group-item">Garaje incluido en el precio 
                                                    @if ($detalle->garaje_dos_plazas)
                                                        (2 plazas)
                                                    @endif
                                                    </li>
												@endif	
												@if ($detalle->testero_incluido)
													<li class="list-group-item">Trastero incluido</li>
												@endif													
												@if ($detalle->gastos_incluido_internet)
													<li class="list-group-item">Internet</li>
												@endif
											</ul>
										</div>
									</div>
								</div>
								{{-- datos del edificios --}}
								<div class="collapse-item">
									<a class="btn-collapse" data-toggle="collapse" href="#collapse-edificio" role="button" aria-expanded="false" aria-controls="collapse-edificio">
										<i class="fas fa-fw fa-building"></i>
										Datos del edificio
									</a>
									<div class="collapse" id="collapse-edificio"> 
										<div class="content-collapse">
											@if($detalle->hay_datosedificio == 1)
												<a href="#mInformeEdificio" role="button" data-toggle="modal" data-target="#mInformeEdificio" class="mr-2">
													<div class="card card-image text-white"
															style="height: 100px; background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('/storage/{{$detalle->path_image_primary}}')">
														<div class="card-img-overlay d-flex text-center align-items-center">
															<h5 class="card-title" style="text-align:center;width:100%">
																Fotos
															</h5>
														</div>
													</div>
												</a>											
											@endif	
											<ul class="list-group list-group-flush">
												@if ($detalle->jardin)
													<li class="list-group-item">Jardín</li>
												@endif
												@if ($detalle->piscina)
													<li class="list-group-item">Piscina</li>
												@endif
												@if ($detalle->gym)
													<li class="list-group-item">Gym</li>
												@endif
												@if ($detalle->sauna)
													<li class="list-group-item">Sauna</li>
												@endif
												@if ($detalle->zona_deportiva)
													<li class="list-group-item">Zona deportiva</li>
												@endif
												@if ($detalle->zona_infantil)
													<li class="list-group-item">Zona infantil</li>
												@endif
												<!--@if ($detalle->garaje_incluido_precio)
													<li class="list-group-item">Garaje incluido en el precio 
                                                    @if ($detalle->garaje_dos_plazas)
                                                        (2 plazas)
                                                    @endif
                                                    </li>
												@endif-->
												@if ($detalle->garaje_opcion)
													<li class="list-group-item">Opción de garaje en el mismo edificio</li>
												@endif
												<!--@if ($detalle->testero_incluido)
													<li class="list-group-item">Trastero incluido</li>
												@endif-->
												@if ($detalle->opcion_trastero_edificio)
													<li class="list-group-item">Opción de trastero en el mismo edificio</li>
												@endif
												@if ($detalle->aproximate_cost_garages)
													<li class="list-group-item">
														<b>Precio aprox. de plaza de garaje por la zona:</b> 
														<span class="text-muted"> {{ $detalle->aproximate_cost_garages }} €/mes</span>
													</li>
												@endif
												@if ($detalle->antiguedad_edificio)
													<li class="list-group-item">
														<b>Antigüedad del edificio:</b>
														<span class="text-muted">{{ $detalle->antiguedad_edificio }}</span>
													</li>
												@endif
												@if ($detalle->certificado_energetico) 
													<li class="list-group-item">
														<b>Certificado:</b>
														<span class="text-muted">{{$detalle->certificado_energetico}}</span>
													</li>
												@endif
											</ul>
										</div>
									</div>
								</div>
								{{-- nota --}}
								@if ($detalle->path_video_nota)
									<div class="collapse-item">
										<a class="btn-collapse" data-toggle="collapse" href="#collapse-nota" role="button" aria-expanded="false" aria-controls="collapse-nota">
											<i class="fas fa-play fa-fw"></i>
											Nota
										</a>
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
											<a class="btn-collapse" data-toggle="collapse" href="#collapse-inversor" role="button" aria-expanded="false" aria-controls="collapse-edificio">
												<i class="fas fa-fw fa-building"></i>
												¿Eres inversor? Mira el precio estimado del alquiler
											</a>
											<div class="collapse" id="collapse-inversor"> 
												<div class="content-collapse">
													<ul class="list-group list-group-flush">
														<li class="list-group-item"><span class="text-muted">€ {{$detalle->alquiler_aproximado}}</span></li>
													</ul>
												</div>
											</div>
										</div>
									@endif	
								@endif
							</section>
						</div>
					</div>
				</div>

				<div class="col px-3">
					{{-- style="background: #9291910f;position: sticky; top: 1rem; min-height: 450px;" --}}
					<div style="background: #333; position: sticky; top: .5rem; min-height: 210px;">
						<section class="properties-section position-relative" style="min-height: 210px;">

							<div class="iamoving-theme">
								<input-currency 
									class="form-control-plaintext font-weight-bold text-center py-0"
									style="font-size: 24px;"
									:decimals="0"
									value="{{ $detalle->propiedad_precio }}"
									readonly></input-currency>

								<a class="d-block text-center"
									data-toggle="collapse" href="#tarifa" role="button" aria-expanded="false" aria-controls="tarifa" >
									@if ($detalle->is_sale == '0')
										Condiciones del pago inicial
									@else	
										
									@endif
								</a>
							</div>
							<div class="in collapse show" id="tarifa">
							<!--	<calculator-app  v-if="{{$detalle->is_sale}} == 1"  :default-value="{{ $detalle->propiedad_precio }}"></calculator-app>-->
					<div v-if="{{$detalle->is_sale}} == 1" 
										class="d-block text-center" 
										style="padding: 0 1.25rem;background-color:#333;border-margin:0;">

                      <div class="jss33 jss34 sc-95xf8-0 ecJbVf"  id="clickeable" onclick="location.href='/servicio/2';" style="cursor:pointer;background-color:#333;width:100%;padding:0px 0;border-margin:0;">
                          <b><h4><span style="color:#FFFFFF;">Comprando con IAMOVING</span></h4></b>
                          <!--<span style="color:#FFFFFF;">Plan protección alquiler</span>-->
                        <!--<p class="sc-1n10p5-0 jDJpTw sc-bdVaJa ibMzuR">
                          <span  style="color:#FFFFFF;">Anuncia tu piso exclusivamente con Iamoving. Después de una semana, si tu piso aún no se ha alquilado, quitamos la exclusividad y te mantenemos las mismas condiciones. ¡También totalmente gratuito!</span>
                        </p>-->
                        <ul class="jss200 jss201" style="background-color:#333;border-margin:0;">
                          <li class="jss204 jss208 jss211">
								<!--<svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="smile" class="svg-inline--fa fa-smile fa-w-16"
								role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512" style="height: 1.45em;width: 1.45em;">
									<path fill="white" d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm0 448c-110.3 0-200-89.7-200-200S137.7 56 248 56s200 89.7 200 200-89.7 200-200 200zm-80-216c17.7 0 32-14.3 32-32s-14.3-32-32-32-32 14.3-32 32 14.3 32 32 32zm160 0c17.7 0 32-14.3 32-32s-14.3-32-32-32-32 14.3-32 32 14.3 32 32 32zm4 72.6c-20.8 25-51.5 39.4-84 39.4s-63.2-14.3-84-39.4c-8.5-10.2-23.7-11.5-33.8-3.1-10.2 8.5-11.5 23.6-3.1 33.8 30 36 74.1 56.6 120.9 56.6s90.9-20.6 120.9-56.6c8.5-10.2 7.1-25.3-3.1-33.8-10.1-8.4-25.3-7.1-33.8 3.1z"></path>
								</svg>	-->
								<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" class="svg-inline--fa fa-check fa-w-16" role="img" 
								xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"  style="height: 1.45em;width: 1.45em;">
									<path fill="white" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z">
									</path>
								</svg>								
                            <div class="jss221 jss223">
                              <span class="sc-bdVaJa jiARkd">
                                <span  style="color:#FFFFFF;">Primera visita online</span>
                              </span>
                            </div>
                          </li>
                         <!-- <li class="jss204 jss208 jss211">

								<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" class="svg-inline--fa fa-check fa-w-16" role="img" 
								xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"  style="height: 1.45em;width: 1.45em;">
									<path fill="white" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z">
									</path>
								</svg>								
                            <div class="jss221 jss223">
                              <span class="sc-bdVaJa jiARkd">
                                <span><a href="/servicio/2" style="color:#EADD03;">Servicios incluidos</a></span>
                              </span>
                            </div>

                          </li>-->

							  <li class="jss204 jss208 jss211">
								<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" class="svg-inline--fa fa-check fa-w-16" role="img" 
								xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"  style="height: 1.45em;width: 1.45em;">
									<path fill="white" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z">
									</path>
								</svg>
								<div class="jss221 jss223">
								  <span class="sc-bdVaJa jiARkd">
									<span  style="color:#FFFFFF;">Piso verificado</span>
								  </span>
								</div>
							  </li>
							  <li class="jss204 jss208 jss211">
								<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" class="svg-inline--fa fa-check fa-w-16" role="img" 
								xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"  style="height: 1.45em;width: 1.45em;">
									<path fill="white" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z">
									</path>
								</svg>
								<div class="jss221 jss223">
								  <span class="sc-bdVaJa jiARkd">
									<span  style="color:#FFFFFF;">Asesoría jurídica</span>
								  </span>
								</div>
							  </li>
							  <!--<li class="ml-4 jss204 jss208 jss211">
									<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" class="svg-inline--fa fa-check fa-w-16" role="img" 
								xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"  style="height: 1.45em;width: 1.45em;">
									<path fill="white" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z">
									</path>
								</svg>
								<div class="jss221 jss223">
								  <span class="sc-bdVaJa jiARkd">
									<span  style="color:#FFFFFF;">Iamoving priority</span>
								  </span>
								</div>
							  </li>
							  	<li class="ml-4 jss204 jss208 jss211">
								<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" class="svg-inline--fa fa-check fa-w-16" role="img" 
								xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"  style="height: 1.45em;width: 1.45em;">
									<path fill="white" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z">
									</path>
								</svg>
								<div class="jss221 jss223">
								  <span class="sc-bdVaJa jiARkd">
									<span  style="color:#FFFFFF;">Negociación</span>
								  </span>
								</div>
							  </li>-->
							  <li class="jss204 jss208 jss211">
								<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" class="svg-inline--fa fa-check fa-w-16" role="img" 
								xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"  style="height: 1.45em;width: 1.45em;">
									<path fill="white" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z">
									</path>
								</svg>
								<div class="jss221 jss223">
								  <span class="sc-bdVaJa jiARkd">
									<span  style="color:#FFFFFF;">Asesoramiento financiero</span>
								  </span>
								</div>
							  </li>	
							  <li class="jss204 jss208 jss211">
								<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" class="svg-inline--fa fa-check fa-w-16" role="img" 
								xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"  style="height: 1.45em;width: 1.45em;">
									<path fill="white" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z">
									</path>
								</svg>
								<div class="jss221 jss223">
								  <span class="sc-bdVaJa jiARkd">
									<span  style="color:#FFFFFF;">Asesoramiento fiscal</span>
								  </span>
								</div>
							  </li>	
							  <li class="jss204 jss208 jss211">
								<!--<svg class="jss215 jss216 jss214 sc-6ysmz4-0 kClokr" focusable="false" viewBox="0 0 24 24" aria-hidden="true" theme="[object Object]">

								</svg>-->
								<div class="jss221 jss223">
								  <span class="sc-bdVaJa jiARkd">
									<span  style="color:#FFFFFF;">Tarifa: Totalmente gratuito.</span>
									<!--<span  style="color:#FFFFFF;">(iva incluido)</span>-->
									</span>
								</div>								
							  </li>								  

                         <!--                           <li class="jss204 jss208 jss211">
                            <svg class="jss215 jss216 jss214 sc-6ysmz4-0 kClokr" focusable="false" viewBox="0 0 24 24" aria-hidden="true" theme="[object Object]">
                              <g>
                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"></path>
                              </g>
                            </svg>
                            <div class="jss221 jss223">
                              <span class="sc-bdVaJa jiARkd">
                                <span>Tarifa servicios Gratuita</span>
                              </span>
                            </div>
                          </li>-->
                        </ul>
                         
<!-- <span class="jss169">
                            <span><b>Seguro, ahorrando tiempo y dinero</b></span>
                          </span>
                          <span class="jss193"></span>-->
                      </div>
                    	

								</div>

								<div v-if="{{$detalle->is_sale}} == 0" 
										class="d-block text-center" 
										style="padding: 0 1.25rem;">


													<!--<div class="d-flex justify-content-between" >
																<span  style="color:#fff;float:left;padding: 0 0.50rem;margin-bottom: 10px;">Solvencia demostrable</span>
																<span style="color:#fff;float:right;padding: 0 0.50rem;margin-bottom: 10px;">SI</span> 
													</div>

													@if ($detalle->is_sale == '0' && $detalle->condiciones != '' && $detalle->condiciones != '0')
													<div class="d-flex justify-content-between">
																<span  style="color:#fff;float:left;padding: 0 0.50rem;margin-bottom: 10px;">Fianza</span>
																@if($detalle->condiciones > 1)
																	<span style="color:#fff;float:right;padding: 0 0.50rem;margin-bottom: 10px;">{{$detalle->condiciones}} Meses
																	</span> 
																@else
																	<span style="color:#fff;float:right;padding: 0 0.50rem;margin-bottom: 10px;">{{$detalle->condiciones}} Mes
																	</span> 
																@endif
													</div>
													@endif-->

													<!--<div class="d-flex justify-content-between" >
																<span  style="color:#fff;float:left;padding: 0 0.50rem;margin-bottom: 10px;">Aval bancario</span>
																<span style="color:#fff;float:right;padding: 0 0.50rem;margin-bottom: 10px;">NO</span> 
															</div>-->
													<!--<div class="d-flex justify-content-between" >
																<span  style="color:#fff;float:left;padding: 0 0.50rem;margin-bottom: 10px;"><a href="/servicio/{{$detalle->is_sale+1}}"  class="font-weight-bold" style="color: #EADD03;"  target="blank">Servicios incluidos</a></span>
																<span style="color:#fff;float:right;padding: 0 0.50rem;margin-bottom: 10px;">SI</span> 
															</div>				
																										
													<div class="d-flex justify-content-between" >
																<span  style="color:#fff;float:left;padding: 0 0.50rem;margin-bottom: 10px;"><a href="/servicio/{{$detalle->is_sale+5}}"  class="font-weight-bold" style="color: #EADD03;"  target="blank">Descuentos especiales</a></span>
																<span style="color:#fff;float:right;padding: 0 0.50rem;margin-bottom: 10px;">SI</span> 
															</div>	
-->
													<!--<div class="d-flex justify-content-between" >-->
																<!--<span  style="color:#fff;float:left;padding: 0 0.50rem;margin-bottom: 10px;">Pago único con IAMOVING</br><small style="font-size: 13px; color: #fff; width:150%;" >(IVA incluido)</small></span>-->
																<!--<span  style="color:#fff;float:left;padding: 0 0.50rem;margin-bottom: 10px;">Iamoving pago único</span>-->
																<!--<span style="color:#fff;float:right;padding: 0 0.10rem;margin-bottom: 10px;">€ {{number_format($detalle->rate, 0, ",", ".") }}+iva</span> -->
																<!--<span style="color:#fff;float:right;padding: 0 0.10rem;margin-bottom: 10px;">1 mes+iva</span>--><!--<a href="#" data-toggle="tooltip" title="Another one here too"></a>-->
													<!--</div>		-->
													<div class="d-flex justify-content-between" >
																<!--<span  style="color:#fff;float:left;padding: 0 0.50rem;margin-bottom: 10px;">Fianza/Depósito <svg title="A ves es posible bajar los meses del depósito, dependerá de la solvencia presentada" rel="tooltip" id="blah" class="svg-inline--fa fa-question-circle fa-w-16" style="color: rgb(255, 255, 255);" aria-labelledby="svg-inline--fa-title-ySZGKwku8yso" data-prefix="far" data-icon="question-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">--><!--<title id="svg-inline--fa-title-ySZGKwku8yso">Dependerá de la solvencia</title>--><!--<path fill="white" d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 448c-110.532 0-200-89.431-200-200 0-110.495 89.472-200 200-200 110.491 0 200 89.471 200 200 0 110.53-89.431 200-200 200zm107.244-255.2c0 67.052-72.421 68.084-72.421 92.863V300c0 6.627-5.373 12-12 12h-45.647c-6.627 0-12-5.373-12-12v-8.659c0-35.745 27.1-50.034 47.579-61.516 17.561-9.845 28.324-16.541 28.324-29.579 0-17.246-21.999-28.693-39.784-28.693-23.189 0-33.894 10.977-48.942 29.969-4.057 5.12-11.46 6.071-16.666 2.124l-27.824-21.098c-5.107-3.872-6.251-11.066-2.644-16.363C184.846 131.491 214.94 112 261.794 112c49.071 0 101.45 38.304 101.45 88.8zM298 368c0 23.159-18.841 42-42 42s-42-18.841-42-42 18.841-42 42-42 42 18.841 42 42z"></path></svg></span>--><!--<i class="fas fa-question-circle" style="color: #fff;" rel="tooltip" title="Key active" id="blah"></i>-->
																@if($detalle->condiciones > 1)
																	<span  style="color:#fff;float:left;padding: 0 0.50rem;margin-bottom: 10px;">Fianza/Depósito <svg title="A veces es posible bajar los meses del depósito, dependerá de la solvencia presentada" rel="tooltip" id="blah" class="svg-inline--fa fa-question-circle fa-w-16" style="color: rgb(255, 255, 255);" aria-labelledby="svg-inline--fa-title-ySZGKwku8yso" data-prefix="far" data-icon="question-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><!--<title id="svg-inline--fa-title-ySZGKwku8yso">Dependerá de la solvencia</title>--><path fill="yellow" d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 448c-110.532 0-200-89.431-200-200 0-110.495 89.472-200 200-200 110.491 0 200 89.471 200 200 0 110.53-89.431 200-200 200zm107.244-255.2c0 67.052-72.421 68.084-72.421 92.863V300c0 6.627-5.373 12-12 12h-45.647c-6.627 0-12-5.373-12-12v-8.659c0-35.745 27.1-50.034 47.579-61.516 17.561-9.845 28.324-16.541 28.324-29.579 0-17.246-21.999-28.693-39.784-28.693-23.189 0-33.894 10.977-48.942 29.969-4.057 5.12-11.46 6.071-16.666 2.124l-27.824-21.098c-5.107-3.872-6.251-11.066-2.644-16.363C184.846 131.491 214.94 112 261.794 112c49.071 0 101.45 38.304 101.45 88.8zM298 368c0 23.159-18.841 42-42 42s-42-18.841-42-42 18.841-42 42-42 42 18.841 42 42z"></path></svg></span><!--<i class="fas fa-question-circle" style="color: #fff;" rel="tooltip" title="Key active" id="blah"></i>-->
																@else
																	<span  style="color:#fff;float:left;padding: 0 0.50rem;margin-bottom: 10px;">Fianza</span><!--<i class="fas fa-question-circle" style="color: #fff;" rel="tooltip" title="Key active" id="blah"></i>-->
																@endif																	
																@if($detalle->condiciones > 1)
																	<span style="color:#fff;float:right;padding: 0 0.50rem;margin-bottom: 10px;">{{$detalle->condiciones}} Meses
																	</span> 
																@else
																	<span style="color:#fff;float:right;padding: 0 0.50rem;margin-bottom: 10px;">{{$detalle->condiciones}} Mes
																	</span> 
																@endif																
																<!--<span style="color:#fff;float:right;padding: 0 0.50rem;margin-bottom: 10px;">(depende de solvencia)</span> -->
													</div>													
													<div class="d-flex justify-content-between" >
																<span  style="color:#fff;float:left;padding: 0 0.50rem;margin-bottom: 10px;">Iamoving pago único</span>
																<span style="color:#fff;float:right;padding: 0 0.50rem;margin-bottom: 10px;">1 mes+iva</span> 
													</div>																										
													<div class="d-flex justify-content-between" >
																<span  style="color:#fff;float:left;padding: 0 0.50rem;margin-bottom: 10px;">+ un mes en curso <svg title="Pago del mes en curso por adelantado, en caso que el mes ya esté empezado, se abonará la parte proporcional que aún falta hasta el final de mes" rel="tooltip"  id="blah2" class="svg-inline--fa fa-question-circle fa-w-16" style="color: rgb(255, 255, 255);" aria-labelledby="svg-inline--fa-title-ySZGKwku8yso" data-prefix="far" data-icon="question-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="yellow" d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 448c-110.532 0-200-89.431-200-200 0-110.495 89.472-200 200-200 110.491 0 200 89.471 200 200 0 110.53-89.431 200-200 200zm107.244-255.2c0 67.052-72.421 68.084-72.421 92.863V300c0 6.627-5.373 12-12 12h-45.647c-6.627 0-12-5.373-12-12v-8.659c0-35.745 27.1-50.034 47.579-61.516 17.561-9.845 28.324-16.541 28.324-29.579 0-17.246-21.999-28.693-39.784-28.693-23.189 0-33.894 10.977-48.942 29.969-4.057 5.12-11.46 6.071-16.666 2.124l-27.824-21.098c-5.107-3.872-6.251-11.066-2.644-16.363C184.846 131.491 214.94 112 261.794 112c49.071 0 101.45 38.304 101.45 88.8zM298 368c0 23.159-18.841 42-42 42s-42-18.841-42-42 18.841-42 42-42 42 18.841 42 42z"></path></svg></span><!--<i class="fas fa-question-circle" style="color: #fff;" rel="tooltip" title="Key active" id="blah"></i>-->
																<!--<span style="color:#fff;float:right;padding: 0 0.50rem;margin-bottom: 10px;">(o los días proporcionales que faltan)</span>-->
													</div>																																							
									{{-- <div class="col-md-3 pl-2">
									<p>1</p>
									<p>Si</p>
									<p>No</p>
									<p>Si</p>
									<p><label	class="form-control-plaintext" 
																	style="font-size: 24px; color: #fff; width:150%;" 
																	readonly>€ {{ $detalle->rate }}<small style="font-size: 15px; color: #fff; width:150%;" > +iva</small></label></p>
									</div>--}}
									{{-- <div>
									<label class="col-auto col-form-label text-right text-white">Pago unico con IAMOVING:</label>
									</div>
									<div class="col-md-3 pl-2">
																	
										<label	class="form-control-plaintext" 
																	style="font-size: 24px; color: #fff; width:150%;" 
																	readonly>€ {{ $detalle->rate }}<small style="font-size: 15px; color: #fff; width:150%;" > +iva</small></label>
																	</div>
																	<label class="col-auto col-form-label text-right text-white"></label> --}}
									
								</div>

							{{--	<p class="iamoving-theme py-0">
									¡Ahorrando aún más! {{ $detalle->is_sale == '0' ? 'Alquilando' : 'Comprando' }} con IAMOVING, tu tendrás una serie
									de <a href="/servicio/{{$detalle->is_sale+1}}" class="font-weight-bold">servicios incluidos</a>  en nuestra tarifa y 
									<a href="/servicio/{{$detalle->is_sale+5}}" class="font-weight-bold">descuentos especiales</a>.--}}
								</p>
							</div> 	
						</section>
						<section class="p-3">
							@if($detalle->is_sale == '0')
								<button type="button" class="btn btn-secondary btn-block" @click.prevent="modalDoc">
									Documentos para alquilar 
								</button>						
							@endif
							{{-- :data-target="user ? '#modal-request' : '#modal-auth'" --}}
							<button v-if="user" type="button" class="btn btn-success btn-block" @click.prevent="modalVisita">
								Solicitar una visita con el propetario
							</button>

							<!--<a v-else href="#modal-auth" data-toggle="modal" class="btn btn-outline-success btn-block">
								Solicitar una visita con el propetario
							</a>-->

							<button v-else class="btn btn-success btn-block" @click.prevent="auth('visita')">
								Solicitar una visita con el propetario
							</button>

							<button v-if="user" type="button" class="btn btn-success btn-block"  @click.prevent="request({{$detalle->id}})">
								Pedido {{ $detalle->is_sale == '0' ? 'para' : 'para' }} reservar
							</button>
							<button v-else class="btn btn-success btn-block" @click.prevent="auth('alquilar_comprar',{{$detalle->id}})">
								Pedido {{ $detalle->is_sale == '0' ? 'para' : 'para' }} reservar
							</a>
						</section>
						{{-- <div class="position-absolute" style="bottom: 1rem; right: 1rem; left: 1rem;">
							<button type="button" class="btn btn-outline-success btn-block" data-toggle="modal" data-target="#modal-request">
								Solicitar una visita con el propetario
							</button>
							<button type="button" class="btn btn-secondary btn-block">Quiero alquilar este inmueble</button>
						</div> --}}
					</div>
				</div>

			</div>
		</div>
	</section>
	@if ($detalle->anuncio_basico>0)
		<div class="modal fade" id="mInformeBas" tabindex="-1" role="dialog" aria-labelledby="mInformeBas" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-image" role="application" style="max-width: 800px;">
				<report-basico reference="{{$detalle->id}}" />
			</div>
		</div>		
	@else
		
		@if ($detalle->video_primary)
		<div class="modal fade" id="mInforme" tabindex="-1" role="dialog" aria-labelledby="mInformeLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-image" role="application" style="max-width: 800px;">
				<report-content reference="{{$detalle->id}}" />
			</div>
		</div>
		@else
		<div class="modal fade" id="mInformeMin" tabindex="-1" role="dialog" aria-labelledby="mInformeLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-image" role="application" style="max-width: 800px;">
				<report-minimo reference="{{$detalle->id}}" />
			</div>
		</div>	
		@endif
	@endif
	@if($detalle->hay_garaje ==1)
		<div class="modal fade" id="mInformeGar" tabindex="-1" role="dialog" aria-labelledby="mInformeGar" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-image" role="application" style="max-width: 800px;">
				<report-garage reference="{{$detalle->id}}" />
			</div>
		</div>
	@endif
	@if($detalle->hay_datosedificio ==1)
		<div class="modal fade" id="mInformeEdificio" tabindex="-1" role="dialog" aria-labelledby="mInformeEdificio" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-image" role="application" style="max-width: 800px;">
				<report-edificio reference="{{$detalle->id}}" />
			</div>
		</div>
	@endif
		<div class="modal fade" id="mMascotas" tabindex="-1" role="dialog" aria-labelledby="mMascotas" aria-hidden="true">
			  <div class="modal-dialog modal-lg">
				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
				   <!-- <h4 id="modal-request-title" class="modal-title">¿Qué documentos necesito para alquilar?</h4>-->
				  </div>
				  <div class="modal-body">
							{!! csrf_field() !!} 
								<div class="col-md-12">
									<div class="form-group">
										<label><b>En caso de que tenga una mascota o tenga la intención de tener una. Esta información debe mencionarse en tu perfil de usuario cuando solicite una visita. Muchos propietarios dicen NO A MASCOTAS y luego cambian de opinión cuando conocen el perfil de la parte interesada. De esta manera, garantizamos que la propiedad que te pareció perfecta no se escapará debido a un problema de información o comunicación.</b></label>						
									</div>

								</div>
								<div class="col-md-12 text-center">
									<button class="btn btn-dark" style="color:#EADD1B;" data-dismiss="modal"  type="button">
										Cerrar
									</button>						
								</div>					
				  </div>
				</div>
			  </div>			
		</div>	
	<div class="modal fade" id="mMapa" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-xl">
		
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
		  </div>
				<div id="mapa" style="height: 80vh; width: 100%;"></div>
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
				<!--<div id="mapa" style="height: 80vh; width: 100%;">
				
				</div>-->
						<div class="bg-black"  style="height: 450px; overflow-y: hidden;">
							<!--<video src="/storage/{{$detalle->path_video_primary}}" class="video-fluid z-depth-1" width="100%" height="100%" controls></video>-->
							<iframe src="https://www.youtube.com/embed/{{$detalle->video_primary}}" class="video-fluid z-depth-1" width="100%" height="100%" mozallowfullscreen webkitallowfullscreen  allowfullscreen></iframe>
						</div>				
		</div>
	  </div>
      </div>

<!-- <modal-request id="modal-request" :reference="{{ $detalle }}" /> -->

<div id="modalRequest" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="modal-request-title" class="modal-title"></h4>
      </div>
      <div class="modal-body">
          <div class="text-center">
            <h5>Procesando su petición</h5><br>
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
      <div class="modal-header">
        <h4 id="modal-request-title" class="modal-title">Agenda cuando te gustaría realizar la visita al inmueble </h4>
      </div>
      <div class="modal-body">
      		<form method="post" id="citaForm" @submit.prevent="citaSubmitHandle" ref="cform"> 
      			{!! csrf_field() !!} 
      			<input type="hidden" name="reference" value="{{ $detalle->id }} " />
	            <div class="row" id="step1">
	          		<div class="col-md-6">
	          			<div class="form-group">
	          				<label>Escoje la fecha</label>
	          				<input type="text" id="date" name="date" class="form-control" autocomplete="off" required>
	          			</div>
	          			<div class="form-group">
	          				<label>Escoje la hora</label>
	          				<div class="input-group clockpicker">
							    <input id="time" name="time" type="text" class="form-control" autocomplete="off" value="" required>
							    <span class="input-group-addon">
							        <span class="glyphicon glyphicon-time"></span>
							    </span>
							</div>
	          			</div>
	          		</div>
	          		<div class="col-md-6">
	          			<div id="comment">
	          			<!--	<p>{{ $detalle->schedule }}</p> -->
	          			</div>
	          		</div>
	          		<!--@if($detalle->is_sale == '0')
		          		<div class="col-md-12 text-center">
		          			<button id="btnContinuar" class="btn btn-dark" style="color:#EADD1B;" type="button">
		                        Continuar
							</button>
		          		</div>
		          	@else
		          		<div class="col-md-12 text-center">
		          			<button class="btn btn-dark" style="color:#EADD1B;" type="submit">
		                        Solicitar
							</button>
		          		</div>
		          	@endif-->
	          		@if($detalle->is_sale == '0')
	          			<div class="col-md-12 text-center" v-if="user!=null && user.datos_alquiler">
		          			<button class="btn btn-dark" style="color:#EADD1B;" type="submit">
		                        Solicitar
							</button>
		          		</div>
		          		<div class="col-md-12 text-center" v-else>
		          			<button id="btnContinuar" class="btn btn-dark" style="color:#EADD1B;" type="button">
		                        Continuar
							</button>
		          		</div>
		          	@else
		          		<div class="col-md-12 text-center">
		          			<button class="btn btn-dark" style="color:#EADD1B;" type="submit">
		                        Solicitar
							</button>
		          		</div>
		          	@endif						
	            </div>
	            <div class="row" id="step2">
	            	<div class="col-md-12">
	            		<div class="form-group">
	            			Rellena los campos si lo deseas porque los propietarios suelen dar preferencia cuando saben más de ti. Te dejamos algunas sencillas preguntas que a ellos normalmente les gusta saber antes de concretar una visita o aceptar una oferta
	            		</div>
	            		<div class="form-group">
	            			<label>¿Cuántas personas vais a vivir en el piso?</label>
	            			<select id="numero_personas" name="numero_personas" class="form-control">
	            				@for ($i = 1; $i <= 20; $i++)
									<option value="{{ $i }}">{{ $i }}</option>    
								@endfor
	            			</select>
	            		</div>
	            		<div class="form-group">
	            			<input type="text" id="tipo_personas" name="tipo_personas" class="form-control" placeholder="¿Sois pareja, amigos, estudiantes, compañeros de trabajo, es para ti solo?" maxlength="60">
	            			
	            		</div>
	            		<div class="form-group">
	            			<input type="text" id="trabajo" name="trabajo" class="form-control" placeholder="¿Dónde trabajas?" maxlength="60">
	            		</div>
	            		<div class="form-group">
	            			<input type="text" id="tipo_trabajo" name="tipo_trabajo" class="form-control" placeholder="¿A qué te dedicas?" maxlength="60">
	            		</div>
	            		<div class="form-group">
	            			<input type="text" id="estudiante" name="estudiante" class="form-control" placeholder="¿Estudiantes? ¿En qué universidad, máster, escuela?" maxlength="60">
	            		</div>
	            		<div class="form-group">
	            			<input type="text" id="tipo_estudiante" name="tipo_estudiante" class="form-control" placeholder="¿Qué estudias? " maxlength="60">
	            		</div>
	            		<div class="form-group">
	            			<label>Cuéntanos un poco sobre ti</label>
	            			<textarea id="comentario_persona" name="comentario_persona" class="form-control" rows="2"></textarea>
	            		</div>
	            	</div>
	            		<div class="col-md-12 text-center">
	            			<button id="btnAtras" class="btn btn-dark" style="color:#EADD1B;" type="button">
		                        Atrás
							</button>
		          			<button class="btn btn-dark" style="color:#EADD1B;" type="submit">
		                        Solicitar
							</button>
		          		</div>
	            </div>
	            
	        </form> 
      </div>
    </div>
  </div>
</div>



<div id="modalDocumentos" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="modal-request-title" class="modal-title">¿Qué documentos necesito para alquilar?</h4>
      </div>
      <div class="modal-body">
      			{!! csrf_field() !!} 
	          		<div class="col-md-12">
	          			<div class="form-group">
	          				<label><b>1-Documentación Personal</b></label>
	          				<ul>
								<li class="ml-5">
									que identifique a la persona que va a firmar el contrato, (DNI, NIE o incluso pasaporte).
								</li>
							</ul>
	          				<label><b>2-Documentación que acredite la solvencia económica</b></label>
	          				<ul>
								<li class="ml-5">
									contrato de trabajo.
								</li>
								<li class="ml-5">
									3 últimas nóminas.
								</li>
								<li class="ml-5">
									autónomos (la declaración de renta del año pasado y el último trimestre del IVA).
								</li>								
							</ul>
	          				<label><b>3-Ingresos</b></label>
	          				<ul>
								<li class="ml-5">
									la suma de ingresos mínimos entre todos los inquilinos suele ser <b>dos veces y medio</b> mayor al coste del alquiler.
								</li>
							</ul>
	          				<label><b>4-Avalistas</b></label>
	          				<ul>
								<li class="ml-5">
									Si eres estudiante o no estás trabajando y no se puede demostrar solvencia económica, se suele pedir un aval personal o más meses de depósito.
								</li>
								<li class="ml-5">
									Aval personal (necesario aportar la documentación mencionada en los puntos 1 y 2 de los avalistas).
								</li>
								<li class="ml-5">
									Depósito (negociar los meses de depósito directamente con la propiedad).
								</li>								
							</ul>							
	          			</div>

	          		</div>
		          		<div class="col-md-12 text-center">
		          			<button class="btn btn-dark" style="color:#EADD1B;" data-dismiss="modal"  type="button">
		                        Cerrar
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

		var days = ["0","1","2","3","4","5","6"];
		if(available_days.length > 0){
			for(i=0;i<available_days.length;i++){
				switch (available_days[i].trim()){
					case 'Lunes': days.splice(days.indexOf('1'),1); break;
					case 'Martes': days.splice(days.indexOf('2'),1); break;
					case 'Miercoles': days.splice(days.indexOf('3'),1); break;
					case 'Jueves': days.splice(days.indexOf('4'),1); break;
					case 'Viernes': days.splice(days.indexOf('5'),1); break;
					case 'Sabado': days.splice(days.indexOf('6'),1); break;
					case 'Domingo': days.splice(days.indexOf('0'),1); break;
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

		/*$(document).bind('ready', function(){
			alert('perr');
			$('#btn-modal-request').click(function() {
				$('#modal-request').modal('show');
			}); // end click
		}); // end event dom
		*/
		//window.addEventListener('DOMContentLoaded', function() {
			//alert('perr');
			$('#btn-modal-request').click(function() {
				//$('#modalCita').modal('show');
			}); // end click
			$('#btn-modal-request2').click(function() {
				
				
			}); // end click

			$("#step2").hide();


			

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
                language: "es",
                format: "dd/mm/yyyy",
    			startDate: today,
    			autoclose: true,
    			ignoreReadonly: true
    			//daysOfWeekDisabled: disable_days
            });

            $('.clockpicker').clockpicker({
			    placement: 'top',
			    align: 'left',
			    donetext: 'OK'
			});

			$("#btnContinuar").click(function(){
				if($("#date").val()!='' && $("#time").val()!=''){
					$("#step1").hide();
					$("#step2").show();	
				}
			});		

			$("#btnAtras").click(function(){
				$("#step2").hide();
				$("#step1").show();
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



			setTimeout(function () { 
    			initMap();
			}, 2000);

	}); // end event dom

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
	</script>
@endsection
