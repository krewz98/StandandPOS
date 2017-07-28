<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from avenxo.kaijuthemes.com/ui-typography.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Jun 2016 12:09:25 GMT -->
<head>
    <meta charset="utf-8">
    <title>JCORE - <?php echo $title; ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="description" content="Avenxo Admin Theme">
    <meta name="author" content="">


    <?php echo $_def_css_files; ?>

    <link rel="stylesheet" href="assets/plugins/spinner/dist/ladda-themeless.min.css">

    <link type="text/css" href="assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">
    <link type="text/css" href="assets/plugins/datatables/dataTables.themify.css" rel="stylesheet">
    <link href="assets/plugins/datapicker/datepicker3.css" rel="stylesheet">

    <link href="assets/plugins/select2/select2.min.css" rel="stylesheet">

    <!-- Datepicker --->
    <link href="assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">

    <style>
        .toolbar{
            float: left;
        }

        td.details-control {
            background: url('assets/img/Folder_Closed.png') no-repeat center center;
            cursor: pointer;
        }
        tr.details td.details-control {
            background: url('assets/img/Folder_Opened.png') no-repeat center center;
        }

        .child_table{
            padding: 5px;
            border: 1px #ff0000 solid;
        }

        .glyphicon.spinning {
            animation: spin 1s infinite linear;
            -webkit-animation: spin2 1s infinite linear;
        }

        .select2-container{
            min-width: 100%;
        }

        .dropdown-menu > .active > a,.dropdown-menu > .active > a:hover{
            background-color: dodgerblue;
        }

        @keyframes spin {
            from { transform: scale(1) rotate(0deg); }
            to { transform: scale(1) rotate(360deg); }
        }

        @-webkit-keyframes spin2 {
            from { -webkit-transform: rotate(0deg); }
            to { -webkit-transform: rotate(360deg); }
        }



        /*table{
            min-width: 700px;
        }

        .dataTables_filter{
            min-width: 700px;
        }

        .dataTables_info{
            min-width: 700px;
        }

        .dataTables_paginate{
            float: left;
            width: 100%;
        }*/

    </style>
</head>

<body class="animated-content">

<?php echo $_top_navigation; ?>

