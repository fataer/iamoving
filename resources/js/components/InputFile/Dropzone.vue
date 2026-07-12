<template>
    <div    ref="fileuploader"
            class="row fileuploader"
            @click="onClick"
            @dragover="onDragOver"
            @dragleave="onDragLeave"
            @drop="onDrop">
        <slot></slot>
    </div>
</template>

<script>
export default {
    methods: {
        onClick(e) {
            this.$parent.$refs.uploadfileInput.click()
        },
        onDragOver(e) {
            this.onPrevent(e)
            this.$refs.fileuploader.classList.add('is-dragover');
        },
        onDragLeave(e) {
            this.onPrevent(e)
            this.$refs.fileuploader.classList.remove('is-dragover');
        },
        onDrop(e) {
            this.onPrevent(e)
            const files = e.target.files || e.dataTransfer.files;

            this.$refs.fileuploader.classList.remove('is-invalid', 'is-valid', 'is-dragover')

            if (this.$parent.validateFile(files)) {
                this.$refs.fileuploader.classList.add('is-dragover')
                this.$parent.upload();
            } else {
                this.$refs.fileuploader.classList.add('is-invalid')
            }
        },
        onPrevent(e) {
            e.preventDefault();
            e.stopPropagation();
        },
    }
}
</script>


<style lang="scss">
.fileuploader {
    $process: #3490dc;
    $error: red;
    $success: #38c172;
    $gray-light: #ddd;
    $gray-dark: #777;

    transition: all .5s;
    width: 100%;
    min-height: 100px;
    margin: 0;
    padding: 1rem;
    border-radius: 20px;
    border: 2px dashed $gray-light;
    color: $gray-dark;
    text-align: center;
    align-items: center;
    cursor: pointer;
    &.is-dragover {
        color: $process;
        border-color: $process;
    }
    &.is-invalid {
        color: $error;
        border-color: $error;
    }
    &.is-valid {
        color: $success;
        border-color: $success;
    }
}
</style>
