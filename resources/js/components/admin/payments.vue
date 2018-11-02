<template>
    <div>
        <div class="page-aside">
            <div class="page-aside-inner page-aside-scroll">
               
                <div data-role="container">
                    <div data-role="content">
                        
                        <div class="page-aside-section">
                            <h5 class="page-aside-title">Main</h5>
                            <div class="list-group">
                                <a class="list-group-item" href="/project"><i class="icon md-view-dashboard" aria-hidden="true"></i>Project List</a>
                                <a class="list-group-item" href="/Setting"><i class="icon md-assignment" aria-hidden="true"></i>Setting Project</a>
                            </div>
                        </div>

                    </div>
                </div>
                
            </div>
        </div>
        <div class="page-main">
            <div class="page-header">
                <div class="page-title">
                    Pembayaran Project {{ payments.project_name }}<br>
                </div>
                <div class="page-header-actions">
                    <div class="page-content-actions">
                       
                    </div>
                </div>
            </div>
            <div>
            </div>
            <div id="contactsContent" class="page-content page-content-table">
                 <!-- Actions -->
                <div class="page-content-actions">
                    <div class="pull-xs-left">
                        <button data-toggle="modal" data-target="#payments" type="button" class="btn btn-primary btn-md empty-btn">Pembayaran</button>
                    </div>
                </div>
                <table class="table">
                  <thead>
                      <th>#</th>
                      <th>Desckripsi</th>
                      <th>Tanggal Pembayaran</th>
                      <th>Jumlah Pembayaran</th>
                      <th></th>
                  </thead>
                  <tbody>
                      <tr v-for="item in payments.pembayaran" :key="item.id"> 
                        <td>
                            {{item.id}}
                        </td>
                        <td>
                            {{item.desc}}
                        </td>
                        <td>
                            {{item.paid_at}}
                        </td>
                        <td>
                            Rp.{{currencyFormat(item.payment_amount)}}
                        </td>
                        <td>
                            <button type="button" @click="editPayments(item)" data-toggle="modal" data-target="#editing_payment" class="btn btn-icon btn-warning btn-round waves-effect"><i class="icon md-edit" aria-hidden="true"></i></button>
                            <button type="button" @click="deletePayments(item.id)" class="btn btn-icon btn-danger btn-round waves-effect"><i class="icon md-delete" aria-hidden="true"></i></button>
                        </td>
                      </tr>
                  </tbody>
                </table>
            </div>

            <div class="text-xs-left clearfix">
              <div class="pull-xs-left">
                <h5>
                    <p class="page-invoice-amount"> Total:
                        <span>Rp. {{totalCalc(payments.pembayaran)}}</span>
                    </p>
                </h5>
              </div>
            </div>
            <!-- Add Payments Form -->
            <div class="modal fade" id="payments" aria-hidden="true" aria-labelledby="payments"
            role="dialog" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
                            <h4 class="modal-title">Pembayaran</h4>
                        </div>
                        
                        <form @submit.prevent="storePayments()">
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="item form-group">
                                        <h6>
                                            Deskripsi 
                                        </h6>
                                        <textarea v-model="payment_post.desc" class="form-control" cols="3" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <h6>
                                        Tanggal Bayar
                                    </h6>
                                    <input v-model="payment_post.paid_at" class="form-control" type="date">
                                </div>

                                <div class="item form-group">
                                    <h6>
                                        Jumlah Bayar
                                    </h6>
                                    <input v-model="payment_post.amount" class="form-control" type="number" >
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
            <div class="modal fade" id="editing_payment" aria-hidden="true" aria-labelledby="editing_payment"
            role="dialog" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" aria-hidden="true" data-dismiss="modal">×</button>
                            <h4 class="modal-title">Pembayaran</h4>
                        </div>
                        
                        <form @submit.prevent="updatePayments(payment_post.pay_id)">
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="item form-group">
                                        <h6>
                                            Deskripsi 
                                        </h6>
                                        <textarea v-model="payment_post.desc" class="form-control" cols="3" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <h6>
                                        Tanggal Bayar
                                    </h6>
                                    <input v-model="payment_post.paid_at" class="form-control" type="date">
                                </div>

                                <div class="item form-group">
                                    <h6>
                                        Jumlah Bayar
                                    </h6>
                                    <input v-model="payment_post.amount" class="form-control" type="number" >
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
        </div>
    </div>
</template>
<script>
export default {
    data(){
        return{
            payments:[],
            payment_post:{
                project : this.id,
                desc    : '',
                paid_at : '',
                amount  : '',
                //for updating and deleting payments
                pay_id  : '',
            },
            set_id : this.id,
            api_key : this.token,
        }
    },

    props:['token','id'],

    computed:{
        sorting: function(){

        },
    },

    created(){
        this.fetchPayment();
    },

    methods:{
        fetchPayment(){
           this.payments = 'loading...';

           let header_axios = {
                'Accept' :'application/json',
                'Authorization' : 'Bearer ' + this.api_key
           }

           var vm = this;

           axios.get('/api/project/' + this.set_id,{
               headers:header_axios
           })
           .then(function(response){
               vm.payments = response.data;

           })
           .catch(function(error){
               vm.payments = 'Error Occured!';
           });
        },
        //-------------------------------------
        //cruds
        storePayments(){
            fetch('/api/payment/store',{
                method:'post',
                body:JSON.stringify(this.payment_post),
                headers:{
                    'Content-Type' : 'application/json',
                    'Authorization' : 'Bearer ' + this.api_key,
                }
            })
            .then(res => res.data)
            .then(data => {
                this.payment_post.project = this.id;
                this.payment_post.desc = '';
                this.payment_post.paid_at = '';
                this.payment_post.amount = '';
                this.fetchPayment();
            })
            .catch()
        },

        editPayments(params){
            this.payment_post.desc      = params.desc;
            this.payment_post.paid_at   = params.paid_at;
            this.payment_post.amount    = params.payment_amount;
            this.payment_post.pay_id    = params.id;
        },

        updatePayments(params){
            fetch(`/api/payment/update/${params}`,{
                method:'put',
                body:JSON.stringify(this.payment_post),
                headers:{
                    'Content-Type' : 'application/json',
                    'Authorization' : 'Bearer ' + this.api_key,
                }
            })
            .then(res => res.json)
            .then(res => {
                this.payment_post.project = this.id;
                this.payment_post.desc = '';
                this.payment_post.paid_at = '';
                this.payment_post.amount = '';
                this.fetchPayment();
            })
            .catch(err => console.log(err))
        },

        deletePayments(params){
            this.$swal({
                title: 'Anda yakin?',
                text: "Data pembayaran akan terhapus permanent!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya!',
                cancelButtonText:'Tidak!'
            }).then((result) => {
            if (result.value) {

                fetch(`/api/payment/delete/${params}`,{
                    method:'delete',
                    headers:{
                        'Content-Type' : 'application/json',
                        'Authorization' : 'Bearer ' + this.api_key,
                    }
                })
                .then(res => res.json)
                .then(res => {
                    this.$swal(
                        'Terhapus!',
                        'Data pembayaran berhasil di hapus.',
                        'success'
                    )
                    this.fetchPayment();
                })
                .catch(err => console.log(err))
             
            }
            });
        },
        //--------------------------------------
        //other operations 
        currencyFormat(params) {
            let val = (params/1).toFixed(2).replace('.', ',')
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
        },

        totalCalc(params){
            let result = 0;

            for (let i = 0; i < params.length; i++) {
                result += params[i].payment_amount;
            }

            let formatedResult = (result/1).toFixed(2).replace('.', ',')
            return formatedResult.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        },

    }
}
</script>
