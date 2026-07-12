
const val=  new Vue({
   el:"#detalle-orientaciones",
   mounted(){
              var urlPro="http://157.230.147.182/api/filter-data-meters/";
   			 	var urlDev="http://localhost:8000/api/filter-data-meters/";
   			   axios.get(urlPro+id).then((res)=>{
   			    	 // console.log(res.data);
                     this.valores= res.data.data;
                     this.dataOrientaciones;
                     // console.log(this.dataOrientaciones);

   			    });	   	 
     
},
   data(){
   	  return {
   	  	 valores:[],
   	  	 

   	 
   	  }
   },
   computed:{

   	  dataOrientaciones(){
        return this.valores;
   	  },
   }
  


});



