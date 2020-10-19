<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
     @include('partials.head')
</head>
 
<body>
 <script src="{{url('')}}/assets/global/plugins/jquery.min.js" type="text/javascript"></script>   
 <script src="{{url('')}}/assets/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>
<!--<div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
  <div class="pace-progress-inner"></div>
</div>
<div class="pace-activity"></div></div>   -->
<div id="wrapper">
    <!-- BEGIN SIDEBAR -->
    @include('partials.sidebar')
     <!-- END SIDEBAR -->
     <!-- BEGIN HEADER -->
    <div id="page-wrapper" class="gray-bg">
    <div class="row border-bottom">
        <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
           

        </nav>
</div>
    
    <!-- END HEADER -->
    <!-- BEGIN HEADER & CONTENT DIVIDER -->
    <!--<div class="clearfix"></div>-->
    <!-- END HEADER & CONTENT DIVIDER -->
    <!-- BEGIN CONTAINER -->
    <!--<div class="page-container">-->
    
        <!-- BEGIN CONTENT -->
        <!--<div class="page-content-wrapper">-->
            <!-- BEGIN CONTENT BODY -->
            <!--<div class="page-content">-->
                <!-- BEGIN PAGE HEADER-->
				 
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2><?php // echo isset($title) ? $title : ""; ?></h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('home')}}"> Home</a>
                        </li>
                        
                       
                    </ol>
                    
                </div>
                <div class="col-sm-8">
                    <div class="title-action">
                       
                   
                    @yield('action')
                        
               
                    </div>
                    
                </div>
        </div>
                             
                                 
                                 <div class="wrapper wrapper-content">
                                        <?php // echo $output; ?>
                                     @yield('content')
                                      <div id="load-modal-template"></div> 
                                 </div>
		 <!--<script src="{{url('')}}/assets/global/plugins/jquery.min.js" type="text/javascript"></script>-->  		
            <!--</div>-->
            <!-- END CONTENT BODY -->
        <!--</div>-->
        <!-- END CONTENT -->
    <!--</div>-->
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    
	@include('partials.footer')
        
    <!-- END FOOTER -->
</div>
    
</div>



<!-- Mainly scripts -->
      <script src="{{url('')}}/assets/global/js/popper.min.js"></script>
      <script src="{{url('')}}/assets/global/js/bootstrap.min.js"  type="text/javascript"></script>
      <script src="{{url('')}}/assets/global/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
      <script src="{{url('')}}/assets/global/js/plugins/datapicker/bootstrap-datepicker.js"></script>
     

     <!--Custom and plugin javascript--> 
     <script src="{{url('')}}/assets/global/js/plugins/fullcalendar/moment.min.js"></script>

    <script src="{{url('')}}/assets/global/js/inspinia.js"></script>
    
    <script src="{{url('')}}/assets/global/js/plugins/pace/pace.min.js"></script>
    <script src="{{url('')}}/assets/global/js/plugins/iCheck/icheck.min.js"></script>
    <script src="{{url('')}}/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/global/plugins/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/global/plugins/select2/js/select2.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/global/scripts/app.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/global/scripts/datatable.js"></script>
    <script src="{{url('')}}/assets/global/plugins/datatables/datatables.min.js"></script>
    <script src="{{url('')}}/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js"></script>
    <!--<script src="{{url('')}}/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js"></script>-->
    <script src="{{url('')}}/assets/global/plugins/typehead/bootstrap3-typeahead.min.js"></script>
    <script src="{{url('')}}/assets/global/js/plugins/fullcalendar/fullcalendar.min.js"></script>
    <script src="{{url('')}}/assets/global/js/plugins/select2/select2.full.min.js"></script>


     <script src="{{url('')}}/assets/global/js/plugins/metisMenu/jquery.metisMenu.js"></script>
     <script src="{{url('')}}/assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
     <script src="{{url('')}}/assets/global/plugins/jquery-validation/js/jquery.validate.js"></script>
     

     
    
<!--    <script src="{{url('')}}assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>-->
    <script src="{{url('')}}/assets/main.js" type="text/javascript"></script>
    <script src="{{url('')}}/assets/custom.js" type="text/javascript"></script>
<script type="text/javascript">
    'use strict';
    var BASE_URL = '<?php // echo base_url(); ?>'   
    
</script>
@yield('script');
</body>
</html>
