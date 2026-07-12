<template>
    <div class="card card-image2 text-white" :style="bgImage()" @click="$emit('click')">
        <div class="card-img-overlay d-flex text-center align-items-center">
            <h5 class="card-title" v-text="title"  style="text-align:center;width:100%"></h5>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        image: String,
        title: String
    },
    methods: {
        bgImage() {
            let bg = 'background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5))';

            if (this.image) {
                bg += `, url('${this.image}')`;
            }

            return bg;
        }
    }
}
</script>

<style lang="scss">
.card-image {
  height: 150px; 
  width: 300px;
  margin: 0 .5rem;
  background-size: cover;
  background-position: center;
  transition: all .5;
  &:hover {
    border: 3px solid var(--primary);
    cursor: pointer
  }
}
.card-image2 {
  height: 55px; 
  width: 160px;
  margin: 0 .5rem;
  background-size: cover;
  background-position: center;
  background-color: white;
  transition: all .5;
  &:hover {
    border: 3px solid var(--primary);
    cursor: pointer
  }
}
</style>
