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
                        <li><a href="rights">User Rights  <?php //print_r($user_groups); ?></a></li>
                    </ol>


                <div class="container-fluid">
                        <div data-widget-group="group1">
                            <div class="row">
                                <div class="col-md-12">

                                    <div id="div_user_list">
                                        <div class="panel panel-default">
                                            <div class="panel-body table-responsive">
                                                <table id="tbl_user_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>User Group</th>
                                                        <th>Description</th>
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


                                    <div id="div_user_fields" style="display: none;">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h2>User Rights Information</h2>
                                                <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body"}'></div>
                                            </div>

                                            <div class="panel-body">


                                               <form id="frm_users" role="form" class="form-horizontal row-border">




                                                   <div class="form-group" style="display:none;">
                                                       <label class="col-md-2 col-md-offset-1 control-label">User Group :</label>

                                                       <div class="col-md-7">
                                                           <select name="" id="cbo_user_groups" data-error-msg="User group is required." >
                                                               <option value="0">[ Create User Account Group ]</option>
                                                               <?php foreach($user_groups as $group){ ?>
                                                                        <option value="<?php echo $group->user_group_id; ?>"><?php echo $group->user_group; ?></option>
                                                               <?php } ?>
                                                           </select>


                                                           <span class="help-block m-b-none">Required. Please select the correct user group of the user.</span>

                                                       </div>

                                                   </div>

                                                   <div class="form-group" id="group_name">
                                                       <label class="col-md-2 col-md-offset-1 control-label">User Group Name :</label>

                                                       <div class="col-md-7">
															<input type="text" name="group_name" id="group_name_input"class="form-control" data-error-msg="User Group is required." required>                                                       </div>

                                                   </div>

                                                   <div class="form-group" id="group_name_desc">
                                                       <label class="col-md-2 col-md-offset-1 control-label">User Group Description :</label>

                                                       <div class="col-md-7">
															<input type="text" name="group_name_desc" id="group_name_desc_input" class="form-control" data-error-msg="User Group Description is required." required>                                                      </div>

                                                   </div>

                                                   <div class="form-group">
                                                       <label class="col-md-2 col-md-offset-1 control-label">Receiving Stock :</label>

                                                       <div class="col-md-7">
                                                           <select name="receiving_stock" id="receiving" data-error-msg="Receiving is required." required>

                                                                        <option value="enabled">Enable</option>
																		<option value="disabled">Disable</option>
                                                           </select>
                                                       </div>

                                                   </div>

                                                   <div class="form-group">
                                                       <label class="col-md-2 col-md-offset-1 control-label">Point of Sales :</label>

                                                       <div class="col-md-7">
                                                           <select name="point_of_sale" id="pos" data-error-msg="POS is required." required>
                                                                        <option value="enabled">Enable</option>
																		<option value="disabled">Disable</option>
                                                           </select>
                                                       </div>

                                                   </div>

                                                   <div class="form-group">
                                                       <label class="col-md-2 col-md-offset-1 control-label">Transactions :</label>

                                                       <div class="col-md-7">
                                                           <select name="transactions" id="transaction" data-error-msg="Transactions is required." required>
                                                                        <option value="enabled">Enable</option>
																		<option value="disabled">Disable</option>
                                                           </select>
                                                       </div>

                                                   </div>

                                                   <div class="form-group">
                                                       <label class="col-md-2 col-md-offset-1 control-label">Sales Reports :</label>

                                                       <div class="col-md-7">
                                                           <select name="sales_reports" id="sales" data-error-msg="Sales Reports is Required." required>
                                                                        <option value="enabled">Enable</option>
																		<option value="disabled">Disable</option>
                                                           </select>
                                                       </div>

                                                   </div>

                                                   <div class="form-group">
                                                       <label class="col-md-2 col-md-offset-1 control-label">Inventory Reports :</label>

                                                       <div class="col-md-7">
                                                           <select name="inventory_reports" id="inventory" data-error-msg="Inventory Reports is Required." required>
                                                                        <option value="enabled">Enable</option>
																		<option value="disabled">Disable</option>
                                                           </select>
                                                       </div>

                                                   </div>

                                                   <div class="form-group">
                                                       <label class="col-md-2 col-md-offset-1 control-label">Product Management :</label>

                                                       <div class="col-md-7">
                                                           <select name="product_management" id="prod_management" data-error-msg="Product Management is Required." required>
                                                                        <option value="enabled">Enable</option>
																		<option value="disabled">Disable</option>
                                                           </select>
                                                       </div>

                                                   </div>

                                                   <div class="form-group">
                                                       <label class="col-md-2 col-md-offset-1 control-label">Supplier Management :</label>

                                                       <div class="col-md-7">
                                                           <select name="supplier_management" id="supp_management" data-error-msg="Supplier Management is Required." required>
                                                                        <option value="enabled">Enable</option>
																		<option value="disabled">Disable</option>
                                                           </select>
                                                       </div>

                                                   </div>

                                                   <div class="form-group">
                                                       <label class="col-md-2 col-md-offset-1 control-label">Customer Management :</label>

                                                       <div class="col-md-7">
                                                           <select name="customer_management" id="cust_management" data-error-msg="Customer Management is Required." required>
                                                                        <option value="enabled">Enable</option>
																		<option value="disabled">Disable</option>
                                                           </select>
                                                       </div>

                                                   </div>

                                                   <div class="form-group">
                                                       <label class="col-md-2 col-md-offset-1 control-label">Stock Management :</label>

                                                       <div class="col-md-7">
                                                           <select name="stock_management" id="sto_management" data-error-msg="Customer Management is Required." required>
                                                                        <option value="enabled">Enable</option>
																		<option value="disabled">Disable</option>
                                                           </select>
                                                       </div>

                                                   </div>

                                                   <div class="form-group">
                                                       <label class="col-md-2 col-md-offset-1 control-label">X-Reading :</label>

                                                       <div class="col-md-7">
                                                           <select name="x_reading" id="xreading" data-error-msg="User Accounts is Required." required>
                                                                        <option value="enabled">Enable</option>
																		<option value="disabled">Disable</option>
                                                           </select>
                                                       </div>

                                                   </div>

                                                   <div class="form-group">
                                                       <label class="col-md-2 col-md-offset-1 control-label">Z-Reading :</label>

                                                       <div class="col-md-7">
                                                           <select name="z_reading" id="zreading" data-error-msg="User Accounts is Required." required>
                                                                        <option value="enabled">Enable</option>
																		<option value="disabled">Disable</option>
                                                           </select>
                                                       </div>

                                                   </div>

                                                   <div class="form-group">
                                                       <label class="col-md-2 col-md-offset-1 control-label">User Accounts :</label>

                                                       <div class="col-md-7">
                                                           <select name="user_account" id="usr_accounts" data-error-msg="User Accounts is Required." required>
                                                                        <option value="enabled">Enable</option>
																		<option value="disabled">Disable</option>
                                                           </select>
                                                       </div>

                                                   </div>

                                                   <div class="form-group">
                                                       <label class="col-md-2 col-md-offset-1 control-label">User Group Rights :</label>

                                                       <div class="col-md-7">
                                                           <select name="user_rights" id="usr_rights" data-error-msg="User Group Rights is Required." required>
                                                                        <option value="enabled">Enable</option>
																		<option value="disabled">Disable</option>
                                                           </select>
                                                       </div>

                                                   </div>

                                                   <div class="form-group">
                                                       <label class="col-md-2 col-md-offset-1 control-label">Company Info :</label>

                                                       <div class="col-md-7">
                                                           <select name="company_info" id="cpy_info" data-error-msg="Company Info is Required." required>
                                                                        <option value="enabled">Enable</option>
																		<option value="disabled">Disable</option>
                                                           </select>
                                                       </div>

                                                   </div>

                                                   <div class="form-group">
                                                       <label class="col-md-2 col-md-offset-1 control-label">Notes :</label>

                                                       <div class="col-md-7">
                                                           <select name="notes" id="notes" data-error-msg="Company Info is Required." required>
                                                                        <option value="enabled">Enable</option>
																		<option value="disabled">Disable</option>
                                                           </select>
                                                       </div>

                                                   </div>

                                               </form>


                                                    <br /><br />








                                            </div>
                                            <div class="panel-footer">
                                                <div class="row">
                                                    <div class="col-sm-10 col-sm-offset-3">
                                                        <button id="btn_save" class="btn-primary btn" style="text-transform: capitalize;"><span class=""></span>  Save Changes</button>
                                                        <button id="btn_cancel" class="btn-default btn" style="text-transform: capitalize;">Cancel</button>
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
                            <button id="btn_yes" type="button" class="btn btn-danger" data-dismiss="modal" style="text-transform: capitalize;">Yes</button>
                            <button id="btn_close" type="button" class="btn btn-default" data-dismiss="modal" style="text-transform: capitalize;">No</button>
                        </div>
                    </div><!---content---->
                </div>
            </div><!---modal-->


            <div id="modal_user_group" class="modal fade" tabindex="-1" role="dialog"><!--modal-->
                <div class="modal-dialog modal-md">
                    <div class="modal-content"><!---content--->
                        <div class="modal-header">
                            <button type="button" class="close"   data-dismiss="modal" aria-hidden="true">X</button>
                            <h4 class="modal-title"><span id="modal_mode"> </span>New User Group</h4>

                        </div>

                        <div class="modal-body">
                            <form id="frm_user_group">
                                <div class="form-group">
                                            <label>* User Group :</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-envelope-o"></i>
                                                </span>
                                                <input type="text" name="user_group" class="form-control" placeholder="User group" data-error-msg="Category name is required." required>
                                            </div>
                                 </div>


                                <div class="form-group">
                                    <label>Description :</label>
                                    <div class="input-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <textarea name="user_group_desc" class="form-control"></textarea>
                                    </div>
                                </div>
                            </form>


                        </div>

                        <div class="modal-footer">
                            <button id="btn_create_user_group" type="button" class="btn btn-primary"  style="text-transform: capitalize;"><span class=""></span> Create</button>
                            <button id="btn_close_user_group" type="button" class="btn btn-default" data-dismiss="modal" style="text-transform: capitalize;">Cancel</button>
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


               <!--                                                        <tr>
                                                        <th></th>
                                                        <th>User Group</th>
                                                        <th>Description</th>
														<th>Receiving</th>
														<th>POS</th>
														<th>Transactions</th>
														<th>Sales Reports</th>
														<th>Inventory Reports</th>
														<th>Products</th>
														<th>Suppliers</th>
														<th>Customers</th>
														<th>Stock</th>
														<th>Accounts</th>
														<th>Rights</th>
														<th>Company</th>
														<th>Notes</th>
                                                        <th><center>Action</center></th>
                                                    </tr>

			   { targets:[1],data: "user_group" },
                    { targets:[2],data: "user_group_desc" },
                    { targets:[3],data: "receiving_stock" },
					{ targets:[4],data: "point_of_sale" },
					{ targets:[5],data: "transactions" },
					{ targets:[6],data: "sales_reports" },
					{ targets:[7],data: "inventory_reports" },
					{ targets:[8],data: "product_management" },
					{ targets:[9],data: "supplier_management" },
					{ targets:[10],data: "customer_management" },
					{ targets:[11],data: "stock_management" },
					{ targets:[12],data: "user_account" },
					{ targets:[13],data: "user_rights" },
					{ targets:[14],data: "company_info" },
					{ targets:[15],data: "notes" },
                    {
                        targets:[16], -->



<script>
    $(document).ready(function(){
        var dt; var _txnMode; var _selectedID; var _selectRowObj; var _cboUserGroup;



        var initializeControls=function(){

            dt=$('#tbl_user_list').DataTable({
                "dom": '<"toolbar">frtip',
                "bLengthChange":false,
                "ajax" : "Rights/transaction/list",
                "columns": [
                    {
                        "targets": [0],
                        "class":          "details-control",
                        "orderable":      false,
                        "data":           null,
                        "defaultContent": ""
                    },
                    { targets:[1],data: "user_group" },
                    { targets:[2],data: "user_group_desc" },

                    {
                        targets:[3],
                        render: function (data, type, full, meta){
                        var btn_edit='<button class="btn btn-default btn-sm" name="edit_info"  style="margin-left:-15px;" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i> </button>';
                        var btn_trash='<button class="btn btn-default btn-sm" name="remove_info" style="margin-right:0px;" data-toggle="tooltip" data-placement="top" title="Move to trash"><i class="fa fa-trash-o"></i> </button>';

                        return '<center>'+btn_edit+btn_trash+'</center>';
                    }
                    }
                ]
            });


            var createToolBarButton=function(){
                var _btnNew='<button class="btn btn-primary"  id="btn_new" style="text-transform: capitalize;" data-toggle="modal" data-target="" data-placement="left" title="Register User Account" >'+
                    '<i class="fa fa-users"></i>Create New User Group</button>';
                $("div.toolbar").html(_btnNew);
            }();


            $('#txt_bdate').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true

            });


            _cboUserGroup=$("#cbo_user_groups").select2({
                placeholder: "Please select user group",
                allowClear: true
            });

            _cboUserGroup.select2('val', null)

            _receiving=$("#receiving").select2({
                placeholder: "Please select user group",
                allowClear: true
            });

            _receiving.select2('val', null)

			_receving=$("#receiving").select2({
                placeholder: "Enable or Disable?",
                allowClear: true
            });

            _receving.select2('val', null)

			_pos=$("#pos").select2({
                placeholder: "Enable or Disable?",
                allowClear: true
            });

            _pos.select2('val', null)

			_transaction=$("#transaction").select2({
                placeholder: "Enable or Disable?",
                allowClear: true
            });

            _transaction.select2('val', null)

			_sales=$("#sales").select2({
                placeholder: "Enable or Disable?",
                allowClear: true
            });

            _sales.select2('val', null)

			_inventory=$("#inventory").select2({
                placeholder: "Enable or Disable?",
                allowClear: true
            });

            _inventory.select2('val', null)

			_prodmng=$("#prod_management").select2({
                placeholder: "Enable or Disable?",
                allowClear: true
            });

            _prodmng.select2('val', null)

			_suppmgmt=$("#supp_management").select2({
                placeholder: "Enable or Disable?",
                allowClear: true
            });

            _suppmgmt.select2('val', null)

			_custmgmt=$("#cust_management").select2({
                placeholder: "Enable or Disable?",
                allowClear: true
            });

            _custmgmt.select2('val', null)

			_stockmgmt=$("#sto_management").select2({
                placeholder: "Enable or Disable?",
                allowClear: true
            });

            _stockmgmt.select2('val', null)

			_xreading=$("#xreading").select2({
                placeholder: "Enable or Disable?",
                allowClear: true
            });

            _xreading.select2('val', null)

			_zreading=$("#zreading").select2({
                placeholder: "Enable or Disable?",
                allowClear: true
            });

            _zreading.select2('val', null)

			_usraccount=$("#usr_accounts").select2({
                placeholder: "Enable or Disable?",
                allowClear: true
            });

            _usraccount.select2('val', null)

			_usrrights=$("#usr_rights").select2({
                placeholder: "Enable or Disable?",
                allowClear: true
            });

            _usrrights.select2('val', null)

			_companyinfo=$("#cpy_info").select2({
                placeholder: "Enable or Disable?",
                allowClear: true
            });

            _companyinfo.select2('val', null)

			_notes=$("#notes").select2({
                placeholder: "Enable or Disable?",
                allowClear: true
            });

            _notes.select2('val', null)


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
					document.getElementById("group_name").style.display = "block";
					document.getElementById("group_name_desc").style.display = "block";
					$("#group_name_input").attr("required", true);
					$("#group_name_desc").attr("required", true);
                    _txnMode="new";
                    showList(false);
            });

             $('#btn_browse').click(function(event){
                    event.preventDefault();
                    $('input[name="file_upload[]"]').click();
             });


            $('#btn_remove_photo').click(function(event){
                event.preventDefault();
                $('img[name="img_user"]').attr('src','assets/img/anonymous-icon.png');
            });

            $('#btn_create_user_group').click(function(){

                var btn=$(this);

                if(validateRequiredFields($('#frm_user_group'))){
                    var data=$('#frm_user_group').serializeArray();

                    $.ajax({
                        "dataType":"json",
                        "type":"POST",
                        "url":"User_groups/transaction/create",
                        "data":data,
                        "beforeSend" : function(){
                            showSpinningProgress(btn);
                        }
                    }).done(function(response){
                        showNotification(response);
                        $('#modal_user_group').modal('hide');

                        var _group=response.row_added[0];
                        $('#cbo_user_groups').append('<option value="'+_group.user_group_id+'" selected>'+_group.user_group+'</option>');
                        $('#cbo_user_groups').select2('val',_group.user_group_id);

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
                    _selectedID=data.permission_id;
					document.getElementById("group_name").style.display = "none";
					document.getElementById("group_name_desc").style.display = "none";
					document.getElementById("group_name_input").removeAttribute("required");
					document.getElementById("group_name_desc_input").removeAttribute("required");
                    $('input,textarea').each(function(){
                        var _elem=$(this);
                        $.each(data,function(name,value){
                            if(_elem.attr('name')==name&&_elem.attr('type')!='password'){
                                _elem.val(value);
                            }

                        });

						$('#cbo_user_groups').select2('val',data.user_group_id);
						$('#receiving').select2('val',data.receiving_stock);
						$('#pos').select2('val',data.point_of_sale);
						$('#transaction').select2('val',data.transactions);
						$('#sales').select2('val',data.sales_reports);
						$('#inventory').select2('val',data.inventory_reports);
						$('#prod_management').select2('val',data.product_management);
						$('#supp_management').select2('val',data.supplier_management);
						$('#cust_management').select2('val',data.customer_management);
						$('#sto_management').select2('val',data.stock_management);
						$('#xreading').select2('val',data.xreading);
						$('#zreading').select2('val',data.zreading);
						$('#usr_accounts').select2('val',data.user_account);
						$('#usr_rights').select2('val',data.user_rights);
						$('#cpy_info').select2('val',data.company_info);
						$('#notes').select2('val',data.notes);
                    });

                    $('img[name="img_user"]').attr('src',data.photo_path);
                    showList(false);

            });

            $('#tbl_user_list tbody').on('click','button[name="remove_info"]',function(){
                _selectRowObj=$(this).closest('tr');
                var data=dt.row(_selectRowObj).data();
                _selectedID=data.user_group_id;

                $('#modal_confirmation').modal('show');
            });

            $('#btn_yes').click(function(){
                removeCustomer().done(function(response){
                    showNotification(response);
                    dt.row(_selectRowObj).remove().draw();
                });
            });


            _cboUserGroup.on("select2:select", function (e) {

                var i=$(this).select2('val');
                if(i==0){
                    $(this).select2('val',null)
                    $('#modal_user_group').modal('show');
                    clearFields($('#modal_user_group').find('form'));
                }


            });


                $('input[name="file_upload[]"]').change(function(event){
                    var _files=event.target.files;

                    $('#div_img_user').hide();
                    $('#div_img_loader').show();


                    var data=new FormData();
                    $.each(_files,function(key,value){
                        data.append(key,value);
                    });

                    console.log(_files);

                    $.ajax({
                        url : 'Users/transaction/upload',
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
                            $('#div_img_user').show();
                            $('img[name="img_user"]').attr('src',response.path);

                        }
                    });

                });

                $('#btn_cancel').click(function(){
                    showList(true);
                });



                $('#btn_save').click(function(){

                    if(validateRequiredFields($('#frm_users'))){
                        if(_txnMode=="new"){
                            createUserAccount().done(function(response){
                                showNotification(response);
                                dt.row.add(response.row_added[0]).draw();
                                clearFields($('#frm_users'));
								 $("#receiving").select2("val", "");
								 $("#pos").select2("val", "");
								 $("#transaction").select2("val", "");
								 $("#sales").select2("val", "");
								 $("#inventory").select2("val", "");
								 $("#prod_management").select2("val", "");
								 $("#supp_management").select2("val", "");
								 $("#cust_management").select2("val", "");
								 $("#sto_management").select2("val", "");
								 $("#usr_accounts").select2("val", "");
								 $("#usr_rights").select2("val", "");
								 $("#cpy_info").select2("val", "");
								 $("#notes").select2("val", "");
                            }).always(function(){
                                showSpinningProgress($('#btn_save'));
                            });
                        }else{
                            updateUserAccount().done(function(response){
                                showNotification(response);
                                dt.row(_selectRowObj).data(response.row_updated[0]).draw();
                                clearFields($('#frm_users'));
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


        var createUserAccount=function(){
            var _data=$('#frm_users').serializeArray();

            _data.push({name : "user_group_id" ,value : $('#cbo_user_groups').select2('val')});

            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Rights/transaction/create",
                "data":_data,
                "beforeSend": showSpinningProgress($('#btn_save'))
            });
        };

        var updateUserAccount=function(){
			var _data=$('#frm_users').serializeArray();
            _data.push({name : "permission_id" ,value : _selectedID});

            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"Rights/transaction/update",
                "data":_data,
                "beforeSend": showSpinningProgress($('#btn_save'))
            });
        };

        var removeCustomer=function(){
            return $.ajax({
                "dataType":"json",
                "type":"POST",
                "url":"User_groups/transaction/delete",
                "data":{user_group_id : _selectedID}
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
                    '<td width="20%">Receiving Stock : </td><td width="50%"><b>'+ d.receiving_stock+'</b></td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>Point of Sales : </td><td><b>'+ d.point_of_sale+'</b></td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>Transactions : </td><td>'+ d.transactions+'</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>Sales Reports : </td><td>'+ d.sales_reports+'</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>Inventory Reports : </td><td>'+ d.inventory_reports+'</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>Product Management. : </td><td>'+ d.product_management+'</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>Supplier Management : </td><td>'+ d.supplier_management+'</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>Customer Management. : </td><td>'+ d.customer_management+'</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>Stock Management : </td><td>'+ d.stock_management+'</td>' +
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
