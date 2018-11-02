<template>
    <div class="page-content">
        <!-- Panel -->
        <div class="panel">
          <div class="panel-body container-fluid">
            <div class="row">
              <div class="col-xs-12 col-lg-3">
                <h4>
                  <img class="m-r-10" src="" alt="...">POME</h4>
                <address>
                  795 Folsom Ave, Suite 600
                  <br> San Francisco, CA, 94107
                  <br>
                  <abbr title="Mail">E-mail:</abbr>&nbsp;&nbsp;example@google.com
                  <br>
                  <abbr title="Phone">Phone:</abbr>&nbsp;&nbsp;(123) 456-7890
                  <br>
                  <abbr title="Fax">Fax:</abbr>&nbsp;&nbsp;800-692-7753
                </address>
              </div>
              <div class="col-xs-12 col-lg-3 offset-lg-6 text-xs-right">
                <h4>Client Info</h4>
                <p>
                  <a class="font-size-20" href="javascript:void(0)">#5669626</a>
                  <br> To:
                  <br>
                  <span class="font-size-20">Machi</span>
                </p>
                <address>
                  795 Folsom Ave, Suite 600
                  <br> San Francisco, CA, 94107
                  <br>
                  <abbr title="Phone">P:</abbr>&nbsp;&nbsp;(123) 456-7890
                  <br>
                </address>
                <span>Invoice Date: January 20, 2017</span>
                <br>
                <span>Due Date: January 22, 2017</span>
              </div>
            </div>
            <div class="page-invoice-table table-responsive">
              <table class="table table-hover text-xs-right">
                <thead>
                  <tr>
                    <th class="text-xs-center">#</th>
                    <th>Description</th>
                    <th class="text-xs-right">Unit Cost</th>
                    <th class="text-xs-right">Total</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-xs-center">
                      1
                    </td>
                    <td class="text-xs-left">
                      Server hardware purchase
                    </td>
                    <td>
                      $75
                    </td>
                    <td>
                      $2152
                    </td>
                  </tr>
                  <tr>
                    <td class="text-xs-center">
                      2
                    </td>
                    <td class="text-xs-left">
                      Office furniture purchase
                    </td>
                    <td>
                      $169
                    </td>
                    <td>
                      $4169
                    </td>
                  </tr>
                  <tr>
                    <td class="text-xs-center">
                      3
                    </td>
                    <td class="text-xs-left">
                      Company Anual Dinner Catering
                    </td>
                    <td>
                      $49
                    </td>
                    <td>
                      $1260
                    </td>
                  </tr>
                  <tr>
                    <td class="text-xs-center">
                      4
                    </td>
                    <td class="text-xs-left">
                      Payment for Jan 2017
                    </td>
                    <td>
                      $12
                    </td>
                    <td>
                      $866
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="text-xs-right clearfix">
              <div class="pull-xs-right">
                <p>Sub - Total amount:
                  <span>$4800</span>
                </p>
                <p>VAT:
                  <span>$35</span>
                </p>
                <p class="page-invoice-amount">Grand Total:
                  <span>$4835</span>
                </p>
              </div>
            </div>
            <div class="text-xs-right">
              <button type="button" class="btn btn-animate btn-animate-side btn-info" onclick="javascript:window.print();">
                <span><i class="icon md-print" aria-hidden="true"></i> Print</span>
              </button>
            </div>
          </div>
        </div>
        <!-- End Panel -->
      </div>
</template>
<script>
export default {
    data(){
        return {
            invoice:[],
            api_token:this.token,

        }
    },

    props:['token','id'],

    computed:{

    },

    created(){

    },

    methods:{
      
    },
    
}
</script>

