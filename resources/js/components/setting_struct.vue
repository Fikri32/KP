<template>
   <div>
        <side-menu></side-menu>
        
        <!-- Task Content -->
        <div class="page-main">
            <!-- Task Content Header -->
            <div class="page-header">
                <h1 class="page-title">Setting</h1>
            </div>
            <!-- Task Content -->
            <div class="page-content">
                <div class="panel">

                    <!-- Contacts -->
                    <table class="table is-indent">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Steps</th>
                                <th>Dibuat</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="steps in steps" :key="steps.id">
                                <td>
                                    {{steps.id}}
                                </td>
                                <td>
                                    {{steps.name}}
                                </td>
                                <td>

                                </td>
                                <td>
                                    <!--edit button kuy -->
                                    <button @click="editStep(steps)" data-toggle="modal" data-target="#editSteps" class="btn btn-floating btn-success btn-sm waves-effect"><i class="icon md-edit" aria-hidden="true"></i></button>
                                    <!--delete button kuy -->
                                    <button @click="DeleteSteps(steps.steps_id)" class="btn btn-floating btn-warning btn-sm waves-effect"><i class="icon md-delete" aria-hidden="true"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Add Label Form -->
                    <div class="modal fade" id="addSteps" aria-hidden="true" aria-labelledby="addLabelForm"
                    role="dialog" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
                                    <h4 class="modal-title">Tambah Steps</h4>
                                </div>
                                <div class="modal-body">
                                    <form @submit.prevent="storeSteps()">
                                        <div class="form-group">
                                            {{step_post.nama_div}} {{step_post.id_setting}}
                                            <input type="text" v-model="step_post.nama_div" class="form-control" name="lablename" placeholder="Nama Steps"/>
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

                    <!-- Add Label Form -->
                    <div class="modal fade" id="editSteps" aria-hidden="true" aria-labelledby="addLabelForm"
                    role="dialog" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
                                    <h4 class="modal-title">Edit Steps</h4>
                                </div>
                                <div class="modal-body">
                                    <form @submit.prevent="updateStep(step_post.temp)">
                                        Debug : id {{step_post.temp}}
                                        <div class="form-group">
                                            <input type="text" v-model="step_post.nama_div" class="form-control" name="lablename" placeholder="Nama Steps"/>
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

        <foot-vues></foot-vues>
   </div>
</template>
<script>
export default {
    data(){
        return{
            steps:{},

            api_key:this.token,

            step_post :{
                id_setting:this.id,
                nama_div:'',
                temp:''
            },

            filterBy : '',
            sort : '',
            sort_asc: true,
        }
    },

    props:['id','token'],

    created(){
        this.fetchSteps();
    },

    computed:{
        filtering: function(){
            let result = this.steps;

            if(this.filterBy){
                result = result.filter(item => 
                    item.steps_name.includes(this.filterBy)
                );
            }

            return result;
        },
    },

    methods:{
        //filtering methods
        setFilter(params){
            let filterBy = params;
            this.filterBy = filterBy;
        },

        setDefaultFilter()
        {
            this.filterBy = '';
        },

        setSort(preg){
            let sort = preg;
            this.sort = sort;

            this.sort_asc = !this.sort_asc;
        },
        //-------------------------------------------------------------------------
        //STEPS
        fetchSteps(){
            fetch(`/api/steps/${this.id}`,{
                method:'get',
                headers:{
                    'Accept' :'application/json',
                    'X-Requested-With' : 'XMLHttpRequest',
                    'Authorization' : 'Bearer ' + this.api_key
                }
            })
            .then(res => res.json())
            .then(res => {
                this.steps = res.data
            })
            .catch(err => console.log(err))
        },

        storeSteps(){
            
            fetch('/api/steps/store',{
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
                    this.step_post.id_setting=this.id;
                    this.step_post.nama_div='';
                    this.fetchSteps();
                }
            )
            .catch(err => console.log(err));
            
        },

        DeleteSteps(step_id){
            
            this.$swal({
                title: 'Anda Yakin?',
                text: "data akan terhapus secara permanent!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText:'Tidak, Simpan Data ini',
              
            }).then((result) => {
                if (result.value) {
                  
                    fetch(`/api/steps/delete/${step_id}`,{
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
                            'Steps Berhasil Di Hapus.',
                            'success'
                        )

                        this.fetchSteps();
                    })
                    .catch(err=>console.log(err));

                }
            })

        },


        editStep(steps){
            this.step_post.nama_div = steps.steps_name;
            this.step_post.temp = steps.steps_id;
        },
        
        updateStep(steps_id){
            fetch(`/api/steps/update/${steps_id}`,{
                method  : 'put',
                body    : JSON.stringify(this.step_post),
                headers : {
                    'Content-Type':'application/json',
                    'Authorization' : 'Bearer ' + this.api_key
                }
            })
            .then(res => res.json)
            .then(
                res => {
                    this.step_post.nama_div = '';
                    this.fetchSteps();
                }
            )
            .catch(err => console.log(err))
        },
    },
}
</script>

