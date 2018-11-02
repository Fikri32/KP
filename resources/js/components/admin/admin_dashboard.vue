<template>
    <div>
        <div class="page-content container-fluid">
            <div class="row">
                <div class="col-lg-4 col-xs-6">
                    <!-- Card -->
                    <div class="card card-block p-30 bg-blue-600">
                        <div class="card-watermark darker font-size-60 m-15"><i class="icon md-assignment" aria-hidden="true"></i></div>
                        <div class="counter counter-md counter-inverse text-xs-left">
                        <div class="counter-number-group">
                            <span class="counter-number">{{total(project)}}</span>
                            <span class="counter-number-related text-capitalize">project</span>
                        </div>
                        <div class="counter-label text-capitalize">in design</div>
                        </div>
                    </div>
                    <!-- End Card -->
                </div>

                <div class="col-md-4 col-xs-6">
                <!-- Card -->
                <div class="card card-block p-30 bg-red-600">
                    <div class="card-watermark darker font-size-60 m-15"><i class="icon md-accounts" aria-hidden="true"></i></div>
                    <div class="counter counter-md counter-inverse text-xs-left">
                    <div class="counter-number-group">
                        <span class="counter-number">{{total(user)}}</span>
                        <span class="counter-number-related text-capitalize">Staff</span>
                    </div>
                    <div class="counter-label text-capitalize">in room</div>
                    </div>
                </div>
                <!-- End Card -->
                </div>

                <div class="col-md-4 col-xs-6">
                <!-- Card -->
                <div class="card card-block p-30 bg-green-600">
                    <div class="card-watermark darker font-size-60 m-15"><i class="icon md-account-box" aria-hidden="true"></i></div>
                    <div class="counter counter-md counter-inverse text-xs-left">
                    <div class="counter-number-group">
                        <span class="counter-number">{{total(client)}}</span>
                        <span class="counter-number-related text-capitalize">Client</span>
                    </div>
                    <div class="counter-label text-capitalize">in room</div>
                    </div>
                </div>
                <!-- End Card -->
                </div>
            </div>
        </div>
        
    </div>
</template>
<script>
export default {
    data(){
        return {
            project:[],
            user:[],
            client:[],
            api_key:this.token
        }
    },
    props:['token'],
    
    created(){
        this.fetchProject();
        this.fetchStaff();
        this.fetchClient();
    },

    methods:{
    //fetching data
    fetchProject(){
        fetch('api/project',{
            method:'get',
            headers:{
                'Accept':'application/json',
                'Authorization':'Bearer ' + this.api_key
            }
        })
        .then(res => res.json())
        .then(res=> {
            this.project = res.data
        })
        .catch(err => console.log(err))
    },

    fetchStaff(){
        fetch('api/user',{
            method:'get',
            headers:{
                'Accept':'application/json',
                'Authorization':'Bearer ' + this.api_key
            }
        })
        .then(res => res.json())
        .then(res=> {
            this.user = res.data
        })
        .catch(err => console.log(err))
    },

    fetchClient(){
        fetch('api/client',{
            method:'get',
            headers:{
                'Accept':'application/json',
                'Authorization':'Bearer ' + this.api_key
            }
        })
        .then(res => res.json())
        .then(res=> {
            this.client = res.data
        })
        .catch(err => console.log(err))
    },
    //other operations
    total(params){
        let result = params.length;
        return result;
    },
    
    },
}
</script>
