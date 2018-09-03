<template>
  <div class="conteiner">
      <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <form>
                <div class="form-group">
                        <label for="function">Function</label>
                        <select name="function" v-model="profile_data.current_role">
                            <option selected disabled>Choose your function</option>
                            <option value="user">User</option>
                            <option value="supervisor">Supervisor</option>
                        </select>
                </div>
                <div class="form-group">
                        <label for="region">Region</label>
                        <select @change="getState" name="region" v-model="region">
                            <option selected disabled>Choose your region ...</option>
                            <option v-for="(reg, key) in regions" :value="key">{{ reg.name }}</option>
                        </select>
                </div>
                <div class="form-group">
                        <label for="state">State</label>
                        <select @change="getCity" name="state" v-model="state">
                            <option selected disabled>Choose your state ...</option>
                            <option v-for="(state, key) in states" :value="key">{{ state.name }}</option>
                        </select>
                </div>
                <div class="form-group">
                        <label for="city">City</label>
                        <select name="city" v-model="profile_data.current_city">
                            <option selected disabled>Choose your city ...</option>
                            <option v-for="(cit, key) in cities" :value="key">{{ cit.name }}</option>
                        </select>
                </div>
                <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" v-model="profile_data.phone">
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-success btn-lg" @click.prevent="fillProfile">Proceed</button>
                </div>
            </form>
          </div>
      </div>
  </div>
</template>

<script>

import axios from 'axios'
import swal from 'sweetalert2'

export default {
    data(){
        return{
            profile_data:{
                current_role: "",
                current_city: "",
                phone: ""                
            },
            regions: "",
            region: null,
            states: "",
            state: null,
            cities: "",
            city: null,
            errors: {}
        }
    },
    computed: {
        
    },
    methods:{
        getRegion(){
            axios.get('/getRegion').then((response)=>{
                this.regions = response.data
            })
        },
        getState(){
            console.log(this.region)
            axios.post('/getState', {"region" :this.region}).then((response)=>{
                this.states = response.data
            })
        },
        getCity(){
            axios.post('/getCity', {"state" :this.state}).then((response)=>{
                this.cities = response.data
            })
        },
        fillProfile(){
            axios.post('/addProfile', this.profile_data).then((response)=>{
                 console.log(response.data);
                 swal('Success', 'Profile created.', 'success')
                 window.location.href = "http://pm.vkeepers/dashboard"      
                if(response.data.user.city_id){
                    window.location.href = response.data.direction
                } else if (response.data == 0){
                    console.log('error');
                } 
            }).catch((errors)=>{
                    this.errors=errors.response.data.errors
                    console.log(errors.response.data)
            })
        }
    },
    mounted(){
        this.getRegion()
        // this.getState(),
        // this.getCityData()
    }
}
</script>