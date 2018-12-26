<template>
    <div>
        <div class="page">
            <div class="page-content">
            <div class="row">
                <div class="col-xxl-9 col-xl-8 col-lg-12 col-xs-12">
                    <div class="card">
                        <div class="panel-heading" id="exampleHeadingOne" role="tab">
                        <a class="panel-title" data-parent="#exampleAccordion" data-toggle="collapse" href="#description"
                            aria-controls="description" aria-expanded="true">
                            <span class="pull-xs-right p-l-10">
                                <img class="navbar-brand-logo" :src="'../../assets/images/pome.png'" alt="...">
                            </span>
                            <h4 class="card-title project-title">
                            Project : {{project.project_name}} {{uid}}
                            </h4>
                        </a>
                        </div>
                        <div class="panel-collapse collapse" id="description" aria-labelledby="description"
                            role="tabpanel">
                        <div class="panel-body">
                            <h4 class="card-title">Deskripsi</h4>
                            {{project.project_desc}}
                        </div>
                        </div>
                        <div class="card-block">
                        <h4 class="card-title project-option-title">
                        {{steps.name}}
                            
                        </h4>
                        <div class="card card-bordered card-outline-primary">
                            <div class="card card-inverse">
                                <div class="card-block">
                                    <table class="table">
                                    <thead>
                                        <tr>
                                        <th>Leader</th>
                                        <th>Team</th>
                                        <th>End Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <td>
                                            <div class="media m-t-0">
                                                <div class="media-left text-middle">
                                                    <a href="javascript:void(0)" class="avatar">
                                                    <img :src="'http://localhost:8000/' + steps.leader.user_pic">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading font-size-14">{{steps.leader.user_name}}</h4>
                                                    <!-- <span>{{steps.leader.jobs.jabatan}}</span> -->
                                                </div>
                                            </div>
                                        </td>
                                        <td >
                                            <div v-for="(item, index) in task" :key="index" class="media m-t-0">
                                                <div class="media-left text-middle">
                                                    <a href="javascript:void(0)" class="avatar">
                                                    <img :src="'http://localhost:8000/' + item.task_handler.user_pic">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading font-size-14">{{item.task_handler.user_name}}</h4>
                                                    <span>{{item.task_handler.jobs.jabatan}}</span>
                                                </div>
                                                </div>
                                        </td>
                                        <td>25/11/2018</td>
                                        </tr>
                                    </tbody>
                                    </table>
                                </div>
                                </div>
                        </div>
                        <div class="card card-bordered card-outline-primary">
                            <div class="card-block">
                            <h4 class="card-title">Task List
                                <button @click="set_steps(steps)" type="button" class="btn btn-pure btn-default icon md-plus btn-plus" data-target="#tambahTask" data-toggle="modal"></button>
                            </h4>
                                <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        
                                        <th class="text-nowrap">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in task" :key="index">
                                        <td>
                                            {{item.task_id}}
                                        </td>
                                    
                                        <td class="name">
                                            <div class="table-content">
                                            <p class="blue-grey-500">{{item.task_name}}</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div v-if="item.task_status == null">
                                                Belum Ditetapkan
                                            </div>
                                            <div v-else>
                                                {{item.task_status}}
                                            </div>
                                        </td>
                                        
                                        <td class="text-nowrap">
                                             <button type="button" @click="edit(item)" data-toggle="modal" data-target="#editTask" class="btn btn-icon btn-warning btn-round waves-effect"><i class="icon md-edit" aria-hidden="true"></i></button>
                                         
                                            <button type="button" @click="delete_task(item.task_id)" class="btn btn-icon btn-danger btn-round waves-effect"><i class="icon md-delete" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                                </table>
                                <button type="button"  class="btn btn-primary" data-target="#file-download" data-toggle="modal">DOKUMENTASI</button>
                            </div>
                            <!-- Add Task -->
                            <div class="modal fade modal-fade-in-scale-up" id="tambahTask" aria-hidden="true"
                            aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                        </button>
                                        <h4 class="modal-title"> Tambah Task Baru </h4>
                                    </div>
                                    <form >
                                        <div class="modal-body">
                                            <div class="form-group form-material floating" data-plugin="formMaterial">
                                                <input v-model="task_post.task" type="text" class="form-control" name="inputDivisi">
                                                <label class="floating-label">Nama Task</label>
                                            </div>

                                            <div class="form-group form-material floating" data-plugin="formMaterial">
                                                <select v-model="task_post.handler" class="form-control">
                                                    <option v-for="(item, index) in user" :key="index" :value="item.user_id">{{item.user_name}}</option>
                                                </select>
                                                <label class="floating-label">Handler Task</label>
                                            </div>

                                            <div class="form-group form-material floating" data-plugin="formMaterial">
                                                <h6>Deadline</h6>
                                                <input v-model="task_post.deadline" class="form-control" type="date">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-pure" data-dismiss="modal">Close</button>
                                            <button type="submit" @click="create()" data-dismiss = "modal" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>

                            <!-- download Document Form -->
                            <div id="file-download" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="classInfo" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                        ×
                                        </button>
                                        <h4 class="modal-title" id="classModalLabel">
                                            Download Document
                                            </h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div v-for="lv2 in task" :key="lv2.task_id">
                                                 <div v-for="item in lv2.task_document" :key="item.id">
                                        <div class="col-sm-6">
                                            <div class="card text-center" style="width: 18rem;">
                                            <div class="card-body" >
                                               <center>
                                                <h4 class="card-title">Dokumen : {{item.document_name}}</h4>
                                                <p class="card-text">{{item.deskripsi}}</p>
                                                <a :href="'/document/download/' + item.document_id" class="btn btn-icon btn-primary btn-round waves-effect">DOWNLOAD  </a>
                                                </center>
                                               
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                        </div>
                                        </div>
                                    </div>
                                    
                                    </div>
                                </div>
                                </div>


                            <!-- End download Document Task Form -->

                            <!-- Update Task -->
                            <div class="modal fade modal-fade-in-scale-up" id="editTask" aria-hidden="true"
                            aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                        </button>
                                        <h4 class="modal-title"> Edit Task Baru </h4>
                                    </div>
                                    <form >
                                        <div class="modal-body">
                                            <div class="form-group form-material floating" data-plugin="formMaterial">
                                                <input v-model="task_post.task" type="text" class="form-control" name="inputDivisi">
                                                <label class="floating-label">Nama Task</label>
                                            </div>

                                            <div class="form-group form-material floating" data-plugin="formMaterial">
                                                <select v-model="task_post.handler" class="form-control">
                                                    <option v-for="(item, index) in user" :key="index" :value="item.user_id">{{item.user_name}}</option>
                                                </select>
                                                <label class="floating-label">Handler Task</label>
                                            </div>

                                            <div class="form-group form-material floating" data-plugin="formMaterial">
                                                <h6>Deadline</h6>
                                                <input v-model="task_post.deadline" class="form-control" type="date">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-pure" data-dismiss="modal">Close</button>
                                            <button type="submit" @click="update(task_post.task_id)" data-dismiss = "modal" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
            
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-12 col-xs-12">
                <div class="card">
                    <div class="card-block">
                    <p class="m-b-10">
                        <span class="pull-xs-right p-l-10">{{project.project_Date}}</span>
                        Tanggal Mulai
                    </p>
                    <p>
                        <span class="pull-xs-right p-l-10">{{project.project_deadline}}</span>
                       Akhir
                    </p>
                    </div>
                    <div class="card-block">
                        <h4 class="project-option-title">Manager Proyek</h4>
                        <div class="media m-t-0">
                            <div class="media-left text-middle">
                            <a href="javascript:void(0)" class="avatar">
                                <img :src="'http://localhost:8000/' + project.userpm.user_pic">
                            </a>
                            </div>
                            <div class="media-body">
                            <h4 class="media-heading font-size-16">{{project.userpm.user_name}}</h4>
                            
                            </div>
                        </div>
                    </div>
                    <div class="card-block project-participators">
                        <h4 class="project-option-title">
                            Team
                        </h4>
                        <div v-for="(item, index) in task" :key="index" class="media m-t-0">
                            <div class="media-left text-middle">
                                <a href="javascript:void(0)" class="avatar">
                                    <img :src="'http://localhost:8000/' + item.task_handler.user_pic">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading font-size-14">{{item.task_handler.user_name}}</h4>
                                
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return {
            project:{},
            task:[],
            user:[],
            steps:[],
            api_key:this.token,
            set_id:this.id,
            user_id:this.uid,

            //property for cruds
            task_post:{
                task:'',
                step:'',
                handler:'',
                deadline:'',
                finish:'',
                //indenpendent data
                status:'',
                //non input-able data
                project:this.id,
                //upon updating data
                task_id:'',
            },

            //filtering property
            filterBy:'',
        }
    },

    props:['id','token','uid'],

    created(){
        this.project_fetch();
        this.task_data();
        this.user_fetch();
        this.basic();
    },

    computed:{
        filtering: function() {
            //filtering data
        }
    },

    methods:{
        //fetching data
        project_fetch(){
            this.project = 'Loading...'

            let headers_data = {
                'Accept' : 'application/json',
                'X-Requested-With' : 'XMLHttpRequest',
                'Authorization' : 'Bearer ' + this.api_key
            }

            var vm = this;

            axios.get('/api/project/' + this.id,{headers:headers_data })
            .then(function(response){
                vm.project = response.data;
            })
            .catch(function(err){
                vm.project = 'Upss...' + err;
            })
        },

        task_data(){
            fetch(`/api/taskdata/sl/${this.user_id}`,{
                method:'get',
                headers:{
                    'Accept':'application/json',
                    'Authorization':'Bearer ' + this.api_key
                }
            })
            .then(res => res.json())
            .then(res => {
                this.task = res.data;
                console.log(this.task);
            })
            .catch(err=>console.log(err))
        },

        user_fetch(){
            fetch('/api/user',{
                method:'get',
                headers:{
                    'Accept':'application/json',
                    'Authorization':'Bearer ' + this.api_key
                }
            })
            .then(res => res.json())
            .then(res => {
                this.user = res.data;
            })
            .catch(err => console.log(err))
        },

        basic(){
            fetch(`/api/taskdata/sl/basic/${this.user_id}`,{
                method:'get',
                headers:{
                    'Accept':'application/json',
                    'Authorization':'Bearer ' + this.api_key
                }
            })
            .then(res => res.json())
            .then(res => {
                this.steps = res.data
            })
            .catch(err => console.log(err))
        },
        //-------------------------------------

        //CRUDs Operations
        create(){
            fetch('/api/task/store',{
                method:'post',
                body:JSON.stringify(this.task_post),
                headers:{
                    'Content-Type':'application/json',
                    'Authorization':'Bearer ' + this.api_key
                }
            })
            .then(res => res.data)
            .then(data => {
                this.task_post.task ='' ;
                this.task_post.step ='' ;
                this.task_post.handler ='' ;
                this.task_post.deadline ='' ;
                this.task_post.status ='' ;
                this.task_post.task_id ='' ;
                this.task_data();
            })
            .catch(err => console.log());
        },

        edit(params){
            this.task_post.task = params.task_name;
            this.task_post.step = params.task_steps.id;
            this.task_post.handler = params.task_handler.user_id;
            this.task_post.deadline = params.deadline;
            this.task_post.task_id = params.task_id;
        },

        update(params){
            fetch(`/api/task/update/${params}`,{
                method:'put',
                body:JSON.stringify(this.task_post),
                headers:{
                    'Content-Type':'application/json',
                    'Authorization':'Bearer ' + this.api_key
                }
            })
            .then(res => res.json)
            .then(res =>{
                this.task_post.task ='' ;
                this.task_post.step ='' ;
                this.task_post.handler ='' ;
                this.task_post.deadline ='' ;
                this.task_post.status ='' ;
                this.task_post.task_id ='' ;
                this.task_data();
            })
            .catch(err => console.log());
        },

        delete_task(params){
            this.$swal({
            title: 'Anda Yakin?',
            text: "Task akan terhapus permanent!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak',
            }).then((result) => {
                if (result.value) {
                    fetch(`/api/task/delete/${params}`,{
                        method:'delete',
                        headers:{
                            'Content-Type':'application/json',
                            'Authorization':'Bearer ' + this.api_key
                        }
                    })
                    .then(res => res.data)
                    .then(data => {
                        this.$swal(
                            'Terhapus!',
                            'Data task Telah terhapus.',
                            'success'
                        );
                        this.task_data();
                    })
                    .catch(err => console.log());
                }
            })
        },
        //-------------------------------------

        //Others Operations
        set_filter(filter_params){
            let filterBy = filter_params;
            this.filterBy = filterBy;
        },

        set_steps(params){
            let steps_id = params.id;

            this.task_post.step = steps_id;
        },

        //-------------------------------------
    },

}
</script>
