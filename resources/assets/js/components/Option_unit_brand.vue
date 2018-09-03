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
                    <div class="panel-heading">Edit unit: BRAND</div>
                    <div class="panel-body add-body">
    <!-- add new unit -->
                        <form>
                            <div class="form-group">
                                <label for="email">New unit of list:</label>
                                <input type="text" class="form-control add" v-model="selected_add.add">
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-success btn-lg" @click.prevent="add">Add
                                    <span class="glyphicon glyphicon-record" aria-hidden="true"></span>
                                </button>
                            </div>
                        </form>
                    </div>
    <!-- edit current unit -->
                    <div class="panel-body">
                        <form>
                            <div class="form-group">
                                    <label for="update">Update current unit list:</label>
                                    <select class="form-control" name="update" v-model="selected_update.up_to">
                                        <option selected disabled value="">Select required unit ...</option>
                                        <option v-for="(name, key) in db_data" :value="name.id">{{ name.name }}</option>
                                    </select>
                                <div>
                                    <label for="email">Update at:</label>
                                    <input type="text" class="form-control" v-model="selected_update.up_at">
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-warning btn-lg" @click.prevent="update">Update
                                    <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
                                </button>
                                 <!-- <button class="btn btn-warning btn-lg" @click.prevent="pusherNitificationSent">Update</button>-->
                            </div>
                        </form>
                    </div>
    <!-- delete current unit -->
                    <div class="panel-body">
                        <form>
                            <div class="form-group">
                                <label for="delete">Delete current unit of list:</label>
                                <select class="form-control" name="delete" v-model="selected_delete.delete">
                                    <option selected disabled value="">Select required unit ...</option>
                                    <option v-for="(name, key) in db_data" :value="name.id">{{ name.name }}</option>
                                </select>
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-danger btn-lg" @click.prevent="del">Delete
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
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
        //   pusher:{},
        //   channel: {},
          db_data: "",
          selected_update: {
            up_to: "",
            up_at: ""
          },
          selected_delete: {
              delete: ""
          }, 
          selected_add: {
              add: ""
          },
          errors: {}
      }
  },
  methods: {
    //   pusherNitificationSent(){

    //   },
    //   pusherNitificationGet(){
    //        this.channel.bind('dbr', (data) => {
    //            alert(data.message)
    //        })
    //   },
      getDbData(){
          axios.get('/getAllData').then((response)=>{
              this.db_data = response.data
          })
      },
      add(){
          axios.post('/brandAddData', this.selected_add).then((response)=>{
              console.log(response.data)
              if(response.data = '1'){
                swal('Created',"New Brand unit created",'success').then(()=>{
                    window.location.href = "/options"      
                })    
              }
          })
      },
      update(){
          axios.post('/brandUpdateData', this.selected_update).then((response)=>{
              console.log(response.data)
              if(response.data = '1'){
                  swal('Updated', "Chosen Brand unit updated", 'success').then(()=>{
                      window.location.href = "/options"
                  })
              }
          })
      },
      del(){
          axios.post('/brandDeleteData', this.selected_delete).then((response)=>{
              console.log(response.data)
              if(response.data){
                  swal('Deleted', "Chosen Brand unit deleted", 'success').then(()=>{
                      window.location.href = "/options"
                  })
              }
          })
      }
  },
  mounted(){
      this.getDbData();
    //   Pusher.logToConsole = true;
    //   this.pusher = new Pusher('4c6cc69c4bc43ae13bbf', {
    //         wsHost: 'ws.pusherapp.com',
    //         httpHost: 'sockjs.pusher.com',
    //         encrypted: true
    //     });
    //     this.channel = this.pusher.subscribe('db-refresh')
        // this.pusherNitificationGet()
  }
}
</script>

<style>
    .panel-body{
        border: 1px solid #ddd;
        background-color: #eee;
        border-radius: 7px;
        margin: 5px;
    }

    .btn{
        /* display: inline-block; */
        width: 150px;
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

    .btn-warning:active .glyphicon-wrench {
        color: midnightblue;
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
