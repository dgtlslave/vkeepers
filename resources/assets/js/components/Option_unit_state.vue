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
                    <div class="panel-heading">Edit list: <strong>STATE Unit</strong></div>
                    <div class="panel-body">
    <!-- add new unit -->
                        <form>
                            <div class="form-group">
                                <label for="region">Select region</label>
                                 <select name="region" class="form-control" v-model="selected_add.current_region">
                                    <option selected disabled value="">Select region ...</option>
                                    <option v-for="(region, key) in regions" :value="region.id">{{ region.name }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="state">Add new state</label>
                                <input type="text" name="state" class="form-control" v-model="selected_add.add_new" placeholder="Typing new state name ...">
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
                                <label for="region">Select region</label>
                                <select @change="filteredState()" name="region" class="form-control" v-model="selected_update.current_region">
                                    <option selected disabled value="">Select region ...</option>
                                    <option v-for="(region, key) in regions" :value="region.id">{{ region.name }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                    <label for="update">Select state to update</label>
                                    <select class="form-control" name="update" v-model="selected_update.current_state">
                                        <option selected disabled value="">Select subbrand ...</option>
                                        <option v-for="(state, key) in states" :value="state.id">{{ state.name }}</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                <div>
                                    <label for="new_state">Update at</label>
                                    <input type="text" name="new_state" class="form-control" v-model="selected_update.update_state" placeholder="Typing updated name ...">
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-warning btn-lg" @click.prevent="update">Update
                                    <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
                                </button>
                            </div>
                        </form>
                    </div>
    <!-- delete current unit -->
                    <div class="panel-body">
                        <form>
                            <div class="form-group">
                                <label for="region">Select region</label>
                                <select @change="filteredStateDel" name="region" class="form-control" v-model="selected_delete.current_region">
                                    <option selected disabled value="">Select region ...</option>
                                    <option v-for="(region, key) in regions" :value="region.id">{{ region.name }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="delete">Select state to delete</label>
                                <select class="form-control" name="delete" v-model="selected_delete.delete_state">
                                    <option selected disabled value="">Select required unit ...</option>
                                    <option v-for="(state, key) in states" :value="state.id">{{ state.name }}</option>
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
          current_region: "",
          regions: "",
          states: "",
          selected_add:{
            current_region: "",
            add_new: ""
          },
          selected_update:{
            current_region: "",
            current_state: "",
            update_state: ""  
          },
          selected_delete:{
            current_region: "",
            delete_state: ""  
          }
      }
  },
  computed:{
      //
  },
  methods:{
      getRegionData(){
          axios.get('/getRegionData').then((response)=>{
              this.regions = response.data
          })
      },
      getStateData(){
          axios.get('/getStateData').then((response)=>{
              this.states = response.data;
          })
      },
      filteredState(){
          axios.post('/filteredState', {'region': this.selected_update.current_region}).then((response)=>{
              this.states = response.data 
          })
      },
      filteredStateDel(){
          axios.post('/filteredStateDel', {'region': this.selected_delete.current_region}).then((response)=>{
              this.states = response.data 
          })
      },
      add(){
          axios.post('/stateAddData', this.selected_add).then((response)=>{
              swal('Created', "New State unit created", 'success').then((response)=>{
                window.location.href = "/options"    
              })
          })
      },
      update(){
          axios.post('/stateUpdateData', this.selected_update).then((response)=>{
              swal('Updated', "State unit updated", 'success').then((response)=>{
                window.location.href = "/options"    
              })
          })
      },
      del(){
          axios.post('/stateDeleteData', this.selected_delete).then((response)=>{
              swal('Deleted', "State unit deleted", 'success').then((response)=>{
                window.location.href = "/options"    
              })
          })
      }
  },
  mounted(){
      this.getRegionData()
      this.getStateData()
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

    .panel-default{
        margin-bottom: 15px;
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
