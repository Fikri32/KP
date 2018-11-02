<template>
    <div>
        <side-menu></side-menu>
        
        <div class="page-main">
            <div class="page-header">
                <div class="page-title">
                    Client
                </div>
                <div class="page-header-actions">
                    <form @click.prevent="" class="form-inline">
                        <div class="form-group form-material">
                            <div class="input-search input-search-dark">
                                <i class="input-search-icon md-search" aria-hidden="true"></i>
                                <input v-model="filter" class="form-control" name="" placeholder="Search..." type="text">
                                <button type="button" class="input-search-close icon md-close" aria-label="Close"></button>
                            </div>
                        </div> 
                    </form>
                </div>
            </div>

            <div class="page-content">

                <div class="page-content-actions">
                    <div class="pull-xs-left">
                        <button data-toggle="modal" data-target="#client" type="button" class="btn btn-primary btn-md empty-btn">Client</button>
                    </div>
                </div>
                
                <div class="panel">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th @click="set_serting('nama')">
                                    <div v-if="sort_asc == true">
                                        Name <i class="icon wb-sort-asc" aria-hidden="true"></i>
                                    </div>
                                    <div v-else>
                                        Name <i class="icon wb-sort-des" aria-hidden="true"></i>
                                    </div>
                                </th>
                                <th @click="set_serting('alamat')">
                                    <div v-if="sort_asc == true">
                                        Alamat <i class="icon wb-sort-asc" aria-hidden="true"></i>
                                    </div>
                                    <div v-else>
                                        Alamat <i class="icon wb-sort-des" aria-hidden="true"></i>
                                    </div>
                                </th>
                                <th @click="set_serting('email')">
                                    <div v-if="sort_asc == true">
                                        Email <i class="icon wb-sort-asc" aria-hidden="true"></i>
                                    </div>
                                    <div v-else>
                                        Email <i class="icon wb-sort-des" aria-hidden="true"></i>
                                    </div>
                                </th>
                                <th>Telepon</th>
                                <th>Fax</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in adv_filtering" :key="item.id">
                                <td>{{item.id}}</td>
                                <td>{{item.name}}</td>
                                <td>{{item.address}}</td>
                                <td>{{item.email}}</td>
                                <td>{{item.phone}}</td>
                                <td>{{item.fax}}</td>
                                <td>
                                    <button type="button" @click="EditClient(item)" data-toggle="modal" data-target="#Editclient" class="btn btn-icon btn-warning btn-round waves-effect"><i class="icon md-edit" aria-hidden="true"></i></button>
                                    <button type="button" @click="DeleteClient(item.id)" class="btn btn-icon btn-danger btn-round waves-effect"><i class="icon md-delete" aria-hidden="true"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Add Payments Form -->
            <div class="modal fade" id="client" aria-hidden="true" aria-labelledby="client"
            role="dialog" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
                            <h4 class="modal-title">Tambah Client</h4>
                        </div>
                        
                        <form @submit.prevent="StoreClient()">
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="item form-group">
                                        <h6> Nama </h6>
                                        <input v-model="client_post.nama" type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="item form-group">
                                        <h6> Alamat </h6>
                                        <input v-model="client_post.alamat" type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="item form-group">
                                        <h6> Email </h6>
                                        <input v-model="client_post.email" type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="item form-group">
                                        <h6> No.Telepon </h6>
                                        <input v-model="client_post.phone" type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="item form-group">
                                        <h6> Fax </h6>
                                        <input v-model="client_post.fax" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="modal-footer">
                                <button class="btn btn-primary" type="submit">Save</button>
                                <a class="btn btn-sm btn-white btn-pure" data-dismiss="modal" href="javascript:void(0)">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <!-- End Add Payments Form -->

        <!-- Add Payments Form -->
            <div class="modal fade" id="Editclient" aria-hidden="true" aria-labelledby="Editclient"
            role="dialog" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
                            <h4 class="modal-title">Tambah Client</h4>
                        </div>
                        
                        <form @submit.prevent="UpdateClient(client_post.client_id)">
                            <div class="modal-body">
                                {{client_post}}
                                <div class="form-group">
                                    <div class="item form-group">
                                        <h6> Nama </h6>
                                        <input v-model="client_post.nama" type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="item form-group">
                                        <h6> Alamat </h6>
                                        <input v-model="client_post.alamat" type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="item form-group">
                                        <h6> Email </h6>
                                        <input v-model="client_post.email" type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="item form-group">
                                        <h6> No.Telepon </h6>
                                        <input v-model="client_post.phone" type="text" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="item form-group">
                                        <h6> Fax </h6>
                                        <input v-model="client_post.fax" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="modal-footer">
                                <button class="btn btn-primary" type="submit">Save</button>
                                <a class="btn btn-sm btn-white btn-pure" data-dismiss="modal" href="javascript:void(0)">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <!-- End Add Payments Form -->
    </div>
