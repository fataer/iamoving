<template>
    <dropzone>
        <div class="col">
            <svg viewBox="0 0 32 32" width="64" height="64" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                <path v-if="path" d="M9 22 C0 23 1 12 9 13 6 2 23 2 22 10 32 7 32 23 23 22 M11 18 L16 14 21 18 M16 14 L16 29" />
                <path v-else-if="accept.substr(0, 5) === 'video'" d="M22 13 L30 8 30 24 22 19 Z M2 8 L2 24 22 24 22 8 Z" />
                <template v-else-if="accept.substr(0, 5) === 'image'">
                    <path d="M2 8 L 9 8 12 4 20 4 23 8 30 8 30 26 2 26 Z" />
                    <circle cx="16" cy="16" r="5" />
                </template>
                <path v-else d="M10 9 L10 24 C10 28 13 30 16 30 19 30 22 28 22 24 L22 6 C22 3 20 2 18 2 16 2 14 3 14 6 L14 23 C14 24 15 25 16 25 17 25 18 24 18 23 L18 9" />
            </svg>
        </div>

        <div id="dropz">    
            <span v-text="errorText || text || defaultText"></span>
            <input type="file" :accept="accept" ref="uploadfileInput" @change="onFileChange" id="inputFile" v-show="false" />
            <input type="hidden" :name="name" :value="path">
        </div>

        <div id="progress-bar" v-show="progress > 0">
            <progress :value="progress" max="100" style="width: 100%;"></progress>
        </div>
    </dropzone>
</template>


<script>
    import dropzone from "./Dropzone.vue";

    export default {
        components: {
            dropzone
        },
        props: {
            url: {
                type: String,
                default: '/upload'
            },
            name: {
                type: String,
                required: true
            },
            accept: {
                type: String
            },
            reference: [String, Number]
        },
        data(){
            return {
                defaultText: 'Haga click o arrastre el archivo para subir',
                errorText: '',
                text: '',
                rules: {
                    type: "video/mp4",
                    size: 1024 * 1024 * 120
                },
                path: '',
                file: null,
                progress: 0,
                uploaded: false,
                config: {
                    onUploadProgress: this.onUploadProgress
                }
            }
        },
        methods: {
            onFileChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                let fileuploader = this.$children[0].$refs.fileuploader;

                fileuploader.classList.remove('is-invalid', 'is-dragover', 'is-valid')

                if (this.validateFile(files)) {
                    fileuploader.classList.add('is-dragover')
                    this.upload()
                } else {
                    fileuploader.classList.add('is-invalid')
                }
            },
            validateFile(files) {
                if (!files.length) return false;

                const file = files[0]
                this.uploaded = false;
                this.progress = 0;

                this.text = file.name;
                this.file = file;

                return true;
            },
            upload(){
                const data = new FormData();
                data.append('file', this.file);

                if (this.reference) {
                    data.append('reference', this.reference);
                }

                axios.post(this.url, data, this.config)
                    .then((response) => {
                        if (response.data.path != undefined) {
                            this.uploadSuccess(response.data.path);
                        } else {
                            this.uploadError('Ocurrió un error y no se pudo subir el archivo');
                        }
                    })
                    .catch((error) => {
                        this.uploadError('Ocurrió un error y no se pudo subir el archivo');
                    });
            },
            uploadError(text) {
                this.errorText = text;//error.response.data.error;
                this.uploaded = false;
                this.progress = 0;
                this.$children[0].$refs.fileuploader.classList.add('is-invalid')
            },
            uploadSuccess(path) {
                this.$parent.form[this.name] = path;
                this.path = path;
                this.uploaded = true;
                this.progress = 0;
                this.$children[0].$refs.fileuploader.classList.add('is-valid')
            },
            onUploadProgress(progressEvent) {
                this.progress = Math.round( (progressEvent.loaded * 100) / progressEvent.total );
            }
        }
    }
</script>

