<template>
     <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-6">
                    <h5>Images</h5>
                </div>
                <div class="col-sm-6">
                    <input class="form-control" id="image-files" @change="handleFileUpload" multiple accept="imgae/*" type="file">
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="image-preview">
            <div v-for="(image, index) in updatedImages" :key="index" class="position-relative">
                <img :src="image.url" alt="Preview">
                <div class="overlay" @mouseover="showDeleteButton(index)" @mouseleave="hideDeleteButton(index)">
                    <button @click="removeImage(index)" type="button" class="btn btn-light delete-button remove-img-btn rounded-pill"><i class="fa-solid fa-trash"></i></button>
                </div>
            </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
        imagesValue: {
            type: Array,
            default: () => [],
            },

        },
        data() {
            return {
                updatedImages: []
            }
        },
        methods: {
            handleFileUpload(event) {
            const files = event.target.files;
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();
                reader.onload = (e) => {
                this.updatedImages.push({
                    url: e.target.result,
                    file: file,
                });
                this.$emit('update:imagesValue', this.updatedImages);
                };
                reader.readAsDataURL(file);
            }
            },
            removeImage(index) {
                this.updatedImages.splice(index, 1);
                this.$emit('update:imagesValue', this.updatedImages);
            },
            showDeleteButton(index) {
                this.updatedImages[index].showDeleteButton = true;
                this.$emit('update:imagesValue', this.updatedImages);
            },
            hideDeleteButton(index) {
                this.updatedImages[index].showDeleteButton = false;
                this.$emit('update:imagesValue', this.updatedImages);
            },
        },
        mounted() {
            // this.updatedImages = this.imagesValue;
        }
    }
</script>