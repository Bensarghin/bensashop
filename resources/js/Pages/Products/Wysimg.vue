<template>
<div class="">
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" @submit="uploadImage" id="imageUploadForm" enctype="multipart/form-data">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="imageInput" class="form-label">Upload Image</label>
                    <input class="form-control" type="file" id="imageInput" accept="image/*">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Insert</button>
            </div>
        </form>
    </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="btn-group">
            <button type="button" class="btn btn-light btn-sm" onclick="execCommand('bold')">
                <b>B</b>
            </button>
            <button type="button" class="btn btn-light btn-sm" onclick="execCommand('italic')">
                <i>I</i>
            </button>
            <button type="button" class="btn btn-light btn-sm" onclick="execCommand('underline')">
                <u>U</u>
            </button>
            </div>
            <div class="btn-group">
            <button type="button" class="btn btn-light btn-sm" onclick="execCommand('justifyLeft')">
                <i class="fas fa-align-left"></i>
            </button>
            <button type="button" class="btn btn-light btn-sm" onclick="execCommand('justifyCenter')">
                <i class="fas fa-align-center"></i>
            </button>
            <button type="button" class="btn btn-light btn-sm" onclick="execCommand('justifyRight')">
                <i class="fas fa-align-right"></i>
            </button>
            </div>
            <div class="btn-group">
            <label class="btn btn-light btn-sm">
                <input type="color" onchange="execCommand('foreColor', this.value)" style="display: none;">
                <i class="fas fa-tint"></i>
            </label>
            </div>
            <div class="btn-group">
                <select class="form-control form-control-sm" v-model="selectedFontSize" @change="changeSzie">
                    <option value="12">12</option>
                    <option value="14">14</option>
                    <option value="16">16</option>
                    <option value="18">18</option>
                    <option value="20">20</option>
                    <option value="22">22</option>
                    <option value="24">24</option>
                    <option value="26">26</option>
                    <option value="28">28</option>
                    <option value="30">30</option>
                    <option value="32">32</option>
                    <!-- Add more font sizes as needed -->
                </select>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-light btn-sm" @click="clearFormat">clear</button>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fas fa-image"></i>
                </button>
            </div>
            <div class="btn-group">
                <div class="input-group">
                    <span class="input-group-text">H</span>
                    <input type="text" class="form-control form-control-sm" v-model="imageHeight" style="width: 60px;">
                </div>
            </div>
            <div class="btn-group">
                <div class="input-group">
                    <span class="input-group-text">W</span>
                    <input type="text" class="form-control form-control-sm" v-model="imageWidth" style="width: 60px;">
                </div>
            </div>
            <button class="btn btn-dark btn-sm">Update</button>
            </div>
        <div class="card-body">
            <div class="content" 
                id="editor" 
                ref="editor" 
                contenteditable="true"
                :value="modelValue"
                @dragover.prevent 
                @drop="handleImageDrop"
                @input="$emit('update:modelValue', $event.target.innerHTML)" 
            >
            </div>
        </div>
    </div>        
</div>
</template>
<script>
export default {
    props:[
        'modelValue' // Accepts the value from the parent component via v-model
    ],
    data() {
        return {
            imageHeight: '',
            imageWidth: '',
            selectedHeader: 'p',
            selectedFontSize: '12',
            image: null
        }
    },
    methods: {
        uploadImage(e) {
            e.preventDefault();
            const fileInput = document.getElementById('imageInput');
            const file = fileInput.files[0];
            
            const formData = new FormData();
            formData.append('image', file);
            
            // Send the image file to the server using AJAX
            this.insertImage(formData);
        },
        insertImage(formData) {
            console.log(this.image);
            $.ajax({
                type:'POST',
                contentType: false,
                processData: false,
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/admin/api/upload_image',
                data: formData,
                success: (res)=> {
                    const editor = document.getElementById('editor');
                    const img = document.createElement('img');
                    img.src = res.imageUrl;
                    // img.setAttribute('data-bs-toggle', 'modal');
                    // img.setAttribute('data-bs-target', '#exampleModal');
                    img.addEventListener('click',(event) => {
                        this.handleImageClick(event, img);
                    });
                    editor.appendChild(img);
                },
                error: (err) => console.log(err)
            })
        },
        handleImageClick(event, img) {
            img.style.border ="1px solid #ccc";
                this.imageWidth = img.width;
                this.imageHeight = img.height;
        },
        changeSzie() {
            const editor = this.$refs.editor;
            const selection = window.getSelection();
            const range = selection.getRangeAt(0);

            if (editor.contains(range.commonAncestorContainer)) {
                    const fontSize = parseInt(this.selectedFontSize);
                if (!isNaN(fontSize)) {
                const spanElement = document.createElement('span');
                spanElement.style.fontSize = fontSize + 'px';
                spanElement.innerHTML = range.toString();
                range.deleteContents();
                range.insertNode(spanElement);
                }
            }

        },
        handleImageDrop(event) {
            event.preventDefault();

            const file = event.dataTransfer.files[0];
            if (file && file.type.startsWith('image/')) {
                const formData = new FormData();
                formData.append('image', file);

                // Send the image file to the server using AJAX
                this.insertImage(formData);
            }
        },


    }

}
</script>