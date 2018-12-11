<template>

    <div>
        <div class="page-content">
            <div class="row">
                <!-- Kolom Project Detail Tasklist dan Step -->
                <div class="col-xxl-9 col-xl-8 col-lg-12 col-xs-12">
                    <div class="card">

                        <div class="panel-heading" id="exampleHeadingOne" role="tab">
                            <a class="panel-title" data-parent="#exampleAccordion" data-toggle="collapse" href="#description" aria-controls="#description" aria-expanded="true">
                                <span class="pull-xs-right p-l-10">
                                    <img class="navbar-brand-logo" alt="...">
                                </span>
                                <h4 class="card-title project-title">
                                    Nama Proyek : {{singleProject.project_name}}<br>
                                    
                                    <hr>
                                </h4>
                            </a>
                        </div>

                        <div class="panel-collapse collapse" id="description" aria-labelledby="description" role="tabpanel">
                            <div class="panel-body">
                                <h4 class="card-title">Description</h4>
                                <p>{{singleProject.project_desc}}</p>
                                <hr>
                            </div>
                        </div>

                        <div class="card-block">
                            <div class="example-wrap">
                                <div  class="nav-tabs-horizontal" data-plugin="tabs">

                                    <ul  class="nav nav-tabs nav-tabs-solid" role="tablist">
                                        <li @click="set_filter('')" class="nav-item" role="presentation"><a class="nav-link active" data-toggle="tab" href="#stepone"
                                            aria-controls="stepone" role="tab">All</a></li>
                                        <li v-for="steps in singleProject.setting.steps" :key="steps.id" @click="set_filter(steps.name)" class="nav-item" role="presentation"><a class="nav-link active" data-toggle="tab" href="#perstep"
                                            aria-controls="perstep" role="tab">{{steps.name}}</a></li>
                                    </ul>
                                    <!-- v-for="item in filtering" :key="item.id" -->
                                    <div class="tab-content">
                                        <div  class="tab-pane active" id="perstep" role="tabpanel">
                                            <div  class="card card-inverse">
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
                                                    <tr v-for="(tasks, index) in filtering " :key="index">
                                                    <td>
                                                        <!-- Leader Task -->
                                                        <div class="media m-t-0">
                                                            <div v-if="tasks.task_steps.leader">
                                                                <div class="media-left text-middle">

                                                                    <div v-if="tasks.task_handler.user_pic">
                                                                        <a href="javascript:void(0)" class="avatar">
                                                                            <img :src="'http://localhost:8000/' + tasks.task_steps.leader.user_pic">
                                                                        </a>
                                                                    </div>
                                                                    <div v-else>
                                                                        <a href="javascript:void(0)" class="avatar">
                                                                            <img :src="'http://localhost:8000/' + 'defaultpic.jpg'">
                                                                        </a>
                                                                    </div>
                                                                                                
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading font-size-14">{{tasks.task_steps.leader.user_name}}</h4>
                                                                    <span>{{tasks.task_steps.name}}</span>
                                                                </div>
                                                            </div>
                                                            <div v-else>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading font-size-14">Belum Di Tentukan</h4>
                                                                    <span>{{tasks.task_steps.name}}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <!-- Handler Task -->
                                                        <div class="media m-t-0">
                                                            <div class="media-left text-middle">
                                                                <div v-if="tasks.task_handler.user_pic">
                                                                    <a href="javascript:void(0)" class="avatar">
                                                                        <img :src="'http://localhost:8000/' + tasks.task_handler.user_pic">
                                                                    </a>
                                                                </div>
                                                                <div v-else>
                                                                    <a href="javascript:void(0)" class="avatar">
                                                                        <img :src="'http://localhost:8000/' + 'defaultpic.jpg'">
                                                                    </a>
                                                                </div>                     
                                                            </div>
                                                            <div class="media-body">
                                                                <h4 class="media-heading font-size-14">{{tasks.task_handler.user_name}}</h4>
                                                                <span>{{tasks.task_name}}</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{tasks.task_deadline}}</td>
                                                    </tr>
                                                </tbody>
                                                </table>
                                            </div>
                                            </div>
                                            <div class="card card-bordered card-outline-primary">
                                                <div class="card-block">
                                                    <h4 class="card-title">
                                                        Task List
                                                        <button type="button" class="btn btn-pure btn-default icon md-plus btn-plus" data-target="#taskstruct" data-toggle="modal"></button>
                                                    </h4>
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                            <th>#</th>
                                                            <th>    
                                                                Task 
                                                            </th>
                                                            <th>
                                                                Handler 
                                                            </th>
                                                            <th>
                                                                Status 
                                                            </th>
                                                            <th>Deadline</th>
                                                            <th>Tgl Selesai</th>
                                                            <th>File</th>
                                                            <th class="text-nowrap">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            
                                                            <tr v-for="(tasks, index) in filtering " :key="index">
                                                            <td>
                                                                <span class="checkbox-custom checkbox-primary">
                                                                <input class="selectable-item" type="checkbox" id="row-619" value="619">
                                                                <label for="row-619"></label>
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <div class="table-content">
                                                                <p class="blue-grey-500"> {{tasks.task_name}}</p>
                                                                </div></td>
                                                            <td>
                                                                    {{tasks.task_handler.user_name}} 
                                                            </td>
                                                            <td>
                                                                <div v-if="tasks.task_status == null">
                                                                    Belum Ditetapkan
                                                                </div>
                                                                <div v-else>
                                                                    {{tasks.task_status}}
                                                                </div>
                                                            </td>
                                                            <td>{{tasks.task_deadline}}</td>
                                                            <td>
                                                                {{tasks.task_finish}}
                                                            </td>
                                                            <td class="work-status">
                                                                <button type="button" class="btn btn-primary" data-target="#file-download" data-toggle="modal">SEE DETAILS</button>
                                                            </td>
                                                            <td class="text-nowrap">
                                                                <button type="button" @click="selectTask(tasks)" data-toggle="modal" data-target="#statustask" class="btn btn-icon btn-primary btn-round waves-effect"><i class="icon md-assignment" aria-hidden="true"></i></button>
                                                                <button type="button" @click="editTask(tasks)" data-toggle="modal" data-target="#edittask" class="btn btn-icon btn-warning btn-round waves-effect"><i class="icon md-edit" aria-hidden="true"></i></button>
                                                                <button type="button" @click="deleteTask(tasks.task_id)" class="btn btn-icon btn-danger btn-round waves-effect"><i class="icon md-delete" aria-hidden="true"></i></button>
                                                                
                                                                
                                                                <!-- <button type="button" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip"
                                                                data-original-title="Massage">
                                                                <i class="icon md-comment" aria-hidden="true"></i>
                                                                </button> -->
                                                            </td>
                                                            </tr>
                                                            
                                                        </tbody>
                                                    </table>
                                                    <div>
                                                        <button type="button" class="btn btn-success" data-toggle="button">
                                                        <span class="text">SAVE</span>
                                                        </button>
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
                <!--AKHIR!!! Kolom Project Detail Tasklist dan Step -->

                <!-- Kolom anggota tim,PM,dll -->
                <div class="col-xxl-3 col-xl-4 col-lg-12 col-xs-12">
                    <div class="card">
                        <!-- Date -->
                        <div class="card-block">

                            <p class="m-b-10">
                                <span class="pull-xs-right p-l-10">{{singleProject.project_Date}}</span>
                                Tanggal Mulai 
                            </p>

                            <p>
                                <span class="pull-xs-right p-l-10">{{singleProject.project_deadline}}</span>
                                Akhir 
                            </p>
                                
                            <div class="progress progress-lg">
                                <div class="progress-bar progress-bar-indicating active" style="width: 60%;" role="progressbar">
                                60%
                                </div>
                            </div>
                            <hr>
                        </div>
                        <!-- Proyek Manager -->
                        <div class="card-block">

                            <h4 class="project-option-title">Manager Proyek</h4>

                            <div class="media m-t-0">
                                <div class="media-left text-middle">
                                    <a href="javascript:void(0)" class="avatar">
                                        <img :src="'http://localhost:8000/' + singleProject.userpm.user_pic">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading font-size-16">{{singleProject.userpm.user_name}}</h4>
                                    <span>{{singleProject.userpm.jobs.jabatan}}</span>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <!-- TEAM -->
                        <div class="card-block project-participators">

                            <h4 class="project-option-title">
                                Team
                            </h4>

                            <!-- Add Task Form -->
                            <div class="modal fade" id="taskstruct" aria-hidden="true" aria-labelledby="addLabelForm"
                            role="dialog" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
                                            <h4 class="modal-title">Setup Task</h4>
                                        </div>
                                        
                                            <form @submit.prevent="createTask()">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <div class="item form-group">
                                                            <h6>Steps</h6>

                                                            <select v-for="item in project" :key="item.project_id" v-model="task_post.step" class="form-control">
                                                                <option v-for="item2 in item.setting.steps" :key="item2.id" :value="item2.id"> {{item2.name}} </option>
                                                            </select>
                                                        </div>

                                                        <div class="item form-group">
                                                            <h6>Nama Task</h6>

                                                            <input v-model="task_post.task" type="text" class="form-control">
                                                        </div>

                                                        <div class="item form-group">
                                                            <h6>Handler(Penanggung Jawab)</h6>
                                                            
                                                            <select v-model="task_post.handler"  class="form-control">
                                                                <option v-for="user in user" :key="user.user_id" :value="user.user_id"> {{user.user_name}}</option>
                                                            </select>
                                                        </div>

                                                        <div   class="item form-group">
                                                            <h6>Deadline</h6>

                                                            <input v-model="task_post.deadline" class="form-control" type="date">
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
                            <!-- End Add Task Form -->

                            <!-- Edit Task Form -->
                            <div class="modal fade" id="edittask" aria-hidden="true" aria-labelledby="addLabelForm"
                            role="dialog" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
                                            <h4 class="modal-title">Edit Task</h4>
                                        </div>
                                        
                                            <form @submit.prevent="updateTask(task_post.task_id)">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <div class="item form-group">
                                                            <h6>Steps</h6>

                                                            <select v-for="item in project" :key="item.project_id" v-model="task_post.step" class="form-control">
                                                                <option v-for="item2 in item.setting.steps" :key="item2.id" :value="item2.id"> {{item2.name}} </option>
                                                            </select>
                                                        </div>

                                                        <div class="item form-group">
                                                            <h6>Nama Task</h6>

                                                            <input v-model="task_post.task" type="text" class="form-control">
                                                        </div>

                                                        <div class="item form-group">
                                                            <h6>Handler(Penanggung Jawab)</h6>
                                                            
                                                            <select v-model="task_post.handler"  class="form-control">
                                                                <option v-for="user in user" :key="user.user_id" :value="user.user_id"> {{user.user_name}}</option>
                                                            </select>
                                                        </div>

                                                        <div   class="item form-group">
                                                            <h6>Deadline</h6>

                                                            <input v-model="task_post.deadline" class="form-control" type="date">
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
                            <!-- End Edit Task Form -->

                            <!-- Add Status Task Form -->
                            <div class="modal fade" id="statustask" aria-hidden="true" aria-labelledby="addLabelForm"
                            role="dialog" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
                                            <h4 class="modal-title">Status Task {{task_post.task}}</h4>
                                        </div>
                                        
                                            <form @submit.prevent="statusTaskreq(task_post.task_id)">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        
                                                        <div class="item form-group">
                                                            <h6>Status Task</h6>

                                                            <select v-model="task_post.status" class="form-control">
                                                                <option value="Pending">Pending</option>
                                                                <option value="Tahap Pengerjaan">Tahap Pengerjaan</option>
                                                                <option value="Selesai">Selesai</option>
                                                            </select>
                                                        </div>

                                                    
                                                        <div class="item form-group">
                                                            <h6>Tanggal Selesai</h6>

                                                            <input v-model="task_post.finish" type="date" class="form-control">
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
                            <!-- End Add Status Task Form -->
                            
                            

                            <div class="modal fade modal-fade-in-scale-up" id="tambahStaff" aria-hidden="true"
                            aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <h4 class="modal-title">Team Setup</h4>
                                        </div>

                                        <div class="modal-body">
                                            <form @submit.prevent="team_store">
                                                <div class="form-group form-material floating" data-plugin="formMaterial">
                                                    <select v-model="team_post.id_staff" class="form-control">
                                                        <option>&nbsp;</option>
                                                        <option v-for="item in user" :key="item.id" :value="item.user_id">{{item.user_name}} - {{item.jobs.jabatan}}</option>
                                                    </select>
                                                    <label class="floating-label">staff</label>
                                                </div>

                                                <div class="form-group form-material floating" data-plugin="formMaterial">
                                                    <select v-model="team_post.id_divisi" class="form-control">
                                                        <option>&nbsp;</option>
                                                        <option v-for="steps in singleProject.setting.steps" :key="steps.id" :value="steps.id">{{steps.name}}</option>
                                                    </select>
                                                    <label class="floating-label">Step/divisi</label>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default btn-pure" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="media m-t-0">
                                <div v-for="(tasks, index) in tasks " :key="index" >
                                    
                                        <div class="media-left text-middle">
                                            <a href="javascript:void(0)" class="avatar">
                                                <img :src="'http://localhost:8000/' + tasks.task_handler.user_pic">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading font-size-14">{{tasks.task_handler.user_name}}</h4>
                                            <span>{{tasks.task_steps.name}}</span>
                                        </div>
                                   
                                </div>
                            </div>
                       
                        </div>

                        <!-- Leader Steps -->
                        <div class="card-block">
                            <h4 class="card-title">
                                Leader Steps
                                <button type="button" class="btn btn-pure btn-default icon md-plus btn-plus" data-target="#StepsLeader" data-toggle="modal"></button>
                            </h4>
                            

                            <!-- Add Task Form -->
                            <div class="modal fade" id="StepsLeader" aria-hidden="true" aria-labelledby="StepsLeader"
                            role="dialog" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
                                            <h4 class="modal-title">Setup Task</h4>
                                        </div>
                                        
                                        <form @submit.prevent="setLeaderSteps()">
                                            <div class="modal-body">
                                                {{leader}}
                                                <div class="form-group">
                                                    <div class="item form-group">
                                                        <h6>Steps</h6>

                                                        <select  v-for="item in project" :key="item.project_id" v-model="leader.step" class="form-control">
                                                            <option v-for="item2 in item.setting.steps" :key="item2.id" :value="item2.id"> {{item2.name}} </option>
                                                        </select>
                                                    </div>

                                           
                                                    <div class="form-group">
                                                        <h6>Leader Steps</h6>
                                                        <select v-model="leader.leader" class="form-control">
                                                            <option>&nbsp;</option>
                                                            <option v-for="item in user" :key="item.id" :value="item.user_id">{{item.user_name}} - {{item.jobs.jabatan}}</option>
                                                        </select>
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
                            <!-- End Add Task Form -->
                        </div>

                    </div>
                </div>
                <!--AKHIR!!! Kolom anggota tim,PM,dll -->                
            </div>
        </div>
    </div>
   
