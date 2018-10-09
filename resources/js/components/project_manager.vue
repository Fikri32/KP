<template>
    <div>
        <div class="page-content">
            <div class="row">
                <!-- Kolom Project Detail Tasklist dan Step -->
                <div class="col-xxl-9 col-xl-8 col-lg-12 col-xs-12">
                    <div class="card">

                        <div class="panel-heading" id="exampleHeadingOne" role="tab">
                            <a class="panel-title" data-parent="#exampleAccordion" data-toggle="collapse" href="#description" aria-controls="description" aria-expanded="true">
                                <span class="pull-xs-right p-l-10">
                                    <img class="navbar-brand-logo" alt="...">
                                </span>
                                <h4 class="card-title project-title">
                                    Nama Proyek : {{singleProject.project_name}}
                                </h4>
                            </a>
                        </div>

                        <div class="panel-collapse collapse" id="description" aria-labelledby="description" role="tabpanel">
                            <div class="panel-body">
                                <h4 class="card-title">Description</h4>
                                Deskripsi project ini diisi oleh deskripsi project
                            </div>
                        </div>

                        <div class="card-block">
                            <h4 class="card-title project-option-title">
                                Step 
                                <button type="button" class="btn btn-pure btn-default icon md-plus btn-plus" data-target="#tambahTask" data-toggle="modal"></button>
                            </h4>

                            <div class="example-wrap">
                                <div class="nav-tabs-horizontal" data-plugin="tabs">

                                    <ul class="nav nav-tabs nav-tabs-solid" role="tablist">
                                        <li class="nav-item" role="presentation"><a class="nav-link active" data-toggle="tab" href="#stepone"
                                            aria-controls="stepone" role="tab">Marketing</a></li>
                                    </ul>

                                    <div class="tab-content">
                                        <div class="tab-pane active" id="stepone" role="tabpanel">
                                            <div class="card card-inverse card-primary">
                                                <div class="card-block">
                                                    <h4 class="card-title">Leader :</h4>
                                                    <h5 class="card-title">Team   :</h5>
                                                    <h5 class="card-title">End Date         :</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- MODAL ADD TASK -->      
                                    <div class="modal fade modal-fade-in-scale-up" id="tambahTask" aria-hidden="true" aria-labelledby="exampleModalTitle" role="dialog" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                    <h4 class="modal-title"> Add New Step</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p>
                                                    <div class="form-group form-material floating" data-plugin="formMaterial">
                                                        <input type="text" class="form-control" name="inputDivisi">
                                                        <label class="floating-label">Step</label>
                                                    </div>
                                                    <div class="form-group form-material floating" data-plugin="formMaterial">
                                                        <input type="text" class="form-control" id="inputDate1" data-plugin="formatter"
                                                        data-pattern="[[9999]]-[[99]]-[[99]]" />
                                                        <p class="text-help">2017-01-01</p>
                                                    </div>
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default btn-pure" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END ADD TASK  -->
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
                                <span class="pull-xs-right p-l-10">20 Agustus 2018</span>
                                Start Date
                            </p>

                            <p>
                                <span class="pull-xs-right p-l-10">20 November 2018 </span>
                                End Date
                            </p>
                                
                            <div class="progress progress-lg">
                                <div class="progress-bar progress-bar-indicating active" style="width: 60%;" role="progressbar">
                                60%
                                </div>
                            </div>
                            
                        </div>
                        <!-- Proyek Manager -->
                        <div class="card-block">

                            <h4 class="project-option-title">Manager Proyek</h4>

                            <div class="media m-t-0">
                                <div class="media-left text-middle">
                                    <a href="javascript:void(0)" class="avatar">
                                        <img :src="'http://localhost:8000/' + singleProject.userpm.image">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading font-size-16">{{singleProject.userpm.name}}</h4>
                                    <span>Developer</span>
                                </div>
                            </div>

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
                                            <h4 class="modal-title"> Add New Team </h4>
                                        </div>

                                        <div class="modal-body">
                                            <select class="custom-select custom-select-lg mb-8">
                                                <option selected> select employee </option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-pure" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="media m-t-0">
                                <div class="media-left text-middle">
                                <a href="javascript:void(0)" class="avatar">
                                    <img src="" alt="...">
                                </a>
                                </div>
                                <div class="media-body">
                                <h4 class="media-heading font-size-14">Tim Collins</h4>
                                <span>Developer</span>
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
            api_key:this.token,
            id:this.$route.params.id
        }
    },

    props:['token'],

    created(){
        this.fetchSinge();
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
    }
}
</script>
