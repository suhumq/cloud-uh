<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title_for_layout; ?> - Cloud UH</title>
    <?php
        echo $this->Html->meta('icon');
        echo $this->Html->css(array(
                      '../bootstrap/css/bootstrap.css', 
                      '../bootstrap/css/bootstrap.min.css', 
                      '../bootstrap/css/bootstrap-responsive.min.css',
                      '../lib/jquery-ui/css/Aristo/Aristo.css',
                      'tamarillo.css',
                      '../lib/jBreadcrumbs/css/BreadCrumb.css',
                      '../lib/qtip2/jquery.qtip.min.css',
                      '../lib/google-code-prettify/prettify.css',
                      '../lib/sticky/sticky.css',
                      '../lib/datepicker/datepicker.css',
                      '../lib/tag_handler/css/jquery.taghandler.css',
                      '../lib/uniform/Aristo/uniform.aristo.css',
                      '../lib/multiselect/css/multi-select.css',
                      '../lib/chosen/chosen.css',
                      '../img/splashy/splashy.css',
                      '../lib/colorbox/colorbox.css',
                      '../lib/sticky/sticky.css',
                      
                      '../media/css/TableTools.css',

                      '../lib/datatables/css/jquery.dataTables.css',
                      'style.css'
                   ));

        echo $this->Html->script(array(
                      'jquery.min.js', 
                      'jquery.debouncedresize.min.js',
                      'jquery.actual.min.js',
                      'jquery.cookie.min.js',
                      '../bootstrap/js/bootstrap.min.js',
                      '../lib/qtip2/jquery.qtip.min.js',
                      '../lib/jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js',
                      'ios-orientationchange-fix.js',
                      '../lib/datepicker/bootstrap-datepicker.min.js',
                      
                      '../lib/antiscroll/antiscroll.js',
                      '../lib/antiscroll/jquery-mousewheel.js',
                      '../lib/colorbox/jquery.colorbox.min.js',
                      '../lib/datatables/jquery.dataTables.min.js',
                      '../media/js/ZeroClipboard.js',
                      '../media/js/TableTools.min.js',
                      
                      '../lib/uniform/jquery.uniform.min.js',
                      '../lib/chosen/chosen.jquery.min.js',
                      '../lib/datatables/jquery.dataTables.sorting.js',
                      'gebo_common.js',
                      // 'gebo_forms.js',
                      '../lib/validation/jquery.validate.js',
                      'forms/jquery.inputmask.min.js',
                      'forms/jquery.editable.min.js',
                      '../lib/sticky/sticky.min.js',
                      '../lib/validation/jquery.validate.min.js',
                      'gebo_validation.js',
                      'jquery.price_format.js',
                      'jquery.price_format.min.js',
                      'jqueryformatCurrency.js',
                      'gebo_notifications.js'
                   ));

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
    ?>

   <script type="text/javascript">
          $(document).ready(function()
            {
                $('.currency').blur(function()
                {
                    $('.currency').formatCurrency();
                });
            });
   </script>
   <script>
        $(document).ready(function() {
            //* show all elements & remove preloader
            // $('.alert').delay(100).hide('highlight', {color: '#66cc66'}, 1500);
            $('.alert').delay(3000).fadeOut(1000, function() {
              $(this).addClass('img2');
            });

            setTimeout('$("html").removeClass("js")',1000);

         $('#project_date_start').datepicker({format: "dd/mm/yyyy"}).on('changeDate', function(ev){
            var dateText = $(this).data('date');
            $('#project_date_start').datepicker('hide');
         }); 
         $('#project_date_end').datepicker({format: "dd/mm/yyyy"}).on('changeDate', function(ev){
            var dateText = $(this).data('date');
            $('#project_date_end').datepicker('hide');
         }); 
         $('#birthday').datepicker({format: "dd/mm/yyyy"}).on('changeDate', function(ev){
            var dateText = $(this).data('date');
            $('#birthday').datepicker('hide');
         }); 
         $('#date_deadline').datepicker({format: "dd/mm/yyyy"}).on('changeDate', function(ev){
            var dateText = $(this).data('date');
            $('#date_deadline').datepicker('hide');
         }); 
          $('#date_paket').datepicker({format: "yyyy-mm-dd"}).on('changeDate', function(ev){
            var dateText = $(this).data('date');
            $('#trans_date').datepicker('hide');
         }); 
          $('#date_trans2').datepicker({format: "yyyy-mm-dd"}).on('changeDate', function(ev){
            var dateText = $(this).data('date');
            $('#date_trans2').datepicker('hide');
         }); 
          $('#date_neraca_1').datepicker({format: "yyyy-mm-dd"}).on('changeDate', function(ev){
            var dateText = $(this).data('date');
            $('#date_deadline').datepicker('hide');
         }); 
           $('#date_neraca_2').datepicker({format: "yyyy-mm-dd"}).on('changeDate', function(ev){
            var dateText = $(this).data('date');
            $('#date_deadline').datepicker('hide');
         }); 

         

          $(".chzn_project").chosen({
            allow_single_deselect: true
          });
          $(".chzn_unit").chosen({
            allow_single_deselect: true
          });
           $(".chzn_master_project").chosen({
            allow_single_deselect: true
          });
            $(".chzn_cashflow").chosen({
            allow_single_deselect: true
          });
            $(".chzn_neraca_1").chosen({
            allow_single_deselect: true
          });
            $(".chzn_neraca_2").chosen({
            allow_single_deselect: true
          });
          $(".chzn_sale").chosen({
            allow_single_deselect: true
          });


         
          // $("#dp1").inputmask("9999-99-99",{placeholder:"yyyy-mm-dd"});
           $("#infohotel").inputmask("9-9");
          
            $('#dt_monitorings').dataTable( {
              "sDom": 'T<"clear">lfrtip',
              "oTableTools": {
                "aButtons": [
                  "copy",
                  "csv",
                  "xls",
                  {
                    "sExtends": "pdf",
                    "sPdfOrientation": "landscape",
                    "sPdfMessage": "Data Customers"
                  },
                  "print"
                ]
              }
            } );

             $('#dt_contractors').dataTable( {
              "sDom": 'T<"clear">lfrtip',
              "oTableTools": {
                "aButtons": [
                  "copy",
                  "csv",
                  "xls",
                  {
                    "sExtends": "pdf",
                    "sPdfOrientation": "landscape",
                    "sPdfMessage": "Data Customers"
                  },
                  "print"
                ]
              }
            } );

            $('#dt_neracas').dataTable( {
              "sDom": 'T<"clear">lfrtip',
              "oTableTools": {
                "aButtons": [
                  "copy",
                  "csv",
                  "xls",
                  {
                    "sExtends": "pdf",
                    "sPdfOrientation": "landscape",
                    "sPdfMessage": "Data Customers"
                  },
                  "print"
                ]
              }
            } );

            $('#dt_jurnals').dataTable( {
              "sDom": 'T<"clear">lfrtip',
              "oTableTools": {
                "aButtons": [
                  "copy",
                  "csv",
                  "xls",
                  {
                    "sExtends": "pdf",
                    "sPdfOrientation": "landscape",
                    "sPdfMessage": "Data Customers"
                  },
                  "print"
                ]
              }
            } );

             $('#dt_bookings').dataTable( {
              "sDom": 'T<"clear">lfrtip',
              "oTableTools": {
                "aButtons": [
                  "copy",
                  "csv",
                  "xls",
                  {
                    "sExtends": "pdf",
                    "sPdfOrientation": "landscape",
                    "sPdfMessage": "Data Customers"
                  },
                  "print"
                ]
              }
            } );

            $('#dt_units').dataTable( {
              "sDom": 'T<"clear">lfrtip',
              "oTableTools": {
                "aButtons": [
                  "copy",
                  "csv",
                  "xls",
                  {
                    "sExtends": "pdf",
                    "sPdfOrientation": "landscape",
                    "sPdfMessage": "Data Customers"
                  },
                  "print"
                ]
              }
            } );

            $('#dt_projects').dataTable( {
              "sDom": 'T<"clear">lfrtip',
              "oTableTools": {
                "aButtons": [
                  "copy",
                  "csv",
                  "xls",
                  {
                    "sExtends": "pdf",
                    "sPdfOrientation": "landscape",
                    "sPdfMessage": "Data Customers"
                  },
                  "print"
                ]
              }
            } );


            $('#dt_customers').dataTable( {
              "sDom": 'T<"clear">lfrtip',
              "oTableTools": {
                "aButtons": [
                  "copy",
                  "csv",
                  "xls",
                  {
                    "sExtends": "pdf",
                    "sPdfOrientation": "landscape",
                    "sPdfMessage": "Data Customers"
                  },
                  "print"
                ]
              }
            } );
            
              $('#dt_units_list').dataTable( {
        // "bPaginate": false,
        "bLengthChange": false,
        "bFilter": true,
        "bSort": false,
        "bInfo": false,
        "bAutoWidth": false
    } );
           
            
        });
    </script>

