<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                      <div class="panel-heading">Edit list:</div>
                      <div class="panel-body">
                        <form method="post" action="#" id="file_form" enctype="multipart/form-data" @submit.prevent="upload">
                            <div class="form-group">
                                <label for="brand">Select brand</label>
                                <select @change="this.getSubBrand" name="brand" class="form-control" v-model="selectedBrand">
                                    <option selected disabled value="">Select brand ...</option>
                                    <option v-for="(brand, key) in brands" :value="key">{{ brand.name }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="subbrand">Select subbrand</label>
                                <select name="subbrand" class="form-control" v-model="selectedImage.subbrand">
                                    <option selected disabled value="">Select subbrand ...</option>
                                    <option v-for="(subb, key) in subbrands" :value="key">{{ subb.name }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email">Attach new box view</label>
                                <input type="file" class="form-control-file" name="image" id="image" @change="selectedFiles">
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success btn-lg">Add
                                    <span class="glyphicon glyphicon-record" aria-hidden="true"></span>
                                </button>
                                <button type="reset" class="btn btn-info btn-lg">Clean
                                    <span class="glyphicon glyphicon-erase" aria-hidden="true"></span>
                                </button>
                            </div>
                        </form>
                      </div>
                          <div class="panel-body">
                            <form>
                                <div class="form-group">
                                    <label for="brand">Select brand for deletion</label>
                                    <select @change="this.getSubBrandDel" name="brand" class="form-control" v-model="selectedBrandDel">
                                        <option selected disabled value="">Select brand ...</option>
                                        <option v-for="(brand, key) in brands" :value="key">{{ brand.name }}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="subbrand">Select subbrand for deletion</label>
                                    <select @change="getChoosenBox" name="subbrand" class="form-control" v-model="selectedDelImage.subbrand">
                                        <option selected disabled value="">Select subbrand ...</option>
                                        <option v-for="(sub, key) in subbrandsDel" :value="key">{{ sub.name }}</option>
                                    </select>
                                </div>
                                <div class="form-group text-center pic">
                                    <transition name="slide-fade">
                                        <img class="well well-sm" v-for="box in boxView" :src="box.url_box_view.xsmall.url" alt="Product box view image"/>
                                    </transition>            
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-danger btn-lg" @click.prevent="del">Delete
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </button>
                                    <button type="reset" class="btn btn-info btn-lg">Clean
                                        <span class="glyphicon glyphicon-erase" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>

// <script>

// import swal from 'sweetalert2'
// import axios from 'axios'

// export default {
//     data(){
//         return{
//           data:{},
//           boxes: "",

//           brands: {},
//           selectedBrand: "",
//           selectedBrandDel: "",
//           subbrands: {},
//           subbrandsDel: {},

//           boxView: {},

//           selectedImage: {
//             image: null,
//             brand: "",
//             subbrand: ""
//           },
//           selectedDelImage: {
//             brand: "",
//             subbrand: ""
//           },
//           errors: ""
//         }
//     },
//     methods:{
//       // uploads start
//       selectedFiles(e){
//         this.data = new FormData()
//         this.data.append('image',e.target.files[0])
//         // this.data.append('brand', this.selectedImage.brand)
//         this.data.append('subbrand', this.subbrandsDel[this.selectedImage.subbrand].id)
//       },
//       upload(event){
//         axios.post('/upload', this.data).then((response)=>{
//         //   console.log(response.data);
//         if(response.data == 1){
//             swal('Success', ''+ this.brands[this.selectedBrand].name + ' ' + this.subbrands[this.selectedImage.subbrand].name +': box view was uploaded', 'success').then(()=>{
//                 window.location.href="/options"
//             })
//           }else if (response.data == 0){
//             swal('Error', ''+ this.brands[this.selectedBrand].name + ' ' + this.subbrands[this.selectedImage.subbrand].name +': box view wasn`t upload', 'error')
//             }
//         }).catch((errors)=>{
//         //   this.errors=errors.response.data.errors
//           console.log(errors.response.data)
//         }) 
//       },
//       //uploads end
//       getBrand(){
//         axios.get('/getBrand').then((response)=>{
//           this.brands = response.data
//         })
//       },
//       getSubBrand(){
//         axios.post('/getSubBrand', {'subbrand':this.brands[this.selectedBrand].id}).then((response)=>{
//           this.subbrands = response.data
//         })
//       },
//       getSubBrandDel(){
//         axios.post('/getSubBrandDel', {'subbrandDel':this.brands[this.selectedBrandDel].id}).then((response)=>{
//           this.subbrandsDel = response.data
//         })
//       },
//       getChoosenBox(){
//         axios.post('/getBoxView', this.subbrandsDel[this.selectedDelImage.subbrand].id).then((response)=>{
//           this.boxView = response.data
//         })
//       },
//       del(){
//         axios.post('/delete', this.selectedDelImage).then((response)=>{
//           console.log(response.data);
//           if(response.data == 1){
//             swal('Success', ''+ this.brands[this.selectedBrandDel].name + ' ' + this.subbrandsDel[this.selectedDelImage.subbrand].name +': (box view) was deleted', 'success').then(()=>{
//                 window.location.href="/options"
//             })
//           }else if (response.data == 0){
//             swal('Error', ''+'Image wasnt deleted!', 'error')
//             }
//          }).catch((errors)=>{
//           //this.errors=errors.response.data.errors
//           console.log(errors)
//         }) 
//       }
//     },
//     mounted(){
//       this.getBrand()
//     }
// }
// </script>




