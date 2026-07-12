<template>
    <div>
        <div class="feature-item">
            <div class="feature-pic set-bg" :data-setbg="`/storage/${data.path_image_primary}`" 
                v-on="data.video_primary===null ? { click: () => show } : {}"
                v-bind:style="{ backgroundImage: 'url(' + `/storage/${data.path_image_primary}` + ')' }"
                >
                <div :class="data.is_sale == '1' ? 'sale-notic' : 'rent-notic'" class="text-white">
                    <span v-text="data.is_sale == '1' ? 'En Venta' : 'En Alquiler'"></span>
                </div>
                <div class="play-btn" v-if="data.video_primary">
                    <img width="70" height="70" src="/img/play_btn.png" @click="showVideo(data.path_video_primary,$event)" title="Ver video" />
                </div>
                <p id="text">
                    <div class="rotar1" v-if="data.estado_inmueble === 'Vendido'">VENDIDO</div>
                    <div class="rotar1" v-if="data.estado_inmueble === 'Alquilado'">ALQUILADO</div>
                    <div class="rotar1" v-if="data.estado_inmueble == 'Reservado'">RESERVADO</div>
                </p>			
            </div>
            <div class="feature-text" @click="show">
                <div class="text-center feature-title">
                    <h5>Referencia {{data.id}}</h5>
                    <p  v-if="data.road" ><i class="fa fa-map-marker"></i> {{data.road}}</p>
                    <!--<p v-if="data.propiedad_precio"> € {{ String(parseInt(data.propiedad_precio)).replace(/(.)(?=(\d{3})+$)/g,'$1.') }}</p>-->

                                    <p v-if="data.id==85">Precio a consultar</p>
                                    <p v-else-if="data.tipo_inmueble=='Habitaciones' && data.bedrooms>1">Desde € {{ String(parseInt(data.propiedad_precio)).replace(/(.)(?=(\d{3})+$)/g,'$1.') }}</p>	
                                    <p v-else>€ {{ String(parseInt(data.propiedad_precio)).replace(/(.)(?=(\d{3})+$)/g,'$1.') }}</p>								
                                    <p v-if="data.tipo_inmueble=='Habitaciones'">Habitaciones en alquiler</p>				
                </div>
                <div class="room-info-warp">
                    <div class="room-info">
                        <div class="rf-left">
                            <p v-if="data.bedrooms" ><i class="fas fa-bed"></i> Dormitorios: {{data.bedrooms}} </p>
                            <p v-if="data.square_meters" ><i class="fas fa-th-large"></i> {{data.square_meters}} Metros<sup>2</sup></p>
                        </div>
                        <div class="rf-right">
                            <p v-if="data.estudio==1"><i class="fas fa-check-circle text-success"></i> Estudio</p>
                            <p v-if="data.apartamento==1"><i class="fas fa-check-circle text-success"></i> Apartamento</p>
                            <p v-if="data.chalet==1"><i class="fas fa-check-circle text-success"></i> Chalet</p>
                            <p v-if="data.atico==1"><i class="fas fa-check-circle text-success"></i> Ático</p>
                            <p v-if="data.loft==1"><i class="fas fa-check-circle text-success"></i> Loft</p>
                            <p v-if="data.piso==1"><i class="fas fa-check-circle text-success"></i> Piso</p>
                            <p v-if="data.bajo==1"><i class="fas fa-check-circle text-success"></i> Bajo</p>
                            
                            <p v-if="data.bathrooms" ><i class="fas fa-bath"></i> Baños: {{data.bathrooms}} </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div :id="`modalVideo_${data.id}`" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mInformeLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-image" role="application" :style="`max-width: ${widthScreen};`">
                <div class="modal-content animated fadeIn">
                    <div class="modal-body text-center">
                            <div class="row">
                                <div class="col-12">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>     
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="modal-title">Referencia {{data.id}}</h5>
                                    <div :id="`div_frame_${data.id}`" class="text-center" style="height:400px">
                                        
                                        <iframe  
                                            :src="`https://www.youtube.com/embed/${data.video_primary}?modestbranding=1&rel=0`" 
                                            class="video-fluid z-depth-1" 
                                            width="100%" 
                                            height="100%" 
                                            mozallowfullscreen 
                                            webkitallowfullscreen  
                                            allowfullscreen>
                                        </iframe>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            widthScreen: 530
        }
    },
    props: {
        data: Object
    },
    mounted(){
        if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
            this.widthScreen = '95wv';
        }
        let id = this.data.id;
        $("#modalVideo_" + this.data.id).on('hidden.bs.modal', function () {
            $("#div_frame_"+ id).html("");
        });
    },
    methods: {
        show() {
            location.href = `/VisitaVirtual/${this.data.id}`;
        },
        showVideo(video, event){
            event.preventDefault();
            const modalId= "#modalVideo_" + this.data.id;
            let ifra = '<iframe src="https://www.youtube.com/embed/' + this.data.video_primary + '"?modestbranding=1&rel=0';
            ifra += 'class="video-fluid z-depth-1" ';
            ifra += 'width="100%" ';
            ifra += 'height="100%" ';
            ifra += 'mozallowfullscreen ';
            ifra += 'webkitallowfullscreen  ';
            ifra += 'allowfullscreen></iframe>';
            $("#div_frame_"+ this.data.id).html(ifra);

            $(modalId).modal({
                backdrop:'static',
                keyboard: false
            });           
        }
    }
}
</script>

<style lang="scss" scoped>
.play-btn{
    position: absolute;
    top: 20%;
    left: 42%;
    z-index:1000;
}
.play-btn:hover{
    cursor: pointer;
}
.feature-text:hover{
    cursor: pointer;
}
.feature-item {
    border: 1px solid var(--dark);

    .feature-pic:hover {
        cursor: pointer;
    }
}
.details-container {
        padding-bottom: .5rem;
        .details-row {
            display: flex;
            .details-col {
                margin: 10px;
                border: 1px solid;
                flex-grow: 1;
                display: flex;
                flex-direction: column;
            }
            .details-item {
                border: 1px solid;
                padding: 5px;
                margin: 5px;
            }
        }
    }

#image
{    
    position:absolute;

}
#text
{
    z-index:100;
    position:absolute;    
    
    /*font-size:24px;
    font-weight:bold;
    left:150px;
    top:350px;*/
}
.rotar1 
    { 
      -webkit-transform: rotate(-45deg); 
      -moz-transform: rotate(-45deg); 
      -ms-transform: rotate(-45deg); 
      -o-transform: rotate(-45deg); 
      transform: rotate(-45deg); 
      
      -webkit-transform-origin: 50% 50%; 
      -moz-transform-origin: 50% 50%; 
      -ms-transform-origin: 50% 50%; 
      -o-transform-origin: 50% 50%; 
      transform-origin: 50% 50%; 
      
     font-size: 58px; 
      width: 250px; 
      position: relative; 
      top: 150px; 
	  color:#EADD1B;
    }

    @media only screen and (max-width: 600px) {


        /*.modal-dialog {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
        }
        
        .modal-content {

            height: auto;
            min-height: 100%;
            border-radius: 0;
        }
        

        [id^="div_frame"] { 
            position: relative;
            top: 25%;             
        }*/
    }
</style>


