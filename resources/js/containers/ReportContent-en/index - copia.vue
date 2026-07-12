<template>
    <div class="modal-content animated fadeIn">
        <Carousel v-if="primary.multimedia" :multimedia="primary.multimedia" :reference="reference"></Carousel>
        <div class="modal-header">
            <h5 class="ml-auto"  style="font-weight:bold;color:#EADD1B;">
                {{ getTitle(primary) }}
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="z-index:55;">
                <span aria-hidden="true" style="font-weight:bold;color:#EADD1B;">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="details-container">
				<div class="card-images">
					<CardImage v-for="card in cards" :key="card.id" 
								:image="`/storage/inmueble/${reference}/${card.multimedia[0].fotos_detalle}`"
								:title="getTitle(card)"
								@click="setPrimary(card)" />
				</div>
                <div class="collapse-content" id="details">
					<a class="btn-collapse" data-toggle="collapse" href="#collapseDetails" role="button" aria-expanded="true" aria-controls="collapseDetails">
					<i class="far fa-list-alt fa-fw"></i>
					Informe detallado {{ getTitle(primary) }} <!-- .replace('Dormitorio','Dorm.') }} -->   
                    </a>
                    <div class="in collapse show" id="collapseDetails">
                        <div class="row">
                            <div class="col border-right" v-for="(column, index) in columns" :key="index">
                                <ul class="list-group list-group-flush">
                                    <template  v-for="(key, index) in column">
                                        <li :key="index" class="list-group-item2">
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
            primary: {}
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
            });
            
            for (var i = 0; i < this.cards.length; i++) {
                for (var j = 0; j < this.cards[i].multimedia.length; j++) {
                    if (this.cards[i].multimedia[j].fotos_detalle) {
                        var fileNameWithoutExtension = this.cards[i].multimedia[j].fotos_detalle.replace(/\.[^/.]+$/, "");
                        this.cards[i].multimedia[j].fotos_detalle = fileNameWithoutExtension + "_798x599.jpg";
                    }
                }
            }

            this.primary = this.cards[0];
        });
    },
    methods: {
        setPrimary(data) 
        {
            this.primary = data;
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
        getTitle(data) {
            let title = data.title;
            let enumTypes = this.raw.filter(item => item.type === data.type);
            
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
