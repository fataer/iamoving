<div class="section-title text-center my-4">
    <h3 class="font-weight-bold subtitle_feature_yellow">EXPERIENCIAS CON IAMOVING</h3>
</div>

<div class="row justify-content-center my-0">		
    <div class="container-fluid" data-aos="fade" data-aos-delay="500">
        <div class="swiper-container images-carousel-mobile d-block d-md-none">
            <div class="swiper-wrapper">
                @php
                    $testimonios = [
                        '991.jpeg','992.jpeg','993.jpeg','994.jpeg','995.jpeg','996.jpeg','997.jpeg','998.jpeg','999.jpeg','1000.jpeg','1001.jpeg', '1002.jpeg', '1003.jpeg', '1004.jpeg', '1005.jpeg', 
                        '1006.jpeg', '1007.jpeg', '1008.jpeg', '1009.jpeg', '1010.jpeg',
                        '1011.jpeg', '1012.jpeg', '1013.jpeg', '1014.jpeg', '1015.jpeg',
                        '1016.jpeg', '1017.jpeg', '1018.jpeg', '1019.jpeg', 'opinion2.1.jpg',
                        't0.jpg', 't0.1.jpg', 't1.jpg', 't1.2.jpg', 't2.jpg',
                        't3.jpg', 't5.2.jpg', 't9.jpg', 't13.jpg', 't14.jpg', 't15.jpg'
                    ];
                @endphp
                
                @foreach($testimonios as $testimonio)
                <div class="swiper-slide">
                    <div class="mobile-slide-container">
                        <div class="card border-0 bg-white">
                            <div class="testimonial">
                                <img class="img-fluid mobile-image" 
                                     src="/storage/testimonios/{{ $testimonio }}" 
                                     alt="Testimonio IAMOVING"
                                     loading="lazy">
                            </div>
                        </div>  
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-button-next mobile-next"></div>
            <div class="swiper-button-prev mobile-prev"></div>
            <div class="swiper-pagination mobile-pagination"></div>
        </div>

        <!-- Versión escritorio - igual que móvil pero con más slides visibles -->
        <div class="swiper-container images-carousel-desktop d-none d-md-block">
            <div class="swiper-wrapper">
                @foreach($testimonios as $testimonio)
                <div class="swiper-slide">
                    <div class="card h-100 border-0">
                        <div class="testimonial h-100 d-flex align-items-center">
                            <img class="card-img-top img-fluid w-100" 
                                 src="/storage/testimonios/{{ $testimonio }}" 
                                 alt="Testimonio IAMOVING"
                                 loading="lazy">
                        </div>
                    </div>  
                </div>
                @endforeach
            </div>
            <div class="swiper-button-prev desktop-prev"></div>
            <div class="swiper-button-next desktop-next"></div>
            <!--<div class="swiper-pagination desktop-pagination"></div>-->
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let swiperMobile, swiperDesktop;
    
    // Configuración unificada para ambos carruseles
    function initMobileSwiper() {
        swiperMobile = new Swiper('.images-carousel-mobile', {
            slidesPerView: 1,
            spaceBetween: 10,
            centeredSlides: true,
            autoHeight: true,
            speed: 400,
            navigation: {
                nextEl: '.images-carousel-mobile .swiper-button-next',
                prevEl: '.images-carousel-mobile .swiper-button-prev',
            },
            pagination: {
                el: '.images-carousel-mobile .swiper-pagination',
                clickable: true,
                dynamicBullets: true
            },
            grabCursor: true,
            effect: 'slide',
            on: {
                init: function() {
                    setTimeout(() => {
                        this.updateAutoHeight();
                    }, 100);
                },
                slideChange: function() {
                    setTimeout(() => {
                        this.updateAutoHeight();
                    }, 50);
                }
            }
        });
    }
    
    function initDesktopSwiper() {
        swiperDesktop = new Swiper('.images-carousel-desktop', {
            slidesPerView: 3,
            spaceBetween: 30,
            centeredSlides: false,
            autoHeight: true, // Usar autoHeight también en escritorio
            speed: 400,
            navigation: {
                nextEl: '.images-carousel-desktop .swiper-button-next',
                prevEl: '.images-carousel-desktop .swiper-button-prev',
            },
            pagination: {
                el: '.images-carousel-desktop .swiper-pagination',
                clickable: true,
            },
            grabCursor: true,
            on: {
                init: function() {
                    setTimeout(() => {
                        this.updateAutoHeight();
                    }, 100);
                },
                slideChange: function() {
                    setTimeout(() => {
                        this.updateAutoHeight();
                    }, 50);
                }
            }
        });
    }
    
    // Inicializar ambos carruseles
    initMobileSwiper();
    initDesktopSwiper();
    
    // Manejar carga de imágenes
    const allImages = document.querySelectorAll('.testimonial img');
    allImages.forEach(img => {
        img.addEventListener('load', function() {
            if (window.innerWidth < 768 && swiperMobile) {
                setTimeout(() => {
                    swiperMobile.updateAutoHeight();
                }, 50);
            } else if (swiperDesktop) {
                setTimeout(() => {
                    swiperDesktop.updateAutoHeight();
                }, 50);
            }
        });
    });
    
    // Manejar redimensionamiento
    let resizeTimeout;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(() => {
            if (window.innerWidth < 768 && swiperMobile) {
                swiperMobile.updateAutoHeight();
            } else if (swiperDesktop) {
                swiperDesktop.updateAutoHeight();
            }
        }, 250);
    });
});
</script>

