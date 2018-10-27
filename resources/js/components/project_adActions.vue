<template>
    <div>

        <div class="page-aside">
            <div class="page-aside-inner page-aside-scroll">
               
                <div data-role="container">
                    <div data-role="content">
                        
                        <div class="page-aside-section">
                            <h5 class="page-aside-title">Main</h5>
                            <div class="list-group">
                                <a class="list-group-item" href="/project"><i class="icon md-view-dashboard" aria-hidden="true"></i>Project List</a>
                                <a class="list-group-item" href="/Setting"><i class="icon md-assignment" aria-hidden="true"></i>Setting Project</a>
                                <a class="list-group-item" href="#"><i class="icon md-money" aria-hidden="true"></i>Pembayaran</a>
                            </div>
                        </div>

                        <div class="page-aside-section">
                            <h5 class="page-aside-title">Step</h5>
                            <div class="list-group has-actions">
                            
                            <div class="list-group-item">
                                <div class="list-content">
                                    <span @click="defaultFilter()" class="list-text">Semua Task</span>
                                </div>
                            </div>

                            <div v-for="item in project" :key="item.project_id">

                                <div v-for="item2 in item.setting.steps" :key="item2.id"  class="list-group-item" data-plugin="editlist">
                                    <div  class="list-content">
                                        <span @click="filterby(item2.name)" class="list-text">{{item2.name}}</span>
                                    </div>
                                </div>

                            </div>
                            
                            </div>
                        </div>

                    </div>
                </div>
                
            </div>
        </div>

        <!-- Tasks Content -->
        <div class="page-main">
            <!-- Tasks Content Header -->
            <div class="page-header">
                <h1 class="page-title"> {{project[0].project_name}}</h1>
                <div class="page-header-actions">
                  <!-- Header Actions  -->
                </div>
            </div>
            <!-- Tasks Content -->
            <div id="contactsContent" class="page-content page-content-table">
                 <!-- Actions -->
                <div class="page-content-actions">
                    <div class="pull-xs-left">
                        <button data-toggle="modal" data-target="#taskstruct" type="button" class="btn btn-primary btn-md empty-btn">Tambah Task</button>
                    </div>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th @click="sorting('task')">
                                <div v-if="sort_asc == true">
                                    Task <i class="icon wb-sort-des" aria-hidden="true"></i>
                                </div>
                                <div v-else>
                                    Task <i class="icon wb-sort-asc" aria-hidden="true"></i>
                                </div>
                            </th>
                            <th @click="sorting('handler')">
                                <div v-if="sort_asc == true">
                                    Handler <i class="icon wb-sort-des" aria-hidden="true"></i>
                                </div>
                                <div v-else>
                                    Handler <i class="icon wb-sort-asc" aria-hidden="true"></i>
                                </div>
                            </th>
                            <th @click="sorting('step')">
                                <div v-if="sort_asc == true">
                                    Step <i class="icon wb-sort-des" aria-hidden="true"></i>
                                </div>
                                <div v-else>
                                    Step <i class="icon wb-sort-asc" aria-hidden="true"></i>
                                </div>
                                
                            </th>
                            <th @click="sorting('status')">
                                <div v-if="sort_asc == true">
                                    Status <i class="icon wb-sort-des" aria-hidden="true"></i>
                                </div>
                                <div v-else>
                                    Status <i class="icon wb-sort-asc" aria-hidden="true"></i>
                                </div>
                                
                            </th>
                            <th>Deadline</th>
                            <th>Tanggal Selesai</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <tr v-for="item in filtering" :key="item.task_id">
                            <td>
                                {{item.task_id}}
                            </td>
                            <td>
                                {{item.task_name}}
                            </td>
                            <td>
                                {{item.task_handler.user_name}} 
                            </td>
                            <td>
                                {{item.task_steps.name}}
                            </td>
                            <td>
                                <div v-if="item.task_status == null">
                                    Belum Ditetapkan
                                </div>
                                <div v-else>
                                    {{item.task_status}}
                                </div>
                            </td>
                            <td>
                                {{item.task_deadline}}
                            </td>
                            <td>
                                {{item.task_finish}}
                            </td>
                            <td>
                                <button type="button" @click="selectTask(item)" data-toggle="modal" data-target="#statustask" class="btn btn-icon btn-primary btn-round waves-effect"><i class="icon md-assignment" aria-hidden="true"></i></button>
                                <button type="button" @click="editTask(item)" data-toggle="modal" data-target="#edittask" class="btn btn-icon btn-warning btn-round waves-effect"><i class="icon md-edit" aria-hidden="true"></i></button>
                                <button type="button" @click="deleteTask(item.task_id)" class="btn btn-icon btn-danger btn-round waves-effect"><i class="icon md-delete" aria-hidden="true"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
    
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
                                                    <option v-for="user in userlist" :key="user.user_id" :value="user.user_id"> {{user.user_name}}</option>
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

                <!-- Add Task Form -->
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
                                                    <option v-for="user in userlist" :key="user.user_id" :value="user.user_id"> {{user.user_name}}</option>
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

                <!-- Add Task Form -->
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
                <!-- End Add Task Form -->
            </div>

        </div>

    </div>
</template>

<script>
export default {
    data(){
        return{
            project:[],
            tasks:{},
            userlist:{},
        
            api_key:this.token,
            set_id : this.id,

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

            filter:'',
            sort_asc: true,
            sortBy: '',
        }
    },
    computed:{
        filtering:function() {
            let result = this.tasks;

            if (this.filter) {
                result = result.filter(item => 
                item.task_steps.name.includes(this.filter))
            }

            let asc_desc = this.sort_asc ? 1 : -1;

            if (this.sortBy == 'task') {
                return result.sort(
                    (a,b) => asc_desc * a.task_name.localeCompare(b.task_name)
                )
            }

            if (this.sortBy == 'handler') {
                return result.sort(
                    (a,b) => asc_desc * a.task_handler.user_name.localeCompare(b.task_handler.user_name)
                )
            }

            if (this.sortBy == 'step') {
                return result.sort(
                    (a,b) => asc_desc * a.task_steps.name.localeCompare(b.task_steps.name)
                )
            }

            if (this.sortBy == 'status') {
                return result.sort(
                    (a,b) => asc_desc * a.task_status.localeCompare(b.task_status)
                )
            }

            return result;
        }
    },

    props:['token','id'],

    created(){
       this.projdata();
       this.taskdata();
       this.userData();
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

        userData(){
            fetch('/api/user',{
                method:'get',
                headers : {
                    'Accept' : 'application/json',
                    'Authorization' : 'Bearer ' + this.api_key
                }
            })
            .then(res => res.json())
            .then(res => {
                this.userlist = res.data
            })
            .catch(err => console.log(err))

        },
        //------------------------------------------------------------

        //operation crud's
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
                this.taskdata();
            })
            .catch(err => consle.log(err))
        },

        //operation filtering
        filterby(params){
            let filter = params;
            this.filter = filter;
        },

        defaultFilter(){
            this.filter = '';
        },

        sorting(params){
            let sort = params;
            this.sortBy = sort;

            //inverting sorting 
            this.sort_asc = !this.sort_asc;
        }

    }
}
</script>