<div id="wrapper">
    <div id="layout-static">


        <?php echo $_side_bar_navigation;

        ?>


        <div class="static-content-wrapper white-bg">


            <div class="static-content"  >
                <div class="page-content"><!-- #page-content -->

                    <ol class="breadcrumb">
                        <li><a href="dashboard">Dashboard</a></li>
                        <li><a href="users">Company Information  <?php //print_r($user_groups); ?></a></li>
                    </ol>


                <div class="container-fluid">
                        <div data-widget-group="group1">
                            <div class="row">
                                <div class="col-md-12">



                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h2>Notes Information</h2>
                                                <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body"}'></div>
                                            </div>

                                            <div class="panel-body">


                                               <form id="frm_notes" role="form" class="form-horizontal row-border">


                                                   <div class="form-group">
                                                       <label class="col-md-2 col-md-offset-1 control-label"> Note 1 :</label>
                                                       <div class="col-md-7">
                                                           <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                </span>
															                                       <input type="text" name="note_id" value="<?php echo $notes->note_id; ?>" class="form-control" placeholder="Company Name" style="display:none;">
                                                               <input type="text" name="note_1" value="<?php echo $notes->note1; ?>" class="form-control" placeholder="Company Name">
                                                           </div>
                                                       </div>
                                                   </div>


                                                   <div class="form-group">
                                                       <label class="col-md-2 col-md-offset-1 control-label"> Note 2 :</label>
                                                       <div class="col-md-7">
                                                           <div class="input-group">
                                                                <span class="input-group-addon">
                                                                      <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                </span>
                                                               <input type="text" name="note_2" value="<?php echo $notes->note2; ?>" class="form-control" placeholder="Company Address">
                                                           </div>
                                                       </div>
                                                   </div>

                                                   <div class="form-group">
                                                       <label class="col-md-2 col-md-offset-1 control-label"> Note 3 :</label>
                                                       <div class="col-md-7">
                                                           <div class="input-group">
                                                                <span class="input-group-addon">
                                                                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                </span>
                                                               <input type="text" name="note_3" class="form-control" value="<?php echo $notes->note3; ?>" placeholder="Email Address">
                                                           </div>

                                                       </div>
                                                   </div>


                                                   <div class="form-group">
                                                       <label class="col-md-2 col-md-offset-1 control-label"> Note 4 :</label>
                                                       <div class="col-md-7">
                                                           <div class="input-group">
                                                                <span class="input-group-addon">
                                                                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                </span>
                                                               <input type="text" name="note_4" class="form-control" value="<?php echo $notes->note4; ?>" placeholder="Mobile #">
                                                           </div>
                                                       </div>
                                                   </div>


                                                   <div class="form-group">
                                                       <label class="col-md-2 col-md-offset-1 control-label"> Note 5 :</label>
                                                       <div class="col-md-7">
                                                           <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                </span>
                                                               <input type="text" name="note_5" value="<?php echo $notes->note5; ?>" class="form-control" placeholder="Landline">
                                                           </div>
                                                       </div>
                                                   </div>


                                                   <div class="form-group">
                                                       <label class="col-md-2 col-md-offset-1 control-label"> Note 6 :</label>
                                                       <div class="col-md-7">
                                                           <div class="input-group">
                                                                <span class="input-group-addon">
                                                                     <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                </span>
                                                               <input type="text" name="note_6"  value="<?php echo $notes->note6; ?>" class="form-control" placeholder="Lastname">
                                                           </div>
                                                       </div>
                                                   </div>

                                                   <div class="form-group">
                                                       <label class="col-md-2 col-md-offset-1 control-label"> Note 7 :</label>
                                                       <div class="col-md-7">
                                                           <div class="input-group">
                                                                <span class="input-group-addon">
                                                                     <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                </span>
                                                               <input type="text" name="note_7" value="<?php echo $notes->note7; ?>" class="form-control" placeholder="Registered to">
                                                           </div>
                                                       </div>
                                                   </div>
												   
                                                   <div class="form-group">
                                                       <label class="col-md-2 col-md-offset-1 control-label"> Note 8 :</label>
                                                       <div class="col-md-7">
                                                           <div class="input-group">
                                                                <span class="input-group-addon">
                                                                     <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                </span>
                                                               <input type="text" name="note_8" value="<?php echo $notes->note8; ?>" class="form-control" placeholder="Registered to">
                                                           </div>
                                                       </div>
                                                   </div>

                                                   <div class="form-group">
                                                       <label class="col-md-2 col-md-offset-1 control-label"> Note 9 :</label>
                                                       <div class="col-md-7">
                                                           <div class="input-group">
                                                                <span class="input-group-addon">
                                                                     <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                </span>
                                                               <input type="text" name="note_9" value="<?php echo $notes->note9; ?>" class="form-control" placeholder="Registered to">
                                                           </div>
                                                       </div>
                                                   </div>

                                                   <div class="form-group">
                                                       <label class="col-md-2 col-md-offset-1 control-label"> Note 10 :</label>
                                                       <div class="col-md-7">
                                                           <div class="input-group">
                                                                <span class="input-group-addon">
                                                                     <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                                </span>
                                                               <input type="text" name="note_10" value="<?php echo $notes->note9; ?>" class="form-control" placeholder="Registered to">
                                                           </div>
                                                       </div>
                                                   </div>
												   
                                                   <div style="display:none;" class="form-group">
                                                       <label class="col-md-3 control-label"> *Tax Type :</label>
                                                       <div class="col-md-7">
                                                           <select name="" id="tax_group" data-error-msg="Tax Type is required.">
                                                               <option value="0">[ Create Tax Type Group ]</option>

                                                                   <option value=""><?php echo $group->tax_type; ?></option>

                                                           </select>
                                                       </div>
                                                   </div>

                                               </form>


                                                    <br /><br />








                                            </div>
                                            <div class="panel-footer">
                                                <div class="row">
                                                    <div class="col-sm-10 col-sm-offset-3">
                                                        <button id="btn_save" class="btn-primary btn" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;"><span class=""></span>  Save Changes</button>
                                                     
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>




                                </div>
                            </div>
                        </div>
                </div> <!-- .container-fluid -->

                </div> <!-- #page-content -->
            </div>


            <div id="modal_confirmation" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog modal-sm">
                    <div class="modal-content"><!---content--->
                        <div class="modal-header">
                            <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title"><span id="modal_mode"> </span>Confirm Deletion</h4>

                        </div>

                        <div class="modal-body">
                            <p id="modal-body-message">Are you sure ?</p>
                        </div>

                        <div class="modal-footer">
                            <button id="btn_yes" type="button" class="btn btn-danger" data-dismiss="modal" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;">Yes</button>
                            <button id="btn_close" type="button" class="btn btn-default" data-dismiss="modal" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;">No</button>
                        </div>
                    </div><!---content---->
                </div>
            </div><!---modal-->

            <div id="modal_tax_group" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog modal-md">
                    <div class="modal-content"><!---content--->
                        <div class="modal-header">
                            <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title"><span id="modal_mode"> </span>New Tax Group</h4>

                        </div>

                        <div class="modal-body">
                            <form id="frm_tax_group">
                                <div class="form-group">
                                    <label>* Tax Type :</label>
                                    <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-envelope-o"></i>
                                                </span>
                                        <input type="text" name="tax_name" class="form-control" placeholder="Tax group" data-error-msg="Tax name is required." required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>* Tax Rate :</label>
                                    <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-envelope-o"></i>
                                                </span>
                                        <input type="number" name="tax_rate" class="form-control" placeholder="Tax Rate" data-error-msg="Tax Rate is required." required>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label>Description :</label>
                                    <div class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <textarea name="tax_group_desc" class="form-control"></textarea>
                                    </div>
                                </div>
                            </form>


                        </div>

                        <div class="modal-footer">
                            <button id="btn_create_tax_group" type="button" class="btn btn-primary"  style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;"><span class=""></span> Create</button>
                            <button id="btn_close_user_group" type="button" class="btn btn-default" data-dismiss="modal" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;">Cancel</button>
                        </div>
                    </div><!---content---->
                </div>
            </div><!---modal-->






            <footer role="contentinfo">
                <div class="clearfix">
                    <ul class="list-unstyled list-inline pull-left">
                        <li><h6 style="margin: 0;">&copy; 2017 - JDEV IT Business Solutions</h6></li>
                    </ul>
                    <button class="pull-right btn btn-link btn-xs hidden-print" id="back-to-top"><i class="ti ti-arrow-up"></i></button>
                </div>
            </footer>




        </div>
    </div>




