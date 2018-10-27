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
                                    Nama Proyek : {{singleProject.project_name}}
                                    <hr>
                                </h4>
                            </a>
                        </div>

                        <div class="panel-collapse collapse" id="description" aria-labelledby="description" role="tabpanel">
                            <div class="panel-body">
                                <h4 class="card-title">Description</h4>
                                {{singleProject.project_desc}}
                                <hr>
                            </div>
                        </div>

                        <div class="card-block">
                            <div class="example-wrap">
                                <div  class="nav-tabs-horizontal" data-plugin="tabs">

                                    <ul  class="nav nav-tabs nav-tabs-solid" role="tablist">
                                        <li @click="set_filter('')" class="nav-item" role="presentation"><a class="nav-link active" data-toggle="tab" href="#stepone"
                                            aria-controls="stepone" role="tab">All</a></li>
                                        <li v-for="step in singleProject.step" :key="step.id" @click="set_filter(step.nama_step)" class="nav-item" role="presentation"><a class="nav-link active" data-toggle="tab" href="#perstep"
                                            aria-controls="perstep" role="tab">{{step.nama_step}}</a></li>
                                    </ul>

                                    <div class="tab-content">
                                        <div v-for="item in filtering" :key="item.id" class="tab-pane active" id="perstep" role="tabpanel">
                                            <div  class="card card-inverse card-primary">
                                                <div  class="card-block">
                                                    <h5 class="card-title">Team             :</h5>
                                                    <h5 class="card-title">End Date         :</h5>
                                                </div>
                                            </div>

                                            <div class="card card-bordered card-outline-primary">
                                                <div class="card-block">
                                                    <h4 class="card-title">Task List</h4>
                                                    <p class="card-text">
                                                       <ul>
                                                           <li v-for="(task, index) in item.task_list" :key="index">
                                                               {{task.task}}
                                                           </li>
                                                       </ul>
                                                    </p>
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
                                <button type="button" class="btn btn-pure btn-default icon md-plus btn-plus" data-target="#tambahStaff" data-toggle="modal"></button>
                            </h4>

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
                                                        <option v-for="step in singleProject.step" :key="step.id" :value="step.id">{{step.nama_step}}</option>
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
                                <div v-for="item in singleProject.step" :key="item.id">
                                    <div v-for="item2 in item.team_members" :key="item2.id">
                                        <div class="media-left text-middle">
                                            <a href="javascript:void(0)" class="avatar">
                                                <img :src="'http://localhost:8000/' + item2.foto">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading font-size-14">{{item2.nama}}</h4>
                                            <span>Developer</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       
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
            user:[],
            api_key:this.token,

            filterBy:'',
            team_post:{
                id_staff:'',
                id_divisi:''
            },
        }
    },

    computed:{
        filtering : function(){
            let result = this.singleProject.step;

            if (this.filterBy) {
                result = result.filter( item =>
                    item.nama_step.includes(this.filterBy)
                );
            }

            return result;
        }
    },

    props:['token','id'],

    created(){
        this.fetchSinge();
        this.fetchUser();
    },

    methods:{
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
                console.log(response);
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

        set_filter(filter_params){
            let filterBy = filter_params;
            this.filterBy = filterBy;
        },

        team_store(){
            fetch('/api/team/store',{
                method:'post',
                body:JSON.stringify(this.team_post),
                headers:{
                    'Content-Type':'application/json',
                    'Authorization' : 'Bearer ' + this.api_key
                }
            })
            .then(res => res.data)
            .then( data =>{
                this.team_post.id_staff='';
                this.team_post.id_divisi='';
                this.fetchSinge();
            })
            .catch(error=>console.log(error));
        }
    }
}
</script>
