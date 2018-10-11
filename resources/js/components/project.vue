<template>
    <div>
        <div class="page-header">
            
            <h4 class="page-title">
                Project {{id}}
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

        <div class="page-center container-fluid">
            <div class="panel">

                <!-- Modal Project -->
                <div class="modal fade createp" tabindex="-1" role="dialog" aria-labelledby="createproject" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="karyawan">Create Project</h4>
                            </div>
                            <div class="modal-body">
                                <form @submit.prevent="storeProject" class="form-horizontal form-label-left" novalidate>
                                    <div class="item form-group">
                                        <h6 class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_lengkap">Nama Project</h6>
                                        <div class="col-md-10 col-sm-6 col-xs-12">
                                            <input id="nama_karyawan" v-model="project_post.nama_project" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"  placeholder="Nama Project" required="required" type="text">
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                        <h6 class="control-label col-md-3 col-sm-3 col-xs-12" for="Posisi">Client</h6>
                                            <div class="col-md-10 col-sm-6 col-xs-12">
                                                <input id="posisi" v-model="project_post.client" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" placeholder="Client" required="required" type="text">
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
                                                <input id="posisi" v-model="project_post.client" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" placeholder="Client" required="required" type="text">
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
                <div class="modal fade example-modal-lg in" id="detailproj" aria-hidden="true" aria-labelledby="exampleModalTabs"
                role="dialog" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title" id="exampleModalTabs">View Project</h4>
                        </div>
                        <ul class="nav nav-tabs nav-tabs-line" role="tablist">
                            <li class="nav-item" role="presentation"><a class="nav-link active" data-toggle="tab" href="#home"
                                aria-controls="exampleLine1" role="tab">Home</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="#team"
                                aria-controls="exampleLine2" role="tab">Team</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="#task"
                                aria-controls="exampleLine3" role="tab">Task</a></li>
                        </ul>
                        <div class="modal-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="home" role="tabpanel">
                                <span class="font-size-16 font-weight-400 blue-grey-500">Project Preview</span>
                                <div class="card-block">
                                    <h5 class="card-title font-weight-100"><b>{{detailContainer.nama_project}}</b></h5>
                                    <h5 class="card-title font-weight-100" style="text-align:right"> Project Manager {{ detailContainer.pm }}</h5>
                                    <h5 class="card-title font-weight-100" style="text-align:right"> {{ detailContainer.pmnip }}</h5>
                                    <p style="text-align:right" class="card-text">
                                        <small>Dibuat {{detailContainer.project_added}}</small>
                                    </p>
                                    <hr>
                                
                                    <p class="card-text">{{detailContainer.deskripsi_project}} </p>
                                </div>
                            </div>
                            <div class="tab-pane" id="team" role="tabpanel">
                                team
                            </div>
                            <div class="tab-pane" id="task" role="tabpanel">
                                Task
                            </div>
                        </div>
                        </div>
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
                            <th scope="col">Progres</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="project in advfiltering" v-bind:key="project.id">
                            <td>{{project.project_id}}</td>
                            <td><a :href="'/setting/'+project.project_id">{{project.project_name}}</a></td>
                            <td>{{project.userpm.name}}</td>
                            <td>{{project.project_client}}</td>
                            <td>{{project.project_Date}}</td>
                            <td>{{project.project_deadline}}</td>
                            <td></td>
                            <td>
                                <div class="btn-group" aria-label="basic example" role="group">
                                    <button @click="detailProj(project)" class="btn btn-sm btn-primary waves-effect" data-target="#detailproj" data-toggle="modal" type="button">Detail</button>
                                    <button type="button" @click="deleteProject(project.project_id)" class="btn btn-sm btn-primary waves-effect"><i class="icon wb-trash" aria-hidden="true"></i> Delete</button>
                                    <button type="button" @click="edit(project)" class="btn btn-sm btn-primary waves-effect" data-toggle="modal" data-target=".editp"><i class="icon wb-edit" aria-hidden="true"></i> Edit</button>
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
</template>

<script>
export default {
    data(){
        return{
            project:[],

            userlist:[],

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

            detailContainer:{
                nama_project:'',
                project_added:'',
                deskripsi_project:'',
                client:'',
                deadline:'',
                pm:'',
                pmnip:'',
            },
            
            pagination:{},

            api_key : this.token,
            sort_asc: true,
        }
    },

    props:['token'],

    created(){
        this.fetchProject();
        this.fetchuser();
    },

    computed:{
        filtering:function() {
            return this.project.filter((project)=> {
                return project.project_name.match(this.search);
            })
        },


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
                return result.sort((a,b) => asc_desc * a.project_client.localeCompare(b.project_client))
            }

            if (this.sortby == 'pm') {
                return result.sort((a,b) => asc_desc * a.userpm.name.localeCompare(b.userpm.name))
            }

            return  result;
        },


    },
    
    methods:{
        fetchProject(url){
            let vm = this;

            url = url || 'api/project'
            fetch(url,{
                method:'get',
                headers:{
                    'Accept' :'application/json',
                    'X-Requested-With' : 'XMLHttpRequest',
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
                    'X-Requested-With' : 'XMLHttpRequest',
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
            this.project_post.client            = project.project_client;
            this.project_post.deadline          = project.project_deadline;
            this.project_post.tgl_mulai         = project.project_Date;
            this.project_post.uid               = project.userpm.id;
            this.project_post.project_man       = project.userpm.name;

        },

        detailProj(project){
            this.detailContainer.nama_project = project.project_name;
            this.detailContainer.project_added = project.project_added;
            this.detailContainer.deskripsi_project = project.project_desc;
            this.detailContainer.client = project.project_client;
            this.detailContainer.deadline = project.project_deadline;
            this.detailContainer.pm = project.userpm.name;
            this.detailContainer.pmnip = project.userpm.nip;
            this.detailContainer.pmpic = project.userpm.image;
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
            if (confirm('Hapus Project ini?.')) {
            fetch(`api/project/delete/${project_id}`,{
                method:'delete',
                headers:{
                    'Content-Type':'application/json',
                    'Authorization' : 'Bearer ' + this.api_key
                }        
            })
            .then(res => res.data)
            .then(data => {
                alert('Project terhapus');
                this.fetchProject();
            })
            .catch(err=>console.log(err));
            }
        }

    }
}
</script>