</template>

<script>
export default {
    data(){
        return{
            singleProject:{},
            steps:{},
            tasks:{},
            id_sett:0,
            user:[],
            role:'',
            api_key: this.token,
            set_id : this.id,
            unames : this.uname,

            filterBy:'',

            team_post:{
                id_staff:'',
                id_divisi:''
            },

            leader : {
                step:'',
                leader:''
            },

            task_post:{
                task:'',
                step:'',
                handler:'',
                deadline:'',
                finish:'',
                //this data can change independently
                status:'',
                //---non inputable data
                project:this.id,
                //upon edits called
                task_id:'',
               
            },

            step_post :{
                id_setting:this.id,
            },


        }
    },

    computed:{
        filtering : function(){
            // let result = this.singleProject.setting.steps;
            let result = this.tasks;

            if (this.filterBy) {
                result = result.filter( item => 
                item.task_steps.name.includes(this.filterBy)
                );
            }

            return result;
        }
    },

    props:['token','id','uname'],

    created(){
        this.projdata();
        this.fetchSinge();
        this.taskdata();
        this.fetchUser();
    },

    methods:{
        //fetching data
        projdata(){
            fetch(`/api/task/${this.set_id}`,{
                method:'get',
                headers:{
                    'Accept' : 'application/json',
                    'Authorization': 'Bearer ' + this.api_key,
                }
            })
            .then(res => res.json())
            .then(res => {
                this.project = res.data
            })
            .catch(err=>console.log(err))
            
        },

        fetchSinge(){
            this.singleProject = 'Loading...'

            let head_axios = {
                'Accept' :'application/json',
                'X-Requested-With' : 'XMLHttpRequest',
                'Authorization' : 'Bearer ' + this.api_key
            }

            var vm = this;

            axios.get('/api/project/' + this.id,{headers:head_axios})
            .then(function(response){
                vm.singleProject = response.data;
            })
            .catch(function(error){
                vm.singleProject = 'Upss...' + error;
            })
        },

        fetchUser(){
            fetch('/api/user',{
                method:'get',
                headers:{
                    'Accept' :'application/json',
                    'X-Requested-With' : 'XMLHttpRequest',
                    'Authorization' : 'Bearer ' + this.api_key
                }
            })
            .then(res => res.json())
            .then(
                res =>{
                    this.user = res.data
                }
            )
            .catch(error => console.log(error));
        },
        
        taskdata(){
            fetch(`/api/taskdata/${this.set_id}`,{
                method:'get',
                headers:{
                    'Accept' : 'application/json',
                    'Authorization': 'Bearer ' + this.api_key,
                }
            })
            .then(res => res.json())
            .then(res => {
                this.tasks = res.data
            })
            .catch(err=>console.log(err))
        },
        //---------------------------------

        //CRUDS Operations
        createTask(){
            fetch('/api/task/store',{
                method:'post',
                body:JSON.stringify(this.task_post),
                headers:{
                    'Content-Type' : 'application/json',
                    'Authorization': 'Bearer ' + this.api_key
                }
            })
            .then(res => res.data)
            .then(data => {
                this.task_post.task = '';
                this.task_post.step = '';
                // this.task_post.leader='';
                this.task_post.handler = '';
                this.task_post.status = '';
                this.task_post.deadline = '';
                this.task_post.finish = '';
                //have default value
                this.task_post.project = this.set_id;
                this.taskdata();
            })
            .catch(err => console.log(err));
        },

        editTask(params){
                this.task_post.task = params.task_name;
                this.task_post.step = params.task_steps.id;
                this.task_post.handler = params.task_handler.user_id;
                this.task_post.status = params.task_status;
                this.task_post.deadline = params.task_deadline;
                this.task_post.finish = params.task_finish;
                this.task_post.task_id = params.task_id;
               
        },

        updateTask(params){
            fetch(`/api/task/update/${params}`,{
                method:'put',
                body:JSON.stringify(this.task_post),
                headers:{
                    'Content-Type' : 'application/json',
                    'Authorization': 'Bearer ' + this.api_key
                }
            })
            .then(res => res.json)
            .then(res => {
                this.task_post.task = '';
                this.task_post.step = '';
                this.task_post.handler = '';
                this.task_post.status = '';
                this.task_post.deadline = '';
                this.task_post.finish = '';
                this.taskdata();
            })
            .catch(err => console.log(err));

        },

        deleteTask(params){
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
                            },
                        })
                        .then(res => res.data)
                        .then(data => {
                            this.$swal(
                                'Terhapus!',
                                'Data task Telah terhapus.',
                                'success'
                            );
                            this.taskdata();
                        })
                        .catch(err=>console.log(err))
                }
            })
        },

        selectTask(params){
            this.task_post.task_id = params.task_id;
            this.task_post.status = params.task_status;
            this.task_post.finish = params.task_finish;
        },

        statusTaskreq(params){
            fetch(`/api/task/status/${params}`,{
                method:'put',
                body:JSON.stringify(this.task_post),
                headers:{
                    'Content-Type':'application/json',
                    'Authorization':'Bearer ' + this.api_key
                }
            })
            .then(res => res.json)
            .then(res => {
                this.task_post.status;
                this.task_post.finish;
                this.taskdata();
            })
            .catch(err => consle.log(err))
        },
        //----------------------------------

        //leadersteps
        setLeaderSteps()
        {
            fetch('/api/steps/leader',{
                method:'put',
                body:JSON.stringify(this.leader),
                headers:{
                    'Content-Type' : 'application/json',
                    'Authorization' : 'Bearer ' + this.api_key
                }
            })
            .then(res => res.json)
            .then(res => {
                this.leader.leader = '';
                this.leader.step = '';
                this.taskdata();
            })
            .catch(err => console.log(err))
        },
        //----------------------------------

        //Others Operations
        set_filter(filter_params){
            let filterBy = filter_params;
            this.filterBy = filterBy;
        },
        //----------------------------------
    }
}
</script>
