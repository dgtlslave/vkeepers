<template>
  <div class="container">
      <div class="row">
          <div class="col-md-2">
              <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Authorized as: <i>{{ authUserData.lastname}} {{authUserData.firstname}}</i></h3>
                    </div>
                    <div class="panel-body">
                        <div class="panel-body h-profile">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            <a href="http://pm.vkeepers/profileView">PROFILE</a>
                        </div>
                        <div class="panel-body h-workbench">
                            <span class="glyphicon glyphicon-blackboard" aria-hidden="true"></span>
                            <a href="http://pm.vkeepers/workbench">WORKBENCH</a>
                        </div>
                        <div class="panel-body h-plans">
                            <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                            <a href="#">PLANS</a>
                        </div>
                        <div class="panel-body h-messages">
                            <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
                            <a href="#">MESSAGES</a>
                        </div>
                        <div class="panel-body h-options">
                            <span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span>
                            <a href="http://pm.vkeepers/options">OPTIONS</a>
                        </div>
                        <div class="panel-body h-reports">
                            <span class="glyphicon glyphicon-stats" aria-hidden="true"></span>
                            <a href="#">REPORTS</a>
                        </div>
                        <div class="panel-body h-archive">
                            <span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span>
                            <a href="#">ARCHIVE</a>
                        </div>
                    </div>
              </div>
          </div>
          <div class="col-md-10">
                <!-- <div v-if="this.userVisits" class="panel panel-default"> -->
                    <div v-if="!this.userVisits" v-for="visit in this.userVisits" class="delimiter panel-body">
                        <div class="row">
                            <div class="pl col-md-10">
                                <span v-if="visit.successfuly_visit == true" class="item-succ pl-item glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
                                <span v-else class="item-succ pl-item glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
                                <span class="item-time pl-item glyphicon glyphicon-calendar" aria-hidden="true">
                                    {{ formatTime(visit.time_end_visit) }}
                                </span>
                                <span class="item-city pl-item glyphicon glyphicon-map-marker" aria-hidden="true">
                                    {{ visit.dealer.city.name }}
                                </span>
                                <!-- <span class="item-network pl-item glyphicon glyphicon-globe" aria-hidden="true">
                                    {{ visit.dealer.profile.merchant_network_name }}
                                </span> -->
                                <span class="item-merchant pl-item glyphicon glyphicon-shopping-cart" aria-hidden="true">
                                    {{ visit.dealer.profile.merchant_name }}
                                </span>
                                <span class="item-address pl-item glyphicon glyphicon-home" aria-hidden="true">
                                    {{ visit.dealer.merchant_address }}
                                </span>
                            </div>
                            <div class="col-md-2">
                                <div class="control text-right">
                                    <a :href="'/dashboard/view/'+visit.id" type="button" class="btn btn-default btn-sm">
                                        <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                    </a>
                                    <!-- <button type="button" class="btn btn-default btn-sm">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                    </button> -->
                                    <button @click.prevent="deleteUserVisit(visit.id)" type="button" class="btn btn-default btn-sm">
                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </div>
                        </div>        
                    </div>
                <!-- </div> -->
          </div>
      </div>
  </div>
</template>

<script>

import axios from 'axios'
const moment = require('moment')
import swal from 'sweetalert2'

export default {
    data(){
        return{
            authUserData: {},
            userVisits: "",
            deleteVisit: ""
        }
    },
    methods:{
        formatTime(timestamp) {
            return moment(parseInt(timestamp)).format('YY MMM DD HH:mm')
        },
        getUsersData(){
            axios.get('/getUserData').then((response)=>{
                    this.authUserData = response.data
                })
                .catch((error)=>{
                    console.log(error.response.data)
            })
        },
        getUserVisit(){
            axios.get('/getUserVisit').then((response)=>{
                this.userVisits = response.data
            }).catch((error)=>{
                console.log(error.response.data);
            })
        },
        deleteUserVisit(x){
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        axios.delete('/deleteUserVisit/'+x).then((response)=>{
                            if(response.data == "1"){
                                swal('Deleted',"Visit successfully deleted",'success').then(()=>{
                                    this.getUserVisit()
                                })
                            }      
                        }).catch((error)=>{
                            console.log(error.response.data);
                        })             
                    }
            })
            
        }
    },
    mounted(){
        this.getUsersData()
        this.getUserVisit()
    }  
}
</script>

<style>

    .h-profile:hover {
        background: url('../../../../icss.jpg');
        background-size: cover;
        background-position: center, top;
        background-repeat: no-repeat;
        transition: 0.6;
    }
    .h-profile:hover a, .h-workbench:hover a, .h-archive:hover a, .h-messages:hover a, .h-plans:hover a, .h-options:hover a, .h-reports:hover a {
        color: #fff;
        font-weight: 700;
    }
    .h-workbench:hover {
        background: url('../../../../workbench.jpg');
        background-size: cover;
        background-position: center, top;
        background-repeat: no-repeat;
        transition: 0.6;
    }
    .h-plans:hover {
        background: url('../../../../plan.jpeg');
        background-size: cover;
        background-position: center, top;
        background-repeat: no-repeat;
        transition: 0.6;
    }
    .h-options:hover {
        background: url('../../../../options.jpeg');
        background-size: cover;
        background-position: center, top;
        background-repeat: no-repeat;
        transition: 0.6;
    }
    .h-reports:hover {
        background: url('../../../../reports.jpeg');
        background-size: cover;
        background-position: center, top;
        background-repeat: no-repeat;
        transition: 0.6;
    }
    .h-messages:hover {
        background: url('../../../../messages.jpg');
        background-size: cover;
        background-position: center, top;
        background-repeat: no-repeat;
        transition: 0.6;
    }
    .h-archive:hover {
        background: url('../../../../archives.jpg');
        background-size: cover;
        background-position: center, top;
        background-repeat: no-repeat;
        transition: 0.6;
    }
    .item-succ{
        /* max-width: 20px; */
        padding-top: 5px;
        padding-right: 5px;
        padding-bottom: 5px;
        line-height: 30px;
        font-size: 25px;
    }
    .item-time{
        max-width: 170px;
        padding-top: 5px;
        padding-bottom: 5px;
        line-height: 30px;
    }
    .item-city{
        max-width: 150px;
        padding-top: 5px;
        padding-bottom: 5px;
        line-height: 30px;
    }
    /* .item-network{
        width: 210px;
        padding-top: 5px;
        padding-right: 5px;
        padding-bottom: 5px;
        line-height: 30px;
    } */
    .item-merchant{
        max-width: 175px;
        padding-top: 5px;
        padding-bottom: 5px;
        line-height: 30px;
    }
    .item-address{
        max-width: 260px;
        padding-top: 5px;
        padding-bottom: 5px;
        line-height: 30px;
    }
    .delimiter {
        margin-bottom: 3px;
        border: 1px solid #3177b2;
    }
    .pl-item {
       padding-top: 1px;
       padding-bottom: 2px; 
    }
    .pl {
       display: flex;
       flex-direction: row;
       justify-content: flex-start;
       /* font-size: 10px;  */
    }
    .ready-line {
        display: flex;
        flex-direction: row;
    }
    .panel-body {
        background-color: #d0e7fb;
        border-radius: 3px;
    }
    .ho:hover {
        text-decoration: none;
        background-color: rgba(0, 79, 144, 0.2);
        color: #fff;
    }
    .glyphicon-remove-sign{
        color: red;
    }
    .glyphicon-ok-sign{
        color: green;
    }
</style>


