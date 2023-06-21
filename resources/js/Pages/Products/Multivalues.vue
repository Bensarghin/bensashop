<template>
    <div class="row">
        <div class="col-sm-6">
            <label for="">Label</label>
            <input type="text" class="form-control" value="" placeholder="label ..." name="label">
        </div>
        <div class="col-sm-6">
            <label for="">Options</label>
            <div class="input-group">
                <input type="text" class="form-control" v-model="inputValue">
                <button class="btn btn-outline-secondary" @click="addInput()" type="button" id="button-addon2">+</button>
            </div>
            <p><button type="button" class="badge bg-primary border border-0 py-2 px-4 my-2 me-1 position-relative" v-for="input in inputs" :key="input">{{ input }} <span class="position-absolute" style="right:5px;">x</span></button></p>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                inputs: [],
                inputValue : ""
            }
        },
        methods: {
            addInput() {
             this.inputs.push(this.inputValue);
                this.inputValue = "";
            },
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
