<template>
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <select @change="addArr" class="select" name="brand" v-model="selectedBrand">
                                    <option selected disabled value="">Select brand ...</option>
                                    <option v-for="(brand, key) in brands" :value="key">{{ brand.name }}</option>
                                </select>
                                  <transition name="slide-fade">
                                    <div class="well well-sm">
                                        <ul class="list-ustyled list-inline" v-if="Object.keys(this.brands).length && this.selectedBrand">
                                            <li class="wrap" v-for="image in this.brands[this.selectedBrand].imagerelation" v-if="image.picture && image.picture.url_box_view && image.picture.url_box_view.xsmall">
                                                <img :src="image.picture.url_box_view.xsmall.url" aria-placeholder="No image available"/>    
                                                <input @change="givePosition(image)" class="cbox" type="checkbox" :name="'position'+image.id" :value="image">
                                            </li>
                                        </ul>
                                    </div>
                                </transition>
                                <!-- <div v-for="pos in position" :position="pos"></div> -->
                            </div>
                            <!-- <div class="col-md-1">
                            </div>     -->
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import axios from 'axios'
import EventBus from '../EventBus'

export default {
    data(){
        return{
            brands: {},
            selectedBrand: null,
            position: [],
            countArr: 0,
            errors: {}
        }
    },
    methods:{
        getBrand(){
            axios.get('/getBrand').then((response)=>{
                this.brands = response.data
            }).catch((errors)=>{
                console.log(errors);
            })    
        },
        givePosition(x){
            this.position[this.position.length-1].push(x)
            // console.log(this.position[this.position.length-1])
            EventBus.$emit('boxPos', this.position)
        },
        addArr(){
            this.position.push([])
        }
    },
    mounted(){
        this.getBrand()
    }
}
</script>

<style scoped>
    .circle{
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #d0e7fb;
        border: 1px solid rgba(0,79,144,0.32);
        border-radius: 50%;
        box-shadow: inset 0px 0px 6px 4px rgba(0,79,144,0.22);
        color: #fff;
        outline: 0 none;
        margin-bottom: 15px; 
    }
    #m{
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f0032b;
        width: 40px;
        height: 40px;
    } 
    img{
        border-radius: 4px;
    }
    .wrap {
        position: relative;
    }
    .cbox {
        position: absolute;
        top: 45%;
        right: 45%;
        width: 10px;
        border: 5px solid red;
    }
    .select{
        margin-bottom: 5px;
    }
    .small-circle{
        position: absolute;
        top: -37px;
        right: 3px;
        width: 35px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eee;
        border-radius: 50%;
        box-shadow: inset 0px 0px 6px 4px rgba(0,79,144,0.22);
        color: red;
        outline: 0 none;
        margin-bottom: 0px; 
    }
    
    .circle:active{
        color: rgba(0,79,144);
        box-shadow: inset 0px 0px 6px 4px rgba(0,79,144,0.72);
        transition: .45s;
        outline: 0 none;
    }
    .small-circle:active{
        color: #cf1e3c;
        box-shadow: inset 0px 0px 6px 4px #f0032b;
        transition: .45s;
        outline: 0 none;
    }
    .small-circle span {
        padding-bottom: 15px;
    }
    .circle:hover{
        color: rgb(79, 103, 211);
        transition: .25s;
        outline: 0 none;
    }
</style>


