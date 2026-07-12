<template>
    <div class="modal-content animated fadeIn">                    
        <!-- <Carousel v-if="primary.multimedia" :multimedia="primary.multimedia" :reference="reference" :position="currentIndex" :total="totalPic" @slide-card="slideCard"></Carousel>-->
        <Carousel ref="childCarousel" v-if="allPics.length > 0" :multimedia="allPics" :reference="reference" :position="currentIndex"></Carousel>
        <div class="modal-header"  v-if="hasMultipleCards">
            <h5 class="ml-auto"  style="font-weight:bold;color:#EADD1B;" v-if="allPics.length > 0">
                {{ cardTitle }}
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="z-index:55;">
                <span aria-hidden="true" style="font-weight:bold;color:#EADD1B;">&times;</span>
            </button>
        </div>
        <div class="modal-body" v-if="hasMultipleCards">
            <div class="details-container">
				<div class="card-images">
					<CardImage :ref="`ref_${index}`" v-for="(card, index) in cards" :key="card.id" :id="`card_img_${index}`" 
                        :image="`/storage/inmueble/${reference}/${card.multimedia[0].fotos_detalle}`"
                        :title="getTitle(card)"
                        @click="setPrimary(index)" 
                        :selected="currentIndex===index"
                    />
				</div>
        <!-- Usar v-if para mostrar solo si hay múltiples cards -->
        <div class="collapse-content" id="details" v-if="hasMultipleCards">
					<a class="btn-collapse" data-toggle="collapse" href="#collapseDetails" role="button" aria-expanded="true" aria-controls="collapseDetails">
					<!--<i class="far fa-list-alt fa-fw"></i>-->
					<span style='font-family:"Segoe UI Emoji",sans-serif;
mso-bidi-font-family:"Segoe UI Emoji"'>&#128221;</span> 
					Informe detallado {{ getTitle(primary) }} <!-- .replace('Dormitorio','Dorm.') }} -->   
                    </a>
                    <div class="in collapse show" id="collapseDetails">
                        <div class="row">
                            <div class="col border-right" v-for="(column, index) in columns" :key="index">
                                <ul class="list-group list-group-flush">
                                    <template  v-for="(key, index) in column">
                                        <li :key="index" class="list-group-item2" v-if="showItem(key)">
                                            <b v-html="getLabel(key)"></b>
                                            <span v-html="getValue(key)" class="text-muted"></span>
                                        </li>
                                    </template>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="collapse-content" id="note" v-if="nota">
                    <a class="btn-collapse" data-toggle="collapse" href="#collapseNote" role="button" aria-expanded="false" aria-controls="collapseNote">
                        <i class="fas fa-play fa-fw"></i>
                        Nota Adicional
                    </a>
                    <div class="collapse" id="collapseNote"> 
                        <video ref="video" width="100%" controls="controls">
                            <source :src="`/storage/inmueble/${reference}/${nota.nota_detalle}`" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
            
            <!--
            <div class="card-images">
                <CardImage v-for="card in cards" :key="card.id" 
                            :image="`/storage/inmueble/${reference}/${card.multimedia[0].fotos_detalle}`"
                            :title="getTitle(card)"
                            @click="setPrimary(card)" />
            </div>
			-->
        </div>
    </div>
</template>

<script>
import Carousel from '../../components/Carousel/Carousel'
import CardImage from '../../components/CardImage';
import metadata from '../metadata';

