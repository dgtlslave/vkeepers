<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-right">
                <a href="#">
                    <span class="glyphicon glyphicon-pencil btn-lg btn-back" aria-hidden="true"></span>
                </a>
                <a href="http://pm.vkeepers/dashboard/">
                    <span class="glyphicon glyphicon-menu-left btn-lg btn-back" aria-hidden="true"></span>    
                </a>
            </div>
            <div class="col-md-12">
                <div class="panel-body" v-if="userData">
                    <div class="well well-sm">
                        <div class="text-center avatar-position">
                            <img class="avatar" src="https://lorempixel.com/640/480/?43097" alt="User avatar">
                        </div>
                        <div class="alert alert-info" role="alert">
                            <b>Name:</b> {{ authData.firstname }}
                        </div>
                        <div class="alert alert-info" role="alert">
                            <b>Lastname:</b> {{ authData.lastname }}
                        </div>
                        <div class="alert alert-info" role="alert">
                            <b>Phone number:</b> {{ userData && userData[0] ? userData[0].phone : "" }}
                        </div>
                        <div class="alert alert-info" role="alert">
                            <b>E-mail address:</b> {{ authData.email }}
                        </div>
                        <div class="alert alert-info" role="alert">
                            <b>User role:</b> {{ userData && userData[0] ? userData[0].function : "" }}
                        </div>
                        <div class="alert alert-info" role="alert">
                            <b>Date of registration:</b> {{ userData && userData[0] ? userData[0].created_at : "" }}
                        </div>
                    </div>
                </div>
                <div v-else="!userData">
                    <i class="glyphicon glyphicon-hourglass" style="font-size: 48px"></i>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
const moment = require('moment')

export default {
    data(){
        return{
            userData: null,
            authData: {},
            errors: {}
        }
    },
    methods:{
        formatTime(timestamp) {
            return moment(parseInt(timestamp)).format('YYYY MMM DD')
        },
        getAllUserData(){
            axios.get('/getAllUserData').then((response)=>{
                this.userData = response.data
                console.log(this.userData)
            }).catch((errors)=>{
                this.errors=errors.response.data.errors
                console.log(errors.response.data)
            })
        },
        getAuthUserData(){
            axios.get('/getAuthUserData').then((response)=>{
                this.authData = response.data
            }).catch((errors)=>{
                this.errors=errors.response.data.errors
                console.log(errors.response.data)
            })
        }
    },
    mounted(){
        this.getAllUserData()
        this.getAuthUserData()
    }    
}
</script>

<style scoped>
    .avatar{
        width: 150px;
        height: 150px;
        border-radius: 50%;
        border: 1px solid white;
    }
    .avatar-position{
        padding: 15px;
        box-sizing: border-box;
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

