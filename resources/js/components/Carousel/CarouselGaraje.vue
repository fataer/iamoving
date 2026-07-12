<template>
    <div ref="carousel" id="carouselControlsGaraje" class="carousel slide" data-ride="carousel" data-interval="false">
        <div class="carousel-inner">
            <div v-for="(image, index) in images" :key="index" 
                    class="carousel-item" 
                    :class="{ 
                        active: index == 0
                    }">

                <img :src="getURL(image.fotos_detalle)" :alt="index" class="d-block w-100" />
            </div>
        </div>
        <a v-show="images.length > 1" class="carousel-control-prev" href="#carouselControlsGaraje" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a v-show="images.length > 1" class="carousel-control-next" href="#carouselControlsGaraje" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</template>

<script>
export default {
    props: {
        multimedia: {
            type: Array,
            required: true
        },
        reference: String
    },
    computed: {
        images() {
            return this.multimedia.filter(item => item.fotos_detalle);
        }
    },
    methods: {
        getURL(filename) {
            return `/storage/inmueble/${this.reference}/${filename}`;
        }
    },
    watch: {
        multimedia(value) {
            $(this.$refs.carousel).carousel(0);
        }
    }
}
</script>

<style>

</style>
