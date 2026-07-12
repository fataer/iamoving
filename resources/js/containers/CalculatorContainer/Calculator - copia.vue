<template>
    <section>
        <div class="iamoving-theme pt-0">
            Con las agencias, tu casi siempre pagarás de un 3% a 6% a más del precio real que vale el inmueble.
        </div>
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label>Precios del anuncio:</label>
                    <money :value="defaultValue" v-bind="options" @input="change" class="form-control" readonly></money>
                </div>
                <div class="form-group">
                    <input type="range" class="custom-range" min="3" max="6" v-model.number="commission">
                    <div class="indicators">
                        <div>3%</div>
                        <div>4%</div>
                        <div>5%</div>
                        <div>6%</div>
                    </div>
                </div>
                Agencias: <b><span v-text="formatCurrency(output)"></span> + IVA</b>
                <p>De comisiones ocultas que tú pagas dentro del precio.</p>
            </div>
        </div>
        <div class="iamoving-theme pb-0">
            <b class="text-warning">Iamoving: <span v-text="formatCurrency(rate)"></span> + IVA</b>
            <p>¡Sin comisiones ocultas, sabiendo lo que pagas!</p>
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
            commission: 3,
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
        }

    }
}
</script>