<template>
       <div>
        
        <side-menu></side-menu>

        <div class="page-main">

            <div class="page-header">
                
                <h4 class="page-title">
                    Setting
                </h4>
                <div class="page-header-actions">
                    <form @click.prevent="" class="form-inline">
                        <div class="form-group form-material">
                            <div class="input-search input-search-dark">
                                <i class="input-search-icon md-search" aria-hidden="true"></i>
                                <input v-model="search" class="form-control" name="" placeholder="Search..." type="text">
                                <button type="button" class="input-search-close icon md-close" aria-label="Close"></button>
                            </div>
                        </div> 
                    </form>
                </div>
            
            </div>

            <div class="page-content">

                <div class="panel">

                    <div class="form-group form-material">
                        <button class="btn btn-primary waves-effect waves-light btn-sm" data-toggle="modal" data-target="#addSettings"><i class="icon md-plus" aria-hidden="true"></i>Setting</button>
                    </div>
                    <!-- Model Add Setting -->
                     <div class="modal fade" id="addSettings" aria-hidden="true" aria-labelledby="Manipulate_data"
                    role="dialog" tabindex="-1">
                        <div class="modal-dialog modal-center">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <h4 class="modal-title">Tambah Settings {{Setting_post.name_setting}}</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="example">
                                        <form @submit.prevent="StoreSettings()" class="form-horizontal">
                                            <div class="form-group row form-material row">
                                            <label class="col-xs-12 col-md-3 form-control-label">Nama Setting: </label>
                                                <div class="col-md-9 col-xs-12">
                                                    <input type="text" v-model="Setting_post.name_setting" class="form-control" name="name" placeholder="Nama Setting"
                                                    />
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default btn-pure" data-dismiss="modal">Close</button>
                                                <button type="Submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                    <!-- Model Add Setting -->


                      <!-- Model Add Setting -->
                     <div class="modal fade" id="editsetting" aria-hidden="true" aria-labelledby="Manipulate_data"
                    role="dialog" tabindex="-1">
                        <div class="modal-dialog modal-center">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <h4 class="modal-title">Edit Settings</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="example">
                                        <form @submit.prevent="UpdateSetting(Setting_post.temp)" class="form-horizontal">
                                            <div class="form-group row form-material row">
                                            <label class="col-xs-12 col-md-3 form-control-label">Nama Setting: </label>
                                                <div class="col-md-9 col-xs-12">
                                                    <input type="text" v-model="Setting_post.name_setting" class="form-control" name="name" placeholder="Nama Setting"
                                                    />
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default btn-pure" data-dismiss="modal">Close</button>
                                                <button type="Submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                    <!-- Model Add Setting -->

                    <!-- Show Data -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Setting</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="Setting in Setting" :key="Setting.id">
                                <td>{{Setting.id}}</td>
                                <td><a :href="'/setting/' + Setting.id">{{Setting.name}}</a></td>
                                <td>
                                    <!-- edit data button -->
                                    <button @click="EditSetting(Setting)" type="button" class="btn btn-floating btn-success btn-sm waves-effect" data-toggle="modal" data-target="#editsetting"><i class="icon md-edit" aria-hidden="true"></i></button>
                                    <!-- delete data button -->
                                    <button @click="DeleteSetting(Setting.id)" type="button" class="btn btn-floating btn-warning btn-sm waves-effect"><i class="icon md-delete" aria-hidden="true"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                
                </div>

            </div>
            

        </div>

        <foot-vues></foot-vues>
    </div>
</template>

<script>
export default {
    data(){
        return{
            Setting:[],
            api_key : this.token,
            search:'',

            Setting_post : {
                name_setting : '',
                temp : ''
            }
        }
    },

    props:['token'],

    created(){
        this.fetchSteps();
    },

    computed:{},

    methods:{
        fetchSteps(){
            fetch('/api/setting',{
                method:'get',
                headers:{
                    'Accept' :'application/json',
                    'X-Requested-With' : 'XMLHttpRequest',
                    'Authorization' : 'Bearer ' + this.api_key
                }
            })
            .then(res => res.json())
            .then(res => {
                this.Setting = res.data
            })
            .catch(err => console.log(err))
        },

        //storing the steps
        StoreSettings(){
            fetch('/api/setting/store',{
                method:'post',
                body:JSON.stringify(this.Setting_post),
                headers:{
                    'Content-Type':'application/json',
                    'Authorization' : 'Bearer ' + this.api_key
                }
            })
            .then(res => res.data)
            .then(data => {
                this.Setting_post.name_setting = ''
                this.fetchSteps();
            })
            .catch(err => console.log(err));
        },

        //edit steps
        EditSetting(data){
            this.Setting_post.name_setting = data.name;
            this.Setting_post.temp = data.id
        },

        //updatedata steps
        UpdateSetting(setting_id){
            fetch(`/api/setting/update/${setting_id}`,{
                method  : 'put',
                body    : JSON.stringify(this.Setting_post),
                headers : {
                    'Content-Type':'application/json',
                    'Authorization' : 'Bearer ' + this.api_key
                }  
            })
            .then(res => res.json)
            .then(
                res => {
                    this.Setting_post.name_setting  = '';
                    this.fetchSteps();   
                }
            )
            .catch(err=>console.log(err));
        },

        DeleteSetting(setting_id){
            this.$swal({
                    title: 'Anda Yakin?',
                    text: "Data akan terhapus secara permanent!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya!',
                    cancelButtonText: 'Tidak'
                }).then((result) => {
                    if (result.value) {
                  
                        fetch(`/api/setting/delete/${setting_id}`,{
                            method:'delete',
                            headers:{
                                'Content-Type':'application/json',
                                'Authorization' : 'Bearer ' + this.api_key
                            } 
                        })
                        .then(res => res.data)
                        .then(data => {
                            this.$swal(
                                'Terhapus!',
                                'Data setting terhapus',
                                'success'
                            )
                            this.fetchSteps();
                        })
                        .catch(err=>console.log(err));
                    }
                })
         
            
        }
    }
}
</script>

