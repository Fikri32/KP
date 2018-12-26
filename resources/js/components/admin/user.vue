<template>
    <div>
        <div class="page-header">
            <h4 class="page-title">Staff</h4>
            <div class="page-header-actions">
                 <form @click.prevent="">
                    
                    <div class="form-group form-material">
                         <div class="input-search input-search-dark">
                            <i class="input-search-icon md-search" aria-hidden="true"></i>
                            <input v-model="search" class="form-control" name="" placeholder="Search..." type="text">
                            <button type="button" class="input-search-close icon md-close" aria-label="Close"></button>
                        </div>
                    </div> 
                </form>
            </div>
        </div>

        <div class="page-conter container-fluid">
            <div class="panel">
                <!-- Modal karyawan -->
                <div class="modal fade createuser" tabindex="-1" role="dialog" aria-labelledby="createuser" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="karyawan">Karyawan</h4>
                            </div>
                            <div class="modal-body">
                                <form  class="form-horizontal form-label-left" novalidate>
                                    <div class="item form-group">
                                        <h6 class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_lengkap">Nama</h6>
                                        <div class="col-md-10 col-sm-6 col-xs-12">
                                            <input v-model="user_post.user_name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"  placeholder="karyawan" required="required" type="text">
                                        </div>
                                    </div>

                                     <div class="item form-group">
                                        <h6 class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_lengkap">photo staff</h6>
                                        <div class="col-md-10 col-sm-6 col-xs-12">
                                            <input @change="imageChange" type="file" id="input-file-now" data-plugin="dropify" data-default-file="">
                                        </div>
                                    </div>
                         
                                   

                                    <div class="item form-group">
                                    <h6 class="control-label col-md-3 col-sm-3 col-xs-12" for="Posisi">Email</h6>
                                        <div class="col-md-10 col-sm-6 col-xs-12">
                                            <input v-model="user_post.user_email" class="form-control col-md-7 col-xs-12" placeholder="E-Email" required="required" type="email">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                    <h6 class="control-label col-md-3 col-sm-3 col-xs-12" for="Posisi">NIP</h6>
                                        <div class="col-md-10 col-sm-6 col-xs-12">
                                            <input v-model="user_post.user_nip" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" placeholder="Kosonkan jika tidak ada" required="required" type="text">
                                        </div>
                                    </div>

                                  <div class="item form-group">
                                    <h6 class="control-label col-md-3 col-sm-3 col-xs-12" for="Posisi">Jabatan {{user_post.id_tugas}}</h6>
                                        <div class="col-md-10 col-sm-6 col-xs-12">
                                            <select v-model="user_post.id_tugas" class="form-control">
                                                
                                                <optgroup v-for="divisi in divisi" :key="divisi.id" v-bind:label="divisi.JenisProyek">
                                                    <option v-for="jabatan in divisi.jabatan" :key="jabatan.id" :value="jabatan.id" >{{jabatan.jabatan}}</option>
                                                </optgroup>
                                                
                                            </select>
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="modal-footer">
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                            <button type="reset" class="btn btn-primary">Reset</button>
                                            <button type="submit" @click="storeuser()" data-dismiss="modal"  class="btn btn-success">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row modal karyawan -->
             
                <!-- Modal edit -->
                <div class="modal fade edituser" tabindex="-1" role="dialog" aria-labelledby="edituser" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title" id="karyawan">Edit Staff #{{user_post.user_id}}</h4>
                            </div>
                            <div class="modal-body">
                                <form  class="form-horizontal form-label-left" novalidate>
                                    <div class="item form-group">
                                        <h6 class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_lengkap">Nama</h6>
                                        <div class="col-md-10 col-sm-6 col-xs-12">
                                            <input v-model="user_post.user_name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"  placeholder="karyawan" required="required" type="text">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                    <h6 class="control-label col-md-3 col-sm-3 col-xs-12" for="Posisi">Email</h6>
                                        <div class="col-md-10 col-sm-6 col-xs-12">
                                            <input v-model="user_post.user_email" class="form-control col-md-7 col-xs-12" placeholder="E-Email" required="required" type="email">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                    <h6 class="control-label col-md-3 col-sm-3 col-xs-12" for="Posisi">NIP</h6>
                                        <div class="col-md-10 col-sm-6 col-xs-12">
                                            <input v-model="user_post.user_nip" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" placeholder="Kosonkan jika tidak ada" required="required" type="text">
                                        </div>
                                    </div>

                                    
                                    <div class="item form-group">
                                    <h6 class="control-label col-md-3 col-sm-3 col-xs-12" for="Posisi">Jabatan {{user_post.id_tugas}}</h6>
                                        <div class="col-md-10 col-sm-6 col-xs-12">
                                            <select v-model="user_post.id_tugas" class="form-control">
                                                
                                                <optgroup v-for="divisi in divisi" :key="divisi.id" v-bind:label="divisi.JenisProyek">
                                                    <option v-for="jabatan in divisi.jabatan" :key="jabatan.id" :value="jabatan.id" >{{jabatan.jabatan}}</option>
                                                </optgroup>
                                                
                                            </select>
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="modal-footer">
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">

                                            <button type="reset" class="btn btn-primary">Reset</button>
                                            <button type="submit" @click="updateuser(user_post.user_id)" data-dismiss="modal" class="btn btn-success">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row edit user -->
                <div class="form-group form-material">
                    <button class="btn btn-primary waves-effect waves-light btn-sm" data-toggle="modal" data-target=".createuser"><i class="icon md-plus" aria-hidden="true"></i>Karyawan</button>
                </div>

                <table class="table is-indent">
                    <thead>
                        <tr>
                            <th  @click="setSort('nama')">nama <i class="icon wb-sort-vertical" aria-hidden="true"></i></th>
                            <th  @click="setSort('nip')">NIP <i class="icon wb-sort-vertical" aria-hidden="true"></i></th>
                            <th  @click="setSort('email')">E-Mail <i class="icon wb-sort-vertical" aria-hidden="true"></i></th>
                            <th  @click="setSort('posisi')">Posisi</th>

                            <th >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="user in advfiltering" v-bind:key="user.id">
                        
                            <td class="cell-300">
                                <div v-if="user.user_pic === null">
                                    <img height="40" width="40" class="img-circle" :src="'http://localhost:8000/' + 'defaultpic.jpg'" alt="...">   {{ user.user_name }}
                                </div>
                                <div v-else>
                                    <img height="40" width="40" class="img-circle" :src="'http://localhost:8000/' + user.user_pic" alt="...">   {{ user.user_name }}
                                </div>
                            </td>
                            <td class="cell-300">{{ user.user_nip }}</td>
                            <td class="cell-300">{{ user.user_email }}</td>
                            <td>
                                <div v-if="user.jobs != null">
                                    {{ user.jobs.jabatan }}
                                </div>
                                <div v-else>
                                    N/A
                                </div>
                            </td>
                            <td>
                                <div class="btn-group" aria-label="basic example" role="group">
                                    <button type="button" @click="deleteuser(user.user_id)" class="btn btn-sm btn-primary waves-effect" id="confirm" data-plugin="alertify" data-type="confirm" data-confirm-title="Apa Anda yakin?" data-success-message="Data Terhapus" data-error-message="Aksi di Batalkan"><i class="icon wb-trash" aria-hidden="true"></i>Delete</button>
                                    <button type="button" @click="edit(user)" class="btn btn-sm btn-primary waves-effect" data-toggle="modal" data-target=".edituser"><i class="icon wb-edit" aria-hidden="true"></i> Edit</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li v-bind:class="[{disabled : !pagination.prev_page_url}]" class="page-item">
                            <a class="page-link" @click="fetchUser(pagination.prev_page_url)">
                                Previous
                            </a>
                        </li>

                        <li class="page-item disabled"> 
                            <a class="page-link">
                                Page {{ pagination.current_page }} of {{ pagination.last_page }}
                            </a>
                        </li>

                        <li v-bind:class="[{disabled : !pagination.next_page_url}]" class="page-item">
                            <a class="page-link" @click="fetchUser(pagination.next_page_url)">
                                Next
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <foot-vues></foot-vues>
    </div>