</template>
<script>
export default {
    data(){
        return{
            clients:[],
            client_post:{
                nama: '',
                alamat: '',
                email: '',
                phone: '',
                fax: '',
                //for editing and deleteing
                client_id:''
            },
            api_key:this.token,
            filter:'',
            sort_asc : true,
            sortBy:'',
        }
    },

    props:['token'],

    computed:{
        adv_filtering:function(){
            let result = this.clients;

            if(this.filter){
                result = result.filter(item => 
                    item.name.includes(this.filter)
                );
            }

            let asc_desc = this.sort_asc ? 1 : -1;

            if (this.sortBy = 'nama') {
                return result.sort((a,b)=> asc_desc * a.name.localeCompare(b.name))
            }
            if (this.sortBy = 'alamat') {
                return result.sort((a,b)=> asc_desc * a.address.localeCompare(b.address))
            }
            if (this.sortBy = 'email') {
                return result.sort((a,b)=> asc_desc * a.email.localeCompare(b.email))
            }

            return result;
        }
    },

    created(){
        this.fetchClient();
    },

    methods:{
    //fetching data
    fetchClient(){
        fetch('/api/client',{
            method:'get',
            headers:{
                'Accept' : 'application/json',
                'Authorization' : 'Bearer ' + this.api_key 
            }
        })
        .then(res => res.json())
        .then(res => {
            this.clients = res.data;
        })
        .catch(err => console.log(err));
    },
    //-------------------------------------------
    //Crud's methods
    StoreClient(){
        fetch('/api/client/store',{
            method:'post',
            body:JSON.stringify(this.client_post),
            headers:{
                'Content-Type' : 'applications/json',
                'Authorization': 'Bearer ' + this.api_key
            }
        })
        .then(res => res.data)
        .then(data => {
            this.client_post.nama   = '';
            this.client_post.alamat = '';
            this.client_post.email  = '';
            this.client_post.phone  = '';
            this.client_post.fax    = '';

            this.fetchClient();
        })
        .catch(err => console.log(err));
    },

    EditClient(params){
        this.client_post.nama   = params.name;
        this.client_post.alamat = params.address;
        this.client_post.email  = params.email;
        this.client_post.phone  = params.phone;
        this.client_post.fax    = params.fax;
        this.client_post.client_id = params.id;
    },

    UpdateClient(params){
        fetch(`/api/client/update/${params}`,{
            method:'put',
            body:JSON.stringify(this.client_post),
            headers:{
                'Content-Type' : 'applications/json',
                'Authorization': 'Bearer ' + this.api_key
            }
        })
        .then(res => res.json)
        .then(res => {
            this.client_post.nama   = '';
            this.client_post.alamat = '';
            this.client_post.email  = '';
            this.client_post.phone  = '';
            this.client_post.fax    = '';

            this.fetchClient();
        })
        .catch(err => console.log(err));
    },

    DeleteClient(params){
        this.$swal({
            title: 'Anda Yakin?',
            text: "Data client akan terhapus permanent!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText : 'Tidak'
        }).then((result) => {
        if (result.value) {
            fetch(`/api/client/delete/${params}`,{
                method:'delete',
                headers:{
                    'Content-Type' : 'applications/json',
                    'Authorization': 'Bearer ' + this.api_key
                }
            })
            .then(res => res.json)
            .then(res => {
                  this.$swal(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
                this.fetchClient();
            })
            .catch(err => console.log(err));
          
        }
        })
      
    },
    //-------------------------------------------
    //Other Operations
    set_serting(params){
        let sortby = params;
        this.sortBy = sortby;

        //set active sorting
        this.sort_asc = !this.sort_asc;
    },
    //-------------------------------------------
    },
}
</script>

