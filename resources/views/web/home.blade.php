@extends('layouts.web')
@section('title', 'IAMOVING - Fácil de alquilar, comprar y vender')
@section('description', '¡Fácil de alquilar, comprar y vender!')
@section('image', 'https://iamoving.com/img/iamoving.png')
@section('banner')
    @include('navigation.search')
@endsection
                                                          <style data-jss="" data-meta="MuiPaper" data-jss-server-side="true">.jss33{background-color:#fff}.jss34{border-radius:2px}.jss35{box-shadow:none}.jss36{box-shadow:0 1px 3px 0 rgba(0,0,0,.2),0 1px 1px 0 rgba(0,0,0,.14),0 2px 1px -1px rgba(0,0,0,.12)}.jss37{box-shadow:0 1px 5px 0 rgba(0,0,0,.2),0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.12)}.jss38{box-shadow:0 1px 8px 0 rgba(0,0,0,.2),0 3px 4px 0 rgba(0,0,0,.14),0 3px 3px -2px rgba(0,0,0,.12)}.jss39{box-shadow:0 2px 4px -1px rgba(0,0,0,.2),0 4px 5px 0 rgba(0,0,0,.14),0 1px 10px 0 rgba(0,0,0,.12)}.jss40{box-shadow:0 3px 5px -1px rgba(0,0,0,.2),0 5px 8px 0 rgba(0,0,0,.14),0 1px 14px 0 rgba(0,0,0,.12)}.jss41{box-shadow:0 3px 5px -1px rgba(0,0,0,.2),0 6px 10px 0 rgba(0,0,0,.14),0 1px 18px 0 rgba(0,0,0,.12)}.jss42{box-shadow:0 4px 5px -2px rgba(0,0,0,.2),0 7px 10px 1px rgba(0,0,0,.14),0 2px 16px 1px rgba(0,0,0,.12)}.jss43{box-shadow:0 5px 5px -3px rgba(0,0,0,.2),0 8px 10px 1px rgba(0,0,0,.14),0 3px 14px 2px rgba(0,0,0,.12)}.jss44{box-shadow:0 5px 6px -3px rgba(0,0,0,.2),0 9px 12px 1px rgba(0,0,0,.14),0 3px 16px 2px rgba(0,0,0,.12)}.jss45{box-shadow:0 6px 6px -3px rgba(0,0,0,.2),0 10px 14px 1px rgba(0,0,0,.14),0 4px 18px 3px rgba(0,0,0,.12)}.jss46{box-shadow:0 6px 7px -4px rgba(0,0,0,.2),0 11px 15px 1px rgba(0,0,0,.14),0 4px 20px 3px rgba(0,0,0,.12)}.jss47{box-shadow:0 7px 8px -4px rgba(0,0,0,.2),0 12px 17px 2px rgba(0,0,0,.14),0 5px 22px 4px rgba(0,0,0,.12)}.jss48{box-shadow:0 7px 8px -4px rgba(0,0,0,.2),0 13px 19px 2px rgba(0,0,0,.14),0 5px 24px 4px rgba(0,0,0,.12)}.jss49{box-shadow:0 7px 9px -4px rgba(0,0,0,.2),0 14px 21px 2px rgba(0,0,0,.14),0 5px 26px 4px rgba(0,0,0,.12)}.jss50{box-shadow:0 8px 9px -5px rgba(0,0,0,.2),0 15px 22px 2px rgba(0,0,0,.14),0 6px 28px 5px rgba(0,0,0,.12)}.jss51{box-shadow:0 8px 10px -5px rgba(0,0,0,.2),0 16px 24px 2px rgba(0,0,0,.14),0 6px 30px 5px rgba(0,0,0,.12)}.jss52{box-shadow:0 8px 11px -5px rgba(0,0,0,.2),0 17px 26px 2px rgba(0,0,0,.14),0 6px 32px 5px rgba(0,0,0,.12)}.jss53{box-shadow:0 9px 11px -5px rgba(0,0,0,.2),0 18px 28px 2px rgba(0,0,0,.14),0 7px 34px 6px rgba(0,0,0,.12)}.jss54{box-shadow:0 9px 12px -6px rgba(0,0,0,.2),0 19px 29px 2px rgba(0,0,0,.14),0 7px 36px 6px rgba(0,0,0,.12)}.jss55{box-shadow:0 10px 13px -6px rgba(0,0,0,.2),0 20px 31px 3px rgba(0,0,0,.14),0 8px 38px 7px rgba(0,0,0,.12)}.jss56{box-shadow:0 10px 13px -6px rgba(0,0,0,.2),0 21px 33px 3px rgba(0,0,0,.14),0 8px 40px 7px rgba(0,0,0,.12)}.jss57{box-shadow:0 10px 14px -6px rgba(0,0,0,.2),0 22px 35px 3px rgba(0,0,0,.14),0 8px 42px 7px rgba(0,0,0,.12)}.jss58{box-shadow:0 11px 14px -7px rgba(0,0,0,.2),0 23px 36px 3px rgba(0,0,0,.14),0 9px 44px 8px rgba(0,0,0,.12)}.jss59{box-shadow:0 11px 15px -7px rgba(0,0,0,.2),0 24px 38px 3px rgba(0,0,0,.14),0 9px 46px 8px rgba(0,0,0,.12)}</style>
                                                          <style data-jss="" data-meta="MuiSvgIcon" data-jss-server-side="true">.jss215{fill:currentColor;width:1em;height:1em;display:inline-block;font-size:24px;transition:fill .2s cubic-bezier(.4,0,.2,1) 0s;user-select:none;flex-shrink:0}.jss216{color:#5063f0}.jss217{color:#36b67e}.jss218{color:rgba(0,0,0,.54)}.jss219{color:#c6292e}.jss220{color:rgba(0,0,0,.26)}</style>
                                                          <style data-jss="" data-meta="MuiAvatar" data-jss-server-side="true">.jss261{width:40px;height:40px;display:flex;position:relative;overflow:hidden;font-size:1.25rem;align-items:center;flex-shrink:0;font-family:Roboto,Helvetica,Arial,sans-serif;user-select:none;border-radius:50%;justify-content:center}.jss262{color:#fafafa;background-color:#bdbdbd}.jss263{width:100%;height:100%;text-align:center;object-fit:cover}</style>
                                                          <style data-jss="" data-meta="MuiChip" data-jss-server-side="true">.jss254{color:rgba(0,0,0,.87);height:32px;cursor:default;border:none;display:inline-flex;outline:0;padding:0;font-size:.8125rem;transition:background-color .3s cubic-bezier(.4,0,.2,1) 0s,box-shadow .3s cubic-bezier(.4,0,.2,1) 0s;font-family:Roboto,Helvetica,Arial,sans-serif;align-items:center;white-space:nowrap;border-radius:16px;justify-content:center;text-decoration:none;background-color:#e0e0e0}.jss255{cursor:pointer;-webkit-tap-highlight-color:transparent}.jss255:focus,.jss255:hover{background-color:#cecece}.jss255:active{box-shadow:0 1px 3px 0 rgba(0,0,0,.2),0 1px 1px 0 rgba(0,0,0,.14),0 2px 1px -1px rgba(0,0,0,.12);background-color:#c5c5c5}.jss256:focus{background-color:#cecece}.jss257{width:32px;color:#616161;height:32px;font-size:1rem;margin-right:-4px}.jss258{width:19px;height:19px}.jss259{cursor:inherit;display:flex;align-items:center;user-select:none;white-space:nowrap;padding-left:12px;padding-right:12px}.jss260{color:rgba(0,0,0,.26);cursor:pointer;height:auto;margin:0 4px 0 -8px;-webkit-tap-highlight-color:transparent}.jss260:hover{color:rgba(0,0,0,.4)}</style>
														  <style data-jss="" data-meta="MuiListItemText" data-jss-server-side="true">.jss221{flex:1 1 auto;padding:0 16px;min-width:0}.jss221:first-child{padding-left:0}.jss222:first-child{padding-left:56px}.jss223{font-size:.8125rem}.jss224.jss226{font-size:inherit}.jss225.jss226{font-size:inherit}</style>
														  <style data-jss="" data-meta="MuiList" data-jss-server-side="true">.jss200{margin:0;padding:0;position:relative;list-style:none}.jss201{padding-top:0px;padding-bottom:15px}.jss202{padding-top:4px;padding-bottom:4px}.jss203{padding-top:0}</style>
														  <style data-jss="" data-meta="MuiListItem" data-jss-server-side="true">.jss204{width:100%;display:flex;position:relative;box-sizing:border-box;text-align:left;align-items:center;justify-content:flex-start;text-decoration:none}.jss205{position:relative}.jss206{background-color:rgba(0,0,0,.08)}.jss207{padding-top:12px;padding-bottom:12px}.jss208{padding-top:8px;padding-bottom:8px}.jss209{opacity:.5}.jss210{border-bottom:1px solid rgba(0,0,0,.12);background-clip:padding-box}.jss211{padding-left:16px;padding-right:16px}@media (min-width:600px){.jss211{padding-left:24px;padding-right:24px}}.jss212{transition:background-color 150ms cubic-bezier(.4,0,.2,1) 0s}.jss212:hover{text-decoration:none;background-color:rgba(0,0,0,.08)}@media (hover:none){.jss212:hover{background-color:transparent}}.jss213{padding-right:32px}</style>
														  <style data-styled-components="dXmWES gBVOkB gJSIof hJtXAX ennvRr beARfa erBcUv bUDmxF chXjd XGznH igrgBm gTJEJf cIabBZ hjBPaq hBnwDG ikUjOx kClLBD frsdOu ifaIBM eVFVHD jiARkd ibMzuR eSXgoZ KcvRp gzeFNP hewaoz ijGWLb dFfBsL ceeDHP dfRjos cPxFMD Llvfd cCUkNc crmnOp flhJMf fkIsxQ hsYizb jLBqWK MDUIL kuvAWT MFaSx lehBNN" data-styled-components-is-local="true">.chXjd{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:inherit;margin-bottom:0;font-size:14px;font-weight:500;line-height:24px}.XGznH{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:#fff;text-align:inherit;margin-bottom:8px;font-size:34px;font-weight:400;line-height:40px}.igrgBm{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:#fff;text-align:inherit;margin-bottom:0;font-size:24px;font-weight:400;line-height:32px}.gTJEJf{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:center;margin-bottom:8px;font-size:24px;font-weight:400;line-height:32px}.cIabBZ{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:rgba(0,0,0,.54);text-align:center;margin-bottom:8px;font-size:20px;font-weight:500;line-height:24px}.hjBPaq{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:center;margin-bottom:8px;font-size:20px;font-weight:500;line-height:24px}.hBnwDG{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:rgba(0,0,0,.54);text-align:center;margin-bottom:8px;font-size:14px;font-weight:400;line-height:20px}.ikUjOx{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:left;margin-bottom:8px;font-size:20px;font-weight:500;line-height:24px}.kClLBD{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:rgba(0,0,0,.54);text-align:left;margin-bottom:8px;font-size:14px;font-weight:400;line-height:20px}.frsdOu{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:inherit;margin-bottom:8px;font-size:14px;font-weight:400;line-height:20px}.ifaIBM{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:#5063f0;text-align:inherit;margin-bottom:8px;font-size:14px;font-weight:400;line-height:20px}.eVFVHD{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:inline;color:#5063f0;text-align:inherit;margin-bottom:0;font-size:14px;font-weight:400;line-height:20px}.jiARkd{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:inherit;margin-bottom:0;font-size:14px;font-weight:400;line-height:20px}.ibMzuR{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:#757575;text-align:inherit;margin-bottom:0;font-size:14px;font-weight:400;line-height:20px}.eSXgoZ{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:center;margin-bottom:0;font-size:14px;font-weight:400;line-height:20px}.KcvRp{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:#36b67e;text-align:inherit;margin-bottom:8px;font-size:14px;font-weight:400;line-height:20px}.gzeFNP{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:inline;color:#36b67e;text-align:inherit;margin-bottom:0;font-size:14px;font-weight:400;line-height:20px}.hewaoz{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:rgba(0,0,0,.87);text-align:inherit;margin-bottom:8px;font-size:14px;font-weight:400;line-height:20px}.ijGWLb{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:inline;color:rgba(0,0,0,.87);text-align:inherit;margin-bottom:0;font-size:14px;font-weight:400;line-height:20px}.dFfBsL{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:center;margin-bottom:8px;font-size:14px;font-weight:400;line-height:20px}.ceeDHP{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:center;margin-bottom:0;font-size:24px;font-weight:400;line-height:32px}.dfRjos{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:center;margin-bottom:0;font-size:34px;font-weight:400;line-height:40px}.cPxFMD{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:inherit;margin-bottom:8px;font-size:20px;font-weight:500;line-height:24px}.Llvfd{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:rgba(0,0,0,.54);text-align:inherit;margin-bottom:0;font-size:14px;font-weight:400;line-height:20px}.cCUkNc{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:rgba(0,0,0,.54);text-align:inherit;margin-bottom:8px;font-size:16px;font-weight:400;line-height:24px}.crmnOp{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:rgba(0,0,0,.54);text-align:inherit;margin-bottom:0;font-size:16px;font-weight:400;line-height:24px}.flhJMf{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:center;margin-bottom:0;font-size:16px;font-weight:400;line-height:24px}.fkIsxQ{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:#fff;text-align:center;margin-bottom:8px;font-size:20px;font-weight:500;line-height:24px}.hsYizb{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:#fff;text-align:center;margin-bottom:8px;font-size:14px;font-weight:400;line-height:20px}.jLBqWK{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:rgba(0,0,0,.54);text-align:center;margin-bottom:0;font-size:24px;font-weight:400;line-height:32px}.MDUIL{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:inherit;text-align:center;margin-bottom:0;font-size:14px;font-weight:500;line-height:24px}.kuvAWT{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:rgba(0,0,0,.54);text-align:inherit;margin-bottom:0;font-size:12px;font-weight:400;line-height:16px}.MFaSx{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:#5063f0;text-align:inherit;margin-bottom:0;font-size:16px;font-weight:400;line-height:24px}.lehBNN{font-family:Roboto,Helvetica,Arial,sans-serif;margin:0;display:block;color:#5063f0;text-align:inherit;margin-bottom:0;font-size:14px;font-weight:400;line-height:20px}.ennvRr{min-height:56px}.beARfa{height:56px;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center}.erBcUv{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;height:100%}.bUDmxF{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:end;-webkit-justify-content:flex-end;-ms-flex-pack:end;justify-content:flex-end;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;height:100%}.hJtXAX{margin:0 auto;max-width:1032px;height:100%;width:100%}.dXmWES{display:none;background-color:transparent;height:100vh;left:0;position:fixed;top:0;width:100vw;z-index:1500}.gBVOkB>div>div{max-width:76%}</style>
														  <style data-styled-components="kcdrgG gbgWxw kGwXKn iqQlkx erYulP iyFjeg dzqYJX kxNuvV" data-styled-components-is-local="true">.erYulP{background-color:#bdbdbd;height:1px}.dzqYJX{background-color:#e0e0e0;height:1px}.iqQlkx{margin-top:0;margin-bottom:0;margin-left:0;margin-right:0}.iyFjeg{margin-top:16px;margin-bottom:0;margin-left:0;margin-right:0}.kxNuvV{margin-top:16px;margin-bottom:16px;margin-left:0;margin-right:0}.kcdrgG{background-color:#5063f0;color:#fff;height:24px;margin-right:0}.gbgWxw{background-color:#36b67e;color:#fff;height:24px;margin-right:0}.kGwXKn{background-color:#757575;color:#fff;height:24px;margin-right:0}</style>
														  <style data-styled-components="jRMlPf bIjFSD kFonpi cDbjPL jMeSWB kssgEf cBqmhB gGlJek fsPzpa gPbtZL iMongt iyBYz qdGDr hsUnyu gvSOMz fBCnjt htIvPI dHNjDd hwnlfP eTPBlk bOZbmT lldQGB fExEbq bHLhwF NTnEt ljgrBQ bjiHAd kWbEJZ orrIZ pRFLs gAyQQz jvOyHm kksBWm dGwtKs cQmYyz" data-styled-components-is-local="true">.cQmYyz{margin-bottom:0}.jRMlPf{margin-bottom:0;padding-left:16px}.kksBWm{margin-bottom:16px;padding-left:0}.jvOyHm{display:inline-block;margin-bottom:8px;margin-top:32px}.NTnEt{-webkit-text-decoration:none;text-decoration:none;color:#424242}.NTnEt:hover{color:#5063f0;-webkit-transition:color .4s ease;transition:color .4s ease}.ljgrBQ{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;height:32px;-webkit-box-pack:start;-webkit-justify-content:flex-start;-ms-flex-pack:start;justify-content:flex-start;margin:16px 0}.dGwtKs{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;height:32px;-webkit-box-pack:end;-webkit-justify-content:flex-end;-ms-flex-pack:end;justify-content:flex-end;margin:16px 0}.bjiHAd{margin-bottom:8px}.kWbEJZ{margin-bottom:8px}.pRFLs{margin-bottom:8px}.orrIZ{margin-bottom:8px}.gAyQQz{-webkit-text-decoration:none;text-decoration:none;color:#757575}.gAyQQz:hover{color:#757575;-webkit-transition:color .4s ease;transition:color .4s ease}.fExEbq{background-color:#fafafa;padding:16px 0;margin:0}.bHLhwF{margin:0 24px}.bOZbmT{-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;background-color:#5063f0;border-radius:0;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-box-pack:justify;-webkit-justify-content:space-between;-ms-flex-pack:justify;justify-content:space-between;padding:24px;padding-bottom:48px}@media (max-width:599.95px){.bOZbmT{padding-bottom:32px;padding-top:0}}.lldQGB{-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;margin-top:24px}.gPbtZL{font-size:34px;font-weight:400;line-height:40px}@media (max-width:959.95px){.gPbtZL{font-size:24px;font-weight:400;line-height:32px}}.iMongt{font-size:16px;font-weight:400;line-height:24px}.kFonpi{color:inherit;display:inline-block;-webkit-text-decoration:none;text-decoration:none;margin-right:40px}.bIjFSD{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:end;-webkit-justify-content:flex-end;-ms-flex-pack:end;justify-content:flex-end;-webkit-align-items:baseline;-webkit-box-align:baseline;-ms-flex-align:baseline;align-items:baseline}.cDbjPL{-webkit-flex-direction:row;-ms-flex-direction:row;flex-direction:row;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-wrap:wrap;-ms-flex-wrap:wrap;flex-wrap:wrap;-webkit-align-items:flex-start;-webkit-box-align:flex-start;-ms-flex-align:flex-start;align-items:flex-start;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center}.iyBYz{-webkit-flex-direction:row;-ms-flex-direction:row;flex-direction:row;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-wrap:wrap;-ms-flex-wrap:wrap;flex-wrap:wrap;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center}.htIvPI{-webkit-flex-direction:row;-ms-flex-direction:row;flex-direction:row;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-wrap:wrap;-ms-flex-wrap:wrap;flex-wrap:wrap;-webkit-align-items:stretch;-webkit-box-align:stretch;-ms-flex-align:stretch;align-items:stretch;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center}.jMeSWB{position:relative;box-sizing:border-box;width:100%;padding:0 8px;-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}@media (min-width:600px){.jMeSWB{-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}}@media (min-width:960px){.jMeSWB{-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}}@media (min-width:1280px){.jMeSWB{-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}}@media (min-width:1920px){.jMeSWB{-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}}.qdGDr{position:relative;box-sizing:border-box;width:100%;padding:0 8px;-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}@media (min-width:600px){.qdGDr{-webkit-flex:0 0 16.666666666666664%;-ms-flex:0 0 16.666666666666664%;flex:0 0 16.666666666666664%;max-width:16.666666666666664%}}@media (min-width:960px){.qdGDr{-webkit-flex:0 0 16.666666666666664%;-ms-flex:0 0 16.666666666666664%;flex:0 0 16.666666666666664%;max-width:16.666666666666664%}}@media (min-width:1280px){.qdGDr{-webkit-flex:0 0 16.666666666666664%;-ms-flex:0 0 16.666666666666664%;flex:0 0 16.666666666666664%;max-width:16.666666666666664%}}@media (min-width:1920px){.qdGDr{-webkit-flex:0 0 16.666666666666664%;-ms-flex:0 0 16.666666666666664%;flex:0 0 16.666666666666664%;max-width:16.666666666666664%}}.hsUnyu{position:relative;box-sizing:border-box;width:100%;padding:0 8px;-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}@media (min-width:600px){.hsUnyu{-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}}@media (min-width:960px){.hsUnyu{-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}}@media (min-width:1280px){.hsUnyu{-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}}@media (min-width:1920px){.hsUnyu{-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}}.gvSOMz{position:relative;box-sizing:border-box;width:100%;padding:0 8px;-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}@media (min-width:600px){.gvSOMz{-webkit-flex:0 0 8.333333333333332%;-ms-flex:0 0 8.333333333333332%;flex:0 0 8.333333333333332%;max-width:8.333333333333332%}}@media (min-width:960px){.gvSOMz{-webkit-flex:0 0 8.333333333333332%;-ms-flex:0 0 8.333333333333332%;flex:0 0 8.333333333333332%;max-width:8.333333333333332%}}@media (min-width:1280px){.gvSOMz{-webkit-flex:0 0 8.333333333333332%;-ms-flex:0 0 8.333333333333332%;flex:0 0 8.333333333333332%;max-width:8.333333333333332%}}@media (min-width:1920px){.gvSOMz{-webkit-flex:0 0 8.333333333333332%;-ms-flex:0 0 8.333333333333332%;flex:0 0 8.333333333333332%;max-width:8.333333333333332%}}.fBCnjt{position:relative;box-sizing:border-box;width:100%;padding:0 8px;-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}@media (min-width:600px){.fBCnjt{-webkit-flex:0 0 25%;-ms-flex:0 0 25%;flex:0 0 100%;max-width:50%}}@media (min-width:960px){.fBCnjt{-webkit-flex:0 0 25%;-ms-flex:0 0 25%;flex:0 0 100%;max-width:50%}}@media (min-width:1280px){.fBCnjt{-webkit-flex:0 0 25%;-ms-flex:0 0 25%;flex:0 0 100%;max-width:50%}}@media (min-width:1920px){.fBCnjt{-webkit-flex:0 0 25%;-ms-flex:0 0 25%;flex:0 0 100%;max-width:50%}}.dHNjDd{position:relative;box-sizing:border-box;width:100%;padding:0 8px;-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}@media (min-width:600px){.dHNjDd{-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}}@media (min-width:960px){.dHNjDd{-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}}@media (min-width:1280px){.dHNjDd{-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}}@media (min-width:1920px){.dHNjDd{-webkit-flex:0 0 50%;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}}.hwnlfP{position:relative;box-sizing:border-box;width:100%;padding:0 8px;-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}@media (min-width:600px){.hwnlfP{-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}}@media (min-width:960px){.hwnlfP{-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}}@media (min-width:1280px){.hwnlfP{-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}}@media (min-width:1920px){.hwnlfP{-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}}.eTPBlk{position:relative;box-sizing:border-box;width:100%;padding:0 8px;-webkit-flex:0 0 66.66666666666666%;-ms-flex:0 0 66.66666666666666%;flex:0 0 66.66666666666666%;max-width:66.66666666666666%}@media (min-width:600px){.eTPBlk{-webkit-flex:0 0 66.66666666666666%;-ms-flex:0 0 66.66666666666666%;flex:0 0 66.66666666666666%;max-width:66.66666666666666%}}@media (min-width:960px){.eTPBlk{-webkit-flex:0 0 83.33333333333334%;-ms-flex:0 0 83.33333333333334%;flex:0 0 83.33333333333334%;max-width:83.33333333333334%}}@media (min-width:1280px){.eTPBlk{-webkit-flex:0 0 91.66666666666666%;-ms-flex:0 0 91.66666666666666%;flex:0 0 91.66666666666666%;max-width:91.66666666666666%}}@media (min-width:1920px){.eTPBlk{-webkit-flex:0 0 91.66666666666666%;-ms-flex:0 0 91.66666666666666%;flex:0 0 91.66666666666666%;max-width:91.66666666666666%}}.cBqmhB{line-height:1.5}@media (max-width:599.95px){.cBqmhB{text-align:center;font-size:24px;font-weight:400;line-height:32px}}@media (max-width:599.95px){.fsPzpa{font-size:16px;font-weight:400;line-height:24px}}.kssgEf{padding-right:32px}@media (max-width:599.95px){.kssgEf{padding:32px 16px;text-align:center}}@media (max-width:599.95px){.gGlJek{max-width:190px;margin:0 auto}}</style>
														  <style data-styled-components="jmUojt dVZpFn gEonKY fYgwDV iApApL kBcekM kKAqKs gZzrSB fBbfOY htgUWi fHaeNg doEYka bokSOt jCQGKS jJsluQ ecJbVf hAjjvO gWOtiB RHDgE gyWGXd jDJpTw kClokr jeqLQt hvImqV gqysQO jWLPEz jugaIX fEgzNb jGCInU gSwQos kJSChf bSjNsS cMtsMw kbXedg fYiiuQ bWRwhi eynmni gkpJHv dppadL ecJbVg" data-styled-components-is-local="true">@media (max-width:959.95px){.dVZpFn{-webkit-order:-1;-ms-flex-order:-1;order:-1}}@media (max-width:599.95px){.dVZpFn{padding:0}}.kBcekM{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex}.iApApL{border:none;margin:0;padding:0;min-width:0}.gEonKY{background-color:#fff;padding:8px 24px;border-radius:2px}@media (max-width:599.95px){.gEonKY{border-radius:0;padding-left:8px;padding-right:8px}}.fYgwDV{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column}@media (max-width:599.95px){.fYgwDV{margin:24px 16px 16px;border:solid 1px #e0e0e0;padding:16px}}.kKAqKs{-webkit-align-self:center;-ms-flex-item-align:center;align-self:center;padding-top:24px}.gZzrSB{-webkit-align-self:center;-ms-flex-item-align:center;align-self:center;margin:24px 0}.jmUojt{background-color:#5063f0;padding:32px 0}@media (max-width:599.95px){.jmUojt{padding:0}}.kbXedg{margin:8px 0}@media (max-width:599.95px){.kbXedg{text-align:center}}.cMtsMw{padding:8px 16px;background-color:#e0e0e0;max-width:410px;top:50%;right:16px;-webkit-transform:translateY(-50%);-ms-transform:translateY(-50%);transform:translateY(-50%)}@media (min-width:960px){.cMtsMw{max-width:670px;position:absolute}}@media (max-width:599.95px){.cMtsMw{background-color:transparent;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;-webkit-transform:none;-ms-transform:none;transform:none}}.gSwQos{padding:32px 0;overflow:hidden}@media (max-width:599.95px){.gSwQos{padding:0;padding-bottom:16px;margin:0 24px}}.kJSChf{position:relative;margin-top:32px}@media (max-width:599.95px){.kJSChf{margin-top:16px}}.bSjNsS{margin-left:16px}@media (max-width:599.95px){.bSjNsS{margin-left:0;width:100%}}.bokSOt{margin:24px 0}.doEYka{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;padding-top:24px;padding-bottom:16px}.fBbfOY{padding:32px;-webkit-align-content:center;-ms-flex-line-pack:center;align-content:center}.htgUWi{text-align:center}@media (max-width:599.95px){.htgUWi{margin-top:24px}}.fHaeNg{-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;height:100%}@media (max-width:599.95px){.fHaeNg.textContent *{text-align:center}}.dppadL{position:absolute;left:0;top:0;width:100%;height:100%}.eynmni{width:100%;position:relative}.gkpJHv{width:100%;display:block;padding:6.4%}.jGCInU{padding:48px 16px;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;height:auto}@media (max-width:599.95px){.jGCInU{background-color:transparent;padding:32px 16px}}.bWRwhi{margin-top:auto;padding-top:24px;width:170px}.fYiiuQ{margin-top:32px}.jCQGKS{overflow:hidden;padding-top:0px;padding-bottom:10px}.jJsluQ{padding-bottom:24px}.hvImqV{line-height:2.5;position:absolute;top:0;left:0;right:0;color:#fff;background-color:#36b67e}.gyWGXd{font-size:54px;line-height:1}.RHDgE{font-size:24px;font-weight:400;line-height:32px}.hAjjvO{padding:24px 0}.jDJpTw{padding:16px;min-height:130px}.gWOtiB{height:unset;padding-bottom:4px;padding-top:4px}.kClokr{margin-right:0;color:#5063f0}.gqysQO{margin-right:0;color:#36b67e}.fEgzNb{margin-right:0;color:inherit}.jeqLQt{margin-top:16px}.ecJbVf{background-color:#333333;color:#424242;text-align:center;padding:0px 0;position:relative;height:100%}.ecJbVh{text-align:center;padding:0 0;position:relative;height:100%}.jugaIX{background-color:#fafafa;color:#424242;font-size:14px;font-weight:400;line-height:20px}.ecJbVg{text-align:center;padding:32px 0;position:relative;height:70%}.jugaIX{background-color:#fafafa;color:#424242;font-size:14px;font-weight:400;line-height:20px}.jWLPEz{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;height:100%}</style>
														  <style data-styled-components="gzHlrG hsCtPg fUOAvB dLPVue ilVeTz ePPSMY hhNpJT fuLfMH grdcPs LECyq cnVKvy exhWPQ dtfZhD yzWpN" data-styled-components-is-local="true">.gzHlrG{background-color:#fafafa;overflow:hidden;padding:24px;padding-top:16px;padding-bottom:32px;text-align:center}.fUOAvB{background-color:#e0e0e0;overflow:hidden;padding:24px;padding-top:16px;padding-bottom:32px;text-align:center}.hsCtPg{max-width:290px;margin:0 auto}.cnVKvy{margin-bottom:32px}.grdcPs{padding-top:48px;padding-bottom:48px;background-color:#e0e0e0}.LECyq{margin-top:32px;margin-bottom:32px}.exhWPQ{-webkit-flex:1;-ms-flex:1;flex:1;text-align:center;padding-left:8px;padding-right:8px}@media (max-width:959.95px){.exhWPQ{-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%;margin-bottom:16px}.exhWPQ:nth-child(n+4){display:none}}.yzWpN{-webkit-flex:1;-ms-flex:1;flex:1;text-align:center;padding-left:8px;padding-right:8px}@media (max-width:959.95px){.yzWpN{-webkit-flex:0 0 100%;-ms-flex:0 0 100%;flex:0 0 100%}.yzWpN:nth-child(n+4){display:none}}.dtfZhD{width:100%}@media (max-width:959.95px){.dtfZhD{width:auto}}.hhNpJT{margin-top:16px}.ePPSMY{text-align:center;-webkit-align-self:flex-start;-ms-flex-item-align:start;align-self:flex-start}@media (max-width:599.95px){.ePPSMY{margin:24px 0;-webkit-align-self:center;-ms-flex-item-align:center;align-self:center}}.fuLfMH{background-color:#36b67e;margin-right:8px;margin-top:8px}.fuLfMH>span{color:#fff}.dLPVue{padding:48px 32px}.ilVeTz{margin-top:32px}@media (max-width:599.95px){.ilVeTz{text-align:center}}</style>	  		
@section('content')
    {{-- <section class="properties-section spad" style="background: #f5f1f1;">
        <div class="container">
            <div class="text-center">
                <h2>Para quien busca un inmueble </h2>
                <h5>3 sencillos pasos</h5>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4">

                    <div class="text-center">
                        <div class="position-relative">
                            <span class="bg-warning number-circle position-absolute" style="right: 0;">1</span>
                            <img src="/img/1.png" alt="1. Primera visita online">
                        </div>
                        <br>
                        <br>
                        <p>
                            <h5><strong>1. Primera visita virtual</strong></h5>
                        </p>
                        <div class="pservices text-justify">
                            Nos encargamos de verificar antes todos los inmuebles para ti, sin engaños y sin
                            anuncios fraudulentos. ¡Hacemos vídeo, fotos, tomamos medidas y te damos
                            información precisas! IAMOVING, piensa en quien no tiene el tiempo para ir de visita
                            en visita, minimizando las pérdidas de tiempo. Sin visitas frustradas, ¡ahorra tiempo
                            y dinero!
                        </div>
                    </div>

                </div>

                <div class="col-md-4">

                    <div class="text-center">
                        <div class="position-relative">
                            <span class="bg-warning number-circle position-absolute" style="right: 0;">2</span>
                            <img src="/img/2.png" alt="2. Visita con el propietario">
                        </div>
                        <br>
                         <br>
                        <p>
                            <h5><strong>2. Visita con el propietario</strong></h5>
                        </p>
                        <div class="pservices text-justify">
                            Si después de ver el inmueble en nuestra plataforma quieres visitarlo en persona,
                            nosotros agendamos online una visita con el propietario. Negocie directamente con
                            él, sin agencias ni intermediarios.
                        </div>
                    </div>

                </div>

                <div class="col-md-4">
                    <div class="text-center">
                        <div class="position-relative">
                            <span class="bg-warning number-circle position-absolute" style="right: 0;">3</span>
                            <img src="/img/3.png" alt="3 ¡Me encanta el piso, lo quiero!">
                        </div>
                        <br>
                        <br>
                        <p>
                            <h5><strong>3 ¡Me encanta el piso, lo quiero!</strong></h5>
                        </p>
                        <div class="pservices text-justify">
                            ¡Te acompañamos en todo momento! Te defendemos, representamos y miramos
                            totalmente por tus intereses. Sabemos el mejor precio al que se puede llegar, así que
                            si lo prefieres podemos participar y ayudarte con la negociación. Asesoramiento
                            jurídico de los contratos, comprobamos toda la documentación del inmueble y la del
                            propietario. Evitando abusos, estafas y futuros problemas que pueden ocurrir. <b>No
                            pagues de más, ¡paga lo que es!</b>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </section> --}}
<!--<br>-->

    <section class="gallery-section spad" style="padding-top: 20px;padding-bottom: 0px;">
				<div  class="container my-0">

					<div class="row justify-content-center">
						<div class="col-md-12 text-center">
							<img src="/img/pasos.home.png" alt="Pasos home">
						</div>
					</div>
	            </div>
				<br>
        <div class="container my-0">
			<div class="section-title text-center">
                <h3 class="font-weight-bold subtitle_feature">HAZ TU PRIMERA VISITA SIN SALIR DE CASA</h3>
            </div>			
            <div class="row  justify-content-center">
                  
                <div class="col-md-10">
                    <video-card 
                        href="https://youtu.be/nMUj_SeipxQ"
                        source="https://www.youtube.com/embed/nMUj_SeipxQ" >
                        <!--:body="{&quot;id&quot;:5,&quot;nombre&quot;:&quot;Somos Iamoving.&quot;,&quot;descripcion&quot;:null,&quot;direccion&quot;:null,&quot;foto_principal&quot;:null,&quot;video_principal&quot;:&quot;4_SWDNiU2yQ&quot;,&quot;estado&quot;:&quot;1&quot;,&quot;lat&quot;:null,&quot;long&quot;:null,&quot;created_at&quot;:&quot;2019-03-26 18:16:19&quot;,&quot;updated_at&quot;:&quot;2019-03-26 18:16:19&quot;,&quot;ciudad&quot;:null,&quot;video&quot;:null}" width="40%">-->
                          
                        </video-card>
                </div>
			</div>
			<!--<div class="row justify-content-center my-0">
				<div class="col-md-8 text-center">
					<img src="/img/telefono.png" alt="iamoving smartphone">
				</div>
			</div>-->
			<!--
            <div class="owl-carousel">
              <div class="item">
					<div class="col-md-12">
						<video-card 
							href="https://youtu.be/8epVHl-n39k" 
							source="https://www.youtube.com/embed/8epVHl-n39k" 
							:body="{&quot;id&quot;:5,&quot;nombre&quot;:&quot;Experiencia de una inquilina con Iamoving.&quot;,&quot;descripcion&quot;:null,&quot;direccion&quot;:null,&quot;foto_principal&quot;:null,&quot;video_principal&quot;:&quot;4_SWDNiU2yQ&quot;,&quot;estado&quot;:&quot;1&quot;,&quot;lat&quot;:null,&quot;long&quot;:null,&quot;created_at&quot;:&quot;2019-03-26 18:16:19&quot;,&quot;updated_at&quot;:&quot;2019-03-26 18:16:19&quot;,&quot;ciudad&quot;:null,&quot;video&quot;:null}" width="40%">
							  
							</video-card>
					</div>

                </div>    
                 <div class="item">  
					<div class="col-md-12">
						<video-card 
							href="https://youtu.be/oOR_0B9L7zQ" 
							source="https://www.youtube.com/embed/oOR_0B9L7zQ" 
							:body="{&quot;id&quot;:6,&quot;nombre&quot;:&quot;Experiencia de una inquilina con Iamoving.&quot;,&quot;descripcion&quot;:null,&quot;direccion&quot;:null,&quot;foto_principal&quot;:null,&quot;video_principal&quot;:&quot;WFY44sjml-Q&quot;,&quot;estado&quot;:&quot;1&quot;,&quot;lat&quot;:null,&quot;long&quot;:null,&quot;created_at&quot;:&quot;2019-03-26 18:17:56&quot;,&quot;updated_at&quot;:&quot;2019-03-26 18:17:56&quot;,&quot;ciudad&quot;:null,&quot;video&quot;:null}" width="40%">
							  
							</video-card>
					</div>
                </div>
               
                 <div class="item">  
					<div class="col-md-12">
						<video-card 
							href="https://youtu.be/GS7r9numiAg" 
							source="https://www.youtube.com/embed/GS7r9numiAg" 
							:body="{&quot;id&quot;:7,&quot;nombre&quot;:&quot;Experiencia de una propietaria con Iamoving.&quot;,&quot;descripcion&quot;:null,&quot;direccion&quot;:null,&quot;foto_principal&quot;:null,&quot;video_principal&quot;:&quot;MmaioAABW9U&quot;,&quot;estado&quot;:&quot;1&quot;,&quot;lat&quot;:null,&quot;long&quot;:null,&quot;created_at&quot;:&quot;2019-03-26 18:26:51&quot;,&quot;updated_at&quot;:&quot;2019-03-26 18:26:51&quot;,&quot;ciudad&quot;:null,&quot;video&quot;:null}" width="40%">
							  
							</video-card>
					</div>
                 </div>
            </div>	
-->			
			<br>
				<!--	<nav class="nav nav-pills nav-justified border-bottom" role="tablist">
						<a class="nav-item active nounderline" href="#Alquilar" data-toggle="tab"
							role="tab" aria-controls="Alquilar" aria-selected="true" style="vertical-align: middle;">
							<span class="d-block" style="vertical-align: middle;"><b>EXPERIENCIAS DE ALQUILAR CON IAMOVING</b></span>
							
						</a>
						<a class="nav-item nav-link" href="#Comprar" data-toggle="tab"
							role="tab" aria-controls="Comprar" aria-selected="false">
							<span class="d-block"><b>EXPERIENCIAS DE PROPIETARIOS CON IAMOVING</b></span>
							
						</a>
					</nav>	-->
					<!--<div class="tab-content">
						<div class="tab-pane container active" id="Alquilar">-->

								
    			<!--<div class="section-title text-center">
                <h3 class="font-weight-bold subtitle_feature">EXPERIENCIAS DE ALQUILAR CON IAMOVING</h3>
            </div>	
										<div class="row justify-content-center my-0">		
							 <div class="container-fluid" data-aos="fade" data-aos-delay="500">
								<div class="swiper-container images-carousel">
									<div class="swiper-wrapper" style="height:18em;">
							<div class="swiper-slide">			
										<video-card 
														href="https://youtu.be/8epVHl-n39k" 
														source="https://www.youtube.com/embed/8epVHl-n39k" >
														
														  
														</video-card>
							 </div>							
										<div class="swiper-slide">
										  
													<video-card 
														href="https://youtu.be/oOR_0B9L7zQ" 
														source="https://www.youtube.com/embed/oOR_0B9L7zQ" >
														
														  
														</video-card>
										  
										</div>
										<div class="swiper-slide">
										  
													<video-card 
														href="https://youtu.be/9MNarTj7pDY" 
														source="https://www.youtube.com/embed/9MNarTj7pDY" >
														
														  
														</video-card>

										  
										</div>
										<div class="swiper-slide">
										  
														<div class="card">
												  
															<div class="testimonial">
																
																	<h3 class="title">Cristina inquilina <a href="/VisitaVirtual/327">Referencia 327</a></h3></h3>
																								
																<span class="icon fa fa-quote-left"></span>
																<p class="description">
																	 Mi experiencia con IAMOVING ha sido excelente desde el comienzo. Buscaba alquilar un piso y el mismo día que me contacté coordinamos una visita al piso que yo quería. La gestión fue rápida, eficaz y siempre estuvieron a disposición para mi.
																</p>

															</div>
											
														</div>
										</div>
										<div class="swiper-slide">
										  
														<div class="card">
												  
															<div class="testimonial">
																
																	<h3 class="title">Anais, inquilina <a href="/VisitaVirtual/504">Referencia 405</a></h3></h3>
																								
																<span class="icon fa fa-quote-left"></span>
																<p class="description">
																	He encontrado un piso excepcional a través de la oferta de Iamoving . Me han facilitado la visita y he podido encontrar un piso cumpliendo con todos mis requisitos. Desde entonces alquilo un piso a mi gusto.
																</p>

															</div>
											
														</div>
										</div>				
									</div>
									<div class="swiper-button-prev"></div>
									<div class="swiper-button-next"></div>
								</div>
							  </div>		
							</div>		-->					
						
						<!--</div>				-->
						
						
						
					<!--<div class="tab-pane container fade" id="Comprar">-->
								
    			<!--<div class="section-title text-center">
                <h3 class="font-weight-bold subtitle_feature">EXPERIENCIAS DE PROPIETARIOS CON IAMOVING</h3>
            </div>	-->

			<!--<div class="row justify-content-center my-0">		
 <div class="container-fluid" data-aos="fade" data-aos-delay="500">
    <div class="swiper-container images-carousel">
        <div class="swiper-wrapper" style="height:18em;">
            <div class="swiper-slide">
						  <div class="card">
					  
								<div class="testimonial">
									
										<h3 class="title">María Propietaria <a href="/VisitaVirtual/485">Referencia 485</a></h3>
																	
									<span class="icon fa fa-quote-left"></span>
									<p class="description">
										 Soy propietaria de un ático en Martínez Campos aquí en Madrid, me lo alquilaron los de Iamoving y estoy encantada, han sido muy profesionales y eficaces, aparte de rápidos y encontrando un inquilino muy solvente. Les recomiendo encarecidamente. Gracias Iamoving!!! 
									</p>

								</div>
						  </div>              
              
            </div>
            <div class="swiper-slide">
              
                     <video-card 
                        href="https://youtu.be/GS7r9numiAg" 
                        source="https://www.youtube.com/embed/GS7r9numiAg" >
              
                          
                    </video-card>
              
            </div>
            <div class="swiper-slide">
              
	                				<video-card 
					href="https://youtu.be/Zb5t8mBTAkQ" 
					source="https://www.youtube.com/embed/Zb5t8mBTAkQ" >
					
					  
				</video-card>

              
            </div>
            <div class="swiper-slide">
              
							<div class="card">
					  
								<div class="testimonial">
									
										<h3 class="title">Carmen Propietaria <a href="/VisitaVirtual/512">Referencia 512</a></h3></h3>
																	
									<span class="icon fa fa-quote-left"></span>
									<p class="description">
										 Ha sido fantástico trabajar con vosotros.En una tarde concentrasteis las visitas y surgió una pareja que lo ha alquilado. Hemos quedado tan contentos que esperamos contar siempre con vuestros servicios ya que los hemos encontrado serios y rápidos. Muchísimas gracias.
									</p>

								</div>
				
                            </div>
            </div>
            <div class="swiper-slide">
              
							<div class="card">
					  
								<div class="testimonial">
									
										<h3 class="title">Raúl Propietario <a href="/VisitaVirtual/292">Referencia 292</a></h3></h3>
																	
									<span class="icon fa fa-quote-left"></span>
									<p class="description">
										El pasado mes de Julio decidí alquilar mi piso con IAMOVING. Les indiqué las condiciones que quería para el alquiler y ellos se encargaron del resto: búsqueda de candidatos, realización de fotos y su publicación en la web, etc. En pocos días estaba todo cerrado. Además incluyeron un seguro de protección de alquiler por un año gratuitamente.
									</p>

								</div>
				
                            </div>
            </div>	
            <div class="swiper-slide">
              
							<div class="card">
					  
								<div class="testimonial">
									
										<h3 class="title">José Propietario <a href="/VisitaVirtual/392">Referencia 392</a></h3></h3>
																	
									<span class="icon fa fa-quote-left"></span>
									<p class="description">
										Estoy plenamente satisfecho con el servicio de IAMOVING, ya no sólo porque alquilé mi piso en tiempo récord sino que además tienes la garantía de cobrar tus cuotas puntualmente y un seguro de alquiler, que cubre impagos, daños a la propiedad, etc. Y lo mejor de todo, es que yo no tuve que pagar ese seguro ni una comisión por el alquiler de mi piso.
									</p>

								</div>
				
                            </div>
            </div>				
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
  </div>		
</div>	-->								
								
								
								
								
								
								
								
		
				<!--		</div>
				</div>-->



        </div>

    </section>

    {{-- <section class="gallery-section spad" style="background: #f5f1f1;">
        <div class="container">
            <div class="text-center" style="margin-top: -50px !important">
                <h3>PAGUE MENOS!</h3>
                <h5>Para compradores y inquilinos.</h5>
                <p>Comprando o alquilando con IAMOVING, tendrás una serie de servicios
                incluidos y descuentos especiales, que se lo revertirán en ahorro de dinero, tiempo y
                siendo una experiencia aún mejor. Vea todo lo que te esperas!
                </p>
            </div>
            <br>

            <div class="row">
                @foreach ($services as $service)
                    <div class="col-md-4">
                        <video-card href="/servicio/{{$service->id}}" 
                                    :body="{{$service}}"
                                    source="/storage/{{$service->video}}" ></video-card>
                    </div>
                @endforeach
            </div>

        </div>
    </section> --}}

    <!-- feature section -->
    <section class="feature-section spad" style="padding-top:20px;">
        <div class="container my-0">
           <!-- <div class="section-title text-center">
                <h3 class="font-weight-bold subtitle_feature">EXPERIENCIAS DE ALQUILAR CON IAMOVING</h3>
            </div>		
            <div id="owl-demo" class="owl-carousel">
              <div class="item">
					<div class="col-md-12">
						<video-card 
							href="https://youtu.be/8epVHl-n39k" 
							source="https://www.youtube.com/embed/8epVHl-n39k" 
							:body="{&quot;id&quot;:5,&quot;nombre&quot;:&quot;Experiencia de una inquilina con Iamoving.&quot;,&quot;descripcion&quot;:null,&quot;direccion&quot;:null,&quot;foto_principal&quot;:null,&quot;video_principal&quot;:&quot;4_SWDNiU2yQ&quot;,&quot;estado&quot;:&quot;1&quot;,&quot;lat&quot;:null,&quot;long&quot;:null,&quot;created_at&quot;:&quot;2019-03-26 18:16:19&quot;,&quot;updated_at&quot;:&quot;2019-03-26 18:16:19&quot;,&quot;ciudad&quot;:null,&quot;video&quot;:null}" width="40%">
							  
							</video-card>
					</div>

                </div>    
                 <div class="item">  
					<div class="col-md-12">
						<video-card 
							href="https://youtu.be/oOR_0B9L7zQ" 
							source="https://www.youtube.com/embed/oOR_0B9L7zQ" 
							:body="{&quot;id&quot;:6,&quot;nombre&quot;:&quot;Experiencia de una inquilina con Iamoving.&quot;,&quot;descripcion&quot;:null,&quot;direccion&quot;:null,&quot;foto_principal&quot;:null,&quot;video_principal&quot;:&quot;WFY44sjml-Q&quot;,&quot;estado&quot;:&quot;1&quot;,&quot;lat&quot;:null,&quot;long&quot;:null,&quot;created_at&quot;:&quot;2019-03-26 18:17:56&quot;,&quot;updated_at&quot;:&quot;2019-03-26 18:17:56&quot;,&quot;ciudad&quot;:null,&quot;video&quot;:null}" width="40%">
							  
							</video-card>
					</div>
                </div>
                 <div class="item">  
					<div class="col-md-12">
						<video-card 
							href="https://youtu.be/9MNarTj7pDY" 
							source="https://www.youtube.com/embed/9MNarTj7pDY" 
							:body="{&quot;id&quot;:6,&quot;nombre&quot;:&quot;Experiencia de un inquilino con Iamoving.&quot;,&quot;descripcion&quot;:null,&quot;direccion&quot;:null,&quot;foto_principal&quot;:null,&quot;video_principal&quot;:&quot;WFY44sjml-Q&quot;,&quot;estado&quot;:&quot;1&quot;,&quot;lat&quot;:null,&quot;long&quot;:null,&quot;created_at&quot;:&quot;2019-03-26 18:17:56&quot;,&quot;updated_at&quot;:&quot;2019-03-26 18:17:56&quot;,&quot;ciudad&quot;:null,&quot;video&quot;:null}" width="40%">
							  
							</video-card>
					</div>
                </div>				

            </div>	-->
		<!--<br>
		
            <div class="owl-carousel">
              <div class="item">
					<div class="col-md-12">
						<video-card 
							href="https://youtu.be/8epVHl-n39k" 
							source="https://www.youtube.com/embed/8epVHl-n39k" 
							:body="{&quot;id&quot;:5,&quot;nombre&quot;:&quot;Testigo IAMPRO.&quot;,&quot;descripcion&quot;:null,&quot;direccion&quot;:null,&quot;foto_principal&quot;:null,&quot;video_principal&quot;:&quot;4_SWDNiU2yQ&quot;,&quot;estado&quot;:&quot;1&quot;,&quot;lat&quot;:null,&quot;long&quot;:null,&quot;created_at&quot;:&quot;2019-03-26 18:16:19&quot;,&quot;updated_at&quot;:&quot;2019-03-26 18:16:19&quot;,&quot;ciudad&quot;:null,&quot;video&quot;:null}" width="40%">
							  
							</video-card>
					</div>

                </div>    
                 <div class="item">  
					<div class="col-md-12">
						<video-card 
							href="https://youtu.be/oOR_0B9L7zQ" 
							source="https://www.youtube.com/embed/oOR_0B9L7zQ" 
							:body="{&quot;id&quot;:6,&quot;nombre&quot;:&quot;Testigo IAMPRO.&quot;,&quot;descripcion&quot;:null,&quot;direccion&quot;:null,&quot;foto_principal&quot;:null,&quot;video_principal&quot;:&quot;WFY44sjml-Q&quot;,&quot;estado&quot;:&quot;1&quot;,&quot;lat&quot;:null,&quot;long&quot;:null,&quot;created_at&quot;:&quot;2019-03-26 18:17:56&quot;,&quot;updated_at&quot;:&quot;2019-03-26 18:17:56&quot;,&quot;ciudad&quot;:null,&quot;video&quot;:null}" width="40%">
							  
							</video-card>
					</div>
                </div>
               
                 <div class="item">  
					<div class="col-md-12">
						<video-card 
							href="https://youtu.be/GS7r9numiAg" 
							source="https://www.youtube.com/embed/GS7r9numiAg" 
							:body="{&quot;id&quot;:7,&quot;nombre&quot;:&quot;Testigo IAMPRO.&quot;,&quot;descripcion&quot;:null,&quot;direccion&quot;:null,&quot;foto_principal&quot;:null,&quot;video_principal&quot;:&quot;MmaioAABW9U&quot;,&quot;estado&quot;:&quot;1&quot;,&quot;lat&quot;:null,&quot;long&quot;:null,&quot;created_at&quot;:&quot;2019-03-26 18:26:51&quot;,&quot;updated_at&quot;:&quot;2019-03-26 18:26:51&quot;,&quot;ciudad&quot;:null,&quot;video&quot;:null}" width="40%">
							  
							</video-card>
					</div>
                 </div>
                 <div class="item">  
					<div class="col-md-12">
						<video-card 
							href="https://youtu.be/GS7r9numiAg" 
							source="https://www.youtube.com/embed/GS7r9numiAg" 
							:body="{&quot;id&quot;:7,&quot;nombre&quot;:&quot;Testigo IAMPRO.&quot;,&quot;descripcion&quot;:null,&quot;direccion&quot;:null,&quot;foto_principal&quot;:null,&quot;video_principal&quot;:&quot;MmaioAABW9U&quot;,&quot;estado&quot;:&quot;1&quot;,&quot;lat&quot;:null,&quot;long&quot;:null,&quot;created_at&quot;:&quot;2019-03-26 18:26:51&quot;,&quot;updated_at&quot;:&quot;2019-03-26 18:26:51&quot;,&quot;ciudad&quot;:null,&quot;video&quot;:null}" width="40%">
							  
							</video-card>
					</div>
                 </div>				 
            </div>			
		</div>-->

		<div class="container">
            <div class="section-title text-center">
                <h3 class="font-weight-bold subtitle_feature">¡ NOS ACABAN DE ENTRAR !</h3>
            </div>

            <div class="owl-carousel">
                @foreach ($showcase as $item)
                    <div class="item">
                        <show-case :data="{{$item}}"></show-case>
                    </div>    
                @endforeach
            </div>
            
         
                <div class="my-0 col-12">
                    <div class="row  justify-content-center align-items-center">
                        <a href="/inmuebles" class="btn btn-warning">Ver más inmuebles ..</a>
                    </div>
                </div>
          
        </div>
<br>
<br>
<br>
<br>	
		<div class="container">
            <!--<div class="section-title text-center">
                <h3 class="font-weight-bold subtitle_feature"><img src="/img/logo.iampro.png" alt="IAMPRO logotipo" class="m-1" style="margin-right: 10px"  width="95px">: Indícanos pisos que estén en alquiler o venta y ¡GANA DINERO!</h3>
            </div>		-->
                <div class="row justify-content-center">
                    <div class="col text-center">
                        <img src="/img/logo.iampro.png" alt="IAMPRO logotipo" width="375" class="my-4">
                    </div>
                </div>
                <!--<h2 class="my-4 text-center">¡De particular a particular!</h2>-->
                <h2 class="my-4 text-center"><b>Indícanos pisos y gana dinero</b></h2>			
            <!--<div class="row text-center justify-content-center">                  
                <div class="col-md-10">
                    <video-card 
                        href="https://youtu.be/LzNa6FYaHSE" 
                        source="https://www.youtube.com/embed/LzNa6FYaHSE" >-->
                        <!--:body="{&quot;id&quot;:5,&quot;nombre&quot;:&quot;Conviértete en agente IAMPRO&quot;,&quot;descripcion&quot;:null,&quot;direccion&quot;:null,&quot;foto_principal&quot;:null,&quot;video_principal&quot;:&quot;4_SWDNiU2yQ&quot;,&quot;estado&quot;:&quot;1&quot;,&quot;lat&quot;:null,&quot;long&quot;:null,&quot;created_at&quot;:&quot;2019-03-26 18:16:19&quot;,&quot;updated_at&quot;:&quot;2019-03-26 18:16:19&quot;,&quot;ciudad&quot;:null,&quot;video&quot;:null}" width="40%">-->
                          
                    <!--    </video-card>
                </div>
			</div>-->
<!--<br>-->			
            <div class="row">
                <div class="col-12">
                    <div class="row  justify-content-center align-items-center">
                        <a href="/IAMpro" class="btn btn btn-warning">Pues sigue leyendo esto que te interesa...</a>
                    </div>
                </div>
            </div>			
        </div>			
		</section>
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
        var verification_code = @json($verification_code);
        

        window.addEventListener('DOMContentLoaded', function() {
            $("#global_message").hide();
            if(token!=null){
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
                }
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
        autoPlay:true
    });
});		
       // $( ".owl-prev").owlCarousel.html('<i class="fa fa-chevron-left"></i>');

		//$( ".owl-next").owlCarousel.html('<i class="fa fa-chevron-right"></i>');

            
            // filter
            $('#form-reference').on('submit', function(e) {
                e.preventDefault();

                location.href = '/VisitaVirtual/' + $('#input-filter').val();
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



    </script>
@endsection
