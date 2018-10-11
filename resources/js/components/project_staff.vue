<template>
    <div>  
        <div class="page">
            <div class="page-header page-header-bordered page-header-tabs">
                <h1 class="page-title">Project Debug :: Filter by {{filterBy}} :: Searching {{filter}}</h1>
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
                        <a @click="filterevent(uname)" class="nav-link"  aria-expanded="false" role="tab">Manager Project</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link"  aria-expanded="false" role="tab">Leader Step</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link"  aria-expanded="false" role="tab">Officer </a>
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
                                <router-link :to="'/project/' + project.project_id">Actions</router-link>
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

            api_key:this.token,
            
            filter:'',//cari atau filter berdasarkan apapun yang bisa di filter 

            filterBy:'',
        }
    },

    props:['token','uname'],

    created(){
        //-sa acan nampilkeun data fetch heula. hasil fetch simpen di object array "project:[]"
        //ngambil data dari database (fetch)
        this.fetchProject(); // di inisialiasi di dieu, di coding di jero methods' lain method nya
    },

    computed:{
        Filtering : function(){
            let fil_result = this.project;

            if (this.filter) {
                fil_result = fil_result.filter( item => 
                    item.project_name.includes(this.filter)
                );
            }

            if (this.filterBy) {
                fil_result = fil_result.filter( item =>
                    item.userpm.name.includes(this.filterBy)
                );
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

        filterevent(byWhat){
            let filterBy = byWhat;
            this.filterBy = filterBy;
        },

        defaultfilter(){
            this.filterBy = ''; 
        }
    },
}
</script>



