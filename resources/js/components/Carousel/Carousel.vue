<template>
    <div>
        <!-- Carrusel -->
        <!-- data-touch="false": el swipe lo gestionamos nosotros (ver onCarouselTouch*),
             así evitamos dobles saltos y no dependemos del touch-action de Bootstrap -->
        <div ref="carousel" id="carouselControls" class="carousel slide allow-pinch" data-ride="carousel" data-interval="false" data-touch="false">
            <div class="carousel-inner"
                 @touchstart.passive="onCarouselTouchStart"
                 @touchmove.passive="onCarouselTouchMove"
                 @touchend.passive="onCarouselTouchEnd"
                 @touchcancel.passive="onCarouselTouchCancel">
                <div v-for="(image, imgIndex) in images" :key="imgIndex"
                        class="carousel-item"
                        :class="{ active: imgIndex == 0 }">

                    <div class="image-container" @click.stop="openLightbox(imgIndex)">
                        <img :src="getURL(image.img)" :alt="imgIndex" class="d-block w-100" draggable="false" />
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

                <!-- Zona de gestos: aquí gestionamos nosotros el pinch-to-zoom y el swipe -->
                <div class="zoom-viewport"
                     ref="zoomViewport"
                     @touchstart="onTouchStart"
                     @touchmove="onTouchMove"
                     @touchend="onTouchEnd"
                     @touchcancel="onTouchEnd"
                     @dblclick.stop="toggleZoom">
                    <img :src="lightboxImageUrl"
                         ref="zoomImg"
                         class="custom-lightbox-img"
                         :style="imgStyle"
                         alt="Imagen ampliada"
                         draggable="false" />
                </div>

                <!-- Ayuda visual solo en móvil y solo mientras no se ha hecho zoom -->
                <div class="zoom-hint" v-if="scale === 1">
                    Pellizca para ampliar<span v-if="images.length > 1"> · Desliza para cambiar</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
const MIN_SCALE = 1;
const MAX_SCALE = 5;

// Swipe
const SWIPE_MIN_DISTANCE = 50;   // px mínimos en horizontal para considerarlo swipe
const SWIPE_DIRECTION_RATIO = 1.2; // el movimiento horizontal debe dominar sobre el vertical
const CLICK_AFTER_SWIPE_MS = 400; // ignora el "click" que algunos navegadores lanzan tras un swipe

