<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input @keyup="cleanErrors" type="text" class="form-control" id="email" v-model="form.email">
                        <span v-if="errors.email" class="text-danger">{{ errors.email[0] }}</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input @keyup="cleanErrors" type="password" class="form-control" id="password" v-model="form.password">
                        <span v-if="errors.password" class="text-danger">{{ errors.password[0] }}</span>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-success btn-lg" @click.prevent="submitForm">Sign in</button>
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
                    email:"",
                    password:""
                },
                errors:{}
            }
        },
        methods:{
            submitForm(){
                axios.post('/login', this.form).then((response)=>{
                    //console.log(response.data.user.id);
                    if(response.data.user.id){
                        window.location.href = response.data.direction
                    }else if (response.data == 0){
                        console.log('error');
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