</head>
<body>
   <div id="maincontainer" class="clearfix">
    <header>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="brand" href="/"><i class="icon-home icon-white"></i> Cloud Umrah Haji</a>
                    <ul class="nav user_menu pull-right">
                       <!--  <li class="hidden-phone hidden-tablet">
                            <div class="nb_boxes clearfix">
                                <a data-toggle="modal" data-backdrop="static" href="#myMail" class="label ttip_b" title="New messages">25 <i class="splashy-mail_light"></i></a>
                                <a data-toggle="modal" data-backdrop="static" href="#myTasks" class="label ttip_b" title="New tasks">10 <i class="splashy-calendar_week"></i></a>
                            </div>
                        </li> -->
                        <li class="divider-vertical hidden-phone hidden-tablet"></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo $this->Session->read('Auth.User.full_name'); ?> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                            <!-- <li><a href="#">My Profile</a></li> -->
                              <?php if ($this->Session->read('Auth.User.role')  == '1'): ?>
                              <li>
                              <?php echo $this->Html->link(__('Management User', true), array('controller' => 'users', 'action' => 'index'), array('style' => '')); ?> 
                              </li>
                              <li class="divider"></li>
                              <?php endif;?>
                              <li>
                              <?php echo $this->Html->link(__('Logout', true), array('controller' => 'users', 'action' => 'logout', 'admin' => false), array('style' => ''));?>
                              </li>

                            </ul>
                        </li>
                    </ul>
                    <a data-target=".nav-collapse" data-toggle="collapse" class="btn_menu">
                        <span class="icon-align-justify icon-white"></span>
                    </a>
                    <nav>
                        <div class="nav-collapse">
                            <ul class="nav">
                                <?php if ($this->Session->read('Auth.User.role')  != '3' ): ?>
                                 <li class="dropdown">
                                  <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-list-alt icon-white">
                                    </i> Master <b class="caret"></b></a>
                                     <ul class="dropdown-menu">
                                        <li><?php echo $this->Html->link(__('Data Paket', true), array('controller' => 'Packages', 'action' => 'index'));?></li>
                                        <li><?php echo $this->Html->link(__('Data Maskapai', true), array('controller' => 'Planes', 'action' => 'index'));?></li>
                                        <li><?php echo $this->Html->link(__('Data Konsumen', true), array('controller' => 'Customers', 'action' => 'index'));?></li>
                                        <li><?php echo $this->Html->link(__('Data Group', true), array('controller' => 'GroupBookings', 'action' => 'index'));?></li>
                                    </ul>
                                </li>
                                <?php endif; ?>
                               
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-download icon-white"></i>Transaksi <b class="caret"></b></a>
                                   <ul class="dropdown-menu">
                                        <li>
                                            <?php echo $this->Html->link(__('Paket', true), array('controller' => 'Bookings', 'action' => 'index'));?>
                                        </li>
                                        <li>
                                            <?php echo $this->Html->link(__('Operasional', true), array('controller' => 'Operationals', 'action' => 'index'));?>
                                        </li>
                                        <li>
                                            <?php echo $this->Html->link(__('Deposit', true), array('controller' => 'Deposits', 'action' => 'index'));?>
                                        </li>
                                    </ul>
                                </li>
                                <?php if ($this->Session->read('Auth.User.role')  == '1'): ?>                   
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-print icon-white"></i> Laporan <b class="caret"></b></a>
                                   <ul class="dropdown-menu">
                                        <li>
                                             <?php echo $this->Html->link(__('Jurnal', true), array('controller' => 'Jurnals', 'action' => 'index'));?>
                                        </li>
                                        <li>
                                             <?php echo $this->Html->link(__('Laba Rugi', true), array('controller' => 'Jurnals', 'action' => 'profit_loss'));?>
                                        </li>
                                    </ul>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="modal hide fade" id="myMail">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">×</button>
                <h3>New messages</h3>
            </div>
            <div class="modal-body">
                <div class="alert alert-info">In this table jquery plugin turns a table row into a clickable link.</div>
                <table class="table table-condensed table-striped" data-rowlink="a">
                    <thead>
                        <tr>
                            <th>Sender</th>
                            <th>Subject</th>
                            <th>Date</th>
                            <th>Size</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Declan Pamphlett</td>
                            <td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
                            <td>23/05/2012</td>
                            <td>25KB</td>
                        </tr>
                        <tr>
                            <td>Erin Church</td>
                            <td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
                            <td>24/05/2012</td>
                            <td>15KB</td>
                        </tr>
                        <tr>
                            <td>Koby Auld</td>
                            <td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
                            <td>25/05/2012</td>
                            <td>28KB</td>
                        </tr>
                        <tr>
                            <td>Anthony Pound</td>
                            <td><a href="javascript:void(0)">Lorem ipsum dolor sit amet</a></td>
                            <td>25/05/2012</td>
                            <td>33KB</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <a href="javascript:void(0)" class="btn">Go to mailbox</a>
            </div>
        </div>
        <div class="modal hide fade" id="myTasks">
            <div class="modal-header">
                <button class="close" data-dismiss="modal">×</button>
                <h3>New Tasks</h3>
            </div>
            <div class="modal-body">
                <div class="alert alert-info">In this table jquery plugin turns a table row into a clickable link.</div>
                <table class="table table-condensed table-striped" data-rowlink="a">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Summary</th>
                            <th>Updated</th>
                            <th>Priority</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>P-23</td>
                            <td><a href="javascript:void(0)">Admin should not break if URL&hellip;</a></td>
                            <td>23/05/2012</td>
                            <td class="tac"><span class="label label-important">High</span></td>
                            <td>Open</td>
                        </tr>
                        <tr>
                            <td>P-18</td>
                            <td><a href="javascript:void(0)">Displaying submenus in custom&hellip;</a></td>
                            <td>22/05/2012</td>
                            <td class="tac"><span class="label label-warning">Medium</span></td>
                            <td>Reopen</td>
                        </tr>
                        <tr>
                            <td>P-25</td>
                            <td><a href="javascript:void(0)">Featured image on post types&hellip;</a></td>
                            <td>22/05/2012</td>
                            <td class="tac"><span class="label label-success">Low</span></td>
                            <td>Updated</td>
                        </tr>
                        <tr>
                            <td>P-10</td>
                            <td><a href="javascript:void(0)">Multiple feed fixes and&hellip;</a></td>
                            <td>17/05/2012</td>
                            <td class="tac"><span class="label label-warning">Medium</span></td>
                            <td>Open</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <a href="javascript:void(0)" class="btn">Go to task manager</a>
            </div>
        </div>
    </header>
    <div id="content-area">
        <div class="wraper">
            <div id="contentwrapper">
            <div class="main_content">
                <!-- <nav>
                    <div id="jCrumbs" class="breadCrumb module">
                        <ul>
                            <li>
                                <a href="/"><i class="icon-home"></i></a>
                            </li>
                            <li>
                                <a href="#"><?php echo $title_for_layout; ?></a>
                            </li>
                        </ul>
                    </div>
                </nav> -->
                     <p> <?php echo $this->Session->flash(); ?> </p>
                
                <?php echo $this->fetch('content'); ?>
            </div>
        </div>
    </div>
</body>
</html>
