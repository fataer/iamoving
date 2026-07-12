<template>
	<div class="row">  
	    <div class="feature-item col-lg-4 col-md-4 col-sm-4 col-xs-12" style="padding:0px" v-bind:key="f.inmueble.id"  v-for="f in favoritos">
			<div   v-if="f.inmueble.published==1">
				
					<div class="feature-pic set-bg" >
                        <iframe frameborder="0" height="100%" width="100%" :src="`https://www.youtube.com/embed/${f.inmueble.video_primary}?autoplay=0&amp;controls=1&amp;showinfo=0&amp;autohide=1&amp;modestbranding=1&amp;rel=0`"></iframe>
						<div :class="f.inmueble.is_sale == '1' ? 'sale-notic' : 'rent-notic'" class="text-white">
							<span v-text="f.inmueble.is_sale == '1' ? 'En Venta' : 'En Alquiler'"></span>
						</div>
								<p id="text">
									<div class="rotar1" v-if="f.inmueble.estado_inmueble == 'Vendido'">VENDIDO</div>
									<div class="rotar1" v-if="f.inmueble.estado_inmueble == 'Alquilado'">ALQUILADO</div>
									<div class="rotar1" v-if="f.inmueble.estado_inmueble == 'Reservado'">RESERVADO</div>
								</p>						
					</div>
					<div class="feature-text" @click="show(f.inmueble.id)">
						<div class="text-center feature-title">
							<h5>Referencia {{f.inmueble.id}}</h5>
							<p  v-if="f.inmueble.road" ><i class="fa fa-map-marker"></i> {{f.inmueble.road}}</p>
							<p v-if="f.inmueble.propiedad_precio"> € {{ String(parseInt(f.inmueble.propiedad_precio)).replace(/(.)(?=(\d{3})+$)/g,'$1.') }}</p>
						</div>
						<div class="room-info-warp">
							<div class="room-info">
								<div class="rf-left">
									<p v-if="f.inmueble.bedrooms" ><i class="fas fa-bed"></i> Dormitorios {{f.inmueble.bedrooms}} </p>
									<p v-if="f.inmueble.square_meters" ><i class="fas fa-th-large"></i> {{f.inmueble.square_meters}} Metros<sup>2</sup></p>
								</div>
								<div class="rf-right">
									<p v-if="f.inmueble.estudio==1"><i class="fas fa-check-circle text-success"></i> Estudio</p>
									<p v-if="f.inmueble.apartamento==1"><i class="fas fa-check-circle text-success"></i> Apartamento</p>
									<p v-if="f.inmueble.chalet==1"><i class="fas fa-check-circle text-success"></i> Chalet</p>
									<p v-if="f.inmueble.atico==1"><i class="fas fa-check-circle text-success"></i> Ático</p>
									<p v-if="f.inmueble.loft==1"><i class="fas fa-check-circle text-success"></i> Loft</p>
									<p v-if="f.inmueble.piso==1"><i class="fas fa-check-circle text-success"></i> Piso</p>
									<p v-if="f.inmueble.bajo==1"><i class="fas fa-check-circle text-success"></i> Bajo</p>
									<p v-if="f.inmueble.bathrooms" ><i class="fas fa-bath"></i> Baños {{f.inmueble.bathrooms}} </p>                        
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
            favoritos: null
        }
    },
    created() {
    	this.cargarFavoritos();
    },
    methods: {
        cargarFavoritos() {
            axios.get('/lista_favoritos', {
                        headers: {
                            Authorization: 'Bearer ' + localStorage.getItem('token')
                        }
				})
                .then((response) => {
                    if (response.status == 200) {
                        //this.login(request);
                        this.favoritos = response.data.favoritos
                    }
                })
                .catch((exception) => {
                    console.log(exception.response);
                })
        },
        show(id) {
            location.href = '/anuncio/'+id;
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
    .room-info p {
	    margin-bottom: 15px;
	    font-size: 18px;
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
.feature-text{
    cursor:pointer;
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
.sale-notic, .rent-notic {
    color: #fff;
    font-size: 12px;
    text-transform: uppercase;
    background: #e94646;
    padding: 7px 13px;
    display: inline-block;
    border-radius: 2px;
    position: absolute;
    z-index: 10000;
    top: 10px;
    left: 10px;
}
</style>


