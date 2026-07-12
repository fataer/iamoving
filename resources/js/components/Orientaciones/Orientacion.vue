<template>
	    <ul v-if="valores">
	    	<li class="list-group-item"  v-for="(val,index) in valores.salones" :key="index"> #{{index+1}} Salon {{ val.orientacion_salon }}</li>
	    	<div v-if="valores.dormitorios">

	    		<li class="list-group-item"  v-for="(val,index) in valores.dormitorios" :key="index"> #{{index+1}} Dormitorio {{ val.orientacion_dormitorio }}</li>
	    	</div>
	    </ul>
        
       
	    
</template>

<script type="text/javascript">
  
  export default {
    props: {
        id:""
    },
     mounted(){
      // var urlPro="https://www.iamoving.com/api/filter-data-meters/";
   		// 	 	var urlDev="http://localhost:8000/api/filter-data-meters/";
   			    return axios.get('/api/filter-data-meters/'+this.id).then((res)=>{
   			    	 console.log(res.data);
               console.log("componente");
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