</template>

<script>
export default {
    data(){
        return{
            user:[],
            
            divisi:[],

            search:'',

            sortby:'',

            sort_asc:true,

            user_post:{
                user_id:'',
                user_name:'',
                user_email:'',
                user_nip:'',
                image:'',
                id_tugas:'',
                pm:'',
                sl:'',
            },

           

            pagination:{},

            api_Key : this.token
        }
    },

    props:['token'],

    created(){
        this.fetchUser();
        this.getSo();
    },

    computed:{
          advfiltering:function() {
            let result = this.user;
           
            if (this.search) {
                result = result.filter( item =>
                item.user_name.includes(this.search)
                );
            }

            
            let asc_desc = this.sort_asc ? 1 : -1;

            if (this.sortby == 'nama') {
                return result.sort((a,b) => asc_desc * a.user_name.localeCompare(b.user_name))
            }
            
            if (this.sortby == 'email') {
                return result.sort((a,b) => asc_desc * a.user_email.localeCompare(b.user_email))
            }

            if (this.sortby == 'posisi') {
                return result.sort((a,b) => asc_desc * a.user_posi.localeCompare(b.user_posi))
            }

            if (this.sortby == 'nip') {
                return result.sort((a,b) => asc_desc * a.user_nip.localeCompare(b.user_nip))
            }

            return  result;
        },

    },

    methods:{
        fetchUser(url){
            let vm = this;

            url = url || 'api/user'
            fetch(url,{
                method:'get',
                headers:{
                    'Accept' :'application/json',
                    'X-Requested-With' : 'XMLHttpRequest',
                    'Authorization' : 'Bearer ' + this.api_Key
                },
            })
            .then(res => res.json())
            .then(
                res => {
                    this.user = res.data,
                    vm.makePaginate(res.meta, res.links);
                }
            )
            .catch( err => console.log(err));
        },

        getSo(){
            fetch('api/divisi',{
                method:'get',
                headers:{
                    'Accept' :'application/json',
                    'X-Requested-With' : 'XMLHttpRequest',
                },
            })
            .then(res => res.json())
            .then(
                res => {
                    this.divisi = res.data
                }
            )
            .catch( err => console.log(err));
        },

        setSort( preg ){
             let sortby = preg;
             this.sortby = sortby;
             //invert sorting set
             this.sort_asc = !this.sort_asc;
        },

        makePaginate(meta, links){
            let pagination = {
                current_page : meta.current_page,
                last_page : meta.last_page,
                next_page_url : links.next,
                prev_page_url : links.prev
            }
            this.pagination = pagination;
        },

        imageChange(e){
            
            var fileReader = new FileReader()

            fileReader.readAsDataURL(e.target.files[0])
            fileReader.onload = (e) => {
                this.user_post.image = e.target.result
            }

        },

        storeuser(){
            fetch('api/user/store',{
                method:'post',
                body:JSON.stringify(this.user_post),
                headers:{
                    'Content-Type':'application/json',
                    'Authorization' : 'Bearer ' + this.api_Key
                }
            })
            .then(res => res.data)
            .then(
                data => {
                        this.user_post.user_name = '';
                        this.user_post.user_email = '';
                        this.user_post.user_nip = '';
                        this.user_post.user_posi = '';
                        this.user_post.image = '';
                        this.user_post.id_tugas = '';
                        this.user_post.pm = '';
                        this.user_post.sl = '';

                        this.fetchUser();
                }
            )
            .catch(err => console.log(err));
        },

        edit(user){
                this.user_post.user_id = user.user_id,
                this.user_post.user_name = user.user_name,
                this.user_post.user_email = user.user_email,
                this.user_post.user_nip = user.user_nip,
                this.user_post.user_id = user.user_id,
                this.user_post.id_tugas = user.jobs.id 
        },

        updateuser(user_id){
            fetch(`api/user/update/${user_id}`,{
                method: 'put',
                body: JSON.stringify(this.user_post),
                headers:{
                    'Content-Type':'application/json',
                    'Authorization' : 'Bearer ' + this.api_Key
                }
            })
            .then(res => res.json)
            .then(
                res => {
                        this.user_post.user_name = '';
                        this.user_post.user_email = '';
                        this.user_post.user_nip = '';
                        this.user_post.pm = '';
                        this.user_post.sl = '';

                        this.fetchUser();
                }
            )
            .catch(err => console.log(err));
        },

        deleteuser(user_id){
            this.$swal({
                title: 'Anda Yakin?',
                text: "User akan terhapus permanent!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
            }).then((result) => {
                if (result.value) {        
                    fetch(`api/user/delete/${user_id}`,{
                    method:'delete',
                    headers:{
                        'Content-Type':'application/json',
                        'Authorization' : 'Bearer ' + this.api_Key
                    }   
                    })
                    .then(res => res.data)
                    .then(data => {
                        this.$swal(
                            'Terhapus!',
                            'Data user telah terhapus.',
                            'success'
                        )
                        this.fetchUser();
                    })
                    .catch(err=>console.log(err))
                }
            });


           
            
        },

    },//end methods
}
</script>