export default {
    data() {
        return {
            totalPic: 0,
            current: 0,
            activeCard: null,
            lightboxImageUrl: '',
            lightboxVisible: false,
            isMobile: false,
            currentImageIndex: 0,

            // Estado del zoom
            scale: 1,
            translateX: 0,
            translateY: 0,
            isGesturing: false,

            // Valores de referencia al empezar el gesto
            startDistance: 0,
            startScale: 1,
            startMidX: 0,
            startMidY: 0,
            startX: 0,
            startY: 0,
            startTranslateX: 0,
            startTranslateY: 0,

            // Swipe
            carouselSwipe: null,   // { x, y } inicio del swipe en el carrusel
            lightboxSwipe: null,   // { x, y } inicio del swipe en el lightbox
            lastSwipeAt: 0
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

        // Safari iOS: evita que el gesto de pinza haga zoom de TODA la página
        // cuando el lightbox está abierto (dentro del lightbox mandamos nosotros).
        document.addEventListener('gesturestart', this.blockPageGesture, { passive: false });
        document.addEventListener('gesturechange', this.blockPageGesture, { passive: false });
    },
    computed: {
        images() {
            return this.multimedia;
        },
        imgStyle() {
            return {
                transform: `translate3d(${this.translateX}px, ${this.translateY}px, 0) scale(${this.scale})`,
                transition: this.isGesturing ? 'none' : 'transform 0.2s ease-out'
            };
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

        blockPageGesture(e) {
            if (this.lightboxVisible) {
                e.preventDefault();
            }
        },

        openLightbox(imgIndex) {
            // Si acabamos de hacer swipe, no abrimos el lightbox por accidente
            if (Date.now() - this.lastSwipeAt < CLICK_AFTER_SWIPE_MS) return;

            this.currentImageIndex = imgIndex;
            this.lightboxImageUrl = this.getURL(this.images[imgIndex].img);
            this.lightboxVisible = true;
            this.resetZoom();
            document.body.style.overflow = 'hidden';
        },

        closeLightbox() {
            this.lightboxVisible = false;
            this.lightboxImageUrl = '';
            this.lightboxSwipe = null;
            this.resetZoom();
            document.body.style.overflow = '';
        },

        setSlide(idx) {
            $(this.$refs.carousel).carousel(idx);
        },

        /* ---------- Swipe (común) ---------- */

        // Devuelve 'left', 'right' o null según el desplazamiento entre inicio y fin
        getSwipeDirection(start, endX, endY) {
            const dx = endX - start.x;
            const dy = endY - start.y;
            if (Math.abs(dx) < SWIPE_MIN_DISTANCE) return null;
            if (Math.abs(dx) < Math.abs(dy) * SWIPE_DIRECTION_RATIO) return null;
            return dx < 0 ? 'left' : 'right';
        },

        /* ---------- Swipe en el carrusel ---------- */

        onCarouselTouchStart(e) {
            // Solo un dedo; con dos es un pellizco y no lo tocamos
            if (e.touches.length !== 1 || this.images.length < 2) {
                this.carouselSwipe = null;
                return;
            }
            this.carouselSwipe = { x: e.touches[0].clientX, y: e.touches[0].clientY };
        },

        onCarouselTouchMove(e) {
            if (e.touches.length > 1) this.carouselSwipe = null;
        },

        onCarouselTouchEnd(e) {
            if (!this.carouselSwipe) return;
            const t = e.changedTouches[0];
            const dir = this.getSwipeDirection(this.carouselSwipe, t.clientX, t.clientY);
            this.carouselSwipe = null;

            if (dir) {
                this.lastSwipeAt = Date.now();
                $(this.$refs.carousel).carousel(dir === 'left' ? 'next' : 'prev');
            }
        },

        onCarouselTouchCancel() {
            this.carouselSwipe = null;
        },

        /* ---------- Navegación en el lightbox ---------- */

        showImage(index) {
            const n = this.images.length;
            if (n === 0) return;
            const idx = (index + n) % n;
            this.currentImageIndex = idx;
            this.lightboxImageUrl = this.getURL(this.images[idx].img);
            this.resetZoom();
            // Mantiene el carrusel (y el título) sincronizado con el lightbox
            this.setSlide(idx);
        },

        nextImage() {
            this.showImage(this.currentImageIndex + 1);
        },

        prevImage() {
            this.showImage(this.currentImageIndex - 1);
        },

        /* ---------- Pinch to zoom + swipe en el lightbox ---------- */

        resetZoom() {
            this.scale = MIN_SCALE;
            this.translateX = 0;
            this.translateY = 0;
            this.isGesturing = false;
        },

        touchDistance(touches) {
            const dx = touches[0].clientX - touches[1].clientX;
            const dy = touches[0].clientY - touches[1].clientY;
            return Math.sqrt(dx * dx + dy * dy);
        },

        onTouchStart(e) {
            if (e.touches.length === 2) {
                e.preventDefault();
                this.lightboxSwipe = null; // un pellizco nunca es swipe
                this.isGesturing = true;
                this.startDistance = this.touchDistance(e.touches);
                this.startScale = this.scale;
                this.startMidX = (e.touches[0].clientX + e.touches[1].clientX) / 2;
                this.startMidY = (e.touches[0].clientY + e.touches[1].clientY) / 2;
                this.startTranslateX = this.translateX;
                this.startTranslateY = this.translateY;
            } else if (e.touches.length === 1 && this.scale > MIN_SCALE) {
                // Arrastrar la imagen ya ampliada (sin swipe)
                this.lightboxSwipe = null;
                this.isGesturing = true;
                this.startX = e.touches[0].clientX;
                this.startY = e.touches[0].clientY;
                this.startTranslateX = this.translateX;
                this.startTranslateY = this.translateY;
            } else if (e.touches.length === 1 && this.images.length > 1) {
                // Imagen sin zoom: posible swipe para cambiar de foto
                this.lightboxSwipe = { x: e.touches[0].clientX, y: e.touches[0].clientY };
            }
        },

        onTouchMove(e) {
            if (e.touches.length === 2 && this.startDistance > 0) {
                e.preventDefault();
                const dist = this.touchDistance(e.touches);
                const raw = this.startScale * (dist / this.startDistance);
                this.scale = Math.min(MAX_SCALE, Math.max(MIN_SCALE, raw));

                // Mantiene el centro de la pinza más o menos anclado
                const midX = (e.touches[0].clientX + e.touches[1].clientX) / 2;
                const midY = (e.touches[0].clientY + e.touches[1].clientY) / 2;
                this.translateX = this.startTranslateX + (midX - this.startMidX);
                this.translateY = this.startTranslateY + (midY - this.startMidY);
                this.clampTranslate();
            } else if (e.touches.length === 1 && this.scale > MIN_SCALE && this.isGesturing) {
                e.preventDefault();
                this.translateX = this.startTranslateX + (e.touches[0].clientX - this.startX);
                this.translateY = this.startTranslateY + (e.touches[0].clientY - this.startY);
                this.clampTranslate();
            } else if (e.touches.length === 1 && this.lightboxSwipe && this.scale === MIN_SCALE) {
                // Feedback visual: la foto sigue al dedo en horizontal mientras deslizas
                e.preventDefault();
                this.isGesturing = true;
                this.translateX = e.touches[0].clientX - this.lightboxSwipe.x;
            }
        },

        onTouchEnd(e) {
            if (e.touches.length === 0) {
                // ¿Ha sido un swipe con la imagen sin zoom?
                let swipeDir = null;
                if (this.lightboxSwipe && this.scale === MIN_SCALE && e.changedTouches.length) {
                    const t = e.changedTouches[0];
                    swipeDir = e.type === 'touchcancel'
                        ? null
                        : this.getSwipeDirection(this.lightboxSwipe, t.clientX, t.clientY);
                }
                this.lightboxSwipe = null;

                this.isGesturing = false;
                this.startDistance = 0;

                if (this.scale <= MIN_SCALE + 0.02) {
                    this.resetZoom(); // si no hubo swipe, la foto vuelve a su sitio
                } else {
                    this.clampTranslate();
                }

                if (swipeDir === 'left') {
                    this.nextImage();
                } else if (swipeDir === 'right') {
                    this.prevImage();
                }
            } else if (e.touches.length === 1) {
                // Se ha levantado un dedo: seguimos arrastrando con el que queda
                this.startX = e.touches[0].clientX;
                this.startY = e.touches[0].clientY;
                this.startTranslateX = this.translateX;
                this.startTranslateY = this.translateY;
                this.startDistance = 0;
            }
        },

        // Impide arrastrar la imagen fuera de la pantalla
        clampTranslate() {
            const img = this.$refs.zoomImg;
            if (!img) return;

            const scaledW = img.clientWidth * this.scale;
            const scaledH = img.clientHeight * this.scale;
            const maxX = Math.max(0, (scaledW - window.innerWidth) / 2);
            const maxY = Math.max(0, (scaledH - window.innerHeight) / 2);

            this.translateX = Math.min(maxX, Math.max(-maxX, this.translateX));
            this.translateY = Math.min(maxY, Math.max(-maxY, this.translateY));
        },

        // Doble clic / doble toque: ampliar o volver al tamaño original
        toggleZoom() {
            if (this.scale > MIN_SCALE) {
                this.resetZoom();
            } else {
                this.scale = 2.5;
                this.translateX = 0;
                this.translateY = 0;
            }
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
        document.removeEventListener('gesturestart', this.blockPageGesture);
        document.removeEventListener('gesturechange', this.blockPageGesture);
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
    -webkit-user-drag: none;
}

/*
 * GESTOS TÁCTILES EN EL CARRUSEL
 * - pan-y:      el navegador sigue haciendo scroll vertical de la página.
 * - pinch-zoom: se mantiene el pellizco para hacer zoom.
 * - El desplazamiento horizontal queda libre para NUESTRO swipe
 *   (onCarouselTouch*), sin que el navegador lo cancele.
 */
#carouselControls,
#carouselControls.pointer-event,
#carouselControls .carousel-inner,
#carouselControls .carousel-item,
.image-container,
.image-container img {
    touch-action: pan-y pinch-zoom !important;
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
    overscroll-behavior: contain;
}

.custom-lightbox-content {
    position: relative;
    max-width: 95vw;
    max-height: 95vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Zona donde capturamos los gestos.
   touch-action: none => el navegador no interfiere, controlamos nosotros. */
.zoom-viewport {
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    touch-action: none;
    -webkit-user-select: none;
    user-select: none;
    -webkit-touch-callout: none;
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
    transform-origin: center center;
    will-change: transform;
}

.zoom-hint {
    display: none;
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

    .zoom-hint {
        display: block;
        position: fixed;
        bottom: 24px;
        left: 50%;
        transform: translateX(-50%);
        padding: 6px 14px;
        border-radius: 20px;
        background-color: rgba(0, 0, 0, 0.7);
        color: #e3db20;
        font-size: 13px;
        white-space: nowrap;
        pointer-events: none;
        z-index: 1000000;
    }
}
</style>