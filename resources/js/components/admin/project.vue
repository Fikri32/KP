<template>
    <div>
        
        <side-menu></side-menu>

        <div class="page-main">

            <div class="page-header">
                
                <h4 class="page-title">
                    Project
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

                    <!-- Modal Project -->
                    <div class="modal fade createp" tabindex="-1" role="dialog" aria-labelledby="createproject" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="karyawan">Create Project</h4>
                                </div>
                                
                                <form @submit.prevent="storeProject" class="form-horizontal form-label-left" novalidate>
                                    
                                    <div class="modal-body">
                                        <div class="item form-group">
                                        <h6 class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_lengkap">Nama Project</h6>
                                        <div class="col-md-10 col-sm-6 col-xs-12">
                                            <input id="nama_karyawan" v-model="project_post.nama_project" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"  placeholder="Nama Project" required="required" type="text">
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                        <h6 class="control-label col-md-3 col-sm-3 col-xs-12" for="Posisi">Client</h6>
                                            <div class="col-md-10 col-sm-6 col-xs-12">
                                                <select v-model="project_post.client" class="form-control">
                                                    <option v-for="item in client" :key="item.id" :value="item.id">{{item.name}}</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <h6 class="control-label col-md-3 col-sm-3 col-xs-12" for="Posisi">Deskripsi Project</h6>
                                            <div class="col-md-10 col-sm-6 col-xs-12">
                                                <textarea v-model="project_post.deskripsi_project" class="form-control" id="textareaDefault" rows="3"></textarea>
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                        <h6 class="control-label col-md-3 col-sm-3 col-xs-12" for="Posisi">Tanggal Mulai</h6>
                                            <div class="col-md-10 col-sm-6 col-xs-12">
                                                <input id="posisi" v-model="project_post.tgl_mulai" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" placeholder="Client" required="required" type="date">
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                        <h6 class="control-label col-md-3 col-sm-3 col-xs-12" for="Posisi">Deadline</h6>
                                            <div class="col-md-10 col-sm-6 col-xs-12">
                                                <input id="posisi" v-model="project_post.deadline" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" placeholder="Client" required="required" type="date">
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <h6 class="control-label col-md-3 col-sm-3 col-xs-12" for="Posisi">Project Manager debug UID : {{project_post.uid}}</h6>

                                            <div class="col-md-10 col-sm-6 col-xs-12">
                                                <select v-model="project_post.uid" class="form-control">
                                                    <option v-for="userlist in userlist" v-bind:key="userlist.user_id" :value="userlist.user_id">{{userlist.user_name}}-{{userlist.jobs.jabatan}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                    </div>

                               
                                    <div class="ln_solid"></div>
                                    <div class="modal-footer">
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                            <hr>
                                            <button type="reset" class="btn btn-primary">Reset</button>
                                            <button type="submit" class="btn btn-success">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                    <!-- end row modal createproject -->
            
                    <!-- Modal Project -->
                    <div class="modal fade editp" tabindex="-1" role="dialog" aria-labelledby="editproject" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title" id="karyawan">Edit Project</h4>
                                </div>
                                <div class="modal-body">
                                    <form @submit.prevent="update(project_post.project_id)" class="form-horizontal form-label-left" novalidate>
                                        <div class="item form-group">
                                            <h6 class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_lengkap">Nama Project</h6>
                                            <div class="col-md-10 col-sm-6 col-xs-12">
                                                <input id="nama_karyawan" v-model="project_post.nama_project" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"  placeholder="Nama Project" required="required" type="text">
                                                </div>
                                            </div>

                                            <div class="item form-group">
                                                <h6 class="control-label col-md-3 col-sm-3 col-xs-12" for="Posisi">Client</h6>
                                                <div class="col-md-10 col-sm-6 col-xs-12">
                                                    <select v-model="project_post.client" class="form-control">
                                                        <option v-for="item in client" :key="item.id" :value="item.id">{{item.name}}</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="item form-group">
                                                <h6 class="control-label col-md-3 col-sm-3 col-xs-12" for="Posisi">Deskripsi Project</h6>
                                                <div class="col-md-10 col-sm-6 col-xs-12">
                                                    <textarea v-model="project_post.deskripsi_project" class="form-control" id="textareaDefault" rows="3"></textarea>
                                                </div>
                                            </div>

                                            <div class="item form-group">
                                            <h6 class="control-label col-md-3 col-sm-3 col-xs-12" for="Posisi">Tanggal Mulai</h6>
                                                <div class="col-md-10 col-sm-6 col-xs-12">
                                                    <input id="posisi" v-model="project_post.tgl_mulai" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" placeholder="Client" required="required" type="date">
                                                </div>
                                            </div>

                                            <div class="item form-group">
                                            <h6 class="control-label col-md-3 col-sm-3 col-xs-12" for="Posisi">Deadline</h6>
                                                <div class="col-md-10 col-sm-6 col-xs-12">
                                                    <input id="posisi" v-model="project_post.deadline" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" placeholder="Client" required="required" type="date">
                                                </div>
                                            </div>

                                            <div class="item form-group">
                                                <h6 class="control-label col-md-3 col-sm-3 col-xs-12" for="Posisi">Project Manager debug UID : {{project_post.uid}}</h6>

                                                <div class="col-md-10 col-sm-6 col-xs-12">
                                                    <select v-model="project_post.uid" class="form-control">
                                                        <option v-for="userlist in userlist" v-bind:key="userlist.user_id" :value="userlist.user_id">{{userlist.user_name}}</option>
                                                    </select>
                                                </div>
                                            </div>
                        
                                            <div class="ln_solid"></div>
                                            <div class="modal-footer">
                                                <div class="form-group">
                                                    <div class="col-md-6 col-md-offset-3">
                                                        <button type="reset" class="btn btn-primary">Reset</button>
                                                        <button type="submit" class="btn btn-success">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row modal edit project -->

                    <!-- Modal -->
                    <div class="modal fade" id="setting" aria-hidden="true" aria-labelledby="examplePositionCenter"
                    role="dialog" tabindex="-1">
                        <div class="modal-dialog modal-center">
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title">{{select_setting.selected}} #{{select_setting.id_project}}</h4>
                            </div>
                           
                            <form @submit.prevent="set_setting(select_setting.id_project)">
                            <div class="modal-body">
                            
                                <div class="item form-group">
                                    <div class="col-md-5 col-sm-3 col-xs-6">
                                        Pilih Setting debug:{{select_setting.id_setting}}
                                        <select v-model="select_setting.id_setting" class="form-control">
                                            <option v-for="item in setting" :key="item.id" :value="item.id"> {{item.name}} </option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default btn-pure" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                            </form>
                                
                            
                        </div>
                        </div>
                    </div>
                    <!-- End Modal -->

                    <div class="form-group form-material">
                        <button class="btn btn-primary waves-effect waves-light btn-sm" data-toggle="modal" data-target=".createp"><i class="icon md-plus" aria-hidden="true"></i>project</button>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th @click="setSort('name')" scope="col">Project <i class="icon wb-sort-vertical" aria-hidden="true"></i></th>
                                <th @click="setSort('pm')" scope="col">Project Manager <i class="icon wb-sort-vertical" aria-hidden="true"></i></th>
                                <th @click="setSort('client')" scope="col">Client <i class="icon wb-sort-vertical" aria-hidden="true"></i></th>
                                <th scope="col">Tanggal Mulai</th>
                                <th scope="col">Deadline</th>
                                <th scope="col">Setting</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="project in advfiltering" v-bind:key="project.id">

                                <td>{{project.project_id}}</td>
                                <td><a :href="'/actions/'+project.project_id">{{project.project_name}}</a></td>
                                <td>{{project.userpm.user_name}}</td>
                                <td>{{project.project_client.name}}</td>
                                <td>{{project.project_Date}}</td>
                                <td>{{project.project_deadline}}</td>
                                
                                <td v-if="project.setting == null">Setting Terhapus</td>
                                <td v-else>{{project.setting.name}}</td>

                                <td>
                                    <div class="btn-group" aria-label="basic example" role="group">
                                        <!-- <button @click="detailProj(project)" class="btn btn-sm btn-primary waves-effect" data-target="#detailproj" data-toggle="modal" type="button">Detail</button> -->
                                        <!-- <button type="button" @click="deleteProject(project.project_id)" class="btn btn-sm btn-primary waves-effect"><i class="icon wb-trash" aria-hidden="true"></i> Delete</button>
                                        <button type="button" @click="edit(project)" class="btn btn-sm btn-primary waves-effect" data-toggle="modal" data-target=".editp"><i class="icon wb-edit" aria-hidden="true"></i> Edit</button> -->
                                   
                                        <!--edit button kuy -->
                                        <button type="button" @click="edit(project)" data-toggle="modal" data-target=".editp" class="btn btn-floating btn-success btn-sm waves-effect"><i class="icon md-edit" aria-hidden="true"></i></button>
                                        <button type="button" @click="select(project)" data-toggle="modal" data-target="#setting" class="btn btn-floating btn-primary btn-sm waves-effect"><i class="icon md-assignment" aria-hidden="true"></i></button>
                                        <!--delete button kuy -->
                                        <button @click="deleteProject(project.project_id)"  class="btn btn-floating btn-warning btn-sm waves-effect"><i class="icon md-delete" aria-hidden="true"></i></button>
                                   
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li v-bind:class="[{disabled : !pagination.prev_page_url}]" class="page-item">
                                <a class="page-link" @click="fetchProject(pagination.prev_page_url)">
                                    Previous
                                </a>
                            </li>

                            <li class="page-item disabled"> 
                                <a class="page-link">
                                    Page {{ pagination.current_page }} of {{ pagination.last_page }}
                                </a>
                            </li>

                            <li v-bind:class="[{disabled : !pagination.next_page_url}]" class="page-item">
                                <a class="page-link" @click="fetchProject(pagination.next_page_url)">
                                    Next
                                </a>
                            </li>
                        </ul>
                    </nav>
                
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
            project:[],

            userlist:[],

            setting:[],

            client:[],

            search:'',

            sortby:'',

            project_post:{
                nama_project:'',
                deskripsi_project:'',
                client:'',
                deadline:'',
                tgl_mulai:'',
                uid:'',
                project_man:'',
            },

            select_setting:
            {
                id_setting : '',
                selected : '',
                id_project : '',
            },

            pagination:{},

            api_key : this.token,
            sort_asc: true,
        }
    },

    props:['token','id'],

    created(){
        this.fetchProject();
        this.fetchuser();
        this.fetchsetting();
        this.fetchClient();
    },

    computed:{
        advfiltering:function() {
            let result = this.project;
           
            if (this.search) {
                result = result.filter( item =>
                item.project_name.includes(this.search)
                );
            }

            
            let asc_desc = this.sort_asc ? 1 : -1;

            if (this.sortby == 'name') {
                return result.sort((a,b) => asc_desc * a.project_name.localeCompare(b.project_name))
            }
            
            if (this.sortby == 'client') {
                return result.sort((a,b) => asc_desc * a.project_client.name.localeCompare(b.project_client.name))
            }

            if (this.sortby == 'pm') {
                return result.sort((a,b) => asc_desc * a.userpm.user_name.localeCompare(b.userpm.name))
            }

            return  result;
        },
    },
    
    methods:{
        //Fetching Data
        fetchProject(url){
            let vm = this;

            url = url || 'api/project'
            fetch(url,{
                method:'get',
                headers:{
                    'Accept' :'application/json',
                    'Authorization' : 'Bearer ' + this.api_key
                },
            })
            .then(res => res.json())
            .then(
                res => {
                    this.project = res.data,
                    vm.makePagination(res.meta, res.links);
                }
            )
            .catch( err => console.log(err));
        },

        fetchuser(){
            fetch('api/user',{
                method:'get',
                headers:{
                    'Accept' :'application/json',
                    'Authorization' : 'Bearer ' + this.api_key
                }
            })
            .then(res => res.json())
            .then(
                res => {
                    this.userlist = res.data
                }
            )
            .catch(err => console.log(err));
        },

        fetchsetting(){
            fetch('/api/setting',{
                method:'get',
                headers:{
                    'Accept' : 'application/json',
                    'Authorization' :'Bearer ' + this.api_key
                }
            })
            .then(res => res.json())
            .then(res => {
                this.setting = res.data
            })
            .catch(error => console.log(error));
        },

        fetchClient(){
            fetch('/api/client',{
                method:'get',
                headers:{
                    'Accept':'application/json',
                    'Authorization': 'Bearer ' + this.api_key 
                },
            })
            .then(res => res.json())
            .then(res => {
                this.client = res.data;
            })
            .catch(err => console.log(err));
        },
        //----------------------------------------
        setSort( preg ){
             let sortby = preg;
             this.sortby = sortby;
             //invert sorting set
             this.sort_asc = !this.sort_asc;
        },

        makePagination(meta, links){
            let pagination = {
                    current_page : meta.current_page,
                    last_page : meta.last_page,
                    next_page_url : links.next,
                    prev_page_url : links.prev
            }
            this.pagination = pagination;
        },

        storeProject(){
            fetch('api/project/store',{
                method:'post',
                body:JSON.stringify(this.project_post),
                headers:{
                    'Content-Type':'application/json',
                    'Authorization' : 'Bearer ' + this.api_key
                }
            })
            .then(res => res.data)
            .then(
                data =>{
                    this.project_post.nama_project      = '';
                    this.project_post.deskripsi_project = '';
                    this.project_post.client            = '';
                    this.project_post.deadline          = '';
                    this.project_post.tgl_mulai         = '';
                    this.project_post.uid               = '';
                    this.fetchProject();
                }
            )
            .catch(err=>console.log(err));
        },

        edit(project){
            this.project_post.project_id        = project.project_id;
            this.project_post.nama_project      = project.project_name;
            this.project_post.deskripsi_project = project.project_desc;
            this.project_post.client            = project.project_client.id;
            this.project_post.deadline          = project.project_deadline;
            this.project_post.tgl_mulai         = project.project_Date;
            this.project_post.uid               = project.userpm.user_id;
        },

        select(project){
            this.select_setting.selected = project.project_name;
            this.select_setting.id_project = project.project_id;
        },

        set_setting(id_project){
            fetch(`/api/project/set_setting/${id_project}`,{
                method:'put',
                body    : JSON.stringify(this.select_setting),
                headers : {
                    'Content-Type':'application/json',
                    'Authorization' : 'Bearer ' + this.api_key
                }  
            })
            .then(res => res.json)
            .then(res => {
                this.select_setting.id_setting = '';
                this.fetchProject();
            })
            .catch(err => console.log(err));
        },

        update(project_id){
            fetch(`api/project/update/${project_id}`,{
                method  : 'put',
                body    : JSON.stringify(this.project_post),
                headers : {
                    'Content-Type':'application/json',
                    'Authorization' : 'Bearer ' + this.api_key
                }     
            })
            .then(res => res.json)
            .then(
                res =>{
                    this.project_post.nama_project      = '';
                    this.project_post.deskripsi_project = '';
                    this.project_post.client            = '';
                    this.project_post.deadline          = '';
                    this.project_post.uid               = '';
                    this.fetchProject();
                }
            )
            .catch(err=>console.log(err));
            
        },

        deleteProject(project_id){
            this.$swal({
                title: 'Anda Yakin?',
                text: "Project akan terhapus permanent.",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
            }).then((result) => {
                if (result.value) {
                    fetch(`api/project/delete/${project_id}`,{
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
                                'Data task Telah terhapus.',
                                'success'
                        );

                        this.fetchProject();
                    })
                    .catch(err=>console.log(err));
                }

            })
        },
    }
}
</script>