<?php echo $_switcher_settings; ?>
<?php echo $_def_js_files; ?>

<script src="assets/plugins/spinner/dist/spin.min.js"></script>
<script src="assets/plugins/spinner/dist/ladda.min.js"></script>


<script type="text/javascript" src="assets/plugins/datatables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/plugins/datatables/dataTables.bootstrap.js"></script>




<!-- Date range use moment.js same as full calendar plugin -->
<script src="assets/plugins/fullcalendar/moment.min.js"></script>
<!-- Data picker -->
<script src="assets/plugins/datapicker/bootstrap-datepicker.js"></script>

<!-- Select2 -->
<script src="assets/plugins/select2/select2.full.min.js"></script>


<!-- Date range use moment.js same as full calendar plugin -->
<script src="assets/js/plugins/fullcalendar/moment.min.js"></script>
<!-- Data picker -->
<script src="assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>





<script>
    $(document).ready(function(){
        var dt; var _txnMode; var _selectedID; var _selectRowObj; var _company_info;



        var initializeControls=function(){

            dt=$('#tbl_user_list').DataTable({
                "dom": '<"toolbar">frtip',
                "bLengthChange":false,
                "ajax" : "Company/transaction/list",
                "columns": [
                    {
                        "targets": [0],
                        "class":          "details-control",
                        "orderable":      false,
                        "data":           null,
                        "defaultContent": ""
                    },
                    { targets:[1],data: "company_name" },
                    { targets:[2],data: "company_address" },
                    { targets:[3],data: "email_address" },
                    { targets:[4],data: "mobile_no" },
                    { targets:[5],data: "landline" },
                    { targets:[6],data: "tin_no" },
                    { targets:[7],data: "tax_type" },
                    { targets:[8],data: "registered_to" },
                    {
                        targets:[9],
                        render: function (data, type, full, meta){
                        var btn_edit='<button class="btn btn-default btn-sm" name="edit_info"  style="margin-left:-15px;" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i> </button>';
                        var btn_trash='<button class="btn btn-default btn-sm" name="remove_info" style="margin-right:0px;" data-toggle="tooltip" data-placement="top" title="Move to trash"><i class="fa fa-trash-o"></i> </button>';

                        return '<center>'+btn_edit+btn_trash+'</center>';
                    }
                    }
                ]
            });


            var createToolBarButton=function(){
                var _btnNew='<button class="btn btn-primary"  id="btn_new" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;" data-toggle="modal" data-target="" data-placement="left" title="Register User Account" >'+
                    '<i class="fa fa-users"></i> Create Company Info</button>';
                $("div.toolbar").html(_btnNew);
            }();


            $('#txt_bdate').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true

            });


            _company_info=$("#tax_group").select2({
                placeholder: "Please select Tax type",
                allowClear: true
            });

            _company_info.select2('val', null)



        }();






        var bindEventHandlers=(function(){
            var detailRows = [];

            $('#tbl_user_list tbody').on( 'click', 'tr td.details-control', function () {
                var tr = $(this).closest('tr');
                var row = dt.row( tr );
                var idx = $.inArray( tr.attr('id'), detailRows );

                if ( row.child.isShown() ) {
                    tr.removeClass( 'details' );
                    row.child.hide();

                    // Remove from the 'open' array
                    detailRows.splice( idx, 1 );
                }
                else {
                    tr.addClass( 'details' );
                    //console.log(row.data());
                    row.child( format( row.data() ) ).show();
                    // Add to the 'open' array
                    if ( idx === -1 ) {
                        detailRows.push( tr.attr('id') );
                    }



                }
            } );


            $('#btn_new').click(function(){
                    _txnMode="new";
                    showList(false);
                clearFields($('#frm_notes'))
            });

             $('#btn_browse').click(function(event){
                    event.preventDefault();
                    $('input[name="file_upload[]"]').click();
             });


            $('#btn_remove_photo').click(function(event){
                event.preventDefault();
                $('img[name="img_company"]').attr('src','assets/img/anonymous-icon.png');
            });

            $('#btn_create_tax_group').click(function(){

                var btn=$(this);

                if(validateRequiredFields($('#frm_tax_group'))){
                    var data=$('#frm_tax_group').serializeArray();

                    $.ajax({
                        "dataType":"json",
                        "type":"POST",
                        "url":"Tax_groups/transaction/create",
                        "data":data,
                        "beforeSend" : function(){
                            showSpinningProgress(btn);
                        }
                    }).done(function(response){
                        showNotification(response);
                        $('#modal_tax_group').modal('hide');

                        var _group=response.row_added[0];
                        $('#tax_group').append('<option value="'+_group.tax_type_id+'" selected>'+_group.tax_type+'</option>');
                        $('#tax_group').select2('val',_group.tax_type_id);

                    }).always(function(){
                        showSpinningProgress(btn);
                    });
                }





            });



            $('#tbl_user_list tbody').on('click','button[name="edit_info"]',function(){
                    ///alert("ddd");
                    _txnMode="edit";
                    _selectRowObj=$(this).closest('tr');
                    var data=dt.row(_selectRowObj).data();
                    _selectedID=data.company_id;

                    $('input,textarea').each(function(){
                        var _elem=$(this);
                        $.each(data,function(name,value){
                            if(_elem.attr('name')==name&&_elem.attr('type')!='password'){
                                _elem.val(value);
                            }

                        });

                        $('#tax_group').select2('val',data.tax_type_id);
                    });

                    $('img[name="img_company"]').attr('src',data.photo_path);
                    showList(false);

            });

            $('#tbl_user_list tbody').on('click','button[name="remove_info"]',function(){
                _selectRowObj=$(this).closest('tr');
                var data=dt.row(_selectRowObj).data();
                _selectedID=data.company_id;

                $('#modal_confirmation').modal('show');
            });

            $('#btn_yes').click(function(){
                removeCompanyInfo().done(function(response){
                    showNotification(response);
                    dt.row(_selectRowObj).remove().draw();
                });
            });


            _company_info.on("select2:select", function (e) {

                var i=$(this).select2('val');
                if(i==0){
                    $(this).select2('val',null)
                    $('#modal_tax_group').modal('show');
                    clearFields($('#modal_tax_group').find('form'));
                }


            });


                $('input[name="file_upload[]"]').change(function(event){
                    var _files=event.target.files;

                    $('#div_img_company').hide();
                    $('#div_img_loader').show();


                    var data=new FormData();
                    $.each(_files,function(key,value){
                        data.append(key,value);
                    });

                    console.log(_files);

                    $.ajax({
                        url : 'Company/transaction/upload',
                        type : "POST",
                        data : data,
                        cache : false,
                        dataType : 'json',
                        processData : false,
                        contentType : false,
                        success : function(response){
                            //console.log(response);
                            //alert(response.path);
                            $('#div_img_loader').hide();
                            $('#div_img_company').show();
                            $('img[name="img_company"]').attr('src',response.path);

                        }
                    });

                });

                $('#btn_cancel').click(function(){
                    showList(true);
                });



                $('#btn_save').click(function(){

                    if(validateRequiredFields($('#frm_notes'))){
                        if(_txnMode=="new"){
                            createCompanyInfo().done(function(response){
                                showNotification(response);
                                dt.row.add(response.row_added[0]).draw();
                                clearFields($('#frm_notes'))
                            }).always(function(){
                                showSpinningProgress($('#btn_save'));
                            });
                        }else{
                            updateCompanyInfo().done(function(response){
                                showNotification(response);
                                showList(true);
                            }).always(function(){
                                showSpinningProgress($('#btn_save'));
                            });
                        }

                    }

                });


        })();


        var validateRequiredFields=function(f){
                var stat=true;

                $('div.form-group').removeClass('has-error');
                  $('input[required],textarea[required],select[required]',f).each(function(){

                      if($(this).is('select')){
                          if($(this).select2('val')==0||$(this).select2('val')==null){
                              showNotification({title:"Error!",stat:"error",msg:$(this).data('error-msg')});
                              $(this).closest('div.form-group').addClass('has-error');
                              $(this).focus();
                              stat=false;
                              return false;
                          }
                      }else{
                          if($(this).val()==""){
                              showNotification({title:"Error!",stat:"error",msg:$(this).data('error-msg')});
                              $(this).closest('div.form-group').addClass('has-error');
                              $(this).focus();
                              stat=false;
                              return false;
                          }
                      }



                  });

                return stat;
        };


        var createCompanyInfo=function(){
            var _data=$('#frm_notes').serializeArray();


            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Notes/transaction/create",
                "data":_data,
                "beforeSend": showSpinningProgress($('#btn_save'))
            });
        };

        var updateCompanyInfo=function(){
            var _data=$('#frm_notes').serializeArray();
            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Notes/transaction/update",
                "data":_data,
                "beforeSend": showSpinningProgress($('#btn_save'))
            });
        };

        var removeCompanyInfo=function(){
            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Users/transaction/delete",
                "data":{company_id : _selectedID}
            });
        };

        var showList=function(b){
            if(b){
                $('#div_user_list').show();
                $('#div_user_fields').hide();
            }else{
                $('#div_user_list').hide();
                $('#div_user_fields').show();
            }
        };

        var showNotification=function(obj){
            PNotify.removeAll(); //remove all notifications
            new PNotify({
                title:  obj.title,
                text:  obj.msg,
                type:  obj.stat
            });
        };

        $('.date-picker').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true

        });

        var showSpinningProgress=function(e){
            $(e).find('span').toggleClass('glyphicon glyphicon-refresh spinning');
        };

        var clearFields=function(f){
            $('input,textarea',f).val('');
            $(f).find('select').select2('val',null);
            $(f).find('input:first').focus();
        };


        function format ( d ) {
            // `d` is the original data object for the row
            //alert(d.photo_path);
            return '<br /><table style="margin-left:10%;width: 80%;">' +
                    '<thead>' +
                    '</thead>' +
                    '<tbody>' +
                    '<tr>' +
                    '<td width="20%">Name : </td><td width="50%"><b>'+ d.user_name+'</b></td>' +
                    '<td rowspan="5" valign="top"><div class="avatar">'+
                    '<img src="'+ d.photo_path+'" class="img-circle" style="margin-top:0px;height: 100px;width: 100px;">'+
                    '</div></td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>Address : </td><td><b>'+ d.user_address+'</b></td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>Email : </td><td>'+ d.user_email+'</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>Mobile Nos. : </td><td>'+ d.user_mobile+'</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>Landline. : </td><td>'+ d.user_telephone+'</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>Active : </td><td><i class="fa fa-check"></i></td>' +
                    '</tr>' +
                    '</tbody></table><br />';






        };




        var substringMatcher = function(strs) {
            return function findMatches(q, cb) {
                var matches, substringRegex;

                // an array that will be populated with substring matches
                matches = [];

                // regex used to determine if a string contains the substring `q`
                substrRegex = new RegExp(q, 'i');

                // iterate through the pool of strings and for any string that
                // contains the substring `q`, add it to the `matches` array
                $.each(strs, function(i, str) {
                    if (substrRegex.test(str)) {
                        matches.push(str);
                    }
                });

                cb(matches);
            };
        };












    });




</script>


</body>


</html>