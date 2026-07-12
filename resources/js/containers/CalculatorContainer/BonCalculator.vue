<template>
    <div class="iamoving-theme">
        <div class="card-body">
            <div class="text-center my-3">
                <label style="color:#FFFFFF;">Precio de su inmueble :</label>
                <money :value="defaultValue" style="color:#000000;" v-bind="options" @input="change" class="form-control"></money>
            </div>
           <!-- <div class="text-center my-3">
                <label><center>Vendiendo con agencias tradicionales</center></label>
                <input type="range" class="custom-range" min="3" max="6" v-model.number="commission">
                <div class="indicators">
                    <div>3%</div>
                    <div>4%</div>
                    <div>5%</div>
                    <div>6%</div>
                </div>

            </div>                                                 -->
            <div class="d-flex justify-content-between" >
                <span  style="color:#FFFFFF;float:left;padding: 0 0.50rem;margin-bottom: 10px;">Ganarás con IAMOVING </span>
                <span style="color:#FFFFFF;float:right;padding: 0 0.50rem;margin-bottom: 10px;">{{formatCurrency(output)}}</span>
                <!--<span v-text="formatCurrency(total)"></span>-->
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
            value: 0,
            commission: 40
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