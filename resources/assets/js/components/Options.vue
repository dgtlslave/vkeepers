<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-right">
                <a href="http://pm.vkeepers/dashboard/">
                    <span class="glyphicon glyphicon-menu-left btn-lg btn-back" aria-hidden="true"></span>    
                </a>
            </div>
            <div class="col-md-6 col-md-offset-3">
                <h3 class="text-center">Units edit</h3>
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="http://pm.vkeepers/options/brands">Brands</a>
                    </li>
                    <li class="list-group-item">
                        <a href="http://pm.vkeepers/options/subbrands">Subbrands</a>
                    </li>
                    <li class="list-group-item">
                        <a href="http://pm.vkeepers/options/box">Box View</a>
                    </li>
                    <li class="list-group-item">
                        <a href="http://pm.vkeepers/options/region">Region</a>
                    </li>
                    <li class="list-group-item">
                        <a href="http://pm.vkeepers/options/state">State</a>
                    </li>
                    <li class="list-group-item">
                        <a href="http://pm.vkeepers/options/city">City</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>

import axios from 'axios'

export default {
  data(){
      return{
          
      }
  },
}
</script>

<style>
    .list-group li a {
        display: block;
        text-decoration: none;
    }

    .list-group li:hover{
        background-color: #bec4e2;
        transition-duration: .3s;
    }

    .list-group li:hover a{
        padding-left: 7px;
        color: #fff;
        transition-duration: .3s;
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
