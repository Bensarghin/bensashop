<template>
    <div>
        <div v-if="success==true" class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> The Product Added to Store
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <h5 class="mb-3">New Product</h5>
        <form method="POST" @submit.prevent="submit" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="mb-4">
                                <input type="text" class="form-control" placeholder="name ..." v-model="dataform.name" name="name">
                                <div v-if="errorsData.name" class="text-danger">
                                    <span v-for="error in errorsData.name">
                                    {{ error }}</span>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="card">
                                    <div class="card-body" style="padding: 5px !important">
                                        <span class="d-inline w-auto text-muted">{{appUrl}}/product/</span>
                                        <input class="d-inline w-50 form-control" type="text" v-model="dataform.slug" placeholder="slug ..." name="slug">
                                    </div>
                                </div>
                                <div v-if="errorsData.slug" class="text-danger">
                                    <span v-for="error in errorsData.slug">
                                    {{ error }}</span>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control" v-model="dataform.price" placeholder="Sale price ..." name="price">
                                        <div v-if="errorsData.price" class="text-danger">
                                            <span v-for="error in errorsData.price">
                                            {{ error }}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control" v-model="dataform.compare_price" placeholder="Compare price ..." name="compare_price">
                                        <div v-if="errorsData.compare_price" class="text-danger">
                                            <span v-for="error in errorsData.compare_price">
                                            {{ error }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <Wysimg v-model="dataform.description"/>
                                <div v-if="errorsData.description" class="text-danger">
                                    <span v-for="error in errorsData.description">
                                    {{ error }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- begin images section -->

                    <div class="card mb-3">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h5>Images</h5>
                                </div>
                                <div class="col-sm-6">
                                    <input class="form-control" id="image-files" @change="handleFileUpload" multiple accept="image/*" type="file">
                                </div>
                                <div v-if="errorsData.files" class="text-danger">
                                    <span v-for="error in errorsData.files">
                                    {{ error }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="image-preview">
                            <div v-for="(image, index) in uploadImages" :key="index" class="position-relative">
                                <img :src="image.url" alt="Preview">
                                <div class="overlay" @mouseover="showDeleteButton(index)" @mouseleave="hideDeleteButton(index)">
                                    <button @click="removeImage(index)" type="button" class="btn btn-light delete-button remove-img-btn rounded-pill"><i class="fa-solid fa-trash"></i></button>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>

                    <!-- end images section -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h5>Variants</h5>
                        </div>
                        <div class="card-body">
                            <Multivalues/>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5>Visibility</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="visible">
                                <label class="form-check-label" for="flexCheckChecked">
                                Show in store
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="card">
                            <div class="card-header"><h5>Categories</h5></div>
                            <div class="card-body">
                                <div class="mb-3">
                                </div>
                                <select v-model="dataform.categories" class="select-multiple form-control" multiple>
                                    <option v-for="category in categoriesData" :key="category.id" :value="category.id">{{ category.name }}</option>
                                </select>
                                <div v-if="errorsData.categories" class="text-danger">
                                    <div v-for="(fileErrors, index) in errorsData.files" :key="index">
                                        <span v-for="error in fileErrors">
                                        {{ error }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</template>
<script>

import Multivalues from './Multivalues.vue'
import Wysimg from './Wysimg.vue'
var csrfToken = $('meta[name="csrf-token"]').attr('content');
    export default {
        props:[
            'categoriesData',
            'appUrl'
        ],
        components: {
            Multivalues,
            Wysimg,
        },
        data() {
            return {
                uploadImages: [],
                cart:{},
                success:false,
                errorsData:[],
                dataform: {
                    name: "",
                    slug: "",
                    price: "",
                    compare_price: "",
                    description: '',
                    categories: [],
                    files: [],
                    _token: csrfToken
                }    
            }
        },
        mounted() {
            
            $('.select-multiple').select2({
                placeholder: "Select Categories From Here",
                }).on('change', () => {
                this.dataform.categories = $('.select-multiple').val();
            });
        },
        methods: {
            submit() {
                axios.post('/admin/product/', this.dataform,{
                    headers: {
                    'Content-Type': 'multipart/form-data',
                    },
                })
                .then(res =>{
                        this.success = true;
                        this.errorsData = [];
                })
                .catch(err => {
                    this.errorsData = err.response.data.errors;
                    console.log(err.response.data.errors);
                });
            },
            getCategoryName(categoryId) {
                const category = this.categoriesData.find(cat => cat.id === categoryId);
                return category ? category.name : '';
            },

            // Images upload medthods
            handleFileUpload(event) {
                const files = event.target.files;
                for (let i = 0; i < files.length; i++) {
                    const file = files[i];
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        this.dataform.files.push(file);
                        this.uploadImages.push({
                            url: e.target.result,
                            file: file,
                        });
                    };
                    reader.readAsDataURL(file); // Push the file object directly
                }
            },
            removeImage(index) {
                this.uploadImages.splice(index, 1);
                this.dataform.files.splice(index, 1);
            },
            showDeleteButton(index) {
                this.uploadImages[index].showDeleteButton = true;
            },
            hideDeleteButton(index) {
                this.uploadImages[index].showDeleteButton = false;
            },
        }
    }
</script>
     