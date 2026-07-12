<template>
    <div class="feature-item">
        <div class="feature-pic set-bg" :data-setbg="`/storage/${data.path_image_primary}`"  @click="show">
            <div :class="data.is_sale == '1' ? 'sale-notic' : 'rent-notic'" class="text-white">
                <span v-text="data.is_sale == '1' ? 'En Venta' : 'En Alquiler'"></span>
            </div>
            <p id="text">
                <div class="rotar1" v-if="data.estado_inmueble == 'Vendido'">VENDIDO</div>
                <div class="rotar1" v-if="data.estado_inmueble == 'Alquilado'">ALQUILADO</div>
            </p>			
        </div>
        <div class="feature-text">
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
</template>

<script>
export default {
    props: {
        data: Object
    },
    methods: {
        show() {
            location.href = `/VisitaVirtual/${this.data.id}`;
        }
    }
}
</script>

<style lang="scss" scoped>
.feature-item {
    border: 1px solid var(--dark);

    .feature-pic:hover {
        cursor: pointer;
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
      
     font-size: 65px; 
      width: 250px; 
      position: relative; 
      top: 150px; 
	  color:#EADD1B;
    }

</style>


