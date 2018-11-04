<template>
    <div class="page-content container-fluid">
      <div class="row">
        <!-- profile -->
        <div class="col-xs-12 col-lg-3">
          <div class="card card-shadow text-xs-center">
            <div class="card-block">
              <div style="position:relative;padding-center:110px;">
                <a class="avatar avatar-100 bg-white img-bordered">

                  <div v-if="profile.user_pic == null">
                    <img :src="'http://localhost:8000/' + 'defaultpic.jpg'" alt="">
                  </div>
                  <div v-else>
                    <img :src="'http://localhost:8000/' + profile.user_pic" alt="">
                  </div>
                </a>
                <div class="m-b-20">
                  <button class="btn btn-primary waves-effect waves-light btn-sm" data-toggle="modal" data-target="#photo"><i class="icon md-edit" aria-hidden="true"></i> Ganti Photo</button>
                  <div class="font-size-20">{{profile[0].user_name}}</div>
                  <div class="font-size-14">Admin</div>
                </div>
              </div>
            </div>
            <div class="card-footer bg-grey-500 p-30 h-100">
              <div class="row no-space">
                <div class="col-xs-6">
                  <div class="counter counter-inverse">
                    <span class="counter-number">5</span>
                    <div class="counter-label">Task</div>
                  </div>
                </div>
                <div class="col-xs-6">
                  <div class="counter counter-inverse">
                    <span class="counter-number">5</span>
                    <div class="counter-label">Project</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- details -->
        <div class="col-xs-12 col-lg-9">
          <div class="panel">
            <div class="panel-body nav-tabs-animate nav-tabs-horizontal" data-plugin="tabs">
              <ul class="nav nav-tabs nav-tabs-line" role="tablist">
                <li class="nav-item" role="presentation"><a class="active nav-link" data-toggle="tab" href="#profile" aria-controls="profile"
                  role="tab">Profile</a></li>
                <li class="nav-item" role="presentation"><a class="nav-link" data-toggle="tab" href="#project" aria-controls="project"
                  role="tab">Project</a></li>
              </ul>

              <div class="tab-content">

                <div class="tab-pane active animation-slide-left" id="profile" role="tabpanel">
                  <div v-if="profile[0].profile == null">
                    <p>Anda Belum Mengisi Profile, Silahkan Isi data profile anda. (klick tombol di bawah)</p>
                    <div v class="form-group form-material">
                      <button class="btn btn-primary waves-effect waves-light btn-sm" data-toggle="modal" data-target="#profilemodol"><i class="icon md-plus" aria-hidden="true"></i>Profile</button>
                    </div>
                  </div>
                  <div v-else>
                    <ul v-for="item in profile" :key="item.user_id" class="list-group list-group-dividered list-group-full">
                      <li></li>
                      <li class="list-group-item">Nama      : {{item.user_name}}</li>
                      <li class="list-group-item">Email (Personal)  : {{item.profile.email}}</li>
                      <li class="list-group-item">Email     : {{item.user_email}}</li>
                      <li class="list-group-item">Address   : {{item.profile.addres}}</li>
                      <li class="list-group-item">Kontak    : {{item.profile.phone}}</li>
                      <li class="list-group-item">
                        <button @click="editProfile(item)" class="btn btn-primary waves-effect waves-light btn-sm" data-toggle="modal" data-target="#editProfile"><i class="icon md-edit" aria-hidden="true"></i> Edit Profile</button>
                      </li>
                    </ul>
                  </div>
                </div>

                <div class="tab-pane animation-slide-left" id="project" role="tabpanel">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Project</th>
                        <th>Deadline</th>
                        <th>Progress</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="item in project" :key="item.project_id">
                        <td>{{item.project_id}}</td>
                        <td><a :href="'/actions/'+ item.project_id">{{item.project_name}}</a></td>
                        <td>{{item.project_deadline}}</td>
                        <td>
                          <div class="progress">
                            <div class="progress-bar progress-bar-striped active" aria-valuenow="90" aria-valuemin="0"
                            aria-valuemax="100" style="width: 90%" role="progressbar">90%
                              <!-- <span class="sr-only">90% Complete</span> -->
                            </div>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>  
                </div>

              </div>
            </div>
          </div>
        </div>
    
      </div>

      <!-- Add Payments Form -->
      <div class="modal fade" id="profilemodol" aria-hidden="true" aria-labelledby="profilemodol"
      role="dialog" tabindex="-1">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
                      <h4 class="modal-title">Data Profile</h4>
                  </div>
                  
                  <form @submit.prevent="storeProfile()">
                      <div class="modal-body">
                          <div class="form-group">
                              <div class="item form-group">
                                  <h6>
                                    Alamat 
                                  </h6>
                                  <input v-model="prof_post.alamat" class="form-control" type="text" >
                              </div>
                          </div>

                          <div class="item form-group">
                            <div class="form-group">
                              <h6>
                                Email(Personal)
                              </h6>
                              <input v-model="prof_post.email" class="form-control" type="text" >
                            </div>
                          </div>

                          <div class="form-group">
                              <div class="item form-group">
                                <h6>
                                  Kontak Person
                                </h6>
                                <input v-model="prof_post.tlp" class="form-control" type="text" >
                              </div>
                          </div>

                          <div class="form-group">
                              <div class="item form-group">
                                <h6>
                                  fax
                                </h6>
                                <input v-model="prof_post.fax" class="form-control" type="text" >
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
      <!-- End Add Payments Form -->

       <!-- Add Payments Form -->
      <div class="modal fade" id="editProfile" aria-hidden="true" aria-labelledby="editProfile"
      role="dialog" tabindex="-1">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
                      <h4 class="modal-title">Data Profile</h4>
                  </div>
                  
                  <form @submit.prevent="updateProfile()">
                      <div class="modal-body">
                          <div class="form-group">
                              <div class="item form-group">
                                  <h6>
                                    Alamat 
                                  </h6>
                                  <input v-model="prof_post.alamat" class="form-control" type="text" >
                              </div>
                          </div>

                          <div class="item form-group">
                            <div class="form-group">
                              <h6>
                                Email(Personal)
                              </h6>
                              <input v-model="prof_post.email" class="form-control" type="text" >
                            </div>
                          </div>

                          <div class="form-group">
                              <div class="item form-group">
                                <h6>
                                  Kontak Person
                                </h6>
                                <input v-model="prof_post.tlp" class="form-control" type="text" >
                              </div>
                          </div>

                          <div class="form-group">
                              <div class="item form-group">
                                <h6>
                                  fax
                                </h6>
                                <input v-model="prof_post.fax" class="form-control" type="text" >
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
      <!-- End Add Payments Form -->

       <!-- Add Payments Form -->
      <div class="modal fade" id="photo" aria-hidden="true" aria-labelledby="photo"
      role="dialog" tabindex="-1">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
                      <h4 class="modal-title">Data Profile</h4>
                  </div>
                  
                  <form @submit.prevent="photo()">
                      <div class="modal-body">
                        <!-- Example Default -->
                        <div class="example-wrap">
                          <h4 class="example-title">Your so fresh input file — Default version</h4>
                          <div class="example">
                            <input @change="imageChange" type="file" id="input-file-now" data-plugin="dropify" data-default-file=""
                            />
                          </div>
                        </div>
                        <!-- End Example Default -->
                      </div>
                      
                      <div class="modal-footer">
                          <button class="btn btn-primary" type="submit">Save</button>
                          <a class="btn btn-sm btn-white btn-pure" data-dismiss="modal" href="javascript:void(0)">Cancel</a>
                      </div>
                  </form>
              </div>
          </div>
      </div>
      <!-- End Add Payments Form -->
    </div>
