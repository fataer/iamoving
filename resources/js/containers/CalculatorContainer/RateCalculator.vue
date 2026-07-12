<template>
    <div class="card">
        <div class="card-body">
            <div class="text-center my-3">
                <label>Precio de tu casa:</label>
                <money :value="defaultValue" v-bind="options" @input="change" class="form-control"></money>
            </div>
            <div class="text-center my-3">
                <label><center>Vendiendo con agencias tradicionales</center></label>
                <input type="range" class="custom-range" min="3" max="6" v-model.number="commission">
                <div class="indicators">
                    <div>3%</div>
                    <div>4%</div>
                    <div>5%</div>
                    <div>6%</div>
                </div>

            </div>
            <div class="d-flex justify-content-between" >
		<!--	                            <svg class="jss215 undefined jss214 sc-6ysmz4-0 fEgzNb" focusable="false" viewBox="0 0 24 24" aria-hidden="true" theme="[object Object]">
                              <g>
                                <circle cx="15.5" cy="9.5" r="1.5"></circle>
                                <circle cx="8.5" cy="9.5" r="1.5"></circle>
                                <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm0-6c-2.33 0-4.32 1.45-5.12 3.5h1.67c.69-1.19 1.97-2 3.45-2s2.75.81 3.45 2h1.67c-.8-2.05-2.79-3.5-5.12-3.5z"></path>
                              </g>
                            </svg>		-->
                <span  style="color:#000000;float:left;padding: 0 0.50rem;margin-bottom: 10px;">Miles de llamadas indeseadas</span>
                <span style="color:#000000;float:right;padding: 0 0.50rem;margin-bottom: 10px;"><svg class="jss215 undefined jss214 sc-6ysmz4-0 fEgzNb" focusable="false" viewBox="0 0 24 24" aria-hidden="true" theme="[object Object]">
                              <g>
                                <circle cx="15.5" cy="9.5" r="1.5"></circle>
                                <circle cx="8.5" cy="9.5" r="1.5"></circle>
                                <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm0-6c-2.33 0-4.32 1.45-5.12 3.5h1.67c.69-1.19 1.97-2 3.45-2s2.75.81 3.45 2h1.67c-.8-2.05-2.79-3.5-5.12-3.5z"></path>
                              </g>
                            </svg> </span>
            </div>             
            <!--<div class="d-flex justify-content-between" >
                <span  style="color:#000000;float:left;padding: 0 0.50rem;margin-bottom: 10px;">Filtro de compradores </span>
                <span style="color:#000000;float:right;padding: 0 0.50rem;margin-bottom: 10px;">No</span> 
            </div>              -->
            <div class="d-flex justify-content-between" >
                <span  style="color:#000000;float:left;padding: 0 0.50rem;margin-bottom: 10px;">Visitas frustradas</span>
                <span style="color:#000000;float:right;padding: 0 0.50rem;margin-bottom: 10px;"><svg class="jss215 undefined jss214 sc-6ysmz4-0 fEgzNb" focusable="false" viewBox="0 0 24 24" aria-hidden="true" theme="[object Object]">
                              <g>
                                <circle cx="15.5" cy="9.5" r="1.5"></circle>
                                <circle cx="8.5" cy="9.5" r="1.5"></circle>
                                <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm0-6c-2.33 0-4.32 1.45-5.12 3.5h1.67c.69-1.19 1.97-2 3.45-2s2.75.81 3.45 2h1.67c-.8-2.05-2.79-3.5-5.12-3.5z"></path>
                              </g>
                            </svg> </span>
            </div>   
            <div class="d-flex justify-content-between" >
                <span  style="color:#000000;float:left;padding: 0 0.50rem;margin-bottom: 10px;">Pérdida de tiempo</span>
                <span style="color:#000000;float:right;padding: 0 0.50rem;margin-bottom: 10px;"><svg class="jss215 undefined jss214 sc-6ysmz4-0 fEgzNb" focusable="false" viewBox="0 0 24 24" aria-hidden="true" theme="[object Object]">
                              <g>
                                <circle cx="15.5" cy="9.5" r="1.5"></circle>
                                <circle cx="8.5" cy="9.5" r="1.5"></circle>
                                <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm0-6c-2.33 0-4.32 1.45-5.12 3.5h1.67c.69-1.19 1.97-2 3.45-2s2.75.81 3.45 2h1.67c-.8-2.05-2.79-3.5-5.12-3.5z"></path>
                              </g>
                            </svg></span> 
            </div>                          
            <div class="d-flex justify-content-between" >
                <span  style="color:#000000;float:left;padding: 0 0.50rem;margin-bottom: 10px;">Honorarios</span>
                <span style="color:#000000;float:right;padding: 0 0.50rem;margin-bottom: 10px;">{{formatCurrency(output)}}</span>
                <!--<span v-text="formatCurrency(output)"></span>-->
            </div>              
            <div class="d-flex justify-content-between" >
                <span  style="color:#000000;float:left;padding: 0 0.50rem;margin-bottom: 10px;">IVA 21%</span>
                <span style="color:#000000;float:right;padding: 0 0.50rem;margin-bottom: 10px;">{{formatCurrency(iva)}}</span>
                <!--<span v-text="formatCurrency(iva)"></span>-->
            </div>                                                  
            <div class="d-flex justify-content-between" >
                <span  style="color:#000000;float:left;padding: 0 0.50rem;margin-bottom: 10px;">Total</span>
                <span style="color:#000000;float:right;padding: 0 0.50rem;margin-bottom: 10px;">{{formatCurrency(total)}}</span>
                <!--<span v-text="formatCurrency(total)"></span>-->
            </div>                                                              
            <!--<div class="text-center my-3">
                <label><center><h3><b>Comisión que tú pagas a la agencia</b></h3></center></label>
            </div>-->
        </div>
     
        <div class="iamoving-theme">
            <div class="text-center my-1">
                <span  style="color:#FFFFFF;padding: 0 0.50rem;margin-bottom: 10px;">VENDIENDO CON IAMOVING</span>
                
            </div>
             <div class="text-center my-0">
                <span  style="color:#FFFFFF;padding: 0 0.50rem;margin-bottom: 10px;">Plan coste cero</span>
                
            </div>
                        <div class="text-center my-3">
                <span  style="color:#FFFFFF;padding: 0 0.10rem;margin-bottom: 10px;">Anuncia tu piso con Iamoving. Si después de tres meses aún no lo hemos vendido, quitamos la exclusividad y te mantenemos las mismas condiciones. ¡Totalmente gratuito!</span>
                
            </div>            
            <div class="d-flex justify-content-between" >
			
                <span  style="color:#FFFFFF;float:left;padding: 0 0.10rem;margin-bottom: 10px;">Primera visita online</span>
               <span style="color:#FFFFFF;float:right;padding: 0 0.10rem;margin-bottom: 10px;">								<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" class="svg-inline--fa fa-check fa-w-16" role="img" 
								xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"  style="height: 1.45em;width: 1.45em;">
									<path fill="white" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z">
									</path>
								</svg></span>
            </div>                                                  
            <!--<div class="d-flex justify-content-between" >
                <span  style="color:#FFFFFF;float:left;padding: 0 0.50rem;margin-bottom: 10px;">Visitas frustradas </span>
                <span style="color:#FFFFFF;float:right;padding: 0 0.50rem;margin-bottom: 10px;">No</span> 
            </div>  -->
            <!--<div class="d-flex justify-content-between" >
                <span  style="color:#FFFFFF;float:left;padding: 0 0.50rem;margin-bottom: 10px;">Comisiones   </span>
                <span style="color:#FFFFFF;float:right;padding: 0 0.50rem;margin-bottom: 10px;">No</span> 
            </div>                                                  -->
                                                   <!-- <div class="d-flex justify-content-between" >
                                                                <span  style="color:#FFFFFF;float:left;padding: 0 0.50rem;margin-bottom: 10px;"><a href="/servicio/4"  class="font-weight-bold" style="color: #EADD03;"  target="blank">Servicios incluidos</a></span>
                                                                <span style="color:#FFFFFF;float:right;padding: 0 0.50rem;margin-bottom: 10px;">Si</span> 
                                                            </div>              
                                                                                                        
                                                    <div class="d-flex justify-content-between" >
                                                                <span  style="color:#FFFFFF;float:left;padding: 0 0.50rem;margin-bottom: 10px;"><a href="/servicio/8"  class="font-weight-bold" style="color: #EADD03;"  target="blank">Descuentos especiales</a></span>
                                                                <span style="color:#FFFFFF;float:right;padding: 0 0.50rem;margin-bottom: 10px;">Si</span> 
                                                            </div>    -->                                             
            <!--<div class="d-flex justify-content-between" >
                <span  style="color:#FFFFFF;float:left;padding: 0 0.50rem;margin-bottom: 10px;">Tarifa de servicios</span>
                <span style="color:#FFFFFF;float:right;padding: 0 0.50rem;margin-bottom: 10px;">Gratuito</span>
                
            </div>                          -->
            <div class="d-flex justify-content-between" >
                <span  style="color:#FFFFFF;float:left;padding: 0 0.10rem;margin-bottom: 10px;">AHORRARÁS CON IAMOVING</span>
                <span style="color:#FFFFFF;float:right;padding: 0 0.10rem;margin-bottom: 10px;">{{formatCurrency(total)}}</span>
                <!--<span v-text="formatCurrency(total)"></span>-->
            </div>  
                        <div class="text-center my-3">
                <span  style="color:#FFFFFF;padding: 0 0.50rem;margin-bottom: 10px;">Ahorrando tiempo y dinero</span>
                
            </div>
           <!--             <div class="text-center my-3">
                <span  style="color:#FFFFFF;padding: 0 0.50rem;margin-bottom: 10px;">Ahorrando tiempo y dinero</span>
                
            </div>          -->
        </div>
    </div>
</template>
<style data-jss="" data-meta="MuiSvgIcon" data-jss-server-side="true">.jss215{fill:currentColor;width:1em;height:1em;display:inline-block;font-size:24px;transition:fill .2s cubic-bezier(.4,0,.2,1) 0s;user-select:none;flex-shrink:0}.jss216{color:#5063f0}.jss217{color:#36b67e}.jss218{color:rgba(0,0,0,.54)}.jss219{color:#c6292e}.jss220{color:rgba(0,0,0,.26)}</style>
<script>
import { Money } from 'v-money';
import { options, format } from "./utils";

export default {
    components: {
        Money
    },
    props: {
        defaultValue: {
            type: Number,
            default: 0
        },
    },
    data() {
        return {
            options,
            value: 0,
            commission: 4
        }
    },
    methods: {
        change(value) {
            this.value = value;
        },
        formatCurrency(value) {
            return format(value);
        }
    },
    computed: {
        output() {
            return this.value * (this.commission / 100);
        },
        iva() {
            return this.value * (this.commission / 100) * (21/100);
        },
        total() {
            return (this.value * (this.commission / 100)) + (this.value * (this.commission / 100) * (21/100));
        }
    }
}
</script>