<template>
    <div>
        <!-- Carrusel -->
        <div ref="carousel" id="carouselControls" class="carousel slide" data-ride="carousel" data-interval="false" data-touch="true">
            <div class="carousel-inner">
                <div v-for="(image, imgIndex) in images" :key="imgIndex" 
                        class="carousel-item" 
                        :class="{ active: imgIndex == 0 }">
                    
                    <div class="image-container" @click.stop="openLightbox(imgIndex)">
                        <img :src="getURL(image.img)" :alt="imgIndex" class="d-block w-100" />
                        <!-- Overlay de "Ampliar" - SOLO visible en escritorio -->
                        <div class="zoom-overlay desktop-only">
                            <span>Ampliar</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Controles con color amarillo #e3db20 -->
            <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <!-- Lightbox personalizado (no usa Bootstrap Modal) -->
        <div class="custom-lightbox" v-if="lightboxVisible" @click.self="closeLightbox">
            <div class="custom-lightbox-content" @click.stop>
                <button class="custom-lightbox-close" @click.stop="closeLightbox">
                    &times;
                </button>
                <img :src="lightboxImageUrl" class="custom-lightbox-img" alt="Imagen ampliada" />
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            totalPic: 0,
            current: 0,
            activeCard: null,
            lightboxImageUrl: '',
            lightboxVisible: false,
            isMobile: false,
            currentImageIndex: 0
        }
    },
    props: {
        multimedia: {
            type: Array,
            required: true
        },
        position: Number,
        reference: String
    },
    created() {
        this.activeCard = this.multimedia[0].card;
        this.isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
    },
    mounted() {
        let refCarousel = this.$refs.carousel;
        let vm = this;
       
        $(refCarousel).on('slid.bs.carousel', function (e) {
            let slide = $(refCarousel).find('.active').index();
            if (vm.activeCard !== vm.multimedia[slide].card) {
                vm.activeCard = vm.multimedia[slide].card;
                vm.$parent.setTitle(vm.multimedia[slide].card);
            }
        });
        
        document.addEventListener('keyup', this.handleEscapeKey);
    },
    computed: {
        images() {
            return this.multimedia;
        }
    },
    methods: {
        getURL(filename) {
            return `/storage/inmueble/${this.reference}/${filename}`;
        },
        
        handleEscapeKey(e) {
            if (e.key === 'Escape' && this.lightboxVisible) {
                this.closeLightbox();
            }
        },
        
        openLightbox(imgIndex) {
            this.currentImageIndex = imgIndex;
            this.lightboxImageUrl = this.getURL(this.images[imgIndex].img);
            this.lightboxVisible = true;
            document.body.style.overflow = 'hidden';
        },
        
        closeLightbox() {
            this.lightboxVisible = false;
            this.lightboxImageUrl = '';
            document.body.style.overflow = '';
        },
        
        setSlide(idx) {
            $(this.$refs.carousel).carousel(idx);
        }
    },
    watch: {
        multimedia(value) {
            if (value && value.length > 0) {
                $(this.$refs.carousel).carousel(0);
            }
        }
    },
    beforeDestroy() {
        document.removeEventListener('keyup', this.handleEscapeKey);
        document.body.style.overflow = '';
    }
}
</script>

<style scoped>
.image-container {
    position: relative;
    cursor: pointer;
    background-color: #000;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.image-container img {
    width: 100%;
    display: block;
    transition: transform 0.3s ease;
}

/* Efecto hover en escritorio */
@media (min-width: 768px) {
    .image-container:hover img {
        transform: scale(1.05);
    }
    
    .image-container:hover .zoom-overlay {
        opacity: 1;
    }
}

/* Overlay con texto "Ampliar" - Estilo actualizado */
.zoom-overlay {
    position: absolute;
    bottom: 20px;
    right: 20px;
    top: auto;
    left: auto;
    background-color: #2d2e35;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
    padding: 8px 16px;
    border-radius: 25px;
    pointer-events: none;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
}

/* Ocultar completamente en móvil/tablet */
@media (max-width: 767px) {
    .zoom-overlay {
        display: none !important;
    }
}

.zoom-overlay span {
    font-size: 14px;
    font-weight: bold;
    color: #e3db20;
    letter-spacing: 0.5px;
}

/* Controles del carrusel - Color amarillo #e3db20 intenso */
.carousel-control-prev,
.carousel-control-next {
    opacity: 1;
    width: 8%;
    z-index: 10;
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
    background-color: transparent !important;
    border-radius: 0 !important;
    padding: 0;
    background-size: 100%;
    filter: brightness(0) saturate(100%) invert(86%) sepia(34%) saturate(749%) hue-rotate(3deg) brightness(94%) contrast(94%);
    transition: all 0.3s ease;
}

.carousel-control-prev-icon:hover,
.carousel-control-next-icon:hover {
    opacity: 1;
    filter: brightness(0) saturate(100%) invert(86%) sepia(34%) saturate(749%) hue-rotate(3deg) brightness(94%) contrast(94%);
    transform: scale(1.1);
}

/* Ajuste específico para el color amarillo #e3db20 */
.carousel-control-prev-icon {
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23e3db20' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5L4.25 4l2.5-2.5L5.25 0z'/%3E%3C/svg%3E") !important;
}

.carousel-control-next-icon {
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23e3db20' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5L3.75 4l-2.5 2.5L2.75 8l4-4-4-4z'/%3E%3C/svg%3E") !important;
}

/* Lightbox personalizado */
.custom-lightbox {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.95);
    z-index: 999999 !important;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
}

.custom-lightbox-content {
    position: relative;
    max-width: 95vw;
    max-height: 95vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Botón de cerrar con círculo AMARILLO */
.custom-lightbox-close {
    position: absolute;
    top: -50px;
    right: -50px;
    width: 45px;
    height: 45px;
    border-radius: 50%;
    background-color: rgba(0, 0, 0, 0.7);
    border: 2px solid #e3db20;
    color: #e3db20;
    font-size: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    z-index: 1000000;
}

.custom-lightbox-close:hover {
    background-color: #e3db20;
    color: #000;
    transform: scale(1.1);
    border-color: #e3db20;
}

.custom-lightbox-img {
    max-width: 95vw;
    max-height: 95vh;
    width: auto;
    height: auto;
    object-fit: contain;
    cursor: default;
    box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
}

/* Ajustes para móvil */
@media (max-width: 767px) {
    .custom-lightbox-close {
        top: 10px;
        right: 10px;
        width: 40px;
        height: 40px;
        font-size: 28px;
        background-color: rgba(0, 0, 0, 0.8);
        border: 2px solid #e3db20;
    }
    
    .custom-lightbox-img {
        max-width: 100vw;
        max-height: 100vh;
    }
    
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        width: 30px;
        height: 30px;
    }
}
</style>