</template>
<script>
export default {
    data(){
        return {
            profile:[],
            project:[],
            prof_post:{
                alamat  : '',
                email   : '',
                tlp     : '',
                fax     : '',
            },

            image:'',
            
            api_key : this.token,
            uservar : this.user,
        }
    },

    props:['token','user'],

    created(){
        this.fetchProfile();
        this.fetchProject();
    },

    methods:{
        //fetching data 
        fetchProfile(){
          fetch(`/api/profile/${this.uservar}`,{
            method:'get',
              headers:{
                'Accept' : 'applications/json',
                'Authorization' : 'Bearer ' + this.api_key
              }
          })
          .then(res => res.json())
          .then(res => {
            this.profile = res.data
          })
          .catch(err => console.log(err))
        },
        fetchProject(){
          fetch('/api/project',{
            method:'get',
              headers:{
                'Accept' : 'applications/json',
                'Authorization' : 'Bearer ' + this.api_key
              }
          })
          .then(res => res.json())
          .then(res => {
            this.project = res.data
          })
          .catch(err => console.log(err))
        },
        //--------------------------------
        //Manipulate data 
        storeProfile(){
            fetch('/api/profile/store',{
              method:'post',
              body:JSON.stringify(this.prof_post),
              headers:{
                'Content-Type' : 'applications/json',
                'Authorization' : 'Bearer ' + this.api_key
              }
            })
            .then(res => res.data)
            .then(res => {
                this.prof_post.alamat  = '',
                this.prof_post.email   = '',
                this.prof_post.tlp     = '',
                this.prof_post.fax     = '',

                this.fetchProfile();
            })
            .catch(err => console.log(err));
        },

        editProfile(params){
            this.prof_post.alamat  = params.profile.addres,
            this.prof_post.email   = params.profile.email,
            this.prof_post.tlp     = params.profile.phone,
            this.prof_post.fax     = params.profile.fax
        },

        updateProfile(){
            fetch(`/api/profile/update/${this.uservar}`,{
              method:'put',
              body:JSON.stringify(this.prof_post),
              headers:{
                'Content-Type' : 'applications/json',
                'Authorization' : 'Bearer ' + this.api_key
              }
            })
            .then(res => res.json)
            .then(res => {
                this.prof_post.alamat  = '',
                this.prof_post.email   = '',
                this.prof_post.tlp     = '',
                this.prof_post.fax     = '',

                this.fetchProfile();
            })
            .catch(err => console.log(err));
        },

        photo(){
          fetch(`/api/profile/photo/${this.uservar}`,{
              method:'put',
              body:JSON.stringify(this.image),
              headers:{
                'Content-Type' : 'applications/json',
                'Authorization' : 'Bearer ' + this.api_key
              }
          })
          .then(res => res.json)
          .then(res => {
            image = '';
            this.fetchProfile();
          })
          .catch(err => console.log(err));
        },
        //---------------------------------
        //image proccesing 
        imageChange(e){
            
            var fileReader = new FileReader()

            fileReader.readAsDataURL(e.target.files[0])
            fileReader.onload = (e) => {
                this.image = e.target.result
                console.log(this.image);    
            }
            
        },
    }
}
</script>
