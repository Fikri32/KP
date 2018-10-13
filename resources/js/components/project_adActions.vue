<template>
    <div>

        <div class="page-aside">
            <!-- Contacts Sidebar -->
            <div class="page-aside-switch">
                <i class="icon md-chevron-left" aria-hidden="true"></i>
                <i class="icon md-chevron-right" aria-hidden="true"></i>
            </div>

            <div class="page-aside-inner">
                <div data-role="container">
                <div data-role="content">
                    <div class="page-aside-section">
                    <div class="list-group">
                        <a class="list-group-item" href="javascript:void(0)">
                        <span class="item-right">61</span><i class="icon md-inbox" aria-hidden="true"></i>All
                        Task 
                        </a>
                    </div>
                    </div>
                    <div class="page-aside-section">
                    <h5 class="page-aside-title">Step</h5>
                    <div class="list-group has-actions">

                        <div v-for="step in project.step" :key="step.id">
                            <div class="list-group-item" data-plugin="editlist">
                                <div class="list-content">
                                    <span class="item-right"></span>
                                    <span class="list-text"> {{ step.nama_step }} </span>
                                    <div class="item-actions">
                                    <span class="btn btn-pure btn-icon" data-toggle="list-editable"><i class="icon md-edit" aria-hidden="true"></i></span>
                                    <span class="btn btn-pure btn-icon" data-toggle="list-delete"><i class="icon md-delete" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                <div class="list-editable">
                                    <div class="form-group form-material">
                                    <input type="text" class="form-control empty" name="label" value="Work">
                                    <button type="button" class="input-editable-close icon md-close" data-toggle="list-editable-close"
                                    aria-label="Close" aria-expanded="true"></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    

                        <a id="addLabelToggle" class="list-group-item" href="javascript:void(0)" data-toggle="modal"
                        data-target="#addLabelForm">
                        <i class="icon md-plus" aria-hidden="true"></i> Step baru
                        </a>
                    </div>
                    
                    </div>
                </div>
                </div>
            </div>
        </div>

        <!-- Contacts Content -->
        <div class="page-main">
            <!-- Contacts Content Header -->
            <div class="page-header">
                <h1 class="page-title">Settting {{project.project_name}}</h1>
                <div class="page-header-actions">
                <form>
                    <div class="input-search input-search-dark">
                    <i class="input-search-icon md-search" aria-hidden="true"></i>
                    <input type="text" class="form-control" name="" placeholder="Search...">
                    </div>
                </form>
                </div>
            </div>
            <!-- Contacts Content -->
            <div id="contactsContent" class="page-content page-content-table" data-plugin="selectable">
                <!-- Actions -->
                <div class="page-content-actions">
                    
                <div class="pull-xs-right">
                    
                </div>
          
                <div class="btn-group btn-group-flat">
                    <div class="dropdown">
                    <button class="btn btn-icon btn-pure btn-default" data-toggle="dropdown" aria-expanded="false"
                    type="button"><i class="icon md-folder" aria-hidden="true"></i></button>
                    <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" href="javascript:void(0)">work</a>
                        <a class="dropdown-item" href="javascript:void(0)">Family</a>
                    </div>
                    </div>
                    <div class="dropdown">
                    <button class="btn btn-icon btn-pure btn-default" data-toggle="dropdown" aria-expanded="false"
                    type="button"><i class="icon md-tag" aria-hidden="true"></i></button>
                    <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" href="javascript:void(0)">work</a>
                        <a class="dropdown-item" href="javascript:void(0)">Family</a>
                        <a class="dropdown-item" href="javascript:void(0)">Private</a>
                        <a class="dropdown-item" href="javascript:void(0)">Friends</a>
                    </div>
                    </div>
                </div>
                </div>
                <!-- Contacts -->
                <table class="table is-indent" data-plugin="animateList" data-animate="fade" data-child="tr"
                data-selectable="selectable">
                    <thead>
                        <tr>
                            <th class="cell-300" scope="col">Task</th>
                        </tr>
                    </thead>
                    <tbody>
                        <div v-for="item in project.step" :key="item.id">
                            <tr v-for="item2 in item.task_list" :key="item2.id" data-url="panel.tpl" data-toggle="slidePanel">
                                <td class="cell-300">
                                    {{item2.task}}
                                </td>
                               
                            </tr>
                        </div>
                    </tbody>
                </table>
                <!-- Site Action -->
                <div class="site-action" data-plugin="actionBtn">
                    <button type="button" data-toggle="modal" data-target="#addUserForm" class="site-action-toggle btn-raised btn btn-success btn-floating">
                        <i class="front-icon md-plus animation-scale-up" aria-hidden="true"></i>
                        <i class="back-icon md-close animation-scale-up" aria-hidden="true"></i>
                    </button>
                </div>
                <!-- End Site Action -->
                <!-- Add User Form -->
                <div class="modal fade" id="addUserForm" aria-hidden="true" aria-labelledby="addUserForm"
                role="dialog" tabindex="-1">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
                        <h4 class="modal-title">Buat Task {{task_post.nama_task}} {{task_post.id_step}}</h4>
                        </div>
                        <div class="modal-body">
                        <form @submit.prevent="storeTask">

                            <div class="form-group">
                                <input v-model="task_post.nama_task" type="text" class="form-control" placeholder="Task" />
                            </div>

                            <div class="form-group">
                                <select v-model="task_post.id_step" aria-placeholder="Step" class="form-control">
                                    <option v-for="step in project.step" :key="step.id" :value="step.id">{{step.nama_step}}</option>
                                </select>
                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-primary" type="submit">Save</button>
                                <a class="btn btn-sm btn-white btn-pure" data-dismiss="modal" href="javascript:void(0)">Cancel</a>
                            </div>
                        </form>
                        </div>
                       
                    </div>
                    </div>
                </div>
                <!-- End Add User Form -->
                <!-- Add Label Form -->
                <div class="modal fade" id="addLabelForm" aria-hidden="true" aria-labelledby="addLabelForm"
                role="dialog" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
                                <h4 class="modal-title">Tambah Step </h4>
                            </div>
                            <div class="modal-body">
                                <form @submit.prevent="storeStep">
                                    <div class="form-group">
                                        {{step_post.nama_div}} {{step_post.id_project}}
                                        <input type="text" v-model="step_post.nama_div" class="form-control" name="lablename" placeholder="Nama Task"/>
                                    </div>
                                        {{step_post.leader}}
                                    <div class="form-group">
                                        <select v-model="step_post.leader" class="form-control">
                                            <option v-for="userlist in userlist" :key="userlist.user_id" :value="userlist.user_id">{{userlist.user_name}}-{{userlist.jobs.jabatan}}</option>
                                        </select>
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                        <a class="btn btn-sm btn-white btn-pure" data-dismiss="modal" href="javascript:void(0)">Cancel</a>
                                    </div>
                                </form>
                            </div>
                         
                        </div>
                    </div>
                </div>
                <!-- End Add Label Form -->
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
            api_key:this.token,
            set_id : this.id,

            step_post :{
                id_project:this.id,
                nama_div:'',
                leader:''
            },

            task_post :{
                id_step:'',
                nama_task:''
            }
        }
    },
    computed:{

    },

    props:['token','id'],

    created(){
        this.fetchproject();
        this.fetchuser();
    },

    methods:{

        fetchproject(){

            this.project = 'Loading...'

            let head = {
                'Accept' :'application/json',
                'X-Requested-With' : 'XMLHttpRequest',
                'Authorization' : 'Bearer ' + this.api_key
            }

            var vm = this;

            axios.get('/api/project/' + this.set_id,{headers:head})
            .then(function(response){
                vm.project = response.data;
            })
            .catch(function(error){
                vm.project = 'error :' + error 
            })

        },

        fetchuser(){
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
                res => {
                    this.userlist = res.data
                }
            )
            .catch(err => console.log(err));
        },

        storeStep(){
            fetch('/api/setting/store',{
                method:'post',
                body:JSON.stringify(this.step_post),
                headers:{
                    'Content-Type':'application/json',
                    'Authorization' : 'Bearer ' + this.api_key
                }
            })
            .then(res => res.data)
            .then(
                data => {

                    this.id_project = this.set_id;
                    this.nama_div   = '';
                    this.leader     = '';
                    this.fetchproject();
                }
            )
            .catch(err => console.log(err));
        },

        storeTask(){
            fetch('/api/task/store',{
                method:'post',
                body:JSON.stringify(this.task_post),
                headers:{
                    'Content-Type':'application/json',
                    'Authorization' : 'Bearer ' + this.api_key
                }
            })
            .then(res => res.data)
            .then(
                data => {
                    this.id_step = '',
                    this.nama_task = ''
                    this.fetchproject();
                }
            )
        }

    }
}
</script>
