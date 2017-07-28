<!DOCTYPE html>

<html lang="en">

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

        <link href="assets/plugins/select2/select2.min.css" rel="stylesheet">
        <link href="assets/plugins/datapicker/datepicker3.css" rel="stylesheet">


        
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
                width: 100% !important;
            }

            @keyframes spin {
                from { transform: scale(1) rotate(0deg); }
                to { transform: scale(1) rotate(360deg); }
            }

            @-webkit-keyframes spin2 {
                from { -webkit-transform: rotate(0deg); }
                to { -webkit-transform: rotate(360deg); }
            }

            .form-group {
                padding:0;
                margin:5px;
            }

            .select2-container{
                min-width: 100%;
                z-index: 99999999;
            }

            textarea {
                resize: none;
            }

        </style>

    </head>

    <body class="animated-content">

    <?php echo $_top_navigation; ?>

        <div id="wrapper">
            <div id="layout-static">

        <?php echo $_side_bar_navigation;?>


        <div class="static-content-wrapper white-bg">
            <div class="static-content"  >
                <div class="page-content">

                    <ol class="breadcrumb">
                        <li><a href="dashboard">Dashboard</a></li>
                        <li><a href="suppliers">Suppliers</a></li>
                    </ol>

                    <div class="container-fluid">
                        <div data-widget-group="group1">
                            <div class="row">
                                <div class="col-md-12">

                                    <div id="div_supplier_list">
                                        <div class="panel panel-default">
                                            <div class="panel-body table-responsive">
                                                <table id="tbl_suppliers" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Supplier Name</th>
                                                        <th>Address</th>
                                                        <th>Landline</th>
                                                        <th>Mobile</th>
                                                        <th>Tax Name</th>
                                                        <th><center>Action</center></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="panel-footer"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- .container-fluid -->

                </div> <!-- #page-content -->
            </div>

            <div id="modal_create_suppliers" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#2ecc71;">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title" style="color:#ecf0f1;"><span id="modal_mode"> </span>Supplier Information</h4>
                        </div>

                        <div class="modal-body">
                            <form id="frm_supplier">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="col-md-12">
                                            <div class="col-md-4" id="label">
                                                 <label class="control-label boldlabel" style="text-align:right;"><font color="red"><b>*</b></font> Supplier Name :</label>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-users"></i>
                                                    </span>
                                                    <input type="text" name="supplier_name" class="form-control" placeholder="Supplier Name" data-error-msg="Supplier Name is required!" required>
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <div class="col-md-12">
                                            <div class="col-md-4" id="label">
                                                 <label class="control-label boldlabel" style="text-align:right;"><font color="red"><b>*</b></font> Address :</label>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-home"></i>
                                                     </span>
                                                     <textarea name="address" class="form-control" data-error-msg="Supplier address is required!" placeholder="Address" required ></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <div class="col-md-12">
                                            <div class="col-md-4" id="label">
                                                 <label class="control-label boldlabel" style="text-align:right;">Email Address :</label>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-envelope-o"></i>
                                                    </span>
                                                    <input type="text" name="email_address" class="form-control" placeholder="Email Address">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="col-md-4" id="label">
                                                 <label class="control-label boldlabel" style="text-align:right;">Landline :</label>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-mobile"></i>
                                                    </span>
                                                    <input type="text" name="landline" id="landline" class="form-control" placeholder="Landline">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="col-md-4" id="label">
                                                 <label class="control-label boldlabel" style="text-align:right;">Mobile No :</label>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-mobile"></i>
                                                    </span>
                                                    <input type="text" name="mobile_no" id="mobile_no" class="form-control" placeholder="Mobile No">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- <div class="col-md-12">
                                            <div class="col-md-4" id="label">
                                                 <label class="control-label boldlabel" style="text-align:right;">TIN # :</label>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-code"></i>
                                                    </span>
                                                    <input type="text" name="tin_no" class="form-control" placeholder="TIN #">
                                                </div>
                                            </div>
                                        </div> -->

                                        <div class="col-md-12">
                                            <div class="col-md-4" id="label">
                                                 <label class="control-label boldlabel" style="text-align:right;"><font color="red"><b>*</b></font> Tax Type :</label>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-code"></i>
                                                    </span>
                                                    <select name="tax_type_id" id="tax_group" data-error-msg="Tax type is required!" required="">
                                                        <option value="0">[ Create Tax Type ]</option>
                                                        <?php foreach($tax_type as $group){ ?>
                                                            <option value="<?php echo $group->tax_type_id; ?>"><?php echo $group->tax_type; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                <label class="control-label boldlabel" style="text-align:left;padding-top:10px;"><i class="fa fa-user" aria-hidden="true" style="padding-right:10px;"></i>Supplier's Photo</label>
                                                <hr style="margin-top:0px !important;height:1px;background-color:black;">
                                            </div>
                                            <div style="width:100%;height:300px;border:2px solid #34495e;border-radius:5px;">
                                                <center>
                                                    <img name="img_user" id="img_user" src="assets/img/anonymous-icon.png" height="140px;" width="140px;"></img>
                                                </center>
                                                <hr style="margin-top:0px !important;height:1px;background-color:black;">
                                                <center>
                                                     <button type="button" id="btn_browse" style="width:150px;margin-bottom:5px;" class="btn btn-primary">Browse Photo</button>
                                                     <button type="button" id="btn_remove_photo" style="width:150px;" class="btn btn-danger">Remove</button>
                                                     <input type="file" name="file_upload[]" class="hidden">
                                                </center> 
                                            </div>
                                        </div>   
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button id="btn_save" type="button" class="btn" style="background-color:#2ecc71;color:white;">Save</button>
                            <button id="btn_cancel" type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </div>
                    </div><!---content---->
                </div>
            </div><!---modal-->

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
                            <button id="btn_yes" type="button" class="btn btn-danger" data-dismiss="modal">Yes</button>
                            <button id="btn_close" type="button" class="btn btn-default" data-dismiss="modal">No</button>
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
                                    <label>* Tax Group :</label>
                                    <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-envelope-o"></i>
                                                </span>
                                        <input type="text" name="tax_type" class="form-control" placeholder="Tax group" data-error-msg="Tax name is required." required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>* Tax Rate :</label>
                                    <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-envelope-o"></i>
                                                </span>
                                        <input type="number" name="tax_rate" class="form-control" placeholder="Tax group" data-error-msg="Tax name is required." required>
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

    $(document).ready(function() {
        var dt; var _txnMode; var _selectedID; var _selectRowObj; var _taxTypeGroup;

        var initializeControls=function() {
            dt=$('#tbl_suppliers').DataTable({
                "dom": '<"toolbar">frtip',
                "bLengthChange":false,
                "ajax" : "Suppliers/transaction/list",
                "columns": [
                    {
                        "targets": [0],
                        "class":          "details-control",
                        "orderable":      false,
                        "data":           null,
                        "defaultContent": ""
                    },
                    { targets:[1],data: "supplier_name" },
                    { targets:[2],data: "address" },
                    { targets:[3],data: "landline" },
                    { targets:[4],data: "mobile_no" },
                    { targets:[5],data: "tax_type" },
                    {
                        targets:[6],
                        render: function (data, type, full, meta){
                            var btn_edit='<button class="btn btn-primary btn-sm" name="edit_info"  style="margin-left:-15px;" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i> </button>';
                            var btn_trash='<button class="btn btn-danger btn-sm" name="remove_info" style="margin-right:0px;" data-toggle="tooltip" data-placement="top" title="Move to trash"><i class="fa fa-trash-o"></i> </button>';

                            return '<center>'+btn_edit+btn_trash+'</center>';
                        }
                    }
                ]
            });


            _taxTypeGroup=$("#tax_group").select2({
                placeholder: "Please select type of tax",
                allowClear: true
            });

            _taxTypeGroup.select2('val', null)





            var createToolBarButton=function() {
                var _btnNew='<button class="btn btn-primary"  id="btn_new" style="text-transform: capitalize;font-family: Tahoma, Georgia, Serif;" data-toggle="modal" data-target="" data-placement="left" title="New supplier" >'+
                    '<i class="fa fa-users"></i> New Supplier</button>';
                $("div.toolbar").html(_btnNew);
            }();
        }();

        _taxTypeGroup.on("select2:select", function (e) {

            var i=$(this).select2('val');
            if(i==0){
                $(this).select2('val',null)
                $('#modal_tax_group').modal('show');
                clearFields($('#modal_tax_group').find('form'));
            }


        });

        $('#btn_create_tax_group').click(function(){

            var btn=$(this);

            if(validateRequiredFields($('#frm_tax_group'))){
                var data=$('#frm_tax_group').serializeArray();

                $.ajax({
                    "dataType":"json",
                    "type":"POST",
                    "url":"Tax/transaction/create",
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



        var bindEventHandlers=(function(){
            var detailRows = [];

            $('#tbl_suppliers tbody').on( 'click', 'tr td.details-control', function () {
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
                clearFields($('#frm_supplier'))
                showList(true);
                $('#modal_create_suppliers').modal('show');
            });

            $('#btn_browse').click(function(event){
                event.preventDefault();
                $('input[name="file_upload[]"]').click();
            });


            $('#btn_remove_photo').click(function(event){
                event.preventDefault();
                $('img[name="img_supplier"]').attr('src','assets/img/anonymous-icon.png');
            });

            $('#tbl_suppliers tbody').on('click','button[name="edit_info"]',function(){
                _txnMode="edit";
                $('#modal_create_suppliers').modal('show');
                _selectRowObj=$(this).closest('tr');
                var data=dt.row(_selectRowObj).data();
                _selectedID=data.supplier_id;

                if(data.photo_path==""){
                     $('img[name="img_user"]').attr('src','assets/img/anonymous-icon.png');
                }
                else{
                    $('img[name="img_user"]').attr('src',data.photo_path);
                }

                $('input,textarea').each(function(){
                    var _elem=$(this);
                    $.each(data,function(name,value){
                        if(_elem.attr('name')==name){
                            _elem.val(value);
                        }
                    });
                    $('#tax_group').select2('val',data.tax_type_id);
                });

                $('img[name="img_supplier"]').attr('src',data.photo_path);
                showList(true);

            });

            $('#tbl_suppliers tbody').on('click','button[name="remove_info"]',function(){
                _selectRowObj=$(this).closest('tr');
                var data=dt.row(_selectRowObj).data();
                _selectedID=data.supplier_id;

                $('#modal_confirmation').modal('show');
            });

            $('#btn_yes').click(function(){
                removeSupplier().done(function(response){
                    showNotification(response);
                    dt.row(_selectRowObj).remove().draw();
                });
            });



            $('input[name="file_upload[]"]').change(function(event){
                var _files=event.target.files;
                
                var data=new FormData();
                $.each(_files,function(key,value){
                    data.append(key,value);
                });
                console.log(_files);
                $.ajax({
                    url : 'Suppliers/transaction/upload',
                    type : "POST",
                    data : data,
                    cache : false,
                    dataType : 'json',
                    processData : false,
                    contentType : false,
                    success : function(response){
                        
                        $('img[name="img_user"]').attr('src',response.path);
                    }
                });
            });

            $('#btn_cancel').click(function(){
                showList(true);
            });

            $('#btn_save').click(function() {
                if(validateRequiredFields($('#frm_supplier'))) {
                    if(_txnMode=="new"){
                        createSupplier().done(function(response){
                            showNotification(response);
                            dt.row.add(response.row_added[0]).draw();

                        }).always(function(){
                            $('#modal_create_suppliers').modal('toggle');
                            showSpinningProgress($('#btn_save'));
                        });
                    }else{
                        updateSupplier().done(function(response){
                            showNotification(response);
                            dt.row(_selectRowObj).data(response.row_updated[0]).draw();
                        }).always(function(){
                            $('#modal_create_suppliers').modal('toggle');
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



        var createSupplier=function() {
            var _data=$('#frm_supplier').serializeArray();
            _data.push({name : "photo_path" ,value : $('img[name="img_user"]').attr('src')});
            //_data.push({name : "tax_type_id" ,value : $('#tax_group').select2('val')});

            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Suppliers/transaction/create",
                "data":_data,
                "beforeSend": showSpinningProgress($('#btn_save'))
            });
        };

        var updateSupplier=function() {
            var _data=$('#frm_supplier').serializeArray();
            _data.push({name : "photo_path" ,value : $('img[name="img_user"]').attr('src')});
            //_data.push({name : "tax_type_id" ,value : $('#tax_group').select2('val')});
            _data.push({name : "supplier_id" ,value : _selectedID});

            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Suppliers/transaction/update",
                "data":_data,
                "beforeSend": showSpinningProgress($('#btn_save'))
            });
        };

        var removeSupplier=function() {
            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Suppliers/transaction/delete",
                "data":{supplier_id : _selectedID}
            });
        };

        var showList=function(b){
            if(b){
                $('#div_supplier_list').show();
                $('#div_supplier_fields').hide();
            }else{
                $('#div_supplier_list').hide();
                $('#div_supplier_fields').show();
            }
        };
        
        $('.date-picker').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true

        });
        
        var showNotification=function(obj){
            PNotify.removeAll(); //remove all notifications
            new PNotify({
                title:  obj.title,
                text:  obj.msg,
                type:  obj.stat
            });
        };

        var showSpinningProgress=function(e){
            $(e).find('span').toggleClass('glyphicon glyphicon-refresh spinning');
        };

        var clearFields=function(f){
            $('input,textarea',f).val('');
            $(f).find('select').select2('val',null);
            $(f).find('input:first').focus();
            $('#img_user').attr('src','assets/img/anonymous-icon.png');
        };

        function format ( d ) {
            // `d` is the original data object for the row
            //alert(d.photo_path);
            return '<br /><table style="margin-left:10%;width: 80%;">' +
            '<thead>' +
            '</thead>' +
            '<tbody>' +
            '<tr>' +
            '<td width="20%">Supplier Name : </td><td width="50%"><b>'+ d.supplier_name+'</b></td>' +
            '<td rowspan="5" valign="top"><div class="avatar">'+
            '<img src="'+ d.photo_path+'" class="img-circle" style="margin-top:0px;height: 100px;width: 100px;">'+
            '</div></td>' +
            '</tr>' +
            '<tr>' +
            '<td>Address : </td><td><b>'+ d.address+'</b></td>' +
            '</tr>' +
            '<tr>' +
            '<td>Email : </td><td>'+ d.email_address+'</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Mobile Nos. : </td><td>'+ d.mobile_no+'</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Landline. : </td><td>'+ d.landline+'</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Active : </td><td><i class="fa fa-check"></i></td>' +
            '</tr>' +
            '</tbody></table><br />';
        };
    });

    </script>

    </body>

</html>