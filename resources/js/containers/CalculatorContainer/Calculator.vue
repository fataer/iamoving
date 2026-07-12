<template>
    <section>


        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <center>Comprando con agencias</center>
                    <!--<center>De un 3% a 6% a más, de comisiones ocultas dentro del precio que tú suele pagar.</center>-->
                </div>   
                <div class="d-flex justify-content-between" >
                    <span  style="color:#000000;float:left;padding: 0 0.50rem;margin-bottom: 10px;">Precio </span>
                    <span v-text="formatCurrency(preciofinal)"></span>
                </div>              
                <!--<div class="d-flex justify-content-between" >
                    <span  style="color:#000000;float:left;padding: 0 0.50rem;margin-bottom: 10px;">Visitar miles de inmuebles</span>
                    <span style="color:#000000;float:right;padding: 0 0.50rem;margin-bottom: 10px;">Si</span> 
                </div>              
                <div class="d-flex justify-content-between" >
                    <span  style="color:#000000;float:left;padding: 0 0.50rem;margin-bottom: 10px;">Visitas frustradas </span>
                    <span style="color:#000000;float:right;padding: 0 0.50rem;margin-bottom: 10px;">Si</span> 
                </div>          -->
                <div class="form-group">
                    
                    <!--<center>De un 3% a 6% a más, de comisiones ocultas dentro del precio que tú suele pagar.</center>-->
                </div>  
                <div class="form-group">
                    <!--<label width="50%">Precio del anuncio:</label>-->
                    <money :value="defaultValue" type="hidden" v-bind="options" @input="change" class="form-control" width="50px" readonly ></money>
                </div>
                <!--<center>Porcentaje de las agencias</center>-->
                <!--<div class="form-group">-->
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
               <!-- <p>Comisión que paga la propiedad a la agencia: <b><span v-text="formatCurrency(output)"></span> +iva</b></p>
                <p>¡Que son las comisiones ocultas que tú suele pagar dentro del precio!</p>-->
                <div class="d-flex justify-content-between" >
                    <span  style="color:#000000;float:left;padding: 0 0.50rem;margin-bottom: 10px;">Honorarios</span>
                    <!--<span style="color:#000000;float:right;padding: 0 0.50rem;margin-bottom: 10px;">SI</span> -->
                    <span v-text="formatCurrency(output)"></span>
                </div>              
                <div class="d-flex justify-content-between" >
                    <span  style="color:#000000;float:left;padding: 0 0.50rem;margin-bottom: 10px;">IVA 21%</span>
                    <!--<span style="color:#000000;float:right;padding: 0 0.50rem;margin-bottom: 10px;">SI</span> -->
                    <span v-text="formatCurrency(iva)"></span>
                </div>  
                <div class="d-flex justify-content-between" >
                    <span  style="color:#000000;float:left;padding: 0 0.50rem;margin-bottom: 10px;">Total</span>
                    <span v-text="formatCurrency(total)"></span>
                </div> 
            <div class="text-center my-3">
                <label><center><h3><b>Que tú pagas dentro del precio.</b></h3></center></label>
                    
                </div>                
            </div>

        </div>
         
        <div class="iamoving-theme">
            <div class="text-center my-3">
                <span  style="color:#FFFFFF;padding: 0 0.50rem;margin-bottom: 10px;">COMPRANDO CON IAMOVING</span>
                
            </div>
            <div class="d-flex justify-content-between" >
                <span  style="color:#FFFFFF;float:left;padding: 0 0.50rem;margin-bottom: 10px;">Precio sin comisión</span>
                <span v-text="formatCurrency(value)"></span>
            </div>                                                  
            <!--<div class="d-flex justify-content-between" >
                <span  style="color:#FFFFFF;float:left;padding: 0 0.50rem;margin-bottom: 10px;">Primera visita online</span>
                <span style="color:#FFFFFF;float:right;padding: 0 0.50rem;margin-bottom: 10px;">Si</span> 
            </div>  -->
         <!--  <div class="d-flex justify-content-between" >
                <span  style="color:#FFFFFF;float:left;padding: 0 0.50rem;margin-bottom: 10px;">Visitas frustradas</span>
                <span style="color:#FFFFFF;float:right;padding: 0 0.50rem;margin-bottom: 10px;">No</span> 
            </div>-->
                                                    <div class="d-flex justify-content-between" >
                                                                <span  style="color:#FFFFFF;float:left;padding: 0 0.50rem;margin-bottom: 10px;"><a href="/servicio/2"  class="font-weight-bold" style="color: #EADD03;"  target="blank">Servicios incluidos</a></span>
                                                                <span style="color:#FFFFFF;float:right;padding: 0 0.50rem;margin-bottom: 10px;">Si</span> 
                                                            </div>              
                                                                                                        
                                                   <!-- <div class="d-flex justify-content-between" >
                                                                <span  style="color:#FFFFFF;float:left;padding: 0 0.50rem;margin-bottom: 10px;"><a href="/servicio/6"  class="font-weight-bold" style="color: #EADD03;"  target="blank">Descuentos especiales</a></span>
                                                                <span style="color:#FFFFFF;float:right;padding: 0 0.50rem;margin-bottom: 10px;">Si</span> 
                                                            </div>                                                 -->
            <div class="d-flex justify-content-between" >
                <span  style="color:#FFFFFF;float:left;padding: 0 0.50rem;margin-bottom: 10px;">Tarifa única de servicio</span>
                <!--<span v-text="formatCurrency(2450)"><small>+iva</small></span>-->
               <!-- <span style="color:#FFFFFF;float:right;padding: 0 0.10rem;margin-bottom: 10px;">{{formatCurrency(3000)}}<small>+iva</small></span>-->
                <span style="color:#FFFFFF;float:right;padding: 0 0.10rem;margin-bottom: 10px;">{{formatCurrency(3000)}} (IVA INCLUIDO)</span>
            </div>                          
           <!-- <div class="text-center my-3">
                <span  style="color:#FFFFFF;padding: 0 0.50rem;margin-bottom: 10px;">Sin comisiones ocultas, haciéndote pagar por el precio justo</span>
            </div>
            <div class="text-center my-3">
                <span  style="color:#FFFFFF;padding: 0 0.50rem;margin-bottom: 10px;">Ahorrando tiempo y dinero</span>
            </div>            -->
        </div>
    </section>
</template>

<script>
import { Money } from 'v-money';
import { options, format } from "./utils";

export default {
    components: {
        Money
    },
    props: {
        defaultValue: Number,
        iva: {
            type: Number,
            default: 0.21
        }
    },
    data() {
        return {
            options,
            value: 0,
            commission: 4,
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
            return ((this.commission / 100) * this.value);
        },
        rate() {
            let rate = 2450; 
            /*if (this.value < 500000) 
            {
                rate = 2850;
            }
            else if (this.value < 1000000 && this.value > 500000) {
                rate = 4850;
            }*/

            return rate;
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