<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form>
                    <div v-if="form.reg_done == true" class='alert alert-success text-center' role='alert'><strong>Successfully registration</strong></div>
                    <!-- <div v-if="form.reg_done == false" class='alert alert-danger text-center' role='alert'><strong>Registration failed</strong></div> -->
                    <div class="form-group">
                        <label for="email">Firstname</label>
                        <input @keyup="cleanErrors" type="text" class="form-control" id="firstname" v-model="form.firstname">
                        <span v-if="errors.firstname" class="text-danger">{{ errors.firstname[0] }}</span>
                    </div>
                    <div class="form-group">
                        <label for="email">Lastname</label>
                        <input @keyup="cleanErrors" type="text" class="form-control" id="lastname" v-model="form.lastname">
                        <span v-if="errors.lastname" class="text-danger">{{ errors.lastname[0] }}</span>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input @keyup="cleanErrors" type="email" class="form-control" id="email" v-model="form.email">
                        <span v-if="errors.email" class="text-danger">{{ errors.email[0] }}</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input @keyup="cleanErrors" type="password" class="form-control" id="password" v-model="form.password">
                        <span v-if="errors.password" class="text-danger">{{ errors.password[0] }}</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password confirmation</label>
                        <input @keyup="cleanErrors" type="password" class="form-control" id="password_confirmation" v-model="form.password_confirmation">
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-success btn-lg" @click.prevent="submitForm">Sign up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    
    import axios from 'axios'
    
    export default {
        data(){
            return {
                form: {
                    firstname:"",
                    lastname:"",
                    email:"",
                    password:"",
                    password_confirmation:"",
                    reg_done: ""
                },
                errors:{}
            }
        },
        methods:{
            submitForm(){
                axios.post('/register', this.form).then((response)=>{
                    if(response.data.id){
                        // console.log(response.data.id);
                        // this.form.reg_done = true
                        window.location.href="/login"
                    }else if (response.data == 0){
                        // window.location.href="/register"
                        // this.form.reg_done = false
                    }
                }).catch((errors)=>{
                    this.errors=errors.response.data.errors
                    console.log(errors.response.data)
                })
            },
            cleanErrors(){
                this.errors = {}
            }
        }
    }
</script>

<style scoped>

</style>
