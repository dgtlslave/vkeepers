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
                    <div class="panel-heading">Edit list:</div>
                    <div class="panel-body add-body">
    <!-- add new unit -->
                        <form>
                            <div class="form-group">
                                <label for="brand">Select brand</label>
                                <select name="brand" class="form-control" v-model="selected_add.current_brand">
                                    <option selected disabled value="">Select brand ...</option>
                                    <option v-for="(brand, key) in brands" :value="brand.id">{{ brand.name }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email">Add new subbrands</label>
                                <input type="text" class="form-control add" v-model="selected_add.add_new" placeholder="Typing new subbrand name ...">
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
                                <label for="brand">Select brand</label>
                                <select @change="filteredSubBrand" name="brand" class="form-control" v-model="selected_update.current_brand">
                                    <option selected disabled value="">Select brand ...</option>
                                    <option v-for="(brand, key) in brands" :value="brand.id">{{ brand.name }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                    <label for="update">Select subbrand to update</label>
                                    <select class="form-control" name="update" v-model="selected_update.current_subbrand">
                                        <option selected disabled value="">Select subbrand ...</option>
                                        <option v-for="(subbrand, key) in subbrands" :value="subbrand.id">{{ subbrand.name }}</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                <div>
                                    <label for="email">Update at</label>
                                    <input type="text" class="form-control" v-model="selected_update.update_subbrand" placeholder="Typing updated name ...">
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
                                <label for="brand">Select brand</label>
                                <select @change="filteredSubBrandDel" name="brand" class="form-control" v-model="selected_delete.current_brand">
                                    <option selected disabled value="">Select brand ...</option>
                                    <option v-for="(brand, key) in brands" :value="brand.id">{{ brand.name }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="delete">Select subbrand to delete</label>
                                <select class="form-control" name="delete" v-model="selected_delete.delete_subbrand">
                                    <option selected disabled value="">Select required unit ...</option>
                                    <option v-for="(subbrand, key) in subbrands" :value="subbrand.id">{{ subbrand.name }}</option>
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
          brands: "",
          subbrands: "",
          selected_add:{
            current_brand: "",
            add_new: ""
          },
          selected_update:{
            current_brand: "",
            current_subbrand: "",
            update_subbrand: ""  
          },
          selected_delete:{
            current_brand: "",
            delete_subbrand: ""  
          }
      }
  },
  computed:{
      //
    },
  methods:{
      getBrandsData(){
          axios.get('/getBrand').then((response)=>{
              this.brands = response.data
          })
      },
      add(){
          axios.post('/SubbrandAddData', this.selected_add).then((response)=>{  
              if(response.data = '1'){
                  swal('Created',"New Subbrand unit created",'success').then(()=>{
                    window.location.href = "/options"    
                  })
              }
          })
      },
      update(){
          axios.post('/SubbrandUpdateData', this.selected_update).then((response)=>{
             if(response.data = '1'){
                  swal('Updated',"Subbrand unit updated",'success').then(()=>{
                    window.location.href = "/options"    
                  })
              }
          })
      },
      filteredSubBrand(){
          axios.post('/filteredSubBrand', {'brand': this.selected_update.current_brand}).then((response)=>{
              this.subbrands = response.data
          })
      },
      filteredSubBrandDel(){
          axios.post('/filteredSubBrandDel', {'brand': this.selected_delete.current_brand}).then((response)=>{
              this.subbrands = response.data
          })
      },
      del(){
          axios.post('/SubbrandDeleteData', this.selected_delete).then((response)=>{
              if(response.data = '1'){
                  swal('Deleted', "Subbrand unit deleted", 'success').then(()=>{
                    window.location.href = "/options"    
                  })
              }
          })
      }
  },
  mounted(){
      this.getBrandsData()
    //   this.getSubbrandsData()
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
