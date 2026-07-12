<template>
	    <ul class="list-group" v-if="valores">
	    	<li class="list-group-item"  v-for="(val, index) in valores.salones" :key="index"> 
					#{{index+1}} Salon {{ val.orientacion_salon }}
				</li>
	    	<div v-if="valores.dormitorios">

	    		<li class="list-group-item"  v-for="(val, index) in valores.dormitorios" :key="index"> 
						#{{index+1}} Dormitorio {{ val.orientacion_dormitorio }}
					</li>
	    	</div>
	    </ul>
        
       
	    
</template>

<script type="text/javascript">
  
  export default {
    props: {
        id:""
    },
     mounted(){
			axios.get('/api/filter-data-meters/'+this.id).then((res)=>{
				this.valores= res.data.data;
			});	  

    },

    data(){
    	return {
    		valores:[],
    	}
    },
  

}

</script>
