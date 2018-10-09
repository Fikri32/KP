@extends('layouts.admin')

@section('content')
<div class="col-xl-3 col-md-6">
       
        <!-- Widget Linearea One-->
        <div class="card card-shadow" id="widgetLineareaOne">
        <div class="card-block p-20 p-t-10">
            <div class="clearfix">
            <div class="grey-800 pull-xs-left p-y-10">
                <i class="icon oi-briefcase grey-600 font-size-24 vertical-align-bottom m-r-5"></i> PROJECT
            </div>
            <span class="pull-xs-right grey-700 font-size-30">5</span>
            </div>
        </div>
        </div>
        <!-- End Widget Linearea One -->
    </div>
    <div class="col-xl-3 col-md-6">
        <!-- Widget Linearea Two -->
        <div class="card card-shadow" id="widgetLineareaTwo">
        <div class="card-block p-20 p-t-10">
            <div class="clearfix">
            <div class="grey-800 pull-xs-left p-y-10">
                <i class="icon md-account grey-600 font-size-24 vertical-align-bottom m-r-5"></i> STAFF
            </div>
            <span class="pull-xs-right grey-700 font-size-30">3</span>
            </div>

        </div>
        </div>
        <!-- End Widget Linearea Two -->
    </div>
    <div class="col-xl-3 col-md-6">
        <!-- Widget Linearea Three -->
        <div class="card card-shadow" id="widgetLineareaThree">
        <div class="card-block p-20 p-t-10">
            <div class="clearfix">
            <div class="grey-800 pull-xs-left p-y-10">
                <i class="icon md-chart grey-600 font-size-24 vertical-align-bottom m-r-5"></i> PROJECT COMPLETE
            </div>
            <span class="pull-xs-right grey-700 font-size-30">1</span>
            </div>
        </div>
        </div>
        <!-- End Widget Linearea Three -->
    </div>
    <div class="col-xl-3 col-md-6">
        <!-- Widget Linearea Four -->
        <div class="card card-shadow" id="widgetLineareaFour">
        <div class="card-block p-20 p-t-10">
            <div class="clearfix">
            <div class="grey-800 pull-xs-left p-y-10">
                <i class="icon md-view-list grey-600 font-size-24 vertical-align-bottom m-r-5"></i> PROJECT BERJALAN
            </div>
            <span class="pull-xs-right grey-700 font-size-30">4</span>
            </div>

        </div>
        </div>
        <!-- End Widget Linearea Four -->
    </div>
    <div class="clearfix"></div>
 

        <div class="col-lg-6 col-xl-3  col-xs-12">
        <div class="card user-visitors">
            <div class="card-header card-header-transparent p-20">
            <h4 class="card-title m-b-0">Staff</h4>
            </div>
            <div class="card-block">
            <ul class="list-group list-group-full">
                <li class="list-group-item">
                <div class="media">
                    <div class="media-left">
                    <a class="avatar avatar-online" href="javascript:void(0)">
                        <img class="img-fluid" src="../../../global/portraits/11.jpg">
                        <i></i>
                    </a>
                    </div>
                    <div class="media-body">
                    <h4 class="media-heading hover">Dan Cederholm
                    </h4>
                    <small>Co-founder of Company</small>
                    </div>
                    <div class="media-right p-t-10 p-b-10 p-0">
                    </div>
                </div>
                </li>
                <li class="list-group-item">
                <div class="media">
                    <div class="media-left">
                    <a class="avatar" href="javascript:void(0)">
                        <img class="img-fluid" src="../../../global/portraits/12.jpg">
                    </a>
                    </div>
                    <div class="media-body">
                    <h4 class="media-heading hover">Oykun Yilmaz</h4>
                    <small>Co-founder of Company</small>
                    </div>
                    <div class="media-right p-t-10 p-b-10 p-0">
                    </div>
                </div>
                </li>
                <li class="list-group-item">
                <div class="media">
                    <div class="media-left">
                    <a class="avatar" href="javascript:void(0)">
                        <img class="img-fluid" src="../../../global/portraits/10.jpg">
                    </a>
                    </div>
                    <div class="media-body">
                    <h4 class="media-heading hover">Caleb Richards</h4>
                    <small>Co-founder of Company</small>
                    </div>
                    <div class="media-right p-t-10 p-b-10 p-0">
                    </div>
                </div>
                </li>
                <li class="list-group-item">
                <div class="media">
                    <div class="media-left">
                    <a class="avatar" href="javascript:void(0)">
                        <img class="img-fluid" src="../../../global/portraits/1.jpg">
                    </a>
                    </div>
                    <div class="media-body">
                    <h4 class="media-heading hover">June Lane</h4>
                    <small>Co-founder of Company</small>
                    </div>
                    <div class="media-right p-t-10 p-b-10 p-0">
                    </div>
                </div>
                </li>
            </ul>
            <div class="text-xs-center">
                <button class="btn btn-round btn-outline btn-primary" type="button" name="button">See all
                <span>(19)</span>
                </button>
            </div>
            </div>
        </div>

        <!-- End Panel Projects -->
    </div>
    <div class="col-xxl-7 col-lg-6">
        <!-- Panel Projects Status -->
        <div class="panel" id="projects-status">
        <div class="panel-heading">
            <h3 class="panel-title">
            Projects Status
            <span class="tag tag-pill tag-info">5</span>
            </h3>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
            <thead>
                <tr>
                <td>ID</td>
                <td>Project</td>
                <td>Status</td>
                
                </tr>
            </thead>
            <tbody>
                <tr>
                <td>619</td>
                <td>The sun climbing plan</td>
                <td>
                    <span class="tag tag-primary">Developing</span>
                </td>
                
                </tr>
                <tr>
                <td>620</td>
                <td>Lunar probe project</td>
                <td>
                    <span class="tag tag-warning">Design</span>
                </td>
                
                </tr>
                <tr>
                <td>621</td>
                <td>Dream successful plan</td>
                <td>
                    <span class="tag tag-info">Testing</span>
                </td>
                
                </tr>
                <tr>
                <td>622</td>
                <td>Office automatization</td>
                <td>
                    <span class="tag tag-danger">Canceled</span>
                </td>
                
                </tr>
                <tr>
                <td>623</td>
                <td>Open strategy</td>
                <td>
                    <span class="tag tag-default">Reply waiting</span>
                </td>
                
                </tr>
            </tbody>
            </table>
        </div>
        </div>
        <!-- End Panel Projects Stats -->
</div>
@endsection