<style>
/* ESTILOS UNIFICADOS PARA TESTIMONIOS */
.images-carousel-mobile,
.images-carousel-desktop {
    width: 100%;
    padding: 20px 0;
}

.swiper-slide {
    display: flex;
    justify-content: center;
    align-items: flex-start;
}

.card {
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    border-radius: 10px;
    overflow: hidden;
    background: white;
    transition: transform 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
}

.testimonial img {
    width: 100%;
    height: auto;
    display: block;
    border-radius: 8px;
}

/* VERSIÓN MÓVIL */
.images-carousel-mobile .swiper-slide {
    padding: 0 15px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.mobile-slide-container {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.images-carousel-mobile .card {
    margin: 0 auto;
    max-width: 95%;
}

.images-carousel-mobile .testimonial img {
    width: 100%;
    height: auto;
    max-height: 80vh;
    object-fit: contain;
}

/* VERSIÓN ESCRITORIO */
.images-carousel-desktop .swiper-slide {
    padding: 0 10px;
    height: auto;
}

.images-carousel-desktop .testimonial img {
    object-fit: contain;
}

/* NAVEGACIÓN UNIFICADA */
.swiper-button-next,
.swiper-button-prev {
    color: #333;
    background: rgba(255,255,255,0.9);
    width: 40px;
    height: 40px;
    border-radius: 50%;
    box-shadow: 0 2px 10px rgba(0,0,0,0.2);
    backdrop-filter: blur(5px);
}

.swiper-button-next:after,
.swiper-button-prev:after {
    font-size: 18px;
    font-weight: bold;
}

.images-carousel-mobile .swiper-button-next {
    right: 5px;
}

.images-carousel-mobile .swiper-button-prev {
    left: 5px;
}

.images-carousel-desktop .swiper-button-next {
    right: 10px;
}

.images-carousel-desktop .swiper-button-prev {
    left: 10px;
}

/* PAGINACIÓN */
.swiper-pagination {
    position: relative;
    margin-top: 20px;
    bottom: 0;
}

.swiper-pagination-bullet {
    background: #333;
    opacity: 0.5;
    width: 8px;
    height: 8px;
}

.swiper-pagination-bullet-active {
    opacity: 1;
    background: #EADD1B; /* Amarillo de IAMOVING */
}

/* RESPONSIVE */
@media (max-width: 767px) {
    .images-carousel-desktop {
        display: none !important;
    }
    
    .swiper-button-next,
    .swiper-button-prev {
        width: 35px;
        height: 35px;
    }
    
    .swiper-button-next:after,
    .swiper-button-prev:after {
        font-size: 16px;
    }
}

@media (min-width: 768px) {
    .images-carousel-mobile {
        display: none !important;
    }
    
    .images-carousel-desktop .swiper-pagination {
        display: none;
    }
}

@media (max-width: 480px) {
    .images-carousel-mobile .swiper-slide {
        padding: 0 10px;
    }
    
    .images-carousel-mobile .card {
        max-width: 100%;
    }
    
    .swiper-button-next,
    .swiper-button-prev {
        width: 30px;
        height: 30px;
    }
    
    .swiper-button-next:after,
    .swiper-button-prev:after {
        font-size: 14px;
    }
}
</style>