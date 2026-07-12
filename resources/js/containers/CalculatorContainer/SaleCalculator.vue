<template>
    <div class="card">
        <div class="card-body">
            <div class="text-center my-3">
                <label>Precio del inmueble de tu interés:</label>
                <money :value="defaultValue" v-bind="options" @input="change" class="form-control"></money>
            </div>
             <div class="text-center my-3">
                <span  style="color:#000000;padding: 0 0.50rem;margin-bottom: 10px;">Comprando con agencia</span>
            </div>
            <div class="d-flex justify-content-between" >
                <span  style="color:#000000;float:left;padding: 0 0.50rem;margin-bottom: 10px;">Precio </span>
                <span style="color:#000000;float:right;padding: 0 0.50rem;margin-bottom: 10px;">{{formatCurrency(preciofinal)}}</span>
                <!--<span v-text="formatCurrency(preciofinal)"></span>-->
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
            <div class="text-center my-3">
                <label><center>Comisión que paga la propiedad a la agencia</center></label>
                <input type="range" class="custom-range" min="3" max="6" v-model.number="commission">
                <div class="indicators">
                    <div>3%</div>
                    <div>4%</div>
                    <div>5%</div>
                    <div>6%</div>
                </div>
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
            </div> 
            <div class="text-center my-3">
                <label><center><h3><b>Que tú pagas dentro del precio.</b></h3></center></label>
            </div>
        </div>
        <div class="iamoving-theme">
            <div class="text-center my-3">
                <span  style="color:#FFFFFF;padding: 0 0.50rem;margin-bottom: 10px;">COMPRANDO CON IAMOVING</span>
                
            </div>
            <div class="d-flex justify-content-between" >
                <span  style="color:#FFFFFF;float:left;padding: 0 0.20rem;margin-bottom: 10px;">Precio sin comisión</span>
                <span style="color:#FFFFFF;float:right;padding: 0 0.10rem;margin-bottom: 10px;">{{formatCurrency(value)}}</span>
                <!--<span v-text="formatCurrency(value)"></span>-->
            </div>                                                  
            <div class="d-flex justify-content-between" >
                <span  style="color:#FFFFFF;float:left;padding: 0 0.20rem;margin-bottom: 10px;">Primera visita online</span>
                <span style="color:#FFFFFF;float:right;padding: 0 0.10rem;margin-bottom: 10px;">Si</span> 
            </div>  
            <div class="d-flex justify-content-between" >
                <span  style="color:#FFFFFF;float:left;padding: 0 0.20rem;margin-bottom: 10px;">Informe detallado del inmueble</span>
                <span style="color:#FFFFFF;float:right;padding: 0 0.10rem;margin-bottom: 10px;">Si</span> 
            </div>             
           <!-- <div class="d-flex justify-content-between" >
                <span  style="color:#FFFFFF;float:left;padding: 0 0.20rem;margin-bottom: 10px;">Visitas frustradas</span>
                <span style="color:#FFFFFF;float:right;padding: 0 0.10rem;margin-bottom: 10px;">No</span> 
            </div>-->
                                                    <div class="d-flex justify-content-between" >
                                                                <span  style="color:#FFFFFF;float:left;padding: 0 0.20rem;margin-bottom: 10px;"><a href="/servicio/2"  class="font-weight-bold" style="color: #EADD03;"  target="blank">Servicios incluidos</a></span>
                                                                <span style="color:#FFFFFF;float:right;padding: 0 0.10rem;margin-bottom: 10px;">Si</span> 
                                                            </div>              
                                                                                                        
                                                    <div class="d-flex justify-content-between" >
                                                                <span  style="color:#FFFFFF;float:left;padding: 0 0.20rem;margin-bottom: 10px;"><a href="/servicio/6"  class="font-weight-bold" style="color: #EADD03;"  target="blank">Descuentos especiales</a></span>
                                                                <span style="color:#FFFFFF;float:right;padding: 0 0.10rem;margin-bottom: 10px;">Si</span> 
                                                            </div>                                                 
            <div class="d-flex justify-content-between" >
                <span  style="color:#FFFFFF;float:left;padding: 0 0.20rem;margin-bottom: 10px;">Tarifa única servicios</span>
                <!--<span v-text="formatCurrency(2450)"><small>+iva</small></span>-->
                <span style="color:#FFFFFF;float:right;padding: 0 0.10rem;margin-bottom: 10px;">{{formatCurrency(2450)}}<small>+iva</small></span>
                
            </div>                          
            <div class="text-center my-3">
                <span  style="color:#FFFFFF;padding: 0 0.50rem;margin-bottom: 10px;">Sin comisiones ocultas</span>
            </div>
            <div class="text-center my-3">
                <span  style="color:#FFFFFF;padding: 0 0.50rem;margin-bottom: 10px;">Haciéndote pagar por el precio justo</span>
            </div>            
        
            <!--<div class="text-center my-3">
                <span  style="color:#FFFFFF;padding: 0 0.50rem;margin-bottom: 10px;">Ahorrando tiempo y dinero</span>
            </div>        -->
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
        },
         preciofinal() {
            return (this.value) + (this.value * (this.commission / 100)) + (this.value * (this.commission / 100) * (21/100));
        }
    }
}
</script>