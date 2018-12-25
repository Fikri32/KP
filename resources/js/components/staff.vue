<template>
    <div>
        <div class="page-content">
            <div class="row">
                <div class="col-xxl-9 col-xl-8 col-lg-12 col-xs-12">
                <div class="card">
                    <div class="panel-heading" id="exampleHeadingOne" role="tab">
                    <a class="panel-title" data-parent="#exampleAccordion" data-toggle="collapse" href="#description"
                        aria-controls="description" aria-expanded="true">
                        <span class="pull-xs-right p-l-10">
                            <!-- <img class="navbar-brand-logo" src="../../assets/images/pome.png" alt="..."> -->
                        </span>
                        <h4 class="card-title project-title" >
                              
                        Nama Proyek : {{project.project_name}}
                       
                        </h4>
                    </a>
                    </div>
                    <div class="panel-collapse collapse" id="description" aria-labelledby="description"
                        role="tabpanel">
                    <div class="panel-body">
                        <h4 class="card-title">Description Project</h4>
                        {{project.project_desc}}
                    </div>
                    </div>
                    <div class="card-block">
                            <h4 class="card-title project-option-title">
                            <!-- {{steps.name}} -->
                            </h4>
                            <div class="card card-inverse card-primary">
                            <div class="card-block" >
                                <div >
                                <h4 v-for="tasks in tasks " :key="tasks.task_id" class="card-title">Leader           : {{tasks.task_steps.leader.user_name}}</h4> 
                                <!-- {{steps.leader.user_name}} -->
                                <p class="card-text">
            
                                </p>
                            </div>
                            </div>
                            </div>
                            <div class="card card-bordered card-outline-primary">
                            <div class="card-block">
                                <h4 class="card-title">
                                    Task List
                                    
                                </h4>
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th>#</th>
                                        <th>    
                                            Task 
                                        </th>
                                       
                                        <th>
                                                Status 
                                        </th>
                                        <th>Deadline</th>
                                        <th>Tgl Selesai</th>
                                      
                                        <th class="text-nowrap">Document</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <tr v-for="tasks in tasks " :key="tasks.task_id">
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
                                       
                                        <td class="text-nowrap">
                                    
                                            <button type="button" @click="selectdoc(tasks)" data-toggle="modal" data-target="#document" class="btn btn-icon btn-primary btn-round waves-effect"><i class="icon md-plus" aria-hidden="true"></i></button>
                                            
                                            <!-- <button type="button" class="btn btn-sm btn-icon btn-flat btn-default" data-toggle="tooltip"
                                            data-original-title="Massage">
                                            <i class="icon md-comment" aria-hidden="true"></i>
                                            </button> -->
                                        </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                               
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
                        <div v-for="(item, index) in tasks" :key="index" class="media m-t-0">
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

         <!-- Add Document Form -->
        <div class="modal fade" id="document" aria-hidden="true" aria-labelledby="addLabelForm"
        role="dialog" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
                        <h4 class="modal-title">Tambah Document {{document_post.task}}</h4>
                    </div>
                    
                        <form @submit.prevent="storedocument()">
                            <div class="modal-body">
                                <div class="form-group">
                                        <div class="item form-group">
                                        <h6>Nama File</h6>

                                        <input v-model="document_post.nama_document" type="text" class="form-control">
                                    </div>

                                     <div class="item form-group">
                                        <h6>Deskripsi File</h6>

                                        <textarea v-model="document_post.deskripsi" class="form-control" id="textareaDefault" rows="3"></textarea>
                                    </div>

                                
                                    <div class="item form-group">
                                        <h6>Masukan Document</h6>

                                            <input @change="fileChange" type="file" id="input-file-now" data-plugin="dropify" data-default-file=""/>
                                    </div>

                                </div>

                               

                            </div>
                             
                                    <div class="modal-footer">
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                           
                                            <button type="submit" class="btn btn-success">Kirim</button>
                                            </div>
                                        </div>
                                    </div>
                        </form>
                </div>
            </div>
        </div>
        <!-- End Add Document Task Form -->


        <!-- <foot-vues></foot-vues> -->
    </div>
</template>


<script>
export default {
    data(){
        return{
            project:{},
            tasks:[],
            user:[],
            steps:[],
            api_key:this.token,
            set_id:this.id,
            user_id:this.uid,

            document_post:{
                nama_document:'',
                url:'',
                deskripsi:'',
             
                task: this.id,
            },
        }
    },

    computed:{

    },

    props:['token','id','uid'],

    created(){
        this.projdata();
        this.taskdata();
        this.fetchUser();
        // this.fetchstep();
    },

    methods:{
        //fetching projek
       projdata(){
            this.project = 'Loading...'

            let head_axios = {
                'Accept' :'application/json',
                'X-Requested-With' : 'XMLHttpRequest',
                'Authorization' : 'Bearer ' + this.api_key
            }

            var vm = this;

            axios.get('/api/project/' + this.id,{headers:head_axios})
            .then(function(response){
                vm.project = response.data;
                console.log(response);
            })
            .catch(function(error){
                vm.project = 'Upss...' + error;
            })
        },


         taskdata(){
            fetch(`/api/taskdata/staff/${this.user_id}`,{
                method:'get',
                headers:{
                    'Accept':'application/json',
                    'Authorization':'Bearer ' + this.api_key
                }
            })
            .then(res => res.json())
            .then(res => {
                this.tasks = res.data;
                console.log(this.task);
            })
            .catch(err=>console.log(err))
        },

        fetchUser(){
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
        
        // fetchstep(){
        //     fetch(`/api/taskdata/staff/basic/${this.user_id}`,{
        //         method:'get',
        //         headers:{
        //             'Accept':'application/json',
        //             'Authorization':'Bearer ' + this.api_key
        //         }
        //     })
        //     .then(res => res.json())
        //     .then(res => {
        //         this.steps = res.data
        //     })
        //     .catch(err => console.log(err))
        // },

       fileChange(e){
            
            var fileReader = new FileReader()

            fileReader.readAsDataURL(e.target.files[0])
            fileReader.onload = (e) => {
                this.document_post.url = e.target.result
            }

        },
        
        
        //document

         selectdoc(params){
            this.document_post.task = params.task_id;
            this.document_post.url = params.url;
            // this.document_post.finish = params.task_finish;
        },
        storedocument(){
            fetch('/api/document/store',{
                method:'post',
                body:JSON.stringify(this.document_post),
                headers:{
                    'Content-Type' : 'application/json',
                    'Authorization': 'Bearer ' + this.api_key
                }
            })
            .then(res => res.data)
            .then(data => {
                this.document_post.url = '';
                this.document_post.task= this.id;
                //have default value
                // this.task_post.project = this.set_id;
                this.fetchdocument();
            })
            .catch(err => console.log(err));
        },

    }
}
</script>