export default {
    components: {
        Carousel,
        CardImage
    },
    props: {
        reference: [String, Number]
    },
    data() {
        return {
            raw: [],
            cards: [],
            title: '',
			vestidor: 0,
			estancia:0,
            primary: {},
	        hiddenIfNo:['Baño incorporado en el dormitorio:'],
            currentIndex: 0,
            totalPic:0,
            allPics:[],
            cardTitle:'',
            heightScreen: 300
        }
    },
    mounted(){
        if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
            this.heightScreen =410;
        }
    },
    created() {
        axios.post(`/api/details/${this.reference}`).then((res) => {
            this.raw = res.data.sort((a, b) => a.type - b.type);

            this.raw.forEach((data) => {
                if (data.multimedia.length > 0) 
                {
                    this.cards = this.cards.concat(data);
                }
                if(data.hasOwnProperty('vestidor')){
                    if(data.vestidor!=0){
                        this.vestidor = 1;
			if(data.vestidor==2){
				this.vestidor = 2;

			}
			if(data.vestidor==3){
				this.vestidor = 3;

			}			
			if(data.vestidor==4){
				this.vestidor = 4;

			}						
			if(data.vestidor==5){
				this.vestidor = 5;

					}
			if(data.vestidor==6){
				this.vestidor = 6;

					}					
                  }
                }
                if(data.hasOwnProperty('estancia')){
                    if(data.estancia!=0){
                        this.estancia = 1;
						if(data.estancia==2){
							this.estancia = 2;

						}
								}
                }				
            });
            
            for (var i = 0; i < this.cards.length; i++) {
                for (var j = 0; j < this.cards[i].multimedia.length; j++) {
                    if (this.cards[i].multimedia[j].fotos_detalle) {
                        var fileNameWithoutExtension = this.cards[i].multimedia[j].fotos_detalle.replace(/\.[^/.]+$/, "");
                        this.cards[i].multimedia[j].fotos_detalle = fileNameWithoutExtension + "_798x599.jpg";
                        this.allPics.push(
                            {
                                id:this.cards[i].id,
                                title: this.cards[i].title,
                                img: fileNameWithoutExtension + "_798x599.jpg",
                                card: i
                            }
                        )
                        
                    }
                }
            }
            this.setTitle(0);
        });
    },
    methods: {
        slideCard(payload){
            this.updateProps(payload.dir);
        },
        updateProps(dir){
            if(dir === 'prev'){
                if(this.currentIndex > 0){
                    this.primary = this.cards[this.currentIndex - 1];
                    this.totalPic = this.cards[this.currentIndex - 1].multimedia.filter(item => item.fotos_detalle).length;
                    document.getElementById('card_img_'+this.cards[this.currentIndex - 1].id).scrollIntoView();
                    this.currentIndex--;
                }
            }else{
                if(this.currentIndex < this.cards.length-1){
                    this.primary = this.cards[this.currentIndex + 1];
                    this.totalPic = this.cards[this.currentIndex + 1].multimedia.filter(item => item.fotos_detalle).length;
                    document.getElementById('card_img_'+this.cards[this.currentIndex + 1].id).scrollIntoView();
                    this.currentIndex++;
                }
            }
        },
        setPrimary(idx) 
        {
            let slide = 0;
            for(let i=0;i< this.allPics.length;i++){
                if(this.allPics[i].id === this.cards[idx].id){
                    slide = i;
                    break;
                }
            }
            this.primary = this.cards[idx];
            this.currentIndex = idx;
            this.$refs.childCarousel.setSlide(slide);
            document.getElementById('card_img_'+idx).scrollIntoView();
        },
        details() 
        {
            let details = [];

            for (const key in this.metadata) 
            {   
                const value = this.getValue(key);

                if (!this.invalid(value)) 
                {
                    details.push(key);
                }
            }

            return details;
        },
        showItem(key){
            let label = this.getLabel(key);
            //console.log(label);
            if(this.hiddenIfNo.includes(label) && this.getValue(key)==='No'){
                //console.log("Not show");
                return false;
            }
            return true;
        },
        setTitle(idx){
            let data = this.cards[idx];
            this.currentIndex = idx;
            if(document.getElementById('card_img_'+idx)){
                document.getElementById('card_img_'+idx).scrollIntoView();
            }
            this.primary = data;
            //Esto cambia según el idioma
			//let title = data.title.substring(0,data.title.indexOf("|", 0));
			let title = data.title;
            let enumTypes = this.raw.filter(item => item.type === data.type);
            if (this.vestidor==1)
			{
				if (title=='Distribuidor')
				{	
					title='Vestidor';
				}
			}
            if (this.vestidor==2)
			{
				if (title=='Distribuidor')
				{	
					title='Almacén';
				}
			}
            if (this.vestidor==3)
			{
				if (title=='Distribuidor')
				{	
					title='Bodega';
				}
			}	
            if (this.vestidor==4)
			{
				if (title=='Distribuidor')
				{	
					title='Despensa';
				}
			}
            if (this.vestidor==5)
			{
				if (title=='Distribuidor')
				{	
					title='Lavadero';
				}
			}
            if (this.vestidor==6)
			{
				if (title=='Distribuidor')
				{	
					title='Azotea';
				}
			}			
            if (this.estancia==1)
			{
				if (title=='Dormitorio')
				{	
					title='Estancia';
				}
			}
            if (this.estancia==2)
			{
				if (title=='Dormitorio')
				{	
					title='Oficina';
				}
			}			
            if (enumTypes.length > 1) {
                enumTypes.forEach((item, index) => {
                    if (item.id === data.id) {
                        title += ` ${index+1}`;
                    }
                })
            }
            this.cardTitle = title;
        },
        getTitle(data) {
             //Esto cambia según el idioma
			//let title = data.title.substring(0,data.title.indexOf("|", 0));
			let title = data.title;
            console.log(title);		
            let enumTypes = this.raw.filter(item => item.type === data.type);
            if (this.vestidor==1)
			{
				if (title=='Distribuidor')
				{	
					title='Vestidor';
				}
			}
            if (this.vestidor==2)
			{
				if (title=='Distribuidor')
				{	
					title='Almacén';
				}
			}
            if (this.vestidor==3)
			{
				if (title=='Distribuidor')
				{	
					title='Bodega';
				}
			}	
            if (this.vestidor==4)
			{
				if (title=='Distribuidor')
				{	
					title='Despensa';
				}
			}
            if (this.vestidor==5)
			{
				if (title=='Distribuidor')
				{	
					title='Lavadero';
				}
			}
            if (this.vestidor==6)
			{
				if (title=='Distribuidor')
				{	
					title='Azotea';
				}
			}			
            if (this.estancia==1)
			{
				if (title=='Dormitorio')
				{	
					title='Estancia';
				}
			}
            if (this.estancia==2)
			{
				if (title=='Dormitorio')
				{	
					title='Oficina';
				}
			}			
            if (enumTypes.length > 1) {
                enumTypes.forEach((item, index) => {
                    if (item.id === data.id) {
                        title += ` ${index+1}`;
                    }
                })
            }

            return title;
        },
        getLabel(key) 
        {
            const data = this.metadata[key];

            if (typeof data == "object") 
            {
                return data.label;
            }

            return data;
        },
        getValue(key) 
        {
            const data = this.metadata[key];

            if (typeof data == "object") 
            {
                return data.template(this.primary);
            }
            
            return this.primary[key];
        },
        // Es verdadero cuando es un valor invalido
        invalid(value) 
        {
            return value == null || value == '' || value == undefined || value == "undefined";
        },
        
    },
    computed: {
        nota() 
        {
            if ("multimedia" in this.primary) 
            {
                return this.primary.multimedia.find(item => item.nota_detalle);
            }
            return null;
        },
        columns() 
        {
            const details = this.details();
            let columns = []

            let mid = Math.ceil(details.length / 2)

            for (let col = 0; col < 2; col++) 
            {
                columns.push(details.slice(col * mid, col * mid + mid))
            }
            return columns;
        },
        metadata() 
        {
            return metadata.fields[this.primary.type];
        },
	  hasMultipleCards() {
		return this.cards.length > 1;
	  }		
    },
    watch: {
        primary(value) 
        {
            if (this.nota) {
                if (this.$refs.video) this.$refs.video.load();
            }
        }
    }
};
</script>

<style lang="scss">
.modal-image {
    position: relative;
    .owl-carousel .item img {
        display: block;
        width: 100%;
        height: auto;
    }
    .modal-header {
        position: absolute;
        /*z-index: 20;*/
        background: linear-gradient(to top, opacity, opacity, rgba(255, 255, 255, .5));
        min-height: 200px;
        width: 100%;
        border: none;
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

}
.list-group-item2 {
  min-width: 150px;
  padding: 2px;
  border: 0;
  border-bottom: 1px solid #EEE; 
  list-style:none;}  
</style>