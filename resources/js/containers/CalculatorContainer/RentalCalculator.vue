<template>
    <div class="card">
        <div class="card-body">
            <div class="text-center my-3">
                <label>Precio del inmueble de tu interés:</label>
                <money :value="defaultValue" v-bind="options" @input="change" class="form-control"></money>
            </div>

        

            <div class="text-center my-3">
                <span  style="color:#000000;padding: 0 0.50rem;margin-bottom: 10px;">Alquilando con agencias</span>
                
            </div>
            <div class="d-flex justify-content-between" >
                <span  style="color:#000000;float:left;padding: 0 0.50rem;margin-bottom: 10px;">Miles de llamadas innecesarias</span>
                <span style="color:#000000;float:right;padding: 0 0.50rem;margin-bottom: 10px;">Si</span> 
            </div>             
            <div class="d-flex justify-content-between" >
                <span  style="color:#000000;float:left;padding: 0 0.50rem;margin-bottom: 10px;">Visitar miles de inmuebles</span>
                <span style="color:#000000;float:right;padding: 0 0.50rem;margin-bottom: 10px;">Si</span> 
            </div>              
            <div class="d-flex justify-content-between" >
                <span  style="color:#000000;float:left;padding: 0 0.50rem;margin-bottom: 10px;">Visitas frustradas</span>
                <span style="color:#000000;float:right;padding: 0 0.50rem;margin-bottom: 10px;">Si</span> 
            </div>              
            <div class="d-flex justify-content-between" >
                <span  style="color:#000000;float:left;padding: 0 0.50rem;margin-bottom: 10px;">Pérdida de tiempo</span>
                <span style="color:#000000;float:right;padding: 0 0.50rem;margin-bottom: 10px;">Si</span> 
            </div> 
            <!--<div class="d-flex justify-content-between" >
                <span  style="color:#000000;float:left;padding: 0 0.50rem;margin-bottom: 10px;">Servicios incluidos</span>
                <span style="color:#000000;float:right;padding: 0 0.50rem;margin-bottom: 10px;">No</span> 
            </div>
            <div class="d-flex justify-content-between" >
                <span  style="color:#000000;float:left;padding: 0 0.50rem;margin-bottom: 10px;">Descuentos especiales</span>
                <span style="color:#000000;float:right;padding: 0 0.50rem;margin-bottom: 10px;">No</span> 
            </div>-->
            <div class="d-flex justify-content-between" >
                <span  style="color:#000000;float:left;padding: 0 0.50rem;margin-bottom: 10px;">Honorarios</span>
                <span style="color:#000000;float:right;padding: 0 0.50rem;margin-bottom: 10px;">{{formatCurrency(value)}}</span>
                <!--<span v-text="formatCurrency(value)"><small>+iva</small></span>-->
                
            </div>                          
            <div class="d-flex justify-content-between" >
                <span  style="color:#000000;float:left;padding: 0 0.50rem;margin-bottom: 10px;">IVA 21%</span>
                <span style="color:#000000;float:right;padding: 0 0.50rem;margin-bottom: 10px;">{{formatCurrency(iva)}}</span>
                <!--<span v-text="formatCurrency(iva)"><small>+iva</small></span>-->
                
            </div>                          
            <div class="d-flex justify-content-between" >
                <span  style="color:#000000;float:left;padding: 0 0.50rem;margin-bottom: 10px;">Total</span>
                <span style="color:#000000;float:right;padding: 0 0.50rem;margin-bottom: 10px;">{{formatCurrency(total)}}</span>
                <!--<span v-text="formatCurrency(total)"><small>+iva</small></span>-->
                
            </div>                          
        </div>
        <div class="iamoving-theme">
            <div class="text-center my-3">
                <span  style="color:#FFFFFF;padding: 0 0.50rem;margin-bottom: 10px;"><b>ALQUILANDO CON IAMOVING</b></span>
                
            </div>
            <div class="d-flex justify-content-between" >
                <span  style="color:#FFFFFF;float:left;padding: 0 0.50rem;margin-bottom: 10px;">Primera visita online</span>
                <span style="color:#FFFFFF;float:right;padding: 0 0.50rem;margin-bottom: 10px;">Si</span>
            </div>  
            <div class="d-flex justify-content-between" >
                <span  style="color:#FFFFFF;float:left;padding: 0 0.50rem;margin-bottom: 10px;">Informe detallado del inmueble</span>
                <span style="color:#FFFFFF;float:right;padding: 0 0.50rem;margin-bottom: 10px;">Si</span> 
            </div>                                                
           <!-- <div class="d-flex justify-content-between" >
                <span  style="color:#FFFFFF;float:left;padding: 0 0.50rem;margin-bottom: 10px;">Visitas frustradas </span>
                <span style="color:#FFFFFF;float:right;padding: 0 0.50rem;margin-bottom: 10px;">No</span> 
            </div>  -->
           <!-- <div class="d-flex justify-content-between" >
                <span  style="color:#FFFFFF;float:left;padding: 0 0.50rem;margin-bottom: 10px;">Comisiones</span>
                <span style="color:#FFFFFF;float:right;padding: 0 0.50rem;margin-bottom: 10px;">No</span> 
            </div>-->
                                                    <div class="d-flex justify-content-between" >
                                                                <span  style="color:#FFFFFF;float:left;padding: 0 0.50rem;margin-bottom: 10px;"><a href="/servicio/1"  class="font-weight-bold" style="color: #EADD03;"  target="blank">Servicios incluidos</a></span>
                                                                <span style="color:#FFFFFF;float:right;padding: 0 0.50rem;margin-bottom: 10px;">Si</span> 
                                                            </div>              
                                                                                                        
                                                    <div class="d-flex justify-content-between" >
                                                                <span  style="color:#FFFFFF;float:left;padding: 0 0.50rem;margin-bottom: 10px;"><a href="/servicio/5"  class="font-weight-bold" style="color: #EADD03;"  target="blank">Descuentos especiales</a></span>
                                                                <span style="color:#FFFFFF;float:right;padding: 0 0.50rem;margin-bottom: 10px;">Si</span> 
                                                            </div>                                                 
            <div class="d-flex justify-content-between" >
                <!--<span  style="color:#FFFFFF;float:left;padding: 0 0.50rem;margin-bottom: 10px;">Tarifa ÚNICA de servicios</br>(IVA incluido)</span>-->
                     <span  style="color:#FFFFFF;float:left;padding: 0 0.50rem;margin-bottom: 10px;">Tarifa ÚNICA de servicios</br><center><small style="font-size: 11px; color: #fff;width:150%;" >(IVA incluido)</small></center></span>
                <span style="color:#FFFFFF;float:right;padding: 0 0.50rem;margin-bottom: 10px;">{{formatCurrency(output)}}</span>
            </div> 
            <div class="text-center my-3">
                <span  style="color:#FFFFFF;padding: 0 0.50rem;margin-bottom: 0px;">¡Sin visitas frustradas!</span>
            </div>
        </div>

    </div>
</template>

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
            value: 0
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
            return this.value;
        },
        iva() {
            return this.value * (21/100);
        },
        total() {
            return (this.value) + (this.value  * (21/100));
        }
    }
}
</script>