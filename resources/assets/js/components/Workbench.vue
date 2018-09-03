<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                <div class="panel-heading">Merchant:
                    <select @change="addSelectLine" name="merchant" v-model="data.selected_dealer">
                        <option selected disabled value="">Select merchant ...</option>
                        <option v-for="dealer in dealers" :value="dealer">{{dealer.profile.merchant_name}}</option>    
                    </select>        
                </div>
                <div class="panel-body">
                    <div v-for="boxline in boxlines" class="wraper" :key="boxline.id">
                        <transition name="slide-fade">
                        <boxline :position="position"></boxline>
                        {{ boxline }}
                        </transition>
                        <button @click.prevent="saveVisit" class="circle btn-lg save">
                            <span class="glyphicon glyphicon-floppy-save" aria-hidden="true"></span>
                        </button>
                        <!-- <button @click.prevent="addSelectLine()" class="circle btn-lg">
                            <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                        </button>
                        <button @click.prevent="delBtnLine(boxline.id)" class="circle btn-lg" id="m">
                            <span class="glyphicon glyphicon-minus-sign" aria-hidden="true"></span>
                        </button>     -->
                    </div>

                </div>
                </div>
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div v-if="this.data.selected_dealer" class="panel-heading">
                            Preview of scheme view: {{ this.data.selected_dealer.merchant_address }}
                        </div>
                        <div class="panel-body">
                            <div class="well well-sm">
                                <div v-for="arr in data.position">
                                    <div class="well well-sm location">
                                        <div class="location" v-for="preview in arr">
                                            <img class="pos" :src="preview.picture.url_box_view.thumbnail.url" aria-placeholder="No image available"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
            // position:[],
            boxlines: [],
            nextBoxInd: 0,
            merchantView: [],
            // preview: [],
            dealers: "",
            // selected_dealer: ""
            data: {
                selected_dealer: "",
                position: [],
                startTime: "",
                endTime: "",
                success: true
            }
        }
    },
    methods:{
        addSelectLine(){
            
            this.data.startTime = new Date().getTime()

            this.boxlines.push({
                id: this.nextBoxInd++
            })
            console.log(this.boxlines)
        },
        getDealer(){
            axios.get('/getDealer').then((response)=>{
                this.dealers = response.data
            }).catch((errors)=>{
                console.log(errors);
                
            })
        },
        saveVisit(){

            this.data.endTime = new Date().getTime()
            
            axios.post('/saveVisit', this.data).then((response)=>{
                console.log(response.data);
            }).catch((errors)=>{
                console.log(errors);
            })
        }
    },
    mounted(){
        EventBus.$on('boxPos', (payload)=>{
            this.data.position = payload
        })
        this.getDealer()
    }
}
</script>

<style>
    .panel-body{
        
    }
    .circle{
        margin: 0 auto;
        width: 50px;
        height: 50px;
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
    .save{
        color: rgba(0,79,144,0.32);
    }
    #m{
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f0032b;
        width: 40px;
        height: 40px;
    } 
    .circle:active{
        color: rgba(0,79,144);
        box-shadow: inset 0px 0px 6px 4px rgba(0,79,144,0.72);
        transition: .45s;
        outline: 0 none;
    }
    .circle:hover{
        color: rgb(79, 103, 211);
        transition: .25s;
        outline: 0 none;
    }
    .location{
        display: flex;
        width: 100%;
    }
    .pos{
        margin-right: 3px;
        border-radius: 3px;
    }
</style>

