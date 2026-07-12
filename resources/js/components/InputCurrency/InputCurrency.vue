<template>
  <money v-model="price" v-bind="options"></money>
</template>

<script>
import { Money } from 'v-money';
import options from './options';

export default {
  components: { Money },
  props: {
    value: [String, Number],
    decimals: Number
  },
  data () {
    return {
      options,
      price: 0,
    }
  },
  mounted() {
    if (this.decimals != undefined) {
      this.options.precision = this.decimals;
    }
    if (this.value) {
      this.price = parseFloat(this.value)
    }
  },
  watch: {
    price(value) {
      this.$emit('input', value);
    }
  }
}
</script>