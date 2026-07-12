<template>

    <div class="card">
        <!-- IFRAME YOUTBE -->
        <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" :src="source" 
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen></iframe>
        </div>

        <a :href="href" class="card-body" v-if="body">
            <h3 class="card-title font-italic" v-text="body.nombre" @click="toggle"></h3>
            <p class="card-text" 
                v-show="!onlyTitle"
                v-html="body.descripcion"></p>
        </a> 
    </div>
</template>

<script>
    export default {
        props: {
            source: {
                type: String,
                required: true
            },
            type: {
                type: String,
                default: 'video/mp4'
            },
            href: {
                type: String,
                default: 'javascript:void(0)'
            },
            body: Object,
            onlyTitle: Boolean
        },
        methods: {
            toggle() {
                if (this.onlyTitle != undefined && this.href == 'javascript:void(0)') {
                    this.onlyTitle = !this.onlyTitle;
                }
            }
        }
    }
</script>

<style lang="scss" scoped>
.card {
    // transition: all .5s ease-in-out;
    overflow: hidden;
    border: none;
    .card-title {
        font-size: 14px;
        margin-bottom: .15rem;
    }
    .card-text {
        font-size: 11px;
        color: rgba(0, 0, 0, .5);
    }
    .card-body {
        padding: 1rem;
        text-decoration: none;
    }
    &:hover {
        box-shadow: 0 .125rem .25rem rgba(0,0,0,.075) !important;
    }
}
</style>
