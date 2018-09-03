<template>
    <div class="container-fliud">
        <div class="row">
            <div class="col-md-12">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <a href="#">
                                <span class="glyphicon glyphicon-comment btn-lg btn-back" aria-hidden="true"></span>
                            </a>
                            <a href="http://pm.vkeepers/dashboard/">
                                <span class="glyphicon glyphicon-menu-left btn-lg btn-back" aria-hidden="true"></span>    
                            </a>
                        </div>
                    </div>
                    <div class="well well-sm">
                        <div v-for="boxes in finalArr">
                            <div class="well well-sm view-location">
                                <div v-if="box" v-for="box in boxes">
                                    <img class="view-pos" :src="box" aria-placeholder="No image available"/>
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

export default {
    props:['visit'],
    data(){
        return{
            currentVisits: "",
            errors: "",
            arrSize: "",
            finalArr: [],
        }
    },
    methods:{
        getCurrentVisit(x){
            axios.post('/getCurrentVisit', {'visitId': x}).then((response)=>{
                this.currentVisits = response.data
                this.arrSize = Object.keys(this.currentVisits).length

                let y;
                for(y = 0; y < this.arrSize; y++){
                    this.finalArr.push([]);
                }
                
                let x;
                for(x = 0; x < this.arrSize; x++){
                    let z;
                    for(z = 0; z < this.arrSize; z++){
                        if(this.currentVisits[z].line_order == x){
                            this.finalArr[x].push(this.currentVisits[z].pbv.url_box_view.small.url);    
                        }        
                    }
                }

                let j;
                for(j = 0; j < Object.keys(this.currentVisits).length; j++){
                    if(this.finalArr[j].length == 0){
                        delete(this.finalArr[j])
                    }    
                }
                

            }).catch((errors)=>{
                    this.errors=errors.response.data.errors
                    console.log(errors.response.data)
            })
        }    
    },
    mounted(){
        this.getCurrentVisit(this.visit.id)
    }
}
</script>

<style scoped>
    .view-location{
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
    }
    .view-pos{
        max-width: 130px;
        max-height: 130px;
        margin-right: 5px;
        border: 1px solid lightslategray;
        border-radius: 6px;
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


