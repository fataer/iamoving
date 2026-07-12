	@extends('layouts.iamhome')
	@section('title', 'IAMOVING - Fácil de alquilar, comprar y vender')
	@section('description', '¡Fácil de alquilar, comprar y vender!')
	@section('image', 'https://iamoving.com/img/iamoving.png')
	@section('banner')
		@include('navigation.lookfor')
	@endsection
															  <style data-jss="" data-meta="MuiPaper" data-jss-server-side="true">.jss33{background-color:#fff}.jss34{border-radius:2px}.jss35{box-shadow:none}.jss36{box-shadow:0 1px 3px 0 rgba(0,0,0,.2),0 1px 1px 0 rgba(0,0,0,.14),0 2px 1px -1px rgba(0,0,0,.12)}.jss37{box-shadow:0 1px 5px 0 rgba(0,0,0,.2),0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.12)}.jss38{box-shadow:0 1px 8px 0 rgba(0,0,0,.2),0 3px 4px 0 rgba(0,0,0,.14),0 3px 3px -2px rgba(0,0,0,.12)}.jss39{box-shadow:0 2px 4px -1px rgba(0,0,0,.2),0 4px 5px 0 rgba(0,0,0,.14),0 1px 10px 0 rgba(0,0,0,.12)}.jss40{box-shadow:0 3px 5px -1px rgba(0,0,0,.2),0 5px 8px 0 rgba(0,0,0,.14),0 1px 14px 0 rgba(0,0,0,.12)}.jss41{box-shadow:0 3px 5px -1px rgba(0,0,0,.2),0 6px 10px 0 rgba(0,0,0,.14),0 1px 18px 0 rgba(0,0,0,.12)}.jss42{box-shadow:0 4px 5px -2px rgba(0,0,0,.2),0 7px 10px 1px rgba(0,0,0,.14),0 2px 16px 1px rgba(0,0,0,.12)}.jss43{box-shadow:0 5px 5px -3px rgba(0,0,0,.2),0 8px 10px 1px rgba(0,0,0,.14),0 3px 14px 2px rgba(0,0,0,.12)}.jss44{box-shadow:0 5px 6px -3px rgba(0,0,0,.2),0 9px 12px 1px rgba(0,0,0,.14),0 3px 16px 2px rgba(0,0,0,.12)}.jss45{box-shadow:0 6px 6px -3px rgba(0,0,0,.2),0 10px 14px 1px rgba(0,0,0,.14),0 4px 18px 3px rgba(0,0,0,.12)}.jss46{box-shadow:0 6px 7px -4px rgba(0,0,0,.2),0 11px 15px 1px rgba(0,0,0,.14),0 4px 20px 3px rgba(0,0,0,.12)}.jss47{box-shadow:0 7px 8px -4px rgba(0,0,0,.2),0 12px 17px 2px rgba(0,0,0,.14),0 5px 22px 4px rgba(0,0,0,.12)}.jss48{box-shadow:0 7px 8px -4px rgba(0,0,0,.2),0 13px 19px 2px rgba(0,0,0,.14),0 5px 24px 4px rgba(0,0,0,.12)}.jss49{box-shadow:0 7px 9px -4px rgba(0,0,0,.2),0 14px 21px 2px rgba(0,0,0,.14),0 5px 26px 4px rgba(0,0,0,.12)}.jss50{box-shadow:0 8px 9px -5px rgba(0,0,0,.2),0 15px 22px 2px rgba(0,0,0,.14),0 6px 28px 5px rgba(0,0,0,.12)}.jss51{box-shadow:0 8px 10px -5px rgba(0,0,0,.2),0 16px 24px 2px rgba(0,0,0,.14),0 6px 30px 5px rgba(0,0,0,.12)}.jss52{box-shadow:0 8px 11px -5px rgba(0,0,0,.2),0 17px 26px 2px rgba(0,0,0,.14),0 6px 32px 5px rgba(0,0,0,.12)}.jss53{box-shadow:0 9px 11px -5px rgba(0,0,0,.2),0 18px 28px 2px rgba(0,0,0,.14),0 7px 34px 6px rgba(0,0,0,.12)}.jss54{box-shadow:0 9px 12px -6px rgba(0,0,0,.2),0 19px 29px 2px rgba(0,0,0,.14),0 7px 36px 6px rgba(0,0,0,.12)}.jss55{box-shadow:0 10px 13px -6px rgba(0,0,0,.2),0 20px 31px 3px rgba(0,0,0,.14),0 8px 38px 7px rgba(0,0,0,.12)}.jss56{box-shadow:0 10px 13px -6px rgba(0,0,0,.2),0 21px 33px 3px rgba(0,0,0,.14),0 8px 40px 7px rgba(0,0,0,.12)}.jss57{box-shadow:0 10px 14px -6px rgba(0,0,0,.2),0 22px 35px 3px rgba(0,0,0,.14),0 8px 42px 7px rgba(0,0,0,.12)}.jss58{box-shadow:0 11px 14px -7px rgba(0,0,0,.2),0 23px 36px 3px rgba(0,0,0,.14),0 9px 44px 8px rgba(0,0,0,.12)}.jss59{box-shadow:0 11px 15px -7px rgba(0,0,0,.2),0 24px 38px 3px rgba(0,0,0,.14),0 9px 46px 8px rgba(0,0,0,.12)}</style>
															  <style data-jss="" data-meta="MuiSvgIcon" data-jss-server-side="true">.jss215{fill:currentColor;width:1em;height:1em;display:inline-block;font-size:24px;transition:fill .2s cubic-bezier(.4,0,.2,1) 0s;user-select:none;flex-shrink:0}.jss216{color:#5063f0}.jss217{color:#36b67e}.jss218{color:rgba(0,0,0,.54)}.jss219{color:#c6292e}.jss220{color:rgba(0,0,0,.26)}</style>
															  <style data-jss="" data-meta="MuiAvatar" data-jss-server-side="true">.jss261{width:40px;height:40px;display:flex;position:relative;overflow:hidden;font-size:1.25rem;align-items:center;flex-shrink:0;font-family:Roboto,Helvetica,Arial,sans-serif;user-select:none;border-radius:50%;justify-content:center}.jss262{color:#fafafa;background-color:#bdbdbd}.jss263{width:100%;height:100%;text-align:center;object-fit:cover}</style>
															  <style data-jss="" data-meta="MuiChip" data-jss-server-side="true">.jss254{color:rgba(0,0,0,.87);height:32px;cursor:default;border:none;display:inline-flex;outline:0;padding:0;font-size:.8125rem;transition:background-color .3s cubic-bezier(.4,0,.2,1) 0s,box-shadow .3s cubic-bezier(.4,0,.2,1) 0s;font-family:Roboto,Helvetica,Arial,sans-serif;align-items:center;white-space:nowrap;border-radius:16px;justify-content:center;text-decoration:none;background-color:#e0e0e0}.jss255{cursor:pointer;-webkit-tap-highlight-color:transparent}.jss255:focus,.jss255:hover{background-color:#cecece}.jss255:active{box-shadow:0 1px 3px 0 rgba(0,0,0,.2),0 1px 1px 0 rgba(0,0,0,.14),0 2px 1px -1px rgba(0,0,0,.12);background-color:#c5c5c5}.jss256:focus{background-color:#cecece}.jss257{width:32px;color:#616161;height:32px;font-size:1rem;margin-right:-4px}.jss258{width:19px;height:19px}.jss259{cursor:inherit;display:flex;align-items:center;user-select:none;white-space:nowrap;padding-left:12px;padding-right:12px}.jss260{color:rgba(0,0,0,.26);cursor:pointer;height:auto;margin:0 4px 0 -8px;-webkit-tap-highlight-color:transparent}.jss260:hover{color:rgba(0,0,0,.4)}</style>
															  <style data-jss="" data-meta="MuiListItemText" data-jss-server-side="true">.jss221{flex:1 1 auto;padding:0 16px;min-width:0}.jss221:first-child{padding-left:0}.jss222:first-child{padding-left:56px}.jss223{font-size:.8125rem}.jss224.jss226{font-size:inherit}.jss225.jss226{font-size:inherit}</style>
															  <style data-jss="" data-meta="MuiList" data-jss-server-side="true">.jss200{margin:0;padding:0;position:relative;list-style:none}.jss201{padding-top:0px;padding-bottom:15px}.jss202{padding-top:4px;padding-bottom:4px}.jss203{padding-top:0}</style>
															  <style data-jss="" data-meta="MuiListItem" data-jss-server-side="true">.jss204{width:100%;display:flex;position:relative;box-sizing:border-box;text-align:left;align-items:center;justify-content:flex-start;text-decoration:none}.jss205{position:relative}.jss206{background-color:rgba(0,0,0,.08)}.jss207{padding-top:12px;padding-bottom:12px}.jss208{padding-top:8px;padding-bottom:8px}.jss209{opacity:.5}.jss210{border-bottom:1px solid rgba(0,0,0,.12);background-clip:padding-box}.jss211{padding-left:16px;padding-right:16px}@media (min-width:600px){.jss211{padding-left:24px;padding-right:24px}}.jss212{transition:background-color 150ms cubic-bezier(.4,0,.2,1) 0s}.jss212:hover{text-decoration:none;background-color:rgba(0,0,0,.08)}@media (hover:none){.jss212:hover{background-color:transparent}}.jss213{padding-right:32px}</style>
															  <style data-styled-components="dXmWES gBVOkB gJSIof hJtXAX ennvRr beARfa erBcUv bUDmxF chXjd XGznH igrgBm gTJEJf cIabBZ hjBPaq hBnwDG ikUjOx kClLBD frsdOu ifaIBM eVFVHD jiARkd ibMzuR eSXgoZ KcvRp gzeFNP hewaoz ijGWLb dFfBsL ceeDHP dfRjos cPxFMD Llvfd cCUkNc crmnOp flhJMf fkIsxQ hsYizb jLBqWK MDUIL kuvAWT MFaSx lehBNN" data-styled-components-is-local="true">.chXjd{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:inherit;margin-bottom:0;font-size:14px;font-weight:500;line-height:24px}.XGznH{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:#fff;text-align:inherit;margin-bottom:8px;font-size:34px;font-weight:400;line-height:40px}.igrgBm{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:#fff;text-align:inherit;margin-bottom:0;font-size:24px;font-weight:400;line-height:32px}.gTJEJf{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:center;margin-bottom:8px;font-size:24px;font-weight:400;line-height:32px}.cIabBZ{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:rgba(0,0,0,.54);text-align:center;margin-bottom:8px;font-size:20px;font-weight:500;line-height:24px}.hjBPaq{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:center;margin-bottom:8px;font-size:20px;font-weight:500;line-height:24px}.hBnwDG{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:rgba(0,0,0,.54);text-align:center;margin-bottom:8px;font-size:14px;font-weight:400;line-height:20px}.ikUjOx{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:left;margin-bottom:8px;font-size:20px;font-weight:500;line-height:24px}.kClLBD{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:rgba(0,0,0,.54);text-align:left;margin-bottom:8px;font-size:14px;font-weight:400;line-height:20px}.frsdOu{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:inherit;margin-bottom:8px;font-size:14px;font-weight:400;line-height:20px}.ifaIBM{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:#5063f0;text-align:inherit;margin-bottom:8px;font-size:14px;font-weight:400;line-height:20px}.eVFVHD{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:inline;color:#5063f0;text-align:inherit;margin-bottom:0;font-size:14px;font-weight:400;line-height:20px}.jiARkd{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:inherit;margin-bottom:0;font-size:14px;font-weight:400;line-height:20px}.ibMzuR{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:#757575;text-align:inherit;margin-bottom:0;font-size:14px;font-weight:400;line-height:20px}.eSXgoZ{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:center;margin-bottom:0;font-size:14px;font-weight:400;line-height:20px}.KcvRp{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:#36b67e;text-align:inherit;margin-bottom:8px;font-size:14px;font-weight:400;line-height:20px}.gzeFNP{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:inline;color:#36b67e;text-align:inherit;margin-bottom:0;font-size:14px;font-weight:400;line-height:20px}.hewaoz{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:rgba(0,0,0,.87);text-align:inherit;margin-bottom:8px;font-size:14px;font-weight:400;line-height:20px}.ijGWLb{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:inline;color:rgba(0,0,0,.87);text-align:inherit;margin-bottom:0;font-size:14px;font-weight:400;line-height:20px}.dFfBsL{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:center;margin-bottom:8px;font-size:14px;font-weight:400;line-height:20px}.ceeDHP{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:center;margin-bottom:0;font-size:24px;font-weight:400;line-height:32px}.dfRjos{font-family:Ro
	boto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:center;margin-bottom:0;font-size:34px;font-weight:400;line-height:40px}.cPxFMD{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:inherit;margin-bottom:8px;font-size:20px;font-weight:500;line-height:24px}.Llvfd{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:rgba(0,0,0,.54);text-align:inherit;margin-bottom:0;font-size:14px;font-weight:400;line-height:20px}.cCUkNc{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:rgba(0,0,0,.54);text-align:inherit;margin-bottom:8px;font-size:16px;font-weight:400;line-height:24px}.crmnOp{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:rgba(0,0,0,.54);text-align:inherit;margin-bottom:0;font-size:16px;font-weight:400;line-height:24px}.flhJMf{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:center;margin-bottom:0;font-size:16px;font-weight:400;line-height:24px}.fkIsxQ{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:#fff;text-align:center;margin-bottom:8px;font-size:20px;font-weight:500;line-height:24px}.hsYizb{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:#fff;text-align:center;margin-bottom:8px;font-size:14px;font-weight:400;line-height:20px}.jLBqWK{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:rgba(0,0,0,.54);text-align:center;margin-bottom:0;font-size:24px;font-weight:400;line-height:32px}.MDUIL{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:center;margin-bottom:0;font-size:14px;font-weight:500;line-height:24px}.kuvAWT{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:rgba(0,0,0,.54);text-align:inherit;margin-bottom:0;font-size:12px;font-weight:400;line-height:16px}.MFaSx{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:#5063f0;text-align:inherit;margin-bottom:0;font-size:16px;font-weight:400;line-height:24px}.lehBNN{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:#5063f0;text-align:inherit;margin-bottom:0;font-size:14px;font-weight:400;line-height:20px}.ennvRr{min-height:56px}.beARfa{height:56px;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center}.erBcUv{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;height:100%}.bUDmxF{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:end;-webkit-justify-content:flex-end;-ms-flex-pack:end;justify-content:flex-end;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;height:100%}.hJtXAX{margin:0 auto;max-width:1032px;height:100%;width:100%}.dXmWES{display:none;background-color:transparent;height:100vh;left:0;position:fixed;top:0;width:100vw;z-index:1500}.gBVOkB>div>div{max-width:76%}</style>
															  <style data-styled-components="kcdrgG gbgWxw kGwXKn iqQlkx erYulP iyFjeg dzqYJX kxNuvV" data-styled-components-is-local="true">.erYulP{background-color:#bdbdbd;height:1px}.dzqYJX{background-color:#e0e0e0;height:1px}.iqQlkx{margin-top:0;margin-bottom:0;margin-left:0;margin-right:0}.iyFjeg{margin-top:16px;margin-bottom:0;margin-left:0;margin-right:0}.kxNuvV{margin-top:16px;margin-bottom:16px;margin-left:0;margin-right:0}.kcdrgG{background-color:#5063f0;color:#fff;height:24px;margin-right:0}.gbgWxw{background-color:#36b67e;color:#fff;height:24px;margin-right:0}.kGwXKn{background-color:#757575;color:#fff;height:24px;margin-right:0}</style>
															  <style data-styled-components="jRMlPf bIjFSD kFonpi cDbjPL jMeSWB kssgEf cBqmhB gGlJek fsPzpa gPbtZL iMongt iyBYz qdGDr hsUnyu gvSOMz fBCnjt htIvPI dHNjDd hwnlfP eTPBlk bOZbmT lldQGB fExEbq bHLhwF NTnEt ljgrBQ bjiHAd kWbEJZ orrIZ pRFLs gAyQQz jvOyHm kksBWm dGwtKs cQmYyz" data-styled-components-is-local="true">.cQmYyz{margin-bottom:0}.jRMlPf{margin-bottom:0;padding-left:16px}.kksBWm{margin-bottom:16px;padding-left:0}.jvOyHm{display:inline-block;margin-bottom:8px;margin-top:32px}.NTnEt{-webkit-text-decoration:none;text-decoration:none;color:#424242}.NTnEt:hover{color:#5063f0;-webkit-transition:color .4s ease;transition:color .4s ease}.ljgrBQ{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;height:32px;-webkit-box-pack:start;-webkit-justify-content:flex-start;-ms-flex-pack:start;justify-content:flex-start;margin:16px 0}.dGwtKs{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;height:32px;-webkit-box-pack:end;-webkit-justify-content:flex-end;-ms-flex-pack:end;justify-content:flex-end;margin:16px 0}.bjiHAd{margin-bottom:8px}.kWbEJZ{margin-bottom:8px}.pRFLs{margin-bottom:8px}.orrIZ{margin-bottom:8px}.gAyQQz{-webkit-text-decoration:none;text-decoration:none;color:#757575}.gAyQQz:hover{color:#757575;-webkit-transition:color .4s ease;transition:color .4s ease}.fExEbq{background-color:#fafafa;padding:16px 0;margin:0}.bHLhwF{margin:0 24px}.bOZbmT{-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;background-color:#5063f0;border-radius:0;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-box-pack:justify;-webkit-justify-content:space-between;-ms-flex-pack:justify;justify-content:space-between;padding:24px;padding-bottom:48px}@media (max-width:599.95px){.bOZbmT{padding-bottom:32px;padding-top:0}}.lldQGB{-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;margin-top:24px}.gPbtZL{font-size:34px;font-weight:400;line-height:40px}@media (max-width:959.95px){.gPbtZL{font-size:24px;font-weight:400;line-height:32px}}.iMongt{font-size:16px;font-weight:400;line-height:24px}.kFonpi{color:inherit;display:inline-block;-webkit-text-decoration:none;text-decoration:none;margin-right:40px}.bIjFSD{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:end;-webkit-justify-content:flex-end;-ms-flex-pack:end;justify-content:flex-end;-webkit-align-items:baseline;-webkit-box-align:baseline;-ms-flex-align:baseline;align-items:baseline}.cDbjPL{-webkit-flex-direction:row;-ms-flex-direction:row;flex-direction:row;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-wrap:wrap;-ms-flex-wrap:wrap;flex-wrap:wrap;-webkit-align-items:flex-start;-webkit-box-align:flex-start;-ms-flex-align:flex-start;align-items:flex-start;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center}.iyBYz{-webkit-flex-direction:row;-ms-flex-direction:row;flex-direction:row;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-wrap:wrap;-ms-flex-wrap:wrap;flex-wrap:wrap;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center}.htIvPI{-webkit-flex-direction:row;-ms-flex-direction:row;flex-direction:row;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-wrap:wrap;-ms-flex-wrap:wrap;flex-wrap:wrap;-webkit-align-items:stretch;-webkit-box-align:stretch;-ms-flex-align:stretch;align-items:stretch;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center}.jMeSWB{position:relative;box-sizing:border-box;width:100%;padding:0 8px;-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}@media (min-width:600p
	x){.jMeSWB{-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}}@media (min-width:960px){.jMeSWB{-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}}@media (min-width:1280px){.jMeSWB{-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}}@media (min-width:1920px){.jMeSWB{-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}}.qdGDr{position:relative;box-sizing:border-box;width:100%;padding:0 8px;-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}@media (min-width:600px){.qdGDr{-webkit-flex:0 0 16.666666666666664%;-ms-flex:0 0 16.666666666666664%;flex:0 0 16.666666666666664%;max-width:16.666666666666664%}}@media (min-width:960px){.qdGDr{-webkit-flex:0 0 16.666666666666664%;-ms-flex:0 0 16.666666666666664%;flex:0 0 16.666666666666664%;max-width:16.666666666666664%}}@media (min-width:1280px){.qdGDr{-webkit-flex:0 0 16.666666666666664%;-ms-flex:0 0 16.666666666666664%;flex:0 0 16.666666666666664%;max-width:16.666666666666664%}}@media (min-width:1920px){.qdGDr{-webkit-flex:0 0 16.666666666666664%;-ms-flex:0 0 16.666666666666664%;flex:0 0 16.666666666666664%;max-width:16.666666666666664%}}.hsUnyu{position:relative;box-sizing:border-box;width:100%;padding:0 8px;-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}@media (min-width:600px){.hsUnyu{-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}}@media (min-width:960px){.hsUnyu{-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}}@media (min-width:1280px){.hsUnyu{-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}}@media (min-width:1920px){.hsUnyu{-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}}.gvSOMz{position:relative;box-sizing:border-box;width:100%;padding:0 8px;-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}@media (min-width:600px){.gvSOMz{-webkit-flex:0 0 8.333333333333332%;-ms-flex:0 0 8.333333333333332%;flex:0 0 8.333333333333332%;max-width:8.333333333333332%}}@media (min-width:960px){.gvSOMz{-webkit-flex:0 0 8.333333333333332%;-ms-flex:0 0 8.333333333333332%;flex:0 0 8.333333333333332%;max-width:8.333333333333332%}}@media (min-width:1280px){.gvSOMz{-webkit-flex:0 0 8.333333333333332%;-ms-flex:0 0 8.333333333333332%;flex:0 0 8.333333333333332%;max-width:8.333333333333332%}}@media (min-width:1920px){.gvSOMz{-webkit-flex:0 0 8.333333333333332%;-ms-flex:0 0 8.333333333333332%;flex:0 0 8.333333333333332%;max-width:8.333333333333332%}}.fBCnjt{position:relative;box-sizing:border-box;width:100%;padding:0 8px;-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}@media (min-width:600px){.fBCnjt{-webkit-flex:0 0 25%;-ms-flex:0 0 25%;flex:0 0 100%;max-width:50%}}@media (min-width:960px){.fBCnjt{-webkit-flex:0 0 25%;-ms-flex:0 0 25%;flex:0 0 100%;max-width:50%}}@media (min-width:1280px){.fBCnjt{-webkit-flex:0 0 25%;-ms-flex:0 0 25%;flex:0 0 100%;max-width:50%}}@media (min-width:1920px){.fBCnjt{-webkit-flex:0 0 25%;-ms-flex:0 0 25%;flex:0 0 100%;max-width:50%}}.dHNjDd{position:relative;box-sizing:border-box;width:100%;padding:0 8px;-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}@media (min-width:600px){.dHNjDd{-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}}@media (min-width:960px){.dHNjDd{-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}}@media (min-width:1280px){.dHNjDd{-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}}@media (min-width:1920px){.dHNjDd{-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}}.hwnlfP{position:relative;box-sizing:border-box;width:100%;padding:0 8px;-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}@media (min-width:600px){.hwnlfP{-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}}@media (min-width:960px){.hwnlfP{-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}}@media (min-width:1280px){.hwnlfP{-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}}@media (min-width:1920px){.hwnlfP{-webkit-flex:0 0 100%;-ms-flex:0 0 100%
	;flex:0 0 100%;max-width:100%}}.eTPBlk{position:relative;box-sizing:border-box;width:100%;padding:0 8px;-webkit-flex:0 0 66.66666666666666%;-ms-flex:0 0 66.66666666666666%;flex:0 0 66.66666666666666%;max-width:66.66666666666666%}@media (min-width:600px){.eTPBlk{-webkit-flex:0 0 66.66666666666666%;-ms-flex:0 0 66.66666666666666%;flex:0 0 66.66666666666666%;max-width:66.66666666666666%}}@media (min-width:960px){.eTPBlk{-webkit-flex:0 0 83.33333333333334%;-ms-flex:0 0 83.33333333333334%;flex:0 0 83.33333333333334%;max-width:83.33333333333334%}}@media (min-width:1280px){.eTPBlk{-webkit-flex:0 0 91.66666666666666%;-ms-flex:0 0 91.66666666666666%;flex:0 0 91.66666666666666%;max-width:91.66666666666666%}}@media (min-width:1920px){.eTPBlk{-webkit-flex:0 0 91.66666666666666%;-ms-flex:0 0 91.66666666666666%;flex:0 0 91.66666666666666%;max-width:91.66666666666666%}}.cBqmhB{line-height:1.5}@media (max-width:599.95px){.cBqmhB{text-align:center;font-size:24px;font-weight:400;line-height:32px}}@media (max-width:599.95px){.fsPzpa{font-size:16px;font-weight:400;line-height:24px}}.kssgEf{padding-right:32px}@media (max-width:599.95px){.kssgEf{padding:32px 16px;text-align:center}}@media (max-width:599.95px){.gGlJek{max-width:190px;margin:0 auto}}</style>
															  <style data-styled-components="jmUojt dVZpFn gEonKY fYgwDV iApApL kBcekM kKAqKs gZzrSB fBbfOY htgUWi fHaeNg doEYka bokSOt jCQGKS jJsluQ ecJbVf hAjjvO gWOtiB RHDgE gyWGXd jDJpTw kClokr jeqLQt hvImqV gqysQO jWLPEz jugaIX fEgzNb jGCInU gSwQos kJSChf bSjNsS cMtsMw kbXedg fYiiuQ bWRwhi eynmni gkpJHv dppadL ecJbVg" data-styled-components-is-local="true">@media (max-width:959.95px){.dVZpFn{-webkit-order:-1;-ms-flex-order:-1;order:-1}}@media (max-width:599.95px){.dVZpFn{padding:0}}.kBcekM{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex}.iApApL{border:none;margin:0;padding:0;min-width:0}.gEonKY{background-color:#fff;padding:8px 24px;border-radius:2px}@media (max-width:599.95px){.gEonKY{border-radius:0;padding-left:8px;padding-right:8px}}.fYgwDV{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column}@media (max-width:599.95px){.fYgwDV{margin:24px 16px 16px;border:solid 1px #e0e0e0;padding:16px}}.kKAqKs{-webkit-align-self:center;-ms-flex-item-align:center;align-self:center;padding-top:24px}.gZzrSB{-webkit-align-self:center;-ms-flex-item-align:center;align-self:center;margin:24px 0}.jmUojt{background-color:#5063f0;padding:32px 0}@media (max-width:599.95px){.jmUojt{padding:0}}.kbXedg{margin:8px 0}@media (max-width:599.95px){.kbXedg{text-align:center}}.cMtsMw{padding:8px 16px;background-color:#e0e0e0;max-width:410px;top:50%;right:16px;-webkit-transform:translateY(-50%);-ms-transform:translateY(-50%);transform:translateY(-50%)}@media (min-width:960px){.cMtsMw{max-width:670px;position:absolute}}@media (max-width:599.95px){.cMtsMw{background-color:transparent;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-transform:none;-ms-transform:none;transform:none}}.gSwQos{padding:32px 0;overflow:hidden}@media (max-width:599.95px){.gSwQos{padding:0;padding-bottom:16px;margin:0 24px}}.kJSChf{position:relative;margin-top:32px}@media (max-width:599.95px){.kJSChf{margin-top:16px}}.bSjNsS{margin-left:16px}@media (max-width:599.95px){.bSjNsS{margin-left:0;width:100%}}.bokSOt{margin:24px 0}.doEYka{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;padding-top:24px;padding-bottom:16px}.fBbfOY{padding:32px;-webkit-align-content:center;-ms-flex-line-pack:center;align-content:center}.htgUWi{text-align:center}@media (max-width:599.95px){.htgUWi{margin-top:24px}}.fHaeNg{-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;height:100%}@media (max-width:599.95px){.fHaeNg.textContent *{text-align:center}}.dppadL{position:absolute;left:0;top:0;width:100%;height:100%}.eynmni{width:100%;position:relative}.gkpJHv{width:100%;display:block;padding:6.4%}.jGCInU{padding:48px 16px;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;height:auto}@media (max-width:599.95px){.jGCInU{background-color:transparent;padding:32px 16px}}.bWRwhi{margin-top:auto;padding-top:24px;width:170px}.fYiiuQ{margin-top:32px}.jCQGKS{overflow:hidden;padding-top:0px;padding-bottom:10px}.jJsluQ{padding-bottom:24px}.hvImqV{line-height:2.5;position:absolute;top:0;left:0;right:0;color:#fff;background-color:#36b67e}.gyWGXd{font-size:54px;line-height:1}.RHDgE{font-size:24px;font-weight:400;line-height:32px}.hAjjvO{padding:24px 0}.jDJpTw{padding:16px;min-height:130px}.gWOtiB{height:unset;padding-bottom:4px;padding-top:4px}.kClokr{margin-right:0;color:#5063f0}.gqysQO{margin-right:0;color:#36b67e}.fEgzNb{margin-right:0;color:inherit}.jeqL
	Qt{margin-top:16px}.ecJbVf{background-color:#333333;color:#424242;text-align:center;padding:0px 0;position:relative;height:100%}.ecJbVh{text-align:center;padding:0 0;position:relative;height:100%}.jugaIX{background-color:#fafafa;color:#424242;font-size:14px;font-weight:400;line-height:20px}.ecJbVg{text-align:center;padding:32px 0;position:relative;height:70%}.jugaIX{background-color:#fafafa;color:#424242;font-size:14px;font-weight:400;line-height:20px}.jWLPEz{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;height:100%}</style>
															  <style data-styled-components="gzHlrG hsCtPg fUOAvB dLPVue ilVeTz ePPSMY hhNpJT fuLfMH grdcPs LECyq cnVKvy exhWPQ dtfZhD yzWpN" data-styled-components-is-local="true">.gzHlrG{background-color:#fafafa;overflow:hidden;padding:24px;padding-top:16px;padding-bottom:32px;text-align:center}.fUOAvB{background-color:#e0e0e0;overflow:hidden;padding:24px;padding-top:16px;padding-bottom:32px;text-align:center}.hsCtPg{max-width:290px;margin:0 auto}.cnVKvy{margin-bottom:32px}.grdcPs{padding-top:48px;padding-bottom:48px;background-color:#e0e0e0}.LECyq{margin-top:32px;margin-bottom:32px}.exhWPQ{-webkit-flex:1;-ms-flex:1;flex:1;text-align:center;padding-left:8px;padding-right:8px}@media (max-width:959.95px){.exhWPQ{-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;margin-bottom:16px}.exhWPQ:nth-child(n+4){display:none}}.yzWpN{-webkit-flex:1;-ms-flex:1;flex:1;text-align:center;padding-left:8px;padding-right:8px}@media (max-width:959.95px){.yzWpN{-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%}.yzWpN:nth-child(n+4){display:none}}.dtfZhD{width:100%}@media (max-width:959.95px){.dtfZhD{width:auto}}.hhNpJT{margin-top:16px}.ePPSMY{text-align:center;-webkit-align-self:flex-start;-ms-flex-item-align:start;align-self:flex-start}@media (max-width:599.95px){.ePPSMY{margin:24px 0;-webkit-align-self:center;-ms-flex-item-align:center;align-self:center}}.fuLfMH{background-color:#36b67e;margin-right:8px;margin-top:8px}.fuLfMH>span{color:#fff}.dLPVue{padding:48px 32px}.ilVeTz{margin-top:32px}@media (max-width:599.95px){.ilVeTz{text-align:center}}</style>	  		
	@section('content')
		<!-- feature section -->
		<!--<div class="container my-0 mb-2" style="background-color:white;">-->
											<!--<div class="container my-2">
													<div class="row mt-3">
														<div class="col-md-2">
														</div>
												
															<div class="col-md-8 text-center mb-3">
																	<img src="/img/icono.png"  width="200" height="62" style="margin-bottom:1px;">
															</div>
														<div class="col-md-2">
														</div>
													</div>		
											</div>	-->
		<!--<div class="container my-0 mb-2">
					 <div class="container my-0">
						<div class="section-title text-center" style="margin-top: 30px;margin-bottom: 0px;">

							<h2 class="font-weight-bold d-none d-sm-none d-md-block">Mejoramos tu experiencia de alquilar, comprar y vender</h2>
							<h5 class="font-weight-bold d-none d-block d-sm-block d-md-none">Mejoramos tu experiencia de alquilar, comprar y vender</h5>
						</div>
					 </div>
					<div  class="container my-0">
							 <div class="row mt-2">
								<div class="col-md-2">
								   </div>
									<div class="col-md-8 text-center">
								<h5 class="display-5 text-center my-1" >Hoy en día, desde el sofá de casa, podemos anunciar, buscar y encontrar una gran cantidad de propiedades, posibles inquilinos y compradores.<h5>
								<h5 class="display-5 text-center my-1" >Con Internet y las excelentes plataformas disponibles en el mercado, esto se ha convertido en una tarea rápida y práctica.<h5>
									</div>
									
									<div class="col-md-2">
									</div>
							  </div>				

					</div>
		</div>-->

			

						<br>
		<div id="modalInformacion" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-lg">
		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-header">
			<h4 id="modal-request-title" class="modal-title">IAMOVING</h4>
		  </div>
		  <div class="modal-body">
					{!! csrf_field() !!} 
						<div class="col-md-12">
							<div class="form-group">
							<!--<label><b>Ahorrando dinero</b></label>-->
								<ul>
									<li class="ml-5">
										Se trata de una startup para la difusión de las visitas virtuales y facilitación de los procesos de arrendamiento o compraventa de inmuebles. No actuamos como inmobiliarias ni intermediarios, sin beneficiarse de ninguna manera del negocio directo entre las partes ni cobrando ningún tipo de comisión a los propietarios, compradores o inquilinos.								</li>
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
		<section class="feature-section spad" style="padding-top: 10px;">
			  <div class="container my-0 mt-0" style="padding-top:20px;padding-right: 0px;padding-left: 0px;">
				<div class="row mt-0 mb-3">
					<div class="col-md-3">
					</div>
					<div class="col-md-6">
					
						<div class="section-title text-center" style="margin-bottom:0px;">
							<h3 class="font-weight-bold subtitle_feature text-center" >¡NOS ACABAN DE ENTRAR!</h3>
						</div>												
					</div>
					<div class="col-md-3">
					</div>
				</div>
			<div>
			  <!--  <div class="section-title text-center" style="margin-bottom:0px;">
					<h3 class="font-weight-bold subtitle_feature_yellow text-center">¡ NOS ACABAN DE ENTRAR !</h3>
				</div>-->

				<div class="owl-carousel">
					@foreach ($showcase as $item)
						<div class="item">
							<div id="card_container" class="card-grid">
								@if($item->estado_inmueble == 'Disponible' || $item->estado_inmueble == 'Reservado' || $item->estado_inmueble == 'Alquilado' || $item->estado_inmueble == 'Vendido')
									<div id="box_{{$item->id}}" class="feature-item inmueble ">
										<a href="/VisitaVirtual/{{ $item->id }}"  target="_blank" style="text-decoration:none;">
											<div class="feature-pic set-bg" style="background-image: url(/storage/{{$item->path_image_primary}})">
												<div class="@if($item->is_sale == '1') sale-notic @else rent-notic @endif">@if($item->is_sale == '1') En Venta @else En Alquiler @endif</div>
												@if($item->video_primary)
													<div class="play-btn">
														<img width="70" height="70" src="/img/play_btn.png" onclick="showVideo({{$item->id}},'{{$item->video_primary}}',event)" title="Ver video" />
													</div>
												@endif
												<p id="text">
													@if($item->estado_inmueble == 'Vendido')
														<div class="rotar1">VENDIDO</div>
													@endif
													@if($item->estado_inmueble == 'Alquilado')
														<div class="rotar1">ALQUILADO</div>
													@endif
													@if($item->estado_inmueble == 'Reservado')
														<div class="rotar1">RESERVADO</div>
													@endif
													
												</p>
											</div>
										</a>
										
										<div class="feature-text border-0" style="cursor:hand;" onclick="window.open('/VisitaVirtual/{{$item->id }}', '_blank');">
											<div class="text-center feature-title">
												<h5><a href="/VisitaVirtual/{{$item->id }}" style="color:#EADD1B;" target="_blank">Referencia {{$item->id}}</a></h5>
												<p><i class="fa fa-map-marker"></i> {{$item->road}}</p>
												@if($item->id == 85)
													<p class="price">Precio a consultar</p>
												@elsif($item->tipo_inmueble == 'Habitaciones' && $item->bedrooms > 1)
													<p class="price">Desde € {{ number_format($item->propiedad_precio, 0, ',', '.') }}</p>
												@else
												  <p class="price">€ {{ number_format($item->propiedad_precio, 0, ',', '.') }}</p>
												@endif
												
										
							
											</div>
											<div class="room-info-warp">
												<div class="room-info">
													<div class="rf-left">
														
														@if($item->bedrooms && $item->tipo_inmueble !='Local/Oficina')
															<p><i class="fas fa-bed"></i> Dormitorios: {{$item->bedrooms}} </p>    
														@endif
														@if($item->bedrooms && $item->tipo_inmueble =='Local/Oficina')
															<p><i class="fas fa-bed"></i> Estancias: {{$item->bedrooms}} </p>										    
														@endif
														
														
														<p><i class="fa fa-th-large"></i> {{$item->square_meters}} m<sup>2</sup></p>
													</div>
													<div class="rf-right">
														@if($item->estudio == 1)
															<p><i class="fa fa-check-square"></i> Estudio</p>    
														@endif
														@if($item->apartamento == 1)
															<p><i class="fa fa-check-square"></i> Apartamento</p>    
														@endif
														@if($item->chalet == 1)
															<p><i class="fa fa-check-square"></i> Chalet</p>    
														@endif
														@if($item->loft == 1)
															<p><i class="fa fa-check-square"></i> Loft</p>
														@endif
														@if($item->piso == 1)
															<p><i class="fa fa-check-square"></i> Piso</p>
														@endif
														@if($item->bajo == 1)
															<p><i class="fa fa-check-square"></i> Bajo</p>
														@endif
														@if($item->atico == 1)
															<p><i class="fa fa-check-square"></i> Ático</p>
														@endif
														
														@if($item->bathrooms)
															<p><i class="fa fa-bath"></i> Baños: {{$item->bathrooms}}</p>    
														@endif
														@if($item->tipo_inmueble =='Local/Oficina' && !$item->bathrooms && $item->aseos)
															<p><i class="fa fa-bath"></i> Aseos: {{$item->aseos}}</p>
														@endif
														
													</div>
													
												</div>
												<p class="fa-2x text-right">
				
												</p>
											</div>
										</div>
										
									</div>
								@endif
							</div>
						</div>    
					@endforeach
				</div>
				
			   
				
			 
					<!--<div class="my-0 col-12">
						<div class="row  justify-content-center align-items-center">
							<a href="#" class="btn btn-warning">Ver más..</a>
						</div>
					</div>-->
					<div class="my-0 col-12">
						<div class="row  justify-content-center align-items-center">
							<a href="/inmuebles"  class="btn btn-warning">Ver más inmuebles ..</a>
						</div>
					</div>				
			<br>
			<br>		
				<br>
					<div class="section-title text-center my-4">
						<h3 class="font-weight-bold subtitle_feature">EXPERIENCIAS CON IAMOVING</h3>
					</div>			

				<div class="row justify-content-center my-0">		
	 <div class="container-fluid" data-aos="fade" data-aos-delay="500">
		<div class="swiper-container images-carousel">
			<div class="swiper-wrapper" style="height:37em;">
				<div class="swiper-slide">
							  <div class="card">
						  
									<div class="testimonial">
										<img class="card-img-top" src="/storage/testimonios/t0.jpg"> 
										<!--	<h3 class="title">María Propietaria <a href="/VisitaVirtual/485">Referencia 485</a></h3>
																		
										<span class="icon fa fa-quote-left"></span>
										<p class="description">
											 Soy propietaria de un ático en Martínez Campos aquí en Madrid, me lo alquilaron los de Iamoving y estoy encantada, han sido muy profesionales y eficaces, aparte de rápidos y encontrando un inquilino muy solvente. Les recomiendo encarecidamente. Gracias Iamoving!!! 
										</p>-->

									</div>
							  </div>  
				</div>	
				<div class="swiper-slide">
				  
								<div class="card">
						  
									<div class="testimonial">
										<img class="card-img-top" src="/storage/testimonios/t0.1.jpg"> 
											<!--<h3 class="title">María Propietaria <a href="/VisitaVirtual/800">Referencia 800</a></h3></h3>
																		
										<span class="icon fa fa-quote-left"></span>
										<p class="description">
											 He alquilado un estudio a través de Iamoving. La experiencia ha sido muy buena. Muy ágiles y profesionales. Me ha quedado muy buen recuerdo para volver a trabajar con ellos. Muchas gracias.
										</p>-->

									</div>
					
								</div>
				</div>			
				<div class="swiper-slide">
				  
								<div class="card">
						  
									<div class="testimonial">
										<img class="card-img-top" src="/storage/testimonios/t1.jpg"> 
											<!--<h3 class="title">María Propietaria <a href="/VisitaVirtual/800">Referencia 800</a></h3></h3>
																		
										<span class="icon fa fa-quote-left"></span>
										<p class="description">
											 He alquilado un estudio a través de Iamoving. La experiencia ha sido muy buena. Muy ágiles y profesionales. Me ha quedado muy buen recuerdo para volver a trabajar con ellos. Muchas gracias.
										</p>-->

									</div>
					
								</div>
				</div>	
				<div class="swiper-slide">
				  
								<div class="card">
						  
									<div class="testimonial">
										<img class="card-img-top" src="/storage/testimonios/t1.2.jpg"> 
											<!--<h3 class="title">María Propietaria <a href="/VisitaVirtual/800">Referencia 800</a></h3></h3>
																		
										<span class="icon fa fa-quote-left"></span>
										<p class="description">
											 He alquilado un estudio a través de Iamoving. La experiencia ha sido muy buena. Muy ágiles y profesionales. Me ha quedado muy buen recuerdo para volver a trabajar con ellos. Muchas gracias.
										</p>-->

									</div>
					
								</div>
				</div>			
				<div class="swiper-slide">
							  <div class="card">
						  
									<div class="testimonial">
										<img class="card-img-top" src="/storage/testimonios/t2.jpg"> 
										<!--	<h3 class="title">María Propietaria <a href="/VisitaVirtual/485">Referencia 485</a></h3>
																		
										<span class="icon fa fa-quote-left"></span>
										<p class="description">
											 Soy propietaria de un ático en Martínez Campos aquí en Madrid, me lo alquilaron los de Iamoving y estoy encantada, han sido muy profesionales y eficaces, aparte de rápidos y encontrando un inquilino muy solvente. Les recomiendo encarecidamente. Gracias Iamoving!!! 
										</p>-->

									</div>
							  </div>              
				  
				</div>
				<div class="swiper-slide">
							  <div class="card">
						  
									<div class="testimonial">
										<img class="card-img-top" src="/storage/testimonios/t3.jpg"> 
										<!--	<h3 class="title">María Propietaria <a href="/VisitaVirtual/485">Referencia 485</a></h3>
																		
										<span class="icon fa fa-quote-left"></span>
										<p class="description">
											 Soy propietaria de un ático en Martínez Campos aquí en Madrid, me lo alquilaron los de Iamoving y estoy encantada, han sido muy profesionales y eficaces, aparte de rápidos y encontrando un inquilino muy solvente. Les recomiendo encarecidamente. Gracias Iamoving!!! 
										</p>-->

									</div>
							  </div>  
				</div>
				<div class="swiper-slide">
							  <div class="card">
						  
									<div class="testimonial">
										<img class="card-img-top" src="/storage/testimonios/t4.jpg"> 
										<!--	<h3 class="title">María Propietaria <a href="/VisitaVirtual/485">Referencia 485</a></h3>
																		
										<span class="icon fa fa-quote-left"></span>
										<p class="description">
											 Soy propietaria de un ático en Martínez Campos aquí en Madrid, me lo alquilaron los de Iamoving y estoy encantada, han sido muy profesionales y eficaces, aparte de rápidos y encontrando un inquilino muy solvente. Les recomiendo encarecidamente. Gracias Iamoving!!! 
										</p>-->

									</div>
							  </div>  
				</div>
				<div class="swiper-slide">
							  <div class="card">
						  
									<div class="testimonial">
										<img class="card-img-top" src="/storage/testimonios/t5.jpg"> 
										<!--	<h3 class="title">María Propietaria <a href="/VisitaVirtual/485">Referencia 485</a></h3>
																		
										<span class="icon fa fa-quote-left"></span>
										<p class="description">
											 Soy propietaria de un ático en Martínez Campos aquí en Madrid, me lo alquilaron los de Iamoving y estoy encantada, han sido muy profesionales y eficaces, aparte de rápidos y encontrando un inquilino muy solvente. Les recomiendo encarecidamente. Gracias Iamoving!!! 
										</p>-->

									</div>
							  </div>  
				</div>
				<div class="swiper-slide">
				  
								<div class="card">
						  
									<div class="testimonial">
										<img class="card-img-top" src="/storage/testimonios/t5.2.jpg"> 
											<!--<h3 class="title">María Propietaria <a href="/VisitaVirtual/800">Referencia 800</a></h3></h3>
																		
										<span class="icon fa fa-quote-left"></span>
										<p class="description">
											 He alquilado un estudio a través de Iamoving. La experiencia ha sido muy buena. Muy ágiles y profesionales. Me ha quedado muy buen recuerdo para volver a trabajar con ellos. Muchas gracias.
										</p>-->

									</div>
					
								</div>
				</div>						
				<div class="swiper-slide">
							  <div class="card">
						  
									<div class="testimonial">
										<img class="card-img-top" src="/storage/testimonios/t6.jpg"> 
										<!--	<h3 class="title">María Propietaria <a href="/VisitaVirtual/485">Referencia 485</a></h3>
																		
										<span class="icon fa fa-quote-left"></span>
										<p class="description">
											 Soy propietaria de un ático en Martínez Campos aquí en Madrid, me lo alquilaron los de Iamoving y estoy encantada, han sido muy profesionales y eficaces, aparte de rápidos y encontrando un inquilino muy solvente. Les recomiendo encarecidamente. Gracias Iamoving!!! 
										</p>-->

									</div>
							  </div>  
				</div>	
				<div class="swiper-slide">
							  <div class="card">
						  
									<div class="testimonial">
										<img class="card-img-top" src="/storage/testimonios/t7.jpg"> 
										<!--	<h3 class="title">María Propietaria <a href="/VisitaVirtual/485">Referencia 485</a></h3>
																		
										<span class="icon fa fa-quote-left"></span>
										<p class="description">
											 Soy propietaria de un ático en Martínez Campos aquí en Madrid, me lo alquilaron los de Iamoving y estoy encantada, han sido muy profesionales y eficaces, aparte de rápidos y encontrando un inquilino muy solvente. Les recomiendo encarecidamente. Gracias Iamoving!!! 
										</p>-->

									</div>
							  </div>  
				</div>
				<div class="swiper-slide">
							  <div class="card">
						  
									<div class="testimonial">
										<img class="card-img-top" src="/storage/testimonios/t8.jpg"> 
										<!--	<h3 class="title">María Propietaria <a href="/VisitaVirtual/485">Referencia 485</a></h3>
																		
										<span class="icon fa fa-quote-left"></span>
										<p class="description">
											 Soy propietaria de un ático en Martínez Campos aquí en Madrid, me lo alquilaron los de Iamoving y estoy encantada, han sido muy profesionales y eficaces, aparte de rápidos y encontrando un inquilino muy solvente. Les recomiendo encarecidamente. Gracias Iamoving!!! 
										</p>-->

									</div>
							  </div>  
				</div>
				<div class="swiper-slide">
							  <div class="card">
						  
									<div class="testimonial">
										<img class="card-img-top" src="/storage/testimonios/t9.jpg"> 
										<!--	<h3 class="title">María Propietaria <a href="/VisitaVirtual/485">Referencia 485</a></h3>
																		
										<span class="icon fa fa-quote-left"></span>
										<p class="description">
											 Soy propietaria de un ático en Martínez Campos aquí en Madrid, me lo alquilaron los de Iamoving y estoy encantada, han sido muy profesionales y eficaces, aparte de rápidos y encontrando un inquilino muy solvente. Les recomiendo encarecidamente. Gracias Iamoving!!! 
										</p>-->

									</div>
							  </div>  
				</div>
			  <!--  <div class="swiper-slide">
							  <div class="card">
						  
									<div class="testimonial">
										<img class="card-img-top" src="/storage/testimonios/t10.jpg"> 
									</div>
							  </div>  
				</div>	-->
						  <div class="swiper-slide">
							  <div class="card">
						  
									<div class="testimonial">
										<img class="card-img-top" src="/storage/testimonios/t11.jpg"> 
										<!--	<h3 class="title">María Propietaria <a href="/VisitaVirtual/485">Referencia 485</a></h3>
																		
										<span class="icon fa fa-quote-left"></span>
										<p class="description">
											 Soy propietaria de un ático en Martínez Campos aquí en Madrid, me lo alquilaron los de Iamoving y estoy encantada, han sido muy profesionales y eficaces, aparte de rápidos y encontrando un inquilino muy solvente. Les recomiendo encarecidamente. Gracias Iamoving!!! 
										</p>-->

									</div>
							  </div>  
				</div>
				<div class="swiper-slide">
							  <div class="card">
						  
									<div class="testimonial">
										<img class="card-img-top" src="/storage/testimonios/t12.jpg"> 
										<!--	<h3 class="title">María Propietaria <a href="/VisitaVirtual/485">Referencia 485</a></h3>
																		
										<span class="icon fa fa-quote-left"></span>
										<p class="description">
											 Soy propietaria de un ático en Martínez Campos aquí en Madrid, me lo alquilaron los de Iamoving y estoy encantada, han sido muy profesionales y eficaces, aparte de rápidos y encontrando un inquilino muy solvente. Les recomiendo encarecidamente. Gracias Iamoving!!! 
										</p>-->

									</div>
							  </div>  
				</div>	
				<div class="swiper-slide">
							  <div class="card">
						  
									<div class="testimonial">
										<img class="card-img-top" src="/storage/testimonios/t13.jpg"> 
										<!--	<h3 class="title">María Propietaria <a href="/VisitaVirtual/485">Referencia 485</a></h3>
																		
										<span class="icon fa fa-quote-left"></span>
										<p class="description">
											 Soy propietaria de un ático en Martínez Campos aquí en Madrid, me lo alquilaron los de Iamoving y estoy encantada, han sido muy profesionales y eficaces, aparte de rápidos y encontrando un inquilino muy solvente. Les recomiendo encarecidamente. Gracias Iamoving!!! 
										</p>-->

									</div>
							  </div>  
				</div>
							<div class="swiper-slide">
							  <div class="card">
						  
									<div class="testimonial">
										<img class="card-img-top" src="/storage/testimonios/t14.jpg"> 
										<!--	<h3 class="title">María Propietaria <a href="/VisitaVirtual/485">Referencia 485</a></h3>
																		
										<span class="icon fa fa-quote-left"></span>
										<p class="description">
											 Soy propietaria de un ático en Martínez Campos aquí en Madrid, me lo alquilaron los de Iamoving y estoy encantada, han sido muy profesionales y eficaces, aparte de rápidos y encontrando un inquilino muy solvente. Les recomiendo encarecidamente. Gracias Iamoving!!! 
										</p>-->

									</div>
							  </div>  
				</div>
				<div class="swiper-slide">
							  <div class="card">
						  
									<div class="testimonial">
										<img class="card-img-top" src="/storage/testimonios/t15.jpg"> 
										<!--	<h3 class="title">María Propietaria <a href="/VisitaVirtual/485">Referencia 485</a></h3>
																		
										<span class="icon fa fa-quote-left"></span>
										<p class="description">
											 Soy propietaria de un ático en Martínez Campos aquí en Madrid, me lo alquilaron los de Iamoving y estoy encantada, han sido muy profesionales y eficaces, aparte de rápidos y encontrando un inquilino muy solvente. Les recomiendo encarecidamente. Gracias Iamoving!!! 
										</p>-->

									</div>
							  </div>  
				</div>			
			</div>
			<div class="swiper-button-prev"></div>
			<div class="swiper-button-next"></div>
		</div>
	  </div>		
	</div>	

					
			</div>
			
		</section>
		
		<div id="modalVideo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mInformeLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-image" role="application">
					<div class="modal-content animated fadeIn">
						<div class="modal-body text-center">
								<div class="row">
									<div class="col-12">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>     
									</div>
								</div>
								<div class="row">
									<div class="col-12">
										<h5 class="modal-title"><span id="modal_title_video"></span></h5>
										<div id="div_frame" class="text-center" style="height:400px">
											
										</div>
									</div>
								</div>
						</div>
					</div>
				</div>
		</div>
	<!--	
	<section class="feature-section spad" style="padding-top:20px;">    
		<div class="container">
				<div class="section-title text-center"  data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" 
					  aria-controls="collapseExample" aria-haspopup="true" style="cursor:hand;">

					<h3 class="font-weight-bold subtitle_feature">¿Cuál es tu barrio ideal? <span><i class="caret-up fas fa-caret-down ml-2"></i></span></h3>
				</div>
				<div class="collapse" id="collapseExample">
				<div class="section-title text-center">

					<h3>ELEGIR tu PISO perfecto VA MUCHO MÁS ALLÁ.</h3>
					<p>Descubre todos los barrios de Madrid en nuestro tour virtual.</p> <p>Parques, bares, comercios, ambiente de ocio… Sabemos que todo cuenta a la hora de decidir donde vas a vivir, y en IAMOVING queremos ponértelo todo más fácil.</p>
				</div>
				<div class="row">
				   @foreach($areas as $area )   
					<div class="col-md-4">
						<video-card 
							href="/barrio/{{$area->id}}" 
							source="https://www.youtube.com/embed/{{$area->video_principal}}" 
							:body="{{$area}}" width="40%">
							  
							</video-card>
					</div>

				   
					@endforeach

				{{--     <div class="col-md-4">
						<video-card href="/barrio" source="https://www.w3schools.com/html/mov_bbb.mp4" :body="{
							title: 'Madrid',
							text: 'Madrid'
						}"></video-card>
					</div>

					<div class="col-md-4">
						<video-card href="/barrio" source="https://www.w3schools.com/html/mov_bbb.mp4" :body="{
							title: 'Madrid',
							text: 'Madrid'
						}"></video-card>
					</div>  --}}

				</div>
				<br>
				<div class="row">
					<div class="col-12">
						<div class="row  justify-content-center align-items-center">
							<a href="{{ url('/barrios') }}" class="btn btn-outline-secondary">Leer mas ..</a>
						</div>
					</div>

				</div>
				</div>
			</div>
		
		</section>
	-->
	@endsection

	@section('styles')
		<link rel="stylesheet" href="/css_theme/owl.carousel.css"/>
		<link rel="stylesheet" href="photon/fonts/icomoon/style.css">
		<link rel="stylesheet" href="photon/css/owl.carousel.min.css">
		<link rel="stylesheet" href="photon/css/owl.theme.default.min.css">
		<link rel="stylesheet" href="photon/css/swiper.css">
	   <link rel="stylesheet" href="photon/css/style.css">	
		<style>

		
				/* Tablet and bigger */
			@media ( min-width: 768px ) {
				.grid-divider {
					position: relative;
					padding: 0;
				}
				.grid-divider>[class*='col-'] {
					position: static;
				}
				.grid-divider>[class*='col-']:nth-child(n+2):before {
					content: "";
					border-left: 3px solid #EADD1B;;
					position: absolute;
					top: 0;
					bottom: 0;
				}
				.col-padding {
					padding: 0 1px;
				}
			}
			/*active para que sea yellow*/

			.nav>a.active{
			   background-color: #EADD1B;
			}
			
			a.nounderline:link
			{
			text-decoration:none;
			}

			btn.mejoradogris
			{
				font-weight:bold;color:#2D2D37;border-radius:0%; !important;;outline:none !important;outline-width: 0 !important; box-shadow: none;-moz-box-shadow: none;-webkit-box-shadow: none;
			}
			/*active */
			
			.subtitle_feature{
				background-color: #EADD1B;
				color: #333;
				display: block;
				text-align: center;
				vertical-align: middle;
				border: 1px solid transparent;
				padding: 15px;
			}
			
			.subtitle_feature_yellow{
				background-color: #EADD1B;
				color: #333;
				display: block;
				text-align: center;
				vertical-align: middle;
				border: 1px solid transparent;
				padding: 15px;
			}

			select option {
				margin: 40px;
				background: rgba(0, 0, 0, 0.3);
				color: #fff;
				text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);
			}

			.dropbtn {
				background-color: #C0C0C0;
				color: white;
				padding: 16px;
				font-size: 22px;
				border: none;
				cursor: pointer;
				width:100%;
			}

			.dropbtn:hover, .dropbtn:focus {
				background-color: #C0C0C0;
			}

			
			#inputBarrio {
				border-box: box-sizing;
				background-position: 14px 12px;
				background-repeat: no-repeat;
				font-size: 16px;
				padding: 14px 20px 12px 45px;
				border: none;
				border-bottom: 1px solid #ddd;
				width:100%;
			}

			
			#inputBarrio:focus {outline: 3px solid #ddd;}

			
			.dropdown {
				position: relative;
				display: inline-block;
			}

			
			.dropdown-content {
				display: none;
				position: absolute;
				background-color: #2D2E35;
				min-width: 230px;
				border: 1px solid #ddd;
				z-index: 1000;
				width:97.5%;
			}

			
			.dropdown-content a {
				color: white;
				padding: 12px 16px;
				text-decoration: none;
				display: block;
			}

			
			.dropdown-content a:hover {background-color: #2D2E35; color:#EADD1B;}

			.show {display:block;}

	.testimonial{
		background: #fff;
		text-align: center;
		/*padding: 30px 30px 50px;*/
		margin: 0 15px 8px;
		position: relative;
		margin-top: 15px;
	}
	/*
	.testimonial:before,
	.testimonial:after{
		content: "";
		border-top: 40px solid #fff;
		border-right: 125px solid transparent;
		position: absolute;
		bottom: -40px;
		left: 0;
	}*/
	.testimonial:after{
		border-right: none;
		border-left: 125px solid transparent;
		left: auto;
		right: 0;
	}
	.testimonial .icon{
		display: inline-block;
		font-size: 20px;
		color: #bd986b;
		margin-bottom: 10px;
		margin-top: 10px;
		opacity: 0.6;
	}
	.testimonial .description{
		font-size: 14px;
		color: #777;
		text-align: justify;
		margin-bottom: 10px;
		opacity: 0.9;
		letter-spacing: -1px;
	}
	.testimonial .testimonial-content{
		width: 100%;
		position: absolute;
		left: 0;
	}
	.testimonial .pic{
		display: inline-block;
		border: 6px solid white;
		border-radius: 50%;
		box-shadow: 0 0 2px 2px #daad86;
		overflow: hidden;
		z-index: 1;
		position: relative;
	}
	.testimonial .pic img{
		width: 100%;
		height: auto;
	}
	.testimonial .title{
		font-size: 16px;
		font-weight: bold;
		color: #333;
		text-transform: capitalize;
		margin: 0 0 5px 0;
	}
	.testimonial .post{
		display: block;
		font-size: 14px;
		color: #ffd9b8;
	}
	.owl-prev {
		width: 15px;
		height: 100px;
		position: absolute;
		top: 40%;
		margin-left: -25px;
		display: block !important;
		border:0px solid black;
		font-size: 35;
		
	}

	.owl-next{
		width: 15px;
		height: 100px;
		position: absolute;
		top: 40%;
		right: -5px;
		display: block !important;
		border: 0px solid black;
		font-size: 35;
	}
	.feature-title h5 {
		font-weight: 400;
		margin-bottom: 5px;
	}

	.price{
		font-size: 1.125rem;
	}

	.feature-title a {
		color: #333;
	}

	.feature-item{
		border: 1px solid #333;
		background: transparent;
	}

	input[type=number]::-webkit-outer-spin-button,

	input[type=number]::-webkit-inner-spin-button {

		-webkit-appearance: none;

		margin: 0;

	}

	 

	input[type=number] {

		-moz-appearance:textfield;

	}

	.rotar1 
		{ 
		  -webkit-transform: rotate(-45deg); 
		  -moz-transform: rotate(-45deg); 
		  -ms-transform: rotate(-45deg); 
		  -o-transform: rotate(-45deg); 
		  transform: rotate(-45deg); 
		  
		  -webkit-transform-origin: 50% 50%; 
		  -moz-transform-origin: 50% 50%; 
		  -ms-transform-origin: 50% 50%; 
		  -o-transform-origin: 50% 50%; 
		  transform-origin: 50% 50%; 
		  
		 font-size: 65px; 
		  position: relative; 
		  top: 160px;
		  color:#EADD1B;
	}

	@media (max-width:480px){
		.rotar1 
		{ 
		  -webkit-transform: rotate(-45deg); 
		  -moz-transform: rotate(-45deg); 
		  -ms-transform: rotate(-45deg); 
		  -o-transform: rotate(-45deg); 
		  transform: rotate(-45deg); 
		  
		  -webkit-transform-origin: 50% 50%; 
		  -moz-transform-origin: 50% 50%; 
		  -ms-transform-origin: 50% 50%; 
		  -o-transform-origin: 50% 50%; 
		  transform-origin: 50% 50%; 
		  
		  font-size: 65px; 
		  position: relative; 
		  top: 130px; 
		  
		  color:#EADD1B;
		}
	}

	.play-btn{
		position: absolute;
		top: 20%;
		left: 40%;
		z-index:1000;
	}
	.play-btn:hover{
		cursor: pointer;
		text-decoration: none;
	}

	.owl-item{
		width: 363.333px;
		margin-right: 10px;
	}

	@media only screen and (max-width: 600px) {

		/*.modal-dialog {
		  width: 100%;
		  height: 100%;
		  margin: 0;
		  padding: 0;
		}
		
		.modal-content {
		  height: auto;
		  min-height: 100%;
		  border-radius: 0;
		}
		
		#div_frame{
			position: relative;
			top: 10%;
			
		}*/
		
		.row{
			margin-right: 0px !important;
			margin-left: 0px !important;
		}
		
		.owl-prev{
			display: none !important;
		}
		
		.owl-next{
			display: none !important;
		}
		
	}

		</style>
	@endsection

	@section('scripts')
		<script src="/js_theme/owl.carousel.min.js" defer></script>
	  <script src="photon/js/jquery-3.3.1.min.js"></script>
	  <script src="photon/js/jquery-migrate-3.0.1.min.js"></script>
	  <script src="photon/js/owl.carousel.min.js"></script>
	  <script src="photon/js/jquery.stellar.min.js"></script>
	  <script src="photon/js/jquery.countdown.min.js"></script>
	  <script src="photon/js/jquery.magnific-popup.min.js"></script>
	  <script src="photon/js/swiper.min.js"></script>
	  <script src="photon/js/aos.js"></script>
	  <script src="photon/js/main.js"></script> 	
		<script>
			var base_url = "";
			var token = @json($token); 
			var recover = @json($route); 
			var verification_code = @json($verification_code);
			

			$(window).resize(function(){
				
				console.log("resized");
				
			});

			window.addEventListener('DOMContentLoaded', function() {
				/*if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
					$("#desktopCard").hide();
					$("#mobileCard").show();
				}*/
				$("#global_message").hide();
				if(token!=null){
					$("#btnEntrar").trigger('click');   
				}
				if(recover){
					$("#btnEntrar").trigger('click');   
				}

				if(verification_code!=null){
					$.get(base_url + "/auth/verify?verification_code="+verification_code, function(data, status){
						//var response = JSON.parse(data);
						if(data.data){
							//$("#global_message").html("Su cuenta ha sido verificada con exito");
							//$("#global_message").show();

							Swal.fire({
							  type: 'success',
							  title: 'Gracias',
							  html: '<p>Su cuenta ha sido verificada con exito</p>',
							});

							if(localStorage.getItem("user")){
								var tmp = JSON.parse(localStorage.getItem("user"));
								tmp.email_verified_at = new Date();
								localStorage.setItem("user", JSON.stringify(tmp));
								setTimeout(function(){ location.href = "/"; }, 3000);
								
							}
						}

					});
				}
				
				$('.carousel').carousel();
			
				$('.owl-carousel').owlCarousel({
					margin:10,			
					responsive:{
						0:{
							items:1
						},
						600:{
							items:2
						},
						1000:{
							items:3
						}
					},
					nav: true,
					navText: ['<span class="icon-keyboard_arrow_left">', '<span class="icon-keyboard_arrow_right">']
				});
				if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
					$("#modalVideo").css('max-width,','95wv');
				}
				$("#modalVideo").on('hidden.bs.modal', function () {
					$("#div_frame").html("");
				});
	  /*  $(document).ready(function() {
		  $("#owl-demo").owlCarousel({
			  navigation : true, // Show next and prev buttons
			  slideSpeed : 300,
			  paginationSpeed : 400,
			  singleItem:true
		  });
	});	*/
	$(document).ready(function(){
		$("#owl-demo").owlCarousel({
			items:3,
			itemsDesktop:[1000,3],
			itemsDesktopSmall:[979,2],
			itemsTablet:[768,2],
			itemsMobile:[650,1],
			pagination:true,
			autoPlay:true,
			navigation:true,
		});
		
		

	});		
		   // $( ".owl-prev").owlCarousel.html('<i class="fa fa-chevron-left"></i>');

			//$( ".owl-next").owlCarousel.html('<i class="fa fa-chevron-right"></i>');

				
				// filter
				$('#form-reference').on('submit', function(e) {
					e.preventDefault();
					if($('#input-filter').val().trim().length > 0){
						location.href = 'VisitaVirtual/' + $('#input-filter').val();
					}else{
						var category = 0;
						$(".btn-group-toggle input:radio").each(function( index ) {
							if($(this).is(':checked')){
								category = $(this).val() ;    
							}
						});
						var url = '/iamovingpro/find?category=' + category;
						if($("#city").val()!=""){
							url += "&city=" + $("#city").val();
							location.href = url;
						}
						
					}
				});

			
				
			});
			


			function openZones() {
				document.getElementById("barrios").classList.toggle("show");
			}

			function filterFunction() {
				var input, filter, ul, li, a, i;
				input = document.getElementById("inputBarrio");
				filter = input.value.toUpperCase();
				div = document.getElementById("barrios");
				a = div.getElementsByTagName("a");
				for (i = 0; i < a.length; i++) {
					txtValue = a[i].textContent || a[i].innerText;
					if (txtValue.toUpperCase().indexOf(filter) > -1) {
					a[i].style.display = "";
					} else {
					a[i].style.display = "none";
					}
				}
			}

			function showVideo(id, video, e){
				console.log(video);
				e.preventDefault();
				//alert(video.length);
				if (video.length < 100) {
					var ifra = '<iframe src="https://www.youtube.com/embed/' + video + '"?modestbranding=1&rel=0';
					ifra += 'class="video-fluid z-depth-1" ';
					ifra += 'width="100%" ';
					ifra += 'height="100%" ';
					ifra += 'mozallowfullscreen ';
					ifra += 'webkitallowfullscreen  ';
					ifra += 'allowfullscreen></iframe>';
					$("#div_frame").html(ifra);
					$("#div_frame").css("height", "400px");				
				} else {
					var ifra ='' + video +'';
					$("#div_frame").html(ifra);
					$("#div_frame").css("height", "592px");	
					$("#div_frame").css("overflow-y", "hidden");		
				}			


				$("#modal_title_video").html("Referencia " + id);

				$("#modalVideo").modal({
					backdrop:'static',
					keyboard: false
				});       
				
			}

		</script>
	@endsection

