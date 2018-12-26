<template>
    <div>  
        <div class="page">
            <div class="page-header page-header-bordered page-header-tabs">
                <h1 class="page-title">Project</h1>
                <div class="page-header-actions">
                    <div class="input-search">
                        <input v-model="filter" type="text" class="form-control round" placeholder="cari Project...">
                        <button type="submit" class="input-search-btn">
                            <i class="icon md-search" aria-hidden="true"></i>
                        </button>            
                    </div>
                </div>

                <ul class="nav nav-tabs nav-tabs-line" role="tablist" id="projectlist">
                    <li class="nav-item" role="presentation">
                        <a @click="defaultfilter()" class="nav-link"  aria-controls="exampleList" aria-expanded="true"
                        role="tab">All</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a @click="PMfilterevent(uname)" class="nav-link"  aria-expanded="false" role="tab">Manager Project</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a @click="SLfilterEvent(uname)" class="nav-link" aria-expanded="false" role="tab">Step Leader </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a @click="StaffilterEvent(uname)" class="nav-link" aria-expanded="false" role="tab">Staff </a>
                    </li>
                </ul>
            </div>
            
            <div class="page-content">
                <ul class="blocks blocks-100 blocks-xxl-4 blocks-lg-3 blocks-md-2" data-plugin="filterable"
                data-filters="#projectlist">

                    <li v-for="project in Filtering" v-bind:key="project.project_id" data-type="manager">
                        <div class="card card-shadow">
                            <div class="card card-block text-xs-center">
                                <h4 class="card-title">{{project.project_name}}</h4>
                                <p class="card-text">{{project.project_desc}}</p>
                                <a :href="'/project/' + project.project_id"> Actions </a>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            project:[],
            tasks:[],

            api_key:this.token,
          
            
            filter:'',//cari atau filter berdasarkan apapun yang bisa di filter 

            filterByPM:'',//filter jika user menjadi project leader/manager,atau steps leader

            filterBySL:'',//filter jika user adalah SL(Steps Leader)
            filterBystaf:'',
        }
    },

    props:['token','uname'],

    created(){
        //-sa acan nampilkeun data fetch heula. hasil fetch simpen di object array "project:[]"
        //ngambil data dari database (fetch)
       // di inisialiasi di dieu, di coding di jero methods' lain method nya
       this.fetchProject(); 
       this.taskdata();
    },

    computed:{
        Filtering : function(){
            let fil_result = this.project;
            let fil_result_task = this.tasks
      
            // if (this.filter) {
            //     fil_result = fil_result.filter( item => 
            //         item.project_name.includes(this.filter)
            //     );
            // }

            if (this.filterByPM) {
                fil_result = fil_result.filter( item =>
                    item.userpm.user_name.includes(this.filterByPM)
                );
            }

            if (this.filterBySL) {
                fil_result = fil_result.filter((p) => {
                    let foundLeader = p.setting.steps.findIndex((c) =>{
                        return c.leader.user_name === this.filterBySL
                    })

                    return foundLeader !== -1
                });
            }

              if (this.filterBystaf) {
                fil_result = fil_result.filter((p) => {
                    let foundHandler = p.task.findIndex((c) => {
                        return c.task_handler.user_name === this.filterBystaf
                    })
                    return foundHandler !== -1
                });
            }
            
            

                return fil_result;
            

            
        }
    },

    methods:{
        fetchProject(){
            fetch('api/project',{
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
                    this.project = res.data
                }
            )
            .catch(err => console.log(err));
        },

       taskdata(){
            fetch('api/task',{
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
        PMfilterevent(byWhat){
            //filter jika user adalah pm
            let filterBy = byWhat;
            this.filterByPM = filterBy;
            //kosongkan variable filter lain(SL)
            this.filterBySL = '';
            this.filterBystaf = '';
        },

        SLfilterEvent(params){
            let filterBySL = params;
            this.filterBySL = filterBySL;
            //kosongkan varable filter lain(PM)
            this.filterByPM = '';  
            this.filterBystaf = ''; 
        },

         StaffilterEvent(params){
            let filterBystaf = params;
            this.filterBystaf = filterBystaf;
            //kosongkan varable filter lain(PM)
            this.filterByPM = '';
            this.filterBySL = '';   
        },

        

        defaultfilter(){
            this.filterByPM ='';
            this.filterBySL ='';
            this.filterBystaf = '';
            
        }
    },
}
</script>



