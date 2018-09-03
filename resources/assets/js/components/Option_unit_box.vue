<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-right">
                <a href="http://pm.vkeepers/options/">
                    <span class="glyphicon glyphicon-menu-left btn-lg btn-back" aria-hidden="true"></span>    
                </a>
            </div>
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit list: <strong>BOX VIEWS Unit</strong></div>
                    <div class="panel-body">
                        <form method="post" action="#" id="file_form" enctype="multipart/form-data" @submit.prevent="upload">
                            <div class="form-group">
                                <label for="brand">Select brand</label>
                                <select @change="getSubBrand" name="brand" class="form-control" v-model="upd.brand">
                                    <option selected disabled value="">Select brand ...</option>
                                    <option v-for="(brand, key) in brands" :value="key">{{ brand.name }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="subbrand">Select subbrand</label>
                                <select  name="subbrand" class="form-control" v-model="upd.subbrand">
                                    <option selected disabled value="">Select subbrand ...</option>
                                    <option v-for="(sub, key) in upSubBrands" :value="key">{{ sub.name }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="image">Attach new box view</label>
                                <input type="file" class="form-control-file" name="image" id="image" @change="selectedFiles">
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success btn-lg">Add
                                    <span class="glyphicon glyphicon-record" aria-hidden="true"></span>
                                </button>
                                <button type="reset" class="btn btn-info btn-lg">Clean
                                    <span class="glyphicon glyphicon-erase" aria-hidden="true"></span>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="panel-body">
                            <form>
                                <div class="form-group">
                                    <label for="brand">Select brand for deletion</label>
                                    <select @change="getSubBrandDel" name="brand" class="form-control" v-model="deletion.brand">
                                        <option selected disabled value="">Select brand ...</option>
                                        <option v-for="(brand, key) in brands" :value="key">{{ brand.name }}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="subbrand">Select subbrand for deletion</label>
                                    <select @change="getBoxView" name="subbrand" class="form-control" v-model="deletion.subbrand">
                                        <option selected disabled value="">Select subbrand ...</option>
                                        <option v-for="(dSub, key) in delSubBrands" :value="key">{{ dSub.name }}</option>
                                    </select>
                                </div>
                                <div class="form-group text-center pic">
                                    <transition name="slide-fade">
                                        <img v-for="box in boxes" :src="box.url_box_view.xsmall.url" class="well well-sm" alt="Product box view image"/>
                                    </transition>            
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-danger btn-lg" @click.prevent="del">Delete
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </button>
                                    <button type="reset" class="btn btn-info btn-lg">Clean
                                        <span class="glyphicon glyphicon-erase" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
</template>

<script>

import swal from 'sweetalert2'
import axios from 'axios'

export default {
    data(){
        return{
            data:{},
            brands: {},
            upSubBrands: {},
            delSubBrands: {},
            boxes: {},

            upd: {
                brand: "",
                subbrand: "",
                image: ""
            },
            deletion: {
                brand: "",
                subbrand: ""
            },
            errors: ""
        }
    },
    methods:{
        // uploads start
        selectedFiles(e){
            this.data = new FormData()
            this.data.append('image',e.target.files[0])
            this.data.append('subbrand', this.upSubBrands[this.upd.subbrand].id)
        },
        upload(event){
            axios.post('/upload', this.data).then((response)=>{
              console.log(response.data);
            if(response.data == 1){
                swal('Success', ''+ this.brands[this.upd.brand].name + ' ' + this.upSubBrands[this.upd.subbrand].name +': box view was uploaded', 'success').then(()=>{
                    window.location.href="/options"
                })
            }else if (response.data == 0){
                swal('Error', ''+ this.brands[this.upd.brand].name + ' ' + this.upSubBrands[this.upd.subbrand].name +': box view WASN`T upload', 'error')
                }
            }).catch((errors)=>{
                console.log(errors.response.data)
            }) 
        },
       //uploads end
        getBrand(){
            axios.get('/getBrand').then((response)=>{
                this.brands = response.data
            }).catch((errors)=>{
                console.log(errors)
            }) 
        },
        getSubBrand(){
            axios.post('/getSubBrand', {'subbrand': this.brands[this.upd.brand].id}).then((response)=>{
                    // console.log(response.data);
                    this.upSubBrands = response.data
                 }).catch((errors)=>{
                    console.log(errors);
                 })
        },
        getSubBrandDel(){
            axios.post('/getSubBrandDel', {'subbrandDel': this.brands[this.deletion.brand].id}).then((response)=>{
                    // console.log(response.data);
                    this.delSubBrands = response.data
                }).catch((errors)=>{
                    console.log(errors);
                })
        },
        getBoxView(){
            axios.post('/getBoxView', {'box': this.delSubBrands[this.deletion.subbrand].id}).then((response)=>{
                    this.boxes = response.data
                }).catch((errors)=>{
                    console.log(errors);
                })
        },
        del(){
            axios.post('/delete', {'subbrand': this.delSubBrands[this.deletion.subbrand].id}).then((response)=>{
                console.log(response.data);
            if(response.data == 1){
                swal('Success', ''+ this.brands[this.deletion.brand].name + ' ' + this.delSubBrands[this.deletion.subbrand].name +': (box view) was deleted', 'success').then(()=>{
                    window.location.href="/options"
            })
            }else if (response.data == 0){
                swal('Error', ''+ this.brands[this.deletion.brand].name + ' ' + this.delSubBrands[this.deletion.subbrand].name +': (box view) WASN`T deleted', 'error')
                }
                }).catch((errors)=>{
                    console.log(errors);
                })
        }     
    },
    mounted(){
        this.getBrand()
    }
}
</script>

<style>
    .panel-body{
        border: 1px solid #ddd;
        background-color: rgba(99, 177, 242, 0.3);
        border-radius: 7px;
        margin: 5px;
    }

    .btn{
        width: 150px;
    }

    .btn-info{
        width: 95px;
    }

    .btn-success:active .glyphicon-record {
        color: firebrick;
    }

    input.add:focus .add-body {
        background: mediumorchid;
    }

    .btn-danger:active .glyphicon-trash {
        color: black;
    }

    .btn-info:active .glyphicon-erase {
        color: grey;
    }

    .btn-warning:active .glyphicon-wrench {
        color: midnightblue;
    }

    .panel-default {
        margin-bottom: 15px;
    }
    .pic {
        height: 140px;
    }

    .btn-back{
        padding: 15px;
        border-radius: 4px;
        background: lightgray;
        margin-bottom: 10px;
        margin-right: 15px;
        text-decoration: none;
    }

</style>



