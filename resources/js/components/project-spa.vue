<template>
    <router-view :token = api_key :uname = names>

    </router-view>
</template>

<script>
export default {
   data(){
       return{
           api_key:this.token,
           names:this.name
       }
   }, 
   props:['token','name']
}
</script>
